<!DOCTYPE html>
<html>
<head>
    <title>Cash Receipt</title>
    <style type="text/css">
        body {
            font-family: 'Calibri',sans-serif;
            font-size: 12px;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .data {
            border-bottom: 1px solid #404040;
        }

        .align-center {
            text-align: center;
        }

        .report-header {
            font-weight: bolder;
        }

        hr {
            border-top: 3px solid #404040;
        }
    </style>
</head>
<body>
    <table width="100%">
        <tr>
            <td width="10%"><img src="<?php echo $company_info->logo_path; ?>" style="height: 90px; width: 120px; text-align: left;"></td>
            <td width="90%" class="align-center">
                <h1 class="report-header"><strong><?php echo $company_info->company_name; ?></strong></h1>
                <p><?php echo $company_info->company_address; ?></p>
                <p><?php echo $company_info->landline.'/'.$company_info->mobile_no; ?></p>
            </td>
        </tr>
    </table><hr>
    <div class="">
        <h3 class="report-header"><strong>CASH RECEIPT JOURNAL</strong></h3>
    </div>
    <table width="100%" border="1" cellspacing="-1">
        <tr>
            <td style="padding: 4px;" colspan="3"><strong>TXN # :</strong> <?php echo $journal_info->txn_no; ?></td>
        </tr>
        <tr>
            <td style="padding: 4px;"><strong>REFERENCE # :</strong> <?php echo $journal_info->ref_no; ?></td>
            <td style="padding: 4px;" colspan="2"><strong>TXN DATE :</strong> <?php echo date_format(new DateTime($journal_info->date_txn),"m/d/Y"); ?></td>
        </tr>
        <tr>
            <td style="padding: 4px;" colspan="3"><strong>CUSTOMER :</strong> <?php echo $journal_info->customer_name; ?></td>
        </tr>
        <tr>
            <td style="padding: 4px;"><strong>ADDRESS :</strong></td>
            <td style="padding: 4px;"><strong>PAY TYPE :</strong></td>
            <td style="padding: 4px;"><strong>AMOUNT :</strong></td>
        </tr>
        <tr>
            <td style="padding: 4px;"><?php echo $journal_info->address; ?></td>
            <td style="padding: 4px;"><?php echo $journal_info->payment_method; ?></td>
            <td style="padding: 4px;"><?php echo number_format($journal_info->amount,2); ?></td>
        </tr>
    </table><br>
    <table width="100%" style="border-collapse: collapse;border-spacing: 0;font-family: tahoma;" border="0">
            <thead>
            <tr>
                <td style="border: 1px solid black;text-align: center;padding: 6px;" colspan="5"><strong>ENTRIES</strong></td>
            </tr>
            <tr>
                <th width="10%" style="border: 1px solid black;text-align: left;padding: 6px;">ACCNT. #</th>
                <th width="30%" style="border: 1px solid black;text-align: left;padding: 6px;">ACCOUNT</th>
                <th width="30%" style="border: 1px solid black;text-align: right;padding: 6px;">MEMO</th>
                <th width="15%" style="border: 1px solid black;text-align: right;padding: 6px;">DEBIT</th>
                <th width="15%" style="border: 1px solid black;text-align: right;padding: 6px;">CREDIT</th>
            </tr>
            </thead>
            <tbody>
            <?php

            $dr_amount=0.00; $cr_amount=0.00;

            foreach($journal_accounts as $account){

                ?>
                <tr>
                    <td width="30%" style="border: 1px solid black;text-align: left;padding: 6px;"><?php echo $account->account_no; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: left;padding: 6px;"><?php echo $account->account_title; ?></td>
                    <td width="30%" style="border: 1px solid black;text-align: right;padding: 6px;"><?php echo $account->memo; ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;padding: 6px;"><?php echo number_format($account->dr_amount,2); ?></td>
                    <td width="15%" style="border: 1px solid black;text-align: right;padding: 6px;"><?php echo number_format($account->cr_amount,2); ?></td>
                </tr>
                <?php

                $dr_amount+=$account->dr_amount;
                $cr_amount+=$account->cr_amount;

            }

            ?>

            </tbody>
                <tfoot>
                    <tr style="border: 1px solid black;">
                        <td colspan="5"></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black;text-align: left;padding: 6px;" colspan="2"><strong>Remarks :</strong></td>
                        <td style="border: 1px solid black;text-align: right;padding: 6px;" align="right"><strong>Total : </strong></td>
                        <td style="border: 1px solid black;text-align: right;padding: 6px;" align="right"><strong><?php echo number_format($dr_amount,2); ?></strong></td>
                        <td style="border: 1px solid black;text-align: right;padding: 6px;" align="right"><strong><?php echo number_format($cr_amount,2); ?></strong></td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td colspan="2" style="border: 1px solid black;text-align: left;padding: 6px;"><?php echo $journal_info->remarks; ?>&nbsp;</td>
                        <td colspan="3" style="border: 1px solid black;text-align: left;padding: 6px;"></td>
                    </tr>
                </tfoot>    
        </table><br><br>
        <center>
            <table style="text-align: center;">
                <tr>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                    <td width="30%" style="padding-right: 10px;">___________________________________</td>
                </tr>
                <tr>
                    <td width="30%" style="padding-right: 10px;"><strong>Prepared by</strong></td>
                    <td width="30%" style="padding-right: 10px;"><strong>Checked by</strong></td>
                    <td width="30%" style="padding-right: 10px;"><strong>Posted by</strong></td>
                </tr>
            </table>
        </center>
</body>
</html>




















