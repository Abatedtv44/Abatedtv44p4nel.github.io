<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

$sql = "SELECT * FROM users WHERE role='2' OR role='3' OR role='0'";
$anger = $conn->query($sql);

if ($angeris['role'] == 1) {

    if (isset($_GET['sil'])) {
        $sil = htmlspecialchars($_GET['sil']);
        $sorgu = $conn->query("SELECT * FROM users WHERE key_pas='$sil'")->fetch();
        if ($sorgu['role'] != 1) {
            $silangeris = $conn->prepare("DELETE FROM users WHERE key_pas=? AND role='2'");
            $silangeris->execute([
                $_GET['sil']
            ]);
            $silangeriss = $conn->prepare("DELETE FROM users WHERE key_pas=?");
            $silangeriss->execute([
                $_GET['sil']
            ]);
            header("Location: users.sorgu");
        }else{
            header("Location: users.sorgu");
        }
      
    }
    
}


?>

<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Kullanıcılar</h3>
									</div>
									<div class="card-body">
										<div class="table-responsive">
                                        <table class="table" id="table1">
												<thead>
													<tr>
														<th class="wd-20p">Durum</th>
														<th class="wd-20p">Kullanıcı Adı</th>
                                                        <th class="wd-20p">İp Adresi</th>
                                                        <th class="wd-20p">Oluşturulma Tarihi</th>
                                                        <th class="wd-20p">Üyelik Bitiş Tarihi</th>
                                                        <th class="wd-20p">Üyelik</th>
                                                        <th class="wd-20p">Api Ekle</th>
                                                        <th class="wd-20p">Api Görüntüle</th>
                                                        <th class="wd-20p">Sil</th>
                                                        <th class="wd-20p">Düzenle</th>
                                                        

													</tr>
												</thead>
												<tbody>
                                               <?php while ($users = $anger->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>   
                                               <td>Aktif</td>
                                            <td><?=$users['key_ad']?></td>
                                        <td><?=$users['ipadres']?></td>
                                        <td><?= $users['createddate'] ?></td>
                                        <td><?= $users['enddate'] ?></td>
                                        <?php if ($users['role'] == 2) { ?>
    <td>Member</td>
<?php } elseif ($users['role'] == 3) { ?>
    <td>Köylü</td>
<?php } ?>


                                      <td><a href="apiusers.sorgu?usersApiCode=<?=$users['key_pas']?>" class="badge rounded-pill  bg-success mt-2">Api Ekle</a></td>
                                      <td><a href="usersapi.sorgu?usersApiCode=<?=$users['key_pas']?>" class="badge rounded-pill  bg-primary mt-2">Api Görüntüle</a></td>
                                       <td><a href="?sil=<?=$users['key_pas']?>" onclick="return confirm('Üyelik Silinsin mi ?')" class="badge rounded-pill  bg-danger mt-2">Sil</a></td>
                                       <td><a href="edituser.sorgu?id=<?=$users['key_pas']?>" class="badge rounded-pill  bg-danger mt-2">Düzenle</a></td>
                                       </tr>
                                               <?php } ?>
												</tbody>
											</table>
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
