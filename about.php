<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</body>
</html>