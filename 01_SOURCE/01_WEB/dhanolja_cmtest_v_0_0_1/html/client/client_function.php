<?php
function get_goption_data($option_code,$guestroom_code){
  global $GUESTROOM_OPTION_TB,$SITENAME;
  $sql = "SELECT * FROM $GUESTROOM_OPTION_TB WHERE user_id='".$SITENAME."' AND option_code = '$option_code' AND guestroom_code='$guestroom_code' AND option_del_whether = 'Y'";
//   echo "
// $sql
//   ";
  $rows = sql_fetch($sql);
  return  $rows;
}

function get_option_fee($option_code){
  global $OPTION_INFO_TB,$SITENAME;
  $sql = "SELECT *
          FROM $OPTION_INFO_TB
          WHERE 
        --   AND user_id='".$SITENAME."'
          option_code = '".$option_code."'
          AND option_del_whether = 'N'";
  $rows = sql_fetch($sql);
  return $rows;
}

function get_goption_all($guestroom_code,$option_type,$user_id){
  global $GUESTROOM_OPTION_TB,$OPTION_INFO_TB,$SITENAME;
  if($option_type) $substr = "AND A.option_type='$option_type'";
  if($option_type == 'p') $substr2 = "AND A.user_id='$user_id'";
  $sql = "SELECT A.*,B.*
          FROM $GUESTROOM_OPTION_TB AS A
          INNER  JOIN $OPTION_INFO_TB AS B ON B.option_code = A.option_code
          WHERE  A.guestroom_code='$guestroom_code'
          AND A.option_del_whether = 'Y'
          $substr
          $substr2
          ";
//   echo "
//   sql > $sql <br>
//   ";
  $result = sql_query($sql);
  $option_array = array();
  while ($rows = sql_fetch_array($result)) {
    $arrData = array(
              'option_code' => $rows['option_code'],
              'guestroom_code' => $rows['guestroom_code'],
              'option_name' => $rows['option_name'],
              'option_fee' => $rows['option_fee'],
              'option_icon' => $rows['option_icon'],
              'option_divi' => $rows['option_divi']
               );
    array_push($option_array, $arrData);
  }
  // print_r($option_array);
  return $option_array;
}

function peak_data_array_client($year,$month,$str) {
  global $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB,$MANAGEMENT_RESERVE_PEAK_DATE_TB;
  $toyearmonth = $year."-".sprintf('%02d', $month);
  // $month = "8";
  // $smonth = sprintf('%02d', $month);
   $data_array = array();
  if($str == 'semi'){
    $query_tb = $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB;
    $start_date = "semi_peak_season_start_date";
    $end_date = "semi_peak_season_end_date";
  }
  else{
    $query_tb = $MANAGEMENT_RESERVE_PEAK_DATE_TB;
    $start_date = "peak_season_start_date";
    $end_date = "peak_season_end_date";
  }

  $sql = "SELECT * FROM $query_tb
          WHERE user_id = '".$SITENAME."'
          AND ($start_date LIKE '".$toyearmonth."%' OR $end_date LIKE '".$toyearmonth."%')";
  $result = sql_query($sql);
  while($rows = sql_fetch_array($result)) {
      if($rows['seq']) {
          $sstartday = new DateTime($rows[$start_date]);
          // $sstartday = new DateTime($rows['peak_season_start_date']);
          $sendday = new DateTime($rows[$end_date]);
          $diffday = date_diff($sstartday, $sendday);
          $diffday = $diffday->days;
        for($i = '0' ; $i <= $diffday ; $i++) {
          $startdays = strtotime($rows[$start_date]."+$i days");
          $startdays = date("Y-m-d",$startdays);
          $arrData = $startdays;
            array_push($data_array, $arrData);
          }
        } //end for
  }//end while
  // print_r($data_array);
  return $data_array;
}


