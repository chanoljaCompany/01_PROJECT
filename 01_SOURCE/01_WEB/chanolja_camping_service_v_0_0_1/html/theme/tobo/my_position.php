<?php


//게시판일때
if($_REQUEST['bo_table']){
	$sql = " select * from {$g5['board_table']} where bo_table = '$_REQUEST[bo_table]'";
	$result = sql_query($sql); 
	for ($i=0; $row = sql_fetch_array($result); $i++) {
		$board_name = $row['bo_subject'];
		$sql1 = " select * from {$g5['group_table']} where gr_id = '$row[gr_id]'";
        $result1 = sql_query($sql1);
        for ($gi=0; $row1=sql_fetch_array($result1); $gi++) { // gi 는 group index
			$group_name = $row1['gr_subject'];
		}
	}
}

//그룹일때
if($_REQUEST['gr_id']){
	$sql1 = " select * from {$g5['group_table']} where gr_id = '$_REQUEST[gr_id]'";
    $result1 = sql_query($sql1);
    for ($gi=0; $row1=sql_fetch_array($result1); $gi++) { // gi 는 group index
			$group_name = $row1['gr_subject'];
	}
}

//게시판일 때 출력 부분
//echo $group_name." > ".$board_name. " > ".$_REQUEST['sca'];  // 그룹 > 게시판 > 카테고리

?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo G5_URL?>/css/fonts.css" type="text/css" />
<style>
#tit_js {
	font-family:'Nanum Gothic',sans-serif;
	font-size:19px;
	font-weight:bold;
	color:#4d4d5f;
	line-height:30px;
}
#position_js {
	font-family:'Nanum Gothic',sans-serif;
}
</style>

<?php if($group_name){ ?>
	<?php
	if($group_name){
		$position_title = $group_name;
	}

	if($board_name){
		$position_title = $board_name;
	}

	if($_REQUEST['sca']){
		$position_sca = ' | <span style="font-size:9pt;">'.$_REQUEST['sca']."</span>";
	}
	?>

	<div id="tit_js" style="padding:0px 20px 0px 0px; float:left;"><strong><i class="fa fa-leaf"></i> <?php echo $position_title; ?></strong><span><?php echo $position_sca?></span></div>

	<div id="position_js" style="float:right; line-height:22px;" >
	<?php 
	//echo $group_name." > ".$board_name. " > ".$_REQUEST['sca'];

	//$position_print = "<strong>Location</strong> : ";
	$position_print = $position_print."<i class='fa fa-home'></i> Home > ".$group_name;
	if($board_name){
		$position_print = $position_print." > ".$board_name;
	}
	if($_REQUEST['sca']){
		$position_print = $position_print." > ".$_REQUEST['sca'];
	}


	echo $position_print;
	?>
	</div>

	<div style="height:10px; clear:both;"></div>

	<div style="height:1px; border-top:1px solid #DCDCDC;"></div>
		
<? } ?>