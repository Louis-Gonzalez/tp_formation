<script>
export default {
    name: 'ProductsBask',
    emits: ['addProductBask'],

    data() {
        return {
            nothing: null
        }
    },
    props: {
        productsBask: {
            type: Array,
            default: () => []
        }
    },
    methods: {
        emitAddProductBask(product) {
            this.$emit("addProductBask", product) /*/ j'appelle le listener personnalisé au nom de "addProductBask" sur le product
            ceci emet l'événement au composant parent  et charge le message via "le payload" 
            qui permettra au composant parent de faire l'action de demander par la fonction editer
            qui edite de la liste product, la ligne concerné dans le parent : le produit est edité
            */
        }
    },
    computed: {
        vtaCalculation: () => (price, vta) => {
            if (typeof price != "number" ) {
                /* throw new Error('Parameter is not a number!') */
                return "Error price is not a number"
            }
            let tax = (price / 100) * vta
            return price + tax
        },
        vtaCalculationLocal() {
            let tax = (this.price / 100) * this.vta
            return this.price + tax
        }
    }
}

</script>

<template>
        <h2>Your Basket</h2>
<table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix TTC</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr 
                    v-for="(item, index) in productsBask"
                    :key="item.id"
                ><!-- le paramètre item représente le product-->
                    <td>{{ item.name }}</td>
                    <td>{{ item.category }}</td>
                    <td>
                        <p>
                            {{item.description}}
                        </p>
                    </td>
                    <!-- Appel à une fonction computed -->
                    <td>{{ vtaCalculation(item.price, item.vta) }} €</td>
                </tr>
            </tbody>
        </table>

</template>

<style scoped>
h2 {
    text-align: center;
    color: green
}
</style>