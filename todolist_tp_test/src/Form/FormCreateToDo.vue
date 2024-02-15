<script>
import { mapActions } from 'pinia';
import {useMyToDoListsStore} from '../stores/MyTodoLists.js'

export default {
    name: "FormCreateToDo", 
    data (){
        return {
            id: "",
            titre: "",
            description: "",
            temporalite: "",
        }
    },
    methods : {
        // remise à zéro du form
        resetForm(){
            this.titre = ''
            this.description = ''
            this.temporalite = ''
        },
        // action lors de la sousmission du formulaire
        submitForm() {
            const toDoList = {
                id: Math.floor(Math.random() * Date.now()),
                titre: this.titre,
                description : this.description,
                temporalite: this.temporalite
            }
            this.addToDoList(toDoList)
            this.resetForm()
        },
        // importation de la fonction addToDoList depuis le store
        ... mapActions(useMyToDoListsStore, ['addToDoList']),
    },
    computed: {
        // importation de la fonction getToDoList depuis le store
        ...mapActions(useMyToDoListsStore, ['getToDoLists']),
    }
}
</script>

<template>
    <div class="form-toDoList">
        <div class="titre-form">
            <h2>Ma To Do List</h2>
        </div>
        <form @submit.prevent="submitForm">
            <div class="input">
                <label for="titre">Titre :</label>
                <input class="champs" type="text" name="titre" v-model="titre" required/>
            </div>
            <div class="input">
                <label for="description">Titre :</label>
                <textarea class="champs" type="text" name="description" v-model="description" required></textarea>
            </div>
            <div class="temporalite">
                        <label for="temporalite">Durée de la tâche :</label>
                        <select v-model="temporalite" required>
                            <h3>Choisir une temporalité </h3>
                            <option value="court-terme">Court terme</option>
                            <option value="moyen-terme">Moyen terme</option>
                            <option value="long-terme">Long terme</option>
                        </select>
            </div>
            <div class="btn">
                <div>
                    <button 
                    @submit.prevent="addToDoList"
                    class="btn-vert" 
                    type="submit"
                    >
                    Créer ma tâche
                    </button>
                </div>
            </div>
        </form>
    </div>

</template>

<style scoped>
.form-toDoList{
    width : 100%;
    text-align: center;
}

.btn-vert{
    margin: 1rem;

    background-color: green;
    padding : 5px;
    color:whitesmoke;
    border-radius: 5px;
}
.btn-rouge{
    background-color: red;
    padding : 5px;
    color:whitesmoke;
    border-radius: 5px;
}
.input {
    margin: 1rem;
}
label{
    margin:1rem
}
</style>