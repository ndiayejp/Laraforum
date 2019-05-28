<template>
  <div> 
      <v-toolbar color="cyan" dark> 
        <v-toolbar-title>Categories</v-toolbar-title> 
        <v-spacer></v-spacer>  
      </v-toolbar>
          
      <div class="layout row wrap">
        <div class="flex lg2 sm6 xs12" v-for="category in categories" :key="category.id">
            <div class="text-sm-center"><v-btn dark block large color="teal">{{ category.name }}</v-btn></div>
        </div>
      </div> 
  </div>
</template>

<script>
export default {
  data() {
    return {
      categories: {}
    };
  },
  created() {
    axios
      .get("/api/category")
      .then(res => (this.categories = res.data.data))
      .catch(error => console.log(error.response.data.error));
  }
};
</script>

<style>
</style>
