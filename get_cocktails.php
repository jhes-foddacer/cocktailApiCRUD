<?php
include('config.php');

$stmt = $pdo->query("SELECT * FROM cocktails");
$cocktails = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($cocktails);
?>
