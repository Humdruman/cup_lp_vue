import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';
import products from './products.json';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        baseUrl: 'http://localhost:8080/wp-json/',
        authData: {
          user: 'admin',
          password: '309854'
        },
        showModalWindow: false,
        showPopupTable: false,
        currentModalForm: '',
        currentTableProduct: {},
        productList: [],
        count: 1,
        basket: {
        },
        popupMsg: '',
        totalPrice: 0
    },
    mutations: {
        SHOW_MODAL_WINDOW(state, isShow) {
            state.showModalWindow = isShow;
        },
        SHOW_POPUP_TABLE(state, isShow) {
            state.showPopupTable = isShow;
        },
        SET_CURRENT_MODAL_FORM(state, modalFormName) {

            if (modalFormName === 'callback' || modalFormName === 'order') {
                modalFormName = 'the-popup-form-' + modalFormName;
            }
            state.currentModalForm = modalFormName;
        },
        SET_CURRENT_TABLE_PRODUCT(state, product) {
            state.currentTableProduct = product;
        },
        FETCH_PRODUCTS(state) {
            products.items.forEach((item, index) => {
                item.index = index;
                state.productList.push(item);
            });
            state.currentTableProduct = state.productList[0];
        },
        UPDATE_PRODUCT_PHOTO(state, setting) {
            state.productList[setting.index].photoPath = setting.path;
            state.productList[setting.index].baseColor = setting.name;
        },
        SET_POPUP_MESSAGE(state, msg) {
            state.popupMsg = msg;
        }
    },
    actions: {
        showModalWindow({commit}, isVisible) {
            commit('SHOW_MODAL_WINDOW', isVisible);
        },

        showPopupTable({commit}, isVisible) {
            commit('SHOW_POPUP_TABLE', isVisible);
        },

        setCurrentModalForm({commit}, modalFormName) {
            commit('SET_CURRENT_MODAL_FORM', modalFormName);
        },

        setCurrentProductTable({commit}, product) {
            commit('SET_CURRENT_TABLE_PRODUCT', product)
        },

        fetchProducts({commit}) {
            commit('FETCH_PRODUCTS');
        },

        updateProductPhoto({commit}, setting) {
            commit('UPDATE_PRODUCT_PHOTO', setting);
        },

        setPopupMessage({commit}, msg) {
            commit('SET_POPUP_MESSAGE', msg);
        },
        sendFeedBackForm({state}, request) {
            console.log(request);
            axios({
                method: 'post',
                baseURL: state.baseUrl,
                url: 'feedback/v1/add',
                data: request,
                auth: {
                    username: state.authData.user,
                    password: state.authData.password
                }
            }).then((resp) => {
                console.log(resp)
            }).catch((err) => {
                console.error(err);
            })

        }
    }
})
