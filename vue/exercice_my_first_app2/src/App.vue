<script setup>
import ComponentSeraphin from './components/ComponentSeraphin.vue' // j'appelle mon composant1 depuis le dossier composants

</script>

<template>  <!-- je crée le template qui comprendra la div #app-->
  <div id="app"> 
    <ComponentSeraphin/> <!-- j'appelle mon composant component1 -->
    <ComponentSeraphin msg="Heeeellllooooo"/>  <!-- j'appelle mon composant component1 et je lui réassigne une valeur (v-bind) -->
  </div>
</template>

<style scoped>

</style>
