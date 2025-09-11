<?php
$products = [
        [
                'id' => 201,
                'sku' => 'AL-STEEL-500',
                'name' => 'AquaLoop Steel 500 мл',
                'price' => 19.90,
                'price_old' => 24.90,
                'img' => 'assets/images/bottle_steel_500.webp',
                'desc' => 'Двустенная нержавеющая сталь 18/8. Держит холод до 24 ч, тепло до 12 ч.'
        ],
        [
                'id' => 202,
                'sku' => 'AL-TRITAN-650',
                'name' => 'AquaLoop Tritan 650 мл',
                'price' => 14.90,
                'price_old' => 18.90,
                'img' => 'assets/images/bottle_tritan_650.webp',
                'desc' => 'Лёгкая и прочная бутылка из тритана без BPA. Подходит для посудомоечной машины.'
        ],
        [
                'id' => 203,
                'sku' => 'AL-THERMO-750',
                'name' => 'AquaLoop Thermo 750 мл',
                'price' => 24.90,
                'price_old' => 29.90,
                'img' => 'assets/images/bottle_thermo_750.webp',
                'desc' => 'Термофляга с пудровым покрытием. Не образует конденсат.'
        ],
];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="https://example.com/">
    <title>AquaLoop — многоразовые бутылки для воды | Интернет-магазин</title>
    <meta name="description" content="Магазин многоразовых бутылок для воды AquaLoop: сталь, тритан, термофляги. Прозрачные цены, быстрая доставка, возврат в течение 14 дней.">
    <meta property="og:title" content="AquaLoop — бутылки для воды">
    <meta property="og:description" content="Многоразовые бутылки для воды: стальные, термо, лёгкие спортивные. Доставка по миру.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://example.com/">
    <meta property="og:image" content="https://example.com/assets/logo.svg">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="shortcut icon" href="/favicon.webp" type="image/x-icon">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "AquaLoop",
            "url": "https://example.com/",
            "logo": "https://example.com/assets/logo.svg",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+31 20 123 4567",
                "contactType": "customer service",
                "areaServed": "Worldwide",
                "availableLanguage": ["ru", "en"]
            }]
        }
    </script>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>


<main class="container">
    <section class="hero">
        <div class="hero__content">
            <h1>Многоразовые бутылки для воды AquaLoop</h1>
            <p>Экологично, удобно и прозрачно: без лишнего маркетинга и завышенных обещаний.</p>
            <a href="#catalog" class="btn btn--primary">К каталогу</a>
        </div>
        <div class="hero__art" aria-hidden="true">
            <img src="assets/images/main-water.webp">
        </div>
    </section>


    <section id="catalog" class="catalog" aria-label="Каталог товаров">
        <header class="section__header">
            <h2>Каталог</h2>
            <p>Ниже представлены наши товары.</p>
        </header>
        <div class="grid grid--cards">
            <?php foreach ($products as $p): ?>
                <article class="card" data-product-id="<?php echo (int)$p['id']; ?>">
                    <figure class="card__media">
                        <img src="<?php echo htmlspecialchars($p['img']); ?>" alt="<?php echo htmlspecialchars($p['name']); ?>" loading="lazy" width="640" height="640">
                    </figure>
                    <div class="card__body">
                        <h3 class="card__title"><?php echo htmlspecialchars($p['name']); ?></h3>
                        <p class="card__sku">Артикул: <?php echo htmlspecialchars($p['sku']); ?></p>
                        <p class="card__desc"><?php echo htmlspecialchars($p['desc']); ?></p>
                        <div class="card__price">
                            <span class="price">€<?php echo number_format($p['price'], 2); ?></span>
                            <span class="price price--old">€<?php echo number_format($p['price_old'], 2); ?></span>
                        </div>
                        <div class="card__actions">
                            <button class="btn btn--ghost" data-action="decrement" aria-label="Уменьшить количество">−</button>
                            <input class="qty" type="number" min="1" value="1" aria-label="Количество">
                            <button class="btn btn--ghost" data-action="increment" aria-label="Увеличить количество">+</button>
                            <button class="btn btn--primary" data-action="add-to-cart">В корзину</button>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="benefits">
        <h2>Почему AquaLoop</h2>
        <ul class="benefits__list">
            <li>Прочные материалы и честные характеристики без преувеличений.</li>
            <li>Возврат в течение 14 дней согласно <a href="returns.php">политике возвратов</a>.</li>
            <li>Контактный центр: <a href="tel:+31201234567">+31 20 123 4567</a>, <a href="mailto:support@example.com">support@example.com</a>.</li>
        </ul>

    </section>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="assets/app.js" defer></script>
</body>
</html>