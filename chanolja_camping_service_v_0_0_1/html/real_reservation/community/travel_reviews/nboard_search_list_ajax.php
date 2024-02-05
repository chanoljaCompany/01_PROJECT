<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$mod_date = date("Y-m-d");
$mod_id = $_SERVER['REMOTE_ADDR'];
$NBOARD_TB = "travel_reviews";
$division = trim($_REQUEST["division"]); //예약번호/객실명
$searchKey_1 = $_REQUEST["searchKey_1"]; //예약번호/객실명셀렉트박스
$searchVal_1 = trim($_REQUEST["searchVal_1"]); //예약번호/객실명
$searchKey_2 = $_REQUEST["searchKey_2"]; //기간셀렉트박스
$searchVal_2 = trim($_REQUEST["searchVal_2"]); //기간
$searchKey_3 = $_REQUEST["searchKey_3"]; //기간셀렉트박스
$searchVal_3 = trim($_REQUEST["searchVal_3"]); //예약자 정보
$searchVal_4 = $_REQUEST["searchVal_4"]; //결제수단
$searchVal_5 = trim($_REQUEST["searchVal_5"]); //결제여부
$searchVal_6 = $_REQUEST["searchVal_6"]; //예약상태
$range_start = trim(substr($searchVal_2,0,10));
$range_end = trim(substr($searchVal_2,13,10));
$range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));
$range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));

//페이징 초기값 설정
if (isset($_REQUEST['curpage']))
    $page = $_REQUEST['curpage'];
else
    $page = 1;

if($division == "common"){ //취소관리일때...
  $searchVal_str = ""; //취소신청.취소완료
  }else{ //예약리스트
  $searchVal_str = "";
}

if($searchVal_1){
	$searchVal_1_str = "AND ($searchKey_1 like '%$searchVal_1%')";
}

if($searchVal_2){
	$searchVal_2_str = "AND $searchKey_2 BETWEEN '$range_start' AND '$range_end'";
}

if($searchVal_3){
	$searchVal_3_str = "AND ($searchKey_3 like '%$searchVal_3%')";
}

if($searchVal_4){
	$searchVal_4_array_size = sizeof($searchVal_4);
	$searchVal_4_str ="";
	for($i = '0' ; $i < $searchVal_4_array_size ; $i++){
		if($searchVal_4[$i] > '0'){
			$searchVal_4_str .= "guestroom_reserve_payment_method like '%".$searchVal_4[$i]."%' OR ";
		}
	}
	$searchVal_4_str = substr($searchVal_4_str, 0, -3);
	$searchVal_4_str  = $searchVal_4_str ?  "AND (".$searchVal_4_str.")" : ""; //광고코드
	// $searchVal_4_str = "AND (".$searchVal_4_str.")";

	// $searchVal_4_str = "AND (guestroom_reserve_payment_method like '%$searchVal_3%' OR guestroom_reserve_user_phone like '%$searchVal_3%')";
}

if($searchVal_5){
	if($searchVal_5 == '1'){
		$searchVal_5_str = "";
	}else{
		$searchVal_5_str = "AND guestroom_reserve_payment_status = '$searchVal_5')";
	}
}

if($searchVal_6){
	$searchVal_6_array_size = sizeof($searchVal_6);
	$searchVal_6_str ="";
  if($division == "reserve_cancel"){
      	for($i = '0' ; $i < $searchVal_6_array_size ; $i++){
      		if($searchVal_6[$i] > '0'){
      			$searchVal_6_str .= "guestroom_reserve_payment_status = '".$searchVal_6[$i]."' OR ";
      		}
      	}
  }else{
        for($i = '0' ; $i < $searchVal_6_array_size ; $i++){
          if($searchVal_6[$i] > '0'){
            if($searchVal_6[$i] == '1'){
              $searchVal_6_str .= "guestroom_reserve_status = '8' OR ";
            }
              $searchVal_6_str .= "guestroom_reserve_status = '".$searchVal_6[$i]."' OR ";
          }
        }
  }
  	$searchVal_6_str = substr($searchVal_6_str, 0, -3);
  	$searchVal_6_str  = $searchVal_6_str ?  "AND (".$searchVal_6_str.")" : ""; //광고코드
	// $searchVal_6_str  = AND ($searchVal_6_str.")" ?  $searchVal_6_str : ""; //광고코드
	// $searchVal_6_str = "AND (".$searchVal_6_str.")";
}
// echo "
// searchVal_1_str >>> $searchVal_1_str <br>
// searchVal_2_str >>> $searchVal_2_str <br>
// searchVal_3_str >>> $searchVal_3_str <br>
// searchVal_4_str >>> $searchVal_4_str <br>
// searchVal_5_str >>> $searchVal_5_str <br>
// searchVal_6_str >>> $searchVal_6_str <br>
// ";

