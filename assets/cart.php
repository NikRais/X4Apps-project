<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Корзина — AquaLoop</title>
    <meta name="description" content="Корзина и оформление заказа AquaLoop.">
    <link rel="canonical" href="https://example.com/cart.php">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="shortcut icon" href="/favicon.webp" type="image/x-icon">
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
<main class="container cart-page">
    <h1>Корзина</h1>

    <div id="cartEmpty" class="cart-empty" hidden>
        <p>Ваша корзина пуста.</p>
        <a href="index.php#catalog" class="btn btn--primary">Продолжить покупки</a>
    </div>

    <div id="cartTableWrap" class="cart-table-wrap" hidden>
        <table class="cart-table" aria-label="Содержимое корзины">
            <thead>
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Кол-во</th>
                <th>Сумма</th>
                <th><span class="sr-only">Действия</span></th>
            </tr>
            </thead>
            <tbody id="cartItems"></tbody>
        </table>

        <div class="cart-summary">
            <div class="row">
                <span>Итого:</span>
                <strong id="cartTotal">€0.00</strong>
            </div>
        </div>

        <div class="cart-actions">
            <button id="openCheckout" class="btn btn--primary">Оформить заказ</button>
        </div>
    </div>
</main>

<!-- Модалка: форма заказа -->
<div id="orderModal" class="modal" role="dialog" aria-modal="true" aria-labelledby="orderModalTitle" hidden>
    <div class="modal__content">
        <h3 id="orderModalTitle">Оформление заказа</h3>
        <form id="checkoutForm" class="form" novalidate>
            <div class="form__row">
                <label>Имя и Фамилия <span aria-hidden="true">*</span>
                    <input type="text" name="fullName" required placeholder="Иван Иванов">
                </label>
                <label>Email <span aria-hidden="true">*</span>
                    <input type="email" name="email" required placeholder="you@example.com">
                </label>
            </div>
            <div class="form__row">
                <label>Телефон <span aria-hidden="true">*</span>
                    <input type="tel" name="phone" required placeholder="+31 20 123 4567">
                </label>
                <label>Адрес доставки <span aria-hidden="true">*</span>
                    <input type="text" name="address" required placeholder="Улица, дом, город, индекс">
                </label>
            </div>
            <label class="checkbox">
                <input type="checkbox" name="agree" required>
                <span>Я соглашаюсь с <a href="terms.php">пользовательским соглашением</a> и <a href="privacy.php">политикой конфиденциальности</a>.</span>
            </label>
            <div class="modal__actions">
                <button type="button" class="btn btn--ghost" data-close-modal>Отмена</button>
                <button type="submit" class="btn btn--primary">Отправить</button>
            </div>
        </form>
    </div>
</div>

<!-- Модалка: успех -->
<div id="orderSuccess" class="modal" role="dialog" aria-modal="true" aria-labelledby="orderSuccessTitle" hidden>
    <div class="modal__content">
        <h3 id="orderSuccessTitle">Заказ оформлен</h3>
        <p>Спасибо! Мы получили ваши данные и свяжемся с вами в ближайшее время.</p>
        <button class="btn btn--primary" data-close-modal>Закрыть</button>
    </div>
</div>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="assets/app.js" defer></script>
</body>
</html>
