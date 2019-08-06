<template>
    <div class="product">
        <div class="photo-wrap">
            <img :src="product.photoPath" class="photo">
            <div class="article">{{product.article}}</div>
        </div>
        <div class="info-wrap">
            <img class="close" src="@/assets/img/icon/close-table.png" @click="closeTable();">
            <div class="description">
                {{product.description}}
            </div>
            <div class="props-container">
                <div class="prop" v-for="prop in product.props">
                    {{prop.name}}: {{prop.value}}
                </div>
            </div>
            <div class="color-wrap" v-if="haveColors">
                <div class="color-title">
                    Цвета:
                </div>
                <div class="color-container">
                    <product-color v-for="color in product.colors"
                                   :setting="color"
                                   :product-index="product.index"
                                   :value="color.name"
                                   v-model="currentColor">

                    </product-color>
                </div>
            </div>
            <div class="price-wrap">
                <span v-if="!isInputCalc()">
                         от {{price}} р./шт c печатью
                    </span>
                <span v-else="">
                        от {{calcPrice}} р. за {{count}} шт.
                    </span>
            </div>
            <div class="calc-price">
                <input type="text" class="calc-input" v-model="inputCount" placeholder="Введите колличество">
                <button class="calc-button" @click="setCount()">Расчет</button>
            </div>
        </div>
    </div>
</template>

<script>
    import ProductColor from './ProductColor.vue';

    export default {
        name: 'product-in-table',
        components: {ProductColor},
        data() {
            return {
                currentColor: this.product.baseColor || '',
                count: 1,
                inputCount: ''
            }
        },
        props: {
            product: {
                type: Object
            }
        },
        methods: {
            closeTable() {
                this.$store.dispatch('showPopupTable', false);
                setTimeout(this.scroll, 1000);
            },
            setCount() {
                let input = this.inputCount;
                if (input > 99) {
                    input = 99;
                    this.inputCount = input;
                } else if (!input || isNaN(input)) {
                    input = 1;
                    this.inputCount = '';
                }

                this.count = input;
            },
            scroll() {
                document.querySelector('a[name~="products"]').scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                })
            },
            isInputCalc() {
                return this.count > 1;
            }
        },
        computed: {
            haveColors() {
                return Boolean(this.product.colors);
            },
            calcPrice() {
                return this.product.price * this.count;
            },
            price() {
                return this.product.price;
            },
            count() {
                return this.product.count;
            }
        },
        show: {
            inputCount(val) {
                console.log(val);
                if (+val === Nan) {
                    this.inputCount = '';
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .product {
        display: flex;
        flex-direction: row;
    }

    .photo-wrap {
        width: 426px;
        height: 393.75px;
        position: relative;
    }

    .photo {
        width: 100%;
        height: 100%;
    }

    .close {
        width: 12.75px;
        height: 12.75px;
        position: absolute;
        cursor: pointer;
        right: 0;
        top: 0;
    }

    .info-wrap {
        margin-left: 77.25px;
        display: flex;
        flex-direction: column;
        padding-top: 1.49px;
        position: relative;
    }

    .article {
        position: absolute;
        align-self: center;
        bottom: -9px;
        left: 35%;
        line-height: 15px;
        width: 125.25px;
        font-family: Roboto, sans-serif;
        height: 15px;
        border-radius: 10px;
        border: 1px solid #999999;
        color: #333333;
        font-size: 8.25px;
        text-align: center;
        background-color: #ffffff;
    }

    .description {
        font-size: 18px;
        padding-top: 20px;
        font-weight: 500;
        font-family: Roboto, sans-serif;
    }

    .props-container {
        margin-top: 52.5px;
        color: #333333;
        font-weight: 400;
    }

    .color-container {
        display: flex;
        flex-direction: row;
        padding-top: 35.25px;
        .color {
            margin-right: 5.25px;
            &:last-child {
                margin-right: 0;
            }
        }
    }

    .price-wrap {
        margin-top: 15px;
        color: #d4494e;
        font-family: Roboto Medium, sans-serif;
        font-weight: 500;
    }

    .calc-price {
        width: 151.5px;
        height: 24px;
        box-shadow: inset 0 1px 1px rgba(11, 12, 12, 0.27);
        border: 1px solid rgba(51, 51, 51, 0.5);
        border-radius: 15px;
        display: flex;
        box-sizing: border-box;
        flex-direction: row;
        margin-top: 18px;
        justify-content: flex-end;
    }

    .calc-input {
        align-self: center;
        height: 80%;
        border: none;
        width: 84px;
        font-size: 8.25px;
        font-family: Roboto, sans-serif;
        color: #333333;
    }

    .calc-button {
        margin-left: 11.25px;
        width: 37.5px;
        height: 22.5px;
        border-radius: 15px;
        background-color: #333333;
        font-family: 'Roboto Medium', sans-serif;
        color: #ffffff;
        font-size: 10px;
        cursor: pointer;
        border: none;
    }

</style>