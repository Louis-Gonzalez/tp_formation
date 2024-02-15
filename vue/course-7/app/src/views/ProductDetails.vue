<script>
import { mapState } from 'pinia';
import { useProductsStore} from '@/stores'

export default {
    name: "ProductDetails",
    // ici récupérer le paramètre de route qui contiet l'id de notre produit

    // this.$route.params.id

    // Récupérer le produit correspondant à l'Id dans le paramètre
    // en utilisant le store product
    mounted(){
        console.log(this.getProductById(this.$route.params.id))
    },
    computed: {
        ...mapState(useProductsStore, ["getProductById"]),
        getProduct(){
            return this.getProductById(this.$route.params.id)
        }
    }
}
</script>

<template>
    <article v-if = "getProduct !=null">
        <header>
            <h2>getProduct().name</h2>
        </header>
        <section>
            <p>
                COCUCOCOCICUCC
            </p>
        </section>
        <footer></footer>
    </article>
    <h2 v-else>Ce produit n'existe pas ! Désolé</h2>
</template>