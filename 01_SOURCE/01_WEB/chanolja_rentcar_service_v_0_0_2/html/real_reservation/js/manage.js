// 留ㅻ돱�� �덉씠�� �닿린
function toggleManual(opened, refer){
	if($('#manual_content').css('display') == 'none') { // open
		if(refer) {
			var gtm_content = _MANUAL_LINK_.replace('manual/index/', '');
			switch(refer) {
				case 1 :
					refer = '&utm_campaign=wing_help&utm_medium=gnb_button&utm_content='+gtm_content;
					break;
				case 2 :
					refer = '&utm_campaign=wing_help&utm_medium=top_button&utm_content='+gtm_content;
					break;
				case 3 :
					refer = '&utm_campaign=wing_help&utm_medium=bottom_button&utm_content=';
					break;
				default :
					refer = '';
			}
		} else {
			refer = '';
		}
		$('#manualWIndow').prop('src', '//help.wisa.co.kr/'+_MANUAL_LINK_+'&refer=smt'+refer);
		$('.right_navigator').not('#manual_content').hide();

		if(opened == true || $('#admin_content').hasClass('view_manual') == true) {
			$('#manual_content').css({'display':'inline-block', 'right':0});
		} else {
			$('#manual_content').css({'right':-($('#manual_content').width())}).css('display', 'inline-block').animate({'right':0}, 300);
		}
		$('#admin_content').addClass('view_manual');
	} else { // close
		$('#admin_content').removeClass('view_manual');
		$('#manual_content').animate({'right':-($('#manual_content').width())}, 300, function() {
			this.style.display = 'none';
		});
	}

	setCookie(
		'manual_opened',
		($('#admin_content').hasClass('view_manual') ? 'true' : '')
	);
	reloadMainGraph();
}

function goManual(link) {
	_MANUAL_LINK_ = link;
	toggleManual();
}

function reloadMainGraph() { // 硫붿씤 洹몃옒�� �덉씠�� 異⑸룎 泥섎━
	if(typeof main_income_graph != 'undefined') {
		main_income_graph.redraw();
		main_customer_graph.redraw();
		main_join_graph.redraw();
		$('svg').attr('width', '100%');
	}
	$('.morris-hover').hide();
}

$(function() {
	if(getCookie('manual_opened') == 'true') {
		toggleManual(true);
	}
});

// �듯빀 寃��� �덉씠�� �닿린
window.tsearch_type = ''; // 寃��됱뼱
window.tsearch_paging = 0; // �섏씠吏�
function tsearchOpen(search, type) {
	$('.right_navigator').not('#total_search').hide();

	var search_str = (typeof search != 'string') ? $('input[name=tsearch_str]').val() : search;
	if(typeof type == 'string') { // �� �대┃ ��
		window.tsearch_type = type;
		window.tsearch_paging = 0; // �섏씠吏� 珥덇린��
	}
	if(search_str) {
		$('#total_search > .nodata').hide();
	}

	if(typeof search == 'boolean') {
		if($('#total_search').css('display') == 'none') { // 寃��됱갹 �닿린
			$('#admin_content').addClass('view_manual');
			if($('#admin_content').hasClass('view_manual') == true) {
				$('#total_search, #total_search>h1').show();
			} else {
				$('#total_search, #total_search>h1')
					.css({'right':-($('#total_search').width())})
					.show()
					.animate({'right':0}, 300);
			}
			$('#total_search').show();
			$('input[name=tsearch_str]').focus();
			$('#total_search .close').show();
		} else { // �쒕쾲 �� �대┃ �� �リ린
			closeTsearch();
			return;
		}
	}

	$.get('./?body=main@search.exe', {'search':search_str, 'pgcode_big':_MANUAL_PGCODE_, 'type':window.tsearch_type, 'start':window.tsearch_paging}, function(r) {
		console.log(r);
		// 寃��� 寃곌낵 �쒖떆
		var items = new Array('menu', 'manual', 'faq', 'member');
		var search_cnt = 0;
		for(var key in items) {
			var item = items[key];
			var data = r[item];
			if(data) {
				data.cnt = parseInt(data.cnt)
				$('.search_'+item+'_cnt').html(setComma(data.cnt));
				if(search != null || type != null) {
					$('.search_'+item+'_list').html(data.list);
				} else {
					$('.search_'+item+'_list').append(data.list);
				}
				if(data.cnt == 0) {
					$('.search_'+item+'_nodata').show();
				} else {
					$('.search_'+item+'_nodata').hide();
				}
				if(window.tsearch_type == '' && data.cnt > 3) {
					$('.search_'+item+'_more_cnt').html(setComma(data.cnt-3));
					$('.search_'+item+'_more').show();
				} else {
					$('.search_'+item+'_more').hide();
				}
				search_cnt+=data.cnt;
			}
		}
		// 寃��� �놁쓣 �� faq best5 異쒕젰 �щ�
		if(!r.faq || r.faq.cnt == 0) {
			$('.tsearch_before > .faq_big').hide();
		} else {
			$('.tsearch_before > .faq_big').show();
		}

		// nodata �붾㈃ 異쒕젰
		if(search_str =='' && search_cnt == 0 && $('.tsearch_before > .relative').length == 0) $('#total_search > .nodata').show();

		// �� 泥섎━
		if(typeof type == 'string') {
			$('.tsearch_after>.tab>li>a').removeClass('active');
			$('.tsearch_after>.tab>li>a.'+(type == '' ? 'all' : type)).addClass('active');
			if(type == '') {
				$('.box.search_cnt').show();
			} else {
				$('.box.search_cnt').not('.'+type).hide();
				$('.box.search_cnt.'+type).show();
			}
		}

		// �섏씠吏� 湲곗뼲
		window.tsearch_paging = parseInt(r.paging);

		// �ㅽ겕濡� �대깽�� �곗냽 �ㅽ뻾 諛⑹�
		$('#total_search').removeClass('tLoading');

		reloadMainGraph();
	});
}

function closeTsearch() {
	$('#total_search .close').hide();
	$('#admin_content').removeClass('view_manual');
	$('#total_search, #total_search>h1').animate({'right':-($(this).width())}, 300, function() {
		this.style.display = 'none';
		this.style.right = 0;
		reloadMainGraph();
	});
}

$(function() {
	// 寃��� �ㅼ썙�� �낅젰
	if(typeof _MANUAL_PGCODE_ != 'undefined') {
		window.tsearch_str = '';
		setInterval(function() {
			var tsearch_str = $('input[name=tsearch_str]').val();
			if(window.tsearch_str != tsearch_str) {
				window.tsearch_str = tsearch_str;

				tsearch_str = $.trim(tsearch_str);
				if(/(��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��|��)$/.test(tsearch_str)) {
					return;
				}
				if(tsearch_str) {
					$('.tsearch_before').hide();
					$('.tsearch_after').show();
				} else {
					$('.tsearch_before').show();
					$('.tsearch_after').hide();
				}
				tsearchOpen(tsearch_str);
			}
		}, 500);
	}

	// �먮룞 �ㅽ겕濡�
	$('#total_search').on('scroll', function() {
		var _this = $(this);
		if(window.tsearch_type && _this.hasClass('tLoading') == false) {
			if(_this.prop('scrollHeight')-_this.height()-_this.scrollTop() < 50) {
				_this.addClass('tLoading');
				tsearchOpen();
			}
		}
	});
});

function getCalContent(addq) {
	if(!addq) addq='';
	$.get('./?body=intra@calendar_inc.exe&mno=<?=$admin[no]?>&db=my_attend'+addq, function(r) {
		$('intra_calendar').html(r);
	});
}

var popup;
var St;

function goM(body) {
	if(!body) {
		window.alert('�꾩옱 �낅뜲�댄듃以묒엯�덈떎.');
		return;
	}
	document.location.href='./?body='+body;
}

var oc = 0;
function openAllCate() {
	var sub = $('.catelist > LI').filter('[id^=cate]');
	sub.css('display', oc==1 ? 'none' : 'block');

	var oc_o = $('#oc_span');
	if(!oc_o) return;
	if(oc==1) {
		oc_o.html('紐⑤몢 �쇱퀜蹂닿린');
		oc=0;
	} else {
		oc_o.html('紐⑤몢 媛먯텛湲�');
		oc=1;
	}
}

function viewOrder(ono,anchor) {
	var viewId = 'viewOrderV2';
	if(getCookie('def_omode') != '0') viewId+=ono;
	viewId = viewId.replace(/[^0-9a-z]/i, '');
	var nurl = './?body=order@order_view.frm&ono='+ono;
	if(anchor) nurl += anchor;
	if(isCRM) window.location.href = nurl;
	else window.open(nurl,viewId,'top=10,left=10,status=no,toolbars=no,scrollbars=yes,height=400px,width=1500px');
}

function upNum(o,num){
	if(!o.value) o.value=0;
	o.value = (num==0) ? 0 : parseInt(o.value)+num;
}

function addBank(f){
	if(!checkSel(f.bank,'���됱쓣 �좏깮�댁＜�몄슂.')) return false;
	if(!checkBlank(f.account,'怨꾩쥖踰덊샇瑜� �낅젰�댁＜�몄슂.')) return false;
	if(!checkBlank(f.owner,'�덇툑二쇰� �낅젰�댁＜�몄슂.')) return false;
	f.exec.value='new';
	f.submit();
}

function updateBank(f){
	if(!confirm('�꾩옱 �ㅼ젙�� �곸슜�섍쿋�듬땲源�?')) return;
	var tmp="";
	for (i=0; i<f.bankLst.length; i++)
	{
		tmp+=f.bankLst[i].value+'::'+(i+1)+'@';
	}
	f.new_sort.value=tmp;
	f.submit();
}

