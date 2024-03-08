<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$area_code = isset($_REQUEST['area_code']) ? $_REQUEST['area_code'] : '';
$area_content = "";
$rows = null;
$img_info_array = array();

if($division == 'modify'){ //수정
	$sql = "SELECT * FROM $AREA_INFO_TB WHERE 1=1 AND user_id = '".$_SESSION['session_user_id']."' AND area_code = '$area_code'";
	$result = sql_query($sql);
	$rows = mysqli_fetch_array($result);
	$area_content = nl2br($rows['area_content']);
}else if($division == 'input'){ //신규등록
	 $area_code = str_shuffle(time());
}
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?=$file_url?>/js/FileUp/jquery.growl.css" rel="stylesheet" type="text/css">
<link href="<?=$file_url?>/js/FileUp/src/fileup.css" rel="stylesheet" type="text/css">
<body id="manage">
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<!-- <form name="area" method="post" enctype="multipart/form-data" action="area_write_action.php"> -->
						<form name="area" id= "area" method="post" enctype="multipart/form-data">
							<input type="hidden" name="division" id="division" value="<?=$division?>">
							<input type="hidden" name="area_code" id="area_code" value="<?=$area_code?>">
							<input type="hidden" name="pageId" id="pageId" value="area">
						<div class="box_title first">
							<h2 class="title">지역등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">지역등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<tr>
								<th scope="row">지역명</th>
								<td>
									<input type="text" name="area_name" id ="area_name" class="input input_full" placeholder="*필수) 지역명" value="<?=$rows['area_name']?>">
								</td>
							</tr>
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="area_input" value="등록"></span>
							<span class="box_btn gray"><input type="button" id="area_list" value="목록"></span>
						</div>
					</form>
				</article>
			</section>
			<?
			include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
			?>
			<div id="btn_scroll">
				<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
				<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			</div>
		</div>
	</div>
<script type="text/javascript">
	$('#area_input').click(function(){
        var area_code = $('#area_code').val();
		var area_name = $('#area_name').val();

        if(area_name == ''){
                alert('지역명을 입력하세요.');
                return false;
        }
            var form = $('#area')[0];
            var formData = new FormData(form);
            for (var pair of formData.entries())
            {
            console.log(pair[0]+ ', ' + pair[1]);
            }
   		     var result = confirm("등록 하시겠습니까?");
    					if(result) { //확인 클릭 시
    						$.ajax({
    							type: 'POST',
    							url:"area_write_action.php",
    							data:formData,
                                cache:false,
                                contentType : false,
                                processData : false,
								 success:function(json){
    									 var obj = json.dataret;
     	                // var obj  = JSON.parse(data);
     	                var recode = obj[0].ret_code;
     	                var recode_msg = obj[0].ret_code_msg;
     	                 console.log('recode ' + recode + ' recode_msg ' + recode_msg);
     	                 alert(recode_msg);
     	                 if(recode == '100'){ //성공
    						location.href="area_list.php?top_menu_id=2001&left_menu_id=010";
     	                 }else{
    					    member_search_act();
                          }
    							 }
    						 // }
    					 });
    				}

    });

	$('#area_list').click(function(){
        var area_type = $('#area_type').val();
    	location.href = "area_list.php?top_menu_id=2001&left_menu_id=010";
 	});

</script>
</body>
</html>
