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

    <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic-ext" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="content">
        <section class="header">
            <div class="header-top">
                <div class="container header-top-content">
                    <div class="header-top-contacts">
                        <a class="notranslate"
                           href="tel: <?php if( get_field('phone_1_int') ): ?>
                            <?php the_field('phone_1_int'); ?>
                        <?php else :?>
                            +380504710221
                        <?php endif; ?>">

							<?php if( get_field('phone_1') ): ?>
								<?php the_field('phone_1'); ?>
							<?php else :?>
                                050 471 02 21
							<?php endif; ?>

                        </a>
                        <a class="notranslate"
                           href="<?php if( get_field('phone_2_int') ): ?>
                            <?php the_field('phone_2_int'); ?>
                        <?php else :?>
                            +380675445421
                        <?php endif; ?>">

							<?php if( get_field('phone_2') ): ?>
								<?php the_field('phone_2'); ?>
							<?php else :?>
                                067 544 54 21
							<?php endif; ?>

                        </a>
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-mail">
                            <a
                                    href="mailto:<?php if( get_field('email') ): ?>
                                <?php the_field('email'); ?>
                            <?php else :?>
                            pratoaleks@gmail.com
                            <?php endif; ?>">

								<?php if( get_field('email') ): ?>
									<?php the_field('email'); ?>
								<?php else :?>
                                    pratoaleks@gmail.com
								<?php endif; ?>

                            </a>
                        </div>
                        <div class="header-top-social">
                            <a id="social-fb" href="#">
                                <i class="fab fa-facebook-f" style="color: black;"></i>
                            </a>
                        </div>
                        <div class="header-top-langs">

                            <div id="flags" class="size18">
                                <ul id="sortable" class="ui-sortable" style="float:left">
                                    <li id="English">
                                        <a title="English" class="notranslate flag en united-states" data-lang="English">EN</a>
                                    </li>
                                    <li id="Russian">
                                        <a title="Russian" class="notranslate flag ru Russian" data-lang="Russian">RU</a>
                                    </li>
                                    <li id="Ukrainian">
                                        <a title="Ukrainian" class="notranslate flag uk Ukrainian" data-lang="Ukrainian">UA</a>
                                    </li>
                                </ul>
                            </div>

                            <!--                            <a href="#" class="lang-en">EN</a>-->
                            <!--                            <a href="#" class="lang-ua">UA</a>-->
                            <!--                            <a href="#" class="lang-ru lang-active">RU</a>-->
                            <!--                            LANGUAGES SUPPORT-->
                        </div>
                        <div class="header-top-cart">
                            <!--                            TODO: WooCommerce Cart here-->

                        </div>
                    </div>
                </div>
            </div>
            <nav class="navigation">
                <div class="navbar-toggler" id="menu-toggle">
                    <div class="hamburger-inner"></div>
                </div>
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li id="menu-close" class="toggle clearfix">
                            <i class="fas fa-times"></i>
                        </li>
                        <li class="navigation-item nav-item-img">
                            <a class="navigation-link" href="/">
                                <!--                                IMAGE LOGO-->
								<?php if( get_field('prato_logo') ): ?>
                                    <img src="<?php the_field('prato_logo'); ?>">
								<?php else :?>
                                    <img src="https://pratostore.com/wp-content/uploads/2018/04/logo-1.svg" alt="">
								<?php endif; ?>

                            </a>
                        </li>
                        <li class="navigation-item">
                            <a id="" class="navigation-link link-home" href="/">Главная</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-about" class="navigation-link" href="/about">О нас</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-store" class="navigation-link" href="/store">Каталог Товара</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-info" class="navigation-link" href="/info">Оплата / Доставка</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-contacts" class="navigation-link" href="/contacts">Контакты</a>
                        </li>
                    </ul>
                </div>
                <div class="container">
                    <ul class="navigation-list">
                        <li class="navigation-item">
                            <a class="navigation-link" href="/">
                                <!--                                IMAGE LOGO-->
                                <img src="https://pratostore.com/wp-content/uploads/2018/04/logo-1.svg" alt="#">
                            </a>
                        </li>
                        <li class="navigation-item">
                            <a id="" class="navigation-link link-home" href="/">Главная</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-about" class="navigation-link" href="/about">О нас</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-store" class="navigation-link" href="/store">Каталог Товара</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-info" class="navigation-link" href="/info">Оплата / Доставка</a>
                        </li>
                        <li class="navigation-item">
                            <a id="link-contacts" class="navigation-link" href="/contacts">Контакты</a>
                        </li>
                    </ul>
                    <div class="navigation-search">
                        <i class="fas fa-search"></i>
                        <!--                    TODO: WooCommerce Search here-->

                    </div>
                </div>
            </nav>

            <script>
                $("#menu-close").click(function(e) {
                    e.preventDefault();
                    $("#sidebar-wrapper").css("left", "-500px");
                });
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();
                    $("#sidebar-wrapper").css("left", "0");
                });




                var pathname = window.location.pathname;
                var links;
                if(pathname === '/prato/')
                {
                    links = document.getElementsByClassName('link-home');
                }
                else if (pathname === '/prato/about/')
                {
                    link = document.getElementsByClassName('link-about');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/store/')
                {
                    link = document.getElementsByClassName('link-store');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/info/')
                {
                    link = document.getElementsByClassName('link-info');
                    link.classList.add('active');
                }
                else if (pathname === '/prato/contacts/')
                {
                    link = document.getElementsByClassName('link-contacts');
                    link.classList.add('active');
                }

                links[0].classList.add('active');
                links[1].classList.add('active');

            </script>

        </section>