function peak_date_check($startDate,$user_id){
  global $MANAGEMENT_RESERVE_PEAK_DATE_TB,$SITENAME,$wr_test;
  $sql = "SELECT COUNT(*) AS peakNum FROM $MANAGEMENT_RESERVE_PEAK_DATE_TB
          WHERE user_id = '".$user_id."'
          AND peak_season_start_date <= '$startDate' AND '$startDate' <= peak_season_end_date
          ";
//   if($wr_test){
//     echo "
//     sql > $sql <br>
//     ";
//   }
  $row = sql_fetch($sql);
  return $row['peakNum'];
}

function semi_peak_date_check($startDate){
  global $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB,$SITENAME;
  $sql = "SELECT COUNT(*) AS peakNum FROM $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB
          WHERE user_id = '".$SITENAME."'
          AND peak_season_start_date <= '$startDate' AND '$startDate' <= peak_season_end_date
          ";
  $row = sql_fetch($sql);
  return $row['peakNum'];
}

function holiday_prv_date_check($startDate,$weekend_fee_set_array){ //공휴일전일인지 체크
  global $HOLIDAY_TB;
  $weekend_fee_set_exp = explode(",",$weekend_fee_set_array);
  $weekend_set = $weekend_fee_set_exp['1'];//공휴일을 주말요금 적용
  $weekend_prv_set = $weekend_fee_set_exp['0'];//공휴일 전일을 주말요금 적용

  $prv_date = date('Y-m-d', strtotime("+1 day", strtotime($startDate))); //전날을 구함...
// echo " <br>
// startDate > $startDate <br>
// weekend_set > $weekend_set <br>
// weekend_prv_set > $weekend_prv_set <br>
// prv_date > $prv_date <br>
//   ";
  $dateExplode = explode("-",$prv_date);
  $year = (int)$dateExplode['0'];
  $month = (int)$dateExplode['1'];
  $day = (int)$dateExplode['2'];

  if($weekend_prv_set == 'A') {
    $sql = "SELECT COUNT(*) AS holiNum FROM $HOLIDAY_TB WHERE year = '$year' AND month = '$month' AND day = '$day' ";
    $row = sql_fetch($sql);
    return $row['holiNum'];
  }
  else{
    return '0';
  }
}

function holiday_date_check($startDate,$weekend_fee_set_array){//공휴일 체크
  global $HOLIDAY_TB;
  $weekend_fee_set_exp = explode(",",$weekend_fee_set_array);
  $weekend_set = $weekend_fee_set_exp['1'];//공휴일을 주말요금 적용
  $weekend_prv_set = $weekend_fee_set_exp['0'];//공휴일 전일을 주말요금 적용
  $holidayCheck = explode("-",$startDate);
  $year = (int)$holidayCheck['0'];
  $month = (int)$holidayCheck['1'];
  $day = (int)$holidayCheck['2'];

  //선택날짜가 공휴일인지 체크...
  $sql = "SELECT COUNT(*) AS holiNum FROM $HOLIDAY_TB WHERE year = '$year' AND month = '$month' AND day = '$day' ";
  $row = sql_fetch($sql);
//   echo "
// sql > $sql <br>
//   ";
// echo " <br>
// startDate > $startDate <br>
// weekend_set > $weekend_set <br>
// weekend_prv_set > $weekend_prv_set <br>
// prv_date > $prv_date <br>
//   ";
    return $row['holiNum'];
}
function weekday_date_check($startDate,$user_id){
  global $HOLIDAY_TB,$MANAGEMENT_RESERVE_TB,$SITENAME,$wr_test;
  $dateExplode = explode("-",$startDate);
  $year = (int)$dateExplode['0'];
  $month = (int)$dateExplode['1'];
  $day = (int)$dateExplode['2'];

  $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));
  if($yoil == '0') $yoil = '7';
  $sql = "SELECT count(*) as wdNum FROM  $MANAGEMENT_RESERVE_TB
          WHERE user_id = '".$user_id."'
          AND weekend_setting_start <= '$yoil' AND '$yoil' <= weekend_setting_end
          ";
  $rows = sql_fetch($sql);
