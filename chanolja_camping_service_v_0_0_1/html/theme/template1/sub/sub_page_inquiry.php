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
                               <input type="text" name="resevervation_inquiry_name" id="resevervation_inquiry_name" placeholder="실명을 입력해주세요.">
                           </td>
                       </tr>
                       <tr>
                           <th>핸드폰번호</th>
                           <td>
                               <input type="text" name="resevervation_inquiry_phone" id="resevervation_inquiry_phone" placeholder="핸드폰 번호를 입력해주세요.">
                           </td>
                       </tr>
                   </tbody>
               </table>
           </div>
           <div class="button_box" style="text-align: center;">
               <input type="button" name="room_resevervation_inquiry_btn" id="room_resevervation_inquiry_btn" onclick="reserve_confirm_act()" value="예약 확인">
           </div>
        </div>