<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$mod = $board[bo_gallery_cols];
$td_width = (int)(100 / $mod);
?>
          <form name="fboardlist" method="post">
            <input type="hidden" name="bo_table" value="<?=$bo_table?>">
            <input type="hidden" name="sfl"  value="<?=$sfl?>">
            <input type="hidden" name="stx"  value="<?=$stx?>">
            <input type="hidden" name="spt"  value="<?=$spt?>">
            <input type="hidden" name="page" value="<?=$page?>">
            <input type="hidden" name="sw"   value="">
<table width="<?=$width?>" align="center">
  <tr>
<? 
for ($i=0; $i<count($list); $i++) 
{ 
    if ($i && $i%$mod==0)
        echo "</tr><tr>";
		
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
<td align="center" valign="top" onMouseOver=this.style.backgroundColor='#fafafa' onMouseOut=this.style.backgroundColor=''>
<table width="180" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" cellpadding="3" >
      <tr align="center">
        <td height="130" align="center"><table cellpadding="2" cellspacing="1" bgcolor="eeeeee" >
      <tr>
        <td bgcolor="ffffff"><a href='<?=$g4[path]?>/data/file/<?=$bo_table?>/<?=$image?>') class='highslide' onclick='return hs.expand(this)' ><img src='<?=$thum?>' width="140" height="110" border='0'></a><? $image = getimagesize($ori); ?></td>
      </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="140" border="0" cellpadding="0" cellspacing="0" style="table-layout:fixed">
  <tr>
    <td height="38" align="center">
<? if ($list[$i][is_notice]) {?>
<a href='<?=$list[$i][href]?>'><span class="text01">
<? if ($list[$i][wr_8] == "브랜드(전체)") { ?><? } else {?>[<?=$list[$i][wr_8]?>] <? } ?>
<? if ($list[$i][wr_9] == "모델(전체)") { ?><? } else {?><?=$list[$i][wr_9]?> <? } ?>
<? if ($list[$i][wr_10] == "등급(전체)") { ?><? } else {?>(<?=$list[$i][wr_10]?>)<? } ?>
</span></a>
<? } else {?>
<? if ($four02) echo '<b>';?>
<? if ($four03) echo '<span class="text02">';?>
<a href='<?=$list[$i][href]?>'>
<? if ($list[$i][wr_8] == "브랜드(전체)") { ?><? } else {?>[<?=$list[$i][wr_8]?>] <? } ?>
<? if ($list[$i][wr_9] == "모델(전체)") { ?><? } else {?><?=$list[$i][wr_9]?> <? } ?>
<? if ($list[$i][wr_10] == "등급(전체)") { ?><? } else {?>(<?=$list[$i][wr_10]?>)<? } ?>
<? if ($four02) echo '</b>';?>
<? if ($four03) echo '</span>';?>
</a>
<? }?></td>
  </tr>
  <tr>
    <td height="20" align="center"><?=$seven01?>.<?=$seven02?> / <?=$seven05?><? if ($four08 == "20") { ?> / <img src="<?=$board_skin_path?>/img/icon_8.gif" border="0" align="absmiddle"><? } ?></td>
  </tr>
  <tr>
    <td height="20" align="center">
    <? if ($list[$i][wr_link1] == "새차") { ?><img src="<?=$board_skin_path?>/img/icon_1.gif" border="0" align="absmiddle">
    <? } else {?><?=$seven06?> km
    <? } ?>
    <? if ($four10 == "20") { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_10.gif" border="0" align="absmiddle"><? } ?></td>
  </tr>
  <tr>
    <td style="padding-bottom:10px" align="center"><? if ($is_checkbox) { ?>
      <input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>">&nbsp;<? } ?>
      <? if ($four09 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_9.gif" border="0" align="absmiddle">&nbsp;
      <? } elseif ($four03 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_3.gif" border="0" align="absmiddle"><? } ?>
      <? if ($list[$i][wr_nogood] == "10") { ?><img src="<?=$board_skin_path?>/img/icon_end.gif" border="0" align="absmiddle"><? } else {?><font color='#333333'><strong><?=$list[$i][wr_5]?></strong></font> 만원<? } ?></td>
  </tr>

  <tr>
    <td height="20" align="center">
<? if ($four07 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_7.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four06 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_6.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four05 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_5.gif" border="0" align="absmiddle"><? } ?></td>
  </tr>
</table>

    </td>
<? } ?>
<?
$cnt = $i%$mod;
if ($cnt)
    for ($i=$cnt; $i<$mod; $i++)
        echo "<td width='{$td_width}%'>&nbsp;</td>";
?>
</tr>
<tr><td colspan=<?=$mod?> height=1 bgcolor=#E7E7E7></td></tr>

<? if (count($list) == 0) { echo "<tr><td colspan='$mod' height=100 align=center>매물이 없습니다.</td></tr>"; } ?>
<tr><td colspan=<?=$mod?> bgcolor=#eeeeee height=1>
</table>
</form>