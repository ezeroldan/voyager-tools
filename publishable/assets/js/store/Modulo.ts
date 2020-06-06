import { Module, MutationTree, GetterTree, ActionTree } from "vuex";
import { iRootState, iModuloState } from '../interfaces';

const state: iModuloState = {
};

const mutations: MutationTree<iModuloState> = {
};

const getters: GetterTree<iModuloState, iRootState> = {
};

const actions: ActionTree<iModuloState, iRootState> = {
};

const modulo: Module<iModuloState, iRootState> = {
    state,
    actions,
    getters,
    mutations
};

export default modulo;