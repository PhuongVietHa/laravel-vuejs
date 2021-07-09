<template>
    <nav-header />
    <div class="container section">
        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>
    </div>
    <base-footer />
</template>

<script>
export default {
    name: "App",
    components: {
        "nav-header": require("@/admin/components/NavHeader.vue").default,
        "base-footer": require("@/admin/components/BaseFooter.vue").default,
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
