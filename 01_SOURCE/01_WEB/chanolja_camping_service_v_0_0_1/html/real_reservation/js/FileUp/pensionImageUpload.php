<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$GUESTROOM_INFO_TB = "guestroom_info";
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$division = $_REQUEST["division"];
$file_upload = $_REQUEST["file_upload"];
$filedata = $_REQUEST["filedata"];
// echo "
// file_upload >>> $file_upload <br>
// filedata >>> $filedata <br>
// ";
$pension_img = $_FILES['filedata']['name'];
$uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/pension_prj/pension_img/';
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
  echo "
pension_img_name >>> $pension_img_name <br>
  ";
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
