<?php
include("server/control.php");
include("inc/sidebar.php");


$auth = $_SESSION["key"];
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();
if ($angeris['role'] != 1 && $angeris['role'] != 2) {
    echo "Vip üyelik ve daha fazla bilgi için Discord hesabımızı ziyaret edebilirsiniz.";
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
                                        <h4 class="card-title mb-4">+18 Vesika Sorgu</h4>
                                        <input type="text" class="form-control" name="tcc" placeholder="Tc">  
                                        <br>
                                        <button type="submit" class="btn btn-primary" id="sorgula-button" data-bs-toggle="modal">Sorgula</button>
                                        <button type="button" class="btn btn-primary" id="temizle-button" data-bs-toggle="modal">Temizle</button>
                                        <br> <br>
                                        </form>
                                        <div class="table-responsive">
	<div class="card-body">
		<h3>Sonuçlar;</h3>
		<table class="table table-bordered table-striped" style="width:100%">
			<thead>
                                        <tr>
                                        <th>Kimlik No</th>
                            <th>Adı Soyadı</th>
                            <th>Vesika</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sonuclar-body">
                                    <?php
if ($user['role'] == 3) {
    echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>";
    echo "<script>
            Swal.fire ({
                icon : \"error\",
                title : \"Oopss...\",
                text : \"Premium Satın almalısın!\",
                footer: '<a href=\"https://discord.gg/F99227sdYJ\">https://discord.gg/bn6CpFPJcr</a>',
                showConfirmButton: false,
                timer: 200000000,
                allowOutsideClick: false
            })
        </script>";
} else {
if(isset($_POST["tcc"])){
    $tcs = filter_var($_POST["tcc"], FILTER_SANITIZE_STRING);
    if (!preg_match('/^\d{11}$/', $tcs)) {
        echo("<td>Geçerli bir tc kimlik numarası girin!</td>");
    }
    $url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
    $headers = array('Content-Type: application/json; charset=utf-8');
    $data = array(
        'username' => 'Sorgu Denetleyicisi',
        'content' => $user['key_ad'].' Adlı Kullanıcı +18 Vesika Sorgusu Yaptı! Yaptığı Sorgu TC: '.$tcs
    );
    $data_string = json_encode($data);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    $response   = curl_exec($ch);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sorgu";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tcs = mysqli_real_escape_string($conn, $tcs);

    $ailelink = "http://bilmemipfln/api/api/worexcanımsıngardaşımsınyerimofff/tc.php?tc=".$tcs."&auth=atatanri1227";
    $kr = file_get_contents($ailelink);
    $KrJson = json_decode($kr,true);
    foreach($KrJson as $key => $value){
        $tc = mysqli_real_escape_string($conn, $value["TC"]);
        $isim = htmlspecialchars($value["ADI"], ENT_QUOTES, 'UTF-8');
        $soyad = htmlspecialchars($value["SOYADI"], ENT_QUOTES, 'UTF-8');

        $api_key = get_api_key();
        $url = "http://bilmemdomainfln/apiler/vesika18.php?auth=$api_key&tc=$tcs";
        $response = file_get_contents($url);
        $response = preg_replace('/\x{EF}\x{BB}\x{BF}/', '', $response);
        $data = json_decode($response);
        $file = 'api/count.txt';

        $currentValue = file_get_contents($file);
        
        $newValue = intval($currentValue) + 1;
        
        file_put_contents($file, $newValue);
        $file = fopen('api/andrei.php', 'a');
        fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">-18 Vesika</b> sorgu yaptı!<br>\n");
        fclose($file);
        if ($data !== null && isset($data->vesika)) {
            $vesika = "data:image/png;base64," . htmlspecialchars($data->vesika, ENT_QUOTES, 'UTF-8');
            echo "<tr>
                  <td>$tc</td>
                  <td>$isim $soyad</td>
                  <td><img src=\"$vesika\" alt=\"\"></td>
                  </tr>";
        } else {
            echo "<tr>
                  <td><img src=\"\" alt=\"sonuç bulunamadı\"></td>
                  </tr>";
        }
    }

    $conn->close();
}
}
function get_api_key() {
    $config = parse_ini_file("configg.ini");
    return $config["api_key"];
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
    let queryCooldown = 10; // 30 seconds cooldown

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
                text: `30 saniye içinde tekrar sorgulama yapamazsınız. Lütfen ${queryCooldown} saniye bekleyin.`,
                showConfirmButton: false,
                timer: 3000,
                allowOutsideClick: false,
            });
            return false; // Prevent form submission
        }

        var tcInput = document.querySelector('input[name="tcc"]');

        if (tcInput.value.length === 0 || tcInput.value.length < 11 || isNaN(tcInput.value)) {
            Swal.fire({
                icon: "error",
                title: "Hata!",
                text: "Lütfen geçerli bir Tc Kimlik Numarası girin.",
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
                text: "Sorgu Başarılı!",
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
