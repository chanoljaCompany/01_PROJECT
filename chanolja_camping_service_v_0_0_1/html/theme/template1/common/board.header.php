<?php 
$sideMenuSql = "SELECT * FROM g5_board as b JOIN g5_group as g ON b.gr_id = g.gr_id WHERE bo_table='{$bo_table}' ";
$gr_id = sql_fetch($sideMenuSql);

$sideSubSql = " SELECT * FROM g5_board WHERE gr_id = '{$gr_id["gr_id"]}' AND length(bo_table) = '2'";
$sideMenus = sql_query($sideSubSql);


if(!empty($_SERVER['SCRIPT_NAME']))
{
    if(strpos($_SERVER['SCRIPT_NAME'], "/register_form"))
    {
        $cls[] = "정보수정";
        $cls[] = "사이트 이용정보 입력";
    }
    
    if(strpos($_SERVER['SCRIPT_NAME'], "/register_result"))
    {
        $cls[] = "회원가입";
        $cls[] = "가입완료";
    }
    
    if(strpos($_SERVER['SCRIPT_NAME'], "/register"))
    {
        $cls[] = "회원가입";
        $cls[] = "약관동의";
    }
}


?>


<!-- <div class="breatcome_area">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="breatcome_title">
				<div class="breatcome_title_inner">
					<div class="breatcome_content">
						<ul>
							<li>
								<?php if(empty($cls)) : ?>
								<a href="<?= G5_URL ?>"><?= $gr_id["gr_subject"] ?><i class="fa fa-angle-right"></i></a><?php echo $board['bo_subject'] ?>
								<?php else: ?>
								<a href="<?= G5_URL ?>"><?= $cls[0] ?><i class="fa fa-angle-right"></i></a><?php echo $cls[1] ?>
								<?php endif ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->

<div class="blog_area" id="blog" >
	<div class="container">	