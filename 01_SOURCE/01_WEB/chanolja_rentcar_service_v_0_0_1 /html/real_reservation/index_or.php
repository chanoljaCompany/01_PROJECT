<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";

?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content" >
	<div id="container">
		<header id="adminHeader">
			<div class="logo">
				<h1><a href="/_manage/?body=main@main">WISA. WING</a></h1>
			</div>
			<div class="menu">
				<div class="area">
					<!-- <div class="multi">
						<a href="http://www.wisa.co.kr/mypage/addAccount/step1" target="_blank" class="add btt" tooltip="멀티샵 추가">멀티샵 추가</a>
						<ul class="list">
							<li class='selected'><div class='btt' tooltip="DODO CARE"><a href='#' onclick='return false;'><img src='//x67-engine.mywisa.com/wm_engine_SW/_manage/image/common/multi_kor.jpg' alt=''></a></div></li><li><div class='btt' tooltip="WISA"><a href='?body=main@sso.exe&domain=http%3A%2F%2Fsmartwingeng.mywisa.com&ret_url=https%3A%2F%2Fsmartwing.mywisa.com&nbody=1010'><img src='//x67-engine.mywisa.com/wm_engine_SW/_manage/image/common/multi_eng.jpg' alt='smartwingeng'></a></div></li><li><div class='btt' tooltip="株) WISA"><a href='?body=main@sso.exe&domain=http%3A%2F%2Fsmartwingch1.mywisa.com&ret_url=https%3A%2F%2Fsmartwing.mywisa.com&nbody=1010'><img src='//x67-engine.mywisa.com/wm_engine_SW/_manage/image/common/multi_chi.jpg' alt='smartwingch1'></a></div></li><li><div class='btt' tooltip="株) WISA"><a href='?body=main@sso.exe&domain=http%3A%2F%2Fsmartwingch2.mywisa.com&ret_url=https%3A%2F%2Fsmartwing.mywisa.com&nbody=1010'><img src='//x67-engine.mywisa.com/wm_engine_SW/_manage/image/common/multi_chi.jpg' alt='smartwingch2'></a></div></li><li><div class='btt' tooltip="株) WISA"><a href='?body=main@sso.exe&domain=http%3A%2F%2Fsmartwingjap.mywisa.com&ret_url=https%3A%2F%2Fsmartwing.mywisa.com&nbody=1010'><img src='//x67-engine.mywisa.com/wm_engine_SW/_manage/image/common/multi_jpn.jpg' alt='smartwingjap'></a></div></li><li><div class='btt' tooltip="스마트윙데모 - 태국어"><a href='?body=main@sso.exe&domain=http%3A%2F%2Fsmartwingtha.mywisa.com&ret_url=https%3A%2F%2Fsmartwing.mywisa.com&nbody=1010'><img src='//web.x67.wisamall.com/wm_engine_SW/_manage/image/common/multi_thi.jpg' alt='smartwingtha'></a></div></li>						</ul>
						<span class="more btt hidden" tooltip="멀티샵 더보기" onclick="multi_more(this)">멀티샵 더보기</span>
					</div> -->
					<div class="quick">
						<div class="intra">
							<a class="view_layer" alt="인트라넷" title="인트라넷">관리자님</a>
							<div class="box box_intra">
								<div class="profile">
									<p class="name">관리자</p>
									<p class="level">최고관리자 <a href="?body=intra@my_info">수정</a></p>
								</div>
								<div class="btn">
									<a href="./?body=intra@main" class="more">인트라넷</a>
									<a href="./?body=main@logout.exe">로그아웃</a>
								</div>
							</div>
						</div>
						<div class="icon shortcut_pc">
							<a href="https://smartwing.mywisa.com" target="_blank" alt="PC 버전 보기" title="PC 버전 보기"><span class="xi-desktop"></span></a>
						</div>
												<div class="icon shortcut_mobile">
							<a href="#" onclick="window.open('https://m.smartwing.mywisa.com', 'mobile_web', 'width=520px, height=900px, left=10px, top=10px'); return false;" target="_blank" alt="모바일 버전 보기" title="모바일 버전 보기"><span class="xi-mobile"></span></a>
						</div>
												<!-- <div class="icon tsearch">
							<a href="#search" class="search" onclick="tsearchOpen(true); return false;" alt="통합검색" title="통합검색"><span class="xi-search"></span></a>
						</div> -->
						<!-- <div class="icon more">
							<a class="view_layer" alt="더보기" title="더보기"><span class="xi-apps"></span> </a>
							<div class="box box_more">
								<h2>바로가기</h2>
								<ul>
									<li><a onclick="goMywisa('?body=customer@list'); return false;" class="customer">1:1 고객센터</a></li>									<li><a href="http://redirect.wisa.co.kr/notice/notice" target="_blank" class="notice">공지, 업데이트 </a></li>
									<li><a onclick="goMywisa('?body=wing@main'); return false;" class="wingstore">윙스토어</a></li>									<li><a href="#" onclick="window.open('http://redirect.wisa.co.kr/couponshop', 'couponshop', 'width=780px, height=900px, left=10px, top=10px'); return false;" class="mchange" target="_blank">모바일 교환권</a></li>
									<li><a onclick="toggleManual(false, 1); return false;" class="help">도움말</a></li>
								</ul>
							</div>
						</div> -->
					</div>
				</div>
				<?
				include "$_SERVER[DOCUMENT_ROOT]/pension_prj/menu_cate.php";
				?>

			</div>
		</header>
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
<form method="post" enctype="multipart/form-data" action="./index.php" target="hidden1608618704">
	<input type="hidden" name="body" value="config@multi_shop.exe">
	<div class="box_title first">
		<h2 class="title">사업자등록정보</h2>
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
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
		</tr>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
		</tr>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
		</tr>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
		</tr>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
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
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<th scope="row" rowspan="2">대표자</th>
			<td rowspan="2">
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
		</tr>
		<tr>
			<th scope="row">홈페이지 제목</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td>
			<!-- <th scope="row">대표자</th>
			<td>
				<input type="text" name="company_mall_name" class="input input_full" value="㈜위사">
			</td> -->
		</tr>
	</table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="submit" value="확인"></span>
	</div>
