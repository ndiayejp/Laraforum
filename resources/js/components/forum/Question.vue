<template>
    <div class="flex lg4 sm6 xs12">
        <v-card class="mb-4"> 
            <v-card-title primary-title>
            <div>
                <h3 class="headline mb-0">
                    <router-link :to="data.path">
                       {{ data.title }}
                    </router-link>
                </h3>
                <div class="grey--text">{{ data.user }} / {{ data.created_at }}</div>
                <div>{{ data.category }}</div>
            </div>
            </v-card-title> 
        </v-card>
    </div>
 </template>

<script>
export default {
  props: ["data"],
  computed: {
    body() {
      return md.parse(this.data.body);
    }
  }
};
</script>

<style>
.headline a {
  color: #333 !important;
  text-decoration: none;
  font-weight: 500;
  font-size: 24px;
}
</style>
