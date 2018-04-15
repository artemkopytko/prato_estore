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
                    <a class="navigation-link-footer" href="/">Главная</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="/about">О нас</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="/store">Каталог Товара</a>
                    <ul class="footer-products-categories">
                        <li class="footer-product-category">
                            <a href="/store?category=chairs">Кресла</a>
                        </li>
                        <li class="footer-product-category">
                            <a href="/store?category=beds">Кровати</a>
                        </li>
                        <li class="footer-product-category">
                            <a href="/store?category=walls">Стенки</a>
                        </li>
                        <li class="footer-product-category">
                            <a href="/store?category=crubstones">Тумбы</a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="/info">Оплата / Доставка</a>
                </li>
                <li class="navigation-item-footer">
                    <a class="navigation-link-footer" href="/contacts">Контакты</a>

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
                            Г. Мариуполь ул. Итальянская, 87 <br>
                            «Галерея Табурет»</li>
                    </ul>

                    <a class="social-footer" href="/contacts">
                        <i class="fab fa-facebook-f" style="color: white;"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="footer-mobile-social">
            <a class="navigation-link-footer social-footer" href="/contacts">
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
<?php wp_footer(); ?>

</body>
</html>
