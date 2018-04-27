<?php /* Template Name: payment_shipping */ ?>

<?php get_header(); ?>

<script>

</script>

<main>
    <section class="info">
        <div class="container info-content">
            <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / Оплата и Доставка</div>
	        <?php
	        $page = get_page_by_title( 'Оплата и Доставка' );
	        $content = apply_filters('the_content', $page->post_content);
	        echo $content;
	        ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

