<!DOCTYPE html>
<html>
<head>
	<title>Customer Sales Report (Summary)</title>
	<style>
		body {
			font-family: 'Segoe UI',sans-serif;
			font-size: 12px;
		}
		table, th, td { border-color: white; }
		tr { border-bottom: none !important; }

		.report-header {
			font-size: 22px;
		}
	</style>
	<script>
		(function(){
			window.print();
		})();
	</script>
</head>
<body>
	<table width="100%">
        <tr>
            <td width="10%"><img src="<?php echo $company_info->logo_path; ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%" class="align-center">
                <span class="report-header"><strong><?php echo $company_info->company_name; ?></strong></span><br>
                <span><?php echo $company_info->company_address; ?></span><br>
                <span><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></span>
            </td>
        </tr>
    </table><hr>
    <div class="">
        <h3><strong>SALES REPORT PER CUSTOMER (SUMMARY)</strong></h3>
    </div>
    <table width="100%" border="1" cellspacing="0" cellpadding="2">
    	<thead>
    		<th align="left">Customer Code</th>
    		<th align="left">Customer</th>
    		<th align="right">Total Sales</th>
    	</thead>
        <?php $sum=0; ?>
    	<?php foreach ($sales_summaries as $sales_summary) { ?>
    		<tr>
    			<td width="10%"><?php echo $sales_summary->customer_code; ?></td>
    			<td width="50%"><?php echo $sales_summary->customer_name; ?></td>
    			<td width="40%" align="right"><?php echo number_format($sales_summary->total_amount,2); ?></td>
    		</tr>
            <?php $sum+=$sales_summary->total_amount; ?>
    	<?php } ?>
        <tr>
            <td colspan="2" align="right"><strong>Total :</strong></td>
            <td align="right"><strong><?php echo number_format($sum,2); ?></strong></td>
        </tr>
    </table>
</body>
</html>