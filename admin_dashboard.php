<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login_form.html"); // Перенаправление, если пользователь не админ
    exit();
}

// Код для админского раздела
echo "Добро пожаловать, Администратор!";
?>