//   if($wr_test){
//     echo "
//     yoil > $yoil <br> <bR>
//     sql > $sql <br> <bR>
//     ";
//   }
//   echo "
// yoil > $yoil <br>
// sql > $sql <BR>
//   ";
  if($rows['wdNum']){
     $day_name = '1';
  }else{
     $day_name = '0';
  }
  // if($yoil == '0' || $yoil == '6') {
  //    $day_name = '1';
  // }else{
  //    $day_name = '0';
  // }

  return $day_name;
}

function weekday_date_check_sub($startDate,$user_id){
  global $HOLIDAY_TB,$MANAGEMENT_RESERVE_TB,$SITENAME,$wr_test;
  $dateExplode = explode("-",$startDate);
  $year = (int)$dateExplode['0'];
  $month = (int)$dateExplode['1'];
  $day = (int)$dateExplode['2'];

  // $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));

  if($yoil == '0'){
    $rows['wdNum'] = '1';
  }
  else{
  $sql = "SELECT count(*) as wdNum FROM  $MANAGEMENT_RESERVE_TB
          WHERE user_id = '".$user_id."'
          AND weekend_setting_start <= '$yoil' AND '$yoil' <= weekend_setting_end
          ";
  $rows = sql_fetch($sql);
 }
  if($rows['wdNum']){
     $day_name = '1';
  }else{
     $day_name = '0';
  }
  // if($yoil == '0' || $yoil == '6') {
  //    $day_name = '1';
  // }else{
  //    $day_name = '0';
  // }

  return $day_name;
}

function reserve_possible($startDate,$guestroom_code){
  global $GUESTROOM_RESERVATION_INFO_TB,$SITENAME,$wr_test;

  $sql = "SELECT count(*) as reserveNum FROM $GUESTROOM_RESERVATION_INFO_TB
          WHERE guestroom_code = '$guestroom_code'
          AND guestroom_reserve_date = '$startDate'
          AND (guestroom_reserve_status = '3' or guestroom_reserve_status = '6')";
//           if($wr_test){
// echo "
// $sql <br>
// ";
//           }
          $row = sql_fetch($sql);
          return $row['reserveNum'];
}

function get_area_check($guestroom_code,$area,$userid){
    global $GUESTROOM_AREA_TB;
    $rvalue = "N";
    $sql = "SELECT COUNT(*) AS checkNum FROM $GUESTROOM_AREA_TB
            WHERE user_id = '$userid'
            AND guestroom_code = '$guestroom_code'
            AND area_del_whether = 'Y'
            AND area_code IN ($area)
            ";

    $row = sql_fetch($sql);
    if($row['checkNum']){
      $rvalue = "Y";
    }
    // echo "
    // sql >$sql <br>
    // rvalue > $rvalue <br>
    // ";
    return $rvalue;
}

function get_boption_check($guestroom_code,$basicoption,$userid){
    global $GUESTROOM_OPTION_TB;
    $rvalue = "N";
    $sql = "SELECT COUNT(*) AS checkNum FROM $GUESTROOM_OPTION_TB
            WHERE user_id = '$userid'
            AND guestroom_code = '$guestroom_code'
            AND option_del_whether = 'Y'
            AND option_code IN ($basicoption)
            ";

    $row = sql_fetch($sql);
    $checkNum = $row['checkNum'];
    $basicoption_size = count(explode(",",$basicoption));


    if($checkNum == $basicoption_size){
      $rvalue = "Y";
    }
    // echo "
    // sql >$sql <br>
    // checkNum >$checkNum <br>
    // basicoption_size > $basicoption_size <br>
    // rvalue >> $rvalue <br>
    // ";
    return $rvalue;
}

