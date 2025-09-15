<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Контакты — AquaLoop</title>
    <meta name="description" content="Контактная информация AquaLoop: телефон, email, адрес.">
    <link rel="canonical" href="https://example.com/contact.php">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="shortcut icon" href="/favicon.webp" type="image/x-icon">
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>
<main class="container">
    <h1>Контакты</h1>
    <p><strong>Телефон:</strong> <a href="tel:+31201234567">+31 20 123 4567</a></p>
    <p><strong>Email:</strong> <a href="mailto:support@example.com">support@example.com</a></p>
    <p><strong>Адрес офиса:</strong> Herengracht 123, 1015 BS Amsterdam, Netherlands</p>


    <form id="contactForm" class="form" novalidate>
        <div class="form__row">
            <label>Ваше имя
                <input type="text" name="name" required>
            </label>
            <label>Email
                <input type="email" name="email" required>
            </label>
        </div>
        <label>Сообщение
            <textarea name="message" rows="5" required></textarea>
        </label>
        <label class="checkbox">
            <input type="checkbox" name="agree" required>
            <span>Согласен с <a href="/privacy.php">политикой конфиденциальности</a>.</span>
        </label>
        <button class="btn btn--primary" type="submit">Отправить</button>
    </form>
</main>


<div id="contactSuccess" class="modal" role="dialog" aria-modal="true" aria-labelledby="contactSuccessTitle" hidden>
    <div class="modal__content">
        <h3 id="contactSuccessTitle">Сообщение отправлено</h3>
        <p>Спасибо! Мы получили ваше обращение и свяжемся с вами.</p>
        <button class="btn btn--primary" data-close-modal>Закрыть</button>
    </div>
</div>


<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="assets/app.js" defer></script>
</body>
</html>