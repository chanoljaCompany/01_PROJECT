<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

 	$sFileInfo = '';
	$headers = array();

	foreach($_SERVER as $k => $v) {
		if(substr($k, 0, 9) == "HTTP_FILE") {
			$k = substr(strtolower($k), 5);
			$headers[$k] = $v;
		}
	}

  $pageId = $headers['file_pageid'];
	$filename = rawurldecode($headers['file_name']);
	$filename_ext = strtolower(array_pop(explode('.',$filename)));
	$allow_file = array("jpg", "png", "bmp", "gif");

	if(!in_array($filename_ext, $allow_file)) {
		echo "NOTALLOW_".$filename;
	} else {
		$file = new stdClass;
		$file->name = date("YmdHis").mt_rand().".".$filename_ext;
		$file->content = file_get_contents("php://input");

		// $uploadDir = '../../upload/';
    // $uploadDir = '../pension_img/content_img/';
    if($pageId == 'facility'){
      $uploadDir = $smartEditor_facility_uploadDir;
    }
    else if($pageId == 'option'){
      $uploadDir = $smartEditor_option_uploadDir;
    }
    else if($pageId == 'travel'){
      $uploadDir = $smartEditor_travel_uploadDir;
    }
    else if($pageId == 'reserve_info'){ //요금안내,예약안내,이용안내,환불규정
      $uploadDir = $smartEditor_reserve_info_uploadDir;
    }
    else if($pageId == 'nboard'){ //요금안내,예약안내,이용안내,환불규정
      $uploadDir = $smartEditor_nboard_uploadDir;
    }
    else{
      $uploadDir = $smartEditor_guestroom_uploadDir;
    }
    // $uploadDir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/pension_img/content_img/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}

		$newPath = $uploadDir.$file->name;

		if(file_put_contents($newPath, $file->content)) {
			$sFileInfo .= "&bNewLine=true";
			$sFileInfo .= "&sFileName=".$filename;
      if($pageId == 'facility'){
        $sFileInfo .= "&sFileURL=/real_reservation/facility_img/content_img/".$file->name;
      }
      else if($pageId == 'option'){
        $sFileInfo .= "&sFileURL=/real_reservation/option_img/content_img/".$file->name;
      }
      else if($pageId == 'travel'){
        $sFileInfo .= "&sFileURL=/real_reservation/travel_img/content_img/".$file->name;
      }
      else if($pageId == 'reserve_info'){
        $sFileInfo .= "&sFileURL=/real_reservation/content_img/reserve_info/".$file->name;
      }
      else if($pageId == 'nboard'){
        $sFileInfo .= "&sFileURL=".$smartEditor_nboard_sFileURL.$file->name;
      }
      else{
        $sFileInfo .= "&sFileURL=/real_reservation/pension_img/content_img/".$file->name;
      }
        // $sFileInfo .= "&pageId=".print_r($headers);
		}

		echo $sFileInfo;
	}
?>
