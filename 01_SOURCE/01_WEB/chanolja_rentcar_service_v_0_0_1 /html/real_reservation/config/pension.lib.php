<?
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
function view_printr($array,$arrname){
echo "============$arrname start===================";
echo "<pre>";
print_r($array);
echo "</pre>";
echo "============$arrname end===================<br><br>";
}
function view_echo($echo_val){
echo "<br>$echo_val<br>";
}
function room_info(){ //객실정보.
  global $session_userid;
  $GUESTROOM_INFO_TB = "guestroom_info";
  $sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE pension_user_id = '$session_userid'";
  $result = sql_query($sql);
    $room_info_array = array();
    while ($rows = sql_fetch_array($result)) {
      $guestroom_code = $rows['guestroom_code'];
      $arrData = array(
                'guestroom_code' => $rows['guestroom_code'],
                'guestroom_name' => $rows['guestroom_name'],
                'guestroom_personnel' => $rows['guestroom_personnel'],
                'guestroom_max_personnel' => $rows['guestroom_max_personnel'],
                 );
      array_push($room_info_array, $arrData);
    }
    return $room_info_array;
}

function get_holiday($year,$month,$day) {
  $year = intval($year);
  $month = intval($month);
  $day = intval($day);
//   echo "
// year : $year <br>
// month : $month <br>
// day : $day <br>
//   ";
  $nmonth = sprintf('%02d', $month);
  $nday = sprintf('%02d', $day);
  $nextday = date("Y-m-d", strtotime($year.$nmonth.$nday." +1 day"));
  $nextdayArr = explode("-",$nextday);
  $nyear = intval($nextdayArr['0']);
  $nmonth = intval($nextdayArr['1']);
  $nday = intval($nextdayArr['2']);
  //다음날이 공휴일인지 체크...
  $sql = "select name from holiday where year = '$nyear' and month = '$nmonth' and day = '$nday' ";
  $result = sql_query($sql);
  $next_total_count = sql_num_rows($result);


  //당일....
  $sql = "select name from holiday where year = '$year' and month = '$month' and day = '$day' ";
  $result = sql_query($sql);
  $total_count = sql_num_rows($result);

  // $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));

  if($yoil == '0' || $yoil == '6') {
     $day_name = '주말';
  }else{
     $day_name = '평일';
  }
  $return_val = $total_count."^".$day_name."^".$yoil."^".$next_total_count;

  return $return_val;
}


function get_weekend($reserve_date,$start,$end){
  //선택일자의 요일..
  $yoil = date('w', strtotime($reserve_date));
//   echo "
// <br>yoil >>> $yoil <br>
//   ";
  if($yoil == '0') $yoil = "7";
  if($yoil >= $start && $yoil <= $end){
     $yoil = "1"; //주말
  }else{
     $yoil = "0"; //평일
  }
  return $yoil;
}

function get_peakday($reserve_date,$str) { //성수기설정여부...
        global $data_array,$mangement_rows,$session_userid;
        $PENSION_MANAGEMENT_RESERVE_PEAK_DATE_TB = "pension_management_reserve_peak_date";
        $PENSION_MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB = "pension_management_reserve_semi_peak_date";
        if($str == 'semi'){
          $query_tb = $PENSION_MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB;
          $start_date = "semi_peak_season_start_date";
          $end_date = "semi_peak_season_end_date";
        }
        else{
          $query_tb = $PENSION_MANAGEMENT_RESERVE_PEAK_DATE_TB;
          $start_date = "peak_season_start_date";
          $end_date = "peak_season_end_date";
        }

        // $sql = "SELECT count(*) AS peakday_num  FROM $PENSION_MANAGEMENT_RESERVE_PEAK_DATE_TB
        //         WHERE pension_user_id = '$session_userid'
        //         AND ($peak_season_start_date LIKE '".$toyearmonth."%' OR $peak_season_end_date LIKE '".$toyearmonth."%')";

        $sql = "SELECT EXISTS (
                                SELECT *
                                FROM $query_tb
                                WHERE '$reserve_date'
                                BETWEEN $start_date
                                AND $end_date
                ) AS result";

        // $sql = " SELECT IF(COUNT(*) > 0, '1', '0') AS result
        //         FROM $query_tb
        //         WHERE (date($start_date) >= '$reserve_date'
        //         AND date($end_date) <= '$reserve_date')";
        // view_echo("get_peakday seq : $sql");
        $result = sql_query($sql);
        $rows = sql_fetch_array($result);
        // $peakday_num = $rows['peakday_num'];
        return $rows['result'];
}




