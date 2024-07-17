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
                <div class="col-lg-3">
                    <div class="card border-0 mb-4 market-card">
                        <div class="card-body">
                            <h5 class="card-title">Premium Haftalık</h5>
                            <p class="card-text">Fiyat: 75₺</p>
                            <a href="https://discord.gg/v0001" class="btn btn-success btn-block">Satın Al</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card border-0 mb-4 market-card">
                        <div class="card-body">
                            <h5 class="card-title">Premium Aylık</h5>
                            <p class="card-text">Fiyat: 150₺</p>
                            <a href="https://discord.gg/v0001" class="btn btn-success btn-block">Satın Al</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card border-0 mb-4 market-card">
                        <div class="card-body">
                            <h5 class="card-title">Premium 3 Aylık</h5>
                            <p class="card-text">Fiyat: 250₺</p>
                            <a href="https://discord.gg/v0001" class="btn btn-success btn-block">Satın Al</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card border-0 mb-4 market-card">
                        <div class="card-body">
                            <h5 class="card-title">Premium Yıllık</h5>
                            <p class="card-text">Fiyat: 500₺</p>
                            <a href="https://discord.gg/v0001" class="btn btn-success btn-block">Satın Al</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Lawliet0001 Filigran Kartı -->
<div class="row">
    <div class="col-lg-12">
        <div class="card border-0 mb-4 market-card">
            <div class="card-body">
                <h5 class="card-title">Lawliet İletişim</h5>
                <p class="card-text">Lawliet ile iletişime geçmek için discord hesabı: <a href="https://discord.gg/v0001" target="_blank" style="text-decoration: none; color: #1DA1F2;">https://discord.gg/v0001</a></p>
       
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br><br>
<br>
<br>
<br>


<style>
.market-card {
    border: 2px solid;
    border-image: linear-gradient(to right, red, green, blue) 1;
}

.market-card:hover {
    animation: shake 0.5s;
}

@keyframes shake {
    0% { transform: translate(0, 0); }
    25% { transform: translate(-5px, 5px); }
    50% { transform: translate(5px, -5px); }
    75% { transform: translate(5px, 5px); }
    100% { transform: translate(0, 0); }
}
</style>

<?php
include("inc/main_js.php");
?>
