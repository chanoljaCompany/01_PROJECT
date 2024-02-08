<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$TRAVEL_INFO_TB = "travel_info";
$TRAVEL_IMAGE_INFO_TB = "travel_image_info";
$division = $_REQUEST["division"];
$travel_code = $_REQUEST["travel_code"];
$travel_name = trim($_REQUEST["travel_name"]);
$travel_url = trim($_REQUEST["travel_url"]);
$travel_distance = trim($_REQUEST["travel_distance"]);
$travel_content = $_REQUEST["travel_content"];
$use_del_yes = trim($_REQUEST["use_del_yes"]);
// echo "
// division >>> $division <br>
// ";
if($division == 'input'){
/*주변여행지정보입력*/
$sql = "INSERT INTO $TRAVEL_INFO_TB
        (pension_user_id,travel_code, travel_name, travel_url , travel_distance,travel_content,travel_reg_date)
        VALUES
        ('$session_userid','$travel_code','$travel_name','$travel_url','$travel_distance','$travel_content','$rdate')";
// echo "
// sql : $sql <br>
// ";
	 $result = sql_query($sql);
   echo "<script>alert('주변여행지을 등록하였습니다.');</script>";
   echo "<meta http-equiv='Refresh' content='0; URL=travel_write_form.php?top_menu_id=2001&left_menu_id=006&division=modify&travel_code=".$travel_code."'>";
   exit;
 }else if($division == 'modify') {
   /*주변여행지정보수정*/
   $sql = "UPDATE $TRAVEL_INFO_TB
           SET
            travel_name='$travel_name'
           ,travel_url='$travel_url'
           ,travel_distance='$travel_distance'
           ,travel_content='$travel_content'
           ,travel_mod_date = '$rdate'
           WHERE pension_user_id = '$session_userid'
           AND travel_code = '$travel_code'
          ";
            // echo "
            // sql : $sql <br>
            // ";
            	 $result = sql_query($sql);
               echo "<script>alert('주변여행지정보를 수정하였습니다.');</script>";
               echo "<meta http-equiv='Refresh' content='0; URL=travel_write_form.php?top_menu_id=2001&left_menu_id=006&division=modify&travel_code=".$travel_code."'>";
               exit;
 }else if($division == 'delete') {
   /*주변여행지삭제*/
   //등록이미지를 우선 삭제한다.
   $str = "SELECT * FROM $TRAVEL_IMAGE_INFO_TB
           WHERE pension_user_id = '$session_userid'
           AND   travel_code = '$travel_code'
          ";
   $result = sql_query($str);

   while ($rows_img = mysqli_fetch_array($result)) {
      @unlink($travel_uploads_dir.$rows_img['travel_image_name']); //대표이미지 삭제
      @unlink($travel_thumb_uploads_dir.$rows_img['travel_image_name']);//썸네일삭제
   }
    //등록DB  삭제한다.
   $sql = "DELETE FROM $TRAVEL_IMAGE_INFO_TB  WHERE pension_user_id = '$session_userid' AND travel_code = '$travel_code'";
   $result = sql_query($sql);
   //주변여행지정보  삭제한다.
   $sql = "UPDATE $TRAVEL_INFO_TB SET travel_del_whether = 'Y' , travel_mod_date = '$rdate' WHERE pension_user_id = '$session_userid' AND travel_code = '$travel_code'";
   $result = sql_query($sql);
   echo"ok";
 }
 else if($division == 'travelImageDel') { /*주변여행지이미지삭제*/
   $img_seq = $_REQUEST["seq"];
   //삭제전 예약정보를 확인한다..
   $str = "DELETE FROM $TRAVEL_IMAGE_INFO_TB
           WHERE
           seq = '$img_seq'
           AND travel_code = '$travel_code'
           AND travel_image_name = '$travel_image_name'
           AND pension_user_id = '$session_userid' 
           ";
    $result = sql_query($str);
//     echo "
// str >>> $str <Br>
// travel_uploads_dir >>> $travel_uploads_dir <Br>
//     ";
     @unlink($travel_uploads_dir.$travel_image_name); //대표이미지 삭제
     @unlink($travel_thumb_uploads_dir.$travel_image_name);//썸네일삭제

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
