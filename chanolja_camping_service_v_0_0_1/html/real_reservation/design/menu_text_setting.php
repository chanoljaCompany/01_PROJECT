<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
  $division = "menu_text_setting";
  $DESIGN_MENU_SETTING_TB = "design_menu_setting";
  $sql_menu = "SELECT *	FROM $DESIGN_MENU_SETTING_TB WHERE pension_user_id = '$session_userid' ORDER BY menu_rank ASC";
  $result_menu = sql_query($sql_menu);
  	$menu_info_array = array();
  	while ($rows_menu = mysqli_fetch_array($result_menu)) {
  		$arrData = array(
  							'menu_code' => $rows_menu['menu_code'],
  							'menu_name' => $rows_menu['menu_name'],
  							'menu_rank' => $rows_menu['menu_rank'],
  							'menu_link' => $rows_menu['menu_link']
  							 );
  		array_push($menu_info_array, $arrData);
  	}
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
<form name = "menu_text_setting" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden"	name="content_menu_id" id="content_menu_id" value="<?=$content_menu_id?>">

	<div class="box_title first">
		<h2 class="title">상단메뉴설정</h2>
	</div>
  <div class="box_tab">
	<ul>
    <!-- <?
      $id = "1";
    	foreach ($menu_info_array as $key=>$value) {
        $content_menu_id_sel = "";
        if($content_menu_id == $id){
          $content_menu_id_sel = "class='active'";
        }
    ?> -->
		<li><a href="?top_menu_id=<?=$top_menu_id?>&left_menu_id=<?=$left_menu_id?>&content_menu_id=<?=$id?>" <?=$content_menu_id_sel?>><?=$value['menu_name']?></a></li>
    <!-- <?$id++;}?> -->
		<!-- <li><a href="?body=2120&amp;prd_stat=2">정상<span class="prd_stat_2">18</span></a></li>
		<li><a href="?body=2120&amp;prd_stat=3">품절<span class="prd_stat_3">1</span></a></li>
		<li><a href="?body=2120&amp;prd_stat=4">숨김<span class="prd_stat_4">0</span></a></li> -->
	</ul>

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
		<span class="box_btn blue"><input type="button" id="menu_text_setting_input" value="등록"></span>
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
    menu_text_setting();
  });

function menu_text_setting() {
  var division = $('#division').val();
  var content_menu_id = $('#content_menu_id').val();
  $.ajax({
    type: 'GET',
    url:'./menu_setting_ajax.php',
    data: {
           division : division,
           content_menu_id : content_menu_id
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

  $('#menu_text_setting_input').click(function(){
    var menu_arr = [];
    var isValid = true;
    // $.each($("input[name='top_menu[]']"),function(k,v){
    //   menu_arr[menu_arr.length] = $(v).val();
    //   if($(v).val() == ''){
    //     alert('메뉴명은 필수입니다.');
    //     isValid = false;
    //     return false;
    //   }
    // });
    //
    // if(isValid){
      var sh = document.menu_text_setting;
      sh.action = "menu_write_action.php";
      sh.submit();
    // }else{
    //   alert('에러입니다.');
    // }
  });
</script>
</body>
</html>
