<template>
    <button class="button" v-on="$listeners">
      <slot>Отправить</slot>
    </button>
</template>

<script>
    export default {
        name: 'base-button',
    }
</script>

<style lang="scss">
    .button {
        width: 17.5rem;
        height: 40px;
        border-radius: 20px;
        font-family: Roboto, sans-serif;
        font-size: 0.875rem;
        line-height: 28.5px;
        text-align: center;
        border: none;
        outline: none;
        color: #ffffff;
        cursor: pointer;
        background-color: #cb2026;
        &:hover {
            box-shadow: 0 1px 1px rgba(1, 2, 2, 0.27);
        }
        &:active {
            box-shadow: inset 0 1px 1px rgba(11, 12, 12, 0.27);
        }
    }
</style>