<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <ul class="nav" id="stockTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link lang active" id="Stock-tab" data-bs-toggle="tab" href="#Stock" role="tab" aria-controls="Stock" aria-selected="true" key='STOCK_TAB'>สต็อกสินค้า</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link lang" id="formular-tab" data-bs-toggle="tab" href="#formular" role="tab" aria-controls="formular" aria-selected="false" key='STOCK_FOMULAR_TAB'>สูตรตัดสต็อก</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link lang" id="sumary-tab" data-bs-toggle="tab" href="#sumary" role="tab" aria-controls="sumary" aria-selected="false" key='STOCK_SUMMARY_TAB'>สรุป</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="tab-content" id="stockTabContent">
                            <div class="tab-pane fade show active" id="Stock" role="tabpanel" aria-labelledby="Stock-tab">
                                <div class="col-lg-12 col-xl-12 col-md-12">
                                    <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalProduct();"><i class="ti-plus"></i>&nbsp;&nbsp;<font class="lang" key='BTN_ADD_STOCK'>เพิ่มรายการสต็อก</font></a></div>
                                    <div class="QA_section">
                                        <div class="QA_table mb_30">
                                            <table class="table lms_table_active3" id="stockTable">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>สินค้า</th>
                                                        <th>หน่วยสินค้า</th>
                                                        <th>จำนวน (Balance)</th>
                                                        <th>Minimum</th>
                                                        <th>ราคา (<?php echo getValueMoney()->symbolValueMoney; ?>) / หน่วย</th>
                                                        <th>Last Update</th>
                                                        <th>Transaction</th>
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
                            <div class="tab-pane fade" id="formular" role="tabpanel" aria-labelledby="formular-tab">
                                <div class="builder_select">
                                    <div class="board_wrapper">
                                        <div class="single_board">
                                            <div class="main_board_card">
                                                <div class="col-lg-12 col-xl-6 col-md-12">
                                                    <div class="white_card card_height_100 mb_10">
                                                        <div class="white_card_header">
                                                            <div class="box_header m-1">
                                                                <div class="col-12 row">
                                                                    <div class="col-4">
                                                                        <h4 class="m-2 lang" key="STOCK_FOMULAR_TAB">สูตรตัดสต็อก</h4>
                                                                    </div>
                                                                    <div class="col-8">
                                                                        <div class="common_select">
                                                                            <select class="nice_Select wide mb-10" style="display: none;" id="order_select">
                                                                                <option value="">เลือกสินค้า</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-7 col-lg-12 col-md-12">
                                                        <div class="white_card card_height_100 mb_20">
                                                            <div class="white_card_header">
                                                                <div class="box_header m-0">
                                                                    <div class="main-title">
                                                                        <h3 class="m-0 lang" key='SELECT_CUT_STOCK'>เลือกตัดสต็อก</h3>
                                                                    </div>
                                                                    <div class="header_more_tool">
                                                                        <!-- <div class="dropdown">
                                                                            <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                                                <i class="ti-more-alt"></i>
                                                                            </span>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-eye"></i> Action</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-trash"></i> Delete</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fas fa-edit"></i> Edit</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-printer"></i> Print</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fa fa-download"></i> Download</a>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="white_card_body QA_section">
                                                                <div class="QA_section">
                                                                    <div class="QA_table mb_30">
                                                                        <table class="table" id="table_fomular_item">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">#</th>
                                                                                    <th scope="col">ชื่อ</th>
                                                                                    <th scope="col">จำนวนที่เหลือ/หน่วย</th>
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
                                                    <div class="col-xl-5 col-lg-12 col-md-12">
                                                        <div class="white_card card_height_100 mb_30">
                                                            <div class="white_card_header">
                                                                <div class="box_header m-0">
                                                                    <div class="main-title">
                                                                        <h3 class="m-0 lang" key='STOCK_NEW_FORMULAR'>สูตรตัดสต็อกใหม่</h3>
                                                                    </div>
                                                                    <div class="header_more_tool">
                                                                        <div class="action_btns d-flex">
                                                                            <a href="#" class="action_btn" onclick="reloadFomularOrder();" data-toggle='tooltip' data-placement='top' title='รีโหลด'>
                                                                                <i class="ti-reload"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="white_card_body">
                                                                <div class="Activity_timeline">
                                                                    <div class="QA_section">
                                                                        <div class="QA_table mb_30">
                                                                            <font class="lang"  key='IF_SALE_PRODUCT_FORMULAR'>หากขายสินค้ารายการนี้</font>
                                                                            <table class="table lms_table_active" id="table_fomular_order">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">#</th>
                                                                                        <th scope="col">ชื่อสินค้า</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="QA_section">
                                                                        <div class="QA_table mb_30">
                                                                            <font class="lang" key="STOCK_CUT_CONFIRM_PRODUCT">จะตัดสต็อกดังนี้</font>
                                                                            <table class="table lms_table_active" id="table_fomular_stock_cut">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th scope="col">
                                                                                            #
                                                                                        </th>
                                                                                        <th scope="col">ชื่อ</th>
                                                                                        <th scope="col">จำนวน (PCS)</th>
                                                                                        <th scope="col"></th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-auto justify-content-end" style="display: flex;">
                                                                        <button type="button" onclick="cancleFormular();" class="btn btn-outline-danger rounded-pill m-1">
                                                                            <front class="lang" key='CANCEL'>ยกเลิก</front>
                                                                        </button>
                                                                        <button type="button" id="save_stock_btn" onclick="formularConfirm();" class="btn btn-outline-success rounded-pill m-1">
                                                                            <front class="lang" key='CONFIRM'>ยืนยัน</front>
                                                                        </button>
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
                            <div class="tab-pane fade" id="sumary" role="tabpanel" aria-labelledby="sumary-tab">
                                <div class="builder_select">
                                    <div class="board_wrapper">
                                        <div class="single_board">
                                            <div class="main_board_card">
                                                <div class="row">
                                                    <div class="col-xl-5 col-lg-12 col-md-12">
                                                        <div class="white_card card_height_100 mb_20">
                                                            <div class="white_card_header">
                                                                <div class="box_header m-0">
                                                                    <div class="main-title">
                                                                        <h3 class="m-0"><front class="lang" key="STOCK_SUMMARY_FORMULAR">สูตรการตัดสต็อก POS ขาย</front></h3>
                                                                    </div>
                                                                    <div class="header_more_tool">
                                                                        <!-- <div class="dropdown">
                                                                            <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                                                <i class="ti-more-alt"></i>
                                                                            </span>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-eye"></i> Action</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-trash"></i> Delete</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fas fa-edit"></i> Edit</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-printer"></i> Print</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fa fa-download"></i> Download</a>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="white_card_body QA_section">
                                                                <div class="QA_section">
                                                                    <div class="QA_table mb_30">
                                                                        <table class="table" id="table_fomular_data">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th scope="col">#</th>
                                                                                    <th scope="col">ชื่อ</th>
                                                                                    <th scope="col">รายการตัดสต็อก</th>
                                                                                    <th scope="col">Action</th>
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
                                                    <div class="col-xl-7 col-lg-12 col-md-12">
                                                        <div class="white_card card_height_100 mb_20">
                                                            <div class="white_card_header">
                                                                <div class="box_header m-0">
                                                                    <div class="main-title">
                                                                        <h3 class="m-0"><front class="lang" key='STOCK_SUMMARY_TRASECTION'>สต็อก Transection</front></h3>
                                                                    </div>
                                                                    <div class="header_more_tool">
                                                                        <!-- <div class="dropdown">
                                                                            <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                                                                <i class="ti-more-alt"></i>
                                                                            </span>
                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-eye"></i> Action</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-trash"></i> Delete</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fas fa-edit"></i> Edit</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="ti-printer"></i> Print</a>
                                                                                <a class="dropdown-item" href="#">
                                                                                    <i class="fa fa-download"></i> Download</a>
                                                                            </div>
                                                                        </div> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="white_card_body QA_section">
                                                                <div class="QA_section">
                                                                    <div class="QA_table mb_30">
                                                                        <table class="table lms_table_active3" id="stockTableTransectionSummary">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No.</th>
                                                                                    <th>รายการ</th>
                                                                                    <th>Begin</th>
                                                                                    <th>add</th>
                                                                                    <th>sold</th>
                                                                                    <th>adjust</th>
                                                                                    <th>WithDraw</th>
                                                                                    <th>Return</th>
                                                                                    <th>Balance</th>
                                                                                    <th>วันที</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Model Add Product -->
