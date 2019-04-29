<template>
    <v-container>
        <v-form autocomplete="off" @submit.prevent="signin"> 
            <v-text-field v-model="form.email" label="E-mail" type="email" required></v-text-field> 
            <v-text-field v-model="form.password" label="Password"  type="password" autocomplete="off" required></v-text-field>
            <v-btn color="success" type="submit">  Se connecter </v-btn> 
        </v-form>
    </v-container>
</template>


<script>
export default {
  data() {
    return {
      errors: [],
      form: {
        email: "",
        password: ""
      }
    };
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