<?
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';

$val_1 = isset($_REQUEST['val_1']) ? $_REQUEST['val_1'] : '';
$val_2 = isset($_REQUEST['val_2']) ? $_REQUEST['val_2'] : '';
$val_3 = isset($_REQUEST['val_3']) ? $_REQUEST['val_3'] : '';
$val_4 = isset($_REQUEST['val_4']) ? $_REQUEST['val_4'] : '';
$guestroom_reserve_user_name = "";
$guestroom_code = "";
$guestroom_reserve_user_phone = "";
$guestroom_reserve_user_request = "";
$guestroom_reserve_payment_price = "";
$guestroom_onsite_payment_price = "";
$guestroom_reserve_user_personnel =  "";
$guestroom_reserve_payment_status =  "";
$guestroom_arrive_date =  "";
$guestroom_reserve_payment_method = "";
$guestroom_reserve_memo = "";
$guestroom_reserve_user_personnel_array = "";
$guestroom_reserve_user_personnel_1_array = "";
$guestroom_reserve_user_personnel_1 = "";
$guestroom_reserve_user_personnel_2_array = "";
$guestroom_reserve_user_personnel_2 = "";
$guestroom_reserve_payment_method_array = "";
$guestroom_reserve_user_additional_service = "";
  // // $guestroom_code = $_REQUEST['roomCode'];
  // $val_1 = $_REQUEST['val_1']; //객실고유번호 or 객실예약번호
  // $val_2 = $_REQUEST['val_2']; //날짜
  // $val_3 = $_REQUEST['val_3']; //방이름
  // $val_4 = $_REQUEST['val_4']; //예약상태
  $sales_channel_code = "0001";

  if($division == 'direct_reserve_input') { //직접등록
    if($val_1){
           $guestroom_code = $val_1;
    }
    if(!$val_2){
           $startday = date("Y/m/d");
           $endday = date("Y/m/d");
    }else{ //예약일자를 클릭하고 들어왔을때
         $startday = date("Y/m/d", strtotime($val_2));
         $endday = date("Y/m/d", strtotime($val_2));
    }
  }
  else if($division == 'reserve_modify') { //예약수정
    $sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB
    				WHERE user_id = '".$_SESSION['session_user_id']."'
            AND guestroom_reserve_code = '$val_1'
            ORDER BY seq asc;
            ";
//      echo "
// sql >>> $sql <br>
//      ";
    $result = sql_query($sql);
    $counts = sql_num_rows($result);
    $reserve_date_array = array();
    // $reserve_data_array = array();
    while ($rows = mysqli_fetch_array($result)) {
      array_push($reserve_date_array, $rows['guestroom_reserve_date']);
      // $arrData = array(
      //           'guestroom_code' => $rows['guestroom_code'],
      //           'guestroom_name' => $rows['guestroom_name'],
      //            );
      // array_push($reserve_data_array, $arrData);
      // echo "a >> $rows[seq] <br>";
      $guestroom_reserve_user_name = $rows['guestroom_reserve_user_name'];
      $guestroom_code = $rows['guestroom_code'];
      $guestroom_reserve_user_phone = $rows['guestroom_reserve_user_phone'];
      $guestroom_reserve_user_request = $rows['guestroom_reserve_user_request'];
      $guestroom_reserve_payment_price = $rows['guestroom_reserve_payment_price'];
      $guestroom_onsite_payment_price = $rows['guestroom_onsite_payment_price'];
      $guestroom_reserve_user_personnel =  $rows['guestroom_reserve_user_personnel'];
      $guestroom_reserve_payment_status =  $rows['guestroom_reserve_payment_status'];
      $guestroom_arrive_date =  $rows['guestroom_arrive_date'];
      $guestroom_reserve_payment_method = $rows['guestroom_reserve_payment_method'];
      $guestroom_reserve_memo = $rows['guestroom_reserve_memo'];
    }
//     echo "
// guestroom_reserve_user_personnel >>> $guestroom_reserve_user_personnel <br>
//     ";
    $guestroom_reserve_user_personnel_array = explode(",",$guestroom_reserve_user_personnel);
    $guestroom_reserve_user_personnel_1_array = explode(":",$guestroom_reserve_user_personnel_array[0]);
    $guestroom_reserve_user_personnel_1 = $guestroom_reserve_user_personnel_1_array[1];
    $guestroom_reserve_user_personnel_2_array = explode(":",$guestroom_reserve_user_personnel_array[1]);
    $guestroom_reserve_user_personnel_2 = $guestroom_reserve_user_personnel_2_array[1];
    $guestroom_reserve_payment_method_array = explode(",",$guestroom_reserve_payment_method);
    // $guestroom_reserve_payment_method_array = explode(",",$guestroom_reserve_payment_method);
// print_r($guestroom_reserve_payment_method_array);
//     echo "
// guestroom_reserve_payment_method >>> $guestroom_reserve_payment_method <br>
// guestroom_reserve_payment_status >>> $guestroom_reserve_payment_status <br>
// guestroom_reserve_user_personnel_array >>> $guestroom_reserve_user_personnel_array <br>
// guestroom_reserve_user_personnel_array >>> $guestroom_reserve_user_personnel_1 <br>
// guestroom_reserve_user_personnel_array >>> $guestroom_reserve_user_personnel_2 <br>
//     ";
    $firstday = reset($reserve_date_array);
    $endday =  end($reserve_date_array);
    $startday = date("Y/m/d", strtotime($firstday));
    $endday = date("Y/m/d", strtotime($endday));
  }