<div class="modal fade bd-add-product" tabindex="-1" role="dialog" aria-labelledby="productModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModalAddStock();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class=" m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0 lang" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameForm" key='STOCK_ADD_TITLE_MODEL'>เพิ่มสต็อก</h3>
                            </div>
                        </div>
                    </div>
                    <form id="addStock" name="addStock" action="#" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="white_card_body">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class id="basic-addon1">ชื่อสินค้า</span>
                                </div>
                                <input type="hidden" id="id_db" name="id_db" />
                                <input type="text" class="form-control" placeholder="product name" aria-label="product name" id="productname" name="productname" required />
                            </div>
                            <div class="row g-12">
                                <div class="col-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <span class id="basic-addon1">หน่วยสินค้า</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="unit" aria-label="category" id="category" name="category" required />
                                        <!-- <select class="form-select" id="category" name="category" required>
                                            <option value="">category</option>
                                        </select> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <span class id="basic-addon1">ผู้จัดหาสินค้า &nbsp; &nbsp; &nbsp; &nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="supplier" name="supplier" required>
                                            <option value="">supplier</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ราคา (<?php echo getValueMoney()->symbolValueMoney; ?>)</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="price" nane="price" placeholder="price" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">จำนวน</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;"  id="pcs" name="pcs" placeholder="pcs" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ค่า MAX</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="max" name="max" placeholder="MAX" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ค่า MIN</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="min" name="min" placeholder="MIN" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="file_product" accept="image/jpeg, image/png" name="file_product" onchange="encodeImgtoBase64(this);" />
                                    <input type="hidden" id="file_product_base64" name="file_product_base64" />
                                    <input type="hidden" id="file_oldname" name="file_oldname" />
                                </div>
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAddStock();" class="btn btn-outline-danger m-1">
                                    <span class="lang" key='CANCEL'>ยกเลิก</span>
                                </button>
                                <button type="submit" id='save_stock_btn_stock' class="btn btn-outline-success m-1">
                                    <span class="lang" key='CONFIRM'>ยืนยัน</span>
                                </button>
                                <button type="button" id='update_stock_btn' class="btn btn-outline-warning m-1" onclick="submitDataUpdate();">
                                    <span class="lang" key='CONFIRM'>ยืนยัน</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Adjust Product -->
