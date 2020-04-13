<template>
    <div class="categories_box">
        <h3 class="category_title">{{cattitle}}</h3>
        <div class="videos_box">

            <div class="grid">

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Category",
        props:{
          cattitle:{
              type: String,
              required: true
          },
            catlist:{
              type:String,
                required:true
            }
        },
        methods:
            {
                initMasonry:function () {
                    $('.grid').masonry({
                        itemSelector: '.grid-item',
                        columnWidth: 200
                    });
                },
                render_Videos:function()
                {
                   $(".grid").append(this.catlist);
                }
            },
        mounted() {
            this.initMasonry(),
            this.render_Videos()
        }
    }
</script>

<style scoped>

</style>
