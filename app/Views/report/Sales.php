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

                                            <option value="Sales" selected>ยอดขาย</option>
                                            <option value="BillSales">บิลขาย</option>
                                            <option value="Product">สินค้า</option>
                                            <option value="OrderTotal">ยอดสั่ง ตามช่วงเวลา</option>
                                            <option value="Expenses">รายจ่าย</option>
                                            <option value="Stock">สต็อก</option>
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

            <div id="income-container" class="row" style="display: block;">
                <div class="col-md-12" style="margin-bottom: 25px;">
                    <div style="margin-left: 20px;"><label class="  control-label " style="margin-right: 15px; font-size: 16px;">View Mode</label>
                        <div class="btn-group"><button type="button" data-bind="click: function (item, evt) { $root.changeMode('graph') } " class="btn btn-default"><i class="fa  fa-bar-chart-o"></i> Graph</button> <button type="button" data-bind="click: function (item, evt) { $root.changeMode('calendar') } " class="btn btn-default"><i class="fa  fa-calendar"></i> Calendar</button> <button type="button" data-bind="click: function (item, evt) { $root.changeMode('table') } " class="btn btn-default active"><i class="fa   fa-list-ol"></i> Table</button></div> <button type="button" class="btn btn-link"><i class="fa fa-save"></i> Export To Excel </button>
                        <h4 data-bind="html: $data.displayText, style: { visibility: ($data.viewMode() == 'calendar' || $data.viewMode() == 'table') ? '' : 'hidden' } " style="display: inline; margin-bottom: 25px; margin-left: 25px;"></h4>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id="container" data-bind="visible: viewMode() == 'graph' " style="width: 100%; height: 400px; display: none;" data-highcharts-chart="0">
                        <div class="highcharts-container" id="highcharts-0" style="position: relative; overflow: hidden; width: 1490px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="1490" height="400">
                                <desc>Created with Highcharts 4.2.3</desc>
                                <defs>
                                    <clipPath id="highcharts-1">
                                        <rect x="0" y="0" width="1340" height="247"></rect>
                                    </clipPath>
                                </defs>
                                <rect x="0" y="0" width="1490" height="400" fill="#FFFFFF" class=" highcharts-background"></rect>
                                <g class="highcharts-grid" zIndex="1"></g>
                                <g class="highcharts-grid" zIndex="1">
                                    <path fill="none" d="M 75 300.5 L 1415 300.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 238.5 L 1415 238.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 177.5 L 1415 177.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 115.5 L 1415 115.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 52.5 L 1415 52.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                </g>
                                <g class="highcharts-grid" zIndex="1">
                                    <path fill="none" d="M 75 300.5 L 1415 300.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 238.5 L 1415 238.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 177.5 L 1415 177.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 115.5 L 1415 115.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                    <path fill="none" d="M 75 52.5 L 1415 52.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path>
                                </g>
                                <g class="highcharts-axis" zIndex="2">
                                    <path fill="none" d="M 135.5 300 L 135.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 196.5 300 L 196.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 257.5 300 L 257.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 318.5 300 L 318.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 379.5 300 L 379.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 439.5 300 L 439.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 500.5 300 L 500.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 561.5 300 L 561.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 622.5 300 L 622.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 683.5 300 L 683.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 744.5 300 L 744.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 805.5 300 L 805.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 866.5 300 L 866.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 927.5 300 L 927.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 988.5 300 L 988.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1049.5 300 L 1049.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1109.5 300 L 1109.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1170.5 300 L 1170.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1231.5 300 L 1231.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1292.5 300 L 1292.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1353.5 300 L 1353.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 1415.5 300 L 1415.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path>
                                    <path fill="none" d="M 74.5 300 L 74.5 310" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><text x="745" zIndex="7" text-anchor="middle" transform="translate(0,0)" class=" highcharts-xaxis-title" style="color:#707070;fill:#707070;" y="378.3276102091093">
                                        <tspan>Date : 01-Nov to 22-Nov</tspan>
                                    </text>
                                    <path fill="none" d="M 75 300.5 L 1415 300.5" stroke="#C0D0E0" stroke-width="1" zIndex="7"></path>
                                </g>
                                <g class="highcharts-axis" zIndex="2"><text x="28.888866424560547" zIndex="7" text-anchor="middle" transform="translate(0,0) rotate(270 28.888866424560547 176.5)" class=" highcharts-yaxis-title" style="color:#707070;fill:#707070;" y="176.5">
                                        <tspan>Baht </tspan>
                                    </text></g>
                                <g class="highcharts-axis" zIndex="2"><text x="1461.1111335754395" zIndex="7" text-anchor="middle" transform="translate(0,0) rotate(90 1461.1111335754395 176.5)" class=" highcharts-yaxis-title" style="color:#707070;fill:#707070;" y="176.5">
                                        <tspan>Baht </tspan>
                                    </text></g>
                                <g class="highcharts-series-group" zIndex="3">
                                    <g class="highcharts-series highcharts-series-0 highcharts-tracker" zIndex="0.1" transform="translate(75,53) scale(1 1)" style="" clip-path="url(#highcharts-1)">
                                        <rect x="15.5" y="230.5" width="30" height="17" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="76.5" y="186.5" width="30" height="61" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="137.5" y="32.5" width="30" height="215" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="198.5" y="45.5" width="30" height="202" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="258.5" y="163.5" width="30" height="84" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="319.5" y="247.5" width="30" height="0" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="380.5" y="216.5" width="30" height="31" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="441.5" y="208.5" width="30" height="39" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="502.5" y="244.5" width="30" height="3" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="563.5" y="189.5" width="30" height="58" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="624.5" y="106.5" width="30" height="141" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="685.5" y="239.5" width="30" height="8" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="746.5" y="247.5" width="30" height="0" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="807.5" y="237.5" width="30" height="10" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="868.5" y="245.5" width="30" height="2" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="928.5" y="205.5" width="30" height="42" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="989.5" y="214.5" width="30" height="33" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="1050.5" y="171.5" width="30" height="76" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="1111.5" y="247.5" width="30" height="0" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="1172.5" y="247.5" width="30" height="0" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="1233.5" y="239.5" width="30" height="8" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                        <rect x="1294.5" y="247.5" width="30" height="0" stroke="#FFFFFF" stroke-width="1" fill="#852b99" rx="0" ry="0"></rect>
                                    </g>
                                    <g class="highcharts-markers highcharts-series-0" zIndex="0.1" transform="translate(75,53) scale(1 1)" clip-path="none"></g>
                                    <g class="highcharts-series highcharts-series-1" zIndex="0.1" transform="translate(75,53) scale(1 1)" clip-path="url(#highcharts-1)" visibility="hidden">
                                        <path fill="none" d="M 30.454545454545453 247 L 91.36363636363636 247 L 152.27272727272725 247 L 213.1818181818182 247 L 274.09090909090907 247 L 334.99999999999994 247 L 395.9090909090909 247 L 456.8181818181818 247 L 517.7272727272727 247 L 578.6363636363636 247 L 639.5454545454545 247 L 700.4545454545455 247 L 761.3636363636364 247 L 822.2727272727273 247 L 883.1818181818182 247 L 944.0909090909091 247 L 1005 247 L 1065.909090909091 247 L 1126.8181818181818 247 L 1187.7272727272727 247 L 1248.6363636363635 247 L 1309.5454545454545 247" stroke="#f45b4f" stroke-width="1" zIndex="1" stroke-linejoin="round" stroke-linecap="round"></path>
                                        <path fill="none" d="M 20.454545454545453 247 L 30.454545454545453 247 L 91.36363636363636 247 L 152.27272727272725 247 L 213.1818181818182 247 L 274.09090909090907 247 L 334.99999999999994 247 L 395.9090909090909 247 L 456.8181818181818 247 L 517.7272727272727 247 L 578.6363636363636 247 L 639.5454545454545 247 L 700.4545454545455 247 L 761.3636363636364 247 L 822.2727272727273 247 L 883.1818181818182 247 L 944.0909090909091 247 L 1005 247 L 1065.909090909091 247 L 1126.8181818181818 247 L 1187.7272727272727 247 L 1248.6363636363635 247 L 1309.5454545454545 247 L 1319.5454545454545 247" stroke-linejoin="round" visibility="hidden" stroke="rgba(192,192,192,0.0001)" stroke-width="21" zIndex="2" class=" highcharts-tracker" style=""></path>
                                    </g>
                                    <g class="highcharts-markers highcharts-series-1 highcharts-tracker" zIndex="0.1" transform="translate(75,53) scale(1 1)" clip-path="url(#highcharts-2)" style="" visibility="hidden">
                                        <path fill="#f45b4f" d="M 1309 245 C 1311.664 245 1311.664 249 1309 249 C 1306.336 249 1306.336 245 1309 245 Z"></path>
                                        <path fill="#f45b4f" d="M 1248 245 C 1250.664 245 1250.664 249 1248 249 C 1245.336 249 1245.336 245 1248 245 Z"></path>
                                        <path fill="#f45b4f" d="M 1187 245 C 1189.664 245 1189.664 249 1187 249 C 1184.336 249 1184.336 245 1187 245 Z"></path>
                                        <path fill="#f45b4f" d="M 1126 245 C 1128.664 245 1128.664 249 1126 249 C 1123.336 249 1123.336 245 1126 245 Z"></path>
                                        <path fill="#f45b4f" d="M 1065 245 C 1067.664 245 1067.664 249 1065 249 C 1062.336 249 1062.336 245 1065 245 Z"></path>
                                        <path fill="#f45b4f" d="M 1005 245 C 1007.664 245 1007.664 249 1005 249 C 1002.336 249 1002.336 245 1005 245 Z"></path>
                                        <path fill="#f45b4f" d="M 944 245 C 946.664 245 946.664 249 944 249 C 941.336 249 941.336 245 944 245 Z"></path>
                                        <path fill="#f45b4f" d="M 883 245 C 885.664 245 885.664 249 883 249 C 880.336 249 880.336 245 883 245 Z"></path>
                                        <path fill="#f45b4f" d="M 822 245 C 824.664 245 824.664 249 822 249 C 819.336 249 819.336 245 822 245 Z"></path>
                                        <path fill="#f45b4f" d="M 761 245 C 763.664 245 763.664 249 761 249 C 758.336 249 758.336 245 761 245 Z"></path>
                                        <path fill="#f45b4f" d="M 700 245 C 702.664 245 702.664 249 700 249 C 697.336 249 697.336 245 700 245 Z"></path>
                                        <path fill="#f45b4f" d="M 639 245 C 641.664 245 641.664 249 639 249 C 636.336 249 636.336 245 639 245 Z"></path>
                                        <path fill="#f45b4f" d="M 578 245 C 580.664 245 580.664 249 578 249 C 575.336 249 575.336 245 578 245 Z"></path>
                                        <path fill="#f45b4f" d="M 517 245 C 519.664 245 519.664 249 517 249 C 514.336 249 514.336 245 517 245 Z"></path>
                                        <path fill="#f45b4f" d="M 456 245 C 458.664 245 458.664 249 456 249 C 453.336 249 453.336 245 456 245 Z"></path>
                                        <path fill="#f45b4f" d="M 395 245 C 397.664 245 397.664 249 395 249 C 392.336 249 392.336 245 395 245 Z"></path>
                                        <path fill="#f45b4f" d="M 334 245 C 336.664 245 336.664 249 334 249 C 331.336 249 331.336 245 334 245 Z"></path>
                                        <path fill="#f45b4f" d="M 274 245 C 276.664 245 276.664 249 274 249 C 271.336 249 271.336 245 274 245 Z"></path>
                                        <path fill="#f45b4f" d="M 213 245 C 215.664 245 215.664 249 213 249 C 210.336 249 210.336 245 213 245 Z"></path>
                                        <path fill="#f45b4f" d="M 152 245 C 154.664 245 154.664 249 152 249 C 149.336 249 149.336 245 152 245 Z"></path>
                                        <path fill="#f45b4f" d="M 91 245 C 93.664 245 93.664 249 91 249 C 88.336 249 88.336 245 91 245 Z"></path>
                                        <path fill="#f45b4f" d="M 30 245 C 32.664 245 32.664 249 30 249 C 27.336 249 27.336 245 30 245 Z"></path>
                                    </g>
                                </g>
                                <g class="highcharts-data-labels highcharts-series-0 highcharts-tracker" zIndex="6" visibility="visible" transform="translate(75,53) scale(1 1)" opacity="1" style=""><text x="34.833333333333336" y="240.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 34.833333333333336 240.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>2,786</tspan>
                                    </text><text x="95.83333333333333" y="196.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 95.83333333333333 196.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>9,808</tspan>
                                    </text><text x="156.83333333333334" y="42.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 156.83333333333334 42.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>34,747</tspan>
                                    </text><text x="217.83333333333334" y="55.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 217.83333333333334 55.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>32,749</tspan>
                                    </text><text x="277.8333333333333" y="173.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 277.8333333333333 173.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>13,631</tspan>
                                    </text><text x="338.8333333333333" y="257.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 338.8333333333333 257.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>0</tspan>
                                    </text><text x="399.8333333333333" y="226.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 399.8333333333333 226.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>5,067</tspan>
                                    </text><text x="460.8333333333333" y="218.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 460.8333333333333 218.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>6,322</tspan>
                                    </text><text x="521.8333333333334" y="254.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 521.8333333333334 254.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>409</tspan>
                                    </text><text x="582.8333333333334" y="199.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 582.8333333333334 199.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>9,462</tspan>
                                    </text><text x="643.8333333333334" y="116.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 643.8333333333334 116.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>22,806</tspan>
                                    </text><text x="704.8333333333334" y="249.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 704.8333333333334 249.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>1,338</tspan>
                                    </text><text x="765.8333333333334" y="257.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 765.8333333333334 257.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>0</tspan>
                                    </text><text x="826.8333333333334" y="247.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 826.8333333333334 247.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>1,584</tspan>
                                    </text><text x="887.8333333333334" y="255.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 887.8333333333334 255.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>299</tspan>
                                    </text><text x="947.8333333333334" y="215.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 947.8333333333334 215.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>6,749</tspan>
                                    </text><text x="1008.8333333333334" y="224.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1008.8333333333334 224.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>5,424</tspan>
                                    </text><text x="1069.8333333333333" y="181.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1069.8333333333333 181.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>12,383</tspan>
                                    </text><text x="1130.8333333333333" y="257.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1130.8333333333333 257.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>65</tspan>
                                    </text><text x="1191.8333333333333" y="257.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1191.8333333333333 257.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>0</tspan>
                                    </text><text x="1252.8333333333333" y="249.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1252.8333333333333 249.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>1,295</tspan>
                                    </text><text x="1313.8333333333333" y="257.5" r="0" padding="5" zIndex="1" transform="translate(0,0) rotate(-90 1313.8333333333333 257.5)" style="color:#FFFFFF;font-size:13px;font-weight:normal;text-shadow:none;font-family:Verdana, sans-serif;fill:#FFFFFF;text-rendering:geometricPrecision;" text-anchor="end">
                                        <tspan>0</tspan>
                                    </text></g>
                                <g class="highcharts-legend" zIndex="7" transform="translate(30,0)">
                                    <g zIndex="1" transform="translate(0,19.600000381469727)">
                                        <g>
                                            <g class="highcharts-legend-item" zIndex="1" transform="translate(8,3)"><text x="21" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" zIndex="2" y="15">
                                                    <tspan>Income </tspan>
                                                </text>
                                                <rect x="0" y="4" width="16" height="12" zIndex="3" fill="#852b99"></rect>
                                            </g>
                                            <g class="highcharts-legend-item" zIndex="1" transform="translate(91.82500076293945,3)">
                                                <path fill="none" d="M 0 11 L 16 11" stroke="#CCC" stroke-width="1"></path>
                                                <path fill="#CCC" d="M 8 9 C 10.664 9 10.664 13 8 13 C 5.336 13 5.336 9 8 9 Z"></path><text x="21" y="15" style="color:#CCC;font-size:12px;font-weight:bold;cursor:pointer;fill:#CCC;" text-anchor="start" zIndex="2">
                                                    <tspan>Expense </tspan>
                                                </text>
                                            </g>
                                        </g>
                                    </g>
                                    <g class="highcharts-legend-title" zIndex="1" style="" transform="translate(5,4)"><text x="3" zIndex="1" style="font-weight:bold;font-style:italic;" y="15">
                                            <tspan style="font-size: 9px; fill: #666; font-weight: normal">(Click to hide)</tspan>
                                        </text></g>
                                </g>
                                <g class="highcharts-axis-labels highcharts-xaxis-labels" zIndex="7"><text x="108.51867483968716" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 108.51867483968716 325)" y="325" opacity="1">
                                        <tspan>01 Wed </tspan>
                                    </text><text x="169.42776574877809" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 169.42776574877809 325)" y="325" opacity="1">
                                        <tspan>02 Thu </tspan>
                                    </text><text x="230.33685665786896" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 230.33685665786896 325)" y="325" opacity="1">
                                        <tspan>03 Fri </tspan>
                                    </text><text x="291.2459475669599" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 291.2459475669599 325)" y="325" opacity="1">
                                        <tspan>04 Sat </tspan>
                                    </text><text x="352.1550384760508" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 352.1550384760508 325)" y="325" opacity="1">
                                        <tspan>05 Sun </tspan>
                                    </text><text x="413.0641293851417" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 413.0641293851417 325)" y="325" opacity="1">
                                        <tspan>06 Mon </tspan>
                                    </text><text x="473.9732202942326" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 473.9732202942326 325)" y="325" opacity="1">
                                        <tspan>07 Tue </tspan>
                                    </text><text x="534.8823112033234" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 534.8823112033234 325)" y="325" opacity="1">
                                        <tspan>08 Wed </tspan>
                                    </text><text x="595.7914021124144" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 595.7914021124144 325)" y="325" opacity="1">
                                        <tspan>09 Thu </tspan>
                                    </text><text x="656.7004930215053" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 656.7004930215053 325)" y="325" opacity="1">
                                        <tspan>10 Fri </tspan>
                                    </text><text x="717.6095839305962" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 717.6095839305962 325)" y="325" opacity="1">
                                        <tspan>11 Sat </tspan>
                                    </text><text x="778.518674839687" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 778.518674839687 325)" y="325" opacity="1">
                                        <tspan>12 Sun </tspan>
                                    </text><text x="839.427765748778" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 839.427765748778 325)" y="325" opacity="1">
                                        <tspan>13 Mon </tspan>
                                    </text><text x="900.3368566578689" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 900.3368566578689 325)" y="325" opacity="1">
                                        <tspan>14 Tue </tspan>
                                    </text><text x="961.2459475669598" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 961.2459475669598 325)" y="325" opacity="1">
                                        <tspan>15 Wed </tspan>
                                    </text><text x="1022.1550384760508" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1022.1550384760508 325)" y="325" opacity="1">
                                        <tspan>16 Thu </tspan>
                                    </text><text x="1083.0641293851418" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1083.0641293851418 325)" y="325" opacity="1">
                                        <tspan>17 Fri </tspan>
                                    </text><text x="1143.9732202942325" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1143.9732202942325 325)" y="325" opacity="1">
                                        <tspan>18 Sat </tspan>
                                    </text><text x="1204.8823112033235" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1204.8823112033235 325)" y="325" opacity="1">
                                        <tspan>19 Sun </tspan>
                                    </text><text x="1265.7914021124145" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1265.7914021124145 325)" y="325" opacity="1">
                                        <tspan>20 Mon </tspan>
                                    </text><text x="1326.7004930215053" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1326.7004930215053 325)" y="325" opacity="1">
                                        <tspan>21 Tue </tspan>
                                    </text><text x="1387.6095839305963" style="color:#606060;cursor:default;font-size:13px;font-family:Verdana, sans-serif;fill:#606060;width:400px;text-overflow:ellipsis;" text-anchor="end" transform="translate(0,0) rotate(-45 1387.6095839305963 325)" y="325" opacity="1">
                                        <tspan>22 Wed </tspan>
                                    </text></g>
                                <g class="highcharts-axis-labels highcharts-yaxis-labels" zIndex="7"><text x="60" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="303" opacity="1">0k</text><text x="60" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="241" opacity="1">10k</text><text x="60" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="179" opacity="1">20k</text><text x="60" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="117" opacity="1">30k</text><text x="60" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="56" opacity="1">40k</text></g>
                                <g class="highcharts-axis-labels highcharts-yaxis-labels" zIndex="7"><text x="1430" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="start" transform="translate(0,0)" y="303" opacity="1">0k</text><text x="1430" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="start" transform="translate(0,0)" y="241" opacity="1">10k</text><text x="1430" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="start" transform="translate(0,0)" y="179" opacity="1">20k</text><text x="1430" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="start" transform="translate(0,0)" y="117" opacity="1">30k</text><text x="1430" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:482px;text-overflow:clip;" text-anchor="start" transform="translate(0,0)" y="56" opacity="1">40k</text></g>
                                <g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;pointer-events:none;white-space:nowrap;" transform="translate(0,-9999)">
                                    <path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path>
                                    <path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path>
                                    <path fill="none" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path>
                                    <path fill="rgba(249, 249, 249, .85)" d="M 3.5 0.5 L 13.5 0.5 C 16.5 0.5 16.5 0.5 16.5 3.5 L 16.5 13.5 C 16.5 16.5 16.5 16.5 13.5 16.5 L 3.5 16.5 C 0.5 16.5 0.5 16.5 0.5 13.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5"></path><text x="8" zIndex="1" style="font-size:12px;color:#333333;fill:#333333;" y="20"></text>
                                </g><text x="1480" text-anchor="end" zIndex="8" style="cursor:pointer;color:#909090;font-size:9px;fill:#909090;" y="395">Highcharts.com</text>
                            </svg><span style="position: absolute; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif; font-size: 18px; white-space: nowrap; color: rgb(51, 51, 51); margin-left: 0px; margin-top: 0px; left: 474px; top: 7px;" class="highcharts-title" zindex="4" transform="translate(0,0)">Income 166,924.00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Expense 0.00 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Net 166,924.00</span></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-9    col-lg-offset-1 col-lg-7">
                            <div id="container2" data-bind="visible: viewMode() == 'calendar' " style="display: none;" class="fc fc-ltr">
                                <table class="fc-header" style="width:100%">
                                    <tbody>
                                        <tr>
                                            <td class="fc-header-left"><span class="fc-header-title">
                                                    <h2>&nbsp;</h2>
                                                </span></td>
                                            <td class="fc-header-center"></td>
                                            <td class="fc-header-right"><span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right" unselectable="on">today</span><span class="fc-header-space"></span><span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on"><span class="fc-icon fc-icon-left-single-arrow"></span></span><span class="fc-button fc-button-next fc-state-default fc-corner-right" unselectable="on"><span class="fc-icon fc-icon-right-single-arrow"></span></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="fc-content">
                                    <div class="fc-view fc-view-month fc-grid" unselectable="on"></div>
                                </div><small style="margin-left: 10px; color: grey;">คลิกวันที่เพื่อดูรายละเอียด</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div data-bind="visible: viewMode() == 'calendar' " class="sale-summary" style="display: none;"><!---->
                                <ul class="list-unstyled">
                                    <li class="section"><!----> <span>Report : 01-11-2023 - 22-11-2023</span></li>
                                    <li><span class="sale-info"><span>GrandTotal</span></span> <span class="sale-num" style="font-weight: bold;"><span> 166,924</span></span></li> <!----> <!---->
                                    <li class="section"><span>Summary</span></li> <!----> <!---->
                                    <li><span class="sale-info"><span>Bills</span></span> <span class="sale-num"> 220</span></li>
                                    <li><span class="sale-info"><span>Bill (avg.)</span></span> <span class="sale-num"><span> 758.745</span></span></li>
                                    <li class="section"><span>Payment Type</span></li>
                                    <li><span class="sale-info"><!----> <span>โอน (เข้าบัญชีร้าน)</span></span> <span class="sale-num"><span> 150,373</span> <!----></span></li>
                                    <li><span class="sale-info"><span style="margin-left: 10px;"> Ent.</span> <span>ตัดสต็อก</span></span> <span class="sale-num"><!----> <span style="text-decoration: line-through;"> 4,052</span></span></li>
                                    <li><span class="sale-info"><!----> <span>Cash</span></span> <span class="sale-num"><span> 16,551</span> <!----></span></li>
                                    <li class="section"><span>Detail</span></li>
                                    <li><span class="sale-info"><span>Total</span></span> <span class="sale-num"><span> 171,673</span></span></li>
                                    <li><span class="sale-info"><span>Item Discount</span></span> <span class="sale-num"><span> -697.35</span></span></li> <!---->
                                    <li><span class="sale-info"><span>Discount</span></span> <span class="sale-num"><span> -4,052</span></span></li> <!---->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="vue-income-view2-summary" class="row"></div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12  col-lg-12">
                            <div id="container3" data-bind="visible: viewMode() == 'table' " style="">
                                <div style="display: none;"><input> <input> <button>csv</button> <button>Excel</button></div>
                                <table id="vue-income-view3-summary" class="table table-striped table-bordered table-advance table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div>All</div>
                                                Date
                                            </th> <!---->
                                            <th>
                                                <div>

                                                    (<span> 758</span>)
                                                </div>
                                                <div><span>220</span></div>
                                                Bills (Avg.)
                                            </th>
                                            <th style="color: blue; font-weight: bold;">
                                                <div><span> 166,924</span></div>
                                                GrandTotal
                                            </th> <!----> <!---->
                                            <th>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 150,373</span> <!----> <span style="margin-left: 10px;">(172)</span></div>
                                                <div><span style="margin-left: 10px;">Ent.</span> <span>ตัดสต็อก</span> <span> : </span> <!----> <span style="text-decoration: line-through;"> 4,052</span> <span style="margin-left: 10px;">(18)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 16,551</span> <!----> <span style="margin-left: 10px;">(30)</span></div>


                                                Payment Type
                                            </th>
                                            <th>
                                                <div><span> 171,673</span></div>

                                                Total
                                            </th>
                                            <th>
                                                <div><span> -697.35</span></div>
                                                ItemDiscount
                                            </th> <!---->
                                            <th>
                                                <div><span> -4,052</span></div>
                                                Additional Discount
                                            </th> <!----> <!---->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">22 November 2023 </span> <span style="margin-left: 7px;">Wed</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>0</span>
                                                &nbsp; &nbsp;
                                                <!---->
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"></span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"></td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span></span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">21 November 2023 </span> <span style="margin-left: 7px;">Tue</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>2</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 647</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 1,295</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 1,295</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 1,295</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 5px;"><span style="margin-left: 7px;">20 November 2023 </span> <span style="margin-left: 7px;">Mon</span></td> <!---->
                                            <td style="border-top-width: 5px;"><span>0</span>
                                                &nbsp; &nbsp;
                                                <!---->
                                            </td>
                                            <td style="border-top-width: 5px;"><span style="font-weight: bold;"></span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"></td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"><span></span></td>
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">19 November 2023 </span> <span style="margin-left: 7px;">Sun</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>2</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 32</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 65</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 65</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 65</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">18 November 2023 </span> <span style="margin-left: 7px;">Sat</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>12</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 1,031</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 12,383</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 11,518</span> <!----> <span style="margin-left: 10px;">(8)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 865</span> <!----> <span style="margin-left: 10px;">(3)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 12,383</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">17 November 2023 </span> <span style="margin-left: 7px;">Fri</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>11</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 493</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 5,424</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 820</span> <!----> <span style="margin-left: 10px;">(2)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 4,604</span> <!----> <span style="margin-left: 10px;">(8)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 5,424</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">16 November 2023 </span> <span style="margin-left: 7px;">Thu</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>12</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 562</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 6,749</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 5,170</span> <!----> <span style="margin-left: 10px;">(10)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 1,579</span> <!----> <span style="margin-left: 10px;">(2)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 6,749</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">15 November 2023 </span> <span style="margin-left: 7px;">Wed</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>2</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 149</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 299</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 299</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 299</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">14 November 2023 </span> <span style="margin-left: 7px;">Tue</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>2</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 792</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 1,584</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 1,534</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 50</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 1,584</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 5px;"><span style="margin-left: 7px;">13 November 2023 </span> <span style="margin-left: 7px;">Mon</span></td> <!---->
                                            <td style="border-top-width: 5px;"><span>0</span>
                                                &nbsp; &nbsp;
                                                <!---->
                                            </td>
                                            <td style="border-top-width: 5px;"><span style="font-weight: bold;"></span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"></td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"><span></span></td>
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">12 November 2023 </span> <span style="margin-left: 7px;">Sun</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>3</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 446</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 1,338</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 1,338</span> <!----> <span style="margin-left: 10px;">(3)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 1,338</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">11 November 2023 </span> <span style="margin-left: 7px;">Sat</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>28</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 814</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 22,806</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 20,138</span> <!----> <span style="margin-left: 10px;">(24)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 2,668</span> <!----> <span style="margin-left: 10px;">(3)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 22,806</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">10 November 2023 </span> <span style="margin-left: 7px;">Fri</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>15</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 630</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 9,462</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 1,621</span> <!----> <span style="margin-left: 10px;">(5)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 7,841</span> <!----> <span style="margin-left: 10px;">(9)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 9,462</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">09 November 2023 </span> <span style="margin-left: 7px;">Thu</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>2</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 204</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 409</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 359</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 50</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 409</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">08 November 2023 </span> <span style="margin-left: 7px;">Wed</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>12</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 526</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 6,322</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 389</span> <!----> <span style="margin-left: 10px;">(2)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 5,933</span> <!----> <span style="margin-left: 10px;">(9)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 6,322</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">07 November 2023 </span> <span style="margin-left: 7px;">Tue</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>10</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 506</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 5,067</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 5,067</span> <!----> <span style="margin-left: 10px;">(7)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(3)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 5,110</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span> -43.5</span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 5px;"><span style="margin-left: 7px;">06 November 2023 </span> <span style="margin-left: 7px;">Mon</span></td> <!---->
                                            <td style="border-top-width: 5px;"><span>0</span>
                                                &nbsp; &nbsp;
                                                <!---->
                                            </td>
                                            <td style="border-top-width: 5px;"><span style="font-weight: bold;"></span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"></td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 5px;"><span></span></td>
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 5px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">05 November 2023 </span> <span style="margin-left: 7px;">Sun</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>8</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 1,703</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 13,631</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 13,591</span> <!----> <span style="margin-left: 10px;">(6)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 40</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 14,285</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span> -653.85</span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">04 November 2023 </span> <span style="margin-left: 7px;">Sat</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>39</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 839</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 32,749</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 30,088</span> <!----> <span style="margin-left: 10px;">(35)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 2,661</span> <!----> <span style="margin-left: 10px;">(4)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 32,749</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">03 November 2023 </span> <span style="margin-left: 7px;">Fri</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>42</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 827</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 34,747</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 32,855</span> <!----> <span style="margin-left: 10px;">(35)</span></div>
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 1,892</span> <!----> <span style="margin-left: 10px;">(3)</span></div>
                                                <div><span style="margin-left: 10px;"> Ent.</span> <span>ตัดสต็อก</span> <span> : </span> <!----> <span style="text-decoration: line-through;"> 4,052</span> <span style="margin-left: 10px;">(4)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 38,799</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span> -4,052</span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">02 November 2023 </span> <span style="margin-left: 7px;">Thu</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>11</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 891</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 9,808</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>Cash</span> <span> : </span> <span> 2,013</span> <!----> <span style="margin-left: 10px;">(1)</span></div>
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 7,795</span> <!----> <span style="margin-left: 10px;">(10)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 9,808</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                        <tr>
                                            <td class="highlight" style="border-top-width: 1px;"><span style="margin-left: 7px;">01 November 2023 </span> <span style="margin-left: 7px;">Wed</span></td> <!---->
                                            <td style="border-top-width: 1px;"><span>7</span>
                                                &nbsp; &nbsp;
                                                <span>
                                                    (<span> 398</span>)
                                                </span>
                                            </td>
                                            <td style="border-top-width: 1px;"><span style="font-weight: bold;"> 2,786</span></td> <!----> <!---->
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;">
                                                <div><!----> <span>โอน (เข้าบัญชีร้าน)</span> <span> : </span> <span> 2,786</span> <!----> <span style="margin-left: 10px;">(5)</span></div>
                                                <div><!----> <span>ตัดสต็อก</span> <span> : </span> <!----> <!----> <span style="margin-left: 10px;">(2)</span></div>
                                            </td>
                                            <td class="small-data" style="border-left-width: 2px; border-top-width: 1px;"><span> 2,786</span></td>
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!---->
                                            <td class="small-data" style="border-top-width: 1px;"><span></span></td> <!----> <!---->
                                        </tr>
                                    </tbody>
                                </table> <!----> <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>