<div class="modal fade bd-adjust-product" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModalAdjustStock();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class="m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0 lang" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameForm" key='STOCK_TITLE_ADJUST_STOCK'>เพิ่ม/ปรับสต็อก</h3>
                            </div>
                        </div>
                    </div>
                    <form id="adjustStock" name="adjustStock" action="#" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="white_card_body">
                            <div class="row g-12">
                                <div class="col-12">
                                    <div class="input-group mb-2">
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="select_adjust" name="select_adjust" required>
                                            <option value="">เลือกการปรับสต็อก</option>
                                            <option value="add">Add / รับสินค้า</option>
                                            <option value="adjustPlus">Adjust + / เพิ่มจำนวน</option>
                                            <option value="adjustMinus">Adjust - / ลดจำนวน</option>
                                            <option value="withdraw">Withdraw / จ่ายออก</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">
                                            <div class="lang" key='CURRENT-PCS-STOCK'>ปัจจุบัน</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="pcs_curent" name="pcs_curent" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">
                                            <div class="lang" key='ADJUST-PCS-STOCK'>จำนวนที่ต้องการ</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="pcs_adjust" name="pcs_adjust" placeholder="pcs" required>
                                        <input type="hidden" id="id_adjust" name="id_adjust" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAdjustStock();" class="btn btn-outline-danger m-1">
                                    <span class="lang" key='CANCEL'> ยกเลิก </span>
                                </button>
                                <button type="submit" id='save_adjust_btn' class="btn btn-outline-success m-1">
                                    <span class="lang" key='CONFIRM'> ยืนยัน </span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>