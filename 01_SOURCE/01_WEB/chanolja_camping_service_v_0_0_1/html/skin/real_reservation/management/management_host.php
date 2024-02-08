<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
    $division = "management_host";
	$sql = "SELECT * FROM $SALES_MEMBERS_TB WHERE user_id = '".$_SESSION['session_user_id']."' ORDER BY seq LIMIT 0,1";
	$row = sql_fetch($sql);
?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content" >
	<div id="container">
    <? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
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
<form name = "management" id = 'regFormMod' method="post" enctype="multipart/form-data">
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
			<th scope="row">회사명</th>
			<td>
				<input type="text" name="com_name" id="com_name" class="input input_full" placeholder="*필수) 회사명" value="<?=$row['com_name']?>">
			</td>
			<th scope="row">휴대폰번호</th>
			<td>
				<input type="text" name="handphone" id="handphone" class="input input_full" placeholder="*필수) 휴대폰번호" value="<?=$row['handphone']?>">
			</td>
		</tr>
		<tr>
			<th scope="row"  rowspan="3">주소</th>
			<td rowspan="3">
				<input type="text" name="zip_code" id="zip_code" class="input" size="20" placeholder="*필수) 우편번호" value="<?=$row['zip1']?>" readonly>
				<span class='box_btn_s blue'><a class='btn btn-success btn-sm' onclick="find_address()">우편번호찾기</a></span>
				<br><br><input type="text" name="address" id="address" class="input input_full" placeholder="*필수) 주소" value="<?=$row['address']?>" readonly>
				<br><br><input type="text" name="address_detail" id="address_detail" class="input input_full" placeholder="*필수) 상세주소" value="<?=$row['address_no']?>">
			</td>
			<th scope="row">비밀번호</th>
			<td>
				<input type="password" name="passwd" id="passwd" class="input input_full" placeholder="변경시에만 입력">
			</td>
		    </tr>
                <tr>
            <th scope="row">비밀번호확인</th>
            <td>
                <input type="password" name="passwd_re" id="passwd_re" class="input input_full" placeholder="변경시에만 입력">
            </td>
                </tr>
            <tr>
            <th scope="row">이메일주소</th>
            <td>
                <input type="text" name="email" id="email" class="input input_full" placeholder="*필수) 이메일주소" value="<?=$row['email']?>">
            </td>
            </tr>
		<!-- <tr>
			<th scope="row">계좌정보</th>
			<td>
				<input type="text" name="account_name" id="account_name" class="input" size="20" placeholder="*필수) 계좌명" value="<?=$row['account_name']?>">
				<br><br><input type="text" name="account_number" id="account_number" class="input input_full" placeholder="*필수) 계좌번호" value="<?=$row['account_number']?>">
				<br><br><input type="text" name="account_holder" id="account_holder" class="input input_full" placeholder="*필수) 예금주" value="<?=$row['account_holder']?>">
			</td>
			<th scope="row" rowspan="2">결제수단</th>
			<td rowspan="2">
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[0] == 'R'){?> checked <?}?>  class="payment_method"  value="R">가상계좌</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[1] == 'B'){?> checked <?}?>  class="payment_method" value="B"> 무통장입금</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[2] == 'C'){?> checked <?}?>  class="payment_method" value="C"> 카드</label>
        <label class="p_cursor"><input type="checkbox" <? if($payment_method_array[3] == 'H'){?> checked <?}?>  class="payment_method" value="H"> 휴대폰</label>
			</td>
		</tr> -->
	</table>
	<!-- <div class="box_title first">
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
	</table> -->
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="management_input" value="변경"></span>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script type="text/javascript">
	$('#management_input').click(function(){
        var Alpha = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
		var Digit = '1234567890'
		var astr = Alpha + Digit
        var com_name = $('#com_name').val();
        var passwd = $('#passwd').val();
        var passwd_re = $('#passwd_re').val();
        var handphone = $('#handphone').val();
        var zip_code = $('#zip_code').val();
        var address = $('#address').val();
        var email = $('#email').val();

        if( com_name == '' || com_name == 'undefined') {
            alert('회사명을 입력하셔야 합니다.');
            return false;
        }
        if( handphone == '' || handphone == 'undefined') {
            alert('핸드폰번호를 입력하셔야 합니다.');
            return false;
        }

        if( zip_code == '') {
             alert('우편번호 찾기로 우편번호를 입력하셔야 합니다.');
             return false;
        }
        
        if( address == '') {
             alert('주소를 입력하셔야 합니다.');
              return false;
        }

        if(passwd){
            if (Tcheck(passwd, Alpha + Digit, 5, 12,"비밀번호",'passwd')) {
                    return false;
            }
            if (passwd != passwd_re) {
                alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
                return false;
            }
        }
        
        var form = $('#regFormMod')[0];
            var formData = new FormData(form);
            for (var pair of formData.entries())
            {
            // console.log(pair[0]+ ', ' + pair[1]);
            }
            
        var result = confirm("수정 처리 하시겠습니까?");
		   if(result) { //확인 클릭 시
            $.ajax({
			    type: 'POST',
    		    	url:"management_write_action.php",
    		    	data:formData,
                       cache:false,
                       contentType : false,
                       processData : false,
			    	 success:function(json){
  		    		   var obj = json.dataret;
                       var recode = obj[0].ret_code;
                       var recode_msg = obj[0].ret_code_msg;
                       console.log('recode ' + recode + ' recode_msg ' + recode_msg);
                       alert(recode_msg);
                       if(recode == '100'){ //성공
                        location.reload();
                       }
                    }
                });
           }
	 });
</script>
</body>
</html>
