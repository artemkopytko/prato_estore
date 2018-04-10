<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prato
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="content">
        <section class="header">
            <div class="header-top">
                <div class="container header-top-content">
                    <div class="header-top-contacts">
                        <a href="tel:+380504710221">050 471 02 21</a>
                        <a href="tel:+380675445421">067 544 54 21</a>
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-mail">
                            <a href="mailto:pratoaleks@gmail.com">pratoaleks@gmail.com</a>
                        </div>
                        <div class="header-top-social">
                            <a href="#">
                                <i class="fab fa-facebook-f" style="color: black;"></i>
                            </a>
                        </div>
                        <div class="header-top-langs">
                            <a href="#" class="lang-en">EN</a>
                            <a href="#" class="lang-ua">UA</a>
                            <a href="#" class="lang-ru lang-active">RU</a>
<!--                            LANGUAGES SUPPORT-->
                        </div>
                        <div class="header-top-cart">
<!--                            TODO: WooCommerce Cart here-->

                        </div>
                    </div>
                </div>
            </div>
            <nav class="navigation">
                <div class="container">
                    <ul class="navigation-list">
                        <li class="navigation-item">
                            <a class="navigation-link" href="/prato/">
<!--                                IMAGE LOGO-->
                                <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/logo.svg" alt="#">
                            </a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-home" class="navigation-link" href="/prato/">Главная</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-about" class="navigation-link" href="/prato/about">О нас</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-store" class="navigation-link" href="/prato/store">Каталог Товара</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-info" class="navigation-link" href="/prato/info">Оплата / Доставка</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-contacts" class="navigation-link" href="/prato/contacts">Контакты</a>
                        </li>
                    </ul>
                    <div class="navigation-search">
                        <i class="fas fa-search"></i>
    <!--                    TODO: WooCommerce Search here-->

                    </div>
                </div>
            </nav>

            <script>
                var pathname = window.location.pathname;
                if(pathname === '/prato/')
                {
                    var link = document.getElementById('link-home');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/about/')
                {
                    var link = document.getElementById('link-about');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/store/')
                {
                    var link = document.getElementById('link-store');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/info/')
                {
                    var link = document.getElementById('link-info');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/contacts/')
                {
                    var link = document.getElementById('link-contacts');
                    link.classList.add('active');
                }
                console.log(pathname);
            </script>

        </section>



