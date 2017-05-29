<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TAccount extends CORE_Controller
{
    function __construct()
    {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(
            array
            (
                'Journal_account_model',
                'Departments_model'
            )
        );
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', true);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', true);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', true);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', true);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', true);
        $data['title'] = 'Inventory Report';

        $data['departments']=$this->Departments_model->get_list(array('is_deleted'=>FALSE,'is_active'=>TRUE));
        $this->load->view('book_of_accounts_view',$data);

    }



    public function transaction($txn=null){
        switch($txn){
            case 'get-journal-list':
                $m_journal = $this->Journal_account_model;

                $start =date('Y-m-d', strtotime($this->input->post('start',TRUE)));
                $end = date('Y-m-d', strtotime($this->input->post('end',TRUE)));
                $book = $this->input->post('book',TRUE);

                $response['data'] = $m_journal->get_t_account($book,$start,$end);
                echo json_encode($response);
                break;

        }
    }







}
?>