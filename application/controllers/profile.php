<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth','form_validation'));
			$this->load->helper(array('url','language'));
			$this->load->config('custom');
			
			$this->lang->load('auth');
			if (!$this->ion_auth->logged_in())
			{
				// redirect them to the login page
				redirect('login', 'refresh');			
			}
	}
	
	public function index()
	{
		$data['user'] = $this->ion_auth->user()->row();
		
		//tambahan css plugin
		$data['add_css'] = array(
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.css",
			base_url($this->config->item('assets')['global_plugins'])."/jcrop/css/jquery.Jcrop.min.css",
			base_url($this->config->item('assets')['custom_css'])."/profile.css",
		);
		
		//tambahan javascript plugin
		$data['add_javascript'] = array(
			base_url($this->config->item('assets')['global_plugins'])."/bootstrap-fileinput/bootstrap-fileinput.js",
			base_url($this->config->item('assets')['global_plugins'])."/jquery.sparkline.min.js",
			base_url($this->config->item('assets')['global_plugins'])."/jcrop/js/jquery.color.js",
			base_url($this->config->item('assets')['global_plugins'])."/jcrop/js/jquery.Jcrop.min.js",
			base_url($this->config->item('assets')['custom_scripts'])."/profile.js",
		);
		
		$this->load->view('profile',$data);
	}
}
