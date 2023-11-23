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
                                            <option value="Cancel">ยกเลิกสินค้า</option>
                                            <option value="Activity" selected>Activity (ประวัติการใช้งาน POS) </option>
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

            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">New Users</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row justify-content-end">
                                    <div class="col-lg-8 d-flex justify-content-end">
                                        <div class="serach_field-area theme_bg d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search">
                                                    </div>
                                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-4 mt_20">
                                <select class="nice_Select2 wide" style="display: none;">
                                    <option value="1">Show by All</option>
                                    <option value="1">Show by A</option>
                                    <option value="1">Show by B</option>
                                </select>
                                <div class="nice-select nice_Select2 wide" tabindex="0"><span class="current">Show by All</span>
                                    <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                    <ul class="list">
                                        <li data-value="1" class="option selected">Show by All</li>
                                        <li data-value="1" class="option">Show by A</li>
                                        <li data-value="1" class="option">Show by B</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body ">
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                            </div>
                            <div class="user_info">
                                Customer
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                        <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                            </div>
                            <div class="user_info">
                                Admin
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                            </div>
                            <div class="user_info">
                                Customer
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                            </div>
                            <div class="user_info">
                                Customer
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                        <div class="single_user_pil d-flex align-items-center justify-content-between mb-0">
                            <div class="user_pils_thumb d-flex align-items-center">
                                <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                            </div>
                            <div class="user_info">
                                Customer
                            </div>
                            <div class="action_btns d-flex">
                                <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Sales of the last week</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body" style="position: relative;">
                        <div id="chart-currently" style="min-height: 166.599px;">
                            <div id="apexchartsut555icc" class="apexcharts-canvas apexchartsut555icc light" style="width: 313px; height: 166.599px;"><svg id="SvgjsSvg1162" width="313" height="166.59907913208008" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1164" class="apexcharts-inner apexcharts-graphical" transform="translate(36, 0)">
                                        <defs id="SvgjsDefs1163">
                                            <clipPath id="gridRectMaskut555icc">
                                                <rect id="SvgjsRect1165" width="245" height="267" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMaskut555icc">
                                                <rect id="SvgjsRect1166" width="245" height="267" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG1168" class="apexcharts-radialbar">
                                            <g id="SvgjsG1169">
                                                <g id="SvgjsG1170" class="apexcharts-tracks">
                                                    <g id="SvgjsG1171" class="apexcharts-radialbar-track apexcharts-track" rel="1">
                                                        <path id="apexcharts-radialbarTrack-0" d="M 23.46707317073171 132.5 A 98.03292682926829 98.03292682926829 0 0 1 219.5329268292683 132.5" fill="none" fill-opacity="1" stroke="rgba(229,236,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="13.490243902439026" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 23.46707317073171 132.5 A 98.03292682926829 98.03292682926829 0 0 1 219.5329268292683 132.5"></path>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1173">
                                                    <g id="SvgjsG1178" class="apexcharts-series apexcharts-radial-series" seriesName="Progress" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1179" d="M 23.46707317073171 132.5 A 98.03292682926829 98.03292682926829 0 0 1 188.35829532968788 60.80325608285335" fill="none" fill-opacity="0.85" stroke="rgba(151,103,253,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="13.490243902439026" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="133" data:value="74" index="0" j="0" data:pathOrig="M 23.46707317073171 132.5 A 98.03292682926829 98.03292682926829 0 0 1 188.35829532968788 60.80325608285335"></path>
                                                    </g>
                                                    <circle id="SvgjsCircle1174" r="91.28780487804877" cx="121.5" cy="132.5" class="apexcharts-radialbar-hollow" fill="transparent"></circle>
                                                    <g id="SvgjsG1175" class="apexcharts-datalabels-group" transform="translate(0, 0)" style="opacity: 1;"><text id="SvgjsText1176" font-family="Helvetica, Arial, sans-serif" x="121.5" y="127.5" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="regular" fill="#000000 #E5ECFF" class="apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif;">Progress</text><text id="SvgjsText1177" font-family="Helvetica, Arial, sans-serif" x="121.5" y="108.5" text-anchor="middle" dominant-baseline="auto" font-size="30px" font-weight="regular" fill="#000000 #E5ECFF" class="apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">74%</text></g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1180" x1="0" y1="0" x2="243" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1181" x1="0" y1="0" x2="243" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                            </div>
                        </div>
                        <div class="monthly_plan_wraper">
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/icon2/7.svg" alt="">
                                    </div>
                                    <div>
                                        <h5>Most Sales</h5>
                                        <span>Authors with the best sales</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/icon2/6.svg" alt="">
                                    </div>
                                    <div>
                                        <h5>Total sales lead</h5>
                                        <span>40% increased on week-to-week reports</span>
                                    </div>
                                </div>
                            </div>
                            <div class="single_plan d-flex align-items-center justify-content-between">
                                <div class="plan_left d-flex align-items-center">
                                    <div class="thumb">
                                        <img src="img/icon2/5.svg" alt="">
                                    </div>
                                    <div>
                                        <h5>Average Bestseller</h5>
                                        <span>Pitstop Email Marketing</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 374px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30 overflow_hidden">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Sales Details</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body pb-0">
                        <div class="Sales_Details_plan">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/3.svg" alt="">
                                            </div>
                                            <div>
                                                <h5>$2,034</h5>
                                                <span>Author Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/1.svg" alt="">
                                            </div>
                                            <div>
                                                <h5>$706</h5>
                                                <span>Commision</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/4.svg" alt="">
                                            </div>
                                            <div>
                                                <h5>$49</h5>
                                                <span>Average Bid</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/2.svg" alt="">
                                            </div>
                                            <div>
                                                <h5>$5.8M</h5>
                                                <span>All Time Sales</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart_wrap overflow_hidden" style="position: relative;">
                        <div id="chart4" style="min-height: 270px;">
                            <div id="apexchartsikefkcnk" class="apexcharts-canvas apexchartsikefkcnk light" style="width: 373px; height: 270px;"><svg id="SvgjsSvg1293" width="373" height="270" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1295" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)">
                                        <defs id="SvgjsDefs1294">
                                            <clipPath id="gridRectMaskikefkcnk">
                                                <rect id="SvgjsRect1297" width="376" height="273" x="-1.5" y="-1.5" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMaskikefkcnk">
                                                <rect id="SvgjsRect1298" width="375" height="272" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                        </defs>
                                        <g id="SvgjsG1306" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1307" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g>
                                        </g>
                                        <g id="SvgjsG1310" class="apexcharts-grid">
                                            <line id="SvgjsLine1312" x1="0" y1="270" x2="373" y2="270" stroke="transparent" stroke-dasharray="0"></line>
                                            <line id="SvgjsLine1311" x1="0" y1="1" x2="0" y2="270" stroke="transparent" stroke-dasharray="0"></line>
                                        </g>
                                        <g id="SvgjsG1300" class="apexcharts-area-series apexcharts-plot-series">
                                            <g id="SvgjsG1301" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1304" d="M 0 270L 0 135C 26.109999999999996 135 48.489999999999995 157.5 74.6 157.5C 100.71 157.5 123.08999999999999 67.5 149.2 67.5C 175.30999999999997 67.5 197.69 135 223.79999999999998 135C 249.90999999999997 135 272.28999999999996 22.5 298.4 22.5C 324.51 22.5 346.89 22.5 373 22.5C 373 22.5 373 22.5 373 270M 373 22.5z" fill="rgba(151,103,253,0.2)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskikefkcnk)" pathTo="M 0 270L 0 135C 26.109999999999996 135 48.489999999999995 157.5 74.6 157.5C 100.71 157.5 123.08999999999999 67.5 149.2 67.5C 175.30999999999997 67.5 197.69 135 223.79999999999998 135C 249.90999999999997 135 272.28999999999996 22.5 298.4 22.5C 324.51 22.5 346.89 22.5 373 22.5C 373 22.5 373 22.5 373 270M 373 22.5z" pathFrom="M -1 270L -1 270L 74.6 270L 149.2 270L 223.79999999999998 270L 298.4 270L 373 270"></path>
                                                <path id="SvgjsPath1305" d="M 0 135C 26.109999999999996 135 48.489999999999995 157.5 74.6 157.5C 100.71 157.5 123.08999999999999 67.5 149.2 67.5C 175.30999999999997 67.5 197.69 135 223.79999999999998 135C 249.90999999999997 135 272.28999999999996 22.5 298.4 22.5C 324.51 22.5 346.89 22.5 373 22.5" fill="none" fill-opacity="1" stroke="#9767fd" stroke-opacity="1" stroke-linecap="butt" stroke-width="3" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskikefkcnk)" pathTo="M 0 135C 26.109999999999996 135 48.489999999999995 157.5 74.6 157.5C 100.71 157.5 123.08999999999999 67.5 149.2 67.5C 175.30999999999997 67.5 197.69 135 223.79999999999998 135C 249.90999999999997 135 272.28999999999996 22.5 298.4 22.5C 324.51 22.5 346.89 22.5 373 22.5" pathFrom="M -1 270L -1 270L 74.6 270L 149.2 270L 223.79999999999998 270L 298.4 270L 373 270"></path>
                                                <g id="SvgjsG1302" class="apexcharts-series-markers-wrap">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1318" r="0" cx="0" cy="0" class="apexcharts-marker w0ee8txsqj no-pointer-events" stroke="#9767fd" fill="#9767fd" fill-opacity="1" stroke-width="3" stroke-opacity="0.9" default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1303" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1313" x1="0" y1="0" x2="373" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1314" x1="0" y1="0" x2="373" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1315" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1316" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1317" class="apexcharts-point-annotations"></g>
                                    </g>
                                    <g id="SvgjsG1308" class="apexcharts-yaxis" rel="0" transform="translate(-21, 0)">
                                        <g id="SvgjsG1309" class="apexcharts-yaxis-texts-g"></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-legend"></div>
                                <div class="apexcharts-tooltip light">
                                    <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(151, 103, 253);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom light">
                                    <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 374px; height: 271px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 ">
                <div class="white_card mb_30 card_height_100">
                    <div class="white_card_header">
                        <div class="row align-items-center justify-content-between flex-wrap">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">Stoke Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-4 text-end d-flex justify-content-end">
                                <select class="nice_Select2 max-width-220" style="display: none;">
                                    <option value="1">Show by month</option>
                                    <option value="1">Show by year</option>
                                    <option value="1">Show by day</option>
                                </select>
                                <div class="nice-select nice_Select2 max-width-220" tabindex="0"><span class="current">Show by month</span>
                                    <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                    <ul class="list">
                                        <li data-value="1" class="option selected">Show by month</li>
                                        <li data-value="1" class="option">Show by year</li>
                                        <li data-value="1" class="option">Show by day</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body" style="position: relative;">
                        <div id="management_bar" style="min-height: 354px;">
                            <div id="apexchartsqg5a98ku" class="apexcharts-canvas apexchartsqg5a98ku light zoomable" style="width: 711px; height: 339px;"><svg id="SvgjsSvg1186" width="711" height="339" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <foreignObject x="0" y="0" width="711" height="339">
                                        <div class="apexcharts-legend center position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 10px; position: absolute;">
                                            <div class="apexcharts-legend-series" rel="1" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(151, 103, 253); color: rgb(151, 103, 253); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Desktops" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Desktops</span></div>
                                            <div class="apexcharts-legend-series" rel="2" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(223, 226, 230); color: rgb(223, 226, 230); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Laptops" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Laptops</span></div>
                                            <div class="apexcharts-legend-series" rel="3" data:collapsed="false" style="margin: 0px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(241, 180, 76); color: rgb(241, 180, 76); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" i="2" data:default-text="Tablets" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-family: Helvetica, Arial, sans-serif;">Tablets</span></div>
                                        </div>
                                        <style type="text/css">
                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.position-bottom,
                                            .apexcharts-legend.position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.position-right,
                                            .apexcharts-legend.position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.position-bottom.left,
                                            .apexcharts-legend.position-top.left,
                                            .apexcharts-legend.position-right,
                                            .apexcharts-legend.position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.position-bottom.center,
                                            .apexcharts-legend.position-top.center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.position-bottom.right,
                                            .apexcharts-legend.position-top.right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                            }

                                            .apexcharts-legend.position-bottom .apexcharts-legend-series,
                                            .apexcharts-legend.position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                            }

                                            .apexcharts-legend.right .apexcharts-legend-series,
                                            .apexcharts-legend.left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .inactive-legend {
                                                opacity: 0.45;
                                            }
                                        </style>
                                    </foreignObject>
                                    <g id="SvgjsG1188" class="apexcharts-inner apexcharts-graphical" transform="translate(67.51767635345459, 40)">
                                        <defs id="SvgjsDefs1187">
                                            <clipPath id="gridRectMaskqg5a98ku">
                                                <rect id="SvgjsRect1208" width="637.4823236465454" height="247.39519900131222" x="-2" y="-2" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                            <clipPath id="gridRectMarkerMaskqg5a98ku">
                                                <rect id="SvgjsRect1209" width="635.4823236465454" height="245.39519900131222" x="-1" y="-1" rx="0" ry="0" fill="#ffffff" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                            </clipPath>
                                        </defs>
                                        <line id="SvgjsLine1193" x1="0" y1="0" x2="0" y2="243.39519900131222" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="243.39519900131222" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                        <g id="SvgjsG1236" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1237" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1238" font-family="Helvetica, Arial, sans-serif" x="26.196637444030053" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="600" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1239" style="font-family: Helvetica, Arial, sans-serif;">2003</tspan>
                                                    <title>2003</title>
                                                </text><text id="SvgjsText1240" font-family="Helvetica, Arial, sans-serif" x="84.20347749866804" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1241" style="font-family: Helvetica, Arial, sans-serif;">Feb '03</tspan>
                                                    <title>Feb '03</title>
                                                </text><text id="SvgjsText1242" font-family="Helvetica, Arial, sans-serif" x="194.60359244136612" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1243" style="font-family: Helvetica, Arial, sans-serif;">Apr '03</tspan>
                                                    <title>Apr '03</title>
                                                </text><text id="SvgjsText1244" font-family="Helvetica, Arial, sans-serif" x="250.7392441071448" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1245" style="font-family: Helvetica, Arial, sans-serif;">May '03</tspan>
                                                    <title>May '03</title>
                                                </text><text id="SvgjsText1246" font-family="Helvetica, Arial, sans-serif" x="364.8817358275615" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1247" style="font-family: Helvetica, Arial, sans-serif;">Jul '03</tspan>
                                                    <title>Jul '03</title>
                                                </text><text id="SvgjsText1248" font-family="Helvetica, Arial, sans-serif" x="422.88857588219946" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1249" style="font-family: Helvetica, Arial, sans-serif;">Aug '03</tspan>
                                                    <title>Aug '03</title>
                                                </text><text id="SvgjsText1250" font-family="Helvetica, Arial, sans-serif" x="537.0310676026161" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1251" style="font-family: Helvetica, Arial, sans-serif;">Oct '03</tspan>
                                                    <title>Oct '03</title>
                                                </text><text id="SvgjsText1252" font-family="Helvetica, Arial, sans-serif" x="595.0379076572541" y="272.3951990013122" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1253" style="font-family: Helvetica, Arial, sans-serif;"></tspan>
                                                    <title></title>
                                                </text></g>
                                            <line id="SvgjsLine1254" x1="0" y1="244.39519900131222" x2="633.4823236465454" y2="244.39519900131222" stroke="#78909c" stroke-dasharray="0" stroke-width="1"></line>
                                        </g>
                                        <g id="SvgjsG1264" class="apexcharts-grid">
                                            <g id="SvgjsG1265" class="apexcharts-gridlines-horizontal">
                                                <line id="SvgjsLine1274" x1="0" y1="0" x2="633.4823236465454" y2="0" stroke="#f1f1f1" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1275" x1="0" y1="60.848799750328055" x2="633.4823236465454" y2="60.848799750328055" stroke="#f1f1f1" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1276" x1="0" y1="121.69759950065611" x2="633.4823236465454" y2="121.69759950065611" stroke="#f1f1f1" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1277" x1="0" y1="182.54639925098417" x2="633.4823236465454" y2="182.54639925098417" stroke="#f1f1f1" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1278" x1="0" y1="243.39519900131222" x2="633.4823236465454" y2="243.39519900131222" stroke="#f1f1f1" stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1266" class="apexcharts-gridlines-vertical"></g>
                                            <line id="SvgjsLine1267" x1="26.196637444030053" y1="244.39519900131222" x2="26.196637444030053" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1268" x1="84.20347749866804" y1="244.39519900131222" x2="84.20347749866804" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1269" x1="194.60359244136612" y1="244.39519900131222" x2="194.60359244136612" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1270" x1="250.7392441071448" y1="244.39519900131222" x2="250.7392441071448" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1271" x1="364.8817358275615" y1="244.39519900131222" x2="364.8817358275615" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1272" x1="422.88857588219946" y1="244.39519900131222" x2="422.88857588219946" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1273" x1="537.0310676026161" y1="244.39519900131222" x2="537.0310676026161" y2="250.39519900131222" stroke="#78909c" stroke-dasharray="0" class="apexcharts-xaxis-tick"></line>
                                            <line id="SvgjsLine1280" x1="0" y1="243.39519900131222" x2="633.4823236465454" y2="243.39519900131222" stroke="transparent" stroke-dasharray="0"></line>
                                            <line id="SvgjsLine1279" x1="0" y1="1" x2="0" y2="243.39519900131222" stroke="transparent" stroke-dasharray="0"></line>
                                        </g>
                                        <g id="SvgjsG1211" class="apexcharts-area-series apexcharts-plot-series">
                                            <g id="SvgjsG1212" class="apexcharts-series" seriesName="Laptops" data:longestSeries="true" rel="1" data:realIndex="1">
                                                <path id="SvgjsPath1215" d="M 25.856421373329088 243.39519900131222L 25.856421373329088 109.5278395505905C 46.15881539245238 109.5278395505905 63.56086740884377 76.06099968791008 83.86326142796706 76.06099968791008C 102.2009076387881 76.06099968791008 117.91889010520613 118.65515951313972 136.25653631602717 118.65515951313972C 156.55893033515045 118.65515951313972 173.96098235154187 39.55171983771325 194.26337637066516 39.55171983771325C 213.9108544536877 39.55171983771325 230.7515499534213 176.46151927595136 250.39902803644384 176.46151927595136C 270.70142205556715 176.46151927595136 288.10347407195854 112.57027953810692 308.4058680910818 112.57027953810692C 328.0533461741044 112.57027953810692 344.89404167383793 179.50395926346778 364.5415197568605 179.50395926346778C 384.84391377598376 179.50395926346778 402.24596579237516 118.65515951313972 422.54835981149847 118.65515951313972C 442.8507538306218 118.65515951313972 460.2528058470132 73.01855970039367 480.55519986613643 73.01855970039367C 500.20267794915895 73.01855970039367 517.0433734488926 161.24931933836933 536.6908515319151 161.24931933836933C 556.9932455510384 161.24931933836933 574.3952975674298 112.57027953810692 594.6976915865531 112.57027953810692C 594.6976915865531 112.57027953810692 594.6976915865531 112.57027953810692 594.6976915865531 243.39519900131222M 594.6976915865531 112.57027953810692z" fill="rgba(223,226,230,0.25)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 25.856421373329088 243.39519900131222L 25.856421373329088 109.5278395505905C 46.15881539245238 109.5278395505905 63.56086740884377 76.06099968791008 83.86326142796706 76.06099968791008C 102.2009076387881 76.06099968791008 117.91889010520613 118.65515951313972 136.25653631602717 118.65515951313972C 156.55893033515045 118.65515951313972 173.96098235154187 39.55171983771325 194.26337637066516 39.55171983771325C 213.9108544536877 39.55171983771325 230.7515499534213 176.46151927595136 250.39902803644384 176.46151927595136C 270.70142205556715 176.46151927595136 288.10347407195854 112.57027953810692 308.4058680910818 112.57027953810692C 328.0533461741044 112.57027953810692 344.89404167383793 179.50395926346778 364.5415197568605 179.50395926346778C 384.84391377598376 179.50395926346778 402.24596579237516 118.65515951313972 422.54835981149847 118.65515951313972C 442.8507538306218 118.65515951313972 460.2528058470132 73.01855970039367 480.55519986613643 73.01855970039367C 500.20267794915895 73.01855970039367 517.0433734488926 161.24931933836933 536.6908515319151 161.24931933836933C 556.9932455510384 161.24931933836933 574.3952975674298 112.57027953810692 594.6976915865531 112.57027953810692C 594.6976915865531 112.57027953810692 594.6976915865531 112.57027953810692 594.6976915865531 243.39519900131222M 594.6976915865531 112.57027953810692z" pathFrom="M -1 243.39519900131222L -1 243.39519900131222L 83.86326142796706 243.39519900131222L 136.25653631602717 243.39519900131222L 194.26337637066516 243.39519900131222L 250.39902803644384 243.39519900131222L 308.4058680910818 243.39519900131222L 364.5415197568605 243.39519900131222L 422.54835981149847 243.39519900131222L 480.55519986613643 243.39519900131222L 536.6908515319151 243.39519900131222L 594.6976915865531 243.39519900131222"></path>
                                                <path id="SvgjsPath1216" d="M 25.856421373329088 109.5278395505905C 46.15881539245238 109.5278395505905 63.56086740884377 76.06099968791008 83.86326142796706 76.06099968791008C 102.2009076387881 76.06099968791008 117.91889010520613 118.65515951313972 136.25653631602717 118.65515951313972C 156.55893033515045 118.65515951313972 173.96098235154187 39.55171983771325 194.26337637066516 39.55171983771325C 213.9108544536877 39.55171983771325 230.7515499534213 176.46151927595136 250.39902803644384 176.46151927595136C 270.70142205556715 176.46151927595136 288.10347407195854 112.57027953810692 308.4058680910818 112.57027953810692C 328.0533461741044 112.57027953810692 344.89404167383793 179.50395926346778 364.5415197568605 179.50395926346778C 384.84391377598376 179.50395926346778 402.24596579237516 118.65515951313972 422.54835981149847 118.65515951313972C 442.8507538306218 118.65515951313972 460.2528058470132 73.01855970039367 480.55519986613643 73.01855970039367C 500.20267794915895 73.01855970039367 517.0433734488926 161.24931933836933 536.6908515319151 161.24931933836933C 556.9932455510384 161.24931933836933 574.3952975674298 112.57027953810692 594.6976915865531 112.57027953810692" fill="none" fill-opacity="1" stroke="#dfe2e6" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 25.856421373329088 109.5278395505905C 46.15881539245238 109.5278395505905 63.56086740884377 76.06099968791008 83.86326142796706 76.06099968791008C 102.2009076387881 76.06099968791008 117.91889010520613 118.65515951313972 136.25653631602717 118.65515951313972C 156.55893033515045 118.65515951313972 173.96098235154187 39.55171983771325 194.26337637066516 39.55171983771325C 213.9108544536877 39.55171983771325 230.7515499534213 176.46151927595136 250.39902803644384 176.46151927595136C 270.70142205556715 176.46151927595136 288.10347407195854 112.57027953810692 308.4058680910818 112.57027953810692C 328.0533461741044 112.57027953810692 344.89404167383793 179.50395926346778 364.5415197568605 179.50395926346778C 384.84391377598376 179.50395926346778 402.24596579237516 118.65515951313972 422.54835981149847 118.65515951313972C 442.8507538306218 118.65515951313972 460.2528058470132 73.01855970039367 480.55519986613643 73.01855970039367C 500.20267794915895 73.01855970039367 517.0433734488926 161.24931933836933 536.6908515319151 161.24931933836933C 556.9932455510384 161.24931933836933 574.3952975674298 112.57027953810692 594.6976915865531 112.57027953810692" pathFrom="M -1 243.39519900131222L -1 243.39519900131222L 83.86326142796706 243.39519900131222L 136.25653631602717 243.39519900131222L 194.26337637066516 243.39519900131222L 250.39902803644384 243.39519900131222L 308.4058680910818 243.39519900131222L 364.5415197568605 243.39519900131222L 422.54835981149847 243.39519900131222L 480.55519986613643 243.39519900131222L 536.6908515319151 243.39519900131222L 594.6976915865531 243.39519900131222"></path>
                                                <g id="SvgjsG1213" class="apexcharts-series-markers-wrap">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1286" r="0" cx="0" cy="0" class="apexcharts-marker wwdh0o72hi" stroke="#ffffff" fill="#dfe2e6" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1214" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1217" class="apexcharts-bar-series apexcharts-plot-series">
                                            <g id="SvgjsG1218" class="apexcharts-series" rel="1" seriesName="Desktops" data:realIndex="0">
                                                <path id="SvgjsPath1220" d="M 17.997430140120073 243.39519900131222L 17.997430140120073 173.41907928843494L 33.71541260653811 173.41907928843494L 33.71541260653811 243.39519900131222L 17.997430140120073 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 17.997430140120073 243.39519900131222L 17.997430140120073 173.41907928843494L 33.71541260653811 173.41907928843494L 33.71541260653811 243.39519900131222L 17.997430140120073 243.39519900131222" pathFrom="M 17.997430140120073 243.39519900131222L 17.997430140120073 243.39519900131222L 33.71541260653811 243.39519900131222L 33.71541260653811 243.39519900131222L 17.997430140120073 243.39519900131222" cy="173.41907928843494" cx="33.71541260653811" j="0" val="23" barHeight="69.97611971287726" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1221" d="M 76.00427019475805 243.39519900131222L 76.00427019475805 209.92835913863178L 91.72225266117609 209.92835913863178L 91.72225266117609 243.39519900131222L 76.00427019475805 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 76.00427019475805 243.39519900131222L 76.00427019475805 209.92835913863178L 91.72225266117609 209.92835913863178L 91.72225266117609 243.39519900131222L 76.00427019475805 243.39519900131222" pathFrom="M 76.00427019475805 243.39519900131222L 76.00427019475805 243.39519900131222L 91.72225266117609 243.39519900131222L 91.72225266117609 243.39519900131222L 76.00427019475805 243.39519900131222" cy="209.92835913863178" cx="91.72225266117609" j="1" val="11" barHeight="33.46683986268043" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1222" d="M 128.39754508281814 243.39519900131222L 128.39754508281814 176.46151927595136L 144.11552754923616 176.46151927595136L 144.11552754923616 243.39519900131222L 128.39754508281814 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 128.39754508281814 243.39519900131222L 128.39754508281814 176.46151927595136L 144.11552754923616 176.46151927595136L 144.11552754923616 243.39519900131222L 128.39754508281814 243.39519900131222" pathFrom="M 128.39754508281814 243.39519900131222L 128.39754508281814 243.39519900131222L 144.11552754923616 243.39519900131222L 144.11552754923616 243.39519900131222L 128.39754508281814 243.39519900131222" cy="176.46151927595136" cx="144.11552754923616" j="2" val="22" barHeight="66.93367972536086" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1223" d="M 186.40438513745613 243.39519900131222L 186.40438513745613 161.24931933836933L 202.12236760387415 161.24931933836933L 202.12236760387415 243.39519900131222L 186.40438513745613 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 186.40438513745613 243.39519900131222L 186.40438513745613 161.24931933836933L 202.12236760387415 161.24931933836933L 202.12236760387415 243.39519900131222L 186.40438513745613 243.39519900131222" pathFrom="M 186.40438513745613 243.39519900131222L 186.40438513745613 243.39519900131222L 202.12236760387415 243.39519900131222L 202.12236760387415 243.39519900131222L 186.40438513745613 243.39519900131222" cy="161.24931933836933" cx="202.12236760387415" j="3" val="27" barHeight="82.14587966294287" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1224" d="M 242.5400368032348 243.39519900131222L 242.5400368032348 203.843479163599L 258.25801926965283 203.843479163599L 258.25801926965283 243.39519900131222L 242.5400368032348 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 242.5400368032348 243.39519900131222L 242.5400368032348 203.843479163599L 258.25801926965283 203.843479163599L 258.25801926965283 243.39519900131222L 242.5400368032348 243.39519900131222" pathFrom="M 242.5400368032348 243.39519900131222L 242.5400368032348 243.39519900131222L 258.25801926965283 243.39519900131222L 258.25801926965283 243.39519900131222L 242.5400368032348 243.39519900131222" cy="203.843479163599" cx="258.25801926965283" j="4" val="13" barHeight="39.551719837713236" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1225" d="M 300.5468768578728 243.39519900131222L 300.5468768578728 176.46151927595136L 316.26485932429085 176.46151927595136L 316.26485932429085 243.39519900131222L 300.5468768578728 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 300.5468768578728 243.39519900131222L 300.5468768578728 176.46151927595136L 316.26485932429085 176.46151927595136L 316.26485932429085 243.39519900131222L 300.5468768578728 243.39519900131222" pathFrom="M 300.5468768578728 243.39519900131222L 300.5468768578728 243.39519900131222L 316.26485932429085 243.39519900131222L 316.26485932429085 243.39519900131222L 300.5468768578728 243.39519900131222" cy="176.46151927595136" cx="316.26485932429085" j="5" val="22" barHeight="66.93367972536086" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1226" d="M 356.6825285236515 243.39519900131222L 356.6825285236515 130.82491946320533L 372.40051099006956 130.82491946320533L 372.40051099006956 243.39519900131222L 356.6825285236515 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 356.6825285236515 243.39519900131222L 356.6825285236515 130.82491946320533L 372.40051099006956 130.82491946320533L 372.40051099006956 243.39519900131222L 356.6825285236515 243.39519900131222" pathFrom="M 356.6825285236515 243.39519900131222L 356.6825285236515 243.39519900131222L 372.40051099006956 243.39519900131222L 372.40051099006956 243.39519900131222L 356.6825285236515 243.39519900131222" cy="130.82491946320533" cx="372.40051099006956" j="6" val="37" barHeight="112.57027953810689" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1227" d="M 414.6893685782895 243.39519900131222L 414.6893685782895 179.50395926346778L 430.4073510447075 179.50395926346778L 430.4073510447075 243.39519900131222L 414.6893685782895 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 414.6893685782895 243.39519900131222L 414.6893685782895 179.50395926346778L 430.4073510447075 179.50395926346778L 430.4073510447075 243.39519900131222L 414.6893685782895 243.39519900131222" pathFrom="M 414.6893685782895 243.39519900131222L 414.6893685782895 243.39519900131222L 430.4073510447075 243.39519900131222L 430.4073510447075 243.39519900131222L 414.6893685782895 243.39519900131222" cy="179.50395926346778" cx="430.4073510447075" j="7" val="21" barHeight="63.89123973784445" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1228" d="M 472.69620863292744 243.39519900131222L 472.69620863292744 109.5278395505905L 488.4141910993455 109.5278395505905L 488.4141910993455 243.39519900131222L 472.69620863292744 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 472.69620863292744 243.39519900131222L 472.69620863292744 109.5278395505905L 488.4141910993455 109.5278395505905L 488.4141910993455 243.39519900131222L 472.69620863292744 243.39519900131222" pathFrom="M 472.69620863292744 243.39519900131222L 472.69620863292744 243.39519900131222L 488.4141910993455 243.39519900131222L 488.4141910993455 243.39519900131222L 472.69620863292744 243.39519900131222" cy="109.5278395505905" cx="488.4141910993455" j="8" val="44" barHeight="133.86735945072172" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1229" d="M 528.831860298706 243.39519900131222L 528.831860298706 176.46151927595136L 544.549842765124 176.46151927595136L 544.549842765124 243.39519900131222L 528.831860298706 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 528.831860298706 243.39519900131222L 528.831860298706 176.46151927595136L 544.549842765124 176.46151927595136L 544.549842765124 243.39519900131222L 528.831860298706 243.39519900131222" pathFrom="M 528.831860298706 243.39519900131222L 528.831860298706 243.39519900131222L 544.549842765124 243.39519900131222L 544.549842765124 243.39519900131222L 528.831860298706 243.39519900131222" cy="176.46151927595136" cx="544.549842765124" j="9" val="22" barHeight="66.93367972536086" barWidth="15.717982466418032"></path>
                                                <path id="SvgjsPath1230" d="M 586.838700353344 243.39519900131222L 586.838700353344 152.12199937582014L 602.556682819762 152.12199937582014L 602.556682819762 243.39519900131222L 586.838700353344 243.39519900131222" fill="rgba(151,103,253,0.85)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area" index="0" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 586.838700353344 243.39519900131222L 586.838700353344 152.12199937582014L 602.556682819762 152.12199937582014L 602.556682819762 243.39519900131222L 586.838700353344 243.39519900131222" pathFrom="M 586.838700353344 243.39519900131222L 586.838700353344 243.39519900131222L 602.556682819762 243.39519900131222L 602.556682819762 243.39519900131222L 586.838700353344 243.39519900131222" cy="152.12199937582014" cx="602.556682819762" j="10" val="30" barHeight="91.27319962549208" barWidth="15.717982466418032"></path>
                                                <g id="SvgjsG1219" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1231" class="apexcharts-line-series apexcharts-plot-series">
                                            <g id="SvgjsG1232" class="apexcharts-series" seriesName="Tablets" data:longestSeries="true" rel="1" data:realIndex="2">
                                                <path id="SvgjsPath1235" d="M 25.856421373329088 152.12199937582014C 46.15881539245238 152.12199937582014 63.56086740884377 167.33419931340217 83.86326142796706 167.33419931340217C 102.2009076387881 167.33419931340217 117.91889010520613 133.86735945072172 136.25653631602717 133.86735945072172C 156.55893033515045 133.86735945072172 173.96098235154187 152.12199937582014 194.26337637066516 152.12199937582014C 213.9108544536877 152.12199937582014 230.7515499534213 106.48539956307411 250.39902803644384 106.48539956307411C 270.70142205556715 106.48539956307411 288.10347407195854 136.90979943823814 308.4058680910818 136.90979943823814C 328.0533461741044 136.90979943823814 344.89404167383793 48.67903980026247 364.5415197568605 48.67903980026247C 384.84391377598376 48.67903980026247 402.24596579237516 85.18831965045928 422.54835981149847 85.18831965045928C 442.8507538306218 85.18831965045928 460.2528058470132 63.89123973784447 480.55519986613643 63.89123973784447C 500.20267794915895 63.89123973784447 517.0433734488926 133.86735945072172 536.6908515319151 133.86735945072172C 556.9932455510384 133.86735945072172 574.3952975674298 124.74003948817253 594.6976915865531 124.74003948817253" fill="none" fill-opacity="1" stroke="rgba(241,180,76,1)" stroke-opacity="1" stroke-linecap="butt" stroke-width="4" stroke-dasharray="0" class="apexcharts-line" index="2" clip-path="url(#gridRectMaskqg5a98ku)" pathTo="M 25.856421373329088 152.12199937582014C 46.15881539245238 152.12199937582014 63.56086740884377 167.33419931340217 83.86326142796706 167.33419931340217C 102.2009076387881 167.33419931340217 117.91889010520613 133.86735945072172 136.25653631602717 133.86735945072172C 156.55893033515045 133.86735945072172 173.96098235154187 152.12199937582014 194.26337637066516 152.12199937582014C 213.9108544536877 152.12199937582014 230.7515499534213 106.48539956307411 250.39902803644384 106.48539956307411C 270.70142205556715 106.48539956307411 288.10347407195854 136.90979943823814 308.4058680910818 136.90979943823814C 328.0533461741044 136.90979943823814 344.89404167383793 48.67903980026247 364.5415197568605 48.67903980026247C 384.84391377598376 48.67903980026247 402.24596579237516 85.18831965045928 422.54835981149847 85.18831965045928C 442.8507538306218 85.18831965045928 460.2528058470132 63.89123973784447 480.55519986613643 63.89123973784447C 500.20267794915895 63.89123973784447 517.0433734488926 133.86735945072172 536.6908515319151 133.86735945072172C 556.9932455510384 133.86735945072172 574.3952975674298 124.74003948817253 594.6976915865531 124.74003948817253" pathFrom="M -1 243.39519900131222L -1 243.39519900131222L 83.86326142796706 243.39519900131222L 136.25653631602717 243.39519900131222L 194.26337637066516 243.39519900131222L 250.39902803644384 243.39519900131222L 308.4058680910818 243.39519900131222L 364.5415197568605 243.39519900131222L 422.54835981149847 243.39519900131222L 480.55519986613643 243.39519900131222L 536.6908515319151 243.39519900131222L 594.6976915865531 243.39519900131222"></path>
                                                <g id="SvgjsG1233" class="apexcharts-series-markers-wrap">
                                                    <g class="apexcharts-series-markers">
                                                        <circle id="SvgjsCircle1287" r="0" cx="0" cy="0" class="apexcharts-marker w4o529v1gf" stroke="#ffffff" fill="#f1b44c" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" default-marker-size="0"></circle>
                                                    </g>
                                                </g>
                                                <g id="SvgjsG1234" class="apexcharts-datalabels"></g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1281" x1="0" y1="0" x2="633.4823236465454" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1282" x1="0" y1="0" x2="633.4823236465454" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1283" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1284" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1285" class="apexcharts-point-annotations"></g>
                                        <rect id="SvgjsRect1288" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-zoom-rect"></rect>
                                        <rect id="SvgjsRect1289" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" class="apexcharts-selection-rect"></rect>
                                    </g>
                                    <rect id="SvgjsRect1192" width="0" height="0" x="0" y="0" rx="0" ry="0" fill="#fefefe" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"></rect>
                                    <g id="SvgjsG1255" class="apexcharts-yaxis" rel="0" transform="translate(34.51767635345459, 0)">
                                        <g id="SvgjsG1256" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1257" font-family="Helvetica, Arial, sans-serif" x="20" y="41.4" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">80</text><text id="SvgjsText1258" font-family="Helvetica, Arial, sans-serif" x="20" y="102.34879975032806" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">60</text><text id="SvgjsText1259" font-family="Helvetica, Arial, sans-serif" x="20" y="163.2975995006561" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">40</text><text id="SvgjsText1260" font-family="Helvetica, Arial, sans-serif" x="20" y="224.24639925098415" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">20</text><text id="SvgjsText1261" font-family="Helvetica, Arial, sans-serif" x="20" y="285.1951990013122" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;">0</text></g>
                                        <g id="SvgjsG1262" class="apexcharts-yaxis-title"><text id="SvgjsText1263" font-family="Helvetica, Arial, sans-serif" x="7.818456649780273" y="161.6975995006561" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="regular" fill="#373d3f" class="apexcharts-yaxis-title-text " style="font-family: Helvetica, Arial, sans-serif;" transform="rotate(-90 -7.420411109924316 158.0976104736328)">Points</text></g>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip light">
                                    <div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(151, 103, 253);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(223, 226, 230);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker" style="background-color: rgb(241, 180, 76);"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-label"></span><span class="apexcharts-tooltip-text-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom light">
                                    <div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 772px; height: 385px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 ">
                <div class="white_card card_height_100 mb_30 user_crm_wrapper">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="img/crm/businessman.svg" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2455</h4>
                                    <p>User Registrations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm ">
                                <div class="crm_head crm_bg_1 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="img/crm/customer.svg" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2455</h4>
                                    <p>User Registrations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_2 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="img/crm/infographic.svg" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2455</h4>
                                    <p>User Registrations</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single_crm">
                                <div class="crm_head crm_bg_3 d-flex align-items-center justify-content-between">
                                    <div class="thumb">
                                        <img src="img/crm/sqr.svg" alt="">
                                    </div>
                                    <i class="fas fa-ellipsis-h f_s_11 white_text"></i>
                                </div>
                                <div class="crm_body">
                                    <h4>2455</h4>
                                    <p>User Registrations</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crm_reports_bnner">
                        <div class="row justify-content-end ">
                            <div class="col-lg-6">
                                <h4>Create CRM Reports</h4>
                                <p>Outlines keep you and honest
                                    indulging honest.</p>
                                <a href="#">Read More <i class="fas fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="white_card card_height_100 mb_20 ">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Stoke Details</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body QA_section">
                        <div class="QA_table ">

                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <table class="table lms_table_active2 p-0 dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid" style="width: 314px;">
                                    <thead>
                                        <tr role="row">
                                            <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 148.2px;" aria-sort="ascending" aria-label="Product Name: activate to sort column descending">Product Name</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 105px;" aria-label="Market Price: activate to sort column ascending">Market Price</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Selling Price: activate to sort column ascending">Selling Price</th>
                                            <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Total Unite: activate to sort column ascending">Total Unite</th>
                                        </tr>
                                    </thead>
                                    <tbody>







                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_1.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_1">20</a></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_2.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_1">20</a></td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_3.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_1">20</a></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_4.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="color_text_6">210</a></td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_5.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_1">210</a></td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_6.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_5">200</a></td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td tabindex="0" class="sorting_1">
                                                <div class="customer d-flex align-items-center">
                                                    <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/pro_6.png" alt=""></div>
                                                    <span class="f_s_12 f_w_600 color_text_5">Product 1</span>
                                                </div>
                                            </td>
                                            <td class="f_s_12 f_w_400 color_text_6">$564</td>
                                            <td class="f_s_12 f_w_400 color_text_6" style="display: none;">$650</td>
                                            <td class="f_s_12 f_w_400 text-center" style="display: none;"><a href="#" class="text_color_5">200</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Recent activity</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="Activity_timeline">
                            <ul>
                                <li>
                                    <div class="activity_bell"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell "></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell bell_lite"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="activity_bell bell_lite"></div>
                                    <div class="timeLine_inner d-flex align-items-center">
                                        <div class="activity_wrap">
                                            <h6>5 min ago</h6>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Member request
                                    to mail.</h3>
                            </div>
                            <div class="header_more_tool">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        <i class="ti-more-alt"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"> <i class="ti-eye"></i> Action</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-trash"></i> Delete</a>
                                        <a class="dropdown-item" href="#"> <i class="fas fa-edit"></i> Edit</a>
                                        <a class="dropdown-item" href="#"> <i class="ti-printer"></i> Print</a>
                                        <a class="dropdown-item" href="#"> <i class="fa fa-download"></i> Download</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="thumb mb_30">
                            <img src="img/table.svg" alt="" class="img-fluid">
                        </div>
                        <div class="common_form">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <select class="nice_Select2 nice_Select_line wide" style="display: none;">
                                            <option value="1">Role</option>
                                            <option value="1">Role 1</option>
                                            <option value="1">Role2</option>
                                        </select>
                                        <div class="nice-select nice_Select2 nice_Select_line wide" tabindex="0"><span class="current">Role</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">Role</li>
                                                <li data-value="1" class="option">Role 1</li>
                                                <li data-value="1" class="option">Role2</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="create_report_btn mt_30">
                                            <a href="#" class="btn_1 radius_btn d-block text-center">Send the invitation link</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="row align-items-center">
                            <div class="col-lg-4">
                                <div class="main-title">
                                    <h3 class="m-0">Stoke Details</h3>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row justify-content-end">
                                    <div class="col-lg-8 d-flex justify-content-end">
                                        <div class="serach_field-area theme_bg d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search">
                                                    </div>
                                                    <button type="submit"> <img src="img/icon/icon_search.svg" alt=""> </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <select class="nice_Select2 wide" style="display: none;">
                                            <option value="1">Show by All</option>
                                            <option value="1">Show by A</option>
                                            <option value="1">Show by B</option>
                                        </select>
                                        <div class="nice-select nice_Select2 wide" tabindex="0"><span class="current">Show by All</span>
                                            <div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="Search..."></div>
                                            <ul class="list">
                                                <li data-value="1" class="option selected">Show by All</li>
                                                <li data-value="1" class="option">Show by A</li>
                                                <li data-value="1" class="option">Show by B</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body ">
                        <div class="row min_height_oveflow">
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb_30">
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil admin_bg d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Admin
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                                <div class="single_user_pil d-flex align-items-center justify-content-between">
                                    <div class="user_pils_thumb d-flex align-items-center">
                                        <div class="thumb_34 mr_15 mt-0"><img class="img-fluid radius_50" src="img/customers/1.png" alt=""></div>
                                        <span class="f_s_14 f_w_400 text_color_11">Jhon Smith</span>
                                    </div>
                                    <div class="user_info">
                                        Customer
                                    </div>
                                    <div class="action_btns d-flex">
                                        <a href="#" class="action_btn mr_10"> <i class="far fa-edit"></i> </a>
                                        <a href="#" class="action_btn"> <i class="fas fa-trash"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>