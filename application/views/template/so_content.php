

<div>
    <center><table width="95%" cellpadding="5" style="font-family: tahoma;font-size: 11">
            <tr>
                <td width="45%" valign="top"><br />
                    <span>Department :</span><br />
                    <address>
                        <strong><?php echo $sales_order->department_name; ?></strong><br /><br />

                    </address>
                    <p>
                        <span>Order date : <br /> <b><?php echo  date_format(new DateTime($sales_order->date_order),"m/d/Y"); ?></b></span><br /><br />
                    </p>
                    <br />
                    <span>Customer :</span><br />
                    <strong><?php echo $sales_order->customer_name; ?></strong><br>
                </td>

                <td width="50%" align="right">
                    <p>Sales Order No.</p><br />
                    <h4 class="text-navy"><?php echo $sales_order->so_no; ?></h4><br />




                </td>
            </tr>
        </table></center>

    <br /><br />

    <center>
        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11">
            <thead>
            <tr>
                <th width="50%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Item</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Qty</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: center;height: 30px;padding: 6px;">UM</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Price</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($sales_order_items as $item){ ?>
                <tr>
                    <td width="50%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->so_qty,0); ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: center;height: 30px;padding: 6px;"><?php echo $item->unit_name; ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->so_price,2); ?></td>

                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->so_line_total_price,2); ?></td>
                </tr>
            <?php } ?>

            </tbody>
            <tfoot>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Discount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($sales_order->total_discount,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Total before Tax : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($sales_order->total_before_tax,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Tax Amount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($sales_order->total_tax_amount,2); ?></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom:1px solid gray;text-align: left;height: 30px;padding: 6px;"><strong>Total after Tax : </strong></td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><strong><?php echo number_format($sales_order->total_after_tax,2); ?></strong></td>
            </tr>
            </tfoot>
        </table><br /><br />
    </center>
</div>





















