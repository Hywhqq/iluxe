

<main class="main">

            <section class="main__category category">

                <div class="category__container-small">

                    <div class="category__wrapper">

                        <h1 class="category__title">Корзина</h1>

                    </div>

                </div>

            </section>

            <div class="main__cart cart">

                <div class="cart__container-small">

                    <div class="followed">

                        <div class="followed__labels">

                            <div class="followed__label">Фотография</div>

                            <div class="followed__label">Название</div>

                            <div class="followed__label">Цена</div>

                            <div class="followed__label">Количество</div>

                        </div>

                        <div class="followed__list">

                            

                        <?php

    $getAllCartQuery = "SELECT * FROM cart WHERE id_user = '$id_user'";

    $allCartResponse = $link -> query($getAllCartQuery);

    $sumProducts = 0;

    while ($cart = $allCartResponse -> fetch(PDO::FETCH_ASSOC)) {



        $getProduct = "SELECT * FROM products WHERE id={$cart['id_product']}";

        $oneProduct = $link -> query($getProduct);

        $products = $oneProduct -> fetch(PDO::FETCH_ASSOC);

        $productPrice = $cart['count'] * $products['price'];

        $sumProducts += $productPrice;

        $id__product = $products['id'];

        ?>

        <div class="followed__product">

            <div class="followed__preview">

                <img src="<?=$products['img']?>" alt="">

            </div>

            <div class="followed__info info-prod-box">

                <h4 class="info-prod-box__name" title="Jordan 4 Retro"><?=$products['title']?></h4>

            </div>

            <div class="followed__price"><?=$products['price']?> ₽</div>

            <div class="followed__price"><?=$cart['count']?></div>

            <a href="?deleteCart=<?= $cart['id']?>" class="followed__rm">

                <img src="./img/trash.png" alt="trash">

            </a>

        </div>

        <?

    } 

    ?>

                        

                        </div>



                        <div class="total-price">

                            <span>Итого: </span>

                            <span class="total-price__price"><?=$sumProducts?> ₽</span>

                        </div>



                        <!-- <button class="cart__order-button button-filled">Оформить заказ</button> -->

                        <a href="?page=user" class="cart__order-button button-filled">Оформить заказ</a>

                        <a href="?deleteAllCart" class="cart__order-button button-filled">Очистить корзину</a>

                    </div>

                </div>

            </div>

        </main>



