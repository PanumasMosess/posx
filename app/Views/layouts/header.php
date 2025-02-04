<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>POSX <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('img/icon.png'); ?>" type="image/png" />

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap1.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/themefy_icon/themify-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/niceselect/css/nice-select.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/owl_carousel/css/owl.carousel.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/gijgo/gijgo.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/font_awesome/css/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/tagsinput/tagsinput.css'); ?>" />

    <!-- <link rel="stylesheet" href="<?php echo base_url('vendors/datepicker/date-picker.css'); ?>" /> -->
    <link rel="stylesheet" href="<?php echo base_url('vendors/vectormap-home/vectormap-2.0.2.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/scroll/scrollable.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/jquery.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/responsive.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/buttons.dataTables.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/text_editor/summernote-bs4.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/morris/morris.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/material_icon/material-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/image-uploader.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('css/metisMenu.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/style1.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/colors/default.css'); ?>" id="colorSkinCSS" />
    <!-- iziToast css -->
    <link href="<?php echo base_url('css/izitoast/iziToast.min.css'); ?>" rel="stylesheet">
    <!-- Plugins css -->
    <link href="<?php echo base_url('/css/plugins.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('/js/qz-tray.js'); ?>"></script>
    <script src="https://cdn.rawgit.com/kjur/jsrsasign/c057d3447b194fa0a3fdcea110579454898e093d/jsrsasign-all-min.js"></script>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

    <!-- เรียกใช้ Google Translate Element -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <style>
        /** BASE **/
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <?php if (isset($css_critical)) {
        echo $css_critical;
    } ?>
    <style type="text/css">
        div.scroll {
            width: 100%;
            overflow-x: auto;
        }
    </style>
    <script>
        var serverUrl = '<?php echo base_url(); ?>'
        var companies_id = '<?php echo session()->get('companies_id'); ?>'
        var valueMoney = '<?php echo getValueMoney()->valueMoney; ?>'
        var symbolValueMoney = '<?php echo getValueMoney()->symbolValueMoney; ?>'
        var pusher_key = '<?php echo getenv('pusher_Key'); ?>'
        var pusher_cluster = '<?php echo getenv('pusher_cluster'); ?>'
    </script>
    <script src="<?php echo base_url('/js/QZ_cer/sign-message' . session()->get('companies_id') . '.js?v=' . time()); ?>"></script>
    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
    <style>
        /* .Menu_NOtification_Wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            bottom: -100%;
            /* ให้เป็น -100% เพื่อซ่อนเนื้อหาเมื่อไม่ active */
        /* width: 100%; */
        /* height: auto; */
        /* ลบค่าความสูง */
        /* transition: bottom 0.3s; */
        /* เพิ่ม transition บนคุณสามารถปรับค่าความเร็วการเคลื่อนไหวตามความต้องการ */
        /* }  */

        .header_iner .header_right .header_notification_warp {
            margin-right: 25px;
        }
    </style>

    <style>
        /* Floating chat icon */
        #chat-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1000;
        }

        #chat-icon {
            width: 50px;
            height: 50px;
            background-color: #007bff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Chat window */
        #chat-window {
            position: absolute;
            bottom: 70px;
            right: 0;
            width: 300px;
            height: 400px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: none;
            /* เริ่มต้นซ่อน */
            flex-direction: column;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        #chat-header {
            background: #007bff;
            color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: bold;
        }

        #chat-header button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }

        #chat-body {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            font-size: 14px;
            border-top: 1px solid #ddd;
        }

        #chat-footer {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        #chat-footer input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        #chat-footer button {
            margin-left: 5px;
            padding: 8px 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <?php
    $expiryDateTime  = new DateTime(getCompanies()['companies']->packet_exp_date);
    $currentDateTime  = new DateTime();
    $interval = $currentDateTime->diff($expiryDateTime);
    // ตรวจสอบว่าหมดอายุแล้วหรือไม่
    if ($expiryDateTime < $currentDateTime) {
        // วันที่หมดอายุแล้ว
        $disabled = 'disabled';
    } else {
        // วันที่ยังไม่หมดอายุ
        $disabled = '';
    }
    ?>
