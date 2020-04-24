<template>
    <div class="container-fluid">
        <div class="arrow_slider_bcg">
            <!--        data-ride="carousel"-->
                <div id="carouselExampleSlidesOnly" class="carousel slide">
                    <div class="carousel-inner">

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
        props: {
            slider_generator:{
                type:String,
                required:true,
            }
        },
        methods: {
            simpleParallaxRun : function() {

            }
        },
        beforeMount() {
            this.simpleParallaxRun();
        },
        mounted() {
            console.log('Component mounted.');
            $(".carousel-inner").append(this.$props.slider_generator);
        }
    }
</script>
