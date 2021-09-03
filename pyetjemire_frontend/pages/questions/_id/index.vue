<template>
  <div>
    <div class="container" v-if="loading"><b-spinner label="Spinning"></b-spinner></div>
    <div class="container" v-if="!loading">
      <div class="table mt-4 col-md-9 mx-auto">
        <tbody class="">
            <tr class="bg-gradient shadow-sm bg-body rounded">
                <td class="font-weight-bold">Title</td>
                <td><h3>{{ question.title}}</h3></td>
            </tr>
            <tr class="bg-gradient shadow-sm bg-body rounded">
                <td class="font-weight-bold">Content</td>
                <td>{{ question.content }}</td>
            </tr>
        </tbody>
        <!-- <button type="submit" class="btn btn-warning">Pergjigju</button> -->
    </div>

    <form @submit.prevent="submitAnswer">
            <div class="col-md-8 bg-light bg-gradient shadow-sm bg-body rounded p-4 mt-5 mx-auto">
                <div class="form-group ">
                    <label for="content">Shëno përgjigjen tuaj...</label>
                    <textarea v-model="answer.content" class="form-control p-2" id="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-3">Shto Përgjigje</button>
            </div>
    </form>

    <div class="answers col-md-8 bg-light bg-gradient p-4 shadow-sm bg-body rounded mx-auto" v-for="answer in answers" :key="answer.id">
      <b-card class="mb-2">
        <b-card-text>
          <p>{{ answer.content }}</p>
        </b-card-text>
      </b-card>
      <p class="text-muted font-italic fs-6">{{ answer.created_at }}</p>
    </div>

    </div>
  </div>
</template>

<script>
export default {
  layout: 'default',

data() {
  return {
    id: this.$route.params.id,
    question: {},
    answers: [],
    answer: {
      question_id: this.$route.params.id,
      content: ''
    },
    loading: false,
    showDeleteModal: false,
  }
},

fetch() {
  this.loading = true;
  const url = "http://localhost:8000/api/questions/";
  this.$axios.get(url + this.id)
    .then((res) => {
        this.loading = false;
      this.question = res.data;
    })
    .catch((err) => {
      this.loading = false;
      console.log(err);
    });

  const aurl = "http://localhost:8000/api/answers/";
  this.$axios.get(aurl + this.id)
    .then((res) => {
        this.loading = false;
      this.answers = res.data;
    })
    .catch((err) => {
      this.loading = false;
      console.log(err);
    });
},

methods: {
  submitAnswer() {
     const url = "http://localhost:8000/api/answers";
      this.$axios
        .post(url, this.answer)
        .then(result => {
        })
        .catch(err => {
          console.log("not success");
        });
  }
}

}
</script>
