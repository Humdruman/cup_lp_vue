<template>
    <div class="logo-container">
        <img class="logo" src="@/assets/img/icon/logo.png">
        <div class="logo-text-container">
            <div class="logo-text">
                Лаборатория печати
            </div>
            <div class="logo-text">
                удобная типография
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'the-header-logo'
    }
</script>

<style lang="scss" scoped>
    .logo-container {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .logo {
        width: 71.25px;
        height: 67.5px;
    }

    .logo-text-container {
        font-family: 'Comfortaa', sans-serif;
        color: #333333;
        margin-left: 22px;
        font-size: 0.93rem;
        letter-spacing: -0.29px;
    }

    .logo-text:first-child {
        font-size: 1.9rem;
    }

    .white-text {
        .logo-text-container {
            color: #ffffff;
        }
    }

</style>