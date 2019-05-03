<template>
  <v-toolbar>
    <v-toolbar-title><router-link to="/">LaraForum</router-link></v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">  
      <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
        <v-btn flat>{{ item.title }}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>


<script>
export default {
  data() {
    return {
      items: [
        { title: "Forum", to: "/forum", show: true },
        { title: "Login", to: "/login", show: !User.loggedIn() },
        { title: "Ask question", to: "/ask", show: User.loggedIn() },
        { title: "Category", to: "/category", show: User.admin() },
        { title: "Logout", to: "/logout", show: User.loggedIn() }
      ]
    };
  },
  created() {
    eventBus.$on("logout", () => {
      User.logout();
    });
  }
};
</script>

<style>
.application a {
  text-decoration: none;
}
</style>
