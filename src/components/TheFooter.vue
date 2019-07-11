<template>
    <footer class="footer">
        <div class="container">
            <the-header-logo class="white-text"></the-header-logo>
            <div class="contact-container">
                <a name="contact"></a>
                <div class="address">
                    Адрес: г. Москва, ул. Флотская, д. 5, корп. А
                </div>
                <a href="mailto:Cups@laboprint.ru" class="mail">E-mail: Cups@laboprint.ru</a>
                <a href='tel:+74951995614'class="number">+7 (495) 199-56-14</a>
                <base-button @click="openCallbackForm();">заказать звонок</base-button>
            </div>
            <img class="cup" src="@/assets/img/cup-footer.svg">
        </div>
    </footer>
</template>

<script>
    import TheHeaderLogo from './TheHeaderLogo.vue';
    export default {
        name: 'the-footer',
        components: {TheHeaderLogo},
        methods: {
            openCallbackForm() {
                this.$store.dispatch('showModalWindow', true);
                this.$store.dispatch('setCurrentModalForm', 'callback');
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import "../assets/varible";
    .footer {
        background-color: #333333;
        width: 100%;
        height: 452px;
        padding-top: 40px;
    }
    .container {
        max-width: $max-width;
        position: relative;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        color: #ffffff;
        .mail, .number, .address {

        }
    }
    .contact-container {
        width: 545px;
        margin: 52px 0 0 42px;
        display: flex;
        flex-direction: column;
        color: #ffffff;
        font-size: 20px;
        a {
            color: #ffffff;
            text-decoration: none;
        }
        .number {
            margin: 20px 0 40px 0;
            font-size: 32px;
            text-transform: uppercase;
        }
    }
    .cup {
        position: absolute;
        top: -220px;
        right: 0;
        width: 556px;
        height: 547px;
    }

</style>