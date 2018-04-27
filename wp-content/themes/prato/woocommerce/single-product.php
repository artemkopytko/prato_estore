<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( '' );

wp_register_style( 'product', get_template_directory_uri() . '/css/product.css' );
wp_enqueue_style('product');

$product = wc_get_product(get_the_ID());

$cross_sell_ids = $product->get_cross_sell_ids();

$productCategoryIds = $product->get_category_ids();

if($productCategoryIds) {
	$productCategoryId = $productCategoryIds[0];
}

$term = get_term_by( 'id', $productCategoryId, 'product_cat' );

$i = 0;
?>


<main id="product-<?php the_ID(); ?>">
	<section>
		<div class="container product-content">
			<div class="link-parent">
				<a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a>
				/ <a href="<?echo get_permalink( get_page_by_title( 'Каталог Товара' ) )?>">Каталог Товара</a>
				/ <a href="<?php echo get_category_link($productCategoryId);?>"><?php echo $term->name?></a>
			</div>

			<div class="product">
				<div class="product-categories">
					<a class="heading-link" href="<?echo get_permalink( get_page_by_title( 'Каталог Товара' ) )?>">Каталог Товара</a>
					<ul>
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
								'<li>
									<a id="'.$cat->slug.'-filter" href="' . $link . '">' . $cat->name . '</a>
								</li>';
						}
						?>

					</ul>
				</div>
				<div class="product-info">
					<div class="product-main">
						<?php

						if ( has_post_thumbnail( $product->get_id() ) ) {
							$attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
							$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
						}

						$terms = get_the_terms( $product->get_id(), 'product_tag' );

						$term_array = array();
						if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
							foreach ( $terms as $term ) {
								$term_array[] = $term->name;
							}
						}

						?>
						<div class="product-image"
						     style="background-image: url('<?php echo $attachment[0]?>')"></div>
						<div class="product-main-desc">
							<h1><?php echo $product->get_title()?> Стиль <?php echo $term_array[0]?></h1>
							<p>Артикул <?php echo $product->get_sku()?></p>
							<p class="product-price">Цена <?php echo $product->get_price()?> грн</p>

							<a id="addToCart" href="<?php get_permalink($product->get_id())?>?add-to-cart=<?php echo $product->get_id();?>">Добавить в корзину</a>
<!--							--><?php //echo do_shortcode("[shortcode]"); ?>

						</div>
					</div>
					<div class="product-desc">
						<?php echo get_post_field('post_content', $product->get_id());?>
					</div>
				</div>
				<div class="space"></div>
			</div>
			<div class="related-products">
				<h3>Похожие Товары</h3>

				<div class="latest-products">

					<?php
					if($cross_sell_ids) {
						foreach ( $cross_sell_ids as $cs_product_id ) {

							$terms = get_the_terms( $cs_product_id, 'product_tag' );

							$term_array = array();
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term ) {
									$term_array[] = $term->name;
								}
							}
							$cs_product = wc_get_product( $cs_product_id );

							if ( has_post_thumbnail( $cs_product_id ) ) {
								$attachment_ids[0] = get_post_thumbnail_id( $cs_product_id );
								$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
							}

							echo '
						<div class="related-product">
							<div class="related-product-image"
						     style="background-image: url(' . $attachment[0] . ')"></div>
						<h4>' . $cs_product->get_title() . '</h4>
						<span>Стиль ' . $term_array[0] . '</span>
						<p>' . $cs_product->get_price() . ' грн</p>
						<a href="' . get_permalink( $cs_product_id ) . '">Подробнее</a>
						</div>';

						}
					} else {
						echo 'Пусто';
					}
					?>

				</div>
			</div>

		</div>
	</section>
</main>

<?php

$term = get_term_by( 'id', $productCategoryId, 'product_cat' );

?>
<script>
    var pathname = window.location.pathname;
    var category = '<?php echo $term->name?>';
    if (category === 'Стулья')
        document.getElementById('chairs-filter').classList.add('active');
    else if (category === 'Кровати')
        document.getElementById('beds-filter').classList.add('active');
    else if (category === 'Тумбы')
        document.getElementById('curbstones-filter').classList.add('active');
    else if (category === 'Стенки')
        document.getElementById('walls-filter').classList.add('active');


</script>


<?php get_footer( '' );?>

