<div class="footer_part">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer_iner text-center">
                    <p>
                        2020 © Influence - Designed by
                        <a href="#"> <i class="ti-heart"></i> </a><a href="#"> Dashboard</a>
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

<script src="<?php echo base_url('js/dashboard_init.js'); ?>"></script>
<script src="<?php echo base_url('js/custom.js'); ?>"></script>
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
</body>

</html>