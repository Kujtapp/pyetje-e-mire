<template>
    <div>
        <div class="container">
            <div class="row py-5 mt-4 align-items-center">
                <!-- For Demo Purpose -->
                <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
                    <img src="https://res.cloudinary.com/mhmd/image/upload/v1569543678/form_d9sh6m.svg" alt="" class="img-fluid mb-3 d-none d-md-block">
                    <h1>Krijo nje Llogari</h1>
                    <p class="font-italic text-muted mb-0">Behu pjese dhe perfito nga dija e te tjereve duke parashtruar pyetje</p>
                </div>




                <!-- Registeration Form -->
                <div class="col-md-7 col-lg-6 ml-auto">

                    <form @submit.prevent="createAccount()">
                        <div class="row">

                            <!-- First Name -->
                            <div class="input-group col-lg-12 mb-4">
                                <input id="name" v-model="createAccountForm.name" type="text" name="name" placeholder="Emri Juaj" class="form-control bg-white border-md">
                            </div>

                            <!-- Email Address -->
                            <div class="input-group col-lg-12 mb-4">
                                <input id="email" v-model="createAccountForm.email" type="email" name="email" placeholder="Email Adresa juaj" class="form-control bg-white border-md">
                            </div>


                            <!-- Password -->
                            <div class="input-group col-lg-6 mb-4">
                                <input id="password" v-model="createAccountForm.password" type="password" name="password" placeholder="Fjalkalimi" class="form-control bg-white border-md">
                            </div>

                            <!-- Password Confirmation -->
                            <div class="input-group col-lg-6 mb-4">
                                <input id="passwordConfirmation" v-model="createAccountForm.retypePassword" type="password" name="passwordConfirmation" placeholder="Konfirmo Fjalekalimin" class="form-control bg-white border-md">
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <span class="font-weight-bold">Krijo Llogarin tuaj</span>
                                </button>
                            </div>
                            <!-- Already Registered -->
                            <div class="w-100">
                                <p class="text-muted">Posedoni një llogari? <nuxt-link to="/login"><span>Kyçu</span></nuxt-link></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
    layout: 'blank',
    middleware: ['guest'],

    data() {
        return {
            createAccountForm: {
                name: '',
                email: '',
                password: '',
                retypePassword: ''
            },
            errorMessage: false,
            isValid: false,
            showPassword: false,
        }
    },

    methods: {
        async createAccount() {
            //   if (!this.createAccountForm.password.match(/^.{6,}$/)) {
            //     this.errorMessage = 'password must be 6 characters or longer';
            //     this.isValid = true;
            //   }else if(this.createAccountForm.password !== this.createAccountForm.retypePassword) {
            //     this.errorMessage = 'Passwords do not match';
            //     this.isValid = true;
            //   } else{
               await this.$axios.get('http://localhost:8000/sanctum/csrf-cookie');
               await this.$axios.post('http://localhost:8000/api/register', this.createAccountForm)
                  .then(() => {
                    this.$router.push('/');
                  })
                  .catch(err => {
                    console.log('faild to register')
                  });
            //   }
        },

 
    }
}
</script>