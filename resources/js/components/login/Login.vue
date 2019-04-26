<template>
 <v-container>
  <v-form ref="form"  @submit.prevent="login">
      
    <v-text-field v-model="form.email" label="E-mail" type="email" required></v-text-field>

    <v-text-field
      v-model="form.password"
      label="Mot de passe"
      type = "password"
      required
    ></v-text-field>

    <v-btn   color="success" type="submit">  Se connecter </v-btn>

  </v-form>
  </v-container>
</template>


<script>
    export default {
        data(){
            return {
               form:{
                   email:'',
                   password:''
               }
            }
        },
        methods: {
            login() {
                axios.post('/api/auth/login',this.form)
                .then((response)=>{

                })
                .catch((error)=>{
                    console.log(error.response.data)
                })
            },
        },
    }
</script>

<style>
    
</style>