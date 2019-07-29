<template>
    <header class="header">
        <div class="info-wrap">
            <the-header-logo></the-header-logo>
            <div class="contact-container">
                <div class="contact-description">
                    Кружки с вашей символикой
                </div>
                <a class="contact-number" href="tel:+7(495)199-56-14">
                    +7 (495) 199-56-14
                </a>
            </div>
        </div>
        <the-header-navigation></the-header-navigation>

    </header>
</template>


<script>
    import TheHeaderLogo from '@/components/TheHeaderLogo.vue';
    import TheHeaderNavigation from '@/components/TheHeaderNavigation.vue';

    export default  {
        name: 'the-header',
        components: {
            TheHeaderLogo,
            TheHeaderNavigation
        }
    }
</script>


<style lang="scss" scoped>
    @import "../assets/varible";
    .header {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    .info-wrap {
        width: 100%;
        max-width: $max-width;
        height: 112px;
        display: flex;
        padding: 22px 0;
        justify-content: space-between;
    }

    .contact-container {
        border-left: 1px solid #dedede;
        font-family: 'Roboto Medium', sans-serif;
        padding-left: 22px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .contact-description{
        color: #333333;
        font-size: 20px;
        letter-spacing: 0.4px;
    }

    .contact-number {
        color: #cb2026;
        font-family: 'Roboto Black', sans-serif;
        font-size: 32px;
        font-weight: 900;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>