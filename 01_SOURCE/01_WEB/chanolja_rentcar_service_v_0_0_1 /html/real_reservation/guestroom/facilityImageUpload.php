<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$FACILITY_INFO_TB = "facility_info";
$FACILITY_IMAGE_INFO_TB = "facility_image_info";
$facility_code = $_REQUEST["facility_code"];
$file_upload = $_REQUEST["file_upload"];
$filedata = $_REQUEST["filedata"];
function formatSize($bytes, $decimals = 2) {
  $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}
$facility_img = $_FILES['filedata']['name'];
$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/facility_img/';
$allowed_ext = array('jpg','jpeg','png','gif');
$error = $_FILES['filedata']['error'];
  $extArray = explode('.', $facility_img);
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
  $facility_img_name = $uploadurl.$fileName;
  $facility_image_size = formatSize($_FILES['filedata']['size']);
  $sql = "INSERT INTO $FACILITY_IMAGE_INFO_TB
          (pension_user_id,facility_code, facility_name, facility_image_name,facility_image_size,facility_image_upload_date)
          VALUES
          ('$session_userid','$facility_code','$facility_name','$facility_img_name','$facility_image_size','$rdate')";
  // echo "
  // sql : $sql <br>
  // ";
  	$result = sql_query($sql);
     //쎔네일...

    $original_path= $uploads_dir.$facility_img_name;

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
    $save_path= $uploads_dir."thumb_img/".$facility_img_name;
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
