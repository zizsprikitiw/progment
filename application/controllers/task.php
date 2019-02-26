<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Task extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('ion_auth','form_validation','custom','encryption'));
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
		$this->data['title'] = "Task";
		$this->data['user_menu'] = $this->cms_model->get_user_menu($this->uri->rsegment(1));
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->data['body_class'] = $this->custom->bodyClass('default');
		
		//tambahan css plugin
		$this->data['add_css'] = array(
			base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.css",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-sweetalert/sweetalert.css",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-multiselect/css/bootstrap-multiselect.css",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datepicker/css/bootstrap-datepicker3.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.css",
			base_url($this->config->item('assets')['global_plugins'])."/morris/morris.css",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/fullcalendar.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jqvmap.css",
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.css",
		);
		
		//tambahan javascript plugin
		$this->data['add_javascript'] = array(
			//base_url($this->config->item('assets')['custom_scripts'])."/pages.js",
			base_url($this->config->item('assets')['custom_scripts'])."/task.js",
			base_url($this->config->item('assets')['global_plugins'])."/moment.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js",
			base_url($this->config->item('assets')['pages_scripts'])."/components-date-time-pickers.min.js",
			base_url($this->config->item('assets')['global_scripts'])."/datatable.js",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.js",
			base_url($this->config->item('assets')['pages_scripts'])."/ui-sweetalert.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-sweetalert/sweetalert.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-multiselect/js/bootstrap-multiselect.js",
			
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.js",
		);
		
		$this->load->view('task',$this->data);
	}
	
	public function data_list()
	{	
		$chkSearch = $this->input->post('chkSearch');
		$where = '';
		//$where['tahun'] =  $this->input->post('filter_tahun');
		//$where['user_id_penerima'] = $this->session->userdata('user_id');					
						
		if($chkSearch[0] != "")
		{			
			foreach($chkSearch as $chkSearch_item)						
			{				
				if($chkSearch_item == "bulan"){
					$where['bulan'] =  $this->input->post('filter_bulan');	
				}
				if($chkSearch_item == "nama"){
					$where['nama_user_pengirim ~*'] = strtolower($this->input->post('nama'));
				}		
				if($chkSearch_item == "posisi"){
					$where['posisi_id_pengirim'] =  $this->input->post('filter_posisi');	
				}		
				if($chkSearch_item == "jenis"){
					$where['status'] = strtolower($this->input->post('jenis_laporan'));
				}					
			}
		}
			
		//print_r($where);		
		$datatable_name = "v_tasks";	
		$search_column = '';
		$search_order = '';
		$order_by = 'update_date desc';								
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $list_item) {
			$member = '<ul>';
			$members = explode(',', trim($list_item->id_members, '{}'));
			foreach($members as $m) {
				$user = $this->cms_model->row_get_by_criteria('users', array('id'=>$m));
				$member .= '<li>'.$user->nama.'</li>';
			}
			$member .= '<ul>';
			//$user = $this->cms_model->row_get_by_criteria('user', 'id'=)
			$no++;
			$row = array();
			$row[] = $no;		
			$row[] = $list_item->nama_task.' ['.$list_item->nama_modul.'-'.$list_item->nama_program.']';
			$row[] = $list_item->nama_pic;		
			$row[] = $list_item->nama_approval;		
			$row[] = $member;
			$row[] = '<div class="progress">
                                            <div class="progress-bar progress-bar-success progress-xs" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="sr-only"> 40% Complete (success) </span>
                                            </div>
                                        </div>';
			$row[] = '';
			$row[] = '';
																														
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->cms_model->count_all_where($datatable_name, $where),
						"recordsFiltered" => $this->cms_model->count_filtered_where($datatable_name, $search_column, $search_order, $where, $order_by),
						"data" => $data,						
				);
		//output to json format
		echo json_encode($output);			
	}
}
