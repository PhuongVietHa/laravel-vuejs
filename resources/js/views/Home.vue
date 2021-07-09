<!-- <template v-slot:activator="{ on }"> -->
<template>
<div id="home" class="section">
    <div class="bg-image bg-parallax overlay" style="background-image:url(assets/img/background02.jpg)"></div>

    <div class="home-wrapper">
        <div class="container text-center">
            <div class="home-content">
                <h1 class="white-text">Welcome To Risotto Restaurant</h1>
                <h4 class="white-text lead">Nec solet elaboraret eu, ea usu vidit accusam. Ea per legimus singulis percipitur. Graecis ullamcorper nec ex, vix euismod detraxit voluptaria at.</h4>
                <router-link to="/menu" class="nav-link"><button class="main-button">Discover Menu</button></router-link>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Home",
}
</script>

<style scoped>
</style>
