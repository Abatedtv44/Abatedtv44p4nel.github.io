<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");


$auth = htmlspecialchars($_GET["usersApiCode"]);
$control = $conn->query("SELECT * FROM apiusers WHERE auth_key = '{$auth}'")->fetch();


?>

            
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
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">API Services</h4>


<table class="table">
  <tr>
    <th>API İsim</th>
    <th>Durum</th>
    <th>İp Adres</th>
    <th>Auth Key</th>
  </tr>
  <tr>
    <td>Ad Soyad</td>
    <?php if ($control['adsoyad'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
    <td> <span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Tc</td>
    <?php if ($control['tc'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
    <tr>
    <td>Sülale</td>
    <?php if ($control['sulale'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Aile</td>
    <?php if ($control['aile'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Tc Gsm</td>
    <?php if ($control['tcgsm'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Gsm Tc</td>
    <?php if ($control['gsmtc'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Anne Tarafı</td>
    <?php if ($control['annetaraf'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Baba Tarafı</td>
    <?php if ($control['babataraf'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>

  <tr>
    <td>Sms Bomber</td>
    <?php if ($control['smsbomber'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
  <tr>
    <td>Adres</td>
    <?php if ($control['adres'] == "") { ?>
       <td> <span class="badge rounded-pill bg-danger">Kullanılamaz</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
       <td></td>
   <?php }else{ ?>
   <td><span class="badge rounded-pill bg-success">Kullanılabilir</span></td>
       <td><?=$control["ipadres"]?></td>
       <td><?=$control["auth_key"]?></td>
   <?php } ?>
  </tr>
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
                </div>

              
<?php
include("inc/main_js.php");

?>
