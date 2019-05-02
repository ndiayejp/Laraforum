import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from "../components/login/Login"
import About from "../components/About"
import Signup from "../components/login/Signup"
import Forum from "../components/forum/Forum"
import Category from "../components/forum/Category"
import Ask from "../components/forum/Ask"
import Logout from "../components/login/Logout"
import Read from "../components/forum/Read"
const routes = [{
        path: '/login',
        component: Login,
        name: 'login'
    },
    {
        path: '/about',
        component: About
    }, {
        path: "/signup",
        component: Signup
    },
    {
        path: "/forum",
        component: Forum,
        name: 'forum'
    },
    {
        path: "/ask",
        component: Ask,
        name: 'ask'
    },
    {
        path: "/category",
        component: Category,
        name: "category"
    },
    {
        path: '/logout',
        component: Logout
    },
    {
        path: "/question/:slug",
        component: Read,
        name: "read"
    }
]


const router = new VueRouter({
    routes,
    mode: 'history',
    history: true,
    hashbang: false

});

export default router
