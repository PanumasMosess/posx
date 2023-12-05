<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSX <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('img/icon.png'); ?>" type="image/png" />

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

    <?php if (isset($css_critical)) {
        echo $css_critical;
    } ?>
    <script>
        var serverUrl = '<?php echo base_url(); ?>'
        var companies_id = '<?php echo session()->get('companies_id'); ?>'
        var valueMoney = '<?php echo getValueMoney()->valueMoney; ?>'
        var symbolValueMoney = '<?php echo getValueMoney()->symbolValueMoney; ?>'
    </script>
</head>

<body>
    <div class="white_card_body ">

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box">
                            <div class="page_title_left align-items-center text-center">
                                <h3 class="f_s_30 f_w_700 dark_text">Menu</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-5.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms -n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms -n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms -n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms -n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-2.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/02.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-1.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-4.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-5.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/img-5.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="white_card position-relative mb_20 ">
                            <div class="card-body">
                                <div class="ribbon1 rib1-primary"><span class="text-white text-center rib1-primary">50% off</span></div>
                                <img src="img/products/02.png" alt="" class="d-block mx-auto my-4" height="150">
                                <div class="row my-4">
                                    <div class="col"><span class="badge_btn_3  mb-1">Life Style</span> <a href="#" class="f_w_400 color_text_3 f_s_14 d-block">Unique Blue Bag</a></div>
                                    <div class="col-auto">
                                        <h4 class="text-dark mt-0">$49.00 <small class="text-muted font-14"><del>$99.00</del></small></h4>
                                        <ul class="list-inline mb-0 product-review align-self-center">
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star text-warning font-16 ms-n2"></i></li>
                                            <li class="list-inline-item"><i class="fas fa-star-half text-warning font-16 ms-n2"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button class="btn_2">Add To Cart</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/popper1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

    <script src="<?php echo base_url('vendors/parsleyjs/parsley.min.js'); ?>"></script>

    <!-- <script src="<?php //echo base_url('js/custom.js'); 
                        ?>"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
    <?php if (isset($js_critical)) {
        echo $js_critical;
    }; ?>
</body>

</html>