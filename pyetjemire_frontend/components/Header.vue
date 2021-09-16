<template>
  <div class="header">
    <div class="container">
        <div class="row pt-3">
            <div class="col-8 pl-0">
                <Logo />
            </div>
            <div class="col-4 text-white p-0 my-auto d-flex justify-content-end">
                <div v-if="this.$auth.loggedIn">
                  <nuxt-link v-if="this.$auth.user.role === 'admin'" class="nav-link" to="admin/dashboard">Dashboard</nuxt-link>
                  <span v-if="this.$auth.user.role !== 'admin'" class="nav-link" >{{ this.$auth.user.name }}</span>
                  <font-awesome-icon class="user-icon fa-lg text-white" fas icon="sign-out-alt" @click="logout()"></font-awesome-icon>
                </div>

            <!-- <nuxt-link v-if="!this.$auth.loggedIn" class="nav-link" to="/login">{{'login'}}</nuxt-link> -->
                 <nuxt-link v-if="!$auth.loggedIn" to="/login"><font-awesome-icon class="user-icon fa-lg text-white" fas icon="user"></font-awesome-icon></nuxt-link>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {


methods: {
  logout() {
    this.$auth.logout();
  }
}
}
</script>
