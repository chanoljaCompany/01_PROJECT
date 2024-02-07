<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

      $guestroom_calculate_code = trim(isset($_REQUEST['guestroom_calculate_code'])) ? $_REQUEST['guestroom_calculate_code'] : '';//상품예약번호
      $search_date = explode("^",$guestroom_calculate_code)[0];
      $search_userid = explode("^",$guestroom_calculate_code)[1];


       $sql = "SELECT A.*,
       (SELECT com_name FROM $SALES_MEMBERS_TB WHERE 1=1 AND user_id = A.user_id) AS com_name
       FROM $GUESTROOM_RESERVATION_TB AS A
       WHERE 1=1
       AND user_id = '".$search_userid."'
       AND guestroom_reserve_payment_date like '2023-06%'
       ORDER BY seq DESC
      ";
      $result = sql_query($sql);
      $count = sql_num_rows($result);
    //   echo "
    //   guestroom_calculate_code > $guestroom_calculate_code <br>
    //   search_date > $search_date <br>
    //   search_userid > $search_userid <br>
    //   sql > $sql <br>
    //   ";
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
              <table class="tbl_col">
								<caption class="hidden">회원 조회 리스트</caption>
								<thead>
									<tr>
										<th scope="col" width="5%">NO</th>
										<th scope="col" width="5%">상태</th>
                                        <th scope="col" width="15%">업체명</th>
										<th scope="col" width="15%">결제일자</th>
										<th scope="col">상품명</th>
										<th scope="col" width="15%">결제금액</th>
									</tr>
								</thead>
								<tbody>
                                    <? while($rows = sql_fetch_array($result)){
                                        $guestroom_reserve_status_str = get_reserve_status($rows['guestroom_reserve_status']);
                                        ?>
                                <tr>
										<th scope="col" width="5%"><?=$count?></th>
                                        <th scope="col" width="10%"><?=$guestroom_reserve_status_str?></th>
										<th scope="col" width="5%"><?=$rows['com_name']?></th>
										<th scope="col" width="5%"><?=$rows['guestroom_reserve_payment_date']?></th>
										<th scope="col"><?=$rows['guestroom_name']?></th>
										<th scope="col" width="5%"><?=number_format($rows['guestroom_reserve_payment_total'])?></th>
									</tr>
                                    <?$count--;}?>
								</tbody>
							</table>
                <br>

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
