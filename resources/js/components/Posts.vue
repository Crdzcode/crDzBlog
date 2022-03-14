<template>
    <div>
        <div class="d-flex justify-content-between">
            <div class="d-flex flex-column mt-2">
                <div v-for="post in posts" :key="post.id" class="card mb-3 post-card shadow darkbg">
                    <h5 class="card-header h5 headers"><font-awesome-icon icon="fas fa-user" /> {{post.creator}}</h5>
                    <div class="card-body darkbg">
                        <h4 class="card-title h4">{{post.title}}</h4>
                        <div class="d-flex mt-1 flex-wrap">
                            <strong style="width: fit-content;" class="mr-2">Tags:</strong>
                            <strong v-for="tag in post.tags" :key="tag.id" class="tag mx-1 my-1">{{tag.name}}</strong>  
                        </div>
                        <a class="btn btn-primary post-button mt-2" @click="verPost(post.id)">Ver post</a>
                    </div>
                    <div style="border-top: 1px solid #2fc65c!important;" class="card-footer text-muted darkbg">
                        <span>Criado {{post.date}}</span>
                    </div>
                </div>
            </div>

            <div class="card ml-2 mt-2 mb-3 darkbg shadow" style="width: 12rem;">
                <div class="card-header text-center headers">
                    <h5 class="h5">Posts recentes</h5>
                </div>
                <ul class="list-group list-group-flush">
                    <a class="btn btn-primary post-button recentes mx-auto mt-2" v-for="post in posts" :key="post.id" @click="verPost(post.id)">{{post.title}}</a>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                post: {},
            }
        },
        methods: {
            listar() {
                axios.get('/api/posts').then(response => {
                    this.posts = response.data;
                });

            },
            apenas(id) {

                axios.get('/api/posts/' + id).then(response => {
                    this.post = response.data;
                });

            },
            verPost(id){
                window.location.href = '/post/' + id;
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

    strong{
        display: inline;
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
        width: fit-content;
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
