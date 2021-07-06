<template>
  <div id="app">
    <div class="navbar navbar-dark bg-dark">
      <a href="#" class="navbar-brand">
          <img :src="image" alt="logo" style="width:100px;">
      </a>
      <ul class="nav">
        <li class="nav-item px-3">
          <router-link class="text-white" to="/">Home</router-link>
        </li>
        <li class="nav-item px-3">
          <router-link class="text-white" to="#">mon compte</router-link>
        </li>
        <li class="nav-item px-3">
          <router-link class="text-white" to="/View"
            >View</router-link
          >
        </li>
        <li class="nav-item px-3">
          <a href="#" @click.prevent="Logout" style="color: white"
            >Deconnexion</a
          >
        </li>
      </ul>
    </div>
 

  <div class="container py-4">
    <h1 class="text-primary bg-dark" v-if="reference">
      Bonjour Votre  reference est : {{reference}}
    </h1>
    <form>
      <!-- date input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="Date">Date</label>
        <input
          @change="ReadCreneau"
          type="date"
          id="form4Example2"
          class="form-control"
          v-model="day"
        />
       </div>

      <!-- crenau input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="form4Example1">Creneau</label>
        <select
          class="form-select"
          aria-label="Default select example"
          v-model="Num_creneau"
        >
          <option selected disabled>Selectionner un horaire</option>
          <option
            v-for="cr in creneaus"
            :value="cr.Num_creneau"
            :key="cr.Num_creneau"
          >
            {{ cr.heure }}
          </option>
        </select>
      </div>

      <!-- motif input -->
      <div class="form-outline mb-4">
        <label class="form-label" for="Motif">Motif</label>
        <textarea
          class="form-control"
          id="form4Example3"
          rows="2"
          v-model="Motif"
        ></textarea>
      </div>

      <!-- Submit button -->
      <button
        type="submit"
        class="btn btn-success btn-block mb-4"
        @click.prevent="AddRdv"
      >
        ajouter un RV
      </button>
    </form>
    <table class="table table-success table-striped">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Creneau</th>
          <th scope="col">Motif</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="r in rdv" :key="r.Id_rdv">
          <th scope="row">{{ r.Date }}</th>
          <td>{{ r.heure }}</td>
          <td>{{ r.Motif }}</td>

          <td>
            <button
              type="submit"
              class="btn btn-danger"
              @click.prevent="del(r.Id_rdv)"
            >
              Delete
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
</template>

<script>
import axios from "axios";
import image from '../assets/loooo.jpg'
export default {
  name: "View",
  data() {
    return {
        image:image,
      reference: localStorage.getItem("reference"),
      Motif: "",
      day: "",
      heure: "",
      Num_creneau: "",
      rdv: [],
      Id_rdv: "",
      creneaus: [],
    };
  },

  methods: {
    ReadCreneau: function () {
      console.log(this.day);
      axios
        .post("http://localhost/A_Youcode/bref6_vuejs_mvc/Rendevou/Creneau", {
          Date: this.day,
        })
        .then(
          function (response) {
            this.creneaus = response.data;
          }.bind(this)
        );
    },

    AddRdv: function () {
      axios
        .post("http://localhost/A_Youcode/bref6_vuejs_mvc/Rendevou/add", {
          reference: this.reference,
          Motif: this.Motif,
          Date: this.day,
          Num_creneau: this.Num_creneau,
        })
        .then(
          function (response) {
            this.ReadRdv();
            this.ReadCreneau();
            console.log(response.data);
            console.log(Date);
          }.bind(this)
        );
      this.Num_creneau = "";
      this.Motif = "";
      this.day = "";
    },
    async ReadRdv() {
      this.reference = localStorage.getItem("reference");
      await axios
        .post("http://localhost/A_Youcode/bref6_vuejs_mvc/Rendevou/allredevou", {
          reference: this.reference,
        })
        .then(
          function (response) {
            this.rdv = response.data;
            console.log(response.data);
          }.bind(this)
        );
    },
    del(Id_rdv) {
      axios
        .post("http://localhost/A_Youcode/bref6_vuejs_mvc/Rendevou/delete", {
          Id_rdv: Id_rdv,
        })
        .then(
          function (response) {
            this.ReadRdv();

            alert(response.data.message);
          }.bind(this)
        );
    },
    Logout() {
      localStorage.clear();
      this.$router.push("/Login");
    },
  },
  mounted() {
    this.ReadRdv();
    this.ReadCreneau();
  },
};
</script>

<style></style>
