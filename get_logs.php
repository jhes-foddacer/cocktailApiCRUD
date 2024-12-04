<?php
include('config.php');

$stmt = $pdo->query("SELECT * FROM log");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($logs);
?>
