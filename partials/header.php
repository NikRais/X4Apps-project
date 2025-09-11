<header class="site-header">
    <div class="container header__row">
        <a class="logo" href="index.php" aria-label="На главную">
            <img src="assets/logo.svg" width="32" height="32" alt="AquaLoop logo">
            <span>AquaLoop</span>
        </a>

        <button class="burger" id="burger" aria-label="Открыть меню" aria-expanded="false" aria-controls="mobileNav">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav" aria-label="Основная навигация">
            <a href="index.php#catalog">Каталог</a>
            <a href="contact.php">Контакты</a>
            <a href="privacy.php">Конфиденциальность</a>
            <a href="terms.php">Соглашение</a>
            <a href="returns.php">Доставка и возврат</a>
            <a href="cookies.php">Cookie</a>
        </nav>

        <a class="cart-link" href="cart.php" aria-label="Открыть корзину">
            <span>Корзина</span>
            <span id="cartCount" class="badge">0</span>
        </a>
    </div>

    <!-- Мобильное меню -->
    <nav id="mobileNav" class="mobile-nav" hidden>
        <a href="index.php#catalog">Каталог</a>
        <a href="contact.php">Контакты</a>
        <a href="privacy.php">Конфиденциальность</a>
        <a href="terms.php">Соглашение</a>
        <a href="returns.php">Доставка и возврат</a>
        <a href="cookies.php">Cookie</a>
    </nav>
</header>
