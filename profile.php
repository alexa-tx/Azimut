<?php
session_start();
require_once 'config.php';

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user_id'])) {
    // Перенаправление на страницу логина, если пользователь не авторизован
    header("Location: login_form.html");
    exit();
}

// Получаем данные пользователя из базы данных
$user_id = $_SESSION['user_id'];

// Получаем данные пользователя из базы данных
$sql = "SELECT fullName, email, dateOfBirth FROM users WHERE idUser = ?";
if ($stmt = $mysqli->prepare($sql)) {
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($fullName, $email, $dateOfBirth);
    $stmt->fetch();
    $stmt->close();
    
    // Выводим проверку данных, чтобы убедиться, что они получены
    if (!$fullName || !$email || !$dateOfBirth) {
        echo "Данные не найдены.";
    }
} else {
    echo "Ошибка при получении данных: " . $mysqli->error;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="header">
        <div class="logo" >
            <a href="main.php">Azimut</a>
        </div>
        <nav class="nav">
            <a href="about.html">О нас</a>
            <a href="tours.php">Туры</a>
            <a href="contacts.html">Контакты</a>
            <a href="profile.php" id="profileLink" class="button">
                <?php
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

    <div class="profile-container">
        <h2>Ваш профиль</h2>
        <div class="profile-info">
            <p><strong>ФИО:</strong> <?php echo htmlspecialchars($fullName); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Дата рождения:</strong> <?php echo htmlspecialchars($dateOfBirth); ?></p>
        </div>
        
        <a href="logout.php" class="logout-btn">Выйти</a>
    </div>
</body>
</html>
