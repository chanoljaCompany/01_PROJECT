<?
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";

  $manager = isset( $_REQUEST['manager'] ) ?  $_REQUEST['manager']  : '일반회원';
//   if($manager == 'M') $managerStr = "상담사회원";
  $managerStr = get_member_type($manager);
  $rows = null;
  $page_type = "";

?>
          <form name="regForm" id="regForm" class="form-signin" enctype='multipart/form-data' method="post" onsubmit="return false;">
            <input type="hidden" name="division" id="division" value="member_input">
            <input type="hidden" name="manager" id="manager" value="<?=$manager?>">
            <table class="tbl_row multi_shop">
							<colgroup>
								<col style="width:30%">
								<col style="width:70%">
							</colgroup>
              <tr>
								<th scope="row">회원분류</th>
								<td>
                  <?=$managerStr?>
								</td>
							</tr>
						<tr>
								<th scope="row">아이디</th>
								<td>
                    <input type="text" name="userid" id ="userid"  class="input" placeholder="아이디"  value="<?=$rows['userid']?>">
                    <button class="btn btn-primary  btn-sm" onclick="idcheck()">중복확인</button>
                    <input type="hidden" id="idcheck_ok" name = "idcheck_ok" value="N">
								</td>
              </tr>
              <tr>
								<th scope="row">패스워드</th>
								<td>
									<input type="password" name="passwd" id ="passwd"  class="input" placeholder="패스워드">
								</td>
							</tr>
              <tr>
								<th scope="row">패스워드 확인</th>
								<td>
									<input type="password" name="passwd_re" id ="passwd_re"  class="input" placeholder="패스워드 확인">
								</td>
							</tr>
                            <tr>
				<th scope="row">휴대폰번호</th>
				 <td>
                  <input type="text" name="handphone" id ="handphone"  class="input" placeholder="휴대폰번호"  value="<?=$rows['handphone']?>">
                  <!-- <button class="btn btn-primary  btn-sm" onclick="handphonecheck()">중복확인</button>
                  <input type="hidden" id="handphone_ok" name = "handphone_ok" value="N"> -->
								</td>
              </tr>                            
              <tr>
				<th scope="row">회사명</th>
				 <td>
                  <input type="text" name="com_name" id ="com_name"  class="input" placeholder="회사명"  value="<?=$rows['com_name']?>">
				</td>
              </tr>
              <tr>
                                        <th scope="row">주소</td>
				<td>
					  <table class="table table-bordered table-hover table-striped">
                        <tr><td>
                        <input class="form-control-sm ml-3 w-75"  type="text" name="zip_code" id="zip_code" readonly>
                        <button type="button" id="Alliancesearch_submit" class="btn btn-info"  onclick="find_address()">우편번호 찾기</button>
                        </td></tr>
                        <tr><td><input class="form-control"  type="text" name="address" id="address"></td></tr>
                        <tr><td><input class="form-control"  type="text" name="address_detail" id="address_detail"></td></tr>
					  </table>
				</td>
               </tr>
              


						</table>
					</form>
</body>
</html>
