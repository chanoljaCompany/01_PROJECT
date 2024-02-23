<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("$g4[path]/lib/latest_wr.lib.php");
?>

<table width="<?=$width?>" align="center">
  <tr>
    <td>
<!-- 
<? for ($t=0; $t<count($list); $t++) { ?>
<?
$p_seven = explode("|",$list[$t][wr_7]);
$seven01 = $p_seven[0];
$seven06 = $p_seven[5];
?>
<? } ?>
<?=subject_sort_link('wr_datetime', $qstr2, 1)?>등록일순</a> | <?=subject_sort_link('wr_5', $qstr2, 1)?>가격별</a> | <?=subject_sort_link('seven06', $qstr2, 1)?>주행거리</a> | <?=subject_sort_link('seven01', $qstr2, 1)?>차량연식</a> | <?=subject_sort_link('wr_hit', $qstr2, 1)?>조회순</a> -->

        <table width="100%" cellpadding="0" cellspacing="0" >
          <form name="fboardlist" method="post">
            <input type="hidden" name="bo_table" value="<?=$bo_table?>">
            <input type="hidden" name="sfl"  value="<?=$sfl?>">
            <input type="hidden" name="stx"  value="<?=$stx?>">
            <input type="hidden" name="spt"  value="<?=$spt?>">
            <input type="hidden" name="page" value="<?=$page?>">
            <input type="hidden" name="sw"   value="">
            <tr>
              <td>
<table width="100%" height="32" cellpadding="3" bgcolor="#5C5C5C">
  <tr> 
    <td width="110" align="center" class="whites">사진</td>
    <td align="center" class="whites">차명/차량정보</td>
    <td width="50" align="center" class="whites">연식</td>
    <td width="60" align="center" class="whites">변속기</td>
    <td width="70" align="center" class="whites">주행거리</td>
    <td width="80" align="center" class="whites">가격</td>
    <td width="40" align="center" class="whites">비고</td>
  </tr>
