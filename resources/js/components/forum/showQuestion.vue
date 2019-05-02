<template>
    <v-card>
        <v-container fluid>
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{ data.title }}</h3>
            <div class="grey--text"> {{ data.user }}  <strong>demande</strong>  {{ data.created_at }} </div>
          </div>
          <v-spacer></v-spacer>
        <v-btn color="red">5 replies</v-btn>
        </v-card-title>
        <v-card-text v-html="body"></v-card-text>
        <v-card-actions v-if="owner">
          <v-btn icon @click="edit">
            <v-icon color="blue">
              edit
            </v-icon>
          </v-btn>
          <v-btn icon @click="destroy">
            <v-icon color="red">
              delete
            </v-icon>
          </v-btn>
        </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>
export default {
  data() {
    return {
      owner: User.owner(this.data.user_id)
    };
  },
  props: ["data"],
  computed: {
    body() {
      return md.parse(this.data.body);
    }
  },
  methods: {
    destroy() {
      axios
        .delete(`/api/question/${this.data.slug}`)
        .then(res => this.$router.push("/forum"))
        .catch(error => console.log(error.response.data.error));
    },
    edit() {
      eventBus.$emit("startEditing");
    }
  }
};
</script>

<style>
</style>
