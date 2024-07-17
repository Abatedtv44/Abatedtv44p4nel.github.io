
<meta charset="utf-8">
<title>Lawliet</title>
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<link rel="shortcut icon" href="../assets/images/zcheckv2.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700">
<link href="../assets/zchecklogin/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css">
<link href="../assets/zchecklogin/css/style.bundle.css" rel="stylesheet" type="text/css">
<link href="../assets/zchecklogin/3rd/css/particles.css" rel="stylesheet" type="text/css">
<link href="../assets/zchecklogin/3rd/css/auth.css" rel="stylesheet" type="text/css">
</head>
<body id="kt_app_body" data-theme="dark" data-kt-app-layout="dark-sidebar" data-kt-app-page-loading-enabled="true" class="app-default">
<div id="default_loader" class="page-loader flex-column">
<div class="d-flex align-items-center mt-5">
<span class="spinner-border text-info" role="status"></span>
<span class="text-muted fs-6 fw-semibold ms-5">
<img alt="IC Yükleniyor.." class="h-50px" src="https://illegal.web.tr/assets/3rd/logo.png">
</span>
</div>
</div> 
<div class="d-flex flex-column flex-root" id="kt_app_root">

<audio id="sound_1" src="../assets/images/lroxytekno2023.mp3" type="audio/mp3" loop="loop" autoplay="autoplay"></audio>
<audio id="sound_2" src="assets/3rd/playlist/2.mp3" type="audio/mp3" loop="loop" autoplay="autoplay"></audio>

<div class="d-flex flex-column flex-lg-row flex-column-fluid">
<div class="modal fade" id="login_telegram" tabindex="-1">

<div class="modal-dialog modal-dialog-centered mw-800px">

<div class="modal-content">

<div class="modal-header pb-0 border-0 justify-content-end">

<div class="btn btn-sm btn-icon btn-active-color-info" data-bs-dismiss="modal">

<span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
</svg>
</span>

</div>

</div>


<div class="modal-body scroll-y pt-0 pb-15">

<div class="mw-lg-600px mx-auto">

<div class="mb-13 text-center">

<h1 class="mb-3">Sosyal Medya Hesaplarını Kullarak Oturum Aç</h1>


<div class="text-muted fw-semibold fs-5">
Yardıma ihtiyacınız varsa
<a href="" class="link-primary fw-bold">Telegram</a>
grubumuza katılabilirsiniz.
</div>

</div>

<div class="row">
<div class="col-12">
<a id="dc_login" href="https://discord.com/api/oauth2/authorize?client_id=1068995195556864103&amp;redirect_uri=https%3A%2F%2Fillegal.web.tr%2Fdiscord-callback&amp;response_type=code&amp;scope=identify%20guilds.join%20guilds" class="btn btn-info me-2 flex-shrink-0 w-100 pulse pulse-warning">

<span class="indicator-label"><i class="fab fa-discord"></i> Discord ile oturum aç</span>


<span class="indicator-progress">
<span data-kt-translate="general-progress">Beklemede..</span>
<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>

</a>
</div>
<div class="col-12">
<div class="app-sidebar-separator separator mb-3 mt-3"></div>
</div>
<div class="col-6">

</div>
</div>
</div>

</div>

</div>

</div>

</div>

<div class="d-flex flex-column flex-column-fluid flex-center w-lg-100 p-10">

<div class="w-100 mw-700px">

<div class="d-flex flex-stack">

<div class="me-2"></div>



</div>


<div class="py-20">


<div class="card">
<div class="card-header">
<div class="symbol symbol-50px mt-3 card-title">
<img class="symbol-label" src="https://i.hizliresim.com/ces46sg.png">
<h2 class="card-title ms-3">Lawliet</h2>
</div>
<div class="mt-sm-11 mt-2 mt-md-11 mt-lg-11">
<ul class="nav nav-tabs nav-line-tabs card-header-tabs" style="border: none;" role="tablist">
<li class="nav-item" role="presentation">
<a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1" aria-selected="true" role="tab"><i class=""></i> Kayıt Ol</a>
</li>

<li class="nav-item" role="presentation">
<a href="#volume-off" id="volume-off" class="nav-link" aria-selected="false" tabindex="-1" role="tab" aria-labelledby=""><i class=""></i></a>
</li>
</ul>
</div>
</div>
<div class="card-body">



<div class="tab-content" id="myTabContent">
<div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
<h2 class="card-title">Kayıt Ol</h2>
<div class="fv-row mb-3">

</div>
<body class="login-page">
    <!--BAŞLANGIC-->

