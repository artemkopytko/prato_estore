<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product_cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */


wp_register_style( 'store', get_template_directory_uri(). '/css/store.css' );
wp_enqueue_style('store');

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header();
?>

<?php if (is_product_category('walls')) : ?>
	<p>Стенки</p>
<?php elseif (is_product_category('beds')) : ?>
	<p>Кровати</p>
<?php elseif (is_product_category('curbstones')) : ?>
	<p>Тумбы</p>
<?php elseif (is_product_category('chairs')) : ?>
	<p>Стулья</p>
<?php else : ?>
	<p>Неизвестно</p>
<?php endif; ?>


<?php

get_footer();

?>