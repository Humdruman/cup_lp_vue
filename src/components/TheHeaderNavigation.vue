<template>
    <div class="navigation">
        <div class="container">
            <nav>
                <ul class="menu">
                    <li class="menu-item" v-for="link, index in links">
                        <a :href="link.anchor" class="menu-link">{{link.name}}</a>
                        <img v-if="!isLastLink(index)" class="menu-figure" src="@/assets/img/menu-figure.png">
                    </li>
                </ul>
            </nav>
            <div class="slogan">
                Ваш бренд
                в ваших
                руках
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'the-header-navigation',
        data() {
            return {
                links: [
                    {name: 'о нас', anchor: '#'},
                    {name: 'продукция', anchor: '#products'},
                    {name: 'как мы работаем', anchor: '#we-work'},
                    {name: 'оплата', anchor: '#pay'},
                    {name: 'контакты', anchor: '#contact'},
                ],
            }
        },
        methods: {
            isLastLink(index) {
                return (index === this.links.length - 1)
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../assets/varible";

    .navigation {
        width: 100%;
        height: 395px;
        background: #f3f3f3;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #ffffff;
    }

    .container {
        max-width: $max-width;
        margin: 0 auto;
        width: 100%;
        display: flex;
        height: 100%;
        box-sizing: border-box;
        justify-content: space-between;
        flex-direction: column;
        padding: 23px 0 33px 0;
    }

    .menu {
        display: flex;
        flex-direction: row;
    }

    .menu-item {
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    .menu-link {
        text-decoration: none;
        font-weight: 500;
        font-size: 20px;
        color: #333332;
        font-family: 'Roboto', sans-serif;
        &:hover {
            color: #cb2026;
        }
    }

    .slogan {
        font-family: 'Roboto Black', sans-serif;
        font-size: 65px;
        color: #333333;
        text-transform: uppercase;
        width: 377px;
        line-height: 72.99px;
        align-self: flex-end;
    }
</style>