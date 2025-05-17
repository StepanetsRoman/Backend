<?php
$conn = new mysqli("localhost", "root", "", "lab7");
if ($conn->connect_error) {
    die("Помилка з'єднання");
}
$stmt = $conn->prepare("INSERT INTO traffic_logs (url, status_code, created_at) VALUES (?, ?, NOW())");
$url = $_SERVER['REQUEST_URI'];
$code = http_response_code(); // або вручну 404
$stmt->bind_param("si", $url, $code);
$stmt->execute();
echo "Записано.";
?>
