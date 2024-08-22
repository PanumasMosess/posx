
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>POSX - POSX เข้าใช้งานระบบ</title>
<link rel="icon" href="https://app.posx.co/img/icon.png" type="image/png" />
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="https://harnishdesign.net/demo/html/oxyy/css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="https://harnishdesign.net/demo/html/oxyy/css/color-orange.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

<style>
    /** BASE **/
    * {
        font-family: 'Kanit', sans-serif;
    }
</style>
<script>
        var serverUrl = '<?php echo base_url(); ?>'
    </script>
</head>
<body>

<!-- Preloader -->
<div class="preloader preloader-dark">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100"> 
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-4">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-5 bg-dark"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('https://wallpapercave.com/wp/wp8284081.jpg   ');"></div>
          <div class="hero-content mx-auto w-100 h-100">
            <div class="container d-flex flex-column h-100">
              <div class="row g-0">
                <div class="col-11 col-lg-9 mx-auto">
                  <div class="logo mt-5 mb-5"> <a class="d-flex" href="/" title="Oxyy"><img src="https://app.posx.co/img/POSX_2.png" alt="" style="height: 32px;"></a> </div>
                </div>
              </div>
              <div class="row g-0 mt-3">
                <div class="col-11 col-lg-9 mx-auto">
                  <h1 class="text-9 text-white fw-300 mb-5"><span class="fw-500">ยินดีต้อนรับสู่</span> ระบบผู้ช่วยร้านอาหาร Online</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Login Form
      ========================= -->
      <div class="col-md-8 d-flex flex-column align-items-center bg-dark">
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-8 col-lg-7 col-xl-6 mx-auto">
              <p class="text-2 text-light">Not a member? <a class="fw-500" href="/register">สมัครใช้งาน</a></p>
              <h3 class="text-white mb-4">เข้าสู่ระบบ</h3>

              <form id="loginForm" class="form-dark" method="post">
                <div class="mb-3">
                  <label class="form-label text-light" for="">ยูสเซอร์เนม</label>
                  <input type="text" class="form-control" name="username" required placeholder="ยูสเซอร์เนม">
                </div>
                <div class="mb-3">
                  <label class="form-label text-light" for="loginPassword">รหัสผ่าน</label>
                  <a class="float-end text-2" href="#">ลืมรหัสผ่าน ?</a>
                  <input type="password" class="form-control" name="password" required placeholder="รหัสผ่าน">
                </div>
                <button id="btn-login" class="btn btn-primary my-2" type="button">เข้าสู่ระบบ</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End --> 
    </div>
  </div>
</div>

<!-- Script --> 
<script src="https://harnishdesign.net/demo/html/oxyy/vendor/jquery/jquery.min.js"></script> 
<script src="https://harnishdesign.net/demo/html/oxyy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="https://harnishdesign.net/demo/html/oxyy/js/switcher.min.js"></script> 
<script src="https://harnishdesign.net/demo/html/oxyy/js/theme.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

<script>
    $(document).ready(function() {
        $('#btn-login').on('click', function(e) {
            e.preventDefault()
            const $btnLogin = $(this)

            $btnLogin.prop('disabled', true)

            let username = $('input[name="username"]').val()
            let password = $('input[name="password"]').val()

            let dataObj = {
                username,
                password
            }

            $.ajax({
                type: 'POST',
                url: `${serverUrl}/login`,
                contentType: 'application/json; charset=utf-8;',
                processData: false,
                data: JSON.stringify(dataObj),
                success: function(res) {
                    if (res.success === 1) {

                        $btnLogin.prop('disabled', false)

                        Swal.fire({
                            icon: 'success',
                            text: `${res.message}`,
                            timer: '2000',
                            heightAuto: false
                        });

                        window.location.href = res.redirect_to;
                    } else {
                        $btnLogin.prop('disabled', false)
                    }
                },
                error: function(res) {

                    $btnLogin.prop('disabled', false)

                    Swal.fire({
                        icon: 'error',
                        title: 'ไม่สามารถเข้าสู่ระบบได้',
                        text: `${res.responseJSON.message}`,
                        timer: '2000',
                        heightAuto: false
                    });
                }
            })

        });
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
</body>
</html>