//   echo "
// startday >>> $startday <br>
// endday >>> $endday <br>
//   ";
?>
<body id="manage">
<!-- <iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style> -->
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<form name="guestroom" method="post" enctype="multipart/form-data">
							<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
							<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
              <input type="hidden" name="division" id="division" value="<?=$division?>">
              <!-- <input type="hidden" name="guestroom_code" id="guestroom_code" value="<?=$guestroom_code?>"> -->
              <input type="hidden" name="val" id="val" value="<?=$val?>">
              <input type="hidden" name="guestroom_reserve_code" id="guestroom_reserve_code" value="<?=$guestroom_reserve_code?>">
              <input type="hidden" name="guestroom_reserve_payment_method" id="guestroom_reserve_payment_method" value="">
						<div class="box_title first">
							<h2 class="title">직접등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:40%">
								<col style="width:10%">
								<col style="width:40%">
							</colgroup>
							<tr>
								<th scope="row">예약자</th>
								<td>
									<input type="text" name="guestroom_reserve_user_name" id ="guestroom_reserve_user_name" class="input input_full" placeholder="*필수) 예약자" value="<?=$guestroom_reserve_user_name?>">
								</td>
								<th scope="row">객실선택</th>
								<td>
									<select id="guestroom_code" name="guestroom_code" style="width: 70%" class="form-control">
													<option value=""></option>
													<?
													$sql = "SELECT *	FROM $GUESTROOM_INFO_TB WHERE user_id = '".$_SESSION['session_user_id']."'";
													$result = sql_query($sql);
													while($rows = mysqli_fetch_array($result)){
													?>
														 <option <? if($rows['guestroom_code'] == $guestroom_code){?> selected <?}?> value="<?=$rows['guestroom_code']?>:<?=$rows['guestroom_name']?>"><?=$rows['guestroom_name']?></option>
													 <?}?>
											</select>
								</td>
							</tr>
							<tr>
								<th scope="row">휴대폰번호</th>
								<td>
									<input type="number" name="guestroom_reserve_user_phone" id ="guestroom_reserve_user_phone"  class="input input_full" placeholder="*필수) 휴대폰번호"  value="<?=$guestroom_reserve_user_phone?>">
								</td>
								<th scope="row">예약일</th>
								<td>
								<i class="fa fa-calendar"></i>
 								<input class="input input_full"  type="text"  name= "guestroom_reserve_date" id= "guestroom_reserve_date"  value="<?=$startday?> - <?=$endday?>" readonly>
								</td>
							</tr>
							<tr>
								<th scope="row">인원</th>
								<td>
									성인 <input type="number" name="guestroom_reserve_user_personnel_1" id ="guestroom_reserve_user_personnel_1"  class="input right input_won" placeholder="0"  value="<?=$guestroom_reserve_user_personnel_1?>">
									유아 <input type="number" name="guestroom_reserve_user_personnel_2" id ="guestroom_reserve_user_personnel_2"  class="input right input_won" placeholder="0"  value="<?=$guestroom_reserve_user_personnel_2?>">
								</td>
								<th scope="row">결제여부</th>
								<td>
									<label class="p_cursor"><input type="radio" <? if($guestroom_reserve_payment_status == '3'){?> checked <?}?> name="guestroom_reserve_payment_status" value="3"> 결제완료</label>
									<label class="p_cursor"><input type="radio" <? if($guestroom_reserve_payment_status == '4' || $guestroom_reserve_payment_status == ''){?> checked <?}?> name="guestroom_reserve_payment_status" value="4"> 미결제</label>
								</td>
							</tr>
							<tr>
								<th scope="row">도착예정시간</th>
								<td>
									<select id="guestroom_arrive_date" name="guestroom_arrive_date" style="width: 70%" class="form-control">
                          <option value=""></option>
													<option <? if($guestroom_arrive_date == '10'){?> selected <?}?> value="10">10:00</option>
													<option <? if($guestroom_arrive_date == '11'){?> selected <?}?> value="11">11:00</option>
													<option <? if($guestroom_arrive_date == '12'){?> selected <?}?> value="12">12:00</option>
													<option <? if($guestroom_arrive_date == '13'){?> selected <?}?> value="13">13:00</option>
													<option <? if($guestroom_arrive_date == '14'){?> selected <?}?> value="14">14:00</option>
													<option <? if($guestroom_arrive_date == '15'){?> selected <?}?> value="15">15:00</option>
													<option <? if($guestroom_arrive_date == '16'){?> selected <?}?> value="16">16:00</option>
													<option <? if($guestroom_arrive_date == '17'){?> selected <?}?> value="17">17:00</option>
													<option <? if($guestroom_arrive_date == '18'){?> selected <?}?> value="18">18:00</option>
													<option <? if($guestroom_arrive_date == '19'){?> selected <?}?> value="19">19:00</option>
													<option <? if($guestroom_arrive_date == '20'){?> selected <?}?> value="20">20:00</option>
											</select>
								</td>
								<th scope="row">결제수단</th>
								<td>
									<label class="p_cursor"><input type="checkbox" <? if($guestroom_reserve_payment_method_array[0] == 'R'){?> checked <?}?>  class="guestroom_reserve_payment_method"  value="R"> 실시간 계좌이체</label>
									<label class="p_cursor"><input type="checkbox" <? if($guestroom_reserve_payment_method_array[1] == 'B'){?> checked <?}?>  class="guestroom_reserve_payment_method" value="B"> 무통장입금</label>
									<label class="p_cursor"><input type="checkbox" <? if($guestroom_reserve_payment_method_array[2] == 'C'){?> checked <?}?>  class="guestroom_reserve_payment_method" value="C"> 카드</label>
									<label class="p_cursor"><input type="checkbox" <? if($guestroom_reserve_payment_method_array[3] == 'H'){?> checked <?}?>  class="guestroom_reserve_payment_method" value="H"> 휴대폰</label>
								</td>
							</tr>
							<tr>
								<th scope="row">요청사항</th>
								<td>
									<input type="text" name="guestroom_reserve_user_request" id ="guestroom_reserve_user_request"  class="input input_full" value="<?=$guestroom_reserve_user_request?>">
								</td>
								<th scope="row">결제금액</th>
								<td>
									<input type="number" name="guestroom_reserve_payment_price" id ="guestroom_reserve_payment_price"  class="input input_full" placeholder="*필수) 숫자만 입력하세요"  value="<?=$guestroom_reserve_payment_price?>">
								</td>
							</tr>
							<tr>
								<th scope="row">메모</th>
								<td>
									<input type="text" name="guestroom_reserve_memo" id ="guestroom_reserve_memo"  class="input input_full"  value="<?=$guestroom_reserve_memo?>">
								</td>
								<th scope="row">현장결제</th>
								<td>
									<input type="number" name="guestroom_onsite_payment_price" id ="guestroom_onsite_payment_price"  class="input input_full" placeholder="*필수) 숫자만 입력하세요"  value="<?=$guestroom_onsite_payment_price?>">
								</td>
							</tr>
              <tr>
                <th scope="row">부가서비스</th>
                <td>
                  <input type="text" name="guestroom_reserve_user_additional_service" id ="guestroom_reserve_user_additional_service" class="input input_full" placeholder="*필수) 부가서비스" value="<?=$guestroom_reserve_user_additional_service?>">
                </td>
                <th scope="row">판매채널</th>
                <td>
                  <select id="guestroom_sales_channel" name="guestroom_sales_channel" style="width: 70%" class="form-control">
                          <option value=""></option>
                          <?
                          $sql = "SELECT *	FROM $GUESTROOM_SALES_CHANNEL_TB WHERE user_id = '".$_SESSION['session_user_id']."'";
                          $result = sql_query($sql);

                          while($rows = mysqli_fetch_array($result)){
                          ?>
                             <option <? if($rows['sales_channel_code'] == $sales_channel_code){?> selected <?}?> value="<?=$rows['sales_channel_code']?>:<?=$rows['sales_channel_name']?>"><?=$rows['sales_channel_name']?></option>
                           <?}?>
                      </select>
                </td>
              </tr>
							<!-- <tr>
								<th scope="row">객실 설명</th>
								<td colspan="3">
									<textarea name="guestroom_content" id="guestroom_content" style="width: 100%; height: 412px;"></textarea>
								</td>
							</tr> -->
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="reserve_input" value="등록/수정"></span>
						</div>
					</form>
				</article>
			</section>
		<?
		include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
		?>

	</div>
