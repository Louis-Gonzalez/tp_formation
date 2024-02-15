// importation de la fonctionnalité de {defineStore} depuis 'pinia'
import { defineStore } from 'pinia'

/* Importation des données depuis un fichier json - La conversion est automatique */
/* import products from "../data/productList.json" */
/* @ est un raccourcis pour partir du dossier src */
import products from "@/data/productList.json"

const STORE_NAME = 'products' // création de la constante STORE_NAME est on stock product dedans
const STORE_LOCALE_STORRAGE_KEY = 'products' // pour chaque store/magasin, il faut un clé (comme pour une sérrure d'un magasin pysique)

const getDefaultState = () => products // ici on va récupéré l'objet product en distant sur le serveur

// ici on récupéré l'object dans le LOCALE_STORAGE (du navigateur) avec la fonction getCurrentState
const getCurrentState = () => { 
/* ici on créé une constante qui contiendra l'objet product du LOCAL_STORAGE 
Pour se faire une utilise une fonction native nodeJS qui est getItem est à besoin de la clé (STORE_LOCALE_STORRAGE_KEY) en parametre */
const localeData = localStorage.getItem(STORE_LOCALE_STORRAGE_KEY)

/* ici nous avons un ternaire conditionnelle, si localeData est égale à localeData qui est parse depuis le fichier JSON, on garde localeData
sinon on va récupérer l'objet en distant avec la fonction getDefaultState*/
return localeData ? JSON.parse(localeData) : getDefaultState()
}

/* ici on crée notre local sotage en appelant la fonction defineStore et en paramètre on saisit le nom du store et 
le deuxième paramètre sera un objet qui contiendra toute les données du locale storage*/
export const useProductsStore = defineStore(STORE_NAME, { 
// ici on retrouve les parties classiques d'un store state, getters et actions
    state: () => {
      // state s'apparente à une fonction qui retourne un objet qui contient des datas et l'état de certains objets
      return {
        /* il retourne un objet, dont products qui appelle une fonction getCurrentState(), 
        un état de editProductMode à false et productToEditId à null */
        products: getCurrentState(),
        editProductMode: false,
        productToEditId: null
      }
    },
    getters: { 
      /* les getters sont une liste d'objets qui sont des fonctions qui ont pour but de d'aller récupérer 
      l'état des objets ciblés dans une store, mais ils peuvent aussi effectué des fonctions de tri, filtrage ou de transformation */
      getProducts : (state) => state.products,
      getEditProductMode : (state) => state.editProductMode,
      getProductToEditId: (state) => state.productToEditId,
      getProductById: (state) => (id) => {
        return state.products.find(product => product.id === id)
      }
    },
    actions: {
      /* les actions sont des fonctions méthodes*/
      upDateLocalStorage (){
      /* ici l'objet products va etre transformé en chaine de caractère par la fonction native JS stringify et 
      sera ajouter au LOCALE_STORAGE par une autre fonction native js setItem */
        localStorage.setItem(STORE_LOCALE_STORRAGE_KEY, JSON.stringify(this.products))
      },
      addProduct(product) { // ici on ajoute le product au tableau d'objet products
        this.products.push(product)
        this.upDateLocalStorage() // on appelle la fonction mise à jour du locale Storage
      },
      updateProduct(product) { // on fait une mise à jour de product ciblé en paramètre
        const index = this.products.findIndex(el => { // on cherche la correspondance de Id product avec el.id
            return el.id === product.id
        })
        this.products[index] = product // on réécrit le product au bon endroit
        this.upDateLocalStorage()
        this.resetEditionMode() // on appelle la fonction resetEditMode() expliquer un peu plus bas
      },
      deleteProduct(productId) {
        // Ici on va parcourir le tableau products et supprimer le produit transmis via la fonction filter
        this.products = this.products.filter(el => el.id != productId)
        this.upDateLocalStorage()
      },
      setEditProductMode(mode) { // d'ou vient le mode ???????? je suppose que mode est obtenu via le getter getEditProductMode
        this.editProductMode = mode
      },
      setProductToEditId(id) { // cette fonction permet de garder le même id pour le product à update
        this.productToEditId = id
      },
      resetEditionMode() { 
        /* on réassigne la valeur productToEditId à null du futur objet à enregistrer et 
        on remet la valeur editProductMode à false comme au début */
        this.productToEditId = null
        this.editProductMode = false 
      }
    }
})