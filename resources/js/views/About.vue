<template>
<div id="about" class="section">
    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">

            <!-- section header -->
            <div class="section-header text-center">
                <h4 class="sub-title">About Us</h4>
                <h2 class="title">The Risotto Restaurant</h2>
            </div>
            <!-- /section header -->

            <!-- about content -->
            <div class="col-md-5">
                <h4 class="lead">Welcome to Risotto Restaurant. Since 1988, Offering Traditional Dishes of the highest quality.</h4>
            </div>
            <!-- /about content -->

            <!-- about content -->
            <div class="col-md-7">
                <p>Te sit stet labitur veritus, sea similique consetetur ut. Ne fastidii oportere usu. Iusto mediocrem iudicabit ea eos, nemore offendit detraxit ei cum. Oblique conclusionemque qui cu, eum no sonet putant. Eos cu nulla vidisse. Mazim oporteat eam ex, his ei audiam audire, affert corrumpit pri cu.</p>
            </div>
            <!-- /about content -->

            <!-- Gallery Slider -->
            <div class="col-md-12">
                <div id="Gallery" class="owl-carousel owl-theme">

                    <!-- single column -->
                    <div class="Gallery-item">

                        <!-- single image -->
                        <div class="Gallery-img" style="background-image:url(assets/img/image01.jpg)"></div>
                        <!-- /single image -->

                    </div>
                    <!-- single column -->

                    <!-- single column -->
                    <div class="Gallery-item">

                        <!-- single image -->
                        <div class="Gallery-img" style="background-image:url(assets/img/image02.jpg)"></div>
                        <!-- /single image -->

                        <!-- single image -->
                        <div class="Gallery-img" style="background-image:url(assets/img/image03.jpg)"></div>
                        <!-- /single image -->

                    </div>
                    <!-- single column -->

                    <!-- single column -->
                    <div class="Gallery-item">

                        <div class="item-column">
                            <!-- single image -->
                            <div class="Gallery-img" style="background-image:url(assets/img/image04.jpg)"></div>
                            <!-- /single image -->

                            <!-- single image -->
                            <div class="Gallery-img" style="background-image:url(assets/img/image05.jpg)"></div>
                            <!-- /single image -->
                        </div>

                        <div class="item-column">
                            <!-- single image -->
                            <div class="Gallery-img" style="background-image:url(assets/img/image06.jpg)"></div>
                            <!-- /single image -->

                            <!-- single image -->
                            <div class="Gallery-img" style="background-image:url(assets/img/image07.jpg)"></div>
                            <!-- /single image -->
                        </div>

                    </div>
                    <!-- /single column -->

                </div>
            </div>
            <!-- /Gallery Slider -->


        </div>
        <!-- /row -->

    </div>
    <!-- /container -->
</div>
</template>

<script>
export default {
    name: "About",
    mounted:function(){
        this.installOwlCarousel()
    },
    methods:{
        installOwlCarousel(){
            $('.owl-carousel').owlCarousel({
                items:2,
                loop:true,
                margin:0,
                dots : false,
                nav: true,
                navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                autoplay : true,
                responsive:{
                    0: {
                        items:1
                    },
                    992:{
                        items:2
                    }
                }
            });
            $('.owl-carousel').removeClass("owl-hidden");
        },
    }
};
</script>

<style scoped>
</style>
