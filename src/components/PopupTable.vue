<template>
    <div class="popup-table">
        <div class="container">
            <div class="current-product-wrap">
                <product-in-table :product="currentProduct"></product-in-table>
            </div>
            <div class="table">
                <div class="row title">
                    <div class="cl cl-1">
                        Наименование
                    </div>
                    <div class="cl cl-2">
                        Цена за штуку, руб.
                    </div>
                </div>
                <div class="row title title-2">
                    <div class="cl cl-1">
                        Колличество, шт.
                    </div>
                    <div class="row-level-2 bold">
                        <div class="cl-level-2">от 30</div>
                        <div class="cl-level-2">от 50</div>
                        <div class="cl-level-2">от 100</div>
                        <div class="cl-level-2">от 200</div>
                        <div class="cl-level-2">от 300</div>
                        <div class="cl-level-2">от 500</div>
                    </div>
                </div>
                <div class="row product" v-for="product in  products" :class="{current: isCurrent(product)}">
                    <div class="cl cl-1" @click="setCurrentProduct(product)">
                        {{product.description}}
                    </div>
                    <div class="row-level-2">
                        <div class="cl-level-2">{{product.price}}</div>
                        <div class="cl-level-2">{{product.price}}</div>
                        <div class="cl-level-2">{{product.price}}</div>
                        <div class="cl-level-2">{{product.price}}</div>
                        <div class="cl-level-2">{{product.price}}</div>
                        <div class="cl-level-2">{{product.price}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductInTable from './ProductInTable.vue';

    export default {
        name: 'popup-table',
        components: {
            ProductInTable
        },
        mounted: () => {
            window.scrollTo(0, 0);
        },
        computed: {
            currentProduct() {
                return this.$store.state.currentTableProduct;
            },
            products() {
                return this.$store.state.productList;
            }
        },
        methods: {
            isCurrent(product) {
                return (this.$store.state.currentTableProduct === product);
            },
            setCurrentProduct(product){
                this.$store.dispatch('setCurrentProductTable', product);
            }
        }

    }
</script>

<style lang="scss" scoped>
    @import "../assets/varible";

    .popup-table {
        width: 100%;
        background: white;
        height: 1600px;
        background: url('../assets/img/big_chemistry_bg.png') no-repeat;
    }

    .container {
        padding: 25px;
        max-width: $max-width;
        margin: 0 auto;
    }

    .table {
        margin-top: 60px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-weight: 400;
        font-size: 15px;
        .row {
            display: flex;
            flex-direction: row;
            height: 68px;
            border-bottom: 1px solid #7a7a7a;
            &.current {
                .cl-1 {
                    color: #cb2026;
                    font-weight: bold;
                    cursor: default;
                }
            }
        }

        .product {
            &.row{
                background: white;
            }
            .cl-1 {
                cursor: pointer;
            }
        }

        .cl {
            padding-left: 35px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .cl-1 {
            border-right: 1px solid #7a7a7a;
            width: 345px;
        }
        .row.title {
            background-color: #eaeaea;
        }
        .cl-2 {

        }
        .row-level-2 {
            &.bold {
                color: #333333;
                font-family: "Roboto Black", sans-serif;
            }
            padding-left: 35px;
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .cl-level-2 {
            margin-left: 73px;
            width: 55px;
            &:first-child {
                margin-left: 0;
            }
        }
    }
</style>