</head>

<body class="crm_body_bg">
    <nav class="sidebar" id="nav_theme">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="<?php echo base_url('/dashboard'); ?>"><img src="<?php echo base_url('img/POSX_2.png'); ?>" alt /></a>
            <a class="small_logo" href="<?php echo base_url('/dashboard'); ?>"><img src="<?php echo base_url('img/icon.png'); ?>" alt /></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">

            <li class="">
                <a href="<?php echo base_url('/dashboard');  ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/dashboard.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span>Home</span>
                    </div>
                </a>
            </li>
            <!-- 
            <li class="mm-<?php if (service('uri')->getSegment(1) == 'stock') {
                                echo 'active';
                            } ?>">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/11.svg'); ?>" alt />
                    </div>
                    <div class="nav_title">
                        <span>Themes</span>
                    </div>
                </a>
                <ul>
                    <li><a href="javascript:void(0);" onclick="themesChangeDark();return false;">เมนูมืด</a></li>
                    <li><a href="javascript:void(0);" onclick="themesChangeLight();return false;">เมนูสว่าง</a></li>
                </ul>
            </li> -->
<!-- 
            <li class="mm-<php if (service('uri')->getSegment(1) == 'order') {
                                echo 'active';
                            } ?>">
                <a class="has-arrow <php echo $disabled ?>" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<php echo base_url('img/menu-icon/20.svg'); ?>" alt />
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='SALE'>การขาย</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<php echo base_url('/order/order_manage'); ?>" class="<php echo $disabled ?>">Manage Orders</a></li>
                </ul>
                <ul>
                    <li><a href="<php echo base_url('/order/order_pos'); ?>" class="<php echo $disabled ?>">Orders POS</a></li>
                </ul>
            </li> -->

            <li class="mm-<?php if (service('uri')->getSegment(1) == 'order') {
                                echo 'active';
                            } ?>">
                <a href="<?php echo base_url('/order/order_pos'); ?>" aria-expanded="false" class="<?php echo $disabled ?>">
                <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/20.svg'); ?>" alt />
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='SALE'>การขาย</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="<?php echo base_url('/expense/index'); ?>" aria-expanded="false" class="<?php echo $disabled ?>">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/11.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='PAYMENT'>รายจ่าย</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="<?php echo base_url('/stock/index'); ?>" aria-expanded="false" class="<?php echo $disabled ?>">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/13.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='STOCK'>สต็อก</span>
                    </div>
                </a>
            </li>

            <li class="mm-<?php if (service('uri')->getSegment(1) == 'report') {
                                echo 'active';
                            } ?>">
                <a href="<?php echo base_url('/report'); ?>" aria-expanded="false" class="<?php echo $disabled ?>">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/11.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='REPORT'>รายงาน</span>
                    </div>
                </a>
            </li>

            <li class="mm-<?php if (service('uri')->getSegment(1) == 'manager') {
                                echo 'active';
                            } ?>">
                <a class="has-arrow <?php echo $disabled ?>" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/20.svg'); ?>" alt />
                    </div>
                    <div class="nav_title">
                        <span class="lang" key='MANAGER'>ผู้จัดการ</span>
                    </div>
                </a>
                <ul class="<?php echo $disabled ?>">
                    <li><a href="<?php echo base_url('/manager/index'); ?>" class="lang" key='MENU'>เมนู</a></li>
                </ul>
                <ul class="disabled">
                    <li><a href="<?php echo base_url('/manager/edit_bill'); ?>" class="lang" key='BIIL_UPDATE'>แก้ไขบิล</a></li>
                </ul>
                <ul class="<?php echo $disabled ?>">
                    <li><a href="<?php echo base_url('/manager/setting_tv'); ?>" class="lang" key='SETTING_TY'>ตั้งค่า TV</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="line_icon open_miniSide d-none d-lg-block">
                            <img src="<?php echo base_url('img/line_img.png'); ?>" alt />
                        </div>
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search" />
                                    </div>
                                    <button type="submit">
                                        <img src="<?php echo base_url('img/icon/icon_search.svg'); ?>" alt />
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="header_notification_warp d-flex align-items-center">
                                <!--   <li>
                               <a class="bell_notification_clicker" href="#">
                                        <img src="<?php echo base_url('img/icon/bell.svg'); ?>" alt />
                                        <span>2</span>
                                    </a>
                                    <div class="Menu_NOtification_Wrap">
                                        <div class="notification_Header">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="Notification_body">
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/2.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Cool Marketing</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/4.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/3.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/2.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Cool Marketing</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/4.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>Awesome packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb">
                                                    <a href="#"><img src="<?php echo base_url('img/staf/3.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content">
                                                    <a href="#">
                                                        <h5>what a packages</h5>
                                                    </a>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nofity_footer">
                                            <div class="submit_button text-center pt_20">
                                                <a href="#" class="btn_1">See More</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a class="CHATBOX_open" href="#">
                                        <img src="<?php echo base_url('img/icon/msg.svg'); ?>" alt /> <span>2</span>
                                    </a>
                                </li> -->

                                <li>
                                    <a class="bell_notification_clicker" href="#">
                                        <img src="<?php echo base_url('img/icon/world.svg'); ?>" alt />
                                    </a>
                                    <div class="Menu_NOtification_Wrap" style="width: 190px;">
                                        <div class="notification_Header">
                                            <h4>Select Language</h4>
                                        </div>
                                        <div class="Notification_body" style="height: 130px;">

                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb translate">
                                                    <a href="javascript:void(0);" id="th" class="translate"><img src="<?php echo base_url('img/icon2/thai.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content translate">
                                                    <a href="javascript:void(0);" id="th" class="translate">
                                                        <h5>TH</h5>
                                                    </a>

                                                </div>
                                            </div>
                                            <div class="single_notify d-flex align-items-center">
                                                <div class="notify_thumb translate">
                                                    <a href="javascript:void(0);" id="en" class="translate"><img src="<?php echo base_url('img/icon2/endland.png'); ?>" alt /></a>
                                                </div>
                                                <div class="notify_content translate">
                                                    <a href="javascript:void(0);" id="en" class="translate">
                                                        <h5>EN</h5>
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
                            <!-- <div class="header_notification_warp d-flex align-items-center">
                                <li>
                                    <a class="bell_notification_clicker" href="javascript:void(0);" onclick="chanheLanguage();">
                                        <img src="<?php echo base_url('img/icon/world.svg'); ?>" alt />
                                    </a>
                                    <div class="Menu_NOtification_Wrap">
                                        <div id="google_translate_element"></div>
                                    </div>
                                </li>
                            </div> -->
                            <div class="profile_info">
                                <img src="<?php echo base_url('img/man.png'); ?>" alt="#" />
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p><?php echo session()->get('employee_position_name'); ?></p>
                                        <h5><?php echo session()->get('username'); ?></h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="<?php echo base_url('/setting/index'); ?>" class="<?php echo $disabled ?>"><i class="fas fa-cog"></i>
                                            <front class='lang' key='SETTING'>ตั้งค่า</front>
                                        </a>
                                        <a href="<?php echo base_url('/payment/index'); ?>" class="<?php echo $disabled ?>"><i class="fas fa-plus-circle"></i>
                                            <front class='lang' key='ADD_DATE'>เพิ่มวัน</front>
                                        </a>
                                        <a href="#" class="disabled"><i class="fas fa-laptop"></i>
                                            <front class='lang' key='REMOTE_SUPPORT'>Remote Support</front>
                                        </a>
                                        <a id="tv_board" target="_blank" class="<?php echo $disabled ?>"><i class="fas fa-laptop"></i>
                                            <front class='lang' key='TV_POSX'>TV Board</front>
                                        </a>
                                        <a href="#" class="disabled"><i class="fas fa-question-circle"></i>
                                            <front class='lang' key='MANUAL'>คู่มือ</front>
                                        </a>
                                        <a href="#" class="disabled"><i class="fas fa-envelope"></i>
                                            <front class='lang' key='REPORT_BUG'>รายงานบัค</front>
                                        </a>
                                        <hr>
                                        <a href="<?php echo base_url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i>
                                            <front class='lang' key='LOGOUT'>ออกจากระบบ</front>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>