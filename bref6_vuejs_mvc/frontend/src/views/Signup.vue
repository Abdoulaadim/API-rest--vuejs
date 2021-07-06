<template>

  <div class="container bg bg-light py-4">
    <div class="row">
      <div class="col-sm5 m-auto">
        <div class="text-center mb-4">
          <h1 class="bg bg-dark text-white">Regitre</h1>
        </div>
        <form action="" id="login-form" @submit.prevent="handleSubmit">
          <div class="row">
            <div class="col-sm-6 form-group">
              <label for="Nom">Nom :</label>
              <input
                type="text"
                class="form-control form-control-lg"
                placeholder=" nom"
                v-model="nom"
              />
            </div>
            <div class="col-sm-6 form-group">
              <label for="Prenom">Prenom :</label>
              <input
                type="text"
                class="form-control form-control-lg"
                placeholder=" prenom"
                v-model="prenom"
              />
            </div>
            <div class="col-sm-12 form-group">
              <label for="Age">Age :</label>
              <input
                type="number"
                class="form-control form-control-lg"
                placeholder=" age"
                v-model="age"
              />
            </div>
            <div class="col-sm-12 form-group">
              <label for="Cin">Cin :</label>
              <input
                type="text"
                class="form-control form-control-lg"
                placeholder="C.I.N"
                v-model="cin"
              />
            </div>
            <div class="col-sm-12 form-group">
              <label for="Numero">Numero de telephone :</label>
              <input
                type="number"
                class="form-control form-control-lg"
                placeholder=" numero de telephone"
                v-model="telephone"
              />
            </div>
            <div class="pt-4 col-sm-12 form-group">
              <button class="btn btn-dark btn-lg mx-1">regiter</button>
            </div>
            <div class="pt-4 col-sm-12 form-group mt-5">
              <p>
                Vous-avez deja un compte ?
                <router-link to="/Login">Login</router-link>
              </p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";
export default {
 name: "Signup",
  data() {
    return {
      nom: "",
      prenom: "",
      Age: "",
      telephone: "",
      cin: "",
      response: this.reference,
    };
  },
    methods: {
    async handleSubmit() {
      const response = await axios.post(
        "http://localhost/A_Youcode/bref6_vuejs_mvc//Users/add",
        {
          reference: this.reference,
          nom: this.nom,
          prenom: this.prenom,
          age: this.age,
          telephone: this.telephone,
          cin: this.cin,
        }
      );
      console.log(response.data);
    if (response.data.reference) {

        localStorage.setItem("reference", response.data.reference);
        this.$router.push("/View");
      } else {
        alert(response.data.message);
      }
    },
  },

}
</script>

<style>

</style>