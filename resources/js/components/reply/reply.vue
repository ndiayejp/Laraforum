<template>
    <div>
        <v-card class="mb-2">
            <v-card-title>
                <div class="headline">{{ data.user }}</div>
                <div class="ml-2">a répondu il ya {{ data.created_at }}</div>
            </v-card-title>
           
            <edit-reply v-if="editing" :reply=data></edit-reply>
            <v-card-text v-html="reply" v-else> </v-card-text>
            <div v-if="!editing">
              <v-card-actions v-if="own">
                <v-btn icon @click="edit">
                    <v-icon color="blue">edit</v-icon>
                </v-btn>
                <v-btn icon @click="destroyReply">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import editReply from "./editReply";

export default {
  data() {
    return {
      editing: false
    };
  },
  created() {
    this.listen();
  },
  components: { editReply },
  props: ["data", "index"],
  computed: {
    own() {
      return User.owner(this.data.user_id);
    },
    reply() {
      return md.parse(this.data.reply);
    }
  },
  methods: {
    destroyReply() {
      eventBus.$emit("deleteReply", this.index);
    },
    edit() {
      this.editing = true;
    },
    listen() {
      eventBus.$on("cancelEdit", () => {
        this.editing = false;
      });
    }
  }
};
</script>

<style>
</style>
