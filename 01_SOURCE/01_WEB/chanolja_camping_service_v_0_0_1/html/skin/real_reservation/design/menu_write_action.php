<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$rdate = date("Y-m-d");
$wrip = $_SERVER['REMOTE_ADDR'];
$division = trim($_REQUEST["division"]); //예약번호/객실명

if($division == 'menu_setting') {
      $DESIGN_MENU_SETTING_TB = "design_menu_setting";
      $top_menu = $_REQUEST["top_menu"]; //예약번호/객실명
      $menu_code = $_REQUEST["menu_code"]; //예약번호/객실명
      $menu_rank = $_REQUEST["menu_rank"]; //예약번호/객실명
      $sub_menu_1 = $_REQUEST["sub_top_menu_1"]; //예약번호/객실명
      $sub_menu_2 = $_REQUEST["sub_top_menu_2"]; //예약번호/객실명
      $sub_menu_3 = $_REQUEST["sub_top_menu_3"]; //예약번호/객실명
      $sub_menu_use_whether = explode(",",$_REQUEST["sub_menu_use_whether_array"]); //예약번호/객실명
      // print_r($sub_menu_use_whether);
      $top_menu_size = sizeof($top_menu);

      for ($i = '0' ; $i < $top_menu_size ; $i++) {
          // echo " $top_menu[$i] >> $menu_code[$i] >> $menu_rank[$i] >> ";
          $sql = "UPDATE $DESIGN_MENU_SETTING_TB
                  SET
                   menu_name='$top_menu[$i]'
                  ,menu_explain='$menu_explain'
                  ,menu_rank='$menu_rank[$i]'
                  ,sub_menu_1='$sub_menu_1[$i]'
                  ,sub_menu_2='$sub_menu_2[$i]'
                  ,sub_menu_3='$sub_menu_3[$i]'
                  ,sub_menu_use_whether='$sub_menu_use_whether[$i]'
                  WHERE pension_user_id = '$session_userid'
                  AND menu_code = '$menu_code[$i]'
                 ";
                  $result = sql_query($sql);
      //             echo "
      // sql >>> $sql <br>
      //             ";

      }
      echo "<script>alert('메뉴를 변경하였습니다.');</script>";
      echo "<meta http-equiv='Refresh' content='0; URL=menu_setting.php?top_menu_id=5001&left_menu_id=002'>";
      exit;
}
else if($division == 'menu_text_setting'){
        $DESIGN_MENU_SETTING_TB = "design_menu_setting";
        $DESIGN_MENU_TEXT_SETTING_TB = "design_menu_text_setting";

        $menu_text = $_REQUEST["menu_text"]; //예약번호/객실명
        $menu_code = $_REQUEST["menu_code"]; //예약번호/객실명
        // print_r($menu_text);
        $menu_text_size = sizeof($menu_text);
//         echo "
// <br> menu_text_size >>> $menu_text_size <br>
// menu_code >>> $menu_code <br>
//         ";
        // for ($i = '1' ; $i < $menu_text_size ; $i++) {
            // echo " $menu_text[$i] ";
            $sql = "INSERT INTO $DESIGN_MENU_TEXT_SETTING_TB
                    (pension_user_id,menu_code,menu_name, menu_text_1, menu_text_2,menu_text_3,menu_text_4
                     ,menu_text_5,menu_text_6,menu_text_7,menu_text_8,mod_ip,mod_date)
                    VALUES
                    ('$session_userid','$menu_code','$menu_name','$menu_text[0]','$menu_text[1]','$menu_text[2]','$menu_text[3]'
                      ,'$menu_text[4]','$menu_text[5]','$menu_text[6]','$menu_text[7]','$mod_ip','$mod_date')
                    ON DUPLICATE KEY UPDATE
                     menu_text_1='$menu_text[0]'
                    ,menu_text_2='$menu_text[1]'
                    ,menu_text_3='$menu_text[2]'
                    ,menu_text_4='$menu_text[3]'
                    ,menu_text_5='$menu_text[4]'
                    ,menu_text_6='$menu_text[5]'
                    ,menu_text_7='$menu_text[6]'
                    ,menu_text_8='$menu_text[7]'
                   ";
                    $result = sql_query($sql);
//                     echo "
// sql >>> $sql <br>
//                     ";
        // }
        echo "<script>alert('메뉴를 변경하였습니다.');</script>";
        echo "<meta http-equiv='Refresh' content='0; URL=menu_text_setting.php?top_menu_id=5001&left_menu_id=003&content_menu_id=$content_menu_id'>";
        exit;
}
