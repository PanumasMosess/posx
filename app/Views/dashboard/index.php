<div class="main_content_iner overly_inner">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="page_title_box d-flex flex-wrap align-items-center justify-content-between">
                    <div class="page_title_left d-flex align-items-center">
                        <h3 class="f_s_25 f_w_700 dark_text mr_30">Dashboard</h3>
                        <!-- <ol class="breadcrumb page_bradcam mb-0">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0);">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Analytic</li>
                        </ol> -->
                    </div>
                    <div class="page_title_right">
                        <!-- <div class="page_date_button d-flex align-items-center">
                            <img src="img/icon/calender_icon.svg" alt />
                            August 1, 2020 - August 31, 2020
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ซ้าย -->
            <div class="col-xl-8">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">User</h3>
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
                                    <div class="col-lg-12">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="UserName / Email" value="<?php echo session()->get('username'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="Name" value="<?php echo session()->get('name'); ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="common_input mb_15">
                                            <input type="text" placeholder="Role" value="<?php echo session()->get('role'); ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <hr>
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Package</h3>
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
                        <div class="Sales_Details_plan">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/2.svg" alt="">
                                            </div>
                                            <div>
                                                <h5>-</h5>
                                                <span>หมดอายุ</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="single_plan d-flex align-items-center justify-content-between">
                                        <div class="plan_left d-flex align-items-center">
                                            <div class="thumb">
                                                <img src="img/icon2/1.svg" alt="">
                                            </div>
                                            <div>
                                                <h5><?php echo session()->get('packet_it'); ?></h5>
                                                <span>Package</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ขวา -->
            <div class="col-xl-4">
                <div class="white_card mb_30 user_crm_wrapper">
                    <div class="crm_reports_bnner">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <h4>ตั้งค่า</h4>
                                <p>ตั้งค่าการใช้งานต่าง ๆ.</p>
                                <a href="<?php echo base_url('setting/index'); ?>">คลิก <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card mb_30 user_crm_wrapper disabled">
                    <div class="crm_reports_bnner">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <h4>เพิ่มวัน</h4>
                                <p>เพิ่มวันการใช้งานระบบ POSX</p>
                                <a href="#">คลิก <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card mb_30 user_crm_wrapper">
                    <div class="crm_reports_bnner">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <h4>คู่มือ</h4>
                                <p>อ่านคู่มือการใช้งานระบบ POSX.</p>
                                <a href="#">Read More <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="white_card mb_30 user_crm_wrapper">
                    <div class="crm_reports_bnner" style="background-image: url('https://preview.keenthemes.com/metronic8/demo2/assets/media/patterns/header-bg.jpg');">
                        <div class="row justify-content-end">
                            <div class="col-lg-6">
                                <h4>ติดตั้งโปรแกรมเสริม</h4>
                                <p>ติดตั้งโปรแกรมเสริม ปลั้กอินต่าง ๆ.</p>
                                <a href="#">คลิก <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SECTION  -->
    </div>
</div>