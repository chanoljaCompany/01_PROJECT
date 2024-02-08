<h4 class="hide">회원가입 영역</h4>
        <div id="register_list">
            <h5>회원가입</h5>
            
            <div id="register_list_wrap">
                <table class="register_table">
                    <tbody>
                        <tr>
                            <th>아이디</th>
                            <td>
                                <input type="text" name="userid" id="userid" placeholder="아이디">
                                <!-- <input type="hidden" name="idcheck_ok" id="idcheck_ok" value="N"> -->
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호</th>
                            <td>
                                <input type="password" name="passwd" id="passwd" placeholder="패스워드">
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호 확인</th>
                            <td>
                                <input type="password" name="passwd_re" id="passwd_re" placeholder="패스워드 확인">
                            </td>
                        </tr>
                        <tr>
                            <th>이름</th>
                            <td>
                                <input type="text" name="com_name" id="com_name" placeholder="이름">
                            </td>
                        </tr>
                        <tr>
                            <th>핸드폰번호</th>
                            <td>
                                <input type="text" name="handphone" id="handphone" placeholder="휴대폰번호">
                            </td>
                        </tr>
                        <!-- <tr>
                            <th>주소</th>
                            <td class="address_td">
                                <?//php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php// }  ?>
                                <label for="reg_mb_zip" class="sound_only">우편번호<?php echo $config['cf_req_addr']?'<strong class="sound_only"> 필수</strong>':''; ?></label>
                                <input type="text" name="mb_zip" value="<?php echo $member['mb_zip1'].$member['mb_zip2']; ?>" id="reg_mb_zip" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input twopart_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="5" maxlength="6"  placeholder="우편번호">
                                <button type="button" class="btn_frmline" onclick="win_zip('fregisterform', 'mb_zip', 'mb_addr1', 'mb_addr2', 'mb_addr3', 'mb_addr_jibeon');">주소 검색</button><br>
                                <input type="text" name="mb_addr1" value="<?php echo get_text($member['mb_addr1']) ?>" id="reg_mb_addr1" <?php echo $config['cf_req_addr']?"required":""; ?> class="frm_input frm_address full_input <?php echo $config['cf_req_addr']?"required":""; ?>" size="50"  placeholder="기본주소">
                                <label for="reg_mb_addr1" class="sound_only">기본주소<?php echo $config['cf_req_addr']?'<strong> 필수</strong>':''; ?></label><br>
                                <input type="text" name="mb_addr2" value="<?php echo get_text($member['mb_addr2']) ?>" id="reg_mb_addr2" class="frm_input frm_address full_input" size="50" placeholder="상세주소">
                                <label for="reg_mb_addr2" class="sound_only">상세주소</label>
                                <br>
                                <input type="text" name="mb_addr3" value="<?php echo get_text($member['mb_addr3']) ?>" id="reg_mb_addr3" class="frm_input frm_address full_input" size="50" readonly="readonly" placeholder="참고항목">
                                <label for="reg_mb_addr3" class="sound_only">참고항목</label>
                                <input type="hidden" name="mb_addr_jibeon" value="<?php echo get_text($member['mb_addr_jibeon']); ?>">
                            </td>
                        </tr> -->
                        <tr>
                            <th>이메일</th>
                            <td>
                                <input type="text" name="email" id="email" placeholder="이메일">
                            </td>
                        </tr>
                        <!-- <tr>
                            <th>비고</th>
                            <td>
                                <textarea name="register_comment" id="register_comment" cols="24" rows="4"></textarea>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
                
                <div class="register_checkbox_wrap checkbox_wrap">
                    <label><input type="checkbox" name="chPrivacy" id="chPrivacy"> 이용약관 및 개인정보취급방침에 동의 합니다.</label>
                </div>
                
                <div class="button_box register_btn_box" style="text-align: center;">
                    <input type="button" name="register_btn" id="register_btn" class="button_box_btn" onclick="memberJoin();" value="회원가입">
                    <input type="button" name="cancel_btn" id="cancel_btn" class="button_box_btn" onclick="purChase('canceljoin');" value="취소">
                </div>
            </div>


        </div>