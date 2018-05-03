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

$category = '';
if (is_product_category('walls'))
    $category = 'walls';
elseif (is_product_category('beds'))
    $category = 'beds';
elseif (is_product_category('curbstones'))
    $category = 'curbstones';
elseif (is_product_category('chairs'))
    $category = 'chairs';
else
    $category = 'Uncategorized';
?>


    <main>
        <section class="store">
            <div class="container store-content">
                <div class="link-parent">
                    <a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a>
                    / <a href="<?echo get_permalink( get_page_by_title( 'Каталог Товара' ) )?>">Каталог Товара</a>
                    / <?php if (is_product_category('walls')) : ?>
                        Стенки
	                <?php elseif (is_product_category('beds')) : ?>
                        Кровати
	                <?php elseif (is_product_category('curbstones')) : ?>
                        Тумбы
	                <?php elseif (is_product_category('chairs')) : ?>
                        Стулья
	                <?php else : ?>
                        Неизвестно
	                <?php endif; ?>
                </div>
                <div class="store-products-filter">
                    <a class="ml-0 filter-main" href="<?echo get_permalink( get_page_by_title( 'Каталог Товара' ) )?>">Каталог Товара</a>
					<?php

					$number = null;
					$orderby = '';
					$hide_empty = 0;
					$ids = array();

					$args = array(
						'taxonomy'   => "product_cat",
						'number'     => $number,
						'orderby'    => $orderby,
						'order'      => $order,
						'hide_empty' => $hide_empty,
						'include'    => $ids
					);
					$product_categories = get_terms($args);


					foreach( $product_categories as $cat )
					{
						if($cat->name === 'Uncategorized')
							continue;
						$link = get_category_link($cat->term_id);

//						var_dump($cat);
						echo
							'<a id="'.$cat->slug.'-filter" href="' . $link . '">' . $cat->name . '</a>';
					}
					?>

                </div>
                <div class="store-products">

					<?php
					global $paged;


					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

					$args = array(
						'post_type'=>'product',
						'posts_per_page' => 21,
						'paged' => $paged,
						'product_cat'    => $category,
					);

					$loop = new WP_Query( $args );
					$i = 0;


					if ( $loop->have_posts() ) {

						while ( $loop->have_posts() ) : $loop->the_post();

							global $product;

							$terms = get_the_terms( $product->get_id(), 'product_tag' );

							$term_array = array();
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term ) {
									$term_array[] = $term->name;
								}
							}

							if ( has_post_thumbnail( $product->get_id() ) ) {
								$attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
								$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
							}

//					$product->get_attribute( 'your_attr' );

							echo '
                        <div class="product">
                        <div class="product-image"
                        style="background-image: url(' . $attachment[0] . ')" data-id="' . $product->get_id() . '"></div>
                        <h4>' . get_the_title() . '</h4>
                        <span>Стиль ' . $term_array[ $i ] . '</span>
                        <p>' . $product->get_price() . ' грн</p>
                        <a href="' . get_permalink() . '">Подробнее</a>
                        </div>';


							$i += 1;

						endwhile;

						$total_pages = $loop->max_num_pages;

						if ( $total_pages > 1 ) {

							$current_page = max( 1, get_query_var( 'paged' ) );

							echo '<div class="pagination">';

							echo paginate_links( array(
								'base'      => get_pagenum_link( 1 ) . '%_%',
								'format'    => 'page/%#%',
								'current'   => $current_page,
								'total'     => $total_pages,
								'prev_text' => __( '' ),
								'next_text' => __( '' ),
							) );

							echo '</div>';
						}
					} else {
						echo __( 'No products found' );
					}
					wp_reset_postdata();
					?>

                </div>
            </div>
        </section>
    </main>



<?php

get_footer();

?>