<?php /* Template Name: checkout */ ?>

<?php get_header(); ?>

<main>
	<section class="checkout">
		<div class="container checkout-content">
			<div class="link-parent"><a href="/prato/">Главная</a> / Корзина / Форма Заказа</div>
			<div class="order-preview">
				<h2>Ваш Товар</h2>
				<div class="order-preview-heading">
					<div class="order-preview-cell"></div>
					<div class="order-preview-cell-big"></div>
					<div class="order-preview-cell"><p>Цена</p></div>
					<div class="order-preview-cell"><p>Количество</p></div>
					<div class="order-preview-cell"><p>Сумма</p></div>
				</div>
				<div class="order-preview-content">
					<div class="order-preview-cell">
						<div class="order-image"
						     style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
					</div>
					<div class="order-preview-cell-big">
						<div class="order-preview-cell-content">
							<span>Кресло в стиле модерн</span>
						</div>
					</div>
					<div class="order-preview-cell">
						<div class="order-preview-cell-content">
							<span>20 000грн</span>
						</div>
					</div>
					<div class="order-preview-cell">
						<div class="order-preview-cell-content">
							<input type="number" step="1" value="1" disabled title="Количество">
						</div>
					</div>
					<div class="order-preview-cell">
						<div class="order-preview-cell-content">
							<span>20 000 грн</span>
						</div>
					</div>
				</div>
                <div class="order-preview-content">
                    <div class="order-preview-cell">
                        <div class="order-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
                    </div>
                    <div class="order-preview-cell-big">
                        <div class="order-preview-cell-content">
                            <span>Кресло в стиле модерн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000грн</span>
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <input type="number" step="1" value="1" disabled title="Количество">
                        </div>
                    </div>
                    <div class="order-preview-cell">
                        <div class="order-preview-cell-content">
                            <span>20 000 грн</span>
                        </div>
                    </div>
                </div>
			</div>

            <div class="checkout-form">
                <h2>Форма Заказа</h2>
                <form action="???" method="post">
                    <div class="form-row">
                        <div class="form-row-desc">
                            <span>Личная информация</span>
                        </div>
                        <div class="form-row-inputs">
                            <div class="form-input-row">
                                <label for="name">Ф.И.О.<span class="highlighted">*</span></label>
                                <input id="name" type="text" placeholder="Притула Андрей Сергеевич">
                            </div>
                            <div class="form-input-row">
                                <label for="phone">Телефон<span class="highlighted">*</span></label>
                                <input id="phone" type="text" placeholder="+38 (096) 333 33 33">
                            </div>
                            <div class="form-input-row">
                                <label for="email">Email:</label>
                                <input id="email" type="email" placeholder="youramazingemail@gmail.com">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-desc">
                            <span>Адрес доставки</span>
                        </div>
                        <div class="form-row-inputs">
                            <div class="form-input-row">
                                <label for="shippingAddress">Адрес доставки:</label>
                                <textarea name="" id="shippingAddress" placeholder="г. Киев, ул. Артема 33, кв. 33"></textarea>
                            </div>
                            <div class="form-input-row">
                                <label for="">Способ оплаты:</label>
                                <div class="payment-methods">
                                    <input id="cash" type="radio" checked name="payment-type">
                                    <label for="cash">наличными</label>
                                    <input id="visa" type="radio" name="payment-type">
                                    <label for="visa">
                                        <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/Visa_Inc._logo.png" alt="">
                                    </label>
                                    <input id="mcard" type="radio" name="payment-type">
                                    <label for="mcard">
                                        <img src="http://localhost:8888/prato/wp-content/uploads/2018/04/640px-MasterCard_logo.png" alt="">
                                    </label>
                                </div>
                            </div>
                            <div class="form-input-row">
                                <label for="extra">Примечания: </label>
                                <textarea name="" id="extra"></textarea>
                            </div>

                           </div>
                    </div>
                    <div class="form-buttons">
                        <a href="/prato/cart">В Корзину</a>
                        <button type="submit">Завершить</button>
                    </div>
                </form>
            </div>
		</div>
	</section>
</main>

<?php get_footer(); ?>

