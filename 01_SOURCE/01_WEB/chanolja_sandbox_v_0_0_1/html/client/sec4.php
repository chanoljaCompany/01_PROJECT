<h4 class="hide">예약정보입력과 결제버튼</h4>
        <div id="room_reserve_pay" style="">
            <h5>구매상품정보</h5>

            <!-- pc table 시작 -->
            <div class="reser_pay_table_wrap_pc">

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
                     <!-- <label class="p_cursor"><input type="radio" name="guestroom_paymthod" value="2" onclick="paymthodChang('card')"> 신용카드</label> -->
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
         <h3>기본예약안내1</h3>
         <div>
             <p>
                 <textarea>
                -보호자 동반없는 미성년자는 예약 및 입실 불가합니다.

                -예약시 신청하신 인원이외에 추가인원은 입실이 거부될 수 있습니다.

                -예약인원 초과로 인한 입실 거부시 환불도 되지 않으니 유의하시기 바랍니다.

                -예약후 펜션이나 객실 변경은 해당예약 취소후 다시 예약하셔야 합니다.

                -예약변경을 위한 취소시에도 취소수수료가 부과되오니 신중하게 예약하시기 바랍니다.

                -최대인원이 2인인 커플전용룸의 경우 유아나 아동은 동반입실이 불가능합니다.

                -애완견 동반시 입실이 불가능 합니다.

                퇴실 시에는 내집같이 정돈을 부탁 드립니다.</textarea>
             </p>
         </div>
         <h3>입/퇴실 안내</h3>
         <div>
             <p>
                 <textarea>
                   - 숙박상품(카라반, 글램핑,펜션)  입실14시/퇴실11시입니다.

                   - 숙박상품(데크) 입실 14시/퇴실12시입니다

                   - 당일상품(피크닉평상, 팔각정) 당일 11시부터 18시까지입니다

                   - 당일상품(파티룸) 당일 11시부터 20시까지입니다
                 </textarea>
             </p>
         </div>
         <h3>환불규정</h3>
         <div>
             <p>
                 <textarea>
                   - 예약 후 취소 90%

                   - 7일전 취소 70%

                   - 6일전 취소 60%

                   - 5일전 취소 50%

                   - 4일전 취소 40%

                   - 3일전 취소 30%

                   - 2일전 취소 10%

                   - 당일 취소 당일 취소불가.

                   - *예약신청시 중복으로 예약으로 잡히는 경우가 있습니다.
                     시스템상 예약신청만으로는 확정이 아니기 때문에,중복예약으로 되는경우가 있습니다.
                     선착순 입금순으로 확정되며, 예약취소될때는 연락드리며 전액 환불됩니다.
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