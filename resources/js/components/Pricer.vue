<template>

    <div class="admin_box bcg_pricer">
        <div class="pricer_box">
            <img :src="logo"><br>
            <span>Ceny filmów są zależne od daty premiery konkretnej produkcji.<br>Jednakże staramy się oferować najlepsze możliwe ceny.</span><br><br>
            <table cellpadding="4" cellspacing="5" border="1" align="center">
                <tr style="color:black!important;">
                    <td style="color:black!important;">
                        nośnik
                    </td>
                    <td style="color:black!important;">
                        średnia cena
                    </td>
                    <td style="color:black!important;">
                        oferowana jakość
                    </td>
                </tr>
                <tr>
                    <td style="color:black!important;">
                        DVD
                    </td>
                    <td style="color:black!important;">
                        BARDZO NISKA
                    </td>
                    <td style="color:black!important;">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    </td>
                </tr>
                <tr>
                    <td style="color:black!important;">
                        Blu-Ray
                    </td>
                    <td style="color:black!important;">
                        niska
                    </td>
                    <td style="color:black!important;">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                    </td>
                </tr>
                <tr>
                    <td style="color:black!important;">
                        Blu-Ray 4k
                    </td>
                    <td style="color:black!important;">
                        wyższa
                    </td>
                    <td style="color:black!important;">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </td>
                </tr>
            </table>
            <br>
            <h2 class="remember">PAMIĘTAJ!</h2><br>Najlepszą jakość filmów uzyskasz na nośniku<br>Blu-Ray 4k.<br>
            <img width="370" :src="logo4k">
        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return{
                logo: '/images/logo.png',
                logo4k: '/images/4k_logo.png'
            }
        },
        name: "Pricer"
    }
</script>

<style scoped>

</style>
