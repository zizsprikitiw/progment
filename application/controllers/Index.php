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
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/fullcalendar.min.css",
			base_url($this->config->item('assets')['global_plugins'])."/jqvmap/jqvmap/jqvmap.css",
			base_url($this->config->item('assets')['global_plugins'])."/getorgchart/getorgchart.css",
		);
		
		//tambahan javascript plugin
		$this->data['add_javascript'] = array(
			base_url($this->config->item('assets')['custom_scripts'])."/beranda.js",
			base_url($this->config->item('assets')['custom_scripts'])."/dashboard.min.js",
			base_url($this->config->item('assets')['pages_scripts'])."/portlet-draggable.min.js",
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
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/fullcalendar.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/fullcalendar-3.9.0/locale-all.js",
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
		
		$list_stat = $this->cms_model->get_query_rows($table_name, $is_distinct, $select, $where, $where_in_field, $where_in_array, $order_by, $group_by, $limit);
		
		$data['count_member'] = '<span data-counter="counterup" data-value="'.$list_stat[0]->member.'">0</span>';	
		$data['count_wp'] = '<span data-counter="counterup" data-value="'.$list_stat[0]->wp.'">0</span>';	
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
		$proyek_id = $this->input->post('proyek_id');
		$datatable_name = "v_agenda";	
		$search_column = '';
		$search_order = array();
		$order_by = 'first_date asc';
		$where = "status = 1 AND proyek_id = $proyek_id";
		
		$list = $this->cms_model->get_datatables_where($datatable_name, $search_column, $search_order, $where, $order_by);
		
		setlocale(LC_ALL, "IND");
		$deskripsi = '';
		$deskripsi .= '<div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="60">
							<div class="timeline">
								<div class="events-wrapper">
									<div class="events">
										<ol>';
										
		$n=1;
		foreach ($list as $list_item) {
		$data_date = date("d/m/Y", strtotime($list_item->first_date));
		$text_date = strftime("%d %b",strtotime($list_item->first_date));
		$selected = $n==1?'selected':'';
		$deskripsi .=						'<li><a href="#0" data-date="'.$data_date.'" class="border-after-red bg-after-red '.$selected.'">'.$text_date.'</a></li>';
		$n++;
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
		$n=1;
		foreach ($list as $list_item) {
		$data_date = date("d/m/Y", strtotime($list_item->first_date));
		$text_date = strftime("%a, %d %b %Y : %R",strtotime($list_item->first_date));
		$nama_agenda = $list_item->nama_agenda;
		$lokasi = $list_item->lokasi;
		$pengirim = $list_item->pengirim;
		$isi = $list_item->deskripsi;
		$photo = base_url($this->config->item('uploads')['users_thumb50x50']).'/'.$list_item->photo;
		$selected = $n==1?'selected':'';
		$deskripsi .= 				'<li class="'.$selected.'" data-date="'.$data_date.'">
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
											<a href="javascript:;" class="btn btn-circle red btn-outline">Read More</a>
											<a href="javascript:;" class="btn btn-circle btn-icon-only blue">
												<i class="fa fa-plus"></i>
											</a>
										</div>
									</li>';
		$n++;
		}
		
		$deskripsi .= 			'</ol>
							</div>
							<!-- .events-content -->
						</div>';
		
		$data['deskripsi'] = $deskripsi;

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
		$where = "status = 1 AND proyek_id = $proyek_id AND (
					(to_char(first_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					OR (to_char(last_date, 'YYYY-MM-DD') BETWEEN '".date("Y-m-d", $start)."' AND '".date("Y-m-d", $end)."')
					OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					OR ('".date("Y-m-d", $end)."' BETWEEN to_char(first_date, 'YYYY-MM-DD') AND to_char(last_date, 'YYYY-MM-DD'))
					)";
		
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
}
