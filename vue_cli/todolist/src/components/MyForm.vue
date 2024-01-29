<script>
import { ref } from 'vue' // importation de la fonction native ref qui renvoie un objet depuis l'input

export default {
    name: "MyForm",
    emits: ["creerTaches"], // on doit spécifier que va émettre un event et le nommé corresponadance ligne 42

    setup(props, context) { // le paramètre context apporte la méthode "emit"
        // ici on crée la constante pour stocker les valeurs de l'obejt qui aura une propreité value retourné depuis input nomDeLaTache
        // après il faut associé le nom de la constante avec le template, idem pour les autres valeurs ci-dessous
        const nomDeLaTache = ref(""); 
        // ici on crée la constante pour stocker les valeurs de l'obejt qui aura une propreité value retourné depuis input descriptionTache
        const descriptionTache = ref("");
        // ici on crée la constante pour stocker les valeurs de l'objet qui aura une propreité value retourné depuis le choix déroulant
        const temporaliteTypes = ref([
            { // description du premier choix 
                id: 1,
                nom: "court terme",
                value: "short-term",
            },
            { // deuxième choix
                id: 2,
                nom: "moyen terme",
                value: "medium-term",
            },
            { // troisième choix
                id: 3,
                nom: "long terme",
                value: "long-term",
            },
        ]);
        // ici on crée la constante pour stocker l'objet qui aura une propreité value retourné au choix
        const temporaliteChosit = ref(""); 

        function soumettreTache(){ // création de la fonction soummettreTache
            const taches = { // création de la constante pour récupérer l'objet suivant 
                id: Date.now(), 
                nom: nomDeLaTache.value, // ceci renvoie à la valeur de l'input du form
                description : descriptionTache.value,
                temporaliteChosit : temporaliteChosit.value,
            };
            console.log("My Form taches :", taches);
            context.emit('creerTaches', taches); // ici on emet une info qui va remonter vers le component parent et taches est le payload
            majForm(); // réinitialisation du form, par contre on est en compostion , nous n'avons pas besoin du this.majForm()
        }
        function majForm(){ // fonction réinitialise les valeurs du form
            nomDeLaTache.value =""; // ceci renvoie à la valeur de l'input du form 
            descriptionTache.value = "";
            temporaliteChosit.value = "";
        }
        

        // on a ecrit la forme raccourci sinon il faudrait ecrire {nomDeLaTache : nomDeLaTache, 
        // etc ... sous le format clé/valeur et on ajoute la fonction soummettreTache}
        return { nomDeLaTache, descriptionTache, temporaliteTypes, temporaliteChosit, soumettreTache }; 
        // à partir d'ici, on peut réutiliser ces variables ailleurs et surtout dans le template
    },
    /*data() { // ici on a pas besoin de data car on est en composition le setup fait le boulot
        return {
            nomDeLaTache: '',
            descriptionTache: '',
            ordreDesTaches: ''
        };
    },*/
};
</script>

<template>
    <h3>Créer une tâche</h3>
    <form @submit.prevent="soumettreTache"> 
        <!-- création de l'écoute du boutton "@submit" ou "v-on:submit" et on lui attribue la fonction "soummettreTache"
            qui n'est pas sont comportement par default grâce .prevent -->
        <p>
            <!-- premier input, et c'est ici que nous avons la correspondance pour récupérer la valeur de l'input 
            grâce à v-model= "nomDeLaTache"est qui bidirectionnel-->
            <label for="nomDeLaTache">Nom de la tâche:</label> 
            <input type="text" id="nomDeLaTache" v-model="nomDeLaTache" placeholder="Nom de la tâche" required />
        </p>
        <p>
            <!-- deuxième input,  et aussi nous avons la correspondance pour récupérer la valeur de l'input 
            grâce à v-model= "descriptionTache" est qui bidirectionnel-->
            <label for="descriptionTache">Description de la tâche:</label>
            <textarea id="descriptionTache" v-model="descriptionTache" 
            cols="30" rows="10"
            placeholder="Description de la tâche" required>
            </textarea>
        </p>
        <p>
            <!-- troisième input,  et aussi nous avons la correspondance pour récupérer la valeur de l'input 
            grâce à v-model= "temporaliteChoisit" est qui bidirectionnel-->
            <label for="ordreDesTaches">Prorité de la tâche</label>

            <!-- Les balises select et option fonctionnent ensemble pour créer le choix multiple déroulant-->
            <select id="ordreDesTaches" v-model="temporaliteChosit" required>

                <!-- ici il faut parcourir les choix via le v-for avec le paramètre tempo et je parcours temporaliteTypes 
                on pense à déclarer notre itérateur choisit id avec :key puisqu'on fait un v-for
                les : devant la value c'est la forme raccourci v-bind :value  et l'écriture tempo.value va nous servir 
                à récuper la correspondace, après entre les {{ c'est pour afficher la valeur tempo.nom qui renvoie ex: moyen-terme }}-->
                <option v-for="tempo in temporaliteTypes" :key="tempo.id" :value="tempo.value">{{ tempo.nom }}</option>

            </select>
            <button type="submit">Créer ma tâche</button> 
        </p>
    </form>
    <div>
    <h2>Ma liste de tâche à faire</h2>
        <p>
        {{ tableauTaches }}
        </p>
    </div>
</template>

<style>
input, textarea, select, button {
    width : 90%;
    margin: 5px 10px;
}
</style>