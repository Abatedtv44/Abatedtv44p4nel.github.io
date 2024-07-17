<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sorgu";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $start_id = 1;
    $end_id = 179;
    
    $sql = "DELETE FROM destek_talepleri WHERE id BETWEEN :start_id AND :end_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':start_id', $start_id, PDO::PARAM_INT);
    $stmt->bindParam(':end_id', $end_id, PDO::PARAM_INT);
    
    $stmt->execute();
    
    echo "Belirtilen aralıktaki kayıtlar başarıyla silindi.";
} catch(PDOException $e) {
    echo "Hata: " . $e->getMessage();
}

$conn = null;
?>