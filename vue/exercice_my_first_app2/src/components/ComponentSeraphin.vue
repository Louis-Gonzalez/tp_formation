<script>
    export default {
    name: "seraphin", // je donne le nom "seraphin" à mon composant 

    data()  { // mon composant à une data qui return un objet de clé aie et de valeur 1
                return {aie : 1}
            },

    props: { // je crée ma props qui a pour contenu un objet qui contient un message "msg"
        msg: { 
            type : String, // le contraint le type en le déclarant à "string"
            required : false, // j'assigne que cette valeur peut être non renseignée
            default: "Seraphin a mal à la tête et c'est " // je crée la valeur "default" par défaut et son le contenu
        }
    },
    methods: { // je crée une méthode et ceci appel forcement une fonction 
        ajouteAie() { // function s'appelle ajouteAie
            this.aie = this.aie+1 // je lui dis de faire aie+1
            }
        }
    }
</script>

<template>
    <div>
        <p>{{ msg }} {{aie}}</p>  <!-- ceci crée un paragraphe dans le lequel j'affiche le message "msg" et le "aie"-->
        <button @click="ajouteAie"> Cliquez-moi et j'ajoue 1 aie en + </button> <!-- je crée mon bouton avec la surveillance du click via @click et je lui dis de faire la fonction ajouteAie-->
    </div>
</template>

<style scoped> /*  je n'applique aucun stcle css*/

</style>


