<?php
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/top.php";

  $division = "setting";
	$sql = "SELECT *	FROM $SETTING_TB";
	$result = sql_query($sql);
	$row = mysqli_fetch_array($result);
  $arr_size = sizeof(explode("^",$row['time']));
  $time_expl = explode("^",$row['time']);
  $price_expl = explode("^",$row['price']);
  $reward_expl = explode("^",$row['reward']);
?>
<style>
		.modal-dialog.modal-fullsize {
		width: 100%;
		height: 100%;
		margin: 0;
		padding: 0;
		}
   body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<body id="manage">
<div id="admin_content">
	<div id="container">
    <? include $admin_root."/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
	<div class="clear"></div>
<form name = "setting" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden" name="pageId" id="pageId" value="nboard">
	<div class="box_title first">
		<h2 class="title">등록정보</h2>
	</div>
	<table class="tbl_row multi_shop">
		<caption class="hidden">등록정보</caption>
		<colgroup>
			<col style="width:15%">
			<col style="width:85%">
		</colgroup>
    <tr>
      <th scope="row">상담분야</th>
			<td>
				<input type="text" name="field" id="field" class="input input_full_full" placeholder="상담분야" value="<?=$row['field']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">전문분야</th>
			<td>
				<input type="text" name="field_pro" id="field_pro" class="input input_full_full" placeholder="전문분야" value="<?=$row['field_pro']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">검색태그</th>
			<td>
				<input type="text" name="field_search" id="field_search" class="input input_full_full" placeholder="검색태그" value="<?=$row['field_search']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">코인상담</th>
			<td>
				<input type="text" name="coin_tel" id="coin_tel" class="input input_full_full" placeholder="코인상담" value="<?=$row['coin_tel']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">060상담</th>
			<td>
				<input type="text" name="counsel_tel" id="counsel_tel" class="input input_full_full" placeholder="060상담" value="<?=$row['counsel_tel']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">네이버블로그URL</th>
			<td>
				<input type="text" name="nv_url" id="nv_url" class="input input_full_full" placeholder="네이버블로그URL" value="<?=$row['nv_url']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">유튜브URL</th>
			<td>
				<input type="text" name="fb_url" id="fb_url" class="input input_full_full" placeholder="페이스북URL" value="<?=$row['fb_url']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">인스트그램URL</th>
			<td>
				<input type="text" name="ig_url" id="ig_url" class="input input_full_full" placeholder="인스트그램URL" value="<?=$row['ig_url']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">신규가입포인트</th>
			<td>
				<input type="text" name="join_point" id="join_point" class="input input_full_full" placeholder="상담분야" value="<?=$row['join_point']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">상담후기포인트</th>
			<td>
				<input type="text" name="review_point" id="review_point" class="input input_full_full" placeholder="상담분야" value="<?=$row['review_point']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">베스트후기포인트</th>
			<td>
				<input type="text" name="review_best_point" id="review_best_point" class="input input_full_full" placeholder="상담분야" value="<?=$row['review_best_point']?>">
			</td>
		</tr>
    <?
       $tn = "1";
       for($i = '0' ; $i < $arr_size ; $i++){
     ?>
    <tr id="feeoptionNm_<?=$tn?>">
      <th scope="row">상담시간/가격/리워드</th>
			<td>
				<input type="text" name="time[]" id="time" class="input" placeholder="상담시간" value="<?=$time_expl[$i]?>">
        <input type="text" name="price[]" id="price" class="input" placeholder="상담가격" value="<?=$price_expl[$i]?>">
        <input type="text" name="reward[]" id="reward" class="input" placeholder="리워드" value="<?=$reward_expl[$i]?>">
        <? if($i == '0'){?>
        <span class='box_btn_s blue'>
        <a class='btn btn-success btn-sm' onclick="add_option()">추가</a>
        </span>
        <?}else{?>
          <span class='box_btn_s danger'>
          <a class='btn btn-success btn-sm' onclick="del_option('add_option','<?=$tn?>')">삭제</a>
          </span>
          <?}?>
			</td>
		</tr>
    <?$tn++;}?>
    <tbody id = "add_option_area"></tbody>
    <!-- <tr>
      <th scope="row">상담가격</th>
			<td>
				<input type="text" name="price" id="price" class="input input_full_full" placeholder="상담가격" value="<?=$row['price']?>">
			</td>
		</tr>
    <tr>
      <th scope="row">리워드</th>
			<td>
				<input type="text" name="reward" id="reward" class="input input_full_full" placeholder="리워드" value="<?=$row['reward']?>">
			</td>
		</tr> -->
    <tr>
			<th scope="row">개인정보취급방침</th>
			<td>
        <textarea name="privacy" id="privacy" style="width: 100%; height: 200px;"><?=$row['privacy']?></textarea>
			</td>
		</tr>
    <tr>
			<th scope="row">이용약관</th>
			<td>
        <textarea name="policy" id="policy" style="width: 100%; height: 200px;"><?=$row['policy']?></textarea>
			</td>
		</tr>

	</table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="setting_mod" value="변경"></span>
	</div>
