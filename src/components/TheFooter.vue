<template>
    <footer class="footer">
        <div class="container-footer">
            <the-header-logo class="white-text"></the-header-logo>
            <div class="contact-container">
                <a name="contact"></a>
                <div class="address">
                    Адрес: г. Москва, ул. Флотская, д. 5, корп. А
                </div>
                <a href="mailto:Cups@laboprint.ru" class="mail">e-mail: cups@laboprint.ru</a>
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
        height: 339px;
        padding-top: 40px;
    }
    .container-footer {
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
        width: 408.75px;
        margin: 39px 0 0 31.5px;
        display: flex;
        flex-direction: column;
        color: #ffffff;
        font-size: 15px;
        a {
            color: #ffffff;
            text-decoration: none;
        }
        .number {
            margin: 15px 0 30px 0;
            font-size: 24px;
            text-transform: uppercase;
        }
    }
    .cup {
        position: absolute;
        top: -165px;
        right: 0;
        width: 417px;
        height: 410.25px;
    }

</style>