<!doctype html>
<html lang="en" data-layout="horizontal" data-hor-style="hor-hover" data-logo="centerlogo">

<body>
    <table>
        <tr>
            <th width="100%" style="text-align:center;"><img src="https://app.posx.co/img/POSX_2.png" style="height:60px;width:180px;"></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="15%">Date : </th>
            <th width="84%"><?php echo date('d/m/Y H:i:s') ?></th>
        </tr>
        <tr>
            <th width="19%">Cashier : </th>
            <th width="80%"><?php echo session()->get('username'); ?></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 15px;">**** PREVIEW ****</th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo $table->table_name ?></th>
        </tr>
        <tr>
            <th style="font-size: 3px;"></th>
        </tr>
        <tr>
            <th width="10%"></th>
            <th width="60%">items</th>
            <th width="29%" style="text-align: right;">Price</th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 3px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 4px;"></th>
        </tr>
        <?php foreach ($orderlists as $orderlist) { 
            $price = $orderlist->order_customer_pcs * $orderlist->order_price;?>
            <tr>
                <th width="10%" style="text-align: center;"><?php echo $orderlist->order_customer_pcs ?></th>
                <th width="60%"><?php echo $orderlist->order_customer_ordername ?></th>
                <th width="29%" style="text-align: right;"><?php echo number_format($price, 2) ?></th>
            </tr>
        <?php } ?>
        <!-- <tr>
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
        <tr>
            <th width="70%" style="font-size: 20px;font-weight: bold;">Grand Total</th>
            <th width="29%" style="text-align: right;font-size: 20px;font-weight: bold;"><?php echo number_format($summary->order_price_sum, 2) ?></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 3px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th width="99%" style="font-size: 1px; border-bottom-style: solid;border-bottom-color: #BEBEBE"></th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;font-size: 15px;">**** PREVIEW ****</th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;">Thank you</th>
        </tr>
        <tr>
            <th style="font-size: 5px;"></th>
        </tr>
        <tr>
            <th width="99%" style="text-align: center;">Please Comeback again</th>
        </tr>
        <tr>
            <th style="font-size: 15px;"></th>
        </tr>
        <tr>
            <th width="100%" style="text-align:center;"><img src="https://app.posx.co/img/no-image-available.jpg" style="height:120px;width:120px;"></th>
        </tr>
    </table>
</body>

</html>