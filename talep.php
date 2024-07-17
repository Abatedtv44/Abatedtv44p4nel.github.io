<?php
include 'inc/sidebar.php';
include("server/adminkontrol.php");
?>
<style>
    ::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background-color: #0f0f0f;
}

::-webkit-scrollbar-thumb {
  background-color: #888;
  border-radius: 10px;
}

/* Kaydırmayı sağlayan özelleştirilmiş div */
.scrollable-content {
  overflow-y: scroll;
  height: 300px;
}
</style>
<link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Destek Talepleri</h3>
                <p class="text-subtitle text-muted">Destek talepleri aşağıda yer almaktadır.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/panel">Yönetim</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Destek Talepleri</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Destek Talepleri</h4>
        </div>

<section class="section">
    <div class="card">
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>İd</th>
                        <th>Cevaplanma Durumu</th>
                        <th>Oluşturan</th>
                        <th>Yardım Türü</th>
                        <th>Tarih</th>
                        <th>Admin</th>
                    </tr>
                </thead>
                <tbody id="atapriv">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "sorgu";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                      $query = mysqli_query($conn, "SELECT * FROM `destek_talepleri`");
                        while ($getvar = mysqli_fetch_assoc($query)) {
                          echo "<tr>";
                          echo "<td>".$getvar['id']."</td>";
                          if (!empty($getvar['cevap'])) {
                            echo "<td>Cevap Verilmiş</td>";
                        } else {
                            echo "<td>Cevap Verilmemiş</td>";
                        }
                          echo "<td>".$getvar['olusturan']."</td>";
                          echo "<td>".$getvar['yardim_turu']."</td>";
                          echo "<td>".$getvar['tarih']."</td>";
                          echo "<td>".$getvar['admin']."</td>";
                          echo "<td>";
                          echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm" onclick="setId('.$getvar['id'].')">Yanıtla</button>';
                          echo "</td>";
                          echo "<td>";
                          echo '<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal'.$getvar['id'].'">Görüntüle</button>';
                          echo '<button type="button" class="btn btn-danger ml-2" onclick="deleteTicket('.$getvar['id'].')">Sil</button>';
                          echo "</td>";
                          echo "</tr>";
                          echo '<div class="modal fade" id="viewModal'.$getvar['id'].'" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel'.$getvar['id'].'" aria-hidden="true">';
                          echo '<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">';
                          echo '<div class="modal-content">';
                          echo '<div class="modal-header">';
                          echo '<h5 class="modal-title" id="viewModalLabel'.$getvar['id'].'">Destek Talebi Detayları</h5>';
                          echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                          echo '</div>';
                          echo '<div class="modal-body">';
                          echo '<p>Oluşturan: '.$getvar['olusturan'].'</p>';
                          echo '<p>Konu: '.$getvar['konu'].'</p>';
                          echo '<p>Olay: '.$getvar['olay'].'</p>';
                          echo '<p>Verilen Cevap: '.$getvar['cevap'].'</p>';
                          // Add other ticket details as needed
                          echo '</div>';
                          echo '<div class="modal-footer">';
                          echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                          echo '</div>';
                        }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
      <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel33">Destek Talebi Formu </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
                </button>
            </div>
            <form id="annen" method="POST" data-parsley-validate>
              <div class="modal-body">
              <label>ID:</label>
              <div class="form-group">
              <input type="text" id="iddegeri" name="id" class="form-control" disabled>
              </div>
              <label>Cevap:</label>
              <div class="form-group">
              <input autocomplete="off" type="text" name="cevap" placeholder="Yanıtınızı yazın." class="form-control" data-parsley-required="true">
              </div>
              <label>Admin İsim:</label>
              <div class="form-group mb-3">
              <input autocomplete="off" class="form-control" name="admin" placeholder="Cevabı gönderen adminin ismi." data-parsley-required="true"></input>
              </div>
              <div class="col-md-6 mb-4">
            <label>Durum:</label>
            <fieldset class="form-group">
                <select class="form-select" name="durum" id="basicSelect">
                    <option>1</option>
                </select>
            </fieldset>
        </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
              <i class="bx bx-x d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Kapat</span>
              </button>
              <button type="button" class="btn btn-primary ml-1" onclick="gonder()">
              <i class="bx bx-check d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Yanıtı gönder!</span>
              </button>
              </div>
            </form>
<script>
    function setId(id) {
        document.getElementById("iddegeri").value = id;
        document.getElementById("iddegeriText").innerText = id;
    }

    function gonder() {
        var id = document.getElementById("iddegeri").value;
        var cevap = document.getElementsByName("cevap")[0].value;
        var admin = document.getElementsByName("admin")[0].value;
        var durum = document.getElementsByName("durum")[0].value;

        if (cevap === "" || admin === "") {
            Swal.fire({
            icon: "warning",
            title: "lawliet0001",
            text: "Cevap veya Admin Alanları Boş Bırakılamaz!",
            showConfirmButton: false,
            timer: 3500,
            allowOutsideClick: false,
        });
            return;
        }
        setTimeout(function() {
    location.reload();
}, 3500);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "server/cevap.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    Swal.fire({
            icon: "success",
            title: "lawliet0001",
            text: "Cevap Başarıyla Gönderildi!",
            showConfirmButton: false,
            timer: 4000,
            allowOutsideClick: false,
        });
                } else {
                    alert(response.message);
                }
            }
        };
        xhr.send("id=" + id + "&cevap=" + cevap + "&admin=" + admin + "&durum=" + durum);
    }
</script>
<script>
    function deleteTicket(id) {
        if (confirm("Bu destek talebini silmek istediğinizden emin misiniz?")) {
            $.ajax({
                type: "POST",
                url: "talep-sil.php", // Change to the actual URL
                data: { id: id },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        alert("Destek talebi başarıyla silindi.");
                        location.reload(); // Refresh the page
                    } else {
                        alert("Silme işlemi başarısız oldu.");
                    }
                },
                error: function() {
                    alert("Bir hata oluştu. Lütfen tekrar deneyin.");
                }
            });
        }
    }
</script>

                                        </div>
                                    </div>
                                </div>
</section>
<?php
include 'inc/main_js.php';
?>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="assets/extensions/parsleyjs/parsleys.min.js"></script>
    <script src="assets/js/pages/parsley.js"></script>
    <script src="assets/extensions/toastify-js/src/toastify.js"></script>
    <script src="assets/js/pages/toastify.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>