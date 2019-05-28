<template>
  <v-toolbar dark flat color="blue darken-1">
    <v-toolbar-title><router-link to="/"><h3 class="logo">LaraForum</h3></router-link></v-toolbar-title>
    <v-spacer></v-spacer>
    <app-notification v-if="loggedIn"></app-notification>
    <div class="hidden-sm-and-down">  
      
      <router-link v-for="item in items" :key="item.title" :to="item.to" v-if="item.show">
        <v-btn flat>{{ item.title }}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>


<script>
import AppNotification from "./AppNotification";
export default {
  data() {
    return {
      items: [
        { title: "Forum", to: "/forum", show: true },
        { title: "About", to: "/about", show: true },
        { title: "Login", to: "/login", show: !User.loggedIn() },
        { title: "Ask question", to: "/ask", show: User.loggedIn() },
        { title: "Category", to: "/category", show: User.admin() },
        { title: "Logout", to: "/logout", show: User.loggedIn() }
      ],
      loggedIn: User.loggedIn()
    };
  },
  components: { AppNotification },
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
a h3.logo {
  color: #fff !important;
}
</style>
