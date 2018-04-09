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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div>
	<a class="skip-link screen-reader-text" href="#"><?php esc_html_e( 'Skip to content', 'prato' ); ?></a>

	<header>
        <div></div>
        <nav>
            <ul>
                <li><a href="/prato/">Главная</a></li>
                <li><a href="/prato/about">О нас</a></li>
                <li><a href="/prato/store">Каталог Товара</a></li>
                <li><a href="/prato/info">Оплата / Доставка</a></li>
                <li><a href="/prato/contacts">Контакты</a></li>
            </ul>
        </nav>
        header
    </header>

