<?php 
$wr2 = $_POST["ex_zip"]."|".$_POST["ex_addr1"]."|".$_POST["ex_addr2"]."|".$_POST["ex_addr3"]."|".$_POST["ex_jibeon"];

$sql = "UPDATE {$write_table} SET `wr_2`='{$wr2}' WHERE `wr_id` = '{$wr_id}' ";
sql_query($sql);


?>