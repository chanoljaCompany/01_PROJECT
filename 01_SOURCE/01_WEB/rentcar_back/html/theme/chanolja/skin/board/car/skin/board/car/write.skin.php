<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$board_skin_path/config.php");
?>
<?
if ($w == "") {
	$title_msg = "차량등록";
 } else if ($w == "u") {
	$title_msg = "차량정보 수정";
 } else {
	$title_msg = "";
}
?>
<link rel='stylesheet' href='<?=$board_skin_path?>/style.css' type='text/css'>
<script type="text/javascript">

if (document.getElementById){
document.write('<style type="text/css">\n')
document.write('.content_box{display:none;}\n')
document.write('</style>\n')
}

function contractall(){
if (document.getElementById){
var inc=0
while (document.getElementById("message_box_"+inc)){
document.getElementById("message_box_"+inc).style.display="none"
inc++
}
}
}

function expandone(){
if (document.getElementById){
var selectedItem=document.fwrite.wr_link1.selectedIndex
contractall()
document.getElementById("message_box_"+selectedItem).style.display="block"
}
}

if (window.addEventListener)
window.addEventListener("load", expandone, false)
else if (window.attachEvent)
window.attachEvent("onload", expandone)

//숫자에 3 자리마다 콤마
function PointComma(formnum) { 
  
    num1 = formnum.length; 

        FirstNum = formnum.substr(0,1);
        FirstNum2 = formnum.substr(1,num1);
  
        if(FirstNum == "0"){ 
                alert("입력숫자는 0 으로 시작할 수 없습니다."); 
        return FirstNum2; 
                formnum = FirstNum2; 
        } 

        re = /^\$|,/g; 
    formnum = formnum.replace(re, "");

        document.fwrite.won.value=formnum;
        document.fwrite.cc.value=formnum;
        document.fwrite.km.value=formnum;
        
        var fieldnum = '' + formnum;    

        if (isNaN(fieldnum)) {
        alert("숫자만 입력하실 수 있습니다.");        
    document.fwrite[0].wr_1.value == ""; 
        document.fwrite[0].wr_1.focus(); 
        return ""; 
        } 
        else { 
        var comma = new RegExp('([0-9])([0-9][0-9][0-9][,.])'); 
        var Po = fieldnum.split('.'); 
        Po[0] += '.'; 
          do { 
            Po[0] = Po[0].replace(comma, '$1,$2'); 
            } while (comma.test(Po[0])); 

          if (Po.length > 1) { 
          return Po.join(''); 
          } 
          else { 
          return Po[0].split('.')[0]; 
                } 
        } 
} 
</script>
<script language="javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<table width="<?=$width?>" border="0" align="center" cellpadding="0" cellspacing="0">  
<form name="fwrite" method="post" action="javascript:fwrite_check(document.fwrite);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null>
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">
<tr>
<td>
<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td height="30" align="center" bgcolor="#5c5c5c"><span style="color: #FFFFFF; font-weight: bold;"><?=$title_msg?></span></td>
</tr>
</table>
<? if ($is_name) { ?>
<table width="100%" cellpadding="0" >
        <tr>
            <td><table width="100%" cellpadding="0" >
                <tr>
                  <td width="80">· 이름</td>
                  <td><input maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td background="<?=$board_skin_path?>/img/dot.gif" height="1"></td>
          </tr>
        </table>
<? } ?>
<? if ($is_password) { ?>
        <table width="100%" cellpadding="0" >
          <tr>
            <td><table width="100%" cellpadding="0" >
                <tr>
                  <td width="80">· 비밀번호</td>
                  <td><input type=password maxlength=20 size=15 name=wr_password itemname="비밀번호" <?=$password_required?>></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td background="<?=$board_skin_path?>/img/dot.gif" height="1"></td>
          </tr>
        </table>
<? } ?>
<? if ($is_email) { ?>
        <table width="100%" cellpadding="0" >
          <tr>
            <td><table width="100%" cellpadding="0" >
                <tr>
                  <td width="80">· 이메일</td>
                  <td><input size=50 name=wr_email email itemname="이메일" value="<?=$email?>"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td background="<?=$board_skin_path?>/img/dot.gif" height="1"></td>
          </tr>
        </table>
<? } ?>
<? if ($is_homepage) { ?>
        <table width="100%" cellpadding="0" >
          <tr>
            <td><table width="100%" cellpadding="0" >
                <tr>
                  <td width="80">· 홈페이지</td>
                  <td><input size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td background="<?=$board_skin_path?>/img/dot.gif" height="1"></td>
          </tr>
        </table>
<? } ?>

<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>기본정보</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                    <tr>
                      <td>· <b>모델유형 </b></td>
                      <td>
<script language="JavaScript" src='<?=$board_skin_path?>/cars.js'></script>
<select name=wr_8 onChange="wr_8change()" value="<?=$write[wr_8]?>"><option value="<?=$write[wr_8]?>"><?=$write[wr_8]?></option></select>
<select name=wr_9 onChange="wr_9change()" value="<?=$write[wr_9]?>"><option value="<?=$write[wr_9]?>"><?=$write[wr_9]?></option></select>
<select name=wr_10 value="<?=$write[wr_10]?>"><option value="<?=$write[wr_10]?>"><?=$write[wr_10]?></option></select>
<input type=hidden name=sop value='and'>
<?
 if ($srch_type != "") { $stx = ""; }
?>
<script language="JavaScript">
wr_8view();
wr_9view("");
wr_10view("", "");
</script>
                  </td>
                    </tr>
                    <tr>
                      <td width="80">· <b>모델설명</b></td>
                      <td><input name=wr_subject value="<?=$subject?>" style=width:80% itemname="모델명" required> ※간단히</td>
                    </tr>
                      <tr>
                        <td>· <b>종류</b></td>
                        <td><select name='wr_link1' itemname="종류" required onChange="expandone()">
<option value='새차' <? if($write[wr_link1] == '새차') echo " selected "; ?>>새차
<option value='중고차' <? if($write[wr_link1] == '중고차') echo " selected "; ?>>중고차
</select></td>
                      </tr>
                      <tr>
                        <td>· <b>차량가격</b></td>
                        <td><input name=wr_5 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.wr_5.value=PointComma(document.fwrite.wr_5.value)" itemname="차량가격" value="<?=$write[wr_5]?>"><input type="hidden" name="won"> 만원</td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>

<div id="message_box_0" class="content_box"></div>
<div id="message_box_1" class="content_box">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>