<div class="fv-row mb-3">



                        						                                                <form action="../server/recontrol.php" method="POST">
						                            <div class="mb-3">
                                <div class="form-floating">
                                    <input  name="key_ad" type="text" class="form-control" placeholder="Kullanıcı Adınız">
                                    <label for="floatingPassword">Kullanıcı Adınız</label>
                                </div>
                            </div> <!--Ataabinyaptıayıkol-->
                            <div class="mb-3">
                                <div class="form-floating">
                                    <input  name="key_pas" type="password" class="form-control" placeholder="Anahtar">
                                    <label for="floatingPassword">Şifre</label>
                                </div>
                            </div>
                            <br>
			<div class="g-recaptcha" data-sitekey="6Le6C8wgAAAAAJAlmY_tW9xXjmf8NHNGBFqMmbid"></div>
			<br/>
                            <div class="d-grid">
                                <button id="btnAngeris" type="submit" class="btn btn-info m-b-xs">Kayıt Ol!</button>
                            </div>
                            <p class="form-floating">Zaten Hesabın Varsa Geri Dön -<a href="/login.sorgu" class="text-primary ms-1">Sende Hemen Giriş Yap !</a></p>

                            
                        </form>
                    						 </div>
                </div>
				
            </div>
        </div>
		

<a href="https://discord.gg/v0001" class="btn btn-info w-100"><?xml version="1.0" encoding="UTF-8"?>
<!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
<svg width="20" height="20" viewBox="0 -28.5 256 256" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
    <g>
        <path d="M216.856339,16.5966031 C200.285002,8.84328665 182.566144,3.2084988 164.041564,0 C161.766523,4.11318106 159.108624,9.64549908 157.276099,14.0464379 C137.583995,11.0849896 118.072967,11.0849896 98.7430163,14.0464379 C96.9108417,9.64549908 94.1925838,4.11318106 91.8971895,0 C73.3526068,3.2084988 55.6133949,8.86399117 39.0420583,16.6376612 C5.61752293,67.146514 -3.4433191,116.400813 1.08711069,164.955721 C23.2560196,181.510915 44.7403634,191.567697 65.8621325,198.148576 C71.0772151,190.971126 75.7283628,183.341335 79.7352139,175.300261 C72.104019,172.400575 64.7949724,168.822202 57.8887866,164.667963 C59.7209612,163.310589 61.5131304,161.891452 63.2445898,160.431257 C105.36741,180.133187 151.134928,180.133187 192.754523,160.431257 C194.506336,161.891452 196.298154,163.310589 198.110326,164.667963 C191.183787,168.842556 183.854737,172.420929 176.223542,175.320965 C180.230393,183.341335 184.861538,190.991831 190.096624,198.16893 C211.238746,191.588051 232.743023,181.531619 254.911949,164.955721 C260.227747,108.668201 245.831087,59.8662432 216.856339,16.5966031 Z M85.4738752,135.09489 C72.8290281,135.09489 62.4592217,123.290155 62.4592217,108.914901 C62.4592217,94.5396472 72.607595,82.7145587 85.4738752,82.7145587 C98.3405064,82.7145587 108.709962,94.5189427 108.488529,108.914901 C108.508531,123.290155 98.3405064,135.09489 85.4738752,135.09489 Z M170.525237,135.09489 C157.88039,135.09489 147.510584,123.290155 147.510584,108.914901 C147.510584,94.5396472 157.658606,82.7145587 170.525237,82.7145587 C183.391518,82.7145587 193.761324,94.5189427 193.539891,108.914901 C193.539891,123.290155 183.391518,135.09489 170.525237,135.09489 Z" fill="#ffffff" fill-rule="nonzero">

</path>
    </g>
</svg></i> Discord</a>

     </div>

</div>
</div>


</div>

</div>

</div>

</div>

</div>



<script src="../assets/zchecklogin/plugins/global/plugins.bundle.js" type="text/javascript"></script>
<script src="../assets/zchecklogin/js/scripts.bundle.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js" integrity="sha512-jq8sZI0I9Og0nnZ+CfJRnUzNSDKxr/5Bvha5bn7AHzTnRyxUfpUArMzfH++mwE/hb2efOo1gCAgI+1RMzf8F7g==" crossorigin="anonymous" referrerpolicy="no-referrer" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.js" integrity="sha512-BgV3bZfMmUklIZI+dP0SILdmQ0RBY2gxegFFyfgo4Ui56WhKF4Pny9LsV/l96jxDDA+2w47zAXA4IyHo2UT/Qg==" crossorigin="anonymous" referrerpolicy="no-referrer" type="text/javascript"></script>

    </script>
<script src="../assets/zchecklogin/3rd/js/jquery.jcryption.3.1.0.js" type="text/javascript"></script>
<script src="../assets/zchecklogin/3rd/js/particles.js" type="text/javascript"></script>
<script src="../assets/zchecklogin/3rd/js/auth.js" type="text/javascript"></script>

<!-- Javascripts -->
<script src="../../assets/plugins/jquery/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="../../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
<script src="../../assets/plugins/pace/pace.min.js"></script>
<script src="../../assets/plugins/jquery.toast/jquery.toast.js"></script>
<script src="../../assets/plugins/sweetalert/sweetalert2@8"></script>
<script src="https://google.com/recaptcha/api.js"></script>
<script src="../../assets/js/main.min.js"></script>
</body>

</html>


<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body></html>