</table>
<div style="height:5px"></div>
<table width="100%" cellpadding="0" cellspacing="0" >
<? for ($i=0; $i<count($list); $i++) { ?>
<?
$noimg = $board_skin_path."/img/noimg.gif";
$image = urlencode($list[$i][file][0][file]); 
$ori="$g4[path]/data/file/$bo_table/" . $image;
$ext = strtolower(substr(strrchr($ori,"."), 1)); 
if ( $ext=="gif"||$ext=="jpg"||$ext=="jpeg"||$ext=="png"||$ext=="bmp"||$ext=="tif"||$ext=="tiff") $ori_info=getimagesize($ori); else $ori_info="";
if ( $ori_info[2]=="2" || $ori_info[2]=="3" ) { 
$thum = $ori.".Thum" ;
} else if ( $ori_info[2]=="1" || $ori_info[2]=="6" || $ori_info[2]=="7" ) { 
$thum = $ori ;
} else { 
$thum = $noimg ;
}


$p_four = explode("|",$list[$i][wr_4]);
$four01 = $p_four[0];
$four02 = $p_four[1];
$four03 = $p_four[2];
$four04 = $p_four[3];
$four05 = $p_four[4];
$four06 = $p_four[5];
$four07 = $p_four[6];
$four08 = $p_four[7];
$four09 = $p_four[8];
$four10 = $p_four[9];

$p_seven = explode("|",$list[$i][wr_7]);
$seven01 = $p_seven[0];
$seven02 = $p_seven[1];
$seven03 = $p_seven[2];
$seven04 = $p_seven[3];
$seven05 = $p_seven[4];
$seven06 = $p_seven[5];
$seven07 = $p_seven[6];
$seven08 = $p_seven[7];
$seven09 = $p_seven[8];
$seven10 = $p_seven[9];
?>
                  <tr <? if ($list[$i][is_notice]) { ?>bgcolor="#F9F9FF"<? } else if ($wr_id == $list[$i][wr_id]) { ?>bgcolor="#FFF9F9"<? }?>>
                  <td onMouseOver=this.style.backgroundColor='#fafafa' onMouseOut=this.style.backgroundColor=''><table width="100%" cellpadding="3" >
                        <tr align="center">
                          <td width="110" height="90" align="center"> <table cellpadding="2" cellspacing="1" bgcolor="eeeeee" >
                          <tr>
                            <td bgcolor="ffffff"><a href='<?=$g4[path]?>/data/file/<?=$bo_table?>/<?=$image?>') class='highslide' onclick='return hs.expand(this)' ><img src='<?=$thum?>' width="90" height="70" border='0'></a><? $image = getimagesize($ori); ?></td>
                          </tr>
                      </table></td>
                          <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <tr>
    <td height="20"><? if ($is_checkbox) { ?><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"><? } ?>
<? if ($four09 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_9.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four01 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_1.gif" border="0" align="absmiddle">&nbsp;<? } elseif ($four02 == "20") {?><img src="<?=$board_skin_path?>/img/icon_2.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four03 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_3.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four04 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_4.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<a href='<?=$list[$i][href]?>'><span class="text01">
<? if ($list[$i][wr_8] == "브랜드(전체)") { ?><? } else {?><strong><?=$list[$i][wr_8]?></strong><? } ?>
</span></a>
</td>
  </tr>
    <td height="30">
<a href='<?=$list[$i][href]?>'><span class="text01">
<? if ($list[$i][wr_9] == "모델(전체)") { ?><? } else {?><?=$list[$i][wr_9]?> <? } ?>
<? if ($list[$i][wr_10] == "등급(전체)") { ?><? } else {?>(<?=$list[$i][wr_10]?>)<? } ?>
</span></a>
<? if ($four10 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_10.gif" border="0" align="absmiddle">&nbsp;<? } ?>
</td>
  </tr>
  <tr>
    <td height="20">
<a href='<?=$list[$i][href]?>'><span class="text03"><?=$list[$i][subject]?></span></a>
<?=$list[$i][icon_new]?>
<?=$list[$i][icon_hot]?></td>
  </tr>
</table>
</td>
                          <td width="50" align="center"><?=$seven01?>.<?=$seven02?></td>
                          <td width="60" align="center"><?=$seven05?></td>
                          <td width="70" align="center"><? if ($list[$i][wr_link1] == "새차") { ?><?=$list[$i][wr_link1]?><? } else {?><?=$seven06?> km<? } ?></td>
                          <td width="80" align="right"><? if ($list[$i][wr_nogood] == "10") { ?><img src="<?=$board_skin_path?>/img/icon_end.gif" border="0" align="absmiddle"><? } else {?><font color='#333333'><strong><?=$list[$i][wr_5]?></strong></font> 만원<? } ?></td>
                          <td width="40" align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? if ($four06 == "20") { ?><tr>
    <td height="17" align="center"><img src="<?=$board_skin_path?>/img/icon_6.gif" border="0" align="absmiddle"></td>
  </tr><? } ?>
<? if ($four05 == "20") { ?><tr>
    <td height="17" align="center"><img src="<?=$board_skin_path?>/img/icon_5.gif" border="0" align="absmiddle"></td>
  </tr><? } ?>
<? if ($four07 == "20") { ?><tr>
    <td height="17" align="center"><img src="<?=$board_skin_path?>/img/icon_7.gif" border="0" align="absmiddle"></td>
  </tr><? } ?>
<? if ($four04 == "20") { ?><tr>
    <td height="17" align="center"><img src="<?=$board_skin_path?>/img/icon_4.gif" border="0" align="absmiddle"></td>
  </tr><? } ?>
</table>
</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td height="1" bgcolor="eeeeee"></td>
                  </tr>
                  <? } ?>
                  <? if (count($list) == 0) { echo "<tr><td height=100 align=center> 게시물이 없습니다.</td></tr>"; } ?>
              </table></td>
            </tr>
          </form>
      </table>
        </td>
  </tr>
</table>