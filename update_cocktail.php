<?php
$data = json_decode(file_get_contents('php://input'), true);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "banco_coquetel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$stmt = $conn->prepare("UPDATE cocktails SET name = ?, category = ?, alcoholic = ?, instructions = ? WHERE api_id = ?");
$stmt->bind_param("sssss", $data['name'], $data['category'], $data['alcoholic'], $data['instructions'], $data['idDrink']);

if ($stmt->execute()) {
    echo "Coquetel atualizado com sucesso!";
} else {
    echo "Erro ao atualizar coquetel: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
