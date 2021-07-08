<template>
    <div>
        <b-button variant="primary" size="lq" style="width: 150px" @click="showCartInfo">
            Cart
            <b-badge variant="light" style="width: 50px">{{ getCartInfo.total }}</b-badge>
        </b-button>
        <b-modal id="cartInfo" title="Cart" hide-footer>
            <b-col v-if="getCartProducts.length">
                <b-table class="w-100"
                         thead-class="d-none"
                         borderless
                         responsive
                         :items="getCartProducts"
                         :fields="visibleFields"
                >
                    <template #cell(quantity)="cell">
                        <b-form-group>
                            <b-input-group>
                                <b-form-input @change="quantityHandler(cell)" v-model="cell.value" type="number"
                                              min="1"/>
                            </b-input-group>
                        </b-form-group>
                    </template>
                    <template #cell(remove)="row">
                        <button type="button" class="close" aria-label="Close" @click="removeProduct(row.item.id)">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </template>
                </b-table>

                <div class="w-100 table-responsive">
                    <table class="table mt-5">
                        <tr>
                            <td>Total</td>
                            <td class="cell-100">{{ getCartInfo.quantity }}</td>
                            <td class="cell-100">{{ getCartInfo.total }}</td>
                        </tr>
                    </table>
                </div>
                <b-button @click="buy" variant="success" block>Buy</b-button>
            </b-col>
            <b-col class="text-center" v-else>
                <h3>Cart is empty =(</h3>
            </b-col>
        </b-modal>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        name: 'Cart',
        data () {
            return {
                test: 10,
                fields: [
                    { key: 'id', label: 'ID', visible: false },
                    { key: 'name', label: 'Product', visible: true },
                    { key: 'quantity', label: 'Quantity', visible: true, tdClass: 'cell-100' },
                    { key: 'amount', label: 'Amount', visible: true, tdClass: 'cell-50' },
                    { key: 'remove', label: 'Remove', visible: true, tdClass: 'cell-50' },
                ],
            }
        },
        computed: {
            ...mapGetters([
                'getCartInfo',
                'getCartProducts',
            ]),
            visibleFields () {
                return this.fields.filter(field => field.visible)
            },
        },
        methods: {
            ...mapActions([
                'recalculateCart',
                'removeProductFromCart',
                'createOrder'
            ]),
            showCartInfo () {
                this.$root.$emit('bv::show::modal', 'cartInfo')
            },
            quantityHandler (data) {
                this.recalculateCart({
                    id: data.item.id,
                    quantity: data.value,
                })
            },
            removeProduct(productId) {
                this.removeProductFromCart(productId)
            },
            buy () {
                this.createOrder().then((resp) => {
                    this.$bvModal.hide('cartInfo')
                    this.$router.push({name:'SuccessPage', params: {id: resp}})
                })
            }
        },
    }
</script>

<style>
    .cell-100 {
        width: 100px;
    }
    .cell-50 {
        width: 50px;
    }
</style>