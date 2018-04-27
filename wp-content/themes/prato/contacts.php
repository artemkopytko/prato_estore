<?php /* Template Name: contacts */ ?>

<?php get_header(); ?>

<main>
    <section class="contacts">
        <div class="container contacts-content">
            <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / Контакты</div>
	        <?php
	        $page = get_page_by_title( 'Контакты' );
	        $content = apply_filters('the_content', $page->post_content);
	        echo $content;
	        ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

