<template>
    <div>
        <nav-header />
        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>
        <base-footer />
    </div>
</template>

<script>
export default {
    name: "App",
    components: {
        "nav-header": require("@/components/NavHeader.vue").default,
        "base-footer": require("@/components/BaseFooter.vue").default,
    },
};
</script>

<style>
/* route transitions */
.fade-enter-from {
    opacity: 0;
    transform: translateX(100px);
}
.fade-enter-active {
    transition: all 0.3s ease-out;
}
.fade-leave-to {
    opacity: 0;
    transform: translateX(-100px);
}
.fade-leave-active {
    transition: all 0.3s ease-in;
}
</style>
