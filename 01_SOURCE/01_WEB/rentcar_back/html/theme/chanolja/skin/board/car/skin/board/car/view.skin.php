<?
if (!defined("_GNUBOARD_")) exit;

include_once("$board_skin_path/config.php");
?>
<link rel='stylesheet' href='<?=$board_skin_path?>/style.css' type='text/css'>

<script language="JavaScript"> 
<!-- 
function OpenWin(url,intWidth,intHeight){ 
      window.open(url, "ReadSlideShow", "scrollbars=no, resizable=no, width="+intWidth+",height="+intHeight+" "); 
      return; 
} 
//--> 
</script>

<script>
  function chgImg( imgname, dnimgname, imgdesc) {
    var LureExp = /<br>/gi;
    document.gallery_img.src=imgname;
      }
</script>


<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" height="48" background="<?=$board_skin_path?>/img/tit_01.gif"></td>
    <td background="<?=$board_skin_path?>/img/tit_bg.gif">&nbsp;</td>
    <td width="11" background="<?=$board_skin_path?>/img/tit_end.gif"></td>
  </tr>
</table>


<table width="<?=$width?>" align="center" cellspacing="2" style="table-layout:fixed">
  <tr>
    <td><table width="100%" cellpadding="5" cellspacing="1">
    <tr><td height="1" bgcolor="#242424"></td></tr>
            <tr>
              <td height="30" bgcolor="EFEFEF" class="blueb"> &nbsp;
