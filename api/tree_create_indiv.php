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
$first_name = $input['first_name'] ?? '';
$last_name = $input['last_name'] ?? '';
$patronymic = $input['patronymic'] ?? '';
$is_male = $input['is_male'] ?? null;
$birth_date = $input['birth_date'] ?? '';
$birth_place = $input['birth_place'] ?? '';
$death_date = $input['death_date'] ?? null;
$death_place = $input['death_place'] ?? null;
$photo_url = $input['photo_url'] ?? null;
$description = $input['description'] ?? null;

// Валидация обязательных полей
if (empty($tree_uuid) || empty($first_name) || empty($last_name) || 
   $is_male === null || empty($birth_date) ) {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'tree_uuid, first_name, last_name, is_male, birth_date and birth_place required']);
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT t_tree_create_indiv(:username, :password, :tree_uuid, :first_name, :last_name, :patronymic, :is_male, :birth_date, :birth_place, :death_date, :death_place, :photo_url, :description)");
    $stmt->execute([
        'username' => $_SESSION['username'],
        'password' => $_SESSION['password'],
        'tree_uuid' => $tree_uuid,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'patronymic' => $patronymic,
        'is_male' => $is_male,
        'birth_date' => $birth_date,
        'birth_place' => $birth_place,
        'death_date' => $death_date,
        'death_place' => $death_place,
        'photo_url' => $photo_url,
        'description' => $description
    ]);
    
    $result = $stmt->fetchColumn();
    
    if ($result === false) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Failed to create individual']);
        exit;
    }
    
    echo $result;
    
} catch (PDOException $e) {
    http_response_code(500);
    error_log("DB Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => 'Database error']);
}
