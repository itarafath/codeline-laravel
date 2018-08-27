<template>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <form @submit.prevent="updateProfile">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                                type="text"
                                class="form-control"
                                :class="{'is-invalid' : error.name}"
                                id="name"
                                v-model="form.name"
                                :disabled="loading"
                        />
                        <div class="invalid-feedback" v-show="error.name">{{ error.name }}</div>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea
                                type="text"
                                class="form-control"
                                :class="{'is-invalid' : error.description}"
                                id="description"
                                v-model="form.description"
                                :disabled="loading"
                        ></textarea>

                        <div class="invalid-feedback" v-show="error.description">{{ error.description }}</div>
                    </div>
                    <div class="form-group">
                        <label for="ticket_price">Ticket Price</label>
                        <input
                                type="text"
                                class="form-control"
                                :class="{'is-invalid' : error.ticket_price}"
                                id="ticket_price"
                                v-model="form.ticket_price"
                                :disabled="loading"
                        />
                        <div class="invalid-feedback" v-show="error.ticket_price">{{ error.ticket_price }}</div>
                    </div>
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input
                                type="text"
                                class="form-control"
                                :class="{'is-invalid' : error.rating}"
                                id="rating"
                                v-model="form.rating"
                                :disabled="loading"
                        />
                        <div class="invalid-feedback" v-show="error.rating">{{ error.rating }}</div>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre</label>
                        <input
                                type="text"
                                class="form-control"
                                :class="{'is-invalid' : error.genre}"
                                id="genre"
                                placeholder="Action,History"
                                v-model="form.genre"
                                :disabled="loading"
                        />
                        <div class="invalid-feedback" v-show="error.genre">{{ error.genre }}</div>
                    </div>
                    <div class="form-group">
                        <label for="genre">Release Date</label>
                        <datepicker :input-class="'form-control'" format="yyyy-MM-dd"
                                    v-model="form.release_date"></datepicker>
                        <div class="invalid-feedback" v-show="error.release_date">{{ error.release_date }}</div>
                    </div>
                    <div class="form-group">
                        <label for="country_id">Country</label>
                        <select :class="{'is-invalid' : error.country_id}" class="form-control" name="country_id"
                                id="country_id" v-model="form.country_id"
                                :disabled="loading">
                            <option v-for="option in countries" v-bind:value="option.id">
                                {{ option.name }}
                            </option>

                        </select>
                        <div class="invalid-feedback" v-show="error.genre">{{ error.country_id }}</div>
                    </div>
                    <div class="form-group">
                        <label for="photo">File</label>
                        <input type="file" id="photo" v-on:change="handleFileUpload" class="form-control">

                    </div>
                    <button type="submit" class="btn btn-primary" :disabled="loading">
                        <span v-show="loading">Saving</span>
                        <span v-show="!loading">Save</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    import {mapState} from 'vuex'
    import {api, apiDomain} from "./../../config";
    import Datepicker from 'vuejs-datepicker';

    export default {
        components: {
            Datepicker
        },
        data() {
            return {
                loading: false,
                countries: [],
                error: {
                    name: '',
                    rating: '',
                    ticket_price: '',
                    description: '',
                    genre: '',
                    release_date: '',
                    country_id: '',
                    photo: '',
                },
                form: {
                    name: '',
                    rating: '',
                    ticket_price: '',
                    description: '',
                    genre: '',
                    release_date: '',
                    country_id: '',
                    photo: '',
                }
            };
        },
        mounted() {
            this.getCountry();
        },
        methods: {
            handleFileUpload(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.form.photo = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            getCountry() {
                axios.get(apiDomain + '/get-country').then((response) => {
                    this.countries = response.data;
                }).catch(err => {
                    console.log(err)
                })
            },
            updateProfile(event) {
                this.loading = true;
                axios.post(api.createFilm, this.form)
                    .then((res) => {
                        this.loading = false;
                        this.form.name = this.form.description = this.form.rating = this.form.country_id = this.form.genre = this.form.description = this.form.ticket_price = this.form.photo = this.form.release_date = '';
                        event.target.reset();
                        this.$noty.success('Film Created');
                    })
                    .catch(err => {
                        (err.response.data.error) && this.$noty.error(err.response.data.error);

                        (err.response.data.errors)
                            ? this.setErrors(err.response.data.errors)
                            : this.clearErrors();

                        this.loading = false;
                    });
            },
            setErrors(errors) {
                this.error.name = errors.name ? errors.name[0] : null;
                this.error.rating = errors.rating ? errors.rating[0] : null;
                this.error.ticket_price = errors.ticket_price ? errors.ticket_price[0] : null;
                this.error.genre = errors.genre ? errors.genre[0] : null;
                this.error.description = errors.description ? errors.description[0] : null;
                this.error.release_date = errors.release_date ? errors.release_date[0] : null;
                this.error.country_id = errors.country_id ? errors.country_id[0] : null;
            },
            clearErrors() {
                this.error.name = null;
                this.error.rating = null;
                this.error.ticket_price = null;
                this.error.description = null;
                this.error.genre = null;
                this.error.release_date = null;
                this.error.country_id = null;
            }
        }
    }
</script>
