<template>
    <div class="container">
        <div class="card card-default row">
            <div class="card-body col-md-8">
                <Form @submit="submit" :validation-schema="schema">
                    <div class="form-group row">
                        <label
                            for="name"
                            class="col-sm-4 col-form-label text-md-right"
                            >Name</label
                        >
                        <div class="col-md-5">
                            <Field name="name" class="form-control" />
                        </div>
                        <ErrorMessage name="name" />
                    </div>
                    <div class="form-group row">
                        <label
                            for="email"
                            class="col-sm-4 col-form-label text-md-right"
                            >Email</label
                        >
                        <div class="col-md-5">
                            <Field name="email" class="form-control" />
                        </div>
                        <ErrorMessage name="email" />
                    </div>
                    <div class="form-group row">
                        <label
                            for="password"
                            class="col-sm-4 col-form-label text-md-right"
                            >Password</label
                        >
                        <div class="col-md-5">
                            <Field
                                name="password"
                                type="password"
                                class="form-control"
                            />
                        </div>
                        <ErrorMessage name="password" />
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right"
                            >Password Confirm</label
                        >
                        <div class="col-md-5">
                            <Field
                                name="password_confirmation"
                                type="password"
                                class="form-control"
                            />
                        </div>
                        <ErrorMessage name="password_confirmation" />
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </Form>
            </div>
        </div>
    </div>
</template>

<script>
import { Field, Form, ErrorMessage } from "vee-validate";
import * as yup from "yup";

export default {
    components: { Field, Form, ErrorMessage },
    data() {
        const schema = yup.object({
            name: yup.string().required().max(255),
            email: yup.string().required().email().max(255),
            password: yup.string().required().min(8).max(255),
            password_confirmation: yup
                .string()
                .required()
                .oneOf([yup.ref("password")], "Passwords do not match"),
        });

        return {
            schema,
        };
    },
    methods: {
        async submit(values) {
            await axios.get("/sanctum/csrf-cookie");
            await axios.post(process.env.MIX_BASE_URL + "/api/admin/register", values)
                    .then((response) => {
                        if (response.status !== 200 || response.data.error) {
                            this.displaySuccessError(response);
                        } else {
                            window.location.href = process.env.MIX_BASE_URL + "/admin/login";
                        }
                    })
                    .catch((error) => {
                        this.displayErrors(error);
                    });

        },
    },
    beforeRouteEnter(to, from, next) {
        if (window.Laravel.isLoggedin) {
            return next("dashboard");
        }
        next();
    },
};
</script>