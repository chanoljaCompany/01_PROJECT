<? 
$g4_path = "../../../";
include_once("$g4_path/common.php");
include_once("$board_skin_path/config.php");

    if ($wr_id) {
       $sql0 = " SELECT count(*) as cCount FROM g4_board_file WHERE bo_table = '$bo_table' AND wr_id = $wr_id ORDER BY wr_id, bf_no ASC";
    } else {
    	$sql0 = " SELECT count(*) as cCount FROM g4_board_file WHERE bo_table = '$bo_table' Order By wr_id, bf_no asc";
    }
    $row0 = sql_fetch($sql0);
    $Total_Cou = $row0[cCount];
    $cCount = 1;
    
?>
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height=2 bgcolor=#B0ADF5></td></tr> 
<tr><td height=30 bgcolor=#F8F8F9 style="padding:5 0 5 0;" nowrap>

<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($write[file]); $i++) 
{
    if ($write[file][$i][source] && !$write[file][$i][view]) 
    {
        $cnt++;
        echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href='{$write[file][$i][href]}' title='{$write[file][$i][content]}'><strong>{$write[file][$i][source]}</strong> ({$write[file][$i][size]}), Down : {$write[file][$i][download]}, {$write[file][$i][datetime]}</a></td></tr>";
    }
}
?>

<tr><td height=1 bgcolor=#E7E7E7></td></tr>
<!-- 갤러리 시작 -->
<tr> 
    <td height="150" style='word-break:break-all; padding:10px;' align=center>

			<table border="0" cellspacing="1" cellpadding="5">
					<td valign="top" align=center>
						<script>
						  function chgImg( imgname, dnimgname, imgdesc ) {
						    var LureExp = /<br>/gi;
						    document.gallery_img.src=imgname;
						    //document.f.dnimg.value=dnimgname;
						    document.descForm.desc.value=imgdesc.replace( LureExp, "\n" );
						  }
 						  function chgUrl( imgname, dnimgname, imgdesc ) {
						    var LureExp = /<br>/gi;
						    gallery_url.href=imgname;
						    //document.f.dnimg.value=dnimgname;
						   // document.descForm.desc.value=imgdesc.replace( LureExp, "\n" );
						  }

						</script>
<? if ($write[file][0][view])  { 
			for ($i=0; $i<=10; $i++) {
						             $image[$i] = "$g4[path]/data/file/$bo_table/".$write[file][$i][file];
									}
					    ?>
<a href="<?=$image[0]?>" name=gallery_url class='highslide' onclick='return hs.expand(this)'><img src="<?=$image[0]?>" name=gallery_img width="500" border=0 value=0></a>

<script language="JavaScript">
var target = document.getElementsByName('gallery_img');
var Init;
var H;
var W;
var tmpH;
var tmpW;
var Opacity = 100;
var GrayScale = 0;
var FH = 0;
var FV = 0;
var Inverse = 0;
var Command;

function action()
{
	Command = 'alpha(opacity=100, style=3, finishopacity=' + Opacity +') ';
	Command += (GrayScale == 1 ? 'gray ':'');
	Command += (FH == 1 ? 'FlipH ' : '');
	Command += (FV == 1 ? 'FlipV ' : '');
	Command += (Inverse == 1 ? 'Invert' : '');
	return Command;
}
function clearEffect()
{
for(i=0; i< target.length; i++) {
	Opacity = 100;
	GrayScale = 0;
	FH = 0;
	FV = 0;
	Inverse = 0;
	Command = "";	
	target[i].style.filter = action();
}
}
function increaseOpacity() {
for(i=0; i< target.length; i++) {
	
	if (Opacity >= 100) Opacity = 100;
	else Opacity += 10;
	target[i].style.filter = action();
}
}
function decreaseOpacity()
{
for(i=0; i< target.length; i++) {
	if (Opacity <= 0) Opacity = 0;
	else Opacity -= 10;	
	target[i].style.filter = action();
}
}
function gray()
{
for(i=0; i< target.length; i++) {
	if (GrayScale == 1) GrayScale = 0;
	else GrayScale = 1;
	target[i].style.filter = action();	
}
}
function vertical()
{
for(i=0; i< target.length; i++) {
	if (FV == 1) FV = 0;
	else FV = 1;
	target[i].style.filter = action();	
}
}
function horizontal()
{
for(i=0; i< target.length; i++) {
	if (FH == 1) FH = 0;
	else FH = 1;
	target[i].style.filter = action();	
}
}
function invert()
{
for(i=0; i< target.length; i++) {
	if (Inverse == 1) Inverse = 0;
	else Inverse = 1;
	target[i].style.filter = action();	
}
}
</SCRIPT>
					</td>
				</tr>
			</table>

</td></tr>

	<tr>
		<td valign="top" align=center nowrap><nobr>
			<form NAME="descForm">
			사진설명 : <input name="desc" style="BORDER:0px solid; width:455px; HEIGHT:17px; BACKGROUND-COLOR:#ffffff" readonly value="<?=$write[file][0][content]?>"><br><br>
		</td>
			</form>
	</tr>

	<tr>
		<td align=center>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[0]."','".$image[0]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][0][content]) )."' );chgUrl( '".$image[0]."','".$image[0]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][0][content]) )."' );\"" ?>> <img src="<?=$image[0]?>" width="80" height="60" align="absmiddle" border="0"></a>
