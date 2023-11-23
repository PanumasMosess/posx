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
                                            <option selected="" value="0">ยอดขาย</option>
                                            <option value="1">บิลขาย</option>
                                            <option value="2">สินค้า</option>
                                            <option value="11">ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="6">รายจ่าย</option>
                                            <option value="8">สต็อก</option>
                                            <option value="10">ยกเลิกสินค้า</option>
                                            <option value="12">Activity (ประวัติการใช้งาน POS) </option>
                                            <option value="13">รายงานแก้ราคาสินค้า </option>
                                            <option value="14">OpenMenu </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="vue-expense-container" class="row " style="display: block;">
                <div class="col-md-3">
                    <div class="sale-summary">
                        <ul class="list-unstyled">
                            <li class="section" style="font-size: 18px;"><span>Overview : </span> <span>
                                    <currency amount="0"></currency>
                                </span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                    <div>
                        Select Date
                        <select class="form-control input-large" style="display: inline-block;"></select> <button type="button" class="btn default purple-stripe"><i class="fa fa-save"></i> All Detail (Print / Export Excel) </button>
                    </div>
                    <table class="table table-bordered table-striped " style="margin-top: 20px;">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Group Name</th>
                                <th>Title</th>
                                <th>Amount</th>
                                <th>Note</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <td colspan="3" style="text-align: right; padding-right: 10px;">SUM</td>
                                <td><span style="font-weight: bold; color: blue;">
                                        <currency amount="0"></currency>
                                    </span></td>
                                <td></td>
                            </tr>
                        </tfoot>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>