function get_date_intval_client($dateStr){ //날짜차이 계산...
    $dateStrExp =explode("~",$dateStr);
    $startDate = trim($dateStrExp['0']);
    $endDate = trim($dateStrExp['1']);
    $dateDifference = abs(strtotime($startDate) - strtotime($endDate));
    $years  = floor($dateDifference / (365 * 60 * 60 * 24));
    $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $dateintval   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
//     echo "
//   dateintvalasdf > $dateintval <br>
//     ";
    return $dateintval;
  }

// function get_date_intval_client($dateStr){ //날짜차이 계산...
//     $dateStrExp =explode("~",$dateStr);
//     $startDate = trim($dateStrExp['0']);
//     $endDate = trim($dateStrExp['1']);
//     $dateDifference = abs(strtotime($startDate) - strtotime($endDate));
//     $years  = floor($dateDifference / (365 * 60 * 60 * 24));
//     $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
//     $dateintval   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
//     echo "
//   dateintval > $dateintval <br>
//     ";
//     return $dateintval;
//   }

function room_info_array_etc($get_guestroom_code,$dateStr,$divisionType,$personnel,$area,$basicoption,$com_name
                            ,$sPrice,$ePrice,$driver_license,$pet_able,$delivery_able,$camping_able)
  {
  global $GUESTROOM_INFO_TB,$GUESTROOM_IMAGE_INFO_TB,$SITENAME,$wr_test;
//   echo "
//   divisionType > $divisionType <br>
//   dateStr > $dateStr <br>
//   ";
// echo "
// wr_test > $wr_test
// ";
  $mangement_array = mangement_array('client');
  if($wr_test){
    // print_r($mangement_array);
    // echo "
    // peak_date > $peak_date <br>
    // ";
  }
  $dateStrExp =explode("~",$dateStr);
  $sub_qry = "";
  if($get_guestroom_code) $sub_qry .= " AND A.guestroom_code = '".$get_guestroom_code."'";
  if($personnel) $sub_qry .= " AND A.guestroom_personnel >= '".$personnel."'";
  if($pet_able) $sub_qry .= " AND A.pet_able = 'Y'";
  if($delivery_able) $sub_qry .= " AND A.delivery_able = 'Y'";
  if($camping_able) $sub_qry .= " AND A.camping_able = 'Y'";
  if($pet_able) $sub_qry .= " AND A.pet_able = 'Y'";
  if($pet_able) $sub_qry .= " AND A.pet_able = 'Y'";
  if($com_name) $sub_qry .= " AND A.com_name like '%".$com_name."%'";
  if($sPrice && !$ePrice) $sub_qry .= " AND A.guestroom_low_season_fee_weekday >='".$sPrice."'";
  if(!$sPrice && $ePrice) $sub_qry .= " AND A.guestroom_low_season_fee_weekday <='".$ePrice."'";
  if($sPrice && $ePrice) $sub_qry .= " AND A.guestroom_low_season_fee_weekday BETWEEN  '".$sPrice."' AND '".$ePrice."'";
  if($driver_license){
      for($i = 0; $i < sizeof($driver_license) ; $i++){
        $likeqry .= " A.driver_license like '%".$driver_license[$i]."%' or ";
      }
       $likeqry = rtrim($likeqry, " or ");
       $sub_qry .= " AND(".$likeqry.")";
    //   echo "
    //   likeqry2 > $likeqry <br>
    //   ";
  }
//  if($sPrice) $sub_qry .= " AND A.com_name like '%".$com_name."%'";
//   area,basicoption,sPrice,ePrice,driver_license

  $sql = "SELECT DISTINCT A.* , B.guestroom_image_name
          FROM $GUESTROOM_INFO_TB AS A
          INNER  JOIN $GUESTROOM_IMAGE_INFO_TB AS B ON B.guestroom_code = A.guestroom_code
          WHERE A.guestroom_type = '".$divisionType."'
          $sub_qry
          AND A.post_show = 'Y'
          AND A.guestroom_del_whether = 'N'
          ";

// if($wr_test){
//       echo "
// $sql
//   ";
//   }
  $result = sql_query($sql);
  $room_info_array = array();

  if($divisionType == '1'){
    $dateintval = get_date_intval_client($dateStr);
  }
  else{
    $dateintval = '1';
  }

// if($wr_test){
//       echo "
//       dateintval > $dateintval <br>
//   ";
//   }
//   echo "
//    dateintval > $dateintval <br>
//   ";
   // $startDate = "2021-03-28";
  while ($rows = sql_fetch_array($result)) {
      $get_area_check = "Y";
      $get_boption_check = "Y";
      $minimum_reservation_day_check = "Y";
      $maximum_reservation_day_check = "Y";
      $minimum_reservation_day = $rows['minimum_reservation_day'];
      $maximum_reservation_day = $rows['maximum_reservation_day'];
    //   echo "
    //   dateintval > $dateintval <br>
    //   minimum_reservation_day > $minimum_reservation_day <br>
    //   maximum_reservation_day > $maximum_reservation_day <br>
    //   ";
      if($minimum_reservation_day && ($dateintval < $minimum_reservation_day)){
          $minimum_reservation_day_check = "N";
      }
      if($maximum_reservation_day && ($dateintval > $maximum_reservation_day)){
          $maximum_reservation_day_check = "N";
      }
    //   echo "
    //   minimum_reservation_day_check > $minimum_reservation_day_check <br>
    //   maximum_reservation_day_check > $maximum_reservation_day_check <br>
    //   ";
      if($minimum_reservation_day_check == 'Y' && $maximum_reservation_day_check == 'Y'){
      if($area){
          $get_area_check = get_area_check($rows['guestroom_code'],$area,$rows['user_id']);
      }

      if($get_area_check == "Y") {
        if($basicoption){
            $get_boption_check = get_boption_check($rows['guestroom_code'],$basicoption,$rows['user_id']);
        }
      if($get_boption_check == "Y") {
      $guestroom_name = $rows['guestroom_name'];
      $guestroom_type = $rows['guestroom_type'];
      $startDate = $dateStrExp['0'];
      $endDate = $dateStrExp['1'];
     // echo "
     // guestroom_name > $guestroom_name ============ <br>
     // guestroom_type > $guestroom_type ============ <br>
     // ";
      $room_fee = "";
      $reserve_possible_value = "N"; //N->예약가능,Y->예약불가
    for($i = 0; $i < $dateintval ; $i++) {
          if($i > '0'){
            $startDate = date('Y-m-d', strtotime("+1 day", strtotime($startDate)));
          }
          else {
            $startDate = date('Y-m-d', strtotime("+0 day", strtotime($startDate)));
          }
//           echo "
// startDate >>> $startDate <br>
//           ";
          //$peak_date = peak_date_check($startDate); //성수기시즌 1
          // $semi_peak_date = semi_peak_date_check($startDate); //준성수기시즌 1

          //$peak_date = $mangement_array['peak_season_whether'] == 'Y' ? peak_date_check($startDate) : '0';
          $peak_date = peak_date_check($startDate,$rows['user_id']);
        //   if($wr_test){
        //     $userid = $rows['user_id'];
        //     // print_r($mangement_array);
        //     echo "
        //     userid > $userid <br>
        //     peak_date > $peak_date <br>

        //     ";
        //   }
          $semi_peak_date = $mangement_array['semi_peak_season_whether'] == 'Y' ? semi_peak_date_check($startDate) : '0';
        //   $holiday = holiday_date_check($startDate,$mangement_array['weekend_fee_set']); // 공휴일 1
          $holiday = holiday_date_check($startDate,$mangement_array['weekend_fee_set']); // 공휴일 1
        //   if($wr_test){
        //     echo " holiday > $holiday <br>";
        //   }
          if(!$holiday){ //공휴일이아니라면
            $holiday_prv = holiday_prv_date_check($startDate,$mangement_array['weekend_fee_set']); // 공휴일 1
          }
          if($guestroom_type == '2'){ //당일상품일경우.. 일요일도 주말로 변경...
            // $weekDay_sub = weekday_date_check_sub($startDate,$mangement_array['weekend_fee_set']); // 주말여부 1
               $weekDay_sub = weekday_date_check_sub($startDate,$rows['user_id']); // 주말여부 1

          }
          else{
            // $weekDay = weekday_date_check($startDate,$mangement_array['weekend_fee_set']); // 주말여부 1
               $weekDay = weekday_date_check($startDate,$rows['user_id']); // 주말여부 1
          }
//           echo "
// holiday > $holiday <br>
// weekDay > $weekDay <br>
// weekDay_sub > $weekDay_sub <br>
// holiday_prv > $holiday_prv <Br>
//           ";
          //예약가능여부..
          //
          if($peak_date) { //성수기
            if($holiday) { //공휴일
                // $pType = "ph";
                $room_fee += $rows['guestroom_peak_season_fee_holiday'];
            }
            else if($holiday_prv){ //공휴일전날 -> 공휴일요금.
                // $pType = "phr";
                $room_fee += $rows['guestroom_peak_season_fee_holiday'];
            }
            else{ //비공휴일
              if($weekDay) { //주말
                // $pType = "pwd";
                $room_fee += $rows['guestroom_peak_season_fee_weekend'];
              }
              else if($weekDay_sub){ //공휴일전날 -> 공휴일요금.
                  $room_fee += $rows['guestroom_peak_season_fee_weekend'];
              }
              else{ //평일
                $room_fee += $rows['guestroom_peak_season_fee_weekday'];
              }
            }

          }
          else if($semi_peak_date){ //준성수기
            if($holiday) { //공휴일
               $room_fee += $rows['guestroom_semi_peak_season_fee_holiday'];
            }
            else if($holiday_prv){ //공휴일전날 -> 공휴일요금.
                $room_fee += $rows['guestroom_semi_peak_season_fee_holiday'];
            }
            else{ //비공휴일
              if($weekDay) { //주말
               $room_fee += $rows['guestroom_semi_peak_season_fee_weekend'];
              }
              else if($weekDay_sub){ //공휴일전날 -> 공휴일요금.
                  $room_fee += $rows['guestroom_semi_peak_season_fee_weekend'];
              }
              else{
               $room_fee += $rows['guestroom_semi_peak_season_fee_weekday'];
              }
            }
          }
          else{  //비수기
            if($holiday) { //공휴일
                $room_fee += $rows['guestroom_low_season_fee_holiday'];
            }
            else if($holiday_prv){ //공휴일전날 -> 공휴일요금.
                $room_fee += $rows['guestroom_low_season_fee_holiday'];
            }
            else{ //비공휴일
              if($weekDay) { //주말
                $room_fee += $rows['guestroom_low_season_fee_weekend'];
              }
              else if($weekDay_sub){ //공휴일전날 -> 공휴일요금.
                  $room_fee += $rows['guestroom_low_season_fee_weekend'];
              }
              else{ //평일
                (int)$room_fee += $rows['guestroom_low_season_fee_weekday'];
              }
            }
          }
          //예약여부 확인...
         $reserve_possible = reserve_possible($startDate,$rows['guestroom_code']);
        //  if($wr_test){
        //     echo "
        //     reserve_possible > $reserve_possible <br>
        //     ";
        //  }
         if($reserve_possible > '0') {
           $reserve_possible_value = "Y";
         }

         $license_array = array();
         $driver_license_exp = explode(",",$rows['driver_license']) ;
         for($ii = 0; $ii< sizeof($driver_license_exp) ; $ii++){
             if($driver_license_exp[$ii] != 'N'){
                array_push($license_array,$driver_license_exp[$ii]);
             }
         }
          $driver_license = implode(",",$license_array);
        //   if($wr_test){
        //  print_r($license_array);
        //   echo "
        //   startDate > $startDate <br>
        //   peak_date > $peak_date <br>
        //   semi_peak_date > $semi_peak_date <br>
        //   holiday > $holiday <br>
        //   weekDay > $weekDay <br>
        //   room_fee > $room_fee <br>
        //   reserve_possible > $reserve_possible <br>
        //   reserve_possible_value > $reserve_possible_value <br>
        //   =====================================================<br>
        //   ";
        //   }
    }
    if($reserve_possible == '0'){
    $arrData = array(
              'user_id' => $rows['user_id'],
              'guestroom_code' => $rows['guestroom_code'],
              'guestroom_name' => $rows['guestroom_name'],
              'guestroom_personnel' => $rows['guestroom_personnel'],
              'guestroom_max_personnel' => $rows['guestroom_max_personnel'],
              'guestroom_extra_charge' => $rows['guestroom_extra_charge'],
              'guestroom_low_season_fee_weekday' => $rows['guestroom_low_season_fee_weekday'],
              'guestroom_low_season_fee_weekend' => $rows['guestroom_low_season_fee_weekend'],
              'guestroom_low_season_fee_holiday' => $rows['guestroom_low_season_fee_holiday'],
              'guestroom_peak_season_fee_weekday' => $rows['guestroom_peak_season_fee_weekday'],
              'guestroom_peak_season_fee_weekend' => $rows['guestroom_peak_season_fee_weekend'],
              'guestroom_peak_season_fee_holiday' => $rows['guestroom_peak_season_fee_holiday'],
              'guestroom_semi_peak_season_fee_weekday' => $rows['guestroom_semi_peak_season_fee_weekday'],
              'guestroom_semi_peak_season_fee_weekend' => $rows['guestroom_semi_peak_season_fee_weekend'],
              'guestroom_semi_peak_season_fee_holiday' => $rows['guestroom_semi_peak_season_fee_holiday'],
              'guestroom_use_hour' => $rows['guestroom_use_hour'],
              'room_fee' => $room_fee,
              'guestroom_image_name' => $rows['guestroom_image_name'],
              'reserve_possible_value' => $reserve_possible_value,
              'reserve_interval_day' => $dateintval,
              'guestroom_intro' => $rows['guestroom_intro'],
              'address' => $rows['address'],
              'driver_license' => $driver_license,
              'delivery_able' => $rows['delivery_able'],
              'pet_able' => $rows['pet_able'],
              'driver_age' => $rows['driver_age'],
              'driver_carrer' => $rows['driver_carrer'],
              'guestroom_content' => $rows['guestroom_content'],
              'dateintval' => $dateintval,
              'immediately_reserve' => $rows['immediately_reserve'],
              'discount_1' => $rows['discount_1'],
              'discount_2' => $rows['discount_2'],
              'car_parking_able' => $rows['car_parking_able'],
              'com_name' => $rows['com_name'],
              'latitude' => $rows['latitude'],
              'longitude' => $rows['longitude'],

               );
            }
             array_push($room_info_array, $arrData);
            } //get_boption_check 끝
        } // get_area_check 끝
    } //minimum_reservation_day 끝
  }
    return $room_info_array;
}

