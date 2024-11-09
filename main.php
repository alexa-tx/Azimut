<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Azimut | main</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <header class="header">
        <div class="logo">Azimut</div>
        <nav class="nav">
            <a href="about.php">О нас</a>
            <a href="tours.php">Туры</a>
            <a href="contacts.php">Контакты</a>
            <a href="profile.php" id="profileLink" class="button">
                        <?php
                            session_start();
                            if (isset($_SESSION['user_id'])) {
                                // Показываем имя пользователя, если он вошел
                                echo "Профиль";
                            } else {
                                // Если не вошел — кнопка ведет на страницу входа
                                echo "Войти / Регистрация";
                            }
                        ?>
                    </a>
            <button class="request-button">Оставить заявку</button>
        </nav>
    </header>

    <section class="banner">
        <div class="slideshow">
            <div class="slides">
                <img src="assets/image/banner1.jpg" class="slide">
                <img src="assets/image/banner2.jpg" class="slide">
                <img src="assets/image/banner3.jpg" class="slide">
                <img src="assets/image/banner4.jpg" class="slide">
            </div>
        </div>
        <div class="banner-content">
            <h1>Azimut - Откройте мир вместе с нами!</h1>
            <p>Планируйте свои путешествия с профессионалами. Мы предлагаем уникальные туры и незабываемые впечатления по всему миру.</p>
            <div class="banner-buttons">
                <a href="about.html" class="banner-button">Увидеть больше</a>
                <a href="tours.php" class="banner-button">Выбрать тур</a>
            </div>
        </div>
    
    </section>

    <script src="script.js"></script>
</body>
</html>