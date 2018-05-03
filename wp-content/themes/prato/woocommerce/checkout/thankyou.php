<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
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
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="woocommerce-order">
<!--    <meta name="viewport" content="">-->

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

            <main>
                <section class="about">
                    <div class="container about-content" style="flex-direction: column">

                        <p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Спасибо! Ваш Заказ принят. Наш менеджер свяжется с Вами в ближайшее время', 'woocommerce' ), $order ); ?></p>

                        <style>

                            .woocommerce-order-overview {
                                border-radius: 5px;
                            }
                            .woocommerce-order-overview li {
                                width: 75%;
                                display: flex;
                                flex-direction: column;
                                padding: 10px;
                                background-color: rgba(200,200,200,0.1);
                                border-bottom: 1px solid #e7e7e7;
                            }
                            span {
                                display: block;
                                font-family: 'Open Sans', sans-serif;
                                font-size: 13px;
                                font-weight: 300;
                                margin-bottom: 5px;
                            }
                            strong,.amount {
                                display: block;
                                font-family:'Helvetica Neue',sans-serif;
                            }
                            .amount {
                                font-size: 16px;
                            }
                            .woocommerce-Price-currencySymbol {
                                display: inline;
                            }
                            .wc-backward {
                                display: block;
                                color: #000;
                                font-family: 'Open Sans', sans-serif;
                                font-weight: 300;
                                font-size: 16px;
                                margin: 50px 0 100px 0;
                                width: 220px;
                                height: 50px;
                                text-transform: uppercase;
                                text-decoration: none;
                                border: 1px solid #000;
                                line-height: 50px;
                                text-align: center;
                                cursor: pointer;
                                transition: all 0.4s ease-out;
                                transition-delay: 0.2s;
                            }
                            .wc-backward:hover {
                                transition-delay: 0.2s;
                                color: #4CB69F;
                                /*background-color: #4CB69F;*/
                                border:1px solid #4CB69F;
                                transition: all 0.4s ease-out;
                            }
                            .nb {
                                border: none !important;
                            }
                            @media screen and (max-width: 450px) {
                                .woocommerce-order-overview {
                                    margin-top: 50px;
                                }
                                .container {
                                    max-width: 90% !important;
                                }
                                .footer {
                                    min-width: 1px !important;
                                }
                                .woocommerce-order-overview li {
                                    width: 100%;
                                }
                            }
                        </style>
                        <ul style="padding: 0" class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

                            <li class="woocommerce-order-overview__order order">
			                    <span><?php _e( 'Номер заказа:', 'woocommerce' ); ?></span>
                                <strong><?php echo $order->get_order_number(); ?></strong>
                            </li>

                            <li class="woocommerce-order-overview__date date">
			                    <span><?php _e( 'Дата:', 'woocommerce' ); ?></span>
                                <strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
                            </li>

		                    <?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
                                <li class="woocommerce-order-overview__email email">
				                    <span><?php _e( 'Email:', 'woocommerce' ); ?></span>
                                    <strong><?php echo $order->get_billing_email(); ?></strong>
                                </li>
		                    <?php endif; ?>

                            <li class="woocommerce-order-overview__total total">
			                   <span> <?php _e( 'К Оплате:', 'woocommerce' ); ?></span>
                                <strong><?php echo $order->get_formatted_order_total(); ?></strong>
                            </li>

		                    <?php if ( $order->get_payment_method_title() ) : ?>
                                <li class="woocommerce-order-overview__payment-method method nb">
				                    <span><?php _e( 'Способ оплаты:', 'woocommerce' ); ?></span>
                                    <strong>
					                    <?php
					                    if($order->get_payment_method_title() == 'Cash on delivery')
						                    echo 'Налычными при получении';
					                    else
						                    echo 'Банковский перевод'
					                    ?>
                                    </strong>
                                </li>
		                    <?php endif; ?>

                        </ul>

                        <a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( get_page_by_title( 'Домашняя Страница' ) ) ) )?>">
		                    <?php _e( 'На главную', 'woocommerce' ) ?>
                        </a>

                    </div>
                </section>
            </main>

		<?php endif; ?>

<!--		--><?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
<!--		--><?php //do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>
