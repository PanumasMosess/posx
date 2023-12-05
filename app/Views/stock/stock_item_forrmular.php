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
    <style type="text/css">
        div.scroll {
            width: 100%;
            overflow-x: auto;
        }
    </style>
    <script>
        var serverUrl = '<?php echo base_url(); ?>'
        var companies_id = '<?php echo session()->get('companies_id'); ?>'
        var valueMoney = '<?php echo getValueMoney()->valueMoney; ?>'
        var symbolValueMoney = '<?php echo getValueMoney()->symbolValueMoney; ?>'
    </script>
</head>

<body>
    <div class="white_card_body ">
        <div class="col-xl-4">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="main-title">
                                <h3 class="m-0"><?php echo $title; ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="QA_section">
                        <div class="QA_table mb_30">
                            <table class="table lms_table_active3" id="stock_table_item_formular">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ชื่อรายการ</th>
                                        <th>จำนวน/หน่วย</th>
                                        <th>Action</th>
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
</body>
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
<?php if (isset($js_critical)) {
    echo $js_critical;
}; ?>

</html>