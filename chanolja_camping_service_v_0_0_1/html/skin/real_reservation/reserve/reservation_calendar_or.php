<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";

function get_holiday($year,$month,$day){
  $year = intval($year);
  $month = intval($month);
  $day = intval($day);

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

function get_peakday($year,$month,$day){
  $year = intval($year);
  $month = intval($month);
  $day = intval($day);
  $sql = "SELECT name FROM holiday WHERE year = '$year' AND month = '$month' AND day = '$day' ";
  $result = sql_query($sql);
  $total_count = sql_num_rows($result);
  // $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));

  if($yoil == '0' || $yoil == '6') {
     $day_name = '주말';
  }else{
     $day_name = '평일';
  }
  $return_val = $total_count."^".$day_name."^".$yoil;
  return $return_val;
}


// function get_weekend($year,$month,$day){
//   $year = intval($year);
//   $month = intval($month);
//   $day = intval($day);
//   $yoil = array("일","월","화","수","목","금","토");
//   $yoil[date('w', strtotime($day))]
//   return $total_count;
// }

//---- 오늘 날짜
$todate = date("Ymd");
$thisyear = date('Y'); // 4자리 연도
$thismonth = date('n'); // 0을 포함하지 않는 월
$today = date('j'); // 0을 포함하지 않는 일
//------ $year, $month 값이 없으면 현재 날짜
$year = isset($_GET['year']) ? $_GET['year'] : $thisyear;
$month = isset($_GET['month']) ? $_GET['month'] : $thismonth;
$day = isset($_GET['day']) ? $_GET['day'] : $today;
$prev_month = $month - 1;
$next_month = $month + 1;
$prev_year = $next_year = $year;
if ($month == 1) {
    $prev_month = 12;
    $prev_year = $year - 1;
} else if ($month == 12) {
    $next_month = 1;
    $next_year = $year + 1;
}
$preyear = $year - 1;
$nextyear = $year + 1;

$predate = date("Y-m-d", mktime(0, 0, 0, $month - 1, 1, $year));
$nextdate = date("Y-m-d", mktime(0, 0, 0, $month + 1, 1, $year));

// 1. 총일수 구하기
$max_day = date('t', mktime(0, 0, 0, $month, 1, $year)); // 해당월의 마지막 날짜
//echo '총요일수'.$max_day.'<br />';

// 2. 시작요일 구하기
$start_week = date("w", mktime(0, 0, 0, $month, 1, $year)); // 일요일 0, 토요일 6

// 3. 총 몇 주인지 구하기
$total_week = ceil(($max_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', mktime(0, 0, 0, $month, $max_day, $year));
$GUESTROOM_INFO_TB = "guestroom_info";
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$PENSION_MANAGEMENT_RESERVE_TB = "pension_management_reserve";
$sql = "SELECT * FROM
        $PENSION_MANAGEMENT_RESERVE_TB
        WHERE pension_user_id = '$session_userid'";
$result = sql_query($sql);
$mangement_rows = mysqli_fetch_array($result);
// $management_info_array = array();
  // while ($rows = mysqli_fetch_array($result)) {
  //   $manage_arrData = array(
  //             'seq' => $rows['seq'],
  //             'guestroom_name' => $rows['guestroom_name'],
  //             'guestroom_low_season_fee_weekday' => $rows['guestroom_low_season_fee_weekday'],
  //             'guestroom_low_season_fee_weekend' => $rows['guestroom_low_season_fee_weekend'],
  //             'guestroom_low_season_fee_holiday' => $rows['guestroom_low_season_fee_holiday'],
  //             'guestroom_peak_season_fee_weekday' => $rows['guestroom_peak_season_fee_weekday'],
  //             'guestroom_peak_season_fee_weekend' => $rows['guestroom_peak_season_fee_weekend'],
  //             'guestroom_peak_season_fee_holiday' => $rows['guestroom_peak_season_fee_holiday'],
  //             'guestroom_semi_peak_season_fee_weekday' => $rows['guestroom_semi_peak_season_fee_weekday'],
  //             'guestroom_semi_peak_season_fee_weekend' => $rows['guestroom_semi_peak_season_fee_weekend'],
  //             'guestroom_semi_peak_season_fee_holiday' => $rows['guestroom_semi_peak_season_fee_holiday']
  //              );
  //   array_push($management_info_array, $manage_arrData);
  // }

$sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE pension_user_id = '$session_userid'";
$result = sql_query($sql);
  $room_info_array = array();
  while ($rows = mysqli_fetch_array($result)) {
    $arrData = array(
              'guestroom_code' => $rows['guestroom_code'],
              'guestroom_name' => $rows['guestroom_name'],
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
  if($month < '10'){
    $smonth = "0".$month;
  }
  $toyearmonth = $year."-".$smonth;

  $sql = "SELECT * FROM pension_management_reserve_peak_date
          WHERE pension_user_id = '$session_userid'
          AND (peak_season_start_date LIKE '".$toyearmonth."%' OR peak_season_end_date LIKE '".$toyearmonth."%')";
  $result = sql_query($sql);
  $rows = mysqli_fetch_array($result);
//   echo "
// dataNm >>> $dataNm <br>
//   ";
  if($rows['seq']){
  $sstartday = new DateTime($rows['peak_season_start_date']);
  // $sstartday = new DateTime($rows['peak_season_start_date']);
  $sendday = new DateTime($rows['peak_season_end_date']);
  $diffday = date_diff($sstartday, $sendday);
  $diffday = $diffday->days;

  $data_array = array();
    for($i = '0' ; $i <= $diffday ; $i++) {
      $startdays = strtotime($rows['peak_season_start_date']."+$i days");
      $startdays = date("Y-m-d",$startdays);
	    $arrData = $startdays;
        array_push($data_array, $arrData);
      }
    }


    $semi_sql = "SELECT * FROM pension_management_reserve_semi_peak_date
            WHERE pension_user_id = '$session_userid'
            AND (semi_peak_season_start_date LIKE '".$toyearmonth."%' OR semi_peak_season_end_date LIKE '".$toyearmonth."%')";
    $semi_result = sql_query($semi_sql);
    $semi_rows = mysqli_fetch_array($semi_result);
    if($semi_rows['seq']){
    $mstartday = new DateTime($semi_rows['semi_peak_season_start_date']);
    // $sstartday = new DateTime($semi_rows['peak_season_start_date']);
    $mendday = new DateTime($semi_rows['semi_peak_season_end_date']);
    $sem_diffday = date_diff($mstartday, $mendday);
    // var_dump($sem_diffday);
    $sem_diffday = $sem_diffday->days;
    $semi_data_array = array();
      for($i = '0' ; $i <= $sem_diffday ; $i++) {
        $startdays = strtotime($semi_rows['semi_peak_season_start_date']."+$i days");
        $startdays = date("Y-m-d",$startdays);
        $semi_arrData = $startdays;
          array_push($semi_data_array, $semi_arrData);
        }
      }


      function peakday($date) {
          global $data_array,$mangement_rows;
          if($mangement_rows['peak_season_whether'] == 'N'){ //성수기설정여부
             $restring = "";
          }
          else if($mangement_rows['peak_season_whether'] == 'Y'){
            if($data_array){
                  // var_dump(array_search($date, $data_array));
                  $strIndex = array_search($date, $data_array);
                  // print_r($data_array);
                  $restring = "";
                  if($strIndex !== false) {
                   $restring = "성수기";
                  }else{
                   $restring = "";
                  }
              }else{
                    $restring = "";
              }
          return $restring;
        }
      }

      function semi_peakday($date){
          global $semi_data_array,$mangement_rows;
          if($mangement_rows['semi_peak_season_whether'] == 'N'){ //준성수기설정여부
             $restring = "";
          }
          else if($mangement_rows['semi_peak_season_whether'] == 'Y'){
              if($semi_data_array){
                    // var_dump(array_search($date, $data_array));
                    $strIndex = array_search($date, $semi_data_array);
                    // print_r($data_array);
                    $restring = "";
                    if($strIndex !== false) {
                     $restring = "준성수기";
                    }else{
                     $restring = "";
                    }
                }else{
                      $restring = "";
                }
            }
          return $restring;
      }

    function guestroom_fee_func($guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday){
      global $room_info_array,$mangement_rows;
      $holiday_before_set = explode(",",$mangement_rows['weekend_fee_set'])[0];
      $holiday_set = explode(",",$mangement_rows['weekend_fee_set'])[1];
      // echo "
      // holiday >>> $holiday <br>
      // holidayPrvday >>> $holidayPrvday <br>
      // holiday_before_set >>> $holiday_before_set <br>
      // holiday_set >>> $holiday_set <br>
      // ";
      $guestroom_fee = "";
      if($peakdaycheck) { //성수기..
        if($holiday == '1') {   //휴일
          if($holiday_set == 'B'){ //공휴일 주말요금적용시
            $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
          }else{
            $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_holiday'];
          }
        }
        else{
            if($mangement_rows['weekend_whether'] == 'Y') { //주말요금사용
              if($j == '0' || $j == '6'){//주말
                $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
              }
              else { //평일
                $weekendStart = $mangement_rows['weekend_setting_start'];
                $weekendEnd = $mangement_rows['weekend_setting_end'];
                for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
                  $weekendDay .= $i.",";
                }
                $weekendDay = substr($weekendDay, 0, -1);
                $weekendDayArr = explode(",",$weekendDay);
                // print_r($weekendDayArr);
                $arrIndex = array_search($j, $weekendDayArr);
                if($arrIndex !== false){ //사용자 주말설정..
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                }else{
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekday'];
                }
                if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
                // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                if($holidayPrvday == '1'){
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                }
                else{
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekday'];
                }
              }
            }
          }
            else if($mangement_rows['weekend_whether'] == 'N'){ //주말요금사용안함
                if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
                // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                if($holidayPrvday == '1'){
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                }
                else{
                  $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekday'];
                }
              }

            }

        }
  }
  else if($semi_peakdaycheck) { //준성수기
        if($holiday == '1'){   //휴일
          $guestroom_fee = $room_info_array[$key]['guestroom_semi_peak_season_fee_holiday'];
        }
        else{
          if($mangement_rows['weekend_whether'] == 'Y') { //주말요금사용
            if($j == '0' || $j == '6'){//주말
              $guestroom_fee = $room_info_array[$key]['guestroom_semi_peak_season_fee_weekend'];
            }
            else{ //주중
              $weekendStart = $mangement_rows['weekend_setting_start'];
              $weekendEnd = $mangement_rows['weekend_setting_end'];
              for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
                $weekendDay .= $i.",";
              }
              $weekendDay = substr($weekendDay, 0, -1);
              $weekendDayArr = explode(",",$weekendDay);
              // print_r($weekendDayArr);
              $arrIndex = array_search($j, $weekendDayArr);
              if($arrIndex !== false){ //사용자 주말설정..
                $guestroom_fee = $room_info_array[$key]['guestroom_semi_peak_season_fee_weekend'];
              }else{
                $guestroom_fee = $room_info_array[$key]['guestroom_semi_peak_season_fee_weekday'];
              }
            }
          }
          else if($mangement_rows['weekend_whether'] == 'N'){ //주말요금사용안함
              $guestroom_fee = $room_info_array[$key]['guestroom_semi_peak_season_fee_weekday'];
          }
        }
  }
  else { //비수기
          if($holiday == '1'){   //휴일
            if($holiday_set == 'B'){ //공휴일 주말요금적용시
              $guestroom_fee = $room_info_array[$key]['guestroom_low_season_fee_weekend'];
            }else{
              $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_holiday'];
            }
          }
          else{
            if($mangement_rows['weekend_whether'] == 'Y') { //주말요금사용
              if($j == '0' || $j == '6'){//주말
                $guestroom_fee = $room_info_array[$key]['guestroom_low_season_fee_weekend'];
              }
              else{ //주중
                $weekendStart = $mangement_rows['weekend_setting_start'];
                $weekendEnd = $mangement_rows['weekend_setting_end'];
                for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
                  $weekendDay .= $i.",";
                }
                $weekendDay = substr($weekendDay, 0, -1);
                $weekendDayArr = explode(",",$weekendDay);
                // print_r($weekendDayArr);
                $arrIndex = array_search($j, $weekendDayArr);
                if($arrIndex !== false){ //사용자 주말설정..
                  $guestroom_fee = $room_info_array[$key]['guestroom_low_season_fee_weekend'];
                }else{
                  $guestroom_fee = $room_info_array[$key]['guestroom_low_season_fee_weekday'];
                }
              }
            }
            else if($mangement_rows['weekend_whether'] == 'N'){ //주말요금사용안함
                $guestroom_fee = $room_info_array[$key]['guestroom_low_season_fee_weekday'];
            }
        }
      }
      return number_format($guestroom_fee)."원";
    }

  // print_r($data_array);
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="https://rev.yapen.co.kr/css/external/default.css?date=20201228155830" />
  <link rel="stylesheet" type="text/css" href="//rev.yapen.co.kr/css/external/set.css?20201228155830" />
			<link rel="stylesheet" type="text/css" href="//rev.yapen.co.kr/css/external/index.css?20201228155830" /> -->
