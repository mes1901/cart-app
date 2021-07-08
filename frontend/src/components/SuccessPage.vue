<template>
    <b-container class="mt-lg-5 text-center">
        <h2>Спасибо за заказ. Ваш заказ #{{this.$route.params.id}} отправлен в обработку</h2>
        <b-button class="lg mt-5" variant="success" @click="$router.push({name: 'ProductsPage'})">Вернуться к покупкам
        </b-button>
    </b-container>
</template>

<script>
    export default {
        name: 'SuccessPage',
    }
</script>

<style scoped>

</style>