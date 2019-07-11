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

    .logo-text-container {
        font-family: 'Comfortaa', sans-serif;
        color: #333333;
        margin-left: 22px;
        font-size: 20px;
        letter-spacing: -0.29px;
    }

    .logo-text:first-child {
        font-size: 40px;
    }

    .white-text {
        .logo-text-container {
            color: #ffffff;
        }
    }

</style>