</form>
</article>
</section>
		<?
		  include $admin_root."/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>

<script type="text/javascript">
var feeoptionNm = "<?=$arr_size?>";
var privacy = "";
var policy = "";
function del_option(delObj,value){
        $("#feeoptionNm_"+value).remove();
}

function add_option(){
		feeoptionNm = ++feeoptionNm;
		// var item_id = 'item_'+itemNm;
		var feeoptionid = 'feeoptionNm_'+feeoptionNm;
			$("#add_option_area")
			 .append("<tr id ='"+feeoptionid+"'><th scope='row'>상담시간/가격/리워드</th>"
			 				 +"<td><input type='text' name='time[]' id='time' class='input' placeholder='상담시간'> "
							 +"<input type='text' name='price[]' id='price' class='input' placeholder='상담가격'> "
							 +"<input type='text' name='reward[]' id='reward' class='input' placeholder='리워드'> "
               +"<span class='box_btn_s danger'><a class='btn btn-success btn-sm' onclick=\"del_option('add_option','"+feeoptionNm+"')\">삭제</a></span>"
							 +"</td>"
							 )
				 .append("")
				 // mobile_agency_sel('input');
	}

$('#setting_mod').click(function(){
  var division = $("#division").val();
  var field = $('#field').val();
  var field_pro = $('#field_pro').val();
  var field_search = $('#field_search').val();
  var join_point = $('#join_point').val();
  var review_point = $('#review_point').val();

  var review_best_point = $('#review_best_point').val();
  var coin_tel = $('#coin_tel').val();
  var counsel_tel = $('#counsel_tel').val();
  var nv_url = $('#nv_url').val();
  var fb_url = $('#fb_url').val();
  var ig_url = $('#ig_url').val();

  var time = [];
  var price= [];
  var reward= [];
  $('input[name^="time"]').each(function() {
      // time = $(this).val();
      time.push($(this).val());
  });
  $('input[name^="price"]').each(function() {
      price.push($(this).val());
  });
  $('input[name^="reward"]').each(function() {
      reward.push($(this).val());
  });
  // var time = $("input[name='time[]']").val();
  // var price = $("input[name='price[]']").val();
  // var reward = $("input[name='reward[]']").val();

  // var price = $('#price[]').val();
  // var reward = $('#reward[]').val();
 // alert('time ' + time + ' price ' + price + ' reward ' + reward);
  if( field == '' || field == 'undefined') {
   alert('상담분야를 입력해주세요.');
   return false;
  }

  if( field_pro == '' || field_pro == 'undefined') {
   alert('전문분야를 입력해주세요.');
   return false;
  }

  if( field_search == '' || field_search == 'undefined') {
   alert('검색태그를 입력해주세요.');
   return false;
  }

  if( coin_tel == '' || coin_tel == 'undefined') {
   alert('코인상담 연락처를 입력해주세요.');
   return false;
  }

  if( counsel_tel == '' || counsel_tel == 'undefined') {
   alert('060상담 연락처를 입력해주세요.');
   return false;
  }

  if( nv_url == '' || nv_url == 'undefined') {
   alert('네이버블로그URL을 입력해주세요.');
   return false;
  }
  if( fb_url == '' || fb_url == 'undefined') {
   alert('페이스북URL을 입력해주세요.');
   return false;
  }
  if( ig_url == '' || ig_url == 'undefined') {
   alert('인스트그램URL을 입력해주세요.');
   return false;
  }

  var privacy = $("#privacy").val();
  oEditors.getById["privacy"].exec("UPDATE_CONTENTS_FIELD", []);
      var privacy = $("#privacy").val();

      if( privacy == ""  || privacy == null || privacy == '&nbsp;' || privacy == '<p>&nbsp;</p>')  {
           alert("내용을 입력하세요.");
           oEditors.getById["privacy"].exec("FOCUS"); //포커싱
           return;
      }

      var policy = $("#policy").val();
      oEditors2.getById["policy"].exec("UPDATE_CONTENTS_FIELD", []);
          var policy = $("#policy").val();

          if( policy == ""  || policy == null || policy == '&nbsp;' || policy == '<p>&nbsp;</p>')  {
               alert("내용을 입력하세요.");
               oEditors2.getById["policy"].exec("FOCUS"); //포커싱
               return;
          }

  // if( time == '' || time == 'undefined') {
  //  alert('상담시간을 입력해주세요.');
  //  return false;
  // }
  //
  // if( price == '' || price == 'undefined') {
  //  alert('상담가격을 입력해주세요.');
  //  return false;
  // }
  //
  // if( reward == '' || reward == 'undefined') {
  //  alert('리워드를 입력해주세요.');
  //  return false;
  // }
  // time = JSON.stringify(time);
  // price = JSON.stringify(price);
  // reward = JSON.stringify(reward);

  var result = confirm("변경 하시겠습니까?");
        if(result) { //확인 클릭 시
          $.ajax({
            type: 'POST',
            url:"setting_write_action.php",
            dataType:"json",
            data: {
                   division : division,
                   field : field,
                   field_pro : field_pro,
                   field_search : field_search,
                   time : time,
                   price : price,
                   reward : reward,
                   join_point : join_point,
                   review_point : review_point,
                   review_best_point : review_best_point,
                   coin_tel : coin_tel,
                   counsel_tel : counsel_tel,
                   nv_url : nv_url,
                   fb_url : fb_url,
                   ig_url : ig_url,
                   privacy : privacy,
                    policy : policy
                },
            cache:false,
               success:function(json){
                 var obj = json.dataret;
                 var recode = obj[0].ret_code;
                 var recode_msg = obj[0].ret_code_msg;
                 alert(recode_msg);
                 if(recode == '100'){ //성공
                   location.reload();
                 }else{
                   // inputmodal.modal("hide"); //닫기
                   // member_search_act();
                 }
             }
         });
        }
      });
</script>
<script>
var oEditors = [];
var oEditors2 = [];
var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "privacy",
	sSkinURI: "<?=$file_url?>/js/smarteditor2-fileup/SmartEditor2Skin.html",
	pageId : pageId, //스마트에디터 인자값추가..
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
	},
	fCreator: "createSEditor2"
});

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors2,
	elPlaceHolder: "policy",
	sSkinURI: "<?=$file_url?>/js/smarteditor2-fileup/SmartEditor2Skin.html",
	pageId : pageId, //스마트에디터 인자값추가..
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
	},
	fCreator: "createSEditor2"
});
</script>
</body>
</html>
