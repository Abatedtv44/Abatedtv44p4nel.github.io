<style>
    /* Temel Stil Ayarları */
body {
    font-family: 'Montserrat', sans-serif;
    background-color: #f0f0f0;
}

/* Başlık ve Menü */
.content-header-title {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.breadcrumb-wrapper ol.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 0;
}

.breadcrumb-item {
    display: inline-block;
    margin-right: 5px;
    font-size: 14px;
}

/* Kartlar */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e0e0e0;
}

.card-title {
    margin: 0;
    font-size: 18px;
    font-weight: bold;
}

/* Düğmeler */
.btn {
    border-radius: 5px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.btn-primary {
    background-color: #1976D2;
    color: #fff;
}

.btn-danger {
    background-color: #f44336;
    color: #fff;
}

.btn-warning {
    background-color: #FFC107;
    color: #fff;
}

.btn-outline-dark.round {
    border-color: #343a40;
    color: #343a40;
}

/* Görsel İkonlar */
.fad,
.fas {
    width: 14px;
    height: 14px;
    vertical-align: middle;
    margin-right: 5px;
}

/* Diğer Öğeler */
textarea.form-control {
    resize: none;
}

/* Onaylananlar ve Onaylanmayanlar Kartları */
.card.border-success, .card.border-danger {
    margin-top: 20px;
}

.card-header.border-success, .card-header.border-danger {
    background-color: #f0f0f0;
    border: none;
}

.my-0.text-success, .my-0.text-danger {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.badge.rounded-pill {
    padding: 6px 12px;
    font-size: 14px;
}

/* Gözat Düğmeleri */
#mostra,
    #mostra2 {
        background-color: #343a40;
        border: none;
        color: #ffffff;
        font-weight: bold;
        cursor: pointer;
        padding: 6px 12px;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    #mostra:hover,
    #mostra2:hover {
        background-color: #ffffff;
        color: #343a40;
    }

</style>
<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="TeamFast">
        <meta name="keywords" content="Fastchecker, Fast checker, Fast, checker, credit card, credit card checker, ccn, ccn checker, cc checker, tr checker, tr cc checker, usa cc checker, card checker, bin, bin checker, cc duzenleyici, mernis, mernis 2021, kisi sorgu, kisi sorgu 2021, tc kimlik sorgu, tc sorgu, tc sorgu 2021, numara sorgu, numara sorgu 2021, kimlik sorgu, kisi bul 2021"/>
		<meta name="description" content="FastChecker, Piyasanın en iyi ve en hızlı cc checker sitesidir. Data düzeltici, Account checker, Bin checker vb. birçok hizmeti ücretsiz sağlamaktadır. https://discord.gg/aQpVxkdn"/>
    <title>lawliet0001 - Joygame Checker</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php
        include_once("inc/sidebar.php");
        ?> 
    <!-- END: Main Menu-->

            <div class="content-body">
                <!-- Basic Inputs start -->
                <section id="basic-input">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
							<div class="card-header">
                                    <h4 class="card-title">FastCheck Joygame Account Checker</h4>
                                </div>
                                <div class="card-header">
								<textarea style="text-align: center;" id="list" placeholder="Hesapları bu alana giriniz..&#10;Örnek: test@gmail.com:sifre" class="textarea form-control mb-3" rows="10"></textarea>
									<button id="start" type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-play"></i> Başlat</button>
									<button id="stop" type="submit" class="btn waves-effect waves-light btn-rounded btn-danger" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-stop"></i> Durdur</button>
                                    <a href="joygamechecker" class="text-white"><button  type="button" class="btn waves-effect waves-light btn-rounded btn-warning" style="width: 180px; height: 45px; outline: none; margin-left: 5px;"><i class="fas fa-trash-alt"></i> Temizle</button></a>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-12">
                            <div class="card border border-success">
                                <div class="card-header bg-transparent border-success">
                                    <h5 class="my-0 text-success">
                                        <i class="fad fa-check-circle mr-2"></i>Onaylananlar
                                        <span class="badge rounded-pill bg-success badge-success" id="cLive">0</span>
                                    </h5>
                                    <div style="position: absolute; top:10px; right: 10px;">
                                        <button id="mostra" class="btn btn-outline-dark round">
                                            <i class="fas fa-eye-slash"></i> Gör / Gizle
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h6 style="font-weight: bold;" class="card-title">
                                        <span  id="cLive2" class="badge badge-success"></span>
                                    </h6>
                                    <div id="bode">
                                        <span id="lives" class="aprovadas"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card border border-danger">
                                    <div class="card-header bg-transparent border-danger">
                                        <h5 class="my-0 text-danger"><i class="fad fa-times-circle mr-2"></i>Onaylanmayanlar <span class="badge rounded-pill bg-danger badge-danger" id="cDie">0</span></h5>
									<div style="position: absolute; top:10px; right: 10px;"><button id="mostra2" class="btn btn-outline-dark round"><i class="fas fa-eye-slash"></i> Gör / Gizle</button></div>

  <div class="card-body">
    <h6 style="font-weight: bold;" class="card-title"><span id="cDie2" class="badge badge-danger"></span></h6>
    <div id="bode2"><span id="dies" class="reprovadas">
                                                
												</span>
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
               <!-- container-fluid -->
            </div>
    <!-- END: Content-->



    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

  <!-- BEGIN: Footer-->

    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
	<script src="app-assets/js/scripts/customizer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/forms/form-tooltip-valid.js"></script>
    <!-- END: Page JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
            $("#bode").hide();
            $("#bode2").hide();
            
            $('#mostra').click(function(){
                $("#bode").slideToggle();
            });
            
            $('#mostra2').click(function(){
                $("#bode2").slideToggle();
            });
            
            $('#showApproved').click(function(){
                $("#bode").slideDown();
            });
            
            $("#start").click(function(){
                $("#lives").html(""); // Temizlenen onaylanan hesapları boşalt
                $("#dies").html("");  // Temizlenen onaylanmayan hesapları boşalt
            });
        });
    </script>

