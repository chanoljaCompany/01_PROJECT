<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

# 선택 옵션 분류 적용 s
// 선택옵션 3차 분류 적용 - 분류가 2차의 하위 분류 개념이 아님 -  별도 적용
if($_POST['chk_ca_it_option3'] && $option_count) {
	$sql_common = '';
	$sql_common .= " it_option_subject = '".$it_option_subject."' "; 

	// 해당 분류 
	if($ca_id3) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id3 = '$ca_id3' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id3 = '$ca_id3' "); // it_option_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '0' and it_id = '{$row['it_id']}' "); // 기존선택옵션삭제
			
			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$option_count; $j++) {
			  $sql2 .= $comma . " ( '{$_POST['opt_id'][$j]}', '0', '{$row[it_id]}', '{$_POST['opt_price'][$j]}', '{$_POST['opt_stock_qty'][$j]}', '{$_POST['opt_noti_qty'][$j]}', '{$_POST['opt_use'][$j]}' )";
			  $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}

// 선택옵션 2차 분류 적용 - 분류가 기본분류의 하위 분류 개념이 아님 -  별도 적용
if($_POST['chk_ca_it_option2'] && $option_count) {
	$sql_common = '';
	$sql_common .= " it_option_subject = '".$it_option_subject."' "; 

	// 해당 분류 
	if($ca_id2) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id2 = '$ca_id2' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id2 = '$ca_id2' "); // it_option_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '0' and it_id = '{$row['it_id']}' "); // 기존선택옵션삭제

			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$option_count; $j++) {
			  $sql2 .= $comma . " ( '{$_POST['opt_id'][$j]}', '0', '{$row[it_id]}', '{$_POST['opt_price'][$j]}', '{$_POST['opt_stock_qty'][$j]}', '{$_POST['opt_noti_qty'][$j]}', '{$_POST['opt_use'][$j]}' )";
			  $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}

// 선택옵션 기본 분류 적용
if($_POST['chk_ca_it_option1'] && $option_count) {
	$sql_common = '';
	$sql_common .= " it_option_subject = '".$it_option_subject."' "; 

	// 해당 분류 
	if($ca_id) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id = '$ca_id' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id = '$ca_id' "); // it_option_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '0' and it_id = '{$row['it_id']}' "); // 기존선택옵션삭제

			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$option_count; $j++) {
			  $sql2 .= $comma . " ( '{$_POST['opt_id'][$j]}', '0', '{$row[it_id]}', '{$_POST['opt_price'][$j]}', '{$_POST['opt_stock_qty'][$j]}', '{$_POST['opt_noti_qty'][$j]}', '{$_POST['opt_use'][$j]}' )";
			  $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}
# 선택 옵션 분류 적용 e

# 추가 옵션 분류 적용 s
//  추가옵션 3차 분류 적용 - 분류가 2차의 하위 분류 개념이 아님 -  별도 적용
if($_POST['chk_ca_it_supply3'] && $supply_count) {
	$sql_common = '';
	$sql_common .= " it_supply_subject = '".$it_supply_subject."' "; 

	// 해당 분류 
	if($ca_id3) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id3 = '$ca_id3' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id3 = '$ca_id3' "); // it_supply_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '1' and  it_id = '{$row['it_id']}' "); // 기존 추가옵션삭제
			
			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$supply_count; $j++) {
				$sql2 .= $comma . " ( '{$_POST['spl_id'][$j]}', '1', '{$row['it_id']}', '{$_POST['spl_price'][$j]}', '{$_POST['spl_stock_qty'][$j]}', '{$_POST['spl_noti_qty'][$j]}', '{$_POST['spl_use'][$j]}' )";
			    $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}

//  추가옵션 2차 분류 적용 - 분류가 기본분류의 하위 분류 개념이 아님 -  별도 적용
if($_POST['chk_ca_it_supply2'] && $supply_count) {
	$sql_common = '';
	$sql_common .= " it_supply_subject = '".$it_supply_subject."' "; 

	// 해당 분류 
	if($ca_id2) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id2 = '$ca_id2' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id2 = '$ca_id2' "); // it_supply_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '1' and  it_id = '{$row['it_id']}' "); // 기존 추가옵션삭제
			
			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$supply_count; $j++) {
				$sql2 .= $comma . " ( '{$_POST['spl_id'][$j]}', '1', '{$row['it_id']}', '{$_POST['spl_price'][$j]}', '{$_POST['spl_stock_qty'][$j]}', '{$_POST['spl_noti_qty'][$j]}', '{$_POST['spl_use'][$j]}' )";
			    $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}

//  추가옵션 기본 분류 적용
if($_POST['chk_ca_it_supply1'] && $supply_count) {
	$sql_common = '';
	$sql_common .= " it_supply_subject = '".$it_supply_subject."' "; 

	// 해당 분류 
	if($ca_id) {
        $sql = " select it_id from {$g5['g5_shop_item_table']} where ca_id = '$ca_id' order by it_id asc "; 
		$result = sql_query($sql);
         for($i=0; $row=sql_fetch_array($result); $i++) {
			sql_query(" update {$g5['g5_shop_item_table']} set $sql_common where it_id = '{$row['it_id']}' and ca_id = '$ca_id' "); // it_supply_subject update
			sql_query(" delete from {$g5['g5_shop_item_option_table']} where io_type = '1' and  it_id = '{$row['it_id']}' "); // 기존 추가옵션삭제
			
			// 선택옵션 insert
			$comma = '';
			$sql2 = " INSERT INTO {$g5['g5_shop_item_option_table']} ( `io_id`, `io_type`, `it_id`, `io_price`, `io_stock_qty`, `io_noti_qty`, `io_use` ) VALUES ";
			for($j=0; $j<$supply_count; $j++) {
				$sql2 .= $comma . " ( '{$_POST['spl_id'][$j]}', '1', '{$row['it_id']}', '{$_POST['spl_price'][$j]}', '{$_POST['spl_stock_qty'][$j]}', '{$_POST['spl_noti_qty'][$j]}', '{$_POST['spl_use'][$j]}' )";
			    $comma = ' , ';
		   }
		   sql_query($sql2);
		}		
	}
}
# 추가 옵션 분류 적용 e

