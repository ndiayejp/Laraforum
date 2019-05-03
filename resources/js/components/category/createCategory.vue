<template>
  <v-container>
      <v-card class="pl-2 pr-2 pt-2">
          <v-form @submit.prevent="submit"> 
            
                <v-text-field xs12 v-model="form.name" label="Titre" required></v-text-field> 
                <span class="red--text" v-if="errors.name">{{ errors.name[0] }}</span>
            
            <v-card-actions>
              <v-btn color="teal" type="submit" v-if="editSlug">  Modifier </v-btn> 
              <v-btn color="primary" type="submit" v-else>  créer une category </v-btn>   
            </v-card-actions> 
        </v-form>
      </v-card>
      <v-card class="mt-3">
       
        <v-toolbar color="blue" dark> 
          <v-toolbar-title>Categories</v-toolbar-title> 
          <v-spacer></v-spacer> 
        </v-toolbar>
         <v-progress-circular
            :size="50"
            :width="7"
            color="red"
            indeterminate
            v-if="loading"
          ></v-progress-circular>
        <v-list> 
           <v-list-tile v-for="(category,index) in categories" :key="category.id">
                <v-list-tile-action>
                  <v-btn icon small @click="edit(index)">
                    <v-icon color="blue">edit</v-icon>
                  </v-btn>
                </v-list-tile-action>
                <v-list-tile-content>
                    <v-list-tile-title>{{ category.name }}</v-list-tile-title>
                </v-list-tile-content>
                <v-list-tile-action>
                  <v-btn icon small @click="destroy(category)">
                    <v-icon color="red">delete</v-icon>
                  </v-btn>
                </v-list-tile-action>
           </v-list-tile>
         </v-list>

      </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        name: null
      },
      errors: {},
      categories: {},
      editSlug: null,
      loading: true
    };
  },
  created() {
    if (!User.admin()) {
      return $router.push("/forum");
    }
    axios
      .get("/api/category")
      .then(res => {
        this.categories = res.data.data;
        this.loading = false;
      })
      .catch(error => console.log(error.response.data.error));
  },
  methods: {
    submit() {
      this.editSlug ? this.update() : this.create();
    },
    create() {
      axios.post("/api/category", this.form).then(res => {
        this.categories.unshift({
          name: this.form.name
        });
        this.form.name = null;
      });
    },
    update() {
      axios.patch(`/api/category/${this.editSlug}`, this.form).then(res => {
        this.categories.unshift({
          name: this.form.name
        });
        this.form.name = null;
        this.editSlug = null;
      });
    },
    destroy(category, index) {
      axios
        .delete("/api/category/" + category.slug)
        .then(res =>
          this.categories.splice(this.categories.indexOf(category), 1)
        );
    },
    edit(index) {
      this.form.name = this.categories[index].name;
      this.editSlug = this.categories[index].slug;
      this.categories.splice(index, 1);
    }
  }
};
</script>

<style>
</style>
