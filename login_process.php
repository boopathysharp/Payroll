<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header('Location: login.php?error=Please enter both username and password');
        exit;
    }

    try {
        $pdo = new PDO($dsn, $db_user, $db_pass, $options);

        $stmt = $pdo->prepare("SELECT u.id, u.password_hash, u.employee_id, r.role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['employee_id'] = $user['employee_id'];
            $_SESSION['role'] = $user['role_name'];
            header('Location: index.php');
            exit;
        } else {
            // Invalid credentials
            header('Location: login.php?error=Incorrect username or password');
            exit;
        }
    } catch (PDOException $e) {
        header('Location: login.php?error=Database error');
        exit;
    }
} else {
    header('Location: login.php');
    exit;
}
?>