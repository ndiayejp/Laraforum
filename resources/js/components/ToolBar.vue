<template>
  <v-toolbar>
    <v-toolbar-title>LaraForum</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link to="/forum">
         <v-btn flat><v-icon large color="blue darken-2">chat</v-icon> Forum</v-btn>
      </router-link>
      <v-btn flat>
        <v-icon large color="blue darken-2">edit</v-icon> Je pose une question</v-btn>
      <v-btn flat> <v-icon large color="blue darken-2">reorder</v-icon>Ajouter une catégorie</v-btn>
      <router-link to="/login">
        <v-btn flat>Connexion</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>


<script>
export default {};
</script>

<style>
  .application a{
    text-decoration:none;
  }
</style>
