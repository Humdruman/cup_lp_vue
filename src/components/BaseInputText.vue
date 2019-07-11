<template>
    <div class="container">
        <span class="field-description">
            <slot></slot>
        </span>
        <input class="input" :value='value' name="name" v-bind="$attrs" v-on="inputListeners">
    </div>
</template>

<script>
    export default {
        inheritAttrs: false,
        name: 'base-input-text',
        props: [
            'value'
        ],
        computed: {
            inputListeners () {
                const vm = this;

                return Object.assign(
                    {},
                    this.$listeners,
                    {
                        input: function (event) {
                            vm.$emit('input', event.target.value);
                        }
                    }
                );
            }
        }
    }
</script>

<style scoped>

    .container {
        display: flex;
        flex-direction: column;
    }
    .field-description {
        opacity: 0.7;
        font-size: 16px;
        color: #333333;
        margin-bottom: 5px;
    }

    .input {
        box-sizing: border-box;
        border-radius: 15px;
        border: 1px solid rgba(51, 51, 51, 0.5);
        box-shadow: inset 0 1px 1px rgba(11, 12, 12, 0.27);
        height: 30px;
        width: 305px;
        font-size: 16px;
        padding-left: 15px;
        margin-bottom: 23px;
        color: #a0a0a0;
    }
</style>