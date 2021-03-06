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

<?php
// Turn off all error reporting
error_reporting(0);
?>

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick-theme.css"/>

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
                    <style>
                        @font-face {
                            font-family: 'Akrobat';
                            src: url('https://pratostore.com/Akrobat-Regular.otf') format('opentype');
                            font-weight: normal;
                            font-style: normal;
                        }

                        @font-face {
                            font-family: 'Akrobat';
                            src: url('https://pratostore.com/Akrobat-Bold.otf') format('opentype');
                            font-weight: bold;
                            font-style: normal;
                        }


                    </style>
					<?php if( get_field('heading_text_block1') ): ?>
                        <h1 style="font-family: 'Akrobat', 'Helvetica Neue' , Arial, Times, sans-serif;">
                            <?php the_field('heading_text_block1'); ?></h1>
					<?php else :?>
                        <h1 style="font-family: 'Akrobat', 'Helvetica Neue' , Arial, Times, sans-serif;">
                            ПРОФЕССИОНАЛИЗМ – КЛЮЧЕВОЕ СЛОВО,
                            КОГДА РЕЧЬ ИДЕТ О МЕБЕЛИ “PRATO”,
                            ПРИ СОЗДАНИИ КОТОРОЙ ИСПОЛЬЗУЮТСЯ ЛУЧШИЕ МЕТОДЫ СТОЛЯРНОГО МАСТЕРСТВА.
                        </h1>
					<?php endif; ?>
<!--                    <a href="--><?//echo get_permalink( get_page_by_title( 'Каталог Товаров' ) )?><!--">Посмотреть</a>-->
                </div>
                <div class="intro-image">
                    <!--                IMAGE BANNER-->
					<?php if( get_field('image_block1') ): ?>
                        <img src="<?php the_field('image_block1'); ?>">
					<?php else :?>
                        <img src="https://pratostore.com/wp-content/uploads/2018/05/2018-05-04-20.23.55.jpg" alt="">
					<?php endif; ?>

                </div>
            </div>
        </section>

            <script>

                function initSlider(){
                    $('.slider-for').slick({
                        slidesToShow: 1,
                        slidesToScroll: 1,
//                        arrows: true,
                        fade: true,
                        asNavFor: '.slider-nav',
                        cssEase: 'linear'
                    });
                    $('.slider-nav').slick({
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        asNavFor: '.slider-for',
//                        dots: true,
                        centerMode: false,
                        focusOnSelect: true,
                        adaptiveHeight: true,
                        variableWidth: true,
                        arrows: true,
//                        autoplay: true,
//                        autoplaySpeed: 5000,
                        responsive: [
//                            {
//                                breakpoint: 1024,
//                                settings: {
//                                    slidesToShow: 5,
//                                    slidesToScroll: 2,
//                                    dots: true
//                                }
//                            },
//                            {
//                                breakpoint: 777,
//                                settings: {
//                                    slidesToShow: 4,
//                                    slidesToScroll: 2,
//                                    dots: true
//                                }
//                            },
                            {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                            },
                            {
                                breakpoint: 450,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: false
                                }
                            }
                        ]
                    });
                }

                $(document).ready(function(){
                    initSlider();
                });

            </script>


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
                <a href="<?echo get_permalink( get_page_by_title( 'О Нас' ) )?>">Читать Дальше</a>
            </div>
        </section>
        <section class="latest-in">
            <div class="container latest-in-content">
                <h3>Новые Поступления</h3>
                <div class="latest-products">


	                <?php
	                global $paged;


	                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	                $args = array(
		                'post_type'=>'product',
		                'posts_per_page' => 3,
		                'orderby' =>'date',
		                'order' => 'DESC'
	                );

	                $loop = new WP_Query( $args );
	                $i = 0;


	                if ( $loop->have_posts() ) {
		                while ( $loop->have_posts() ) : $loop->the_post();



			                global $product;

			                $terms = get_the_terms( $product->get_id(), 'product_tag' );

			                $term_array = array();
			                if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
				                foreach ( $terms as $term ) {
					                $term_array[] = $term->name;
				                }
			                }

			                $attachment_gal_ids = $product->get_gallery_image_ids();

			                foreach( $attachment_gal_ids as $attachment_gal_id ) {
                                $image_link = wp_get_attachment_url( $attachment_gal_id );
			                }

			                if ( has_post_thumbnail( $product->get_id() ) ) {
				                $attachment_ids[0] = get_post_thumbnail_id( $product->get_id() );
				                $attachment        = wp_get_attachment_image_src( $attachment_ids[0], 'full' );
			                }

//					$product->get_attribute( 'your_attr' );

			                echo '
                                <div class="product">
                                    <div class="product-image product-toggle-popup"
                                        style="background-image: url(' . $attachment[0] . ')" data-id="' . $product->get_id() . '"></div>
                                    <h4>' . get_the_title() . '</h4>
                                    <span>Стиль ' . $term_array[ 0 ] . '</span>
                                    <a class="product-price-unknown" href="' . get_permalink() . '">Узнать цену</a>
                                    <a class="more-info" href="' . get_permalink() . '">Подробнее</a>';

    //
                                echo '<div class="popup" id="popup-'.$product->get_id().'">
                                    <button class="close-popup">Закрыть</button>
                                    <div class="popup-window">
                                    <div class="container slider-container">
                                        <div class="slider slider-for">';
                                            foreach( $attachment_gal_ids as $attachment_gal_id ) {
                                                $image_link = wp_get_attachment_url( $attachment_gal_id );
                                                echo '<div class="slider-next-click"><img src="'.$image_link.'"/></div>';
                                            };
                                        echo '
                                        </div>
                                        <div class="slider slider-nav">';
                                            foreach( $attachment_gal_ids as $attachment_gal_id ) {
                                                $image_link = wp_get_attachment_url( $attachment_gal_id );
                                                echo '<div><img src="'.$image_link.'"/></div>';
                                            };
                                            echo '
                                        </div>
                                    </div>
                                    </div>
                                    </div>';




                                echo '</div>';
    //			                p class product-price-unknown



		                endwhile;

	                } else {
		                echo __( 'No products found' );
	                }
	                wp_reset_postdata();
	                ?>
                    <script>
//                        $('.slider-next-click').on("click", function () {
//                            $('.slider-for').slick("slickNext");
//                            $('.slider-nav').slick("slickNext");
//                            $slider.slick("slickNext");
//                        });

                        var $slickElement = $('.slider-for');
//                        var nextArrow = $('.slick-next');
//                        var prevArrow = $('.slick-prev');

                        $slickElement.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
                            var i = (currentSlide ? currentSlide : 0);

                            $('.slick-next').css('display','block');
                            $('.slick-prev').css('display','block');

                            if (i === 2) {
                                console.log('hide 2');
                                $('.slick-next').css('display','none');

                            } else if(i === 0)
                            {
                                console.log('hide 0');
                                $('.slick-prev').css('display','none')
                            }
                            console.log(i);
                        });

                        $('.product-toggle-popup').on('click', function () {
                            var id = $(this).data('id');
                            console.log(id, $(this));
                            $('#popup-'+id).css('left','0');
//                            $prevArrow.css('display','none');
                        });

                        $('.close-popup').on('click',function () {
                            $('.popup').css('left','-9999999px');
                        });

                    </script>

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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.0/slick/slick.min.js"></script>
<?php
get_footer();
