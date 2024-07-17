<?php
$fileName = 'messages.txt';
if (file_exists($fileName)) {
    $messages = file($fileName, FILE_IGNORE_NEW_LINES);
    foreach ($messages as $message) {
        echo "<div class='message'>$message</div>\n";
    }
}
?>