function get_room_fee($guestroom_code,$guestroom_fee_col){ //객실정보.
  global $session_userid;
  $GUESTROOM_INFO_TB = "guestroom_info";
  $sql = "SELECT $guestroom_fee_col	FROM $GUESTROOM_INFO_TB WHERE pension_user_id = '$session_userid' AND guestroom_code = '$guestroom_code'";
  $result = sql_query($sql);
  $rows = sql_fetch_array($result);
  return $rows[$guestroom_fee_col];
}

function get_date($year,$month,$day){
  $reserve_year = intval($year);
  $reserve_month = sprintf('%02d', $month);
  $reserve_day = sprintf('%02d', $day);
  $result_data = $reserve_year.$reserve_month.$reserve_day;
  return $result_data;
}

function get_date_dash($year,$month,$day){
  $reserve_year = intval($year);
  $reserve_month = sprintf('%02d', $month);
  $reserve_day = sprintf('%02d', $day);
  $result_data = $reserve_year."-".$reserve_month."-".$reserve_day;
  return $result_data;
  // $reserve_year = intval($year);
  // $reserve_month = sprintf('%02d', $month);
  // $reserve_day = sprintf('%02d', $day);
  // $result_data = $reserve_year.$reserve_month.$reserve_day;
  // return $result_data;
}

function mangement_info_array(){
      global $session_userid;
      $PENSION_MANAGEMENT_TB = "pension_management";
      $sql = "SELECT * FROM
              $PENSION_MANAGEMENT_TB
              WHERE pension_user_id = '$session_userid'";
      $result = sql_query($sql);
      $mangement_info_rows = sql_fetch_array($result);
      return $mangement_info_rows;
}


function mangement_array(){
      global $session_userid;
      $PENSION_MANAGEMENT_RESERVE_TB = "pension_management_reserve";
      $sql = "SELECT * FROM
              $PENSION_MANAGEMENT_RESERVE_TB
              WHERE pension_user_id = '$session_userid'";
      $result = sql_query($sql);
      $mangement_rows = sql_fetch_array($result);
      return $mangement_rows;
}

