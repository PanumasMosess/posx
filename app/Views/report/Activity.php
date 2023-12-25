<div class="main_content_iner overly_inner ">
    <div class="container-fluid p-0 ">

        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">เลือกชนิดรายงาน (New feature : สามารถ export รายจ่ายทั้งเดือนเป็นไฟล์ excel แยกตามกลุ่มและวันที่)</h3>
                        <!-- <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Analytic</li>
                        </ol> -->
                    </div>
                    <div class="page_title_right">
                        <!-- <div class="page_date_button d-flex align-items-center">
                            <img src="img/icon/calender_icon.svg" alt="">
                            August 1, 2020 - August 31, 2020
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row ">

            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <!-- <h3 class="m-0">Form row</h3> -->
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <div class=" col-md-4">
                                        <select id="query-type" class="form-control">
                                            <option value="Sales">ยอดขาย</option>
                                            <option value="BillSales">บิลขาย</option>
                                            <option value="Product">สินค้า</option>
                                            <option value="OrderTotal" disabled>ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="Expenses" disabled>รายจ่าย</option>
                                            <option value="Stock">สต็อก</option>
                                            <option value="Cancel">ยกเลิกสินค้า</option>
                                            <option value="Activity" selected>Activity (ประวัติการใช้งาน POSX) </option>
                                            <!-- <option value="ProductPriceCorrectionReport" disabled>รายงานแก้ราคาสินค้า </option> -->
                                            <!-- <option value="OpenMenu" disabled>OpenMenu </option> -->
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <div class="input-group-text">
                                                <div class=""><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="datepickerFrom" placeholder="* เลือกวัน">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-primary" id="btnSearch"><img src="http://localhost:8080/img/icon/icon_search.svg" alt=""> ค้นหา</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="white_card mb_30">
                        <div class="white_card_header">
                            <h3 data-bind="visible: displayData" style="">
                                <span>ประวัติการใช้งาน</span> <span id="displayDateQuery"></span><br>
                            </h3>
                        </div>
                        <div class="white_card_body" id="print-section">
                            <div id="wrapperQuantity" class="QA_section">
                                <div class="QA_table mb_30">
                                    <table id="tblActivity" class="table table-striped QA_table">
                                        <thead>
                                            <tr role="row">
                                                <th>Time</th>
                                                <th>Table</th>
                                                <th>Action</th>
                                                <th>Message</th>
                                                <th>Value</th>
                                                <th>By</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
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