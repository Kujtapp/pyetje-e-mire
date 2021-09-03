<template>
  <div class="container">
    <h3> EDIT </h3>
    <hr/>
        <form @submit.prevent="onSubmit">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="question"> titulli </label>
                    <input type="text" id="question" v-model="question.title" name="question" class="form-control" required>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="content"> Pyetja </label>
                    <textarea v-model="question.content" class="form-control" id="content" rows="3" ></textarea>
                </div>
            </div>
            <!-- <div class="col-md-8">
                <div class="form-group">
                    <label for="tema"> Pyetja </label>
                    <input type="text" id="tema" v-model="question.tema" name="tema" class="form-control" required>
                </div>
            </div> -->
            <div class="col-md-8">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
  </div>

</template>

<script>
 export default {
    layout: "default",
    data() {
        return {
            id: this.$route.params.id,
            question: {
                title: '',
                content: '',
                // tema: ''
            },
        }
      },

      methods: {
        back(){
          this.$router.push("/admin/question/");
        },

      onSubmit() {
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