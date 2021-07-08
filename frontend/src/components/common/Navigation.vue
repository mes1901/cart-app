<template>
    <b-row class="justify-content-between">
        <b-col cols="3">
            <b-button variant="primary" @click="authHandler">
                {{authButtonText}}
            </b-button>
        </b-col>
        <b-col cols="2">
            <Cart />
        </b-col>
    </b-row>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import Cart from './Cart'


    export default {
        name: 'Navigation',
        components: {
            Cart,
        },
        data () {
            return {
                authButtonText: 'Use as registered',
            }
        },
        computed: {
            ...mapGetters([
                'isAuth'
            ]),
        },
        methods: {
            ...mapActions([
                'setAuthType',
            ]),
            authHandler() {
                this.authButtonText = this.isAuth ? 'Use as registered' : 'Use as unregistered'
                this.setAuthType(!this.isAuth)
            }
        }
    }
</script>

<style scoped>

</style>