<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>차량진단 상세정보</b></td></tr>
</table>

<table width="600" align="center" cellspacing="2" bgcolor="#FFFFFF" >
<tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff">
<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2"><img src="<?=$board_skin_path?>/img/sago/sago_01.gif" width="600" height="63"></td>
  </tr>
  <tr>
    <td width="199"><table width="199" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="<?=$board_skin_path?>/img/sago/sago_02.gif" width="199" height="31"></td>
        </tr>
      <tr>
        <td height="30" background="<?=$board_skin_path?>/img/sago/sago_06.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="17"></td>
            <td width="62" align="center"><input type="checkbox" class="20box" name="seven09" value="0" <? if ($seven09 == '0') echo "checked";?>></td>
            <td width="61" align="center"><input type="checkbox" class="20box" name="seven09" value="1" <? if ($seven09 == '1') echo "checked";?>></td>
            <td width="59" align="center"><input type="checkbox" class="20box" name="seven09" value="2" <? if ($seven09 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
        </tr>
      <tr>
        <td><img src="<?=$board_skin_path?>/img/sago/sago_08.gif" width="199" height="116"></td>
        </tr>
    </table></td>
    <td width="401" rowspan="2"><table width="401" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2"><img src="<?=$board_skin_path?>/img/sago/sago_03.gif" width="401" height="25"></td>
        </tr>
      <tr>
        <td width="185"><img src="<?=$board_skin_path?>/img/sago/sago_04.gif" width="185" height="293"></td>
        <td width="216"><table width="216" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="<?=$board_skin_path?>/img/sago/sago_05.gif" width="216" height="19"></td>
          </tr>
          <tr>
            <td height="22" background="<?=$board_skin_path?>/img/sago/sago_07.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven17" value="0" <? if ($seven17 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven17" value="1" <? if ($seven17 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_09.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven18" value="0" <? if ($seven18 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven18" value="1" <? if ($seven18 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_10.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven19" value="0" <? if ($seven19 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven19" value="1" <? if ($seven19 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="17" background="<?=$board_skin_path?>/img/sago/sago_11.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven20" value="0" <? if ($seven20 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven20" value="1" <? if ($seven20 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_12.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven21" value="0" <? if ($seven21 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven21" value="1" <? if ($seven21 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_13.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven22" value="0" <? if ($seven22 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven22" value="1" <? if ($seven22 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="19" background="<?=$board_skin_path?>/img/sago/sago_14.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven23" value="0" <? if ($seven23 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven23" value="1" <? if ($seven23 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_15.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven24" value="0" <? if ($seven24 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven24" value="1" <? if ($seven24 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_17.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven25" value="0" <? if ($seven25 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven25" value="1" <? if ($seven25 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_19.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven26" value="0" <? if ($seven26 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven26" value="1" <? if ($seven26 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_21.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven27" value="0" <? if ($seven27 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven27" value="1" <? if ($seven27 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_23.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven28" value="0" <? if ($seven28 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven28" value="1" <? if ($seven28 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_25.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven29" value="0" <? if ($seven29 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven29" value="1" <? if ($seven29 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_27.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven30" value="0" <? if ($seven30 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven30" value="1" <? if ($seven30 == '1') echo "checked";?>></td>
                <td width="12"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="18" background="<?=$board_skin_path?>/img/sago/sago_29.gif"><table width="216" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="112"></td>
                <td width="47" align="center"><input type="checkbox" class="15box" name="seven31" value="0" <? if ($seven31 == '0') echo "checked";?>></td>
                <td width="45" align="center"><input type="checkbox" class="15box" name="seven31" value="1" <? if ($seven31 == '1') echo "checked";?>></td>
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
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven10" value="0" <? if ($seven10 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven10" value="1" <? if ($seven10 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven10" value="2" <? if ($seven10 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_18.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven11" value="0" <? if ($seven11 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven11" value="1" <? if ($seven11 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven11" value="2" <? if ($seven11 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_20.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven12" value="0" <? if ($seven12 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven12" value="1" <? if ($seven12 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven12" value="2" <? if ($seven12 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="17" background="<?=$board_skin_path?>/img/sago/sago_22.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven13" value="0" <? if ($seven13 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven13" value="1" <? if ($seven13 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven13" value="2" <? if ($seven13 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="32" background="<?=$board_skin_path?>/img/sago/sago_24.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven14" value="0" <? if ($seven14 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven14" value="1" <? if ($seven14 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven14" value="2" <? if ($seven14 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="19" background="<?=$board_skin_path?>/img/sago/sago_26.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven15" value="0" <? if ($seven15 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven15" value="1" <? if ($seven15 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven15" value="2" <? if ($seven15 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="18" background="<?=$board_skin_path?>/img/sago/sago_28.gif"><table width="199" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="116"></td>
            <td width="28" align="center"><input type="checkbox" class="15box" name="seven16" value="0" <? if ($seven16 == '0') echo "checked";?>></td>
            <td width="29" align="center"><input type="checkbox" class="15box" name="seven16" value="1" <? if ($seven16 == '1') echo "checked";?>></td>
            <td width="26" align="center"><input type="checkbox" class="15box" name="seven16" value="2" <? if ($seven16 == '2') echo "checked";?>></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><img src="<?=$board_skin_path?>/img/sago/sago_30.gif" width="600" height="23"></td>
  </tr>
</table>
                   </td></tr></table></td></tr></table>
</td>
  </tr>
</table>
</div>




<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>상세정보</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                      <tr>
                        <td>· <b>등록년식</b></td>
                        <td><select name='seven01' itemname="년" class="select02">
                <option value='2008' <? if($seven01 == 2008) echo " selected "; ?>>2008
                <option value='2007' <? if($seven01 == 2007) echo " selected "; ?>>2007
                <option value='2006' <? if($seven01 == 2006) echo " selected "; ?>>2006
                <option value='2005' <? if($seven01 == 2005) echo " selected "; ?>>2005
                <option value='2004' <? if($seven01 == 2004) echo " selected "; ?>>2004
                <option value='2003' <? if($seven01 == 2003) echo " selected "; ?>>2003
                <option value='2002' <? if($seven01 == 2002) echo " selected "; ?>>2002
                <option value='2001' <? if($seven01 == 2001) echo " selected "; ?>>2001
                <option value='2000' <? if($seven01 == 2000) echo " selected "; ?>>2000
                <option value='1999' <? if($seven01 == 1999) echo " selected "; ?>>1999
                <option value='1998' <? if($seven01 == 1998) echo " selected "; ?>>1998
                <option value='1997' <? if($seven01 == 1997) echo " selected "; ?>>1997
                <option value='1996' <? if($seven01 == 1996) echo " selected "; ?>>1996
                <option value='1995' <? if($seven01 == 1995) echo " selected "; ?>>1995
                <option value='1994' <? if($seven01 == 1994) echo " selected "; ?>>1994
                <option value='1993' <? if($seven01 == 1993) echo " selected "; ?>>1993
                <option value='1992' <? if($seven01 == 1992) echo " selected "; ?>>1992
                <option value='1991' <? if($seven01 == 1991) echo " selected "; ?>>1991
                <option value='1990' <? if($seven01 == 1990) echo " selected "; ?>>1990
                <option value='1989' <? if($seven01 == 1989) echo " selected "; ?>>1989
                <option value='1988' <? if($seven01 == 1988) echo " selected "; ?>>1988
                <option value='1987' <? if($seven01 == 1987) echo " selected "; ?>>1987
                <option value='1986' <? if($seven01 == 1986) echo " selected "; ?>>1986
                </select>
    년
    <select name='seven02' itemname="월" class="select02">
      <option value='1' <? if($seven02 == 1) echo " selected "; ?>>1
                <option value='2' <? if($seven02 == 2) echo " selected "; ?>>2
                <option value='3' <? if($seven02 == 3) echo " selected "; ?>>3
                <option value='4' <? if($seven02 == 4) echo " selected "; ?>>4
                <option value='5' <? if($seven02 == 5) echo " selected "; ?>>5
                <option value='6' <? if($seven02 == 6) echo " selected "; ?>>6
                <option value='7' <? if($seven02 == 7) echo " selected "; ?>>7
                <option value='8' <? if($seven02 == 8) echo " selected "; ?>>8
                <option value='9' <? if($seven02 == 9) echo " selected "; ?>>9
                <option value='10' <? if($seven02 == 10) echo " selected "; ?>>10
                <option value='11' <? if($seven02 == 11) echo " selected "; ?>>11
                <option value='12' <? if($seven02 == 12) echo " selected "; ?>>12
              </select>
    월</td>
                      </tr>
                      <tr>
                        <td>· <b>배기량</b></td>
                        <td><input name=seven03 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.seven03.value=PointComma(document.fwrite.seven03.value)" itemname="배기량" value="<?=$seven03?>"><input type="hidden" name="cc"> cc</td>
                      </tr>
                      <tr>
                        <td width="80">· <b>사용연료</b></td>
                        <td><INPUT type=radio name='seven04' required  VALUE="휘발유" <? if($seven04 == "휘발유")  echo "checked"; ?> > 휘발유 
                <INPUT type=radio name='seven04' required  VALUE="디젤유" <? if($seven04 == "디젤유")  echo "checked"; ?> > 디젤유 
                <INPUT type=radio name='seven04' required  VALUE="LPG" <? if($seven04 == "LPG")  echo "checked"; ?> > LPG 
                <INPUT type=radio name='seven04' required  VALUE="휘발유LPG겸용" <? if($seven04 == "휘발유LPG겸용")  echo "checked"; ?> > 휘발유LPG겸용 
                <INPUT type=radio name='seven04' required  VALUE="기타" <? if($seven04 == "기타")  echo "checked"; ?> > 기타 
                        </td>
                      </tr>
                      <tr>
                        <td>· <b>미션구분</b></td>
                        <td><INPUT type=radio name='seven05' required  VALUE="오토" <? if($seven05 == "오토")  echo "checked"; ?> > 오토 
                <INPUT type=radio name='seven05' required  VALUE="수동" <? if($seven05 == "수동")  echo "checked"; ?> > 수동 
                <INPUT type=radio name='seven05' required  VALUE="CVT" <? if($seven05 == "CVT")  echo "checked"; ?> > CVT 
                <INPUT type=radio name='seven05' required  VALUE="세미오토" <? if($seven05 == "세미오토")  echo "checked"; ?> > 세미오토 
</td>
                      </tr>
                      <tr>
                        <td width="80">· <b>주행거리</b></td>
                        <td><input name=seven06 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.seven06.value=PointComma(document.fwrite.seven06.value)" itemname="주행거리" value="<?=$seven06?>"><input type="hidden" name="km"> km</td>
                      </tr>
                      <tr>
                        <td>· <b>차량색상</b></td>
                        <td>
<select name='seven07' itemname="색상 선택" class="select02">
<option value='갈대색' <? if($seven07 == '갈대색') echo " selected "; ?>>갈대색
<option value='갈대투톤' <? if($seven07 == '갈대투톤') echo " selected "; ?>>갈대투톤
<option value='감은색' <? if($seven07 == '감은색') echo " selected "; ?>>감은색
<option value='감청색' <? if($seven07 == '감청색') echo " selected "; ?>>감청색
<option value='검붉은색' <? if($seven07 == '검붉은색') echo " selected "; ?>>검붉은색
<option value='검정' <? if($seven07 == '검정') echo " selected "; ?>>검정
<option value='검정투톤' <? if($seven07 == '검정투톤') echo " selected "; ?>>검정투톤
<option value='검쥐색' <? if($seven07 == '검쥐색') echo " selected "; ?>>검쥐색
<option value='겨자색' <? if($seven07 == '겨자색') echo " selected "; ?>>겨자색
<option value='겨자투톤' <? if($seven07 == '겨자투톤') echo " selected "; ?>>겨자투톤
<option value='고동색' <? if($seven07 == '고동색') echo " selected "; ?>>고동색
<option value='곤색' <? if($seven07 == '곤색') echo " selected "; ?>>곤색
<option value='곤색투톤' <? if($seven07 == '곤색투톤') echo " selected "; ?>>곤색투톤
<option value='국방색' <? if($seven07 == '국방색') echo " selected "; ?>>국방색
<option value='군청색' <? if($seven07 == '군청색') echo " selected "; ?>>군청색
<option value='금모래색' <? if($seven07 == '금모래색') echo " selected "; ?>>금모래색
<option value='금모래투톤' <? if($seven07 == '금모래투톤') echo " selected "; ?>>금모래투톤
<option value='금색' <? if($seven07 == '금색') echo " selected "; ?>>금색
<option value='금색투톤' <? if($seven07 == '금색투톤') echo " selected "; ?>>금색투톤
<option value='까치색' <? if($seven07 == '까치색') echo " selected "; ?>>까치색
<option value='까치투톤' <? if($seven07 == '까치투톤') echo " selected "; ?>>까치투톤
<option value='꽃자주색' <? if($seven07 == '꽃자주색') echo " selected "; ?>>꽃자주색
<option value='남색' <? if($seven07 == '남색') echo " selected "; ?>>남색
<option value='남색투톤' <? if($seven07 == '남색투톤') echo " selected "; ?>>남색투톤
<option value='노랑색' <? if($seven07 == '노랑색') echo " selected "; ?>>노랑색
<option value='노랑투톤' <? if($seven07 == '노랑투톤') echo " selected "; ?>>노랑투톤
<option value='노을색' <? if($seven07 == '노을색') echo " selected "; ?>>노을색
<option value='녹색' <? if($seven07 == '녹색') echo " selected "; ?>>녹색
<option value='녹색투톤' <? if($seven07 == '녹색투톤') echo " selected "; ?>>녹색투톤
<option value='담갈색' <? if($seven07 == '담갈색') echo " selected "; ?>>담갈색
<option value='담녹색' <? if($seven07 == '담녹색') echo " selected "; ?>>담녹색
<option value='담녹투톤' <? if($seven07 == '담녹투톤') echo " selected "; ?>>담녹투톤
<option value='레몬색' <? if($seven07 == '레몬색') echo " selected "; ?>>레몬색
<option value='맑은하늘색' <? if($seven07 == '맑은하늘색') echo " selected "; ?>>맑은하늘색
<option value='메론색' <? if($seven07 == '메론색') echo " selected "; ?>>메론색
<option value='명은색' <? if($seven07 == '명은색') echo " selected "; ?>>명은색
<option value='목련색' <? if($seven07 == '목련색') echo " selected "; ?>>목련색
<option value='목련투톤' <? if($seven07 == '목련투톤') echo " selected "; ?>>목련투톤
<option value='물빛색' <? if($seven07 == '물빛색') echo " selected "; ?>>물빛색
<option value='밤색' <? if($seven07 == '밤색') echo " selected "; ?>>밤색
<option value='백진주색' <? if($seven07 == '백진주색') echo " selected "; ?>>백진주색
<option value='베이지색' <? if($seven07 == '베이지색') echo " selected "; ?>>베이지색
<option value='베이지투톤' <? if($seven07 == '베이지투톤') echo " selected "; ?>>베이지투톤
<option value='보라색' <? if($seven07 == '보라색') echo " selected "; ?>>보라색
<option value='보라색투톤' <? if($seven07 == '보라색투톤') echo " selected "; ?>>보라색투톤
<option value='북청색' <? if($seven07 == '북청색') echo " selected "; ?>>북청색
<option value='분홍색' <? if($seven07 == '분홍색') echo " selected "; ?>>분홍색
<option value='분홍펄색' <? if($seven07 == '분홍펄색') echo " selected "; ?>>분홍펄색
<option value='블루펄' <? if($seven07 == '블루펄') echo " selected "; ?>>블루펄
<option value='비둘기색' <? if($seven07 == '비둘기색') echo " selected "; ?>>비둘기색
<option value='비취색' <? if($seven07 == '비취색') echo " selected "; ?>>비취색
<option value='빨강색' <? if($seven07 == '빨강색') echo " selected "; ?>>빨강색
<option value='빨강투톤' <? if($seven07 == '빨강투톤') echo " selected "; ?>>빨강투톤
<option value='살구색' <? if($seven07 == '살구색') echo " selected "; ?>>살구색
<option value='살색' <? if($seven07 == '살색') echo " selected "; ?>>살색
<option value='상아색' <? if($seven07 == '상아색') echo " selected "; ?>>상아색
<option value='상아투톤' <? if($seven07 == '상아투톤') echo " selected "; ?>>상아투톤
<option value='소라색' <? if($seven07 == '소라색') echo " selected "; ?>>소라색
<option value='소라투톤' <? if($seven07 == '소라투톤') echo " selected "; ?>>소라투톤
<option value='수박색' <? if($seven07 == '수박색') echo " selected "; ?>>수박색
<option value='수박투톤' <? if($seven07 == '수박투톤') echo " selected "; ?>>수박투톤
<option value='순은색' <? if($seven07 == '순은색') echo " selected "; ?>>순은색
<option value='심홍색' <? if($seven07 == '심홍색') echo " selected "; ?>>심홍색
<option value='쑥색' <? if($seven07 == '쑥색') echo " selected "; ?>>쑥색
<option value='쑥색투톤' <? if($seven07 == '쑥색투톤') echo " selected "; ?>>쑥색투톤
<option value='연검정색' <? if($seven07 == '연검정색') echo " selected "; ?>>연검정색
<option value='연금색' <? if($seven07 == '연금색') echo " selected "; ?>>연금색
<option value='연금색투톤' <? if($seven07 == '연금색투톤') echo " selected "; ?>>연금색투톤
<option value='연남색' <? if($seven07 == '연남색') echo " selected "; ?>>연남색
<option value='연녹색' <? if($seven07 == '연녹색') echo " selected "; ?>>연녹색
<option value='연녹투톤' <? if($seven07 == '연녹투톤') echo " selected "; ?>>연녹투톤
<option value='연두색' <? if($seven07 == '연두색') echo " selected "; ?>>연두색
<option value='연두색투톤' <? if($seven07 == '연두색투톤') echo " selected "; ?>>연두색투톤
<option value='연바다색투톤' <? if($seven07 == '연바다색투톤') echo " selected "; ?>>연바다색투톤
<option value='연은색투톤' <? if($seven07 == '연은색투톤') echo " selected "; ?>>연은색투톤
<option value='연청색' <? if($seven07 == '연청색') echo " selected "; ?>>연청색
<option value='연카키색' <? if($seven07 == '연카키색') echo " selected "; ?>>연카키색
<option value='연카키투톤' <? if($seven07 == '연카키투톤') echo " selected "; ?>>연카키투톤
<option value='연하늘색' <? if($seven07 == '연하늘색') echo " selected "; ?>>연하늘색
<option value='오렌지색' <? if($seven07 == '오렌지색') echo " selected "; ?>>4오렌지색
<option value='옥색' <? if($seven07 == '옥색') echo " selected "; ?>>옥색
<option value='옥색투톤' <? if($seven07 == '옥색투톤') echo " selected "; ?>>옥색투톤
<option value='은갈색' <? if($seven07 == '은갈색') echo " selected "; ?>>은갈색
<option value='은비색' <? if($seven07 == '은비색') echo " selected "; ?>>은비색
<option value='은비투톤' <? if($seven07 == '은비투톤') echo " selected "; ?>>은비투톤
<option value='은색' <? if($seven07 == '은색') echo " selected "; ?>>은색
<option value='은색투톤' <? if($seven07 == '은색투톤') echo " selected "; ?>>은색투톤
<option value='은하늘색' <? if($seven07 == '은하늘색') echo " selected "; ?>>은하늘색
<option value='은하색' <? if($seven07 == '은하색') echo " selected "; ?>>은하색
<option value='은하투톤' <? if($seven07 == '은하투톤') echo " selected "; ?>>은하투톤
<option value='은황색' <? if($seven07 == '은황색') echo " selected "; ?>>은황색
<option value='은회색' <? if($seven07 == '은회색') echo " selected "; ?>>은회색
<option value='자주' <? if($seven07 == '자주') echo " selected "; ?>>자주
<option value='자주투톤' <? if($seven07 == '자주투톤') echo " selected "; ?>>자주투톤
<option value='적갈색' <? if($seven07 == '적갈색') echo " selected "; ?>>적갈색
<option value='적갈색투톤' <? if($seven07 == '적갈색투톤') echo " selected "; ?>>적갈색투톤
<option value='적색투톤' <? if($seven07 == '적색투톤') echo " selected "; ?>>적색투톤
<option value='적자주색' <? if($seven07 == '적자주색') echo " selected "; ?>>적자주색
<option value='주황색' <? if($seven07 == '주황색') echo " selected "; ?>>주황색
<option value='주황색투톤' <? if($seven07 == '주황색투톤') echo " selected "; ?>>주황색투톤
<option value='쥐색' <? if($seven07 == '쥐색') echo " selected "; ?>>쥐색
<option value='쥐색투톤' <? if($seven07 == '쥐색투톤') echo " selected "; ?>>쥐색투톤
<option value='진갈색' <? if($seven07 == '진갈색') echo " selected "; ?>>진갈색
<option value='진녹색' <? if($seven07 == '진녹색') echo " selected "; ?>>진녹색
<option value='진녹투톤' <? if($seven07 == '진녹투톤') echo " selected "; ?>>진녹투톤
<option value='진연두색' <? if($seven07 == '진연두색') echo " selected "; ?>>진연두색
<option value='진주색' <? if($seven07 == '진주색') echo " selected "; ?>>진주색
<option value='진주투톤' <? if($seven07 == '진주투톤') echo " selected "; ?>>진주투톤
<option value='진주펄색' <? if($seven07 == '진주펄색') echo " selected "; ?>>진주펄색
<option value='진청색' <? if($seven07 == '진청색') echo " selected "; ?>>진청색
<option value='진회색' <? if($seven07 == '진회색') echo " selected "; ?>>진회색
<option value='청록색' <? if($seven07 == '청록색') echo " selected "; ?>>청록색
<option value='청록투톤' <? if($seven07 == '청록투톤') echo " selected "; ?>>청록투톤
<option value='청보라색' <? if($seven07 == '청보라색') echo " selected "; ?>>청보라색
<option value='청색' <? if($seven07 == '청색') echo " selected "; ?>>청색
<option value='청색투톤' <? if($seven07 == '청색투톤') echo " selected "; ?>>청색투톤
<option value='청옥색' <? if($seven07 == '청옥색') echo " selected "; ?>>청옥색
<option value='청자색' <? if($seven07 == '청자색') echo " selected "; ?>>청자색
<option value='청회색' <? if($seven07 == '청회색') echo " selected "; ?>>청회색
<option value='초록색' <? if($seven07 == '초록색') echo " selected "; ?>>초록색
<option value='카멜레온색' <? if($seven07 == '카멜레온색') echo " selected "; ?>>카멜레온색
<option value='카키색' <? if($seven07 == '카키색') echo " selected "; ?>>카키색
<option value='카키투톤' <? if($seven07 == '카키투톤') echo " selected "; ?>>카키투톤
<option value='커피색' <? if($seven07 == '커피색') echo " selected "; ?>>커피색
<option value='크리스탈비치' <? if($seven07 == '크리스탈비치') echo " selected "; ?>>크리스탈비치
<option value='파랑색' <? if($seven07 == '파랑색') echo " selected "; ?>>파랑색
<option value='파랑투톤' <? if($seven07 == '파랑투톤') echo " selected "; ?>>파랑투톤
<option value='풋사과색' <? if($seven07 == '풋사과색') echo " selected "; ?>>풋사과색
<option value='풋사과투톤' <? if($seven07 == '풋사과투톤') echo " selected "; ?>>풋사과투톤
<option value='하늘색' <? if($seven07 == '하늘색') echo " selected "; ?>>하늘색
<option value='하늘투톤' <? if($seven07 == '하늘투톤') echo " selected "; ?>>하늘투톤
<option value='홍적색' <? if($seven07 == '홍적색') echo " selected "; ?>>홍적색
<option value='황금색' <? if($seven07 == '황금색') echo " selected "; ?>>황금색
<option value='황금투톤' <? if($seven07 == '황금투톤') echo " selected "; ?>>황금투톤
<option value='황토색' <? if($seven07 == '황토색') echo " selected "; ?>>황토색
<option value='황토색투톤' <? if($seven07 == '황토색투톤') echo " selected "; ?>>황토색투톤
<option value='회색' <? if($seven07 == '회색') echo " selected "; ?>>회색
<option value='회색투톤' <? if($seven07 == '회색투톤') echo " selected "; ?>>회색투톤
<option value='흑녹색' <? if($seven07 == '흑녹색') echo " selected "; ?>>흑녹색
<option value='흑자주색' <? if($seven07 == '흑자주색') echo " selected "; ?>>흑자주색
<option value='흑장미색' <? if($seven07 == '흑장미색') echo " selected "; ?>>흑장미색
<option value='흑진주색' <? if($seven07 == '흑진주색') echo " selected "; ?>>흑진주색
<option value='흰색' <? if($seven07 == '흰색') echo " selected "; ?>>흰색
<option value='흰색투톤' <? if($seven07 == '흰색투톤') echo " selected "; ?>>흰색투톤
</select>
</td>
                      </tr>
                      <tr>
                        <td>· <b>사고유무</b></td>
                        <td>
                <INPUT type=radio name='seven08' required  VALUE="무사고" <? if($seven08 == "무사고")  echo "checked"; ?> > 무사고 
                <INPUT type=radio name='seven08' required  VALUE="사고" <? if($seven08 == "사고")  echo "checked"; ?> > 사고 
                </td>
                      </tr>

                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>

<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>기본물품</b></td></tr>
</table>
<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
  <tr>
    <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
      <tr>
        <td bgcolor="ffffff"><table width="100%" >
  <tr>
    <td><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#EAEAEA" >
      <tr>
        <td><table width="100%" cellpadding="3" cellspacing="1" bgcolor="#EAEAEA" >
<tr bgcolor="#FFFFFF">
<td width="25%" bgcolor="#FFEFE8"><input type="checkbox" name="six01" value="1" <? if ($six01 == '1') echo "checked";?>> 기본공구</td>
<td width="25%"><input type="checkbox" name="six02" value="1" <? if ($six02 == '1') echo "checked";?>> 스페어타이어</td>
<td width="25%" bgcolor="#FFEFE8"><input type="checkbox" name="six03" value="1" <? if ($six03 == '1') echo "checked";?>> Jack</td>
<td width="25%"><input type="checkbox" name="six04" value="1" <? if ($six04 == '1') echo "checked";?>> 취급설명서</td>
</tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  </table></td>
</tr>
</table>
    
<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>차량옵션정보</b></td></tr>
</table>          
<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
  <tr>
    <td><table width="98%" >
      <tr>
        <td bgcolor="ffffff"><table width="100%" >
  <tr>
    <td align="center"><table width="725" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
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
        <td height="20" valign="middle"><input type="checkbox" name="six05" value="1" <? if ($six05 == '1') echo "checked";?> /> 파워핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six06" value="1" <? if ($six06 == '1') echo "checked";?> /> 가죽핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six07" value="1" <? if ($six07 == '1') echo "checked";?> /> 가죽/우드핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six08" value="1" <? if ($six08 == '1') echo "checked";?> /> 틸티핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six09" value="1" <? if ($six09 == '1') echo "checked";?> /> 히팅핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six10" value="1" <? if ($six10 == '1') echo "checked";?> /> 속도감응식핸들</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six11" value="1" <? if ($six11 == '1') echo "checked";?> /> 텔레스코픽핸들</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six12" value="1" <? if ($six12 == '1') echo "checked";?> /> 핸들리모콘</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six51" value="1" <? if ($six51 == '1') echo "checked";?> /> 핸즈프리</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six20" value="1" <? if ($six20 == '1') echo "checked";?> /> 파워도어록</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six21" value="1" <? if ($six21 == '1') echo "checked";?> /> 파워윈도우</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six22" value="1" <? if ($six22 == '1') echo "checked";?> /> 에어컨</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six23" value="1" <? if ($six23 == '1') echo "checked";?> /> 전자동 에어컨</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six24" value="1" <? if ($six24 == '1') echo "checked";?> /> 좌우독립에어컨</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six37" value="1" <? if ($six37 == '1') echo "checked";?> /> 썬루프</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six38" value="1" <? if ($six38 == '1') echo "checked";?> /> 파노라마썬루프</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six65" value="전동소프트탑" <? if ($six65 == '전동소프트탑') echo "checked";?> />  전동소프트탑</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six66" value="수동소프트탑" <? if ($six66 == '수동소프트탑') echo "checked";?> />  수동소프트탑</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six67" value="탈착식하드탑" <? if ($six67 == '탈착식하드탑') echo "checked";?> />  탈착식하드탑</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six68" value="전동하드탑" <? if ($six68 == '전동하드탑') echo "checked";?> />  전동하드탑</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six56" value="1" <? if ($six56 == '1') echo "checked";?> /> 루프케리어</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six36" value="1" <? if ($six36 == '1') echo "checked";?> /> 알루미늄휠</td>
      </tr>
<tr><td height="10"></td></tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six25" value="1" <? if ($six25 == '1') echo "checked";?> /> 운전석에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six26" value="1" <? if ($six26 == '1') echo "checked";?> /> 조수석에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six27" value="1" <? if ($six27 == '1') echo "checked";?> /> 사이드에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six28" value="1" <? if ($six28 == '1') echo "checked";?> /> 커튼에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six29" value="1" <? if ($six29 == '1') echo "checked";?> /> 헤드에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six30" value="1" <? if ($six30 == '1') echo "checked";?> /> 무릎보호에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six31" value="1" <? if ($six31 == '1') echo "checked";?> /> 승객감지에어백</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six63" value="1" <? if ($six63 == '1') echo "checked";?> /> 롤오버바</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six79" value="1" <? if ($six79 == '1') echo "checked";?> /> 클로징 에이드</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six55" value="1" <? if ($six55 == '1') echo "checked";?> /> 파크트로닉</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six57" value="1" <? if ($six57 == '1') echo "checked";?> /> 전/후방 감지기</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six58" value="1" <? if ($six58 == '1') echo "checked";?> /> 후방감지모니터</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six59" value="1" <? if ($six59 == '1') echo "checked";?> /> 나이트비젼</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six46" value="1" <? if ($six46 == '1') echo "checked";?> /> 제논라이트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six62" value="1" <? if ($six62 == '1') echo "checked";?> /> 램프와이퍼/와셔</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six32" value="1" <? if ($six32 == '1') echo "checked";?> /> 전동접이식미러</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six88" value="1" <? if ($six88 == '1') echo "checked";?> /> ECM룸미러</td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six44" value="1" <? if ($six44 == '1') echo "checked";?> /> 타이어압력표시장치</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six53" value="1" <? if ($six53 == '1') echo "checked";?> /> 이지엑세스</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six61" value="1" <? if ($six61 == '1') echo "checked";?> /> 레인센서</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six60" value="1" <? if ($six60 == '1') echo "checked";?> /> 디스트로닉</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six47" value="1" <? if ($six47 == '1') echo "checked";?> /> 크루져컨트롤</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six70" value="1" <? if ($six70 == '1') echo "checked";?> /> ABC</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six71" value="1" <? if ($six71 == '1') echo "checked";?> /> ABS</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six72" value="1" <? if ($six72 == '1') echo "checked";?> /> ASC</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six73" value="1" <? if ($six73 == '1') echo "checked";?> /> ASR</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six74" value="1" <? if ($six74 == '1') echo "checked";?> /> AQS</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six76" value="1" <? if ($six76 == '1') echo "checked";?> /> BAS</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six80" value="1" <? if ($six80 == '1') echo "checked";?> /> DSC</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six81" value="1" <? if ($six81 == '1') echo "checked";?> /> DTR</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six83" value="1" <? if ($six83 == '1') echo "checked";?> /> EBD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six84" value="1" <? if ($six84 == '1') echo "checked";?> /> ECS</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six85" value="1" <? if ($six85 == '1') echo "checked";?> /> EDC</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six86" value="1" <? if ($six86 == '1') echo "checked";?> /> ESP</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six88" value="1" <? if ($six88 == '1') echo "checked";?> /> TCS</td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six13" value="1" <? if ($six13 == '1') echo "checked";?> /> 가죽시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six14" value="1" <? if ($six14 == '1') echo "checked";?> /> 파워시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six15" value="1" <? if ($six15 == '1') echo "checked";?> /> 뒷좌석분할시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six16" value="1" <? if ($six16 == '1') echo "checked";?> /> 메모리시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six17" value="1" <? if ($six17 == '1') echo "checked";?> /> 통풍시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six18" value="1" <? if ($six18 == '1') echo "checked";?> /> 열선시트</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six39" value="1" <? if ($six39 == '1') echo "checked";?> /> 요추받침장치</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six54" value="1" <? if ($six54 == '1') echo "checked";?> /> 스키스루</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six19" value="1" <? if ($six19 == '1') echo "checked";?> /> 가죽팩</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six92" value="1" <? if ($six92 == '1') echo "checked";?> /> 전동 햇빛가리개</td>
      </tr>      
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six33" value="1" <? if ($six33 == '1') echo "checked";?> /> 냉장고</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six75" value="1" <? if ($six75 == '1') echo "checked";?> /> AV시스템</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six82" value="1" <? if ($six82 == '1') echo "checked";?> /> DVD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six89" value="1" <? if ($six89 == '1') echo "checked";?> /> VCD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six43" value="1" <? if ($six43 == '1') echo "checked";?> /> 뒷좌석TV</td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six77" value="1" <? if ($six77 == '1') echo "checked";?> /> CD플레이어</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six78" value="1" <? if ($six78 == '1') echo "checked";?> /> CD체인져</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six42" value="1" <? if ($six42 == '1') echo "checked";?> /> 트립컴퓨터</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six35" value="1" <? if ($six35 == '1') echo "checked";?> /> 네비게이션</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six87" value="1" <? if ($six87 == '1') echo "checked";?> /> GPS</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six64" value="1" <? if ($six64 == '1') echo "checked";?> /> 키리스엔트리시스템</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six34" value="1" <? if ($six34 == '1') echo "checked";?> /> 자동도어잠금장치</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six48" value="1" <? if ($six48 == '1') echo "checked";?> /> 무선도어리모콘</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six49" value="1" <? if ($six49 == '1') echo "checked";?> /> 무선시동</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six50" value="1" <? if ($six50 == '1') echo "checked";?> /> 도난경보장치</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six48" value="1" <? if ($six48 == '1') echo "checked";?> /> 무선도어리모콘</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six69" value="1" <? if ($six69 == '1') echo "checked";?> /> 4WD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six40" value="1" <? if ($six40 == '1') echo "checked";?> /> 튜닝오디오</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six41" value="1" <? if ($six41 == '1') echo "checked";?> /> 튜닝알루미늄휠</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six90" value="1" <? if ($six90 == '1') echo "checked";?> /> 리어스포일러</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six52" value="1" <? if ($six52 == '1') echo "checked";?> /> 스트릿바</td>
      </tr>
    </table></td>
  </tr>
</table></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>

<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>차량설명</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                    <tr>
                      <td><TEXTAREA id=wr_content name=wr_content class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required 
        <? if ($write_min || $write_max) { ?>ONKEYUP="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></TEXTAREA>
        <? if ($write_min || $write_max) { ?><script language="JavaScript"> check_byte('wr_content', 'char_count'); </script><?}?></td>
                    </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
        </table>
        <table width="100%" >
          <tr>
            <td height="10"></td>
          </tr>
          <tr>
            <td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>사진정보</b></td>
          </tr>
        </table>
        <table width="98%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="100%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                      <tr>
                        <td>
<!-- <table width="100%" cellpadding="3" >
                          <tr>
                            <td bgcolor="#FFEFE8"> ※ 사진의 최적사이즈는 240*240px 입니다.<br>
      ※ 자료용량은 300kb 미만만 올릴수있습니다. </td>
                          </tr>
                        </table> -->
                          <table width="100%" cellpadding="0" >
                            <tr>
                              <? if ($w == ""){?>
                              <td width="320" align="center"><img src="<?=$board_skin_path?>/img/cars.gif" border="0"> </td>
                              <? }?>
                              <td><table width="100%" cellpadding="0" >
                                  <tr>
                                    <td width="60">전면</td>
                                    <td><input type='file'  name='bf_file[0]' size="30">
                                        <? if ($file[0][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[0][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[0]' value='1'>
                                        <a href='<?=$file[0][href]?>'>
                                        <?=$file[0][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>후면</td>
                                    <td><input type='file'  name='bf_file[1]' size="30">
                                        <? if ($file[1][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[1][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[1]' value='1'>
                                        <a href='<?=$file[1][href]?>'>
                                        <?=$file[1][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>전측면</td>
                                    <td><input type='file'  name='bf_file[2]' size="30">
                                        <? if ($file[2][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[2][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[2]' value='1'>
                                        <a href='<?=$file[2][href]?>'>
                                        <?=$file[2][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>후측면</td>
                                    <td><input type='file'  name='bf_file[3]' size="30">




                                        <? if ($file[3][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[3][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[3]' value='1'>
                                        <a href='<?=$file[3][href]?>'>
                                        <?=$file[3][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>실내</td>
                                    <td><input type='file'  name='bf_file[4]' size="30">
                                        <? if ($file[4][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[4][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[4]' value='1'>
                                        <a href='<?=$file[4][href]?>'>
                                        <?=$file[4][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>엔진</td>
                                    <td><input type='file'  name='bf_file[5]' size="30">
                                        <? if ($file[5][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[5][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[5]' value='1'>
                                        <a href='<?=$file[5][href]?>'>
                                        <?=$file[5][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>옵션 1</td>
                                    <td><input type='file'  name='bf_file[6]' size="30">
                                        <? if ($file[6][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[6][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[6]' value='1'>
                                        <a href='<?=$file[6][href]?>'>
                                        <?=$file[6][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>옵션 2</td>
                                    <td><input type='file'  name='bf_file[7]' size="30">
                                        <? if ($file[7][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[7][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[7]' value='1'>
                                        <a href='<?=$file[7][href]?>'>
                                        <?=$file[7][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>옵션 3</td>
                                    <td><input type='file'  name='bf_file[8]' size="30">
                                        <? if ($file[8][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[8][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[8]' value='1'>
                                        <a href='<?=$file[8][href]?>'>
                                        <?=$file[8][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>옵션 4</td>
                                    <td><input type='file'  name='bf_file[9]' size="30">
                                        <? if ($file[9][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[9][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[9]' value='1'>
                                        <a href='<?=$file[9][href]?>'>
                                        <?=$file[9][source]?>
                                        </a> 삭제
                                        <? } ?></td>
                                  </tr>
                              </table></td>
                            </tr>
                          </table></td>
                      </tr>
                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>







        <table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff">

<table width="100%" >
    <tr>
      <td class="blue">&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>차량 배치옵션</b> </td>
    </tr>
      </table>
<table width="100%" cellpadding="5" cellspacing="1" bgcolor="cccccc" >
<tr align="center" bgcolor="ADE7F7">
<SCRIPT LANGUAGE="JavaScript"> 
function checkChoice(whichbox) { 
with (whichbox.form) { 
if (whichbox.checked == false) { 
hiddenwr_point.value = eval(hiddenwr_point.value) - eval(whichbox.value); 
} else { 
hiddenwr_point.value = eval(hiddenwr_point.value) + eval(whichbox.value); 
} 
return(formatCurrency(hiddenwr_point.value)); 
} 
} 

function formatCurrency(num) { 
num = num.toString().replace(/$|,/g,''); 

if(isNaN(num)) { num = "0"; } 
cents = Math.floor((num*100+0.5)%100); 
num = Math.floor((num*100+0.5)/100).toString(); 
if(cents < 10) { 
cents = "0" + cents; 
} 

return (num); 
} 
</script>

<input type="hidden" name="hiddenwr_point" value="0">
<td width="80"><b>포인트옵션</b></td>
<td><b>서비스 내용</b></td>
<!-- <td><b>포인트</b></td> -->
<td><b>미리보기</b></td>
</tr>
<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_1" value="50" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($write[wr_1] == 50) echo "checked";?>> 스페셜 </td>
<td>메인 화면에 사진으로 게재되고<br>리스트 최상단에 사진으로 노출되어 효과가 좋습니다.</td>
<!-- <td>50 p/30일</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>
                            
<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_2" value="40" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($write[wr_2] == 40) echo "checked";?>> 프리미엄 </td>
<td>&nbsp;</td>
<!-- <td>40 p/30일</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_3" value="30" onClick="this.form.wr_point.value=checkChoice(this);"<? if ($write[wr_3] == 30) echo "checked";?>> 베스트 </td>
<td>리스트 최상단에 게재되고<br>최근 등록 30건 메인에 텍스트로 노출합니다.</td>
<!-- <td>30 p/30일</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_good" value="20" onClick="this.form.wr_point.value=checkChoice(this);"<? if ($write[wr_good] == 20) echo "checked";?>> 추천상품 </td>
<td>리스트 최상단에 게재되고<br>최근 등록 30건 메인에 텍스트로 노출합니다.</td>
<!-- <td>30 p/30일</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">아이콘</td>
<td><table width="100%" >
<tr>
<td width="20"><input type="checkbox" name="four01" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four01 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_1.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four03" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four03 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_3.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four04" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four04 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_4.gif" align="absmiddle" /></td>
<td width="20"><input type="checkbox" name="four07" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four07 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_7.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four09" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four09 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_9.gif" align="absmiddle" /></td>
</tr>
<tr>
<td width="20"><input type="checkbox" name="four02" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four02 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_2.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four08" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four08 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_8.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four10" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four10 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_10.gif" align="absmiddle" /></td>
<td width="20"><input type="checkbox" name="four06" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four06 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_6.gif" align="absmiddle"></td>
<td width="20"><input type="checkbox" name="four05" value="20" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($four05 == 10) echo "checked";?>></td>
<td><img src="<?=$board_skin_path?>/img/icon_5.gif" align="absmiddle" /></td>
</tr>
</table></td>
<!-- <td>20 p/30일</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">판매표시여부</td>
<td colspan="3"><input type="checkbox" name="wr_nogood" value="10" <? if ($write[wr_nogood] == '10') echo "checked";?>> <img src="<?=$board_skin_path?>/img/icon_end.gif" align="absmiddle" /></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">옵션적용기간</td>
<td colspan="3"><?=$g4[time_ymdhis]?> 로부터        
<? 
  $day30 = date("Y-m-d H:i:s", strtotime($now) + 86400 * 30);
?>
<input name="wr_day" type="radio" value="<?=$day30?>" checked> 30 일간 적용됩니다.</td>
</tr>
</table></td>
</tr>

<tr style="display:none">
<td><table width="100%" cellpadding="5" cellspacing="1" bgcolor="cccccc" >
<tr>
<td width="80" align="center" bgcolor="#FFECEE" class="red"><b>포인트</b></td>
<td bgcolor="ffffff"><input type="text" name="wr_point" value="<?=$write[wr_point]?>" size="10" readonly class="input"> p </td>
</tr>
</table></td>
</tr>

</table>
</td></tr></table>




<? if ($is_norobot) { ?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td style='padding-left:20px; height:30px;'>· <?=$norobot_str?></td>
    <td><input class=ed type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;* 왼쪽의 글자중 <font color="red">빨간글자만</font> 순서대로 입력하세요.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
</table>
<? } ?>

<table width="150" align="center" cellpadding="9">
          <tr align="center">
            <td><input type=image id="btn_submit" src="<?=$board_skin_path?>/img/submit.gif" border='0' accesskey='s'></td>
            <td><a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/cancel.gif" border=0></a></td>
          </tr>
        </table>
		</td>
</tr>
</table>
</td></tr>
</form></table>

<script language="javascript">
<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
    }";
} 
?>

with (document.fwrite) 
{
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();


    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj)
{
    if (obj.checked) 
    {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_check(f)
{
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) 
    {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) 
    {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return;
    }

    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
            return;
        } 
        else if (char_max > 0 && char_max < cnt)
        {
            alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") 
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) 
        {
            alert("자동등록방지용 빨간글자가 순서대로 입력되지 않았습니다.");
            f.wr_key.focus();
            return;
        }
    }

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    f.action = "./write_update.php";
    f.submit();
}
</script>
