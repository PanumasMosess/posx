<div class="builder_select">
    <div class="board_wrapper">
        <div class="single_board">
            <div class="main_board_card" id="orderDashboard">

                <div class="row">
                    <div class="col-6">
                        <div class="row mb-3">
                            <div class="col-auto">
                                <label for="View" class="form-label">View</label>
                                <select id="View" class="form-control" style="display: inline-block; width: 80%;">
                                    <option selected="" value="Bills">Bills</option>
                                    <option value="Detail">Detail</option>
                                </select>
                            </div>
                            <!-- <div class="col-auto">
                                                                <label for="Shift" class="form-label">Shift</label>
                                                                <select id="Shift" class="form-control" style="display: inline-block; width: 80%;">
                                                                    <option selected="" value="All">All</option>
                                                                    <option value="Shift 1">Shift 1</option>
                                                                </select>
                                                            </div> -->
                        </div>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <button class="outTerminal btn btn-primary">ออกจากโหมด Terminal</button>
                        <button class="reload btn btn-primary"><i class="fas fa-sync-alt"></i> Reloard</button>
                    </div>
                </div>

                <div class="row">

                    <div id="dashboard-summary-1" class="col-md-3">
                        <div class="email-sidebar white_box">
                            <div class="row align-items-center justify-content-between flex-wrap">
                                <div class="col-lg-4">
                                    <div class="main-title">
                                        <h3 class="m-0">Summary</h3>
                                        <!-- <h3 class="m-0">Live data</h3> -->
                                    </div>
                                </div>
                                <div class="col-lg-4 text-end d-flex justify-content-end" id="orderDashboardMode">
                                    <button class="btn btn-primary btn-sm" data-mode="live"><i class="fab fa-codiepie"></i> Live</button>
                                    <button class="btn btn-primary btn-sm" data-mode="paid" style="display: none;">Paid</button>
                                </div>
                            </div>

                            <hr>

                            <ul id="orderDashboardMenuViewSummary" class="text-start mt-2">
                                <li class=""><a href="#"><span> <span>TOTAL</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li><a href="#"> <span> <span>DISCOUNT ITEMS</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li><a href="#"> <span> <span>SERVICE</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li><a href="#"> <span> <span>DISCOUNT BILL</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li><a href="#"> <span> <span>CREDITCARD CHARGE</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li><a href="#"> <span> <span>VAT</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <hr>
                                <li><a href="#"><i class="ti-pin2"></i> <span> <span>GRAND TOTAL</span> <span class="round_badge">0.00</span> </span> </a></li>
                            </ul>

                            <ul id="orderDashboardMenuViewLive" class="text-start mt-2" style="display: none;">
                                <li class=""><a href="#"><span> <span>LIVE TABLES</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li class="disabled"><a href="#"> <span> <span>LIVE TOGO</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <li class="disabled"><a href="#"> <span> <span>LIVE DELIVERY</span> <span class="round_badge">0.00</span> </span> </a></li>
                                <hr>
                                <li><a href="#"><i class="ti-pin2"></i> <span> <span>SUM</span> <span class="round_badge">0.00</span> </span> </a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="dashboard-summary-2" class="col-md-9">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Receipts</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="" id="orderDashboardFilter">
                                        <button class="btn btn-primary btn-sm" data-title="Receipt">Receipt 0 bills.</button>
                                        <button class="btn btn-primary btn-sm" data-title="Voided Receipt">Voided Receipt 0 bills.</button>
                                        <button class="btn btn-primary btn-sm" data-title="Unsync">Unsync Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer text-center">
                                    NO DATA
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="dashboard-summary-3" class="col-md-3" style="display: none;">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Detail</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="" id="">
                                        <button class="btn btn-primary btn-sm" data-title="Type">Type</button>
                                        <button class="btn btn-primary btn-sm" data-title="Group">Group</button>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer text-center">
                                    NO DATA
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dashboard-summary-4" class="col-md-3" style="display: none;">
                        <div class="white_box QA_section mb_30">
                            <div class="white_box_tittle list_header">
                                <h4>Best Sellers</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="" id="">
                                        <button class="btn btn-primary btn-sm" data-title="Sales">Sales</button>
                                        <button class="btn btn-primary btn-sm" data-title="Qty">Qty</button>
                                        <button class="btn btn-primary btn-sm" data-title="Group">Group</button>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer text-center">
                                    NO DATA
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="dashboard-summary-5" class="col-md-3" style="display: none;">
                        <div class="white_box QA_section mb_30" style="background: #BB2525; color: #fff;">
                            <div class="white_box_tittle list_header">
                                <h4 style="color: #fff;">Void Items</h4>
                                <div class="box_right d-flex lms_block">
                                    <div class="" id="">
                                        <button class="btn btn-primary btn-sm" data-title="Reload">Reload</button>
                                    </div>
                                </div>
                            </div>
                            <div class="QA_table ">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer text-center">
                                    NO DATA
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>