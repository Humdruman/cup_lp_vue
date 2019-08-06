<template>
    <div class="layout">
        <div class="container-work">
            <a name="we-work"></a>
            <h2 class="h2">Как мы работаем</h2>
            <div class="circles-wrapper">
                <div class="circle-container" data-index="1">
                    <div class="circle" @click="openCallbackForm()">
                        <img src="@/assets/img/circle1.svg">
                    </div>
                    <div class="number">1</div>
                    <div class="text">
                        <span class="bold">Оставьте заявку</span><br>
                        и получите расчёт стоимости
                        в ближайшее время.
                    </div>
                </div>
                <img src="@/assets/img/arrow-1.png" class="arrow arrow-1">
                <div class="circle-container" data-index="2">
                    <div class="circle" @click="openPopupMessage(0)">
                        <img src="@/assets/img/circle2.svg">
                    </div>
                    <div class="text-column">
                        <div class="number">2</div>
                        <div class="text">
                            Внесите предоплату
                            в размере 50% от суммы
                            заказа безналичным
                            расчётоми через
                            приложение Сбербанк Онлайн.
                            Работаем без НДС.
                        </div>
                        <div class="arrow-container">
                            <img src="@/assets/img/arrow-2.png" class="arrow arrow-2">
                            <img src="@/assets/img/arrow-3.png" class="arrow arrow-3">
                        </div>
                    </div>
                </div>
                <div class="circle-container" data-index="3">
                    <div class="circle" @click="openOrderForm();">
                        <img src="@/assets/img/circle3.svg">
                    </div>
                    <div class="number">3</div>
                    <div class="text">
                        <span class="bold">Услуги дизайнера.</span>На тот случай,
                        если Вы не знаете что нанести
                        на кружку и наоборот, если точно
                        знаете что хотите, но необходима
                        помощь в реализации.
                    </div>
                    <div class="arrow-container">
                        <img src="@/assets/img/arrow-4.png" class="arrow arrow-4">
                    </div>
                </div>
                <div class="circle-container" data-index="4">
                    <div class="circle" @click="openPopupMessage(1)">
                        <img src="@/assets/img/circle4.svg">
                    </div>
                    <div class="number">4</div>
                    <div class="text">
                        <span class="bold">В среднем</span> для изготовления
                        заказа нам требуется 3 дня.
                        Мы можем уменьшить
                        или увеличить сроки исполнения,
                        как только узнаем объём
                        Вашего заказа.
                    </div>
                    <div class="arrow-container">
                        <img src="@/assets/img/arrow-5.png" class="arrow arrow-5">
                    </div>
                </div>
                <div class="circle-container" data-index="5">
                    <div class="circle" @click="openPopupMessage(2);">
                        <img src="@/assets/img/circle5.svg">
                    </div>
                    <div class="number">5</div>
                    <div class="text">
                        <span class="bold">Внесите оставшиеся</span>
                        50% от суммы заказа
                        безналичным расчётом
                        и через приложение
                        Сбербанк Онлайн.
                        Работаем без НДС.
                    </div>
                    <div class="arrow-container">
                        <img src="@/assets/img/arrow-6.png" class="arrow arrow-6">
                    </div>
                </div>
                <div class="circle-container" data-index="6">
                    <div class="circle" @click="openPopupMessage(3)">
                        <img src="@/assets/img/circle6.svg">
                    </div>
                    <div class="number">6</div>
                    <div class="text">
                        <span class="bold">Доставка до дверей!</span>
                        Доставка производится
                        до транспортной
                        компании (точки выдачи)
                        СДЭК и IML по Москве
                        и Московской области.
                        В остальных случаях
                        доставка рассчитывается
                        индивидуально.
                        При заказе от 300 штук
                        доставка бесплатна!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'the-we-work',
        data() {
            return {
                popupMsg: [
                    `Изготовление нашей продукции – процесс трудоёмкий и связан с производственными затратами.
                    Предоплата является подтверждением того, что Вы не откажетесь от проделанной нами работы,
                    а мы, в свою очередь, берём на себя обязательства по выполнению Вашего заказа качественно
                    и в срок`,
                    `Планируемые сроки изготовления и доставки Вам сообщит менеджер при оформлении заказа`,
                    `Как договаривались`,
                    `Ну да, это же удобно`
                ]
            }
        },
        methods: {
            openCallbackForm() {
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setCurrentModalForm', 'callback');
            },
            openOrderForm() {
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setCurrentModalForm', 'order');
            },
            openPopupMessage(numberMsg) {
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setPopupMessage', this.popupMsg[numberMsg]);
                this.$store.dispatch('setCurrentModalForm', 'popup-message');
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../assets/varible";

    .layout {
        background-color: #f5f5f5;
        height: 1443px;
    }

    .container-work {
        margin: 0 auto;
        padding-top: 33.75px;
        width: $max-width;
    }

    .h2 {
        color: #cb2026;
        text-align: center;
        font-family: Comfortaa, sans-serif;
        font-size: 30px;
        font-weight: 400;
        line-height: 51px;
        text-transform: uppercase;
        letter-spacing: 0.4px;
    }

    .circles-wrapper {
        margin-top: 84.75px;
        width: 100%;
        position: relative;
    }

    .circle {
        width: 124.5px;
        height: 124.5px;
        cursor: pointer;
    }

    .number {
        font-family: Comfortaa, sans-serif;
        font-size: 45px;
        font-weight: 400;
        color: #333333;
    }

    .text {
        font-family: "Roboto", sans-serif;
        text-align: center;
        font-size: 15px;
        color: #333333;
        font-weight: 400;
        .bold {
            font-family: "Roboto Medium", sans-serif;
            font-weight: 400;
        }
    }

    .circle-container {
        &[data-index~='1'] {
            display: flex;
            align-items: center;
            flex-direction: column;
            width: 205.5px;
            .number {
                margin: 13.5px 0;
            }
        }
        &[data-index~='2'] {
            display: flex;
            width: 346.5px;
            position: absolute;
            right: 37.5px;
            top: 90px;
            flex-direction: row;
            .text-column {
                display: flex;
                flex-direction: column;
                .number {
                    align-self: center;
                }
            }
            .text {
                width: 218.25px;
            }
            .arrow-container {
                position: relative;
            }
        }
        &[data-index~='3'] {
            display: flex;
            width: 266.25px;
            position: absolute;
            right: 487.5px;
            top: 296.25px;
            flex-direction: column;
            align-items: center;
            .number {
                margin: 13.5px 0;
            }
            .arrow-container {
                position: relative;
            }
        }
        &[data-index~='4'] {
            display: flex;
            width: 236.25px;
            position: absolute;
            right: 105px;
            top: 371.25px;
            flex-direction: column;
            align-items: center;
            .number {
                margin: 13.5px 0;
            }
            .arrow-container {
                position: relative;
            }
        }
        &[data-index~='5'] {
            display: flex;
            width: 172.5px;
            position: absolute;
            left: 123.75px;
            top: 648.75px;
            flex-direction: column;
            align-items: center;
            .number {
                margin-top: 13.5px;
            }
            .arrow-container {
                position: relative;
            }
        }
        &[data-index~='6'] {
            display: flex;
            width: 172.5px;
            position: absolute;
            right: 195px;
            top: 765px;
            flex-direction: column;
            align-items: center;
            .number {
                margin-top: 13.5px;
            }
            .arrow-container {
                position: relative;
            }
        }
    }

    .arrow {
        position: absolute;
    }

    .arrow-1 {
        top: 63.75px;
        left: 161.25px;
        width: 300px;
        height: 82.5px;
    }

    .arrow-2 {
        top: -52.5px;
        left: -288.75px;
        width: 175.5px;
        height: 127.5px;
    }

    .arrow-3 {
        top: -21px;
        right: 210px;
        width: 60.75px;
        height: 131.25px;
    }

    .arrow-4 {
        top: -247.5px;
        left: 75px;
        width: 221.25px;
        height: 72px;
    }

    .arrow-5 {
        top: -210px;
        left: -360px;
        width: 314.25px;
        height: 199.5px;
    }

    .arrow-6 {
        top: -210px;
        left: 51.75px;
        width: 227.25px;
        height: 101.25px;
    }

</style>