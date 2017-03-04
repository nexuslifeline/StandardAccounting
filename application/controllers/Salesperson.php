<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesperson extends CORE_Controller {

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Salesperson_model');
    }

    public function index() {
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);
        $data['title']='Salesperson Management';

        $this->load->view('salesperson_view',$data);
    }


    function transaction($txn=null) {
        switch($txn) {
            case 'list':
                $m_salesperson=$this->Salesperson_model;
                $response['data']=$m_salesperson->get_list(
                    array('salesperson.is_deleted'=>FALSE),
                    'salesperson_id, acr_name, CONCAT(firstname, " ", middlename, " ", lastname) AS fullname, firstname, middlename, lastname'
                );
                echo json_encode($response);

                break;

            case 'create':
                $m_salesperson=$this->Salesperson_model;

                $m_salesperson->set('date_created','NOW()');

                $m_salesperson->firstname=$this->input->post('firstname',TRUE);
                $m_salesperson->middlename=$this->input->post('middlename',TRUE);
                $m_salesperson->lastname=$this->input->post('lastname',TRUE);
                $m_salesperson->acr_name=$this->input->post('acr_name',TRUE);

                $m_salesperson->posted_by_user=$this->session->user_id;
                $m_salesperson->save();

                $salesperson_id=$m_salesperson->last_insert_id();

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Salesperson Information successfully created.';
                $response['row_added']= $m_salesperson->get_list(
                    $salesperson_id,
                    'salesperson_id, acr_name, CONCAT(firstname, " ", middlename, " ", lastname) AS fullname, firstname, middlename, lastname'
                );
                echo json_encode($response);

                break;

            case 'delete':
                $m_salesperson=$this->Salesperson_model;
                $salesperson_id=$this->input->post('salesperson_id',TRUE);

                $m_salesperson->is_deleted=1;
                if($m_salesperson->modify($salesperson_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Salesperson information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_salesperson=$this->Salesperson_model;

                $salesperson_id=$this->input->post('salesperson_id',TRUE);
                $m_salesperson->firstname=$this->input->post('firstname',TRUE);
                $m_salesperson->middlename=$this->input->post('middlename',TRUE);
                $m_salesperson->lastname=$this->input->post('lastname',TRUE);
                $m_salesperson->acr_name=$this->input->post('acr_name',TRUE);
                $m_salesperson->modify($salesperson_id);

                $response['title']='Success!';
                $response['stat']='success';
                $response['msg']='Salesperson Information successfully updated.';
                $response['row_updated']=$m_salesperson->get_list(
                    $salesperson_id,
                    'salesperson_id, acr_name, CONCAT(firstname, " ", middlename, " ", lastname) AS fullname, firstname, middlename, lastname'
                );
                echo json_encode($response);

                break;
       	}
    }
}