<style>
    font.holy {font-family: tahoma;font-size: 20px;color: #FF6C21;}
    font.blue {font-family: tahoma;font-size: 20px;color: #0000FF;}
    font.black {font-family: tahoma;font-size: 20px;color: #000000;}
    .modal {
        text-align: center;
}

@media screen and (min-width: 768px) {
        .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
        }
}

.modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
}
    .modal-dialog.modal-fullsize {
      width: 50%;
      /* height: 100%; */
      margin: 0;
      padding: 0;
    }
    body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
  </style>
<body id="manage">
<div id="admin_content" >
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
<div class="clear"></div>
<script type="text/javascript">
var r_currency_list = new layerWindow('config@reference_currency.exe');
</script>
<form method="post" enctype="multipart/form-data" action="./index.php" target="hidden1608618704">
	<input type="hidden" name="body" value="config@multi_shop.exe">
	<div class="box_title first">
		<h2 class="title">예약달력</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">예약달력</caption>

		<tr>
			<td>
				<div id='calendar'>
          <table class="table table-bordered">
            <tr align="center" >
              <td>
                  <a href=<?php echo 'reservation_calendar.php?year='.$preyear.'&month='.$month . '&day=1&top_menu_id=4001&left_menu_id=001'; ?>>◀◀</a>
              </td>
              <td>
                  <a href=<?php echo 'reservation_calendar.php?year='.$prev_year.'&month='.$prev_month . '&day=1&top_menu_id=4001&left_menu_id=001'; ?>>◀</a>
              </td>
              <td height="50" bgcolor="#FFFFFF" colspan="3">
                  <a href=<?php echo 'reservation_calendar.php?year=' . $thisyear . '&month=' . $thismonth . '&day=1&top_menu_id=4001&left_menu_id=001'; ?>>
                  <?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
              </td>
              <td>
                  <a href=<?php echo 'reservation_calendar.php?year='.$next_year.'&month='.$next_month.'&day=1&top_menu_id=4001&left_menu_id=001'; ?>>▶</a>
              </td>
              <td>
                  <a href=<?php echo 'reservation_calendar.php?year='.$nextyear.'&month='.$month.'&day=1&top_menu_id=4001&left_menu_id=001'; ?>>▶▶</a>
              </td>
            </tr>
            <tr class="info">
              <th hight="30" width="14.2%">일</td>
              <th width="14.2%">월</th>
              <th width="14.2%">화</th>
              <th width="14.2%">수</th>
              <th width="14.2%">목</th>
              <th width="14.2%">금</th>
              <th width="14.2%">토</th>
            </tr>

            <?php
              // 5. 화면에 표시할 화면의 초기값을 1로 설정
              $day=1;

              // 6. 총 주 수에 맞춰서 세로줄 만들기
              for($i=1; $i <= $total_week; $i++){?>
            <tr>
              <?php
              // 7. 총 가로칸 만들기
              for ($j = 0; $j < 7; $j++) {

                  // 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않음
          //         echo "
          // start_week >>> $start_week <br>
          // total_week >>> $total_week <br>
          //         ";
                  $dayArr = explode("^",get_holiday($year,$month,$day));
                  $holiday = $dayArr['0'];
                  $dayname = $dayArr['1'];
                  $holidayPrvday = $dayArr['3'];
                  if($holiday == '1'){
                    if($dayname == '평일'){
                      $dayname = "공휴일";
                    }

                  }
                  $yoil = $dayArr[2];
                  echo '<td height="30" valign="top">';
                  if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
                      if ($j == 0 || $holiday == '1') {
                          // 9. $j가 0이면 일요일이므로 빨간색
                          $style = "holy";
                      } else if ($j == 6) {
                          // 10. $j가 0이면 토요일이므로 파란색
                          $style = "blue";
                      } else {
                          // 11. 그외는 평일이므로 검정색
                          $style = "black";
                      }
                      // 12. 오늘 날짜면 굵은 글씨
                      // if ($year == $thisyear && $month == $thismonth && $day == date("j")) {
                      $reserve_year = intval($year);
                      $reserve_month = sprintf('%02d', $month);
                      $reserve_day = sprintf('%02d', $day);
                      $reserve_date = $reserve_year.$reserve_month.$reserve_day;
                      $guestroom_reserve_date = $reserve_year."-".$reserve_month."-".$reserve_day;
                      $peakdaycheck = peakday($guestroom_reserve_date);
                      $semi_peakdaycheck = semi_peakday($guestroom_reserve_date);
// echo "
// holiday : $holiday <br>
// peakdaycheck : $peakdaycheck <br>
// semi_peakdaycheck : $semi_peakdaycheck <br>
// ";
                    if($peakdaycheck == '' && $semi_peakdaycheck =='') {
                        $peakdaycheck_str = '비수기';
                    }else{
                        $peakdaycheck_str = $peakdaycheck;
                    }

//                       echo "
// reserve_year >>> $reserve_year <bR>
// reserve_month >>> $reserve_month <bR>
// reserve_day >>> $reserve_day <bR>
// reserve_date >>> $reserve_date <bR>
// guestroom_reserve_date >>> $guestroom_reserve_date <bR>
//                       ";
                    // if($reserve_date >= $todate) {
                        ?>
                        <table class="tbl_col tbl_col2" data-toggle="modal" data-backdrop="static" data-whatever="<?=$reserve_date?>" staic data-target="#reserveModal" style="cursor:pointer">
                        	<tr>
                        		<td style="width:20%" valign="center"><font class='<?=$style?>'><?=$day?></font></td>
                            <td style="width:80%" colspan="2"><?=$peakdaycheck_str?><?=$semi_peakdaycheck?> <?=$dayname?></td>
                        	</tr>
                          <?
                          // while ($rows = mysqli_fetch_array($result)) {
                          foreach ($room_info_array as $key=>$value) {
                            $status_str ="";
                            $sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB WHERE pension_user_id = '$session_userid' AND guestroom_code = '$value[guestroom_code]' AND guestroom_reserve_date = '$guestroom_reserve_date' AND post_show = 'Y'";
                            $result = sql_query($sql);
                            $dataNum = sql_num_rows($result);
                            $rows = mysqli_fetch_array($result);
                            if($dataNum){
                              if($rows['guestroom_reserve_status'] == '0'){
                                $status_str = "<span class='sopt checkout'>가</span>";
                              }else if($rows['guestroom_reserve_status'] == '1' || $rows['guestroom_reserve_status'] == '3' || $rows['guestroom_reserve_status'] == '5'  || $rows['guestroom_reserve_status'] == '7'){/*예약대기,결제대기,미결제를 대기상태로 표기*/
                                $status_str = "<span class='sopt msale'>대</span>";
                              }else if($rows['guestroom_reserve_status'] == '2' || $rows['guestroom_reserve_status'] == '4'){
                                /*예약완료,결제완료를 대기상태로 표기*/
                                $status_str = "<span class='sopt noint'>완</span>";
                              }else if($rows['guestroom_reserve_status'] == '6'){
                                /*취소중을 판매대기상태로 표기*/
                                $status_str = "<span class='sopt smartstore'>판</span>";
                              }else if($rows['guestroom_reserve_status'] == '8'){
                                /*취소중을 판매대기상태로 표기*/
                                $status_str = "<span class='sopt noint'>막</span>";
                              }
                            }else{
                              $status_str = "<span class='sopt checkout'>가</span>";
                            }
                            $guestroom_fee = guestroom_fee_func($guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday);
                          ?>
                          <tr height="5px">
                            <td><?=$status_str?></td>
                        		<td><?=$value['guestroom_name']?></td>
                            <td><?=$guestroom_fee?></td>
                        	</tr>
                          <?}?>
                        </table>
                      <?
                    // }else{
                      ?>
                        <!-- <table class="tbl_col tbl_col2" data-toggle="modal" data-backdrop="static" data-whatever="<?=$reserve_date?>" staic data-target="#reserveModal" style="cursor:pointer">
                          <tr>
                            <td style="width:20%" valign="center"><font class='<?=$style?>'><?=$day?></font></td>
                            <td style="width:80%" colspan="2"></td>
                          </tr>
                          <tr>
                            <td colspan="3">종료</td>
                          </tr>
                        </table> -->
                      <?
                      // }
                      $day++;
                  }
                  echo '</td>';
              }
           ?>
            </tr>
            <?php } ?>
          </table>

        </div>
			</td>
		</tr>
	</table>
	<!-- <div class="box_bottom">
		<span class="box_btn blue"><input type="submit" value="확인"></span>
	</div> -->
