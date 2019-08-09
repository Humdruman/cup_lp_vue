<template>
    <div class="wrapper">
        <div class="middle-wrapper">
            <div class="cup-wrap">
                <img src="@/assets/img/cup.svg" class="cup">
            </div>
            <div class="callback-container">
                <div class="slogan">
                    Ваш бренд
                    в ваших
                    руках
                </div>
                <base-button @click.native="openModalWindow('callback')">заказать звонок</base-button>
            </div>

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
        components: {Product, TheWeWork, ThePaymentMethod},
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
            bottom: 0;
            left: 0;
        }

        .cup {
            width: 24.3rem;
            height: 28.17rem;
        }

        .callback-container {
            position: absolute;
            right: 0;
            bottom: 50%;
            height: 270px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

        }
    }

    .products-wrapper {
        background: url('../assets/img/big_chemistry_bg.png') no-repeat;
        padding-top: 180px;
        width: 100%;
    }

    .products-title {
        text-align: center;
        color: #cb2026;
        font-family: Comfortaa, sans-serif;
        font-size: 1.875rem;
        font-weight: 400;
        text-transform: uppercase;
        margin-bottom: 3.28rem;
    }

    .products-container {
        max-width: $max-width;
        display: flex;
        flex-flow: row wrap;
        margin: 0 auto;

        .product {
            margin: 0 21px 21px 0;

            &:nth-child(4n) {
                margin-right: 0;
            }
        }
    }

    .slogan {
        font-family: 'Roboto Black', sans-serif;
        font-size: 3rem;
        color: #333333;
        text-transform: uppercase;
        width: 377px;
        line-height: 72.99px;
    }
</style>
