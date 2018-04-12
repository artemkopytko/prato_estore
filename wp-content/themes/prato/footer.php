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
                        <a class="navigation-link-footer" href="/prato/">
                            <!--                                IMAGE LOGO-->
                            <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/logo.svg" alt="#">
                        </a>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer" href="/prato/">Главная</a>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer" href="/prato/about">О нас</a>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer" href="/prato/store">Каталог Товара</a>
                        <ul class="footer-products-categories">
                            <li class="footer-product-category">
                                <a href="prato/store?category=chairs">Кресла</a>
                            </li>
                            <li class="footer-product-category">
                                <a href="/prato/store?category=beds">Кровати</a>
                            </li>
                            <li class="footer-product-category">
                                <a href="/prato/store?category=walls">Стенки</a>
                            </li>
                            <li class="footer-product-category">
                                <a href="/prato/store?category=crubstones">Тумбы</a>
                            </li>
                        </ul>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer" href="/prato/info">Оплата / Доставка</a>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer" href="/prato/contacts">Контакты</a>

                        <ul class="footer-contacts-extended">
                            <li class="footer-contact-phones">
                                <a href="tel:+380504710221">050 471 02 21</a><br>
                                <a href="tel:+380675445421">067 544 54 21</a>
                            </li>
                            <li class="footer-contact-email">
                                <a href="mailto:pratoaleks@gmail.com">
                                    pratoaleks@gmail.com
                                </a>
                            </li>
                            <li class="footer-contact-address">Address 4240 Lancovo 6D Radovlica Slovenia.</li>
                            <li class="footer-contact-showroom">Товар можно посмотреть и приобрести по адресу: <br>
                                Г. Мариуполь ул. Итальянская, 87 <br>
                                «Галерея Табурет»</li>
                        </ul>
                    </li>
                    <li class="navigation-item-footer">
                        <a class="navigation-link-footer social-footer" href="/prato/contacts">
                            <i class="fab fa-facebook-f" style="color: white;"></i>
                        </a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>
</div> <!-- .wrapper -->
<?php wp_footer(); ?>

</body>
</html>
