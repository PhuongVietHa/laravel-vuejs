<template>
    <!-- Header -->
    <header id="header">
        <!-- Top nav -->
        <div id="top-nav">
            <div class="container">
                <!-- logo -->
                <div class="logo">
                    <router-link to="/" class="nav-link"
                        ><img src="assets/img/logo.png" alt="logo"
                    /></router-link>
                </div>
                <!-- logo -->

                <!-- Mobile toggle -->
                <button
                    @click="mobile_toggle"
                    class="navbar-toggle"
                >
                    <span></span>
                </button>
                <!-- Mobile toggle -->

                <!-- social links -->
                <ul class="social-nav">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
                <!-- /social links -->
            </div>
        </div>
        <!-- /Top nav -->

        <!-- Bottom nav -->
        <div id="bottom-nav">
            <div class="container">
                <nav id="nav">
                    <!-- nav -->
                    <ul class="main-nav nav navbar-nav w-100">
                        <li class="nav-item">
                            <router-link
                                :to="{ name: 'Home' }"
                                class="nav-link"
                                >Home</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/about" class="nav-link"
                                >About</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/menu" class="nav-link"
                                >Menu</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                to="/reservation"
                                class="nav-link"
                                >Reservation</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/events" class="nav-link"
                                >Events</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link to="/contact" class="nav-link"
                                >Contact</router-link
                            >
                        </li>
                    </ul>
                    <!-- /nav -->

                    <!-- button nav -->
                    <ul class="cta-nav">
                        <li>
                            <router-link to="/reservation" class="main-button">
                                Reserve
                            </router-link>
                        </li>
                    </ul>
                    <!-- button nav -->

                    <!-- contact nav -->
                    <ul class="contact-nav nav navbar-nav">
                        <li>
                            <a href="tel:0455481497"
                                ><i class="fa fa-phone"></i>
                                045-548-14-97</a
                            >
                        </li>
                        <li>
                            <a href="#"
                                ><i class="fa fa-map-marker"></i> 3685
                                Granville Lane</a
                            >
                        </li>
                    </ul>
                    <!-- contact nav -->
                </nav>
            </div>
        </div>
        <!-- /Bottom nav -->
        <!-- Preloader -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- /Preloader -->
    </header>
</template>

<script>
export default {
    name: "NavHeader",
    created() {
        window.addEventListener("scroll", function () {
            $(this).scrollTop() > $("#top-nav").height()
                ? $("#header").addClass("fixed")
                : $("#header").removeClass("fixed");
        });
        window.addEventListener("load", function () {
            $("#preloader").delay(600).fadeOut();
        });
    },
    methods: {
        // Mobile Toggle Btn
        mobile_toggle() {
            $("#header").toggleClass("nav-collapse");
        },
    },
};
</script>
