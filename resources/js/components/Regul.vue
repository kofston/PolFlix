<template>

    <div class="admin_box bcg_regul">
        <div class="pricer_box">
            <img :src="logo"><br>
            <span>Zachęcamy do zapoznania się z naszym regulaminem</span><br><br>
            <h2>Regulamin</h2>
            <span>
            1. Korzystającym z usług wypożyczalni płyt DVD może być wyłącznie osoba, która posiada kartę klienta. <br>
            2. Kartę klienta można uzyskać w każdej filii Video World, po spełnieniu warunków, o których mowa w pkt 4. Karta klienta pozostaje własnością Attar Group  Sp. z o.o. i może zostać unieważniona przez nią w każdym czasie w szczególności w sytuacji naruszenia przez klienta regulaminu. Klient pozostaje użytkownikiem karty. Karta może być wydana jedynie osobie pełnoletniej korzystającej z pełni praw publicznych, wobec której nie toczy się postępowanie egzekucyjne, ani upadłościowe, ani nie jest ona wpisana  do  rejestru  dłużników  niewypłacalnych  a  ziszczenie  się  którejkolwiek  z  wyżej  podanych  okoliczności  powoduje wygaśnięcie karty. Klient zobowiązany jest o tym fakcie powiadomić VIDEO WORLD i  dokonać zwrotu karty.<br>
            3. Karta klienta, niezależnie od miejsca wydania, uprawnia do korzystania z usług wszystkich salonów Video World. <br>
            4. W celu otrzymania karty klienta osoba zainteresowana obowiązana jest: a) przedłożyć do wglądu personelowi wypożyczalni dwa aktualne dokumenty potwierdzające tożsamość (ze zdjęciem), b) złożyć pisemne oświadczenie o zapoznaniu się z niniejszym regulaminem i przyjęciu jego warunków, c) uiścić opłatę wpisową.<br>
            5. Kartę klienta należy okazać personelowi wypożyczalni przy każdorazowym korzystaniu z jej usług. Każdorazowy posiadaczkarty jest traktowany przez personel Video World jako upoważniony przez osobę dla której wystawiono kartę klienta do korzystania z usług wypożyczalni, na jej rachunek.
        </span>
        </div>
    </div>

</template>

<script>
    export default {
        name: "Regul",
        data(){
            return{
                logo: '/images/logo.png',
            }
        }
    }
</script>

<style scoped>

</style>
