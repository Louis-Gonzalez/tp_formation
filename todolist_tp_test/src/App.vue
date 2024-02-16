<script setup>

import FormCreateToDo from './Form/FormCreateToDo.vue';
import MonTabTaches from '../src/components/MonTabTaches.vue';
import FormToEditTache from './Form/FormToEditTache.vue';


</script>

<template>
  <main>
    <div class="form-create-todo">
      <FormCreateToDo />
    </div>
    <div>
      <MonTabTaches />
    </div>
    <div>
      <FormToEditTache />
    </div>
  </main>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}
main {
  display: flex;
  align-items: center;
  }


@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
