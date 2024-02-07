<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<!-- 메뉴 시작 { -->
<link rel="stylesheet" href="<?php echo G5_THEME_URL ?>/skin/groupmenu/adffix/css/style.css">
<section id="groupmenu" style="width:100%;padding:0px 0px;">

<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
	<tr height="60">
		<td class="nanum-gb" valign="top" colspan='3'>
			<!--  그룹 네임 시작 -->
			<b><? echo $group['gr_subject'] ?></b><br />

			<!-- 그룹 네임 끝 -->
		</td>
	</tr>
	<tr>
	    <td height="10"></td>
	</tr>
    <?php for ($i=0; $i<count($groupmenu); $i++) {  ?>
    <tr>
        <td>
            <div id="nav1">
                <ul>
                    <li<?php if($bo_table==$groupmenu[$i]['bo_table']) { echo " class=\"on\""; } ?>><a href="<?php echo $groupmenu[$i]['href'] ?>" class="nanum-g" style="font-size:13px; line-height:34px; display:block;" ><?php echo $groupmenu[$i]['subject'] ?></a></li>
                </ul>
            </div>
        </td>
    </tr>
    <?php }  ?>
    <tr>
</table>
</section>
<!-- } 메뉴 끝 -->

<style>
#nav1{text-indent:10px;}
</style>