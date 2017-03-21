<?php
	class Fixed_asset_management_model extends CORE_Model
	{
		protected $table="fixed_assets";
		protected $pk_id="fixed_asset_id";
		function __construct()
		{
			parent::__construct();
		}
	}
?>