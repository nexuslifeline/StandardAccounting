<?php
	defined('BASEPATH') OR exit('direct script access is not allowed');

	class Petty_cash_journal extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Journal_info_model',
					'Journal_account_model',
					'Suppliers_model',
					'Departments_model',
					'Account_title_model',
					'Account_integration_model'
				)
			);
		}

		public function index() {
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
	        $data['title'] = 'Petty Cash Journal';

	        $data['suppliers']=$this->Suppliers_model->get_list(
	        	'is_deleted=FALSE AND is_active=TRUE'
	        );

	        $data['departments']=$this->Departments_model->get_list(
	        	'is_deleted=FALSE AND is_active=TRUE'
	        );

	        $data['accounts']=$this->Account_title_model->get_list(
	        	'is_deleted=FALSE AND is_active=TRUE'
	        );

	        $this->load->view('petty_cash_journal_view',$data);
		}

		function transaction($txn) {
			switch($txn) {
				case 'list':
					$m_journal=$this->Journal_info_model;

					$asOfDate=date('Y-m-d',strtotime($this->input->get('aod',TRUE)));

					$response['data']=$m_journal->get_petty_cash_list($asOfDate);

					echo json_encode($response);
				break;

				case 'save':
					$m_journal=$this->Journal_info_model;
					$m_accounts=$this->Journal_account_model;
					$m_account_integration=$this->Account_integration_model;

					$m_journal->begin();

					$m_journal->ref_no=$this->input->post('ref_no',TRUE);
					$m_journal->supplier_id=$this->input->post('supplier_id',TRUE);
					$m_journal->department_id=$this->input->post('department_id',TRUE);
					$m_journal->book_type='PCV';
					$m_journal->date_txn=date('Y-m-d',strtotime($this->input->post('date_txn',TRUE)));
					$m_journal->amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_journal->remarks=$this->input->post('remarks',TRUE);
					$m_journal->save();

					$journal_id=$m_journal->last_insert_id();
					
					$petty_cash_id=$m_account_integration->get_list(
						null,
						'petty_cash_account_id'
					);

					$m_accounts->journal_id=$journal_id;
					$m_accounts->account_id=$this->input->post('account_id',TRUE);
					$m_accounts->dr_amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_accounts->save();

					$petty_cash_account_id=$petty_cash_id[0]->petty_cash_account_id;
					$m_accounts->journal_id=$journal_id;
					$m_accounts->account_id=$petty_cash_account_id;
					$m_accounts->dr_amount=$this->get_numeric_value('0');
					$m_accounts->cr_amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_accounts->save();

					$m_journal->txn_no='PCV-'.date('Ymd').'-'.$journal_id;
					$m_journal->modify($journal_id);

					$m_journal->commit();

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Petty Cash successfully created.';
                    $response['row_added']=$this->response_rows($journal_id);

                    echo json_encode($response);
				break;

				case 'update':
					$m_journal=$this->Journal_info_model;
					$m_accounts=$this->Journal_account_model;
					$m_account_integration=$this->Account_integration_model;

					$journal_id=$this->input->post('journal_id',TRUE);

					$m_journal->begin();

					$m_journal->ref_no=$this->input->post('ref_no',TRUE);
					$m_journal->supplier_id=$this->input->post('supplier_id',TRUE);
					$m_journal->department_id=$this->input->post('department_id',TRUE);
					$m_journal->book_type='PCV';
					$m_journal->date_txn=date('Y-m-d',strtotime($this->input->post('date_txn',TRUE)));
					$m_journal->amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_journal->remarks=$this->input->post('remarks',TRUE);
					$m_journal->modify($journal_id);
					
					$m_accounts->delete_via_fk($journal_id);

					$petty_cash_id=$m_account_integration->get_list(
						null,
						'petty_cash_account_id'
					);

					$m_accounts->journal_id=$journal_id;
					$m_accounts->account_id=$this->input->post('account_id',TRUE);
					$m_accounts->dr_amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_accounts->save();

					$petty_cash_account_id=$petty_cash_id[0]->petty_cash_account_id;
					$m_accounts->journal_id=$journal_id;
					$m_accounts->account_id=$petty_cash_account_id;
					$m_accounts->dr_amount=$this->get_numeric_value('0');
					$m_accounts->cr_amount=$this->get_numeric_value($this->input->post('amount',TRUE));
					$m_accounts->save();

					$m_journal->commit();

					$response['title'] = 'Success!';
                    $response['stat'] = 'success';
                    $response['msg'] = 'Petty Cash successfully updated.';
                    $response['row_updated']=$this->response_rows($journal_id);

                    echo json_encode($response);
				break;

				case 'get-totals':
					$m_journal=$this->Journal_info_model;

					$AsOfDate=date('Y-m-d',strtotime($this->input->get('aod',TRUE)));

					$remaining_amount=$m_journal->get_remaining_amount($AsOfDate);

					$unreplenished_expense=$m_journal->get_list(
						'is_replenished=0
						AND book_type="PCV"
						AND is_active=TRUE
						AND is_deleted=FALSE
						AND date_txn <= "'.$AsOfDate.'"',
						'SUM(amount) AS unreplenished_expense'
					);

					$response['unreplenished_expense']=number_format($unreplenished_expense[0]->unreplenished_expense,2);
					$response['remaining_amount']=number_format($remaining_amount[0]->Balance,2);

					echo json_encode($response);
				break;
			}
		}

		function response_rows($filter=null){
			return $this->Journal_info_model->get_list(
				array(
					'journal_info.is_deleted'=>FALSE,
					'journal_info.is_active'=>TRUE,
					'journal_info.book_type'=>'PCV',
					'journal_info.journal_id'=>$filter,
					'journal_accounts.cr_amount'=>'!=0'
				),
				'journal_info.*, suppliers.*,journal_accounts.*',
				array(
					array('suppliers','suppliers.supplier_id=journal_info.supplier_id','left'),
					array('journal_accounts','journal_accounts.journal_id=journal_info.journal_id','inner')
				)
			);
		}
 	}
?>