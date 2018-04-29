<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prato
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;subset=cyrillic-ext" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
    <div class="content">
        <section class="header">
            <div class="header-top">
                <div class="container header-top-content">
                    <div class="header-top-contacts">
                        <a class="notranslate"
                           href="tel: <?php if( get_field('phone_1_int') ): ?>
                            <?php the_field('phone_1_int'); ?>
                        <?php else :?>
                            +380504710221
                        <?php endif; ?>">

							<?php if( get_field('phone_1') ): ?>
								<?php the_field('phone_1'); ?>
							<?php else :?>
                                050 471 02 21
							<?php endif; ?>

                        </a>
                        <a class="notranslate"
                           href="tel: <?php if( get_field('phone_2_int') ): ?>
                            <?php the_field('phone_2_int'); ?>
                        <?php else :?>
                            +380675445421
                        <?php endif; ?>">

							<?php if( get_field('phone_2') ): ?>
								<?php the_field('phone_2'); ?>
							<?php else :?>
                                067 544 54 21
							<?php endif; ?>

                        </a>
                    </div>
                    <div class="header-top-right">
                        <div class="header-top-mail">
                            <a
                                    href="mailto:<?php if( get_field('email') ): ?>
                                <?php the_field('email'); ?>
                            <?php else :?>
                            pratoaleks@gmail.com
                            <?php endif; ?>">

								<?php if( get_field('email') ): ?>
									<?php the_field('email'); ?>
								<?php else :?>
                                    pratoaleks@gmail.com
								<?php endif; ?>

                            </a>
                        </div>
                        <div class="header-top-social">
                            <a id="social-fb" href="#">
                                <i class="fab fa-facebook-f" style="color: black;"></i>
                            </a>
                        </div>
                        <div class="header-top-langs">

                            <div id="flags" class="size18">
                                <ul id="sortable" class="ui-sortable" style="float:left">
                                    <li id="English">
                                        <a title="English" class="notranslate flag en united-states" data-lang="English">EN</a>
                                    </li>
                                    <li id="Russian">
                                        <a title="Russian" class="notranslate flag ru Russian" data-lang="Russian">RU</a>
                                    </li>
                                    <li id="Ukrainian">
                                        <a title="Ukrainian" class="notranslate flag uk Ukrainian" data-lang="Ukrainian">UA</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="header-top-cart">

                            <a class="cart-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                               title="<?php _e( 'View your shopping cart' ); ?>">
								<?php if( get_field('basket_image') ): ?>
                                    <img src="<?php the_field('basket_image'); ?>">
								<?php else :?>
                                    <img src="https://pratostore.com/wp-content/uploads/2018/04/PAID_ICON.png" alt="">
								<?php endif; ?>
                                <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </a>

                            <!--                            TODO: WooCommerce Cart here-->

                        </div>
                    </div>
                </div>
            </div>
            <nav class="navigation">
                <div class="navbar-toggler" title="menu" id="menu-toggle">
                    <div class="hamburger-inner"></div>
                </div>
                <div class="header-mobile-cart">

                    <a class="cart-mobile-customlocation" href="<?php echo wc_get_cart_url(); ?>"
                       title="<?php _e( 'View your shopping cart' ); ?>">
			            <?php if( get_field('basket_image') ): ?>
                            <img src="<?php the_field('basket_image'); ?>">
			            <?php else :?>
                            <img src="https://pratostore.com/wp-content/uploads/2018/04/PAID_ICON.png" alt="">
			            <?php endif; ?>
                        <span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>

                    <!--                            TODO: WooCommerce Cart here-->

                </div>
                <div id="sidebar-wrapper">
                    <ul class="sidebar-nav">
                        <li class="toggler-row">
                            <div id="menu-close">
                                <i class="fas fa-times"></i>
                            </div>
                        </li>
                        <li class="navigation-item">
                            <div class="navigation-search">
                                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                                    <!--                            <label class="screen-reader-text" for="s">--><?php //_e( 'Search for:', 'woocommerce' ); ?><!--</label>-->
                                    <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( '', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Поиск:', 'label', 'woocommerce' ); ?>" />
                                    <input type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'woocommerce' ); ?>" />
                                    <i class="fas fa-search"></i>
                                    <input type="hidden" name="post_type" value="product" />
                                </form>
                                <!--                        >-->
                                <!--                    TODO: WooCommerce Search here-->

                            </div>
                        </li>
                        <li class="navigation-item nav-item-img">
                            <a class="navigation-link" href="/">
                                <!--                                IMAGE LOGO-->
								<?php if( get_field('prato_logo') ): ?>
                                    <img src="<?php the_field('prato_logo'); ?>">
								<?php else :?>
                                    <img src="https://pratostore.com/wp-content/uploads/2018/04/logo-1.svg" alt="">
								<?php endif; ?>

                            </a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-home navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Домашняя страница' )->ID ); ?>">Главная</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-about navigation-link" href="<?php echo get_page_link( get_page_by_title( 'О Нас' )->ID ); ?>">О нас</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-store navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Каталог Товара' )->ID ); ?>">Каталог Товара</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-info navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Оплата и Доставка' )->ID ); ?>">Оплата / Доставка</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-contacts navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Контакты' )->ID ); ?>">Контакты</a>
                        </li>

                        <hr>

                        <li class="navigation-item mobile-phones">
                            <div class="phone-number">
                                <span>
                                    <i class="fas fa-phone"></i>
                                </span>
                                <a class="notranslate"
                                   href="tel: <?php if( get_field('phone_1_int') ): ?>
                                                <?php the_field('phone_1_int'); ?>
                                    <?php else :?>
                                        +380504710221
                                    <?php endif; ?>">

		                            <?php if( get_field('phone_1') ): ?>
			                            <?php the_field('phone_1'); ?>
		                            <?php else :?>
                                        050 471 02 21
		                            <?php endif; ?>
                                </a>
                            </div>
                            <div class="phone-number">
                                <span>
                                    <i class="fas fa-phone"></i>
                                </span>
                                <a class="notranslate"
                                   href="tel: <?php if( get_field('phone_2_int') ): ?>
                                        <?php the_field('phone_2_int'); ?>
                                    <?php else :?>
                                        +380675445421
                                    <?php endif; ?>">

		                            <?php if( get_field('phone_2') ): ?>
			                            <?php the_field('phone_2'); ?>
		                            <?php else :?>
                                        067 544 54 21
		                            <?php endif; ?>

                                </a>
                            </div>
                        </li>
                        <li class="navigation-item">
                            <div class="header-top-mail">
                                <span>
                                    <i class="far fa-envelope"></i>
                                </span>
                                <a href="mailto:<?php if( get_field('email') ): ?>
                                <?php the_field('email'); ?>
                            <?php else :?>
                            pratoaleks@gmail.com
                            <?php endif; ?>">

			                        <?php if( get_field('email') ): ?>
				                        <?php the_field('email'); ?>
			                        <?php else :?>
                                        pratoaleks@gmail.com
			                        <?php endif; ?>

                                </a>
                            </div>
                        </li>

                        <li class="navigation-item">
                            <div class="header-top-langs">
                                <div id="flags" class="size18">
                                    <ul id="sortable" class="ui-sortable" style="float:left">
                                        <li id="English">
                                            <a title="English" class="notranslate flag en united-states" data-lang="English">EN</a>
                                        </li>
                                        <li id="Russian">
                                            <a title="Russian" class="notranslate flag ru Russian" data-lang="Russian">RU</a>
                                        </li>
                                        <li id="Ukrainian">
                                            <a title="Ukrainian" class="notranslate flag uk Ukrainian" data-lang="Ukrainian">UA</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="container header-nav-main">
                    <ul class="navigation-list">
                        <li class="navigation-item">
                            <a class="navigation-link" href="/">
                                <!--                                IMAGE LOGO-->
								<?php if( get_field('prato_logo') ): ?>
                                    <img src="<?php the_field('prato_logo'); ?>">
								<?php else :?>
                                    <img src="https://pratostore.com/wp-content/uploads/2018/04/logo-1.svg" alt="">
								<?php endif; ?>
                            </a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-home navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Домашняя страница' )->ID ); ?>">Главная</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-about navigation-link" href="<?php echo get_page_link( get_page_by_title( 'О Нас' )->ID ); ?>">О нас</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-store navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Каталог Товара' )->ID ); ?>">Каталог Товара</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-info navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Оплата и Доставка' )->ID ); ?>">Оплата / Доставка</a>
                        </li>
                        <li class="navigation-item">
                            <a class="link-contacts navigation-link" href="<?php echo get_page_link( get_page_by_title( 'Контакты' )->ID ); ?>">Контакты</a>
                        </li>
                    </ul>
                    <div class="navigation-search">
                        <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
                            <!--                            <label class="screen-reader-text" for="s">--><?php //_e( 'Search for:', 'woocommerce' ); ?><!--</label>-->
                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( '', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Поиск:', 'label', 'woocommerce' ); ?>" />
                            <input type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'woocommerce' ); ?>" />
                            <i class="fas fa-search"></i>
                            <input type="hidden" name="post_type" value="product" />
                        </form>
                        <!--                        >-->
                        <!--                    TODO: WooCommerce Search here-->

                    </div>
                </div>
            </nav>


        </section>



