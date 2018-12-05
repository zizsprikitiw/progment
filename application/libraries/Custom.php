<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Custom
 */
class Custom
{
	function bodyClass($parameter)
	{ 
		$attr = "";
		switch ($parameter) {
			case 'default' :
				$attr = "page-header-fixed page-sidebar-closed-hide-logo page-content-white";
			break;
			case 'login' :
				$attr = "login";
			break;
			case 'error_404' :
				$attr = "page-404-full-page";
			break;
			default :
				$attr = "";
		}
		return $attr;
	}
	
	function bytesToSize($bytes, $precision = 2)
	{  
		$kilobyte = 1024;
		$megabyte = $kilobyte * 1024;
		$gigabyte = $megabyte * 1024;
		$terabyte = $gigabyte * 1024;
	   
		if (($bytes >= 0) && ($bytes < $kilobyte)) {
			return $bytes . ' B';
	 
		} elseif (($bytes >= $kilobyte) && ($bytes < $megabyte)) {
			return round($bytes / $kilobyte, $precision) . ' KB';
	 
		} elseif (($bytes >= $megabyte) && ($bytes < $gigabyte)) {
			return round($bytes / $megabyte, $precision) . ' MB';
	 
		} elseif (($bytes >= $gigabyte) && ($bytes < $terabyte)) {
			return round($bytes / $gigabyte, $precision) . ' GB';
	 
		} elseif ($bytes >= $terabyte) {
			return round($bytes / $terabyte, $precision) . ' TB';
		} else {
			return $bytes . ' B';
		}
	}
	
	function makeDir($upload_path)
	{ 
		$dirs = explode('/', $upload_path);
		foreach ($dirs as $key=>$val) {
			if ($val == '') {
				continue;
			}
			$pathArray = array();
			for ($i = 0; $i <= $key; $i++) {
				array_push($pathArray, $dirs[$i]);
			}
			$path = implode('/', $pathArray);
			
			if(!is_dir($path)){
				mkdir($path,0777);
			}
		}
		return true;
	}
}