function checkPrdField(f){
	if(!checkBlank(f.name,'��ぉ紐낆쓣 �낅젰�댁＜�몄슂.')) return false;
	if(f.ftype[1].checked==true && !checkBlank(f.soptions,"�좏깮�� ��ぉ�� �낅젰�댁＜�몄슂.")) return false;

	f.target = hid_frame;
	printLoading();
}

function chgCate(obj,ch,ch2) {
	var sel0 = document.getElementsByName(ch)[0];
	var sel1 = document.getElementsByName(ch2)[0];
	var level = (sel1) ? 2 : 3;
	var pr = (sel1) ? "big" : "mid";

	for (var x = 0; x < 2; x++ ) {
		t_sel = eval("sel"+x);
		if(t_sel) {
			t_sel.selectedIndex = 0;
			for (i = t_sel.length; i >= 1; i--) {
				t_sel.remove(i);
			}
		}
	}

	if(!obj.value) return;

	$.get("./?body=product@product_cate.exe&no="+obj.value+"&level="+level+"&parent="+pr, function(data) {
		line = data.split("�곣뼴");
		for (i = 0; i < line.length; i++) 	{
			temp = line[i].split ("����");
			if(temp[0] && temp[1]) {
				newOPT = document.createElement("OPTION");
				newOPT.value = temp[0];
				newOPT.innerText = temp[1];
				sel0.appendChild(newOPT);
			}
		}
	});
}

function chgCateInfinite(obj, level, prefix) {
	var nm = ['', 'big', 'mid', 'small', 'depth4'];
	for(var i = level; i <= 4; i++) {
		$('select[name='+prefix+nm[i]+']>option:gt(0)').remove();
	}
	if(!obj.value) return;

	var sel = $('select[name='+prefix+nm[level]);
	$.get("./?body=product@product_cate.exe&no="+obj.value+"&level="+level, function(data) {
		line = data.split("�곣뼴");
		for (i = 0; i < line.length; i++) 	{
			temp = line[i].split ("����");
			if(temp[0] && temp[1]) {
				newOPT = document.createElement("OPTION");
				newOPT.value = temp[0];
				newOPT.innerText = temp[1];
				sel.append(newOPT);
			}
		}
	});
}

function addOptItem(pno, opno, is_add) {
	$('.opt_add_btn').hide();
	if(is_add == true) {
		if($('.option_item_row').length > 0) {
			is_add = $('.option_item_row').last().attr('id').replace('option_row_', '');
		} else {
			is_add = -1;
		}
	}
	$.post('./index.php', {'body':'product@product_option_item.frm', 'execmode':'ajax', 'is_add':is_add}, function(r) {
		$('#option_items').append(r);
		setOtype();
		$('.opt_add_btn').show();
	});
}

function cellDelete(cellId, ino) {
	var itemTbl = document.getElementById('optItem');
	var cellRow = document.getElementById('option_row_'+cellId);
	var f = document.getElementsByName('optFrm')[0];

	if(!cellRow) return;
	if(!ino) {
		cellRow.parentNode.removeChild(cellRow);
		return;
	}

	if(confirm('�듭뀡 ��젣 �� �대떦 �듭뀡�쇰줈 �먮ℓ�� �곹뭹�� ���� �ш퀬泥섎━媛� �붿씠�� �대（�댁�吏� �딄쾶 �섎ŉ, ��젣 �� �듭뀡�� 蹂듦뎄�� 遺덇��� �⑸땲��.\t\n\n�뺣쭚 �듭뀡�� ��젣�섏떆寃좎뒿�덇퉴?\t')) {
		$.post('./index.php?body=product@product_option.exe', {"exec":"remove_item", "no":ino, "opno":f.opno.value}, function (returnResult) {
			if(returnResult == 'OK') {
				cellRow.parentNode.removeChild(cellRow);
			} else {
				window.alert(returnResult);
			}
		});
	}
}

function addPrcItem()
{
	var objTbl = document.getElementById('optItem');
	var objRow = objTbl.insertRow(objTbl.rows.length);
	var objCell1 = objRow.insertCell();
	var objCell2 = objRow.insertCell();
	var objCell3 = objRow.insertCell();
	var onum=objTbl.rows.length-3;
	objCell1.innerHTML ='<input type="text" name="multi_prc_title[]" id="multi_prc_title" value="" class="input" size="10">';
	objCell2.innerHTML ='<input type="text" name="multi_prc_price[]" id="multi_prc_price" value="" class="input" size="10">';
	objCell3.innerHTML ='<input type="text" name="multi_prc_milage[]" id="multi_prc_milage" value="" class="input" size="10">';

}

function del_line() {
	var objTbl = document.getElementById('optItem');
	rno=objTbl.rows.length-1;
	if(rno>1) objTbl.deleteRow(objTbl.rows.length-1);

	if(popup) Resize(document.body.scrollWidth, document.body.scrollHeight);
}

function checkPrdOption(f){
	if(!checkBlank(f.name,'�듭뀡紐낆쓣 �낅젰�댁＜�몄슂.')) return false;
	if(!checkCB(f.otype,'�띿꽦(踰꾪듉 醫낅쪟)瑜� �좏깮�댁＜�몄슂.')) return false;
	if(St == "Y"){
		var items_ea=0;
		frm=document.optFrm;
		if(typeof frm.ea_ck == 'object' && frm.ea_ck.checked){
			if(typeof frm["item_ea[]"].length == 'undefined'){ num=1; }else{ num=frm["item_ea[]"].length; }
			for(ii=0; ii<num; ii++){
				if(frm["item"][ii].value){
					var Fd=frm["item_ea[]"][ii];
					if(CheckType(Fd.value, NUM) == false){ alert("�듭뀡�섎웾�� �レ옄濡� �낅젰�섏꽭��."); Fd.select(); return false; }
					if(Fd.value) items_ea += eval(Fd.value);
				}
			}
			if(items_ea != ea){ alert("�듭뀡�섎웾�� 珥� "+ea+" �댁뼱�� �⑸땲��. \n\n�꾩옱 �낅젰�섎웾 : "+items_ea); return false; }
		}
	}

	//�ㅻ쭏�몄뒪�좎뼱 泥댄겕
	var zero_count = 0;
	if(opener.top.$("[name='n_store_check']:checked").val() == "Y") {
		$(".add_price").each(function() {
		   if(this.value == 0) zero_count += 1;
		});
		if(zero_count == 0) {
			window.alert('�ㅻ쭏�몄뒪�좎뼱 �ъ슜 �� �듭뀡 異붽�湲덉븸�� 0�먯씤 �곹뭹�� 議댁옱�댁빞 �⑸땲��.');
			return false;
		}
		if($('[name = necessary]:checked').val() != 'Y' && $('[name = necessary]:checked').val() != 'N')
		{
			window.alert('�ㅻ쭏�몄뒪�좎뼱 �ъ슜 �� 遺��띿긽�덉� �ъ슜 �� �� �놁뒿�덈떎.');
			return false;
		}
	}
}

function deletePrdOption(opno, f){
	if(!f) var f = document.optFrm;
	else {
		if(!checkCB(f.check_pno,"��젣�� �곹뭹�� �좏깮�댁＜�몄슂")) return;
		f.stat.value = "5"; // �숈떆 ��젣紐⑤뱶
	}

	if(!confirm('�좏깮�섏떊 �듭뀡�� ��젣�섏떆寃좎뒿�덇퉴?')) return;
	if(opno) f.opno.value=opno; // �⑤룆��젣紐⑤뱶
	f.exec.value='delete';
	f.submit();
}

function checkThumb(){
	if(pf.m_thumb) pf.m_thumb.checked = false;

	if(pf.auto_thumb.checked==true) {
		textDisable(pf.upfile2,'1');
		textDisable(pf.upfile3,'1');
	}
	else {
		textDisable(pf.upfile2,'');
		textDisable(pf.upfile3,'');
	}
}

function checkMThumb(){
	pf.auto_thumb.checked = false;

	if(pf.m_thumb.checked==true) {
		textDisable(pf.upfile2,'1');
		textDisable(pf.upfile3,'1');
	}
	else {
		textDisable(pf.upfile2,'');
		textDisable(pf.upfile3,'');
	}
}

function chgEaType(){
	var ea_type = $(':checked[name=ea_type]').val();
	var fr = document.getElementById('optFrame');
	if(fr) {
		var url = fr.src.replace(/&eatype=[0-9]+/, '');
		fr.contentWindow.location.href = url+'&eatype='+ea_type;
	}
}

function chgOcate(){
	if(!pf.oc_check) return;
	if(pf.oc_check.checked==true) window.frames['cate31'].location.href='./?body=product@product_cate.frm&ctype=3&level=1'
	else window.frames['cate31'].location.href='./?body=config@blank.frm'
}

function delPrdAttatch(n){
	if(!confirm('�좏깮�섏떊 �뚯씪�� ��젣�섏떆寃좎뒿�덇퉴?')) return;
	var af=document.delPrdImgFrm;
	af.ino.value=n;
	af.submit();
}

function delPrdIcon(n){
	if(!confirm('�좏깮�섏떊 �꾩씠肄섏쓣 ��젣�섏떆寃좎뒿�덇퉴?')) return;
	var af=document.mngIconFrm;
	af.exec.value="delete";
	af.ino.value=n;
	af.submit();
}

function modifyPrdIcon(n){
	var input = $("<input type='file' name='upfile'>");
	$(input).change(function() {
		var param = {
			'body':'product@product_icon.exe',
			'exec':'modify',
			'ino':n,
		}
		commonAjaxUpload(this, './index.php', param, function(r) {
			location.reload();
		});
	});
	input.click();
}

function checkPrdGiftReg(f){
	if(!checkBlank(f.name,'�ъ��� 紐낆쓣 �낅젰�댁＜�몄슂.')) return false;
}

