<template>
<div>

  <div class="image-container">
    <img src="~/assets/images/header.png" alt="Snow" style="width:100%;">
    <div class="centered">
      <div class="center-all">
        <h3>
          Platforma më e madhe për pyetje dhe përgjigje në Kosovë
        </h3>
        <p>Më e shkathët se çdo platform tjetër, tek ne do të gjeni shumë pyetje dhe përgjigje të mira</p>
        <nuxt-link to="questions/create" class="btn btn-light btn-lg text-primary mt-4 mx-3"> Parashtro Pyetjen</nuxt-link>
        <nuxt-link to="login" class="btn btn-outline-light btn-lg mt-4 px-5 mx-3"> Kyçu</nuxt-link>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="services">
      <div class="icon-circle justify-content-center">
      <div class="row">
        <div class="col-4" align="center">
            <font-awesome-icon class="icons text-white" fas icon="users"/>
            <h4 class="text-secondary mt-2">Gjithanshëm</h4>
            <p>Përfitoni nga përgjigjet e shfrytëzuesve aktivë</p>
        </div>
        <div class="col-4" align="center">
            <font-awesome-icon class="icons text-white" fas icon="clock"/>
            <h4 class="text-secondary mt-2">Shpejtë</h4>
            <p>Zakonisht do të merrni një përgjigje mbrenda minutave</p>
        </div>
        <div class="col-4" align="center">
            <font-awesome-icon class="icons text-white" fas icon="globe-europe"/>
            <h4 class="text-secondary mt-2">Aktivë</h4>
            <p>Komuniteti ynë është 24/7 aktivë</p>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div class="last-quesitons">
    <h1>Pyetje Aktuale</h1>
    <div class="container">
      <div class="row">
        <div class="col-4 q-content" v-for="quesiton in quesitons.slice(0, 6)" :key="quesiton.id">
          <div class="last-question-container">
            <div class="q-content">
              <div class="q-header">
                <font-awesome-icon class="text-success" fas icon="clock" />
                {{ quesiton.created_at }}
              </div>
              <h4><nuxt-link :to="{ path: '/questions/' + quesiton.id }">{{ quesiton.title.substring(0, 50) }}</nuxt-link></h4>
              <p>{{ quesiton.content.substring(0, 100) }}... </p>
              <div class="q-tag">
                <font-awesome-icon class="text-primary" fas icon="tag" />
                <span>{{ quesiton.category_id }}</span>
              </div>
            </div>
            <div class="q-footer">
              <div class="row">
                <div class="col">
                  <font-awesome-icon class="text-white" fas icon="user" />
                  <span>{{ quesiton.user_id }}</span>
                </div>
                <div class="col d-flex justify-content-end">
                  <font-awesome-icon class="text-white" fas icon="comment-alt" />
                  <span>{{quesiton.comment_id }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col text-center mt-5">  
        <nuxt-link to="questions/" class="btn btn-outline-primary px-4 py-2">Shiko më shumë</nuxt-link>
      </div>
      <div class="about-us">
        <h1>Rreth Nesh</h1>
        <p class="text-center px-5 mx-5 mt-4">
          Pyetjemire është më shumë se një platformë pyetje dhe përgjigje. Ne i bashkojmë njerëzit dhe hapim perspektiva të reja për ju.
        </p>
        <p class="text-center px-5 mx-5">
         Me ne ju mund të ndani dhe zbuloni njohuri, përvojë dhe opinione me të tjerët. Që nga viti 2021, 
         pyetjemire ka qenë pika e kontaktit për pyetje dhe përgjigje për miliona njerëz. pyetjemire 
         qëndron për një shkëmbim personal dhe të hapur me njëri -tjetrin - në çdo kohë dhe kudo. 
         Kjo krijon një larmi të madhe temash dhe opinionesh.
        </p>
        <p class="text-center px-5 mx-5">
          Me deri në 30 milion përdorues unik në muaj, platforma është njëra nga ofertat online me arritjen më të madhe në Kosovë.
        </p>
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
