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

if (empty($username) || empty($password)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'username and password required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_user_auth(:username, :password)");
    $stmt->execute([
        'username' => $username,
        'password' => $password
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'Authentication failed']);
        exit;
    }
    
    $response = json_decode($result, true);
    
    if ($response['status'] === 'success') {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
    }
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}