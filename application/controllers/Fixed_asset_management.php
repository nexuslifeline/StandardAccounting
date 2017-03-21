<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fixed_asset_management extends CORE_Controller
	{		
		function __construct()
		{
			parent::__construct('');
			$this->validate_session();
			$this->load->model(
				array(
					'Locations_model',
					'Categories_model',
					'Asset_property_status_model',
					'Fixed_asset_management_model',
					'Departments_model'
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
	        $data['title'] = 'Fixed Asset Management';

	        $data['locations']=$this->Locations_model->get_list('is_active=TRUE AND is_deleted=FALSE');
	        $data['categories']=$this->Categories_model->get_category_list();
	        $data['asset_properties']=$this->Asset_property_status_model->get_list('is_deleted=FALSE');
	        $data['departments']=$this->Departments_model->get_list('is_deleted=FALSE AND is_active=TRUE');

	        $this->load->view('fixed_asset_management_view',$data);
		}

		function transaction($txn=null) {
			switch($txn) {
				case 'list':
					$m_fixed_asset=$this->Fixed_asset_management_model;

					$response['data']=$m_fixed_asset->get_list(
						'is_deleted=FALSE AND is_active=TRUE',
						array(
							'locations.*',
							'departments.*',
							'categories.*',
							'asset_property_status.*'
						),
						array(
							array('locations','locations.location_id=fixed_assets.location_id','left'),
							array('departments','departments.department_id=fixed_assets.department_id','left'),
							array('categories','categories.category_id=fixed_assets.category_id','left'),
							array('asset_property_status','asset_property_status.asset_status_id=fixed_assets.asset_status_id','left')
						)
					);

					echo json_encode($response);
				break;

				case 'create':
					$m_fixed_asset=$this->Fixed_asset_management_model;


				break;
			}
		}
	}
?>