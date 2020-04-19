<template>
    <div class="container">
        <div class="top_bar">
            <a href="/">
                <img class="logo_img" :src="logo">
            </a>
            <div class="row">

                <div class="col-lg-8">

                    <div class="contact_box">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 p-0 mw190">
                                <a href="tel: +48 323323323">
                                    <i class="fas fa-phone ico_netfl"></i>
                                    <span class="tel_number">323323323</span>
                                </a>
                            </div>
                            <div class="col-lg-6 col-md-12 mobile-center p-0">
                                <a href="mailto:mailtest@wp.pl">
                                    <i class="fas fa-envelope-open-text ico_netfl"></i>
                                    <span class="mail">mailtest@wp.pl</span>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-12 mobile-center min-wdth385">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="infoMouseOverLoginIcon">
                                {{message}}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="shop_box">
                                <a data-fancybox data-src="#login" href="javascript:;" v-on:mouseover="mouseoverLogin"
                                   v-on:mouseleave="mouseleave" >
                                    <i v-on class="fa fa-user"></i>
                                </a>

                                <a data-fancybox data-src="#register" href="javascript:;" v-on:mouseover="mouseoverRegister"
                                   v-on:mouseleave="mouseleave">
                                    <i class="fas fa-user-plus"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!--login box-->
            <div style="display: none;" id="login">
                <h2 class="text-center">Zaloguj się</h2>
                <div method="POST" action="/login/signup">
                    <div class="form-group text-center">
                        <input autocomplete="off" type="text" class="form-control input_login" name="login" placeholder=" Login">
                    </div>
                    <div class="form-group text-center">
                        <input autocomplete="off" type="password" class="form-control input_login" name="password" placeholder=" Hasło">
                    </div>
                    <button id="login-button" class="text-white login-button">Zaloguj się</button>
                </div>
            </div>
<!--register box-->
            <div class="register_box" id="register" style="display: none;">
                <div class="register_boxing text-center">
                    <h2 class="text-white">Dołącz do społeczności Polflix!<br>Ciesz się najlepszymi filmami!</h2><br>
                    <img :src="logo" style="margin-bottom: 25px;">
                    <div method="POST" action="">
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_login_r" name="name_r" placeholder=" Imię">
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_login_r" name="lastname_r" placeholder=" Nazwisko">
                        </div>
                        <div class="form-group text-center">
                            <input type="text" class="form-control input_login_r" name="login_r" placeholder=" Login">
                        </div>
                        <div class="form-group text-center">
                            <input type="password" class="form-control input_login_r" name="password_r" placeholder=" Hasło">
                        </div>
                        <div class="form-group text-center">
                            <input type="email" class="form-control input_login_r" name="email_r" placeholder=" E-mail">
                        </div>
                        <div class="form-group text-center">
                            <input type="checkbox" id="regu_cb" style="margin-right: 15px;" name="regu"><label for="reg" class="label_ckb">Akceptuje postanowienia regulaminu<br>i wyrażam zgodę na<br>przetwarzanie moich danych osobowych.</label>
                        </div>
                        <div class="form-group text-center">
                            <input type="checkbox" id="pegi_cb" style="margin-right: 15px;" name="pegi"><label for="pegi" class="label_ckb">Oświadczam iż jestem osobą pełnoletnią</label>
                        </div>
                        <button type="submit" id="reg_but" class="text-white login-button register_disa">Zarejestruj się</button>
                    </div>
                </div>
            </div>
<!---->
        </div>

        <div class="menu_box">

            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link color_inherit" href="/about_us">O NAS</a>
                        </li>

                        <li id="dropdown_menu" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle color_inherit" href="#" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                KATEGORIE
                            </a>
                            <div class="dropdown-menu submenu_style" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item no_shadow" href="/category?cat=1">AKCJI</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item no_shadow" href="/category?cat=2">KOMEDIA</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item no_shadow" href="/category?cat=3">PRZYGODOWE</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link color_inherit" href="/pricer">CENNIK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color_inherit" href="/regul">REGULAMIN</a>
                        </li>
                    </ul>
                </div>
            </nav>


        </div>

        <div class="header_desc_box">
            <h5>SZEROKA OFERTA FILMÓW</h5>
            <span class="bike_types">KOMEDIE / AKCJI / PRZYGODOWE i wiele więcej...</span>
        </div>

    </div>