function delPrdGift(n){
	if(!confirm('�좏깮�섏떊 �ъ��덉쓣 ��젣�섏떆寃좎뒿�덇퉴?')) return;
	var af=document.delPrdGiftFrm;
	af.gno.value=n;
	af.submit();
}

function checkPrdGiftApply(f){
	if(!checkCB(f.gno,"�� �곹뭹�� �곸슜�� �ъ��덉쓣 �좏깮�댁＜�몄슂.")) return false;
}

function checkPrdReg(f){
	if(!$(f.big).val()) {
		window.alert('��遺꾨쪟瑜� �좏깮 �� 二쇱떗�쒖삤.');
		return false;
	}

	if(!checkBlank(f.name,'�곹뭹紐낆쓣 �낅젰�댁＜�몄슂.')) return false;
	if(!checkBlank(f.sell_prc,product_sell_price_name+'瑜� �낅젰�댁＜�몄슂.')) return false;
	if(f.weight && !checkBlank(f.weight,'臾닿쾶瑜� �낅젰�댁＜�몄슂.')) return false;
	//if(!checkNum(f.sell_prc,product_sell_price_name+'��')) return false;
	//if(!checkNum(f.normal_prc,product_normal_price_name+'��')) return false;

	if($(':checked[name=ea_type]', f).val() == '3'  && f.stat[0].checked==true) {
		if(!checkNum(f.ea,'�쒖젙 �섎웾�� �좏깮�댁＜�몄슂.')) return false;
		if(eval(f.max_ord.value)>eval(f.ea.value)) {
			window.alert('理쒕� 二쇰Ц �쒕룄媛� �쒖젙 �섎웾蹂대떎 �� �� �놁뒿�덈떎');
			f.max_ord.focus();
			return false;
		}

		if(f.ck_opt_ea.value != "") { // �듭뀡�� �덉쑝硫댁꽌 �섎웾�� 蹂�寃쏀븳寃쎌슦
			oCk=""
			cut=f.ck_opt_ea.value.split("/");
			for(oo=0; oo<cut.length-1; oo++){
				if(cut[oo]){
					if(cut[oo] != f.ea.value) oCk="Y";
				}
			}
			if(oCk == "Y"){
				alert("�ш퀬�섎웾�� �듭뀡�섎웾怨� �쇱튂�섏� �딆뒿�덈떎. �깅줉 �� �뺤씤�� 二쇱떆湲� 諛붾엻�덈떎.");
			}
		}
	}

// �먯떎�섎뒗 VALUE �� GET METHOD ��
	layTgl(document.getElementById('bodyLay2'));
	layTgl(document.getElementById('bodyLay3'));
	if(oEditors.getById && oEditors.getById['content2']) {
		if(oEditors.getById) oEditors.getById['content2'].exec("UPDATE_CONTENTS_FIELD", []);
		$('#content2').val($('#content2').val().replace(unescape("%uFEFF"), ""));
	}

	if(oEditors.getById && oEditors.getById['m_content']) {
		if(oEditors.getById) oEditors.getById['m_content'].exec("UPDATE_CONTENTS_FIELD", []);
		$('#m_content').val($('#m_content').val().replace(unescape("%uFEFF"), ""));
	}

	$('#stpBtn').hide()
}

function updatePrd(){
	if(!checkCB(pf.check_pno,"理쒖떊�쇰줈 蹂�寃쏀븷 �곹뭹�� �좏깮�댁＜�몄슂.")) return;
	if(!confirm('�좏깮�섏떊 �곹뭹�� 紐⑤몢 理쒖떊�쇰줈 蹂�寃쏀븯�쒓쿋�듬땲源�?     ')) return;
	pf.body.value="product@product_update.exe";
	pf.exec.value="update";
	pf.submit();
}

function editPrd(){
	if(!confirm('�꾩옱 �낅젰�� 媛�寃�, �곷┰湲�, �곹깭瑜� �곸슜�섏떆寃좎뒿�덇퉴?     ')) return;
	pf.body.value="product@product_update.exe";
	pf.exec.value="";
	pf.submit();
}

function deletePrd(is_trash){
	if(!checkCB(pf.check_pno,"��젣�� �곹뭹�� �좏깮�댁＜�몄슂.")) return;
	var msg = (is_trash == 'Y') ?
		'�좏깮�� �곹뭹�� �댁��듭쑝濡� �대룞�쒗궎寃좎뒿�덇퉴?\n�댁��듭뿉 �대룞�� �곹뭹�� �ㅼ젙 �� 湲곌컙 寃쎄낵 �� �먮룞�쇰줈 �곴뎄��젣 �⑸땲��.' :
		'�좏깮�섏떊 �곹뭹�� ��젣�섏떆寃좎뒿�덇퉴?\n�곹뭹 諛붾줈媛�湲� 議댁옱�� 諛붾줈媛�湲곕룄 �④퍡 ��젣�⑸땲��.\n(諛붾줈媛�湲� ��젣�쒖뿉�� 諛붾줈媛�湲곕쭔 ��젣�⑸땲��.)';
	if(!confirm(msg)) return;
	pf.body.value="product@product_update.exe";
	pf.exec.value="delete";
	pf.submit();
}

function thumbPrd(){
	if(!checkCB(pf.check_pno,"�몃꽕��(以�/�뚯씠誘몄�)�� �앹꽦�� �곹뭹�� �좏깮�댁＜�몄슂.")) return false;
	if(!confirm('\n �좏깮�섏떊 �곹뭹�� �몃꽕�쇱쓣 �쇨큵 �앹꽦�섍쿋�듬땲源�? \n\n �곗씠誘몄�媛� �녿뒗 �곹뭹�� 嫄대꼫�곷땲��  \n\n �곹뭹�� 留롮쓣 寃쎌슦 �대�吏� 泥섎━ �쒓컙�� 湲몄뼱吏묐땲�� \n')) return;
	pf.body.value="product@product_update.exe";
	pf.exec.value="thumb";
	pf.submit();
}

function deleteQna(f, is_trash){
	if(!checkCB(f.check_pno,"��젣�� �곹뭹 吏덈Ц�� �좏깮�댁＜�몄슂.")) return;
	var msg = (is_trash == 'Y') ?
		'�좏깮�� �곹뭹Q&A瑜� �댁��듭쑝濡� �대룞�쒗궎寃좎뒿�덇퉴?\n�댁��듭뿉 �대룞�� �곹뭹Q&A�� �ㅼ젙 �� 湲곌컙 寃쎄낵 �� �먮룞�쇰줈 �곴뎄��젣 �⑸땲��.' :
		'�좏깮�섏떊 �곹뭹Q&A瑜� ��젣�섏떆寃좎뒿�덇퉴?';
	if(!confirm(msg)) return;
	f.body.value="member@product_qna_update.exe";
	f.exec.value="delete";
	f.method='post';
	f.target=hid_frame;
	f.submit();
}

function viewMember(n,id,smode){
	if(n=='0')
	{
		alert('鍮꾪쉶�먯엯�덈떎');
		return;
	}
	if(id==undefined)
	{
		id='';
	}
	var viewId = 'viewMember';
	if(getCookie('def_cmode') != '0') viewId+=id;
	viewId = viewId.replace(/[^0-9a-z]/i, '');
	nurl='./?body=member@member_view.frm&mno='+n+'&mid='+id+'&pgCode=5010';
	if(smode) nurl += '&smode='+smode;
	window.open(nurl,viewId,'top=10px,left=10px,width=950px,height=100px,status=no,toolbars=no,scrollbars=yes');
}

function smsSend(sms){
	nurl='./?body=member@sms_sender.frm&cell='+sms;
	window.open(nurl,'wm_sms','top=10,left=200,width=920,height=650,status=no,toolbars=no,scrollbars=yes');
}

function smsMail(mail){
	nurl='./pop.php?body=member@email_sender.frm&email='+mail;
	window.open(nurl,'wm_smsMail','top=10,left=200,width=700,height=510,status=no,toolbars=no,scrollbars=no');
}

function checkEditMember(f){

	if(!checkBlank(f.name,"�대쫫�� �낅젰�댁＜�몄슂.")) return false;
	if(f.pwd.value) {
		if(f.pwd.value.length<4) {
			window.alert('鍮꾨�踰덊샇瑜� 4�먯씠�� �낅젰�섏꽭��');
			f.pwd.focus();
			return false;
		}
		if(!CheckType(f.pwd.value,PASSWORD)) {
			window.alert('鍮꾨�踰덊샇�� �곷Ц,�レ옄,�뱀닔湲고샇留� �ъ슜�� �� �덉뒿�덈떎');
			f.pwd.focus();
			return false;
		}
	}

	if(member_join_addr=="Y") {
		if(!checkBlank(f.zip,'�고렪踰덊샇寃��됱쓣 �뚮윭 �고렪踰덊샇瑜� �낅젰�댁＜�몄슂.')) return false;
		if(!checkBlank(f.addr1,'�고렪踰덊샇寃��됱쓣 �뚮윭 二쇱냼瑜� �낅젰�댁＜�몄슂.')) return false;
		if(!checkBlank(f.addr2,'�섎㉧吏� 二쇱냼瑜� �낅젰�댁＜�몄슂.')) return false;
	}

	if(!checkBlank(f.email1,'�대찓�� 二쇱냼瑜� �낅젰�댁＜�몄슂.')) return false;
	if(!checkSel(f.email3,"�대찓�� 二쇱냼瑜� �낅젰�댁＜�몄슂.")) return false;
	var emails=f.email1.value+'@'+f.email2.value;
	if(CheckType(emails,EMAIL)==false || CheckMail(emails)==false) {
		alert('�대찓�� �뺤떇�� �좏슚�섏� �딆뒿�덈떎');
		f.email1.focus();
		return false;
	}

	return true;
}


