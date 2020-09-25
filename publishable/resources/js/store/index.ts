import Vue from 'vue';
import Vuex, { StoreOptions, GetterTree, MutationTree } from "vuex";
import { iRootState } from "../interfaces";
import modulo from './Modulo';

Vue.use(Vuex);

const state: iRootState = {
    recaptchaToken: ''
};

const getters: GetterTree<iRootState, iRootState> = {
    getRecaptchaToken(state): string {
        return state.recaptchaToken;
    },
};

const mutations: MutationTree<iRootState> = {
    setRecaptchaToken(state, payload: string): void {
        state.recaptchaToken = payload;
    },
};

const store: StoreOptions<iRootState> = {
    modules: { modulo },
    state,
    getters,
    mutations
};

export default new Vuex.Store<iRootState>(store);