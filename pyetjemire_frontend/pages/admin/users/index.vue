<template>
   <div>

        <div class="container">
            <h1><strong>Users</strong></h1>
            <hr>
            <font-awesome-icon v-if="loading" fas icon="cog" class="fa-spin fa-4x absolute-center"></font-awesome-icon>

        <table v-if="!loading" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Created At</th>
            </tr>
        </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{user.id}}</td>
                    <td><nuxt-link :to="{ path: '/admin/users/' + user.id }">{{ user.name }}</nuxt-link></td>
                <td>{{user.email}}</td>
                <td>{{user.role}}</td>
                <td>{{user.created_at}}</td>
            </tr>

            </tbody>
        </table>
        </div>
    </div>

</template>

<script>
    export default {
        name: "user-details",
        layout: "adminPanel",
        middleware: "auth",

        data(){
            return{
                users:{},
                loading: false
            }

        },

        fetch(){
            this.loading = true;
            const url = "http://localhost:8000/api/users";
            this.$axios.get(url)
            .then((rez)=>{
                this.loading = false;
                this.users=rez.data;
            })
            .catch( (err) =>{
                this.loading = false;
                console.log("ka has sharra ne goxht", err);
                if(err.response.data.message === 'Unauthenticated.') {
                  this.$auth.logout();
                }
            })

        }
    }
</script>

<style scoped>

</style>
