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
                                            <option value="Stock" selected>สต็อก</option>
                                            <option value="Cancel">ยกเลิกสินค้า</option>
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

            <div class="row" id="stock-summary-component" style="display: inline-block;">

                <div class="col-md-12   col-lg-12  margin-top-20">



                    <div data-bind="component: &quot;stock-overview&quot;">


                        <div class="row">

                            <div class="col-md-3">


                                <form class="form-horizontal" role="form">
                                    <div class="form-body">

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">เลือกเริ่มวันที่</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input id="datepickerFrom-overview" type="text" class="form-control" placeholder="Date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label">ถึงวันที่</label>
                                            <div class="col-md-7">
                                                <div class="input-group">
                                                    <input id="datepickerTo-overview" type="text" class="form-control" placeholder="Date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>

                                                </div>
                                                <span class="help-block">
                                                    <span data-bind="text :  $data.lengthDate  ">1</span>
                                                    <span> Days </span>
                                                </span>
                                            </div>
                                        </div>






                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Select Group</label>
                                            <div class="col-md-7">
                                                <select class="form-control" data-bind="options: $data.groupList, value : $data.groupSelected">
                                                    <option value="All">All</option>
                                                    <option value="เครื่องดื่ม">เครื่องดื่ม</option>

                                                </select>
                                            </div>




                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label">Select View</label>
                                            <div class="col-md-7">

                                                <label style="margin-top: 5px">
                                                    <input type="radio" name="gender" value="male" checked=""> Table
                                                </label>






                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label"> </label>
                                            <div class="col-md-7">

                                                <i style="color: #000;" data-bind="visible: !$data.hideZero() " class="fa fa-square-o"></i>
                                                <i style="color: rgb(0, 0, 0); display: none;" data-bind="visible: $data.hideZero " class="fa fa-check-square-o"></i>
                                                <button style="color: #000; padding-left: 4px" data-bind="click: function () { hideZero() ? hideZero(false) : hideZero(true) }" type="button" class="btn btn-link">Only move items</button>


                                            </div>



                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label"> </label>
                                            <div class="col-md-7">

                                                <button id="random-submit-button-zxaw" data-bind="click: $data.submit" style="width: 150px" type="button" class="btn btn-default btn-primary">Submit </button>

                                            </div>



                                        </div>


                                        <div class="form-group" style="margin-top: 60px">
                                            <label class="col-md-5 control-label">Export</label>
                                            <div class="col-md-7">

                                                <button data-bind="click: $data.exportPdf" style="width: 150px" type="button" class="btn btn-default">A4 (PDF)</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-5 control-label"> </label>
                                            <div class="col-md-7">

                                                <button data-bind="click: $data.exportCSV" style="width: 150px" type="button" class="btn btn-default">CSV (Excel) </button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-5 control-label"> </label>
                                            <div class="col-md-7">

                                                <button data-bind="click: $data.exportThermalPaper" style="width: 150px" type="button" class="btn btn-default">Thermal Paper </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>



                            </div>



                            <div class="col-md-9" style="margin-top: -20px">

                                <p style="color: grey; text-align: right; margin-bottom: 30px">


                                    <span style="float: left">
                                        <span>Query from </span>
                                        <span data-bind="text: moment($data.queryDate()).format('DD-MM-YYYY')" class="label label-primary">22-11-2023</span>
                                        <span> to </span>
                                        <span data-bind="text: moment($data.queryDateEnd()).format('DD-MM-YYYY')" class="label label-primary">22-11-2023</span>

                                        <span data-bind="text:  $data.lengthDate() + ' days'" class="label label-warning">1 days</span>

                                    </span>
                                    <span style="float: right" data-bind="text: 'update at ' +  moment().format('HH:mm:ss DD-MM-YYYY') ">update at 15:27:49 22-11-2023</span>

                                </p>

                                <table id="table-stock-summary-a" class="table kill-bg table-striped table-advance table-hover job" data-bind="css: { 'table-condensed': $data.data().length >= 25 }">
                                    <thead>

                                        <tr>
                                            <th style="width: 3%">
                                                No.
                                            </th>
                                            <th colspan="2" style="width: 13%">
                                                <span style="margin-right: 20px">Group </span>

                                            </th>

                                            <th style="width: 20%">
                                                Items

                                            </th>
                                            <th>
                                                Begin
                                            </th>
                                            <th>
                                                Add
                                            </th>
                                            <th>
                                                Sold
                                            </th>
                                            <th>
                                                Adjust
                                            </th>

                                            <th>
                                                Withdraw
                                            </th>
                                            <th>
                                                Return
                                            </th>
                                            <th>
                                                Balance
                                            </th>

                                        </tr>

                                    </thead>
                                    <tbody data-bind="foreach: $data.data_sorted ">



                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">1.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Meridian(กลม)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">2</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">2</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">2.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Black Lable</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">3.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Sang Som(กลม)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">4</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">4</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">4.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Red Lable</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">0</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;">0</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">5.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Blend Signature(กลม)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">14</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">14</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">6.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Regency(แบน)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">3</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">3</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">7.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">อาซาฮี</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">29</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">29</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">8.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ลีโอ</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">72</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">72</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">9.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ช้าง</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">61</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">61</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">10.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">สิงค์</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">40</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">40</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">11.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ฮูการ์เด้นโรเซ่ (ขวดเล็ก)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">2</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">2</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">12.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ฮูการ์เด้นออริจินอล (ขวดเล็ก)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">6</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">6</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">13.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">สไปร์ท</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">24</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">24</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">14.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ช้าง cold brew</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">0</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;">0</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">15.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">โซดา</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">56</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">56</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">16.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">โค้ก</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">37</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">37</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">17.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">น้ำเปล่า</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">44</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">44</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">18.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ไฮเนเก้น</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">19.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">สปาร์คกิ้ง</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">20.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ไวน์ ขาว</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">21.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">เบนสปีริต</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">22.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">ไวน์ แดง</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">23.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">เฮสเนสซี่</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">24.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">โคโรน่า</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">7</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">7</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">25.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - สตอ</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">26.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - องุ่นม่วง</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">27.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - พีช</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">28.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - ยาคูล์</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">29.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - องุ่นเขียว</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">30.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - ส้ม</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;"></span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">31.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">COMBAE (โซจู) - ไผ่</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">2</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">2</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">32.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">สิงห์เลม่อน</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(กระป๋อง)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">0</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end" style="display: none;">0</span>
                                            </td>

                                        </tr>







                                        <tr>
                                            <td style="width: 3%; color: grey" data-bind="text: $index() + 1 + '.'">33.</td>
                                            <td style="width: 13%; color: grey">
                                                <span data-bind="text: $data.tags">เครื่องดื่ม</span>

                                                <span data-bind="visible: $data.tags &amp;&amp; $data.tags.length == 0 || !$data.tags " style="display: none;">
                                                    [Unknown]

                                                </span>

                                            </td>
                                            <td style="width: 20%; font-weight: bold">
                                                <span data-bind="text: $data.name">Baron (กลม)</span>
                                                <span style="margin-left: 10px" data-bind="text: '(' + $data.smallUnit + ')'">(ขวด)</span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.begin">6</span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.add"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.sold"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.adjustIn"></span>
                                                <span data-bind="visible: $data.adjustIn &amp;&amp; $data.adjustOut" style="display: none;"> / </span>
                                                <span data-bind="text: $data.adjustOut"></span>
                                            </td>

                                            <td>
                                                <span data-bind="text: $data.withdraw"></span>
                                            </td>
                                            <td>
                                                <span data-bind="text: $data.void"></span>
                                            </td>
                                            <td style="font-weight: bold">
                                                <span data-bind="text: $data.end || $data.sumLine, visible: $data.movement || $data.end">6</span>
                                            </td>

                                        </tr>



                                    </tbody>
                                </table>


                            </div>


                        </div>






                        <style>
                            .job tr {
                                width: 100%;
                                display: inline-table;
                                table-layout: fixed;
                            }

                            table.job {

                                display: -moz-groupbox;
                            }

                            .job tbody {
                                overflow-y: scroll;
                                overflow-x: hidden;
                                height: 500px;
                                width: 98%;
                                position: absolute;
                            }

                            table.job tbody td {
                                padding-left: 15px
                            }

                            .job tbody::-webkit-scrollbar {
                                width: 12px;
                            }

                            .job ::-webkit-scrollbar {
                                width: 25px;
                            }

                            .job ::-webkit-scrollbar-track {
                                background-color: rgba(100, 100, 100, .5);
                                background: #fff;
                                opacity: 0.9;
                            }

                            .job ::-webkit-scrollbar-thumb {
                                background-color: #818B99;
                                background: #818B99;
                                border: 3px solid transparent;
                                border-radius: 9px;
                                background-clip: content-box;
                            }


                            .parentTbl table {
                                border-spacing: 0;
                                border-collapse: collapse;
                                border: 0;

                            }

                            .childTbl table {
                                border-spacing: 0;
                                border-collapse: collapse;
                                border: 1px solid #d7d7d7;

                            }

                            .childTbl th,
                            .childTbl td {
                                border: 1px solid #d7d7d7;
                            }

                            .scrollData {

                                height: 150px;
                                overflow-x: hidden;
                            }
                        </style>



                    </div>


                </div>

            </div>
        </div>

    </div>
</div>