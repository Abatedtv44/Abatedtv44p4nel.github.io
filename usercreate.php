<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

if (isset($_POST['ekle'])) {
    $created = $angeris["key_ad"];
    $keyad = htmlspecialchars($_POST['keyad']);
    $kkey = htmlspecialchars($_POST['kkey']);
    $ipadres = htmlspecialchars($_POST['ipadres']);
    $createddate = date('d.m.Y');


    $kontrol = $conn->query("SELECT * FROM users WHERE key_pas='$kkey'")->fetch();
    $sorgu = $conn->query("SELECT * FROM apiusers WHERE auth_key='$kkey'")->fetch();
    if ($kontrol['key_pas'] == "$kkey") {
        $message =  "<div class='alert alert-danger'>Hata :  Bu Authu Kullanan Bir Kullanıcı Var</div>";
    }elseif ($sorgu["auth_key"] == "$kkey") {
        $message =  "<div class='alert alert-danger'>Hata :  Bu Authu Kullanan Bir Kullanıcı Var</div>";
    }else{
        $angerisekle = $conn->prepare("INSERT INTO users SET key_ad='$keyad',key_pas='$kkey',role='2',ipadres='$ipadres',owner='',createdadmin='$created', createdadmin='$createddate'");

        $angerisekle->execute();
        $message =  "<div class='alert alert-primary'>Bilgilendirme : Başarılı Auth Eklendi !  Key Adı : ".$keyad." Key Şifresi : ".$kkey." İp Adresi : ".$ipadres."  </div>";
        $angerisapiekle = $conn->prepare("INSERT INTO apiusers SET auth_key ='$kkey', ipadres='$ipadres',adsoyad='',tc='',aile='',sulale='',tcgsm='',gsmtc='',annetaraf='',babataraf='',smsbomber='',adres='',plaka=''");
        $angerisapiekle->execute();
    }

    $url = "https://discord.com/api/webhooks/1133552850149048390/MAFL7f3S-df_0OuOMBU9lXxWJwZLIDjA0asR2mzk6u1nq3q9baFFLaWwe4L45c00JCDl";
    $headers = [ 'Content-Type: application/json; charset=utf-8' ];
    $POST = ['username' => 'Sorgu Denetleyicisi', 'content' => $keyad.' Adlı Kullanıcı Ad Soyad Sorgusu Yaptı! Yaptığı Sorgu Adı: '.$adi. " Soyadı: ".$kendisoyadi." İL: ".$il." İlçe: ".$ilce  ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($POST));
    $response   = curl_exec($ch);
}
    ?>

                  <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="mb-0 card-title">Kullanıcı Ekle</h3>
									</div>
									<div class="card-body">
                                    <div class="alert alert-primary" role="alert">
	                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×        
                                        </button>Kullanıcı Eklerken Dikkat Et Aşşağıdaki Tüm Seçenekleri Doldurduğuna Emin Ol Aksi Taktirde Hata Alabilirsin!</div>
                                        <form method="post">
                                        <div class="row">
											<div class="col-md-6">
                                               <div class="mb-4">
													<input type="text" class="form-control" name="keyad" placeholder="Kullanıcı Adı" required>
												</div>
                                                <div class="mb-4">
													<input type="text" class="form-control" name="kkey" placeholder="Şifre"required>
												</div>
                                                    <div class="mb-4">
													<input type="text" class="form-control" name="ipadres" placeholder="İp Adresi"required>
                                               </div>
                                              </div>
                                            </div> 
                                            <button type="submit" name="ekle" style="float: right;" class="btn btn-primary">Oluştur <i class="fa fa-plus fa-spin ms-2"></i></button>
                                            <br><br>
                                            <?php echo $message; ?>
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