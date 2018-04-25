<?php /* Template Name: contacts */ ?>

<?php get_header(); ?>

<main>
    <section class="contacts">
        <div class="container contacts-content">
            <div class="link-parent"><a href="<?echo get_permalink( get_page_by_title( 'Домашняя страница' ) )?>">Главная</a> / Контакты</div>
            <h2>Контакты</h2>
            <p class="paragraph-heading">
				<?php if( get_field('text_1_contacts') ): ?>
					<?php the_field('text_1_contacts'); ?>
				<?php else :?>

                    Уважаемые клиенты, мы будем рады услышать вас:

				<?php endif; ?>
            </p>

            <p class="font-regular">ТЕЛ.:
                <br>
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
            </p>
            <p>
                Наш график работы: <br>

				<?php if( get_field('timetable_contacts') ): ?>
					<?php the_field('timetable_contacts'); ?>
				<?php else :?>

                    Пн-Пт: с 10:00 до 18:00 <br>                  Cб-Вс: выходной

				<?php endif; ?>
            </p>
            <p> ПОЧТА: <a class="contacts-mail" href="mailto:<?php if( get_field('email') ): ?>
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
            </p>
            <p>Adress 4240 Lancovo 6D Radovlica Slovenia.</p>
            <p>Товар можно посмотреть и приобрести по адресу: <br>
				<?php if( get_field('address') ): ?>
					<?php the_field('address'); ?>
				<?php else :?>
                    Г. Мариуполь ул. Итальянская, 87 <br>
                    «Галерея Табурет»
				<?php endif; ?>
            </p>
        </div>
    </section>
</main>

<?php get_footer(); ?>

