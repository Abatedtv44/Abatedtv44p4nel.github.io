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
                                    <form method="post">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Muayene Sorgu</h4>
                                        <input type="text" class="form-control" name="tcc" placeholder="Tc">  
                                        <br>
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Sorgula</button>
                                        <button type="button" class="btn btn-primary" id="temizle-button" data-bs-toggle="modal">Temizle</button>
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
                            <th>Cinsiyet</th>
                            <th>Takip Numarası</th>
                            <th>Hastane Adı</th>
                            <th>Poliniklik Adi</th>
                            <th>Takip Tarihi</th>
                            <th>Reçete Numarası</th>
                            <th>Katılım Ücreti</th>
                            <th>Tahsil Edilme Durumu</th>
                                        </tr>
                                    </thead>
                                    <tbody id="sonuclar-body">
                                    <?php

error_reporting(0);

$tc = htmlspecialchars($_POST['tcc'], ENT_QUOTES, 'UTF-8');
$discord_url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
$discord_data = [
    'username' => 'Sorgu Denetleyicisi',
    'content' => $user['key_ad'] . ' Adlı Kullanıcı Muayene Sorgusu Yaptı! Yaptığı Sorgu TC: ' . $tc
];

$discord_ch = curl_init();
curl_setopt($discord_ch, CURLOPT_URL, $discord_url);
curl_setopt($discord_ch, CURLOPT_POST, true);
curl_setopt($discord_ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json; charset=utf-8']);
curl_setopt($discord_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($discord_ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($discord_ch, CURLOPT_POSTFIELDS, json_encode($discord_data));
$discord_response = curl_exec($discord_ch);
curl_close($discord_ch);
$file = fopen('api/andrei.php', 'a');
fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">Muayene</b> sorgu yaptı!<br>\n");
fclose($file);
 if(isset($_POST['tcc'])){
    $file = 'api/count.txt';

    $currentValue = file_get_contents($file);
    
    $newValue = intval($currentValue) + 1;
    
    file_put_contents($file, $newValue);
    $ilacapiurl = "http://181.214.223.147/api/andreiapiservice/muayene.php?auth=andreibaba31&tc=" . $tc;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $ilacapiurl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $people_json = curl_exec($ch);
    error_reporting(0);
    $decoded_json = json_decode($people_json, true);
    if(isset($decoded_json)) {
        $customers = $decoded_json;
        foreach($customers as $customer) {
            $Adet = $customer['adsoyad'];
            $ReceteNo = $customer['dogumtarihi'];
            $ReceteTarihi = $customer['cinsiyet'];
            $VerilebilecegiTarih = $customer['takipno'];
            $İlacAdi = $customer['hastaneadi'];
            $İlacAlimTarihi = $customer['poliniklikadi'];
            $s = $customer['takiptarihi'];
            $t = $customer['receteno'];
            $y = $customer['katilimucreti'];
            $thsl = $customer['tahsiledilmedurumu'];
            echo "<tr style='color:white;'>
            <th>".$tc."</th>
            <th>".$Adet."</th>
             <th>".$ReceteNo."</th> 
             <th>".$ReceteTarihi."</th>
              <th>".$VerilebilecegiTarih."</th>
               <th>".$İlacAdi."</th> 
               <th>".$İlacAlimTarihi."</th>
               <th>".$s."</th> 
               <th>".$t."</th>
               <th>".$y."</th>
               <th>".$thsl."</th>
               </tr>";
        }
    } else {
        echo "<p>Muayene Bilgisi Bulunamadı.</p>";
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

          
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
<?php
include("inc/main_js.php");

?>
