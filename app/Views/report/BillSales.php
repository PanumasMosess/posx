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
                                            <option value="BillSales" selected>บิลขาย</option>
                                            <option value="Product" disabled>สินค้า</option>
                                            <option value="OrderTotal" disabled>ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="Expenses" disabled>รายจ่าย</option>
                                            <option value="Stock" disabled>สต็อก</option>
                                            <option value="Cancel" disabled>ยกเลิกสินค้า</option>
                                            <option value="Activity" disabled>Activity (ประวัติการใช้งาน POS) </option>
                                            <option value="ProductPriceCorrectionReport" disabled>รายงานแก้ราคาสินค้า </option>
                                            <option value="OpenMenu" disabled>OpenMenu </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-2">
                                            <div class="input-group-text">
                                                <div class=""><i class="fa fa-calendar"></i></div>
                                            </div>
                                            <input type="text" class="form-control" id="datepickerFrom" placeholder="เลือกวัน">
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



        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="white_card">
                    <div class="white_card_header border_bottom_1px">
                        <h4 class="card-title mb-0">Summary All</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive shopping-cart">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">TOTAL</th>
                                        <th id="thTotalSum" class="border-top-0">4,555.00</th>
                                    </tr>
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">ITEM DISCOUNT</th>
                                        <th id="thDiscountSum" class="border-top-0">0.00</th>
                                    </tr>
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">SERVICE</th>
                                        <th id="thServiceSum" class="border-top-0">0.00</th>
                                    </tr>
                                    <!-- <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">ADDITONAL DISCOUNT</th>
                                        <th id="thTotalSum" class="border-top-0">0.00</th>
                                    </tr> -->
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">CREDITCARD CHARGE</th>
                                        <th id="thCreditChargeSum" class="border-top-0">0.00</th>
                                    </tr>
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">VAT</th>
                                        <th id="thVatSum" class="border-top-0">0.00</th>
                                    </tr>
                                    <tr>
                                        <th id="thTotalTitleSum" class="border-top-0">GRAND TOTAL</th>
                                        <th id="thGrandTotalSum" class="border-top-0">0.00</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-8 ">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">by Type</div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <!-- Cash :499.00
                                    โอน (เข้าบัญชีร้าน) :4,056.00
                                    Entertain / OnTheHouse
                                    ตัดสต็อก 0.00 -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">by Shift</div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <!-- Shift 1 :4,555.00 -->
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                    <div class="thumb">by Casiher</div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <!-- เจส :4,555.00 -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-lg-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Detail</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="QA_section">
                            <div class="QA_table mb_30">

                                <table id="tblDetail" class="table table-striped QA_table">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th>OrderId</th>
                                            <th>Date</th>
                                            <th>Table</th>
                                            <th>Type</th>
                                            <th>Shift</th>
                                            <th>Cashier</th>
                                            <th>GrandTotal</th>
                                            <th>Remark</th>
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