function get_reserve_confirm_data($rname,$rphone) { //예약정보
  global $GUESTROOM_RESERVATION_TB,$SITENAME;
  $sql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
          WHERE guestroom_reserve_user_name = '".$rname."'
          AND guestroom_reserve_user_phone = '".$rphone."'
          ";
  $rows = sql_fetch($sql);
  return $rows;
}

function get_reserve_confirm_detail_data($guestroom_reserve_code) { //예약정보
    global $GUESTROOM_RESERVATION_TB,$SITENAME;
    $sql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
            WHERE guestroom_reserve_code = '".$guestroom_reserve_code."'
            ";
    $rows = sql_fetch($sql);
    return $rows;
  }

function get_wzp_pension_info(){
  global $G5_WZP_PENSION_TB;

  $sql = "SELECT * FROM $G5_WZP_PENSION_TB
          WHERE pn_ix = '1'
          ";
  $rows = sql_fetch($sql);
  return $rows;
}

function get_image_array($get_guestroom_code) {
    global $GUESTROOM_IMAGE_INFO_TB,$SITENAME;
    $sql = "SELECT *
            FROM $GUESTROOM_IMAGE_INFO_TB
            WHERE guestroom_code = '".$get_guestroom_code."'
            ";
    //         echo "
    // $sql
    //         ";
        $result = sql_query($sql);
        $image_info_array = array();
        while ($rows = sql_fetch_array($result)) {
          $arrData = array(
                    'seq' => $rows['seq'],
                    'guestroom_code' => $rows['guestroom_code'],
                    'guestroom_image_name' => $rows['guestroom_image_name'],
          );
          array_push($image_info_array, $arrData);
        }
        return $image_info_array;
    }

    function get_area_client(){
        global $AREA_INFO_TB,$SITENAME;
        $sql = " SELECT *	FROM $AREA_INFO_TB
                 WHERE area_del_whether = 'N'
                 ";
                //  echo "
                //  sql > $sql <br>
                //  ";
        $result = sql_query($sql);
        $area_info_array = array();
          while ($rows = sql_fetch_array($result)) {
            $arrData = array(
                      'user_id' => $rows['user_id'],
                      'area_code' => $rows['area_code'],
                      'area_name' => $rows['area_name'],
              );
            array_push($area_info_array, $arrData);
          }
          return $area_info_array;
      }

      function get_option_client($option_type) {
        global $OPTION_INFO_TB,$SITENAME;
        $sql = " SELECT *	FROM $OPTION_INFO_TB
                 WHERE
                --  AND user_id = '".$SITENAME."'
                 option_type = '".$option_type."'
                 AND option_del_whether = 'N'
                 ";
        $result = sql_query($sql);
        $option_info_array = array();
          while ($rows = sql_fetch_array($result)) {
            $arrData = array(
                      'user_id' => $rows['user_id'],
                      'option_code' => $rows['option_code'],
                      'option_name' => $rows['option_name'],
                      'option_type' => $rows['option_type'],
                      'option_fee' => $rows['option_fee'],
              );
            array_push($option_info_array, $arrData);
          }
          return $option_info_array;
       }

       function get_reserve_data_client($guestroom_reserve_code) { //객실예약정보
        global $GUESTROOM_RESERVATION_TB,$SITENAME;
        $sql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
                WHERE guestroom_reserve_code = '$guestroom_reserve_code'
                ";
        $rows = sql_fetch($sql);
        return $rows;
      }

      function get_option_data_client($guestroom_reserve_code) { //옵션주문정보
        global $OPTION_RESERVATION_INFO_TB,$SITENAME;
        $sql = "SELECT * FROM $OPTION_RESERVATION_INFO_TB
                WHERE guestroom_reserve_code = '$guestroom_reserve_code'
                ";
        $result = sql_query($sql);
            $option_data_array = array();
            while ($rows = sql_fetch_array($result)) {
              $arrData = array(
                    'user_id' => $rows['user_id'],
                    'guestroom_reserve_code' => $rows['guestroom_reserve_code'],
                    'option_code' => $rows['option_code'],
                    'option_name' => $rows['option_name'],
                    'option_amount' => $rows['option_amount'],
                    'option_fee' => $rows['option_fee'],
               );
              array_push($option_data_array, $arrData);
          }
            return $option_data_array;
      }

      function get_host_info($user_id){
        global $SALES_MEMBERS_TB;
        $sql = "SELECT *
                FROM $SALES_MEMBERS_TB
                WHERE user_id = '$user_id'
                AND approve = 'Y'
               ";
        $rows = sql_fetch($sql);
        return $rows;
      }
?>
