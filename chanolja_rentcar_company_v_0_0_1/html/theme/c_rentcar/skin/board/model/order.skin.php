<?php
include_once("{$_SERVER['DOCUMENT_ROOT']}/common.php");

if(!isset($write['wr_id']))
	die('잘못된 요청입니다.');

if($order=='up'){
	$sql = " select * from {$write_table} where wr_num < {$write['wr_num']} order by wr_num desc limit 1 ";
}else{
	$sql = " select * from {$write_table} where wr_num > {$write['wr_num']} order by wr_num asc limit 1 ";
}

$row = sql_fetch($sql, true);

if(!isset($row['wr_id']))
	die('잘못된 요청입니다.');

$sql = " update {$write_table} set wr_num = '1' where wr_id = '{$row['wr_id']}' ";
sql_query($sql, true);

$sql = " update {$write_table} set wr_num = '2' where wr_id = '{$write['wr_id']}' ";
sql_query($sql, true);

$sql = " update {$write_table} set wr_num = '{$row['wr_num']}' where wr_id = '{$write['wr_id']}' ";
sql_query($sql, true);

$sql = " update {$write_table} set wr_num = '{$write['wr_num']}' where wr_id = '{$row['wr_id']}' ";
sql_query($sql, true);

die('');

?>
