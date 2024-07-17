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
        } else {
            header("Location: users.sorgu");
        }
    }
}

// Handle button click to increment count
if (isset($_POST['increment_count'])) {
    // Clear the content of api/count.txt and write '1' into it
    file_put_contents('api/count.txt', '1');
    // Show a success notification
    echo '<script>
            Swal.fire({
                icon: "success",
                title: "Sorgu Kullanım Sayısı Sıfırlandı",
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
            }).then((result) => {
                location.reload(); // Refresh the page after the notification is closed
            });
          </script>';
}

// Handle button click to delete free users
if (isset($_POST['delete_free_users'])) {
    $conn->exec("DELETE FROM users WHERE role = '3'");
    echo '<script>
            Swal.fire({
                icon: "success",
                title: "Ücretsiz Üyeler Silindi",
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
            }).then((result) => {
                location.reload(); // Refresh the page after the notification is closed
            });
          </script>';
}

// Handle button click to clear chat
if (isset($_POST['clear_chat'])) {
    file_put_contents('messages.txt', ''); // Clear the content of messages.txt
    echo '<script>
            Swal.fire({
                icon: "success",
                title: "Sohbet Temizlendi",
                showConfirmButton: false,
                timer: 1500,
                allowOutsideClick: false,
            }).then((result) => {
                location.reload(); // Refresh the page after the notification is closed
            });
          </script>';
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
                                <!-- Add a button to increment count -->
                                <form method="post">
                                    <button type="submit" name="increment_count" class="btn btn-primary">Sorgu Kullanım Sayısını Sıfırla</button>
                                </form>
                                <!-- Add a button to delete free users --> <br><br>
                        
                                <form method="post">
                                    <button type="submit" name="clear_chat" class="btn btn-warning">Sohbeti Temizle</button>
                                </form>
                                <br>                                <br>
                                <br>
                                <br>
                                <br>
                                <br>

                                <form method="post">
                                    <button type="submit" name="delete_free_users" class="btn btn-danger">Ücretsiz Üyeleri Sil</button>
                                </form>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("inc/main_js.php");
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
