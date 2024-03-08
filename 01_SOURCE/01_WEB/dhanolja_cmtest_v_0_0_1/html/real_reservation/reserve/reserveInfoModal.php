<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

$reserve_date = $_REQUEST["reserve_date"];
$todate = date("Ymd");

if($_SESSION['session_user_level'] != 'A'){
    $sub_qry = "AND A.user_id = '".$_SESSION['session_user_id']."'";
}

$dateString = date("Y-m-d", strtotime($reserve_date));
// echo "
// reserve_date >>> $reserve_date <br>
// todate >>> $todate <br>
// dateString >>> $dateString <br>
// ";
$sql = "SELECT B.* ,C.*
        FROM $GUESTROOM_RESERVATION_INFO_TB AS A
        INNER JOIN $GUESTROOM_RESERVATION_TB AS B
        ON B.guestroom_reserve_code = A.guestroom_reserve_code
        INNER JOIN $GUESTROOM_INFO_TB AS C
        ON C.guestroom_code = A.guestroom_code
        WHERE 1=1
        AND A.guestroom_reserve_date = '".$dateString."'
        ".$sub_qry."
        AND A.guestroom_reserve_status = '3'
        GROUP BY A.guestroom_code  
        ";
// echo "
// sql > $sql <br>
// ";      
$result = sql_query($sql);
$counts = sql_num_rows($result);  
// $result = sql_query($sql);
//   $room_info_array = array();
//   while ($rows = mysqli_fetch_array($result)) {
//     $arrData = array(
//               'guestroom_code' => $rows['guestroom_code'],
//               'guestroom_name' => $rows['guestroom_name'],
//                );
//     array_push($room_info_array, $arrData);
//   }
?>
               <input type="hidden" name="reserve_date" id="reserve_date" value="<?=$reserve_date?>">
               <table class="table table-bordered table-hover table-striped">
                 <thead>
                 <tbody>
                   <tr>
                     <th colspan="4" class="text-right">예약조회일자 : <?=$dateString?></th>
                   </tr>
                   <tr>
                     <th>NO</th>
                     <th>호스트</th>
                     <th>상품명</th>
                     <th>예약일자</th>
                   </tr>
                   <tr>
                     <th>상태</th>
                     <th>예약자</th>
                     <th>연락처</th>
                     <th>이메일</th>
                   </tr>
                   <?
                   // while ($rows = mysqli_fetch_array($result)) {
                   $i="1";
                   for ( $j = 0 ; $j < $counts ; $j ++ ) {
                    $rows = mysqli_fetch_array($result);
                    $get_reserve_status = get_reserve_status($rows['guestroom_reserve_status']);
                    $get_date_intval = get_date_intval($rows['guestroom_reserve_date']);
                    $get_date_str = get_date_str($get_date_intval);
                   ?>
                   <tr>
                     <td><?=$i?></td>
                     <td><?=$rows['com_name']?></td>
                     <td><?=$rows['guestroom_name']?></td>
                     <td><?=$rows['guestroom_reserve_date']?><br>(<?=$get_date_str?>)</td>
                   </tr>
                   <tr>  
                     <td><?=$get_reserve_status?></th>
                     <td><?=$rows['guestroom_reserve_user_name']?></td>
                     <td><?=$rows['guestroom_reserve_user_phone']?></td>
                     <td><?=$rows['guestroom_reserve_user_email']?></td>
                   </tr>
                   <?$i++;}?>
                 </tbody>
                 </table>
<hr/>
