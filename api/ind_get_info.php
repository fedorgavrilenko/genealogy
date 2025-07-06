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

// Проверка авторизации пользователя
if (empty($_SESSION['username'])) {
    http_response_code(401);
    echo json_encode(['status' => 'error', 'message' => 'Auth required']);
    exit;
}

// Получение входных данных
$input = json_decode(file_get_contents('php://input'), true) ?? [];
$ind_id = $input['ind_id'] ?? null;

if ($ind_id === null) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'ind_id required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_ind_get_info(:username, :password, :ind_id)");
    $stmt->execute([
        'username' => $_SESSION['username'],
        'password' => $_SESSION['password'],
        'ind_id' => $ind_id
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Individual not found']);
        exit;
    }
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
