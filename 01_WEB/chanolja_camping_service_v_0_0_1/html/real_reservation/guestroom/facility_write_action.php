<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$FACILITY_INFO_TB = "facility_info";
$FACILITY_IMAGE_INFO_TB = "facility_image_info";
$division = $_REQUEST["division"];
$facility_code = $_REQUEST["facility_code"];
$facility_name = trim($_REQUEST["facility_name"]);
$facility_fee = trim($_REQUEST["facility_fee"]);
$facility_content = $_REQUEST["facility_content"];
$use_del_yes = trim($_REQUEST["use_del_yes"]);

if($division == 'input'){
/*부대시설정보입력*/
$sql = "INSERT INTO $FACILITY_INFO_TB
        (pension_user_id,facility_code, facility_name, facility_fee,facility_content,facility_reg_date)
        VALUES
        ('$session_userid','$facility_code','$facility_name','$facility_fee','$facility_content','$rdate')";
// echo "
// sql : $sql <br>
// ";
	 $result = sql_query($sql);
   echo "<script>alert('부대시설을 등록하였습니다.');</script>";
   echo "<meta http-equiv='Refresh' content='0; URL=facility_write_form.php?top_menu_id=2001&left_menu_id=004&division=modify&facility_code=".$facility_code."'>";
   exit;
 }else if($division == 'modify') {
   /*부대시설정보수정*/
   $sql = "UPDATE $FACILITY_INFO_TB
           SET
            facility_name='$facility_name'
           ,facility_fee='$facility_fee'
           ,facility_content='$facility_content'
           ,facility_mod_date = '$rdate'
           WHERE pension_user_id = '$session_userid'
            AND facility_code = '$facility_code'
          ";
            // echo "
            // sql : $sql <br>
            // ";
            	 $result = sql_query($sql);
               echo "<script>alert('부대시설정보를 수정하였습니다.');</script>";
               echo "<meta http-equiv='Refresh' content='0; URL=facility_write_form.php?top_menu_id=2001&left_menu_id=004&division=modify&facility_code=".$facility_code."'>";
               exit;
 }else if($division == 'delete') {
   /*부대시설삭제*/
   //등록이미지를 우선 삭제한다.
   $str = "SELECT * FROM $FACILITY_IMAGE_INFO_TB
           WHERE
           facility_code = '$facility_code'
          ";
   $result = sql_query($str);

   while ($rows_img = mysqli_fetch_array($result)) {
      @unlink($facility_uploads_dir.$rows_img['facility_image_name']); //대표이미지 삭제
     @unlink($facility_thumb_uploads_dir.$rows_img['facility_image_name']);//썸네일삭제
   }
    //등록DB  삭제한다.
   $sql = "DELETE FROM $FACILITY_IMAGE_INFO_TB  WHERE pension_user_id = '$session_userid' AND facility_code = '$facility_code'";
   $result = sql_query($sql);
   //부대시설정보  삭제한다.
   $sql = "UPDATE $FACILITY_INFO_TB SET facility_del_whether = 'Y' , facility_mod_date = '$rdate' WHERE pension_user_id = '$session_userid' AND facility_code = '$facility_code'";
   $result = sql_query($sql);
   echo"ok";
 }
 else if($division == 'facilityImageDel') { /*부대시설이미지삭제*/
   $img_seq = $_REQUEST["seq"];
   //삭제전 예약정보를 확인한다..
   $str = "DELETE FROM $FACILITY_IMAGE_INFO_TB
           WHERE
           seq = '$img_seq'
           AND facility_code = '$facility_code'
           AND facility_image_name = '$facility_image_name'
           AND pension_user_id = '$session_userid'
           ";
    $result = sql_query($str);
//     echo "
// str >>> $str <Br>
// facility_uploads_dir >>> $facility_uploads_dir <Br>
//     ";
     @unlink($facility_uploads_dir.$facility_image_name); //대표이미지 삭제
     @unlink($facility_thumb_uploads_dir.$facility_image_name);//썸네일삭제

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
