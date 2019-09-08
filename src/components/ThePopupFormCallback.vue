<template>
    <div class="popup-window">
        <div class="title-wrap">
            <div class="title">
                Обратный звонок
            </div>
            <div class="close-form" @click="closeForm()">
                <img src="@/assets/img/icon/close_form.png">
            </div>
        </div>
        <div class="success-msg" v-show="isSuccess">
            {{successMessage}}
        </div>
        <form class="form" action="#" @submit="submit" v-show="!isSuccess">
            <div class="field-container">
                <base-input-text placeholder="Иван Иванов" name="feedback_name"  required v-model="formData.name">Имя*</base-input-text>
                <base-input-text placeholder="Телефон" name="feedback_phone" required v-model="formData.phone">Телефон*</base-input-text>
            </div>
            <base-button class="form__button"> </base-button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'the-popup-form-callback',
        data() {
            return {
                isSuccess: false,
                successMessage: 'В ближайшее время наш менеджер' +
                '        свяжется с вами для уточнения' +
                '        деталей заказа.',
                formData: {
                    name: '',
                    phone: ''
                }
            }
        },
        methods: {
            closeForm() {
                this.$store.dispatch('showModalWindow', false);
            },
            submit(e) {
                e.preventDefault();
                let form = e.target;
                this.$store.dispatch('sendFeedBackForm', new FormData(form));
                this.isSuccess = true;
            }
        }

    }
</script>

<style lang="scss" scoped>
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
    .success-msg {
        width: 275px;
        margin: 0 auto;
        padding-top: 22px;
        color: #333333;
        font-family: Roboto, sans-serif;
        font-size: 16px;
        font-weight: 500;
        text-align: center;
    }
    .form {
        display: flex;
        flex-direction: column;
        padding: 23px 28px 28px 28px;
        &__button {
            margin-top: 5px;
            align-self: center;
            width: 167px;
        }
    }
    .field-container {
        display: flex;
        flex-direction: column;
    }

</style>