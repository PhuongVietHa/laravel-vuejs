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
                        <router-link to="/">Home</router-link>
                        <router-link to="/reservation">Reservation</router-link>
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
