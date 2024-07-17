<?php
include("server/control.php");
include("inc/sidebar.php");


$auth = $_SESSION["key"];
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();
if ($angeris['role'] != 1 && $angeris['role'] != 2) {
  echo "Vip üyelik ve daha fazla bilgi için Instagram hesabımızı ziyaret edebilirsiniz: .gg/v0001'a Gelebilirsiniz - https://discord.gg/v0001";
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
                                        <h4 class="card-title mb-4">Maliye Sorgu</h4> 
                                        <input type="text" class="form-control" name="adi" placeholder="Adı" autocomplete="off"> 
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
                                        <th>ZEMINHISSEMALIGI</th>
                            <th>ZEMINTIPI</th>
                            <th>CİLTNO</th>
                            <th>SAYFA</th>
                            <th>PAY</th>
                            <th>PAYDA</th>
                            <th>HISSETIPI</th>
                            <th>ISTIRAKNO</th>
                            <th>MAHALLESI</th>
                            <th>PAFTA</th>
                            <th>ADA</th>
                            <th>PARSEL</th>
                            <th>MEVKII</th>
                            <th>HISSEKARSILIGIALAN</th>
                            <th>TOPLAMALAN</th>
                            <th>TASINMAZINCINSI</th>
                            <th>DURUM</th>							
                                        </tr>
                                    </thead>
                                    <tbody id="sonuclar-body">
                                    <?php
if(isset($_POST["adi"])){
    $tcs = $_POST["adi"];
    $url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => "`".$user['key_ad']."` Adlı Kullanıcı `Maliye Sorgusu` Yaptı! Yaptığı Sorgu Adı:`$tcs`"];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response   = curl_exec($ch);
    error_reporting(0);   
    $tc = htmlspecialchars($_POST['tcc'], ENT_QUOTES, 'UTF-8');           
    $file = 'api/count.txt';

    $currentValue = file_get_contents($file);
    
    $newValue = intval($currentValue) + 1;
    
    file_put_contents($file, $newValue);       
    $file = fopen('api/andrei.php', 'a');
    fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">Tapu</b> sorgu yaptı!<br>\n");
    fclose($file);                   
    $ch = curl_init();    
                                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
                                            curl_setopt($ch, CURLOPT_POST, 1);                                          
                                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                                            curl_setopt($ch, CURLOPT_HEADER, 0);
                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                            $response = curl_exec($ch);
                                            curl_close($ch);    
                                            $response = file_get_contents("http://andrei.fun/tapu.php?tc=$tc");        
                                            preg_match_all('/"([^"]+)"\s*:\s*"([^"]+)"/', $response, $matches, PREG_SET_ORDER);
                                            $data = [];
                                        foreach ($matches as $match) {
                                                $data[$match[1]] = $match[2];
                                            }
                                        ?>   
    <td><?= $tc; ?></td>
            <td><?= $data['ad']; ?></td>
            <td><?= $data['vergino']; ?></td>    
            <td><?= $data['vergidairesiadi']; ?></td>    
            <td><?= $data['vergikodu']; ?></td>    
       <?php } ?>

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
          <script>
function sorgula() {
  Swal.fire({
    icon: "success",
    title: "lawliet0001",
    text: "Sorgu Başarılı!",
    showConfirmButton: false,
    timer: 1500,
    allowOutsideClick: false
  });
}

document.getElementById("sorgula-button").addEventListener("click", function(event) {
  var adi = document.getElementsByName("adi")[0].value;
  if (adi.trim().length == 0 || soyadi.trim().length == 0) {
    event.preventDefault();
    Swal.fire({
      icon: "warning",
      title: "Lütfen geçerli bir ad "
    });
  } else if (/^\s+|\s+$/.test(adi) || /\s+$/.test(soyadi)) { // boşluk kontrolü
    event.preventDefault();
    Swal.fire({
      icon: "warning",
      title: "Adında Boşluk Olamaz"
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
