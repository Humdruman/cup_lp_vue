<template>
    <div class="product">
        <div class="photo-wrap">
            <img :src="product.photoPath" class="photo" >
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
                от {{calcPrice}} р./шт c печатью
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
        data(){
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
            closeTable(){
                this.$store.dispatch('showPopupTable', false);
            },
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
            }
        },
        computed: {
            haveColors() {
                return Boolean(this.product.colors);
            },
            calcPrice() {
                return this.product.price * this.count;
            }
        },
        show: {
            inputCount(val){
                console.log(val);
                if(+val === Nan){
                    this.inputCount = '';
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
    .product{
        display: flex;
        flex-direction: row;
    }
    .photo-wrap{
        width: 568px;
        height: 525px;
        position: relative;
    }
    .photo {
        width: 100%;
        height: 100%;
    }
    .close{
        width: 17px;
        height: 17px;
        position: absolute;
        cursor: pointer;
        right: 0;
        top: 0;
    }
    .info-wrap {
        margin-left: 103px;
        display: flex;
        flex-direction: column;
        padding-top: 149px;
        position: relative;
    }

    .article {
        position: absolute;
        align-self: center;
        bottom: -12px;
        left: 35%;
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
        font-size: 24px;
        font-weight: 500;
        font-family: Roboto, sans-serif;
    }
    .props-container{
        margin-top: 70px;
        color: #333333;
        font-weight: 400;
    }
    .color-container{
        display: flex;
        flex-direction: row;
        padding-top: 47px;
        .color {
            margin-right: 7px;
            &:last-child{
                margin-right: 0;
            }
        }
    }
    .price-wrap {
        margin-top: 20px;
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

</style>