</form>
	</article>
</section>
		<?
		include "$_SERVER[DOCUMENT_ROOT]/pension_prj/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#reserveModal').on('show.bs.modal', function (event) { // adimgFileModal 윈도우가 오픈할때 아래의 옵션을 적용
    var button = $(event.relatedTarget); // 모달 윈도우를 오픈하는 버튼
    var reserve_date = button.data('whatever'); // Extract info from data-* attributes
    var modal = $(this);
    console.log('reserve_date ' + reserve_date);
    $.ajax({
      url:"reserveInfoModal.php?reserve_date="+reserve_date,
      cache:false,
      success:function(result){
      $("#reserveInfoModalBody").html(result);
    }});
   });
	});

	function go_page(division,val_1,val_2,val_3,val_4){ //페이지구분,객실고유번호or객실예약번호,날짜,방이름,예약상태
    // alert('go function');
    if(division == 'delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"guestroom_write_action.php?top_menu_id=4001&left_menu_id=003&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4,
					     cache:false,
					        success:function(result){
					             // alert(result);
					           if(result == 'ok'){
					              alert('처리하였습니다.');
											 location.reload();
					            }else{
					              alert('처리에러.');
					        }
					    }});
					 }
		}else if(division == 'direct_reserve_input'){
      if(val_4 != '0' && val_4 != ''){
        alert('예약이 불가능한 상태입니다.');
        return false;
      }
      var result = confirm("직접등록 예약을 하시겠습니까?");
       if(result ){ //확인 클릭 시
        location.href="./guestroom_direct_write_form.php?top_menu_id=4001&left_menu_id=004&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4;
       }
		}else if(division == 'prevent_room_input'){
      if(val_4 != '0' && val_4 != '' && val_4 != '8'){
        alert('방막기가 불가능한 상태입니다.');
        return false;
      }
      if(val_4 == '8'){
        var prevent_status = "1"; //방막기 해제 코드
        var result = confirm("방막기상태입니다. 방막기를 취소 하시겠습니까?");
         if(result){ //확인 클릭 시
           $.ajax({
             url:"reserve_write_action.php?top_menu_id=<?=$top_menu_id?>&left_menu_id=<?=$left_menu_id?>&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4+"&prevent_status="+prevent_status,
             cache:false,
                success:function(result){
                     // alert(result);
                   if(result == 'ok'){
                      alert('처리하였습니다.');
                      location.reload();
                    }else{
                      alert('처리에러.');
                }
            }});
         }
      }else{
      var prevent_status = "0"; //방막기 해제 코드
      var result = confirm("방막기를 활성화 하시겠습니까?");
       if(result ){ //확인 클릭 시
         $.ajax({
           url:"reserve_write_action.php?top_menu_id=4001&left_menu_id=003&division="+division+"&val_1="+val_1+"&val_2="+val_2+"&val_3="+val_3+"&val_4="+val_4+"&prevent_status="+prevent_status,
           cache:false,
              success:function(result){
                   // alert(result);
                 if(result == 'ok'){
                    alert('처리하였습니다.');
                   location.reload();
                  }else{
                    alert('처리에러.');
              }
          }});
       }
     }
		}else{
			//location.href="./guestroom_write_form.php?menu_id=2001&division="+division+"&val_1="+val_1;
		}
	}
</script>
<!-- Modal -->
<div class="modal fade" id="reserveModal" tabindex="-1" role="dialog" aria-labelledby="reserveModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullsize" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="reserveModalLabel">예약정보</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="reserveInfoModalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
        <!-- <button type="button" class="btn btn-primary">수정</button> -->
      </div>
    </div>
  </div>
</div>

</body>
</html>
