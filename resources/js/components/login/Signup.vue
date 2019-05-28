<template>
    <v-container>
        <v-card>
          <v-toolbar color="indigo darken-3" flat dark> 
            <v-toolbar-title>Devenir membre</v-toolbar-title> 
            <v-spacer></v-spacer>  
          </v-toolbar>
          <v-card-text>
            <v-form autocomplete="off" @submit.prevent="signup"> 
            <v-text-field box v-model="form.name" label="Nom" type="text" required></v-text-field>
            <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
            <v-text-field box  v-model="form.email" label="E-mail" type="email" required></v-text-field> 
            <span class="red--text" v-if="errors.email">{{ errors.email[0] }}</span>
            <v-text-field box v-model="form.password" label="Password"  type="password" autocomplete="off" required></v-text-field>
            <span class="red--text" v-if="errors.password">{{ errors.password[0] }}</span>
            <v-text-field box v-model="form.password_confirm" label="Password confirm"  type="password" autocomplete="off" required></v-text-field>
            <v-btn large dark color="indigo darken-4" type="submit">  S'inscrire </v-btn> 
            <router-link to="/login">
                <v-btn dark large color="green"> Déjà membre?</v-btn>
            </router-link>
        </v-form>
          </v-card-text>

        </v-card>
    </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: "",
        email: "",
        password: "",
        password_confirm: ""
      },
      errors: {}
    };
  },
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "forum" });
    }
  },
  methods: {
    signup() {
      axios
        .post("/api/auth/signup", this.form)
        .then(res => {
          this.responseAfterLogin(res);
          this.$router.push({ name: "forum" });
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>

<style>
</style>
