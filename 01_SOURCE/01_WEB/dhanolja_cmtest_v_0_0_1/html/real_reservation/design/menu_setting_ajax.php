<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$division = trim($_REQUEST["division"]); //예약번호/객실명

if($division == 'menu_setting'){
			$DESIGN_MENU_SETTING_TB = "design_menu_setting";
			$sql = "SELECT * FROM $DESIGN_MENU_SETTING_TB
							WHERE pension_user_id = '$session_userid'
							ORDER BY menu_rank ASC";
			$result = sql_query($sql);
			$counts = sql_num_rows($result);
			$html ="";
						for ( $j = 0 ; $j < $counts ; $j ++ ) {
						$rows = mysqli_fetch_array($result);
						if($rows['sub_menu_use_whether'] == 'N'){
		          $sub_menu_use_whethercheked ="";
		          $sub_menu_use_whethercheked_val = 'N';
		        }else{
		          $sub_menu_use_whethercheked ="checked";
		          $sub_menu_use_whethercheked_val = 'Y';
		        }
			         $html .= "<tr>
			                   <th scope='row'>상단메뉴</th>
			                   <td>
												 <input type='text' name='top_menu[]' class='input' placeholder='*필수) 상단메뉴명' value='".$rows['menu_name']."'>
			                   <input type='hidden' name='menu_code[]' value='".$rows['menu_code']."'>
			                   &nbsp;&nbsp;순위&nbsp;&nbsp;<input type='number' size='1' name='menu_rank[]' class='input' placeholder='*필수) 노출순위' value='".$rows['menu_rank']."'>
												 &nbsp;&nbsp;서브메뉴 사용&nbsp;&nbsp;
												 <input type='checkbox'  name='sub_menu_use_whether[]'  class='sub_menu_use_whether'  $sub_menu_use_whethercheked>
												 <input type='text' name='sub_top_menu_1[]' class='input' placeholder='서브메뉴' value='".$rows['sub_menu_1']."'>
												 <input type='text' name='sub_top_menu_2[]' class='input' placeholder='서브메뉴' value='".$rows['sub_menu_2']."'>
												 <input type='text' name='sub_top_menu_3[]' class='input' placeholder='서브메뉴' value='".$rows['sub_menu_3']."'>
			                   </td>
			                   </tr>
			          ";
					 			$num_a--;
						}
			echo $html;
}
else if($division == 'menu_text_setting'){
			$content_menu_id = trim($_REQUEST["content_menu_id"]); //예약번호/객실명
			$DESIGN_MENU_SETTING_TB = "design_menu_setting";
			$DESIGN_MENU_TEXT_SETTING_TB = "design_menu_text_setting";
			$sql = "SELECT * FROM $DESIGN_MENU_SETTING_TB 	WHERE pension_user_id = '$session_userid' AND menu_rank = '$content_menu_id'";
			$result = sql_query($sql);
      $row = mysqli_fetch_array($result);

			$sql = "SELECT * FROM $DESIGN_MENU_TEXT_SETTING_TB WHERE pension_user_id = '$session_userid' AND menu_code = '$row[menu_code]'";
			$result = sql_query($sql);
			$rows = mysqli_fetch_array($result);
			$counts = sql_num_rows($result);
			$html ="";
		  $plus_counts = $MAIN_TEXT_COUNTS - $counts;
// 			echo "
// sql >>> $sql <br>
// MAIN_TEXT_COUNTS >>> $MAIN_TEXT_COUNTS <br>
// counts >>> $counts <br>
// plus_counts >>> $plus_counts <br>
// 			";
			      $t = "1";
						// $MAIN_TEXT_COUNTS = '4';
						for ( $j = 0 ; $j < $MAIN_TEXT_COUNTS ; $j ++ ) {
						$col_name = "";
						$col_name = "menu_text_".$t;
					   $html .= "<tr>
												 <th scope='row'>".$row['menu_name']."</th>
												 <td><input type='text' name='menu_text[]' class='input input_full' placeholder='*필수) 상단메뉴명' value='".$rows[$col_name]."'>
														 <input type='hidden' name='menu_code' value='".$row['menu_code']."'>
												 </td>
												 </tr>
								";
						$t++;
					  }
						// for ( $k = $counts+1 ; $k <= $plus_counts ; $k ++ ) {
						// $rows = mysqli_fetch_array($result);
						// $col_name = "";
						// $col_name = "menu_text_".$k;
						// 	 $html .= "<tr>
						// 						 <th scope='row'>".$row['menu_name']."</th>
						// 						 <td><input type='text' name='menu_text[]' class='input input_full' placeholder='텍스트' value='".$rows[$col_name]."'>
						// 								 <input type='hidden' name='menu_code' value='".$row['menu_code']."'>
						// 								&nbsp;&nbsp;순위&nbsp;&nbsp;<input type='number' size='1' name='menu_rank[]' class='input' placeholder='*필수) 노출순위' value='".$rows['menu_rank']."'>
						// 						 </td>
						// 						 </tr>
						// 		";
						// }
			echo $html;
}
?>
