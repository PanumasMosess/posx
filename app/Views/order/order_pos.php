<style>
    #orderDashboardMenuViewSummary a,
    #orderDashboardMenuViewLive a {
        padding-left: 0px !important;
    }

    .custom_activity_table tbody tr:hover {
        background-color: rgb(255, 255, 153) !important;
    }
</style>
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <?php echo $this->include('/layouts/partials/_stockTab'); ?>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="tab-content" id="stockTabContent">

                            <div class="tab-pane fade" id="order-dashboard" role="tabpanel" aria-labelledby="order-dashboard-tab">
                                <?php echo $this->include('/layouts/partials/_orderTabDashboard'); ?>
                            </div>

                            <div class="tab-pane fade show active" id="area_table" role="tabpanel" aria-labelledby="Order-tab">
                                <div class="builder_select">
                                    <!-- <div class="board_wrapper">
                                        <div class="single_board">
                                            <div class="main_board_card"> -->
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <!-- <div class="white_card  mb_20">
                                                            <div class="white_card_body"> -->
                                            <div class="justify-content-end d-flex mb-2 mt-2">
                                                <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddArea();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มพื้นที่</a>
                                            </div>
                                            <div class="row">
                                                <div class="QA_section">
                                                    <div class="QA_table mb_30">
                                                        <table class="table lms_table_active3" id="areaTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>ชื่อพื้นที่</th>
                                                                    <th>Last Update</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- </div>
                                                        </div> -->
                                        </div>
                                    </div>
                                    <!-- </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="tab-pane fade" id="order" role="tabpanel" aria-labelledby="order-tab">
                                <div class="builder_select">
                                    <div class="board_wrapper">
                                        <div class="single_board">
                                            <div class="main_board_card">
                                                <div class="row">
                                                    <div class="col-xl-7 col-lg-7 col-md-12">
                                                        <div class="white_card mb_20">
                                                            <div class="white_card_header">
                                                                <div class="mt-2 mr-2">
                                                                    <div class="box_header m-1">
                                                                        <!-- <div class="common_select">
                                                                            <select class="nice_Select wide mb-10" style="display: none;" id="area_select">
                                                                                <option value="">เลือกพื้นที่</option>
                                                                            </select>
                                                                        </div> -->
                                                                        <div id='btn_area'></div>
                                                                        <div class="action_btns d-flex">
                                                                            <a href="#" class="action_btn" id='' onclick="drowTableLoad(this.id);" data-toggle="tooltip" data-placement="top" title="รีโหลด">
                                                                                <i class="ti-reload"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="white_card_body">
                                                                <div class="canva" id="canvaHolder">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-5 col-md-12">
                                                        <div class="white_card  mb_20">
                                                            <div class="white_card  mb_20">
                                                                <div class="white_card_header">
                                                                    <div id="order_select_detail">
                                                                        <div class="box_header m-0">
                                                                            <div class="main-title">
                                                                                <h3 class="m-0" id="table_header_name"></h3>
                                                                            </div>

                                                                        </div>
                                                                        <div class="bulder_tab_wrapper">
                                                                            <ul class="nav" id="callOrderTab" role="tablist">
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link active" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Info</a>
                                                                                </li>
                                                                                <li class="nav-item">
                                                                                    <a class="nav-link" id="price-tab" data-bs-toggle="tab" href="#price" role="tab" aria-controls="price" aria-selected="true">Price</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="white_card_body">
                                                                            <div class="tab-content" id="stockTabContent">
                                                                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                                                                    <div class="builder_select">
                                                                                        <div class="total-payment p-3 mt-3">
                                                                                            <h4 class="header-title">INFO ORDER</h4>
                                                                                            <table class="table">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="payment-title">โต๊ะ</td>
                                                                                                        <td>
                                                                                                            <p id="table_header_name_detail">XXX</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title">รายการ</td>
                                                                                                        <td>
                                                                                                            <p id="table_pcs">xxx รายการ</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title">เวลา</td>
                                                                                                        <td>
                                                                                                            <p id="time_table">xxx</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title">รวม</td>
                                                                                                        <td class="text-dark"><strong id="price_sum_table">0.00 บาท</strong></td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
                                                                                    <div class="builder_select">
                                                                                        <div class="total-payment p-3 mt-3">
                                                                                            <h4 class="header-title">Price</h4>
                                                                                            <table class="table">
                                                                                                <tbody>
                                                                                                    <tr>
                                                                                                        <td class="payment-title"><a href="#">SUB TOTAL</a></td>
                                                                                                        <td>
                                                                                                            <p id='sub_total_'>0.00</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title"><a href="javascript:void(0);" onclick="openModalServiceType();"> SERVICE</a></td>
                                                                                                        <td>
                                                                                                            <p id='service_total_'>0.00</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title"><a href="javascript:void(0);" onclick="openModaldiscountAllType();"> DISCOUNT ALL</a></td>
                                                                                                        <td>
                                                                                                            <p id='discount_total_'>0.00</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title"><a href="javascript:void(0);" onclick="openModalCardCharge();"> CARD CHARGE</a></td>
                                                                                                        <td>
                                                                                                            <p id='card_charge_total_'>0.00</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="payment-title"><a href="javascript:void(0);" onclick="openModalVat();"> VAT</a> </td>
                                                                                                        <td>
                                                                                                            <p id='vat_total_'>0.00</p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="devices_btn justify-content-start">
                                                                            <a class="btn btn-outline-primary mb-3" style="margin-right: 9px; line-height:1.3;" id="addOrderCusBtn" href="javascript:void(0);" onclick="openAddOrder_customer();"><i class="ti-plus"></i> Add</a>
                                                                            <a class="btn btn-outline-secondary mb-3" style="margin-right: 9px; line-height:1.3;" id="move_order_btn" href="javascript:void(0);" onclick="open_move_order_();"><i class="ti-new-window"></i> Move</a>
                                                                            <a class="btn btn-outline-secondary mb-3" style="margin-right: 9px; line-height:1.3;" id="discount_order_btn" href="javascript:void(0);" onclick="openModaldiscountAllType_();"><i class="fas fa-hryvnia"></i> Discount</a>
                                                                            <a class="btn btn-outline-secondary mb-3" style="margin-right: 9px; line-height:1.3;" id="split_order_btn" href="javascript:void(0);"><i class="ti-split-h"></i> SpitBill</a>
                                                                            <a class="btn btn-outline-danger mb-3" style="margin-right: 9px; line-height:1.3;" id="void_order_btn" href="javascript:void(0);" onclick="voidItem();"><i class="ti-trash"></i> Void Item</a>
                                                                        </div>
                                                                        <div class="QA_section">
                                                                            <div class="QA_table mb_30">
                                                                                <table class="table lms_table_active3" id="orderListInTable" cellspacing="0">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th>No.</th>
                                                                                            <th>รายการสินค้า</th>
                                                                                            <th>จำนวน</th>
                                                                                            <th>ราคา</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="devices_btn justify-content-start">
                                                                            <a class="btn btn-outline-primary mb-3" style="margin-right: 9px; line-height:1.3;" href="javascript:void(0);" onclick="printPreview();"><i class="ti-printer"></i> Print Preview</a>
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

                            <div class="tab-pane fade" id="order-togo" role="tabpanel" aria-labelledby="order-togo-tab">
                                <?php echo $this->include('/layouts/partials/_orderTabToGo'); ?>
                            </div>

                            <div class="tab-pane fade" id="order-delivery" role="tabpanel" aria-labelledby="order-delivery-tab">
                                <?php echo $this->include('/layouts/partials/_orderTabDelivery'); ?>
                            </div>

                            <div class="tab-pane fade" id="order-activity" role="tabpanel" aria-labelledby="order-activity-tab">
                                <?php echo $this->include('/layouts/partials/_orderTabActivity'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- Model Add Area -->
<div class="modal fade bd-add-area" tabindex="-1" role="dialog" aria-labelledby="areaModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModalAddArea();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class=" m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormArea">เพิ่มรายการพื้นที่</h3>
                            </div>
                        </div>
                    </div>
                    <form id="addArea" name="addArea" action="#" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="white_card_body">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class id="basic-addon1">ชื่อพื้นที่</span>
                                </div>
                                <input type="hidden" id="id_db_area" name="id_db_area" />
                                <input type="text" class="form-control" placeholder="area name" id="areaname" name="areaname" required />
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAddArea();" class="btn btn-outline-danger m-1">
                                    ยกเลิก
                                </button>
                                <button type="submit" id='save_area_btn' class="btn btn-outline-success m-1">
                                    ยืนยัน
                                </button>
                                <button type="button" id='update_area_btn' class="btn btn-outline-warning m-1" onclick="submitDataUpdateArea();">
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
                                        <select class="form-select" id="service_type" name="service_type" required="">
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
                                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_service" name="num_service" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="input-group mb-3  justify-content-end">
                                        <button type="button" onclick="closeModalService();" class="btn btn-outline-danger m-1">
                                            ยกเลิก
                                        </button>
                                        <button type="button" id='save_table_btn' onclick="addDervice();" class="btn btn-outline-success m-1">
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

<!-- Model Add DISCOUNT ALL -->
<div class="modal fade bd-add-discountAll" tabindex="-1" role="dialog" aria-labelledby="discountAll" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModaladddiscountAll_();">
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
                        <form id="adddiscountAll_" name="adddiscountAll_" action="#" method="POST" enctype="multipart/form-data" novalidate>
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
                                        <button type="button" onclick="closeModaladddiscountAll_();" class="btn btn-outline-danger m-1">
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
                                        <button type="button" id='save_table_btn' onclick="addDervice();" class="btn btn-outline-success m-1">
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
                                        <label class="input-group-text" for="service_type">ประเภท</label>
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="service_type" name="service_type" required="">
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
                                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_vat" name="num_vat" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="input-group mb-3  justify-content-end">
                                        <button type="button" onclick="closeModalVAT();" class="btn btn-outline-danger m-1">
                                            ยกเลิก
                                        </button>
                                        <button type="button" id='save_table_btn' onclick="addDervice();" class="btn btn-outline-success m-1">
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

<!-- Model mover table -->
<div class="modal fade bd-move-table" tabindex="-1" role="dialog" aria-labelledby="move_table_modal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="close_move_table();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class=" m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormMove">ย้ายโต๊ะ</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form id="move_table" name="move_table" action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="row col-12">
                                <div class="row col-12">
                                    <div class="input-group mb-3">
                                        <input type="hidden" id="old_code_table" />
                                        <label class="input-group-text" for="area_move">พื้นที่</label>
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="area_move" name="area_move" required="">
                                            <option value="">เลือกพื้นที่</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="table_move">โต๊ะ</label>
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="table_move" name="table_move" required="">
                                            <option value="">เลือกโต๊ะ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="input-group mb-3  justify-content-end">
                                        <button type="button" onclick="close_move_table();" class="btn btn-outline-danger m-1">
                                            ยกเลิก
                                        </button>
                                        <button type="submit" id='save_move_table' class="btn btn-outline-success m-1">
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

<!-- Model Split PCS -->
<div class="modal fade bd-split-pcs" tabindex="-1" role="dialog" aria-labelledby="split-pcs" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModalsplit();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class=" m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameFormSplitOrder">แยกรายการ Order ?</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form id="split-pcs" name="split-pcs" action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <div class="row col-12">
                                <div class="row col-12">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="num_split" name="num_split" placeholder="ใส่จำนวนที่ต้องการแยก" required>
                                            <div class="input-group-text">
                                                <div class="">จำนวน</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="input-group mb-3  justify-content-end">
                                        <button type="button" onclick="closeModalsplit();" class="btn btn-outline-danger m-1">
                                            ยกเลิก
                                        </button>
                                        <button type="submit"  class="btn btn-outline-success m-1">
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