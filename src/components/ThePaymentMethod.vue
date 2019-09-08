<template>
   <div class="layout">
       <div class="container-pay">
           <a name="pay"></a>
           <h2 class="h2">
               Способы оплаты
           </h2>
           <div class="wrapper">
               <div class="payment-container">
                   <img src="@/assets/img/payment-1.png">
                   <div class="text">Безналичный
                       расчёт</div>
               </div>
               <div class="middle-container">
                   Без НДС
               </div>
               <div class="payment-container">
                   <img src="@/assets/img/payment-2.png">
                   <div class="text">Сбербанк Онлайн</div>
               </div>

           </div>
           <div class="arrow" @click="scroll()">
               <img src="@/assets/img/icon/arrow-top.png">
           </div>
       </div>
       <img src="@/assets/img/payment-bg.png" class="bg">
   </div>
</template>

<script>
    export default {
        name: 'the-payment-method',
        methods: {
            scroll() {
                window.scrollTo(0,0)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../assets/varible";
    .layout {
        padding-top: 37.5px;
        height: 551.25px;
        position: relative;
    }
    .text {
        text-align: center;
    }
    .bg {
        bottom: 0;
        width: 100%;
        position: absolute;
    }
    .h2 {
        color: #cb2026;
        text-align: center;
        font-family: Comfortaa, sans-serif;
        font-size: 30px;
        font-weight: 400;
        line-height: 51px;
        text-transform: uppercase;
        letter-spacing: 0.4px
    }
    .container-pay {
        max-width: $max-width;
        display: flex;
        height: 100%;
        position: relative;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;

    }
    .payment-container {
        width: 124.5px;
        img {
            width: 124.5px;
            height: 124.5px;
        }
    }
    .wrapper{
        display: flex;
        flex-direction: row;
        height: 163.5px;
        width: 563.25px;
        position: relative;
        z-index: 1;
    }
    .middle-container {
        text-align: center;
        height: 55.5px;
        align-self: flex-start;
        width: 319.5px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding-bottom: 0.75px;
        box-sizing: border-box;
        border-bottom: 3.75px solid #333333;
        font-weight: 500;
        font-family: Roboto, sans-serif;
        color: #333332;
        font-size: 15px;
    }
    .arrow {
        position: absolute;
        bottom: 27.75px;
        cursor: pointer;
        left: 0;
        z-index: 10;
        width: 69px;
        height: 30px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #cb2026;
    }
</style>