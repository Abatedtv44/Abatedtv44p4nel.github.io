<?php 
include("inc/sidebar.php");

$sql = "SELECT * FROM duyuru";
$duyuruangeris = $conn->query($sql);

?>
<style>
/* Kaydırma çubuğu tasarımı */
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
body {
    font-family: Arial, sans-serif;
}

.chat-box {
    width: 50%; /* Adjust the width as needed */
    padding: 20px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 10px;
    margin-right: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}


.message-container {
    padding: 10px;
    margin-bottom: 10px;
    height: 400px; /* Increased height */
    overflow-y: scroll;
    background-color: #0f0f0f;
    border-radius: 0; /* Set border-radius to 0 to make it square */
}

.message {
    padding: 8px;
    background-color: #000000;
    border-radius: 10px;
    margin-bottom: 10px;
    color: white;
}

.sender {
    font-weight: bold;
    margin-right: 5px;
}

.input-container {
    display: flex;
    align-items: center;
    margin-top: 10px;
}

#message-input {
    flex-grow: 1;
    padding: 10px;
    border: none;
    border-radius: 10px;
    outline: none;
    color: #ffffff;
    background-color: #ffffff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

#send-button {
    padding: 10px;
    background-color: #0f0f0f;
    border: none;
    color: white;
    border-radius: 10px;
    margin-left: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#send-button:hover {
    background-color: #000000;
}
.custom-swal-container {
    background-color: #000000;
    border-radius: 10px;
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.custom-swal-title, .custom-swal-text {
    color: white; /* Set text color to white */
}
/* Updates Box Styles */
.updates-box {
    width: 100%;
    padding: 20px;
    background-color: #0f0f0f;
    border-radius: 10px;
    box-shadow: 0 3px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.updates-box h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.updates-box ul {
    list-style: none;
    padding-left: 0;
    max-height: 200px; /* Kutunun maksimum yüksekliği */
    overflow-y: auto; /* Yatay kaydırma çubuğunu görüntüler */
}

.updates-box li {
    margin-bottom: 5px;
    padding-left: 20px;
    position: relative;
}

.updates-box li::before {
    content: '\2022';
    position: absolute;
    left: 0;
    color: #fff;
}
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">
	<style>
/* Kaydırma çubuğu tasarımı */
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
body {
    font-family: Arial, sans-serif;
}

.card {
    border: 2px solid rgb(255, 0, 0); /* Kenarlık rengi */
    border-radius: 10px; /* Kenarlık yuvarlaklığı */
    transition: transform 0.3s ease; /* Animasyon geçiş süresi */
}

.card:hover {
    transform: rotate(5deg); /* Üzerine gelince dönme efekti */
    border-color: rgb(0, 255, 255); /* Kenarlık rengini değiştirme */
}
</style>



						<div class="row">
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Üyelik Türü :</p>
												<h2 class="mb-0 number-font" style="font-size:15px;">
													<br>
													<?php if ($angeris['role'] == 1) { ?>
                                                        Lawliet
													<?php }else if ($angeris['role'] == 2) { ?>

														Premium@Lawliet

														<?php }else if ($angeris['role'] == 3) { ?>

															Free@Lawliet
														
		                                     <?php } ?> 
												</h2>
												
											</div>
											<div class="ms-auto"> <i class="fa-solid fa-circle-user text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
							</div><!-- COL END -->
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Toplam Kullanıcı Sayısı :</p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $angerissayi; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-user-check text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
						 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Toplam VİP Sayısı :</p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $angerissayi31; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-star text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
						 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Ücretsiz Kullanıcı Sayısı :</p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $angerissayi312; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-users text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
						 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Toplam Admin Sayısı :</p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $admin; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-user-ninja text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
						 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Bitiş Tarihi : </p>
                                            <br>
                                            <h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $bitistarih; ?>
                                            </h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-user-ninja text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
						 <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
								<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">En Son Kayıt Olan Kullanıcı :</p>
											<h2 class="mb-0 number-font" style="font-size:15px;">
											<?php echo $enSonKullaniciAdi; ?>
											</h2>
											</div>
											<div class="ms-auto"> <i class="fa solid fa-door-open text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						 </div>
							<div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
							<div class="card  img-card ">
									<div class="card-body">
										<div class="d-flex">
											<div class="text-white">
											<p class="text-white mb-0">Toplam Yapılan Sorgu Sayısı</p>
                                            <h2 id="queryCount" class="mb-0 number-font" style="font-size: 15px;">
        <?php
        $queryCount = file_get_contents('api/count.txt');
        echo number_format($queryCount);
        ?>
</h2>
											
											</div>
											<div class="ms-auto"> <i class="fa-solid fa-face-grin-hearts text-white fs-30 me-2 mt-2"></i> </div>
										</div>
									</div>
								</div>
						</div>
						</div>						
						<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Duyuru Tablosu</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                        <thead>
                            <tr>
                                <th class="wd-15p">Duyuru Atan</th>
                                <th class="wd-15p">Duyuru</th>
                                <th class="wd-20p">Duyuru Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($angers = $duyuruangeris->fetch(PDO::FETCH_ASSOC)) { ?>
                                <tr>
                                    <th><?=$angers['duyuruatan']?></th>
                                    <th><?=$angers['atılanduyuru']?></th>
                                    <th><?=$angers['tarih']?></th>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 offset-md-3"> <!-- Ortalanmış sütun -->
        <!-- Güncellemeler Kutusu -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Son Eylemler</h3>
            </div>
            <div class="card-body">
                <div id="lastTwelveLines">
                    <?php
                    $lines = file('api/andrei.php');
                    $cleaned_lines = array_map('trim', $lines);
                    $cleaned_lines = array_filter($cleaned_lines, 'strlen'); // Boş satırları filtrele
                    $last_twelve_lines = array_slice($cleaned_lines, max(0, count($cleaned_lines) - 12));
                    foreach ($last_twelve_lines as $line) {
                        echo $line . "<br>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        function updateQueryCount() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("queryCount").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "api/count.txt", true);
            xhttp.send();
        }

        setInterval(updateQueryCount, 1000); // Her 5 saniyede bir güncelle
    </script>
    <script>
        function updateLastTwelveLines() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var lines = this.responseText.split('\n');
                    var cleanedLines = lines.map(function(line) {
                        return line.trim();
                    }).filter(function(line) {
                        return line !== "";
                    });
                    var lastTwelveLines = cleanedLines.slice(-13, -1); // Son 12 satırı al
                    document.getElementById("lastTwelveLines").innerHTML = lastTwelveLines.join('<br>');
                }
            };
            xhttp.open("GET", "api/andrei.php", true);
            xhttp.send();
        }

        setInterval(updateLastTwelveLines, 0001); // Her 5 saniyede bir güncelle
    </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.js"></script>
