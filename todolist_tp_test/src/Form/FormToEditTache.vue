<script>
import { useMyToDoListsStore } from '../stores/MyTodoLists.js';
import { mapActions, mapState } from 'pinia'

export default {
    name:"FormToEditTache",
    emits : ['updateToDoList'],
    data () {
        return {
            titre: "",
            description:"",
            temporalite:""
        }
    },
    methods: {
        // action de soummettre le formulaire
        submitForm() {
            const toDoList = {
                id: this.getToDoListToEdit.id,
                titre:this.titre,
                description: this.description,
                temporalite: this.temporalite
            }
            this.updateToDoList(toDoList)
        },
        // importation de updateToDoList depuis le store
        ...mapActions(useMyToDoListsStore, ['updateToDoList']),
    },
    computed: {
        // importation de getToDoListToEdit depuis le store
        ...mapState(useMyToDoListsStore, ['getToDolistToEdit'])
    },
    mounted() {
            const toDoList = this.getToDoListToEdit
            console.log("totototot",this.getToDoListToEdit)
            this.titre = toDoList.titre
            this.description = toDoList.description
            this.temporalite = toDoList.temporalite
            console.log(this.toDoList)
    }
}
</script>

<template>
    <div class="form-toDoListToEdit">
        <h2>Ma To Do List Edition</h2>
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
                    Valider les modifications
                    </button>
                </div>
            </div>
        </form>
    </div>

</template>
<style scoped>
.form-toDoListToEdit{
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
.input {
    margin: 1rem;
}
label{
    margin:1rem
}
</style>