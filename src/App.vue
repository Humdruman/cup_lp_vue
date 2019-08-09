<template>
    <div id="app">
        <transition name="popup">
            <popup-table v-if="isShowPopupTable"></popup-table>
        </transition>
        <transition name="popup">
            <the-popup-window v-show="isShowPopup"></the-popup-window>
        </transition>

        <the-header></the-header>
        <the-wrapper></the-wrapper>
        <the-footer></the-footer>

    </div>
</template>

<script>
    import './assets/fonts.scss';
    import './assets/bootstrap.min.css';
    import ThePopupWindow from './components/ThePopupWindow.vue';
    import TheHeader from './components/TheHeader.vue';
    import TheWrapper from './components/TheWrapper.vue';
    import PopupTable from "./components/PopupTable.vue";
    import TheFooter from './components/TheFooter.vue';

    export default {
        name: 'app',
        components: {
            PopupTable,
            ThePopupWindow,
            TheHeader,
            TheWrapper,
            TheFooter
        },
        computed: {
            isShowPopup() {
                return this.$store.state.showModalWindow;
            },
            isShowPopupTable() {
                return this.$store.state.showPopupTable;
            }
        },
        mounted() {
            this.$store.dispatch('fetchProducts');
        }
    }
</script>

<style lang="scss">
    * {
        padding: 0;
        margin: 0;
        outline: none;
    }

    body {
        font-family: Roboto, sans-serif;
    }

    .popup-enter-active,
    .popup-leave-active {
        transition: opacity .5s;
    }

    .popup-enter, .popup-leave-to {
        opacity: 0;
    }
</style>
