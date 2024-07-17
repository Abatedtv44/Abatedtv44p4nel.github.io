<?php
include 'inc/sidebar.php';
include 'server/control.php';

?>
<?php
$sql = "SELECT key_ad FROM users WHERE key_ad = '$key_ad'";
$result = $conn->query($sql);

    $olusturan = $key_ad;

?>
<link rel="stylesheet" href="assets/extensions/toastify-js/src/toastify.css">
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Destek talebi açarak yardım veya şikayetinizi bildirebilirsiniz.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Destek Talebi</h4>
        </div>
        <div class="card-body">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Destek Talebi Oluştur
                                </button>
<section class="section">
<br>
    <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Konu</th>
                        <th>Yardım Türü</th>
                        <th>Olay</th>
                        <th>Durum</th>
                        <th>Görüntüleme</th>
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
  $query = mysqli_query($conn, "SELECT * FROM `destek_talepleri` WHERE olusturan = '$key_ad'");
  while ($getvar = mysqli_fetch_assoc($query)) {
    echo "<tr>";
    echo "<td>".$getvar['konu']."</td>";
    echo "<td>".$getvar['yardim_turu']."</td>";
    echo "<td>".$getvar['olay']."</td>";
    echo "<td>";
    $class = 'bg-secondary'; 
    $yazi = 'Bekleniyor...';

    if ($getvar['durum'] == 1) {
        $class = 'bg-success';
        $yazi = 'Cevaplandı';
    }
    echo '<span class="badge ' . $class . '">' . $yazi . '</span>';
    echo "</td>";
    echo "<td>";
    echo '<a href="javascript:void(0);" class="badge bg-primary" onclick="setIdAndShowResponse('.$getvar['id'].')">Görüntüle</a>';
    echo '<div id="cevap_'.$getvar['id'].'" style="display:none;">'.htmlspecialchars($getvar['cevap']).'</div>';
    echo "</td>";
    echo "</tr>";
  }
?>
</tbody>
            </table>
        </div>
        </div>
    </div>
</section>
                                        <div class="modal fade text-left" id="primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary">
                                                        <h5 class="modal-title white" id="myModalLabel160">Cevaplanan içerik
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label>Admin Yanıtı:</label>
                                                    <div class="form-group">
                                                       <textarea class="form-control" id="inp" rows="5" disabled></textarea>
                                                    </div>

                                                    <script>
                                                        function setIdAndShowResponse(id) {
                                                            var response = document.getElementById('cevap_' + id).innerHTML;
                                                            document.getElementById('inp').value = response;
                                                            $('#primary').modal('show');
                                                        }
                                                    </script>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kapat</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Destek Talebi Formu </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
<form id="destekForm" method="POST" data-parsley-validate>
    <div class="modal-body">
        <label>Oluşturan:</label>
        <div class="form-group">
        <input type="text" name="olusturan" class="form-control" value="<?php echo $olusturan; ?>" disabled>
        </div>
        <label>Konu:</label>
        <div class="form-group">
            <input autocomplete="off" type="text" name="konu" placeholder="Konu" class="form-control" data-parsley-required="true">
        </div>
        <div class="col-md-6 mb-4">
            <label>Yardım Türü:</label>
            <fieldset class="form-group">
                <select class="form-select" name="yardim_turu" id="basicSelect">
                    <option>Şikayet</option>
                    <option>Yardım/Hata</option>
                    <option>Diğer</option>
                </select>
            </fieldset>
        </div>
        <label>Olay:</label>
        <div class="form-group mb-3">
            <textarea autocomplete="off" class="form-control" name="olay" rows="3" data-parsley-required="true"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Kapat</span>
        </button>
        <button type="button" class="btn btn-primary ml-1" onclick="submitForm()">
            <i class="bx bx-check d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Talebi gönder!</span>
        </button>
    </div>
</form>
<script>
    function submitForm() {
        var form = document.getElementById("destekForm");
        var formData = new FormData(form);

        var konu = JSON.stringify(formData.get("konu"));
var olay = JSON.stringify(formData.get("olay"));
        if (konu.trim() === "" || olay.trim() === "") {
            Swal.fire({
            icon: "warning",
            title: "lawliet0001",
            text: "Konu veya Olay Kısımları Boş Bırakılamaz!",
            showConfirmButton: false,
            timer: 3500,
            allowOutsideClick: false,
        });
            return;
        }

        var olusturanInput = document.getElementsByName("olusturan")[0];
        var olusturan = olusturanInput.value;

        formData.append("olusturan", olusturan);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "server/talep.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success === false && response.message === "cooldown") {
                        Swal.fire({
            icon: "warning",
            title: "lawliet0001",
            text: "10 Dakika Sonra Talep Atabilirsin!",
            showConfirmButton: false,
            timer: 3500,
            allowOutsideClick: false,
        });
                    } else {
                        Swal.fire({
            icon: "success",
            title: "lawliet0001",
            text: "Destek Talebiniz Başarıyla Oluşturulmuştur!",
            showConfirmButton: false,
            timer: 3500,
            allowOutsideClick: false,
        });
                    }
                    setTimeout(function() {
    location.reload();
}, 3500);
                } else {
            Swal.fire({
            icon: "warning",
            title: "lawliet0001",
            text: "Talep Gönderilirken Bir Hata Oluştu!",
            showConfirmButton: false,
            timer: 3500,
            allowOutsideClick: false,
        });
                }
            }
        };
        xhr.send(formData);
    }
</script>
                                        </div>
                                    </div>
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
    <script src="assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="assets/js/pages/datatables.js"></script>
    <link rel="stylesheet" href="assets/css/pages/fontawesome.css">
    <link rel="stylesheet" href="assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="assets/css/pages/datatables.css">