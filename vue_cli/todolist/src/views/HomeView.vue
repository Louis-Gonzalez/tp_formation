<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png" />
    <HelloWorld msg="Welcome to Seraphin Todolist" />
    <MyForm />
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from "@/components/HelloWorld.vue";
import MyForm from '@/components/MyForm.vue';
import TacheAExecuter from '@/components/TacheAExecuter.vue'

export default {
  name: "HomeView",
  components: {
    HelloWorld,
    MyForm,
    TacheAExecuter,
  },
};
</script>
