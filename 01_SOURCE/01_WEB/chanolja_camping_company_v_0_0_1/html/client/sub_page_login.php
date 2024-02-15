        <h4 class="hide">로그인 영역</h4>
        <div id="login_box">
            <h5>로그인</h5>

            <div class="login_box_wrap">
               <h6>로그인</h6>
                <table class="table_login">
                    <tbody>
                        <tr>
                            <th>아이디</th>
                            <td>
                            <input type="text" name="form_userid" id="form_userid" placeholder="아이디를 입력해주세요.">
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호</th>
                            <td>
                            <input type="password" name="form_passwd" id="form_passwd" placeholder="비밀번호를 입력해주세요.">
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="button_box login_btn_box" style="text-align: center;">
                    <input type="button" name="login_btn" id="login_btn" class="button_box_btn" onclick="login('client')" value="로그인">
                    <input type="button" name="oder_non_mb_btn" id="oder_non_mb_btn" class="button_box_btn" onclick="purChase('nonmember');" value="비회원주문">
                    <input type="button" name="register_btn" id="loginbox_register_btn" class="button_box_btn" onclick="purChase('memberjoin');" value="회원가입">
                </div>
                
                <!--<div class="login_info_sch">
                    <a href="#" id="login_info_sch_btn">정보찾기</a>
                </div>-->
            </div>

        </div>