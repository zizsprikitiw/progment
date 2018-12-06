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
		);
		
		//tambahan javascript plugin
		$this->data['add_javascript'] = array(
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
		);
		
		$this->load->view('index',$this->data);
	}
}
