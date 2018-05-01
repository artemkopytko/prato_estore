<?php
/**
 * Created by PhpStorm.
 * User: artemkopytko
 * Date: 5/1/18
 * Time: 9:57 PM
 */
?>
<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
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
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wp_register_style( 'checkout', get_template_directory_uri(). '/css/checkout.css' );
wp_enqueue_style('checkout');

wc_print_notices();

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

?>

<main>
	<section class="checkout">
		<div class="container checkout-content">
			<div class="link-parent">
				<a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a>
				/ <a href="<?echo get_permalink( get_page_by_title( 'Cart' ) )?>">Корзина</a>
				/ Форма Заказа</div>
			<div class="order-preview">
				<h2>Ваш Товар</h2>
				<div class="order-preview-heading">
					<div class="order-preview-cell"></div>
					<div class="order-preview-cell-big"></div>
					<div class="order-preview-cell"><p>Цена</p></div>
					<div class="order-preview-cell"><p>Количество</p></div>
					<div class="order-preview-cell"><p>Сумма</p></div>
				</div>

				<?php
				foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
					$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
					$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

					if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
						$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
						?>
						<div class="order-preview-content woocommerce-cart-form__cart-item cart_item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">


							<?php if ( has_post_thumbnail( $product_id ) ) {
								$attachment_ids[0] = get_post_thumbnail_id( $product_id );
								$attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
							}?>


							<div class="order-preview-cell">
								<div class="order-image"
								     style="background-image: url('<?php echo $attachment[0];?>')">
									<?php $thumbnail = '';?>
									<?php printf( '<a title="product" target="_blank" href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );?>
								</div>
							</div>

							<div class="order-preview-cell-big">
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
							</div>


							<div class="order-preview-cell">
								<div class="order-preview-cell-content">
                                    <span><?php
	                                    echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
	                                    ?>
	                                    <!--                                        <span class="notranslate">грн</span>-->
								</div>

								<!--                                <span>--><?php
								//		                            echo $_product->get_price(); ?>
								<!--                                    <span class="notranslate">грн</span>-->

							</div>

							<div class="order-preview-cell">
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
									<script>$(".qty").attr("disabled", true);</script>
								</div>
							</div>

							<div class="order-preview-cell">
								<div class="order-preview-cell-content">
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
			</div>


			<div class="checkout-form">
				<h2>Форма Заказа</h2>
				<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
					<div class="woocommerce-billing-fields__field-wrapper">
						<div class="form-row">
							<div class="form-row-desc">
								<span>Личная информация</span>
							</div>
							<div class="form-row-inputs">
								<div class="form-input-row validate-required" id="billing_first_name_field" data-priority="10">
									<label for="billing_first_name">Ф.И.О.<span class="highlighted">*</span></label>
									<input type="text" required name="billing_first_name" id="billing_first_name" placeholder="Копытько Артем Владимирович" autocomplete="given-name" autofocus="autofocus">
								</div>
								<div class="form-input-row" id="billing_phone_field">
									<label for="billing_phone">Телефон<span class="highlighted">*</span></label>
									<input type="tel" required class="input-text " name="billing_phone" id="billing_phone"  autocomplete="tel" placeholder="+38 (096) 333 33 33">
								</div>
								<div class="form-input-row validate-required validate-email" id="billing_email_field" data-priority="110">
									<label for="billing_email">Email:</label>
									<input type="email" name="billing_email" id="billing_email" placeholder="youremail@gmail.com"  autocomplete="email username">
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="form-row-desc">
								<span>Адрес доставки</span>
							</div>
							<div class="form-row-inputs">
								<div class="form-input-row address-field" id="billing_address_2_field" data-priority="60">
									<label for="billing_address_2">Адрес доставки:</label>
									<input type="text" class="input-text " name="billing_address_2" id="billing_address_2" autocomplete="address-line2" placeholder="г. Киев, ул. Артема 33, кв. 33">
								</div>
							</div>
							<div class="form-input-row notes" id="order_comments_field">
								<label for="order_comments">Примечания: </label>
								<textarea name="order_comments" class="input-text " id="order_comments"></textarea>
							</div>
						</div>

					<!--                            <div id="" class="">-->
					<!--                                <div class="form-input-row">-->
					<!--                                    <label for="">Способ оплаты:</label>-->
					<!--                                    <div class="payment-methods">-->
					<!--                                        <input id="payment_method_cod" type="radio" checked name="payment_method" value="cod" data-order_button_text>-->
					<!--                                        <label for="payment_method_cod">наличными</label>-->
					<!--                                        <input id="payment_method_bacs" type="radio" name="payment_method" value="bacs">-->
					<!--                                        <label for="payment_method_bacs">-->
					<!--                                            <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/Visa_Inc._logo.png" alt="">-->
					<!--                                            <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/640px-MasterCard_logo.png" alt="">-->
					<!--                                        </label>-->
					<!--                                    </div>-->
					<!--                                </div>-->
					<!--                            </div>-->
					<?php if ( ! is_ajax() ) {
						do_action( 'woocommerce_review_order_before_payment' );
					}
					?>
					<div id="payment" class="woocommerce-checkout-payment">
						<?php if ( WC()->cart->needs_payment() ) : ?>
							<ul class="wc_payment_methods payment_methods methods">
								<?php
								if ( ! empty( $available_gateways ) ) {
									foreach ( $available_gateways as $gateway ) {
										wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
									}
								} else {
									echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
								}
								?>
							</ul>
						<?php endif; ?>
						<div class="form-row place-order">
							<noscript>
								<?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
								<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
							</noscript>

							<?php wc_get_template( 'checkout/terms.php' ); ?>

							<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

							<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

							<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

							<?php wp_nonce_field( 'woocommerce-process_checkout' ); ?>
						</div>
					</div>
					<?php
					if ( ! is_ajax() ) {
						do_action( 'woocommerce_review_order_after_payment' );
					}?>

					<div class="country" style="display: none !important;">
						<p class="form-row form-row-wide address-field update_totals_on_change woocommerce-validated" id="billing_country_field" data-priority="40">
							<label for="billing_country" class="">Country</label>
							<select name="billing_country"
							        id="billing_country"
							        class="country_to_state country_select  select2-hidden-accessible"
							        autocomplete="country"
							        tabindex="-1"
							        aria-hidden="true">
								<option value="UA">Ukraine</option>
							</select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-billing_country-container" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="Ukraine">Ukraine</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Update country">Update country</button></noscript></div>
					</div>

				</form>
			</div>
		</div>
		<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

	</section>
</main>




<script>
    function checkFilledName() {
        var inputVal = document.getElementById("billing_first_name");
        if (inputVal.value === "") {
            inputVal.style.color = "#000";
        }
        else {
            inputVal.style.color = "#656767";
        }
    }
    function checkFilledPhone() {
        var inputVal = document.getElementById("billing_phone");
        if (inputVal.value === "") {
            inputVal.style.color = "#000";
        }
        else {
            inputVal.style.color = "#656767";
        }
    }
    function checkFilledEmail() {
        var inputVal = document.getElementById("billing_email");
        if (inputVal.value === "") {
            inputVal.style.color = "#000";
        }
        else {
            inputVal.style.color = "#656767";
        }
    }
    function checkFilledAddress() {
        var inputVal = document.getElementById("billing_address_1");
        if (inputVal.value === "") {
            inputVal.style.color = "#000";
        }
        else {
            inputVal.style.color = "#656767";
        }
    }
    function checkFilledNote() {
        var inputVal = document.getElementById("order_comments");
        if (inputVal.value === "") {
            inputVal.style.color = "#000";
        }
        else {
            inputVal.style.color = "#656767";
        }
    }

    checkFilledName();
    checkFilledPhone();
    checkFilledEmail();
    checkFilledAddress();
    checkFilledNote();
    //    var nameLen = $("#myTextbox").val().length;
    //    var phoneLen = $("#myTextbox").val().length;
</script>

