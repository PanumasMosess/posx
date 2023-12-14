<!doctype html>
<html lang="en" data-layout="horizontal" data-hor-style="hor-hover" data-logo="centerlogo">

<body>
    <table>
        <tr>
            <th style="font-size: 18px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 13px;">***** Original Copy to Cashier *****</th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="14%">Date : </th>
            <th width="85%"><?php echo date('d/m/Y H:i:s') ?></th>
        </tr>
        <tr>
            <th width="9%">by : </th>
            <th width="90%"><?php echo session()->get('username'); ?></th>
        </tr>
        <tr>
            <th style="font-size: 2px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 13px;font-weight: bold;"><?php echo $table->table_name ?> (Cancelled)</th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 13px;">Cancelled item</th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 2px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <?php foreach ($orderlists as $orderlist) {?>
            <tr>
                <th width="10%" style="text-align: center; font-size: 18px;"><s><?php echo $orderlist->order_customer_pcs ?></s></th>
                <th width="89%" style="font-size: 18px;"><s><?php echo $orderlist->order_customer_ordername ?></s></th>
            </tr>
        <?php } ?>
        <!-- <tr>
            <th width="10%"></th>
            <th width="3%" style="font-size: 18px;">-</th>
            <th width="86%" style="font-size: 18px;"><s>ไม่ใส่ผัก</s></th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;font-size: 20px;"><s>1</s></th>
            <th width="89%" style="font-size: 20px;"><s>น้ำเปล่า</s></th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;font-size: 20px;"><s>2</s></th>
            <th width="89%" style="font-size: 20px;"><s>น้ำแข็ง(แก้ว)</s></th>
        </tr> -->
        <tr>
            <th width="99%" style="font-size: 3px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 8px;"></th>
        </tr>
        <tr>
            <th width="19%">Reason : </th>
            <th width="80%"></th>
        </tr>
        <tr>
            <th width="13%">Sign : </th>
            <th width="86%"><?php echo session()->get('username'); ?></th>
        </tr>
        <tr>
            <th style="font-size: 8px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 13px;">***** Original Copy to Cashier *****</th>
        </tr>
    </table>
</body>

</html>