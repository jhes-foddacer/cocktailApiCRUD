<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("INSERT INTO log (numeroregistros) VALUES (?)");
$stmt->execute([$data['numeroregistros']]);

echo json_encode(["message" => "Log registrado com sucesso"]);
?>
