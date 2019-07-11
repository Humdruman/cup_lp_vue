<template>
   <div class="layout">
       <div class="container">
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
                   <div class="text">Безналичный
                       расчёт</div>
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
        padding-top: 50px;
        height: 735px;
        position: relative;
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
        font-size: 40px;
        font-weight: 400;
        line-height: 68px;
        text-transform: uppercase;
        letter-spacing: 0.4px
    }
    .container {
        max-width: $max-width;
        display: flex;
        height: 100%;
        position: relative;
        flex-direction: column;
        align-items: center;
        margin: 0 auto;
    }
    .wrapper{
        display: flex;
        flex-direction: row;
        height: 218px;
        width: 751px;
        position: relative;
        z-index: 1;
    }
    .middle-container {
        text-align: center;
        height: 74px;
        align-self: flex-start;
        width: 426px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding-bottom: 10px;
        box-sizing: border-box;
        border-bottom: 5px solid #333333;
        font-weight: 500;
        font-family: Roboto, sans-serif;
        color: #333332;
        font-size: 20px;
    }
    .arrow {
        position: absolute;
        bottom: 37px;
        cursor: pointer;
        left: 0;
        z-index: 10;
        width: 92px;
        height: 40px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #cb2026;
    }
</style>