<template>
    <div class="popup-window">
        <div class="title-wrap">
            <div class="title">
                Оформление заказа
            </div>
            <div class="close-form" @click="closeForm()">
                <img src="@/assets/img/icon/close_form.png">
            </div>
        </div>
        <div class="success-msg" v-show="isSuccess">
            {{successMessage}}
        </div>
        <div class="description-wrap" v-show="!isSuccess">
            <div class="description">
                {{description}}
            </div>
        </div>
        <form class="form" action="#" @submit.prevent="submit();" v-show="!isSuccess">
            <div class="field-container">
                <base-input-text placeholder="Иван Иванов" name="name"  required v-model="formData.name">Имя*</base-input-text>
                <base-input-text placeholder="Телефон" name="phone" required v-model="formData.phone">Телефон*</base-input-text>
                <base-input-text v-if="article" disabled :value="article">Артикул заполняется автоматически</base-input-text>
                <base-input-text v-else placeholder="Артикул"></base-input-text>
                <base-text-area placeholder="Введите здесь">Комментарий к заказу</base-text-area>
            </div>
            <base-button class="form__button"> </base-button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'the-popup-form-order',
        data() {
            return {
                isSuccess: false,
                successMessage: `В ближайшее время наш менеджер
                                свяжется с вами для уточнения
                                деталей заказа.`,
                formData: {
                    name: '',
                    phone: ''
                }
            }
        },
        computed: {
            description() {
                return this.$store.state.basket.description;
            },
            article(){
                return this.$store.state.basket.article;
            }
        },
        methods: {
            closeForm() {
                this.$store.dispatch('showModalWindow', false);
            },
            submit(e) {
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
    .description-wrap {
        width: 100%;
        display: flex;
        justify-content: center;
    }
    .description {
        margin-top: 22px;
        color: #333333;
        width: 274px;
        font-family: "Roboto Medium", sans-serif;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: 0.16px;
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