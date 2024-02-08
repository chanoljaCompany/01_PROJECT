<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
  $division = "default_setting";
  $DESIGN_DEFAULT_SETTING_TB = "design_default_setting";

	$sql = "SELECT *	FROM $DESIGN_DEFAULT_SETTING_TB WHERE pension_user_id = '$session_userid' ORDER BY seq LIMIT 0,1";
	$result = sql_query($sql);
	$row = mysqli_fetch_array($result);
	// $membership_agreement = nl2br($row['membership_agreement']);
	// $privacy_policy = nl2br($row['privacy_policy']);
  // $payment_method = $row['payment_method'];
  // $payment_method_array = explode(",",$payment_method);

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
<form name = "management" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden"	name="payment_method_array" id="payment_method_array" value="">
	<div class="box_title first">
		<h2 class="title">사업자등록정보</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">사업자등록정보</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:35%">
			<col style="width:15%">
			<col style="width:35%">
		</colgroup>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="homepage_subject" id="homepage_subject" class="input input_full" placeholder="*필수) 홈페이지 제목" value="<?=$row['homepage_subject']?>">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="ceo_name" id="ceo_name" class="input input_full" placeholder="*필수) 대표자" value="<?=$row['ceo_name']?>">
			</td>
		</tr>
		<tr>
			<th scope="row">회사명</th>
			<td>
				<input type="text" name="company_name" id="company_name" class="input input_full" placeholder="*필수) 회사명" value="<?=$row['company_name']?>">
			</td>
			<th scope="row">휴대폰번호</th>
			<td>
				<input type="text" name="cellphone" id="cellphone" class="input input_full" placeholder="*필수) 휴대폰번호" value="<?=$row['cellphone']?>">
			</td>
		</tr>
		<tr>
			<th scope="row">사업자등록번호</th>
			<td>
				<input type="text" name="saup_number" id="saup_number" class="input input_full" placeholder="*필수) 사업자등록번호" value="<?=$row['saup_number']?>">
			</td>
			<th scope="row">대표번호</th>
			<td>
				<input type="text" name="phone_number" id="phone_number" class="input input_full" placeholder="*필수) 대표번호" value="<?=$row['phone_number']?>">
			</td>
		</tr>
		<tr>
			<th scope="row"  rowspan="3">사업장주소</th>
			<td rowspan="3">
				<input type="text" name="zip_code" id="zip_code" class="input" size="20" placeholder="*필수) 우편번호" value="<?=$row['zip_code']?>" readonly>
				<span class='box_btn_s blue'><a class='btn btn-success btn-sm' onclick="find_address()">우편번호찾기</a></span>
				<br><br><input type="text" name="address" id="address" class="input input_full" placeholder="*필수) 주소" value="<?=$row['address']?>" readonly>
				<br><br><input type="text" name="address_detail" id="address_detail" class="input input_full" placeholder="*필수) 상세주소" value="<?=$row['address_detail']?>">
			</td>
			<th scope="row">홈페이지 주소</th>
			<td>
				<input type="text" name="homepage_url" id="homepage_url" class="input input_full" placeholder="홈페이지주소" value="<?=$row['homepage_url']?>">
			</td>
		</tr>
		<tr>
      <th scope="row">팩스번호</th>
      <td>
        <input type="text" name="fax_number" id="fax_number" class="input input_full" placeholder="팩스번호" value="<?=$row['fax_number']?>">
      </td>
		</tr>
    <tr>
      <th scope="row">이메일주소</th>
      <td>
        <input type="text" name="email" id="email" class="input input_full" placeholder="*필수) 이메일주소" value="<?=$row['email']?>">
      </td>
    </tr>
		<tr>
			<th scope="row">계좌정보</th>
			<td>
				<input type="text" name="account_name" id="account_name" class="input" size="20" placeholder="*필수) 계좌명" value="<?=$row['account_name']?>">
				<span class='box_btn_s blue'><a class='btn btn-success btn-sm'>계좌인증</a></span>
				<br><br><input type="text" name="account_number" id="account_number" class="input input_full" placeholder="*필수) 계좌번호" value="<?=$row['account_number']?>">
				<br><br><input type="text" name="account_holder" id="account_holder" class="input input_full" placeholder="*필수) 예금주" value="<?=$row['account_holder']?>">
			</td>
			<th scope="row">객실수</th>
			<td>
				<input type="text" name="number_rooms" id="number_rooms" class="input input_full" placeholder="*필수) 객실수" value="<?=$row['number_rooms']?>">
			</td>
		</tr>
	</table>
	<div class="box_title first">
		<h2 class="title">결제코드 및 결제수단</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">국가별 사용설정</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:35%">
			<col style="width:15%">
			<col style="width:35%">
		</colgroup>
		<tr>
			<th scope="row">PG CODE</th>
			<td>
				<input type="text" name="pg_code" id="pg_code" class="input input_full" placeholder="*필수) PG CODE" value="<?=$row['pg_code']?>">
			</td>
			<th scope="row" rowspan="2">결제수단</th>
			<td rowspan="2">
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[0] == 'R'){?> checked <?}?>  class="payment_method"  value="R"> 실시간 계좌이체</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[1] == 'B'){?> checked <?}?>  class="payment_method" value="B"> 무통장입금</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[2] == 'C'){?> checked <?}?>  class="payment_method" value="C"> 카드</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[3] == 'H'){?> checked <?}?>  class="payment_method" value="H"> 휴대폰</label>
			</td>
		</tr>
		<tr>
			<th scope="row">PG KEY</th>
			<td>
				<input type="text" name="pg_key" id="pg_key" class="input input_full" placeholder="*필수) PG KEY" value="<?=$row['pg_key']?>">
			</td>
		</tr>
	</table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="management_input" value="등록"></span>
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
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script type="text/javascript">
	$('#management_input').click(function(){
		var division = $('#division').val();
		var homepage_subject = $('#homepage_subject').val();
		var ceo_name = $('#ceo_name').val();
		var company_name = $('#company_name').val();
		var cellphone = $('#cellphone').val();
		var saup_number = $('#saup_number').val();
		var phone_number = $('#phone_number').val();
		var zip_code = $('#zip_code').val();
		var address = $('#address').val();
		var address_detail = $('#address_detail').val();
		var account_name = $('#account_name').val();
		var account_number = $('#account_number').val();
		var account_holder = $('#account_holder').val();

    var send_cnt = 0;
    var chkbox = $(".payment_method");
    var payment_method_array = Array();
    for(i = 0; i < chkbox.length ; i++) {
        if (chkbox[i].checked == true){
          payment_method_array[send_cnt] = chkbox[i].value;
          send_cnt++;
        }else{
          payment_method_array[send_cnt] = '0';
          send_cnt++;
        }
      }

		if(homepage_subject == '') { warning('홈페이지 제목을','homepage_subject'); return false; }
    if(payment_method_array == '0,0,0,0') { warning('결제수단을 선택하세요','payment_method_array'); return false; }

    $('#payment_method_array').val(payment_method_array);
					var result = confirm("등록/변경 하시겠습니까?");
						 if(result) { //확인 클릭 시
							 var sh = document.management;
							 sh.action = "management_write_action.php";
							 sh.submit();
							}
	 });
</script>
</body>
</html>
