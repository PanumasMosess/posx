<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>
                        <span id="copyrightYear"></span>© DEVELOP BY <a href="#"> POSX</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<div id="back-top" style="display: none">
    <a title="Go to Top" href="#">
        <i class="ti-angle-up"></i>
    </a>
</div>

<?php echo $this->include('/layouts/partials/_modal'); ?>

<script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

<script src="<?php echo base_url('js/popper1.min.js'); ?>"></script>

<script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

<script src="<?php echo base_url('js/metisMenu.js'); ?>"></script>

<script src="<?php echo base_url('vendors/count_up/jquery.waypoints.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/chartlist/Chart.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/count_up/jquery.counterup.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/niceselect/js/jquery.nice-select.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/owl_carousel/js/owl.carousel.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/datatable/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/buttons.flash.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datatable/js/buttons.print.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/datepicker/datepicker.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datepicker/datepicker.en.js'); ?>"></script>
<script src="<?php echo base_url('vendors/datepicker/datepicker.custom.js'); ?>"></script>
<script src="<?php echo base_url('js/chart.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chartjs/roundedBar.min.js'); ?>"></script>

<script src="<?php echo base_url('vendors/progressbar/jquery.barfiller.js'); ?>"></script>

<script src="<?php echo base_url('vendors/tagsinput/tagsinput.js'); ?>"></script>

<script src="<?php echo base_url('vendors/text_editor/summernote-bs4.js'); ?>"></script>
<script src="<?php echo base_url('vendors/am_chart/amcharts.js'); ?>"></script>

<script src="<?php echo base_url('vendors/scroll/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/scroll/scrollable-custom.js'); ?>"></script>

<script src="<?php echo base_url('vendors/vectormap-home/vectormap-2.0.2.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/vectormap-home/vectormap-world-mill-en.js'); ?>"></script>

<script src="<?php echo base_url('vendors/apex_chart/apex-chart2.js'); ?>"></script>
<script src="<?php echo base_url('vendors/apex_chart/apex_dashboard.js'); ?>"></script>

<script src="<?php echo base_url('vendors/chart_am/core.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chart_am/charts.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chart_am/animated.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chart_am/kelly.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chart_am/chart-custom.js'); ?>"></script>

<script src="<?php echo base_url('vendors/parsleyjs/parsley.min.js'); ?>"></script>

<script src="<?php echo base_url('js/dashboard_init.js'); ?>"></script>
<script src="<?php echo base_url('js/custom.js'); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('/js/qz-tray.js'); ?>"></script>
<script src="https://cdn.rawgit.com/kjur/jsrsasign/c057d3447b194fa0a3fdcea110579454898e093d/jsrsasign-all-min.js"></script>
<script src="<?php echo base_url('/js/QZ_cer/sign-message' . session()->get('companies_id') . '.js?v=' . time()); ?>"></script>

<script>
    (function($) {
        let theme_status = localStorage.getItem('theme');

        if (JSON.parse(theme_status) == true) {
            $('#nav_theme').addClass('dark_sidebar');
        }
    })(jQuery);

    function themesChangeDark() {
        $('#nav_theme').addClass('dark_sidebar');
        localStorage.setItem('theme', true);
    }

    function themesChangeLight() {
        $('#nav_theme').removeClass('dark_sidebar');
        localStorage.setItem('theme', false);
    }
</script>
<?php if (isset($js_critical)) {
    echo $js_critical;
}; ?>

<!-- iziToast -->
<script src="<?php echo base_url('js/izitoast/iziToast.min.js'); ?>" type="text/javascript"></script>

<script>
    const copyrightFooter = `${new Date().getFullYear()}`
    document.getElementById('copyrightYear').innerHTML = copyrightFooter
</script>

