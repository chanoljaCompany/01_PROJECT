<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

include_once("$board_skin_path/config.php");
?>
<?
if ($w == "") {
	$title_msg = "�������";
 } else if ($w == "u") {
	$title_msg = "�������� ����";
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

//���ڿ� 3 �ڸ����� �޸�
function PointComma(formnum) { 
  
    num1 = formnum.length; 

        FirstNum = formnum.substr(0,1);
        FirstNum2 = formnum.substr(1,num1);
  
        if(FirstNum == "0"){ 
                alert("�Է¼��ڴ� 0 ���� ������ �� �����ϴ�."); 
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
        alert("���ڸ� �Է��Ͻ� �� �ֽ��ϴ�.");        
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
// ���ڼ� ����
var char_min = parseInt(<?=$write_min?>); // �ּ�
var char_max = parseInt(<?=$write_max?>); // �ִ�
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
                  <td width="80">�� �̸�</td>
                  <td><input maxlength=20 size=15 name=wr_name itemname="�̸�" required value="<?=$name?>"></td>
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
                  <td width="80">�� ��й�ȣ</td>
                  <td><input type=password maxlength=20 size=15 name=wr_password itemname="��й�ȣ" <?=$password_required?>></td>
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
                  <td width="80">�� �̸���</td>
                  <td><input size=50 name=wr_email email itemname="�̸���" value="<?=$email?>"></td>
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
                  <td width="80">�� Ȩ������</td>
                  <td><input size=50 name=wr_homepage itemname="Ȩ������" value="<?=$homepage?>"></td>
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
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>�⺻����</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                    <tr>
                      <td>�� <b>������ </b></td>
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
                      <td width="80">�� <b>�𵨼���</b></td>
                      <td><input name=wr_subject value="<?=$subject?>" style=width:80% itemname="�𵨸�" required> �ذ�����</td>
                    </tr>
                      <tr>
                        <td>�� <b>����</b></td>
                        <td><select name='wr_link1' itemname="����" required onChange="expandone()">
<option value='����' <? if($write[wr_link1] == '����') echo " selected "; ?>>����
<option value='�߰���' <? if($write[wr_link1] == '�߰���') echo " selected "; ?>>�߰���
</select></td>
                      </tr>
                      <tr>
                        <td>�� <b>��������</b></td>
                        <td><input name=wr_5 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.wr_5.value=PointComma(document.fwrite.wr_5.value)" itemname="��������" value="<?=$write[wr_5]?>"><input type="hidden" name="won"> ����</td>
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
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>�������� ������</b></td></tr>
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
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>������</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                      <tr>
                        <td>�� <b>��ϳ��</b></td>
                        <td><select name='seven01' itemname="��" class="select02">
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
    ��
    <select name='seven02' itemname="��" class="select02">
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
    ��</td>
                      </tr>
                      <tr>
                        <td>�� <b>��ⷮ</b></td>
                        <td><input name=seven03 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.seven03.value=PointComma(document.fwrite.seven03.value)" itemname="��ⷮ" value="<?=$seven03?>"><input type="hidden" name="cc"> cc</td>
                      </tr>
                      <tr>
                        <td width="80">�� <b>��뿬��</b></td>
                        <td><INPUT type=radio name='seven04' required  VALUE="�ֹ���" <? if($seven04 == "�ֹ���")  echo "checked"; ?> > �ֹ��� 
                <INPUT type=radio name='seven04' required  VALUE="������" <? if($seven04 == "������")  echo "checked"; ?> > ������ 
                <INPUT type=radio name='seven04' required  VALUE="LPG" <? if($seven04 == "LPG")  echo "checked"; ?> > LPG 
                <INPUT type=radio name='seven04' required  VALUE="�ֹ���LPG���" <? if($seven04 == "�ֹ���LPG���")  echo "checked"; ?> > �ֹ���LPG��� 
                <INPUT type=radio name='seven04' required  VALUE="��Ÿ" <? if($seven04 == "��Ÿ")  echo "checked"; ?> > ��Ÿ 
                        </td>
                      </tr>
                      <tr>
                        <td>�� <b>�̼Ǳ���</b></td>
                        <td><INPUT type=radio name='seven05' required  VALUE="����" <? if($seven05 == "����")  echo "checked"; ?> > ���� 
                <INPUT type=radio name='seven05' required  VALUE="����" <? if($seven05 == "����")  echo "checked"; ?> > ���� 
                <INPUT type=radio name='seven05' required  VALUE="CVT" <? if($seven05 == "CVT")  echo "checked"; ?> > CVT 
                <INPUT type=radio name='seven05' required  VALUE="���̿���" <? if($seven05 == "���̿���")  echo "checked"; ?> > ���̿��� 
</td>
                      </tr>
                      <tr>
                        <td width="80">�� <b>����Ÿ�</b></td>
                        <td><input name=seven06 style="text-align:right; WIDTH: 80px;" onKeyUp="document.fwrite.seven06.value=PointComma(document.fwrite.seven06.value)" itemname="����Ÿ�" value="<?=$seven06?>"><input type="hidden" name="km"> km</td>
                      </tr>
                      <tr>
                        <td>�� <b>��������</b></td>
                        <td>
<select name='seven07' itemname="���� ����" class="select02">
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='��û��' <? if($seven07 == '��û��') echo " selected "; ?>>��û��
<option value='�˺�����' <? if($seven07 == '�˺�����') echo " selected "; ?>>�˺�����
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='���ڻ�' <? if($seven07 == '���ڻ�') echo " selected "; ?>>���ڻ�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��û��' <? if($seven07 == '��û��') echo " selected "; ?>>��û��
<option value='�ݸ𷡻�' <? if($seven07 == '�ݸ𷡻�') echo " selected "; ?>>�ݸ𷡻�
<option value='�ݸ�����' <? if($seven07 == '�ݸ�����') echo " selected "; ?>>�ݸ�����
<option value='�ݻ�' <? if($seven07 == '�ݻ�') echo " selected "; ?>>�ݻ�
<option value='�ݻ�����' <? if($seven07 == '�ݻ�����') echo " selected "; ?>>�ݻ�����
<option value='��ġ��' <? if($seven07 == '��ġ��') echo " selected "; ?>>��ġ��
<option value='��ġ����' <? if($seven07 == '��ġ����') echo " selected "; ?>>��ġ����
<option value='�����ֻ�' <? if($seven07 == '�����ֻ�') echo " selected "; ?>>�����ֻ�
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='�㰥��' <? if($seven07 == '�㰥��') echo " selected "; ?>>�㰥��
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='�����ϴû�' <? if($seven07 == '�����ϴû�') echo " selected "; ?>>�����ϴû�
<option value='�޷л�' <? if($seven07 == '�޷л�') echo " selected "; ?>>�޷л�
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='��û�' <? if($seven07 == '��û�') echo " selected "; ?>>��û�
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='�����ֻ�' <? if($seven07 == '�����ֻ�') echo " selected "; ?>>�����ֻ�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='����������' <? if($seven07 == '����������') echo " selected "; ?>>����������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='���������' <? if($seven07 == '���������') echo " selected "; ?>>���������
<option value='��û��' <? if($seven07 == '��û��') echo " selected "; ?>>��û��
<option value='��ȫ��' <? if($seven07 == '��ȫ��') echo " selected "; ?>>��ȫ��
<option value='��ȫ�޻�' <? if($seven07 == '��ȫ�޻�') echo " selected "; ?>>��ȫ�޻�
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��ѱ��' <? if($seven07 == '��ѱ��') echo " selected "; ?>>��ѱ��
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�챸��' <? if($seven07 == '�챸��') echo " selected "; ?>>�챸��
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='��ƻ�' <? if($seven07 == '��ƻ�') echo " selected "; ?>>��ƻ�
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='�Ҷ��' <? if($seven07 == '�Ҷ��') echo " selected "; ?>>�Ҷ��
<option value='�Ҷ�����' <? if($seven07 == '�Ҷ�����') echo " selected "; ?>>�Ҷ�����
<option value='���ڻ�' <? if($seven07 == '���ڻ�') echo " selected "; ?>>���ڻ�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='��ȫ��' <? if($seven07 == '��ȫ��') echo " selected "; ?>>��ȫ��
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='���ݻ�' <? if($seven07 == '���ݻ�') echo " selected "; ?>>���ݻ�
<option value='���ݻ�����' <? if($seven07 == '���ݻ�����') echo " selected "; ?>>���ݻ�����
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='���λ�' <? if($seven07 == '���λ�') echo " selected "; ?>>���λ�
<option value='���λ�����' <? if($seven07 == '���λ�����') echo " selected "; ?>>���λ�����
<option value='���ٴٻ�����' <? if($seven07 == '���ٴٻ�����') echo " selected "; ?>>���ٴٻ�����
<option value='����������' <? if($seven07 == '����������') echo " selected "; ?>>����������
<option value='��û��' <? if($seven07 == '��û��') echo " selected "; ?>>��û��
<option value='��īŰ��' <? if($seven07 == '��īŰ��') echo " selected "; ?>>��īŰ��
<option value='��īŰ����' <? if($seven07 == '��īŰ����') echo " selected "; ?>>��īŰ����
<option value='���ϴû�' <? if($seven07 == '���ϴû�') echo " selected "; ?>>���ϴû�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>4��������
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='���ϴû�' <? if($seven07 == '���ϴû�') echo " selected "; ?>>���ϴû�
<option value='���ϻ�' <? if($seven07 == '���ϻ�') echo " selected "; ?>>���ϻ�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='��Ȳ��' <? if($seven07 == '��Ȳ��') echo " selected "; ?>>��Ȳ��
<option value='��ȸ��' <? if($seven07 == '��ȸ��') echo " selected "; ?>>��ȸ��
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='����������' <? if($seven07 == '����������') echo " selected "; ?>>����������
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�����ֻ�' <? if($seven07 == '�����ֻ�') echo " selected "; ?>>�����ֻ�
<option value='��Ȳ��' <? if($seven07 == '��Ȳ��') echo " selected "; ?>>��Ȳ��
<option value='��Ȳ������' <? if($seven07 == '��Ȳ������') echo " selected "; ?>>��Ȳ������
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
<option value='������' <? if($seven07 == '������') echo " selected "; ?>>������
<option value='�����' <? if($seven07 == '�����') echo " selected "; ?>>�����
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�����λ�' <? if($seven07 == '�����λ�') echo " selected "; ?>>�����λ�
<option value='���ֻ�' <? if($seven07 == '���ֻ�') echo " selected "; ?>>���ֻ�
<option value='��������' <? if($seven07 == '��������') echo " selected "; ?>>��������
<option value='�����޻�' <? if($seven07 == '�����޻�') echo " selected "; ?>>�����޻�
<option value='��û��' <? if($seven07 == '��û��') echo " selected "; ?>>��û��
<option value='��ȸ��' <? if($seven07 == '��ȸ��') echo " selected "; ?>>��ȸ��
<option value='û�ϻ�' <? if($seven07 == 'û�ϻ�') echo " selected "; ?>>û�ϻ�
<option value='û������' <? if($seven07 == 'û������') echo " selected "; ?>>û������
<option value='û�����' <? if($seven07 == 'û�����') echo " selected "; ?>>û�����
<option value='û��' <? if($seven07 == 'û��') echo " selected "; ?>>û��
<option value='û������' <? if($seven07 == 'û������') echo " selected "; ?>>û������
<option value='û����' <? if($seven07 == 'û����') echo " selected "; ?>>û����
<option value='û�ڻ�' <? if($seven07 == 'û�ڻ�') echo " selected "; ?>>û�ڻ�
<option value='ûȸ��' <? if($seven07 == 'ûȸ��') echo " selected "; ?>>ûȸ��
<option value='�ʷϻ�' <? if($seven07 == '�ʷϻ�') echo " selected "; ?>>�ʷϻ�
<option value='ī�᷹�»�' <? if($seven07 == 'ī�᷹�»�') echo " selected "; ?>>ī�᷹�»�
<option value='īŰ��' <? if($seven07 == 'īŰ��') echo " selected "; ?>>īŰ��
<option value='īŰ����' <? if($seven07 == 'īŰ����') echo " selected "; ?>>īŰ����
<option value='Ŀ�ǻ�' <? if($seven07 == 'Ŀ�ǻ�') echo " selected "; ?>>Ŀ�ǻ�
<option value='ũ����Ż��ġ' <? if($seven07 == 'ũ����Ż��ġ') echo " selected "; ?>>ũ����Ż��ġ
<option value='�Ķ���' <? if($seven07 == '�Ķ���') echo " selected "; ?>>�Ķ���
<option value='�Ķ�����' <? if($seven07 == '�Ķ�����') echo " selected "; ?>>�Ķ�����
<option value='ǲ�����' <? if($seven07 == 'ǲ�����') echo " selected "; ?>>ǲ�����
<option value='ǲ�������' <? if($seven07 == 'ǲ�������') echo " selected "; ?>>ǲ�������
<option value='�ϴû�' <? if($seven07 == '�ϴû�') echo " selected "; ?>>�ϴû�
<option value='�ϴ�����' <? if($seven07 == '�ϴ�����') echo " selected "; ?>>�ϴ�����
<option value='ȫ����' <? if($seven07 == 'ȫ����') echo " selected "; ?>>ȫ����
<option value='Ȳ�ݻ�' <? if($seven07 == 'Ȳ�ݻ�') echo " selected "; ?>>Ȳ�ݻ�
<option value='Ȳ������' <? if($seven07 == 'Ȳ������') echo " selected "; ?>>Ȳ������
<option value='Ȳ���' <? if($seven07 == 'Ȳ���') echo " selected "; ?>>Ȳ���
<option value='Ȳ�������' <? if($seven07 == 'Ȳ�������') echo " selected "; ?>>Ȳ�������
<option value='ȸ��' <? if($seven07 == 'ȸ��') echo " selected "; ?>>ȸ��
<option value='ȸ������' <? if($seven07 == 'ȸ������') echo " selected "; ?>>ȸ������
<option value='����' <? if($seven07 == '����') echo " selected "; ?>>����
<option value='�����ֻ�' <? if($seven07 == '�����ֻ�') echo " selected "; ?>>�����ֻ�
<option value='����̻�' <? if($seven07 == '����̻�') echo " selected "; ?>>����̻�
<option value='�����ֻ�' <? if($seven07 == '�����ֻ�') echo " selected "; ?>>�����ֻ�
<option value='���' <? if($seven07 == '���') echo " selected "; ?>>���
<option value='�������' <? if($seven07 == '�������') echo " selected "; ?>>�������
</select>
</td>
                      </tr>
                      <tr>
                        <td>�� <b>�������</b></td>
                        <td>
                <INPUT type=radio name='seven08' required  VALUE="�����" <? if($seven08 == "�����")  echo "checked"; ?> > ����� 
                <INPUT type=radio name='seven08' required  VALUE="���" <? if($seven08 == "���")  echo "checked"; ?> > ��� 
                </td>
                      </tr>

                  </table></td>
                </tr>
            </table></td>
          </tr>
</table>

<table width="100%" >
<tr><td height="10"></td></tr>
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>�⺻��ǰ</b></td></tr>
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
<td width="25%" bgcolor="#FFEFE8"><input type="checkbox" name="six01" value="1" <? if ($six01 == '1') echo "checked";?>> �⺻����</td>
<td width="25%"><input type="checkbox" name="six02" value="1" <? if ($six02 == '1') echo "checked";?>> �����Ÿ�̾�</td>
<td width="25%" bgcolor="#FFEFE8"><input type="checkbox" name="six03" value="1" <? if ($six03 == '1') echo "checked";?>> Jack</td>
<td width="25%"><input type="checkbox" name="six04" value="1" <? if ($six04 == '1') echo "checked";?>> ��޼���</td>
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
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>�����ɼ�����</b></td></tr>
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
        <td height="20" valign="middle"><input type="checkbox" name="six05" value="1" <? if ($six05 == '1') echo "checked";?> /> �Ŀ��ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six06" value="1" <? if ($six06 == '1') echo "checked";?> /> �����ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six07" value="1" <? if ($six07 == '1') echo "checked";?> /> ����/����ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six08" value="1" <? if ($six08 == '1') echo "checked";?> /> ƿƼ�ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six09" value="1" <? if ($six09 == '1') echo "checked";?> /> �����ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six10" value="1" <? if ($six10 == '1') echo "checked";?> /> �ӵ��������ڵ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six11" value="1" <? if ($six11 == '1') echo "checked";?> /> �ڷ��������ڵ�</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six12" value="1" <? if ($six12 == '1') echo "checked";?> /> �ڵ鸮����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six51" value="1" <? if ($six51 == '1') echo "checked";?> /> ��������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six20" value="1" <? if ($six20 == '1') echo "checked";?> /> �Ŀ������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six21" value="1" <? if ($six21 == '1') echo "checked";?> /> �Ŀ�������</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six22" value="1" <? if ($six22 == '1') echo "checked";?> /> ������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six23" value="1" <? if ($six23 == '1') echo "checked";?> /> ���ڵ� ������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six24" value="1" <? if ($six24 == '1') echo "checked";?> /> �¿쵶��������</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six37" value="1" <? if ($six37 == '1') echo "checked";?> /> �����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six38" value="1" <? if ($six38 == '1') echo "checked";?> /> �ĳ�󸶽����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six65" value="��������Ʈž" <? if ($six65 == '��������Ʈž') echo "checked";?> />  ��������Ʈž</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six66" value="��������Ʈž" <? if ($six66 == '��������Ʈž') echo "checked";?> />  ��������Ʈž</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six67" value="Ż�����ϵ�ž" <? if ($six67 == 'Ż�����ϵ�ž') echo "checked";?> />  Ż�����ϵ�ž</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six68" value="�����ϵ�ž" <? if ($six68 == '�����ϵ�ž') echo "checked";?> />  �����ϵ�ž</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six56" value="1" <? if ($six56 == '1') echo "checked";?> /> �����ɸ���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six36" value="1" <? if ($six36 == '1') echo "checked";?> /> �˷�̴���</td>
      </tr>
<tr><td height="10"></td></tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six25" value="1" <? if ($six25 == '1') echo "checked";?> /> �����������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six26" value="1" <? if ($six26 == '1') echo "checked";?> /> �����������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six27" value="1" <? if ($six27 == '1') echo "checked";?> /> ���̵忡���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six28" value="1" <? if ($six28 == '1') echo "checked";?> /> Ŀư�����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six29" value="1" <? if ($six29 == '1') echo "checked";?> /> ��忡���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six30" value="1" <? if ($six30 == '1') echo "checked";?> /> ������ȣ�����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six31" value="1" <? if ($six31 == '1') echo "checked";?> /> �°����������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six63" value="1" <? if ($six63 == '1') echo "checked";?> /> �ѿ�����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six79" value="1" <? if ($six79 == '1') echo "checked";?> /> Ŭ��¡ ���̵�</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six55" value="1" <? if ($six55 == '1') echo "checked";?> /> ��ũƮ�δ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six57" value="1" <? if ($six57 == '1') echo "checked";?> /> ��/�Ĺ� ������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six58" value="1" <? if ($six58 == '1') echo "checked";?> /> �Ĺ氨�������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six59" value="1" <? if ($six59 == '1') echo "checked";?> /> ����Ʈ����</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six46" value="1" <? if ($six46 == '1') echo "checked";?> /> �������Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six62" value="1" <? if ($six62 == '1') echo "checked";?> /> ����������/�ͼ�</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six32" value="1" <? if ($six32 == '1') echo "checked";?> /> �������̽Ĺ̷�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six88" value="1" <? if ($six88 == '1') echo "checked";?> /> ECM��̷�</td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six44" value="1" <? if ($six44 == '1') echo "checked";?> /> Ÿ�̾�з�ǥ����ġ</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six53" value="1" <? if ($six53 == '1') echo "checked";?> /> ����������</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six61" value="1" <? if ($six61 == '1') echo "checked";?> /> ���μ���</td>
      </tr>
      <tr>
<td height="20" valign="middle"><input type="checkbox" name="six60" value="1" <? if ($six60 == '1') echo "checked";?> /> ��Ʈ�δ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six47" value="1" <? if ($six47 == '1') echo "checked";?> /> ũ������Ʈ��</td>
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
        <td height="20" valign="middle"><input type="checkbox" name="six13" value="1" <? if ($six13 == '1') echo "checked";?> /> ���׽�Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six14" value="1" <? if ($six14 == '1') echo "checked";?> /> �Ŀ���Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six15" value="1" <? if ($six15 == '1') echo "checked";?> /> ���¼����ҽ�Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six16" value="1" <? if ($six16 == '1') echo "checked";?> /> �޸𸮽�Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six17" value="1" <? if ($six17 == '1') echo "checked";?> /> ��ǳ��Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six18" value="1" <? if ($six18 == '1') echo "checked";?> /> ������Ʈ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six39" value="1" <? if ($six39 == '1') echo "checked";?> /> ���߹�ħ��ġ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six54" value="1" <? if ($six54 == '1') echo "checked";?> /> ��Ű����</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six19" value="1" <? if ($six19 == '1') echo "checked";?> /> ������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six92" value="1" <? if ($six92 == '1') echo "checked";?> /> ���� �޺�������</td>
      </tr>      
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six33" value="1" <? if ($six33 == '1') echo "checked";?> /> �����</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six75" value="1" <? if ($six75 == '1') echo "checked";?> /> AV�ý���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six82" value="1" <? if ($six82 == '1') echo "checked";?> /> DVD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six89" value="1" <? if ($six89 == '1') echo "checked";?> /> VCD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six43" value="1" <? if ($six43 == '1') echo "checked";?> /> ���¼�TV</td>
      </tr>
    </table></td>
    <td align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
<tr><td height="10"></td></tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six77" value="1" <? if ($six77 == '1') echo "checked";?> /> CD�÷��̾�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six78" value="1" <? if ($six78 == '1') echo "checked";?> /> CDü����</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six42" value="1" <? if ($six42 == '1') echo "checked";?> /> Ʈ����ǻ��</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six35" value="1" <? if ($six35 == '1') echo "checked";?> /> �׺���̼�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six87" value="1" <? if ($six87 == '1') echo "checked";?> /> GPS</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six64" value="1" <? if ($six64 == '1') echo "checked";?> /> Ű������Ʈ���ý���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six34" value="1" <? if ($six34 == '1') echo "checked";?> /> �ڵ����������ġ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six48" value="1" <? if ($six48 == '1') echo "checked";?> /> �����������</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six49" value="1" <? if ($six49 == '1') echo "checked";?> /> �����õ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six50" value="1" <? if ($six50 == '1') echo "checked";?> /> �����溸��ġ</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six48" value="1" <? if ($six48 == '1') echo "checked";?> /> �����������</td>
      </tr>
      <tr>
        <td valign="middle"><img src="<?=$board_skin_path?>/img/op_dot.gif" border="0" align="absmiddle"></td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six69" value="1" <? if ($six69 == '1') echo "checked";?> /> 4WD</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six40" value="1" <? if ($six40 == '1') echo "checked";?> /> Ʃ�׿����</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six41" value="1" <? if ($six41 == '1') echo "checked";?> /> Ʃ�׾˷�̴���</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six90" value="1" <? if ($six90 == '1') echo "checked";?> /> ������Ϸ�</td>
      </tr>
      <tr>
        <td height="20" valign="middle"><input type="checkbox" name="six52" value="1" <? if ($six52 == '1') echo "checked";?> /> ��Ʈ����</td>
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
<tr><td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>��������</b></td></tr>
</table>

<table width="100%" cellspacing="2" bgcolor="#FFFFFF" >
          <tr>
            <td><table width="98%" cellpadding="5" cellspacing="1" bgcolor="#EAEAEA" >
                <tr>
                  <td bgcolor="ffffff"><table width="100%" >
                    <tr>
                      <td><TEXTAREA id=wr_content name=wr_content class=tx style='width:100%; word-break:break-all;' rows=10 itemname="����" required 
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
            <td>&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>��������</b></td>
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
                            <td bgcolor="#FFEFE8"> �� ������ ����������� 240*240px �Դϴ�.<br>
      �� �ڷ�뷮�� 300kb �̸��� �ø����ֽ��ϴ�. </td>
                          </tr>
                        </table> -->
                          <table width="100%" cellpadding="0" >
                            <tr>
                              <? if ($w == ""){?>
                              <td width="320" align="center"><img src="<?=$board_skin_path?>/img/cars.gif" border="0"> </td>
                              <? }?>
                              <td><table width="100%" cellpadding="0" >
                                  <tr>
                                    <td width="60">����</td>
                                    <td><input type='file'  name='bf_file[0]' size="30">
                                        <? if ($file[0][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[0][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[0]' value='1'>
                                        <a href='<?=$file[0][href]?>'>
                                        <?=$file[0][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ĸ�</td>
                                    <td><input type='file'  name='bf_file[1]' size="30">
                                        <? if ($file[1][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[1][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[1]' value='1'>
                                        <a href='<?=$file[1][href]?>'>
                                        <?=$file[1][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>������</td>
                                    <td><input type='file'  name='bf_file[2]' size="30">
                                        <? if ($file[2][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[2][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[2]' value='1'>
                                        <a href='<?=$file[2][href]?>'>
                                        <?=$file[2][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>������</td>
                                    <td><input type='file'  name='bf_file[3]' size="30">




                                        <? if ($file[3][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[3][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[3]' value='1'>
                                        <a href='<?=$file[3][href]?>'>
                                        <?=$file[3][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ǳ�</td>
                                    <td><input type='file'  name='bf_file[4]' size="30">
                                        <? if ($file[4][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[4][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[4]' value='1'>
                                        <a href='<?=$file[4][href]?>'>
                                        <?=$file[4][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>����</td>
                                    <td><input type='file'  name='bf_file[5]' size="30">
                                        <? if ($file[5][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[5][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[5]' value='1'>
                                        <a href='<?=$file[5][href]?>'>
                                        <?=$file[5][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ɼ� 1</td>
                                    <td><input type='file'  name='bf_file[6]' size="30">
                                        <? if ($file[6][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[6][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[6]' value='1'>
                                        <a href='<?=$file[6][href]?>'>
                                        <?=$file[6][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ɼ� 2</td>
                                    <td><input type='file'  name='bf_file[7]' size="30">
                                        <? if ($file[7][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[7][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[7]' value='1'>
                                        <a href='<?=$file[7][href]?>'>
                                        <?=$file[7][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ɼ� 3</td>
                                    <td><input type='file'  name='bf_file[8]' size="30">
                                        <? if ($file[8][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[8][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[8]' value='1'>
                                        <a href='<?=$file[8][href]?>'>
                                        <?=$file[8][source]?>
                                        </a> ����
                                        <? } ?></td>
                                  </tr>
                                  <tr>
                                    <td>�ɼ� 4</td>
                                    <td><input type='file'  name='bf_file[9]' size="30">
                                        <? if ($file[9][source]) { ?>
                                        <br>
                                        <img src="../data/file/<?=$bo_table?>/<?=$file[9][file]?>" width="120" border="0">
                                        <input type='checkbox' name='bf_file_del[9]' value='1'>
                                        <a href='<?=$file[9][href]?>'>
                                        <?=$file[9][source]?>
                                        </a> ����
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
      <td class="blue">&nbsp; <img src="<?=$board_skin_path?>/img/icono.gif" border="0"> <b>���� ��ġ�ɼ�</b> </td>
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
<td width="80"><b>����Ʈ�ɼ�</b></td>
<td><b>���� ����</b></td>
<!-- <td><b>����Ʈ</b></td> -->
<td><b>�̸�����</b></td>
</tr>
<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_1" value="50" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($write[wr_1] == 50) echo "checked";?>> ����� </td>
<td>���� ȭ�鿡 �������� ����ǰ�<br>����Ʈ �ֻ�ܿ� �������� ����Ǿ� ȿ���� �����ϴ�.</td>
<!-- <td>50 p/30��</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>
                            
<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_2" value="40" onClick="this.form.wr_point.value=checkChoice(this);" <? if ($write[wr_2] == 40) echo "checked";?>> �����̾� </td>
<td>&nbsp;</td>
<!-- <td>40 p/30��</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_3" value="30" onClick="this.form.wr_point.value=checkChoice(this);"<? if ($write[wr_3] == 30) echo "checked";?>> ����Ʈ </td>
<td>����Ʈ �ֻ�ܿ� ����ǰ�<br>�ֱ� ��� 30�� ���ο� �ؽ�Ʈ�� �����մϴ�.</td>
<!-- <td>30 p/30��</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td bgcolor="#E6F7FF"><input type="checkbox" name="wr_good" value="20" onClick="this.form.wr_point.value=checkChoice(this);"<? if ($write[wr_good] == 20) echo "checked";?>> ��õ��ǰ </td>
<td>����Ʈ �ֻ�ܿ� ����ǰ�<br>�ֱ� ��� 30�� ���ο� �ؽ�Ʈ�� �����մϴ�.</td>
<!-- <td>30 p/30��</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">������</td>
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
<!-- <td>20 p/30��</td> -->
<td><img src="<?=$board_skin_path?>/img/miri.gif" align="absmiddle"></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">�Ǹ�ǥ�ÿ���</td>
<td colspan="3"><input type="checkbox" name="wr_nogood" value="10" <? if ($write[wr_nogood] == '10') echo "checked";?>> <img src="<?=$board_skin_path?>/img/icon_end.gif" align="absmiddle" /></td>
</tr>

<tr bgcolor="ffffff">
<td align="center" bgcolor="#E6F7FF">�ɼ�����Ⱓ</td>
<td colspan="3"><?=$g4[time_ymdhis]?> �κ���        
<? 
  $day30 = date("Y-m-d H:i:s", strtotime($now) + 86400 * 30);
?>
<input name="wr_day" type="radio" value="<?=$day30?>" checked> 30 �ϰ� ����˴ϴ�.</td>
</tr>
</table></td>
</tr>

<tr style="display:none">
<td><table width="100%" cellpadding="5" cellspacing="1" bgcolor="cccccc" >
<tr>
<td width="80" align="center" bgcolor="#FFECEE" class="red"><b>����Ʈ</b></td>
<td bgcolor="ffffff"><input type="text" name="wr_point" value="<?=$write[wr_point]?>" size="10" readonly class="input"> p </td>
</tr>
</table></td>
</tr>

</table>
</td></tr></table>




<? if ($is_norobot) { ?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
    <td style='padding-left:20px; height:30px;'>�� <?=$norobot_str?></td>
    <td><input class=ed type=input size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;* ������ ������ <font color="red">�������ڸ�</font> ������� �Է��ϼ���.</td>
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
// �����ڶ�� �з� ���ÿ� '����' �ɼ��� �߰���
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '����';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '����';
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
        result = confirm("�ڵ� �ٹٲ��� �Ͻðڽ��ϱ�?\n\n�ڵ� �ٹٲ��� �Խù� ������ �ٹٲ� ����<br>�±׷� ��ȯ�ϴ� ����Դϴ�.");
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
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) 
    {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (char_min > 0 || char_max > 0)
    {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("������ "+char_min+"���� �̻� ���ž� �մϴ�.");
            return;
        } 
        else if (char_max > 0 && char_max < cnt)
        {
            alert("������ "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") 
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) 
        {
            alert("�ڵ���Ϲ����� �������ڰ� ������� �Էµ��� �ʾҽ��ϴ�.");
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
