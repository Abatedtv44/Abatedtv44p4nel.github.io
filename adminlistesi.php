<?php
include("inc/sidebar.php");
include("server/owner.php");

$sql = "SELECT * FROM users WHERE role='1' AND owner='0'";
$anger = $conn->query($sql);


if ($angeris["owner"] == 1) {
    if (isset($_GET['sil'])) {
        $sil = htmlspecialchars($_GET['sil']);
        $silangeris = $conn->prepare("DELETE FROM users WHERE id=? and owner='0'");
        $silangeris->execute([
            $_GET['sil']
        ]);
    
        header("Location: adminlist.sorgu");
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
											<table id="example" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-20p">Kullanıcı Adı </th>
                                                        <th class="wd-20p">Şifre</th>
                                                        <th class="wd-20p">Eklenen Tarih</th>
                                                        <th class="wd-20p">Admin Sil</th>


													</tr>
												</thead>
												<tbody>
                                               <?php while ($users = $anger->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                            <td><?=$users['key_ad']?></td>
                                            <td><?=$users['key_pas']?></td>
                                            <td><?=$users['createddate']?></td>
                                       <td><a href="?sil=<?=$users['id']?>" onclick="return confirm('Üyelik Silinsin mi ?')" class="badge rounded-pill  bg-danger mt-2">Sil</a></td>
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
