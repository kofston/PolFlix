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
                                <span>{{message}}</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0">
                            <div class="shop_box">
                                <a v-on:mouseover="mouseoverLogin"
                                   v-on:mouseleave="mouseleave" href="/pl/user/login-form">
                                    <i v-on class="fa fa-user"></i>
                                </a>

                                <a v-on:mouseover="mouseoverRegister"
                                   v-on:mouseleave="mouseleave" href="/pl/sklep/cart">
                                    <i class="fas fa-user-plus"></i>
                                </a>

                            </div>
                        </div>
                    </div>
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
                        <li class="nav-item active">
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
                            <a class="nav-link color_inherit" href="/regulamin">REGULAMIN</a>
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
    export default {
        data(){
            return{
                logo: '/images/logo.png',
                message: ''
            }
        },
        methods: {
            mouseoverLogin: function(){
                this.message = 'Zaloguj się!'
            },
            mouseoverRegister: function(){
                this.message = 'Zarejestruj się!'
            },
            mouseleave: function(){
                this.message = ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
