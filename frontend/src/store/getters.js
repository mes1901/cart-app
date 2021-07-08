export default {
    getSpinner: (state) => {
        return state.spinner
    },
    notification: (state) => {
        return state.notification
    },
    getProducts: (state) => {
        return state.products
    },
    getCartInfo: (state) => {
        return state.cart
    },
    getCartProducts: (state) => {
        return state.cart.products
    },
    getCurrency: (state) => {
        return state.currency
    },
    isAuth: (state) => {
        return state.isAuth
    },
}
