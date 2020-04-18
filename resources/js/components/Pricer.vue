<template>

    <div class="admin_box bcg_pricer">
        <div class="pricer_box">
            <img :src="logo"><br>
            <span>Ceny filmów są zależne od daty premiery konkretnej produkcji.<br>Jednakże staramy się oferować najlepsze możliwe ceny.</span><br><br>
            <table cellpadding="4" cellspacing="5" border="1" align="center">
                <tr>
                    <td>
                        nośnik
                    </td>
                    <td>
                        średnia cena
                    </td>
                    <td>
                        oferowana jakość
                    </td>
                </tr>
                <tr>
                    <td>
                        DVD
                    </td>
                    <td>
                        BARDZO NISKA
                    </td>
                    <td>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        Blu-Ray
                    </td>
                    <td>
                        niska
                    </td>
                    <td>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                    </td>
                </tr>
                <tr>
                    <td>
                        Blu-Ray 4k
                    </td>
                    <td>
                        wyższa
                    </td>
                    <td>
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </td>
                </tr>
            </table>
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
                logo4k: '/images/4khdrlogo.png'
            }
        },
        name: "Pricer"
    }
</script>

<style scoped>

</style>
