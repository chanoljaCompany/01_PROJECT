<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/client/top_client.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";

$GUESTROOM_RESERVATION_VIEW_TB = "guestroom_reservation_view";
$GUESTROOM_RESERVATION_CART_TB = "guestroom_reservation_cart";
data_init($GUESTROOM_RESERVATION_CART_TB,$session_id_client); //cart테이블 기존내용 삭제.
data_init($GUESTROOM_RESERVATION_VIEW_TB,$session_id_client); //view테이블 기존내용 삭제.
echo "
session_id_client >>> $session_id_client <br>
";
//---- 오늘 날짜
$todate = date("Y-m-d");
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
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
$mangement_array = mangement_array(); //pension_management_reserve 예약 기본 정보 설정
$get_guestroom_code = "";
$room_info_array = room_info_array($get_guestroom_code); // guestroom_info 객실정보
if($mangement_array['peak_season_whether'] == 'Y'){
    $peak_data_array = peak_data_array($year,$month,"");
}
if($mangement_array['semi_peak_season_whether'] == 'Y'){
    $semi_peak_data_array = peak_data_array($year,$month,"semi");
}
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
</style>
<body id="manage">
<div id="admin_content" >
	<div id="container">
		<section id="wrapper">
			<article id="contentArea">
<div class="clear"></div>
<form name="client_reserve_input" method="post" enctype="multipart/form-data" action="./index.php">
	<input type="hidden" name="peak_season_whether" id="peak_season_whether" value="<?=$mangement_array['peak_season_whether']?>">
  <input type="hidden" name="semi_peak_season_whether" id="semi_peak_season_whether"  value="<?=$mangement_array['semi_peak_season_whether']?>">
  <input type="hidden" name="weekend_whether" id="weekend_whether"  value="<?=$mangement_array['weekend_whether']?>">

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
                  <a href=<?php echo 'index.php?year='.$preyear.'&month='.$month . '&day=1&top_menu_id=4001&left_menu_id=007'; ?>>◀◀</a>
              </td>
              <td>
                  <a href=<?php echo 'index.php?year='.$prev_year.'&month='.$prev_month . '&day=1&top_menu_id=4001&left_menu_id=007'; ?>>◀</a>
              </td>
              <td height="50" bgcolor="#FFFFFF" colspan="3">
                  <a href=<?php echo 'index.php?year=' . $thisyear . '&month=' . $thismonth . '&day=1&top_menu_id=4001&left_menu_id=007'; ?>>
                  <?php echo "&nbsp;&nbsp;" . $year . '년 ' . $month . '월 ' . "&nbsp;&nbsp;"; ?></a>
              </td>
              <td>
                  <a href=<?php echo 'index.php?year='.$next_year.'&month='.$next_month.'&day=1&top_menu_id=4001&left_menu_id=007'; ?>>▶</a>
              </td>
              <td>
                  <a href=<?php echo 'index.php?year='.$nextyear.'&month='.$month.'&day=1&top_menu_id=4001&left_menu_id=007'; ?>>▶▶</a>
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
              $day=1;
              for($i=1; $i <= $total_week; $i++){?>
            <tr>
              <?php
              for ($j = 0; $j < 7; $j++) {
                  $reserve_date = get_date($year,$month,$day);
                  $yoil = get_weekend($reserve_date,$mangement_array['weekend_setting_start'],$mangement_array['weekend_setting_end']);
                  $dayArr = explode("^",get_holiday($year,$month,$day));
                  $holiday = $dayArr['0'];
                  $dayname = $dayArr['1'];
                  $holidayPrvday = $dayArr['3'];
                  if($holiday == '1') { //공휴일..
                      $dayname = "공휴일";
                  }else{
                    if($yoil == '0'){
                      $dayname = "평일";
                    }else{
                      $dayname = "주말";
                    }
                  }
                  echo '<td height="30" valign="top">';
                  if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))) {
                      if ($j == 0 || $holiday == '1' || $yoil == '1') {
                          // 9. $j가 0이면 일요일이므로 빨간색
                          $style = "holy";
                      } else if ($j == 6) {
                          // 10. $j가 0이면 토요일이므로 파란색
                          $style = "blue";
                      } else {
                          // 11. 그외는 평일이므로 검정색
                          $style = "black";
                      }
                      $guestroom_reserve_date = get_date_dash($year,$month,$day);
                      $peakdaycheck = get_peakday_search($peak_data_array,$guestroom_reserve_date,"");
                      $semi_peakdaycheck = get_peakday_search($semi_peak_data_array,$guestroom_reserve_date,"semi");
                      // $semi_peakdaycheck = get_peakday($guestroom_reserve_date,"semi");
                      if($peakdaycheck == '0' && $semi_peakdaycheck == '0')  $peakdaycheck_str = '비수기';
                      if($peakdaycheck == '1')  $peakdaycheck_str = '성수기';
                      if($semi_peakdaycheck == '1')  $peakdaycheck_str = '준성수기';
                      if($guestroom_reserve_date >= $todate){
                    ?>
                        <table class="tbl_col tbl_col2">
                        	<tr>
                        		<td style="width:20%" valign="center"><font class='<?=$style?>'><?=$day?></font></td>
                            <td style="width:80%" colspan="2"><?=$peakdaycheck_str?><?=$dayname?></td>
                        	</tr>
                          <?
                          // while ($rows = mysqli_fetch_array($result)) {
                          foreach ($room_info_array as $key=>$value) {
                            $status_str ="";
                            $disabled_str = "";
                            $sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB WHERE pension_user_id = '$session_userid' AND guestroom_code = '$value[guestroom_code]' AND guestroom_reserve_date = '$guestroom_reserve_date'";
                            $result = sql_query($sql);
                            $dataNum = sql_num_rows($result);
                            $rows = mysqli_fetch_array($result);
                            if($dataNum){
                              if($rows['guestroom_reserve_status'] == '0'){
                                $status_str = "<span class='sopt checkout'>가</span>";
                                $disabled_str = "";
                              }else if($rows['guestroom_reserve_status'] == '1' || $rows['guestroom_reserve_status'] == '3' || $rows['guestroom_reserve_status'] == '5'  || $rows['guestroom_reserve_status'] == '7'){/*예약대기,결제대기,미결제를 대기상태로 표기*/
                                $status_str = "<span class='sopt msale'>대</span>";
                                $disabled_str = "disabled";
                              }else if($rows['guestroom_reserve_status'] == '2' || $rows['guestroom_reserve_status'] == '4'){
                                /*예약완료,결제완료를 대기상태로 표기*/
                                $status_str = "<span class='sopt noint'>완</span>";
                                $disabled_str = "disabled";
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
                            $guestroom_fee = guestroom_fee_func($room_info_array,$mangement_array,$guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday);
                          ?>
                            <tr height="5px">
                              <td><?=$status_str?></td>
                          		<td><input type="checkbox" <?=$disabled_str?> class="guestroom_code" name="guestroom_code[]" value="<?=$guestroom_reserve_date?>:<?=$value['guestroom_code']?>"><?=$value['guestroom_name']?></td>
                              <td><?=$guestroom_fee?></td>
                          	</tr>
                          <?}?>
                        </table>
                      <?
                    }else{
                      ?>
                      <table class="tbl_col tbl_col2">
                        <tr>
                          <td style="width:20%" valign="center"><font class='<?=$style?>'><?=$day?></font></td>
                          <td style="width:80%" colspan="2"><?=$peakdaycheck_str?><?=$dayname?></td>
                        </tr>
                          <tr>
                            <td colspan="3">예약종료</td>
                          </tr>
                        </table>
                      <?
                      }
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
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="client_reserve_input" value="예약"></span>
	</div>
</form>
	</article>
</section>
	</div>
</div>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$('#client_reserve_input').click(function(){
    var guestroom_code = checkboxArr("guestroom_code");
    if(guestroom_code <= '0'){ warning('예약일자를 선택하세요','guestroom_code'); return false; }
							 var sh = document.client_reserve_input;
							 sh.action = "reservation_calendar_client_view.php";
							 sh.submit();
							// }
	 });

   function checkboxArr(ObjVal){
 		var send_cnt = 0;
		var true_cnt = 0;
 		var boxClass = $("."+ObjVal);
 		var boxId = "#"+ObjVal+"_array";
 		var chbox_array = Array();
 		for(i = 0; i < boxClass.length ; i++) {
 				if (boxClass[i].checked == true){
 					chbox_array[send_cnt] = boxClass[i].value;
 					send_cnt++;
					true_cnt++;
 				}else{
 					chbox_array[send_cnt] = 'N';
 					send_cnt++;
 				}
 			}
 			// $(boxId).val(chbox_array);
 			return true_cnt;
 	}

</script>
</body>
</html>
