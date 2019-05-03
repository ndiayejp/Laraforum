<template>
    <div>
        <markdown-editor v-model="reply.reply"></markdown-editor>
        <v-btn dark color="green" @click="update">
             Enregistrer
        </v-btn>
        <v-btn dark color="red" @click="cancel">
             Annuler
        </v-btn>
    </div>
</template>

<script>
export default {
  data() {
    return {
      body: ""
    };
  },
  props: ["reply"],
  methods: {
    cancel() {
      eventBus.$emit("cancelEdit");
    },
    update() {
      console.log(this.reply);
      axios
        .patch(
          `/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,
          { body: this.reply.reply }
        )
        .then(res => this.cancel())
        .catch(err => console.log(err.response.data.errors));
    }
  }
};
</script>

<style>
</style>
