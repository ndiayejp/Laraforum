<template>
     <div>
        <toolbar></toolbar>
        <appfooter></appfooter>
     </div>
</template>

<script>
import toolbar from "./ToolBar.vue";
import appfooter from "./AppFooter.vue";
export default {
  components: { toolbar ,appfooter},
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
