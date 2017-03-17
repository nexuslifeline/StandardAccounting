<div class="static-sidebar-wrapper sidebar-default">
    <div class="static-sidebar">
        <div class="sidebar">
            <div class="widget">
                <div class="widget-body">
                    <div class="userinfo">
                        <div class="avatar">
                            <img src="<?php echo $this->session->user_photo; ?>" class="img-responsive img-circle">
                        </div>
                        <div class="info">
                            <span class="username"><?php echo $this->session->user_fullname; ?></span>
                            <span class="useremail"><?php echo $this->session->user_email; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="widget stay-on-collapse" id="widget-sidebar">
                <nav role="navigation" class="widget-body">
                    <ul class="acc-menu">
                        <li class="nav-separator"><span>Explore</span></li>

                        <li><a href="Dashboard"><i class="ti ti-home"></i><span>Dashboard</span><span class="badge badge-orange">0</span></a></li>
                        <li class="<?php echo (in_array('1',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-wallet"></i><span>Financing</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('1-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="General_journal">General Journal</a></li>
                                <li class="<?php echo (in_array('1-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Cash_disbursement">Cash Disbursement</a></li>
                                <li class="<?php echo (in_array('1-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_payables">Purchase Journal</a></li>
                                <li class="<?php echo (in_array('1-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Accounts_receivable">Sales Journal</a></li>
                                <li class="<?php echo (in_array('1-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="Cash_receipt">Cash Receipt</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('2',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-package"></i><span>Purchasing</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('2-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Purchases">Purchase Order</a></li>
                                <li class="<?php echo (in_array('2-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Deliveries">Purchase Invoice</a></li>
                                <li class="<?php echo (in_array('2-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Payable_payments">Record Payment</a></li>
                                <li class="<?php echo (in_array('2-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Issuances">Item Issuance</a></li>
                                <li class="<?php echo (in_array('2-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="Adjustments">Item Adjustment</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('3',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-shopping-cart"></i><span>Sales</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('3-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Sales_order">Sales Order</a></li>
                                <li class="<?php echo (in_array('3-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Sales_invoice">Sales Invoice</a></li>
                                <!-- <li><a href="Sales_invoice_other">Other Sales Invoice</a></li> -->
                                <li class="<?php echo (in_array('3-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Receivable_payments">Collection Entry</a></li>
                                <li><a href="AR_Receivable">AR Receivable Report</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('4',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-view-list-alt"></i><span>References</span></a>
                            <ul class="acc-menu">
                                <li  class="<?php echo (in_array('4-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_classes">Account Classification</a></li>
                                <li  class="<?php echo (in_array('4-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="categories">Category Management</a></li>
                                <li  class="<?php echo (in_array('4-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="departments">Branch Management</a></li>
                                <li  class="<?php echo (in_array('4-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="units">Unit Management</a></li>
                                <!-- <li  class="<?php //echo (in_array('4-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Refproducts">Product Types</a></li> -->
                                <!--<li><a href="brands">Brand Management</a></li>
                                <li><a href="discounts">Discount Management</a></li>
                                <li><a href="cards">Card Management</a></li>
                                <li><a href="generics">Generic Management</a></li>
                                <li><a href="giftcards">Gift Card Management</a></li>
                                <li><a href="locations">Location Management</a></li>-->
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('5',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-harddrive"></i><span>Masterfiles</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('5-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="products">Product Management</a></li>
                                <li class="<?php echo (in_array('5-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="suppliers">Supplier Management</a></li>
                                <li class="<?php echo (in_array('5-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="customers">Customer Management</a></li>
                                <li class="<?php echo (in_array('5-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Salesperson">Salesperson Management</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('6',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-settings"></i><span>Settings</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('6-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Tax">Setup Tax</a></li>
                                <li class="<?php echo (in_array('6-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_titles">Setup Chart of Accounts</a></li>
                                <li class="<?php echo (in_array('6-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_integration">General Configuration</a></li>
                                <li class="<?php echo (in_array('6-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="User_groups">Setup User Rights</a></li>
                                <li class="<?php echo (in_array('6-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="users">Create User Account</a></li>
                                <li class="<?php echo (in_array('6-6',$this->session->user_rights)?'':'hidden'); ?>"><a href="company">Setup Company Info</a></li>
                                <li class="<?php echo (in_array('6-7',$this->session->user_rights)?'':'hidden'); ?>"><a href="Check_layout">Setup Check Layout</a></li>

                            </ul>
                        </li>

                        <li class="<?php echo (in_array('9',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-bar-chart"></i><span>Accounting Reports</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('9-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Balance_sheet">Balance Sheet</a></li>
                                <li class="<?php echo (in_array('9-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Income_statement">Income Statement</a></li>
                                <li class="<?php echo (in_array('9-3',$this->session->user_rights)?'':'hidden'); ?>"><a href="Trial_balance">Trial Balance</a></li>
                                <li class="<?php echo (in_array('9-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_receivable_schedule">AR Schedule</a></li>
                                <li class="<?php echo (in_array('9-5',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_payable_schedule">AP Schedule</a></li>
                                <li class="<?php echo (in_array('9-6',$this->session->user_rights)?'':'hidden'); ?>"><a href="Customer_Subsidiary">Customer Subsidiary</a></li>
                                <li class="<?php echo (in_array('9-7',$this->session->user_rights)?'':'hidden'); ?>"><a href="Supplier_Subsidiary">Supplier Subsidiary</a></li>
                                <li class="<?php echo (in_array('9-8',$this->session->user_rights)?'':'hidden'); ?>"><a href="Account_Subsidiary">Account Subsidiary</a></li>
                            </ul>
                        </li>

                        <li class="<?php echo (in_array('8',$this->session->parent_rights)?'':'hidden'); ?>"><a href="#"><i class="ti ti-pie-chart"></i><span>Sales & Purchasing</span></a>
                            <ul class="acc-menu">
                                <li class="<?php echo (in_array('8-1',$this->session->user_rights)?'':'hidden'); ?>"><a href="Sales_detailed_summary">Sales Report</a></li>
                                <li class="<?php echo (in_array('8-2',$this->session->user_rights)?'':'hidden'); ?>"><a href="Inventory">Inventory</a></li>
                                <li class="<?php echo (in_array('8-4',$this->session->user_rights)?'':'hidden'); ?>"><a href="Purchase_Invoice_Report">Purchase Invoice Report</a></li>
                            </ul>
                        </li>


                    </ul>
                </nav>
            </div>

         

            <!--<div class="widget" id="widget-progress">
                <div class="widget-heading">
                    Progress
                </div>
                <div class="widget-body">

                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Bandwidth</div>
                            <div class="pull-right">50%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-lime" style="width: 50%"></div>
                        </div>
                    </div>
                    <div class="mini-progressbar">
                        <div class="clearfix mb-sm">
                            <div class="pull-left">Storage</div>
                            <div class="pull-right">25%</div>
                        </div>

                        <div class="progress">
                            <div class="progress-bar progress-bar-info" style="width: 25%"></div>
                        </div>
                    </div>

                </div>
            </div>-->
        </div>
    </div>
</div>