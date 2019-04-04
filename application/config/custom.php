<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['assets']    = array(
	"global_plugins" => "assets/global/plugins",
	"global_css" => "assets/global/css",
	"global_scripts" => "assets/global/scripts",
	"layouts_layout" => "assets/layouts/layout",
	"layouts_global" => "assets/layouts/global",
	"apps_css" => "assets/apps/css",
	"apps_scripts" => "assets/apps/scripts",
	"custom_plugins" => "assets/custom",
	"custom_css" => "assets/custom/css",
	"custom_scripts" => "assets/custom/scripts",
	"custom_img" => "assets/custom/img",
	"pages_css" => "assets/pages/css",
	"pages_scripts" => "assets/pages/scripts",
);

$config['uploads']    = array(
	"users" => "uploads/users/",
	"users_thumb50x50" => "uploads/users/thumb50x50",
	"tasks" => "uploads/tasks",
	"drive" => "uploads/drive",
	"agenda" => "uploads/agenda",
);

$config['files']    = array(
	"image_file_size" => 1048576,
	"image_file_type" => "jpg,png,jpeg,gif",
	"doc_file_size" => 1048576,
	"doc_file_type" => "doc,pdf,jpg,png,jpeg,gif",
	"pdf_file_type" => "pdf",
	"all_file_type" => "*",
);
