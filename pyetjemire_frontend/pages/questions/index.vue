<template>
  <div class="last-quesitons">
    <div class="container">
        <h1>Questions</h1>
        <div class="row">
        <div class="col-4 q-content" v-for="quesiton in quesitons" :key="quesiton.id">
          <div class="last-question-container">
            <div class="q-content">
              <div class="q-header">
              <font-awesome-icon class="" fas icon="clock" />
              {{ quesiton.created_at }}
            </div>
            <h4><nuxt-link :to="{ path: '/questions/' + quesiton.id }">{{ quesiton.title.substring(0, 50) }}</nuxt-link></h4>
            <p>{{ quesiton.content.substring(0, 100) }}... </p>
            <div class="q-tag">
              <font-awesome-icon fas icon="tag" />
              <span>{{ quesiton.category_id }}</span>
            </div>
            </div>
            <div class="q-footer">
              <div class="row">
                <div class="col">
                  <font-awesome-icon fas icon="user" />
                  <span>{{ quesiton.user_id }}</span>
                </div>
                <div class="col d-flex justify-content-end">
                  <font-awesome-icon fas icon="comment-alt" />
                  <span>{{quesiton.comment_id }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
    </div>
  </div>
</template>

<script>
export default {
  layout: 'default',

data() {
  return {
    quesitons: [],
    shortTitle: ''
  }
},

 fetch(){
      this.loading = true;
      const url = "http://localhost:8000/api/questions"
      this.$axios.get(url)
      .then((rez)=>{
          this.loading = false;
          this.quesitons=rez.data;
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
