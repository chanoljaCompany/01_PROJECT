<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

// session_name( md5( $SITE_NAME ) );
session_start();

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$file_upload = isset($_REQUEST['file_upload']) ? $_REQUEST['file_upload'] : '';
$filedata = isset($_REQUEST['filedata']) ? $_REQUEST['filedata'] : '';

if($_SESSION['session_user_level'] != 'A'){
    $user_str = $_SESSION['session_user_id'];
    $com_name_str = $_SESSION['session_company_name'];
}
else{
    $select_company = isset($_REQUEST['select_company']) ? $_REQUEST['select_company'] : '';
    $select_company_exp = explode(":",$select_company);
    $com_name_str = $select_company_exp['0'];
    $user_str = $select_company_exp['1'];
}

// function formatSize($bytes, $decimals = 2) {
//   $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
//   $factor = floor((strlen($bytes) - 1) / 3);
//   return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
// }
// echo "
// file_upload >>> $file_upload <br>
// filedata >>> $filedata <br>
// ";
$pension_img = $_FILES['filedata']['name'];
$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/pension_img/';
$allowed_ext = array('jpg','jpeg','png','gif');
$error = $_FILES['filedata']['error'];
  $extArray = explode('.', $pension_img);
  $ext = $extArray[1];
  if( $error != UPLOAD_ERR_OK ) {
    switch( $error ) {
      case UPLOAD_ERR_INI_SIZE:
      case UPLOAD_ERR_FORM_SIZE:
        echo "파일이 너무 큽니다. ($error)";
        break;
      case UPLOAD_ERR_NO_FILE:
        echo "파일이 첨부되지 않았습니다. ($error)";
        break;
      default:
        echo "파일이 제대로 업로드되지 않았습니다. ($error)";
    }
    exit;
  }
   // 확장자 확인
  if( !in_array($ext, $allowed_ext) ) {
    echo "허용되지 않는 확장자입니다.";
    exit;
  }

  $randNum = rand(0,100000);
  $TODAY = date("YmdHis");
  $fileName = $TODAY.$randNum.".".$ext;
  $move_result = @move_uploaded_file($_FILES['filedata']['tmp_name'], $uploads_dir.$fileName);
  $pension_img_name = $uploadurl.$fileName;
  $guestroom_image_size = formatSize($_FILES['filedata']['size']);
  $sql = "INSERT INTO $GUESTROOM_IMAGE_INFO_TB
          (user_id,guestroom_code, guestroom_name, guestroom_image_name,guestroom_image_size,guestroom_image_upload_date)
          VALUES
          ('".$user_str."','$guestroom_code','$guestroom_name','$pension_img_name','$guestroom_image_size','$rdate')";
  // echo "
  // sql : $sql <br>
  // ";
  	$result = sql_query($sql);
     //쎔네일...

    $original_path= $uploads_dir.$pension_img_name;

    if($ext == 'gif'){
      $origin_img = imagecreatefromgif($original_path);
    }else if($ext == 'jpg' || $ext == 'jpeg'){
      $origin_img = imagecreatefromjpeg($original_path); //jpg, jpeg 의 경우
    }else if($ext == 'png'){
      $origin_img = imagecreatefrompng($original_path);
    }

    // 새 이미지 틀을 만든다.
    $new_img=imagecreatetruecolor(200,100); // 가로 200 픽셀, 세로 100 픽셀
    // 이미지 틀에 원본 이미지를 축소하여 붙여 넣는다.
    imagecopyresampled($new_img, $origin_img, 0, 0, 0, 0, 200, 100, 500, 300);
    // 저장한다.
    $save_path= $uploads_dir."thumb_img/".$pension_img_name;
    if($ext == 'gif'){
      imagegif($new_img, $save_path);
    }else if($ext == 'jpg' || $ext == 'jpeg'){
      imagejpeg($new_img, $save_path);
    }else if($ext == 'png'){
      imagepng($new_img, $save_path);
    }

//
//
// echo "
// ext >>> $ext <Br>
// ";
     // print_r($filedata);
  /*이미지변경시 기존이미지 삭제*/
  // unlink($uploads_dir.$thumb_img_or);


// if($_FILES['filedata']['name'] != ''){
// $filename = $_FILES['filedata']['name'];
// echo "a >>> $filename <br>";
//     $test = explode('.', $_FILES['file']['name']);
//     $extension = end($test);
//     $name = rand(100,999).'.'.$extension;
//
//     // $location = 'uploads/'.$name;
//     // move_uploaded_file($_FILES['file']['tmp_name'], $location);
//
//     // echo '<img src="'.$location.'" height="100" width="100" />';
// }else {
//   echo "b <br>";
// }

?>
