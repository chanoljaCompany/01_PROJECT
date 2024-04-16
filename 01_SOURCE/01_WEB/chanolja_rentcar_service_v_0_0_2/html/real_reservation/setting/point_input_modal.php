<?
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";
include $admin_root."/config/session.php";

  $payment_seq = isset($_REQUEST["seq"]) ? $_REQUEST["seq"] : '';
  $payment_userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : '';
  $manager = $_REQUEST['manager'];
  $rows = null;
  $page_type = "";

  if($payment_seq && $payment_userid){
    $sql = "SELECT *
            FROM $PAYMENT_LOGS_TB
    				WHERE 1=1 AND seq = '$payment_seq' AND userid = '$payment_userid'";
    $result = sql_query($sql);
    $rows = mysqli_fetch_array($result);
    $page_type = "modify";
    // echo " $sql";
  }
?>
          <form name="regForm" id="regForm" class="form-signin" enctype='multipart/form-data' method="post" onsubmit="return false;">
            <input type="hidden" name="division" id="division" value="<?=$division?>">
            <input type="hidden" name="manager" id="manager" value="<?=$manager?>">
            <input type="hidden" name="top_menu_id" id="top_menu_id" value="<?=$top_menu_id?>">
            <input type="hidden" name="left_menu_id" id="left_menu_id" value="<?=$left_menu_id?>">
            <input type="hidden" name="payment_seq" id="payment_seq" value="<?=$payment_seq?>">
            <input type="hidden" name="payment_userid" id="payment_userid" value="<?=$payment_userid?>">

            <table class="tbl_row multi_shop">
							<colgroup>
								<col style="width:30%">
								<col style="width:70%">
							</colgroup>
              <tr>
								<th scope="row">고객아이디</th>
								<td>
                  <?=$rows['userid']?>
								</td>
							</tr>
              <tr>
                <th scope="row">결제상태</th>
								<td>
                  <select name="pay_status" id="pay_status">
                    <option <? if($rows['pay_status'] == '결제대기'){?> selected <?}?> value="결제대기">결제대기</option>
                    <option <? if($rows['pay_status'] == '결제완료'){?> selected <?}?> value="결제완료">결제완료</option>
                    <!-- <option <? if($rows['pay_status'] == '환불요청'){?> selected <?}?> value="환불요청">환불요청</option>
                    <option <? if($rows['pay_status'] == '환불완료'){?> selected <?}?> value="환불완료">환불완료</option> -->
                    <option <? if($rows['pay_status'] == '결제취소'){?> selected <?}?> value="결제취소">결제취소</option>
                  </select>
								</td>
              </tr>
              <tr>
								<th scope="row">결제일</th>
								<td>
                  <?=$rows['userid']?>
								</td>
							</tr>
              <tr>
                <th scope="row">결제금액</th>
								<td>
									<input type="text" name="pay_money" id="pay_money" value="<?=$rows['pay_money']?>">
								</td>
              </tr>
              <tr>
                <th scope="row">결제포인트</th>
								<td>
                  <input type="text" name="pay_point" id="pay_point" value="<?=$rows['pay_point']?>">
								</td>
              </tr>
              <tr>
                <th scope="row">상담시간</th>
								<td>
                  <input type="text" name="pay_time" id="pay_time" value="<?=$rows['pay_time']?>">
								</td>
              </tr>
              <tr>
                <th scope="row">무통장입금정보</th>
								<td>
									<?=$rows['pay_bank']?>
								</td>
              </tr>
						</table>
					</form>
</body>
</html>
<script>
$(document).ready(function(){
    $("#withdraw").change(function(){
        if($("#withdraw").is(":checked")){
           $("#withdraw_date").val("<?=$TODAY?>");
        }
        else{
          $("#withdraw_date").val("");
        }
    });
});
</script>
