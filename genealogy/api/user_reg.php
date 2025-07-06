<?php
ini_set('session.gc_maxlifetime', 2592000);
session_set_cookie_params([
    'lifetime' => 2592000,
    'path' => '/~s338930/genealogy/api/',
    'domain' => $_SERVER['HTTP_HOST'],
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict'
]);
session_start();

header('Content-Type: application/json');
require_once "../pdo/pdo.php";

header("Access-Control-Allow-Origin: https://se.ifmo.ru");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Only POST allowed']);
    exit;
}

// Получение входных данных
$input = json_decode(file_get_contents('php://input'), true) ?? [];
$username = $input['username'] ?? '';
$password = $input['password'] ?? '';
$email = $input['email'] ?? '';
$real_name = $input['real_name'] ?? '';

// Валидация обязательных полей
if (empty($username) || empty($password) || empty($email)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'username, password and email required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_user_reg(:username, :password, :email, :real_name)");
    $stmt->execute([
        'username' => $username,
        'password' => $password,
        'email' => $email,
        'real_name' => $real_name
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Registration failed']);
        exit;
    }
    
    // Автоматическая авторизация после успешной регистрации
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
