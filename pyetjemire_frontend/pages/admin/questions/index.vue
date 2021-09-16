<template>
<div class="container">
        <div>
            <h1>Pyetjet</h1>
            <hr>
            <font-awesome-icon v-if="loading" fas icon="cog" class="fa-spin fa-4x absolute-center"></font-awesome-icon>
            <table v-if="!loading" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Titulli</th>
                        <th>Pyetja</th>
                        <th>Created At</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="question in questions" :key="question.id">
                        <td>{{ question.id}}</td>
                        <td><nuxt-link :to="{ path: '/admin/questions/' + question.id }">{{ question.title.slice(0, 35) }}</nuxt-link></td>
                        <td>{{ question.content.slice(0, 35) }}</td>
                        <td>{{ question.created_at}}</td>
                        <td>{{ question.updated_at}}</td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "message",
        layout: "adminPanel",
        middleware: "admin",

        data(){
            return{
              questions: [],
                loading: false
            }
        },

        fetch(){
            this.loading = true;
            const url = "http://localhost:8000/api/questions";
            this.$axios.get(url)
            .then((result)=> {
                this.loading = false;
                this.questions = result.data;
            })
            .catch((err)=>{
                this.loading = false;
              if(err.response.data.message === 'Unauthenticated.') {
                this.$auth.logout();
              }
            })
        },



    }

</script>
