<?php
session_start();
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; // Введенный пароль

    // Запрос для получения пользователя по email
    $sql = "SELECT idUser, password FROM users WHERE email = ?";
    
    // Подготовка запроса
    if ($stmt = $mysqli->prepare($sql)) {
        // Привязка параметра и выполнение запроса
        $stmt->bind_param('s', $email);
        $stmt->execute();
        
        // Проверка на успешность выполнения запроса
        if ($stmt->errno) {
            echo "Ошибка выполнения запроса: " . $stmt->error;
            exit();
        }

        // Сохранение результата запроса
        $stmt->store_result();

        // Проверка на наличие результатов
        if ($stmt->num_rows > 0) {
            // Привязка результата
            $stmt->bind_result($user_id, $hashedPasswordFromDB);
            $stmt->fetch();
            $stmt->close();

            // Проверка пароля
            if (password_verify($password, $hashedPasswordFromDB)) {
                // Пароль правильный, авторизация успешна
                $_SESSION['user_id'] = $user_id;
                header("Location: profile.php");
                exit();
            } else {
                echo "Неверный пароль";
            }
        } else {
            echo "Пользователь не найден";
        }
    } else {
        // Ошибка при подготовке запроса
        echo "Ошибка подготовки запроса: " . $mysqli->error;
    }
}
?>
