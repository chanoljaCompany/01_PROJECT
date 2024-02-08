<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
  $division = "menu_setting";
  $DESIGN_MENU_SETTING_TB = "design_menu_setting";

	$sql = "SELECT * FROM $DESIGN_MENU_SETTING_TB WHERE pension_user_id = '$session_userid' ORDER BY seq LIMIT 0,1";
	$result = sql_query($sql);
	$row = mysqli_fetch_array($result);

?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content" >
	<div id="container">
    <? include "$_SERVER[DOCUMENT_ROOT]/pension_prj/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
				<!-- <script type="text/javascript">
function qg_view() {
	$('.quickguide').show();
}
function qg_hide() {
	$('.quickguide').hide();
}
</script> -->
<!-- <div id="contentTop">
	<div class="location">
		<p style="display:none;">
			홈 &gt; 쇼핑몰설정 &gt; 국가별 설정		</p>
				<p onmouseover="qg_view()" onmouseout="qg_hide()">
			<a href="#" onclick="qmPlus('1010', 2); return false;" onmouseover="showToolTip(event,'이 페이지를 퀵메뉴로 추가할 수 있습니다.');" onmouseout="hideToolTip();"><img src="<?=$file_url?>/img/favorite.gif" alt=""> 퀵메뉴로 추가</a>
			<span class="quickguide"></span>
		</p>
					</div>
	<ul id="search_manual">
		<li><a href="#help" class="movie" onclick="toggleManual(false, 2); return false;">도움말</a></li>
	</ul>
</div> -->
<div class="clear"></div>
<script type="text/javascript">
var r_currency_list = new layerWindow('config@reference_currency.exe');
</script>
<form name="menu_setting" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden"	name="sub_menu_use_whether_array" id="sub_menu_use_whether_array" value="">
	<div class="box_title first">
		<h2 class="title">상단메뉴설정</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">메뉴설정</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
    <tbody id="menu_list_ajax_data">
    </tbody>
	</table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="menu_setting_input" value="등록"></span>
	</div>
</form>
</article>
</section>
		<?
		  include "$_SERVER[DOCUMENT_ROOT]/pension_prj/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    menu_setting();
  });

function menu_setting() {
  var division = $('#division').val();
  $.ajax({
    type: 'GET',
    url:'./menu_setting_ajax.php',
    data: {
           division : division
           // searchKey_1 : searchKey_1,
           // searchVal_1 : searchVal_1,
           // searchKey_2 : searchKey_2,
           // searchVal_2 : searchVal_2,
           // searchKey_3 : searchKey_3,
           // searchVal_3 : searchVal_3,
           // searchVal_4 : searchVal_4_array,
           // searchVal_5 : searchVal_5,
           // searchVal_6 : searchVal_6_array,
           // curpage : curpage
         },
    error: function (request, status, error) {
    console.log('sindySelect error');
    },
    success:function(html){
        $("#menu_list_ajax_data").html(html);
   }});
}

  $('#menu_setting_input').click(function(){
    var send_cnt = 0;
    var chkbox = $(".sub_menu_use_whether");
    var sub_menu_use_whether_array = Array();
    for(i = 0; i < chkbox.length ; i++) {
        if (chkbox[i].checked == true){
          sub_menu_use_whether_array[send_cnt] = "Y";
          send_cnt++;
        }else{
          sub_menu_use_whether_array[send_cnt] = 'N';
          send_cnt++;
        }
      }
    $('#sub_menu_use_whether_array').val(sub_menu_use_whether_array);

    var menu_arr = [];
    var isValid = true;
    $.each($("input[name='top_menu[]']"),function(k,v){
      menu_arr[menu_arr.length] = $(v).val();
      if($(v).val() == ''){
        alert('메뉴명은 필수입니다.');
        isValid = false;
        return false;
      }
    });
    if(isValid){
      var sh = document.menu_setting;
      sh.action = "menu_write_action.php";
      sh.submit();
    }else{
      alert('에러입니다.');
    }
  });
</script>
</body>
</html>
