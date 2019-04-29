import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from "../components/login/Login"
import About from "../components/About"

const routes = [{
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/about',
        component: About
    }
]


const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    hashbang: false

});

export default router
