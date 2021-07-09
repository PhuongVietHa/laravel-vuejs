<template>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="copyright">
                        Copyright @2018 All rights reserved | This template is made
                        with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </span>
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <router-link :to="{ name: 'Home' }">Home</router-link>
                        <router-link to="/about">About</router-link>
                        <router-link to="/menu">Menu</router-link>
                        <router-link to="/reservation">Reservation</router-link>
                        <router-link to="/events">Events</router-link>
                        <router-link to="/contact">Contact</router-link>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "BaseFooter",
};
</script>
