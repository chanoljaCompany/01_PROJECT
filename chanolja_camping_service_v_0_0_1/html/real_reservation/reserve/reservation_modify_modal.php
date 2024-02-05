<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";
// session_name( md5( $SITE_NAME ) );
//session_start();
// include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
      $guestroom_reserve_code = trim(isset($_REQUEST['guestroom_reserve_code'])) ? $_REQUEST['guestroom_reserve_code'] : '';//상품예약번호
      $reserveData = get_reserve_data($guestroom_reserve_code);
    //   print_r($reserveData);
      $get_paymethod_type_str = get_paymethod_type($reserveData['guestroom_reserve_payment_method']);//결제수단
      $personnel_exp  =  explode("^",$reserveData['guestroom_reserve_user_personnel']);
      $get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
      $get_date_str = get_date_str($get_date_intval);
      $get_option_data = get_option_data($guestroom_reserve_code);
      if($reserveData['guestroom_type'] != '1'){
         $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
         $reserve_use_start = $reserve_use_hour_ex['0'];
         $reserve_use_end = $reserve_use_hour_ex['1'];
         $reserve_str = "<br>(".$reserve_use_start."시부터" . $reserve_use_end ."시까지)";

      }
      

      // print_r($get_option_data);
?>
			<form name="guestroom" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
			  <input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
              <input type="hidden" name="division" id="division" value="<?=$division?>">
              <!-- <input type="hidden" name="guestroom_code" id="guestroom_code" value="<?=$guestroom_code?>"> -->
              <input type="hidden" name="val" id="val" value="<?=$val?>">
              <input type="hidden" name="guestroom_reserve_code" id="guestroom_reserve_code" value="<?=$guestroom_reserve_code?>">
              <input type="hidden" name="guestroom_reserve_payment_method" id="guestroom_reserve_payment_method" value="">
              <input type="hidden" name="guestroom_reserve_status_or" id="guestroom_reserve_status_or" value="<?=$reserveData['guestroom_reserve_status']?>">
              <input type="hidden" name="dataUser" id="dataUser" value="<?=$reserveData['user_id']?>">

              <table class="tbl_row multi_shop">
  							<caption class="hidden">직접등록</caption>
  							<colgroup>
  								<col style="width:15%">
  								<col style="width:85%">
  							</colgroup>
  								<th scope="row">예약번호</th>
  								<td>
  									<?=$guestroom_reserve_code?>
  								</td>
                </tr>
              </table>
              <br>
              <? if($conType == '1'){//모바일접속?>
                <table class='tbl_row multi_shop table2'>
                    <caption class='hidden'>회원 조회 리스트</caption>
                    <thead>
                        <tr>
                            <th scope='col' colspan='2'>상품명</th>
                        </tr>
                        <tr>
                            <td colspan='2'><?=$reserveData['guestroom_name']?></td>
                        </tr>
                        <tr>
                            <th scope='col'>예약일자</th>
                        </tr>
                        <tr>
                            <td style='text-align: center;'>
                              <?
                              if($reserveData['guestroom_type'] == '1'){
                              ?>
                                <?=$reserveData['guestroom_reserve_date']?><br>(<?=$get_date_str?>)
                              <?}
                              else{
                              ?>
                                <?=substr($reserveData['guestroom_reserve_date'],0,10)?><?=$reserve_str?>
                              <?}?>
                            </td>
                        </tr>
                        <tr>
                            <th scope='col'>상품요금</th>
                            <th scope='col'>추가요금</th>
                        </tr>
                        <tr>
                            <td style='text-align: center;'><?=number_format($reserveData['guestroom_fee'])?>원</td>
                            <td style='text-align: center;'><?=number_format($reserveData['discount_fee'])?>원</td>
                        </tr>
                        <tr>
                            <th scope='col'>옵션요금</th>
                            <th scope='col'>합계</th>
                        </tr>
                        <tr>
                            <td style='text-align: center;'><?=number_format($reserveData['option_fee'])?>원</td>
                            <td style='text-align: center;'><?=number_format($reserveData['guestroom_reserve_payment_total'])?>원</td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                              선택옵션 : <br>
                              <?
                              foreach ($get_option_data as $key=>$value) {
                                  if($value['option_code']){
                              ?>

                              옵션명 : <?=$value['option_name']?>
                              금액: <?=$value['option_fee']?>X<?=$reserveData['reserve_interval_day_val']?>일
                              <br>
                              <?}}?>
                            </td>
                        </tr>
                    </thead>
                </table>
                <br>
                <table class='tbl_row multi_shop table3'>
                    <caption class='hidden'>직접등록</caption>
                    <tbody>
                        <tr>
                            <th scope='row'>예약상태</th>
                            <th scope='row'>결제상태</th>
                        </tr>
                        <tr>
                            <td class='select_td'>
                                <select id='guestroom_reserve_status' name='guestroom_reserve_status'>
                                  <option <? if($reserveData['guestroom_reserve_status'] == '2'){?> selected <?}?> value="2">예약신청</option>
                                  <option <? if($reserveData['guestroom_reserve_status'] == '3'){?> selected <?}?> value="3">예약완료</option>
                                  <option <? if($reserveData['guestroom_reserve_status'] == '4'){?> selected <?}?> value="4">취소요청</option>
                                  <option <? if($reserveData['guestroom_reserve_status'] == '5'){?> selected <?}?> value="5">취소완료</option>
                                </select>
                            </td>
                            <td class='select_td'>
                                <select id='guestroom_reserve_payment_status' name='guestroom_reserve_payment_status'>
                                 <option <? if($reserveData['guestroom_reserve_payment_status'] == '1'){?> selected <?}?> value="1">결제대기</option>
                                 <option <? if($reserveData['guestroom_reserve_payment_status'] == '2'){?> selected <?}?> value="2">결제완료</option>
                                 <option <? if($reserveData['guestroom_reserve_payment_status'] == '3'){?> selected <?}?> value="3">결제취소</option>
                                 <option <? if($reserveData['guestroom_reserve_payment_status'] == '4'){?> selected <?}?> value="4">환불요청</option>
                                 <option <? if($reserveData['guestroom_reserve_payment_status'] == '5'){?> selected <?}?> value="5">환불완료</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>예약자</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type='text' name='guestroom_reserve_user_name' id='guestroom_reserve_user_name' class='input' size='30' placeholder='*필수) 예약자' value='<?=$reserveData['guestroom_reserve_user_name']?>' readonly style='border: 0;'>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>연락처(이메일)</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type='text' name='guestroom_reserve_user_phone' id='guestroom_reserve_user_phone' class='input' size='11' placeholder='*필수) 휴대폰번호' value='<?=$reserveData['guestroom_reserve_user_phone']?>' readonly style='border: 0;'>
                                (<?=$reserveData['guestroom_reserve_user_email']?>)
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>면허사항</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <?=$reserveData['reserve_license']?></td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>운전자연령(만 나이)</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <i class='fa fa-calendar'></i>
                              <?=$reserveData['reserve_drive_age']?>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>접수일</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <?=$reserveData['guestroom_reception_date']?></td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>예약일</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <i class='fa fa-calendar'></i>
                              <?=$reserveData['guestroom_reserve_date']?>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>승차인원</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                            성인<?=$personnel_exp['0']?>명
                                어린이<?=$personnel_exp['1']?>명
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>결제일</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <i class='fa fa-calendar'></i>

                                <input class='input' size='20' type='text' name='guestroom_reserve_payment_date' id='guestroom_reserve_payment_date' value='<?=$reserveData['guestroom_reserve_payment_date']?>' readonly>
                                <button type='button' class='btn btn-primary btn-sm btn' id='guestroom_reserve_payment_date_reset_btn'>초기화</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>취소일</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <i class='fa fa-calendar'></i>
                                <input class='input' size='20' type='text' name='guestroom_cancel_date' id='guestroom_cancel_date' value='<?=$reserveData['guestroom_cancel_date']?>' readonly>
                                <button type='button' class='btn btn-primary btn-sm btn' id='guestroom_cancel_date_reset_btn'>초기화</button>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>결제수단</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <?=$get_paymethod_type_str?></td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>결제금액</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type='number' name='guestroom_reserve_payment_total' id='guestroom_reserve_payment_total' class='input' placeholder='*필수) 숫자만 입력하세요' value='<?=$reserveData['guestroom_reserve_payment_total']?>'>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>요청사항</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type='text' name='guestroom_reserve_user_request' id='guestroom_reserve_user_request' class='input' size='40' value='<?=$reserveData['guestroom_reserve_user_request']?>'>
                            </td>
                        </tr>
                        <tr>
                            <th scope='row' colspan='2'>관리자메모</th>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                <input type='text' name='guestroom_reserve_memo' id='guestroom_reserve_memo' class='input' size='40' value='<?=$reserveData['guestroom_reserve_memo']?>'>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?  }
              else{?>
                <table class="tbl_row multi_shop">
                  <caption class="hidden">회원 조회 리스트</caption>
                  <thead>
                    <tr>
                      <th scope="col" width="25%">상품명</th>
                      <th scope="col" width="25%">예약일자</th>
                      <th scope="col" width="10%">상품요금</th>
                      <th scope="col" width="10%">할인요금</th>
                      <th scope="col" width="10%">옵션요금</th>
                      <th scope="col" width="20%">합계</th>
                    </tr>
                    <tr>
                    <td><?=$reserveData['guestroom_name']?></td>
                    <td align="center">
                      <?
                      if($reserveData['guestroom_type'] == '1'){
                      ?>
                        <?=$reserveData['guestroom_reserve_date']?><br>(<?=$get_date_str?>)
                      <?}
                      else{
                      ?>
                        <?=substr($reserveData['guestroom_reserve_date'],0,10)?><?=$reserve_str?>
                      <?}?>
                    </td>
                    <td align="center"><?=number_format($reserveData['guestroom_fee'])?>원</td>
                    <td align="center"><?=number_format($reserveData['discount_fee'])?>원</td>
                    <td align="center"><?=number_format($reserveData['option_fee'])?>원</td>
                    <td align="center"><?=number_format($reserveData['guestroom_reserve_payment_total'])?>원</td>
                    </tr>
                    <tr>
                    <td colspan="7">
                      선택옵션 : <br>
                      <?
                              foreach ($get_option_data as $key=>$value) {
                                  if($value['option_code']){
                              ?>

                              옵션명 : <?=$value['option_name']?>원
                              금액: <?=number_format($value['option_fee'])?>원X<?=$reserveData['reserve_interval_day_val']?>일
                              <br>
                              <?}}?>
                    </td>
                    </tr>
                  </thead>
              </table>
              <br>
  						<table class="tbl_row multi_shop">
  							<caption class="hidden">직접등록</caption>
  							<colgroup>
  								<col style="width:15%">
  								<col style="width:35%">
  								<col style="width:15%">
  								<col style="width:35%">
  							</colgroup>
                <th scope="row">예약상태</th>
                <td>
                  <select id="guestroom_reserve_status" name="guestroom_reserve_status">
                     <option <? if($reserveData['guestroom_reserve_status'] == '2'){?> selected <?}?> value="2">예약신청</option>
                     <option <? if($reserveData['guestroom_reserve_status'] == '3'){?> selected <?}?> value="3">예약완료</option>
                     <option <? if($reserveData['guestroom_reserve_status'] == '4'){?> selected <?}?> value="4">취소요청</option>
                     <option <? if($reserveData['guestroom_reserve_status'] == '5'){?> selected <?}?> value="5">취소완료</option>
                  </select>
                </td>
                <th scope="row">결제상태</th>
                <td>
                  <select id="guestroom_reserve_payment_status" name="guestroom_reserve_payment_status">
                     <option <? if($reserveData['guestroom_reserve_payment_status'] == '1'){?> selected <?}?> value="1">결제대기</option>
                     <option <? if($reserveData['guestroom_reserve_payment_status'] == '2'){?> selected <?}?> value="2">결제완료</option>
                     <option <? if($reserveData['guestroom_reserve_payment_status'] == '3'){?> selected <?}?> value="3">결제취소</option>
                     <option <? if($reserveData['guestroom_reserve_payment_status'] == '4'){?> selected <?}?> value="4">환불요청</option>
                     <option <? if($reserveData['guestroom_reserve_payment_status'] == '5'){?> selected <?}?> value="5">환불완료</option>
                  </select>
                </td>
  							</tr>
  							<tr>
  								<th scope="row">예약자</th>
  								<td>
  									<input type="text" name="guestroom_reserve_user_name" id ="guestroom_reserve_user_name" class="input" size="30" placeholder="*필수) 예약자" value="<?=$reserveData['guestroom_reserve_user_name']?>" readonly style="border:none;border-right:0px; border-top:0px; boder-left:0px; boder-bottom:0px;">
  								</td>
                  <th scope="row">연락처(이메일)</th>
                  <td>
                    <input type="text" name="guestroom_reserve_user_phone" id ="guestroom_reserve_user_phone"   class="input" size="11"  placeholder="*필수) 휴대폰번호"   value="<?=$reserveData['guestroom_reserve_user_phone']?>" readonly style="border:none;border-right:0px; border-top:0px; boder-left:0px; boder-bottom:0px;">
                    (<?=$reserveData['guestroom_reserve_user_email']?>)
                  </td>
  							</tr>
  							<tr>
                                <th scope="row">접수일</th>
  								<td>
   								<?=$reserveData['guestroom_reception_date']?>
  								</td>
                                <th scope="row">예약일</th>
  								<td>
  								<i class="fa fa-calendar"></i>
                                <?=$reserveData['guestroom_reserve_date']?>
   								<!-- <input  class="input" size="30" type="text"  name= "guestroom_reserve_date" id= "guestroom_reserve_date"  value="<?=$startday?> - <?=$endday?>" readonly> -->
                	</td>
  							</tr>
  							<tr>
                              <tr>
                                <th scope="row">면허사항</th>
  								<td>
   								<?=$reserveData['reserve_license']?>
  								</td>
                                <th scope="row">운전자연령</th>
  								<td>
                                만<?=$reserveData['reserve_drive_age']?>세
   								<!-- <input  class="input" size="30" type="text"  name= "guestroom_reserve_date" id= "guestroom_reserve_date"  value="<?=$startday?> - <?=$endday?>" readonly> -->
                	</td>
  							</tr>
                              <tr>
                              <tr>
                                <th scope="row">승차인원</th>
  								<td colspan="3">
   								성인<?=$personnel_exp['0']?>명
                                어린이<?=$personnel_exp['1']?>명
  								</td>
  							</tr>
  							<tr>              
                  <th scope="row">결제일</th>
  								<td>
  								<i class="fa fa-calendar"></i>

   								<input  class="input" size="20" type="text"  name= "guestroom_reserve_payment_date" id= "guestroom_reserve_payment_date"  value="<?=$reserveData['guestroom_reserve_payment_date']?>" readonly>
                  <button type="button" class="btn btn-primary btn-sm" id="guestroom_reserve_payment_date_reset_btn">초기화</button>
  								</td>
                  <th scope="row">취소일</th>
                  <td>
                  <i class="fa fa-calendar"></i>
                  <input  class="input" size="20" type="text"  name= "guestroom_cancel_date" id= "guestroom_cancel_date"  value="<?=$reserveData['guestroom_cancel_date']?>" readonly>
                  <button type="button" class="btn btn-primary btn-sm" id="guestroom_cancel_date_reset_btn">초기화</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">결제수단</th>
  								<td>
  								 <?=$get_paymethod_type_str?>
  								</td>
                  <th scope="row">결제금액</th>
                  <td>
                    <input type="number" name="guestroom_reserve_payment_total" id ="guestroom_reserve_payment_total" class="input" size="30" placeholder="*필수) 숫자만 입력하세요"  value="<?=$reserveData['guestroom_reserve_payment_total']?>">
                  </td>
  							</tr>
  							<tr>
                  <th scope="row">요청사항</th>
                  <td>
                    <input type="text" name="guestroom_reserve_user_request" id ="guestroom_reserve_user_request" class="input" size="40" value="<?=$reserveData['guestroom_reserve_user_request']?>">
                  </td>
  								<th scope="row">관리자메모</th>
  								<td>
  									<input type="text" name="guestroom_reserve_memo" id ="guestroom_reserve_memo" class="input" size="40" value="<?=$reserveData['guestroom_reserve_memo']?>">
  								</td>
  							</tr>
  						</table>
          <?    }//PC끝?>

					</form>
