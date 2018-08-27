<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4" v-for="film in films">
                <a :href="fileUrl+'/films/'+  film.slug">
                    <div class="card" style="width: 18rem;">
                        <h5>{{film.name}}</h5>
                        <img class="card-img-top"
                             :src="fileUrl+'/img/'+  film.photo"
                             alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{film.description}}</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {siteName, api, fileUrl} from './../../config';

    export default {
        data() {
            return {
                siteName: siteName,
                films: '',
                fileUrl: fileUrl
            }
        },
        mounted() {
            this.getFilm()
        },
        methods: {
            getFilm() {
                axios.get(api.getFilms).then((response) => {
                    this.films = response.data
                }).catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>
