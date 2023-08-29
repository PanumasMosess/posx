<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="bulder_tab_wrapper">
                            <ul class="nav" id="stockTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="area_table-tab" data-bs-toggle="tab" href="#area_table" role="tab" aria-controls="area_table" aria-selected="true">จัดพื้นที่ / เพิ่มโต๊ะ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="order-tab" data-bs-toggle="tab" href="#order" role="tab" aria-controls="order" aria-selected="true">ออเดอร์</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="Order-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="Order" aria-selected="true">..........</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="Order-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="Order" aria-selected="true">...........</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="tab-content" id="stockTabContent">
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
                                                        <div class="white_card  mb_20">
                                                            <div class="white_card_header">
                                                                <div class="justify-content-end d-flex mb-2 mt-2">
                                                                    <div class="box_header m-1">
                                                                        <div class="common_select">
                                                                            <select class="nice_Select wide mb-10" style="display: none;" id="area_select">
                                                                                <option value="">เลือกพื้นที่</option>
                                                                            </select>
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
                                                            <div class="white_card_body">
                                                                Area Order
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