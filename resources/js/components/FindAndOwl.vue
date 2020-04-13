<template>
    <div class="container-fluid">
        <div class="find_bike_bcg">

            <div class="container">

                <div class="find_bike_box">
                    <div>
                        <h1>ZNAJDŹ FILM</h1>
                    </div>

                    <div class="search_bike_box">
                        <!--                    <form action="/" method="POST">-->
                        <div class="search_options_box">

                            <div class="row m-0">

                                <div class="col-lg-4 col-md-12 p-0 search_type search_type_max_wd450">
                                    <span>Kategoria:</span><br>
                                    <select class="form_control select_mainpage select2" id="select_cat">
                                        <option>Akcji</option>
                                        <option>Komedie</option>
                                        <option>Przygodowe</option>
                                    </select>
                                </div>

                                <div class="col-lg-4 col-md-12 p-0 search_type">
                                    <span>Film:</span><br>
                                    <select class="form_control select_mainpage select2" id="select_mov" >
                                        <option>Jakiś film</option>
                                    </select>

                                </div>

                                <div class="col-lg-4 col-md-12 p-0 search_type">
                                    <div class="search_button_box">
                                        <div class="search_button" style="overflow: hidden;">
                                            <input type="submit" class="submit_form_search_button" value="">
                                            <i class="fal fa-search"></i>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    <!--                </form>-->
                </div>

            </div>


            <div class="owl_carousel_box_big">
                <div class="button_owl_prev"><i class="fas fa-caret-left"></i></div>
                <div class="owl_carousel_box">
                    <div class="owl-carousel pt100">
                        <div class="category_box">
                            <a href="/">

                                <div class="category_box_header">
                                    <span>AKCJI</span>
                                </div>


                                <div class="category_box_photo">
                                    <img src="/images/cat_action.png" height="100%" class="owl_photo">
                                </div>

                            </a>
                        </div>

                        <div class="category_box">
                            <a href="/">
                                <div class="category_box_header">
                                    <span>KOMEDIE</span>
                                </div>

                                <div class="category_box_photo">
                                    <img src="/images/cat_comedy.png" height="100%" class="owl_photo">
                                </div>

                            </a>
                        </div>

                        <div class="category_box">
                            <a href="/">
                                <div class="category_box_header">
                                    <span>PRZYGODOWE</span>
                                </div>

                                <div class="category_box_photo">
                                    <img src="/images/cat_adventure.png" height="100%"  class="owl_photo">
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="button_owl_next"><i class="fas fa-caret-right"></i></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            postFindMovie: function() {
                $( document ).ready(function() {
                    $( "#select_cat" ).change(function() {
                        $( "#select_mov" ).css("opacity","1");
                    });
                });
            },
          initOwlCarousel: function() {
              $(document).ready(function () {
                  var owl = $(".owl-carousel");
                  $('.owl-carousel').owlCarousel({
                      loop:true,
                      margin:20,
                      responsiveClass:true,
                      responsive:{
                          1600:{
                              items:3,
                          },
                          1338:{
                              items:2,
                              margin: 30
                          },
                          10:{
                              items:1,
                          }
                      }
                  })

                  $('.button_owl_next').click(function () {
                      owl.trigger('next.owl.carousel');
                  })
// Go to the previous item
                  $('.button_owl_prev').click(function () {
                      // With optional speed parameter
                      // Parameters has to be in square bracket '[]'
                      owl.trigger('prev.owl.carousel', [300]);
                  })

              });
          }
        },
        beforeMount() {
            this.postFindMovie();
this.initOwlCarousel();
        },
        mounted() {
            console.log('Component mounted.');
        }
    }
</script>
