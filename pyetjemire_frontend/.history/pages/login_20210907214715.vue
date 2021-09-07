<template>
    <div>
        <div class="container-fluid ps-md-0">
            <div class="row g-0">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4">Mireseerdhet</h3>

                        <!-- Sign In Form -->
                        <form @click.prevent="login">
                            <div class="form-floating mb-3">
                            <input type="email" v-model="loginForm.email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email adresa juaj</label>
                            </div>
                            <div class="form-floating mb-3">
                            <input type="password" v-model="loginForm.password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Fjalkalimi</label>
                            </div>

                            <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                Ruaj Fjalkalimin
                            </label>
                            </div>

                            <div class="d-grid">
                            <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Kycu</button>
                            <div>
                               <p>Nuk keni llogari? <nuxt-link to="/register"><span>Regjistrohu</span></nuxt-link></p>
                            </div>
                            </div>

                        </form>
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
    data() {
        return {
            loginForm: {
                email: '',
                password: ''
            },
        }
    },

    methods: {
           login() {
                try {
                    this.$auth.loginWith('laravelSanctum', {data: this.loginForm})
                } catch (err) {
                   console.log('Nuk u kyq');
                }
           },
    }
}
</script>

        // login() {
        //     this.$auth.loginWith('laravelSanctum', {
        //         data: {
        //             email: 'admin@admin.com',
        //             password: 'pass'
        //         }
        //     })
        // }