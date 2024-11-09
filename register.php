<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $dateOfBirth = $_POST['dateOfBirth'];
    
    // хеш пароля
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (fullName, email, password, dateOfBirth, role) VALUES (?, ?, ?, ?, ?)";
    
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param('sssss', $fullName, $email, $hashedPassword, $dateOfBirth, $role = 'client'); // Устанавливаем роль как 'client'
        $stmt->execute();
        echo "Регистрация прошла успешно!";
        $stmt->close();
    } else {
        echo "Ошибка регистрации.";
    }
}
?>