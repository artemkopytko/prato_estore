<?php /* Template Name: store */ ?>

<?php get_header(); ?>


<main>
    <section class="store">
        <div class="container store-content">
            <div class="link-parent"><a href="/prato/">Главная</a> / Каталог Товара</div>
            <div class="store-products-filter">
                <a class="ml-0 filter-main">Каталог Товара</a>
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
					echo
						'<a href="' . $link . '">' . $cat->name . '</a>';
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
				);

				$loop = new WP_Query( $args );
				$i = 0;


				if ( $loop->have_posts() ) {
					$terms = get_terms( 'product_tag' );
					$term_array = array();
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						foreach ( $terms as $term ) {
							$term_array[] = $term->name;
						}
					}
					while ( $loop->have_posts() ) : $loop->the_post();

						global $product;


						if ( has_post_thumbnail( $product->get_id() ) ) {
							$attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
							$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
						}

//					$product->get_attribute( 'your_attr' );

						echo '
                        <div class="product">
                        <div class="product-image"
                        style="background-image: url(' . $attachment[0] . ';)" data-id="' . $product->get_id() . '"></div>
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


<?php get_footer(); ?>

