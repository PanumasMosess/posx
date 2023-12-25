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
                                    <div class="col-md-3">
                                        <select id="query-type" class="form-control">
                                            <option value="Sales">ยอดขาย</option>
                                            <option value="BillSales">บิลขาย</option>
                                            <option value="Product" selected>สินค้า</option>
                                            <option value="OrderTotal" disabled>ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="Expenses" disabled>รายจ่าย</option>
                                            <option value="Stock">สต็อก</option>
                                            <option value="Cancel">ยกเลิกสินค้า</option>
                                            <option value="Activity">Activity (ประวัติการใช้งาน POSX) </option>
                                            <!-- <option value="ProductPriceCorrectionReport" disabled>รายงานแก้ราคาสินค้า </option> -->
                                            <!-- <option value="OpenMenu" disabled>OpenMenu </option> -->
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <style>
                                            #reportrange {
                                                display: block;
                                                width: 100%;
                                                padding: 0.375rem 0.75rem;
                                                font-size: 1rem;
                                                font-weight: 400;
                                                line-height: 1.5;
                                                color: #212529;
                                                background-color: #fff;
                                                background-clip: padding-box;
                                                border: 1px solid #ced4da;
                                                -webkit-appearance: none;
                                                -moz-appearance: none;
                                                appearance: none;
                                                border-radius: 0.25rem;
                                                transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                                            }
                                        </style>
                                        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                            <i class="fa fa-calendar"></i>&nbsp;
                                            <span></span> <i class="fa fa-caret-down"></i>
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
                        <h4 class="card-title mb-0">Order Summary</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive shopping-cart">

                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Report</th>
                                        <th class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="60%">FROM</td>
                                        <td id="tdFROM" width="40%">FROM01-December-2023</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">TO</td>
                                        <td id="tdTO" width="40%">FROM01-December-2023</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">LENGTH (DAYS)</td>
                                        <td id="tdLENGTH" width="40%">31</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">GENERATED AT</td>
                                        <td id="tdGENERATED" width="40%">21-12-2023</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Summary</th>
                                        <th class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="60%">AMOUNT</td>
                                        <td id="tdAMOUNT" width="40%">0.00</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">QUANTITY</td>
                                        <td id="tdQUANTITY" width="40%">0.00</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Product Type Arrray</th>
                                        <th class="border-top-0"></th>
                                    </tr>
                                </thead>
                                <tbody id="ProductTypeArrray">
                                    <!-- <tr>
                                        <td width="60%">DRINK</td>
                                        <td width="40%">0.00</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">FOOD</td>
                                        <td width="40%">0.00</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">DELETEDMENU</td>
                                        <td width="40%">0.00</td>
                                    </tr>
                                    <tr>
                                        <td width="60%">OTHER</td>
                                        <td width="40%">0.00</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-8">
                <div class="white_card mb_30">
                    <div class="white_card_header">
                        <div class="btn-group wrapperFilter">
                            <a class="btn btn-outline-primary" data-title="Group">Group</a>
                            <a class="btn btn-outline-primary" data-title="Best Seller">Best Seller</a>
                            <a class="btn btn-outline-primary" data-title="Quantity">Quantity</a>
                        </div>

                    </div>
                    <div class="white_card_body" id="print-section">
                        <!-- Group -->
                        <div id="wrapperGroup" class="QA_section" style="display: none;">
                            <div class="QA_table mb_30">
                                <div data-bind="foreach: $data">
                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">โปรยกลัง ก่อน 3 ทุ่ม</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">13</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 10,587.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">8%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ช้างยกลัง 12 ขวด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">5</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">5</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 3,495.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 3,495.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 2.78%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">3%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ลีโอยกลัง 12 ขวด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 799.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 799.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.64%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">สิงห์ยกลัง 12 ขวด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">7</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">7</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 6,293.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 6,293.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 5.01%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">5%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">PROMOTION</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">333</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 61,941.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">49%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Meridian Set มิกเซอร์ 5 น้ำแข็ง 1 </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Meridian</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำเปล่า</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โซดา</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โค้ก</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">สไปรท์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำแข็ง</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ฟรี ข้าวเกรียบ</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">14</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">5</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,780.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,780.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.42%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Regency 350ml. Set มิกเซอร์ 5 นำแข็ง1 </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regency 350ml.</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำเปล่า</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โซดา</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โค้ก</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">สไปรท์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำแข็ง</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ฟรี ข้าวเกรียบ</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">70</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">11</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">9</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">27</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">17</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">5</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 8,690.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 8,690.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 6.92%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">7%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Blend Signature Set มิกเซอร์ 5 น้ำแข็ง 1 </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Blend Signature</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">น้ำเปล่า</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">โซดา</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โค้ก</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">สไปรท์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำแข็ง</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ฟรี ข้าวเกรียบ</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">7</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">5</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 619.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 619.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.49%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">SangSom Set มิกเซอร์ 5 น้ำแข็ง 1 </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">SangSom</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำเปล่า</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โซดา</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โค้ก</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">สไปรท์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำแข็ง</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ฟรี ข้าวเกรียบ</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">54</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">8</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">11</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">8</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">19</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">6</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 5,520.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 5,520.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 4.39%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">4%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ช้าง Set 3 ขวด </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">41</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">41</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 10,619.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 10,619.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 8.45%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">8%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์สิงห์ Set 3 ขวด</span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">71</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">71</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 21,229.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 21,229.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 16.89%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">17%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ลีโอ Set 3 ขวด </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;"></span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">26</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">26</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 7,254.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 7,254.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 5.77%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">6%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">HBD คอลแลปส์(4x6) FREE</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Blend 285 โปร ของขวัญ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ช้างโคบู 3 ขวด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ฟรีน้ำแข็ง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Baron Set มิกเซอร์ 5 น้ำแข็ง 1</span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Baron</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำเปล่า</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โซดา</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">โค้ก</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">สไปรท์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">น้ำแข็ง</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">48</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">7</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">16</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">14</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">5</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 6,230.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 6,230.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 4.96%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">5%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">BOTTOMS UP</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (Nutcha)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (CHARIN)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (NUT)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (PLUME)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (YUI)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (WAVE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (PIPO)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (CHA)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (DEAN)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (DUIDUI)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (BAS)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (ICE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (POM)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">14.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (BANK)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">15.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (NAT)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">16.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (POND)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">17.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (BOY)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">18.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (CHI)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">19.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (MINT)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">20.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (SENSE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">21.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (FANG)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">22.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (JUN)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">23.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (MAEK)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">24.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (CREAM)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">25.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (BANK)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">26.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (PURE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">27.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (KONG)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">28.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (POND POND)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">29.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (NINI)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">30.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (PICKUP)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">31.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (FORD)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">32.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (KAO)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">33.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (WAVE WAVE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">34.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (TONG)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">35.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP (TON)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ไวน์</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">19 CRIMES SHIRAZ </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">19 CRIMES RED BLEND </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">MOUTE </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BLUEM MOON SHIRAZ </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">1848 CLASSIC </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">TAGUA </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">PRASECCO GENESI PLATARA </span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BLUE MOON SAUVIGNON BLANC</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">MATUA SAUVIGNON BLANC</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">TARAPICA SAUVIGNON BLANC</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">MCWILLIAM'S PINOT GRIGIO</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">AURELIO VERDEJO</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">COSMOPOLITAN DIVA (ทุกรส)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">14.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ไวน์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">เหล้า</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">9</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 3,080.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">2%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Red Lable</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Black Lable</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Meridian</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 720.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 720.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.57%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Regency (350ml.)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 2,360.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 2,360.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.88%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">2%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Blend Signature</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Sang Som</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Hennessy</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">COMBAE (โซจู) </span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">พีช</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">สตอ</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">องุ่นเขียว</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">องุ่นม่วง</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">ไผ่</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ยาคูล์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ส้ม</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">Baron (กลม)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">มิกเซอร์</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">472</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 18,896.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">15%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้ำเปล่า</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">80</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">80</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 2,376.50</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 2,376.50</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.89%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">2%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โซดา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">62</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">62</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,500.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,500.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.19%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โซดาร็อค</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โค๊ก</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">92</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">92</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 2,985.50</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 2,985.50</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 2.38%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">2%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">สไปรส์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">37</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">37</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 490.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 490.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.39%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้ำแข็ง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">198</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">198</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 11,394.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 11,394.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 9.07%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">9%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">มะนาวเกลือ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 150.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 150.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.12%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">สิงห์เลม่อนโซดา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">เบียร์</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">37</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 3,690.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">3%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ช้าง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">15</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">15</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,350.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,350.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.07%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์สิงห์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">9</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">9</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 990.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 990.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.79%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ลีโอ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">10</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">10</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 900.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 900.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.72%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์อาซาฮี</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 450.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 450.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.36%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ไฮเนเก็น</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ฮูการ์เด้นออริจินอล (ขวดเล็ก)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ฮูการ์เด้นโรเซ่ (ขวดเล็ก)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โคโรน่า</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ASAHI TOWER (อาซาฮีทาวเวอร์)</span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ลาเวนเดอร์</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ซากุระ</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ป๊อปคอร์น</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ASAHI TOWER (ซากุระ)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ASAHI TOWER (ป๊อปคอร์น)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ช้าง (กระป๋อง)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โคบู</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ค็อกเทล</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Drink]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">43</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 14,359.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">11%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">The Sky (เดอะสกาย 24Shot)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,770.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,770.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.41%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ชิงช้าสวรรค์ (12Shot )</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">8</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">8</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 790.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 790.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.63%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">คอลแลปส์(4x6)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,800.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,800.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.43%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แสนสุขแทงค์ (เหล้าถัง)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">12</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">12</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 4,480.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 4,480.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 3.57%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">4%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โคตรคูล ( คูลอฟทาวเวอร์ )</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 490.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 490.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.39%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">มิตรทาวน์ (โซจูทาวเวอร์)</span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">สตอเบอรี่</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ลิ้นจี่</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">แอปเปิ้ล</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ส้ม</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 490.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 490.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.39%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เหล้าปั่นปักเบียร</span>
                                                        <div class="table-detail" style="" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">สตอเบอรี่</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ลิ้นจี่</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">แอปเปิ้ล</span>

                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">ส้ม</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>

                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>

                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">B52</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 760.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 760.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.6%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">B52 (Set 6 Shot)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">B52 (ABSINTHE)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 250.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 250.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.2%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">วอดก้า (SHOT)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 80.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 80.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.06%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โอซาก้าดรอป</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 500.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 500.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.4%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ซัมเมอร์ โมโม่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">14.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ลองไอแลนด์ปักแจ็คโคล่า</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">15.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">มาการิต้าบลู</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 250.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 250.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.2%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">16.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">JAKER BOOM (จาเกอร์ เบียร์บอม)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">17.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">FLAMING LAMBORGHINI (เฟรมมิ่งแรมโบกินี่)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">18.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">HBD คอลแลปส์(4x6) FREE</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">19.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">BOTTOMS UP</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">20.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">B52 set20 ช็อต</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,799.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,799.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 1.43%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">21.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">บลูมิกซ์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 900.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 900.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.72%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">22.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">the boots</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">23.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้องจู่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ทานเล่น</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">21</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,684.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ถั่วแระญีปุ่น</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 89.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 89.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.07%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เฟรนฟราย</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">9</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">9</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 623.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 623.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.5%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เม็ดมะม่วงหินมพานต์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 99.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 99.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.08%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เอ็นไก่ทอด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 198.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 198.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.16%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แหนมเอ็นไก่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 258.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 258.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.21%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">สามชั้นทอดน้ำปลา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 159.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 159.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.13%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">หมูแดดเดียว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ไก่คั่วเกลือ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 129.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 129.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.1%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวเกรียบทอด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ปีกไก่ทอดน้ำปลา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ไก่จ๋อห้าดาว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">คอหมูย่าง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 129.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 129.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.1%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ทาโร่ทอด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ปิ้งย่าง</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings"></tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ยำ-ต้ม</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">15</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,479.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำคอหมูย่าง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 129.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 129.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.1%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำหมูยอ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 387.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 387.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.31%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำวุ้นเส้นหมูสับ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 129.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 129.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.1%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ต้มยำ หมู-ไก่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">หมูสามชั้น ผัดพริกเกลือ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">หมูสามชั้น ทอดน้ำปลา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">กุ้งแช่น้ำปลา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">หมูมะนาว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 318.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 318.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.25%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำทะเล</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">10.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำรวมมิตร</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 159.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 159.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.13%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">11.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">หมูมะนาว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">12.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำปูอัดวาซาบิ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">13.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำเล็บมือนาง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">14.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำรวมมิตรทะเล</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 258.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 258.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.21%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">15.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ยำไข่ดาว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 99.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 99.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.08%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ข้าวจานเดียว</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">20</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,851.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวหมูกระเทียม</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 119.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 119.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.09%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวเปล่า</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 30.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 30.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.02%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ไข่ดาว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวไข่เจียวหมูสับ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 356.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 356.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.28%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวไข่ข้นปูอัด</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวผัดทะเล</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 129.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 129.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.1%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวผัดหมู</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 238.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 238.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.19%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวผัดไก่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">9.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวกะเพรา</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">11</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">11</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 979.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 979.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.78%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ค่าเปิด</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Other]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">7</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,100.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เปิดเหล้า (แบน)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 300.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 300.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.24%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เปิดเหล้า (กลม ขวด)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">3</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">3</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 600.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 600.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.48%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ค่าเปิดไวน์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 200.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 200.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.16%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ค่าเปิดแชมเปญ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">สิ่งของแตก</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Other]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">6</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,190.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แก้วแตก/ต่อใบ (แก้วช็อต)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 40.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 40.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.03%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แก้วแตก/ต่อใบ (แก้วเบียร์)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 50.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 50.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.04%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แก้วแตก/ต่อใบ (แก้วเหล้า)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">2</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">2</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 100.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 100.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.08%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">แก้วแตก/ต่อใบ (แก้วค้อกเทล)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ขวดแตก/ต่อใบ(ทุกประเภท)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ทำความสะอาด(อ๊วก)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">1</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">1</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 1,000.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 1,000.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.8%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">1%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">ส่วนลด(หุ้นส่วนร้าน)</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Other]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณนัท (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณโอม (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณเบิร์ด (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณฟิว (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณก้อง (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ส่วนลด คุณเปียว (อาหาร-มิกเซอร์ 20%)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">STOCK ครัว</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Other]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings"></tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">STOCK ค็อกเทล</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Other]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings"></tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">พิเศษพนักงาน</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">121</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 1,420.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">1%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ช้าง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 240.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 240.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.19%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์ลีโอ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">เบียร์สิงห์</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">6</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">6</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 480.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 480.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.38%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้ำเปล่า</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">97</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">97</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวไข่เจียวหมูสับ (เฉพาะพนักงาน)</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">4</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">4</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 200.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 200.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.16%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) ">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">6.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวหมูกระเทียม</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) ">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">10</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) ">10</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 500.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) "> 500.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0.4%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">7.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าวผัดหมู-ไก่</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">8.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">โปรเบีย 4 กระป๋อง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">รายรับอื่นๆ</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ตัดระบบบัญชี</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">เมนูใช้ทดสอบระบบ (ห้ามลบ) ป๊อปเพิ่มเอง</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ก๋วยเตี๋ยว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ผัดไท</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">3.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ข้าว</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">4.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้ำ</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">5.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">น้ำแข็ง</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table data-bind="visible: $data.Quantity != 0 || $data.Amount != 0" class="table table-striped table-condensed table-bordered nice-group" style="margin-bottom: 30px; display: none;">
                                        <thead style="color: black">
                                            <tr>
                                                <th style="width: 48%" colspan="2">
                                                    <span style="" data-bind="    text: $data.Name">อมยิ้ม</span>
                                                    <span style=" color: #aaa" data-bind="    text: ' [' + $data.Type + ']' "> [Food]</span>
                                                </th>
                                                <th style="width: 12%"> <span>จำนวน</span> <br> <span data-bind="text: Quantity">0</span></th>
                                                <th style="width: 20%"> <span>จำนวน</span> <br><span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span></th>
                                                <th style="width: 20%"> <span>เปอร์เซ็นต์</span><br><span data-bind="text: (Percent).toFixed(0) + '%'">0%</span></th>
                                            </tr>
                                        </thead>
                                        <tbody data-bind="foreach: $data.Items  || $data.Toppings">
                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">1.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">อมยิ้ม</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>

                                            <tr data-bind="visible: $root.hideZeroCompute($data) " style="display: none;">
                                                <td style="width: 3%"><span data-bind="text: $index() + 1 + '.'">2.</span></td>
                                                <td style="width: 45%">
                                                    <div>
                                                        <span data-bind="text: Name">ลูกอม</span>
                                                        <div class="table-detail" style="display: none;" data-bind="foreach: SubItems, visible: SubItems.length > 1">
                                                            <span data-bind="text: Name, visible: $root.hideZeroCompute($data) " style="display: none;">Regular</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 12%; text-align: right; padding-right: 7px">
                                                    <span data-bind="text: Quantity ">0</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: Quantity, visible: $root.hideZeroCompute($data) " style="display: none;">0</span>
                                                    </div>
                                                </td>
                                                <td class="b-data" style="width: 20%; text-align: right; padding-right: 15px">
                                                    <span data-bind="text: accounting.formatMoney(Amount)"> 0.00</span>
                                                    <div class="table-detail" data-bind="foreach: SubItems, visible: SubItems.length > 1" style="display: none;">
                                                        <span data-bind="text: accounting.formatMoney(Amount), visible: $root.hideZeroCompute($data) " style="display: none;"> 0.00</span>
                                                    </div>
                                                </td>
                                                <td style="width: 20%;">
                                                    <span class="barWidth" data-bind="style: { width: (Percent).toFixed(2) + '%' }" style="width: 0%;"></span>
                                                    &nbsp;<span class="percent" data-bind="text: (Percent).toFixed(0) + '%' ">0%</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Best Seller -->
                        <div id="wrapperBestSeller" class="QA_section" style="display: none;">
                            <div class="QA_table mb_30">
                                <table id="tblBestSeller" class="table table-striped QA_table">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th>Products</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>%</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div id="wrapperQuantity" class="QA_section" style="display: none;">
                            <div class="QA_table mb_30">
                                <table id="tblQuantity" class="table table-striped QA_table">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th>Products</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>%</th>
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