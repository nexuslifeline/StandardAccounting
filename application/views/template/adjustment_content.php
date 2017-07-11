

<div>
    <center><table width="95%" cellpadding="5" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11;" border="0">
            <tr>
                <td width="45%" valign="top" style="border-collapse: collapse!important;border-spacing: 0!important;font-family: tahoma;font-size: 11; border :0px solid #525252!important;">
                    <span>Department :</span><br />
                    <address>
                        <strong><?php echo $adjustment_info->department_name; ?></strong><br /><br />

                    </address>
                    <p>
                        <span>Date adjusted : <br /> <b><?php echo  date_format(new DateTime($adjustment_info->date_adjusted),"m/d/Y"); ?></b></span><br />

                    </p>
                    <br />
                    <span>Adjustment type :</span><br />
                    <strong><?php echo $adjustment_info->adjustment_type; ?></strong><br>
                </td>

                <td width="50%" align="right" style=" border :0px solid #525252!important;">
                    <p>Adjustment No.</p><br />
                    <h4 class="text-navy"><?php echo $adjustment_info->adjustment_code; ?></h4><br />




                </td>
            </tr>
        </table></center>

    <br /><br />

    <center>
        <table width="95%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;font-size: 11;background-color: transparent!important;" border="0">
            <thead style="background-color: transparent!important ;">
            <tr style="background-color: transparent!important ;">
                <th width="50%" style="border-bottom: 2px solid gray;text-align: left;height: 30px;padding: 6px;">Item</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Qty</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: center;height: 30px;padding: 6px;">UM</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Price</th>
                <th width="12%" style="border-bottom: 2px solid gray;text-align: right;height: 30px;padding: 6px;">Total</th>
            </tr>
            </thead>
            <tbody style="border-collapse:collapse">
            <?php foreach($adjustment_items as $item){ ?>
                <tr style="background-color: transparent!important ;">
                    <td width="50%" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;"><?php echo $item->product_desc; ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->adjust_qty,0); ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: center;height: 30px;padding: 6px;"><?php echo $item->unit_name; ?></td>
                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->adjust_price,2); ?></td>

                    <td width="12%" style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($item->adjust_line_total_price,2); ?></td>
                </tr>
            <?php } ?>

            </tbody>
            <tfoot style="background-color: transparent!important ;">
            <tr style="background-color: transparent!important ;">
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Discount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($adjustment_info->total_discount,2); ?></td>
            </tr>
            <tr style="background-color: transparent!important ;">
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Total before Tax : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($adjustment_info->total_before_tax,2); ?></td>
            </tr>
            <tr style="background-color: transparent!important ;">
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom: 1px solid gray;text-align: left;height: 30px;padding: 6px;">Tax Amount : </td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><?php echo number_format($adjustment_info->total_tax_amount,2); ?></td>
            </tr>
            <tr style="background-color: transparent!important ;">
                <td colspan="2" style="text-align: right;height: 30px;padding: 6px;"></td>
                <td colspan="2" style="border-bottom:1px solid gray;text-align: left;height: 30px;padding: 6px;"><strong>Total after Tax : </strong></td>
                <td style="border-bottom: 1px solid gray;text-align: right;height: 30px;padding: 6px;"><strong><?php echo number_format($adjustment_info->total_after_tax,2); ?></strong></td>
            </tr>
            </tfoot>
        </table><br /><br />
    </center>
</div>

<style>
    tr {
        border: none!important;
    }

    tr:nth-child(even){
        background: #414141 !important;
        border: none!important;
    }

    tr:hover {
        transition: .4s;
        background: #414141 !important;
        color: white;
    }

    tr:hover .btn {
        border-color: #494949!important;
        border-radius: 0!important;
        -webkit-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
        -moz-box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
        box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.75);
    }
</style>



















