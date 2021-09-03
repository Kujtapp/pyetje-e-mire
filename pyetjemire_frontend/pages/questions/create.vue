<template>
  <div>
    <div class="container">
        <h3 class="mt-5 pyetja mb-4">Parashtro Pyetjen Tënde</h3>
        <form @submit.prevent="onSubmit">
            <div class="col-md-8 px-0 mx-auto">
                <div class="form-group">
                    <label for="question">Titulli</label>
                    <input type="text" id="question" v-model="question.title" name="question" class="form-control shadow-sm p-2 bg-body rounded" required>
                      <small id="emailHelp" class="form-text text-muted">Pyetja juaj do të marrë 
                        përgjigje më të mira nëse përdorni një titull pyetjeje kuptimplotë
                      </small>
                </div>
            </div>
            <div class="col-md-8 px-0 mx-auto">
                <div class="form-group">
                    <label for="content">Pyetja</label>
                    <textarea v-model="question.content" class="form-control p-2 shadow-sm bg-body rounded" id="content" rows="6" ></textarea>
                </div>
            </div>
            <!-- <div class="col-md-8">
                <div class="form-group">
                    <label for="tema"> Pyetja </label>
                    <input type="text" id="tema" v-model="question.tema" name="tema" class="form-control" required>
                </div>
            </div> -->
            <div class="col-md-8 px-0 mx-auto">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary shadow bg-body rounded">Parashtro Pyetjen</button>
                </div>
            </div>
        </form>
      </div>
  </div>
</template>

<script>
export default {
  layout: 'default',

data() {
  return {
    question: {
        title: '',
        content: '',
        // tema: ''
    },
  }
},

methods: {
    onSubmit() {
      const url = "http://localhost:8000/api/questions";
      this.$axios
        .post(url, this.question)
        .then(result => {
          this.$router.push("/");
        })
        .catch(err => {
          console.log("not success");
        });
    }
}

}
</script>
