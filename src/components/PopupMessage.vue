<template>
    <div class="popup-window">
        <div class="title-wrap">

            <div class="close-form" @click="closeForm()">
                <img src="@/assets/img/icon/close_form.png">
            </div>
        </div>
        <div class="msg">
            {{showMsg}}
        </div>
    </div>
</template>

<script>
    export default {
        name: 'popup-message',
        computed: {
            showMsg() {
                return this.$store.state.popupMsg;
            }
        },
        methods: {
            closeForm() {
                this.$store.dispatch('showModalWindow', false);
            }
        }
    }
</script>

<style scoped>
    .title-wrap {
        display: flex;
        width: 100%;
        height: 72px;
        position: relative;
        background-color: #333333;
        flex-direction: row;
        justify-content: center;
    }

    .title {
        font-family: Roboto, sans-serif;
        font-size: 27px;
        color: #ffffff;
        align-self: center;
    }

    .close-form {
        position: absolute;
        top: 8px;
        right: 8px;
        cursor: pointer;
    }
    .msg {
        width: 275px;
        margin: 0 auto;
        padding-top: 22px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-size: 16px;
        font-weight: 500;
        text-align: center;
    }
</style>