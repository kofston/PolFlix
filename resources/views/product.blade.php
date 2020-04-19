<product-component islogin="{{((isset($_SESSION['Login_id']))?$_SESSION['Login_id']:0)}}" prodinfo="{{$prod->ProductGenerator()}}"></product-component>
