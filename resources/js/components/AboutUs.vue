<template>
    <div class="admin_box bcg_about_us">
        <div class="about_box">
            <img :src="logo"><br>
            <div style="background-color:black;"><span style="color:white;font-family:'ub';padding:20px;padding-top:110px;display:block;">Wszystkich amatorów dobrego kina, koneserów klasyki, entuzjastów mocnych wrażeń zatrzymanych w kadrze i niepowtarzalnych przeżyć zapisanych na taśmie filmowej zapraszamy do "VideoFox". Dla Klientów i Przyjaciół naszej Videoteki przez około 10 lat kompletowaliśmy katalog najciekawszych filmów dostępnych na płytach DVD i Blu-ray. Miła i profesjonalna obsługa Videoteki pomoże Państwu znaleźć poszukiwany lub ulubiony tytuł.</span></div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                logo: '/images/logo.png',
                logo4k: '/images/4khdrlogo.png'
            }
        },
        name: "AboutUs"
    }
</script>

<style scoped>

</style>
