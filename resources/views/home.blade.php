<!DOCTYPE html>
<html>
<head>
  <title>Forum App</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>
<body>
  <div id="app">
    
    <v-app>
       <app-home></app-home>
    </v-app>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
   <script>
    import App from "./AppHome.vue";
    new Vue({ el: '#app',render: h => h(App) })
  </script>
</body>
</html>