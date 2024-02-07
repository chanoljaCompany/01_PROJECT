<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";


$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$option_code = isset($_REQUEST['option_code']) ? $_REQUEST['option_code'] : '';
$option_type = isset($_REQUEST['option_type']) ? $_REQUEST['option_type'] : '';
$option_name = isset($_REQUEST['option_name']) ? trim($_REQUEST['option_name']) : '';
$option_fee = isset($_REQUEST['option_fee']) ? trim($_REQUEST['option_fee']) : '';
$option_content = isset($_REQUEST['option_content']) ? $_REQUEST['option_content'] : '';
$use_del_yes = isset($_REQUEST['use_del_yes']) ? trim($_REQUEST['use_del_yes']) : '';
$option_icon = isset($_REQUEST['option_icon']) ? trim($_REQUEST['option_icon']) : '';
$option_host = isset($_REQUEST['option_host']) ? trim($_REQUEST['option_host']) : '';
$option_divi = isset($_REQUEST['option_divi']) ? trim($_REQUEST['option_divi']) : '';


if($_SESSION['session_user_level'] == 'A'){
    $user_id = $option_host;
}
else{
    $user_id = $_SESSION['session_user_id'];
}
if($division == 'input'){
/*부대시설정보입력*/

$sql = "INSERT INTO $OPTION_INFO_TB
        (user_id,option_type,option_code, option_name, option_fee,option_content,option_reg_date,option_icon,option_divi)
        VALUES
        ('".$user_id."','$option_type','$option_code','$option_name','$option_fee','$option_content','$rdate','$option_icon','$option_divi')";
// echo "
// sql : $sql <br>
// ";
   $result = sql_query($sql);
   $re_code = "100";
   $msg = "등록하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }else if($division == 'modify') {
   /*부대시설정보수정*/
   $sql = "UPDATE $OPTION_INFO_TB
           SET
            option_name='$option_name'
           ,option_fee='$option_fee'
           ,option_icon='$option_icon'
           ,option_content='$option_content'
           ,option_mod_date = '$rdate'
           ,user_id = '$user_id'
           ,option_divi = '$option_divi'
           WHERE 1=1
           AND option_code = '$option_code'
          ";
         
          $result = sql_query($sql);
          $re_code = "100";
          $msg = "수정하였습니다.";
          $json = json_output($re_code,$msg);
          echo"$json";
          exit;
 }else if($division == 'delete') {
   /*부대시설삭제*/
   //등록이미지를 우선 삭제한다.
   $str = "SELECT * FROM $OPTION_IMAGE_INFO_TB
           WHERE
           option_code = '$option_code'
          ";
   $result = sql_query($str);

   while ($rows_img = mysqli_fetch_array($result)) {
     @unlink($option_uploads_dir.$rows_img['option_image_name']); //대표이미지 삭제
     @unlink($option_thumb_uploads_dir.$rows_img['option_image_name']);//썸네일삭제
   }
    //등록DB  삭제한다.
   $sql = "DELETE FROM $OPTION_IMAGE_INFO_TB  WHERE user_id = '".$_SESSION['session_user_id']."' AND option_code = '$option_code'";
   $result = sql_query($sql);
   //부대시설정보  삭제한다.
   $sql = "UPDATE $OPTION_INFO_TB 
           SET option_del_whether = 'Y' , option_mod_date = '$rdate' 
           WHERE 1=1
           AND option_code = '$option_code'";
   $result = sql_query($sql);
   $re_code = "100";
   $msg = "삭제하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }
 else if($division == 'optionImageDel') { /*부대시설이미지삭제*/
   $img_seq = isset($_REQUEST['seq']) ? trim($_REQUEST['seq']) : '';
   $option_image_name = isset($_REQUEST['option_image_name']) ? trim($_REQUEST['option_image_name']) : '';
   //삭제전 예약정보를 확인한다..
   $str = "DELETE FROM $OPTION_IMAGE_INFO_TB
           WHERE
           seq = '$img_seq'
           AND option_code = '$option_code'
           AND option_image_name = '$option_image_name'
           AND user_id = '".$_SESSION['session_user_id']."'
           ";
    $result = sql_query($str);
//     echo "
// str >>> $str <Br>
// option_uploads_dir >>> $option_uploads_dir <Br>
//     ";
     @unlink($option_uploads_dir.$option_image_name); //대표이미지 삭제
     @unlink($option_thumb_uploads_dir.$option_image_name);//썸네일삭제

    echo"ok";
    exit;
 }
	 // echo "<script>alert('신규광고를 생성하였습니다.');</script>";
	 // echo "<meta http-equiv='Refresh' content='0; URL=AdvertiseList.php?collapse=advertise&classification=10'>";
 	 // exit;
//
//
//		 //회원정보 테이블 업뎃..
//		  $Query =  "UPDATE  advertisinglist_adver SET onoff = '$onoff' , adnummethod = '$adnummethod', adtype = '$adtype', admemo = '$admemo'
//						 WHERE seq = '$seq'";
//		  @mysqli_query($Query,$connect_platform);


?>
