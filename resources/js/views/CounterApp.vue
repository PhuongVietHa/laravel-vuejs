<template>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <img alt="Vue logo" src="assets/logo.png" />
            <div :style="{ color: colorCode }" class="counter">
                {{ counter }}
            </div>
            <div class="counter-squared">
                {{ counter }}
                <sup>2</sup> =
                {{ $store.getters.counterSquared }}
            </div>
            <div class="counter-btn">
                <button @click="decreaseCounter">-</button>
                <button @click="increaseCounter">+</button>
            </div>
            <div>
                <input
                    v-model="colorCode"
                    placeholder="Enter color code"
                    type="text"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        counter() {
            return this.$store.getters["counter/counter"];
        },
        colorCode: {
            get() {
                return this.$store.getters["counter/colorCode"];
            },
            set(newValue) {
                this.$store.commit("counter/setColorCode", newValue);
            },
        },
    },
    methods: {
        decreaseCounter() {
            this.$store.dispatch("counter/decreaseCounter");
        },
        increaseCounter() {
            this.$store.dispatch("counter/increaseCounter");
        },
    },
};
</script>

<style scoped>
div {
    margin-bottom: 10px;
}

.counter {
    font-size: 80px;
}

.counter-btn button {
    font-size: 30px;
    width: 100px;
    margin: 0 10px;
}
</style>
