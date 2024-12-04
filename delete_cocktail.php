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

$stmt = $conn->prepare("DELETE FROM cocktails WHERE api_id = ?");
$stmt->bind_param("s", $data['idDrink']);

if ($stmt->execute()) {
    echo "Coquetel excluído com sucesso!";
} else {
    echo "Erro ao excluir coquetel: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
