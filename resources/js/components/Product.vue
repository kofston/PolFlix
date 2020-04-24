<template>
    <div class="container">
        <div class="product_box_bg">
        </div>
    </div>
</template>

<script>
    var islog = 0;
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
                },
                isLogin:function(){
                    islog = this.islogin;
                }
            },
        mounted()
        {
            this.isLogin(),
            this.putProductInfo(),
            $(".select_days").change(function () {
                if(islog != 0)
                {
                 console.log(islog);
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
