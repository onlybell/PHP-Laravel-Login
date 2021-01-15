import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Profile from "./components/Profile";
import Login from "./components/Login";

const routes = [
    {
        name: "profile",
        path: "/profile",
        component: Profile
    },
    {
        name: "login",
        path: "/login",
        component: Login
    },
    
    {
        name: "web",
        path: "/",
        component: Login
    },
];
 
export default new vueRouter({
    mode: "history",
    routes 
});
