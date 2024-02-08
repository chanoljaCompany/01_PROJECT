<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

$guestroom_reserve_code = trim(isset($_REQUEST['reserve_code'])) ? $_REQUEST['reserve_code'] : '';//상품예약번호
// $guestroom_reserve_code = "1646891569";
$reserveData = get_reserve_data($guestroom_reserve_code);
// print_r($reserveData);
$get_paymethod_type_str = get_paymethod_type($reserveData['guestroom_reserve_payment_method']);//결제수단
$personnel_exp  =  explode("^",$reserveData['guestroom_reserve_user_personnel']);
$get_date_intval = get_date_intval($reserveData['guestroom_reserve_date']);
$get_date_str = get_date_str($get_date_intval);
$get_option_data = get_option_data($guestroom_reserve_code);

if($reserveData['guestroom_type'] != '1'){
   $reserve_use_hour_ex = explode("~",$reserveData['reserve_use_hour']);
   $reserve_use_start = $reserve_use_hour_ex['0'];
   $reserve_use_end = $reserve_use_hour_ex['1'];
   $reserve_str = " (".$reserve_use_start."시부터 " . $reserve_use_end ."시까지)";

}
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, maximum-scale=1.0, minimum-scale=1, user-scalable=yes, initial-scale=1.0" />
    <title>모바일 페이지 수정 페이지</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="real_reservation_modify.css">
</head>

<body>
    <style>

    </style>

    <section id="wrapper">
        <article id="contentArea">

            <div class="modal fade in" id="reserveModifyModal" tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="LogDataDetailModalTitle">예약관리</h5>
                            <!--<button type="button" class="close b-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>-->
                        </div>
                        <div class="modal-body" id="reserveModifyModalBody">
                            <form name="guestroom" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="guestroom_reserve_code" id="guestroom_reserve_code" value="<?=$guestroom_reserve_code?>">
                                <input type="hidden" name="guestroom_reserve_status_or" id="guestroom_reserve_status_or" value="<?=$reserveData['guestroom_reserve_status']?>">
                                <table class="tbl_row multi_shop table1">
                                    <caption class="hidden">직접등록</caption>
                                    <colgroup>
                                        <col style="width:15%">
                                        <col style="width:85%">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <th scope="row">예약번호</th>
                                            <td><?=$guestroom_reserve_code?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                                <table class="tbl_row multi_shop table2">
                                    <caption class="hidden">회원 조회 리스트</caption>
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">상품명</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><?=$reserveData['guestroom_name']?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">예약일자</th>
                                            <th scope="col">인원</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;">
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
                                            <td style="text-align: center;">성인<?=$personnel_exp['0']?>,아동<?=$personnel_exp['1']?>,유아<?=$personnel_exp['2']?></td>
                                        </tr>
                                        <tr>
                                            <th scope="col">객실요금</th>
                                            <th scope="col">추가요금</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?=number_format($reserveData['guestroom_fee'])?>원</td>
                                            <td style="text-align: center;"><?=number_format($reserveData['guestroom_add_fee'])?>원</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">옵션요금</th>
                                            <th scope="col">합계</th>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center;"><?=number_format($reserveData['option_fee'])?>원</td>
                                            <td style="text-align: center;"><?=number_format($reserveData['guestroom_reserve_payment_total'])?>원</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                              선택옵션 : <br>
                                              <?
                                              foreach ($get_option_data as $key=>$value) {
                                              ?>
                                              옵션명 : <?=$value['option_name']?>
                                              수량: <?=$value['option_amount']?>
                                              <br>
                                              <?}?>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                                <br>
                                <table class="tbl_row multi_shop table3">
                                    <caption class="hidden">직접등록</caption>
                                    <!--<colgroup>
                                        <col style="width:15%">
                                        <col style="width:35%">
                                        <col style="width:15%">
                                        <col style="width:35%">
                                    </colgroup>-->
                                    <tbody>
                                        <tr>
                                            <th scope="row">예약상태</th>
                                            <th scope="row">결제상태</th>
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
                                            <th scope="row" colspan="2">예약자</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                              <input type='text' name='guestroom_reserve_user_name' id='guestroom_reserve_user_name' class='input' size='30' placeholder='*필수) 예약자' value='<?=$reserveData['guestroom_reserve_user_name']?>' readonly style='border: 0;'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">연락처(이메일)</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                              <input type='text' name='guestroom_reserve_user_phone' id='guestroom_reserve_user_phone' class='input' size='11' placeholder='*필수) 휴대폰번호' value='<?=$reserveData['guestroom_reserve_user_phone']?>' readonly style='border: 0;'>
                                              (<?=$reserveData['guestroom_reserve_user_email']?>)
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">접수일</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?=$reserveData['guestroom_reception_date']?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">예약일</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <i class="fa fa-calendar"></i>
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
                                            <th scope="row" colspan="2">결제일</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <i class="fa fa-calendar"></i>
                                                <input class='input' size='20' type='text' name='guestroom_reserve_payment_date' id='guestroom_reserve_payment_date' value='<?=$reserveData['guestroom_reserve_payment_date']?>' readonly>
                                                <button type='button' class='btn btn-primary btn-sm btn' id='guestroom_reserve_payment_date_reset_btn'>초기화</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">취소일</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <i class="fa fa-calendar"></i>
                                                <input class='input' size='20' type='text' name='guestroom_cancel_date' id='guestroom_cancel_date' value='<?=$reserveData['guestroom_cancel_date']?>' readonly>
                                                <button type='button' class='btn btn-primary btn-sm btn' id='guestroom_cancel_date_reset_btn'>초기화</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">결제수단</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <?=$get_paymethod_type_str?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">결제금액</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type='number' name='guestroom_reserve_payment_total' id='guestroom_reserve_payment_total' class='input' placeholder='*필수) 숫자만 입력하세요' value='<?=$reserveData['guestroom_reserve_payment_total']?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">요청사항</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type='text' name='guestroom_reserve_user_request' id='guestroom_reserve_user_request' class='input' size='40' value='<?=$reserveData['guestroom_reserve_user_request']?>'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="2">관리자메모</th>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type='text' name='guestroom_reserve_memo' id='guestroom_reserve_memo' class='input' size='40' value='<?=$reserveData['guestroom_reserve_memo']?>'>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>

                        </div>

                        <div class="modal-footer bot_btn_box">
                            <button type="button" class="btn btn-primary" id="reservation_modify">수정</button>
                            <!-- <button type="button" class="btn btn-success" id="reservation_modify_confirm">예약확정</button>
                            <button type="button" class="btn btn-info" id="reservation_modify_wait">예약대기</button>
                            <button type="button" class="btn btn-warning" id="reservation_modify_cancel">예약취소</button> -->
                            <button type="button" id="close_btn" class="btn btn-secondary b-close" data-dismiss="modal">닫기</button>
                            <!-- <button type="button" class="btn btn-primary">수정</button> -->
                        </div>
                    </div>
                </div>
            </div>



        </article>
    </section>
