<template>
 <div class="container">
  <font-awesome-icon v-if="loading" fas icon="cog" class="fa-spin fa-4x absolute-center"></font-awesome-icon>

  <h1> {{user.name}}</h1>
    <div class="table" v-if="!loading">
      <tbody>
        <tr>
          <td>ID</td>
          <td>{{user.id}}</td>
        </tr>
        <tr>
          <td>Name</td>
          <td>{{user.name}}</td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td>{{user.email}}</td>
        </tr>
        <tr>
          <td>Password</td>
          <td>{{user.role}}</td>
        </tr>
          <tr>
          <td>Created at</td>
          <td>{{user.created_at}}</td>
        </tr>
      </tbody>

      <div class="mt-2 ml-3">
        <a class="btn btn-red"  @click="showDeleteModal=true" >Delete User</a>
      </div>
    </div>

      <!-- delete modal -->
      <div id="overlay" v-if="showDeleteModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title"> Delete User</h3>
              <a type="button" class="btn btn-danger btn-sm" @click="showDeleteModal=false">x</a>
            </div>
            <div class="modal-body">
              <h4 class="text-danger">Are you sure you want to delete this user?</h4>
              <h5>You are deleting {{user.name}}</h5>
              <hr>
              <a class="btn btn-red" @click="deleteuser(id)">Yes</a>
              <a class="btn btn-blue"  @click="showDeleteModal=false">No</a>

            </div>
          </div>
        </div>
      </div>

 </div>
</template>

<script>
    export default {

        name: "user-detals",
        layout: "adminPanel",
        middleware: "auth",

        data(){
            return{
                id: this.$route.params.id,
                user: {},
                loading: false,
                showDeleteModal: false
            }
        },

        methods: {
            deleteuser (id){
            const url = "http://localhost:8000/api/users/";
            this.$axios.delete(url + this.id)
            .then(()=>{
                this.$router.push("/admin/users/");
              })
            .catch((err) => {console.log("erdh");})

        }

        },

        fetch(){
            this.loading = true;
            const url = "http://localhost:8000/api/users/";
            this.$axios.get(url + this.id)
            .then((rez)=>{
                this.loading = false;
                this.user=rez.data
                cosole.log(user.data)

            })
            .catch((err) => {
              this.loading = false;
              console.log(err);
            })
      }


    }
</script>

<style scoped>

#overlay{
  position:fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.6);
}
.modal-dialog{
  margin-top: 100px;
}


</style>
