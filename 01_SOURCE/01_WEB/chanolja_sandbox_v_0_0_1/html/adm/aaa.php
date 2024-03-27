<?php

include "$_SERVER[DOCUMENT_ROOT]/manage_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";

include $admin_root."/config/session.php";

$rdate = date("Y-m-d");

$wrip = $_SERVER['REMOTE_ADDR'];

$page_division = trim($_REQUEST["page_division"]);

$searchVal_1_str = "";

$searchKey_1 = $_REQUEST["searchKey_1"];

$searchVal_1 = trim($_REQUEST["searchVal_1"]);

$searchVal_2 = isset($_REQUEST["searchVal_2"]) ? $_REQUEST["searchVal_2"] : 'N';


$manager = isset($_REQUEST["manager"]) ? $_REQUEST["manager"] : '';



// $searchKey_2 = $_REQUEST["searchKey_2"];

// $searchVal_2 = trim($_REQUEST["searchVal_2"]);

// $range_start = trim(substr($searchVal_2,0,10));

// $range_end = trim(substr($searchVal_2,13,10));

// $range_start = date("Y-m-d", strtotime("0 day", strtotime($range_start)));

// $range_end = date("Y-m-d", strtotime("0 day", strtotime($range_end)));



if (isset($_REQUEST['curpage']))

    $page = $_REQUEST['curpage'];

else

    $page = 1;



if($searchVal_1){

    $tips = "SM";

  if($searchKey_1 == 'counselors_code'){

    $tips = "MC";

  }

	$searchVal_1_str = "AND ($tips.$searchKey_1 like '%$searchVal_1%')";

}

// if($searchVal_2){

// 	$searchVal_2_str = "AND $searchKey_2 BETWEEN '$range_start 00:00:00' AND '$range_end 23:59:59'";

// }

$dataorderBy = "ORDER BY seq DESC";

if($searchVal_2 == 'O') $dataorderBy = "ORDER BY seq ASC";

$list_num = 10; // 한페이지당 출력수

$page_num = 10; // 페이지 출력수

$offset = $list_num * ($page - 1);

$fir = $offset; // 시작값

$last = $offset + $list_num; //종료값



$total_sql = "SELECT SM.*,MC.counsel_step,MC.counselors_code,MC.counselors_con_code

              FROM $SALES_MEMBERS_TB AS SM

              LEFT JOIN $MEMBERS_COUNSELORS_TB AS MC

              ON SM.userid = MC.userid

      				WHERE 1=1

              AND user_level = '$manager'

							$searchVal_1_str

";

$result_total = sql_query($total_sql);

$rows_total = mysqli_num_rows($result_total);

$TotalNum = $rows_total;

// echo "

// total_sql > $total_sql

// ";

$num_a = $TotalNum - $list_num*($page-1);

$sql = "SELECT SM.*,MC.counsel_step,MC.counselors_code,MC.counselors_con_code

        FROM $SALES_MEMBERS_TB AS SM

        LEFT JOIN $MEMBERS_COUNSELORS_TB AS MC

        ON SM.userid = MC.userid

				WHERE 1=1

        AND user_level = '$manager'

				$searchVal_1_str

				$dataorderBy

				LIMIT " . $fir . ", " . $list_num . "";

// $sql = "SELECT SM.*,

//         (SELECT counsel_step FROM $MEMBERS_COUNSELORS_TB WHERE userid	= SM.userid) as counsel_step,

//         (SELECT counselors_code FROM $MEMBERS_COUNSELORS_TB WHERE userid	= SM.userid) as counselors_code

//         FROM $SALES_MEMBERS_TB AS SM

// 				WHERE 1=1

//         AND user_level = '$manager'

// 				$searchVal_1_str

// 				$dataorderBy

// 				LIMIT " . $fir . ", " . $list_num . "";

// echo "

// sql >>> $sql <br>

// ";

$result = sql_query($sql);

$counts = sql_num_rows($result);

$html ="";

			for ( $j = 0 ; $j < $counts ; $j ++ ) {

			$rows = mysqli_fetch_array($result);

      $user_remain_pay ="";

      $rows['fee_rate'] = empty($rows['fee_rate']) ? '미입력' : $rows['fee_rate'];

      if($rows['approve'] == 'Y') $approve_str = "정상";

      if($rows['approve'] == 'H') $approve_str = "휴먼";

      if($rows['approve'] == 'D') $approve_str = "대기";

      $user_remain_pay = get_mtn_remain_pay($rows['mtn_member_id']);

//      $get_mtn_remain_pay_data = get_mtn_remain_pay($userData['mtn_member_id']);



				$html .= "<tr>

                  <td>".$num_a."</td>

                  <td>".$rows['userid']."</td>

                  <td>".$rows['nicname']."</td>

                  <td>".$rows['grade']."</td>

                  <td>".$rows['handphone']."</td>

                  ";

                  if($manager == 'M'){

        $html .= "<td>".$rows['member_type']."</td>

                  <td>명함</td>

                  <td>사업자등록증</td>

                  ";

                  }

        $html .= "<td>".$rows['signdate']."</td>

                  <td>

                      <span class='box_btn_s blue'>

                      <a class='btn btn-success btn-sm' data-toggle='modal' data-backdrop='static' data-whatever='".$rows['seq']."^".$rows['userid']."^".$rows['mtn_member_id']."' data-target='#managementModifyModal'>보기/수정</a>

                      </span>

                      <!--span class='box_btn_s dark'>

                      <a class='btn btn-success btn-sm' onclick=\"member_del('".$rows['seq']."','".$rows['userid']."')\">삭제</a>

                      </span-->

                      <span class='box_btn_s danger'>

                      <a class='btn btn-success btn-sm' onclick=\"member_withdraw('".$rows['seq']."','".$rows['userid']."')\">탈퇴</a>

                      </span>";

                  $html .= "</td>";

			$num_a--;}

echo $html;

?>