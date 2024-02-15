<script>

    import { mapState, mapActions } from 'pinia';
    import {useMyToDoListsStore} from '../stores/MyTodoLists.js';
    import FormCreateToDo from '../Form/FormCreateToDo.vue';

export default {
    name: "MonTabTaches",
    component : {
        FormCreateToDo,
    },
    computed : {
        ...mapState(useMyToDoListsStore, ['getToDoLists'])
    },
    methods: {
        editToDoList(toDoList){
            this.setToDoListToEdit(toDoList)
        },
        ...mapActions(useMyToDoListsStore, ['deleteToDoList','updateLocaleStorage','setToDoListToEdit'])
    }
}
</script>

<template>
    <div class="wrapper">
        <div  class="titre-tab">
            <h2>Tableau des Tâches</h2>
        </div>    
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th class="titre-col">Id</th>
                        <th class="titre-col">Titre</th>
                        <th class="titre-col">Description</th>
                        <th class="titre-col">Durée de la tâche</th>
                        <th class="titre-col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in getToDoLists"
                        >
                        <td>{{item.id}}</td>
                        <td>{{item.titre}}</td>
                        <td>{{item.description}}</td>
                        <td>{{item.temporalite}}</td>
                        <td>
                            <button class="btn-bleu" @click="editToDoList(item)">Editer</button>
                            <button class="btn-rouge" @click="deleteToDoList(item)">Supprimer</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.wrapper{
    margin: 3rem;
}
.btn-rouge{
    background-color: red;
    font-weight: bold;
    color:whitesmoke;
    border-radius: 5px;
}
.btn-bleu{
    background-color: blue;
    font-weight: bold;
    color:whitesmoke;
    border-radius: 5px;
}
.titre-tab{
    background-color: cornflowerblue;
    border: black solid 1px;
}
.tab{
    width: 100%;
    border: black solid 1px;
}
.titre-col{
    font-weight: bold;
}
th,
td{
    text-align: center;
    width: 15%;
    padding: 1rem;
}
h2{
    text-align: center;
}
</style>