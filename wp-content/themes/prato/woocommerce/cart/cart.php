<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

wp_enqueue_style('cart');
wp_register_style( 'cart', get_template_directory_uri() . '/css/cart.css' );

do_action( 'woocommerce_before_cart' );
?>

<main>
    <section class="cart">
        <div class="container cart-content">
            <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / Корзина</div>

            <div class="cart-wrapper">
                <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <div class="shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                        <h2>Ваш Товар</h2>
						<?php
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
								?>
                                <div class="cart-item woocommerce-cart-form__cart-item cart_item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                                    <!--                                                            <td class="product-remove">-->
                                    <!--                                					            --><?php
									//													            // @codingStandardsIgnoreLine
									//													            echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									//														            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									//														            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									//														            __( 'Remove this item', 'woocommerce' ),
									//														            esc_attr( $product_id ),
									//														            esc_attr( $_product->get_sku() )
									//													            ), $cart_item_key );
									//													            ?>
                                    <!--                                                            </td>-->
									<?php if ( has_post_thumbnail( $product_id ) ) {
										$attachment_ids[0] = get_post_thumbnail_id( $product_id );
										$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
									}?>

                                    <div class="cart-cell-big">
                                        <p class="cart-item-title" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
											<?php
											if ( ! $product_permalink ) {
												echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
											} else {
												echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
											}

											// Meta data.
											echo wc_get_formatted_cart_item_data( $cart_item );

											// Backorder notification.
											if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
												echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
											}
											?>
                                        </p>
                                        <div class="cart-item-image" style="background-image: url('<?php echo $attachment[0];?>')">
											<?php $thumbnail = '';?>
											<?php printf( '<a title="product" target="_blank" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );?>
                                        </div>
                                    </div>

                                    <div class="cart-cell cart-cell-bottom">
                                        <div class="cart-item-desc">
                                            <p class="cart-item-desc-heading">Размер</p>
                                            <span>Высота <?php echo $_product->get_length();?> см</span>
                                            <span>Ширина <?php echo $_product->get_width();?> см</span>
                                            <span>Глубина <?php echo $_product->get_height();?> см</span>
                                            <p class="cart-item-desc-heading">Производитель</p>
                                            <span><?php if( get_field('origin_country', $product_id) ): ?>
													<?php the_field('origin_country', $product_id ); ?>
												<?php else :?>
                                                    Украина
												<?php endif; ?>
                                    </span>
                                        </div>
                                    </div>

                                    <div class="cart-cell" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
                                        <div class="cart-cell-heading"><p>Цена</p></div>
                                        <div class="cart-cell-content"><span><?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
												?> <span class="notranslate">грн</span></span></div>
                                    </div>


                                    <div class="cart-cell">
                                        <div class="cart-cell-heading">
                                            <p>Количество</p></div>
                                        <div class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
											<?php
											if ( $_product->is_sold_individually() ) {
												$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
											} else {
												$product_quantity = woocommerce_quantity_input( array(
													'input_name'    => "cart[{$cart_item_key}][qty]",
													'input_value'   => $cart_item['quantity'],
													'max_value'     => $_product->get_max_purchase_quantity(),
													'min_value'     => '0',
													'product_name'  => $_product->get_name(),
												), $_product, false );
											}

											echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
											?>
                                        </div>
                                    </div>


                                    <div class="cart-cell">
                                        <div class="cart-cell-heading"><p>Сумма</p></div>
                                        <div class="cart-cell-content">
                                    <span data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                        <?php
                                        echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
                                        ?>
                                    </span>
                                        </div>
                                    </div>

                                </div>
								<?php
							}
						}
						?>

                        <div class="update-block">
                            <button type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

							<?php do_action( 'woocommerce_cart_actions' ); ?>

							<?php wp_nonce_field( 'woocommerce-cart' ); ?>

                        </div>
                    </div>
                </form>

                <a class="cart-order" href="<?php echo esc_url( wc_get_checkout_url() );?>" class="checkout-button button alt wc-forward">
					<?php esc_html_e( 'Заказать', 'woocommerce' ); ?>
                </a>
            </div>
        </div>
    </section>
</main>




