<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png" width="200px" height="auto" />
    <HelloWorld msg="Welcome to Seraphin Todolist" />
    <MyForm @creerTaches="ajouterTaches"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";
import MyForm from '@/components/MyForm.vue';
import tableauTacheschuby from '@/services/TableauDeTaches.js'
import TacheAExecuter from '@/components/TacheAExecuter.vue';

export default {
  name: "HomeView",
  components: {
    HelloWorld,
    MyForm,
    TacheAExecuter,
  },
  setup() {
    function ajouterTaches(payload){
      console.log("Home.vue ajouterTaches", payload)
      // utilise la valeur via l'export et on ajoute sa méthode .ajouterTableauTaches avec l'argument payload
      tableauTacheschuby.create(payload);
    }

    return { ajouterTaches: ajouterTaches}
  }
};

</script>
