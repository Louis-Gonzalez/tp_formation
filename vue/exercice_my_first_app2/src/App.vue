<script setup>
import component1 from './components/component1.vue' // j'appelle mon composant1 depuis le dossier composants

</script>

<template>  <!-- je crée le template qui comprendra la div #app-->
  <div id="app"> 
    <component1/> <!-- j'appelle mon composant component1 -->
    <component1 msg="Heeeellllooooo"/>  <!-- j'appelle mon composant component1 et je lui réassigne une valeur (v-bind) -->
  </div>
</template>

<style scoped>

</style>