function addBookmark(){
	if(confirm('�꾩옱 硫붾돱瑜� 諛붾줈媛�湲곗뿉 異붽��섍쿋�듬땲源�?')) document.bookmarkAddFrm.submit();
}

function loadBookMark(o){
	o[0].text='Loading...';
	location.href='./?body=main@bookmark.frm&load=1';
}

function checkPrdSort(f){
	newSort=new Array();
	for (i=0; i<f.sort.length; i++)
	{
		for (j=0; j<newSort.length; j++)
		{
			if(newSort[j]==f.sort[i].value)
			{
				window.alert('\n '+newSort[j]+'踰덉㎏ �쒖쐞媛� �먭컻 �댁긽 �덉뒿�덈떎                 \n\n �쒖꽌�� 以묐났�섏� �딄쾶 �ㅼ젙�댁＜�몄슂\n');
				f.sort[i].focus();
				return false;
			}
		}
		newSort[i]=f.sort[i].value;
	}
}

function tagCopy(url){
    window.clipboardData.setData('Text',url);
	window.alert('�쒓렇媛� �대┰蹂대뱶�� 蹂듭궗�섏뿀�듬땲��');
}

function searchSubmit(f,b){
	f.body.value=b;
	f.method='get';
	f.submit();
}

function checkLoad(){
	if(loading==0)	{
		window.alert('\n �섏씠吏�瑜� �щ뒗 以묒엯�덈떎             \n\n �좎떆留� 湲곕떎由ъ꽭��\n');
		return;
	}
}

function gageTbl(msg){
	var bt=document.getElementById('gageTbl');
	if(msg) {
		ms=document.getElementById('coplMsg');
		ms.innerHTML=msg;
	}
	loadingGage+=8;
	if(loadingGage>100) loadingGage=100;
	bt.style.width=loadingGage+'%';
}

function checkAdminPwd(f){
	if(!checkBlank(f.pwd[0],"�꾩옱 鍮꾨�踰덊샇瑜� �낅젰�댁＜�몄슂.")) return false;
	if(!checkBlank(f.pwd[1],"�� 鍮꾨�踰덊샇瑜� �낅젰�댁＜�몄슂.")) return false;
	if(!checkBlank(f.pwd[2],"�� 鍮꾨�踰덊샇瑜� �쒕쾲�� �낅젰�댁＜�몄슂.")) return false;
	if(f.pwd[1].value!=f.pwd[2].value)	{
		window.alert('�� 鍮꾨�踰덊샇�� �뺤씤 鍮꾨�踰덊샇媛� �ㅻ쫭�덈떎');
		return false;
	}
}

function chgSort(ctype,p_query,level){
	var nurl="./?body=product@cate_sort.frm&ctype="+ctype+"&"+p_query+"&level="+level;
	if(level=='1')  tg=window.frames['right_frm'];
	else tg=self;
	tg.location=nurl;
}

var utype=1;
var reverse=0;
function updatechgSort(f){
	if(f.cateList.length<2) {
		if(utype==2) window.alert('�곹뭹�섍� 2媛� �댁긽�� 寃쎌슦 �쒖꽌 蹂�寃쎌씠 媛��ν빀�덈떎');
		else window.alert('�섏쐞 遺꾨쪟媛� 2媛� �댁긽�� 寃쎌슦 �쒖꽌 蹂�寃쎌씠 媛��ν빀�덈떎');
		return;
	}
	if(!confirm('�꾩옱 �ㅼ젙�� �곸슜�섍쿋�듬땲源�?')) return;
	var tmp="";
	for (i=0; i<f.cateList.length; i++)	{
		if(reverse==1) nsort=f.cateList.length-i;
		else nsort=i+1;
		tmp+=f.cateList[i].value+'::'+(nsort)+'@';
	}

	f.new_sort.value=tmp;
	f.submit();
}

function renameMemberGroup(f,n){
	f.name.value=f.elements['name'+n].value;
	f.gno.value=n;
	f.exec.value='rename';
	f.submit();
}

function deleteCS(){
	var f=document.prdFrm;
	if(!checkCB(f.check_pno,"��젣�� �곷떞 �댁뿭�� �좏깮�댁＜�몄슂.")) return;
	if(!confirm('�뺣쭚濡� ��젣�섍쿋�듬땲源�?            \n')) return;
	f.exec.value='delete';
	f.body.value='member@1to1.exe';
	f.target=hid_frame;
	f.method='post';
	f.submit();
}

function checkReplyCS(f){
	if(typeof oEditors.getById != 'undefined' && oEditors.getById['answer']) {
		submitContents('answer', '');
	}

	if(!checkBlank(f.answer,'�듬��� �낅젰�댁＜�몄슂.')) return false;
}

function deleteMemberAccess(f){
	if(!checkCB(f.check_pno,"��젣�� 濡쒓렇瑜� �좏깮�댁＜�몄슂.")) return;
	if(!confirm('�뺣쭚濡� ��젣�섍쿋�듬땲源�?\t\t\n')) return;
	f.exec.value='delete';
	f.body.value='log@member_access_log.exe';
	f.target=hid_frame;
	f.method='post';
	f.submit();
}

function checkPrdQna(f){
	if(!checkBlank(f.title,"�쒕ぉ�� �낅젰�댁＜�몄슂.")) return false;
	if(f.notice.value!='Y') {
		if(!checkBlank(f.name,"�대쫫�� �낅젰�댁＜�몄슂.")) return false;
	}

	submitContents('content');
	submitContents('answer');

	if(!checkBlank(f.content,"�댁슜�� �낅젰�댁＜�몄슂.")) return false;
}

// �곹뭹 寃��� 2006-01-20
function searchPrd(f){
	f.big.value=window.frames['cate11'].cateFrm.cate.value;
	f.mid.value=window.frames['cate12'].cateFrm.cate.value;
	f.small.value=window.frames['cate13'].cateFrm.cate.value;

	f.submit();
}

// �곹뭹 �뺣젹 2006-01-20
function prdSort(s){
	var f=document.prdSearchFrm;
	f.sort.value=s;
	searchPrd(f);
}

function optPrdSort(o,s){
	var o = $(o).parents('.productOptionSets');
	var sort = [];

	if(s > 0) o.next().insertBefore(o);
	else o.prev().insertAfter(o);

	$('.productOptionSets').each(function(idx) {
		sort[idx] = $(this).data('opno');
	});
	$.post('./index.php', {'body':'product@product_option.exe', 'exec':'sort', 'sort':sort}, function() {
		location.reload();
	});
}

function defaultContent(n){
	var f=document.prdFrm;
	if(f.elements['content'+n+'_default'].checked==true) {
		textDisable(f.elements['content'+n],1);
	}
	else {
		textDisable(f.elements['content'+n],'');
	}
}

function spSortPrd(){
	checkAll(pf.check_pno,true);
	pf.body.value="product@product_update.exe";
	pf.exec.value="sp_sort";
	pf.submit();
}

function spOutPrd(){
	if(!checkCB(pf.check_pno,"留ㅼ옣�먯꽌 �쒖쇅�� �곹뭹�� �좏깮�댁＜�몄슂.")) return false;
	if(!confirm('�좏깮�섏떊 �곹뭹�� 紐⑤몢 �� 留ㅼ옣�먯꽌 �쒖쇅�섏떆寃좎뒿�덇퉴?')) return;
	pf.body.value="product@product_update.exe";
	pf.exec.value="sp_out";
	pf.submit();
}

function deleteCate(f){
	if(confirm('�좏깮�� 移댄뀒怨좊━瑜� ��젣�섏떆寃좎뒿�덇퉴?')) {
		f.body.value='board@board_cate.exe';
		f.exec.value="delete";
		f.submit();
	}
}

function loadOption(f){
	if(!checkCB(f.check_pno,"�곸슜�� �듭뀡�� �좏깮�댁＜�몄슂.")) return false;
	if(f.stat.value=='5') msg='�좏깮�섏떊 �듭뀡�� 紐⑤몢 �듭뀡�명듃濡쒕줈 ���ν븯�쒓쿋�듬땲源�?'
	else msg='�좏깮�섏떊 �듭뀡�� 紐⑤몢 �� �곹뭹�먯꽌 �곸슜�섏떆寃좎뒿�덇퉴?';
	if(!confirm(msg)) return;
	f.submit();
}

function trackSearch(f){
	if(!checkSel(f.dlv_no,"諛곗넚�щ� �좏깮�댁＜�몄슂.")) return;
	if(!checkBlank(f.dlv_code,"�≪옣踰덊샇瑜� �낅젰�댁＜�몄슂.")) return;

	tmp=f.dlv_no.value.split("<wisamall>");
	url=tmp[1];
	url=url.replace("{�≪옣踰덊샇}",f.dlv_code.value);

	tmp1=f.dlv_code.value.split("-");
	if(tmp1.length>1)
	{
		url=url.replace("{�≪옣踰덊샇1}",tmp1[0]);
		url=url.replace("{�≪옣踰덊샇2}",tmp1[1]);
		url=url.replace("{�≪옣踰덊샇3}",tmp1[2]);
	}
	window.open(url);
}

function searchKeyword(f){

	if(f.d1.value || f.d2.value)
	{
		if(!checkSel(f.m1,"寃��� �쒖옉�붿쓣 �좏깮�댁＜�몄슂.")) return false;
		if(!checkSel(f.m2,"寃��� 醫낅즺�붿쓣 �좏깮�댁＜�몄슂.")) return false;

		if(!checkSel(f.d1,"寃��� �쒖옉�쇱쓣 �좏깮�댁＜�몄슂.")) return false;
		if(!checkSel(f.d2,"寃��� 醫낅즺�쇱쓣 �좏깮�댁＜�몄슂.")) return false;
	}
	if(f.m1.value && !checkSel(f.m2,"寃��� 醫낅즺�붿쓣 �좏깮�댁＜�몄슂.")) return false;
	if(f.m2.value && !checkSel(f.m1,"寃��� �쒖옉�붿쓣 �좏깮�댁＜�몄슂.")) return false;

	start=eval(f.y1.value+f.m1.value+f.d1.value);
	finish=eval(f.y2.value+f.m2.value+f.d2.value);
	if(finish<start)
	{
		alert('寃��� 醫낅즺�쇱씠 寃��� �쒖옉�쇰낫�� �대쫭�덈떎');
		return false;
	}
}

