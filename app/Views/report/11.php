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

            <div id="report-by-hour-container" style="display: inline-block;">

                <template type="text/x-template" id="picker">
                    <div class="datepicker">
                        <span class="datepicker__icon">
                            <i class="fa fa-calendar fa-fw"></i>
                        </span>

                        <input v-bind:id="keydate" class="datepicker__input" type="text" v-model="date">
                    </div>



                </template>


                <div id="app-add-by-hour">
                    <div class="col-md-12" style="margin-top: -20px;">
                        <h4><span>เริ่มวันที่ </span>
                            <div class="datepicker"><span class="datepicker__icon"><i class="fa fa-calendar fa-fw"></i></span> <input id="dateFrom" type="text" class="datepicker__input"></div> <span> ถึง </span>
                            <div class="datepicker"><span class="datepicker__icon"><i class="fa fa-calendar fa-fw"></i></span> <input id="dateTo" type="text" class="datepicker__input"></div> <button class="btn btn-primary" style="padding: 5px 22px; position: relative; top: -1px; left: -9px;"> Submit </button> <span>1 days</span>
                        </h4>
                        <div id="example"></div> <span style="color: gray; margin-top: 15px;">ตัวเลขในวงเล็บคือ จำนวนบิล( Qty )</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>