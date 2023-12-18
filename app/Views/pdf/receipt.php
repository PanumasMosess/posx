<!doctype html>
<html lang="en" data-layout="horizontal" data-hor-style="hor-hover" data-logo="centerlogo">

<body>
    <table>
        <tr>
            <th width="100%" style="text-align:center;">
                <img src="https://app.posx.co/img/POSX_2.png" style="height:60px;width:180px;">
            </th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;">Receipt</th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="34%" style="font-weight: bold;">Receipt No : </th>
            <th width="65%" style="font-weight: bold;"><?php echo $payment_log->order_customer_code ?></th>
        </tr>
        <tr>
            <th width="17%" style="font-weight: bold;">Date : </th>
            <th width="82%" style="font-weight: bold;"><?php echo date('d/m/Y H:i:s') ?></th>
        </tr>
        <tr>
            <th width="25%">Cashier : </th>
            <th width="74%"><?php echo $payment_log->created_by ?></th>
        </tr>
        <tr>
            <th width="42%">Payment Type : </th>
            <th width="57%"><?php echo $payment_log->payment_type ?></th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 18px;font-weight: bold;"><?php echo $table->table_name ?></th>
        </tr>
        <tr>
            <th style="font-size: 2px;"></th>
        </tr>
        <tr>
            <th width="10%"></th>
            <th width="57%">items</th>
            <th width="32%" style="text-align: right;">Price</th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 2px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <?php foreach ($orderlists as $orderlist) {
            $price = $orderlist->order_customer_pcs * $orderlist->order_price; ?>
            <tr>
                <th width="10%" style="text-align: center;"><?php echo $orderlist->order_customer_pcs ?></th>
                <th width="57%"><?php echo $orderlist->order_customer_ordername ?></th>
                <th width="32%" style="text-align: right;font-size: 12px;"><?php echo number_format($price, 2) ?></th>
            </tr>
            <tr>
                <th style="font-size: 2px;"></th>
            </tr>
        <?php } ?>
        <!-- <tr>
            <th width="10%" style="text-align: center;">1</th>
            <th width="60%">ก๋วยเตี๋ยวหมูน้ำตก</th>
            <th width="29%" style="text-align: right;">100.00</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;">1</th>
            <th width="60%">น้ำเปล่า</th>
            <th width="29%" style="text-align: right;">20.00</th>
        </tr>
        <tr>
            <th width="10%" style="text-align: center;">2</th>
            <th width="60%">น้ำแข็ง(แก้ว)</th>
            <th width="29%" style="text-align: right;">3.00</th>
        </tr> -->
        <tr>
            <th width="99%" style="font-size: 1px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="99%"><?php echo $summary->order_pcs_sum ?> Items</th>
        </tr>
        <?php $grand_total = $payment_log->receive_total - $payment_log->change_total; ?>
        <tr>
            <th width="60%" style="font-size: 15px;font-weight: bold;">Grand Total</th>
            <th width="39%" style="text-align: right;font-size: 15px;font-weight: bold;"><?php echo number_format($summary->order_price_sum, 2) ?></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 2px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 1px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 2px;"></th>
        </tr>
        <tr>
            <th width="60%">Received (Cash)</th>
            <th width="39%" style="text-align: right;"><?php echo number_format($payment_log->receive_total, 2) ?></th>
        </tr>
        <tr>
            <th width="60%">Change</th>
            <th width="39%" style="text-align: right;"><?php echo number_format($payment_log->change_total, 2) ?></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 2px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;">Thank you</th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;">Please Comeback again</th>
        </tr>
        <tr>
            <th style="font-size: 13px;"></th>
        </tr>
        <tr>
            <th width="100%" style="text-align:center;">
                <!-- <img src="https://app.posx.co/img/no-image-available.jpg" style="height:120px;width:120px;"> -->
            </th>
        </tr>
    </table>
</body>

</html>