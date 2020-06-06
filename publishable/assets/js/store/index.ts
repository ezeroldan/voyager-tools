import Vue from 'vue';
import Vuex, { StoreOptions, GetterTree, MutationTree } from "vuex";
import { iRootState } from "../interfaces";
import modulo from './Modulo';

Vue.use(Vuex);

const state: iRootState = {
};

const getters: GetterTree<iRootState, iRootState> = {
};

const mutations: MutationTree<iRootState> = {
};

const store: StoreOptions<iRootState> = {
    modules: { modulo },
    state,
    getters,
    mutations
};

export default new Vuex.Store<iRootState>(store);