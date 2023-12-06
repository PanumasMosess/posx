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
        var companies_id = '<?php echo session()->get('companies_id'); ?>'
        var valueMoney = '<?php echo getValueMoney()->valueMoney; ?>'
        var symbolValueMoney = '<?php echo getValueMoney()->symbolValueMoney; ?>'
        var CDN_IMG = '<?php echo getenv('CDN_IMG'); ?>'
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
                                    <div class="white_box_tittle list_header">
                                        <h4 class="header-title" id="number_table_page_order">Number Table</h4>
                                        <div class="header_more_tool">
                                            <div class="action_btns d-flex">
                                                <a href="#" class="action_btn" onclick="cancleAllTable();" data-toggle="tooltip" data-placement="top" title="รีโหลด">
                                                    <i class="ti-reload"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="white_card_body">
                                    <div class="QA_section">
                                        <div class="QA_table mb_5">
                                            <table class="table lms_table_active3" id="orderListCustomerInTable">
                                                <thead>
                                                    <tr>
                                                        <th>จำนวน</th>
                                                        <th>รายการสินค้า</th>
                                                        <th>ราคา (<?php echo getValueMoney()->symbolValueMoney; ?>) /หน่วย</th>
                                                        <th>ราคารวม (<?php echo getValueMoney()->symbolValueMoney; ?>)</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="total-payment p-3 mb-2 mt-3">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="payment-title"><a href="#">SUB TOTAL</a></td>
                                                    <td><span id="sum_price">0.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title"><a href="javascript:void(0);" onclick="openModalServiceType();"> SERVICE</a></td>
                                                    <td>
                                                        <span id="service_price">---</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title"><a href="javascript:void(0);" onclick="openModaldiscountAllType();"> DISCOUNT ALL</a></td>
                                                    <td><span id="discount_price">---</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title"><a href="javascript:void(0);" onclick="openModalCardCharge();"> CARD CHARGE</a></td>
                                                    <td><span id="cardCharge_price">---</span></td>
                                                </tr>
                                                <tr>
                                                    <td class="payment-title"><a href="javascript:void(0);" onclick="openModalVat();"> VAT</a> </td>
                                                    <td><span id="vat_price">---</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="mb-2 mt-3">
                                        <div class="row">
                                            <div id="item_count">Item: 0</div>
                                            <div class="white_box_tittle list_header">
                                                <h4 class="header-title" id="price_last_order">Grand Total: 0.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <div class="row">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" checked="true" id="kitchen_check" name="kitchen_check">
                                                <label class="form-label form-check-label" for="kitchen_check">
                                                    ส่งครัว
                                                </label>
                                            </div>
                                            <a class="btn btn-outline-primary mb-3 ml-2" style="margin-right: 9px; line-height:1.3;" href="javascript:void(0);" onclick="orderConfirm();"><i class="ti-check"></i> เพิ่มรายการ<font id="table_text"></font></a>
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
                                    <div class="main_content_iner overly_inner">
                                        <div class="container-fluid p-0 ">
                                            <div class="QA_section">
                                                <div class="QA_table mb_5">
                                                    <div id="search" class="mb-3 float-end"></div>
                                                    <table class="table lms_table_active3" id="orderListCustomerCard">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>รายการสินค้า</th>
                                                                <th>หมวดหมู่</th>
                                                                <th>ราคา (<?php echo getValueMoney()->symbolValueMoney; ?>)</th>
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



    <!-- Model Add Service -->
    <div class="modal fade bd-add-service" tabindex="-1" role="dialog" aria-labelledby="serviceModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModalService();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormService">Service</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="addService" name="addService" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="service_type">ประเภท</label>
                                            <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                            <select class="form-select" id="service_type" name="service_type" required>
                                                <option value="">เลือกประเภท</option>
                                                <option style="color: #000;" value="percen">%</option>
                                                <option style="color: #000;" value="number">จำนวน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวน</div>
                                                </div>
                                                <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" step="0.25" onKeyPress="if(this.value.length==10) return false;" id="num_service" name="num_service" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModalService();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" id='save_table_btn' class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Add DISCOUNT ALL -->
    <div class="modal fade bd-add-discountAll" tabindex="-1" role="dialog" aria-labelledby="discountAll" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModaladddiscountAll();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormDiscountAll">ส่วนลดทั้งหมด</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="adddiscountAll" name="adddiscountAll" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="adddiscountAll_type">ประเภท</label>
                                            <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                            <select class="form-select" id="adddiscountAll_type" name="adddiscountAll_type" required="">
                                                <option value="">เลือกประเภท</option>
                                                <option style="color: #000;" value="percen">%</option>
                                                <option style="color: #000;" value="number">จำนวน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวน</div>
                                                </div>
                                                <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_adddiscountAll" name="num_adddiscountAll" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModaladddiscountAll();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Add DISCOUNT By Order -->
    <div class="modal fade bd-add-discountByOrder" tabindex="-1" role="dialog" aria-labelledby="discountByOrder" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModaladddiscountByOrder();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormDiscountAll">ส่วนลดต่อรายการ</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="adddiscountByOrder" name="adddiscountByOrder" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="adddiscountbyorder_type">ประเภท</label>
                                            <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                            <select class="form-select" id="adddiscountbyorder_type" name="adddiscountbyorder_type" required="">
                                                <option value="">เลือกประเภท</option>
                                                <option style="color: #000;" value="percen">%</option>
                                                <option style="color: #000;" value="number">จำนวน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวน</div>
                                                </div>
                                                <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_adddiscountbyorder" name="num_adddiscountbyorder" placeholder="" required>
                                                <input type="hidden" id="text_discount_order_hiden" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModaladddiscountByOrder();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Add CARD CHANGE -->
    <div class="modal fade bd-add-cardCharge" tabindex="-1" role="dialog" aria-labelledby="cardChargeModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModalcardCharge();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormCardCharge">Credit card charges (percent) ?</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="addcardCharge" name="addcardCharge" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-12">
                                        <div class="col-12">
                                            <div class="input-group mb-3">

                                                <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_cardCharge" name="num_cardCharge" placeholder="" required>
                                                <div class="input-group-text">
                                                    <div class="">%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModalcardCharge();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Add VAT -->
    <div class="modal fade bd-add-vat" tabindex="-1" role="dialog" aria-labelledby="vatModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModalVAT();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormVAT">VAT</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="addvat" name="addvat" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-6">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="vat_type">ประเภท</label>
                                            <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                            <select class="form-select" id="vat_type" name="vat_type" required>
                                                <option value="">เลือกประเภท</option>
                                                <option style="color: #000;" value="percen">%</option>
                                                <!-- <option style="color: #000;" value="number">จำนวน</option> -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row col-6">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวน</div>
                                                </div>
                                                <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_vat" name="num_vat" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModalVAT();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model Add COMMENT -->
    <div class="modal fade bd-add-comment" tabindex="-1" role="dialog" aria-labelledby="cardChargeModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content p-4">
                <div class="col-lg-12">
                    <div class="white_card card_height_100 mb_30">
                        <button type="button" class="close" aria-label="Close" onclick="closeModalcomment();">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="white_card_header">
                            <div class=" m-0">
                                <div class="justify-content-center" style="display:flex;">
                                    <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormCardCharge">รายละเอียดเพิ่มเติม</h3>
                                </div>
                            </div>
                        </div>
                        <div class="white_card_body">
                            <form id="addcomment" name="addcomment" action="#" method="POST" enctype="multipart/form-data" novalidate>
                                <div class="row col-12">
                                    <div class="row col-12">
                                        <div class="col-12">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="text_comment" name="text_comment" placeholder="add comment or toping" required>
                                                <input type="hidden" id="text_comment_hiden" name="text_comment_hiden">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-11">
                                        <div class="input-group mb-3  justify-content-end">
                                            <button type="button" onclick="closeModalcomment();" class="btn btn-outline-danger m-1">
                                                ยกเลิก
                                            </button>
                                            <button type="submit" class="btn btn-outline-success m-1">
                                                ยืนยัน
                                            </button>
                                            <!-- <button type="button" id='update_table_btn' class="btn btn-outline-warning m-1" onclick="submitupdateDetailTable();">
                                        ยืนยัน
                                    </button> -->
                                        </div>
                                    </div>
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

    <script src="<?php echo base_url('vendors/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('vendors/datatable/js/buttons.print.min.js'); ?>"></script>

    <!-- <script src="<?php //echo base_url('js/custom.js'); 
                        ?>"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <?php if (isset($js_critical)) {
        echo $js_critical;
    }; ?>
</body>

</html>