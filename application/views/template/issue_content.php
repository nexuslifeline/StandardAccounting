<style>

    #issuance td {
        border: 0px !important;
    }

    #report_header td {
        border: 0px !important;
    }

    #issuance tr {
        background: transparent !important;
    }

    #report_footer th {
        background: #303030 !important;
    }

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

<div style="width:100%">
<h3 style="text-align:center;margin:0px;padding:0px;font-weight:bold;font-family:tahoma;"><?php echo $company_info->company_name; ?></h3>
<p style="text-align:center;margin:0px;padding:0px;font-family:tahoma;"><?php echo $company_info->company_address; ?></p>
<p style="text-align:center;margin:0px;padding:0px;font-family:tahoma;">Contact # <?php echo $company_info->mobile_no.' '.$company_info->landline; ?></p>
<table style="font-family:tahoma;" id="report_header">
    <tbody>
        <tr>
            <td style="width:85%;font-size:21px;font-weight:bold;">ISSUANCE REPORT</td>
            <td style="width:15%;font-size:21px;font-weight:bold;"><?php echo $issuance_info->slip_no; ?></td>
        </tr>
    </tbody>
</table>
<table width="100%" id="issuance">
    <thead>
    </thead>
    <tbody>
        <tr>
            <td style="width:20%;font-weight:bold;">Name of Customer: </td>
            <td style="border-bottom:1px solid black;width:30%;"> <?php echo $issuance_info->customer_name; ?></td>
            <td style="width:10%;"></td>
            <td style="text-align:right;font-weight:bold;">Date:</td>
            <td style="border-bottom:1px solid black;width:20%;text-align:center;"><?php echo  date_format(new DateTime($issuance_info->date_issued),"m/d/Y"); ?></td>
        </tr>
        <tr>
            <td style="width:20%;font-weight:bold;">Address: </td>
            <td style="border-bottom:1px solid black;width:30%;"> <?php echo $issuance_info->address; ?></td>
            <td style="width:10%;"></td>
            <td style="text-align:right;font-weight:bold;">Terms:</td>
            <td style="border-bottom:1px solid black;width:20%;text-align:center;"> <?php echo $issuance_info->terms; ?></td>
        </tr>
    </tbody>
</table><br>
<table width="100%" style="font-family:tahoma;" cellspacing="0">
    <thead>
        <tr>
            <th style="width:35%;text-align:left;border:1px solid #7c7c7c;">Description</th>
            <th style="width:10%;text-align:center;border:1px solid #7c7c7c;">Quantity</th>
            <th style="width:15%;text-align:center;border:1px solid #7c7c7c;">Pack. Size</th>
            <th style="width:20%;text-align:center;border:1px solid #7c7c7c;">Unit Price</th>
            <th style="width:20%;text-align:center;border:1px solid #7c7c7c;">Amount</th>
        </tr>
    </thead>
    <tbody>
       <?php 
            $grandtotal=0;
            foreach($issue_items as $item){
            $grandtotal+=$item->issue_line_total_price;
             ?>
                <tr>
                    <td style=" border: 1px solid #7c7c7c;"><?php echo $item->product_desc; ?></td>
                    <td style="text-align:center; border: 1px solid #7c7c7c;"><?php echo number_format($item->issue_qty,0); ?></td>
                    <td style="text-align:center; border: 1px solid #7c7c7c;"></td>
                    <td style="text-align:center; border: 1px solid #7c7c7c;"><?php echo number_format($item->issue_price,2); ?></td>
                    <td style="text-align:center; border: 1px solid #7c7c7c;"><?php echo number_format($item->issue_line_total_price,2); ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="4" style="text-align:right;font-weight:bold; border: 1px solid #7c7c7c;">Grand Total</td>
                <td style="text-align:center;font-weight:bold;color:#2ecc71; border: 1px solid #7c7c7c;"><?php echo number_format($grandtotal,2); ?></td>
            </tr>
    </tbody>
</table>
<hr></hr>
<table id="report_footer">
    <tbody>
        <tr>
            <th style="width:35%;text-align:center;"><br></th>
            <th style="width:10%;text-align:center;"></th>
            <th style="width:10%;text-align:center;"></th>
            <th style="width:22%;text-align:center;"></th>
            <th style="width:23%;text-align:center;"></th>
        </tr>
        <tr>
            <th style="width:35%;text-align:center;border-top:1px solid black;">Authorized Signature</th>
            <th style="width:10%;text-align:center;"></th>
            <th style="width:10%;text-align:center;"></th>
            <th style="width:22%;text-align:center;"></th>
            <th style="width:23%;text-align:center;border-top:1px solid black;">Customer's Signature</th>
        </tr>
    </tbody>
</table>
</div>









