<template>
    
        <v-container>
          <v-card>
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">{{ data.title }}</h3>
            <div class="grey--text"> {{ data.user }}  <strong>demande</strong>  {{ data.created_at }} </div>
          </div>
          <v-spacer></v-spacer>
        <v-btn color="red" dark>{{ replyCount}} reponses</v-btn>
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
         </v-card>
         <v-divider></v-divider>
        </v-container>
   
</template>

<script>
export default {
  data() {
    return {
      owner: User.owner(this.data.user_id),
      replyCount: this.data.reply_count
    };
  },
  props: ["data"],
  computed: {
    body() {
      return md.parse(this.data.body);
    }
  },
  created() {
    eventBus.$on("newReply", () => {
      this.replyCount++;
    });
    eventBus.$on("deleteReply", () => {
      this.replyCount--;
    });

    Echo.private("App.User." + User.id()).notification(notification => {
      this.replyCount++;
    });

    Echo.channel("deleteReplyChannel").listen("DeleteReplyEvent", e => {
      this.replyCount--;
    });
  },
  methods: {
    destroy() {
      axios
        .delete(`/api/question/${this.data.slug}`)
        .then(res => this.$router.push("/forum"))
        .catch(error => console.log(error.response.data.errors));
    },
    edit() {
      eventBus.$emit("startEditing");
    }
  }
};
</script>

<style>
</style>
