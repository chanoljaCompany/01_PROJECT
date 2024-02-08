<div class="copyurl_btn" onclick="javascript:copyUrl()">URL 복사</div>
<section class='sit_sel_option'>
                        <!--<h4 class='hide'>선택된 옵션</h4>-->

                        <div class='sel_option_wrap' id="sel_option_wrap">

                            <div class='price_wrap'>
                                <span class='price_' id="room_fee_r"></span>
                                <span class='price_won'>원</span>
                                <span class='price_night' id="reserve_interval_day">/1박 ~</span>
                            </div>

                            <br>
                            

                            <div class='' id="opt_pay">

                                <div class='list_form' id="list_form">
                                    <div class='list_select'>
                                        <p>보험 및 추가상품 선택</p><span class='sch_down'><i class='fas fa-angle-down'></i></span>
                                        <!-- \template1\sub\sub_page_script.php에 위치-->
                                        <!-- 옵션은 gestroom_option에 상품별로 기재, 관리자에서 수작업으로 변경-->
                                    </div>
                                    <div class='list_box'>
                                        <h4>보험 및 옵션선택</h4>
                                        <div class='price_checkbox' id="price_checkbox">
                                          
                                        </div>
                                        <div class='check_btn'><a href='javascript:void(0);' onclick="selecthide('list_form');">선택완료</a></div>
                                    </div>
                                </div>

                                <!-- <div class='calendar_wrap'>
                                    <div class='calendar' style=''>
                                        <p style=''>달력 영역</p>
                                    </div>
                                    <div class='reset_btn_wrap'>
                                        <a href='#' class='reset_btn'>
                                            날짜선택 초기화
                                        </a>
                                    </div>
                                </div> -->

                            </div>

                            <div class='pricing'>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><font size="4.5px"><strong>[선택세부사항]</strong></font></td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>예약기간</td>
                                            <!-- \sub\sub_page_script.php 에서 function rightData() 참조-->
                                            <td id="reserve_term"></td>
                                        </tr>
                                        <tr>
                                            <td>가격</td>
                                            <td><span class='' id="room_fee_t">380,000</span><span class=''>원</span></td>
                                        </tr>
                                        <tr id="room_fee_discount_tr">
                                            <td>할인금액</td>
                                            <td><span class='' id="room_fee_discount">380,000</span><span class=''>원</span></td>
                                        </tr>                                        
                                        <tbody id="opt_list">
                                        <!-- <tr>
                                            <td>자차등록비24시간</td>
                                            <td><span class=''>20,000</span><span class=''>원</span></td>
                                        </tr>
                                       
                                         <tr>
                                            <td>침구류4인기준</td>
                                            <td><span class=''>20,000</span><span class=''>원</span></td>
                                        </tr> -->
                                        </tbody>
                                        
                                        <tr>
                                            <td><font size="4.5px"><strong>[예약진행 최종금액]</strong></font></td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><strong>총계</strong></td>
                                            <td><strong><span class='' id="total_hap">420,000</span><span class=''>원</span></strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>결제금액</strong></td>
                                            <td><strong><span class='' id="total_fee">420,000</span><span class=''>원</span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class='reserve_btn_wrap'>
                                <a href='javascript:void(0);' class='reserve_btn' id="reserve_btn">
                                    <span>바로 예약하기</span>
                                    <!-- \template1\sub\sec4.php 로 연결 -->
                                </a>
                            </div>

                        </div>

                    </section>