<script>
const messageInput = document.getElementById('message-input');
const sendButton = document.getElementById('send-button');
const messageContainer = document.querySelector('.message-container');

let lastMessageTime = 0; // Variable to track the last message time

// Load existing messages on page load
loadMessages();

// Event listener for sending messages
sendButton.addEventListener('click', sendMessage);

// Function to send messages
function sendMessage() {
    const currentTime = Date.now();
    const lastMessageTimeStored = localStorage.getItem('lastMessageTime');
    
    if (!lastMessageTimeStored || currentTime - parseInt(lastMessageTimeStored) >= 30000) {
        const messageText = messageInput.value.trim(); // Trim whitespace from message

        if (messageText !== '') {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'send_message.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        messageInput.value = '';
                        localStorage.setItem('lastMessageTime', currentTime); // Store current time
                        loadMessages(); // Reload messages after sending
                    } else {
                        console.error('Error sending message');
                    }
                }
            };
            xhr.send('message=' + encodeURIComponent(messageText));
        }
    } else {
        console.log('Message cooldown in effect. Wait before sending another message.');
        showCooldownNotification(Math.ceil((30000 - (currentTime - parseInt(lastMessageTimeStored))) / 1000));
    }
}

// Function to show cooldown notification
function showCooldownNotification(timeLeft) {
    Swal.fire({
        icon: "info",
        title: "<span class='custom-swal-title'>Bekleyin</span>",
        html: `<span class='custom-swal-text'>Mesaj atabilmek için ${timeLeft} saniye beklemelisiniz.</span>`,
        timer: 2000,
        showConfirmButton: false,
        background: '#000000',
        customClass: {
            container: 'custom-swal-container'
        }
    });
}

// Function to load messages
function loadMessages() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_messages.php', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                messageContainer.innerHTML = xhr.responseText;
                scrollToBottom();
            } else {
                console.error('Error loading messages');
            }
        }
    };
    xhr.send();
}

// Load messages periodically
setInterval(loadMessages, 1000);

// Function to scroll to the bottom of the message container
function scrollToBottom() {
    messageContainer.scrollTop = messageContainer.scrollHeight;
}

messageInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Prevent the default Enter key behavior (new line)
        sendMessage();
    }
});
</script>

       <?php
       include("inc/main_js.php");
	   ?>