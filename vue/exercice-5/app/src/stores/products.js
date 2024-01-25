import { defineStore } from 'pinia' // permet de définir un store

/* Importation des données depuis un fichier json - La conversion est automatique 
@ est un raccoucir pour partir du dossier src soit on pourrait écrire :
import products from "@/data/producList.json" */

import products from "../data/productList.json"


/* attention dans le nommage est sous convention de la constante 
on doit l'écrire de la manière suivante : 
 "use" + "le nom du store" + "Store" */

export const useProductsStore = defineStore('products', {
    // écrire ses options... 
    //première partie :  state qui sera data
    state: () => { // veut dire état et la valeur de la donnée
        return {
            products: products, // veut dire état et la valeur de la donnée
            editProductMode: false,
            productToEdit: null,
        }
    },
    // deuxième partie : getters : sera les méthodes, les emits, ...
    // on pourrait écrire (chuby) => chuby.products
    // ça sert recuper la donnée
    getters: {
        getProducts : (state) => state.products, // on recupère l'objet product dans state
        getEditProductMode: (state) => state.editProductMode, //  on récupère l'objet editProductMode dans le state
        getProductById: (state) => (id) => { // on recupère l'objet product correspond à l'id en paramètre  
            return state.products.find(product => product.id === id) // qui est ciblé par le find dans state.product 
        } // on pourrait remplacer le mot product par element : soit (element => element.id === id)
    }, 
    actions: {
        addProduct(product) { 
            this.products.push(product)
        },
        updateProduct(product) {
            const index = this.products.findIndex(el => {
                return el.id === product.id
            })
            this.products[index] = product
            this.resetEditionMode ()
        },  // ici c'est l'équivalent du playload
            // l'utlisation de cette donnée soit la mutation 
        setEditProductMode (mode){
            this.editProductMode = mode // permet de changer le statut de mode false par default et le changer 
        },
        setProductToEditId (id){
            this.productToEditId = id // permettre de savoir quel est son id
        },
        resetEditionMode (){
            this.productToEditId = null // reéassigne la valeur à null l'id de productEditId
            this.editProductMode = false // réasigne la valeur false à editProductMode à false
        }
    } 
})

/* la fonction defineStore est une fonction par défaut qui utilisaera
les données de products avec ses options  */
