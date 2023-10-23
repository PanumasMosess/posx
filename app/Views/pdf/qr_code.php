<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>POSX <?php echo $title; ?></title>
    <link rel="icon" href="<?php echo base_url('img/icon.png'); ?>" type="image/png" />
    <link rel="stylesheet" href="<?php echo base_url('css/bootstrap1.min.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('css/style1.css'); ?>" />
    <style>
        /** BASE **/
        * {
            font-family: 'Kanit', sans-serif;
        }
    </style>

    <script>
        var serverUrl = '<?php echo base_url(); ?>'
        var companies_id = '<?php echo session()->get('companies_id'); ?>'
    </script>
</head>

<body>
    <div style="width: 230px;" class="card container">
        <div class=" white_card_body mt-5">
            <div class="row justify-content-center" id='qr_table'>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('js/jquery1-3.4.1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/bootstrap1.min.js'); ?>"></script>

    <script src="<?php echo base_url('js/image-uploader.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.qrcode.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/manager/setting_tv.js'); ?>"></script>

    <?php if (isset($js_critical)) {
        echo $js_critical;
    }; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            loadQRAllTable();
        });

        function loadQRAllTable() {
            $.ajax({
                url: "/manager/loadQR",
                type: "GET",
                dataType: "json",
                success: function(res) {
                    let html_qr = "";
                    for (var i = 0; i < res.data.length; i++) {
                        html_qr +=
                            "<div class='col-lg-12 col-md-12 mb_30' style='text-align: center;'><div class='single_wow_amin wow fadeInUp' data-wow-duration='1s' data-wow-delay='.1s' style='visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;'>" +
                            "<div id='qrcode" +
                            i +
                            "'style='text-align: center;' ></div>" +
                            "</div>"+res.data[i].table_name+"</div>";
                    }
                    $("#qr_table").html(html_qr);
                    qrDrow(res.data);
                },
            });
        }

        function qrDrow(data) {
            var split_host = "";
            if (serverUrl != "http://localhost:8080/") {
                split_host = serverUrl.split("https://app.");
            }
            var qrcodeConfig = {
                width: 185, // กำหนดความกว้างเป็น 80 px
                height: 185, // กำหนดความสูงเป็น 80 px
                correctLevel: 0, // ระดับความถูกต้องของ QR Code
            };
            for (var i = 0; i < data.length; i++) {
                if (serverUrl != "http://localhost:8080/") {
                    $("#qrcode" + i + "").qrcode(
                        $.extend(qrcodeConfig, {
                            text: "https://tv." +
                                split_host[1] +
                                "upload/" +
                                data[i].table_code +
                                "/" +
                                data[i].companies_id,
                        })
                    );
                } else {
                    $("#qrcode" + i + "").qrcode(
                        $.extend(qrcodeConfig, {
                            text: "https://localhost:8080/upload/" +
                                data[i].table_code +
                                "/" +
                                data[i].companies_id,
                        })
                    );
                }
            }
        }
    </script>
</body>
</html>