function searchDate(f){
	if(f.all_date.checked==true)
	{
		textDisable(f.start_date,1);
		textDisable(f.finish_date,1);
	}
	else
	{
		textDisable(f.start_date,'');
		textDisable(f.finish_date,'');
	}
}

function count_mp(){
	var f = document.getElementById('prdFrm');
	if(pf.sell_prc.value<=0){
		alert(product_sell_price_name+"瑜� �낅젰�섏꽭��");
		f.sell_prc.focus();
		f.mil_per.selectedIndex=0;
		return;
	}
	f.milage.value = Math.round(removeComma(f.sell_prc.value) * (f.mil_per.value/100));
}


function loadLay(){
	var tbody=document.getElementById('tbody');
	var obody=document.getElementById('obody');
	if(tbody) layTgl(tbody);
	if(obody) layTgl(obody);
}

function delAddContent(f,n){
	if(!checkCB(f.check_pno,"��젣�� �먮즺瑜� �좏깮�댁＜�몄슂.")) return;
	if(!confirm('�좏깮�섏떊 �먮즺瑜� ��젣�섏떆寃좎뒿�덇퉴?')) return;
	f.action='./?body=extension@content.exe&exec=delete&cnt_no='+n;
	f.submit();
}

function OpenInsertImage(){
	nurl='./pop.php?open=1&body='+openImgUrl;
	window.open(nurl,'openInsImg','top=10,left=10,width=700,height=100,status=no,toolbars=no,scrollbars=yes');

}

var helptext=new Array();
function showToolTip(e,t,a){
	if(a) text=helptext[t];
	else text=t;
	$('#ToolTip').html(text)
	var sl = $(window).scrollLeft();
	var st = $(window).scrollTop();
	//$('#ToolTip').css({'left': (e.clientX+sl+15)+'px', 'top': (e.clientY+st)+'px'}).css({'width':s+'px'}).show();
	$('#ToolTip').css({'left': (e.clientX+sl+15)+'px', 'top': (e.clientY+st)+'px'}).show();
}
function showToolTipHTML(e,t){
	text=t;
	$('#ToolTip').html(text)
	var sl = $(window).scrollLeft();
	var st = $(window).scrollTop();
	//$('#ToolTip').css({'left': (e.clientX+sl+15)+'px', 'top': (e.clientY+st)+'px'}).css({'width':s+'px'}).show();
	$('#ToolTip').css({'left': (e.clientX+sl+15)+'px', 'top': (e.clientY+st)+'px'}).show();
}

function hideToolTip(){
	ToolTip.style.display="none";
	//$('#ToolTip').css({'width':'auto'});
}

function updeteOrder(exec,ext,sms){
	var cnf="";

	if(exec=='delete') cnf='�� 二쇰Ц �뺣낫瑜� �꾩쟾�� ��젣�섏떆寃좎뒿�덇퉴?';
	else if(exec=='stat') {
		if(is_postpone > 0 && ext >= 4) {
			if(confirm(is_postpone+'媛쒖쓽 二쇰Ц�곹뭹�� 諛곗넚蹂대쪟 �섏뼱�덉뒿�덈떎.\n怨꾩냽 吏꾪뻾�섏떆寃좎뒿�덇퉴?') == false) {
				return false;
			}
		}

		if(f.stat.value==ext) {
			window.alert('\n諛붽씀�쒕젮�� �곹깭�� �꾩옱 �곹깭媛� �숈씪�⑸땲��          \n\n�곹깭蹂�寃쎌씠 遺덇��� �⑸땲��\n');
			return;
		}

		if(f.stat.value==5) {
			cnf='================ 二� ==== �� ================\n\n�곷┰湲덉씠 吏�湲됰릺�덉쓣 寃쎌슦 �곷┰湲덉쓣 諛섑솚�⑸땲��\n\n(吏�湲됰맂 �곷┰湲덉쓣 �대� �ъ슜�섏��� 寃쎌슦 �쒖쇅)             \n\n===========================================\n\n';
		}

		if(ext==5)	{
			if(sms == 1) {
				cnf='\n�뚯썝�� 寃쎌슦 �곷┰湲덉쓣 吏�湲됲빀�덈떎       \n\n諛곗넚 �꾨즺 硫붿씪/SMS媛� 諛쒖넚�⑸땲��       \n\n';
			} else {
				cnf='\nSMS �ъ슜�쒕룄 珥덇낵濡� SMS �쒕퉬�ㅻ뒗 吏��먮릺吏� �딆뒿�덈떎.       \n\n';
			}
		}

		if(ext==2 || ext==3 || ext==4)	{
			if(sms == 1) {
				if(ext == 4) cnf='\nSMS �섏떊�숈쓽�� �≪옣踰덊샇瑜� �낅젰�섏뀲�� 寃쎌슦 異쒓퀬 SMS媛� 諛쒖넚�⑸땲��       \n\n';
				else cnf='\nSMS �섏떊�숈쓽�� SMS媛� 諛쒖넚�⑸땲��       \n\n';
			} else {
				cnf='\nSMS �ъ슜�쒕룄 珥덇낵濡� SMS �쒕퉬�ㅻ뒗 吏��먮릺吏� �딆뒿�덈떎.       \n\n';
			}
		}
		cnf+='�� 二쇰Ц �뺣낫�� �곹깭瑜� 蹂�寃쏀븯�쒓쿋�듬땲源�?        \n';
	}
	else if(exec=='stat3')	{
		if(f.stat.value!='3') {
			window.alert('�곹뭹以�鍮꾩쨷�� 寃쎌슦�먮쭔 蹂�寃쎌씠 媛��ν빀�덈떎');
			return;
		}
		cnf='�곹깭瑜� 蹂�寃쏀븯�쒓쿋�듬땲源�?        ';
//		f.target='';
	}
	else if(exec=='mng_memo' && !checkBlank(f.mng_memo,"愿�由ъ옄 硫붾え瑜� �낅젰�댁＜�몄슂.")) return;
	else if(exec=='dlv' || exec=='dlv_mail') {
		if(!checkSel(f.dlv_no,"諛곗넚�щ� �좏깮�댁＜�몄슂.")) return;
		if(!checkBlank(f.dlv_code,"�≪옣踰덊샇瑜� �낅젰�댁＜�몄슂.")) return;
		if(exec=='dlv_mail') cnf="\n �≪옣踰덊샇�� �앸같�щ� �낅젰�� ���ν븯�붿빞 �앸같 異붿쟻�� 媛��ν빀�덈떎        \n\n �낅젰�� �꾨즺�섏��듬땲源�? \n";
		if(confirm('\n�≪옣踰덊샇�먯꽌 �レ옄瑜� �쒖쇅�� 臾몄옄瑜� �먮룞 �쒓굅�섏떆寃좎뒿�덇퉴? (�뺤씤�� �꾨Ⅴ硫� �쒓굅�⑸땲��)       \n\n諛곗넚 異붿쟻�쒖뿏 �쇰컲�곸쑝濡� �レ옄留뚯쓣 �낅젰�댁빞�⑸땲��\n\n�먯뒪�щ줈 �쒕퉬�� �ъ슜�� �먯뒪�щ줈�뚯궗�� �≪옣踰덊샇瑜� �꾩넚, 諛곗넚�쒖옉�� �뚮┰�덈떎\n')) f.number_only.value='Y';
	}

	if(cnf && !confirm(cnf)) return;
	f.exec.value=exec;
	f.ext.value=ext;

	f.submit();
}





var req;

function newXMLHttpRequest() {
	var xmlreq = false;

	if(window.XMLHttpRequest) {
		xmlreq = new XMLHttpRequest();
	} else if(window.ActiveXObject) {
		try {
			xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e1) {
			try {
				xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e2) {
				// Unable to create an XMLHttpRequest with ActiveX
			}
		}
	}
	return xmlreq;
}

function processReqChange() {
	if(req.readyState == 4) {
		if(req.status == 200) {
			printData();
		} else {
			//alert("�쒖뒪�� �먭� 以묒엯�덈떎 (No XML):\n" +  req.statusText);
		}
	}
}


function printOrder(f){
	if(!checkCB(f.check_pno,"�몄뇙�� 二쇰Ц�� �좏깮�댁＜�몄슂.")) return;
	if(window.open('about:blank','prt_viewOrder','top=10,left=10,width=650,status=no,toolbars=no,scrollbars=yes,height=400'))
	{
		old_body=f.body.value;
		old_target=f.target;

		f.body.value="order@order_print.frm";
		f.method='post';
		f.target='prt_viewOrder';
		f.submit();

		f.method='get'
		f.body.value=old_body;
		f.target=old_target;
	}
}


function printTax(tno){
	nurl='./?body=support@service_tax_print.frm&tno='+tno;
	window.open(nurl,'viewTax','top=10,left=10,status=no,toolbars=no,scrollbars=yes,height=580,width=750');
}

function goReceipt(no) {
	location.href = "?body=support@service_tax_apply&vat_check[]="+no;
}

function menuAddFavorite(f){
	if(!confirm('�좏깮�섏떊 硫붾돱瑜� �듬찓�댁뿉 異붽��섏떆寃좎뒿�덇퉴?\t')) return false;
	return false;
}

