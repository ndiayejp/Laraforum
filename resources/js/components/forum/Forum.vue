<template>
  <v-container fluid grid-list-md>
    <v-layout row wrap>
       <v-flex xs12>
          <app-sidebar></app-sidebar>
        </v-flex>
        <v-flex>
          <div class="layout row wrap">
              <question
                v-for="question in questions" 
                :key="question.path" 
                :data=question></question>
          </div>
        </v-flex> 
    </v-layout>
  </v-container>
</template>

<script>
import question from "./Question";
import AppSidebar from "./AppSidebar";
export default {
  data() {
    return {
      questions: {}
    };
  },
  components: {
    question,
    AppSidebar
  },
  created() {
    axios
      .get("/api/question")
      .then(res => (this.questions = res.data.data))
      .catch(error => console.log(error.response.data));
  }
};
</script>

<style>
</style>
