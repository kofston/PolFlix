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
            this.putProductInfo()
        }
    }
</script>

<style scoped>

</style>
