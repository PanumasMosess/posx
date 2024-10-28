<style>
.custom-note {
    background-color: #e0f7fa; /* พื้นหลังฟ้าอ่อน */
    border-left: 5px solid #0288d1; /* เส้นขอบด้านซ้ายสีฟ้า */
    padding: 15px;
    color: #01579b; /* สีข้อความฟ้าเข้ม */
    font-weight: bold;
    border-radius: 5px;
    margin-bottom: 20px;
}
</style>
<?php if (getCompanies()['companies']->packet_id == 1) {
    $month_1 = '590';   // เดือนที่ 1
    $month_2 = '1180';  // 590 * 2
    $month_3 = '1770';  // 590 * 3
    $month_4 = '2360';  // 590 * 4
    $month_5 = '2950';  // 590 * 5
    $month_6 = '3540';  // 590 * 6
    $month_7 = '4130';  // 590 * 7
    $month_8 = '4720';  // 590 * 8
    $month_9 = '5310';  // 590 * 9
    $month_10 = '5900'; // 590 * 10
    $month_11 = '6490'; // 590 * 11
    $month_12 = '7080'; // 590 * 12
} elseif (getCompanies()['companies']->packet_id == 2) {
    $month_1 = '890';    // เดือนที่ 1
    $month_2 = '1780';   // 890 * 2
    $month_3 = '2670';   // 890 * 3
    $month_4 = '3560';   // 890 * 4
    $month_5 = '4450';   // 890 * 5
    $month_6 = '5340';   // 890 * 6
    $month_7 = '6230';   // 890 * 7
    $month_8 = '7120';   // 890 * 8
    $month_9 = '8010';   // 890 * 9
    $month_10 = '8900';  // 890 * 10
    $month_11 = '9790';  // 890 * 11
    $month_12 = '10680'; // 890 * 12
} else {
    $month_1 = '1390';    // เดือนที่ 1
    $month_2 = '2780';    // 1390 * 2
    $month_3 = '4170';    // 1390 * 3
    $month_4 = '5560';    // 1390 * 4
    $month_5 = '6950';    // 1390 * 5
    $month_6 = '8340';    // 1390 * 6
    $month_7 = '9730';    // 1390 * 7
    $month_8 = '11120';   // 1390 * 8
    $month_9 = '12510';   // 1390 * 9
    $month_10 = '13900';  // 1390 * 10
    $month_11 = '15290';  // 1390 * 11
    $month_12 = '16680';  // 1390 * 12
} ?>
<div class="main_content_iner">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="white_card_header">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">เพิ่มวัน POSX</h3>
                    </div>
                </div>
                <div class="white_card_body">
                    <div class="tab-content" id="settingTabContent">
                        <div class="main_content_iner ">
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-md-12">
                                    <div class="white_card card_height_100 mb_20">
                                        <div class="white_card_header">
                                            <div class="box_header m-0">
                                                <div class="main-title">
                                                    <h3 class="m-0">บัญชี</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="white_card_body">
                                            <div id="transfer-banks" class="well">
                                                <table class="table" style="margin: 0 auto;">
                                                    <thead>
                                                        <tr>
                                                            <td>ธนาคาร</td>
                                                            <td>ชื่อบัญชี</td>
                                                            <td>สาขา</td>
                                                            <td>เลขที่บัญชี</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>ธ.กสิกรไทย (K-Bank)</td>
                                                            <td>บริษัท อัพ ดิจิตอล จำกัด </td>
                                                            <td>ชลบุรี</td>
                                                            <td>XXX-X-XXXXX-X</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="custom-note mt-2">
                                                ในกรณีต้องการเปลี่ยน Package ใช้งาน กรุณาติดต่อพนักงานขาย
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12">
                                    <div class="white_card card_height_100 mb_20">
                                        <div class="white_card_header">
                                            <div class="box_header m-0">
                                                <div class="main-title">
                                                    <h3 class="m-0">ชำระค่าบริการ</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="white_card_body">
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">วิธีการชำระค่าบริการ</div>
                                                </div>
                                                <select class="form-select" name="payment_type" id="payment_type">
                                                    <option value="0">โอนเงินผ่านธนาคาร</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวนเดือน</div>
                                                </div>
                                                <select class="form-select" name="months" id="months" onchange="updatePrice()">
                                                    <option value="1" data-price="<?php echo number_format($month_1) ?>">1 เดือน</option>
                                                    <option value="2" data-price="<?php echo number_format($month_2) ?>">2 เดือน</option>
                                                    <option value="3" data-price="<?php echo number_format($month_3) ?>">3 เดือน</option>
                                                    <option value="4" data-price="<?php echo number_format($month_4) ?>">4 เดือน</option>
                                                    <option value="5" data-price="<?php echo number_format($month_5) ?>">5 เดือน</option>
                                                    <option value="6" data-price="<?php echo number_format($month_6) ?>">6 เดือน</option>
                                                    <option value="7" data-price="<?php echo number_format($month_7) ?>">7 เดือน</option>
                                                    <option value="8" data-price="<?php echo number_format($month_8) ?>">8 เดือน</option>
                                                    <option value="9" data-price="<?php echo number_format($month_9) ?>">9 เดือน</option>
                                                    <option value="10" data-price="<?php echo number_format($month_10) ?>">10 เดือน</option>
                                                    <option value="11" data-price="<?php echo number_format($month_11) ?>">11 เดือน</option>
                                                    <option value="12" data-price="<?php echo number_format($month_12) ?>">12 เดือน</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">ยอดเงิน</div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="ยอดเงิน" aria-label="amount" id="amount" aria-describedby="basic-addon1" readonly>
                                                <div class="input-group-text">
                                                    <span class="">บาท</span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">วันที่โอน / Date</div>
                                                </div>
                                                <input type="text" class="datepicker-here float-end form-control flatpickr-input text-center digits" id="datepicker" name="datepicker" placeholder="<?php echo date('Y/m/d') ?>" readonly="readonly" data-language="en">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">เวลาที่โอน / Time</div>
                                                </div>
                                                <input type="text" class="float-end form-control flatpickr-input text-center digits" id="datepicker_time" name="datepicker_time" placeholder="<?php echo date('H:i') ?>" readonly="readonly" data-language="en">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">ธนาคารปลายทาง</div>
                                                </div>
                                                <select class="form-select" name="bank" id="bank">
                                                    <option value="0">กสิกรไทย</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">จำนวนเงินที่โอน (บาท)</div>
                                                </div>
                                                <input type="number" class="form-control" placeholder="0.00" aria-label="transfer_money" id="transfer_money" aria-describedby="basic-addon1">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">ชื่อร้าน</div>
                                                </div>
                                                <input type="text" class="form-control" id="companies_name" placeholder="ชื่อร้าน" value="<?php echo $companies->companies_name; ?>" readonly>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-text">
                                                    <div class="">หมายเหตุ</div>
                                                </div>
                                                <textarea type="text" class="form-control" id="remark"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" href="#" id="AddPayment" style="float: right; margin-top: -18px;">ส่งข้อมูลชำระ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const accountType = "<?php echo getCompanies()['companies']->packet_id; ?>";
</script>