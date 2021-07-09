export default {
    namespaced: true,
    state: {
        all: []
    },
    // commit a mutation from input state props
    mutations: {
        setReservation(state, reserves) {
            state.all = reserves
        },
        deleteReserve(state, id) {
            let reserves = state.all;
            let index = _.findIndex(reserves, {'id': id});

            if (index === -1) {
                return;
            }

            reserves.splice(index, 1);

            state.all = reserves;
        },
        updateReserve(state, param) {
            let reserves = state.all;
            let index = _.findIndex(reserves, {'id': param.id});

            if (index === -1) {
                return;
            }

            for (var key in param.data) {
                reserves[index][key] = param.data[key];
            }

            state.all = reserves;
        }
    },
    // async dispatch and commit a mutation
    actions: {
        getReservation({ commit }) {
            let uri = '/api/reservation/all';
            return new Promise(function (resolve, reject) {
                axios.get(uri).then(response => {
                    commit('setReservation', response.data.data);
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            });
        },
        deleteReserve({ commit }, param) {
            let uri = '/api/reservation/delete/' + param.id;
            return new Promise(function (resolve, reject) {
                axios.delete(uri).then(response => {
                    commit('deleteReserve', param.id);
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            });
        },
        updateReserve({ commit }, param) {
            let uri = '/api/reservation/update/' + param.id;
            return new Promise(function (resolve, reject) {
                axios.post(uri, param.data).then(response => {
                    commit('updateReserve', param);
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            });
        }
    },
    getters: {
        all: state => state.all,
    },
};
