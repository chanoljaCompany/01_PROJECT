<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("$g4[path]/lib/latest_wr.lib.php");
?>

<link rel='stylesheet' href='<?=$board_skin_path?>/style.css' type='text/css'>

<style type="text/css">
.highslide {
	cursor: url(<?=$board_skin_path?>/highslide/graphics/zoomin.cur), pointer;
    outline: none;
}
.highslide img {
	border: 0px solid gray;
}
.highslide:hover img {
	border: 2px solid white;
}

.highslide-image {
    border: 2px solid white;
}
.highslide-image-blur {
}
.highslide-caption {
    display: none;
    
    border: 2px solid white;
    border-top: none;
    font-family: Verdana, Helvetica;
    font-size: 10pt;
    padding: 5px;
    background-color: white;
}
.highslide-loading {
    display: block;
	color: white;
	font-size: 9px;
	font-weight: bold;
	text-transform: uppercase;
    text-decoration: none;
	padding: 3px;
	border-top: 1px solid white;
	border-bottom: 1px solid white;
    background-color: black;
}
a.highslide-credits,
a.highslide-credits i {
    padding: 2px;
    color: silver;
    text-decoration: none;
	font-size: 10px;
}
a.highslide-credits:hover,
a.highslide-credits:hover i {
    color: white;
    background-color: gray;
}

.highslide-move {
    cursor: move;
}
.highslide-display-block {
    display: block;
}
.highslide-display-none {
    display: none;
}
.control {
	float: right;
    display: block;
    position: relative;
	margin: 0 5px;
	font-size: 9pt;
    font-weight: none;
	text-decoration: none;
	text-transform: uppercase;
    margin-top: 1px;
    margin-bottom: 1px;
}
.control:hover {
    border-top: 0px solid #333;
    border-bottom: 1px solid #333;
    margin-top: 0;
    margin-bottom: 0;
}
.control, .control * {
	color: #666;
}
</style>

<script type="text/javascript" src="<?=$board_skin_path?>/highslide/highslide.js"></script>

<script type="text/javascript">    
    hs.graphicsDir = '<?=$board_skin_path?>/highslide/graphics/';
    
    // Identify a caption for all images. This can also be set inline for each image.
    hs.captionId = 'the-caption';
    
    hs.outlineType = 'rounded-white';
    window.onload = function() {
        hs.preloadImages(5);
    }
</script>

<table border=0 cellpadding=0 cellspacing=0><tr><td height=30></td></tr></table>
<!-- 차량 세부검색 시작 -->
<script language="JavaScript" src='<?=$g4['path']?>/js/cars.js'></script>
<table border=0 cellpadding=0 cellspacing=0>
<form name=fsearch_cars METHOD="POST" action="<?=$g4['bbs_path']?>/board.php">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca value="<?=$sca?>">
<input type=hidden name=sfl value="wr_8||wr_9||wr_10">
<tr>
    <td><img src="<?=$board_skin_path?>/img/car_search.gif" align="absmiddle"></td>
    <td><select name=make onChange="makechange()" style="color:#2C2C2C; font-size:10pt"></select>
        <select name=brand onChange="brandchange()" style="color:#2C2C2C; font-size:10pt"></select>
        <select name=model style="color:#2C2C2C; font-size:10pt"></select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn3.gif" border=0 align=absmiddle onClick="onChangeKey();return false;">
	<input type=hidden name=sop value='and'>
	<input type=hidden name=stx value=''>
    </td>
</tr>
</form>
</table>
<?
 if ($srch_type != "") { $stx = ""; }
?>
<script language="JavaScript">
makeview();
brandview("");
modelview("", "");
</script>
<!-- 차량 세부검색 끝 -->

<p></p><p></p><p></p>

<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="110"><img src="<?=$board_skin_path?>/img/top_ti_bt.gif" width="110" height="28"></td>
    <td background="<?=$board_skin_path?>/img/top_ti_bg.gif">&nbsp;</td>
    <td width="12"><img src="<?=$board_skin_path?>/img/top_ti_end.gif" width="12" height="28"></td>
  </tr>
</table>
                  <table width="100%" cellpadding="5" >
                      <tr>
                        <td><?=latest_wr("car_sp", car, 5, 16, 3);?></td>
                      </tr>
                  </table></td>
          </tr>
        </table>
        
<div style="height:10px"></div>            
    <table width="100%" cellpadding="3">
        <tr>
