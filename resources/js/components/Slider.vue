<template>
    <div class="container-fluid">
        <div class="arrow_slider_bcg">
            <!--        data-ride="carousel"-->
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img class="d-block thumbnail"  src="https://www.ecopetit.cat/wpic/mpic/5-54534_batman-wallpaper-hd-4k.jpg" width="100%" alt="First slide">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_desc_box">
                                    <div class="slider_desc_header">
                                        <span>BATMAN 2</span>
                                    </div>
                                    <a href="#">
                                        <div class="slider_button">
                                            <span>SPRAWDŹ TERAZ</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <img class="d-block thumbnail" src="https://www.ecopetit.cat/wpic/mpic/5-54534_batman-wallpaper-hd-4k.jpg" width="100%" alt="First slide">
                            <div class="carousel-caption d-md-block">
                                <div class="slider_desc_box">
                                    <div class="slider_desc_header">
                                        <span>BATMAN</span>
                                    </div>
                                    <a href="#">
                                        <div class="slider_button">
                                            <span>SPRAWDŹ TERAZ</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>

        </div>
    </div>
</template>
<script>
    export default {
        methods: {
            simpleParallaxRun : function() {

            }
        },
        beforeMount() {
            this.simpleParallaxRun();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
