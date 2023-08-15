<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap1.min.css'); ?>" />

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('img/mini_logo.png'); ?>" type="image/png" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/themefy_icon/themify-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/niceselect/css/nice-select.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/owl_carousel/css/owl.carousel.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/gijgo/gijgo.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/font_awesome/css/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/tagsinput/tagsinput.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/datepicker/date-picker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/vectormap-home/vectormap-2.0.2.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/scroll/scrollable.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/jquery.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/responsive.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/buttons.dataTables.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/text_editor/summernote-bs4.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/morris/morris.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/material_icon/material-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/metisMenu.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/style1.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/colors/default.css'); ?>" id="colorSkinCSS" />
    <!-- iziToast css -->
    <link href="<?php echo base_url('css/izitoast/iziToast.min.css'); ?>" rel="stylesheet">
    <!-- Plugins css -->
    <link href="<?php echo base_url('/css/plugins.css'); ?>" rel="stylesheet">
    <style>
        /** BASE **/
        * {
            font-family: 'Kanit', sans-serif;
        }

        .bg-svg::before {
            content: "";
            position: absolute;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100%;
            height: 100%;
            opacity: 0.35;
        }

        .field-icon {
            float: right;
            margin-right: 5px;
            margin-top: -53px;
            position: relative;
            z-index: 2;
        }

        .container {
            padding-top: 130px;
            margin: auto;
        }
    </style>
    <script>
        var serverUrl = '<?php echo base_url(); ?>'
    </script>
</head>

<body class="crm_body_bg">

    <div class="bg-svg">
        <div class="page">
            <div class="z-index-10">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 mx-auto my-auto py-4 justify-content-center">
                            <!-- <div class="mb_10"> -->
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="white_box">
                                        <div class="modal-content cs_modal">
                                            <div class="modal-header justify-content-center theme_bg_1">
                                                <h5 class="modal-title text_white">Log in</h5>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="ยูสเซอร์เนม" type="text" name="username" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="*********" type="password" name="password" id="password" required>
                                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password tx-primary"></span>
                                                    </div>
                                                    <button id="btn-login" class="btn_1 full_width text-center" style="font-size: 15px;">เข้าสู่ระบบ</button>
                                                    <!-- <p>Need an account? <a data-toggle="modal" data-target="#sing_up" data-dismiss="modal" href="#"> Sign Up</a></p> -->
                                                    <!-- <div class="text-center">
                                                    <a href="#" data-toggle="modal" data-target="#forgot_password" data-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                                </div> -->
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div> -->


    <script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/popper1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/metisMenu.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/count_up/jquery.waypoints.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/chartlist/Chart.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/count_up/jquery.counterup.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/niceselect/js/jquery.nice-select.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/owl_carousel/js/owl.carousel.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.print.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/datepicker/datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datepicker/datepicker.en.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datepicker/datepicker.custom.js'); ?>"></script>
    <script src="<?php echo base_url('js/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chartjs/roundedBar.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/progressbar/jquery.barfiller.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/tagsinput/tagsinput.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/text_editor/summernote-bs4.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/am_chart/amcharts.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/scroll/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/scroll/scrollable-custom.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/vectormap-home/vectormap-2.0.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/vectormap-home/vectormap-world-mill-en.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/apex_chart/apex-chart2.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/apex_chart/apex_dashboard.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/chart_am/core.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chart_am/charts.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chart_am/animated.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chart_am/kelly.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/chart_am/chart-custom.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/parsleyjs/parsley.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/dashboard_init.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.js'); ?>"></script>

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