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

                                            <!-- <option value="0">ยอดขาย</option>
                                            <option value="1">บิลขาย</option>
                                            <option value="2">สินค้า</option>
                                            <option value="11">ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="6">รายจ่าย</option>
                                            <option value="8">สต็อก</option>
                                            <option value="10">ยกเลิกสินค้า</option>
                                            <option value="12">Activity (ประวัติการใช้งาน POS) </option>
                                            <option value="13">รายงานแก้ราคาสินค้า </option>
                                            <option value="14">OpenMenu </option> -->

                                            <option value="Sales">ยอดขาย</option>
                                            <option value="BillSales">บิลขาย</option>
                                            <option value="Product">สินค้า</option>
                                            <option value="OrderTotal">ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="Expenses">รายจ่าย</option>
                                            <option value="Stock">สต็อก</option>
                                            <option value="Cancel" selected>ยกเลิกสินค้า</option>
                                            <option value="Activity">Activity (ประวัติการใช้งาน POS) </option>
                                            <option value="ProductPriceCorrectionReport">รายงานแก้ราคาสินค้า </option>
                                            <option value="OpenMenu">OpenMenu </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="vue-report-activity-container" class="row " style="display: block;">
                <div class="col-md-12">
                    <div class="portlet solid bordered light-grey">
                        <div class="portlet-title">
                            <div class="caption">
                                <p style="vertical-align: top; margin-top: 10px; margin-left: 12px; display: inline-block;">Activity : Pick Date</p>
                                <div style="margin-left: 18px; width: 220px; display: inline-block;">
                                    <div class="input-group"><input id="report-activity-datepicker" type="text" placeholder="Date" class="form-control"> <span class="input-group-addon"><i class="fa fa-calendar"></i></span></div>
                                </div> <button class="report-activity-buttom btn btn-primary">Submit</button>
                                <div style="margin-left: 18px; width: 220px; display: inline-block;">
                                    <div class="input-group"><span class="input-group-addon"><i class="fa fa-search"></i></span> <input type="text" placeholder="Fitler table EX: T4" class="form-control"></div>
                                </div>
                            </div>
                            <div class="tools"><button class="report-activity-buttom">&lt;&lt; Previous</button>
                                <p style="vertical-align: top; font-size: 1.4em; margin-top: 3px; margin-left: 12px; margin-right: 12px; display: inline-block;">
                                    0
                                </p> <button class="report-activity-buttom">Next &gt;&gt;</button>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                Time
                                            </th>
                                            <th>
                                                Table
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            <th>
                                                Message
                                            </th>
                                            <th>
                                                Value
                                            </th>
                                            <th>
                                                By
                                            </th>
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