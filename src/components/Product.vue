<template>
    <div class="product">
        <div class="image-wrapper" @click="showPopupTable()">
            <img class="image" :src="photo">
        </div>
        <div class="info-wrap">
            <div class="article-wrap">
                Артикул: {{product.article}}
            </div>
            <div class="description" @click="showPopupTable()">
                {{product.description}}
            </div>
            <div class="properties-container">
                <div class="properties-text" v-for="prop in product.props">
                  {{prop.name}}:{{prop.value}}
                </div>
                <div class="color-wrap" v-if="haveColors">
                    <div class="product__properties-color-title">
                        Цвета:
                    </div>
                    <div class="color-container">
                        <product-color v-for="color in product.colors"
                                       :setting="color"
                                       :product-index="product.index"
                                       :value="color.name"
                                       v-model="currentColor"></product-color>
                    </div>
                </div>
                <div class="price-wrap">
                    <span v-if="!isInputCalc()">
                         от {{price}} р./шт c печатью
                    </span>
                    <span v-else="">
                        от {{calcPrice}} р. за {{getCount}} шт.
                    </span>

                </div>
            </div>
            <div class="calc-price">
                <input type="text" class="calc-input" v-model="inputCount" placeholder="Введите колличество">
                <button class="calc-button" @click="setCount()">Расчет</button>
            </div>
            <base-button class="product__button" @click="formOrder()">Заказать</base-button>
        </div>
    </div>
</template>

<script>
    import ProductColor from './ProductColor.vue';

    export default {
        name: 'product',
        components: {ProductColor},
        data(){
          return {
              currentColor: this.product.baseColor || '',
              count: 1,
              inputCount: ''
          }
        },
        props: {
            product: {
                type: Object,
                required: true
            }
        },
        computed: {
            haveColors() {
                return Boolean(this.product.colors);
            },
            photo() {
                return this.product.photoPath;
            },
            calcPrice() {
                return this.product.price * this.count;
            },
            price() {
                return this.product.price;
            },
            getCount() {
                return this.product.count;
            }
        },
        methods: {
            setCount() {
                let input = this.inputCount;
                if(input > 99) {
                    input = 99;
                    this.inputCount = input;
                }else if(!input || isNaN(input)) {
                    input = 1;
                    this.inputCount = '';
                }

                this.count = input;
            },
            formOrder() {
                this.$store.state.basket = this.product;
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setCurrentModalForm', 'order');
            },
            showPopupTable(){
                this.$store.dispatch('showPopupTable', true);
                this.$store.dispatch('setCurrentProductTable', this.product);
            },
            isInputCalc() {
                return this.count > 1;
            }
        }
    }
</script>

<style lang="scss" scoped>
    .product {
        width: 12.375rem;
        height: 28.89rem;
        background-color: #ffffff;
        border: 1px solid #333333;
        box-shadow: 0 1px 1px rgba(1, 2, 2, 0.27);
        border-radius: 4px;
        .image {
            width: 196px;
            height: 196px;
        }
        .image-wrapper {
            width: 12.375rem;
            cursor: pointer;
            height: 12.37rem;
            border-bottom: 1px solid #858585;
        }
        .info-wrap {
            display: flex;
            position: relative;
            flex-direction: column;
            padding: 21.75px 0 0 16.5px;
        }
        .article-wrap {
            position: absolute;
            align-self: center;
            top: -9px;
            line-height: 15px;
            width: 7.8rem;
            font-family: Roboto, sans-serif;
            height: 0.9rem;
            border-radius: 10px;
            border: 1px solid #999999;
            color: #333333;
            font-size: 0.5rem;
            text-align: center;
            background-color: #ffffff;
        }

        .description {
            cursor: pointer;
            font-family: Roboto, sans-serif;
            font-size: 0.66rem;
            font-weight: bold;
            color: #333333;
        }

        .properties-container {
            position: relative;
            margin-top: 33.75px;
            font-size: 0.66rem;
            height: 85px;
            color: #333333;
            font-family: Roboto, sans-serif;
        }
        .color-container{
            display: flex;
            flex-direction: row;
            padding-top: 3.75px;
            .color {
                margin-right: 5.25px;
                &:last-child{
                    margin-right: 0;
                }
            }
        }
        .price-wrap {
            position: absolute;
            bottom: 0;
            font-size: 0.8rem;
            left: 8.25px;
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
            font-size: 0.5rem;
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
            font-size: 7.5px;
            cursor: pointer;
            border: none;
        }
        &__button {
            width: 150px;
            height: 30px;
            margin-top: 7.5px ;
        }
    }
</style>