</form>
<script type="text/javascript">
	// function setCurrency(o) {
	// 	var _name = o.name.replace('_type','');
	// 	if($('.'+_name+'_area').length > 0) $('.'+_name+'_area').show();
	//
	// 	if(eval("o.form."+_name)) eval("o.form."+_name).value = o.value;
	//
	// 	if(o.value == 'N' || o.value == ''){
	// 		eval("o.form."+_name+"_decimal").value = '0';
	// 		if($('.'+_name+'_type_area').length > 0) $('.'+_name+'_type_area').hide();
	// 	}else{
	// 		var jsArr = {"\uc6d0":"0","USD":"2","$":"3","CNY":"2","\uffe5":"2","JPY":"0","AUD":"2"};
	// 		var _price_name = (_name=='currency')?"cur_sell_price":"cur_manage_price";
	// 		eval("o.form."+_price_name).setAttribute('data-decimal',jsArr[o.value]);
	//
	// 		if(o.type != 'text') {
	// 			eval("o.form."+_name+"_decimal").value = jsArr[o.value];
	// 		}
	//
	// 		$("."+_name+"_type_txt").html(o.value);
	// 	}
	// }

	// function skin_preview(p){
	// 	var _skin_name = $('#'+p).val();
	// 	if(!_skin_name){
	// 		alert("미리보기할 스킨을 선택하세요.");
	// 	}else{
	// 		var _opt = "";
	// 		if(p == 'mskin') _opt = "width=380px, height=700p";
	// 		window.open('./?body=design@skin_preview.frm&skin_name='+_skin_name, 'skin_preview', _opt);
	// 	}
	// }

	// $(window).ready(function(){
	// 	if ($('input[name="currency_position"][value="F"]').attr('checked')) {
	// 		$('#ex1').hide();
	// 	}else if ($('input[name="currency_position"][value="B"]').attr('checked')) {
	// 		$('#ex2').hide();
	// 	}
	//
	// 	if ($('input[name="r_currency_position"][value="F"]').attr('checked')) {
	// 		$('#ex3').hide();
	// 	}else if ($('input[name="r_currency_position"][value="B"]').attr('checked')) {
	// 		$('#ex4').hide();
	// 	}
	//
	// 	$('#use_r_currency_custom').click(function(){
	// 		if($(this).is(':checked')){
	// 			$('.r_currency_custom_area').show();
	// 			$('input[name="r_currency_type"]').attr('checked',false);
	// 			$('input[name="r_currency_type_custom"]').focus();
	// 		}else{
	// 			$('.r_currency_custom_area').hide();
	// 			$('input[name="r_currency_type"]:input[value=""]').prop('checked',true);
	// 			$('input[name="r_currency"]').val('');
	// 		}
	// 	});
	//
	// 	$('input[name="r_currency_type_custom"]').keyup(function(){
	// 		$(this).val($(this).val().toUpperCase());
	// 		$('input[name="r_currency"]').val($(this).val().toUpperCase());
	// 		$(".r_currency_type_txt").html($(this).val());
	// 	});
	//
	// 	$('input[name="r_currency_type"]').click(function(){
	// 		if($('#use_r_currency_custom').is(':checked')){
	// 			$('#use_r_currency_custom').attr('checked',false);
	// 			$('.r_currency_custom_area').hide();
	// 			$('input[name="r_currency_type_custom"]').val('');
	// 		}
	// 	});
	//
	// });

	function ex_currency(p){
		if (p == 1) {
			$('#ex1').hide();
			$('#ex2').show();
		} else if (p == 2) {
			$('#ex1').show();
			$('#ex2').hide();
		} else if (p == 3) {
			$('#ex3').hide();
			$('#ex4').show();
		} else if (p == 4) {
			$('#ex3').show();
			$('#ex4').hide();
		}
	}
