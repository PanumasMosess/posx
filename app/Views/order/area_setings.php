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
    <div class="white_card_body ">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="white_card card_height_100 mb_30">
                <div class="white_card_header ">
                    <div class="justify-content-end d-flex">
                        <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddTable();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มโต๊ะ</a>&nbsp;&nbsp;
                        <a href="javascript:void(0);" class="white_btn3 mb-2 ml-2" onclick="saveFloor();"><i class="ti-plus"></i>&nbsp;&nbsp;Save พื้นที่</a>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="canva" id="canvaHolder">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-add-table" tabindex="-1" role="dialog" aria-labelledby="areaModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModalTable();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormTable">เพิ่มโต๊ะ</h3>
                                </div>
                            </div>
                        </div>
                        <form id="addTable" name="addArea" action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="white_card_body">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class id="basic-addon1">ชื่อโต๊ะ</span>
                                    </div>
                                    <input type="hidden" id="id_db_table" name="id_db_table" />
                                    <input type="text" class="form-control" placeholder="table name" id="table_name" name="table_name" required />
                                </div>
                                <div class="row g-12">
                                    <div class="col-6">
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <div class="">จำนวนที่นั่ง</div>
                                            </div>
                                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="table_size" name="table_size" placeholder="table size" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="table_round" name="table_round">
                                            <label class="form-label form-check-label" for="table_round">
                                                โต๊ะกลม
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto justify-content-end" style="display: flex;">
                                    <button type="button" onclick="closeModalTable();" class="btn btn-outline-danger m-1">
                                        ยกเลิก
                                    </button>
                                    <button type="button" id='save_table_btn' onclick="addTable();" class="btn btn-outline-success m-1">
                                        ยืนยัน
                                    </button>
                                    <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/popper1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/parsleyjs/parsley.min.js'); ?>"></script>

    <!-- <script src="<?php //echo base_url('js/custom.js'); 
                        ?>"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <?php if (isset($js_critical)) {
        echo $js_critical;
    }; ?>
</body>

</html>