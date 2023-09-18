<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>POSX <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('img/mini_logo.png'); ?>" type="image/png" />

    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap1.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/themefy_icon/themify-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/niceselect/css/nice-select.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/owl_carousel/css/owl.carousel.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/gijgo/gijgo.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/font_awesome/css/all.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/tagsinput/tagsinput.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/datepicker/date-picker.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/vectormap-home/vectormap-2.0.2.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/scroll/scrollable.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/jquery.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/responsive.dataTables.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('vendors/datatable/css/buttons.dataTables.min.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/text_editor/summernote-bs4.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/morris/morris.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('vendors/material_icon/material-icons.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/metisMenu.css'); ?>" />

    <link rel="stylesheet" href="<?php echo base_url('css/style1.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/colors/default.css'); ?>" id="colorSkinCSS" />
    <!-- iziToast css -->
    <link href="<?php echo base_url('css/izitoast/iziToast.min.css'); ?>" rel="stylesheet">
    <!-- Plugins css -->
    <link href="<?php echo base_url('/css/plugins.css'); ?>" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">

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
    </script>
    <style>
        .disabled {
            pointer-events: none;
            opacity: 0.6;
        }
    </style>
</head>

<body class="crm_body_bg">
    <nav class="sidebar" id="nav_theme">
        <div class="logo d-flex justify-content-between">
            <a class="large_logo" href="index.html"><img src="https://cdn.discordapp.com/attachments/1101414559291551784/1146749543426306049/373452635_316968594334061_9160180745837028469_n.jpg" alt /></a>
            <a class="small_logo" href="index.html"><img src="<?php echo base_url('img/mini_logo.png'); ?>" alt /></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">

            <li class="">
                <a href="<?php echo base_url(); ?>" aria-expanded="false">
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

            <li class="mm-<?php if (service('uri')->getSegment(1) == 'order') {
                                echo 'active';
                            } ?>">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/20.svg'); ?>" alt />
                    </div>
                    <div class="nav_title">
                        <span>การขาย</span>
                    </div>
                </a>
                <ul>
                    <li><a href="<?php echo base_url('/order/order_manage'); ?>">Manage Orders</a></li>
                </ul>
                <ul>
                    <li><a href="<?php echo base_url('/order/order_pos'); ?>">Orders POS</a></li>
                </ul>
            </li>

            <li class="disabled">
                <a href="navs.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/11.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span>รายจ่าย</span>
                    </div>
                </a>
            </li>

            <li class="">
                <a href="<?php echo base_url('/stock/index'); ?>" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/13.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span>สต็อก</span>
                    </div>
                </a>
            </li>

            <li class="disabled">
                <a href="navs.html" aria-expanded="false">
                    <div class="nav_icon_small">
                        <img src="<?php echo base_url('img/menu-icon/11.svg'); ?>" alt="">
                    </div>
                    <div class="nav_title">
                        <span>รายงาน</span>
                    </div>
                </a>
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
                                <li>
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
                                </li>
                            </div>
                            <div class="profile_info">
                                <img src="<?php echo base_url('img/client_img.png'); ?>" alt="#" />
                                <div class="profile_info_iner">
                                    <div class="profile_author_name">
                                        <p><?php echo session()->get('employee_position_name'); ?></p>
                                        <h5><?php echo session()->get('username'); ?></h5>
                                    </div>
                                    <div class="profile_info_details">
                                        <a href="<?php echo base_url('/setting/index'); ?>"><i class="fas fa-cog"></i> ตั้งค่า </a>
                                        <a href="#" class="disabled"><i class="fas fa-plus-circle"></i> เพิ่มวัน </a>
                                        <a href="#" class="disabled"><i class="fas fa-laptop"></i> Remote Support </a>
                                        <a href="#" class="disabled"><i class="fas fa-question-circle"></i> คู่มือ </a>
                                        <a href="#" class="disabled"><i class="fas fa-envelope"></i> รายงานบัค </a>
                                        <hr>
                                        <a href="<?php echo base_url('/logout'); ?>"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>