</script>
       <!-- <div class="solving">
					<div class="title">
						<h2 class="solving_toggle">이용에 불편하시면 고객센터에서 도와드려요</h2>
					</div>
					<div class="solving_contents box_bottom" style="display:none;">
						<ol class="list">
							<li class="cell">
								<div class="box">
									<h3>문제해결 1</h3>
									<div class="content">
										<p>보고계신 페이지가 궁금하시다면<br>자주묻는 질문과 답변, 매뉴얼이<br>준비되어있습니다.</p>
																				<span class="box_btn_s blue"><a href="#" onclick="toggleManual('always', 3); return false;">도움말 보기</a></span>
																			</div>
								</div>
							</li>
							<li class="cell">
								<div class="box">
									<h3>문제해결 2</h3>
									<div class="content">
										<p>도움말 보기에서 해결이 안되신다면<br>전화보다 더 빠르고 정확한<br>1:1 고객센터를 이용해보세요.</p>
										<span class="box_btn_s blue"><a href="#" onclick="goMywisa('?body=customer@cs_reg'); return false;">지금 페이지관련 문의</a></span>
									</div>
								</div>
							</li>
							<li class="cell">
								<div class="box">
									<h3>문제해결 3</h3>
									<div class="content">
										<p class="ars"><span>1599-4435</span>평일 09:30~17:30 (점심시간 12~13시)</p>
										<ol class="number">
											<li>ㆍ쇼핑몰운영지원</li>
											<li>ㆍ디자인유지보수</li>
											<li>ㆍ광고&마케팅관리</li>
										</ol>
									</div>
								</div>
							</li>
							<li class="cell">
								<div class="box">
									<h3>문제해결 4</h3>
																		<div class="content">
										<p>지속관리기업 고객이시라면<br>1:1담당 매니저를 찾아주세요.<br><br></p>
									</div>
																	</div>
							</li>
						</ol>
					</div>
				</div> -->
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
	<!-- <div id="manual_content" class="right_navigator">
		<a href="https://help.wisa.co.kr/manual/index/C0208" class="link" target="_blank">새창열기</a>
		<a onclick="toggleManual(); return false;" class="close">닫기</a>
		<div class="content">
			<iframe id="manualWIndow" src="" width="100%" height="100%" scrolling="yes" frameborder="0"></iframe>
		</div>
	</div> -->
	<!-- <div id="total_search" class="right_navigator">
		<h1><img src="<?=$file_url?>/img/title_total_search.png" alt="W. 통합검색"></h1>
<form method="post" onSubmit="return false" class="search_form">
	<div>
		<input type="text" name="tsearch_str" value="" placeholder="메뉴, 매뉴얼, FAQ, 회원">
		<input type="submit" value="검색" class="btn">
	</div>
</form>
<p class="nodata" style="display:none;">검색어를 입력해주세요.</p>
<div class="tsearch_before">
		<div class="box search_cnt faq_big" style="display:none;">
		<h2>FAQ</h2>
		<a href="https://redirect.wisa.co.kr/smartwing_faq" target="_blank" class="quick">바로가기 &gt</a>
		<ul class="search_faq_list">

		</ul>
	</div>
