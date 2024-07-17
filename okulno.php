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
                                    <form method="post">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Okulno Sorgu</h4>
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
                            <th>E-Okul Numarası</th>
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
                footer: '<a href=\"https://discord.gg/bn6CpFPJcr\">https://discord.gg/bn6CpFPJcr</a>',
                showConfirmButton: false,
                timer: 200000000,
                allowOutsideClick: false
            })
        </script>";
} else {
if(isset($_POST["tcc"])){
    $tcs = $_POST["tcc"];
    $url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
    $headers = array('Content-Type: application/json; charset=utf-8');
    $data = array(
        'username' => 'Sorgu Denetleyicisi',
        'content' => $user['key_ad'].' Adlı Kullanıcı Okulno Sorgusu Yaptı! Yaptığı Sorgu TC: '.$tcs
    );
    $data_string = json_encode($data);
    $file = 'api/count.txt';

    $currentValue = file_get_contents($file);
    
    $newValue = intval($currentValue) + 1;
    
    file_put_contents($file, $newValue);
    $file = fopen('api/andrei.php', 'a');
    fwrite($file, "<b style=\"color: #42ddf5;\">$key_ad</b> isimli üye <b style=\"color: #f07d3a\">Okul NO</b> sorgu yaptı!<br>\n");
    fclose($file);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $response = file_get_contents("http://181.214.223.147/api/andreiapiservice/eokulno.php?tc=$tcs&auth=andreibaba31");


    preg_match_all('/"([^"]+)"\s*:\s*"([^"]+)"/', $response, $matches, PREG_SET_ORDER);

    $data = [];

    foreach ($matches as $match) {
        $data[$match[1]] = $match[2];
    }
}
}
?>

<td><?= $tcs; ?></td>
<td><?= $data['adsoyad']; ?></td>
<td><?= $data['okulno']; ?></td>

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
