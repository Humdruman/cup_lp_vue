<template>
    <div class="popup-table">
        <div class="container">
            <div class="current-product-wrap">
                <product-in-table :product="currentProduct"></product-in-table>
            </div>
            <div class="container table">
                <div class="row title">
                    <div class="col-4 d-flex align-items-center">
                        Наименование
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        Цена за штуку, руб.
                    </div>
                </div>
                <div class="row title">
                    <div class="col-4 d-flex align-items-center">
                        Колличество, шт.
                    </div>
                    <div class="row col-8 d-flex align-items-center font-weight-bold">
                        <div class="col-2">от 30</div>
                        <div class="col-2">от 50</div>
                        <div class="col-2">от 100</div>
                        <div class="col-2">от 200</div>
                        <div class="col-2">от 300</div>
                        <div class="col-2">от 500</div>
                    </div>
                </div>
                <div class="row product" v-for="product in  products" :class="{current: isCurrent(product)}">
                    <div class="col-4 d-flex align-items-center" @click="setCurrentProduct(product)">
                        {{product.description}}
                    </div>
                    <div class="row col-8 d-flex align-items-center ">
                        <div class="col-2 ">{{product.price}}</div>
                        <div class="col-2">{{product.price}}</div>
                        <div class="col-2">{{product.price}}</div>
                        <div class="col-2">{{product.price}}</div>
                        <div class="col-2">{{product.price}}</div>
                        <div class="col-2">{{product.price}}</div>
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
        width: 90%;
        position: fixed;
        margin: 0 auto;
        z-index: 10;
        height: 1200px;
        background-color: white;
    }

    .container {
        padding: 18.75px;
        max-width: $max-width;
        margin: 0 auto;
    }

    .table {
        margin-top: 33.75px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-weight: 400;
        font-size: 12.25px;
        .row.font-weight-bold {
            color: #333333;
            font-family: "Roboto Black", sans-serif;
        }
        .row.current {
            color: #cb2026;
            font-weight: bold;
            cursor: default;
        }
        .row:not(.title){
            cursor: pointer;
        }
        & > .row {
            height: 51px;
            border-bottom: 1px solid #7a7a7a;
            & > div:first-child {
                border-right: 1px solid #7a7a7a;;
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

        .row.title {
            background-color: #eaeaea;
        }
        .cl-2 {

        }
        .row-level-2 {

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
