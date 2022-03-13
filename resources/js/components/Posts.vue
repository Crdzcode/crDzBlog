<template>
    <div>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column mt-2">
                <div v-for="post in publishedPosts" :key="post.id" class="card mb-3 post-card shadow darkbg">
                    <h5 class="card-header h5 headers"><font-awesome-icon icon="fas fa-user" /> {{post.creator}}</h5>
                    <div class="card-body darkbg">
                        <h4 class="card-title h4">{{post.title}}</h4>
                        <p class="card-text">{{post.body}}</p>
                        <a href="#" class="btn btn-primary post-button" data-toggle="modal" data-target="#modalPost" @click="apenas(post.id)">Ver mais</a>
                    </div>
                    <div style="border-top: 1px solid #2fc65c!important;" class="card-footer text-muted darkbg">
                        <span>Criado em: {{obterDataPost(post.created_at)}}</span>
                    </div>
                    <!--<a href="#" @click="apenas(post.id)">Detalhes</a>-->
                </div>
            </div>

            <div class="card ml-2 mt-2 mb-3 darkbg shadow" style="width: 12rem;">
                <div class="card-header text-center headers">
                    <h5 class="h5">Posts recentes</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <a class="btn btn-primary post-button recentes mx-auto mt-2" data-toggle="modal" data-target="#modalPost" href="#" v-for="post in publishedPosts" :key="post.id" @click="apenas(post.id)">{{post.title}}</a>
                </ul>
            </div>
        </div>

        <div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div v-if="post!={}" class="modal-content darkbg">
                    <div class="modal-header headers">
                        <h6 class="modal-title" id="exampleModalLongTitle"><font-awesome-icon icon="fas fa-user" /> {{post.creator}}</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4 class="card-title">{{post.title}}</h4>
                        <p class="card-text">{{post.body}}</p>
                        <ul class="list-group mt-5">
                            <strong>Tags: <li class="list-group-item tag mx-2" v-for="tag in post.tags" :key="tag.id">{{ tag }}</li></strong>
                        </ul>
                    </div>
                    <div style="border-top: 1px solid #2fc65c!important;" class="modal-footer">
                        <button type="button" class="btn btn-primary post-button" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                publishedPosts: [],
                posts: [],
                post: {},
                modal: false
            }
        },
        methods: {
            obterDataPost(date){
                const d = new Date(date.substring(0, 4) + '/' + date.substring(5,7) + '/' + date.substring(8,10));
                const moment = require('moment');
                moment.locale('pt-br');
                return moment(d).format('LL');
            },
            listar() {

                axios.get('/api/posts').then(response => {
                    this.posts = response.data;
                    this.publishedPosts = this.posts.filter(function(post){
                        return post.published.match("1");
                    })
                });

            },
            apenas(id) {

                axios.get('/api/posts/' + id).then(response => {
                    this.post = response.data;
                    //this.abre_modal()
                });

            },
            abre_modal() {
                this.modal = true
            }
        },
        mounted() {
            this.listar()
        }
    }
</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&display=swap');

    *{
        font-family: 'Fredoka', sans-serif;
        border: none!important;
        outline: none!important;
    }

    .shadow{
        -webkit-box-shadow: 0px 12px 32px 8px rgba(17,17,17,0.71); 
        box-shadow: 0px 12px 32px 8px rgba(17,17,17,0.71);
    }

    .headers{
        background-color: #121212!important;
        color: #2bc65e!important;
    }

    .darkbg{
        background-color: #181818;
        color: whitesmoke;
    }

    .item {
        border: 1px solid #ccc;
    }

    .tag{
        opacity: 0.8;
        display: inline;
        padding: 4px;
        background-color: #2bc65e;
        color: #111;
        border-radius: 6px;
    }

    .post-card{
        width: 54rem;
    }

    .post-button{
        background-color: #111;
        outline: none!important;
        border: none!important;
        transition: all ease-in-out .2s;
    }

    .post-button:hover{
        background-color: #111;
        opacity: 0.8;
    }

    .post {
        position: absolute;
        top: 0;
        left: 50%;
        z-index: 99;
        width: 800px;
        height: auto;
        margin-left: -400px;
        padding: 10px;
        background-color: #eaeaea;
        color: #333;
        border: 1px solid #6E6E6E;

    }

    .post a {
        float: right;
        color: red;
    }
</style>
