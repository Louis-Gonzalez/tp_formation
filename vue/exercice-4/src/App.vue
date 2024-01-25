<script >
import MainLayout from './components/Layout/MainLayout.vue'
import MainNav from './components/Layout/MainNav.vue'
import ProductForm from "./components/Form/ProductForm.vue"
import ProductsTable from "./components/Product/ProductsTable.vue"
import ProductsBask from './components/Product/ProductsBask.vue'
import products from "./data/productList.json"


/* Importation des données depuis un fichier json - La conversion est automatique (fait) */


export default {
  name: 'App',
  components: {
    MainLayout,
    MainNav,
    ProductForm,
    ProductsTable,
    ProductsBask,
    ProductsBask
},
  data() {
    return {
      ProductsBask: [],
      userNavItemsArray : [
        {
          name: "Settings",
          link: "#",
          target: "_self"
        },
        {
          name: "Profile",
          link: "#",
          target: "_self"
        }
      ],
      navItemsArray : [
        {
          name: "Edit",
          link: "#",
          target: "_self",
          emit: [
            { event: "updatePage", value: {"EditPage": true}}
          ],
          class: "link-body-emphasis"
        },
        {
          name: "Preview",
          link: "#",
          emit: [
            { event: "updatePage", value: {"PreviewPage": true}}
          ],
          target: "_self",
          class: "link-body-emphasis"
        },
        {
          name: "Settings",
          link: "#",
          emit: [
            { event: "updatePage", value: {"settingsPage": true}}
          ],
          target: "_self",
          class: "link-body-emphasis"
        },
      ],
      /* On lie les données importées depuis le fichier JSON */
      products: products
    }
  },
  methods: {
    /* payload représente les données envoyées par l'événement */
    addProduct(payload) {
      this.products.push(payload)
    },
    deleteProduct(product) {
    console.log(product) // cela renvoie un intégeur
    /* Ici on va parcourir le tableau products et supprimer le produit transmis */
      this.products = this.products.filter( (item) => item.id != product)  // ici je filtre le tableau et je réassigne à la valeur products
    },
    addProductBask(product) {
      console.log(product) // cela renvoie un produit entier  "Product"
      this.ProductsBask.push(product) 
      console.log(this.ProductsBask)
    }
  }
}
</script>

<template>
  <main-layout>
    <template #header>
      <main-nav
        :navItems="navItemsArray"
        :userNavItems="userNavItemsArray"
        :showUserNav="true"
      />
    </template>

    <section class="d-flex wrap">
      <!-- insérer un écouter d'évènement personnalisé qui appel la focntion addProduct -->
      <product-form
        @addProduct="addProduct"
        @addProductBask="addProductBask"
        class="col-6"
      />
      <!-- 
        Ici, nous allons écouter un événement qui stipule
        de supprimer un produit de la liste et appeler
        la fonction de suppression deleteProduct
      -->
      <products-table
        class="col-6"
        @deleteProduct = "deleteProduct"
        :products="products"
        @addProductBask = "addProductBask"
      /> <!-- ici on écoute le bouton "addProductBask" dans le products-table -->
    </section>
    <template #footer>
      <products-bask
        class="col-6"
        :productsBask="ProductsBask"
      /> <!-- ici on écoute le bouton "addProductBask" dans le products-table -->
    </template>
  </main-layout>
</template>

<style scoped>
</style>
