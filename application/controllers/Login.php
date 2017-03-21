<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CORE_Controller {

    function __construct()
    {
        parent::__construct('');
        $this->load->model('Users_model');
        $this->load->model('User_groups_model');
        $this->load->model('Tax_types_model');
        $this->load->model('Approval_status_model');
        $this->load->model('Order_status_model');
        $this->load->model('Account_type_model');
        $this->load->model('Departments_model');
        $this->load->model('Item_type_model');
        $this->load->model('Payment_method_model');
        $this->load->model('Account_class_model');
        $this->load->model('Account_title_model');
        $this->load->model('Rights_link_model');
        $this->load->model('User_group_right_model');
        $this->load->model('Refproduct_model');
        $this->load->model('Journal_account_model');
        $this->load->model('Journal_info_model');
        $this->load->model('Asset_property_status_model');
    }


    public function index()
    {
        $this->create_required_default_data();

        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);

        //WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)
        if($this->session->userdata('logged_in') == 1) {
            $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
            $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
            $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
            $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
            $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);

            $m_journal=$this->Journal_account_model;
            $m_journal_info=$this->Journal_info_model;


            $info=$m_journal->get_list(

                "journal_info.date_txn LIKE '".date('Y-m-d')."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $income_this_day=$info[0]->income_amount;
            $data['income_this_day']=$income_this_day;


            $yesterday=date('Y-m-d', strtotime("yesterday"));
            $info=$m_journal->get_list(

                "journal_info.date_txn='$yesterday' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $income_yesterday=$info[0]->income_amount;
            $data['income_yesterday']=$income_yesterday;


            /**
             * get income of previous week
             */
            $period_end=date('Y-m-d', strtotime("last sunday"));
            $period_start=date('Y-m-d',strtotime('-6 days',strtotime("last sunday")));
            $info=$m_journal->get_list(

                "journal_info.date_txn BETWEEN '$period_start' AND '$period_end' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $income_last_week=$info[0]->income_amount;
            $data['income_last_week']=$income_last_week;

            $full_income_period=$income_this_day+$income_yesterday+$income_last_week;
            if($full_income_period>0){
                $this_day_percentage=(100*$income_this_day)/$full_income_period;
                $yesterday_percentage=(100*$income_yesterday)/$full_income_period;
                $last_week_percentage=(100*$income_last_week)/$full_income_period;
            }else{
                $this_day_percentage=0;
                $yesterday_percentage=0;
                $last_week_percentage=0;
            }
            $data['this_day_percentage']=$this_day_percentage;
            $data['yesterday_percentage']=$yesterday_percentage;
            $data['last_week_percentage']=$last_week_percentage;



            $info=$m_journal->get_list(

                "journal_info.date_txn LIKE '".date('Y-m')."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $data['income_current_month']=$info[0]->income_amount;


            /**
             * get previous month income
             */
            $info=$m_journal->get_list(

                "journal_info.date_txn LIKE '".date('Y-m',strtotime('-1 month'))."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $data['income_last_month']=$info[0]->income_amount;

            $info=$m_journal->get_list(

                "journal_info.date_txn LIKE '".date('Y')."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $income_this_year=$info[0]->income_amount;
            $data['income_this_year']=$income_this_year;


            /**
             * income from previous year
             */
            $info=$m_journal->get_list(

                "journal_info.date_txn LIKE '".date('Y',strtotime('-1 year'))."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

                '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

                array(
                    array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                    array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                    array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
                )

            );
            $income_last_year=$info[0]->income_amount;
            $data['income_last_year']=$income_last_year;


            /**
             * compute percentage on total income
             */
            $full_percentage=$income_this_year+$income_last_year;
            if($full_percentage>0){
                $this_year_percentage=(100*$income_this_year)/$full_percentage;
                $last_year_percentage=(100*$income_last_year)/$full_percentage;
            }else{
                $this_year_percentage=0;
                $last_year_percentage=0;
            }


            $data['this_year_income_percentage']=$this_year_percentage;
            $data['last_year_income_percentage']=$last_year_percentage;


            /**
             * get total number of clients on previous year
             */
            $info=$m_journal_info->get_list(
                "journal_info.date_txn LIKE '".date('Y',strtotime('-1 year'))."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND journal_info.customer_id>0"
                ,
                'COUNT(journal_info.customer_id)as total_clients',
                null,
                null
            );
            $data['total_last_year_client']=$info[0]->total_clients;


            /**
             * get total number of clients this year
             */
            $info=$m_journal_info->get_list(

                "journal_info.date_txn LIKE '".date('Y')."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND journal_info.customer_id>0",

                'COUNT(DISTINCT journal_info.customer_id)as total_clients',
                null,
                null

            );
            $data['total_current_year_client']=$info[0]->total_clients;


            $current_year_income_monthly=array();
            $previous_year_income_monthly=array();
            $expense_monthly=array();

            for($i=1;$i<=12;$i++){

                $current_year_income_monthly[]=$this->get_current_year_income($i);
                $previous_year_income_monthly[]=$this->get_previous_year_income($i);

                $expense_monthly[]=$this->get_expense($i);
            }

            $data['current_year_income_monthly']=$current_year_income_monthly;
            $data['previous_year_income_monthly']=$previous_year_income_monthly;
            $data['expense_monthly']=$expense_monthly;
            $this->load->view('dashboard_view',$data);

        } else {
            $this->load->view('login_view',$data); 
        }
        //END WORKAROUND FOR LOGIN REDIRECTION TO DASHBOARD (if user session is ACTIVE)

    }

    function get_expense($month){

        $m_journal=$this->Journal_account_model;
        $month=(strlen($month)==1?'0'.$month:$month);

        $info=$m_journal->get_list(

            "journal_info.date_txn LIKE '".date('Y')."-".$month."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=5",

            '(SUM(journal_accounts.dr_amount)-SUM(journal_accounts.cr_amount)) as expense_amount',

            array(
                array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            )

        );

        return (float)(($info[0]->expense_amount==null?0:$info[0]->expense_amount));
    }


    function get_previous_year_income($month){

        $m_journal=$this->Journal_account_model;
        $month=(strlen($month)==1?'0'.$month:$month);

        $info=$m_journal->get_list(

            "journal_info.date_txn LIKE '".(date('Y')-1)."-".$month."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

            '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

            array(
                array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            )

        );

        return (float)(($info[0]->income_amount==null?0:$info[0]->income_amount));
    }

    function get_current_year_income($month){

        $m_journal=$this->Journal_account_model;
        $month=(strlen($month)==1?'0'.$month:$month);

        $info=$m_journal->get_list(

            "journal_info.date_txn LIKE '".date('Y')."-".$month."%' AND journal_info.is_active=TRUE AND journal_info.is_deleted=FALSE AND account_classes.account_type_id=4",

            '(SUM(journal_accounts.cr_amount)-SUM(journal_accounts.dr_amount)) as income_amount',

            array(
                array('journal_info','journal_info.journal_id=journal_accounts.journal_id','inner'),
                array('account_titles','account_titles.account_id=journal_accounts.account_id','inner'),
                array('account_classes','account_classes.account_class_id=account_titles.account_class_id','inner')
            )

        );

        return (float)(($info[0]->income_amount==null?0:$info[0]->income_amount));
    }


    function create_required_default_data(){

        $m_asset_property=$this->Asset_property_status_model;
        $m_asset_property->create_default_asset_property();

        $m_links=$this->Rights_link_model;
        $m_links->create_default_link_list();

        //create default user : the admin
        $m_users=$this->Users_model;
        $m_users->create_default_user();

        $m_product_type=$this->Refproduct_model;
        $m_product_type->create_default_product_type();

        //create default user group : the Super User
        $m_user_groups=$this->User_groups_model;
        $m_user_groups->create_default_user_group();

        //create default tax types : Non-vat , Vatted(12%)
        $m_tax_types=$this->Tax_types_model;
        $m_tax_types->create_default_tax_type();

        //create default approval status
        $m_approval=$this->Approval_status_model;
        $m_approval->create_default_approval_status();

        //create default order status
        $m_approval=$this->Order_status_model;
        $m_approval->create_default_order_status();

        //create default account types
        $m_account_types=$this->Account_type_model;
        $m_account_types->create_default_account_types();

        $m_department=$this->Departments_model;
        $m_department->create_default_department();

        $m_item_type=$this->Item_type_model;
        $m_item_type->create_default_item_types();


        $m_payment_method=$this->Payment_method_model;
        $m_payment_method->create_default_payment_method();

        $m_account_class=$this->Account_class_model;
        $m_account_class->create_default_account_classes();

        $m_account_title=$this->Account_title_model;
        $m_account_title->create_default_account_title();




    }


    function transaction($txn=null){

        switch($txn){

                //****************************************************************************
                case 'validate' :
                    $uname=$this->input->post('uname');
                    $pword=$this->input->post('pword');

                    $users=$this->Users_model;
                    $result=$users->authenticate_user($uname,$pword);

                    if($result->num_rows()>0){//valid username and pword
                        $m_rights=$this->User_group_right_model;
                        $rights=$m_rights->get_list(
                            array(
                                'user_group_rights.user_group_id'=>$result->row()->user_group_id
                            ),
                            'user_group_rights.link_code'
                        );

                        $user_rights=array();
                        $parent_links=array();
                        foreach($rights as $right){
                            $main=explode('-',$right->link_code);
                            $user_rights[]=$right->link_code;
                            $parent_links[]=$main[0];
                        }


                        //set session data here and response data
                        $this->session->set_userdata(
                            array(
                                'user_id'=>$result->row()->user_id,
                                'user_group_id'=>$result->row()->user_group_id,
                                'user_fullname'=>$result->row()->user_fullname,
                                'user_email'=>$result->row()->user_email,
                                'user_photo'=>$result->row()->photo_path,
                                'user_rights'=>$user_rights,
                                'parent_rights'=>$parent_links,
                                'logged_in'=>1
                            )
                        );

                        $response['title']='Success';
                        $response['stat']='success';
                        $response['msg']='User successfully authenticated.';

                        echo json_encode($response);

                    }else{ //not valid

                        $response['stat']='error';
                        $response['msg']='Invalid username or password.';
                        echo json_encode($response);

                    }

                    break;
                //****************************************************************************
                case 'logout' :
                    $this->end_session();
                //****************************************************************************


                break;

                default:


        }




    }




}
