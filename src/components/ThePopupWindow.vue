<template>
    <div class="popup-bg">
        <div class="opacity-bg" @click="closePopup()"></div>
        <component :is="getCurrentModalForm()"></component>
    </div>
</template>

<script>
    import ThePopupFormCallback from './ThePopupFormCallback.vue';
    import ThePopupFormOrder from './ThePopupFormOrder.vue';
    import PopupMessage from './PopupMessage.vue'
    export default {
        components: {ThePopupFormCallback,ThePopupFormOrder,PopupMessage},
        name: 'the-popup-window',
        props: ['nameFormComponent'],
        methods: {
            closePopup() {
                this.$store.dispatch('showModalWindow', false);
            },
            getCurrentModalForm() {
                return this.$store.state.currentModalForm;
            }
        }

    }
</script>

<style lang="scss" scoped>
    .popup-bg {
        width: 100%;
        height: 100%;
        position: fixed;
        display: flex;
        z-index: 10;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .opacity-bg {
        width: 100%;
        height: 100%;
        position: fixed;
        background-color: #333333;
        opacity: 0.7;
        z-index: 10;
    }

    .popup-window {
        min-width: 361px;
        min-height: 209px;
        border-radius: 4px 4px 0 0;
        border: 1px solid #333332;
        background-color: #ffffff;
        position: fixed;
        margin: 0 auto;
        z-index: 15;
    }
</style>