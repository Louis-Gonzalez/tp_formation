import { defineStore } from 'pinia' // je récupère le gestionnaire de stores
// import {ref, computed} from 'vue'

import tabTaches from "../data/tachesList.json"// je récupère les valeurs qui sont dans le paquet.json des taches par défaut

console.log("totototot", tabTaches)

export const useTachesStore = defineStore('app', () => {

    
}
    
    
    
    
    
    
    STORE_NAME, {
    state: () => {
        return {
            taches: getCurrentState(),
            editTachesMode: false,
            tachesToEditId: null
        }
    },
    getters: {
        getTaches : (state) => state.taches,
        getEditTachesMode : (state) => state.getEditTachesMode,
        getTachesToEditId : (state) => state.tachesToEditId,
        getTachesbyId: (state) => (id) => {
            return state.taches.find(taches => taches.id === id)
        }
    },
    actions: {
        upDateLocaleStorage () {
            localStorage.setItem(STORE_LOCALE_STORRAGE_KEY, JSON.stringify(taches.values))
        },
    }
})


const STORE_NAME = 'taches' // création de la constante STORE_NAME est on stock product dedans
const STORE_LOCALE_STORRAGE_KEY = 'taches' // pour chaque store/magasin, il faut un clé (comme pour une sérrure d'un magasin pysique)

const getDefaultState = () => tabTaches // je récupère les taches en distant sur le serveur

const getCurrentState = () => {
    const localeData = localStorage.getItem(STORE_LOCALE_STORRAGE_KEY)

    return localeData ? JSON.parse(localeData) : getDefaultState()
}