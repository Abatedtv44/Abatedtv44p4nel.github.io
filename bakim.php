<?php
include("server/control.php");
include("inc/sidebar.php");

$auth = $_SESSION["key"];
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Site Bakımda</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #121212;
    color: #ffffff;
  }

  .maintenance-container {
    text-align: center;
    padding: 40px;
    background-color: rgba(0, 0, 0, 0.9);
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
    max-width: 600px;
    width: 90%;
  }

  .maintenance-title {
    font-size: 36px;
    margin-bottom: 20px;
    font-weight: bold;
  }

  .maintenance-message {
    font-size: 18px;
    margin-bottom: 20px;
    line-height: 1.6;
  }

  .created-by {
    font-size: 14px;
    color: #ccc;
  }

  .social-icons {
    margin-top: 30px;
  }

  .social-icons a {
    display: inline-block;
    margin: 0 12px;
    font-size: 24px;
    color: #ffffff;
    transition: color 0.3s ease;
  }

  .social-icons a:hover {
    color: #3498db;
  }
  ::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background-color: #0f0f0f;
}

::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 10px;
}

/* Kaydırmayı sağlayan özelleştirilmiş div */
.scrollable-content {
  overflow-y: scroll;
  height: 300px;
}
  @keyframes colorChange {
    0%, 100% { color: #f39c12; }
    25% { color: #3498db; }
    50% { color: #e74c3c; }
    75% { color: #2ecc71; }
  }

  .maintenance-title span {
    display: inline-block;
    animation: colorChange 6s infinite;
  }
</style>
</head>
<body>
<div class="maintenance-container">
  <div class="maintenance-title">
    <span>W</span>
    <span>o</span>
    <span>r</span>
    <span>e</span>
    <span>x</span>
    <span> </span>
    <span>C</span>
    <span>h</span>
    <span>e</span>
    <span>c</span>
    <span>k</span>
    <span>e</span>
    <span>r</span>
  </div>
  <div class="maintenance-message">Özür dileriz, bu çözüm şu anda bakım aşamasındadır, En yakın zamanda kullanıma açılacaktır.</div>
  <div class="created-by">lawliet0001</div>

</div>
</body>
</html>