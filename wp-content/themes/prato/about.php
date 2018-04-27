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
            <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / О Нас</div>

	        <?php
	        $page = get_page_by_title( 'О Нас' );
	        $content = apply_filters('the_content', $page->post_content);
	        echo $content;
	        ?>

        </div>
    </section>
</main>






<?php get_footer(); ?>