</template>

<script>
    var login = '';
    var loginBox ='';
    export default {
        data(){
            return{
                logo: '/images/logo.png',
                message: ''
            }
        },
        props:{
            islog:{
                type: String,
                required: true
            },
            logid:{
                type: String,
                required: true
            },
            isadmin:{
                type: String,
                required: true
            }
        },
        methods: {
            mouseoverLogin: function(){
                if(loginBox=='')
                this.message = login
            },
            mouseoverRegister: function(){
                if(loginBox=='')
                this.message = 'Zarejestruj się!'
            },
            mouseleave: function(){
                this.message = ''
            },
            loginAJAX:function () {
                $("#login-button").click(function() {

                    var log = $("input[name='login']").val();
                    var pass = $("input[name='password']").val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : '/login/signup',
                        data : { login:log,password:pass},
                        type : 'POST',

                        success : function(response) {
                            if(response==1) {
                                $.fancybox.close();
                                $.fancybox.open('<h2>Zostałeś zalogowany! za chwilę nastąpi przekierowanie...</h2>');
                                setTimeout(function(){ document.location.href="/"; }, 2000);
                            }
                            else {
                                login = "Zaloguj się!";
                                $.fancybox.close();
                                $.fancybox.open('<h2>Błędne dane</h2>');
                            }
                        },
                        error : function(xhr, status) {
                            alert('Przepraszamy, wystąpił problem!');
                        },
                        complete : function(xhr, status) {
                        }
                    });
                });


                $('input[type=checkbox]').change(function () {
                    if(($("#regu_cb").is(':checked'))&&($("#pegi_cb").is(':checked')))
                    {
                        $('#reg_but').removeClass('register_disa');
                        $("#reg_but").removeAttr('disabled');
                        $('#reg_but').attr('enabled','enabled');
                    }
                    else
                    {
                        $('#reg_but').addClass('register_disa');
                        $("#reg_but").removeAttr('enabled');
                        $('#reg_but').attr('disabled','true');
                    }
                });

                $("#reg_but").click(function() {

                    var name_r = $("input[name='name_r']").val();
                    var lastname_r = $("input[name='lastname_r']").val();
                    var login_r = $("input[name='login_r']").val();
                    var password_r = $("input[name='password_r']").val();
                    var email_r = $("input[name='email_r']").val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url : '/login/signin',
                        data : { name_r:name_r,lastname_r:lastname_r,password_r:password_r,login_r:login_r,password_r:password_r,email_r:email_r},
                        type : 'POST',

                        success : function(response) {
                            if(response==1) {
                                $.fancybox.close();
                                $.fancybox.open('<h2>Zostałeś zarejestrowany! za chwilę nastąpi przekierowanie... po czym będziesz mógł się zalogować</h2>');
                                setTimeout(function(){ document.location.href="/"; }, 2000);
                            }
                            else {
                                login = "Zaloguj się!";
                                $.fancybox.close();
                                $.fancybox.open('<h2>Wystąpił błąd! Skontaktuj się z Administratorem!</h2>');
                            }
                        },
                        error : function(xhr, status) {
                            alert('Błędnie wypełnione pola!');
                        },
                        complete : function(xhr, status) {
                        }
                    });
                });
            },
            setLogin:function () {
               if(this.$props.islog != 'Zaloguj się!')
               {
                   if(this.$props.isadmin == 1)
                   loginBox = '<a id="clientPanel" href="/admin/panel">'+this.$props.islog+'</a><i class="fas fa-sign-out-alt logout"></i>';
                   else
                       loginBox = '<a id="clientPanel" href="/profile">'+this.$props.islog+'</a><i class="fas fa-sign-out-alt logout"></i>';

                   $( ".shop_box" ).css("display","none");
               }
            },
            logout:function () {
                $.ajax({
                    url : '/login/unlog',
                    data : { logout:1},
                    type : 'GET',
                    success : function(response) {
                      console.log("wylogowano");
                        document.location.href="/";
                    }
                });
            }
        },
        mounted() {
            console.log('Component mounted.'),
            this.loginAJAX(),
                this.setLogin(),
                login = this.$props.islog,
                $(".infoMouseOverLoginIcon").append(loginBox);
            $( ".logout" ).click(this.logout);
        }
    }
</script>