function imgFtpOpen(skin){
	skin=skin ? skin : '';
	nurl='./?body=design@image_ftp.frm&skin='+skin;
	window.open(nurl,'imgFtp','top=10,left=10,status=no,toolbars=no,scrollbars=yes,height=700,width=825');
}

function templateZoom(page_mode, pg_name){
	if(!pg_name) pg_name='./?body=design@template_zoom.frm&page_mode='+page_mode;
	nurl=pg_name;
	w=screen.availWidth-20;
	h=screen.availHeight-20;
	skinZoom=window.open(nurl,'tmpZomm','top=0,left=0,status=no,toolbars=no,scrollbars=yes,height='+h+',width='+w);
}

function searchBoxSH(type, frm){
	btn1=document.getElementById('search_box_btnf');
	btn2=document.getElementById('search_box_btns');
	frm=(document.forms[frm]) ? document.forms[frm] : '';

	if(type == 1){
		$('.search_box_omit').removeClass('search_box_omit').addClass('search_box_show');

		btn1.style.display='none';
		btn2.style.display='';
		if(document.getElementById('ordPrdFrame')){
			src=window.frames['ordPrdFrame'].window.location;
			window.frames['ordPrdFrame'].location.href=src;
		}
		if(frm) frm.detaiil_search.value='1';
		if($('.top_line').find('.box_btn').hasClass('quicksearch') == true) {
			$('.quicksearch').show();
		}
	}else if(type == 2){
		$('.search_box_show').removeClass('search_box_show').addClass('search_box_omit');

		btn2.style.display='none';
		btn1.style.display='';
		if(frm) frm.detaiil_search.value='';
		if($('.top_line').find('.box_btn').hasClass('quicksearch') == true) {
			$('.quicksearch').hide();
		}
	}
}

function searchBoxCookie(w, ckname){
	value=(w.checked == true) ? 'Y' : 'N';
	setCookie(ckname, value, 365);
	alert('�ㅼ젙�� ���λ릺�덉뒿�덈떎');
}

function crmResize(frm) {
	var frmHeight = frm.contentWindow.document.body.scrollHeight;
	frm.style.height = frmHeight+"px";

	if(frmHeight > 400) frmHeight = 400;
	if(frmHeight < 100) frmHeight = 0;
	document.getElementById("crmDiv").style.overflow = (frmHeight > 0) ? "visible" : "hidden";
	window.resizeBy(0, frmHeight);
}


function OpenimgFTP() {
	var win = window.open('?body=wftp@wftp.frm', 'nw', 'status=no, scrollbars=no, resizable=yes, width=995px, height=680px');
	if(win) {
		win.focus();
	}
}

function tabSH(no){
	for(var i = 1; i <= 12; i++) {
		var layer = document.getElementById('edt_layer_'+i);
		var ctab = document.getElementById('ctab_'+i);

		if(!layer || !ctab) continue;

		if(i == no) {
			layer.style.display = 'block';
			ctab.className = 'selected';
		} else {
			layer.style.display = 'none';
			ctab.className = '';
		}

	}
}

var onloaded = false;
function onStatView(obj, ev, mode) {
	//if(!onloaded) return;
	if(mode) {
		var ev = (window.event) ? window.event : ev;
		var value = (obj.children[1]) ? obj.children[1].innerHTML : obj.children[0].innerHTML;
		var layer = document.getElementById("statView");
		if(!layer) {
			var layer = document.createElement('DIV');
			layer.id = 'statView';
			layer.style.position="absolute";
			layer.innerHTML = "<span class='number'>"+value+"</span>";
			document.body.appendChild(layer);
		}
		layer.style.top = (ev.clientY + document.documentElement.scrollTop-30)+'px';
		layer.style.left = (ev.clientX + document.documentElement.scrollLeft - (layer.offsetWidth / 2))+'px';
	} else {
		var layer = document.getElementById("statView");
		if(layer) {
			document.body.removeChild(layer);
		}
	}
}

function menuSideLink(pgcode, mode) {
	var obj = document.getElementById('sm_'+pgcode);
	if(obj) {
		obj.style.display = (mode == 1) ? 'inline' : 'none'
	}
}

function searchWisaID(lv) {
	var f = document.getElementById('staffFrm');
	var w = window.open('./?body=intra@search_wisa_id.frm', 'searchWisaId', 'width=100px,height=100px,status=no,scrollbars=no');
	if(w) w.focus();
}

function setSearchDatee(f,n1, n2, v1, v2, bd) {

	if(v1) {
		f.elements['all_date'].checked=false;
		f.elements[n1].value=v1;
		f.elements[n2].value=v2;
	} else {
		f.elements['all_date'].checked=true;
	}

	searchDate(f);
	searchSubmit(f, bd);
}

function setPoptitle(str) {
	var field = document.getElementById('mngTab_pop');
	if(field) field.innerHTML = str;
}


/* +----------------------------------------------------------------------------------------------+
' |  �듬찓��
' +----------------------------------------------------------------------------------------------+*/
function qmFocus(obj, exec) {
	if(exec == 1) {
		obj.style.color = '#333';
		obj.value = '';
	} else {
		obj.style.color = '#aaa';
		obj.value = '硫붾돱 �먮룞寃���';

		setTimeout("document.getElementById('quickSearchList').style.display = 'none'", 500);
	}
}

var xmlhttpm;
var xmlmenu;
var xmlselected = -1;
function qmSearch(obj, ev) {

	if(xmlhttpm == null) {
		if(window.XMLHttpRequest) xmlhttpm = new XMLHttpRequest();
		else xmlhttpm = new ActiveXObject("Microsoft.XMLHTTP");
		xmlhttpm.open('GET', '?body=menu@menu.xml', true); // true 鍮꾨룞湲� 諛⑹떇
		xmlhttpm.send('');
		xmlhttpm.onreadystatechange = function() {
			if(xmlhttpm.readyState==4 && xmlhttpm.status == 200 && xmlhttpm.statusText=='OK') {
				xmlmenu = xmlhttpm.responseXML;
				xmlmenu = xmlmenu.getElementsByTagName("small");
				qmSearch(obj);
			}
		}
		return;
	}

	var ev = window.event ? window.event : ev;
	if(ev.keyCode == 38 || ev.keyCode == 40) {
		qmMenuSelect(ev.keyCode);
		return;
	}

	if(ev.keyCode == 13 && xmlselected > -1) {
		location.href = document.getElementById('qm_link_'+xmlselected).href;
		return;
	}

	if(xmlmenu) {
		var searchkey = obj.value.replace(/ /g, '');
		var sl = document.getElementById('quickSearchList');
		sl.innerHTML = '';
		xmlselected = -1;

		sl.style.display = (obj.value.length > 0) ? 'block' : 'none';
		if(obj.value == '') return;

		var idx = 0;
		menus = xmlmenu.length;

		for(var i = 0; i < menus; i++) {
			name = getXMLval(xmlmenu[i], 'name');
			name = name.replace(/ /g, '');

			if(name.search(searchkey) > -1) {
				pgcode = getXMLval(xmlmenu[i], 'pgcode');
				link = getXMLval(xmlmenu[i], 'link');
				hidden = getXMLval(xmlmenu[i], 'hidden');
				if(link && hidden != 'Y'){
					var temp = document.createElement('LI');

					temp.idx = idx;
					name = name.replace(obj.value, "<span class='p_color2'>"+obj.value+"</span>");
					temp.innerHTML = "<a style='float: right' href='javascript:;' onclick=\"qmPlus('"+pgcode+"')\"><img src='"+engine_url+"/_manage/image/icon/ic_plus.gif'></a><a id='qm_link_"+idx+"' href='?body="+link+"'>"+name+"</a>";
					temp.onmouseover = function() {
						qmMouseOver(this);
					}

					sl.appendChild(temp);
					idx++;
				}
			}
		}
		if(idx == 0) {
			var  temp = document.createElement('LI');
			temp.innerText = '寃��됰맂 硫붾돱媛� �놁뒿�덈떎';
			sl.appendChild(temp);
		}

	}

}

function getXMLval(obj, name) {
	var sub = obj.getElementsByTagName(name);
	if(sub.length > 0) {
		if(sub[0].childNodes[0]) return sub[0].childNodes[0].nodeValue;
	}

	return null;
}

function qmMenuSelect(direction) {
	var sl = document.getElementById('quickSearchList');

	var dir = direction == 38 ? -1 : +1;
	var next = xmlselected + dir;

	if(next < 0 || next >= sl.children.length) next = xmlselected;
	else {
		if(xmlselected != next) {
			if(xmlselected > -1) sl.children[xmlselected].style.backgroundColor = '';
			sl.children[next].style.backgroundColor = '#ffffcc';

			if(sl.children[1].offsetHeight * (next+1) > sl.scrollTop + sl.offsetHeight) {
				sl.scrollTop = sl.children[1].offsetHeight * (next+1) - sl.offsetHeight;
			}

			if(sl.scrollTop > sl.children[1].offsetHeight * next) {
				sl.scrollTop = sl.children[1].offsetHeight * next;
			}
		}
		xmlselected = next;
	}
}

function qmMouseOver(obj) {
	var sl = document.getElementById('quickSearchList');

	next = parseInt(obj.getAttribute('idx'));

	if(xmlselected > -1) sl.children[xmlselected].style.backgroundColor = '';
	sl.children[next].style.backgroundColor = '#ffffcc';
	xmlselected = next;
}

function qmPlus(pgcode, mode) {
	$.get("?body=main@wQuickmenu.exe&exec=add&pgcode="+pgcode, function() {
		if(mode == 2) {
			window.alert('�듬찓�� �깅줉�� �꾨즺�섏뿀�듬땲��.');
		}
		location.reload();
	});
}

