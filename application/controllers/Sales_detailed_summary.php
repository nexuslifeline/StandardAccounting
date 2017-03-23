<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_detailed_summary extends CORE_Controller {

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(array(
            'Sales_invoice_model',
            'Company_model',
            'Customers_model'
        ));

    }

    public function index() {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);

        $data['customers']=$this->Customers_model->get_customer_list_for_sales_report();

        $data['title']='Sales Report';
        $this->load->view('sales_detailed_summary_view',$data);
    }


    function transaction($txn=null){
        switch($txn){
            case 'per-customer-sales':
                $m_sales_invoice=$this->Sales_invoice_model;
                $start=date("Y-m-d",strtotime($this->input->get('startDate',TRUE)));
                $end=date("Y-m-d",strtotime($this->input->get('endDate',TRUE)));

                $response['data']=$m_sales_invoice->get_customers_sales_detailed($start,$end);
                echo(
                json_encode($response)
                );
            break;

            case 'filter-summary-report':

                break;

            case 'detailed-report': 
                $m_company_info=$this->Company_model;
                $m_sales_invoice=$this->Sales_invoice_model;

                $company_info=$m_company_info->get_list();
                $data['company_info']=$company_info[0];

                $startDate=date('Y-m-d',strtotime($this->input->get('startDate')));
                $endDate=date('Y-m-d',strtotime($this->input->get('endDate')));

                $data['customers']=$m_sales_invoice->get_customers_sales_detailed($startDate,$endDate);

                $data['sales_details']=$m_sales_invoice->get_customers_sales_detailed($startDate,$endDate);

                $this->load->view('template/sales_summary_report',$data);
            break;
        }
    }



}