<? }?>
			<? if ($write[file][1][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[1]."','".$image[1]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][1][content]) )."' );chgUrl( '".$image[1]."','".$image[1]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][1][content]) )."' );\"" ?>> <img src="<?=$image[1]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][2][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[2]."','".$image[2]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][2][content]) )."' );chgUrl( '".$image[2]."','".$image[2]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][2][content]) )."' );\"" ?>> <img src="<?=$image[2]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][3][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[3]."','".$image[3]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][3][content]) )."' );chgUrl( '".$image[3]."','".$image[3]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][3][content]) )."' );\"" ?>> <img src="<?=$image[3]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][4][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[4]."','".$image[4]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][4][content]) )."' );chgUrl( '".$image[4]."','".$image[4]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][4][content]) )."' );\"" ?>> <img src="<?=$image[4]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][5][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[5]."','".$image[5]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][5][content]) )."' );chgUrl( '".$image[5]."','".$image[5]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][5][content]) )."' );\"" ?>> <img src="<?=$image[5]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<div style="line-height:30%;"><br><? }?>
			<? if ($write[file][6][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[6]."','".$image[6]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][6][content]) )."' );chgUrl( '".$image[6]."','".$image[6]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][6][content]) )."' );\"" ?>> <img src="<?=$image[6]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][7][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[7]."','".$image[7]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][7][content]) )."' );chgUrl( '".$image[7]."','".$image[7]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][7][content]) )."' );\"" ?>> <img src="<?=$image[7]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][8][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[8]."','".$image[8]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][8][content]) )."' );chgUrl( '".$image[8]."','".$image[8]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][8][content]) )."' );\"" ?>> <img src="<?=$image[8]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][9][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[9]."','".$image[9]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][9][content]) )."' );chgUrl( '".$image[9]."','".$image[9]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][9][content]) )."' );\"" ?>> <img src="<?=$image[9]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][10][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[10]."','".$image[10]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][10][content]) )."' );chgUrl( '".$image[10]."','".$image[10]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][10][content]) )."' );\"" ?>> <img src="<?=$image[10]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][11][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[11]."','".$image[11]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][11][content]) )."' );chgUrl( '".$image[11]."','".$image[11]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][11][content]) )."' );\"" ?>> <img src="<?=$image[11]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? }?>
			<? if ($write[file][12][file]) {?>
			<a href=#1 <? echo "onClick=\"chgImg( '".$image[12]."','".$image[12]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][12][content]) )."' );chgUrl( '".$image[12]."','".$image[12]."','".ereg_replace("(\r\n|\n|\r)", "&nbsp;&nbsp;", strip_tags($write[file][12][content]) )."' );\"" ?>> <img src="<?=$image[12]?>" width="80" height="60" align="absmiddle" border="0"></a>
			<? } ?>
     </td>
	</tr>
	<tr>
		<td valign="top">
			<?if ($write[content])  {?>
			<br><?=$write[content];?>
			<?}else{?>
			<br>
			<?}?>
		</td>
	</tr>	
	



</table><br>

</td></tr></table><br>

<script language="JavaScript">
// HTML 로 넘어온 <img ... > 태그의 폭이 테이블폭보다 크다면 테이블폭을 적용한다.
function resize_image()
{
    var target = document.getElementsByName('gallery_img');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;
</SCRIPT>