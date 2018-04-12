<?php /* Template Name: product */ ?>

<?php get_header(); ?>

<main>
    <section>
        <div class="container product-content">
            <div class="link-parent"><a href="/prato/">Главная</a> / Каталог Товара / Стулья</div>

            <div class="product">
                <div class="product-categories">
                    <h2>Каталог Товара</h2>
                    <ul>
                        <li>
                            <a class="active" href="prato/store?category=chairs">
                                Кресла
                            </a>
                        </li>
                        <li>
                            <a href="/prato/store?category=beds">
                                Кровати
                            </a>
                        </li>
                        <li>
                            <a href="/prato/store?category=walls">
                                Стенки
                            </a>
                        </li>
                        <li>
                            <a href="/prato/store?category=crubstones">
                                Тумбы
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="product-info">
                    <div class="product-main">
                        <div class="product-image" style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
                        <div class="product-main-desc">
                            <h1>Кресло стиль модерн</h1>
                            <p>Артикул 999.318.24</p>
                            <p class="product-price">Цена 20 000 грн</p>

                            <a href="/prato/cart">Добавить в корзину</a>
                        </div>
                    </div>
                    <div class="product-desc">
                        <p class="product-desc-heading">Описание Товара</p>
                        <span>Ручная работа – каждый предмет мебели уникален. <br>
                        Мебель из натурального материала – легкая, прочная и устойчивая.</span>

                        <p class="product-desc-heading">Дизайнер</p>
                        <span>Prato</span>

                        <p class="product-desc-heading">Материал</p>
                        <span>Дерево, ткань.</span>

                        <p class="product-desc-heading">Размер</p>
                        <span>Высота 94 см <br>
                        Ширина 74 см <br>
                        Глубина 70 см</span>

                        <p class="product-desc-heading">Производитель</p>
                        <span>Украина-Словения</span>
                    </div>
                </div>
                <div class="space"></div>
            </div>
            <div class="related-products">
                <h3>Похожие Товары</h3>
                <div class="latest-products">
                    <div class="related-product">
                        <!--                    IMAGE-->
                        <div class="related-product-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/banner_photo-1.png')"></div>
                        <h4>Кресло</h4>
                        <span>Стиль модерн</span>
                        <p>20 000грн</p>
                        <a href="">Подробнее</a>
                    </div>
                    <div class="related-product">
                        <!--                    IMAGE-->
                        <div class="related-product-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/Layer-1-copy.png');"></div>
                        <h4>Стол</h4>
                        <span>Стиль модерн</span>
                        <p class="product-price-unknown">узнать цену</p>
                        <a href="">Подробнее</a>
                    </div>
                    <div class="related-product" >
                        <!--                    IMAGE-->
                        <div class="related-product-image"
                             style="background-image: url('http://localhost:8888/prato/wp-content/uploads/2018/04/image-15-08-16-06-54-18.png');"></div>
                        <h4>Тумба</h4>
                        <span>Стиль модерн</span>
                        <p>20 000 грн</p>
                        <a href="">Подробнее</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>

