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

                                            <option value="Sales" selected>ยอดขาย</option>
                                            <option value="BillSales" disabled>บิลขาย</option>
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

            <div id="income-container" class="row" style="">
                <div class="col-md-12" style="margin-bottom: 25px;">
                    <div style="margin-left: 20px;"><label class="  control-label " style="margin-right: 15px; font-size: 16px;">View Mode</label>
                        <div class="btn-group">
                            <button type="button" data-title="Graph" class="btn btn-default"><i class="fa fa-bar-chart-o"></i> Graph</button>
                            <button type="button" data-title="Calendar" class="btn btn-default"><i class="fa fa-calendar"></i> Calendar</button>
                            <button type="button" data-title="Table" class="btn btn-default"><i class="fa fa-list-ol"></i> Table</button>
                        </div>
                        <button type="button" class="btn btn-link"><i class="fa fa-save"></i> Export To Excel </button>
                        <h4 data-bind="html: $data.displayText, style: { visibility: ($data.viewMode() == 'calendar' || $data.viewMode() == 'table') ? '' : 'hidden' } " style="display: inline; margin-bottom: 25px; margin-left: 25px;"></h4>
                    </div>
                </div>

                <div class="col-md-12">
                    <div id="container" class="graph" data-bind="visible: viewMode() == 'graph' " style="width: 100%; height: 400px; display: block;" data-highcharts-chart="0"></div>
                </div>

                <div class="col-md-12">
                    <div class="row xcalendar" style="display: none;">
                        <div class="col-md-9    col-lg-offset-1 col-lg-7">
                            <div id="container2" data-bind="visible: viewMode() == 'calendar' " style="display: block;" class="fc fc-ltr"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="sale-summary" data-bind="visible: viewMode() == 'calendar' ">
                                <button type="button" v-if="!viewAll" v-on:click="back" class="btn blue btn-block"><i class="fa fa-arrow-circle-o-left"></i> Show All </button>

                                <ul class="list-unstyled" v-if="list.length >0">

                                    <li class="section">
                                        <span v-if="!viewAll">{{selectedDate.Date}}</span>
                                        <span v-if="viewAll">{{displayRange}}</span>
                                    </li>
                                    <li>
                                        <span class="sale-info">
                                            <span>GrandTotal</span>
                                        </span>
                                        <span class="sale-num" style="font-weight: bold">
                                            <currency :amount="selectedDate.GrandTotal"></currency>
                                        </span>
                                    </li>
                                    <li class="section">
                                        <span>Summary</span>
                                    </li>
                                    <li>
                                        <span class="sale-info">
                                            <span>Bills</span>
                                        </span>
                                        <span class="sale-num"> {{selectedDate.Bills}}</span>
                                    </li>
                                    <li>
                                        <span class="sale-info">
                                            <span>Bill (avg.)</span>
                                        </span>
                                        <span class="sale-num">
                                            <currency :amount="selectedDate.GrandTotal/ selectedDate.Bills"></currency>
                                        </span>
                                    </li>

                                    <li class="section">
                                        <span>Payment Type</span>
                                    </li>


                                    <li v-for="($payment,  $key)  in selectedDate.PaymentList">
                                        <span class="sale-info">
                                            <span v-if="$payment.amount_free" style="margin-left: 10px"> Ent.</span>

                                            <span>{{$payment.name}}</span>
                                        </span>
                                        <span class="sale-num">

                                            <currency v-if="$payment.amount" :amount="$payment.amount"></currency>
                                            <currency v-if="$payment.amount_free" style="text-decoration: line-through" :amount="$payment.amount_free"></currency>

                                        </span>

                                    </li>

                                    <li class="section">
                                        <span>Detail</span>
                                    </li>

                                    <li v-if="selectedDate.SubTotal">
                                        <span class="sale-info">
                                            <span>Total</span>
                                        </span>
                                        <span class="sale-num">
                                            <currency :amount="selectedDate.SubTotal"></currency>
                                        </span>
                                    </li>

                                    <li v-if="selectedDate.ItemDiscount">
                                        <span class="sale-info">
                                            <span>Item Discount</span>
                                        </span>
                                        <span class="sale-num">
                                            <currency :amount="-selectedDate.ItemDiscount"></currency>
                                        </span>
                                    </li>

                                    <li v-if="selectedDate.Discount">
                                        <span class="sale-info">
                                            <span>Discount</span>
                                        </span>
                                        <span class="sale-num">
                                            <currency :amount="-selectedDate.Discount"></currency>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            
            <div id="vue-income-view2-summary" class="row" style="display:none;"></div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12  col-lg-12">
                    <div id="container3" class="xtable" data-bind="visible: viewMode() == 'table' " style="display: none;">
                        <div style="display: none;"><input> <input> <button>csv</button> <button>Excel</button></div>
                        <table v-if="all" id="vue-income-view3-summary" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div>All</div>
                                        Date
                                    </th>
                                    <th>
                                        <div>(<currency :amount="parseInt(all.GrandTotal / all.Bills)"> </currency>)</div>
                                        <div><span>{{all.Bills}}</span></div>
                                        Bills (Avg.)
                                    </th>
                                    <th style="color: blue; font-weight: bold">
                                        <div>
                                            <currency :amount="all.GrandTotal"> </currency>
                                        </div>
                                        GrandTotal
                                    </th>
                                    <th>
                                        <div v-for="($payment,  $key)  in all.PaymentList">
                                            <span v-if="$payment.amount_free" style="margin-left: 10px">Ent.</span>
                                            <span>{{$payment.name}}</span>
                                            <span> : </span>
                                            <currency v-if="$payment.amount" :amount="$payment.amount"></currency>
                                            <currency v-if="$payment.amount_free" style="text-decoration: line-through" :amount="$payment.amount_free"></currency>
                                            <span style="margin-left: 10px">({{$payment.bills}})</span>
                                        </div>
                                        Payment Type
                                    </th>
                                    <th>
                                        <div>
                                            <currency :amount="all.SubTotal"> </currency>
                                        </div>
                                        Total
                                    </th>
                                    <th v-if="all['Discount']">
                                        <div>
                                            <currency :amount="-all.Discount"> </currency>
                                        </div>
                                        Discount
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