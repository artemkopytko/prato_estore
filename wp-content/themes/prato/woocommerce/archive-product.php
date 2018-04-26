<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

wp_register_style( 'store', get_template_directory_uri() . '/css/store.css' );
wp_enqueue_style('store');


?>

<?php
/*
if ( is_search() ) {
	//put your search results markup here (you can copy some code from archive-product.php file and also from content-product.php to create a standard markup
    echo '1';
} else {
	echo '2';
}
*/

$s=get_search_query();
$args = array(
	's' =>$s
);

?>

<main>
    <section class="store">
        <div class="container store-content">
            <div class="link-parent">
                <a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / <?php echo get_query_var('s');?></div>

            <div class="result-search">
                <?php

                // The Query
                $the_query = new WP_Query( $args );
                if ( $the_query->have_posts() ) {
                    _e("<h2 style='font-weight:bold;color:#000'>Результаты поиска для: ".get_query_var('s')."</h2>");
                    echo '<ul class="store-products-search">';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        ?>
                        <li>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                }else{
                    ?>
                    <h2 style='font-weight:bold;color:#000'>Ничего не найдено...</h2>
                    <div class="alert alert-info">
                        <p>К сожалению, ничего не найдено для заданного запроса. Пожалуйста, попробуйте набор других слов.</p>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>
</main>






<?php get_footer();?>

