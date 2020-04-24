<?php
if(!session_id()) {
    session_start();
}
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>AutoCar</title>
    <link rel="stylesheet" href="{{ url("/css/style.css") }}">
    <link rel="icon" type="image/jpg" href="/assets/images/favicon.jpg" />
    <link href="{{ url("/libs/fonts/fonts.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{url("/libs/font-awsmev5/css/all.css")}}">
    <link rel="stylesheet" href="{{url("/libs/select2/select2.css")}}"/>
    <link href="{{url("/libs/owlcarusel/owl.carousel.min.css")}}" rel="stylesheet"/>
    <link href="{{url("/libs/owlcarusel/owl.theme.default.min.css")}}" rel="stylesheet"/>
    <script defer src="{{url("/libs/owlcarusel/owl.carousel.min.js")}}"></script>
    <script defer src="{{url("/libs/select2/select2.full.min.js")}}"></script>
    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
</head>
<body>
<div id="app">
        <header-component rent="{{((isset($rent)?$rent:''))}}" isadmin="{{((isset($_SESSION['isAdmin']))?$_SESSION['isAdmin']:0)}}" logid="{{((isset($_SESSION['Login_id']))?$_SESSION['Login_id']:0)}}" islog="{{((isset($_SESSION['Login']))?$_SESSION['Login']:'Zaloguj się!')}}"></header-component>
