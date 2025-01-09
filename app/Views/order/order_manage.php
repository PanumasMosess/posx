<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <ul class="nav" id="stockTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Order-tab" data-bs-toggle="tab" href="#Order" role="tab" aria-controls="Order" aria-selected="true">รายการสินค้า</a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link" id="formular-tab" data-bs-toggle="tab" href="#formular" role="tab" aria-controls="formular" aria-selected="false">สูตรตัดสต็อก</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sumary-tab" data-bs-toggle="tab" href="#sumary" role="tab" aria-controls="sumary" aria-selected="false">สรุป</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="tab-content" id="stockTabContent">
                            <div class="tab-pane fade show active" id="Order" role="tabpanel" aria-labelledby="Order-tab">
                                <div class="col-lg-12 col-xl-12 col-md-12">
                                    <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddOrder();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มราการสินค้า</a></div>
                                    <div class="QA_section">
                                        <div class="QA_table mb_30">
                                            <table class="table lms_table_active3" id="orderTable">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>สินค้า</th>
                                                        <th>หมวดหมู่สินค้า</th>
                                                        <th>ราคา (<?php echo getValueMoney()->symbolValueMoney; ?>)/ หน่วย</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Model Add Order -->
<div class="modal fade bd-add-order" tabindex="-1" role="dialog" aria-labelledby="orderModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <button type="button" class="close" aria-label="Close" onclick="closeModalAddOrder();">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="white_card_header">
                        <div class=" m-0">
                            <div class="justify-content-center" style="display:flex;">
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameForm">เพิ่มราการสินค้า</h3>
                            </div>
                        </div>
                    </div>
                    <form id="addOrder" name="addOrder" action="#" method="POST" enctype="multipart/form-data" novalidate>
                        <div class="white_card_body">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class id="basic-addon1">ชื่อสินค้า</span>
                                </div>
                                <input type="hidden" id="id_db_order" name="id_db_order" />
                                <input type="text" class="form-control" placeholder="order name" aria-label="order name" id="ordername" name="ordername" required />
                            </div>
                            <div class="row g-12">
                                <div class="col-2">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <span class id="basic-addon1">หมวดหมู่สินค้า</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="category_order" name="category_order" required>
                                            <option value="">category order</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ราคา</div>
                                        </div>
                                        <input type="text" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="price" nane="price" placeholder="price" required>
                                    </div>
                                </div>
                            </div>
                            <div class="g-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-text">
                                        <span class="">รายละเอียดสินค้า</span>
                                    </div>
                                    <textarea class="form-control" id="des_order" name="des_order" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="file_order" accept="image/jpeg, image/png" name="file_order" onchange="encodeImgtoBase64(this);" required />
                                    <label class="input-group-text" for="file_order">เลือกรูปภาพ</label>
                                    <input type="hidden" id="file_order_base64" name="file_order_base64" />
                                    <input type="hidden" id="file_old_name_order" name="file_old_name_order" />
                                </div>
                            </div>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="recommendedMenu" id="recommendedMenu">
                                    <label class="form-label form-check-label" for="recommendedMenu">
                                        เมนูแนะนำ
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAddOrder();" class="btn btn-outline-danger m-1">
                                    ยกเลิก
                                </button>
                                <button type="submit" id='save_order_btn_order' class="btn btn-outline-success m-1">
                                    ยืนยัน
                                </button>
                                <button type="button" id='update_oreder_btn' class="btn btn-outline-warning m-1" onclick="submitDataUpdateOrder();">
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