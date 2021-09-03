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
                    <form action="#">
                        <div class="row">

                            <!-- First Name -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                </div>
                                <input id="firstName" type="text" name="firstname" placeholder="Emri Juaj" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Last Name -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-user text-muted"></i>
                                    </span>
                                </div>
                                <input id="lastName" type="text" name="lastname" placeholder="Mbiemri Juaj" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Email Address -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-envelope text-muted"></i>
                                    </span>
                                </div>
                                <input id="email" type="email" name="email" placeholder="Email Adresa juaj" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Phone Number -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-phone-square text-muted"></i>
                                    </span>
                                </div>
                                <select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select form-control bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                    <option value="">+383</option>
                                    <option value="">+377</option>
                                    <option value="">+386</option>
                                </select>
                                <input id="phoneNumber" type="tel" name="phone" placeholder="Numri Telefonit" class="form-control bg-white border-md border-left-0 pl-3">
                            </div>.


                            <!-- Job -->
                            <div class="input-group col-lg-12 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-black-tie text-muted"></i>
                                    </span>
                                </div>
                                <select id="job" name="jobtitle" class="form-control custom-select bg-white border-left-0 border-md">
                                    <option value="">Perzgjedh profesionin tuaj</option>
                                    <option value="">Designer</option>
                                    <option value="">Developer</option>
                                    <option value="">Manager</option>
                                    <option value="">Accountant</option>
                                    <option value="">Te tjera</option>
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="password" type="password" name="password" placeholder="Fjalkalimi" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Password Confirmation -->
                            <div class="input-group col-lg-6 mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white px-4 border-md border-right-0">
                                        <i class="fa fa-lock text-muted"></i>
                                    </span>
                                </div>
                                <input id="passwordConfirmation" type="text" name="passwordConfirmation" placeholder="Konfirmo Fjalekalimin" class="form-control bg-white border-left-0 border-md">
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group col-lg-12 mx-auto mb-0">
                                <a href="#" class="btn btn-primary btn-block py-2">
                                    <span class="font-weight-bold">Krijo Llogarin tuaj</span>
                                </a>
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