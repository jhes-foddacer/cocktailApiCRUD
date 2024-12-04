<?php
include('config.php');

try {
    $stmt = $pdo->prepare("DELETE FROM cocktails");
    $stmt->execute();

    $deletedCount = $stmt->rowCount();

    $logStmt = $pdo->prepare("INSERT INTO log (numeroregistros) VALUES (?)");
    $logStmt->execute([$deletedCount]);

    echo json_encode(["message" => "Todos os registros foram excluídos com sucesso!", "deletedCount" => $deletedCount]);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
