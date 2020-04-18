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
                type: Number,
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
                                document.location.href="/";
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
            },
            setLogin:function () {
               if(this.$props.islog != 'Zaloguj się!')
               {
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
