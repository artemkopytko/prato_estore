<?php /* Template Name: store */ ?>

<?php get_header(); ?>


<main>
    <section class="store">
        <div class="container store-content">
            <div class="link-parent"><a href="/prato/">Главная</a> / Каталог Товара</div>
            <div class="store-products-filter">
                <h2 class="ml-0">Каталог Товара</h2>
                <button>Кресла</button>
                <button>Кровати</button>
                <button>Стенки</button>
                <button>Тумбы</button>
            </div>
            <div class="store-products">

	            <?php
	            $args = array(
		            'post_type'      => 'product',
		            'posts_per_page' => 10,
//		            'product_cat'    => 'chairs',''
	            );

	            $loop = new WP_Query( $args );

	            while ( $loop->have_posts() ) : $loop->the_post();
		            global $product;

		            if ( has_post_thumbnail( $product->id ) ) {
			            $attachment_ids[0] = get_post_thumbnail_id( $product->id );
			            $attachment = wp_get_attachment_image_src($attachment_ids[0], 'full' );
		            }

		            echo '
                        <div class="product">
                        <div class="product-image" 
                        style="background-image: url('. $attachment[0].';)" data-id="'.$product->id.'"></div>
                        <h4>'.get_the_title().'</h4>
                        <span>Стиль модерн</span>
                        <p>'.$product->price.' грн</p>
                        <a href="'.get_permalink().'">Подробнее</a>
                        </div>';



	            endwhile;

	            wp_reset_query();
	            ?>

            </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>

