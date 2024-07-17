<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");

$sql = "SELECT * FROM users WHERE role='2' OR role='3' OR role='0'";
$anger = $conn->query($sql);

if ($angeris['role'] == 1) {

    if (isset($_GET['sil'])) {
        $sil = $_GET['sil'];
        $sil_sorgu = $conn->prepare("DELETE FROM users WHERE key_ad = ?");
        $sil_sorgu->execute([$sil]);
        header("Location: userbul.sorgu");
        exit;
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
    <form method="post">
        <div class="mb-3">
            <label for="search">Arama</label>
            <input type="text" name="search" id="search" class="form-control" placeholder="Kullanıcı adı girin">
        </div>
        <button type="submit" class="btn btn-primary">Ara</button>
    </form>
    <?php
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM users WHERE key_ad LIKE '%$search%'";
        $result = $conn->query($sql);
        if ($result->rowCount() > 0) {
    ?>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                    <thead>
                        <tr>
                            <th class="wd-20p">Durum</th>
                            <th class="wd-20p">Id</th>
                            <th class="wd-20p">Kullanıcı Adı</th>
                            <th class="wd-20p">Şifre</th>
                            <th class="wd-20p">İp Adresi</th>
                            <th class="wd-20p">Oluşturan</th>
                            <th class="wd-20p">Api Ekle</th>
                            <th class="wd-20p">Api Görüntüle</th>
                            <th class="wd-20p">Sil</th>
                            <th class="wd-20p">Düzenle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td>Aktif</td>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['key_ad'] ?></td>
                                <td><?= $row['key_pas'] ?></td>
                                <td><?= $row['ipadres'] ?></td>
                                <td><?= $row['createdadmin'] ?></td>
                                <?php if ($row['role'] == 2) { ?>
                                <?php } ?>
                                <td><a href="apiusers.sorgu?usersApiCode=<?=$row['key_pas']?>" class="badge rounded-pill  bg-success mt-2">Api Ekle</a></td>
                                      <td><a href="usersapi.sorgu?usersApiCode=<?=$row['key_pas']?>" class="badge rounded-pill  bg-primary mt-2">Api Görüntüle</a></td>
                                       <td><a href="?sil=<?=$row['key_ad']?>" onclick="return confirm('Üyelik Silinsin mi ?')" class="badge rounded-pill  bg-danger mt-2">Sil</a></td>
                                       <td><a href="edituser.sorgu?id=<?=$row['key_pas']?>" class="badge rounded-pill  bg-danger mt-2">Düzenle</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
    <?php
        } else {
            echo '<p>Kullanıcı bulunamadı.</p>';
        }
    }
    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          </div>

<?php
include("inc/main_js.php");
?>