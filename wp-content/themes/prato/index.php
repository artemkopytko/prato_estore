<?php /* Template Name: index */ ?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Prato
 */

get_header();
?>


    <style>
        <?php if( get_field('background_about') ): ?>
        .about:before {
            background-image: url("<?php the_field('background_about'); ?>");
        }
        <?php else :?>
        .about:before {
            background-image: url("https://pratostore.com/wp-content/uploads/2018/04/Vector-Smart-Object-copy-8-1_62edc1f1f7598fa8ec11563ce10ed1af.png");
        }
        <?php endif; ?>
    </style>

    <main>
        <section class="intro">
            <div class="container intro-content">
                <div class="intro-info">
					<?php if( get_field('heading_text_block1') ): ?>
                        <h1><?php the_field('heading_text_block1'); ?></h1>
					<?php else :?>
                        <h1>
                            ПРОФЕССИОНАЛИЗМ – КЛЮЧЕВОЕ СЛОВО,
                            КОГДА РЕЧЬ ИДЕТ О МЕБЕЛИ “PRATO”,
                            ПРИ СОЗДАНИИ КОТОРОЙ ИСПОЛЬЗУЮТСЯ ЛУЧШИЕ МЕТОДЫ СТОЛЯРНОГО МАСТЕРСТВА.
                        </h1>
					<?php endif; ?>
                    <a href="/prato/store">Посмотреть</a>
                </div>
                <div class="intro-image">
                    <!--                IMAGE BANNER-->
					<?php if( get_field('image_block1') ): ?>
                        <img src="<?php the_field('image_block1'); ?>">
					<?php else :?>
                        <img src="https://pratostore.com/wp-content/uploads/2018/04/banner_photo.png" alt="">
					<?php endif; ?>

                </div>
            </div>
        </section>
        <section class="about">
            <div class="container about-content">
                <h2>О Нас</h2>
				<?php if( get_field('text_about') ): ?>
                    <p><?php the_field('text_about'); ?></p>
				<?php else :?>
                    <p>
                        Молодая и креативная студия дизайна “Prato” <br>
                        Предлагает Вам удобную стильную и уникальную мебель из массива дерева <br>
                        для Вашего дома. <br>
                        Каждая вещь производится только в единичном экземпляре. <br>
                        Вы можете сами выбрать цвет и дизайн, либо приобрести готовое изделие.
                    </p>
				<?php endif; ?>
                <a href="/prato/about">Читать Дальше</a>
            </div>
        </section>
        <section class="latest-in">
            <div class="container latest-in-content">
                <h3>Новые Поступления</h3>
                <div class="latest-products">
                    <div class="product">
                        <!--                    IMAGE-->
                        <div class="product-image"
                             style="background-image: url('https://pratostore.com/wp-content/uploads/2018/04/banner_photo.png')"></div>
                        <h4>Кресло</h4>
                        <span>Стиль модерн</span>
                        <p>20 000 грн</p>
                        <a href="/prato/product">Подробнее</a>
                    </div>
                    <div class="product">
                        <!--                    IMAGE-->
                        <div class="product-image"
                             style="background-image: url('https://pratostore.com/wp-content/uploads/2018/04/Layer-1-copy-1.png');"></div>
                        <h4>Стол</h4>
                        <span>Стиль модерн</span>
                        <p class="product-price-unknown">узнать цену</p>
                        <a href="/prato/product">Подробнее</a>
                    </div>
                    <div class="product" >
                        <!--                    IMAGE-->
                        <div class="product-image"
                             style="background-image: url('https://pratostore.com/wp-content/uploads/2018/04/image-15-08-16-06-54-18-1.png');"></div>
                        <h4>Тумба</h4>
                        <span>Стиль модерн</span>
                        <p>20 000 грн</p>
                        <a href="/prato/product">Подробнее</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="us">
            <div class="container us-content">

                <h2>Почему Выбирают Нас</h2>
				<?php if( get_field('text_upper_us') ): ?>
                    <p><?php the_field('text_upper_us'); ?></p>
				<?php else :?>
                    <p>
                        Сертификация мебели ручной работы от «Prato».
                    </p>
				<?php endif; ?>


				<?php if( get_field('text_us') ): ?>
                    <p><?php the_field('text_us'); ?></p>
				<?php else :?>
                    <p>
                        Вся мебель производится в ручную, с инспекцией, от выдерживания древесины до обработки <br>
                        нетоксичными материалами.
                        Клеймо-шильд торговой марки, ставится на каждый предмет мебели, который свидетельствует о <br>
                        гарантии и принадлежности мебели нашей торговой марки, обеспечивает происхождение и <br>
                        уникальность, и является знаком качества  и мастерства.
                    </p>
				<?php endif; ?>

            </div>
        </section>
    </main>

<?php
get_footer();