</div>
<div class="tsearch_after">
	<span class="searchkeytest"></span>
	<ul class="tab">
		<li><a onclick="tsearchOpen(null, '');" class="all active">전체</a></li>
				<li><a onclick="tsearchOpen(null, 'member');" class="member">회원</a></li>
				<li><a onclick="tsearchOpen(null, 'menu');" class="menu">메뉴</a></li>
				<li><a onclick="tsearchOpen(null, 'manual');" class="manual">매뉴얼</a></li>
				<li><a onclick="tsearchOpen(null, 'faq');" class="faq">FAQ</a></li>
	</ul>
		<div class="box search_cnt member">
		<h2>회원(<span class="search_member_cnt">0</span>)</h2>
		<ul class="search_member_list">

		</ul>
		<a class="search_member_more more" onclick="tsearchOpen(null, 'member');" class="more"><span class="search_member_more_cnt"></span>개 검색결과 더보기 &gt</a>
		<p class="search_member_nodata nodata">검색결과가 없습니다.</p>
	</div>
		<div class="box search_cnt menu">
		<h2>메뉴(<span class="search_menu_cnt">0</span>)</h2>
		<ul class="search_menu_list">

		</ul>
		<a class="search_menu_more more" onclick="tsearchOpen(null, 'menu');" class="more"><span class="search_menu_more_cnt"></span>개 검색결과 더보기 &gt</a>
		<p class="search_menu_nodata nodata">검색결과가 없습니다.</p>
	</div>
		<div class="box search_cnt manual">
		<h2>매뉴얼(<span class="search_manual_cnt">0</span>)</h2>
		<a href="https://redirect.wisa.co.kr/smartwing_manual" target="_blank" class="quick">바로가기 &gt</a>
		<ul class="search_manual_list">

		</ul>
		<a class="search_manual_more more" onclick="tsearchOpen(null, 'manual');" class="more"><span class="search_manual_more_cnt"></span>개 검색결과 더보기 &gt</a>
		<p class="search_manual_nodata nodata">검색결과가 없습니다.</p>
	</div>
		<div class="box search_cnt faq">
		<h2>FAQ(<span class="search_faq_cnt">0</span>)</h2>
		<a href="https://redirect.wisa.co.kr/smartwing_faq" target="_blank" class="quick">바로가기 &gt</a>
		<ul class="search_faq_list">

		</ul>
		<a class="search_faq_more more" onclick="tsearchOpen(null, 'faq');" class="more"><span class="search_faq_more_cnt"></span>개 검색결과 더보기 &gt</a>
		<p class="search_faq_nodata nodata">검색결과가 없습니다.</p>
	</div>
</div>
<a onclick="closeTsearch();" class="close">닫기</a>
</div> -->
</div>
<!-- <script>
var _MANUAL_LINK_ = 'manual/index/C0208';
var _MANUAL_PGCODE_ = '1000';
</script> -->


