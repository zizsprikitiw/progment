<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {
	
	function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth','custom'));
			$this->load->helper(array('url','language'));
			$this->load->config('custom');
			
			$this->lang->load('auth');
	}
	
	public function index()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		if (!$this->ion_auth->logged_in())
		{
			$this->data['body_class'] = $this->custom->bodyClass('error_404');	
		} else {
			$this->data['body_class'] = $this->custom->bodyClass('default');
		}
		
		//tambahan css plugin
		$this->data['add_css'] = array(
			base_url($this->config->item('assets')['custom_css'])."/error.css",
		);
		
		//tambahan javascript plugin
		$this->data['add_javascript'] = array();
		
		$this->load->view('error_404',$this->data);
	}
}
