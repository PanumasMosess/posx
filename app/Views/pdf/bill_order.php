<!doctype html>
<html lang="en" data-layout="horizontal" data-hor-style="hor-hover" data-logo="centerlogo">

<body>
    <table>
        <tr>
            <th width="14%">Date : </th>
            <th width="85%"><?php echo date('d/m/Y H:i:s') ?></th>
        </tr>
        <tr>
            <th width="9%">by : </th>
            <th width="90%"><?php echo session()->get('username'); ?></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 25px;font-weight: bold;"><?php echo $table->table_name ?></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 3px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <?php foreach ($oeders as $oeder) {
            if ($oeder->order_comment != '') {
                $comment = '<tr>
                            <th width="10%"></th>
                            <th width="3%" style="font-size: 18px;">-</th>
                            <th width="86%" style="font-size: 18px;">' . $oeder->order_comment . '</th>
                        </tr>';
            } else {
                $comment = '';
            }
        ?>

            <tr>
                <th width="10%" style="text-align: center;font-size: 20px;"><?php echo $oeder->order_customer_pcs ?></th>
                <th width="89%" style="font-size: 20px;"><?php echo $oeder->order_customer_ordername ?></th>
            </tr>
            <?php echo $comment ?>
        <?php } ?>
        <!-- <php $i = 0;
        foreach ($datas as $data) {
            ?>
        <tr>
            <th width="10%" style="text-align: center;font-size: 20px;"><php echo $data[0]['order_customer_pcs'] ?></th>
            <th width="89%" style="font-size: 20px;"><php echo $data[0]['order_customer_ordername'] ?></th>
        </tr>
        <php } ?> -->
        <!-- <tr>
            <th width="10%"></th>
            <th width="3%" style="font-size: 18px;">-</th>
            <th width="86%" style="font-size: 18px;">ก๋วยเตี๋ยวหมูน้ำตก</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;font-size: 20px;">1</th>
            <th width="89%" style="font-size: 20px;">น้ำเปล่า</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;font-size: 20px;">2</th>
            <th width="89%" style="font-size: 20px;">น้ำแข็ง(แก้ว)</th>
        </tr> -->
        <tr>
            <th width="99%" style="font-size: 5px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
    </table>
</body>

</html>