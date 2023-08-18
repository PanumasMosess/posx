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
                                    <div class="justify-content-end d-flex mb-2"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalAddOrder();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มสินค้า</a></div>
                                    <div class="QA_section">
                                        <div class="QA_table mb_30">
                                            <table class="table lms_table_active3" id="orderTable">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>สินค้า</th>
                                                        <th>หมวดหมู่สินค้า</th>                                                        
                                                        <th>ราคา / หน่วย</th>                                                     
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
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameForm">เพิ่มสต็อก</h3>
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
                                            <span class id="basic-addon1">หมวดหมู่สินค้า</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <div class="input-group mb-3">
                                        <!-- <input type="text" class="form-control" placeholder="category" aria-label="category" id="category" name="category" required /> -->
                                        <select class="form-select" id="category" name="category" required>
                                            <option value="">category</option>
                                        </select>
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
                                            <div class="">ราคา</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="price" nane="price" placeholder="price" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">จำนวน</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="pcs" name="pcs" placeholder="pcs" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ค่า MAX</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="max" name="max" placeholder="MAX" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-text">
                                            <div class="">ค่า MIN</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="min" name="min" placeholder="MIN" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="file_product" accept="image/jpeg, image/png" name="file_product" onchange="encodeImgtoBase64(this);" required />
                                    <input type="hidden" id="file_product_base64" name="file_product_base64" />
                                    <input type="hidden" id="file_oldname" name="file_oldname" />
                                </div>
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAddStock();" class="btn btn-outline-danger m-1">
                                    ยกเลิก
                                </button>
                                <button type="submit" id='save_stock_btn_stock' class="btn btn-outline-success m-1">
                                    ยืนยัน
                                </button>
                                <button type="button" id='update_stock_btn' class="btn btn-outline-warning m-1" onclick="submitDataUpdate();">
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
                                <h3 class="m-0" style="font-family: mulish,sans-serif; font-weight: 700; font-size: 19px; color: #474d58;" id="nameForm">เพิ่ม/ปรับสต็อก</h3>
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
                                            <div class="">ปัจจุบัน</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="pcs_curent" name="pcs_curent" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-2">
                                        <div class="input-group-text">
                                            <div class="">จำนวนที่ต้องการ</div>
                                        </div>
                                        <input type="number" class="form-control" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" id="pcs_adjust" name="pcs_adjust" placeholder="pcs" required>
                                        <input type="hidden" id="id_adjust" name="id_adjust" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto justify-content-end" style="display: flex;">
                                <button type="button" onclick="closeModalAdjustStock();" class="btn btn-outline-danger m-1">
                                    ยกเลิก
                                </button>
                                <button type="submit" id='save_adjust_btn' class="btn btn-outline-success m-1">
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