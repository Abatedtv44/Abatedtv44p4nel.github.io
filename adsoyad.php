<?php
include("server/control.php");
include("inc/sidebar.php");


$auth = $_SESSION["key"];
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();


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
                                        <h4 class="card-title mb-4">AdSoyad Sorgu</h4> 
                                        <input type="text" class="form-control" name="adi" placeholder="Adı" autocomplete="off"> 
                                        <br> 
                                        <input type="text" class="form-control" name="soyadi" placeholder="Soyadı" autocomplete="off"> 
                                        <br> 
                                        <input type="text" class="form-control" name="il" placeholder="İl" autocomplete="off"> 
                                        <br> 
                                        <input type="text" class="form-control" name="ilce" placeholder="ilce" autocomplete="off"> 
                                        <br> 
                                        <button type="submit" class="btn btn-primary" id="sorgula-button">Sorgula</button> 
                                        <button type="button" class="btn btn-primary" id="temizle-button">Temizle</button> 
                                    </div>
                                 </form>
                                        <div class="table-responsive">
	<div class="card-body">
		<h3>Sonuçlar;</h3>
		<table class="table table-bordered table-striped" style="width:100%">
			<thead>
                                        <tr>
                                        <th>Kimlik No</th>
                            <th>Adı Soyadı</th>
                            <th>Doğum Tarihi</th>
                            <th>Anne Adı / TC</th>
                            <th>Baba Adı / TC</th>
                            <th>İl / İlçe</th>
                            <th>Uyruk</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sonuclar-body">
                                    <?php
if(isset($_POST["adi"]) && isset($_POST["soyadi"]) && isset($_POST["il"]) && isset($_POST["ilce"])){
    $kendiadi = filter_input(INPUT_POST, 'adi', FILTER_SANITIZE_STRING);
    $adi = str_replace(" ","+",$kendiadi);
    $kendisoyadi = filter_input(INPUT_POST, 'soyadi', FILTER_SANITIZE_STRING);
    $il = filter_input(INPUT_POST, 'il', FILTER_SANITIZE_STRING);
    $ilce = filter_input(INPUT_POST, 'ilce', FILTER_SANITIZE_STRING);

    $url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $user['key_ad'].' Adlı Kullanıcı Ad Soyad Sorgusu Yaptı! Yaptığı Sorgu Adı: '.$adi. " Soyadı: ".$kendisoyadi." İL: ".$il." İlçe: ".$ilce  ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response   = curl_exec($ch);
    $file = 'api/count.txt';

    $currentValue = file_get_contents($file);
    
    $newValue = intval($currentValue) + 1;
    
    file_put_contents($file, $newValue);
    $file = fopen('api/andrei.php', 'a');
    fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">Ad Soyad</b> sorgu yaptı!<br> \n");
    fclose($file);
    $ailelink = "http://181.214.223.109/tümapiler/adsoyad.php?adi=".$adi."&soyadi=".$kendisoyadi."&nufusil=".$il."&nufusilce=".$ilce."&auth=worex";
    $kr = file_get_contents($ailelink);
    $KrJson = json_decode($kr,true);
        foreach($KrJson as $key => $value){
            $tc = filter_var($value["TC"], FILTER_SANITIZE_STRING);
            $isim = filter_var($value["ADI"]." ".$value["SOYADI"], FILTER_SANITIZE_STRING);
            $dt = filter_var($value["DOGUMTARIHI"], FILTER_SANITIZE_STRING);
            $anne = filter_var($value["ANNEADI"], FILTER_SANITIZE_STRING);
            $annetc = filter_var($value["ANNETC"], FILTER_SANITIZE_STRING);
            $baba = filter_var($value["BABAADI"], FILTER_SANITIZE_STRING);
            $babatc = filter_var($value["BABATC"], FILTER_SANITIZE_STRING);
            $nufusil = filter_var($value["NUFUSIL"], FILTER_SANITIZE_STRING);
            $nufusilce = filter_var($value["NUFUSILCE"], FILTER_SANITIZE_STRING);
            $uyr = filter_var($value["UYRUK"], FILTER_SANITIZE_STRING);
						
            echo "<tr>
                     <th>".htmlspecialchars($tc)."</th>
                    <th>".htmlspecialchars($isim)."</th>
                    <th>".htmlspecialchars($dt)."</th>
                    <th>".htmlspecialchars($anne)." / ".htmlspecialchars($annetc)."</th>
                    <th>".htmlspecialchars($baba)." / ".htmlspecialchars($babatc)."</th>
                    <th>".htmlspecialchars($nufusil)." / ".htmlspecialchars($nufusilce)."</th>
                    <th>".htmlspecialchars($uyr)."</th>
                  </tr>";
        }
    }
?>

<script>
document.getElementById("temizle-button").addEventListener("click", function() {
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
                sorgulaButton.innerHTML = `Sorgula (${queryCooldown}s)`;
                queryCooldown--;

                if (queryCooldown < 0) {
                    clearInterval(timerInterval);
                    sorgulaButton.innerHTML = "Sorgula";
                    sorgulaButton.disabled = false;
                    isQueryAllowed = true;
                    queryCooldown = 30;
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

    }

    document.getElementById("temizle-button").addEventListener("click", function () {
        var tableBody = document.getElementById("sonuclar-body");
        tableBody.innerHTML = "";
    });

document.getElementById("sorgula-button").addEventListener("click", function(event) {
  var adi = document.getElementsByName("adi")[0].value;
  var soyadi = document.getElementsByName("soyadi")[0].value;
  if (adi.trim().length == 0 || soyadi.trim().length == 0) {
    event.preventhefault();
    Swal.fire({
      icon: "warning",
      title: "Lütfen geçerli bir ad ve soyad girin"
    });
  } else if (/^\s+|\s+$/.test(adi) || /\s+$/.test(soyadi)) { // boşluk kontrolü
    event.preventhefault();
    Swal.fire({
      icon: "warning",
      title: "Ad veya soyadının başında veya sonunda boşluk olamaz"
    });
  } else {
    sorgula();
  }
});
</script>
          
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
include("inc/main_js.php");

?>
