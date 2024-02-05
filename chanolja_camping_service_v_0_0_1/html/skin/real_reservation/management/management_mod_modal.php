<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

  $member_seq = isset($_REQUEST["seq"]) ? $_REQUEST["seq"] : '';
  $member_userid = isset($_REQUEST["userid"]) ? $_REQUEST["userid"] : '';
  $manager = $_REQUEST['manager'];
  $rows = null;
  $page_type = "";
  
  if($member_seq && $member_userid){
    $sql = "SELECT *
           FROM $SALES_MEMBERS_TB AS A
           WHERE 1=1
           AND A.seq = '$member_seq'
           AND A.user_id = '$member_userid'";

    $result = sql_query($sql);
    $rows = mysqli_fetch_array($result);
    $page_type = "modify";
    $settlement_account_exp = explode("^",$rows['settlement_account']);
  }
?>
          <form name="regFormMod" id="regFormMod" class="form-signin" enctype='multipart/form-data' method="post" onsubmit="return false;">
          <input type="hidden" name="division" id="division" value="member_mod">
            <input type="hidden" name="manager" id="manager" value="<?=$manager?>">
            <input type="hidden" name="member_seq" id="member_seq" value="<?=$member_seq?>">
            <input type="hidden" name="member_userid" id="member_userid" value="<?=$member_userid?>">

            <table class="tbl_row multi_shop">
							<colgroup>
								<col style="width:30%">
								<col style="width:70%">
							</colgroup>
              <tr>
								<th scope="row">상태변경</th>
								<td>
                  탈퇴일 : <input type="text" name="withdraw_date" id ="withdraw_date" class="input">
                  <input type="checkbox" name="withdraw" id="withdraw" value="Y"> 탈퇴
                  <!-- <select name="approve" id="approve">
                    <option value="Y">테스트1(tester)</option>
                    <option value="somang73">바른웹1(somang73)</option>
                    <option value="wanfeng" selected="">WANFENG Group(wanfeng)</option>
                  </select>
									<input type="password" name="passwd" id ="passwd"  class="input" placeholder="변경시에만 입력"> -->
								</td>
							</tr>
							<tr>
								<th scope="row">아이디</th>
								<td>
                  <? if($page_type) { ?>
									  <?=$rows['user_id']?>
                  <? }else{ ?>
                    <input type="text" name="userid" id ="userid"  class="input" placeholder="아이디"  value="<?=$rows['userid']?>">
                    <button class="btn btn-primary  btn-sm" onclick="idcheck()">중복확인</button>
                    <input type="hidden" id="idcheck_ok" name = "idcheck_ok" value="N">
                  <? } ?>
								</td>
              </tr>
              <tr>
								<th scope="row">패스워드</th>
								<td>
									<input type="password" name="passwd" id ="passwd"  class="input" placeholder="변경시에만 입력">
								</td>
							</tr>
              <tr>
								<th scope="row">패스워드 확인</th>
								<td>
									<input type="password" name="passwd_re" id ="passwd_re"  class="input" placeholder="변경시에만 입력">
								</td>
							</tr>
              <tr>
								<th scope="row">휴대폰번호</th>
								<td>
									<input type="text" name="handphone" id ="handphone"  class="input" placeholder="휴대폰번호"  value="<?=$rows['handphone']?>">
								</td>
              </tr>
              <tr>
								<th scope="row">회사명</th>
								<td>
									<input type="text" name="com_name" id ="com_name"  class="input" placeholder="회사명"  value="<?=$rows['com_name']?>">
								</td>
              </tr>
              <? if($manager == 'M'){?>
              <tr>
                   <th scope="row">주소</td>
				<td>
					  <table class="table table-bordered table-hover table-striped">
                        <tr><td>
                        <input class="form-control-sm ml-3 w-75"  type="text" name="zip_code" id="zip_code" readonly value="<?=$rows['zip1']?>">
                        <button type="button" id="Alliancesearch_submit" class="btn btn-info"  onclick="find_address()">우편번호 찾기</button>
                        </td></tr>
                        <tr><td><input class="form-control"  type="text" name="address" id="address" value="<?=$rows['address']?>"></td></tr>
                        <tr><td><input class="form-control"  type="text" name="address_detail" id="address_detail" value="<?=$rows['address_no']?>"></td></tr>
					  </table>
				</td>
               </tr>
               <?}?>
              <tr>
								<th scope="row">회원가입일</th>
								<td>
									<?=$rows['signdate']?>
								</td>
              </tr>
              <tr>
								<th scope="row">최근접속일</th>
								<td>
									<?=$rows['lastlogin']?>
								</td>
              </tr>
						</table>
					</form>
</body>
</html>
