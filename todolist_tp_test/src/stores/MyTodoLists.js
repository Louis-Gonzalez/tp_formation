
import { defineStore } from "pinia";
import toDoLists from "../data/toDoList.json"

const STORE_NAME = 'MyTodoLists'
const STORE_LOCALE_STORAGE_KEY = 'MyTodoLists'

const getDefaultState = () => toDoLists
const getCurrentState = () => {
    const localeData = localStorage.getItem(STORE_LOCALE_STORAGE_KEY)
    console.log(localeData)
    return localeData ? JSON.parse(localeData) : getDefaultState()
    
}
const localCurrentToDoList = () => {
    const localeDatax = localStorage.getItem(STORE_LOCALE_STORAGE_KEY)
    return localeDatax ? JSON.parse(localeDatax) : null
}

export const useMyToDoListsStore = defineStore(STORE_NAME, {
    state: () => {
        return {
            toDoLists: getCurrentState(),
            currentToDoList: localCurrentToDoList(),
            toDolistToEdit : null,
        }
    },
    getters: {
        getToDoLists: (state) => state.toDoLists,
        getToDolistById: (state) => (id) => state.toDoLists.find(toDoList => toDoList.id == id),
        getToDolistToEdit: (state) => state.toDolistToEdit
    },
    actions: {
        updateLocaleStorage(){
            localStorage.setItem(STORE_LOCALE_STORAGE_KEY, JSON.stringify(this.toDoLists))
        },
        addToDoList(toDoList) {
            this.toDoLists.push(toDoList)
            this.updateLocaleStorage()
        },
        deleteToDoList(toDoList) {
            this.toDoLists = this.toDoLists.filter(el => el.id != toDoList.id)
            this.updateLocaleStorage()
        },
        setCurrentToDoList (toDoList){
            this.currentToDoList = toDoList;
            localStorage.setItem("currentToDoList", JSON.stringify(toDoList))
        },
        setToDoListToEdit (toDoList) {
            this.toDoList = toDoList;
        },
        updateToDoList(toDoList) {
            const index = this.toDoList.findIndex(el => {
                return el.id === toDoList.id
            })
            this.toDoLists[index] = toDoList
            this.updateLocaleStorage()
        },
    }
})