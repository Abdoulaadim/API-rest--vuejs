<template>
  <div class="container py-4">
    <div class="row">
      <div class="col-sm5 m-auto">
        <div class="text-center mb-4">
          <a href="#" class="navbar-brand">
          <img :src="image" alt="logo" style="width:100px;">
      </a>
          <h1 style="color: #dc3545" class="">Login</h1>
        </div>
 
        <form action="" @submit.prevent="hansleSubmit">

          <div class="row">
            <div class="col-sm-6 form-group text-start">
              <label for="reference" class="">Entrez Votre reference</label>
              <input
                type="text"
                name="reference"
                id="reference"
                placeholder="reference"
                class="form-control form-control-lg input bg-image hover-overlay"
                v-model="reference"
              />
            </div>

            <div class="pt-4 col-sm-6 form-group">
              <button class="btn btn-success btn-lg mx-1">Se connecter</button>
            </div>
            <div class="pt-4 col-sm-12 form-group mt-5">
              <p>
                Créer un compte ? <router-link to="/Signup">Signup</router-link>
              </p>
            </div>
          </div>
       
        </form>
      
      </div>
    </div>
  </div>
</template>

<script>
import image from '../assets/loooo.jpg'
import axios from "axios";
export default {
  name: "Login",
  data() {
    return {
      image:image,
      reference: "",
    };
  },
  methods: {
    async hansleSubmit() {
      const response = await axios.post(
        "http://localhost/A_Youcode/bref6_vuejs_mvc//Users/SignIn",
        {
          reference: this.reference,
        }
      );
      localStorage.setItem("reference", response.data.reference);
      if (response.data.reference) {
        this.$router.push("/View");
      } else {
        alert("reference incorrect !!");
      }
    },
  },
};
</script>

<style>
 .input{
        border-radius: 50px;
        border-color: red;

  }
</style>