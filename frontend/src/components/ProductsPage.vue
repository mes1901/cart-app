<template>
    <b-container>
        <Navigation/>
        <b-card-group deck class="m-3">
            <b-card v-for="product in getProducts"
                    :key="product.id"
                    border-variant="default"
                    :header="product.name"
                    header-bg-variant="secondary"
                    header-text-variant="white"
                    align="center"
                    tag="article"
                    style="min-width: 300px; max-width: 320px"
                    class="mb-5 mt-2">
                <br/>
                <b-card-text v-if="isAuth">
                    <span style="text-decoration: line-through">{{ product.price }}{{ getCurrency }}</span><br>
                    <span>{{ product.discount_price }}{{ getCurrency }}</span>
                </b-card-text>
                <b-card-text v-else>
                    <span>{{ product.price }}{{ getCurrency }}</span>
                </b-card-text>
                <b-button variant="outline-success" @click="addToCart(product)">Add to cart</b-button>
                <br/>
            </b-card>
        </b-card-group>
    </b-container>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import Navigation from './common/Navigation'

    export default {
        name: 'ProductsPage',
        components: {
            Navigation
        },
        computed: {
            ...mapGetters([
                'getProducts',
                'getCurrency',
                'isAuth'
            ]),
        },
        methods: {
            ...mapActions([
                'fetchProductsList',
                'addProductToCart'
            ]),
            addToCart (product) {
                this.addProductToCart(product)
            },
        },
        created () {
            this.fetchProductsList()
        },
    }
</script>

<style scoped>

</style>
