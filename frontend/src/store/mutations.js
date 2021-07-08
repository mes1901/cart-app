export default {
    setSpinner: (state, { text, status }) => {
        state.spinner.text = text !== undefined ? text : 'Loading...'
        if (status !== undefined) {
            state.spinner.loading = status
        }
    },

    failedNotification: (state, text) => {
        state.notification.text = text
        state.notification.type = 'danger'
        state.notification.active = true
    },

    setProducts: (state, products) => {
        state.products = products
    },

    setAuth: (state, value) => {
        state.isAuth = value
    },

    addProduct: (state, product) => {
        const productPrice = state.isAuth
            ? product.discount_price
            : product.price

        let productIndex = state.cart.products.findIndex(
            item => item.id === product.id)

        if (productIndex + 1) {
            state.cart.products[productIndex].quantity += 1
            state.cart.products[productIndex].amount = Number(
                (state.cart.products[productIndex].amount +
                    productPrice).toFixed(2))
        } else {
            product.quantity = 1
            product.amount = productPrice
            state.cart.products.push(product)
        }
    },

    recalculateCart: (state, data) => {
        let products = state.cart.products
        let productIndex = products.findIndex(item => item.id === data.id)
        const product = products[productIndex]
        const productPrice = state.isAuth
            ? product.discount_price
            : product.price

        products[productIndex].quantity = parseInt(data.quantity)
        products[productIndex].amount = Number(
            (productPrice * parseInt(data.quantity)).toFixed(2))

        state.cart.products = [...products]
    },

    setTotalAmount: (state) => {
        let quantity = 0
        let total = 0
        state.cart.products.forEach((item) => {
            quantity += item.quantity
            total += item.amount
        })

        state.cart.total = Number((total).toFixed(2))
        state.cart.quantity = quantity
    },

    removeProduct: (state, id) => {
        let productIndex = state.cart.products.findIndex(item => item.id === id)
        state.cart.products.splice(productIndex, 1)
    },
}
