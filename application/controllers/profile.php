<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	function __construct()
	{
			parent::__construct();
			$this->load->database();
			$this->load->library(array('ion_auth','form_validation','custom'));
			$this->load->helper(array('url','language','file'));
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
	
	// change avatar
	function change_avatar()
	{
		$status = 'error';
        $message = 'Upload image gagal';
			
		//set validation rules
		$this->form_validation->set_rules('file_avatar', 'Image', "callback_check_image_required"); 

		if ($this->form_validation->run() == false)
		{			
			//validation fails
			$status = 'warning';
            $message = validation_errors();
		}
		else
		{
			//$image_cropped = $_FILES["cropped_image"]["tmp_name"];
			//var_dump($image_cropped);die();
			$upload_path = $this->config->item('uploads')['users'];
			if(!is_dir($upload_path)){
				mkdir($upload_path,0777);
			}
			
			$config['upload_path'] = "$upload_path";
			$config['allowed_types'] = 'png|jpeg|jpg|gif';
			$config['remove_spaces'] = TRUE;
			$config['file_name'] = 'avatar.jpg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('cropped_image'))
			{
				$message = $this->upload->display_errors('', '');
				//return false;
			} else {
				$this->upload->data();
			$status = 'success';
			$message = 'Sukses upload image';
			}
			
			
			$file_name = $_FILES["cropped_image"]["name"];
			$file_name = preg_replace("/ /", '_', $file_name);
			$file_name = preg_replace("/&/", '_', $file_name);
			$file_name = preg_replace("/{/", '_', $file_name);
			$file_name = preg_replace("/}/", '_', $file_name);
			$upload_file = $upload_path.$file_name;
			
			//move_uploaded_file($_FILES["cropped_image"]["tmp_name"],$upload_file);	//UPLOAD THE FILE
					
			//if(is_file($upload_file)){
				// $ext = pathinfo($_FILES['file_avatar']['name'], PATHINFO_EXTENSION);
				// $new_filename = str_replace('.'.$ext, '', $file_name);				
				// $file_name = $new_filename.'_'.mdate("%Y%m%d-%H%i%s", $_SERVER['REQUEST_TIME']).'.'.$ext;
				// $upload_file = $upload_path.$file_name;		
				
				
				// $targ_w = $targ_h = 600;
				// $jpeg_quality = 90;

				// $src = $upload_file;

				// $img_r = imagecreatefromjpeg($src);

				// $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

				// imagecopyresampled($dst_r,$img_r,0,0,intval($_POST['x']),intval($_POST['y']), $targ_w,$targ_h, intval($_POST['w']),intval($_POST['h']));

				// header('Content-type: image/jpeg');
				// imagejpeg($dst_r,null,$jpeg_quality);
	
				// $status = 'success';
				// $message = 'Sukses upload image';
			// }
			
		}
		echo json_encode(array("status" => $status, "message" => $message));
	}
	
	//custom validation function for dropdown input
	function check_image_required()
	{			
		if (!isset($_FILES['file_avatar']) || empty($_FILES['file_avatar']['name']) || ($_FILES['file_avatar']['name'] == ''))
		{
			$this->form_validation->set_message('check_image_required', 'Kolom %s belum diisi');
			return FALSE;	
		}else{
			$max_file_size = $this->config->item('files')['image_file_size'];
			if($_FILES['file_avatar']['size'] > $max_file_size){
				//cek ukuran file
				$this->form_validation->set_message('check_image_required', 'Ukuran file lebih dari '.$this->custom->bytesToSize($max_file_size));
				return FALSE;	
			}else{
				//cek file type				
				$file_type = $this->config->item('files')['image_file_type'];
				$ext = strtolower(pathinfo($_FILES['file_avatar']['name'], PATHINFO_EXTENSION));
				
				if($ext == ""){
					//tidak punya ekstensi file
					$this->form_validation->set_message('check_image_required', 'Format file hanya '.$file_type);
					return FALSE;
				}else{
					$str_pos = strpos($file_type, $ext);

					if ($str_pos !== FALSE) {
						return TRUE;	
					}else{
						$this->form_validation->set_message('check_image_required', 'Format file hanya '.$file_type);
						return FALSE;					
					}	
				}
							
			}			
		}
	}
}
