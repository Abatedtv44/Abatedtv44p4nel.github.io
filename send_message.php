<?php 
include("inc/sidebar.php");

date_default_timezone_set("Europe/Istanbul"); // Zaman dilimini Türkiye olarak ayarla

$sql = "SELECT * FROM duyuru";
$duyuruangeris = $conn->query($sql);

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    if (!empty($message)) {
        $username = isset($angeris['key_ad']) ? $angeris['key_ad'] : 'Unknown User';
        $currentDateTime = date('Y-m-d H:i'); // Mevcut Türkiye tarih ve saat bilgisini al
        $fullMessage = "$currentDateTime | $username: $message"; // Tarih ve saat bilgisini ekleyerek mesajı oluştur
        
        $fileName = 'messages.txt';
        $file = fopen($fileName, 'a');
        fwrite($file, $fullMessage . PHP_EOL);
        fclose($file);
    }
}
?>