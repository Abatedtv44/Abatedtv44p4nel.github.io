<?php

include("inc/sidebar.php");
include("server/owner.php");


?>
                               <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">Admin Ekle</h4>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Admin Kullanıcı Adı</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="kad" placeholder="Kullanıcı Adı" id="example-search-input" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Admin Şifre</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" name="kpas" placeholder="Şifre" id="example-search-input" required>
                                            </div>
                                        </div>

                                        <button type="submit" id="angeris" style="float: right;" class="btn btn-primary">Ekle<i class="fa fa-plus fa-spin ms-2"></i></button>
                                            <br><br>
                                            <div id="message">

                                        </div>
                                    </div>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                        $("#angeris").click(function(){

                            var k_ad = $("[name=kad]").val();
                            var k_pas = $("[name=kpas]").val();

                            if (k_ad === "" && k_pas === "") {
                               Swal.fire ({
                                 icon : "error",
                                 title : "Oopss...",
                                 text : "Kullanıcı Adı Ve Şifre Boş Bırakılmaz",
                                 footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001>',
                                 showConfirmButton: false,
                                 timer: 1500
                             })
                            }else{
                                $.ajax({
                                    type : 'POST',
                                    url : 'api/admincreate/api.php',
                                    data : {k_ad,k_pas},

                                    success : function(data){
                                        var json = data;

                                        if (json.status === "true") {

                                        var ad = json.k_ad;
                                        var pas = json.k_pas;

                                        result = "<br> <br>"+
                                        "<div class='alert alert-primary'>Admin Ekleme Başarılı Eklenen Admin Bilgileri Kullanıcı Adı : "+ad+" Şifre :  "+pas+"</div>"
                                         ;
                                        $("#message").html(result);  

                                        Swal.fire({
                                        position: 'center',
                                        icon : "success",
                                        title : 'Admin Ekleme Başarılı !',
                                        footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001</a>',
                                        showConfirmButton: false,
                                        timer: 3000
                                         })
                                         
                                        }
                                        if (json.status === "false") {

                                        Swal.fire({
                                        position: 'center',
                                        icon : "error",
                                        title : 'Admin Ekleme Başarısız Lütfen Farklı Bir Şifre Deneyiniz !',
                                        footer: '<a href="https://discord.gg/v0001">https://discord.gg/v0001</a>',
                                        showConfirmButton: false,
                                        timer: 3000
                                         })
                                            
                                        }
                                         
                                    }

                                });
                            }

                        });
                        </script>
              
<?php
include("inc/main_js.php");

?>
