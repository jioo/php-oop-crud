<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD - Create Read Update Delete</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
</head>
<body>

<!-- Header -->
<header id="header" data-uk-sticky="show-on-up: true; animation: uk-animation-fade; media: @l">
    <div class="uk-container">
        <nav id="navbar" data-uk-navbar="mode: click;">
            <div class="uk-navbar-left nav-overlay uk-visible@m">
                <ul class="uk-navbar-nav">
                    <li><a href="index">Home</a></li>
                    <li><a href="create">Create</a></li>
                    <li><a href="protected">Protected</a></li>
                </ul>
            </div>
            <div class="uk-navbar-right nav-overlay">
                <ul class="uk-navbar-nav">
                    <?php 
                        if( !isset($_SESSION['current_user']) ) {
                    ?>
                        <li><a class="uk-visible@s" href="login">Login</a></li>
                        <li><a class="uk-visible@s" href="register">Register</a></li>
                    <?php 
                        } else {
                    ?>
                        <li><a class="uk-visible@s" href="logout">Logout</a></li>
                    <?php 
                        }
                    ?>
                    <li><a class="uk-navbar-toggle uk-hidden@m" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- ./Header -->

<!-- Off Canvas -->
<div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
        <button class="uk-offcanvas-close uk-close" type="button" data-uk-close></button>
        <ul class="uk-nav uk-nav-default">
            <li class="uk-active"><a href="#">Active</a></li>
            <li class="uk-parent">
                <a href="#">Parent</a>
                <ul class="uk-nav-sub">
                    <li><a href="#">Sub item</a></li>
                    <li><a href="#">Sub item</a></li>
                </ul>
            </li>
            <li class="uk-nav-header">Header</li>
            <li><a href="#js-options"><span class="uk-margin-small-right" data-uk-icon="icon: table"></span> Item</a></li>
            <li><a href="#"><span class="uk-margin-small-right" data-uk-icon="icon: thumbnails"></span> Item</a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span class="uk-margin-small-right" data-uk-icon="icon: trash"></span> Item</a></li>
        </ul>
        <h3>Title</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
</div>
<!-- ./Off Canvas -->