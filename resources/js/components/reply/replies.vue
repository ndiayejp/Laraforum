<template>
    <div>
        <reply v-for="(reply,index) in content" :key="reply.id" :data="reply" v-if="question" :index="index"></reply>
    </div>
</template>

<script>
import Reply from "./reply";
export default {
  data() {
    return {
      content: this.question.replies
    };
  },
  props: ["question"],
  components: { Reply },
  created() {
    this.listen();
  },
  methods: {
    listen() {
      eventBus.$on("newReply", reply => {
        this.content.unshift(reply);
        window.scrollTo(0, 0);
      });
      eventBus.$on("deleteReply", index => {
        axios
          .delete(
            `/api/question/${this.question.slug}/reply/${
              this.content[index].id
            }`
          )
          .then(res => {
            this.content.splice(index, 1);
          })
          .catch(err => console.log(err.response.data.errors));
      });

      Echo.private("App.User." + User.id()).notification(notification => {
        this.content.unshift(notification.reply);
      });

      Echo.channel("deleteReplyChannel").listen("DeleteReplyEvent", e => {
        for (let index = 0; index < this.content.lenght; index++) {
          if (this.content[index].id == e.id) {
            this.content.splice(index, 1);
          }
        }
      });
    }
  }
};
</script>

<style>
</style>