</body>
<script type="text/javascript">
$('#reservation_modify').click(function(){
    // alert('reservation_modify click');
    reservation_modify_check('alim_reserve');
  });

  $('#close_btn').click(function(){
      // alert('reservation_modify click');
      window.close();
    });

  function reservation_modify_check(division) {
    var guestroom_reserve_code = $('#guestroom_reserve_code').val();//상품코드
    var guestroom_reserve_status = $("#guestroom_reserve_status option:selected").val(); //예약상태
    var guestroom_reserve_status_or = $("#guestroom_reserve_status_or").val(); //예약상태
    var guestroom_reserve_payment_status = $("#guestroom_reserve_payment_status option:selected").val(); //결제상태
    // var guestroom_reserve_user_name = $('#guestroom_reserve_user_name').val();//예약자명
    // var guestroom_reserve_user_phone = $('#guestroom_reserve_user_phone').val(); //예약자연락처
    var guestroom_reserve_payment_date = $('#guestroom_reserve_payment_date').val();//결제일
    var guestroom_cancel_date = $('#guestroom_cancel_date').val();//취소일
    var guestroom_reserve_payment_total = $('#guestroom_reserve_payment_total').val();
    var guestroom_reserve_user_request = $('#guestroom_reserve_user_request').val();
    var guestroom_reserve_memo = $('#guestroom_reserve_memo').val();

    if(guestroom_reserve_payment_status == '3'){ //결제완료일때
      if(guestroom_reserve_payment_date == '') { warning('결제일을 입력하세요','guestroom_reserve_payment_date');	return false; }
   }
    if(division == 'alim_reserve'){
      var result = confirm("수정 하시겠습니까?");
           if(result ){ //확인 클릭 시
             $.ajax({
               type: 'POST',
               url:"./reserve/reserve_write_action.php",
               data: {
                      division : division,
                      // guestroom_code : guestroom_code,
                      guestroom_reserve_code : guestroom_reserve_code,
                      guestroom_reserve_status : guestroom_reserve_status,
                      guestroom_reserve_status_or : guestroom_reserve_status_or,
                      guestroom_reserve_payment_status : guestroom_reserve_payment_status,
                      guestroom_reserve_payment_date : guestroom_reserve_payment_date,
                      guestroom_cancel_date : guestroom_cancel_date,
                      guestroom_reserve_payment_total : guestroom_reserve_payment_total,
                      guestroom_reserve_user_request : guestroom_reserve_user_request,
                      guestroom_reserve_memo : guestroom_reserve_memo
                    },
               cache:false,
                  success:function(result){
                     if(result == 'ok'){
                        alert('처리하였습니다.');
                        location.reload();
                    }else if(result == 'overlap'){
                        alert('이미 예약된 정보가 있습니다.');
                      }else{
                        alert('처리에러.');
                      }
              }});
           }
    }
  }
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
