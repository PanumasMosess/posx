<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <ul class="nav" id="stockTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Stock-tab" data-bs-toggle="tab" href="#Stock" role="tab" aria-controls="Stock" aria-selected="true">สต๊อกสินค้า</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="formular-tab" data-bs-toggle="tab" href="#formular" role="tab" aria-controls="formular" aria-selected="false">สูตรตัดสต๊อก</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sumary-tab" data-bs-toggle="tab" href="#sumary" role="tab" aria-controls="sumary" aria-selected="false">สรุป</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="tab-content" id="stockTabContent">
                            <div class="tab-pane fade show active" id="Stock" role="tabpanel" aria-labelledby="Stock-tab">
                                <div class=" justify-content-end d-flex"> <a href="javascript:void(0);" class="white_btn3 mb-2" onclick="openModalProduct();"><i class="ti-plus"></i>&nbsp;&nbsp;เพิ่มสินค้า</a></div>
                                <div class="QA_section">
                                    <div class="QA_table mb_30">
                                        <table class="table lms_table_active3">
                                            <thead>
                                                <tr>
                                                    <th scope="col">title</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Teacher</th>
                                                    <th scope="col">Lesson</th>
                                                    <th scope="col">Enrolled</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="formular" role="tabpanel" aria-labelledby="formular-tab">
                                <div class="builder_select">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="sumary" role="tabpanel" aria-labelledby="sumary-tab">
                                <div class="builder_select">

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
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">เพิ่มสต๊อก</h3>
                            </div>
                        </div>
                    </div>
                    <form id="addStock">
                        <div class="white_card_body">
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class id="basic-addon1">ชื่อสินค้า</span>
                                </div>
                                <input type="text" class="form-control" placeholder="product name" aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-text">
                                    <span class id="basic-addon1">จำนวน</span>
                                </div>
                                <input type="text" class="form-control" placeholder="pcs" aria-label="Username" aria-describedby="basic-addon1" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>