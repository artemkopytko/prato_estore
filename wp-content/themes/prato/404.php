<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Prato
 */

get_header();

wp_register_style( 'aboutUs', get_template_directory_uri() . '/css/aboutUs.css' );
wp_enqueue_style('aboutUs');
?>

    <main>
        <section class="about" >
            <div class="container about-content" style="align-items: left !important;  padding-top: 40px">
                <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / 404</div>

                <h1 lang="ru" style="hyphens: auto; word-wrap: break-word">Упс, по Вашему запросу ничего не найдено!</h1>
                <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( get_page_by_title( 'Домашняя Страница' ) ) ) )?>">
		            <?php _e( 'На главную!', 'woocommerce' ) ?>
                </a>
            </div>
        </section>
    </main>

<?php
get_footer();