function room_info_array($get_guestroom_code){
  global $session_userid;
  $GUESTROOM_INFO_TB = "guestroom_info";
  if($get_guestroom_code) $sub_qry = "AND guestroom_code = '".$get_guestroom_code."'";
  $sql = " SELECT *	FROM $GUESTROOM_INFO_TB
           WHERE pension_user_id = '$session_userid'
           AND post_show = 'Y'
           $sub_qry
           ";
   // echo " room_info_array >> sql >>> $sql <br>";
  $result = sql_query($sql);
    $room_info_array = array();
    while ($rows = sql_fetch_array($result)) {
      $arrData = array(
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
                'guestroom_semi_peak_season_fee_holiday' => $rows['guestroom_semi_peak_season_fee_holiday']
                 );
      array_push($room_info_array, $arrData);
    }
    return $room_info_array;
}

 function peak_data_array($year,$month,$str){
   global $session_userid;
   $toyearmonth = $year."-".sprintf('%02d', $month);

   $PENSION_MANAGEMENT_RESERVE_PEAK_DATE_TB = "pension_management_reserve_peak_date";
   $PENSION_MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB = "pension_management_reserve_semi_peak_date";
   // $month = "8";
   // $smonth = sprintf('%02d', $month);
    $data_array = array();
   if($str == 'semi'){
     $query_tb = $PENSION_MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB;
     $start_date = "semi_peak_season_start_date";
     $end_date = "semi_peak_season_end_date";
   }
   else{
     $query_tb = $PENSION_MANAGEMENT_RESERVE_PEAK_DATE_TB;
     $start_date = "peak_season_start_date";
     $end_date = "peak_season_end_date";
   }

   $sql = "SELECT * FROM $query_tb
           WHERE pension_user_id = '$session_userid'
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

function get_peakday_search($array_data,$date,$str) {
    // global $peak_data_array,$mangement_rows;
    // echo "date >>> $date <br> <br>";
    // echo "get_peakday_search <br>";
    // print_r($array_data);
      $restring = "0";
      if($array_data){
            $strIndex = array_search($date, $array_data);
            $restring = "";

            if($strIndex !== false) {
             $restring = "1";
            }else{
             $restring = "0";
            }
        }
        return $restring;
}

function guestroom_fee_func($room_info_array,$mangement_array,$guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday) {
  $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0];
  $holiday_set = explode(",",$mangement_array['weekend_fee_set'])[1];
  // echo "
  // holiday >>> $holiday <br>
  // holidayPrvday >>> $holidayPrvday <br>
  // holiday_before_set >>> $holiday_before_set <br>
  // holiday_set >>> $holiday_set <br>
  // ";

  if($peakdaycheck) { //성수기..
      $guestroom_fee_ho = "guestroom_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_peak_season_fee_weekday"; //평일
  }
  else if($semi_peakdaycheck) { //준성수기..
      $guestroom_fee_ho = "guestroom_semi_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_semi_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_semi_peak_season_fee_weekday"; //평일
  }
  else{
      $guestroom_fee_ho = "guestroom_low_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_low_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_low_season_fee_weekday"; //평일
  }

  $guestroom_fee = "";
  // if($peakdaycheck) { //성수기..
    if($holiday == '1') {   //휴일
      // echo "공휴일====== <br>";
      if($holiday_set == 'B'){ //공휴일 주말요금적용시
        // echo "공휴일 주말요금설정====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
      }else{
        // echo "공휴일 주말요금설정하지않음====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_ho];
      }
    }
    else {
        // echo "공휴일 아님====== <br>";
        if($mangement_array['weekend_whether'] == 'Y') { //주말요금사용
        // echo "주말요금설정====== <br>";
          if($j == '0' || $j == '6'){//주말
        // echo "주말..토/일요일====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
          }
          else { //평일
            // echo "평일 ====== <br>";
            $weekendStart = $mangement_array['weekend_setting_start'];
            $weekendEnd = $mangement_array['weekend_setting_end'];
            for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
              $weekendDay .= $i.",";
            }
            $weekendDay = substr($weekendDay, 0, -1);
            $weekendDayArr = explode(",",$weekendDay);
            // print_r($weekendDayArr);
            $arrIndex = array_search($j, $weekendDayArr);
            if($arrIndex !== false){ //사용자 주말설정..
            // echo "사용자 주말설정 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }else{
            // echo "사용자 주말설정 없음 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            }
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
              // echo "공휴일 전날 주말요금적용 ====== <br>";
            // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
            if($holidayPrvday == '1'){
              // echo "공휴일 전날 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }
            // else{
            //   echo "공휴일 전날 아님 ====== <br>";
            //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            // }
          }
        }
      }
        else if($mangement_array['weekend_whether'] == 'N') { //주말요금사용안함
            // echo "주말요금사용안함 ====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
                // echo "공휴일 전날 주말요금적용 ====== <br>";
                // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                if($holidayPrvday == '1'){
                    // echo "공휴일 전날 ====== <br>";
                  $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
                }
                // else{
                //   echo "공휴일 전날 아님 ====== <br>";
                //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
                // }
              }else{
                // echo "공휴일 전날 주말요금적용 안함 ====== <br>";
                $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
              }
        }
     }
  return number_format($guestroom_fee)."원";
}

