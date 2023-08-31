<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSX <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('img/mini_logo.png'); ?>" type="image/png" />

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap1.min.css'); ?>" />

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

    <?php if (isset($css_critical)) {
        echo $css_critical;
    } ?>
    <script>
        var serverUrl = '<?php echo base_url(); ?>'
    </script>
</head>

<body>
    <div class="builder_select">
        <div class="board_wrapper">
            <div class="single_board">
                <div class="main_board_card">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-12">
                            <div class="white_card  mb_20">
                                <div class="white_card_header">
                                    <h4 class="header-title" id="number_table_page_order">Number Table</h4>
                                </div>
                                <div class="white_card_body">
                                    <div class="QA_section">
                                        <div class="QA_table mb_5">
                                            <table class="table lms_table_active3" id="orderListCustomerInTable">
                                                <thead>
                                                    <tr>
                                                        <th>จำนวน</th>
                                                        <th>รายการสินค้า</th>
                                                        <th>ราคา</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="row">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="table_round" name="table_round">
                                                <label class="form-label form-check-label" for="table_round">
                                                    ส่งครัว
                                                </label>
                                            </div>
                                            <a class="btn btn-outline-primary mb-3 ml-2" style="margin-right: 9px; line-height:1.3;" href="#"><i class="ti-check"></i> เพิ่มรายการ<font id="table_text"></font></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="white_card  mb_20">
                                <div class="white_card_header">
                                    <div class="white_box_tittle list_header">
                                        <h4 class="header-title" id="title_list_order">รายการสินค้า</h4>
                                       
                                    </div>
                                </div>
                                <div class="white_card_body">
                                    <div class="main_content_iner overly_inner ">
                                        <div class="container-fluid p-0 ">
                                            <div class="QA_section">
                                                <div class="QA_table mb_5">
                                                    <table class="table lms_table_active3" id="orderListCustomerCard">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>รายการสินค้า</th>
                                                                <th>หมวดหมู่</th>
                                                                <th>ราคา</th>                     
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
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

    <script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/popper1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/parsleyjs/parsley.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.print.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/custom.js'); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <?php if (isset($js_critical)) {
        echo $js_critical;
    }; ?>
</body>

</html>