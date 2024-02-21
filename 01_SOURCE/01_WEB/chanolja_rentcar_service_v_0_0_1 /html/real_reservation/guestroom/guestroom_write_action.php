<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";
// session_name( md5( $SITE_NAME ) );
// session_start();

$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];


$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$guestroom_type = isset($_REQUEST['guestroom_type']) ? $_REQUEST['guestroom_type'] : '';
$guestroom_name = isset($_REQUEST['guestroom_name']) ? $_REQUEST['guestroom_name'] : '';
$guestroom_intro = isset($_REQUEST['guestroom_intro']) ? $_REQUEST['guestroom_intro'] : '';
$guestroom_phone = isset($_REQUEST['guestroom_phone']) ? $_REQUEST['guestroom_phone'] : '';
$guestroom_homepage = isset($_REQUEST['guestroom_homepage']) ? $_REQUEST['guestroom_homepage'] : '';
$driver_age = isset($_REQUEST['driver_age']) ? $_REQUEST['driver_age'] : '';
$driver_carrer = isset($_REQUEST['driver_carrer']) ? $_REQUEST['driver_carrer'] : '';
$driver_license = isset($_REQUEST['licenseArray']) ? $_REQUEST['licenseArray'] : '';
// $driver_license = implode( '^', $driver_license );
$zip_code = isset($_REQUEST['zip_code']) ? $_REQUEST['zip_code'] : '';
$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : '';
$address_detail = isset($_REQUEST['address_detail']) ? $_REQUEST['address_detail'] : '';
$car_parking_able = isset($_REQUEST['car_parking_able']) ? $_REQUEST['car_parking_able'] : 'N';
$camping_able = isset($_REQUEST['camping_able']) ? $_REQUEST['camping_able'] : 'N';
$pet_able = isset($_REQUEST['pet_able']) ? $_REQUEST['pet_able'] : 'N';
$delivery_able = isset($_REQUEST['delivery_able']) ? $_REQUEST['delivery_able'] : 'N';
$driver_area = isset($_REQUEST['driver_area']) ? $_REQUEST['driver_area'] : '';
        
$guestroom_personnel = trim(isset($_REQUEST['guestroom_personnel'])) ? $_REQUEST['guestroom_personnel'] : '';
$guestroom_max_personnel = trim(isset($_REQUEST['guestroom_max_personnel'])) ? $_REQUEST['guestroom_max_personnel'] : '';
$guestroom_extra_charge = trim(isset($_REQUEST['guestroom_extra_charge'])) ? $_REQUEST['guestroom_extra_charge'] : '';
$guestroom_fee_all_day = trim(isset($_REQUEST['guestroom_fee_all_day'])) ? $_REQUEST['guestroom_fee_all_day'] : '';
$guestroom_low_season_fee_weekday = trim(isset($_REQUEST['guestroom_low_season_fee_weekday'])) ? $_REQUEST['guestroom_low_season_fee_weekday'] : '';
$guestroom_low_season_fee_weekend = trim(isset($_REQUEST['guestroom_low_season_fee_weekend'])) ? $_REQUEST['guestroom_low_season_fee_weekend'] : '';
$guestroom_low_season_fee_holiday = trim(isset($_REQUEST['guestroom_low_season_fee_holiday'])) ? $_REQUEST['guestroom_low_season_fee_holiday'] : '';
$guestroom_semi_peak_season_fee_weekday  = trim(isset($_REQUEST['guestroom_semi_peak_season_fee_weekday'])) ? $_REQUEST['guestroom_semi_peak_season_fee_weekday'] : '0';
$guestroom_semi_peak_season_fee_weekend  = trim(isset($_REQUEST['guestroom_semi_peak_season_fee_weekend'])) ? $_REQUEST['guestroom_semi_peak_season_fee_weekend'] : '0';
$guestroom_semi_peak_season_fee_holiday = trim(isset($_REQUEST['guestroom_semi_peak_season_fee_holiday'])) ? $_REQUEST['guestroom_semi_peak_season_fee_holiday'] : '0';
$guestroom_peak_season_fee_weekday = trim(isset($_REQUEST['guestroom_peak_season_fee_weekday'])) ? $_REQUEST['guestroom_peak_season_fee_weekday'] : '';
$guestroom_peak_season_fee_weekend = trim(isset($_REQUEST['guestroom_peak_season_fee_weekend'])) ? $_REQUEST['guestroom_peak_season_fee_weekend'] : '';
$guestroom_peak_season_fee_holiday = trim(isset($_REQUEST['guestroom_peak_season_fee_holiday'])) ? $_REQUEST['guestroom_peak_season_fee_holiday'] : '';
$guestroom_content = isset($_REQUEST['guestroom_content']) ? $_REQUEST['guestroom_content'] : '';
$discount_1	 = isset($_REQUEST['discount_1']) ? $_REQUEST['discount_1'] : '';
$discount_2	 = isset($_REQUEST['discount_2']) ? $_REQUEST['discount_2'] : '';

