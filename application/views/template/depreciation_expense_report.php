<!DOCTYPE html>
<html>
<head>
	<title>Depreciation Expense Report</title>
	<style>
		@media print{@page {size: landscape}}
		
		body {
			font-family: 'Segoe UI', sans-serif;
			font-size: 12px;
		}
	</style>

	<script>
		(function(){
			window.print();
		})();
	</script>
</head>
<body>
	<center>
		<h3 style="text-transform: uppercase;">Depreciation Expense Report</h3>
		<h4>For the Month of <?php echo date('F Y', strtotime($_GET['y'].'-'.$_GET['m'])); ?></h4>
	</center>
	<table width="100%" border="1" cellspacing="0" cellpadding="3">
		<thead>
			<th>Asset Code</th>
			<th>Description</th>
			<th>Date Acquired</th>
			<th>Acquisition Cost</th>
			<th>Life</th>
			<th>Salvage Value</th>
			<th>Depreciation Expense (Monthly)</th>
			<th>Accumulative Depreciation</th>
			<th>Book Value</th>
		</thead>
		<tbody>
			<?php foreach ($depreciation_expenses as $depreciation_expense) { ?>
			<tr>
				<td><?php echo $depreciation_expense->asset_code; ?></td>
				<td><?php echo $depreciation_expense->asset_description; ?></td>
				<td><?php echo date('F d,Y', strtotime($depreciation_expense->date_acquired)); ?></td>
				<td align="right"><?php echo number_format($depreciation_expense->acquisition_cost,2); ?></td>
				<td><?php echo $depreciation_expense->life_years; ?></td>
				<td align="right"><?php echo number_format($depreciation_expense->salvage_value,2); ?></td>
				<td align="right"><?php echo number_format($depreciation_expense->depreciation_expense,2); ?></td>
				<td align="right"><?php echo number_format($depreciation_expense->accu_dep,2); ?></td>
				<td align="right"><?php echo number_format($depreciation_expense->book_value,2); ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</body>
</html>