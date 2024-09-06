<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
  <link href="images/favicon.png" rel="icon" />
  <title>POSX - POSX สมัครใช้งาน</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    .field-icon {
      float: right;
      margin-right: 5px;
      margin-top: -33px;
      position: relative;
      z-index: 2;
    }

    .eye-icon {
      float: right;
      margin-right: 5px;
      margin-top: -33px;
      position: relative;
      z-index: 2;
    }

    #page2 {
      display: none;
    }

    #page3 {
      display: none;
    }


    /* .transition-page {
      transition: opacity 0.5s ease-in-out;
    } */

    .hide {
      opacity: 0;
      pointer-events: none;
    }

    /* .show {
      opacity: 1;
    } */
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
                    <div class="logo mt-5 mb-5"> <a class="d-flex" href="index.html" title="Oxyy"><img src="https://app.posx.co/img/POSX_2.png" alt="" style="height: 32px;"></a> </div>
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

        <!-- Register Form
      ========================= -->
        <!-- Page 1 (Form Step 1) -->
        <div class="col-md-8" id="page1">
          <div class="d-flex flex-column align-items-center bg-dark" style="min-height: 100vh;">
            <div class="container my-auto py-5">
              <div class="row g-0">
                <div class="col-11 col-md-8 col-lg-7 col-xl-6 mx-auto">
                  <h3 class="text-white mb-4 text-center">สมัครใช้งาน</h3>
                  <form id="registerForm" class="form-dark" method="post">
                    <div class="mb-3">
                      <label class="form-label text-light" for="">Email</label>
                      <input type="text" class="form-control" name="email" required placeholder="Email">
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-light" for="RegisterPassword">รหัสผ่าน</label>
                      <input type="password" class="form-control" name="password" id="password" required placeholder="รหัสผ่าน">
                      <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-light" for="ConfirmPassword">ยืนยันรหัสผ่าน</label>
                      <input type="password" class="form-control" name="ConfirmPassword" id="ConfirmPassword" required placeholder="ยืนยันรหัสผ่าน">
                      <span toggle="#ConfirmPassword" class="fa fa-fw fa-eye eye-icon toggle-password tx-primary"></span>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                      <a class="btn btn-primary" style="width: 145px;" type="button" href="<?php echo base_url(); ?>index.php/">Login</a>
                      <button id="btn-next-page2" class="btn btn-primary" style="width: 145px;" type="button">Signup</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Page 2 (Form Step 2) -->
        <div class="col-md-8" id="page2">
          <div class="d-flex flex-column align-items-center bg-dark" style="min-height: 100vh;">
            <div class="container my-auto py-5">
              <div class="row">
                <div class="col-md-12 col-md-offset-2">
                  <h3 class="text-white mb-4 text-center">เงื่อนไข และข้อตกลงการใช้งาน</h3>
                  <!-- BEGIN Portlet PORTLET-->
                  <div class="portlet mx-5" style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-height: 500px; overflow-y: auto;">
                    <!-- <div class="portlet-title">
                      <div class="caption">
                        <h3>เงื่อนไข และข้อตกลงการใช้งาน</h3>
                      </div>
                    </div> -->
                    <div class="portlet-body">
                      <div id="term">
                        <h4>การสมัครใช้งาน / การใช้งาน</h4>
                        <ul>
                          <li>ห้ามคัดลอกเนื้อหา, ดัดแปลงแก้ไข หรือจำหน่ายเนื้อหาต่อบุคคลอื่น</li>
                          <li>ผู้ใช้งานต้องรับผิดชอบดูแล username และรหัสผ่านเพื่อความปลอดภัยของระบบ</li>
                          <li>ผู้ใช้งานยอมรับให้บริษัทฯ สามารถแก้ไขข้อมูลที่ส่งเข้าระบบได้</li>
                          <li>ห้ามเจาะระบบข้อมูล หรือเขียนรหัสที่เป็นภัยต่อระบบคอมพิวเตอร์</li>
                          <li>ไม่มีการรับประกันว่าระบบ EVX จะไม่มีการขาดช่วง, การหยุดซ่อมบำรุง, หรือข้อผิดพลาด</li>
                          <li>ไม่รับผิดชอบต่อการสูญหายของข้อมูลในทุกกรณี</li>
                          <li>สงวนสิทธิ์ในการลบบัญชีผู้ใช้งานที่ทำผิดกฎ หรือละเมิดสิทธิ์ทางปัญญา โดยไม่ต้องแจ้งล่วงหน้า</li>
                        </ul>
                        <h4>นโยบายความเป็นส่วนตัว</h4>
                        <ul>
                          <li>EVX มีการปรับปรุงเนื้อหาและพัฒนาระบบอย่างต่อเนื่อง โดยจะเก็บข้อมูล IP Address, เวลา, สถานที่ในการเข้าใช้งาน รวมถึงข้อมูลอื่นๆ</li>
                          <li>จะใช้ Cookie เพื่อเก็บและแลกเปลี่ยนข้อมูลเพื่อการใช้งาน EVX</li>
                          <li>ผู้ใช้งานยอมรับการแจ้งเตือนผ่านโทรศัพท์, อีเมล์, SMS หรือจดหมาย</li>
                          <li>หากมีการส่งข่าวสารถึงผู้ใช้งานผ่านช่องทางใดก็ตาม และไม่ได้รับการตอบกลับภายใน 5 วัน จะถือว่าผู้ใช้งานได้รับทราบและยอมรับข่าวสารนั้น</li>
                        </ul>
                        <h4>การซื้อแพ็คเกจ</h4>
                        <ul>
                          <li>ผู้ใช้งานใหม่จะได้รับการทดลองใช้งานฟรีตามจำนวนวันที่กำหนด ก่อนตัดสินใจใช้งานจริง โดยไม่สามารถขยายจำนวนวันได้</li>
                          <li>การชำระเงินต้องทำล่วงหน้า และเมื่อชำระเงินตามจำนวนที่ต้องการแล้ว จะเพิ่มวันใช้งานตามจำนวนเงินที่โอน โดยไม่สามารถเปลี่ยนแปลงได้จนกว่าจะหมดอายุ</li>
                          <li>ผู้ใช้งานที่เคยสมัครแล้วจะไม่ได้รับโปรโมชั่นใหม่ที่ออกมาหลังจากวันที่สมัคร</li>
                          <li>ผู้ใช้งานที่เคยสมัครแล้วไม่สามารถสมัครซ้ำหรือเปลี่ยนชื่อ username เพื่อรับการทดลองฟรีหรือโปรโมชั่นอื่นๆ ได้</li>
                        </ul>
                        <h4>การคืนเงิน / การเปลี่ยนแปลงบริการ</h4>
                        <ul>
                          <li>ไม่มีนโยบายคืนเงินสำหรับค่าแพ็คเกจที่ซื้อไปแล้ว</li>
                          <li>สงวนสิทธิ์ในการเปลี่ยนแปลงราคาโดยไม่ต้องแจ้งให้ทราบล่วงหน้า</li>
                          <li>ในกรณีเปลี่ยนแปลงค่าบริการ จะมีการแจ้งเตือนให้ผู้ใช้งาน (ลูกค้าเก่า) ทราบล่วงหน้า 30 วันทุกครั้ง และสำหรับผู้ใช้งานที่ซื้อแพ็คเกจระยะยาวจะไม่มีผลกระทบกับจำนวนวันที่ได้ซื้อก่อนหน้านี้</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <!-- END Portlet PORTLET-->
                  <!-- Checkbox and Button -->
                  <div class="mx-5" style="margin-top: 20px;">
                    <label>
                      <input type="checkbox" id="read-term">
                      <h5 style="display: inline; color: white;">ฉันได้อ่านข้อตกลงและยอมรับเงื่อนไขการใช้งาน</h5>
                    </label>
                  </div>
                  <div class="pull-right" style="margin-top: 20px; color: white">
                    <div class="d-flex justify-content-between my-4 mx-5">
                      <a class="btn btn-primary" id="btn-back-page1" style="width: 145px;" type="button">Back</a>
                      <button id="btn-next-page3" class="btn btn-primary" style="width: 145px;" type="button" disabled>Next</button>
                    </div>
                    <!-- <button id="btn-next-page3" class="btn btn-primary " type="button" disabled>Next</button> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Page 3 (Form Step 3) -->
        <div class="col-md-8" id="page3">
          <div class="d-flex flex-column align-items-center bg-dark" style="min-height: 100vh;">
            <div class="container my-auto py-5">
              <div class="row g-0">
                <div class="col-11 col-md-8 col-lg-7 col-xl-6 mx-auto">
                  <h3 class="text-white mb-4 text-center">เลือก Package</h3>
                  <form id="registerForm" class="form-dark" method="post">
                    <div class="mb-3">
                      <label class="form-label text-light" for="">ชื่อร้าน</label>
                      <input type="text" class="form-control" name="companies_name" required placeholder="ชื่อร้าน">
                    </div>
                    <div class="mb-3">
                      <label class="form-label text-light" for="">Package</label>
                      <select class="form-select" name="package" id="package">
                        <option value="">--- เลือก ---</option>
                        <option value="1">590/เดือน</option>
                        <option value="2">890/เดือน</option>
                        <option value="3">1390/เดือน</option>
                      </select>
                    </div>
                    <div class="d-flex justify-content-between my-4">
                      <a class="btn btn-primary" id="btn-back-page2" style="width: 145px;" type="button">Back</a>
                      <button id="btn-summit" class="btn btn-primary" style="width: 145px;" type="button">Signup</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const checkbox = document.getElementById('read-term');
      const button = document.getElementById('btn-next-page3');

      // Function to toggle button's disabled property
      function toggleButton() {
        // console.log('Checkbox checked:', checkbox.checked);
        button.disabled = !checkbox.checked;
      }
      // Add event listener for checkbox change
      checkbox.addEventListener('change', toggleButton);
      // Initial check
      toggleButton();
    });

    document.getElementById("btn-next-page2").addEventListener("click", function() {
      // เช็คข้อมูล

      if ($('input[name="email"]').val() == '') {
        alert('กรุณากรอก Email ใหม่')
        return false;
      } else if ($('input[name="password"]').val() == '') {
        alert('กรุณากรอกรหัสผ่าน')
        return false;
      } else if ($('input[name="ConfirmPassword"]').val() == '') {
        alert('กรุณากรอกยืนยันรหัสผ่าน')
        return false;
      } else if ($('input[name="password"]').val() != $('input[name="ConfirmPassword"]').val()) {
        alert('รหัสผ่านไม่ตรงกัน กรุณากรอกรหัสผ่านให้ตรงกัน')
        return false;
      }
      // ผ่าน
      else {
        var page1 = document.getElementById("page1");
        var page2 = document.getElementById("page2");

        // ซ่อน Page 1 อย่างนุ่มนวล
        page1.classList.add("hide");

        // รอ 0.5 วินาที (เวลาใน transition) ก่อนแสดง Page 2
        setTimeout(function() {
          page1.style.display = "none"; // ซ่อนอย่างสมบูรณ์
          page2.style.display = "block"; // แสดง Page 2
          page2.classList.remove("hide");
          page2.classList.add("show"); // เพิ่มการแสดงผลอย่างนุ่มนวล
        }, 0); // เท่ากับค่า transition: 0.5s
      }
    });

    document.getElementById("btn-next-page3").addEventListener("click", function() {
      var page2 = document.getElementById("page2");
      var page3 = document.getElementById("page3");

      // Hide Page 2
      page2.classList.add("hide");
      setTimeout(function() {
        page2.style.display = "none";
        page3.style.display = "block";
        page3.classList.remove("hide");
        page3.classList.add("show");
      }, 0); // Adjust this time to match your CSS transition
    });

    document.getElementById("btn-back-page2").addEventListener("click", function() {
      var page2 = document.getElementById("page2");
      var page3 = document.getElementById("page3");

      // Hide Page 2
      page3.classList.add("hide");
      setTimeout(function() {
        page3.style.display = "none";
        page2.style.display = "block";
        page2.classList.remove("hide");
        page2.classList.add("show");
      }, 0); // Adjust this time to match your CSS transition
    });

    document.getElementById("btn-back-page1").addEventListener("click", function() {
      var page1 = document.getElementById("page1");
      var page2 = document.getElementById("page2");

      // Hide Page 2
      page2.classList.add("hide");
      setTimeout(function() {
        page2.style.display = "none";
        page1.style.display = "block";
        page1.classList.remove("hide");
        page1.classList.add("show");
      }, 0); // Adjust this time to match your CSS transition
    });
  </script>

  <!-- Script -->
  <script src="https://harnishdesign.net/demo/html/oxyy/vendor/jquery/jquery.min.js"></script>
  <script src="https://harnishdesign.net/demo/html/oxyy/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Style Switcher -->
  <script src="https://harnishdesign.net/demo/html/oxyy/js/switcher.min.js"></script>
  <script src="https://harnishdesign.net/demo/html/oxyy/js/theme.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {

      $('#btn-summit').on('click', function(e) {
        e.preventDefault()
        // เช็คข้อมูล

        if ($('input[name="companies_name"]').val() == '') {
          alert('กรุณากรอก ชื่อร้าน')
          return false;
        } else if ($('select[name="package"]').val() == '') {
          alert('กรุณาเลือก Package')
          return false;
        }
        // ผ่าน
        else {
          const $btnLogin = $(this)

          $btnLogin.prop('disabled', true)

          let email = $('input[name="email"]').val()
          let password = $('input[name="password"]').val()
          let companies_name = $('input[name="companies_name"]').val()
          let package = $('select[name="package"]').val()

          let dataObj = {
            email,
            password,
            companies_name,
            package
          }
          // console.log(dataObj);
          $.ajax({
            type: 'POST',
            url: `${serverUrl}/user-register`,
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

                setTimeout(function() {
                  window.location = '/'
                }, 1 * 1500)

              } else {
                $btnLogin.prop('disabled', false)
              }
            },
            error: function(res) {

              $btnLogin.prop('disabled', false)

              Swal.fire({
                icon: 'error',
                title: 'ไม่สามารถสมัครสมาชิกได้',
                text: `${res.responseJSON.message}`,
                timer: '2000',
                heightAuto: false
              });

              setTimeout(function() {
                window.location = '/register'
              }, 1 * 1500)

            }
          })
        }
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