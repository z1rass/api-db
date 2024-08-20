<?php

$servername = "localhost";
$username = "root";
$password = "12022008";
$database = "my-api";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $database);

// Проверка подключения
if ($conn->connect_error) {
    die("Подключение не удалось: " . $conn->connect_error);
}

header('Content-Type: application/json');

// Получение данных из входящего запроса
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Неверный JSON']);
    http_response_code(400); // Код ошибки 400 Bad Request
    exit;
}

// Подготовка SQL-запроса
$stmt = $conn->prepare("INSERT INTO data_table (mange, product_name) VALUES (?, ?)");

if ($stmt === false) {
    echo json_encode(['error' => 'Ошибка подготовки запроса']);
    http_response_code(500); // Внутренняя ошибка сервера
    exit;
}


foreach ($data as $position) {
    if ($stmt->bind_param('is', $position['menge'], $position['product_name']) === true) {
        $stmt->execute();
        echo "done";
    } else {
        echo "Shit";
    }
}


$stmt->execute();

$stmt->close();
$conn->close();
