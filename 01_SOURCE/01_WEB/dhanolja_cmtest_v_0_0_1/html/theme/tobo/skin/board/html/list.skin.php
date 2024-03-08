<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>

<h2 id='container_title'><?php echo $board['bo_subject'] ?><span class='sound_only'> 목록</span></h2>


<?php


if ($board[bo_table] == '15' ){
   include_once(G5_PATH.'/sub/map.php');
}
else if ($board[bo_table] == '14' ){
   echo "<img src='/img/".$board[bo_table].".jpg' border='0'>";
}
else{
	//echo "<img src='/img/".$board[bo_table].".jpg' border='0'>";
   include_once(G5_PATH."/sub/sub".$board[bo_table].".php");
}

?>