function qmDel(pgcode, exec) {
	var btn = document.getElementById('qmdel_'+pgcode);
	btn.style.display = exec == 1 ? 'inline-block' : 'none';
}

function qmDelOK(pgcode) {
	if(confirm('�좏깮�� 硫붾돱瑜� �듬찓�댁뿉�� �쒖쇅�쒗궎�쒓쿋�듬땲源�?\t')) {

		var hid = document.getElementsByName(hid_frame);
		hid[0].contentWindow.location.href = '?body=main@wQuickmenu.exe&exec=del&pgcode='+pgcode;
	}
}

function closeWPopup(popup, n){
	if(n) setCookie('wm_popup_'+n, 'Y',3);

	var wm_back = document.getElementById('wm_back');
	var wm_popup = document.getElementById(popup);
	document.body.removeChild(wm_back);
	document.body.removeChild(wm_popup);
}

function imgOver(imgEl,opt) {
    var src = imgEl.getAttribute('src');
    var ftype = src.substring(src.lastIndexOf('.'), src.length);

    if(!imgEl.getAttribute('class')){
        if(opt == 'out') imgEl.src = imgEl.src.replace("_o"+ftype, ftype);
        else if(imgEl.src.indexOf("_o"+ftype) == -1) imgEl.src = imgEl.src.replace(ftype, "_o"+ftype);
    }
}

function tabView(element,num,more) {
    if(document.getElementById(element + num)) document.getElementById(element + num).style.display='';
    var clickList = document.getElementById(element + 'List').getElementsByTagName('IMG');

	document.getElementById('tab_more').href = more;

    for (var iii=0;iii<clickList.length;iii++){
        if(!document.getElementById(element + iii)) return;
        if(iii == num) {
            document.getElementById(element + iii).style.display='';
            imgOver(clickList[iii]);
        }else{
            document.getElementById(element + iii).style.display='none';
            imgOver(clickList[iii], 'out');
        }
    }
}

function zipSearchM(form_nm,zip_nm,addr1_nm,addr2_nm){
	var srurl = manage_url+'/common/zip_search.php?urlfix=Y&form_nm='+form_nm+'&zip_nm='+zip_nm+'&addr1_nm='+addr1_nm+'&addr2_nm='+addr2_nm;
	window.open(srurl,'zip', ('scrollbars=yes,resizable=no,width=374, height=170'));
}

function randomBanner(element) {
	var bn = document.getElementById(element);
	var bnList = bn.getElementsByTagName('LI');
	var bnRandom = Math.floor(Math.random() * (bnList.length));

	for (var i=0;i<bnList.length;i++) {
		if(i == bnRandom) {
			bnList[bnRandom].style.display = '';
		}else {
			bnList[i].style.display = 'none';
		}
	}
}

function bnView(element,type) {
	var bn = document.getElementById(element).getElementsByTagName('LI');
	var bnList = bn.length;

	if(type == 'prev') {
		if(num == 0) {
			num = bnList - 1;
		}else{
			num = num - 1;
		}
	}else if(type == 'next') {
		if(num == bnList - 1) {
			num = 0;
		}else{
			num = num + 1;
		}
	}

	for (var i=0;i<bnList;i++){
		if(i == num) {
			bn[num].style.display = '';
		}else{
			bn[i].style.display = 'none';
		}
	}
}

function sellerFinder(word, select) {
	var word = word.value;
	if(!word) return;

	$.ajax({
		url: '?body=product@provider.exe&exec=search&keyword='+word,
		success: function(data) {
			var option = $('select[name='+select+']');
			option.children().each(function(idx) {
				if(idx > 0) $(this).remove();
			});

			var len = 0;
			if(data) {
				var data = data.split('###');
				len = data.length;
				for(var idx in data) {
					var line = data[idx].split('@@@');
					option.append('<option value="'+line[0]+'">'+line[1]+'</option>');
				}
			}
		}
	});
}

function layerWindow(body) {
	this.body = body;
	this.pop = null;
}

layerWindow.prototype.open = function(param, opt) {
	var url = './index.php?body='+this.body+'&hid_frame='+hid_frame+'&execmode=ajax';
	var _this = this;
	if(param) {
		param = param.replace(/&?body=[^&]+/, '');
		param = param.replace(/&?hid_frame=[^&]+/, '');
		param = param.replace(/^\?/, '');
		if(/^(&|\?)/.test(param) == false) param = '&'+param;
		url += param;
	}

	if(!opt) opt = {"name":"layerPop", "topmargin":50, "leftmargin":-250};

	$.get(url, function(data) {
		setDimmed();
		$('bgfilter').on('click', function() {
			_this.close();
		});
		$('body').on('keyup', function(e) {
			if (e.keyCode == 27) {
				_this.close();
			}
		});

		$('.'+opt.name).remove();
		a = $('body').append(data);

		_this.pop = $('.'+opt.name);
		_this.pop.css('top', ($(document).scrollTop()+opt.topmargin)+'px')
			 .css('left', ($('body').width()/2)-(_this.pop.width()/2))
			 .draggable({'handle':'#header', 'cursor':'pointer'});

		$('.search_select>select').select2({'language':'ko'});
	});
}

layerWindow.prototype.close = function(opt) {
	this.pop = null;

	if(!opt) opt = {"name":"layerPop"};

	$('.'+opt.name).fadeOut('fast', function() {
		$(this).remove();
		removeDimmed();
		$('body').off('keyup');
	});
}

layerWindow.prototype.fsubmit = function(f) {
	var param = '';
	for( var i = 0; i < f.elements.length; i++) {
		if(f.elements[i].value && f.elements[i].name) param += '&'+f.elements[i].name+'='+encodeURIComponent(f.elements[i].value);
	}
	param = param.replace(/^&/, '?', param);
	this.open(param);
	return false;
}

// �먯씠�ㅼ뭅�댄꽣 愿�由ъ옄 濡쒓렇��
function openAceCounter() {
	var f = document.acForm;

	if(f.r) { // �좊쾭��
		if(f.r.value) {
			window.open('http://wisamall.acecounter.com/login.php3?'+f.r.value,'acMng');
		} else {
			window.alert('�먯씠�ㅼ뭅�댄꽣 媛��낆떊泥�쓣 癒쇱� �� 二쇱꽭��.');
			location.href = '?body=log@ac_apply';
		}
	} else {
		window.open('','acMng');
		f.action = "http://wisa.acecounter.com/login.php3";
		f.target = "acMng";
		f.submit();
	}
}

// �꾩씠肄섍�由� �ъ슜
function array_unique (inputArr) {
    var key = '',        tmp_arr2 = {},
        val = '';

    var __array_search = function (needle, haystack) {
        var fkey = '';        for (fkey in haystack) {
            if(haystack.hasOwnProperty(fkey)) {
                if((haystack[fkey] + '') === (needle + '')) {
                    return fkey;
                }            }
        }
        return false;
    };
     for (key in inputArr) {
        if(inputArr.hasOwnProperty(key)) {
            val = inputArr[key];
            if(false === __array_search(val, tmp_arr2)) {
                tmp_arr2[key] = val;            }
        }
    }

    return tmp_arr2;
}

function implode (glue, pieces) {
     var i = '',
        retVal = '',        tGlue = '';
    if(arguments.length === 1) {
        pieces = glue;
        glue = '';
    }    if(typeof(pieces) === 'object') {
        if(Object.prototype.toString.call(pieces) === '[object Array]') {
            return pieces.join(glue);
        }
        for (i in pieces) {            retVal += tGlue + pieces[i];
            tGlue = glue;
        }
        return retVal;
    }    return pieces;
}

function goMywisa(body) {
	window.open('./index.php'+body, 'mywisa', 'status=no, width=1280px, height=800px, scrollbars=yes');
}

function midToolTip(e, o) {
	if($(o).parents('.title').hasClass('over') == false) {
		showToolTip(e,'硫붾돱�リ린');
	} else {
		showToolTip(e,'硫붾돱�닿린');
	}
}

// 二쇰Ц, CRM �먮룞�꾩꽦
function autoComplete(type, o) {
	$.get('./index.php?body='+type+'@'+type+'_autoComp.exe', {'keyword':o.value}, function(r) {
		if(r == 'ing') return;

		if(r) $('#auto_complete').html(r).show();
		else $('#auto_complete').html('').hide();
	});
}

// �곹뭹蹂� �ш퀬蹂닿린
function getProductQty(pno, page, placeholder) {
	if(placeholder && $('.product_stock_list.'+pno).length > 0) {
		$('.product_stock_list.'+pno).remove();
		return;
	}

	if(!placeholder) placeholder = window.placeholder;

	window.placeholder = placeholder;
	$.post('./index.php?body=product@product_stock.exe', {'pno':pno, 'page':page}, function(r) {
		$('#product_stock_list').remove();

		var tr = $(placeholder).parents('tr');
		var stock_list = $('<tr id="product_stock_list" class="product_stock_list '+pno+' '+page+'"></tr>');
		stock_list.html('<td colspan="'+(tr.find('td').length)+'" class="right" style="background:#f2f2f2;">'+r+'</td>');
		tr.after(stock_list);
	});
}

(function($, undefined) {
	$.fn.btt = function(css) {
		this.each(function() {
			var obj = $(this);
			var oid = 'jquery_btt_'+$('.jquery_btt').length;
			var msg = obj.attr('tooltip');
			if(!msg) return;
			if($('#'+oid).length > 0) return;

			var t = obj.offset().top;
			var l = obj.offset().left;
			var	tooltip = $("<div id='"+oid+"' class='jquery_btt "+css+"'><div class='message'>"+msg+"</div></div>");

			tooltip.css({'position':'absolute', 'left':l, 'top':t+obj.height()});
			$('body').append(tooltip);
			tooltip.css({'left':(l+(obj.width()/2)-(tooltip.innerWidth()/2)), 'display':'none'});

			obj.bind({
				'mouseenter' : function() {tooltip.fadeIn('fast');},
				'mouseleave' : function() {tooltip.hide();}
			});
		});
	}
})(jQuery);

