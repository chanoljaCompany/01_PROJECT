<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
  $division = "management_reserve";
  if($_SESSION['session_user_level'] == 'A'){
    $seq = isset($_REQUEST["val1"]) ? $_REQUEST["val1"] : '';
    $userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : 'N';
  }
  else{
    $userid = $_SESSION['session_user_id'];
  }

  $sql = "SELECT *	FROM $MANAGEMENT_RESERVE_TB WHERE user_id = '".$userid."'";
  $row = sql_fetch($sql);
  $payment_method = $row['payment_method'];
  $payment_method_array = explode(",",$payment_method);
  $weekend_fee_set = $row['weekend_fee_set'];
  $weekend_fee_set_array = explode(",",$weekend_fee_set);
  $get_reserve_peak_data = get_reserve_peak_data($row['user_id'],$_SESSION['session_user_level']);

?>
<body id="manage">
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content" >
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
			<article id="contentArea">
<div class="clear"></div>
<script type="text/javascript">
var r_currency_list = new layerWindow('config@reference_currency.exe');
</script>
<form name = "management_reserve" id="management_reserve" method="post" enctype="multipart/form-data">
 <input type="hidden"	name="division" id="division" value="<?=$division?>">
 <input type="hidden"	name="userid" id="userid" value="<?=$userid?>">
  <div class="box_title first">
    <h2 class="title">성수기 기간설정</h2>
  </div>
  <table class="tbl_row multi_shop">
    <caption class="hidden">성수기 기간설정</caption>
    <colgroup>
      <col style="width:15%">
      <col style="width:35%">
      <col style="width:15%">
      <col style="width:35%">
    </colgroup>
    <tr>
      <th scope="row">성수기 설정</th>
      <td>
        <input type="radio" name="peak_season_whether" id="peak_season_whether" <? if($row['peak_season_whether'] == 'Y'){?> checked <?}?> value="Y">사용
        <input type="radio" name="peak_season_whether" id="peak_season_whether" <? if($row['peak_season_whether'] == 'N' || $row['peak_season_whether'] == ''){?> checked <?}?> value="N">사용안함
      </td>
      <th scope="row">성수기 날짜</th>
      <td>
        <i class="fa fa-calendar"></i>
        <input class="input"  type="text"  name="peak_season" size="30" id= "peak_season" value="<?=$get_reserve_peak_data['peak_season_start_date']?> - <?=$get_reserve_peak_data['peak_season_end_date']?>" readonly>
      </td>
    </tr>
  </table>
  <div class="box_title first">
    <h2 class="title">주말 설정</h2>
  </div>
  <table class="tbl_row multi_shop">
    <caption class="hidden">주말 설정</caption>
    <colgroup>
      <col style="width:15%">
      <col style="width:35%">
      <col style="width:15%">
      <col style="width:35%">
    </colgroup>
    <tr>
      <th scope="row">주말설정 적용여부</th>
      <td>
        <input type="radio" name="weekend_whether" id="weekend_whether" <? if($row['weekend_whether'] == 'Y'){?> checked <?}?> value="Y">사용
        <input type="radio" name="weekend_whether" id="weekend_whether" <? if($row['weekend_whether'] == 'N' || $row['weekend_whether'] == '' ){?> checked <?}?> value="N">사용안함
      </td>
      <th scope="row" rowspan="3">안내</th>
      <td rowspan="3">
       <li>* 공휴일은 국경일 및 일요일</li>
       <!-- <li>* 공휴일을 주말요금 적용을 사용하지 않는경우,</li>
       <li>&nbsp;&nbsp;선택한 날짜가 주말요금 적용 기간에 포함되어 있어도 휴일 요금이 적용됩니다.</li> -->
      </td>
    </tr>
    <tr>
      <th scope="row">세부설정</th>
      <td>
        <select id="weekend_setting_start" name="weekend_setting_start" style="width: 30%" class="form-control">
                <option value=""></option>
                <option <? if($row['weekend_setting_start'] == '1'){?> selected <?}?> value="1">월요일</option>
                <option <? if($row['weekend_setting_start'] == '2'){?> selected <?}?> value="2">화요일</option>
                <option <? if($row['weekend_setting_start'] == '3'){?> selected <?}?> value="3">수요일</option>
                <option <? if($row['weekend_setting_start'] == '4'){?> selected <?}?> value="4">목요일</option>
                <option <? if($row['weekend_setting_start'] == '5' || $row['weekend_setting_start'] == ''){?> selected <?}?> value="5">금요일</option>
                <option <? if($row['weekend_setting_start'] == '6'){?> selected <?}?> value="6">토요일</option>
                <option <? if($row['weekend_setting_start'] == '7'){?> selected <?}?> value="7">일요일</option>

            </select>
            부터
        <select id="weekend_setting_end" name="weekend_setting_end" style="width: 30%" class="form-control">
                <option value=""></option>
                <option <? if($row['weekend_setting_end'] == '1'){?> selected <?}?> value="1">월요일</option>
                <option <? if($row['weekend_setting_end'] == '2'){?> selected <?}?> value="2">화요일</option>
                <option <? if($row['weekend_setting_end'] == '3'){?> selected <?}?> value="3">수요일</option>
                <option <? if($row['weekend_setting_end'] == '4'){?> selected <?}?> value="4">목요일</option>
                <option <? if($row['weekend_setting_end'] == '5'){?> selected <?}?> value="5">금요일</option>
                <option <? if($row['weekend_setting_end'] == '6'){?> selected <?}?> value="6">토요일</option>
                <option <? if($row['weekend_setting_end'] == '7' || $row['weekend_setting_end'] == ''){?> selected <?}?> value="7">일요일</option>
            </select>
      </td>
    </tr>
    <tr>
      <th scope="row">공휴일 설정</th>
      <td>
        <label class="p_cursor"><input type="checkbox" name= "weekend_fee_set" <? if($weekend_fee_set_array[0] == 'A'){?> checked <?}?>  class="weekend_fee_set"  value="A">공휴일 전일을 공휴일요금 적용</label><br>
      </td>
    </tr>
  </table>
	<div class="box_bottom">
		<span class="box_btn blue"><input type="button" id="management_reserve_input" value="설정적용"></span>
        <? if($_SESSION['session_user_level'] == 'A'){?>
        <span class="box_btn grey"><input type="button" id="management_reserve_list" value="목록"></span>
        <?}?>
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

<script type="text/javascript">
$(function() {
  $('#peak_season').daterangepicker({
      locale: {
          format: 'YYYY/MM/DD',
          applyLabel: '확인 <i class="fa fa-check"></i>',
          cancelLabel: '취소 <i class="fa fa-times"></i>',
          daysOfWeek: ['일','월','화','수','목','금','토'],
          monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
      },
      applyClass: 'btn-e btn-e-yellow color-white',
      cancelClass: 'btn-e btn-e-dark color-white',
  });
});
$("#management_reserve_list").click(function(){
    location.href='management_reserve_list.php?top_menu_id=1001&left_menu_id=002&manager=M';
});
$('#management_reserve_input').click(function() {
        var form = $('#management_reserve')[0];
        var formData = new FormData(form);
          for (var pair of formData.entries())
           {
           console.log(pair[0]+ ', ' + pair[1]);
           }
            $.ajax({
    			type: 'POST',
    			url:"management_write_action.php",
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
                        location.reload();
                        //location.href="guestroom_list.php?top_menu_id=2001&left_menu_id=001";
                    }else{
                        location.reload();
                        //member_search_act();
                    }
                }
    		});    
        });                  
</script>
</body>
</html>
