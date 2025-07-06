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
$target_username = $input['target_username'] ?? '';
$tree_uuid = $input['tree_uuid'] ?? '';

if (empty($target_username) || empty($tree_uuid)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'target_username and tree_uuid required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_tree_remove_permissions(:requester_username, :requester_password, :target_username, :tree_uuid)");
    $stmt->execute([
        'requester_username' => $_SESSION['username'],
        'requester_password' => $_SESSION['password'],
        'target_username' => $target_username,
        'tree_uuid' => $tree_uuid
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Failed to remove permissions']);
        exit;
    }
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}