$list_num = 10; // 한페이지당 출력수
$page_num = 10; // 페이지 출력수
$offset = $list_num * ($page - 1);
$fir = $offset; // 시작값
$last = $offset + $list_num; //종료값

$total_sql = "SELECT COUNT(*) as TotalNum FROM $NBOARD_TB
							WHERE pension_user_id = '$session_userid'
              $searchVal_str
							$searchVal_1_str
							$searchVal_2_str
							$searchVal_3_str
							$searchVal_4_str
							$searchVal_5_str
							$searchVal_6_str
";
$result_total = sql_query($total_sql);
$rows_total = mysqli_fetch_array($result_total);
$TotalNum = $rows_total['TotalNum'];
$num_a = $TotalNum - $list_num*($page-1);
// echo "
// total_sql >>> $total_sql <br>
// ";
$sql = "SELECT * FROM $NBOARD_TB
				WHERE pension_user_id = '$session_userid'
        $searchVal_str
				$searchVal_1_str
				$searchVal_2_str
				$searchVal_3_str
				$searchVal_4_str
				$searchVal_5_str
				$searchVal_6_str
				ORDER BY wr_id DESC
				LIMIT " . $fir . ", " . $list_num . "";
        // echo "
        // sql >>> $sql <br>
        // ";
$result = sql_query($sql);
$counts = sql_num_rows($result);
$html ="";
			for ( $j = 0 ; $j < $counts ; $j ++ ) {
			$rows = mysqli_fetch_array($result);
       if($division == "common"){  //공지사항
        $post_show_cheked ="";
        $post_show_cheked = $rows['post_show'];
        if($rows['post_show'] == 'N' || $rows['post_show'] == ''){
          $post_show_cheked ="";
          $post_show_cheked_val = 'N';
        }else{
          $post_show_cheked ="checked";
          $post_show_cheked_val = 'Y';
        }
				$html .= "<tr>
									<td>".$num_a."</td>
                  <td>".$rows['wr_datetime']."</td>
									<td><a href='nboard_write_form.php?top_menu_id=".$top_menu_id."&left_menu_id=".$left_menu_id."&wr_id=".$rows['wr_id']."&curpage=".$page."'>".$rows['wr_subject']."</td>
									<td>".$rows['wr_name']."</td>
                  <td><input type='checkbox' onclick=\"checkbox_event('".$rows['wr_id']."','".$post_show_cheked_val."');\" name='post_show[]' id= 'post_show_".$rows['wr_id']."' value=".$rows['wr_id']." $post_show_cheked></td>
									<td><span class='box_btn_s blue'><a class='btn btn-success btn-sm'  href='nboard_write_form.php?top_menu_id=".$top_menu_id."&left_menu_id=".$left_menu_id."&wr_id=".$rows['wr_id']."&curpage=".$page."'>수정</a></span></td>
									<td><span class='box_btn_s gray'><input type='button' value='삭제하기' onclick=\"board_delete('".$NBOARD_TB."','','".$rows['wr_id']."','".$top_menu_id."','".$left_menu_id."')\"></span></td>
									</tr>
				        ";
       }else if($division == "reserve"){  //예약현황리스트
         $html .= "<tr>
                   <td>".$num_a."</td>
                   <td>".$guestroom_reserve_status_str."</td>
                   <td>".$rows['guestroom_reception_date']."</td>
                   <td>".$rows['guestroom_reserve_date']."</td>
                   <td>".$rows['guestroom_reserve_payment_date']."</td>
                   <td>".$rows['guestroom_name']."</td>
                   <td>".$rows['guestroom_reserve_user_name']."</td>
                   <td>".$rows['guestroom_reserve_user_phone']."</td>
                   <td>".$guestroom_reserve_payment_method_str."</td>
                   <td>".number_format($rows['guestroom_reserve_payment_price'])."</td>
                   <td>".number_format($rows['guestroom_onsite_payment_price'])."</td>
                   <td><span class='box_btn_s blue'><a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static' data-whatever='".$rows['guestroom_reserve_code']."' data-target='".$data_target."'>수정</a></span></td>
                   <!--<td><span class='box_btn_s gray'><input type='button' value='삭제하기' onclick=\"go_page('reserve_delete','".$rows['guestroom_reserve_code']."','','','')\"></span></td>-->
                   </tr>
          ";

       }
				  // $serialnumber--;
		 			$num_a--;
			}

echo $html;
?>
