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
            <div class="link-parent"><a href="/prato/">Главная</a> / Корзина / Форма Заказа</div>
            <div class="order-preview">
                <h2>Ваш Товар</h2>
                <div class="order-preview-heading">
                    <div class="order-preview-cell"></div>
                    <div class="order-preview-cell-big"></div>
                    <div class="order-preview-cell"><p>Цена</p></div>
                    <div class="order-preview-cell"><p>Количество</p></div>
                    <div class="order-preview-cell"><p>Сумма</p></div>
                </div>
                <div class="order-preview-content">
                    <div class="order-preview-cell">
                        <div class="order-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
                    </div>
                    <div class="order-preview-cell-big">
                        <div class="order-preview-cell-content">
                            <span>Кресло в стиле модерн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000грн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <input type="number" step="1" value="1" disabled title="Количество">
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000 грн</span>
                        </div>
                    </div>
                </div>
                <div class="order-preview-content">
                    <div class="order-preview-cell">
                        <div class="order-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
                    </div>
                    <div class="order-preview-cell-big">
                        <div class="order-preview-cell-content">
                            <span>Кресло в стиле модерн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000грн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <input type="number" step="1" value="1" disabled title="Количество">
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000 грн</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="checkout-form">
                <h2>Форма Заказа</h2>
                <form action="???" method="post">
                    <div class="form-row">
                        <div class="form-row-desc">
                            <span>Личная информация</span>
                        </div>
                        <div class="form-row-inputs">
                            <div class="form-input-row">
                                <label for="name">Ф.И.О.<span class="highlighted">*</span></label>
                                <input id="name" type="text" placeholder="Притула Андрей Сергеевич">
                            </div>
                            <div class="form-input-row">
                                <label for="phone">Телефон<span class="highlighted">*</span></label>
                                <input id="phone" type="text" placeholder="+38 (096) 333 33 33">
                            </div>
                            <div class="form-input-row">
                                <label for="email">Email:</label>
                                <input id="email" type="email" placeholder="youramazingemail@gmail.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-desc">
                            <span>Адрес доставки</span>
                        </div>
                        <div class="form-row-inputs">
                            <div class="form-input-row">
                                <label for="shippingAddress">Адрес доставки:</label>
                                <textarea name="" id="shippingAddress" placeholder="г. Киев, ул. Артема 33, кв. 33"></textarea>
                            </div>
                            <div class="form-input-row">
                                <label for="">Способ оплаты:</label>
                                <div class="payment-methods">
                                    <input id="cash" type="radio" checked name="payment-type">
                                    <label for="cash">наличными</label>
                                    <input id="visa" type="radio" name="payment-type">
                                    <label for="visa">
                                        <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/Visa_Inc._logo.png" alt="">
                                    </label>
                                    <input id="mcard" type="radio" name="payment-type">
                                    <label for="mcard">
                                        <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/640px-MasterCard_logo.png" alt="">
                                    </label>
                                </div>
                            </div>
                            <div class="form-input-row">
                                <label for="extra">Примечания: </label>
                                <textarea name="" id="extra"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="form-buttons">
                        <a href="/prato/cart">В Корзину</a>
                        <button type="submit">Завершить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>

	<h3 id="order_review_heading"><?php _e( 'Your order', 'woocommerce' ); ?></h3>

	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