</body>
</html>
<script type="text/javascript">
$(function() {
  $('#guestroom_reserve_payment_date_reset_btn').click(function(){
      $("#guestroom_reserve_payment_date").val('');
    });

  $('#guestroom_cancel_date_reset_btn').click(function(){
      $("#guestroom_cancel_date").val('');
    });

  $('#guestroom_reserve_payment_date').daterangepicker({
    singleDatePicker: true,
     autoApply: true,
    locale: {
        format: 'YYYY/MM/DD',
        daysOfWeek: ['일','월','화','수','목','금','토'],
        monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        applyLabel: '확인 <i class="fa fa-check"></i>',
        cancelLabel: '취소 <i class="fa fa-times"></i>'
    },
  });

  $('#guestroom_reserve_payment_date').on('cancel.daterangepicker', function(ev, picker) {
      $('#guestroom_reserve_payment_date').val('');
  });

  $('#guestroom_cancel_date').daterangepicker({
    singleDatePicker: true,
     autoApply: true,
    // autoUpdateInput: false, //input 공란처리..
    locale: {
        format: 'YYYY/MM/DD',
        daysOfWeek: ['일','월','화','수','목','금','토'],
        monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        applyLabel: '확인 <i class="fa fa-check"></i>',
        cancelLabel: '취소 <i class="fa fa-times"></i>'
    },
  });

  $('#guestroom_cancel_date').on('cancel.daterangepicker', function(ev, picker) {
      $('#guestroom_cancel_date').val('');
  });
  // var guestroom_cancel_date = $('#guestroom_cancel_date').val();
  $("#guestroom_cancel_date").val('');
  $('#guestroom_cancel_date').val('<?=$reserveData['guestroom_cancel_date']?>');
  $("#guestroom_reserve_payment_date").val('');
  $('#guestroom_reserve_payment_date').val('<?=$reserveData['guestroom_reserve_payment_date']?>');
});
</script>
