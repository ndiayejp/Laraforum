<template>
  <div>
    <div v-if="question">
        <edit-question v-if="editing" :data=question></edit-question> 
        <show-question :data=question  v-else></show-question>
        <v-container>
          <replies :question="question"></replies>
          <new-reply v-if="loggedIn" :questionSlug="question.slug"></new-reply>
          <div v-else>
            <router-link to="/login">
                <v-btn dark large color="green"> Login to reply?</v-btn>
            </router-link>
          </div>
        </v-container>
     </div>
  </div>
</template>

<script>
import showQuestion from "./showQuestion";
import EditQuestion from "./editQuestion";
import Replies from "../reply/replies";
import NewReply from "../reply/newReply";
export default {
  components: { showQuestion, EditQuestion, Replies, NewReply },
  data() {
    return {
      question: null,
      editing: false
    };
  },
  computed: {
    loggedIn() {
      return User.loggedIn();
    }
  },
  created() {
    this.listen();
    this.getQuestion();
  },
  methods: {
    listen() {
      eventBus.$on("startEditing", () => {
        this.editing = true;
      });
      eventBus.$on("cancelEditing", () => {
        this.editing = false;
      });
    },
    getQuestion() {
      axios
        .get(`/api/question/${this.$route.params.slug}`)
        .then(res => (this.question = res.data.data))
        .catch(error => console.log(error.response.data));
    }
  }
};
</script>

<style>
</style>
