<?php
include("server/control.php");
include("inc/sidebar.php");


$auth = $_SESSION["key"];
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
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">İp Adresimi Değiştir</button>
                                        <br>
                                        <br>
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="example-Modal3">Bilgilerimi Güncelle</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="mb-3">
						<label for="recipient-name" class="form-control-label">İp Adresiniz</label>
						<input type="text" class="form-control" name="ipadres" placeholder="İp Adresi">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" id="btnAngeris" data-bs-dismiss="modal" class="btn btn-primary">Değiştir</button>
			</div>
		</div>
	</div>
</div>

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
  <tr>
    <td>Plaka</td>
    <?php if ($control['plaka'] == "") { ?>
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

                <script type="text/javascript">

                    $("#btnAngeris").click(function(){

                        var ip = $("[name=ipadres]").val();

                        if (ip == "") {
                            Swal.fire ({
                                 icon : "error",
                                 title : "Oopss...",
                                 text : "İp Adresi Boş Bırakılmaz",
                                 footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001</a>',
                                 showConfirmButton: false,
                                 timer: 1500
                             })
                        }else{
                            $.ajax({
                                type : 'POST',
                                url : 'api/editip/api.php',
                                data : {ip},

                                success : function(data){
                                    var json = data;

                                    if (json.status === "true") {

                                        Swal.fire({
                                        position: 'center',
                                        icon : "success",
                                        title : 'İp Adresiniz Başarıyla Güncellendi',
                                        footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001</a>',
                                        showConfirmButton: false,
                                        timer: 3000
                                         }) 
                                         window.setTimeout(function() {
                                          window.location.href = '/apiservices.sorgu';
                                          }, 3000);                                       
                                    }

                                    if (json.status === "false") {

                                        Swal.fire({
                                        position: 'center',
                                        icon : "error",
                                        title : 'İp Güncelleme Başarısız !',
                                        footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001</a>',
                                        showConfirmButton: false,
                                        timer: 3000
                                         })
                                        
                                    }
                                }
                            });
                        }

                    });

                </script>

              
<?php
include("inc/main_js.php");

?>
