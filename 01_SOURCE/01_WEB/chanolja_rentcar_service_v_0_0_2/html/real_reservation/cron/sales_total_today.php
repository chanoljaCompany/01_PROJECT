<?php
include "/home/untalk/sys_admin/config/dbinfo.untalk.php";
        "www\real_reservation\config\dbinfo.jwsntech.php";
$today = date("Ymd");
/*이벤트종료*/
$sql = "SELECT * FROM event_board WHERE wr_3 = '2'";
$result = mysqli_query($connect_untalk,$sql);
$counts = mysqli_num_rows($result);
			for ( $j = 0 ; $j < $counts ; $j ++ ) {
				  $wr_2_str ="";
					$rows = mysqli_fetch_array($result);
					$wr_2_str = preg_replace("/[^0-9]*/s", "", $rows['wr_2']);
					if($wr_2_str < $today) {
						$sql_up = "UPDATE event_board SET wr_3 = '3' WHERE wr_id = '$rows[wr_id]'";
						mysqli_query($connect_untalk,$sql_up);
					}
}

?>