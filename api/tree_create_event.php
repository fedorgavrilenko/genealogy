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
$tree_uuid = $input['tree_uuid'] ?? '';
$title = $input['title'] ?? '';
$event_date = $input['event_date'] ?? null;
$place = $input['place'] ?? null;
$description = $input['description'] ?? null;
$color = $input['color'] ?? null;

if (empty($tree_uuid) || empty($title)) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'tree_uuid and title required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_tree_create_event(:username, :password, :tree_uuid, :title, :event_date, :place, :description, :color)");
    $stmt->execute([
        'username' => $_SESSION['username'],
        'password' => $_SESSION['password'],
        'tree_uuid' => $tree_uuid,
        'title' => $title,
        'event_date' => $event_date,
        'place' => $place,
        'description' => $description,
        'color' => $color
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(404);
        echo json_encode(['status' => 'error', 'message' => 'Event creation failed']);
        exit;
    }
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}