<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'client') {
    header("Location: login_form.html"); // Перенаправление, если пользователь не клиент
    exit();
}

// Код для клиентского раздела
echo "Добро пожаловать, Клиент!";
?>
