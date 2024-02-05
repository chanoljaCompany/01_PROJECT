<?
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/top.php";
  $division = $_REQUEST['division'];//페이지구분
  // $guestroom_code = $_REQUEST['roomCode'];
  $guestroom_reserve_code = $_REQUEST['guestroom_reserve_code']; //객실고유번호 or 객실예약번호


  $GUESTROOM_INFO_TB = "guestroom_info";
  $GUESTROOM_RESERVATION_INFO_TB = "guestroom_reservation_info";

  // if($division == 'reserve_modify'){ //예약수정
    $sql = "SELECT * FROM $GUESTROOM_RESERVATION_INFO_TB
    				WHERE pension_user_id = '$session_userid'
            AND guestroom_reserve_code = '$guestroom_reserve_code'
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
      $guestroom_name = $rows['guestroom_name'];
      $guestroom_reserve_user_phone = $rows['guestroom_reserve_user_phone'];
      $guestroom_reserve_user_request = $rows['guestroom_reserve_user_request'];
      $guestroom_reserve_payment_price = $rows['guestroom_reserve_payment_price'];
      $guestroom_onsite_payment_price = $rows['guestroom_onsite_payment_price'];
      $guestroom_refund_price = $rows['guestroom_refund_price'];
      $guestroom_reserve_user_personnel =  $rows['guestroom_reserve_user_personnel'];
      $guestroom_reserve_payment_status =  $rows['guestroom_reserve_payment_status'];
      $guestroom_arrive_date =  $rows['guestroom_arrive_date'];
      $guestroom_reserve_payment_method = $rows['guestroom_reserve_payment_method'];
      $guestroom_reserve_memo = $rows['guestroom_reserve_memo'];
      $guestroom_reserve_status = $rows['guestroom_reserve_status'];
      $guestroom_reserve_user_additional_service = $rows['guestroom_reserve_user_additional_service'];
      $guestroom_reception_date = $rows['guestroom_reception_date'];
      $guestroom_reserve_payment_date = $rows['guestroom_reserve_payment_date'];
      $guestroom_reserve_refund_request_date = $rows['guestroom_reserve_refund_request_date'];
      $guestroom_reserve_refund_date = $rows['guestroom_reserve_refund_date'];
      $guestroom_cancel_date = $rows['guestroom_cancel_date'];
      $guestroom_reserve_sales_channel_name = $rows['guestroom_reserve_sales_channel_name'];
    }
    // $guestroom_reserve_payment_date = date("Y/m/d", strtotime($guestroom_reserve_payment_date));
    $guestroom_reserve_payment_date  = $guestroom_reserve_payment_date ?  date("Y-m-d", strtotime($guestroom_reserve_payment_date)) : ""; //광고코드
    $guestroom_cancel_date  = $guestroom_cancel_date ?  date("Y-m-d", strtotime($guestroom_cancel_date)) : ""; //광고코드
    $guestroom_reserve_refund_date  = $guestroom_reserve_refund_date ?  date("Y-m-d", strtotime($guestroom_reserve_refund_date)) : ""; //광고코드
    $guestroom_reserve_refund_request_date  = $guestroom_reserve_refund_request_date ?  date("Y-m-d", strtotime($guestroom_reserve_refund_request_date)) : ""; //광고코드
    $guestroom_reserve_user_personnel_array = explode(",",$guestroom_reserve_user_personnel);
    $guestroom_reserve_user_personnel_1_array = explode(":",$guestroom_reserve_user_personnel_array[0]);
    $guestroom_reserve_user_personnel_1 = $guestroom_reserve_user_personnel_1_array[1];
    $guestroom_reserve_user_personnel_2_array = explode(":",$guestroom_reserve_user_personnel_array[1]);
    $guestroom_reserve_user_personnel_2 = $guestroom_reserve_user_personnel_2_array[1];
    $guestroom_reserve_payment_method_array = explode(",",$guestroom_reserve_payment_method);
    $guestroom_reserve_payment_method_array = explode(",",$guestroom_reserve_payment_method);

    $guestroom_reserve_status_str = "";
    if($guestroom_reserve_status == '1'){
      $guestroom_reserve_status_str = "예약대기";
    }else if($guestroom_reserve_status == '2'){
      $guestroom_reserve_status_str = "예약완료";
    }else if($guestroom_reserve_status == '3'){
      $guestroom_reserve_status_str = "예약취소대기";
    }else if($guestroom_reserve_status == '4'){
      $guestroom_reserve_status_str = "예약취소완료";
    }else if($guestroom_reserve_status == '8'){
      $guestroom_reserve_status_str = "방막기";
    }else{
      $guestroom_reserve_status_str = "상태값오류";
    }

    $guestroom_reserve_payment_status_str = "";
    if($guestroom_reserve_payment_status == '1'){
      $guestroom_reserve_payment_status_str = "결제대기";
    }else if($guestroom_reserve_payment_status == '2'){
      $guestroom_reserve_payment_status_str = "결제중";
    }else if($guestroom_reserve_payment_status == '3'){
      $guestroom_reserve_payment_status_str = "결제완료";
    }else if($guestroom_reserve_payment_status == '4'){
      $guestroom_reserve_payment_status_str = "미결제";
    }else{
      $guestroom_reserve_payment_status_str = "상태값오류";
    }

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
  // }else if($division == 'direct_reserve_input'){ //직접등록
  //   if(!$resevedate){
  //          $startday = date("Y/m/d");
  //          $endday = date("Y/m/d");
  //   }else{ //예약일자를 클릭하고 들어왔을때
  //        $startday = date("Y/m/d", strtotime($resevedate));
  //         $endday = date("Y/m/d", strtotime($resevedate));
  //   }
  // }
