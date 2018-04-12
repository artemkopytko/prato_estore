<?php /* Template Name: cart */ ?>

<?php get_header(); ?>

<main>
	<section class="cart">
		<div class="container cart-content">
			<div class="link-parent"><a href="/prato/">Главная</a> / Корзина</div>
				<div class="cart-wrapper">
					<h2>Ваш Товар</h2>
					<div class="cart-item">
						<div class="cart-cell-big">
							<p class="cart-item-title">Кресло в стиле модерн</p>
							<div class="cart-item-image"
							     style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')">
							</div>
						</div>
						<div class="cart-cell cart-cell-bottom">
							<div class="cart-item-desc">
								<p class="cart-item-desc-heading">Размер</p>
								<span>Высота 94 см</span>
								<span>Ширина 74 см</span>
								<span>Глубина 70 см</span>
								<p class="cart-item-desc-heading">Производитель</p>
								<span>Украина-Словения</span>
							</div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Цена</p></div>
							<div class="cart-cell-content"><span>20 000 грн</span></div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Количество</p></div>
							<div class="cart-cell-content">
								<input title="Количество" type="number" value="1" step="1" min="1" max="99" name="quantity">
							</div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Сумма</p></div>
							<div class="cart-cell-content"><span>20 000 грн</span></div>
						</div>
					</div>

					<div class="cart-item">
						<div class="cart-cell-big">
							<p>Кресло в стиле модерн</p>
							<div class="cart-item-image"
							     style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')">
							</div>
						</div>
						<div class="cart-cell cart-cell-bottom">
							<div class="cart-item-desc">
								<p class="cart-item-desc-heading">Размер</p>
								<span>Высота 94 см</span>
								<span>Ширина 74 см</span>
								<span>Глубина 70 см</span>
								<p class="cart-item-desc-heading">Производитель</p>
								<span>Украина-Словения</span>
							</div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Цена</p></div>
							<div class="cart-cell-content"><span>20 000 грн</span></div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Количество</p></div>
							<div class="cart-cell-content">
								<input title="Количество" type="number" value="1" step="1" min="1" max="99" name="quantity">
							</div>
						</div>
						<div class="cart-cell">
							<div class="cart-cell-heading"><p>Сумма</p></div>
							<div class="cart-cell-content"><span>20 000 грн</span></div>
						</div>
					</div>
<!--					IF CART IS NOT EMPTY-->
					<a class="cart-order" href="/prato/checkout">Заказать</a>
				</div>
			</div>
	</section>
</main>

<?php get_footer(); ?>

