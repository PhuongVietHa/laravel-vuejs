<template>
    <div class="container">
        <div class="card card-default row">
            <div class="card-body col-md-8">
                <form @submit.prevent="submit" method="POST">
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" v-model="email" required
                                    autofocus autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" v-model="password"
                                    required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: "",
            password: "",
            error: null
        }
    },
    methods: {
        async submit() {
            await this.login({
                email: this.email,
                password: this.password
            }).then(response => {
                if (response.status !== 200 || response.data.error) {
                    this.displaySuccessError(response);
                } else {
                    window.location.reload()
                }
            }).catch(error=> {
                this.displayErrors(error);
            });
        },
        async login(credentials) {
            let uri = process.env.MIX_BASE_URL+'/api/admin/login';
            
            await axios.get('/sanctum/csrf-cookie')

            return new Promise(function (resolve, reject) {
                axios.post(uri, credentials).then(response => {
                    resolve(response);
                }).catch(error => {
                    reject(error);
                });
            })
        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next({ name: 'Dashboard' });
        }
        next();
    }
}
</script>