<td>
<a href="<?="$PHP_SELF?bo_table=$bo_table"?><?if($wr_id){echo "&wr_id=$wr_id";}?><?if($page){echo "&page=$page";}?>&style=list"><img src='<?=$board_skin_path?>/img/btn_view_list.gif' border=0 align=absmiddle></a>
<a href="<?="$PHP_SELF?bo_table=$bo_table"?><?if($wr_id){echo "&wr_id=$wr_id";}?><?if($page){echo "&page=$page";}?>&style=thumb"><img src='<?=$board_skin_path?>/img/btn_view_thumb.gif' border=0 align=absmiddle></a> 
</td>
          <td align="right">총 <?=number_format($total_count)?> 건 
     <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
	 <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/icon_admin.gif" border="0" align="absmiddle"></a><? } ?>
	 </td>
        </tr>
      </table>

<!-- 쿠키 생성용 iframe -->
<iframe src="<?=$board_skin_path?>/make_cookie.php?type=<?=$_GET['style']?>" frameborder="0" width="0" height="0"></iframe>
<?
//목록을 쿠키에 따라 인클루드
if($_GET['style'] == "list"){
	$list_inc = "$board_skin_path/list.list.php";
}elseif($_COOKIE['liststyle']=='list'  && $_GET['style'] != "gallery" && $_GET['style'] != "webzine"){
	$list_inc = "$board_skin_path/list.list.php";
}
if($_GET['style'] == "thumb"){
	$list_inc = "$board_skin_path/list.thumb.php";
}elseif($_COOKIE['liststyle']=='thumb' && $_GET['style'] != "list" && $_GET['style'] != "webzine"){
	$list_inc = "$board_skin_path/list.thumb.php";
}
if(!$_GET['style'] && !$_COOKIE['liststyle']){
	$list_inc = "$board_skin_path/list.list.php";
}
include $list_inc;
?>
<!-- 페이지 -->

        <table width="100%" cellpadding="3" >
          <tr>
            <td align="center"><? if ($prev_part_href) { 
				  echo "<a href='$prev_part_href'>
				  <img src='$board_skin_path/img/search_prev.gif' border=0 align=absmiddle></a>"; } ?>
              <?
                //echo $write_pages;
                $write_pages = str_replace("처음", "<img src='$board_skin_path/img/page_first.gif' border='0' align='absmiddle'>", $write_pages);
                $write_pages = str_replace("이전", "<img src='$board_skin_path/img/page_prev.gif' border='0' align='absmiddle'>", $write_pages);
                $write_pages = str_replace("다음", "<img src='$board_skin_path/img/page_next.gif' border='0' align='absmiddle'>", $write_pages);
                $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/page_end.gif' border='0' align='absmiddle'>", $write_pages);
                $write_pages = preg_replace("/([0-9]*)/", "$1", $write_pages);
                $write_pages = preg_replace("/([0-9]*)/", "$1", $write_pages);
                ?>
              <?=$write_pages?>
              <? if ($next_part_href) { 
				echo "<a href='$next_part_href'>
				<img src='$board_skin_path/img/search_next.gif' border=0 align=absmiddle></a>"; } ?></td>
          </tr>
      </table>
      
        <table width="100%" cellpadding="3" >
          <tr>
            <td align="center">
<form name=fsearch method=get style="margin:0px;">
    <input type=hidden name=bo_table value="<?=$bo_table?>">
    <input type=hidden name=sca      value="<?=$sca?>">
	<input type=hidden name=sop      value="And"><td align="right"><select name=sfl>
        <option value='wr_subject||wr_content||wr_8||wr_9||wr_10'>차명</option>
        </select>
        <INPUT maxLength=15 size=15 name=stx itemname="검색어" required value="<?=$stx?>" class="input">
         <INPUT type=image src="<?=$board_skin_path?>/img/search.gif" border="0" align="absmiddle">
</form>
</td>
          </tr>
      </table>
      
        <table width="100%" cellpadding="3">
          <tr>
            <td><? if ($list_href) { ?>
                <a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/list.gif" border="0" align="absmiddle"></a>
                <? } ?>
                <? if ($write_href) { ?>
                <a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/write.gif" border="0" align="absmiddle"></a>
                <? } ?>
                <? if ($is_checkbox) { ?>
                <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/select_delete.gif" border="0" align="absmiddle"></a> 
				<a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/select_copy.gif" border="0" align="absmiddle"></a> 
				<a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/select_move.gif" border="0" align="absmiddle"></a>
                <? } ?>
            </td>
          </tr>
      </table>
      
      
      </td>
  </tr>
</table>

<? if ($is_checkbox) { ?>
<script language="JavaScript">

function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {

        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete()
{
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=400, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>