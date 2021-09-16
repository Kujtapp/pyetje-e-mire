<template>
  <div class="container">
    <h3> EDIT </h3>
    <hr/>
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <input type="text" class="form-control" placeholder=" Emri" v-model="question.title"/>
          </div>
        </div>
         <div class="col-md-8">
          <div class="form-group">
           <label for="question"> Pyetja </label>
           <textarea v-model="question.content" class="form-control" id="question" rows="3" ></textarea>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" @click="back()">Submit</button>
    </form>
  </div>

</template>

<script>
 export default {
        name: "edit-question",
        layout: "adminPanel",
        middleware: "auth",
    data() {
          return {
            id: this.$route.params.id,
            question: {},
          }
      },
      methods: {
        back(){
          this.$router.push("/admin/questions/");
        },
      submitForm() {
        const url = "http://localhost:8000/api/questions/";
            this.$axios.put(url + this.id, this.question)
                  .then(() => {
                  })
                  .catch((err) => {
                      console.log(err);
                  })
              }
          },

       fetch() {
          const url = "http://localhost:8000/api/questions/";
          this.$axios.get(url + this.id)
          .then((res) => {
              this.question = res.data;
              console.log(this.question);

            })
            .catch((err) => {

              console.log( err);
            })
      }

    }


</script>
