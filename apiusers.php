<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");


if ($angeris["role"] != 1) {
    header("Location: check.sorgu");
}else{

$adsoyad = $_POST["adsoyad"];
$tc = $_POST["tc"];
$aile = $_POST["aile"];
$sulale = $_POST["sulale"];
$tcgsm = $_POST["tcgsm"];
$gsmtc = $_POST["gsmtc"];
$annetaraf = $_POST["annetaraf"];
$babataraf = $_POST["babataraf"];
$smsbomber = $_POST["smsbomber"];
$adres = $_POST["adres"];
$plaka = $_POST["plaka"];

if (isset($_POST['gonder'])) {

  $id = htmlspecialchars($_GET['usersApiCode']);

$apiangeris = $conn->prepare("UPDATE apiusers SET adsoyad='$adsoyad',tc='$tc',aile='$aile',sulale='$sulale',tcgsm='$tcgsm',gsmtc='$gsmtc',annetaraf='$annetaraf',babataraf='$babataraf',smsbomber='$smsbomber',adres='$adres',plaka='$plaka' WHERE auth_key='$id'");
$apiangeris->execute();

$message = '<div class="alert alert-primary">Api Başarıyla Eklendi ! </div>';
  
}
}


$id = htmlspecialchars($_GET['usersApiCode']);
$sql = "SELECT * FROM apiusers WHERE auth_key='$id'";
$result = $conn->query($sql);
$angeriss = $result->fetch(PDO::FETCH_ASSOC);



?>


                   <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                      <form method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Ad Soyad API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="adsoyad" id="basic-default-name" value="<?=$angeriss["adsoyad"]?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Tc API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tc" id="basic-default-company" value="<?=$angeriss["tc"]?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Aile API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="aile"  id="basic-default-company" value="<?=$angeriss["aile"]?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Sülale API Adresi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sulale"  id="basic-default-company" value="<?=$angeriss["sulale"]?>">
                          </div>
                       </div>
                       <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Tc Gsm API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tcgsm" id="basic-default-name" value="<?=$angeriss["tcgsm"]?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Gsm Tc API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="gsmtc" id="basic-default-company" value="<?=$angeriss["gsmtc"]?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Anne Tarafı API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="annetaraf"  id="basic-default-company" value="<?=$angeriss["annetaraf"]?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Baba Tarafı API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="babataraf"  id="basic-default-company" value="<?=$angeriss["babataraf"]?>">
                          </div>
                       </div>
                       <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Sms Bomber API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="smsbomber"  id="basic-default-company" value="<?=$angeriss["smsbomber"]?>">
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Adres API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="adres"  id="basic-default-company" value="<?=$angeriss["adres"]?>">
                          </div>
                       </div>
                       <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Plaka API</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="plaka"  id="basic-default-company"value="<?=$angeriss["plaka"]?>">
                          </div>
                       </div>
                        <br>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="gonder" style="float:right;" class="btn btn-danger">Ekle</button>
                          </div>
                       </div>
                          <br><br><br>
                         <?php echo $message; ?>
                        </div>
                      </form>
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

