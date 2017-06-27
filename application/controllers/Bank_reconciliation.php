<?php
	defined('BASEPATH') OR exit('No direct script access allowed.');

	class Bank_reconciliation extends CORE_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model(
				array(
					'Bank_model',
					'Journal_info_model',
					'Account_title_model'
				)
			);
		}

		public function index()
		{
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
	        $data['banks']=$this->Bank_model->get_list('is_active=TRUE AND is_deleted=FALSE');
	        $data['account_titles']=$this->Account_title_model->get_list('is_active=TRUE AND is_deleted=FALSE');
	        $data['title'] = 'Bank Reconciliation';

	        $this->load->view('bank_reconciliation_view', $data);
		}

		function transaction($txn) 
		{
			switch ($txn) {
				case 'list':
					$m_journal=$this->Journal_info_model;

					$startDate=date('Y-m-d',strtotime($this->input->get('sDate',TRUE)));
					$endDate=date('Y-m-d',strtotime($this->input->get('eDate',TRUE)));
					$bank_id=$this->input->get('bankid',TRUE);

					$response['data']=$m_journal->get_bank_recon($bank_id,$startDate,$endDate);

					echo json_encode($response);
					break;
				
				default:
					
					break;
			}
		}
	}
?>