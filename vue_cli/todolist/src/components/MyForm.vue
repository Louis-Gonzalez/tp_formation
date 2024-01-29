<script>
import { ref } from 'vue'

export default {
    name: "MyForm",
    setup() {
        const nomDeLaTache = ref("");
        const descriptionTache = ref("");
        const temporaliteTypes = ref([
            {
                id: 1,
                nom: "court terme",
                value: "short-term",
            },
            {
                id: 2,
                nom: "moyen terme",
                value: "middle-term",
            },
            {
                id: 3,
                nom: "long terme",
                value: "long-term",
            },
        ]);
        const temporaliteChosit = ref("");

        return { nomDeLaTache, descriptionTache, temporaliteTypes, temporaliteChosit };
    },
    data() {
        return {
            nomDeLaTache: '',
            descriptionTache: '',
            ordreDesTaches: ''
        };
    },
    methods: {
        soumettreTache() {
            // Ajoutez ici la logique pour gérer la soumission du formulaire
            console.log('Formulaire soumis avec succès');
        }
    }
};
</script>

<template>
    <h3>Créer une tâche</h3>
    <form @submit.prevent="soumettreTache">
        <p>
            <label for="nomDeLaTache">Nom de la tâche:</label>
            <input type="text" id="nomDeLaTache" v-model="nomDeLaTache" placeholder="Nom de la tâche" required />
        </p>
        <p>
            <label for="descriptionTache">Description de la tâche:</label>
            <textarea id="descriptionTache" v-model="descriptionTache" cols="30" rows="10"
                placeholder="Description de la tâche" required>
            </textarea>
        </p>
        <p>
            <label for="ordreDesTaches">Prorité de la tâche</label>
            <select id="ordreDesTaches" v-model="temporaliteChosit" required>
                <option v-for="tempo in temporaliteTypes" :value="tempo.value" :key="tempo.id">{{ tempo.nom }}</option>
            </select>
            <button type="submit">Créer ma tâche</button>
        </p>
    </form>
</template>

<style>
input, textarea, select, button {
    width : 90%;
    margin: 5px 10px;
}
</style>