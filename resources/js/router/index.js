import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        name: "Home",
        component: () => import("@/views/Home.vue"),
    },
    {
        path: "/about",
        name: "About",
        component: () => import("@/views/About.vue"),
    },
    {
        path: "/menu",
        name: "Menu",
        component: () => import("@/views/Menu.vue"),
    },
    {
        path: "/reservation",
        name: "Reservation",
        component: () => import("@/views/Reservation.vue"),
    },
    {
        path: "/events",
        name: "Events",
        component: () => import("@/views/Events.vue"),
    },
    {
        path: "/contact",
        name: "Contact",
        component: () => import("@/views/Contact.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        redirect: "/",
    },
    //   {
    //     path: "/counter-app",
    //     name: "CounterApp",
    //     component: () =>
    //       import("@/views/CounterApp.vue"),
    //   },
];

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
});

export default router;
