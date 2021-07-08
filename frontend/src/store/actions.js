import requestService from '../services/requestService'
import config from '../config';

const resourceUrl = config.getApiUrl()

export default {
    fetchProductsList: (context) => {
        context.commit('setSpinner',
            { text: 'Loading products...', status: true })

        return requestService.get(resourceUrl + '/products').
            then(response => {
                context.commit('setProducts', response.data)
            }).
            catch(error => {
                context.commit('failedNotification',
                    error.response.data.error.message)
            }).
            finally(() => {
                context.commit('setSpinner', { status: false })
            })
    },

    setAuthType: (context, auth) => {
        context.commit('setAuth', auth)
    },

    addProductToCart: (context, product) => {
        context.commit('addProduct', product)
        context.commit('setTotalAmount')
    },

    recalculateCart: (context, data) => {
        context.commit('recalculateCart', data)
        context.commit('setTotalAmount')
    },

    removeProductFromCart: (context, id) => {
        context.commit('removeProduct', id)
        context.commit('setTotalAmount')
    },

    createOrder: (context) => {
        context.commit('setSpinner', { text: 'Order saving...', status: true })

        let cartData = context.getters.getCartInfo
        cartData.auth = context.getters.isAuth ? 1 : 0

        return requestService.create(resourceUrl + '/order', cartData).
            then((response) => {
                return response.data.id
            }).
            catch(error => {
                context.commit('failedNotification',
                    error.response.data.error.message)
            }).
            finally(() => {
                context.commit('setSpinner', { status: false })
            })
    },
}
