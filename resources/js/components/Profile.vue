<template>
    <div class="bcg_profile">
        <div class="row m-0">
            <div class="col-lg-4">

                <div class="profile_box">
                    <h2>
                        Zalogowany jako :<br>
                        <h2>{{login}}</h2>
                        <div id="userdata"></div>
<!--                        {{userdata}}-->
                    </h2>
                </div>

            </div>

            <div class="col-lg-8" >
                <div class="profile_box">
                    <h2>
                        Posiadane pozycje:<br>
                        <table cellpadding="20" align="center" id="rentlist">
                            <tr>
                                <td>Miniaturka</td>
                                <td>Tytuł</td>
                                <td>Data wypozyczenia</td>
                                <td>Data zwrotu</td>
                                <td>Wypożyczono na</td>
                            </tr>
<!--                            {{rent_list()}}-->
                        </table>
                    </h2>
                </div>

            </div>

        </div>
    </div>
</template>

<script>
    export default {
        name: "Profile",
        props:{
            login:{
                type: String,
                required: true
            },
            rentlist:{
                type: String,
                required: true
            },
            userdata:{
                type: String,
                required: true
            }
        },
        mounted(){
            $("#userdata").append(this.$props.userdata);
            $("#rentlist").append(this.$props.rentlist);
            $('input[type=checkbox]').change(function () {
                if($("#del_acc").is(':checked'))
                {
                    $('.button_usun').css('display','unset');
                }
                else
                {
                    $('.button_usun').css('display','none');
                }
            });
        }
    }
</script>

<style scoped>

</style>
