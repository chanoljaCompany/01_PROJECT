<h4 class="hide">section 2</h4>
<div id="room_reseve_select" style="">
    <h5>옵션 및 인원선택</h5>

    <table class="table_1">
        <!-- <tr>
        <td>상품수 (최대 : 3)</td>
        <td><input type='text' name='gu' id = 'reserve_name'></td>
     </tr> -->
        <tbody>
            <tr>
                <th>성인 (만 18세 이상)</th>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'adultPerson');">-</button>
                    <input type="text" id="adultPerson" name="adultPerson" value="0" readonly="readonly" style="text-align:center;">
                    <button type="button" onclick="fnCalCount('p','adultPerson');">+</button>
                </td>
            </tr>
            <tr>
                <th>아동</th>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'childPerson');">-</button>
                    <input type="text"  id="childPerson" name="childPerson" value="0" readonly="readonly" style="text-align:center;">
                    <button type="button" onclick="fnCalCount('p','childPerson');">+</button>
                </td>
            </tr>
            <tr>
                <th>유아 (12개월~48개월미만)</th>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'babyPerson');">-</button>
                    <input type="text" id="babyPerson" name="babyPerson" value="0" readonly="readonly" style="text-align:center;">
                    <button type="button" onclick="fnCalCount('p','babyPerson');">+</button>
                </td>
            </tr>
        </tbody>
    </table>

    <table class="table_2" id="optionTb">
        <thead>
            <tr>
                <th>옵션명</th>
                <th>옵션가격</th>
                <th>수량</th>
                <!-- <th>금액</th> -->
            </tr>
        </thead>
        <tbody id="room_reseve_option_area">
            <tr>
                <td>조식</td>
                <td>120,000 원</td>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'optid_1');">-</button>
                    <input type="text" name="optname_1" id="optid_1" value="1" readonly="readonly" style="text-align:center;">
                    <!--<input type="hidden" name="opthname_1" id="optid_1" value="1369039644" readonly="readonly" style="text-align:center;">-->
                    <button type="button" onclick="fnCalCount('p','optid_1');">+</button>
                </td>
                <td>120,000 원</td>
            </tr>
            <tr>
                <td>숯+그릴</td>
                <td>25,000 원</td>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'optid_2');">-</button>
                    <input type="text" name="optname_2" id="optid_2" value="1" readonly="readonly" style="text-align:center;">
                    <!--<input type="hidden" name="opthname_2" id="optid_2" value="7942192946" readonly="readonly" style="text-align:center;">-->
                    <button type="button" onclick="fnCalCount('p','optid_2');">+</button>
                </td>
                <td>25,000 원</td>
            </tr>
            <tr>
                <td>테스트</td>
                <td>3,000 원</td>
                <td>
                    <button type="button" onclick="fnCalCount('m', 'optid_2');">-</button>
                    <input type="text" name="optname_2" id="optid_2" value="1" readonly="readonly" style="text-align:center;">
                    <!--<input type="hidden" name="opthname_2" id="optid_2" value="7942192946" readonly="readonly" style="text-align:center;">-->
                    <button type="button" onclick="fnCalCount('p','optid_2');">+</button>
                </td>
                <td>3,000 원</td>
            </tr>
        </tbody>
    </table>

    <table class="table_3">
        <tbody>
            <tr>
                <th>상품요금합계</th>
                <td><input type="text" value="0" name="room_fee" id="room_fee"> 원</td>
            </tr>
            <tr>
                <th>추가요금합계</th>
                <td><input type="text" value="0" name="add_fee" id="add_fee"> 원</td>
            </tr>
            <tr>
                <th>옵션요금합계</th>
                <td><input type="text" value="0" name="option_fee" id="option_fee"> 원</td>
            </tr>
            <tr>
                <th>총요금합계</th>
                <td><input type="text" value="0" name="total_fee" id="total_fee"> 원</td>
            </tr>
        </tbody>
    </table>
    <div class="button_box">
        <input type="button" name="room_reseve_pay_btn_pre" id="room_reseve_pay_btn_pre" class="room_reseve_pay_btn" value="이전단계" onclick="move_page('first')">
        <input type="button" name="room_reseve_pay_btn" id="room_reseve_pay_btn" class="room_reseve_pay_btn" value="다음단계" onclick="reserve_guide();">
    </div>
</div>
