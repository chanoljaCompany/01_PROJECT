<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$sql = "SELECT *	FROM $GUESTROOM_RESERVATION_INFO_TB
        WHERE 1=1
        AND user_id = '".$_SESSION['session_user_id']."'
        AND guestroom_reserve_status = '6'
        ORDER BY seq DESC";

$result = sql_query($sql);
while($rows = mysqli_fetch_array($result)){
  $guestroom_name = $rows['guestroom_name'];
  $guestroom_reserve_code = $rows['guestroom_reserve_code'];
  $guestroom_reserve_date = $rows['guestroom_reserve_date'];

echo "

guestroom_name > $guestroom_name <br>
guestroom_reserve_code > $guestroom_reserve_code <br>
guestroom_reserve_date > $guestroom_reserve_date <br>

";
 }
?>
