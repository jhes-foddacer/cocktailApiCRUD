<?php
include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$stmt = $pdo->prepare("INSERT INTO cocktails (api_id, name, thumbnail, category, alcoholic, instructions) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([
    $data['api_id'],
    $data['name'],
    $data['thumbnail'],
    $data['category'],
    $data['alcoholic'],
    $data['instructions']
]);

echo json_encode(["message" => "Coquetel adicionado com sucesso"]);
?>