</div>
<script type="text/javascript">
  $("#guestroom_code").select2({
  allowClear:true,
  placeholder: '객실선택'
  });

	$("#guestroom_arrive_date").select2({
	allowClear:true,
	placeholder: '도착예정시간'
	});

  $("#guestroom_sales_channel").select2({
	allowClear:true,
	placeholder: '판매채널'
	});

	$('#reserve_input').click(function(){
              var division = $('#division').val();
          		var guestroom_reserve_user_name = $('#guestroom_reserve_user_name').val();
          		var guestroom_code = $("#guestroom_code option:selected").val();
          		var guestroom_reserve_user_phone = $('#guestroom_reserve_user_phone').val();
          		var guestroom_reserve_date = $('#guestroom_reserve_date').val();
              var guestroom_reserve_user_personnel_1 = $('#guestroom_reserve_user_personnel_1').val();
              var guestroom_reserve_user_personnel_2 = $('#guestroom_reserve_user_personnel_2').val();
              var guestroom_reserve_payment_status = $(':radio[name="guestroom_reserve_payment_status"]:checked').val();
              var guestroom_arrive_date = $('#guestroom_arrive_date').val();
              var guestroom_reserve_user_request = $('#guestroom_reserve_user_request').val();
              var guestroom_reserve_payment_price = $('#guestroom_reserve_payment_price').val();
          		var guestroom_onsite_payment_price = $('#guestroom_onsite_payment_price').val();
          		var guestroom_reserve_memo = $('#guestroom_reserve_memo').val();
              var guestroom_reserve_code ="";
              var guestroom_reserve_payment_date ="";
              var guestroom_cancel_date ="";
              var guestroom_reserve_user_additional_service = $('#guestroom_reserve_user_additional_service').val();
              var guestroom_sales_channel = $("#guestroom_sales_channel option:selected").val();

              var send_cnt = 0;
              var chkbox = $(".guestroom_reserve_payment_method");
              var guestroom_reserve_payment_method_array = Array();
              for(i = 0; i < chkbox.length ; i++) {
                  if (chkbox[i].checked == true){
                    guestroom_reserve_payment_method_array[send_cnt] = chkbox[i].value;
                    send_cnt++;
                  }else{
                    guestroom_reserve_payment_method_array[send_cnt] = '0';
                    send_cnt++;
                  }
                }

          		if(guestroom_reserve_user_name == '') { warning('예약자명을 입력하세요','guestroom_reserve_user_name'); return false; }
          		if(guestroom_code == '') { warning('객실을 선택하세요','guestroom_code');	return false; }
          		if(guestroom_reserve_user_phone == '') { warning('휴대폰번호를 입력하세요','guestroom_reserve_user_phone');	return false; }
          		if(guestroom_reserve_payment_method_array == '0,0,0,0') { warning('결제수단을 선택하세요','guestroom_reserve_payment_method_array'); return false; }
          		// var sh = document.guestroom;
          		// sh.action = "reserve_write_action.php";
          		// sh.submit();
              var result = confirm("예약등록 하시겠습니까?");
               if(result ){ //확인 클릭 시
              $.ajax({
                type: 'GET',
                url:"reserve_write_action.php",
                data: {
                       division : division,
                       guestroom_code : guestroom_code,
                       guestroom_reserve_code : guestroom_reserve_code,
                       guestroom_reserve_payment_status : guestroom_reserve_payment_status,
                       guestroom_reserve_user_name : guestroom_reserve_user_name,
                       guestroom_reserve_user_phone : guestroom_reserve_user_phone,
                       guestroom_reserve_date : guestroom_reserve_date,
                       guestroom_reserve_user_personnel_1 : guestroom_reserve_user_personnel_1,
                       guestroom_reserve_user_personnel_2 : guestroom_reserve_user_personnel_2,
                       guestroom_arrive_date : guestroom_arrive_date,
                       guestroom_reserve_payment_date : guestroom_reserve_payment_date,
                       guestroom_cancel_date : guestroom_cancel_date,
                       guestroom_reserve_payment_method_array : guestroom_reserve_payment_method_array,
                       guestroom_reserve_payment_price : guestroom_reserve_payment_price,
                       guestroom_onsite_payment_price : guestroom_onsite_payment_price,
                       guestroom_reserve_user_request : guestroom_reserve_user_request,
                       guestroom_reserve_memo : guestroom_reserve_memo,
                       guestroom_reserve_user_additional_service : guestroom_reserve_user_additional_service,
                       guestroom_sales_channel : guestroom_sales_channel
                     },
                cache:false,
                   success:function(result){
                        // alert(result);

                      if(result == 'ok'){
                           var result = confirm("예약등록을 완료하였습니다.\n\n예약현황리스트로 이동하시겠습니까?");
                           if(result ){ //확인 클릭 시
                             location.href = "./reservation_list.php?top_menu_id=4001&left_menu_id=002"
                           }
                       }else if(result == 'overlap'){ //중복예약
                         alert('이미 예약된 정보가 있습니다.');
                       }else{
                         alert('처리에러.');
                       }
                     }});
      }
	});

  $(function() {
    $('#guestroom_reserve_date').daterangepicker({
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

    // $('.R2Tip').mouseover(function() {
    // 	new R2Tip(this, this.alt, null, event);
    // });
    //
    // $('.btt').btt('tooltip_square');

});

</script>
</body>
</html>
