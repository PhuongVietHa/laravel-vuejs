export default {
    namespaced: true,
    state: {
        username: "",
        password: ""
    },
    // commit a mutation from input state props
    mutations: {
    },
    // async dispatch and commit a mutation
    actions: {
        login(param) {
            let uri = process.env.MIX_BASE_URL+'/api/admin/login';
            return new Promise(function (resolve, reject) {
                axios.post(uri, {
                    username: param.username,
                    password: param.password
                }).then(response => {
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            });
        },
    },
    getters: {
        username: state => state.username,
        password: state => state.password
    },
};