function get_guestroom_fee($mangement_array,$room_info_array,$guestroom_code,$get_peakday,$get_semi_peakday,$get_holiday,$get_weekend,$holidayPrvday){
  global $session_userid;
  // 해당날짜가 휴일인지 체크..
  $guestroom_fee_col = "";
  // view_echo("guestroom_code : $guestroom_code");
  // view_echo("get_peakday : $get_peakday");
  // view_echo("get_semi_peakday : $get_semi_peakday");
  // view_echo("get_holiday : $get_holiday");
  // view_echo("get_weekend : $get_weekend");
  // view_echo("holidayPrvday : $holidayPrvday");


  if($get_peakday) { //성수기
    // view_echo("get_guestroom_fee : 성수기");
    $guestroom_fee_ho = "guestroom_peak_season_fee_holiday"; //공휴일
    $guestroom_fee_we = "guestroom_peak_season_fee_weekend"; //주말
    $guestroom_fee_wk = "guestroom_peak_season_fee_weekday"; //평일

    if($get_holiday) { // 성수기 > 공휴일
      if($get_weekend) { //성수기 >> 공휴일 >> 주말
        $holiday_set = explode(",",$mangement_array['weekend_fee_set'])['1']; //공휴일을 주말요금 적용여부
        if($holiday_set == 'B') { //성수기 >> 공휴일 >> 주말요금 적용..
          $guestroom_fee_col = "guestroom_peak_season_fee_weekend"; //공휴일 주말요금적용
        }else{
           $guestroom_fee_col = "guestroom_peak_season_fee_holiday"; //공휴일 요금적용
        }
      }
      else { //성수기 >> 공휴일 >>> 평일...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //공휴일 전일을 주말요금 적용
        if($holiday_before_set == 'A') { //성수기 >> 공휴일 >>> 공휴일 전날 평일...
          if($holidayPrvday == '1'){ //공휴일전날이 맞다면..
            $guestroom_fee_col = "guestroom_peak_season_fee_weekend"; //공휴일전일 주말요금적용
          }else{
            $guestroom_fee_col = "guestroom_peak_season_fee_weekday"; //공휴일전일 평일요금적용
          }
        }else{
          $guestroom_fee_col = "guestroom_peak_season_fee_holiday"; //공휴일 요금적용
        }
      }
    }else{ //성수기 비공휴일....
      if($get_weekend) { //성수기 주말요금..
          $guestroom_fee_col = "guestroom_peak_season_fee_weekend"; //주말
      }else { //성수기 평일요금...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //비공휴일 전일을 주말요금 적용여부.
        if($holiday_before_set == 'A') { //성수기 >> 비공휴일 전날
          if($holidayPrvday == '1'){ //공휴일전날
            $guestroom_fee_col = "guestroom_peak_season_fee_weekend"; //비공휴일전일 주말요금
          }else{
            $guestroom_fee_col = "guestroom_peak_season_fee_weekday"; //비공휴일전일 평일요금
          }
        }else{
          $guestroom_fee_col = "guestroom_peak_season_fee_weekday"; //비공휴일전일 평일 요금
        }
      }
    }
  }


  if($get_semi_peakday) { //성수기
    // view_echo("get_guestroom_fee : 준성수기");
    $guestroom_fee_ho = "guestroom_semi_peak_season_fee_holiday"; //공휴일
    $guestroom_fee_we = "guestroom_semi_peak_season_fee_weekend"; //주말
    $guestroom_fee_wk = "guestroom_semi_peak_season_fee_weekday"; //평일

    if($get_holiday) { //공휴일
      if($get_weekend) { //준성수기 >> 공휴일 >> 주말..
        $holiday_set = explode(",",$mangement_array['weekend_fee_set'])['1']; //공휴일을 주말요금 적용
        if($holiday_set == 'B') { //성수기 >> 공휴일 >> 주말요금 적용..
          $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekend"; //공휴일 주말요금적용
        }else{
           $guestroom_fee_col = "guestroom_semi_peak_season_fee_holiday"; //공휴일 요금적용
        }
      }
      else { //성수기 >> 공휴일 >>> 평일...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //공휴일 전일을 주말요금 적용
        if($holiday_before_set == 'A') { //성수기 >> 공휴일 >>> 공휴일 전날 평일...
          if($holidayPrvday == '1'){ //공휴일전날이 맞다면..
            $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekend"; //공휴일전일 주말요금적용
          }else{
            $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekday"; //공휴일전일 주말요금적용
          }
        }else{
          $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekday"; //공휴일 요금적용
        }
      }
    }else{ //성수기 비공휴일....
      if($get_weekend) { //성수기 주말요금..
          $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekend"; //주말
      }else { //성수기 평일요금...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //공휴일 전일을 주말요금 적용
        if($holiday_before_set == 'A') { //성수기 >> 공휴일 >>> 공휴일 전날 평일...
          if($holidayPrvday == '1'){ //공휴일전날이 맞다면..
            $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekend"; //공휴일전일 주말요금적용
          }else{
            $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekday"; //공휴일전일 주말요금적용
          }
        }else{
          $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //비공휴일 전일을 주말요금 적용여부.
          if($holiday_before_set == 'A') { //성수기 >> 비공휴일 전날
            if($holidayPrvday == '1'){ //공휴일전날
              $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekend"; //비공휴일전일 주말요금
            }else{
              $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekday"; //비공휴일전일 평일요금
            }
          }else{
            $guestroom_fee_col = "guestroom_semi_peak_season_fee_weekday"; //비공휴일전일 평일 요금
          }
        }
      }
    }
  }

  if(!$get_peakday && !$get_semi_peakday) { //비수기..
    // view_echo("get_guestroom_fee : 비수기");
    $guestroom_fee_ho = "guestroom_low_season_fee_holiday"; //공휴일
    $guestroom_fee_we = "guestroom_low_season_fee_weekend"; //주말
    $guestroom_fee_wk = "guestroom_low_season_fee_weekday"; //평일

    if($get_holiday) { //공휴일
      if($get_weekend) { //비수기 >> 공휴일 >> 주말..
        $holiday_set = explode(",",$mangement_array['weekend_fee_set'])['1']; //공휴일을 주말요금 적용
        if($holiday_set == 'B') { //비수기 >> 공휴일 >> 주말요금 적용..
          $guestroom_fee_col = "guestroom_low_season_fee_weekend"; //공휴일 주말요금적용
        }else{
           $guestroom_fee_col = "guestroom_low_season_fee_holiday"; //공휴일휴일요금적용
        }
      }
      else { //비수기 >> 공휴일 >>> 평일...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //공휴일 전일을 주말요금 적용
        if($holiday_before_set == 'A') { //비수기 >> 공휴일 >>> 공휴일 전날 평일...
          $holidayPrvday = $dayArr['3'];
          if($holidayPrvday == '1'){ //공휴일전날이 맞다면..
            $guestroom_fee_col = "guestroom_low_season_fee_weekend"; //공휴일전일 주말요금적용
          }else{
            $guestroom_fee_col = "guestroom_low_season_fee_holiday"; //공휴일전일 휴일요금적용
          }
        }else{
          $guestroom_fee_col = "guestroom_low_season_fee_holiday"; //공휴일 요금적용
        }
      }
    }else{ //비수기 비공휴일
      if($get_weekend) { //비수기 주말요금..
          $guestroom_fee_col = "guestroom_low_season_fee_weekend"; //주말
      }else { //비수기 평일요금...
        $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'])[0]; //비공휴일 전일을 주말요금 적용여부.
        if($holiday_before_set == 'A') { //비수기 >> 비공휴일 전날
          if($holidayPrvday == '1'){ //공휴일전날
            $guestroom_fee_col = "guestroom_low_season_fee_weekend"; //비공휴일전일 주말요금
          }else{
            $guestroom_fee_col = "guestroom_low_season_fee_weekday"; //비공휴일전일 평일요금
          }
        }else{
          $guestroom_fee_col = "guestroom_low_season_fee_weekday"; //비공휴일전일 평일 요금
        }
      }
    }
  }
  // view_echo("guestroom_fee_col : $guestroom_fee_col");
  $get_guestroom_fee = get_room_fee($guestroom_code,$guestroom_fee_col);
  return $get_guestroom_fee;
}

function data_init($tableNm,$user_id) {
      global $session_userid;
      $sql = "DELETE FROM $tableNm
              WHERE pension_user_id = '$session_userid'
              AND user_id	= '$user_id'
              ";
      sql_query($sql);
}

?>