<script type="text/javascript">
    // var arrLang = {
    //     "en": {
    //         "SALE": "SALE",
    //         "STOCK": 'Stock',
    //         "REPORT": 'Report',
    //         "MANAGER": 'Manager',
    //         "PAYMENT": 'Payment',
    //     },
    //     "th": {
    //         "SALE": "การขาย",
    //         "STOCK": 'สต็อก',
    //         "REPORT": 'รายงาน',
    //         "MANAGER": 'ผู้จัดการ',
    //         "PAYMENT": 'รายจ่าย',
    //     }
    // };

    $(document).ready(function() {
        let lang = localStorage.language

        if (lang == 'en') {
            $.getJSON(serverUrl + "language.json", function(data) {
                $(".lang").each(function(index, element) {
                    $(this).text(data.en[$(this).attr("key")]);
                });
            }).fail(function() {
                console.log("An error has occurred.");
            });
        } else {
            $.getJSON(serverUrl + "language.json", function(data) {
                $(".lang").each(function(index, element) {
                    $(this).text(data.th[$(this).attr("key")]);
                });
            }).fail(function() {
                console.log("An error has occurred.");
            });
        }

        var split_host_TV = "";
        var link_tv = "";
        if (serverUrl != "http://localhost:8080/") {
            split_host_TV = serverUrl.split("https://app.");
            link_tv = "https://tv." + split_host_TV[1] + "?compa=" + companies_id;
        } else {
            link_tv = 'http://localhost:8080/';
        }

        document.getElementById("tv_board").href = link_tv;

    });
    // // เรียกใช้ Bootstrap Dropdown
    // $(document).ready(function() {
    //     $('.dropdown-toggle').dropdown();
    // });

    // เรียกใช้ Google Translate Element
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({
    //         pageLanguage: 'en',
    //         includedLanguages: 'ja,ko,lo,ms,vi,zh-CN,zh-TW,en',
    //         layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    //         multilanguagePage: true
    //     }, 'google_translate_element');
    // }

    $(".translate").click(function() {
        var lang = $(this).attr("id");
        if (lang == 'th') {
            localStorage.setItem('language', 'th');
            $.getJSON(serverUrl + "language.json", function(data) {

                $(".lang").each(function(index, element) {
                    $(this).text(data.th[$(this).attr("key")]);
                });
            }).fail(function() {
                console.log("An error has occurred.");
            });

        } else if (lang == 'en') {
            localStorage.setItem('language', 'en');
            $.getJSON(serverUrl + "language.json", function(data) {
                $(".lang").each(function(index, element) {
                    $(this).text(data.en[$(this).attr("key")]);
                });
            }).fail(function() {
                console.log("An error has occurred.");
            });
        }
    });

    setInterval(load_mobile_print, 2000);

    function deleteFilePdf(file_name) {
        $.ajax({
            url: `${serverUrl}/unlink_pdf/` + file_name,
            method: "get",
            success: function(res) {
                // การสำเร็จ
            },
            error: function(error) {
                // เกิดข้อผิดพลาด
            },
        });
    }

    function printPDF(file_name, printer) {
        qz.websocket
            .connect()
            .then(function() {
                return qz.printers.find(printer);
            })
            .then((found) => {
                var config = qz.configs.create(printer);
                var path = serverUrl + "uploads/temp_pdf/" + file_name;
                var data = [{
                    type: "pixel",
                    format: "pdf",
                    flavor: "file",
                    data: path,
                }, ];
                return qz.print(config, data);
            })
            .then((event) => {
                return qz.websocket.disconnect();
            })
            .then((event) => {
                return deleteFilePdf(file_name);
            })
            .catch((e) => {
                console.log(e);
            });
    }

    function load_mobile_print() {

        $.ajax({
            url: `${serverUrl}/get_print_mobile/`,
            method: "get",
            success: function(res) {
                if (res.data) {
                    // console.log(res.data.order_customer_code);
                    $.ajax({
                        url: `${serverUrl}/order/check_printer_order/` +
                            res.data.order_customer_code,
                        method: "get",
                        success: function(res_print_log) {
                            for (var i = 0; i < res_print_log.data.length; i++) {
                                array_print_log = [{
                                    customer_code: res.data.order_customer_code,
                                    printer_name: res_print_log.data[i].printer_name,
                                }, ];

                                $.ajax({
                                    url: `${serverUrl}/pdf_BillOrder`,
                                    method: "post",
                                    data: {
                                        data: array_print_log,
                                    },
                                    success: function(res) {
                                        localStorage.setItem("isCallNewOrder", "yes");

                                        printPDF(res.message_name, res.message_printer);

                                        $.ajax({
                                            url: `${serverUrl}/order/update_order_print_log`,
                                            method: "post",
                                            data: {
                                                data: array_print_log
                                            },
                                            success: function(res) {
                                                // การสำเร็จ
                                            },
                                            error: function(error) {
                                                // เกิดข้อผิดพลาด
                                            },
                                        });
                                    },
                                    error: function(error) {
                                        // เกิดข้อผิดพลาด
                                    },
                                });
                            }
                        },
                        error: function(error) {
                            // เกิดข้อผิดพลาด
                        },
                    });
                }
            },
            error: function(error) {
                // เกิดข้อผิดพลาด
            },
        });


        // $.ajax({
        //     url: `${serverUrl}/pdf_bill/` + table_code,
        //     method: "get",
        //     success: function(res) {
        //         printPDF(res.message_name, res.message_printer);
        //     },
        //     error: function(error) {
        //         // เกิดข้อผิดพลาด
        //     },
        // });


        // $.ajax({
        //     url: `${serverUrl}/order/update_order_print_log/` +
        //         response.order_customer_code,
        //     method: "get",
        //     success: function(res) {
        //         // การสำเร็จ
        //     },
        //     error: function(error) {
        //         // เกิดข้อผิดพลาด
        //     },
        // });
    }
</script>

</body>

</html>