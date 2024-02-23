<? 
$g4_path = "../../../";
include_once("$g4_path/common.php");


    $cCount = $cCount - 1;
    
    if ($wr_id) {    
       $sql = " SELECT * FROM g4_board_file WHERE bo_table = '$bo_table' AND wr_id = $wr_id ORDER BY wr_id desc, bf_no asc limit $cCount, 1 ";
    } else {
       $sql = " SELECT * FROM g4_board_file WHERE bo_table = '$bo_table' Order By wr_id desc, bf_no asc limit $cCount, 1 ";
    }
    $result = sql_fetch($sql);

    $image = "{$result[bf_file ]}";   // 이미지파일명저장 
    $images = "$g4[path]/data/file/$bo_table/{$result[bf_file ]}";   // 이미지의 경로 저장 

if (preg_match("/\.(gif|jpg|png)$/i", $image) && file_exists("$g4[path]/data/file/$bo_table/$image")) {

    $size = getimagesize($images);
    
    if ($size[0] >= 500) { $size0 = 500; } else { $size0 = $size[0]; }
    if ($size[1] >= 470) { $size1 = 470; } else { $size1 = $size[1]; }
    
    $Descript = "{$result[bf_content]}";
    
} else {$images = "./s_img/noimage.gif"; $size0 = 95; $size1 = 72; $Descript = "※ 이미지가 없습니다.";}

if (!$Descript) { $Descript = "※ 사진설명이 없습니다."; }

?>

<html>
<head>
<title>:: 이미지 슬라이드쇼 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
</head>
<script>
<!--
function start() {
	top.imgContent.innerText = "<?=$Descript?>";
}

var slidesound="./s_img/sound.wav"

//-->
</script>
<SCRIPT LANGUAGE='JavaScript'>
// 답사기를 위한 팝업 스크립트
<!-- 
    var win= null;
    function Center_Window(img, w, h)
    {
        var winl = (screen.width-w)/2;
        var wint = (screen.height-h)/3;
        var settings  ='height='+h+',';
            settings +='width='+w+',';
            settings +='top='+wint+',';
            settings +='left='+winl+',';
            settings +='scrollbars=yes,';
            settings +='resizable=no,';
            settings +='status=no';

        win=window.open("","newWindow",settings);
        win.document.open(); 
        win.document.write ("<html><head><title>:: 이미지 보기 ::</title></head>"); 
        win.document.write ("<body leftmargin=0 topmargin=0>");
        win.document.write ("<img src='"+img+"' border=0 onclick='window.close();' style='cursor:hand' title='클릭하면 닫혀요'>");
        win.document.write ("</body></html>");
        win.document.close(); 

        if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
    }
//-->
</SCRIPT>
<body bgcolor="#CACACA" onLoad="start();" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="500" height="500" border="0" cellspacing="0" cellpadding="0" align="center">
<tr><td align="center"><a href='javascript:void(0);' onClick=Center_Window('<?=$g4[path]?>/data/file/<?=$bo_table?>/<?=$image?>','<?=$size[0]?>','<?=$size[1]?>')><img src="<?=$images?>" border="0" width="<?=$size0?>"  height="<?=$size1?>"></a></td></tr>
</table>

</body>
</html>
