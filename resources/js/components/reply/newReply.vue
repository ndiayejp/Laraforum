<template> 
   <div>
        <v-card>
            <v-card-text>
                <markdown-editor v-model="body"></markdown-editor>
                <v-btn dark color="green" @click="submit">Envoyer</v-btn>
            </v-card-text>
        </v-card>
         <v-snackbar
            v-model="snackbar"
            :bottom="y === 'bottom'"
            :left="x === 'left'"
            :multi-line="mode === 'multi-line'"
            :right="x === 'right'"
            :timeout="timeout"
            :top="y === 'top'"
            :vertical="mode === 'vertical'"
            >
            {{ text }}
            <v-btn color="green" flat @click="snackbar = false">
                Fermer
            </v-btn>
    </v-snackbar>
   </div>
</template>

<script>
export default {
  props: ["questionSlug"],
  data() {
    return {
      body: "",
      snackbar: false,
      text: "",
      y: "top",
      x: null,
      mode: "",
      timeout: 6000
    };
  },
  methods: {
    submit() {
      axios
        .post(`/api/question/${this.questionSlug}/reply`, { body: this.body })
        .then(res => {
          this.snackbar = true;
          this.text = "Merci! votre réponse a été ajoutée";
          this.body = "";
          eventBus.$emit("newReply", res.data.reply);
        })
        .catch(err => console.log(err.response.data.errors));
    }
  }
};
</script>

<style>
</style>
