<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
	
	function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth','form_validation','custom','encryption'));
			$this->load->helper(array('url','language','file'));
			$this->load->config('custom');
			$this->load->model('cms_model');
			setlocale(LC_ALL, "IND");
			
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
			base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.css",
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
			base_url($this->config->item('assets')['custom_scripts'])."/pages.js",
			base_url($this->config->item('assets')['custom_scripts'])."/beranda.js",
			//base_url($this->config->item('assets')['custom_scripts'])."/dashboard.min.js",
			base_url($this->config->item('assets')['pages_scripts'])."/portlet-draggable.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/moment.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datepicker/js/bootstrap-datepicker.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js",
			base_url($this->config->item('assets')['pages_scripts'])."/components-date-time-pickers.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/morris/morris.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/morris/raphael-min.js",
			base_url($this->config->item('assets')['global_plugins'])."/counterup/jquery.waypoints.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/counterup/jquery.counterup.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/amcharts.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/serial.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/pie.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/radar.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/light.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/patterns.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amcharts/themes/chalk.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/ammap/ammap.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/ammap/maps/js/worldLow.js",
			// base_url($this->config->item('assets')['global_plugins'])."/amcharts/amstockcharts/amstock.js",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/fullcalendar.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/locale-all.js",
			base_url($this->config->item('assets')['global_plugins'])."/horizontal-timeline/horizontal-timeline.js",
			// base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.resize.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/flot/jquery.flot.categories.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jquery-easypiechart/jquery.easypiechart.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jquery.sparkline.min.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jquery.vmap.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.russia.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.world.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.europe.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.germany.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/maps/jquery.vmap.usa.js",
			// base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/data/jquery.vmap.sampledata.js",
			base_url($this->config->item('assets')['global_scripts'])."/datatable.js",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-multiselect/js/bootstrap-multiselect.js",
			
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.js",
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.js",
		);
		
		$this->load->view('index',$this->data);
	}
	
	public function task($task_id = null)
	{
		if(!empty($task_id)){
			$task_id = base64_decode($task_id);
			$is_admin = $this->cms_model->user_is_admin(); 
			$user_id = $this->session->userdata('user_id');
			$table_name = 'v_tasks';
			$where = 'id='.$task_id.'';
			
			$list_task = $this->cms_model->row_get_by_criteria($table_name, $where);
			
			if(!empty($list_task)) {
				$admin = '';
				if ($is_admin) {
					$admin = $user_id;
				}
				$members = explode(',', trim($list_task->id_members, '{}'));
				array_push($members,$list_task->pic_id,$list_task->approval_id,$user_id);
				
				if (in_array($user_id,$members)) {
					$this->data['title'] = "Task";
					$this->data['tasks_id'] = $list_task->id;
					$this->data['user_id'] = $user_id;
					$this->data['pic_id'] = $list_task->pic_id;
					$this->data['is_admin'] = $is_admin;
					$this->data['nama_task'] = $list_task->nama_task;
					$this->data['user_menu'] = $this->cms_model->get_user_menu($this->uri->rsegment(1));
					$this->data['user'] = $this->ion_auth->user()->row();
					$this->data['body_class'] = $this->custom->bodyClass('default');
					
					$table_name = 'users';
					$where = 'id='.$list_task->pic_id.'';
					
					$list_user = $this->cms_model->row_get_by_criteria($table_name, $where);
					
					$this->data['photo'] = $list_user->photo;
					
					//tambahan css plugin
					$this->data['add_css'] = array(
						base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.css",
						base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.css",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-daterangepicker/daterangepicker.min.css",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.css",
						base_url($this->config->item('assets')['global_plugins'])."/morris/morris.css",
						base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/fullcalendar.min.css",
						base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jqvmap.css",
						base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.css",
						base_url($this->config->item('assets')['global_plugins'])."/ion.rangeslider/css/ion.rangeSlider.css",
						base_url($this->config->item('assets')['global_plugins'])."/ion.rangeslider/css/ion.rangeSlider.skinFlat.css",
						base_url($this->config->item('assets')['apps_css'])."/todo-2.min.css",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-wysihtml5/bootstrap-wysihtml5.css",
					);
					
					//tambahan javascript plugin
					$this->data['add_javascript'] = array(
						base_url($this->config->item('assets')['global_scripts'])."/datatable.js",
						base_url($this->config->item('assets')['global_plugins'])."/datatables/datatables.min.js",
						base_url($this->config->item('assets')['global_plugins'])."/datatables/plugins/bootstrap/datatables.bootstrap.js",
						base_url($this->config->item('assets')['custom_scripts'])."/pages.js",
						//base_url($this->config->item('assets')['custom_scripts'])."/dashboard.min.js",
						base_url($this->config->item('assets')['pages_scripts'])."/portlet-draggable.min.js",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.js",
						base_url($this->config->item('assets')['global_plugins'])."/ion.rangeslider/js/ion.rangeSlider.min.js",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-wysihtml5/wysihtml5-0.3.0.js",
						base_url($this->config->item('assets')['global_plugins'])."/bootstrap-wysihtml5/bootstrap-wysihtml5.js",
						base_url($this->config->item('assets')['custom_scripts'])."/beranda_task.js",
					);
					
					$this->load->view('beranda/task',$this->data);
				} else {
					redirect('index', 'refresh');
				}
			} else {
				redirect('index', 'refresh');
			}
		} else {
			redirect('index', 'refresh');
		}
	}
	
	public function data_init()
	{
		$user_id = $this->session->userdata('user_id');
		
		$list_proyek_year = $this->cms_model->get_year_proyek_by_user($user_id); 
		$filter_proyek_year = array();
		
		foreach ($list_proyek_year as $list_item) {
			$filter_proyek_year[] = array("id_item" => $list_item->tahun, "nama_item" => $list_item->tahun);
		}
		
		$data['filter_proyek_year'] = $filter_proyek_year;	
		echo json_encode($data);
	}
	
	public function data_select_proyek()
	{
		$user_id = $this->session->userdata('user_id');
		$tahun = $this->input->post('tahun');
		$table_name = 'v_users_proyek';
		$is_distinct = 'true';
		$select = 'proyek_id,singkatan';
		$where = 'user_id='.$user_id.' AND tahun='.$tahun;
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'proyek_id ASC';
		$group_by = '';
		$limit = '';
		
		$list_proyek = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$filter_proyek = array();
		
		foreach ($list_proyek as $list_item) {
			$filter_proyek[] = array("id_item" => $list_item->proyek_id, "nama_item" => $list_item->singkatan);
		}
		
		$data['filter_proyek'] = $filter_proyek;
		echo json_encode($data);
	}
	
	public function data_select_modul()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_tasks_modul';
		$is_distinct = 'false';
		$select = 'id,nama_modul,count_task';
		$where = 'proyek_id='.$proyek_id.'';
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'id ASC';
		$group_by = '';
		$limit = '';
		
		$list_modul = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$filter_modul = '';
		
		if(count($list_modul)>0) {
			$filter_modul .= '<li class="active" data-id="0" data-name="All">
								<a href="javascript:;"> All</a>
							</li>';
			foreach ($list_modul as $list_item) {
				$filter_modul .= '<li data-id="'.$list_item->id.'" data-name="'.$list_item->nama_modul.'">
									<a href="javascript:;"> '.$list_item->nama_modul.' 
									<span class="badge badge-info"> '.$list_item->count_task.' </span></a>
								</li>';
			}
		} else {
			$filter_modul .= '<li class="active" data-id="0" data-name="Modul tidak ada">
								<a href="javascript:;"> Modul tidak ada 
							</li>';
		}
		
		$data['filter_modul'] = $filter_modul;		
		echo json_encode($data);
	}
	
	public function data_select_modul_drive()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_drive_modul';
		$is_distinct = 'false';
		$select = 'id,nama_modul,count_drive';
		$where = 'proyek_id='.$proyek_id.'';
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'id ASC';
		$group_by = '';
		$limit = '';
		
		$list_modul = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$filter_modul = '';
		
		if(count($list_modul)>0) {
			$filter_modul .= '<li class="active" data-id="0" data-name="All">
								<a href="javascript:;"> All</a>
							</li>';
			foreach ($list_modul as $list_item) {
				$filter_modul .= '<li data-id="'.$list_item->id.'" data-name="'.$list_item->nama_modul.'">
									<a href="javascript:;"> '.$list_item->nama_modul.' 
									<span class="badge badge-info"> '.$list_item->count_drive.' </span></a>
								</li>';
			}
		} else {
			$filter_modul .= '<li class="active" data-id="0" data-name="Modul tidak ada">
								<a href="javascript:;"> Modul tidak ada 
							</li>';
		}
		
		$data['filter_modul_drive'] = $filter_modul;		
		echo json_encode($data);
	}
	
	public function data_form_file_agenda()
	{
		$user_id = $this->session->userdata('user_id');
		$agenda_id = $this->input->post('agenda_id');
		$table_name = 'v_agenda';
		$where = 'id='.$agenda_id.'';
		
		$list_agenda = $this->cms_model->row_get_by_criteria($table_name, $where);
		
		$data['nama_agenda'] = $list_agenda->nama_agenda;		
		$data['deskripsi'] = $list_agenda->deskripsi;		
		$data['tanggal'] = strftime("%a, %d %b %Y : %R",strtotime($list_agenda->first_date));	
		$data['lokasi'] = $list_agenda->lokasi;		
		echo json_encode($data);
	}
	
	public function data_form_file_drive()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'drive_modul';
		$where = 'proyek_id='.$proyek_id.'';
		$order_by = 'id ASC';
		$filter_modul = array();
		
		$list_modul = $this->cms_model->query_get_by_criteria($table_name, $where, $order_by);
		
		foreach ($list_modul as $list_item) {
			$filter_modul[] = array("id_item" => $list_item->id, "nama_item" => $list_item->nama_modul);
		}
		
		$data['filter_modul_drive_form'] = $filter_modul;
		echo json_encode($data);
	}
	
	function data_save_file_agenda()
	{
		$status = 'error';
        $message = 'File agenda gagal diupload';		
		$user_id = $this->session->userdata('user_id');
		$agenda_id = $this->input->post('agenda_id');														
		$jenis_file_agenda = $this->input->post('jenis_file_agenda');			
		$filename = $this->input->post('filename');	
		
		if(!empty($_FILES['filename']['name']) && $_FILES['filename']['name']!='' && $_FILES['filename']['name']!='undefined')
		{
			//path directory
			$upload_path = $this->config->item('uploads')['agenda'];
			//membuat directory jika belum ada
			$this->custom->makeDir($upload_path);
			
			$file_name = $_FILES["filename"]["name"];
			$file_name = preg_replace("/ /", '_', $file_name);
			$file_name = preg_replace("/&/", '_', $file_name);
			$file_name = preg_replace("/{/", '_', $file_name);
			$file_name = preg_replace("/}/", '_', $file_name);
			$upload_file = $upload_path.'/'.$file_name;
			
			if(is_file($upload_file)){
				$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
				$new_filename = str_replace('.'.$ext, '', $file_name);				
				$file_name = $new_filename.'_'.mdate("%Y%m%d-%H%i%s", $_SERVER['REQUEST_TIME']).'.'.$ext;		
			}
			
			$config['upload_path'] = "$upload_path";
			$config['allowed_types'] = "*";
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $file_name;
			$config['overwrite'] = TRUE; // true berfungsi untuk replace
			//$config['max_width'] = '1024';
			//$config['max_height'] = '768';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('filename'))
			{
				$status = 'error';
				$message = $this->upload->display_errors('', '');
			} else {
				$file_path = $this->upload->data();
				$doc_path = $file_path['file_name'];
				
				if(is_file("$upload_path/".$doc_path))
				{
					$add_data = array(
						'user_id' => $user_id,
						'agenda_id' => $agenda_id,
						'jenis_file' => $jenis_file_agenda,
						'filename' => $file_path['file_name'],
					);
					
					try {				
						$agenda_file_id = $this->cms_model->save($add_data, 'agenda_file');	
						$status = 'success';
						$message = 'File agenda berhasil diupload';
					} catch (Exception $e) {
						$status = 'error';
						$message = $e->getMessage();
						if(is_file("$upload_path/".$doc_path)){
							unlink("$upload_path/".$doc_path);
						}	
					}
				}
			}		
		}else{
			$status = 'warning';
			$message = 'Isian harus salah satu diisi';				
		}
		echo json_encode(array("status" => $status, "message" => $message));
	}
	
	function data_save_file_drive()
	{
		$status = 'error';
        $message = 'File drive gagal diupload';		
		$user_id = $this->session->userdata('user_id');													
		$modul_id = $this->input->post('modul_id');			
		$nama_dokumen = $this->input->post('nama_dokumen');			
		$filename = $this->input->post('filename');	
		
		if(!empty($_FILES['filename']['name']) && $_FILES['filename']['name']!='' && $_FILES['filename']['name']!='undefined')
		{
			//path directory
			$upload_path = $this->config->item('uploads')['drive'];
			//membuat directory jika belum ada
			$this->custom->makeDir($upload_path);
			
			$file_name = $_FILES["filename"]["name"];
			$file_name = preg_replace("/ /", '_', $file_name);
			$file_name = preg_replace("/&/", '_', $file_name);
			$file_name = preg_replace("/{/", '_', $file_name);
			$file_name = preg_replace("/}/", '_', $file_name);
			$upload_file = $upload_path.'/'.$file_name;
			
			if(is_file($upload_file)){
				$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
				$new_filename = str_replace('.'.$ext, '', $file_name);				
				$file_name = $new_filename.'_'.mdate("%Y%m%d-%H%i%s", $_SERVER['REQUEST_TIME']).'.'.$ext;		
			}
			
			$config['upload_path'] = "$upload_path";
			$config['allowed_types'] = "*";
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = $file_name;
			$config['overwrite'] = TRUE; // true berfungsi untuk replace
			//$config['max_width'] = '1024';
			//$config['max_height'] = '768';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload('filename'))
			{
				$status = 'error';
				$message = $this->upload->display_errors('', '');
			} else {
				$file_path = $this->upload->data();
				$doc_path = $file_path['file_name'];
				
				if(is_file("$upload_path/".$doc_path))
				{
					$add_data = array(
						'user_id' => $user_id,
						'modul_id' => $modul_id,
						'nama_dokumen' => $nama_dokumen,
						'filename' => $file_path['file_name'],
					);
					
					try {				
						$drive_id = $this->cms_model->save($add_data, 'drive');	
						$status = 'success';
						$message = 'File drive berhasil diupload';
					} catch (Exception $e) {
						$status = 'error';
						$message = $e->getMessage();
						if(is_file("$upload_path/".$doc_path)){
							unlink("$upload_path/".$doc_path);
						}	
					}
				}
			}		
		}else{
			$status = 'warning';
			$message = 'Isian harus salah satu diisi';				
		}
		echo json_encode(array("status" => $status, "message" => $message));
	}
	
	public function data_form_add_task()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_users_posisi';
		$where = 'proyek_id='.$proyek_id.'';
		$order_by = 'id ASC';
		$filter_posisi = array();
		$filter_user = array();
		
		$list_user = $this->cms_model->query_get_by_criteria($table_name, $where, $order_by);
		
		foreach ($list_user as $list_item) {
			$filter_posisi[$list_item->leader_nama][] = array("id_item" => $list_item->id, "nama_item" => ($list_item->nama_user.' ['.$list_item->nama_posisi.']'));
			$filter_user[$list_item->leader_nama][] = array("id_item" => $list_item->user_id, "nama_item" => ($list_item->nama_user.' ['.$list_item->nama_posisi.']'));
		}
		
		$table_name = 'tasks_modul';
		$where = 'proyek_id='.$proyek_id.'';
		$order_by = 'id ASC';
		$filter_modul = array();
		
		$list_modul = $this->cms_model->query_get_by_criteria($table_name, $where, $order_by);
		
		foreach ($list_modul as $list_item) {
			$filter_modul[] = array("id_item" => $list_item->id, "nama_item" => $list_item->nama_modul);
		}
			
		$data['filter_pic'] = $filter_posisi;
		$data['filter_approval'] = $filter_posisi;
		$data['filter_member'] = $filter_user;
		$data['filter_modul_form'] = $filter_modul;
		echo json_encode($data);
	}
	
	public function data_form_add_agenda()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_users_posisi';
		$where = 'proyek_id='.$proyek_id.'';
		$order_by = 'id ASC';
		$filter_user = array();
		$filter_kategori = array();
		
		$list_user = $this->cms_model->query_get_by_criteria($table_name, $where, $order_by);
		
		foreach ($list_user as $list_item) {
			$filter_user[$list_item->leader_nama][] = array("id_item" => $list_item->user_id, "nama_item" => ($list_item->nama_user.' ['.$list_item->nama_posisi.']'));
		}
		
		$table_name = 'agenda_kategori';
		$where = '';
		$order_by = 'id ASC';
		
		$list_kategori = $this->cms_model->query_get_by_criteria($table_name, $where, $order_by);
		
		foreach ($list_kategori as $list_item) {
			$filter_kategori[] = array("id_item" => $list_item->id, "nama_item" => $list_item->nama_kategori);
		}
		
		$data['filter_member_agenda'] = $filter_user;
		$data['filter_kategori_agenda'] = $filter_kategori;
		echo json_encode($data);
	}
	
	function data_save_task()
	{
		$status = 'error';
        $message = 'Task gagal disimpan';		
		$save_method = $this->input->post('save_method');
		$user_id = $this->session->userdata('user_id');		
		$tasks_id = $this->input->post('id');		
		$modul_id = $this->input->post('modul_id');														
		$nama_task = $this->input->post('nama_task');
		$deskripsi = $this->input->post('deskripsi');			
		$due_date = new DateTime($this->input->post('due_date'));
		$posisi_pic_id = $this->input->post('posisi_pic_id');			
		$posisi_approval_id = $this->input->post('posisi_approval_id');			
		$member_id = $this->input->post('member_id');	
		
		$additional_data = array(
			'update_user' => $user_id,
			'modul_id' => $modul_id,
			'nama_task' => $nama_task,
			'posisi_pic_id' => $posisi_pic_id,
			'posisi_approval_id' => $posisi_approval_id,
			'deskripsi' => $deskripsi,
			'due_date' => $due_date->format('Y-m-d'),
		);
		
		if($save_method == "update" ){
			$additional_data['update_date'] = gmdate("Y-m-d H:i:s", time()+60*60*7);
		}else{
			$additional_data['user_id'] = $user_id;
		}
		
		if($save_method == "update" ){
			try {
				$this->cms_model->update(array('id' => $tasks_id),$additional_data,'tasks');	
				try {
					$this->cms_model->delete('tasks_members', array('tasks_id' => $tasks_id));	
				} catch (Exception $e) {
					$e->getMessage();
				}	
				$status = 'success';
				$message = "Task berhasil diubah";
			} catch (Exception $e) {
				$status = 'error';
				$message = "Task gagal diubah";
			}
		} else {
			try {
				$tasks_id = $this->cms_model->save($additional_data, 'tasks');
				try {
					$this->cms_model->delete('tasks_members', array('tasks_id' => $tasks_id));	
				} catch (Exception $e) {
					$e->getMessage();
				}	
				$status = 'success';
				$message = "Task berhasil disimpan";
			} catch (Exception $e) {
				$status = 'error';
				$message = "Task gagal disimpan";
			}
		}
		
		if($member_id!=''){
			foreach($member_id as $item) {
				$user_data = array(
					'tasks_id' => $tasks_id,
					'user_id' => $item
				);
				
				$tasks_members_is = $this->cms_model->save($user_data, "tasks_members");
			}
		}
		
		echo json_encode(array("status" => $status, "message" => $message));
	}	
	
	function data_save_agenda()
	{
		$status = 'error';
        $message = 'Agenda gagal disimpan';		
		$save_method = $this->input->post('save_method');
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');		
		$agenda_id = $this->input->post('id');		
		$nama_agenda = $this->input->post('nama_agenda');														
		$kategori_agenda = $this->input->post('kategori_agenda');														
		$lokasi = $this->input->post('lokasi');		
		$deskripsi = $this->input->post('deskripsi');			
		$first_date = new DateTime($this->input->post('from'));	
		$last_date = new DateTime($this->input->post('to'));	
		$member_agenda = $this->input->post('member_agenda');	
		
		$additional_data = array(
			'update_user' => $user_id,
			'proyek_id' => $proyek_id,
			'nama_agenda' => $nama_agenda,
			'agenda_kategori_id' => $kategori_agenda,
			'lokasi' => $lokasi,
			'deskripsi' => $deskripsi,
			'first_date' => $first_date->format('Y-m-d H:i:s'),
			'last_date' => $last_date->format('Y-m-d H:i:s'),
		);
		
		if($save_method == "update" ){
			$additional_data['update_date'] = gmdate("Y-m-d H:i:s", time()+60*60*7);
		}else{
			$additional_data['user_id'] = $user_id;
		}
		
		if($save_method == "update" ){
			try {
				$this->cms_model->update(array('id' => $agenda_id),$additional_data,'agenda');	
				try {
					$this->cms_model->delete('agenda_members', array('agenda_id' => $agenda_id));	
				} catch (Exception $e) {
					$e->getMessage();
				}	
				$status = 'success';
				$message = "Agenda berhasil diubah";
			} catch (Exception $e) {
				$status = 'error';
				$message = "Agenda gagal diubah";
			}
		} else {
			try {
				$agenda_id = $this->cms_model->save($additional_data, 'agenda');
				try {
					$this->cms_model->delete('agenda_members', array('agenda_id' => $agenda_id));	
				} catch (Exception $e) {
					$e->getMessage();
				}	
				$status = 'success';
				$message = "Agenda berhasil disimpan";
			} catch (Exception $e) {
				$status = 'error';
				$message = "Agenda gagal disimpan";
			}
		}
		
		if($member_agenda!=''){
			foreach($member_agenda as $item) {
				$user_data = array(
					'agenda_id' => $agenda_id,
					'user_id' => $item
				);
				
				$agenda_members_is = $this->cms_model->save($user_data, "agenda_members");
			}
		}
		
		echo json_encode(array("status" => $status, "message" => $message));
	}	
	
	public function data_list_file_agenda()
	{
		$is_admin = $this->cms_model->user_is_admin(); 
		$user_id = $this->session->userdata('user_id');
		$agenda_id = $this->input->post('agenda_id');
		
		$datatable_name = 'v_agenda_file';
		$where = 'agenda_id = '.$agenda_id.'';
		$search_column = array();
		$search_order = array();
		$order_by = '(CASE WHEN jenis_file = 0 THEN 5 ELSE jenis_file END)';		
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $list_item) {
			$aksi = '';
			if($is_admin){
				$aksi .= '<a class="btn btn-xs btn-danger" href="javascript:void()" title="Hapus" onclick="data_delete('."'".$list_item->id."','".$list_item->filename."'".')"><i class="fa fa-times"></i></a>';
			}
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $list_item->nama_jenis_file;		
			$row[] = '<a href="'.base_url($this->config->item('uploads')['agenda']).'/'.$list_item->filename.'" target="_blank">'.$list_item->filename.'</a>';
			$row[] = date_format(date_create($list_item->submit_date),"j M Y, \J\a\m G:i");
			$row[] = $aksi;		
			$data[] = $row;
		}
		
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->cms_model->count_all_where($datatable_name, $where),
				"recordsFiltered" => $this->cms_model->count_filtered_where($datatable_name, $search_column, $search_order, $where, $order_by),
				"data" => $data,
		);
		
		echo json_encode($output);
	}
	
	public function data_list_drive()
	{
		$is_admin = $this->cms_model->user_is_admin(); 
		$user_id = $this->session->userdata('user_id');
		$modul_id = $this->input->post('modul_id');
		
		$datatable_name = 'drive';
		$where = $modul_id!=0?('modul_id = '.$modul_id):'';
		$search_column = array('nama_dokumen');
		$search_order = array();
		$order_by = 'id ASC';		
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $list_item) {
			$aksi = '';
			if($is_admin){
				$aksi .= '<a class="btn btn-xs btn-danger" href="javascript:void()" title="Hapus" onclick="data_delete_drive('."'".$list_item->id."','".$list_item->filename."'".')"><i class="fa fa-times"></i></a>';
			}
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = '<a href="'.base_url($this->config->item('uploads')['drive']).'/'.$list_item->filename.'" target="_blank">'.$list_item->nama_dokumen.'</a>';		
			$row[] = $aksi;	
			$data[] = $row;
		}
		
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->cms_model->count_all_where($datatable_name, $where),
				"recordsFiltered" => $this->cms_model->count_filtered_where($datatable_name, $search_column, $search_order, $where, $order_by),
				"data" => $data,
		);
		
		echo json_encode($output);
	}
	
	/*public function data_task()
	{
		$user_id = $this->session->userdata('user_id');
		$modul_id = $this->input->post('modul_id');
		$table_name = 'v_tasks';
		$is_distinct = 'false';
		$select = '*';
		$where = 'modul_id='.$modul_id.'';
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'nama_task ASC';
		$group_by = '';
		$limit = '';
				
		$list_task = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$tasks = '';
		$tasks .= '<div class="scroller" style="padding-right:0;">
						<ul class="feeds">
							<li>';
							
		$n=0;
		foreach ($list_task as $list_item) {
			$reminder = '';
			
			//reminder due date
			$date1=date_create(date('Y-m-d'));
			$date2=date_create($list_item->due_date);
			$diff=date_diff($date1,$date2);
			
			if($diff->format('%R%a')<=14 && strtolower($list_item->nama_status)!='completed'){
				$reminder = '<span class="task-bell" data-toggle="tooltip" data-placement="right" title="'.$diff->format('%R%a days').'"><i class="fa fa-bell-o"></i></span>';
			}
			
			$tasks .= '<li>';
			$members = explode(',', trim($list_item->id_members, '{}'));
			array_push($members,$list_item->pic_id,$list_item->approval_id);
			if (in_array($user_id,$members)) {
			$tasks .= '		<a href="'.base_url('index/task/'.base64_encode($list_item->id)).'">';
			}
			$tasks .= 			'<div class="col1">
									<div class="cont">
										<div class="cont-col1">
											<div class="label label-sm label-'.($list_item->pic_id==$user_id?'info':'default').'">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="cont-col2">
											<div class="desc"> 
												<span data-toggle="tooltip" data-html="true" data-placement="right" title="PIC: '.$list_item->nama_pic.'<br>AWO: '.$list_item->nama_approval.'">'.$list_item->nama_task.'</span>
												<span class="label label-sm label-'.$this->custom->statusColor($list_item->nama_status).'">'.$list_item->nama_status.' <span class="badge bg-white bg-font-white" style="height:17px">'.$list_item->progress.'%</span></span>
												'.$reminder.'
											</div>
										</div>
									</div>
								</div>';
			if ($list_item->id==1) {
			$tasks .= '			<div class="col2">
									<div class="date"> <a href="javascript:;" class="btn btn-xs red" data-toggle="tooltip" title="Download Report" data-placement="left" ><i class="fa fa-file-pdf-o"></i></a> </div>
								</div>';
			}
			if (in_array($user_id,$members)) {
			$tasks .= '		</a>';
			}
			$tasks .= 	'</li>';
		}
		
		$tasks .='</ul>
				</div>';
		
		$data['tasks'] = $tasks;		
		echo json_encode($data);
	}*/
	
	public function data_list_task()
	{
		$is_admin = $this->cms_model->user_is_admin(); 
		$user_id = $this->session->userdata('user_id');
		$modul_id = $this->input->post('modul_id');
		
		$datatable_name = 'v_tasks';
		$where = $modul_id!=0?('modul_id = '.$modul_id):'';
		$search_column = array('nama_task');
		$search_order = array();
		$order_by = 'nama_task ASC';		
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $list_item) {
			$reminder = '';
			
			//reminder due date
			$date1=date_create(date('Y-m-d'));
			$date2=date_create($list_item->due_date);
			$diff=date_diff($date1,$date2);
			
			if($diff->format('%R%a')<=14 && strtolower($list_item->nama_status)!='completed'){
				$reminder = '<span class="task-bell" data-toggle="tooltip" data-placement="right" title="'.$diff->format('%R%a days').'"><i class="fa fa-bell-o"></i></span>';
			}
			
			$admin = '';
			if ($is_admin) {
				$admin = $user_id;
			}
			$members = explode(',', trim($list_item->id_members, '{}'));
			array_push($members,$list_item->pic_id,$list_item->approval_id,$admin);
			
			/*$file_current = $this->db->query("select user_id, submit_date, filename from v_tasks_file_current where tasks_id=".$list_item->id." AND jenis_file=2 AND status_approval1='1' AND status_approval2='1'
							order by submit_date desc limit 1")->row();*/
							
			$file_current = $this->db->query("select user_id, submit_date, filename from v_tasks_file_current where tasks_id=".$list_item->id." AND jenis_file=2 order by submit_date desc limit 1")->row();
							
			$link_doc = '';
			if(!empty($file_current)) {
				$link_doc = '<a href="'.base_url($this->config->item('uploads')['tasks']).'/'.$file_current->user_id.'/'.$file_current->filename.'" target="_blank"  class="btn btn-xs red" data-toggle="tooltip" title="Download Dokumen" data-placement="left" ><i class="fa fa-file-pdf-o"></i></a>';
			}
			
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = (in_array($user_id,$members)?'<a href="'.base_url('index/task/'.base64_encode($list_item->id)).'">':'').'<span data-toggle="tooltip" data-html="true" data-placement="right" title="DE: '.$list_item->nama_pic.'<br>AWO: '.$list_item->nama_approval.'">'.$list_item->nama_task.'</span>'.(in_array($user_id,$members)?'</a>':'');		
			$row[] = '<span class="label label-sm label-'.$this->custom->statusColor($list_item->nama_status).'">'.$list_item->nama_status.' <span class="badge bg-white bg-font-white" style="height:17px">'.$list_item->progress.'%</span></span> '.$reminder;		
			$row[] = $link_doc;
			$data[] = $row;
		}
		
		$output = array(
				"draw" => $_POST['draw'],
				"recordsTotal" => $this->cms_model->count_all_where($datatable_name, $where),
				"recordsFiltered" => $this->cms_model->count_filtered_where($datatable_name, $search_column, $search_order, $where, $order_by),
				"data" => $data,
		);
		
		echo json_encode($output);
	}
	
	public function data_task_bar()
	{
		$user_id = $this->session->userdata('user_id');
		$table_name = 'v_tasks';
		$is_distinct = 'false';
		$select = '*';
		$where = 'status<>3 AND pic_id='.$user_id.'';
		$where_in_field = '';
		$where_in_array = array();
		$order_by = 'id ASC';
		$group_by = '';
		$limit = '';
		
		$list_task = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		$tasks = '';
		
		$tasks .= '<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-calendar"></i>
                                    '.(count($list_task)>0?'<span class="badge badge-default"> '.count($list_task).' </span>':'').'
                                </a>
                                <ul class="dropdown-menu extended tasks">
                                    <li class="external">
                                        <h3>You have
                                            <span class="bold">'.count($list_task).' uncompleted</span> tasks</h3>
                                        <!--<a href="app_todo.html">view all</a>-->
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" data-handle-color="#637283">';
		
		$n=0;
		foreach ($list_task as $list_item) {
			$striped = '';
			switch(strtolower($list_item->nama_status)) {
				case 'proses' : $striped = 'progress-striped active'; break;
			}
						
			$tasks .= '<li>
						<a href="'.base_url('index/task/'.base64_encode($list_item->id)).'">
							<span class="task">
								<span class="desc">'.$list_item->nama_task.' </span>
								<span class="percent">'.$list_item->progress.'%</span>
							</span>
							<span class="progress '.$striped.'">
								<span style="width: '.$list_item->progress.'%;" class="progress-bar progress-bar-'.$this->custom->statusColor($list_item->nama_status).'" aria-valuenow="'.$list_item->progress.'" aria-valuemin="0" aria-valuemax="100">
									<span class="sr-only">'.$list_item->progress.'% '.$list_item->nama_status.'</span>
								</span>
							</span>
						</a>
					</li>';
				
			$n++;
		}
                                           
        $tasks .= '                       </ul>
                                    </li>
                                </ul>';
		
		$data['tasks'] = $tasks;		
		echo json_encode($data);
	}
	
	public function data_dashboard_stat()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$table_name = 'v_users_posisi';
		$is_distinct = 'false';
		$select = 'COUNT(id) as member, COUNT(distinct leader_id) as wp';
		$where = 'proyek_id='.$proyek_id;
		$where_in_field = '';
		$where_in_array = array();
		$order_by = '';
		$group_by = '';
		$limit = '1';
		$list_member = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		
		$table_name = 'v_tasks';
		$is_distinct = 'false';
		$select = 'COUNT(id) as total_tasks, AVG(progress) as percentage';
		$where = 'proyek_id='.$proyek_id;
		$where_in_field = '';
		$where_in_array = array();
		$order_by = '';
		$group_by = '';
		$limit = '1';
		$list_tasks = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		
		$data['count_member'] = '<span data-counter="counterup" data-value="'.$list_member[0]->member.'">0</span>';	
		$data['count_wp'] = '<span data-counter="counterup" data-value="'.$list_member[0]->wp.'">0</span>';	
		$data['count_tasks'] = '<span data-counter="counterup" data-value="0">0</span>/'.$list_tasks[0]->total_tasks.' ';	
		$data['avg_progress'] = '<span data-counter="counterup" data-value="'.round($list_tasks[0]->percentage,0,PHP_ROUND_HALF_UP).'">0</span>%';	
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
		$data = array();
		$data_struktur = array();
		$parent_array = array();
		$n = 1;
		
		foreach ($list_struktur as $list_item) {
			$parent_id = null;
			
			if($list_item->posisi_id==2) {
				$parent_array[$list_item->posisi_id][$list_item->groups_leader_id] = $n;
				$parent_id = null;
			} else if($list_item->posisi_id==3) {
				$parent_array[$list_item->posisi_id][$list_item->leader_id] = $n;
				$parent_id = $parent_array[2][$list_item->leader_groups_leader_id];
			} else if($list_item->posisi_id==4) {
				$parent_id = $parent_array[3][$list_item->leader_id];
			} else {
				$parent_id = null;
			}
			
			$image = $list_item->photo != '' ? base_url($this->config->item('uploads')['users'])."/".$list_item->photo : base_url($this->config->item('assets')['custom_img'])."/600x600.png";
			
			$data_struktur[] = array("id" => $n, "parentId" => $parent_id, "name" => $list_item->nama_user, "title" => $list_item->nama_posisi.($list_item->leader_singkatan!=''? ' - '.$list_item->leader_singkatan : ''), "phone" => null, "mail" => $list_item->email, "adress" => null, "image" => $image);
			$n++;
		}
		$data['data_struktur'] = $data_struktur;
		
		echo json_encode($data);
	}
	
	public function data_timeline()
	{
		$user_id = $this->session->userdata('user_id');
		$proyek_id = $this->input->post('proyek_id');
		$datatable_name = "v_agenda";	
		$search_column = '';
		$search_order = array();
		$order_by = 'first_date asc';
		$where = "proyek_id = $proyek_id AND '".$user_id."' = ANY(id_members)";
		//$where = "status = 1 AND proyek_id = $proyek_id AND '".$user_id."' = ANY(id_members)";
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		setlocale(LC_ALL, "IND");
		$deskripsi = '';
		$deskripsi .= '<div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="60">
							<div class="timeline">
								<div class="events-wrapper">
									<div class="events">
										<ol>';
										
		$next=true;
		$sel_id='';
		
		foreach ($list as $list_item) {
		$date1=date_create(date('Y-m-d'));
		$date2=date_create($list_item->first_date);
		
		if($next) {
			if($date1<=$date2){
				$next=false;
			}
			$sel_id=$list_item->id;
		}
			
			
		$data_date = date("d/m/Y", strtotime($list_item->first_date));
		$text_date = strftime("%d %b",strtotime($list_item->first_date));
		$deskripsi .=						'<li><a href="#0" data-id="'.$list_item->id.'" data-date="'.$data_date.'" class="border-after-red bg-after-red">'.$text_date.'</a></li>';
		}
		
		$deskripsi .=					'</ol>
										<span class="filling-line bg-red" aria-hidden="true"></span>
									</div>
									<!-- .events -->
								</div>
								<!-- .events-wrapper -->
								<ul class="cd-timeline-navigation mt-ht-nav-icon">
									<li>
										<a href="#0" class="prev inactive btn btn-outline red md-skip">
											<i class="fa fa-chevron-left"></i>
										</a>
									</li>
									<li>
										<a href="#0" class="next btn btn-outline red md-skip">
											<i class="fa fa-chevron-right"></i>
										</a>
									</li>
								</ul>
								<!-- .cd-timeline-navigation -->
							</div>
							<!-- .timeline -->
							<div class="events-content">
								<ol>';
		foreach ($list as $list_item) {
		$data_date = date("d/m/Y", strtotime($list_item->first_date));
		$text_date = strftime("%a, %d %b %Y : %R",strtotime($list_item->first_date));
		$nama_agenda = $list_item->nama_agenda;
		$lokasi = $list_item->lokasi;
		$pengirim = $list_item->pengirim;
		$isi = $list_item->deskripsi;
		$photo = base_url($this->config->item('uploads')['users_thumb50x50']).'/'.$list_item->photo;
		
		$mom = $this->db->query("select filename, submit_date
										from agenda_file
										where jenis_file = 1 AND agenda_id=".$list_item->id."
										order by submit_date desc
										limit 1")->row();
		$link_mom = '';
		if(!empty($mom)) {
			$link_mom = '<a href="'.base_url($this->config->item('uploads')['agenda']).'/'.$mom->filename.'" target="_blank" class="btn btn-icon-only blue" data-toggle="tooltip" title="Download MOM" data-placement="right" ><i class="fa fa-sticky-note-o"></i></a>';
		}
			
		$absensi = $this->db->query("select filename, submit_date
										from agenda_file
										where jenis_file = 2 AND agenda_id=".$list_item->id."
										order by submit_date desc
										limit 1")->row();
		$link_absensi = '';
		if(!empty($absensi)) {
			$link_absensi = '<a href="'.base_url($this->config->item('uploads')['agenda']).'/'.$absensi->filename.'" target="_blank" class="btn btn-icon-only green" data-toggle="tooltip" title="Download Absensi" data-placement="right" ><i class="fa fa-file-text-o"></i></a>';
		}
							
		$deskripsi .= 				'<li data-id="'.$list_item->id.'" data-date="'.$data_date.'">
										<div class="mt-title">
											<h2 class="mt-content-title">'.$nama_agenda.'</h2>
										</div>
										<div class="mt-author">
											<div class="mt-avatar">
												<img src="'.$photo.'" onerror="this.src = \''.base_url($this->config->item('assets')['custom_img'])."/50x50.png".'\'" />
											</div>
											<div class="mt-author-name">
												<a href="javascript:;" class="font-blue-madison">'.$pengirim.'</a>
											</div>
											<div class="mt-author-datetime font-grey-mint">'.$text_date.' <span class="icon-pointer"></span> '.$lokasi.'</div>
										</div>
										<div class="clearfix"></div>
										<div class="mt-content border-grey-steel">
											<p>'.$isi.'</p>
											'.$link_mom.'
											'.$link_absensi.'
											<a href="javascript:;" onclick="loadFormAttachFileAgenda('."'".$list_item->id."'".')" class="btn btn-circle btn-icon-only red pull-right" data-toggle="tooltip" title="Attach file" data-placement="left" >
												<i class="fa fa-plus"></i>
											</a>
										</div>
									</li>';
		}
		
		$deskripsi .= 			'</ol>
							</div>
							<!-- .events-content -->
						</div>';
		
		$data['deskripsi'] = $deskripsi;
		$data['sel_id'] = $sel_id;

		echo json_encode($data);
	}
	
	public function data_kalender()
	{
		$start = $this->input->post('start');
		$end = $this->input->post('end');
		$proyek_id = $this->input->post('proyek_id');
		$datatable_name = "v_agenda";	
		$search_column = '';
		$search_order = array();
		$order_by = 'first_date asc';
		$where = "proyek_id = $proyek_id AND (
					(to_char(first_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					OR (to_char(last_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					)";
		// $where = "status = 1 AND proyek_id = $proyek_id AND (
					// (to_char(first_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					// OR (to_char(last_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					// OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					// OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					// )";
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		$data['event'] = array();
		foreach ($list as $list_item) {
			setlocale(LC_ALL, "IND");
			// $data_penanggungjawab = $this->cms_model->query_get_by_criteria('v_agenda_penanggungjawab', array("id_agenda" => $list_item->id_agenda), 'id_kategori ASC');	
			// $array_p = array();
			// foreach($data_penanggungjawab as $dp){
				// $array_p[] = $dp->nama_user;
			// }
			// $penanggungjawab = join(' dan ', array_filter(array_merge(array(join(', ', array_slice($array_p, 0, -1))), array_slice($array_p, -1)), 'strlen'));
			
			// if($list_item->first_time==$list_item->last_time){
				// $keterangan = '<b>'.$list_item->lokasi.'</b><br>Jam '.strftime("%R",strtotime($list_item->first_time)).' WIB<br>'.$penanggungjawab;
			// } else {
				// $keterangan = '<b>'.$list_item->lokasi.'</b><br>Jam '.strftime("%R",strtotime($list_item->first_time)).' - '.strftime("%R",strtotime($list_item->last_time)).' WIB<br>'.$penanggungjawab;
			// }
			
			$row = array();
			$row['id'] = $list_item->id;
			$row['title'] = $list_item->nama_agenda;
			$row['tip'] = 'Aziz';
			$row['start'] = $list_item->first_date;																							
			$row['end'] = $list_item->last_date;
			$row['color'] = $list_item->color;			
			$row['deskripsi'] = $list_item->deskripsi;				
						
			array_push($data['event'],$row);
			
		}
		echo json_encode($data);
	}
	
	public function data_delete()
	{			
        $file_id = $this->input->post('id_delete_data');						
		$file_row = $this->cms_model->row_get_by_id($file_id, 'agenda_file');
		$status = 'error';
		$message = '';
		
		//hapus file
		if($file_row->filename != ""){
			$upload_path = $this->config->item('uploads')['agenda'];																		
			$upload_file = $upload_path.'/'.$file_row->filename;
			
			//hapus note
			try {				
				$this->cms_model->delete('agenda_file', array('id' => $file_id));		
				$status = 'success';
				$message = 'Data behasil dihapus';
				
				if(is_file($upload_file)){
					unlink($upload_file);
				}	
			} catch (Exception $e) {
				$status = 'error';
				$message = $e->getMessage;
			}				
		}
		
		echo json_encode(array("status" => $status, "message" => $message));
	}
	
	public function data_delete_drive()
	{			
        $file_id = $this->input->post('id_delete_data');						
		$file_row = $this->cms_model->row_get_by_id($file_id, 'drive');
		$status = 'error';
		$message = '';
		
		//hapus file
		if($file_row->filename != ""){
			$upload_path = $this->config->item('uploads')['drive'];																		
			$upload_file = $upload_path.'/'.$file_row->filename;
			
			//hapus note
			try {				
				$this->cms_model->delete('drive', array('id' => $file_id));		
				$status = 'success';
				$message = 'Data behasil dihapus';
				
				if(is_file($upload_file)){
					unlink($upload_file);
				}	
			} catch (Exception $e) {
				$status = 'error';
				$message = $e->getMessage;
			}				
		}
		
		echo json_encode(array("status" => $status, "message" => $message));
	}
	
	public function sendEmail(){
		$to = array('cengis80@gmail.com','abdulazizbinceceng@gmail.com','abdul.aziz@lapan.go.id');
		$subject = 'Rapat WP Jaringan';
		$message = 'Rapat akan diadakan tanggal 12 Februari 2018';
		$attach = 'C:\Users\zizs\Downloads\test.pdf';
		$keterangan = '';
		if($this->custom->sendEmail($to,$subject,$message,$attach)){
			$keterangan = 'Berhasil kirim email';
		} else{
			$keterangan = 'Gagal kirim email';
		}
		echo $keterangan;
	}
}
