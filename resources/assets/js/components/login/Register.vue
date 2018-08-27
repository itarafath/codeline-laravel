<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="registerUser">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                        type="text"
                                        class="form-control"
                                        :class="{'is-invalid' : error.name}"
                                        id="name"
                                        v-model="form.name"
                                        autocomplete="off"
                                        :disabled="loading"
                                />
                                <div class="invalid-feedback" v-show="error.name">{{ error.name }}</div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                        type="email"
                                        class="form-control"
                                        :class="{'is-invalid' : error.email}"
                                        id="email"
                                        v-model="form.email"
                                        autocomplete="off"
                                        :disabled="loading"
                                />
                                <div class="invalid-feedback" v-show="error.email">{{ error.email }}</div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input
                                        type="password"
                                        class="form-control"
                                        :class="{'is-invalid' : error.password}"
                                        id="password"
                                        v-model="form.password"
                                        :disabled="loading"
                                />
                                <div class="invalid-feedback" v-show="error.password">{{ error.password }}</div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block" :disabled="loading">
                                    <span v-show="loading">Registering</span>
                                    <span v-show="!loading">Register</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import {apiDomain} from "../../config";

    export default {
        data() {
            return {
                loading: false,
                form: {
                    name: '',
                    email: '',
                    password: ''
                },
                error: {
                    name: null,
                    email: null,
                    password: null
                }
            }
        },
        methods: {
            registerUser(data) {
                axios.post(apiDomain + '/register', this.form).then(response => {
                    this.loading = false;
                    this.$noty.success('Successfully Registered');
                    this.$router.push({name: 'login'});
                }).catch(err => {
                    (err.response.data.error) && this.$noty.error(err.response.data.error);

                    (err.response.data.errors)
                        ? this.setErrors(err.response.data.errors)
                        : this.clearErrors();

                    this.loading = false;
                })

            },
            setErrors(errors) {
                this.error.name = errors.name ? errors.name[0] : null;
                this.error.email = errors.email ? errors.email[0] : null;
                this.error.password = errors.password ? errors.password[0] : null;
            },
            clearErrors() {
                this.error.name = null;
                this.error.email = null;
                this.error.password = null;
            }
        }
    }
</script>
