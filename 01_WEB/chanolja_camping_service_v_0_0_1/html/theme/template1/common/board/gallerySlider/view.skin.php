<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_THEME_PATH."/common/board.header.php");

if($is_admin)
{
    include_once($board_skin_path."/viewAdmin.skin.php");
}
else
{
    include_once($board_skin_path."/viewUser.skin.php");
}

?>

<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>