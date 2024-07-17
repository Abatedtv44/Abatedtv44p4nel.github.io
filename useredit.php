<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");


if ($angeris['role'] == 1) {

    if (isset($_POST['gonder'])){

        $keyad = $_POST['key_ad'];
        $kkey = $_POST['key_pas'];
        $multi = $_POST['ipadres'];
        $bitistarih = $_POST['enddate'];
        $role = $_POST['role'];
        $id = htmlspecialchars($_GET['id']);
        
        $guncelle = $conn->prepare("UPDATE users SET key_ad='$keyad',key_pas='$kkey',role='$role',ipadres='$multi',owner='0', enddate='$bitistarih' WHERE key_pas='$id'");
        $guncelle->execute();
        $guncelleangeris = $conn->prepare("UPDATE apiusers SET auth_key='$kkey',ipadres='$multi' WHERE auth_key='$id'");
        $guncelleangeris->execute();
        
        $message =  "<div class='alert alert-primary'>Bilgilendirme : Başarılı Key Düzenlendi !  Kullanıcı Adı : ".$keyad." Kullanıcı Şifresi : ".$kkey." İp Adresi : ".$multi." Bitiş Tarihi : ".$bitistarih."  </div>";        
        
        }

}



$sql = "SELECT * from users WHERE key_pas = ?";
$angeris = $conn->prepare($sql);
$angeris->execute([$_GET['id']]);
$satir = $angeris->fetch(PDO::FETCH_ASSOC);
$url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
$headers = [ 'Content-Type: application/json; charset=utf-8' ];
$POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $keyad.' Adlı Kullanıcı '.$message];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
$response   = curl_exec($ch);
?>


                   <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                      <form method="POST">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-name">Kullanıcı Adı</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="key_ad" id="basic-default-name" placeholder="" value="<?=$satir['key_ad']?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Kullanıcı Şifresi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="key_pas" id="basic-default-company" placeholder="" value="<?=$satir['key_pas']?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Kullanıcı Rolü</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="role" id="basic-default-company" placeholder="" value="<?=$satir['role']?>">
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">Bitiş Tarihi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="enddate"  id="basic-default-company" placeholder="" value="<?=$satir['enddate']?>">
                          </div>
</div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-company">İp Adresi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="ipadres"  id="basic-default-company" placeholder="" value="<?=$satir['ipadres']?>">
                          </div>
                          <br><br><br>
                        </div>

                        
                        <?php echo $message; ?>
                           <div class="alert alert-danger">Bilgilendirme : Lütfen Key Düzenlerken Aşşağıdaki Seçenekleri Seçmeyi Unutmayın Sınırsız Üye Eklerken Lütfen Bitiş Tarihine Bir Veri Girmeyiniz, Güvenilir Üyeyi Kullanıcıdan Kaldırmak İçin Lütfen Güvenilir Üye Tickini Seçmeden Düzenleme Yapınız Düzenlediğiniz Kullanıcıyı Düzenlemeden Önce Hangi Üyelik Olduğunu Seçiniz Ve Ya Değiştirmek İstediğiniz Üyeliği Seçiniz, Sınırsız Üye Özelliğini Almak İsterseniz Bitiş Tarihini Doldurup Düzenlemeniz Yeterlidir ! Unutmayın Düzenlediğiniz Üyenin Aşşağıdaki Üyelik Seçeneklerini Seçmeden Düzenlerseniz Hata Alırsınız. !</div>

                        <br>

                        <br>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" name="gonder" style="float:right;" class="btn btn-danger">Kaydet</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                         </div>
                         </div>
                         </div>


<?php
include("inc/main_js.php");

?>

