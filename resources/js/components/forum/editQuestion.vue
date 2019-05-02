<template>
     <v-container>
        <v-form @submit.prevent="update"> 
            <v-text-field v-model="form.title" label="Titre" required></v-text-field> 
             
             <markdown-editor v-model="form.body"></markdown-editor>
             <v-card-actions>
                 <v-btn   color="primary" type="submit"> confirmer </v-btn>  
                 <v-btn  type="submit" @click="cancel"> Annuler </v-btn>  
             </v-card-actions>
        </v-form>
    </v-container>
</template>

<script>
export default {
  data() {
    return {
      form: {
        title: null,
        body: null
      }
    };
  },
  props: ["data"],
  mounted() {
    this.form = this.data;
  },
  methods: {
    cancel() {
      eventBus.$emit("cancelEditing");
    },
    update() {
      axios
        .patch(`/api/question/${this.data.slug}`, this.form)
        .then(res => this.cancel())
        .catch(error => console.log(error.response.data.error));
    }
  }
};
</script>

<style>
</style>