$immediately_reserve	 = isset($_REQUEST['immediately_reserve']) ? $_REQUEST['immediately_reserve'] : '';
$minimum_reservation_day	 = isset($_REQUEST['minimum_reservation_day']) ? $_REQUEST['minimum_reservation_day'] : '';
$maximum_reservation_day	 = isset($_REQUEST['maximum_reservation_day']) ? $_REQUEST['maximum_reservation_day'] : '';

$use_del_yes = trim(isset($_REQUEST['use_del_yes'])) ? $_REQUEST['use_del_yes'] : '';
$guestroom_start_hour = isset($_REQUEST['guestroom_start_hour']) ? $_REQUEST['guestroom_start_hour'] : '09';
$guestroom_end_hour = isset($_REQUEST['guestroom_end_hour']) ? $_REQUEST['guestroom_end_hour'] : '13';
$guestroom_use_hour = $guestroom_start_hour."~".$guestroom_end_hour;
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


$sql = " select * from guestroom_info where guestroom_code = '".$guestroom_code."' ";
$result = sql_query($sql); 
$row=sql_fetch_array($result);

//파일첨부1
if(!$row['bf_file_1']) {
$filename1  = $_FILES['bf_file_1']['name'];
$tmp_file1  = $_FILES['bf_file_1']['tmp_name'];
//상품설명 이미지 서버에 업로드
$dest_file1 = '../product_img/'.$filename1;         
move_uploaded_file($tmp_file1, $dest_file1);
} else {
$filename1 = $row['bf_file_1'];
}


//파일첨부2
if(!$row['bf_file_2']) {
$filename2  = $_FILES['bf_file_2']['name'];
$tmp_file2  = $_FILES['bf_file_2']['tmp_name'];
//상품설명 이미지 서버에 업로드
$dest_file2 = '../product_img/'.$filename2;         
move_uploaded_file($tmp_file2, $dest_file2);
} else {
$filename2 = $row['bf_file_2'];
}


//파일첨부3
if(!$row['bf_file_3']) {
$filename3  = $_FILES['bf_file_3']['name'];
$tmp_file3  = $_FILES['bf_file_3']['tmp_name'];
//상품설명 이미지 서버에 업로드
$dest_file3 = '../product_img/'.$filename3;         
move_uploaded_file($tmp_file3, $dest_file3);
} else {
$filename3 = $row['bf_file_3'];
}


//파일첨부4
if(!$row['bf_file_4']) {
$filename4  = $_FILES['bf_file_4']['name'];
$tmp_file4  = $_FILES['bf_file_4']['tmp_name'];
//상품설명 이미지 서버에 업로드
$dest_file4 = '../product_img/'.$filename4;         
move_uploaded_file($tmp_file4, $dest_file4);
} else {
$filename4 = $row['bf_file_4'];
}


//파일첨부5
if(!$row['bf_file_5']) {
$filename5  = $_FILES['bf_file_5']['name'];
$tmp_file5  = $_FILES['bf_file_5']['tmp_name'];
//상품설명 이미지 서버에 업로드
$dest_file5 = '../product_img/'.$filename5;         
move_uploaded_file($tmp_file5, $dest_file5);
} else {
$filename5 = $row['bf_file_5'];
}














