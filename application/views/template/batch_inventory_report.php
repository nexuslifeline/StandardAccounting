<html>
<head>
    <title>Inventory Report</title>
    <style>
        body{
            font-family: tahoma;font-size: 11;
        }

        table{
            border-collapse: collapse;
            table-layout: fixed;
            border: 1px solid black;
            font-size: 11;
            font-family: tahoma;
        }

        table thead tr td{
            height: 25px;
            background-color: lightgreen;
            font-weight: bold;
            font-size: 12;

        }


        table tfoot tr td{
            background-color: lightgreen;
            font-weight: 400;
        }

        td{
            border:1px solid black;
            padding-left: 5px;
            padding-right: 3px;
            height: 20px;
        }
    </style>

    <!-- <script>
        $(document).ready(function(){
            window.print();
        });

        window.onload = function () {
    window.print();
}
    </script> -->

    <script type="text/javascript">
        (function(){
            window.print();
        })();
    </script>




</head>

<body>

<div style="">

    <h3 style="margin-bottom: 0px;">Inventory Report - <?php echo $department; ?></h3>
    <i>As of <?php echo $date; ?></i>



    <br /><br />
    <table width="100%" >
        <thead>
            <tr>
                <td width="10%">PLU</td>
                <td width="30%">Description</td>
                <td width="10%">Category</td>
                <td width="5%">Unit</td>
                <td width="10%" align="right">Current Qty</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $product){ ?>
            <tr>
                <td><?php echo $product->product_code; ?></td>
                <td><?php echo $product->product_desc; ?></td>
                <td><?php echo $product->category_name; ?></td>
                <td><?php echo $product->unit_name; ?></td>
                <td align="right"><?php echo number_format($product->CurrentQty,2); ?></td>
            </tr>
            <?php } ?>


            <?php if(count($products)==0){ ?>
                <tr>
                    <td colspan="5" style="height: 40px;"><center>No records found.</center></td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">&nbsp;</td>

            </tr>
        </tfoot>
    </table>



</div>




</body>
</html>