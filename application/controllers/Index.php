<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth','form_validation','custom'));
			$this->load->helper(array('url','language'));
			$this->load->config('custom');
			$this->load->model('cms_model');
			
			$this->lang->load('auth');
			if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('login', 'refresh');			
			}
	}
	
	public function index()
	{
		$this->data['title'] = "Beranda";
		$this->data['user_menu'] = $this->cms_model->get_user_menu($this->uri->rsegment(1));
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['body_class'] = $this->custom->bodyClass('default');
		
		//tambahan css plugin
		$this->data['add_css'] = array(
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-daterangepicker/daterangepicker.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/morris/morris.css",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar/fullcalendar.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jqvmap.css",
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.css",
		);
		
		//tambahan javascript plugin
		$this->data['add_javascript'] = array(
			base_url($this->config->item('assets')['custom_scripts'])."/beranda.js",
			base_url($this->config->item('assets')['custom_scripts'])."/dashboard.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/moment.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-daterangepicker/daterangepicker.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/morris/morris.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/morris/raphael-min.js",
			base_url($this->config->item('assets')['global_plugins'])."/counterup/jquery.waypoints.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/counterup/jquery.counterup.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/amcharts.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/serial.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/pie.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/radar.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/light.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/patterns.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/chalk.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/ammap/ammap.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/ammap/maps/js/worldLow.js",
			base_url($this->config->item('assets')['global_plugins'])."/amcharts/amstockcharts/amstock.js",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar/fullcalendar.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/horizontal-timeline/horizontal-timeline.js",
			base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.resize.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.categories.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/jquery-easypiechart/jquery.easypiechart.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/jquery.sparkline.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jquery.vmap.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.russia.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.world.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.europe.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.germany.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.usa.js",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/data/jquery.vmap.sampledata.js",
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.js",
		);
		
		$this->load->view('index',$this->data);
	}
	
	public function data_init()
	{
		$user_id = $this->session->userdata('user_id');
		$table_name = 'v_users_proyek';
		$is_distinct = 'true';
		$select = 'proyek_id,singkatan';
		$where = 'user_id='.$user_id.' AND tahun=2018';
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'proyek_id ASC';
		$group_by = '';
		$limit = '';
		
		$list_proyek_year = $this->cms_model->get_year_proyek_by_user($user_id); 
		$list_proyek = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$filter_proyek_year = array();
		$filter_proyek = array();
		
		foreach ($list_proyek_year as $list_item) {
			$filter_proyek_year[] = array("id_item" => $list_item->tahun, "nama_item" => $list_item->tahun);
		}
		foreach ($list_proyek as $list_item) {
			$filter_proyek[] = array("id_item" => $list_item->proyek_id, "nama_item" => $list_item->singkatan);
		}
		
		$data['filter_proyek_year'] = $filter_proyek_year;	
		$data['filter_proyek'] = $filter_proyek;	
		echo json_encode($data);
	}
	
	public function data_struktur_organisasi()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_users_posisi';
		$is_distinct = 'false';
		$select = '*';
		$where = 'proyek_id='.$proyek_id;
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'posisi_id ASC';
		$group_by = '';
		$limit = '';
		
		$list_struktur = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$data_struktur = array();
		// $filter_proyek = array();
		
		// foreach ($list_proyek_year as $list_item) {
			// $filter_proyek_year[] = array("id_item" => $list_item->tahun, "nama_item" => $list_item->tahun);
		// }
		$n = 1;
		foreach ($list_struktur as $list_item) {
			$parent_id = null;
			$parent_array = null;
			
			if($list_item->posisi_id==3) {
				$parent_array[$list_item->leader_id] = $list_item->user_id;
			} else if($list_item->posisi_id==3) {
				$parent_array[$list_item->leader_id] = $list_item->user_id;
			} else if($list_item->posisi_id==4) {
				
			} else {
				
			}
			$data_struktur[] = array("id" => $list_item->user_id, "parentId" => null, "name" => $list_item->nama_user, "title" => $list_item->nama_posisi.' - '.$list_item->leader_singkatan, "phone" => null, "mail" => null, "adress" => null, "image" => base_url()."uploads/users/avatar_1.jpg");
			$n++;
		}
		
		// $data['filter_proyek_year'] = $filter_proyek_year;	
		$data = array(
				array ( "id" => 1, "parentId" => null, "name" => "Amber McKenzie", "title" => "CEO", "phone" => "678-772-470", "mail" => "lemmons@jourrapide.com", "adress" => "Atlanta, GA 30303", "image" => base_url()."uploads/users/avatar_1.jpg" ),
				array ( "id" => 2, "parentId" => 1, "name" => "Amber McKenzie", "title" => "CEO", "phone" => "678-772-470", "mail" => "lemmons@jourrapide.com", "adress" => "Atlanta, GA 30303", "image" => base_url()."uploads/users/avatar_1.jpg" ),
				array ( "id" => 3, "parentId" => 2, "name" => "Amber McKenzie", "title" => "CEO", "phone" => "678-772-470", "mail" => "lemmons@jourrapide.com", "adress" => "Atlanta, GA 30303", "image" => base_url()."uploads/users/avatar_1.jpg" ),
				array ( "id" => 4, "parentId" => 2, "name" => "Amber McKenzie", "title" => "CEO", "phone" => "678-772-470", "mail" => "lemmons@jourrapide.com", "adress" => "Atlanta, GA 30303", "image" => base_url()."uploads/users/avatar_1.jpg" ),
				array ( "id" => 5, "parentId" => 1, "name" => "Amber McKenzie", "title" => "CEO", "phone" => "678-772-470", "mail" => "lemmons@jourrapide.com", "adress" => "Atlanta, GA 30303", "image" => base_url()."uploads/users/avatar_1.jpg" ),
				// { id: 2, parentId: 1, name: "Ava Field", title: "Paper goods machine setter", phone: "937-912-4971", mail: "anderson@jourrapide.com", image: "images/f-2.jpg" },
				// { id: 3, parentId: 1, name: "Evie Johnson", title: "Employer relations representative", phone: "314-722-6164", mail: "thornton@armyspy.com", image: "images/f-3.jpg" },
				// { id: 4, parentId: 2, name: "Paul Shetler", title: "Teaching assistant", phone: "330-263-6439", mail: "shetler@rhyta.com", image: "images/f-4.jpg" },
				// { id: 5, parentId: 2, name: "Rebecca Francis", title: "Welding machine setter", phone: "408-460-0589", image: "images/f-5.jpg" },
				// { id: 6, parentId: 2, name: "Rebecca Randall", title: "Optometrist", phone: "801-920-9842", mail: "JasonWGoodman@armyspy.com", image: "images/f-6.jpg" },
				// { id: 7, parentId: 2, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-12.jpg" },
				// { id: 8, parentId: 3, name: "Spencer May", title: "System operator", phone: "Conservation scientist", mail: "hodges@teleworm.us", image: "images/f-7.jpg" },
				// { id: 9, parentId: 3, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-8.jpg" },
				// { id: 10, parentId: 3, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-15.jpg" },
				// { id: 11, parentId: 4, name: "Callum Whitehouse", title: "Radar controller", phone: "847-474-8775", image: "images/f-10.jpg" },
				// { id: 12, parentId: 4, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-11.jpg" },
				// { id: 13, parentId: 4, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-12.jpg" },
				// { id: 14, parentId: 5, name: "Callum Whitehouse", title: "Radar controller", phone: "847-474-8775", image: "images/f-13.jpg" },
				// { id: 15, parentId: 5, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-14.jpg" },
				// { id: 16, parentId: 5, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-15.jpg" },
				// { id: 17, parentId: 6, name: "Callum Whitehouse", title: "Radar controller", phone: "847-474-8775", image: "images/f-16.jpg" },
				// { id: 18, parentId: 6, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-17.jpg" },
				// { id: 19, parentId: 7, name: "Spencer May", title: "System operator", phone: "Conservation scientist", mail: "hodges@teleworm.us", image: "images/f-7.jpg" },
				// { id: 20, parentId: 7, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-8.jpg" },
				// { id: 21, parentId: 7, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-9.jpg" },
				// { id: 22, parentId: 8, name: "Ava Field", title: "Paper goods machine setter", phone: "937-912-4971", mail: "anderson@jourrapide.com", image: "images/f-2.jpg" },
				// { id: 23, parentId: 8, name: "Evie Johnson", title: "Employer relations representative", phone: "314-722-6164", mail: "thornton@armyspy.com", image: "images/f-3.jpg" }, 
				// { id: 24, parentId: 9, name: "Callum Whitehouse", title: "Radar controller", phone: "847-474-8775", image: "images/f-13.jpg" },
				// { id: 25, parentId: 9, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-14.jpg" },
				// { id: 26, parentId: 9, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-15.jpg" },
				// { id: 27, parentId: 10, name: "Callum Whitehouse", title: "Radar controller", phone: "847-474-8775", image: "images/f-13.jpg" },
				// { id: 28, parentId: 10, name: "Max Ford", title: "Budget manager", phone: "989-474-8325", mail: "hunter@teleworm.us", image: "images/f-14.jpg" },
				// { id: 29, parentId: 10, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-15.jpg" },
				// { id: 29, parentId: null, name: "Riley Bray", title: "Structural metal fabricator", phone: "479-359-2159", image: "images/f-15.jpg" }

			);
		
		
		echo json_encode($data);
	}
}
