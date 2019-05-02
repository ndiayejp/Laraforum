<template>
  <div>
    <div v-if="question">
     <edit-question v-if="editing" :data=question></edit-question> 
        <show-question :data=question  v-else></show-question>
     </div>
  </div>
</template>

<script>
import showQuestion from "./showQuestion";
import EditQuestion from "./editQuestion";
export default {
  components: { showQuestion, EditQuestion },
  data() {
    return {
      question: null,
      editing: false
    };
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
