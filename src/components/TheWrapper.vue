<template>
    <div class="wrapper">
        <div class="middle-wrapper">
            <div class="cup-wrap">
                <img src="@/assets/img/cup-main.png">
            </div>
            <base-button @click.native="openModalWindow('callback')">заказать звонок</base-button>
        </div>
        <div class="products-wrapper">
            <a name="products"></a>
            <h2 class="products-title">Продукция</h2>
            <div class="products-container">
                <product v-for="product in products" :product="product"></product>
            </div>
        </div>
        <the-we-work></the-we-work>
        <the-payment-method></the-payment-method>

    </div>
</template>

<script>
    import Product from './Product.vue';
    import TheWeWork from './TheWeWork.vue';
    import ThePaymentMethod from './ThePaymentMethod.vue';


    export default {
        name: 'the-wrapper',
        components: {Product,TheWeWork,ThePaymentMethod},
        computed: {
            products() {
                return this.$store.state.productList;
            }
        },
        methods: {
            openModalWindow(name) {
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setCurrentModalForm', name);
            }
        }
    }
</script>

<style lang="scss">
    @import "../assets/varible";
    .middle-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        max-width: $max-width;
        width: 100%;
        height: 109px;
        position: relative;
        margin: 0 auto;
        .cup-wrap {
            position: absolute;
            bottom: -145px;
            left: 35px;
        }
        .button {
            align-self: flex-end;
            margin-right: 92px;
        }
    }
    .products-wrapper {
        background: url('../assets/img/big_chemistry_bg.png') no-repeat;
        padding-top: 240px;
        width: 100%;
    }

    .products-title {
        text-align: center;
        color: #cb2026;
        font-family: Comfortaa,sans-serif;
        font-size: 40px;
        font-weight: 400;
        text-transform: uppercase;
        margin-bottom: 70px;
    }

    .products-container {
        max-width: $max-width;
        display: flex;
        flex-flow: row wrap;
        margin: 0 auto;
        .product {
            margin: 0 28px 28px 0;
            &:nth-child(4n){
                margin-right: 0;
            }
        }
    }
</style>