<script type="text/javascript">
	/*
	var	ts = new R2TS('customerNotice', 'ts', 10, 150);
	var	tst = new R2TS('topSNotice', 'tst', 10, 150);
	onloaded = true;
	*/
	// 검색인풋 토글
	// function toggle_shadow() {
	// 	if ($('.select_input').hasClass('shadow')){
	// 		$('.select_input').removeClass('shadow');
	// 	} else {
	// 		$('.select_input').addClass('shadow');
	// 	}
	// }

	$(document).ready(function() {
		// 위로가기
		$('#scroll_top').click(function(){
			$('html, body').animate({scrollTop:0}, 'slow');
			return false;
		});
		// 아래로가기
		$('#scroll_bottom').click(function(){
			$('html, body').animate({scrollTop:$(document).height()}, 'slow');
			return false;
		});
		// 레이어 닫기
	// 	$(document).mouseup(function (e){
	// 		var container = $('.multi');
	// 		var list = $('.multi .list');
	// 		if(container.has(e.target).length == 0) {
	// 			list.removeClass('full');
	// 			list.parent().find('.more').removeClass('show');
	// 		}
	// 	});
	// });

	// 스크롤 이동
	// function move_category(obj) {
	// 	var pos = $(obj).offset();
	// 	var extra_space = 0;
	// 	var duration = "400";
	// 	$('html, body').animate({scrollTop : pos.top - extra_space}, duration);
	// }

	// 멀티샵 더보기
	// function multi_more(obj){
	// 	var multi_list = $('.multi .list');
	// 	if (multi_list.hasClass('full')) {
	// 		multi_list.removeClass('full');
	// 		$(obj).removeClass('show');
	// 	} else {
	// 		multi_list.addClass('full');
	// 		$(obj).addClass('show');
	// 	}
	// }

	// 탑메뉴 토글
	// $('.view_layer').click(function(){
	// 	$('#version_alarm').fadeOut(200);
	// 	var box = $(this).parent().find('.box');
	// 	if (box.css('display') == 'block') {
	// 		box.fadeOut(200);
	// 		box.removeClass('view_layer_toggle');
	// 		$(this).removeClass('selected');
	// 	} else {
	// 		$('.quick').find('.box').hide();
	// 		box.fadeIn(200);
	// 		box.addClass('view_layer_toggle');
	// 		$(this).addClass('selected');
	// 	}
	// });

	// 다른데 클릭시 토글 숨김
	// $(document).click(function(e){
	// 	$('.view_layer').each(function(){
	// 		var box = $(this).parent().find('.box');
	// 		if (box.css('display') == 'block') {
	// 			if(e.target != ""){
	// 				if (!$('.view_layer').has(e.target).length && !$('.view_layer_toggle').has(e.target).length) {
	// 					box.fadeOut(200);
	// 					box.removeClass('view_layer_toggle');
	// 					$(this).removeClass('selected');
	// 				}
	// 			}else{
	// 				if(e.target.className.indexOf('view_layer') == -1){
	// 					box.fadeOut(200);
	// 					box.removeClass('view_layer_toggle');
	// 					$(this).removeClass('selected');
	// 				}
	// 			}
	// 		}
	// 	});
	// });

	// 하단 고객센터 토글
	// $(".solving_toggle").click(function(){
	// 	if ($('.solving_contents').css('display') == 'block') {
	// 		$('.solving_contents').slideUp('fast');
	// 		$('.solving_toggle').removeClass('selected');
	// 	} else {
	// 		$('.solving_contents').slideDown('fast');
	// 		$('.solving_toggle').addClass('selected');
	// 		move_category('.solving');
	// 	}
	// });

	$(function(){
		setDatepicker();

		$('.R2Tip').mouseover(function() {
			new R2Tip(this, this.alt, null, event);
		});

		// $('.btt').btt('tooltip_square');

		// 금액필드 자동 컴마
		// $('.input_won').bind({
		// 	'focus' : function() {
		// 		this.value = removeComma(this.value);
		// 		if($(this).attr('data-decimal') && !parseInt($(this).attr('data-decimal'))) this.value = removeDot(this.value);
		// 	},
		// 	'blur' : function() {
		// 		this.value = setComma(this.value);
		// 		if($(this).attr('data-decimal') && !parseInt($(this).attr('data-decimal'))) this.value = removeDot(this.value);
		// 	},
		// 	'keyup' : function() {
		// 		if($(this).attr('data-decimal') && !parseInt($(this).attr('data-decimal'))) this.value = removeDot(this.value);
		//
		// 		// 환율 계산
		// 		if($(this).attr('data-type')){
		// 			var _type = $(this).attr('data-type');
		// 			var _manage_price = removeComma("");
		// 			var _sell_price = removeComma("");
		// 			var _name = $(this).attr('name');
		//
		// 			if(_type=='sell'){
		// 				var price = (removeComma(this.value)/_sell_price) * _manage_price;
		// 				if($('input[name="m_'+_name+'"]').attr('data-decimal') && !parseInt($('input[name="m_'+_name+'"]').attr('data-decimal'))) price = Math.round(price);
		// 				price= setComma(price);
		//
		// 				if($('input[name="m_'+_name+'"]').attr('data-decimal') && !parseInt($('input[name="m_'+_name+'"]').attr('data-decimal'))) price = removeDot(price);
		//
		// 				$('input[name="m_'+_name+'"]').val(price);
		// 			}else{
		// 				var price = (removeComma(this.value)/_manage_price) * _sell_price;
		//
		// 				_name = _name.replace('m_','');
		// 				if($('input[name="'+_name+'"]').attr('data-decimal') && !parseInt($('input[name="'+_name+'"]').attr('data-decimal'))){
		// 					price = Math.round(removeDot(price));
		// 				}else{
		// 					price = price.toFixed($('input[name="'+_name+'"]').attr('data-decimal'));
		// 				}
		// 				price= setComma(price);
		//
		// 				$('input[name="'+_name+'"]').val(price);
		// 			}
		// 		}
		// 	}
		// }).each(function() {
		// 	if($(this).attr('data-decimal') && !parseInt($(this).attr('data-decimal'))) this.value = Math.floor(removeComma(this.value));
		// 	this.value = setComma(this.value);
		// });

        // $('.tooltip_trigger').each(function() {
        //     var trigger = $(this);
        //     var tooltip = $('.'+trigger.data('child'));
        //     if(tooltip.length == 1) {
        //         trigger.on('click', function() {
        //             if(tooltip.css('display') == 'none') {
        //                 tooltip.css({'top': trigger.position().top, 'left': (trigger.position().left+trigger.width()+5)});
        //                 tooltip.fadeIn('fast');
        //             } else {
        //                 tooltip.fadeOut('fast');
        //             }
        //             return false;
        //         });
        //     }
        // });
        // $('.tooltip_closer').click(function() {
        //     $(this).parents('.info_tooltip').fadeOut('fast');
        //     return false;
        // });
	});
</script>
<ul class="list_msg">
</ul>
</body>
</html>
