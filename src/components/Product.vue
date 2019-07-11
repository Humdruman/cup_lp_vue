<template>
    <div class="product">
        <div class="image-wrapper" @click="showPopupTable()">
            <img class="image" :src="photo">
        </div>
        <div class="info-wrap">
            <div class="article-wrap">
                Артикул: {{product.article}}
            </div>
            <div class="description">
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
                    от {{calcPrice}} р./шт c печатью
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
            }
        }
    }
</script>

<style lang="scss" scoped>
    .product {
        width: 264px;
        height: 595px;
        background-color: #ffffff;
        border: 1px solid #333333;
        box-shadow: 0 1px 1px rgba(1, 2, 2, 0.27);
        border-radius: 4px;
        .image {
            width: 264px;
            height: 264px;
        }
        .image-wrapper {
            width: 264px;
            cursor: pointer;
            height: 264px;
            border-bottom: 1px solid #858585;
        }
        .info-wrap {
            display: flex;
            position: relative;
            flex-direction: column;
            padding: 29px 0 0 22px;
        }
        .article-wrap {
            position: absolute;
            align-self: center;
            top: -12px;
            line-height: 20px;
            width: 167px;
            font-family: Roboto, sans-serif;
            height: 20px;
            border-radius: 10px;
            border: 1px solid #999999;
            color: #333333;
            font-size: 11px;
            text-align: center;
            background-color: #ffffff;
        }

        .description {
            font-family: Roboto, sans-serif;
            font-size: 14px;
            font-weight: bold;
            color: #333333;
        }

        .properties-container {
            position: relative;
            margin-top: 45px;
            font-size: 14px;
            height: 100px;
            color: #333333;
            font-family: Roboto, sans-serif;
        }
        .color-container{
            display: flex;
            flex-direction: row;
            padding-top: 5px;
            .color {
                margin-right: 7px;
                &:last-child{
                    margin-right: 0;
                }
            }
        }
        .price-wrap {
            position: absolute;
            bottom: 0;
            left: 11px;
            color: #d4494e;
            font-family: Roboto Medium, sans-serif;
            font-weight: 500;
        }
        .calc-price {
            width: 202px;
            height: 32px;
            box-shadow: inset 0 1px 1px rgba(11, 12, 12, 0.27);
            border: 1px solid rgba(51, 51, 51, 0.5);
            border-radius: 15px;
            display: flex;
            box-sizing: border-box;
            flex-direction: row;
            margin-top: 24px;
           justify-content: flex-end;
        }

        .calc-input {
            align-self: center;
            height: 80%;
            border: none;
            width: 112px;
            font-size: 11px;
            font-family: Roboto, sans-serif;
            color: #333333;
        }

        .calc-button {
            margin-left: 15px;
            width: 50px;
            height: 30px;
            border-radius: 15px;
            background-color: #333333;
            font-family: 'Roboto Medium', sans-serif;
            color: #ffffff;
            font-size: 10px;
            cursor: pointer;
            border: none;
        }
        &__button {
            width: 200px;
            height: 40px;
            margin-top: 10px ;
        }
    }
</style>