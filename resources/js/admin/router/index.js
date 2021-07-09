import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "Dashboard",
        component: () => import("@/admin/views/Dashboard.vue"),
    },
    {
        path: "/reservation",
        name: "Reservation",
        component: () => import("@/admin/views/Reservation.vue"),
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("@/admin/views/Login.vue"),
    },
    {
        path: "/register",
        name: "Register",
        component: () => import("@/admin/views/Register.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        redirect: "/",
    },
];

const router = createRouter({
    history: createWebHistory("/admin/"),
    routes
});

router.beforeEach(async (to, from, next) => {
    const exceptionName = ['Login', 'Register']
    if(!exceptionName.some(routeName => to.name === routeName) 
        && !window.Laravel.isLoggedin)
        next({ name: 'Login' })
    else next()
})

export default router;
