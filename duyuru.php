<?php
include("inc/sidebar.php");
include("server/adminkontrol.php");
include("server/connect.php");

if ($angeris['role'] != 1) {
    // Yönetici değilse burada bir hata sayfasına yönlendirebilirsiniz
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $duyuru_metni = $_POST['la'];
    $duyuruatan = $_POST['duyuruatan'];
    $atilan_duyuru = trim($duyuru_metni);
    $tarih = date('Y-m-d H:i:s');

    if (empty($atilan_duyuru)) {
        // Duyuru boşsa hata mesajı gösterin
        echo '<div class="alert alert-danger" role="alert">Duyuru metni boş bırakılamaz</div>';
    } else {
        // Duyuru metnini veritabanına ekleyin
        $query = "INSERT INTO duyuru (duyuruatan, atılanduyuru, tarih) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(1, $duyuruatan);
        $stmt->bindParam(2, $atilan_duyuru);
        $stmt->bindParam(3, $tarih);
        $result = $stmt->execute();
        
        if ($result) {
            // Duyuru eklendiğinde başarılı mesajı gösterin
            echo '<div class="alert alert-success" role="alert">Duyuru başarıyla eklendi</div>';
        } else {
            // Bir hata oluştuğunda hata mesajı gösterin
            echo '<div class="alert alert-danger" role="alert">Duyuru eklenirken bir hata oluştu</div>';
        }
    }
}

?>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Duyuru Ekle</h3>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mb-3">
                        <label for="search">Duyuru Metni</label>
                        <input type="text" name="la" id="la" class="form-control" placeholder="Duyuru mesajı girin">
                        <input type="text" name="duyuruatan" id="duyuruatan" class="form-control" placeholder="Adınız">
                    </div>
                    <button type="submit" class="btn btn-primary">Ekle</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("inc/main_js.php"); ?>
