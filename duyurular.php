<?php
include("inc/sidebar.php");
include("server/owner.php");

$sql = "SELECT * FROM duyuru";
$anger = $conn->query($sql);

if ($angeris['owner'] == 1) {

	if (isset($_GET['sil'])) {
		$sil = htmlspecialchars($_GET['sil']);
		$silangeris = $conn->prepare("DELETE FROM duyuru WHERE id=?");
		$silangeris->execute([
			$_GET['sil']
		]);
	
		header("Location: duyurular.sorgu");
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
														<th class="wd-20p">Duyuru Atan</th>
                                                        <th class="wd-20p">Duyuru</th>
                                                        <th class="wd-20p">Tarih</th>
                                                        <th class="wd-20p">Duyuru Sil</th>


													</tr>
												</thead>
												<tbody>
                                               <?php while ($users = $anger->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <tr>
                                            <td><?=$users['duyuruatan']?></td>
                                            <td><?=$users['atılanduyuru']?></td>
                                            <td><?=$users['tarih']?></td>
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