?>
<!-- <body id="manage">
<div id="admin_content">
	<div id="container">
		<section id="wrapper">
					<div class="clear"></div> -->
						<form name="guestroom" method="post" enctype="multipart/form-data">
							<input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
							<input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
              <input type="hidden" name="division" id="division" value="<?=$division?>">
              <!-- <input type="hidden" name="guestroom_code" id="guestroom_code" value="<?=$guestroom_code?>"> -->
              <input type="hidden" name="val" id="val" value="<?=$val?>">
              <input type="hidden" name="guestroom_reserve_code" id="guestroom_reserve_code" value="<?=$guestroom_reserve_code?>">
              <input type="hidden" name="guestroom_reserve_payment_method" id="guestroom_reserve_payment_method" value="">

						<table class="tbl_row multi_shop">
							<caption class="hidden">직접등록</caption>
							<colgroup>
								<col style="width:15%">
								<col style="width:35%">
								<col style="width:15%">
								<col style="width:35%">
							</colgroup>
              <tr>
								<th scope="row">예약번호</th>
								<td>
									<?=$guestroom_reserve_code?>
								</td>
								<th scope="row">예약상태</th>
								<td>
                  <?=$guestroom_reserve_status_str?>
								</td>
							</tr>
              <tr>
								<th scope="row">결제상태</th>
								<td>
									<!-- <input type="text" name="guestroom_reserve_payment_status" id ="guestroom_reserve_payment_status" class="input" size="30" value="<?=$guestroom_reserve_payment_status_str?>" readonly> -->
                  <select id="guestroom_reserve_payment_status" name="guestroom_reserve_payment_status">
										 <!-- <option <? if($guestroom_reserve_payment_status == '1'){?> selected <?}?> value="1">결제대기</option>
                     <option <? if($guestroom_reserve_payment_status == '2'){?> selected <?}?> value="2">결제중</option> -->
                     <option <? if($guestroom_reserve_payment_status == '3'){?> selected <?}?> value="3">결제완료</option>
                     <option <? if($guestroom_reserve_payment_status == '4'){?> selected <?}?> value="4">미결제</option>
                     <option <? if($guestroom_reserve_payment_status == '5'){?> selected <?}?> value="5">환불신청</option>
                     <option <? if($guestroom_reserve_payment_status == '6'){?> selected <?}?> value="6">환불완료</option>
									</select>
								</td>
								<th scope="row">객실</th>
								<td>
									<?=$guestroom_name?>
								</td>
							</tr>
							<tr>
								<th scope="row">예약자</th>
								<td>
									<?=$guestroom_reserve_user_name?>
								</td>
                <th scope="row">연락처</th>
                <td>
                  <?=$guestroom_reserve_user_phone?>
                </td>
							</tr>
							<tr>
                <th scope="row">인원</th>
								<td>
									성인 : <?=$guestroom_reserve_user_personnel_1?>
									유아 : <?=$guestroom_reserve_user_personnel_2?>
								</td>
                <th scope="row">도착예정시간</th>
								<td>
									<?=$guestroom_arrive_date?>:00시
								</td>
							</tr>
							<tr>
                <th scope="row">접수일</th>
								<td>
 								<?=$guestroom_reception_date?>
								</td>
                <th scope="row">예약일</th>
								<td>
 								<?=$startday?> - <?=$endday?>
              	</td>
							</tr>
							<tr>
                <th scope="row">결제일</th>
								<td>
								<?=$guestroom_reserve_payment_date?>
								</td>
                <th scope="row">취소일</th>
                <td>
                <?=$guestroom_cancel_date?>
                </td>
              </tr>
              <tr>
                <th scope="row">환불신청일</th>
                <td>
                  <i class="fa fa-calendar"></i>
   								<input  class="input" size="20" type="text"  name= "guestroom_reserve_refund_request_date" id= "guestroom_reserve_refund_request_date"  value="<?=$guestroom_reserve_refund_request_date?>" readonly>
                  <button type="button" class="btn btn-primary btn-sm" id="guestroom_reserve_refund_request_date_reset_btn">초기화</button>
                </td>
                <th scope="row">환불일</th>
                <td>
                  <i class="fa fa-calendar"></i>
   								<input  class="input" size="20" type="text"  name= "guestroom_reserve_refund_date" id= "guestroom_reserve_refund_date"  value="<?=$guestroom_reserve_refund_date?>" readonly>
                  <button type="button" class="btn btn-primary btn-sm" id="guestroom_reserve_refund_date_reset_btn">초기화</button>
                </td>

							</tr>
							<tr>
                <th scope="row">결제수단</th>
								<td>
									<? if($guestroom_reserve_payment_method_array[0] == 'R'){?> 실시간 계좌이체 <?}?>
									<? if($guestroom_reserve_payment_method_array[1] == 'B'){?> 무통장입금 <?}?>
									<? if($guestroom_reserve_payment_method_array[2] == 'C'){?> 카드 <?}?>
									<? if($guestroom_reserve_payment_method_array[3] == 'H'){?> 휴대폰 <?}?>
								</td>
                <th scope="row">판매채널</th>
								<td>
									<?=$guestroom_reserve_sales_channel_name?>
								</td>
							</tr>
							<tr>
                <th scope="row">결제금액</th>
                <td>
                  <?=$guestroom_reserve_payment_price?>
                </td>
                <th scope="row">현장결제</th>
                <td>
                  <?=$guestroom_onsite_payment_price?>
                </td>
							</tr>
              <tr>
                <th scope="row">환불금액</th>
                <td>
                  <input type="number" name="guestroom_refund_price" id ="guestroom_refund_price" class="input" size="30" placeholder="*필수) 숫자만 입력하세요"  value="<?=$guestroom_refund_price?>">
                </td>
                <th scope="row">요청사항</th>
                <td>
                  <?=$guestroom_reserve_user_request?>
                </td>
							</tr>
							<tr>
                <th scope="row">메모</th>
								<td>
									<?=$guestroom_reserve_memo?>
								</td>
                <th scope="row">부가서비스</th>
                <td>
                  <?=$guestroom_reserve_user_additional_service?>
                </td>
            </tr>
						</table>
						<!-- <div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="reserve_input" value="등록/수정"></span>
						</div> -->
					</form>
			<!-- </section>
	</div>
