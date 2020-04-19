<template>
    <div class="container">
        <div class="product_box_bg">
        </div>
    </div>
</template>

<script>
    export default {
        name: "Product",
        props:{
            prodinfo:{
                type:String,
                required:true
            },
            islogin:{
                type:String,
                required:true
            }
        },
        methods:
            {
                putProductInfo:function(){
                    $(".product_box_bg").append(this.prodinfo);
                }
            },
        mounted()
        {
            this.putProductInfo(),
            $(".select_days").change(function () {
                if(this.islogin != 0)
                {
                    $(".option_default").attr('disabled', true);
                    $(".add_button").css("pointer-events","auto");
                    $(".add_button").css("background-color","red");
                }
            });
        }
    }
</script>

<style scoped>

</style>
