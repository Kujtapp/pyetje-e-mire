<template>
<div class="container">
    <h1>Pyetja {{ question.title }}</h1>
    <font-awesome-icon v-if="loading" fas icon="cog" class="fa-spin fa-4x absolute-center"></font-awesome-icon>
    <div class="table">
        <tbody>
            <tr>
                <td>Id</td>
                <td>{{question.id}}</td>
            </tr>
            <tr>
                <td>Titulli</td>
                <td>{{question.title}}</td>
            </tr>
            <tr>
                <td>Pyetja</td>
                <td>{{question.content}}</td>
            </tr>
            <tr>
                <td>Created At</td>
                <td>{{question.created_at}}</td>
            </tr>
            <tr>
                <td>Updated At</td>
                <td>{{question.updated_at}}</td>
            </tr>
            <tr>
            <td>
                <nuxt-link :to="`/admin/questions/${id}/edit`" class="btn btn-blue">EDIT</nuxt-link>
            </td>
            <td>
               <a class="btn btn-dark"  @click="showDeleteModal=true" >Delete </a>
            </td>
            </tr>
        </tbody>
    </div>
  <delete-modal model="questions" title="Question" :urlId="id" :showDeleteModal="showDeleteModal"></delete-modal>
</div>
</template>

<script>
    export default {
        name: "question-details",
        layout: "adminPanel",
        middleware: "admin",

    data() {
          return {
            id: this.$route.params.id,
            question: {},
            loading: false,
            showDeleteModal: false
          }
      },

       fetch() {
          this.loading = true;
          const url = "http://localhost:8000/api/questions/";
          this.$axios.get(url + this.id)
            .then((res) => {
                this.loading = false;
              this.question = res.data;
              console.log(this.question);
            })
            .catch((err) => {
              this.loading = false;
              console.log(err);
            })
      }


    }
</script>
