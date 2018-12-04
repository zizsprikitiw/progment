<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['assets']    = array(
	"global_plugins" => "assets/global/plugins",
	"global_css" => "assets/global/css",
	"global_scripts" => "assets/global/scripts",
	"layouts_layout" => "assets/layouts/layout",
	"layouts_global" => "assets/layouts/global",
	"custom_css" => "assets/custom/css",
	"custom_scripts" => "assets/custom/scripts",
	"custom_img" => "assets/custom/img",
	"pages_css" => "assets/pages/css",
	"pages_scripts" => "assets/pages/scripts",
);

$config['uploads']    = array(
	"users" => "uploads/users/",
	"users_thumb50x50" => "uploads/users/thumb50x50",
);

$config['files']    = array(
	"image_file_size" => 1048576,
	"image_file_type" => "jpg,png,jpeg,gif",
);