<? if ($four01 == "20" || $four04 == "20" || $four05 == "20" || $four06 == "20") { ?>
<? if ($four01 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_1.gif" border="0" align="absmiddle">&nbsp;<? } elseif ($four02 == "20") {?><img src="<?=$board_skin_path?>/img/icon_1.gif" border="0" align="absmiddle"><? } elseif ($four03 == "20") {?><img src="<?=$board_skin_path?>/img/icon_3.gif" border="0" align="absmiddle">&nbsp;<? } ?>
<? if ($four09 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_9.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?>
<? if ($four04 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_4.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?>
<? if ($four05 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_5.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?>
<? if ($four06 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_6.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?>
<? if ($four07 == "20") { ?><img src="<?=$board_skin_path?>/img/icon_7.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?>

<? } ?>
<b>[<?=$write[wr_8]?>] <?=$write[wr_9]?> - <?=$write[wr_10]?></b></td>
            </tr>
            <tr><td height="5"></td></tr>
          </table>
            <table width="100%" >
              <tr valign="top">
                <td width="240"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
<? if ($view[file][0][view])  {?>
                    <td width="350" align="center" valign="top">
                        <table cellpadding="2" cellspacing="1" bgcolor="dddddd" >
                          <tr>
<? 
   for ($i=0; $i<=9; $i++) {
        $image[$i] = "$g4[path]/data/file/$bo_table/".$view[file][$i][file];
        $text[$i]  = $view[file][$i][content];
	}
?>
                            <td bgcolor="ffffff">
				<? if ($view[file][0][file])  {?>
<img src="<?=$image[0]?>" name=gallery_img width="330" height="243" border=0 style="vertical-align: middle;cursor:pointer;" onClick="OpenWin('<?=$board_skin_path?>/slideshow.php?bo_table=<?=$bo_table?>&wr_id=<?=$wr_id?>',800,600); return false;">
                                      <? } else {?>
                                      <img src="<?=$board_skin_path?>/img/noimg.gif" border=0>
                                      <? } ?></td>
                          </tr>
                        </table>
						<table width="100%" cellpadding="5" >
                <tr>
                  <td align="center">
                      <? if ($view[file][0][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[0]."','".$image[0]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[0]) )."' );\"" ?>><img src="<?=$board_skin_path?>/img/p1.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][1][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[1]."','".$image[1]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[1]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p2.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][2][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[2]."','".$image[2]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[2]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p3.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][3][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[3]."','".$image[3]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[3]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p4.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][4][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[4]."','".$image[4]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[4]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p5.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][5][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[5]."','".$image[5]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[5]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p6.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][6][file]) {?><img src="<?=$board_skin_path?>/img/p07.gif" align="absmiddle" border="0">
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[6]."','".$image[6]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[6]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p7.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][7][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[7]."','".$image[7]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[7]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p8.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][8][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[8]."','".$image[8]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[8]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p9.gif" align="absmiddle" border="0"></a>
                      <? }?>
                      <? if ($view[file][9][file]) {?>
                      <a href=# <? echo "onMouseOver=\"chgImg( '".$image[9]."','".$image[9]."','".ereg_replace("(\r\n|\n|\r)", "<br>", strip_tags($text[9]) )."' );\"" ?>> <img src="<?=$board_skin_path?>/img/p10.gif" align="absmiddle" border="0"></a>
                      <? }?>                  </td>
                </tr>
            </table>
                        <? } else {?>
                        <table width="240" height="240" cellspacing="1" bgcolor="dddddd" >
                          <tr>
                            <td align="center" bgcolor="ffffff" class="bbs"><a href="./write.php?bo_table=<?=$bo_table?>&w=u&wr_id=<?=$wr_id?>">������ ����Ͽ� �ּ���.</a><br>
            (������ 240 * 240)</td>
                          </tr>
                        </table>
                        <? }?>                    </td>
                  </tr>
                </table></td>
                <td>
                  <table width="90%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#e1e1e0" style="table-layout:fixed">
                  <tr>
                    <td width="100" height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>�𵨸�</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$write[wr_8]?> <?=$write[wr_9]?></td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>�����</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$seven01?>�� <?=$seven02?>��</td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>��뿬��</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$seven04?></td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>��ⷮ</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$seven03?> CC</td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>���ӱ�</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$seven05?></td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>����Ÿ�</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><? if ($write[wr_link1] == "����") { ?><?=$write[wr_link1]?><? } else {?><?=$seven06?> km<? } ?><? if ($four10 == "20") { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_10.gif" border="0" align="absmiddle">&nbsp;<? } else {?><? } ?></td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>����</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><?=$seven07?></td>
                  </tr>
                  <tr>
                    <td height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>�������</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><? if ($write[wr_link1] == "����") { ?><?=$write[wr_link1]?><? } else {?><?=$seven08?><? } ?><? if ($four07 == "20") { ?>&nbsp;<img src="<?=$board_skin_path?>/img/icon_7.gif" border="0" align="absmiddle"><? } else {?><? } ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr valign="top">
                <td width="350" align="center"><? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('./scrap_popin.php?bo_table=$bo_table&wr_id=$wr_id');\"><img src='$board_skin_path/img/scrap.gif' border='0' align='absmiddle'></a> "; } ?></td>
                <td align="center"><table width="90%" border="0" cellpadding="2" cellspacing="1" bgcolor="#e1e1e0" style="table-layout:fixed">
                  <tr>
                    <td width="100" height="30" bgcolor="#f9f6f2" style="padding-left:10px;"><img src="<?=$board_skin_path?>/img/t.gif" border="0" align="absmiddle"> <b>��������</b></td>
                    <td bgcolor="#FFFFFF" style="padding-left:10px;"><? if ($write[wr_nogood] == "10") { ?><img src="<?=$board_skin_path?>/img/icon_end.gif" border="0" align="absmiddle"><? } else {?><font color="#FF0000"><strong><?=$write[wr_5]?></strong></font> ����<? } ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
    </table>

<div style="height:20px;"></div>


<? if ($write[wr_link1] == "�߰���") { ?>
<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="48" background="<?=$board_skin_path?>/img/jindan.gif"></td>
    <td background="<?=$board_skin_path?>/img/tit_bg.gif">&nbsp;</td>
    <td width="11" background="<?=$board_skin_path?>/img/tit_end.gif"></td>
  </tr>
</table>

<table width="<?=$width?>" align="center" cellspacing="2" bgcolor="#FFFFFF" >
<tr>
<td><table width="100%" cellpadding="5" cellspacing="1">
                <tr>
                  <td height="424" align="center" valign="middle" bgcolor="#FFFFFF">
                    <table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" background="<?=$board_skin_path?>/img/sago/sago_01.gif" width="600" height="63"></td>
  </tr>
  <tr>
    <td width="199"><table width="199" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td background="<?=$board_skin_path?>/img/sago/sago_02.gif" width="199" height="31"></td>
        </tr>
      <tr>
        <td height="30" background="<?=$board_skin_path?>/img/sago/sago_06.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17"></td>
            <td width="62" align="center"><? if ($seven09 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="61" align="center"><? if ($seven09 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="59" align="center"><? if ($seven09 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td background="<?=$board_skin_path?>/img/sago/sago_08.gif" width="199" height="116"></td>
        </tr>
    </table></td>
    <td width="401" rowspan="2"><table width="401" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" background="<?=$board_skin_path?>/img/sago/sago_03.gif" width="401" height="25"></td>
        </tr>
      <tr>
        <td background="<?=$board_skin_path?>/img/sago/sago_04.gif" width="185" height="293"></td>
        <td width="216"><table width="216" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td background="<?=$board_skin_path?>/img/sago/sago_05.gif" width="216" height="19"></td>
          </tr>
          <tr>
            <td height="22" background="<?=$board_skin_path?>/img/sago/sago_07.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven17 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven17 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_09.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven18 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven18 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_10.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven19 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven19 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="17" background="<?=$board_skin_path?>/img/sago/sago_11.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven20 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven20 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_12.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven21 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven21 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>

          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_13.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven22 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven22 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="19" background="<?=$board_skin_path?>/img/sago/sago_14.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven23 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven23 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_15.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven24 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven24 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_17.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven25 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven25 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_19.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven26 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven26 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_21.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven27 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven27 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_23.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven28 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven28 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_25.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven29 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven29 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_27.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven30 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven30 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_29.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><? if ($seven31 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="45" align="center"><? if ($seven31 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="199" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="19" background="<?=$board_skin_path?>/img/sago/sago_16.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven10 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven10 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven10 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_18.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven11 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven11 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven11 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_20.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven12 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven12 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven12 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="17" background="<?=$board_skin_path?>/img/sago/sago_22.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven13 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven13 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven13 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="32" background="<?=$board_skin_path?>/img/sago/sago_24.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven14 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven14 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven14 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="19" background="<?=$board_skin_path?>/img/sago/sago_26.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven15 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven15 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven15 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_28.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><? if ($seven16 == "0") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="29" align="center"><? if ($seven16 == "1") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
            <td width="26" align="center"><? if ($seven16 == "2") { ?><img src="<?=$board_skin_path?>/img/check_box_01.gif" align="absmiddle"><? } ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" background="<?=$board_skin_path?>/img/sago/sago_30.gif" width="600" height="23"></td>
  </tr>
</table>
                  </td>
              </tr></table></td></tr></table>
<? } ?>                   
                   
                   
                   
<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" height="48" background="<?=$board_skin_path?>/img/tit_02.gif"></td>
    <td background="<?=$board_skin_path?>/img/tit_bg.gif">&nbsp;</td>
    <td width="11" background="<?=$board_skin_path?>/img/tit_end.gif"></td>
  </tr>
</table>                  
                   

<table width="<?=$width?>" align="center" cellspacing="2">
          <tr>
            <td align="center">        
<table width="725" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="151" height="48" align="center" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_00.gif" align="absmiddle"></td>
    <td width="79" valign="middle" bgcolor="#FFFFFF" style="padding-left:20px;"><? if ($six01 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�⺻����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�⺻����</font><? } ?></td>
    <td width="104" valign="middle" bgcolor="#FFFFFF"><? if ($six02 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����Ÿ�̾�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����Ÿ�̾�</font><? } ?></td>
    <td width="58" valign="middle" bgcolor="#FFFFFF"><? if ($six03 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Jack</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Jack</font><? } ?></td>
    <td valign="middle" bgcolor="#FFFFFF"><? if ($six04 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��޼���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��޼���</font><? } ?></td>
  </tr>
</table>
    </td>
  </tr>
</table>
        
<table width="<?=$width?>" align="center" cellspacing="2">
          <tr>
            <td align="center">
<table width="725" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td width="151" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_01.gif" width="151" height="28"></td>
    <td width="146" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_02.gif" width="146" height="28"></td>
    <td width="145" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_03.gif" width="145" height="28"></td>
    <td width="145" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_04.gif" width="145" height="28"></td>
    <td width="138" bgcolor="#FFFFFF"><img src="<?=$board_skin_path?>/img/op_05.gif" width="138" height="28"></td>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
      <tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><? if ($six05 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�Ŀ��ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�Ŀ��ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><? if ($six06 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six07 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>����/����ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">����/����ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six08 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ƿƼ�ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ƿƼ�ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six09 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six10 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ӵ��������ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ӵ��������ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six11 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ڷ��������ڵ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ڷ��������ڵ�</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six12 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ڵ鸮����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ڵ鸮����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six51 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six20 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�Ŀ������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�Ŀ������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six21 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�Ŀ�������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�Ŀ�������</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six22 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six23 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���ڵ� ������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���ڵ� ������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six24 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�¿쵶��������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�¿쵶��������</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six37 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six38 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ĳ�󸶽����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ĳ�󸶽����</font><? } ?></td>
      </tr>
<? if ($six65 == "��������Ʈž" || $six66 == "��������Ʈž" || $six67 == "Ż�����ϵ�ž" || $six68 == "�����ϵ�ž") { ?>
      <tr>
        <td height="20" valign="middle"><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong><?=$six65?><?=$six66?><?=$six67?><?=$six68?></strong></td>
      </tr>
<? } ?>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six56 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����ɸ���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����ɸ���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six36 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�˷�̴���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�˷�̴���</font><? } ?></td>
      </tr>
<tr><td height="10"></td></tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six25 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six26 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six27 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���̵忡���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���̵忡���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six28 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ŀư�����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ŀư�����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six29 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��忡���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��忡���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six30 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>������ȣ�����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">������ȣ�����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six31 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�°����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�°����������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six63 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ѿ�����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ѿ�����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six79 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ŭ��¡ ���̵�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ŭ��¡ ���̵�</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six55 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��ũƮ�δ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��ũƮ�δ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six57 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��/�Ĺ� ������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��/�Ĺ� ������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six58 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�Ĺ氨�������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�Ĺ氨�������</font><? } ?></td>

      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six59 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>����Ʈ����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">����Ʈ����</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six46 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�������Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�������Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six62 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>����������/�ͼ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">����������/�ͼ�</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six32 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�������̽Ĺ̷�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�������̽Ĺ̷�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six88 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ECM��̷�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ECM��̷�</font><? } ?></td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
<td height="20" valign="middle"> <? if ($six44 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ÿ�̾�з�ǥ����ġ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ÿ�̾�з�ǥ����ġ</font><? } ?></td>
      </tr>
      <tr>
<td height="20" valign="middle"> <? if ($six53 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">����������</font><? } ?></td>
      </tr>
      <tr>
<td height="20" valign="middle"> <? if ($six61 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���μ���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���μ���</font><? } ?></td>
      </tr>
      <tr>
<td height="20" valign="middle"> <? if ($six60 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��Ʈ�δ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��Ʈ�δ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six47 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ũ������Ʈ��</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ũ������Ʈ��</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six70 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ABC</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ABC</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six71 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ABS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ABS</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six72 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ASC</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ASC</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six73 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ASR</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ASR</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six74 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>AQS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">AQS</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six76 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>BAS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">BAS</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six80 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>DSC</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">DSC</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six81 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>DTR</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">DTR</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six83 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>EBD</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">EBD</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six84 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ECS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ECS</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six85 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>EDC</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">EDC</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six86 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>ESP</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">ESP</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six88 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>TCS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">TCS</font><? } ?></td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six13 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���׽�Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���׽�Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six14 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�Ŀ���Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�Ŀ���Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six15 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���¼����ҽ�Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���¼����ҽ�Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six16 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�޸𸮽�Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�޸𸮽�Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six17 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��ǳ��Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��ǳ��Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six18 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>������Ʈ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">������Ʈ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six39 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���߹�ħ��ġ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���߹�ħ��ġ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six54 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��Ű����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��Ű����</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six19 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six92 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���� �޺�������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���� �޺�������</font><? } ?></td>
      </tr>      
      <tr>
        <td height="20" valign="middle"> <? if ($six33 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six75 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>AV�ý���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">AV�ý���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six82 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>DVD</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">DVD</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six89 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>VCD</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">VCD</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six43 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>���¼�TV</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">���¼�TV</font><? } ?></td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six77 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>CD�÷��̾�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">CD�÷��̾�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six78 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>CDü����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">CDü����</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six42 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ʈ����ǻ��</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ʈ����ǻ��</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six35 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�׺���̼�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�׺���̼�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six87 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>GPS</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">GPS</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six64 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ű������Ʈ���ý���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ű������Ʈ���ý���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six34 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�ڵ����������ġ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�ڵ����������ġ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six48 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����������</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six49 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����õ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����õ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six50 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����溸��ġ</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����溸��ġ</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six48 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>�����������</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">�����������</font><? } ?></td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six69 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>4WD</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">4WD</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six40 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ʃ�׿����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ʃ�׿����</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six41 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>Ʃ�׾˷�̴���</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">Ʃ�׾˷�̴���</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six90 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>������Ϸ�</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">������Ϸ�</font><? } ?></td>
      </tr>
      <tr>
        <td height="20" valign="middle"> <? if ($six52 == "1") { ?><img src="<?=$board_skin_path?>/img/o.gif" border="0" align="absmiddle"> <strong>��Ʈ����</strong><? } else {?><img src="<?=$board_skin_path?>/img/v.gif" border="0" align="absmiddle"> <font color="#d2d2d2">��Ʈ����</font><? } ?></td>
      </tr>
    </table></td>
  </tr>
</table></td>
                </tr>
            </table>


<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" height="48" background="<?=$board_skin_path?>/img/tit_03.gif"></td>
    <td background="<?=$board_skin_path?>/img/tit_bg.gif">&nbsp;</td>
    <td width="11" background="<?=$board_skin_path?>/img/tit_end.gif"></td>
  </tr>
</table>
        
<table width="<?=$width?>" align="center" border="0" cellpadding="5" cellspacing="2">
          <tr>
                            <td style="word-break:break-all; padding:10px;"><span id="writeContents"><?=$view[content];?></span><!-- �׷� �±� ������ --></xml></xmp><a href=""></a><a href=''></a></td>
                          </tr>
                          <? if ($is_signature) { echo "<tr><td align=right>$signature<br><br></td></tr>"; } // ���� ��� ?>
                </tr>
          </tr>
</table>

<table width="<?=$width?>" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td width="110" height="48" background="<?=$board_skin_path?>/img/tit_04.gif"></td>
    <td background="<?=$board_skin_path?>/img/tit_bg.gif">&nbsp;</td>
    <td width="11" background="<?=$board_skin_path?>/img/tit_end.gif"></td>
  </tr>
</table>

<table width="<?=$width?>" align="center" >
  <tr>
    <td><? include_once("./view_comment.php"); ?></td>
  </tr>
</table>

<table width="<?=$width?>" align="center" cellpadding="3">
  <tr>
	<td><? echo "<a href=\"$list_href\"><img src=\"$board_skin_path/img/list.gif\" border=0 align=absmiddle></a> "; ?>
        <? if ($update_href) { echo "<a href=\"$update_href\"><img src=\"$board_skin_path/img/update.gif\" border=0 align=absmiddle></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src=\"$board_skin_path/img/delete.gif\" border=0 align=absmiddle></a> "; } ?>
        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src=\"$board_skin_path/img/copy.gif\" border=0 align=absmiddle></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src=\"$board_skin_path/img/move.gif\" border=0 align=absmiddle></a> "; } ?></td>
    <td align="right"><? echo "<a href=\"./write.php?bo_table=$bo_table\"><img src=\"$board_skin_path/img/write.gif\" border=0 align=absmiddle></a> "; ?>&nbsp;</td>
  </tr>
</table>

<script language="JavaScript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' ������ �ٿ�ε� �Ͻø� ����Ʈ�� ����(<?=number_format($board[bo_download_point])?>��)�˴ϴ�.\n\n����Ʈ�� �Խù��� �ѹ��� �����Ǹ� ������ �ٽ� �ٿ�ε� �ϼŵ� �ߺ��Ͽ� �������� �ʽ��ϴ�.\n\n�׷��� �ٿ�ε� �Ͻðڽ��ϱ�?"))<?}?>
    document.location.href=link;
}
</script>

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>