if($division == 'input'){
/*상품정보입력*/
    // $get_geolocation_google = get_geolocation_google($address);
    // $geolocationExp = explode("^",$get_geolocation_google);
    // $lat = $geolocationExp['0'];
    // $lng = $geolocationExp['1'];
    $get_geolocation_kakao = get_geolocation_kakao($address);
            $geolocationExp = explode("^",$get_geolocation_kakao);
            $lat = $geolocationExp['0'];
            $lng = $geolocationExp['1'];
/*
$sql = "INSERT INTO $GUESTROOM_INFO_TB
        (user_id,guestroom_type,guestroom_code, guestroom_name, guestroom_intro, guestroom_personnel, guestroom_quantity
        , guestroom_max_personnel, guestroom_extra_charge
        ,guestroom_low_season_fee_weekday,guestroom_low_season_fee_weekend,guestroom_low_season_fee_holiday
        ,guestroom_semi_peak_season_fee_weekday,guestroom_semi_peak_season_fee_weekend,guestroom_semi_peak_season_fee_holiday
        ,guestroom_peak_season_fee_weekday,guestroom_peak_season_fee_weekend,guestroom_peak_season_fee_holiday,guestroom_content,guestroom_reg_date,guestroom_use_hour
        ,guestroom_phone,guestroom_homepage,driver_age,driver_carrer,driver_license,zip_code,address,address_detail
        ,car_parking_able,camping_able,pet_able,delivery_able,driver_area,discount_1,discount_2
        ,immediately_reserve,minimum_reservation_day,maximum_reservation_day,com_name,latitude,longitude
        )
        VALUES
        ('".$user_str."','$guestroom_type','$guestroom_code','$guestroom_name','$guestroom_intro','$guestroom_personnel','$guestroom_quantity'
         ,'$guestroom_max_personnel','$guestroom_extra_charge'
         ,'$guestroom_low_season_fee_weekday','$guestroom_low_season_fee_weekend','$guestroom_low_season_fee_holiday'
         ,'$guestroom_semi_peak_season_fee_weekday','$guestroom_semi_peak_season_fee_weekend','$guestroom_semi_peak_season_fee_holiday'
         ,'$guestroom_peak_season_fee_weekday','$guestroom_peak_season_fee_weekend','$guestroom_peak_season_fee_holiday','$guestroom_content','$rdate','$guestroom_use_hour'
         ,'$guestroom_phone','$guestroom_homepage','$driver_age','$driver_carrer','$driver_license','$zip_code','$address','$address_detail'
         ,'$car_parking_able','$camping_able','$pet_able','$delivery_able','$driver_area','$discount_1','$discount_2'
         ,'$immediately_reserve','$minimum_reservation_day','$maximum_reservation_day','".$com_name_str."','$lat','$lng'
         )";
*/
   $sql = "INSERT INTO $GUESTROOM_INFO_TB
           SET
		   user_id='$user_str',
           guestroom_type='$guestroom_type',
		   guestroom_code='$guestroom_code',
           guestroom_name='$guestroom_name',
           guestroom_intro='$guestroom_intro',
           guestroom_personnel='$guestroom_personnel',
           guestroom_quantity='$guestroom_quantity',
           guestroom_max_personnel='$guestroom_max_personnel',
           guestroom_extra_charge='$guestroom_extra_charge',
           guestroom_fee_all_day='$guestroom_fee_all_day',
           guestroom_low_season_fee_weekday='$guestroom_low_season_fee_weekday',
           guestroom_low_season_fee_weekend='$guestroom_low_season_fee_weekend',
           guestroom_low_season_fee_holiday='$guestroom_low_season_fee_holiday',
           guestroom_semi_peak_season_fee_weekday='$guestroom_semi_peak_season_fee_weekday',
           guestroom_semi_peak_season_fee_weekend='$guestroom_semi_peak_season_fee_weekend',
           guestroom_semi_peak_season_fee_holiday='$guestroom_semi_peak_season_fee_holiday',
           guestroom_peak_season_fee_weekday='$guestroom_peak_season_fee_weekday',
           guestroom_peak_season_fee_weekend='$guestroom_peak_season_fee_weekend',
           guestroom_peak_season_fee_holiday='$guestroom_peak_season_fee_holiday',
		   bf_file_1 = '$filename1',
		   bf_file_2 = '$filename2',
		   bf_file_3 = '$filename3',
		   bf_file_4 = '$filename4',
		   bf_file_5 = '$filename5',
           guestroom_content = '$guestroom_content',
           guestroom_reg_date = '$rdate',
           guestroom_use_hour = '$guestroom_use_hour',
           guestroom_phone = '$guestroom_phone',
           guestroom_homepage = '$guestroom_homepage',
           driver_age = '$driver_age',
           driver_carrer = '$driver_carrer',
           driver_license = '$driver_license',
           zip_code = '$zip_code',
           address = '$address',
           address_detail = '$address_detail',
           car_parking_able = '$car_parking_able',
           camping_able = '$camping_able',
           pet_able = '$pet_able',
           delivery_able = '$delivery_able',
           driver_area = '$driver_area',
           discount_1 = '$discount_1',
           discount_2 = '$discount_2',
           immediately_reserve = '$immediately_reserve',
           minimum_reservation_day = '$minimum_reservation_day',
           maximum_reservation_day = '$maximum_reservation_day',
		   com_name= '$com_name_str',
           latitude = '$lat',
           longitude = '$lng'		   
          ";

   $result = sql_query($sql);
   $re_code = "100";
   $msg = "등록하였습니다.";
   $json = json_output($re_code,$msg);
   echo"$json";
   exit;
 }else if($division == 'modify') {
   /*상품정보수정*/
//    $get_geolocation_google = get_geolocation_google($address);
//    $geolocationExp = explode("^",$get_geolocation_google);
//    $lat = $geolocationExp['0'];
//    $lng = $geolocationExp['1'];
            $get_geolocation_kakao = get_geolocation_kakao($address);
            $geolocationExp = explode("^",$get_geolocation_kakao);
            $lat = $geolocationExp['0'];
            $lng = $geolocationExp['1'];
   $sql = "UPDATE $GUESTROOM_INFO_TB
           SET
            guestroom_type='$guestroom_type'
           ,guestroom_name='$guestroom_name'
           ,guestroom_intro='$guestroom_intro'
           ,guestroom_personnel='$guestroom_personnel'
           ,guestroom_quantity='$guestroom_quantity'
           ,guestroom_max_personnel='$guestroom_max_personnel'
           ,guestroom_extra_charge='$guestroom_extra_charge'
           ,guestroom_fee_all_day='$guestroom_fee_all_day'
           ,guestroom_low_season_fee_weekday='$guestroom_low_season_fee_weekday'
           ,guestroom_low_season_fee_weekend='$guestroom_low_season_fee_weekend'
           ,guestroom_low_season_fee_holiday='$guestroom_low_season_fee_holiday'
           ,guestroom_semi_peak_season_fee_weekday='$guestroom_semi_peak_season_fee_weekday'
           ,guestroom_semi_peak_season_fee_weekend='$guestroom_semi_peak_season_fee_weekend'
           ,guestroom_semi_peak_season_fee_holiday='$guestroom_semi_peak_season_fee_holiday'
           ,guestroom_peak_season_fee_weekday='$guestroom_peak_season_fee_weekday'
           ,guestroom_peak_season_fee_weekend='$guestroom_peak_season_fee_weekend'
           ,guestroom_peak_season_fee_holiday='$guestroom_peak_season_fee_holiday'
		   ,bf_file_1 = '$filename1'
		   ,bf_file_2 = '$filename2'
		   ,bf_file_3 = '$filename3'
		   ,bf_file_4 = '$filename4'
		   ,bf_file_5 = '$filename5'
           ,guestroom_content = '$guestroom_content'
           ,guestroom_mod_date = '$rdate'
           ,guestroom_use_hour = '$guestroom_use_hour'
           ,guestroom_phone = '$guestroom_phone'
           ,guestroom_homepage = '$guestroom_homepage'
           ,driver_age = '$driver_age'
           ,driver_carrer = '$driver_carrer'
           ,driver_license = '$driver_license'
           ,zip_code = '$zip_code'
           ,address = '$address'
           ,address_detail = '$address_detail'
           ,car_parking_able = '$car_parking_able'
           ,camping_able = '$camping_able'
           ,pet_able = '$pet_able'
           ,delivery_able = '$delivery_able'
           ,driver_area = '$driver_area'
           ,discount_1 = '$discount_1'
           ,discount_2 = '$discount_2'
           ,immediately_reserve = '$immediately_reserve'
           ,minimum_reservation_day = '$minimum_reservation_day'
           ,maximum_reservation_day = '$maximum_reservation_day'
           ,latitude = '$lat'
           ,longitude = '$lng'
           WHERE 1=1
           AND user_id = '".$user_str."'
           AND guestroom_code = '$guestroom_code'
          ";
            $result = sql_query($sql);
            $re_code = "100";
            $msg = "변경하였습니다.";
            $json = json_output($re_code,$msg);
            echo"$json";
            exit;
 }else if($division == 'delete') { /*상품삭제*/
   //삭제전 예약정보를 확인한다..
   $str = "SELECT COUNT(*) AS dbNum FROM $GUESTROOM_RESERVATION_INFO_TB
           WHERE 1=1
           AND user_id = '".$user_str."'
           AND guestroom_code = '$guestroom_code'
           AND (guestroom_reserve_status = '1' OR guestroom_reserve_status = '2' OR guestroom_reserve_status = '8')
           ";
    $result = sql_query($str);
    $rows = mysqli_fetch_array($result);
    $dbNum = $rows['dbNum'];
    // echo "
    // dbNum > $dbNum <bR>
    // ";
    if($dbNum > '0' && $use_del_yes == '0') {
        $re_code = "200";
        $msg = "삭제하였습니다.";
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
    }

   /*상품삭제*/
   // $sql = "DELETE FROM $GUESTROOM_INFO_TB WHERE guestroom_code = '$guestroom_code'";
   $sql = "UPDATE $GUESTROOM_INFO_TB 
           SET guestroom_del_whether = 'Y' 
           , guestroom_mod_date = '$rdate' 
           WHERE 1=1";
           if($_SESSION['session_user_level'] != 'A'){
   $sql .=" AND  user_id = '".$user_str."'";
           }
   $sql .=" AND guestroom_code = '$guestroom_code'";
   $result = sql_query($sql);
//    echo "
//    sql > $sql <br>
//    ";
    $re_code = "100";
    $msg = "삭제하였습니다.";
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
 }
 else if($division == 'pensionImageDel') { /*상품이미지삭제*/
   $img_seq = trim(isset($_REQUEST['seq'])) ? $_REQUEST['seq'] : '';
   $guestroom_image_name = trim(isset($_REQUEST['guestroom_image_name'])) ? $_REQUEST['guestroom_image_name'] : '';
   $uploads_dir = $_SERVER['DOCUMENT_ROOT'].'/real_reservation/pension_img/';
   //삭제전 예약정보를 확인한다..
   $str = "DELETE FROM $GUESTROOM_IMAGE_INFO_TB
           WHERE
           1=1
           AND seq = '$img_seq'
           AND guestroom_code = '$guestroom_code'
           AND guestroom_image_name = '$guestroom_image_name'
           AND user_id = '".$user_str."'
           ";
    $result = sql_query($str);
//     echo "
// str >>> $str <Br>
// uploads_dir >>> $uploads_dir <Br>
//     ";
    unlink($uploads_dir.$guestroom_image_name);
    unlink($uploads_dir."/thumb_img/".$guestroom_image_name);

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

else if($division == 'goptionChange') { /*상품이미지삭제*/
  $option_code = isset($_REQUEST['option_code']) ? $_REQUEST['option_code'] : '';
  $guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
  $goption_use_val = isset($_REQUEST['goption_use_val']) ? $_REQUEST['goption_use_val'] : '';
  $option_type = isset($_REQUEST['option_type']) ? $_REQUEST['option_type'] : '';

  if($goption_use_val == 'checked'){
    $showStr = "N";
  }
  else{
    $showStr = "Y";
  }
  $sql = "INSERT INTO $GUESTROOM_OPTION_TB
          (user_id,option_type,option_code,guestroom_code,option_mod_date,option_del_whether)
          VALUES
          ('".$user_str."','$option_type','$option_code','$guestroom_code','$TODATE','$showStr')
          ON DUPLICATE KEY UPDATE
           option_mod_date='$TODATE',
           option_del_whether='$showStr'
         ";
          $result = sql_query($sql);
   echo"ok";
   exit;
}

else if($division == 'gareaChange') { /*상품지역선택*/
    $area_code = isset($_REQUEST['area_code']) ? $_REQUEST['area_code'] : '';
    $guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
    $garea_use_val = isset($_REQUEST['garea_use_val']) ? $_REQUEST['garea_use_val'] : '';
  
    if($garea_use_val == 'checked'){
      $showStr = "N";
    }
    else{
      $showStr = "Y";
    }
    $sql = "INSERT INTO $GUESTROOM_AREA_TB
            (user_id,area_code,guestroom_code,area_mod_date,area_del_whether)
            VALUES
            ('".$user_str."','$area_code','$guestroom_code','$TODATE','$showStr')
            ON DUPLICATE KEY UPDATE
             area_mod_date='$TODATE',
             area_del_whether='$showStr'
           ";
            $result = sql_query($sql);
     echo"ok";
     exit;
  }

  else if($division == 'get_customer_data'){
    $select_company = isset($_REQUEST['select_company']) ? $_REQUEST['select_company'] : '';
    $select_company_exp = explode(":",$select_company);
    $com_name_str = $select_company_exp['0'];
    $user_str = $select_company_exp['1'];
    $get_customer_data = get_customer_data($user_str,'user_id'); 
    $re_code = "100";
    $msg = $get_customer_data['zip1']."^".$get_customer_data['address']."^".$get_customer_data['address_no'];
    $json = json_output($re_code,$msg);
    echo"$json";
    exit;
  }

?>
