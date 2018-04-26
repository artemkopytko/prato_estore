<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prato
 */

?>

</div> <!-- .content -->

<section class="footer">
    <div class="container footer-content">
        <nav class="navigation-footer">
            <ul class="navigation-list-footer">
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="/">
                        <!--                                IMAGE LOGO-->
						<?php if( get_field('prato_logo') ): ?>
                            <img src="<?php the_field('prato_logo'); ?>">
						<?php else :?>
                            <img src="https://pratostore.com/wp-content/uploads/2018/04/logo-1.svg" alt="">
						<?php endif; ?>
                    </a>
                </li>

                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="<?php echo get_page_link( get_page_by_title( 'Домашняя страница' )->ID ); ?>">Главная</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="<?php echo get_page_link( get_page_by_title( 'О Нас' )->ID ); ?>">О нас</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="<?php echo get_page_link( get_page_by_title( 'Каталог Товара' )->ID ); ?>">Каталог Товара</a>

                    <ul class="footer-products-categories">
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
		                    echo '<li class="footer-product-category">' .
                            '<a href="' . $link . '">' . $cat->name . '</a> 
                        </li>';
	                    }
	                    ?>

                    </ul>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="<?php echo get_page_link( get_page_by_title( 'Оплата и Доставка' )->ID ); ?>">Оплата / Доставка</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="<?php echo get_page_link( get_page_by_title( 'Контакты' )->ID ); ?>">Контакты</a>

                    <ul class="footer-contacts-extended">
                        <li class="footer-contact-phones">
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

                            <br>

                            <a class="notranslate"
                               href="tel:<?php if( get_field('phone_2_int') ): ?>
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
                        </li>
                        <li class="footer-contact-email">
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
                        </li>
                        <li class="footer-contact-address">Address 4240 Lancovo 6D Radovlica Slovenia.</li>
                        <li class="footer-contact-showroom">Товар можно посмотреть и приобрести по адресу: <br>
							<?php if( get_field('address') ): ?>
								<?php the_field('address'); ?>
							<?php else :?>
                                Г. Мариуполь ул. Итальянская, 87 <br>
                                «Галерея Табурет»
							<?php endif; ?>
                        </li>
                    </ul>

                    <a class="social-footer" href="#">
                        <i class="fab fa-facebook-f" style="color: white;"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="footer-mobile-social">
            <a class="navigation-link-footer social-footer" href="#">
                <i class="fab fa-facebook-f" style="color: white;"></i>
            </a>
        </div>
        <div class="footer-mobile-contacts">
            <ul class="footer-contacts-extended">
                <li class="footer-contact-phones">
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

                    <br>


                    <a class="notranslate"
                       href="<?php if( get_field('phone_2_int') ): ?>
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
                </li>
                <li class="footer-contact-email">
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
                </li>
                <li class="footer-contact-address">Address 4240 Lancovo 6D Radovlica Slovenia.</li>
                <li class="footer-contact-showroom">Товар можно посмотреть и приобрести по адресу: <br>
					<?php if( get_field('address') ): ?>
						<?php the_field('address'); ?>
					<?php else :?>
                        Г. Мариуполь ул. Итальянская, 87 <br>
                        «Галерея Табурет»
					<?php endif; ?>
                </li>
            </ul>
        </div>

    </div>
</section>
</div> <!-- .wrapper -->

<script>
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").css("left", "-500px");
    });
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").css("left", "0");
    });




    var pathname = window.location.pathname;
    var links;
    if(pathname === '/' || pathname === '/prato/')
    {
        links = document.getElementsByClassName('link-home');
    }
    else if (pathname.indexOf('/about/') >= 0)
    {
        links = document.getElementsByClassName('link-about');
    }
    else if ((pathname.indexOf('/store/') >= 0) || (pathname.indexOf('/product/') >= 0) || (pathname.indexOf('product-category') >= 0))
    {
        links = document.getElementsByClassName('link-store');

        if(pathname.indexOf('product-category') >= 0)
        {
            if(pathname.indexOf('walls') >= 0)
            {
                document.getElementById('walls-filter').classList.add('active');
            }
            else if(pathname.indexOf('chairs') >= 0)
            {
                document.getElementById('chairs-filter').classList.add('active');
            }
            else if(pathname.indexOf('curbstones') >= 0)
            {
                document.getElementById('curbstones-filter').classList.add('active');
            }
            else if(pathname.indexOf('beds') >= 0)
            {
                document.getElementById('beds-filter').classList.add('active');
            }
        }
    }
    else if (pathname.indexOf('/info/') >= 0)
    {
        links = document.getElementsByClassName('link-info');
    }
    else if (pathname.indexOf('/contacts/') >= 0)
    {
        links = document.getElementsByClassName('link-contacts');
    }

    links[0].classList.add('active');
    links[1].classList.add('active');




</script>

<?php wp_footer(); ?>

</body>
</html>