</div> -->
</body>
</html>
<script type="text/javascript">

$(function() {
  // moment.locale('ko'); //언어를 한국어로 설정함!
  $('#guestroom_reserve_refund_request_date_reset_btn').click(function(){
      $("#guestroom_reserve_refund_request_date").val('');
    });

    $('#guestroom_reserve_refund_date_reset_btn').click(function(){
        $("#guestroom_reserve_refund_date").val('');
      });

// $('#startDate').daterangepicker({
  //   singleDatePicker: true,
  //   startDate: moment().subtract(6, 'days')
  // });

  $('#guestroom_reserve_refund_request_date').daterangepicker({
      singleDatePicker: true,
       autoApply: true,
      // autoUpdateInput: false, //input 공란처리..
      locale: {
          format: 'YYYY/MM/DD',
          applyLabel: '확인 <i class="fa fa-check"></i>',
          cancelLabel: '취소 <i class="fa fa-times"></i>',
          daysOfWeek: ['일','월','화','수','목','금','토'],
          monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
      },
      // applyClass: 'btn-e btn-e-yellow color-white',
      // cancelClass: 'btn-e btn-e-dark color-white',
  });
  // .on('change', function(){
  //         $('#guestroom_reserve_refund_request_date').val('');
  //   });

  $('#guestroom_reserve_refund_request_date').on('cancel.daterangepicker', function(ev, picker) {
      $('#guestroom_reserve_refund_request_date').val('');
  });



  $('#guestroom_reserve_refund_date').daterangepicker({
    singleDatePicker: true,
     autoApply: true,
       // autoclose: true,
      // autoUpdateInput: false, //input 공란처리..
      locale: {
          format: 'YYYY/MM/DD',
          applyLabel: '확인 <i class="fa fa-check"></i>',
          cancelLabel: '취소 <i class="fa fa-times"></i>',
          daysOfWeek: ['일','월','화','수','목','금','토'],
          monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
          // ,
          // applyLabel: '확인 <i class="fa fa-check"></i>',
          // cancelLabel: '취소 <i class="fa fa-times"></i>',
          // daysOfWeek: ['일','월','화','수','목','금','토'],
          // monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월']
      },
      // applyClass: 'btn-e btn-e-yellow color-white',
      // cancelClass: 'btn-e btn-e-dark color-white',
  });

  $('#guestroom_reserve_refund_date').on('cancel.daterangepicker', function(ev, picker) {
      $('#guestroom_reserve_refund_date').val('');
  });
  // var guestroom_cancel_date = $('#guestroom_cancel_date').val();
  $("#guestroom_reserve_refund_request_date").val('');
  $('#guestroom_reserve_refund_request_date').val('<?=$guestroom_reserve_refund_request_date?>');
  $("#guestroom_reserve_refund_date").val('');
  $('#guestroom_reserve_refund_date').val('<?=$guestroom_reserve_refund_date?>');
});
</script>
