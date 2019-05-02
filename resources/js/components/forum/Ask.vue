<template>
    <v-container>
        <v-form autocomplete="off" @submit.prevent="create"> 
            <v-text-field v-model="form.title" label="Titre" required></v-text-field> 
             <v-select
                v-model="form.category_id"
                :items="categories"
                item-text="name"
                item-value="id"
                label="Categorie"
                autocomplete
             ></v-select>
             <markdown-editor v-model="form.body"></markdown-editor>
            <v-btn   color="primary" type="submit">  créer une question </v-btn>  
        </v-form>
    </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: "",
        category_id: "",
        body: ""
      },
      categories: {},
      errors: {}
    };
  },
  methods: {
    create() {
      axios
        .post("/api/question", this.form)
        .then(res => this.$router.push(res.data.path))
        .catch(err => (this.errors = err.response.data.error));
    }
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
