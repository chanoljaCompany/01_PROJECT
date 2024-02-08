<?php 
$myCode = $_SERVER['REQUEST_URI'];
if(strpos($myCode,"&")!==FALSE){
    $x = explode("&",$myCode);
    $myCode = $x[0];
}
//글쓰기경우 메뉴 테이블에 등록이 안되어 있음으로 등록되어있는 링크로 변경하여 찾는다
$myCode = str_replace("/write.php", "/board.php", $myCode);

//문의사항인경우
$myCode = str_replace("/qawrite.php", "/qalist.php", $myCode);

if(strpos($_SERVER['SCRIPT_NAME'], "/qaview.php"))
{
    $myCode = str_replace("/qaview.php", "/qalist.php", $_SERVER['SCRIPT_NAME']);
}

$codeLoad = sql_fetch("SELECT `me_code`,`me_link`, `me_name` FROM `g5_menu` where `me_link` like '%{$myCode}' ORDER BY me_code DESC;");

//얻어온 me_code를 분리한다.
$me_code = substr($codeLoad['me_code'],0,2);

$sql = " select *
				from {$g5['menu_table']}
				where me_use = '1'
				  and length(me_code) = '".strlen($me_code)."'
				  and substring(me_code, 1, 2) = '{$me_code}'
				order by me_order, me_id ";

$result = sql_query($sql, false);
?>

<script>
$(document).ready(function(){
	$(".nav-link").click(function(){
		var check = $(this).hasClass("active");

		if(check)
		{
			$(this).removeClass("active");
			$(this).removeClass("text-color-primary");
			$(this).nextAll("ul").addClass("bl-none");
		}
		else
		{
			$(this).addClass("active");
			$(this).addClass("text-color-primary");
			$(this).nextAll("ul").removeClass("bl-none");
		}
		
	});
});

</script>

<style>
.text-color-primary {color:#4ebcfb !important;}
.nav-item .active{color:#4ebcfb !important;}
.bl-none{ display:none !important; }
</style>

<div class="blog-left-side widget">
	<div class="widget widget_categories">
		<h2 class="widget-title"><?= $gr_id["gr_subject"] ?></h2>
		<ul>
			<?php for ($i = 0; $row = sql_fetch_array($result); $i++) : ?>
    			<?php 
    			$sql2 = " select *
    				from {$g5['menu_table']}
    				where me_use = '1'
    				  and length(me_code) = '4'
    				  and substring(me_code, 1, 2) = '{$row['me_code']}'
    				order by me_order, me_id ";
    			
    			$result2 = sql_query($sql2);
    			
    			for ($k = 0; $row2 = sql_fetch_array($result2); $k++) :
    			
        			$sql3 = " select *
        				from {$g5['menu_table']}
        				where me_use = '1'
        				  and length(me_code) = '6'
        				  and substring(me_code, 1, 4) = '{$row2['me_code']}'
        				order by me_order, me_id ";
        			
        			$result3 = sql_query($sql3);
        			
        			$sqlCnt3 = " select count(*) as cnt
        				from {$g5['menu_table']}
        				where me_use = '1'
        				  and length(me_code) = '6'
        				  and substring(me_code, 1, 4) = '{$row2['me_code']}'
        				order by me_order, me_id ";
        			
        			$resultCnt3 = sql_fetch($sqlCnt3);
        			
        			$deps2Link = $row2["me_link"];
        			if($resultCnt3["cnt"] != 0)
        			{
        			    $deps2Link = "javascript:void(0);";
        			}
    			?>
    			<li class="nav-item ">
    				<a class="nav-link <?= substr($codeLoad["me_code"], 0, 4)  == $row2["me_code"] ? "active text-color-primary" : ""?>" href="<?= $deps2Link ?>"><?= $row2["me_name"] ?></a>
    				<ul class="<?= substr($codeLoad["me_code"], 0, 4)  == $row2["me_code"] ? "" : "bl-none"?>">
    				<?php for ($j = 0; $row3 = sql_fetch_array($result3); $j++) :?>
    					<li class="nav-item"><a class="nav-link <?= $codeLoad["me_code"] == $row3["me_code"] ? "active text-color-primary" : ""?>" href="<?= $row3["me_link"] ?>"><?= $row3["me_name"] ?></a></li>
    				<?php endfor; ?>
    				</ul>
    			</li>
    			<?php endfor; ?>
    		<?php endfor; ?>
		</ul>
	</div>
</div>