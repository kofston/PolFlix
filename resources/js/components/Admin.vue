<template>
    <div class="bcg_profile">
        <div class="row m-0">
            <div class="col-lg-4">

                <div class="profile_box">
                    <h2>
                        Zalogowany jako :<br>
                        {{login}}
                        <br>
                        Twoi klienci:
                        <table cellpadding="20" align="center" id="clientlist">
                            <tr>
                                <td>Dane</td>
                                <td>Tytuły Filmów</td>
                                <td>Po terminie</td>
                                <td>Opcje</td>
                            </tr>

                        </table>
                    </h2>
                </div>

            </div>

            <div class="col-lg-8" >
                <div class="profile_box">
                    <h2>
                        Posiadane pozycje:<br>
                        <table cellpadding="20" align="center" id="movielist">
                            <tr>
                                <td>Miniaturka</td>
                                <td>Tytuł</td>
                                <td>Opis</td>
                                <td>Reżyser</td>
                                <td>Ilość</td>
                                <td>Opcje</td>
                            </tr>

                        </table>
                    </h2>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Admin",
        props:{
            login:{
                type: String,
                required: true
            },
            movielist:{
                type: String,
                required: true
            },
            clientlist:{
                type: String,
                required: true
            }
        },
        mounted(){
            $("#movielist").append(this.$props.movielist);
            $("#clientlist").append(this.$props.clientlist);
            $("#del_acc")
        }
    }
</script>

<style scoped>

</style>
