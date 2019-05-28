<template>
    <v-container>
      <v-card>
        <v-toolbar color="indigo darken-3" flat dark> 
          <v-toolbar-title>Connexion</v-toolbar-title> 
          <v-spacer></v-spacer>  
        </v-toolbar>
        <v-card-text>
          <v-form autocomplete="off" @submit.prevent="signin"> 
            <v-text-field box  v-model="form.email" label="E-mail" type="email" required></v-text-field> 
            <v-text-field box v-model="form.password" label="Password"  type="password" autocomplete="off" required></v-text-field>
            <v-btn   large color="primary" type="submit">  Se connecter </v-btn> 
            <router-link to="/signup">
                <v-btn large dark color="red">  Devenir membre ?</v-btn>
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
      errors: {},
      form: {
        email: "",
        password: ""
      }
    };
  },
  created() {
    if (User.loggedIn()) {
      this.$router.push({ name: "forum" });
    }
  },
  methods: {
    signin() {
      User.login(this.form);
    }
  }
};
</script>

<style>
</style>