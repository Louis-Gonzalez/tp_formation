<script >
import MainLayout from './components/Layout/MainLayout.vue'
import MainNav from './components/Layout/MainNav.vue'
import ProductForm from "./components/Form/ProductForm.vue"
import ProductsTable from "./components/Product/ProductsTable.vue"

/* Importation des données depuis un fichier json - La conversion est automatique */
import products from "./data/productList.json"

export default {
  name: 'App',
  components: {
    // ici on va appeller tous les composants enfants de App.vue qui est le composant racine
    MainLayout,
    MainNav,
    ProductForm,
    ProductsTable
  },
  data() { // la partie data ?????????? 
    return {
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
        }
      ],
      /* On lie les données importées depuis le fichier JSON */
      products: products,
      editMode: false,
      productToEdit: null
    }
  },
  methods: { 
    // la première méthode est editProduct qui est une fonction qui à pour paramètre (product)
    editProduct(product) {
    /* ici on regarde si l'objet product est différent de null, si il l'est alors on garde l'objet product
    sinon on met les valeurs de l'obejt à éditer à null */
      this.productToEdit = product != null ? product : null
    // ici on regarde si le mode edition est activté (true) ou pas 
      this.editMode = product != null ? true : false
    },
    deleteProduct(product) {
      // Ici on va parcourir le tableau products et supprimer le produit transmis
      this.products = this.products.filter(el => el.id != product.id)
    },
    resetEditionMode() {
      // ici on réinitise les valeurs de l'obejt product suivant à null
      this.productToEdit = null
      // ici on réassigne le edit Mode à false pour le faire mettre à l'état normal de saisi
      this.editMode = false 
    }
  }
}
</script>

<template>
  <main-layout><!-- Apparition du main-layout qui est la mise en forme du template html-->
    <template #header>
    <!-- Dans le template, on voit un nouveau template avec #header
    c'est un template qui sera chargé par le slot header que l'on retrouvera au fichier main-layout-->

    <!-- Ici on voit un composant <main-nav/> qui contient 3 props: 
    :navItems  qui appelle la fonction "navItemsArray, 
    :userNavItems qui appelle la fonction userNaviItemsArray
    :showUserNav qui est un boolen à (true)"-->
      <main-nav
        :navItems="navItemsArray"
        :userNavItems="userNavItemsArray"
        :showUserNav="true"
      />
    </template>

    <section class="d-flex wrap">
    <!-- Ici est le composant <product-form/> avec un bouton updateProduct, on écoute le click via le @ 
    et au click on appelle la fonction "updateProduct" dans ce composant, il y a 2 props: 
    la première est editMode: qui appelle la fonction "editMode" 
    et la deuxième productToEdit: qui appelle la fonction "productToEdit"-->
      <product-form
        @updateProduct="updateProduct"
        class="col-6"
        :editMode="editMode"
        :productToEdit="productToEdit"
      />
    <!-- Ici est le composant <product-table/> avec 2 boutons, 
    premier bouton @editProduct, on écoute le click via le @ et au click on appelle 
    la fonction "editProduct" et le deuxième bouton est @deleteProduct et au click on appelle
    la fonction "deleteProduct"
    Et dans ce composant, il y a 1 props: 
    :products qui appelle la fonction "products"-->
      <products-table
        class="col-6"
        :products="products"
        @editProduct="editProduct"
        @deleteProduct="deleteProduct"
      />
    </section>
  </main-layout>
</template>

<style scoped>
</style>
