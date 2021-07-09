<template>
    <!-- Header -->
    <header id="header">
        <!-- Top nav -->
        <div id="top-nav">
            <div class="container">
                <!-- logo -->
                <div class="logo">
                    <router-link to="/" class="nav-link"
                        ><img src="/assets/logo.png" alt="logo"
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
            </div>
        </div>
        <!-- /Top nav -->

        <!-- Bottom nav -->
        <div id="bottom-nav">
            <div class="container">
                <nav id="nav" v-if="isLoggedIn">
                    <ul class="main-nav nav navbar-nav w-100">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link" >Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/reservation" class="nav-link" >Reservation</router-link>
                        </li>
                        <li class="nav-item" id="logout-btn">
                            <a class="nav-link" style="cursor: pointer;" @click="logout">Logout</a>
                        </li>
                    </ul>
                </nav>
                <nav id="nav" v-else>
                    <ul class="main-nav nav navbar-nav w-100">
                        <li class="nav-item">
                            <router-link to="/login" class="nav-link" >Login</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/register" class="nav-link" >Register</router-link>
                        </li>
                    </ul>
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
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        window.addEventListener("scroll", function () {
            $(this).scrollTop() > $(".banner-area").height()
                ? $("#header").addClass("fixed")
                : $("#header").removeClass("fixed");
        });

        window.addEventListener("load", function () {
            $("#preloader").delay(600).fadeOut();
        });
        
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        };
    },
    methods: {
        mobile_toggle() {
            $("#header").toggleClass("nav-collapse");
        },
        logout(e) {
            e.preventDefault()
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post(process.env.MIX_BASE_URL+'/api/admin/logout')
                    .then(response => {
                        if (response.status !== 200 || response.data.error) {
                            this.displaySuccessError(response);
                        } else {
                            window.location.reload()
                        }
                    })
                    .catch(function (error) {
                        this.displayErrors(error);
                    });
            })
        }
    },
};
</script>
