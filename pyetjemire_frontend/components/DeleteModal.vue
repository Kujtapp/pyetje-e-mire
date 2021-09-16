<template>
  <div id="overlay" v-if="showDeleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title text-dark"><strong>{{ title }}</strong></h3>
          <a type="button" class="btn btn-dark" @click="showDeleteModal=false">&times;</a>
        </div>
        <div class="modal-body">
          <h4 class="text-muted ">Are you sure you want to delete?</h4>
          <hr>
          <a class="btn btn-dark" @click="deleteItem()">Yes</a>
          <a class="btn btn-dark"  @click="showDeleteModal=false">No</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
      name: "DeleteModal",
      props: {
        title: {
          type: String,
          required: true
        },
        model: {
          type: String,
          required: true
        },
        urlId: {
          required: true
        },
        showDeleteModal: {
          value: false,
          required: true
        },
      },

      methods: {
        deleteItem (){
          const url = "/api/" + this.model + "/";
          this.$axios.delete(url + this.urlId)
          .then(()=>{
            this.$swal.fire(
              'Deleted Successfully',
              this.model + 'Has been',
              'success'
            );
            this.$router.back();
          })
          .catch((err) => {
            this.$swal.fire(
              'Not deleted',
              'Article Has been' + err,
              'error'
            );
            console.log("An error has been found: ", err);
          })
        }
      },

    }
</script>

<style scoped>
  .buttons-btn a{
    width: 122px;
  }
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
