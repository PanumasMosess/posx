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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>