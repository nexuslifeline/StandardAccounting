<center>
    <table width="100%" style="font-family: tahoma;">
        <tbody>
        <tr>
            <td>
                <br />

                <div class="tab-container tab-top tab-default">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#customer_info" data-toggle="tab"><i class="fa fa-users"></i> Information</a></li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="customer_info" style="min-height: 300px;">


                            <div class="row">
                                <div class="col-lg-7">
                                    <h4><span style="margin-left: 1%"><strong><i class="fa fa-user"></i> <?php echo $customer_info->customer_name; ?></strong></span></h4>
                                    <hr />

                                    <div style="margin-left: 10%">
                                        <i class="fa fa-globe"></i> Address : <?php echo $customer_info->address; ?><br />
                                        <i class="fa fa-send-o"></i> Email : <?php echo $customer_info->email_address; ?><br />
                                        <i class="fa fa-phone-square"></i> Landline : <?php echo $customer_info->contact_no; ?><br />

                                        <i class="fa fa-user"></i> Added : <?php echo $customer_info->user; ?><br />
                                        <i class="fa fa-calendar"></i> Date : <?php echo $customer_info->date_added; ?><br /><br /><br />


                                    </div>
                                </div>

                                <div class="col-lg-5"><br />
                                    <center>
                                        <img class="img-circle" src="<?php echo $customer_info->photo_path; ?>" style="border: 2px solid #000000" height="150" width="150" /></center>

                                    <br /><br />

                                    <i class="fa fa-user"></i> Your last payment : <?php echo (is_array($recent_payment)?$recent_payment[0]->date_paid:'none'); ?><br />
                                    <i class="fa fa-calendar"></i> Reference : <?php echo (is_array($recent_payment)?$recent_payment[0]->receipt_no:'none'); ?><br />
                                    <i class="fa fa-money"></i> Amount : <?php echo (is_array($recent_payment)?number_format($recent_payment[0]->total_paid_amount,2):'none'); ?><br /><br /><br />

                                    <i class="fa fa-star-o"></i> Total Unpaid : <b><?php echo number_format($customer_info->total_receivable_amount,2); ?></b><br /><br /><br /><br /><br />
                                </div>
                            </div>


                            <span style="margin-left: 1%"><b><i class="fa fa-list"></i> List of Sales Order of <?php echo $customer_info->customer_name; ?></b> (Open and partially received)</span>
                            <hr />
                            <div class="col-lg-12 table-responsive">
                                <table id="tbl_so_<?php echo $customer_info->customer_id; ?>" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>

                                        <th>SO #</th>
                                        <th>Order Date</th>
                                        <th>Remarks</th>
                                        <th>Status</th>
                                        <th>SO Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($sales as $item){ ?>
                                        <tr>
                                            <td><?php echo $item->so_no; ?></td>
                                            <td><?php echo $item->date_order; ?></td>
                                            <td><?php echo $item->remarks; ?></td>
                                            <td><?php echo $item->order_status; ?></td>
                                            <td><?php echo number_format($item->total_after_tax,2); ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>


            </td>
        </tr>
        </tbody>

    </table>
</center>

