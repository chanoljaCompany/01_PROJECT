<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
$mod = 5;
?>
<table width="96%" cellpadding="0" cellspacing="0"><tr>
<? for ($i=0; $i<count($list); $i++) { 

$noimg = $latest_skin_path."/img/noimg.gif";
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
?>

<?
if ($i>0 && $i%$mod==0) { echo "</tr><tr>"; }
?>

<?
$p_four = explode("|",$list[$i][wr_4]);
$four01 = $p_four[0];
$four02 = $p_four[1];
$four03 = $p_four[2];
$four04 = $p_four[3];
$four05 = $p_four[4];

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
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="90" align="center" valign="middle"><table cellpadding="2" cellspacing="1" bgcolor="e4e4e4">
        <tr>
<td align="center" onMouseOver=this.style.backgroundColor='#ff6600' onMouseOut=this.style.backgroundColor=''><a href='<?=$g4[path]?>/data/file/<?=$bo_table?>/<?=$image?>') class='highslide' onclick='return hs.expand(this)' ><img src='<?=$thum?>' width="110" height="80" border='0'></a><? $image = getimagesize($ori); ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="80" align="center" valign="top"><table width="120" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed">
  <tr>
    <td height="40" align="center" valign="top" style="padding-top:5px">
<span class="text01"><a href='<?=$list[$i][href]?>'>
<? if ($list[$i][wr_8] == "브랜드(전체)") { ?><? } else {?>[<?=$list[$i][wr_8]?>] <? } ?>
<? if ($list[$i][wr_9] == "모델(전체)") { ?><? } else {?><?=$list[$i][wr_9]?> <? } ?>
<? if ($list[$i][wr_10] == "등급(전체)") { ?><? } else {?>(<?=$list[$i][wr_10]?>)<? } ?>
</a></span>    </td>
  </tr>
  <tr>
    <td height="20" align="center"><span class="small"><?=$seven01?>년식 / <?=$seven05?></span></td>
  </tr>
  <tr>
    <td height="20" align="center"><font color='#333333'><strong><?=$list[$i][wr_5]?></strong></font> 만원</td>
  </tr>
</table></td>
  </tr>
</table>
</td><? } ?>
<?
$nam = ($i%$mod);
for ($k=$nam; $k<$mod && $nam; $k++) 
{ echo "<td>&nbsp;</td>";}
?>
<? if (count($list) == 0) { echo "<td colspan=$mod class=bbs>내용이 없습니다.</td>"; } ?>
</tr></table>