// function setDatepicker() {
// 	$('.datepicker').datepicker({
// 		monthNamesShort: ['1��','2��','3��','4��','5��','6��','7��','8��','9��','10��','11��','12��'],
// 		dayNamesMin: ['��','��','��','��','紐�','湲�','��'],
// 		weekHeader: 'Wk',
// 		dateFormat: 'yy-mm-dd',
// 		autoSize: false,
// 		changeYear: true,
// 		changeMonth: true,
// 		showButtonPanel: true,
// 		currentText: '�ㅻ뒛 <?=date("Y-m-d", $now)?>',
// 		closeText: '�リ린'
// 	}).attr("autocomplete", "off");
// }

function openCfgCertFrm(config_code, device) {
	var style1 = {'position':'absolute', 'top':($(window).height()/2)-200+$(window).scrollTop(), 'left':($(window).width()/2)-200, 'zIndex':1001};
	var style2 = {'width':'400px', 'height':'222px'};

	setDimmed('#000000', 0.5);
	$('body').append("<div class='certFrm'><iframe src='/main/exec.php?exec_file=member/joinSmsFrm.php&postdata="+config_code+"&device="+device+"' frameborder='0'></iframe></div>");
	$('.certFrm').css(style1).find('iframe').css(style2);
}

function removeCertFrm() {
	$('.certFrm').remove();
	parent.removeDimmed();

	var f = document.getElementsByName('joinFrm');
	if(f) f = f[0];
	else return false;

	if(!f.reg_code || (f.reg_code && f.reg_code.value == '')) {
		if($.prop) {
			$(f.unique).prop('checked', false);
		} else {
			$(f.unique).attr('checked', false);
		}
	}
}

function viewStockDetail(complex_no) {
	wisaOpen(
		'./pop.php?body=erp@stock_detail&ref=prd&pno='+complex_no, 'stock', true, 800, 700
	);
}

//寃��됲봽由ъ뀑
function viewQuickSearch(fname, menu){
	var data = $(document.getElementById(fname)).serialize();
	setDimmed();
	window.quicksearch = new layerWindow('config@quicksearch.frm');
	window.quicksearch.open('&menu='+menu+'&data='+data);
}

function checkQuickSearch(f){
	var limitconfig = '';

	if(!checkBlank(f.title,"�⑥텞寃��됰챸�� �낅젰�댁＜�몄슂.")) return false;
	if(!checkBlank(f.content,"�붿빟�ㅻ챸�� �낅젰�댁＜�몄슂.")) return false;

	if(f.limitconfig.checked==true) {
		limitconfig = "Y";
	}
	$.post('./index.php?body=config@quicksearch.exe', {"menu":f.menu.value, "string":f.string.value, "title":f.title.value, "content":f.content.value, "limitconfig":limitconfig}, function (r) {
		event.stopPropagation();
		$('.quick_search').html(r);
		$('.quick_search').find('li').each(function(idx) {
			$(this).btt('tooltip_square');
		});
		window.quicksearch.close();
		removeDimmed();
	});
	return false;
}

function searchPreset(menu, no) {
	var url_add = '';
	$('.quick_search li').each(function() {
		var idx = $(this).find('a').data('idx');
		if(idx==no) {
			if($(this).find('a').hasClass('active') == false) {
				url_add = '&spno='+no;
			}
		}
	})

	if(menu=='member') {
		var nurl = './?body=member@member_list'+url_add;
	}else if(menu=='product') {
		var nurl = './?body=product@product_list'+url_add;
	}else if(menu=='order') {
		var nurl = './?body=order@order_list'+url_add;
	}
	window.location.href = nurl;
}

function presetDelete(menu, no) {
	if(!confirm('�좏깮�섏떊 �⑥텞寃��됱쓣 ��젣�섏떆寃좎뒿�덇퉴?\n��젣�� �⑥텞寃��됱� 蹂듭썝�� 遺덇��ν빀�덈떎.')) return;
	$.post('./index.php?body=config@quicksearch.exe', {"exec":"delete", "menu":menu, "no":no}, function (r) {
		$('.quick_search').html(r);
		$('.quick_search').find('li').each(function(idx) {
			$(this).btt('tooltip_square');
		});
	});
}

// �듭뀡 �ш퀬 �덉젅 泥섎━
function setMultiOptionSoldout(multi) {
	var opt = $('.necessary_Y');
	if(multi) {
		opt = opt.filter("[name$='["+multi+"]']");
	}
	var last_value = '';
	for(var key in opt) {
		if(!opt[key].value) {
			if(opt[key]) next_sel = opt[key];
			break;
		}
		last_value += '@'+opt[key].value.split('::')[3];
	}
	if(!last_value) return;
	if(next_sel) {
		$.get(root_url+'/main/exec.php?exec_file=shop/getAjaxData.php', {'exec':'getOptionStock', 'urlfix':'Y', 'item_no':last_value}, function(r) {
			var soldout = r.split('@');
			$(next_sel).find('option').each(function() {
				this.disabled = false;
				this.text = this.text.replace(' (�덉젅)', '');
				for(var key in soldout) {
					if(soldout[key] && this.value.search('::'+soldout[key]+'::cpx') > -1) {
						this.disabled = true;
						this.text += ' (�덉젅)';
						break;
					}
				}
			});
		});
	}
}

// �뚯씠釉� �쒖꽌蹂�寃� �ㅽ겕由쏀듃
var Sorttbl = function(id, child_tag) {
	if(!child_tag) child_tag = 'tbody tr';

	var _this = this;
	this.obj = $('#'+id);
	this.child_tag = child_tag;

	// �섏쐞 �꾩씠�� �좏깮�� �대깽��
	this.onSelect = function(obj) {
		if($(obj).hasClass('checked')) {
			$(obj).removeClass('checked');
		} else {
			$(obj).addClass('checked');
		}
	}

	// �대룞 踰꾪듉
	this.move = function(size) {
		var max_order = _this.tr.length;
		var tempSort = [];
		_this.tr.filter('.checked').each(function() {
			tempSort.push(this);
		});
		if(size > 0) tempSort.reverse();

		for(var key in tempSort) {
			curr = tempSort[key];
			var next_order = $(curr).index()+size;
			if(next_order < 0) next_order = 0;
			if(next_order >= max_order) next_order = max_order-1;

			var target = _this.getChild().eq(next_order);
			if(target.hasClass('checked')) return;
			if(size > 0) { // �대┝
				target.after(curr);
			} else { // �щ┝
				target.before(curr);
			}
		};
	}

	this.toTop = function() {
		this.move(-(_this.tr.filter('.checked').first().index()));
	}

	this.toBottom = function() {
		this.move(_this.tr.length-_this.tr.filter('.checked').last().index());
	}

	// �꾩옱 湲곗��� �섏쐞 媛앹껜瑜� 援ы븿
	this.getChild = function() {
		return _this.obj.find(_this.child_tag);
	}

	// �대┃ �대깽��
	this.reload = function() {
		_this.tr = _this.getChild();
		_this.tr.filter(':not(.Sorttbl_sub)').click(function() {
			/*
			if(!event.ctrlKey ) {
				var $tr = _this.obj.find('.checked');
				$tr.removeClass('checked');
				$(this).addClass('checked');
			}
			else {
				$(this).toggleClass('checked');
			}
			*/
			_this.onSelect(this);
		});
		_this.tr.addClass('Sorttbl_sub');

	}

	this.reload();
}

// �먯＜ �곕뒗 �볤� 蹂몃Ц 遺숈뿬�ｊ린
function getOftenComment(no) {
	var use_editor = (!oEditors || oEditors.length == 0 || !oEditors.getById['answer']) ? 'N' : 'Y';
	$.post('./index.php', {'body':'member@often_comment_register.exe', 'exec':'getOftenComment', 'use_editor': use_editor, 'no':no}, function(r) {
		if(use_editor == 'Y') pasteHTML('answer', r.result);
		else  $('#answer').val(r.result);
	});
}

/**
濡쒕뵫 �붾㈃ �쒖떆
*/
function printLoading() {
	setDimmed();
	$('bgfilter').css('z-index', '101');
	$('body').append('<div class="loading_dimmed"><i class="xi-spinner-1 xi-spin xi-3x"></i></div>');
}
function removeLoading() {
	removeDimmed();
	$('.loading_dimmed').remove();
}

/* ���꾩꽭�� */
function createTsField(o) {
	if(confirm('湲곕뒫�� �ъ슜�섎젮硫� �곗씠�곕쿋�댁뒪 �낅뜲�댄듃媛� �꾩슂�⑸땲��.\n�곹뭹�� 留롮� �ъ씠�몄쓽 寃쎌슦 �낅뜲�댄듃�� �ъ씠�멸� �� 珥�~�섏떗 珥� �뺣룄 �먮젮吏�嫄곕굹 硫덉텧�� �덉뒿�덈떎.\n\n怨꾩냽 吏꾪뻾�섏떆寃좎뒿�덇퉴?')) {
		$.post('./index.php', {'body':'product@product_update.exe', 'exec':'createTsField'}, function(r) {
			console.log(r);
			return true;
		});
	}
	return false;
}

function chgTsSet(no) {
	if(no) {
		$.post('./index.php', {'body':'promotion@timesale_regist.exe', 'exec':'getInfo', 'no':no}, function(r) {
			$('.ts_desc').html(r.data.desc);
			$('.ts_date').html(r.data.date);
			$('.ts_state').html(r.data.state);
		});
	} else {
			$('.ts_desc').html('-');
			$('.ts_date').html('-');
			$('.ts_state').html('-');
	}
}