<script type="text/javascript">

$(document).ready(function(){


    $("#bode2").hide();
	$("#esconde2").show();
	
	$('#mostra2').click(function(){
	$("#bode2").slideToggle();
	});

});

</script>

				<script>
    $(document).ready(function() {
        $('#start').attr('disabled', null);
        $('#start').click(function() {

            var line = $('#list').val().split('\n');
            var total = line.length;
            var ap = 0;
            var rp = 0;
            var st = 'Komut Bekleniyor!';
            $('#carregadas').html(total);
            $('#status').html(st);
            line.forEach(function(value) {
                var list = value.split('|');
                var ajaxCall = $.ajax({
                    url: 'api/joygamechecker.php',
                    type: 'GET',
					data: {
                        lista: value
                    },
                    beforeSend: function() {
                        $('#stop').attr('disabled', null);
                        $('#start').attr('disabled', 'disabled');
                        var st = 'Başlatıldı!';
                        $('#status').html(st);

                    },

                    success: function(data) {
                        if (data.indexOf("#Aktif") >= 0) {
                            $("#lives").val(data + "\n" + $("#lives").val());
                            ap = ap + 1;
                            document.getElementById("lives").innerHTML += data + "<br>";
                            removelinha();
                        } else {
                            $("#dies").val(data + "\n" + $("#dies").val());

                            rp = rp + 1;
                            document.getElementById("dies").innerHTML += data + "<br>";
                            removelinha();
                        }
                        var fila = parseInt(ap) + parseInt(rp);
                        $('#cLive').html(ap);
                        $('#cDie').html(rp);
                        $('#total').html(fila);
                        if (fila == total) {
                            $('#start').attr('disabled', null);
                            $('#stop').attr('disabled', 'disabled');
                            audio.play();
                            var st = 'Başarıyla Bitti';
                            $('#status').html(st);

                        }

                    }

                });
                $('#stop').click(function() {
                    ajaxCall.abort();
                    $('#start').attr('disabled', null);
                    $('#stop').attr('disabled', 'disabled');
                    var st = 'Durduruldu';
                    $('#status').html(st);
                });
            });
        });
    });

    function removelinha() {
        var lines = $("#list").val().split('\n');
        lines.splice(0, 1);
        $("#list").val(lines.join("\n"));
    }
                </script>
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>