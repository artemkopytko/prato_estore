<?php /* Template Name: about */ ?>

<?php get_header(); ?>

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
    <section class="about">
        <div class="container about-content">
            <div class="link-parent"><a href="/">Главная</a> / О Нас</div>
            <p class="about-heading">
				<?php if( get_field('text_1') ): ?>
					<?php the_field('text_1'); ?>
				<?php else :?>

                    Вся мебель «Prato» <br>
                    производится в ручную, <br>
                    с инспекцией, от выдерживания древесины до обработки нетоксичными материалами.

				<?php endif; ?>
            </p>
            <p>
				<?php if( get_field('text_2') ): ?>
					<?php the_field('text_2'); ?>
				<?php else :?>

                    По вашему запросу мы указываем при покупке, какие сорта дерева использовали, типы соединений и <br>
                    используемые клеи и лаки. Это дает возможность, один раз купив мебель такого высокого качества, <br>
                    использовать ее в своем жизненном пространстве с максимальным спокойствием. <br>
                    Также мы предоставляем услуги ремонта реставрации наших изделий.

				<?php endif; ?>
            </p>
            <p>
				<?php if( get_field('text_3') ): ?>
					<?php the_field('text_3'); ?>
				<?php else :?>

                    Массив дерева для своей мебели ручной работы компания «Prato», выбирает отборные сорта массива <br>
                    дерева или натурального шпона для мебели в целом, а также для задних стенок, чтобы достичь <br>
                    наилучшего результатов в процессе производства, это гарантирует лучшие показатели выносливости и <br>
                    имеет преимущество – улучшаться со временем. <br>
                    «Prato», строго отбирает только лучшие породы древесины и сопутствующие материалы и использует их с <br>
                    максимальным вниманием  и технологиями столярного дела.

				<?php endif; ?>
            </p>
        </div>
    </section>
</main>






<?php get_footer(); ?>
