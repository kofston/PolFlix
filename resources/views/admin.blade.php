<admin-component login="{{((isset($_SESSION['Login']))?$_SESSION['Login']:'')}}" movielist="{{$admin_lists->MoviesList()}}" clientlist="{{$admin_lists->ClientList()}}"></admin-component>
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
