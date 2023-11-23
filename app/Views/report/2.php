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

            <div id="orderitem-report" class="col-md-12" style="display: block;">






                <div class="row">


                    <div class="col-md-3">


                        <div class="sale-summary">
                            <ul class="list-unstyled">


                                <li class="section">
                                    <span>Report</span>
                                </li>
                                <li>
                                    <span class="sale-info">
                                        <span>From</span>
                                    </span>
                                    <span class="sale-num" data-bind="text: from"></span>
                                </li>

                                <li>
                                    <span class="sale-info">
                                        <span>To</span>
                                    </span>
                                    <span class="sale-num" data-bind="text: to"></span>
                                </li>

                                <li>
                                    <span class="sale-info">
                                        <span>Length (Days)</span>
                                    </span>
                                    <span class="sale-num" data-bind="text: numOfDaysKo"></span>
                                </li>

                                <li>
                                    <span class="sale-info">
                                        <span>Generated at</span>
                                    </span>
                                    <span class="sale-num" style="font-size: 10px" data-bind="html: $data.reportAt"></span>
                                </li>




                                <li class="section">
                                    <span>Summary</span>
                                </li>

                                <li>
                                    <span class="sale-info">
                                        <span>Amount</span>
                                    </span>
                                    <span class="sale-num" style="font-weight: bold" data-bind="text: accounting.formatMoney(summaryAmount())   "> 0.00</span>
                                </li>

                                <li>
                                    <span class="sale-info">
                                        <span>Quantity</span>
                                    </span>
                                    <span class="sale-num" data-bind="text: summaryQty  "></span>
                                </li>


                                <li class="section">
                                    <span>Product Type Arrray </span>
                                </li>

                                <span data-bind="foreach : summaryProduct "></span>




                            </ul>


                            <p style="   font-size: 0.8em; font-style: italic;  color: grey; margin-top: 20px">*The price is not include service, discount-bill and VAT</p>

                        </div>



                    </div>



                    <div class="col-md-7 col-md-offset-1">



                        <div class="row" style="margin-bottom: 15px">

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="non-printable" style="float: right">


                                            <div class="btn-group">
                                                <button id="btnGroupVerticalDrop1" type="button" class=" btn default purple-stripe btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-print"></i> Export <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop1">
                                                    <li>
                                                        <a href="#" data-bind="click: $root.clickReportThermal"><i class="fa fa-print"></i> Print Thermal</a>
                                                    </li>

                                                    <li>
                                                        <a href="#" data-bind="click: $root.clickReportA4, loading: 10000, loadingText: 'loading' "><i class="fa fa-print"></i> Excel / PrintA4</a>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>

                                        <div class="btn-group">
                                            <button id="report-group-first" type="button" data-bind="click: function (item, evt) { clickMode('group', evt) } " class="btn btn-default">Group</button>
                                            <button type="button" data-bind="click: function (item, evt) { clickMode('amount', evt) } " class="btn btn-default">Best Seller</button>
                                            <button type="button" data-bind="click: function (item, evt) { clickMode('qty', evt) } " class="btn btn-default">Quantity</button>
                                        </div>

                                        <button class="btn btn-default" data-bind="click: clickShowZero  ">
                                            <i data-bind="    visible: $root.selectedShowZero" class="fa fa-check-square-o" style="display: none;"></i>
                                            <i style="" data-bind="    visible: !($root.selectedShowZero()) " class="fa fa-square-o"></i>
                                            Show Zero
                                        </button>

                                        <button class="btn btn-default" data-bind="click: clickShowSubItems ">
                                            <i data-bind="    visible: $root.selectedShowSubItems" class="fa fa-check-square-o"></i>
                                            <i style="display: none" data-bind="    visible: !($root.selectedShowSubItems())" class="fa fa-square-o"></i>
                                            Show Subitems
                                        </button>



                                    </div>

                                </div>


                            </div>
                        </div>

                        <div id="print-section">




                            <div data-bind="template: { name: templateReport, data: data_main }">

                                <div data-bind="foreach: $data"></div>



                                <style>
                                    table.nice-group {
                                        margin: 0px
                                    }

                                    table.nice-group thead tr th:first-child span {
                                        /*font-size: 26px;*/
                                        color: black;
                                    }

                                    table.nice-group tr td {}

                                    .b-data>span {
                                        display: block;
                                        text-align: left;
                                        font-weight: bold;
                                    }

                                    .table-detail {
                                        padding-left: 30px
                                    }

                                    .table-detail span {
                                        display: block;
                                    }

                                    table.nice-group tr td:nth-child(4) .table-detail span {}
                                </style>
                            </div>



                            <h3 data-bind="visible: data_topping() &amp;&amp; data_topping().length > 0 &amp;&amp; selectedMode() == 'group'  " style="display: none;">Topping</h3>
                            <div data-bind="visible: data_topping() &amp;&amp; data_topping().length > 0 &amp;&amp; selectedMode() == 'group', template: { name: 'orderitem-report-group-topping-template', data: data_topping }" style="display: none;">

                                <div data-bind="foreach: $data "></div>



                            </div>





                            <h3 data-bind="visible: data_deleted_menu().length > 0" style="display: none;">Deleted Menu</h3>
                            <div data-bind="visible: data_deleted_menu().length > 0, template: { name: 'orderitem-report-itemline-template', data: data_deleted_menu }" style="display: none;">
                                <table class="table table-striped table-condensed table-bordered" style=" width: 100%;margin-left:auto;margin-right:auto;font-size: 1em">
                                    <thead>
                                        <tr>
                                            <th id="no">No.</th>
                                            <th>Products</th>
                                            <th id="qty" style="text-align: right;min-width : 5%; max-width: 10%">Qty</th>

                                            <th style="text-align: right;padding-right: 15px;min-width : 15%; max-width: 20%">Total</th>
                                            <th>% </th>
                                        </tr>
                                    </thead>
                                    <tbody data-bind="foreach: $data"></tbody>
                                </table>

                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>