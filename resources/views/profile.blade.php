<profile-component rentlist="{{$rent_list->RentList()}}" userdata="{{$rent_list->UserData()}}" login="{{((isset($_SESSION['Login']))?$_SESSION['Login']:'')}}"></profile-component>
{{--<div class="bcg_profile">--}}
{{--    <div class="row m-0">--}}
{{--        <div class="col-lg-4">--}}

{{--            <div class="profile_box">--}}
{{--                <h2>--}}
{{--                    Zalogowany jako :<br>--}}
{{--                    <h2>{{session()->get('Login')}}</h2>--}}
{{--                    {{$rent_list->UserData()}}--}}
{{--                </h2>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="col-lg-8" >--}}
{{--            <div class="profile_box">--}}
{{--                <h2>--}}
{{--                    Posiadane pozycje:<br>--}}
{{--                    <table cellpadding="20" align="center">--}}
{{--                        <tr>--}}
{{--                            <td>Miniaturka</td>--}}
{{--                            <td>Tytuł</td>--}}
{{--                            <td>Data wypozyczenia</td>--}}
{{--                            <td>Data zwrotu</td>--}}
{{--                            <td>Pozostało dni</td>--}}
{{--                        </tr>--}}
{{--                        {{$rent_list->RentList()}}--}}
{{--                    </table>--}}
{{--                </h2>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    $("#del_acc").change(function() {--}}
{{--        if(this.checked) {--}}
{{--            $(".button_usun").css('display','block');--}}
{{--        }--}}
{{--        else {--}}
{{--            $(".button_usun").css('display','none');--}}
{{--        }--}}
{{--    });--}}

{{--</script>--}}
