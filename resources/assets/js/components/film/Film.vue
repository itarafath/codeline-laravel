<template>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" :src="fileUrl+'/img/'+  film.photo" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{film.name}}</h5>
                    <p class="card-text">{{film.description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Ticket : {{film.ticket_price}}</li>
                    <li class="list-group-item">Release Data: {{film.release_date}}</li>
                    <li class="list-group-item">Country : {{film.country}}</li>
                    <li class="list-group-item">Rating : {{film.rating}}</li>
                    <li class="list-group-item">Genres : <span v-for="item in film.genres">{{item.name}},</span></li>
                </ul>
                <div v-show="isLoggedIn">
                    <div class="">
                        <input type="text" class="form-control" placeholder="Name" v-model="name"
                               aria-label="Name" aria-describedby="basic-addon2">
                        <input type="text" class="form-control" placeholder="Comment" v-model="comment"
                               aria-label="Comment" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" @click="saveComment" type="button">Comment
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {siteName, api, fileUrl, apiDomain} from './../../config';
    import {mapGetters} from 'vuex'

    export default {
        data() {
            return {
                siteName: siteName,
                film: '',
                fileUrl: fileUrl,
                comment: '',
                name: ''
            }
        },
        mounted() {
            this.getFilm()
        },
        computed: mapGetters([
            'isLoggedIn'
        ]),
        methods: {
            getFilm() {
                axios.get(apiDomain + this.$route.fullPath).then((response) => {
                    this.film = response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            saveComment() {
                axios.post(apiDomain + '/comment', {
                    comment: this.comment,
                    name: this.name,
                    film: this.$route.params.slug
                }).then((response) => {
                    this.comment = ''
                    this.name = ''
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
