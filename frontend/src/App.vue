<template>
    <b-overlay
            :show="getSpinner.loading"
            rounded="lg"
            no-center
    >
        <b-container class="mt-2">
            <Notification/>
            <b-row class="justify-content-center">
                <b-col>
                    <router-view></router-view>
                </b-col>
            </b-row>
        </b-container>
        <template #overlay>
            <div class="text-center ml-auto mt-lg-5">
                <b-spinner variant="primary"></b-spinner>
                <p>{{getSpinner.text}}</p>
            </div>
        </template>
    </b-overlay>
</template>

<script>
    import { mapGetters } from 'vuex'
    import Notification from './components/common/Notification'

    export default {
        name: 'App',
        components: {
            Notification,
        },
        computed: {
            ...mapGetters([
                'getSpinner'
            ]),
        }
    }
</script>