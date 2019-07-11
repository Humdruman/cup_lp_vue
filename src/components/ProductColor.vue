<template>
    <label class="color">
        <input type="radio" :checked="shouldBeChecked"  @change="updateInput" class="color__input" v-bind="$attrs">
        <span class="color__button" :style="{backgroundColor: setting.color}"></span>
    </label>
</template>

<script>
    export default {
        name: "product-color",
        props: {
            setting: {
                type: Object,
                required: true
            },
            value: {
                type: String
            },
            modelValue: {
                default: ""
            },
            productIndex: {
                type: Number
            }
        },
        model: {
            prop: 'modelValue',
            event: 'change'
        },
        computed: {
            shouldBeChecked() {
                return this.modelValue === this.value;
            }
        },
        methods: {
            updateInput() {
                this.$emit('change', this.value);
                this.$store.dispatch('updateProductPhoto',{index: this.productIndex, path: this.setting.photo, name: this.value});
            }
        }
    }
</script>

<style lang="scss" scoped>
    .color {
        display: block;
        position: relative;
        width: 17px;
        height: 17px;
        &__input {
            position: absolute;
            cursor: pointer;
            z-index: 0;
            opacity: 0;
            &:checked + .color__button {
                border: 2px solid #333332;
            }
        }
        &__button {
            display: block;
            cursor: pointer;
            width: 100%;
            height: 100%;
            border-radius: 30px;
        }
    }
</style>