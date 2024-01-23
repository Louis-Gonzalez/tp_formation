<script>
    export default {
        name: "MainLayout"
    }
</script>
<template>
        <!-- redéfinir les slots  (l'action totale) (fait) --> 
        <!-- - nommé les slots (dans App.vue) (fait)-->
        <!-- - rendu consitionnel de slots / expliquer (les conditions sont d'affichage sont faite via le v-if) (fait)-->
        <!-- - injecter dans le slot Header (v-slot: header, main ou footer) (fait)--> 
    <div class="container">
        <header class="p-3 mb-3 border-bottom">
            <slot 
            v-if ="$slots.header" 
            name="header"></slot> <!-- le v-if fonctionne comme un booleen, s'il y a une quelques choses dedans alors il répondra true mais ne regarde pas le type (fait)-->
        </header>

        <main 
        name="main"> <!-- nommage du main par main--> 
            <slot></slot> <!-- ici c'est le slot par défaut-->
        </main>

        <footer>
            <slot 
            v-if ="$slots.footer"
            name="footer"></slot><!-- le v-if fonctionne comme un booleen, s'il y a une quelques choses dedans alors il répondra true mais ne regarde pas le type-->
        </footer>
    </div>
</template>