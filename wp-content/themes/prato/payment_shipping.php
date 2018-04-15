<?php /* Template Name: payment_shipping */ ?>

<?php get_header(); ?>

<script>

</script>

<main>
    <section class="info">
        <div class="container info-content">
            <div class="link-parent"><a href="/">Главная</a> / Оплата и Доставка</div>
            <h2>Оплата</h2>
            <h3>
				<?php if( get_field('info_1_heading') ): ?>
					<?php the_field('info_1_heading'); ?>
				<?php else :?>

                    1. ОПЛАТА НА КАРТУ ПРИВАТ БАНКА, А ТАК ЖЕ БАНК ПУМБ

				<?php endif; ?>

            </h3>
            <div class="payment-getaways">
                <!--                IMAGE-->
				<?php if( get_field('image_bank_1') ): ?>
                    <img src="<?php the_field('image_bank_1'); ?>">
				<?php else :?>
                    <img src="https://pratostore.com/wp-content/uploads/2018/04/PrivatBank-1.png" alt="">
				<?php endif; ?>

                <!--                IMAGE-->
				<?php if( get_field('image_bank_2') ): ?>
                    <img src="<?php the_field('image_bank_2'); ?>">
				<?php else :?>
                    <img src="https://pratostore.com/wp-content/uploads/2018/04/pumb-1.png" alt="">
				<?php endif; ?>

            </div>
            <p>
				<?php if( get_field('info_1_text') ): ?>
					<?php the_field('info_1_text'); ?>
				<?php else :?>

                    Физические лица могут производить оплату в любом банке, а также оплачивать свой заказ с помощью сервиса онлайн платежей Приват24.

				<?php endif; ?>
            </p>
            <p>
				<?php if( get_field('info_1_comment') ): ?>
					<?php the_field('info_1_comment'); ?>
				<?php else :?>

                    *реквизиты на оплату высылаются на эл.почту после оформления заказа и согласования с менеджером.

				<?php endif; ?>
            </p>

            <h3>
				<?php if( get_field('info_2_heading') ): ?>
					<?php the_field('info_2_heading'); ?>
				<?php else :?>

                    2. БЕЗНАЛИЧНЫЙ РАСЧЕТ

				<?php endif; ?>
            </h3>

            <p>
				<?php if( get_field('info_2_text') ): ?>
					<?php the_field('info_2_text'); ?>
				<?php else :?>

                    Для юридических  и физических лиц (по запросу) выставляется счет-фактура и высылается на эл.почту. Все необходимые регистрационные документы отправляются вместе со счетом на оплату.

				<?php endif; ?>
            </p>
            <h2>
				<?php if( get_field('info_3_heading') ): ?>
					<?php the_field('info_3_heading'); ?>
				<?php else :?>

                    Доставка

				<?php endif; ?>

            </h2>
            <span>
                <?php if( get_field('info_3_text') ): ?>
	                <?php the_field('info_3_text'); ?>
                <?php else :?>

                    Мы готовы отправить вашу покупку с Мариуполя в любой город Украины транспортной компанией Новая Почта.

                <?php endif; ?>
            </span>
        </div>
    </section>
</main>

<?php get_footer(); ?>

