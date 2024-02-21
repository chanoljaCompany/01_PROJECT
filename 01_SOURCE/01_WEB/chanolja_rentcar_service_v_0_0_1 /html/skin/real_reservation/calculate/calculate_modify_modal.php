<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";
$guestroom_calculate_code = trim(isset($_REQUEST['guestroom_calculate_code'])) ? $_REQUEST['guestroom_calculate_code'] : '';//상품예약번호
$search_date = explode("^",$guestroom_calculate_code)[0];
$search_userid = explode("^",$guestroom_calculate_code)[1];
$msql = "SELECT * FROM $SALES_MEMBERS_TB WHERE 1=1 AND user_id='".$search_userid."'";
$mrows = sql_fetch($msql);
$sql = "SELECT *
        FROM calculate
        WHERE 1=1
        AND user_id = '".$search_userid."'
        AND calculate_month	= '".$search_date."'";
$rows = sql_fetch($sql);
$sub_sql = "SELECT SUM(guestroom_reserve_payment_total) AS ptotal FROM $GUESTROOM_RESERVATION_TB
        WHERE 1=1
        AND user_id = '".$search_userid."'
        AND guestroom_reserve_payment_date like '$search_date%'
        ";
$sub_rows = sql_fetch($sub_sql);
echo "
sql > $sql <br>
sub_sql > $sub_sql <br>
";
print_r($rows);
$calculate_money = $rows['calculate_money'] ? $rows['calculate_money'] : $sub_rows['ptotal'];

?>
			<form name="guestroom" method="post" enctype="multipart/form-data">
			        <input type="hidden" name="search_userid" id="search_userid" value="<?=$search_userid?>">
			        <input type="hidden" name="search_date" id="left_menu_id" value="<?=$search_date?>">
              <input type="hidden" name="division" id="division" value="calculate_mod">
              <table class="tbl_row multi_shop">
  							<caption class="hidden">직접등록</caption>
  							<colgroup>
  								<col style="width:15%">
  								<col style="width:85%">
  							</colgroup>
                <tr>
  								<th scope="row">업체명</th>
  								<td>
  									 <?=$mrows['com_name']?>
  								</td>
                </tr>
                <tr>
  								<th scope="row">금액</th>
  								<td>
  									<?=number_format($sub_rows['ptotal'])?>원
  								</td>
                </tr>
              </table>
              <br>
				<table class="tbl_row multi_shop">
					<caption class="hidden">직접등록</caption>
					<colgroup>
						<col style="width:15%">
						<col style="width:85%">
					</colgroup>
                <th scope="row">상태</th>
                <td>
                  <select id="status" name="status">
                     <option <? if($rows['status'] == '정산대기'){?> selected <?}?> value="정산대기">정산대기</option>
                     <option <? if($rows['status'] == '정산완료'){?> selected <?}?> value="정산완료">정산완료</option>
                     <option <? if($rows['status'] == '정산취소'){?> selected <?}?> value="정산취소">정산취소</option>
                  </select>
                </td>
  							</tr>
  							<tr>
                  <th scope="row">정산일</th>
  								<td>
  								<i class="fa fa-calendar"></i>
   								<input  class="input" size="20" type="text"  name= "calculate_month" id= "calculate_month"  value="<?=$rows['calculate_month']?>" readonly>
                  <button type="button" class="btn btn-primary btn-sm" id="calculate_month_reset_btn">초기화</button>
  								</td>
                </tr>
                <tr>
                  <th scope="row">정산금액</th>
  								<td>
   								<input  class="input" size="20" type="number"  name= "calculate_money" id= "calculate_money"  value="<?=$calculate_money?>">
  								</td>
                </tr>
  							<tr>
  								<th scope="row">메모</th>
  								<td>
                    <textarea name="memo" id="memo" style="width: 100%; height: 100px;"><?=$rows['memo']?></textarea>
  								</td>
  							</tr>
  						</table>

					</form>
</body>
</html>
<script type="text/javascript">
$(function() {
  $('#calculate_month_reset_btn').click(function(){
      $("#calculate_month").val('');
    });

  $('#guestroom_cancel_date_reset_btn').click(function(){
      $("#guestroom_cancel_date").val('');
    });

  $('#calculate_month').daterangepicker({
    singleDatePicker: true,
     autoApply: true,
    locale: {
        format: 'YYYY-MM-DD',
        daysOfWeek: ['일','월','화','수','목','금','토'],
        monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
        applyLabel: '확인 <i class="fa fa-check"></i>',
        cancelLabel: '취소 <i class="fa fa-times"></i>'
    },
  });

  $('#calculate_month').on('cancel.daterangepicker', function(ev, picker) {
      $('#calculate_month').val('');
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
  $("#calculate_month").val('');
  $('#calculate_month').val('<?=$search_date?>');
});
</script>
