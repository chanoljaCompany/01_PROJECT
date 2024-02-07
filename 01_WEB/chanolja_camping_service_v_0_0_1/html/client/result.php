<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">
<link rel="stylesheet" type="text/css" href="/theme/template1/sub/result.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ko.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
    

<div class="main_wrap">

    <section id="customer_info" class="">
        <h4 class="hide">예약정보입력과 결제버튼</h4>
        <div id="room_reserve_pay" style="">
            <h5>고객정보</h5>

            <!-- pc table 시작 -->
            <div class="reser_pay_table_wrap_pc">

                <table class="reser_pay_table_1">
                    <thead>
                        <!--<tr>
                            <th colspan="7">객실정보</th>
                        </tr>-->
                        <tr>
                            <th>객실명</th>
                            <th>이용일자</th>
                            <th>기간</th>
                            <th>인원</th>
                            <th>객실요금</th>
                            <th>추가요금</th>
                            <th>합계</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>수입4인카라반-9416914189</td>
                            <td>03/03(목) ~ 03/04(금)</td>
                            <td>1박 2일</td>
                            <td>성인(1)</td>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                            <td>298,000 원</td>
                        </tr>
                        <tr>
                            <td colspan="4">합계</td>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                            <td>298,000 원</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- pc table 끝 -->

            <!-- mobile table 시작 -->
            <div class="reser_pay_table_wrap_mo">

                <table class="reser_pay_table_1">

                    <tbody>
                        <!--<tr>
                            <th colspan="2">객실정보</th>
                        </tr>-->
                        <tr>
                            <th colspan="2">객실명</th>
                        </tr>
                        <tr>
                            <td colspan="2">수입4인카라반-9416914189</td>
                        </tr>
                        <tr>
                            <th colspan="2">이용일자</th>
                        </tr>
                        <tr>
                            <td colspan="2">03/03(목) ~ 03/04(금)</td>
                        </tr>
                        <tr>
                            <th>기간</th>
                            <th>인원</th>
                        </tr>
                        <tr>
                            <td>1박 2일</td>
                            <td>성인(1)</td>
                        </tr>
                        <tr>
                            <th>객실요금</th>
                            <th>추가요금</th>

                        </tr>
                        <tr>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                        </tr>
                        <tr>
                            <th colspan="2">합계</th>
                        </tr>
                        <tr>
                            <td colspan="2">298,000 원</td>
                        </tr>
                        <!--<tr>
                            <td colspan="1">합계</td>
                        </tr>
                        <tr>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                            <td>298,000 원</td>
                        </tr>-->
                    </tbody>

                </table>

            </div>
            <!-- mobile table 끝 -->

            <table class="reser_pay_table2">
                <tbody>
                    <tr>
                        <th>결제금액</th>
                        <td id="pay_total"> 298,000 원</td>
                    </tr>
                </tbody>
            </table>

            <table class="reser_pay_table3">
                <tbody>
                    <tr>
                        <th>예약자명</th>
                        <td>
                            <input type="text" name="reserve_name" id="reserve_name">
                        </td>
                    </tr>
                    <tr>
                        <th>핸드폰번호</th>
                        <td>
                            <input type="text" name="reserve_phone" id="reserve_phone">
                        </td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td>
                            <input type="text" name="reserve_email" id="reserve_email">
                        </td>
                    </tr>
                    <tr>
                        <th>요청사항</th>
                        <td>
                            <textarea name="reserve_comment" id="reserve_comment" cols="24" rows="10"></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="reser_pay_table4">
                <tbody>
                    <tr>
                        <th>결제방법</th>
                        <td>
                            <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="1" checked=""> 무통장입금</label>
                            <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="2"> 신용카드</label>
                        </td>
                    </tr>
                    <tr>
                        <th>입금계좌</th>
                        <td>
                            <input type="text" name="account_info" id="account_info" value="신한은행:1000212735190:홍길동" class="">
                        </td>
                    </tr>
                    <tr>
                        <th>입금자명</th>
                        <td>
                            <input type="text" name="depositor" id="depositor" value=홍길동 class="">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div id="accordion" class="reser_pay_div5" style="clear: both;">
                <h3>기본예약안내</h3>
                <div>
                    <p>
                        <textarea>기본예약안내</textarea>
                    </p>
                </div>
                <h3>입/퇴실 안내</h3>
                <div>
                    <p>
                        <textarea>입/퇴실 안내</textarea>
                    </p>
                </div>
                <h3>환불규정</h3>
                <div>
                    <p>
                        <textarea>환불규정</textarea>
                    </p>
                </div>
                <h3>개인정보 활용 동의개인정보 활용 동의</h3>
                <div>
                    <p>
                        <textarea>귀하의 소중한 개인정보는 개인정보보호법의 관련 규정에 의하여 예약 및 조회 등 아래의 목적으로 수집 및 이용됩니다.&#10; 1. 개인정보의 수집·이용 목적 - 프로그램/숙박/대관 예약, 조회를 위한 본인 확인 절차&#10; 2. 개인정보 수집 항목 - 예약자명, 핸드폰, 생년월일, 이메일&#10; 3. 개인정보의 보유 및 이용기간 - 이용자의 개인정보는 원칙적으로 개인정보의 처리목적이 달성되면 지체 없이 파기합니다.&#10; 예약을 위하여 수집된 개인정보는 ‘전자상거래 등에서의 소비자보호에 관한 법률’ 제6조에의거 정해진 기간동안 보유됩니다.&#10; ※ 상기 내용은 고객님께 예약서비스를 제공하는데 필요한 최소한의 정보입니다.&#10; ※ 상기 내용에 대하여 본인이 동의하지 않을 수 있으나, 그러할 경우 예약 서비스 제공에 차질이 발생할 수 있습니다.</textarea>
                    </p>
                </div>
            </div>
            <div class="checkbox_wrap">
                <label><input type="checkbox"> 상기의 내용을 숙지하고 규정에 동의 합니다.</label>
            </div>

            <div class="button_box">
                <input type="button" name="room_reserve_pay_btn_pre" id="room_reserve_pay_btn_pre" class="room_reserve_pay_btn" value="이전단계" onclick="">
                <input type="button" name="room_reserve_pay_btn" id="room_reserve_pay_btn" value="결제하기" onclick="reserve_fourth();">
            </div>
        </div>
    </section>

    <section id="reservation_completion" class="">
        <h4 class="hide">예약 완료</h4>
        <div id="room_reserve_end" style="">
            <!--여기는 결제완료후 보여지는 예약완료 화면입니다.<br>-->
            <h5>예약 완료</h5>

            <div class="top_notice">
                <h6>예약신청이 완료되었습니다.</h6>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 2022년 03월 02일 17시까지 입금을 완료하지 않을경우 자동취소 됩니다.</p>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 인터넷 예약 특성상 입금시간이 지체되면 예약이 중복될수 있어 빠른입금 부탁드립니다.</p>
                <p><i class="fa fa-exclamation-circle" aria-hidden="true"></i> 입금완료 후 미리 준비할 수 있도록 이용전 통화하시는것이 좋습니다.</p>
            </div>

            <!-- pc table 시작 -->
            <div class="table_wrap_pc">

                <table class="table_1">
                    <thead>
                        <tr>
                            <th colspan="7">객실정보</th>
                        </tr>
                        <tr>
                            <th>객실명</th>
                            <th>이용일자</th>
                            <th>기간</th>
                            <th>인원</th>
                            <th>객실요금</th>
                            <th>추가요금</th>
                            <th>합계</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>수입4인카라반-9416914189</td>
                            <td>03/03(목) ~ 03/04(금)</td>
                            <td>1박 2일</td>
                            <td>성인(1)</td>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                            <td>298,000 원</td>
                        </tr>
                        <tr>
                            <td colspan="4">합계</td>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                            <td>298,000 원</td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- pc table 끝 -->

            <!-- mobile table 시작 -->
            <div class="table_wrap_mo">

                <table class="table_1">

                    <tbody>
                        <tr>
                            <th colspan="2">객실정보</th>
                        </tr>
                        <tr>
                            <th colspan="2">객실명</th>
                        </tr>
                        <tr>
                            <td colspan="2">수입4인카라반-9416914189</td>
                        </tr>
                        <tr>
                            <th colspan="2">이용일자</th>
                        </tr>
                        <tr>
                            <td colspan="2">03/03(목) ~ 03/04(금)</td>
                        </tr>
                        <tr>
                            <th>기간</th>
                            <th>인원</th>
                        </tr>
                        <tr>
                            <td>1박 2일</td>
                            <td>성인(1)</td>
                        </tr>
                        <tr>
                            <th>객실요금</th>
                            <th>추가요금</th>

                        </tr>
                        <tr>
                            <td>150,000 원</td>
                            <td>148,000 원</td>
                        </tr>
                        <tr>
                            <th colspan="2">합계</th>
                        </tr>
                        <tr>
                            <td colspan="2">298,000 원</td>
                        </tr>
                    </tbody>

                </table>

            </div>
            <!-- mobile table 끝 -->

            <table class="table_2">

                <thead>
                    <tr>
                        <th>예약자 정보</th>
                        <td>테스트</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>결제방법</th>
                        <td>무통장</td>
                    </tr>
                    <tr>
                        <th>입금정보</th>
                        <td>입금자명 : 테스트, 입금계좌 : 신한은행 211-10003-121340 차놀자캠핑</td>
                    </tr>
                    <tr>
                        <th>예약상태</th>
                        <td>대기</td>
                    </tr>
                    <tr>
                        <th>예약번호</th>
                        <td>1220302112514762</td>
                    </tr>
                    <tr>
                        <th>예약일시</th>
                        <td>2022-03-02 11:55:30</td>
                    </tr>
                    <tr>
                        <th>예약자명</th>
                        <td>테스트</td>
                    </tr>
                    <tr>
                        <th>생년월일</th>
                        <td>1978. 03. 02.</td>
                    </tr>
                    <tr>
                        <th>핸드폰</th>
                        <td>010-9876-5432</td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td>test@test.co.kr</td>
                    </tr>
                    <tr>
                        <th>요청사항</th>
                        <td>
                            테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="button_box" style="text-align: center;">
                <input type="button" name="room_reserve_end_btn" id="room_reserve_end_btn" value="확인" onclick="reserve_fourth();">
            </div>
        </div>
    </section>

    <section id="reservation_inquiry" class="">
        <h4 class="hide">예약 확인</h4>
        <div id="room_reservation_inquiry" style="">
            <!--여기는 예약확인 화면1입니다.<br>-->
            <h5>예약 확인</h5>

            <div class="top_inquiry_wrap">
                <table class="table_inquiry">
                    <tbody>
                        <tr>
                            <th>예약자명</th>
                            <td>
                                <input type="text" name="reservation_inquiry_name" id="reservation_inquiry_name" placeholder="실명을 입력해주세요.">
                            </td>
                        </tr>
                        <tr>
                            <th>핸드폰번호</th>
                            <td>
                                <input type="text" name="reservation_inquiry_phone" id="reservation_inquiry_phone" placeholder="핸드폰 번호를 입력해주세요.">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="button_box" style="text-align: center;">
                <input type="button" name="room_reservevation_inquiry_btn" id="room_reservervation_inquiry_btn" value="예약 확인">
            </div>

        </div>
    </section>

    <section id="reservation_inquiry_list" class="">
        <h4 class="hide">예약 확인 리스트</h4>
        <div id="room_reservation_inquiry_list" style="">
            <div class="inquiry_list_wrap">

                <!-- pc table 시작 -->
                <div class="table_wrap_pc">

                    <table class="table_inquiry_1">
                        <thead>
                            <tr>
                                <th colspan="7">객실정보</th>
                            </tr>
                            <tr>
                                <th>객실명</th>
                                <th>이용일자</th>
                                <th>기간</th>
                                <th>인원</th>
                                <th>객실요금</th>
                                <th>추가요금</th>
                                <th>합계</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>수입4인카라반-9416914189</td>
                                <td>03/03(목) ~ 03/04(금)</td>
                                <td>1박 2일</td>
                                <td>성인(1)</td>
                                <td>150,000 원</td>
                                <td>148,000 원</td>
                                <td>298,000 원</td>
                            </tr>
                            <tr>
                                <td colspan="4">합계</td>
                                <td>150,000 원</td>
                                <td>148,000 원</td>
                                <td>298,000 원</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <!-- pc table 끝 -->

                <!-- mobile table 시작 -->
                <div class="table_wrap_mo">

                    <table class="table_inquiry_1">

                        <tbody>
                            <tr>
                                <th colspan="2">객실정보</th>
                            </tr>
                            <tr>
                                <th colspan="2">객실명</th>
                            </tr>
                            <tr>
                                <td colspan="2">수입4인카라반-9416914189</td>
                            </tr>
                            <tr>
                                <th colspan="2">이용일자</th>
                            </tr>
                            <tr>
                                <td colspan="2">03/03(목) ~ 03/04(금)</td>
                            </tr>
                            <tr>
                                <th>기간</th>
                                <th>인원</th>
                            </tr>
                            <tr>
                                <td>1박 2일</td>
                                <td>성인(1)</td>
                            </tr>
                            <tr>
                                <th>객실요금</th>
                                <th>추가요금</th>

                            </tr>
                            <tr>
                                <td>150,000 원</td>
                                <td>148,000 원</td>
                            </tr>
                            <tr>
                                <th colspan="2">합계</th>
                            </tr>
                            <tr>
                                <td colspan="2">298,000 원</td>
                            </tr>
                        </tbody>

                    </table>

                </div>
                <!-- mobile table 끝 -->

                <table class="table_inquiry_2">

                    <thead>
                        <tr>
                            <th>예약자 정보</th>
                            <td>테스트</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>결제방법</th>
                            <td>무통장</td>
                        </tr>
                        <tr>
                            <th>입금정보</th>
                            <td>입금자명 : 테스트, 입금계좌 : 신한은행 211-10003-121340 차놀자캠핑</td>
                        </tr>
                        <tr>
                            <th>예약상태</th>
                            <td>대기</td>
                        </tr>
                        <tr>
                            <th>예약번호</th>
                            <td>1220302112514762</td>
                        </tr>
                        <tr>
                            <th>예약일시</th>
                            <td>2022-03-02 11:55:30</td>
                        </tr>
                        <tr>
                            <th>예약자명</th>
                            <td>테스트</td>
                        </tr>
                        <tr>
                            <th>생년월일</th>
                            <td>1978. 03. 02.</td>
                        </tr>
                        <tr>
                            <th>핸드폰</th>
                            <td>010-9876-5432</td>
                        </tr>
                        <tr>
                            <th>이메일</th>
                            <td>test@test.co.kr</td>
                        </tr>
                        <tr>
                            <th>요청사항</th>
                            <td>
                                테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항 테스트 요청사항
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div>
    </section>
    
    <section id="login_form">
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
                                <input type="text" name="login_box_id" id="login_box_id">
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호</th>
                            <td>
                                <input type="text" name="login_box_pw" id="login_box_pw">
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="button_box login_btn_box" style="text-align: center;">
                    <input type="button" name="login_btn" id="login_btn" class="button_box_btn" value="로그인">
                    <input type="button" name="oder_non_mb_btn" id="oder_non_mb_btn" class="button_box_btn" value="비회원주문">
                    <input type="button" name="register_btn" id="loginbox_register_btn" class="button_box_btn" value="회원가입">
                </div>
                
                <!--<div class="login_info_sch">
                    <a href="#" id="login_info_sch_btn">정보찾기</a>
                </div>-->
            </div>

        </div>
        
    </section>
    
    
    <section id="register_form">
        <h4 class="hide">회원가입 영역</h4>
        <div id="register_list">
            <h5>회원가입</h5>
            
            <div id="register_list_wrap">
                <table class="register_table">
                    <tbody>
                        <tr>
                            <th>아이디</th>
                            <td>
                                <input type="text" name="register_id" id="register_id">
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호</th>
                            <td>
                                <input type="password" name="register_password" id="register_password">
                            </td>
                        </tr>
                        <tr>
                            <th>비밀번호 확인</th>
                            <td>
                                <input type="password" name="register_password_re" id="register_password_re">
                            </td>
                        </tr>
                        <tr>
                            <th>이름</th>
                            <td>
                                <input type="text" name="register_name" id="register_name">
                            </td>
                        </tr>
                        <tr>
                            <th>핸드폰번호</th>
                            <td>
                                <input type="text" name="register_phone" id="register_phone">
                            </td>
                        </tr>
                        <tr>
                            <th>주소</th>
                            <td class="address_td">
                                <!--<label>주소</label>-->
                                <?php if ($config['cf_req_addr']) { ?><strong class="sound_only">필수</strong><?php }  ?>
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
                        </tr>
                        <tr>
                            <th>이메일</th>
                            <td>
                                <input type="text" name="register_email" id="register_email">
                            </td>
                        </tr>
                        <tr>
                            <th>비고</th>
                            <td>
                                <textarea name="register_comment" id="register_comment" cols="24" rows="4"></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <div class="register_checkbox_wrap checkbox_wrap">
                    <label><input type="checkbox"> 이용약관 및 개인정보취급방침에 동의 합니다.</label>
                </div>
                
                <div class="button_box register_btn_box" style="text-align: center;">
                    <input type="button" name="register_btn" id="register_btn" class="button_box_btn" value="회원가입">
                    <input type="button" name="cancel_btn" id="cancel_btn" class="button_box_btn" value="취소">
                </div>
            </div>


        </div>
    </section>
    
    
    
    <!-- 아코디언 -->
    <script>
      $( function() {
        $( "#accordion" ).accordion({
            collapsible: true,
            active: false,
        });
      } );
    </script>
    
</div>


