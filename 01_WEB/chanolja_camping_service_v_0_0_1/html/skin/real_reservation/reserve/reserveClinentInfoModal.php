<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pension.lib.php";

$reserve_date = $_REQUEST["reserve_date"];
$peak_season_whether = $_REQUEST["peak_season_whether"];
$semi_peak_season_whether = $_REQUEST["semi_peak_season_whether"];
$weekend_whether = $_REQUEST["weekend_whether"];
echo "
reserve_date : $reserve_date <br>
peak_season_whether : $peak_season_whether <br>
semi_peak_season_whether : $semi_peak_season_whether <br>
weekend_whether : $weekend_whether <br>
";
$todate = date("Ymd");
$dateString = date("Y-m-d", strtotime($reserve_date));
$GUESTROOM_INFO_TB = "guestroom_info";
$GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";
// $sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE pension_user_id = '$session_userid'";
// echo "
// sql >>> $sql <br>
// ";
// $result = sql_query($sql);
//   $room_info_array = array();
//   while ($rows = mysqli_fetch_array($result)) {
//     $arrData = array(
//               'guestroom_code' => $rows['guestroom_code'],
//               'guestroom_name' => $rows['guestroom_name'],
//               'guestroom_personnel' => $rows['guestroom_personnel'],
//               'guestroom_max_personnel' => $rows['guestroom_max_personnel'],
//                );
//     array_push($room_info_array, $arrData);
//   }
$room_info_array = room_info();

?>
               <table class="table table-bordered table-hover table-striped">
                 <thead>
                 <tbody>
                   <tr>
                     <th colspan="9" class="text-right">예약조회일자 : <?=$dateString?></th>
                   </tr>
                   <tr>
                     <th>NO</th>
                     <th>객실명</th>
                      <th>상태</th>
                     <th>기준인원</th>
                     <th>최대인원</th>
                     <th>예약인원</th>
                     <th>금액</th>
                     <th>객실정보</th>
                   </tr>
                   <?
                   // while ($rows = mysqli_fetch_array($result)) {
                   $i="1";
                   foreach ($room_info_array as $key=>$value) {
                     $sql = "SELECT *	FROM $GUESTROOM_RESERVATION_INFO_TB WHERE pension_user_id = '$session_userid' AND guestroom_code = '$value[guestroom_code]' AND guestroom_reserve_date = '$dateString' ";
                     $result = sql_query($sql);
                     $rows = mysqli_fetch_array($result);
                     $guestroom_fee = get_guestroom_fee($GUESTROOM_INFO_TB,$value['guestroom_code'],$dateString,$peak_season_whether,$semi_peak_season_whether,$weekend_whether);
                     if($rows['guestroom_reserve_status'] == '' || $rows['guestroom_reserve_status'] == '0'){
                       $guestroom_reserve_status_str = "예약가능";
                       $reserve_btn_cls = "btn-info";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '1'){
                       $guestroom_reserve_status_str = "예약대기";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '2'){
                       $guestroom_reserve_status_str = "예약완료";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '3'){
                       $guestroom_reserve_status_str = "결제대기";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '4'){
                       $guestroom_reserve_status_str = "결제완료";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '5'){
                       $guestroom_reserve_status_str = "미결제";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '6'){
                       $guestroom_reserve_status_str = "취소중";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '7'){
                       $guestroom_reserve_status_str = "취소완료";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-secondary";
                     }else if($rows['guestroom_reserve_status'] == '8'){
                       $guestroom_reserve_status_str = "방막기";
                       $reserve_btn_cls = "btn-secondary";
                       $prevent_btn_cls = "btn-warning";
                     }

                   ?>
                   <tr>
                     <td><?=$i?></td>
                     <td><?=$value['guestroom_name']?></td>
                     <td><?=$guestroom_reserve_status_str?></td>
                     <th><?=$value['guestroom_personnel']?></th>
                     <th><?=$value['guestroom_max_personnel']?></th>
                     <th><?=$rows['guestroom_reserve_user_personnel']?></th>
                     <th><?=number_format($guestroom_fee)?></th>
                     <th><? if($reserve_date >= $todate){?><button type="button" class="<?=$reserve_btn_cls?> btn-sm" onclick="go_page('direct_reserve_input','<?=$value['guestroom_code']?>','<?=$reserve_date?>','<?=$value['guestroom_name']?>','<?=$rows['guestroom_reserve_status']?>')">예약</button><?}else{?>-<?}?></th>
                     <!-- <th><? if($reserve_date >= $todate){?><button type="button" class="<?=$prevent_btn_cls?> btn-sm" onclick="go_page('prevent_room_input','<?=$value['guestroom_code']?>','<?=$reserve_date?>','<?=$value['guestroom_name']?>','<?=$rows['guestroom_reserve_status']?>')">방막기</button><?}else{?>-<?}?></th> -->
                   </tr>
                   <?$i++;}?>
                 </tbody>
                 </table>
<hr/>
