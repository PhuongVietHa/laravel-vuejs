import axios from "axios";

export default {
    namespaced: true,
    state: {
        counter: 0,
        colorCode: "red",
    },
    // commit a mutation from input state props
    mutations: {
        decreaseCounter(state, randomNumber) {
            state.counter -= randomNumber;
        },
        increaseCounter(state, randomNumber) {
            state.counter += randomNumber;
        },
        setColorCode(state, newValue) {
            state.colorCode = newValue;
        },
    },
    // async dispatch and commit a mutation
    actions: {
        decreaseCounter({ commit }) {
            axios(
                "https://www.random.org/integers/?num=1&min=1&max=6&col=1&base=10&format=plain&rnd=new"
            ).then((response) => {
                commit("decreaseCounter", response.data);
            });
        },
        increaseCounter({ commit }) {
            axios(
                "https://www.random.org/integers/?num=1&min=1&max=6&col=1&base=10&format=plain&rnd=new"
            ).then((response) => {
                commit("increaseCounter", response.data);
            });
        },
        // setColorCode({ commit }, newValue) {
        //     commit("setColorCode", newValue);
        // },
    },
    getters: {
        counter: state => state.counter,
        colorCode: state => state.colorCode,
        counterSquared(state) {
            return state.counter * state.counter;
        },
    },
};
