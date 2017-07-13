<table id="main" style="font-family: 'Roboto', sans-serif; color: black;">
	<tr>
		<td style="border: 0px !important;background:transparent !important;"><h3>Customer Name : <?php echo $customers; ?></h3></td>
	</tr>
	<tr>
		<td style="border: 0px !important;background: transparent !important;"><h3>Date : <?php echo $tempfrom." To ".$tempto; ?></h3></td>
	</tr>
</table>

<table class="table" style="width:100%;">
	<thead style="background-color:#2980b9;color:white;">
	<tr>
		<th style="width:30%;text-align:left;">Invoice</th>
		<th style="width:40%;text-align:left;">Remarks</th>
		<th style="width:30%;text-align:left;">Amount Due</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach($receivables as $item){ ?>
		    <tr>
		        <td style="width:30%;"><?php echo $item->sales_inv_no; ?></td>
		        <td style="width:40%;"><?php echo $item->remarks; ?></td>
				<td style="width:30%;"><?php echo number_format($item->net_receivable,2); ?></td>
		    </tr>
		<?php } ?>
	</tbody>
</table>

<style>
	#main td:hover {
		color:white !important;
	}
</style>