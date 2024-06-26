<?
header("Content-Type:text/html; charset=utf-8;"); 
?>
<script src="https://pay.nicepay.co.kr/v1/js/"></script>

<h4 class="hide">예약정보입력과 결제버튼</h4>
        <div id="room_reserve_pay">
            <h4><font size=4>예약정보 입력 및 결제하기</font></h4>

            <!-- pc table 시작 -->

<!--  <div class="reser_pay_table_wrap_pc">

            <table class="reser_pay_table_1">
             <thead>
                 <tr>
                     <th>상품명</th>
                     <th>이용일자</th>
                     <th>상품요금</th>
                     <th>할인요금</th>
                     <th>옵션요금</th>
                     <th>합계</th>
                 </tr>
             </thead>
             <tbody id="reser_pay_table_wrap_pc">

             </tbody>
         </table>

            </div>
            <!-- pc table 끝 -->

            <!-- mobile table 시작 -->
            <div class="reser_pay_table_wrap_mo">
            <table class="reser_pay_table_1">
                <tbody id="reser_pay_table_wrap_mo">
                </tbody>
            </table>
            </div>
            <!-- mobile table 끝 -->

            <!--<table class="reser_pay_table2">
                <tbody>
                    <tr>
                        <th>결제금액</th>
                        <td id="pay_total"></td>
                                               
						<input type='hidden' name='total_fee' id = 'c_pay_total' value=""> </td>
                    </tr>
                </tbody>
            </table> -->

            <table class="reser_pay_table3">
            <tbody>
                <tr>
                    <th>예약자</th>
                    <td>
                        <input type="text" name="reserve_name" id="reserve_name" value="<?=$_SESSION['session_company_name'] ?? ""?>">
                    </td>
                </tr>
                <tr>
                    <th>면허사항</th>
                    <td>
                        <!-- <input type="radio" name="reserve_license" value="1종보통">1종보통
                        <input type="radio" name="reserve_license" value="2종보통">2종보통 -->
                        <select name="reserve_license" id="reserve_license" style="">
                            <option value="1종보통">1종보통</option>
                            <option value="2종보통">2종보통</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>운전자연령(만 나이)</th>
                    <td>
                        <input type="number" name="reserve_drive_age" id="reserve_drive_age" placeholder="숫자로만 입력하세요">
                    </td>
                </tr>
                <tr>
                    <th>연락처</th>
                    <td>
                        <input type="text" name="reserve_phone" id="reserve_phone" value="<?=$_SESSION['session_handphone'] ?? ""?>">
                    </td>
                </tr>
                <tr>
                    <th>승차인원</th>
                    <td class="personnel_td" style="">
                    성인&ensp;
                    <button type="button" onclick="fnCalCount('m', 'adultPerson');" style="">-</button>
                    <input type="text" id="adultPerson" name="adultPerson" value="0" readonly="readonly" style="">
                    <button type="button" onclick="fnCalCount('p','adultPerson');" style="">+</button>
                    <br class="mo_br">
                    &emsp;어린이&ensp;
                    <button type="button" onclick="fnCalCount('m', 'childPerson');" style="">-</button>
                    <input type="text"  id="childPerson" name="childPerson" value="0" readonly="readonly" style="">
                    <button type="button" onclick="fnCalCount('p','childPerson');" style="">+</button>
                    </td>
                </tr>
                <tr>
                    <th>요청사항</th>
                    <td>
                        <textarea name="reserve_request" id="reserve_request" cols="24" rows="10"></textarea>
                    </td>
                </tr>
            </tbody>
        </table><br>

        <table class="reser_pay_table4">
         <tbody>
             <tr>
                 <th>결제방법</th>
                 <td>
                     <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="1" checked onclick="paymthodChang('bank')"> 무통장입금</label>
                     <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="2" onclick="paymthodChang('card')"> 신용카드</label>

                 </td>
             </tr>
             <tr id="account_info_tr">
                 <th>입금계좌</th>
                 <td>
                     <input type="text" name="account_info" id="account_info" value="<?=$get_management_value['0']['account_name']?>:<?=$get_management_value['0']['account_number']?>:<?=$get_management_value['0']['account_holder']?>" class="">
                 </td>
             </tr>
             <tr id="depositor_tr">
                 <th>입금자명</th>
                 <td>
                     <input type="text" name="depositor" id="depositor">
                 </td>
             </tr>
         </tbody>
     </table>

     <div id="accordion" class="reser_pay_div5" style="clear: both;">
         <h3>기본예약안내</h3>
         <div>
             <p>
                 <textarea>
     - 출차 및 반납시간은 예약하신 날짜 및 시간 내에 지점 운영시간에서만 가능합니다.

     - 예약은 완납기준이며, 예약취소 시 환불규정과같이 취소수수료가 발생합니다.

     - 교통사고 똫는 고장, 자연재해 등 불가피한 사정으로 차량 운형 불가 시, 예약금은 전액 환불 됩니다.

     - 이용당일 면허증 미 제출시 예약취소 될 수 있으며, 취소사유는 고객님께 귀속됩니다.

     - 이용후 남은 기간 및 시간에 대해서는 환불 되지 않습니다

     - 반납 지연 2시간 초과 시 다음 예약자의 이용요금 전액을 부담하셔야 하오니 참고 바랍니다.

     - 실내 절대 금연이며, 흡연 및 위험물 반입 시 벌금 30만원이 발생합니다.

</textarea>
             </p>
         </div>
         <h3>출차 및 반납 안내</h3>
         <div>
             <p>
                 <textarea>
     - 출차는 고객님께서 예약하신 시간내에서 자유롭게 가능하오나, 가급적 예약하신 출차 시간을 준수하여 주십시오

     - 반납시간은 고객님게서 예약하신 시간내에서 지점 운영시간내에 반납 가능합니다.
	   예) 12월 12일 23시까지 이용예약하였으나, 지점이 20시까지 운영할 경우 20시까지 반납 하셔야 합니다. 남은 3시간은 환불되지 않습니다.

     - 반납시에는 오물통과 오수를 비우고 집기능을 깨끗히 청소 해주소야 합니다.
       ※ 침구류, 시트 등이 과도하게 오염되었을 경우 청소 비용 청구
       ※ 오물 및 오수 대리처리비용 : 15만원

     - 캠핑카 대여시 계약하신 운전자외 타인 운전시 보험적용이 불가하며,  사고시 모든 책임은 고객님께 귀속됩니다

     - 반납시에는 다른 고객님이 쾌적환 환경에서 이용 가능하도록 깨끗이 정리 부탁 드립니다.
                 </textarea>
             </p>
         </div>
         <h3>환불규정</h3>
         <div>
             <p>
                 <textarea>
                   - 예약 후 취소 100%

                   - 10~8일전 취소 90%

                   - 7~6일전 취소 70%

                   - 5일전 취소 50%

                   - 3일전~당일 취소 0%

                   - 당일 취소 당일 취소불가.
                 </textarea>
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
         <label><input type="checkbox" id="agreement" value="Y"> 상기의 내용을 숙지하고 규정에 동의 합니다.</label>
     </div>
     <div class="button_box">
         <input type="button" name="room_reseve_pay_btn_pre" id="room_reseve_pay_btn_pre" class="room_reseve_pay_btn" value="취소"  onclick="move_page('third')">
         <input type="button" name="room_reseve_pay_btn" id="room_reseve_pay_btn" value="결제하기" onclick="reserve_fourth();">
     </div>
   </div>