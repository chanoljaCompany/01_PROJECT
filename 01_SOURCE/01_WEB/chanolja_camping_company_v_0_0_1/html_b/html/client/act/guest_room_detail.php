<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$get_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$dateStr = isset($_REQUEST['dateStr']) ? $_REQUEST['dateStr'] : '';
$divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : ''; //상품구분
// $personnel = isset($_REQUEST['personnel']) ? $_REQUEST['personnel'] : ''; //최대인원
// $option_info_array = get_option($SITENAME);
$html = "";
                $html="     <h4 class='hide'>상품정보</h4>
                            <section class='info_sec'>
                                <div class='info_all info_con0'>
                                    <ul class=''>
                                        <li><i class='fas fa-bolt'></i> 딜리버리 가능</li>
                                        <li><i class='fas fa-dog'></i> 반려동물 동반 가능</li>
                                        <li><i class='fas fa-campground'></i> 기본 캠핑장비 제공</li>
                                        <li><i class='fas fa-parking'></i> 주차가능</li>
                                    </ul>
                                </div>

                                <div class='info_all info_con1'>
                                    <h5>캠핑카 소개</h5>
                                    <p>
                                        안녕하십니까 지에스캠핑카 입니다. 차별화된 서비스로 고객님을 모십니다. 국내유일 전국무료 딜리버리 서비스를 해드리며 화장실 이용후 오물처리는 회사에서 처리하오니 부담없이 사용하시면 됩니다. 또한 기본 캠핑장비(4인용 테이블,의자4개)와 세면도구(치약,칫솔,비누,샴푸,린스)4인기준 제공,수건,헤어드라이기,휴지,물티슈,양념통,조리도구,코펠,버너,화로대 등을 무료로 제공해드리오니 많은 이용바랍니다. 감사합니다. *평일예약은 2박이상만 가능합니다.*
                                    </p>
                                </div>

                                <div class='info_all info_con2'>
                                    <h5>상세 정보</h5>
                                    <ul class=''>
                                        <li><i class='far fa-user'></i> <span>동승가능인원 : 5명</span></li>
                                        <li><i class='far fa-user'></i> <span>취침가능인원 : 5명</span></li>
                                        <li><i class='far fa-clock'></i> <span>대여일 출차시간 09:00</span></li>
                                        <li><i class='far fa-clock'></i> <span>반납일 반납시간 19:00</span></li>
                                        <li><i class='fas fa-money-check'></i> <span>평일 가격 : 200,000원 /박</span></li>
                                        <li><i class='fas fa-money-check'></i> <span>주말 가격 : 300,000원 /박</span></li>
                                        <li><i class='fas fa-check'></i> <span>만 26세 이상</span></li>
                                        <li><i class='far fa-address-card'></i> <span>2종 보통 이상</span></li>
                                        <li><i class='fas fa-car'></i> <span>운전 경력 1년 이상</span></li>
                                        <li><i class='fas fa-map-marker-alt'></i> <span>주소 : </span></li>
                                    </ul>
                                </div>

                                <div class='info_all info_con3'>
                                    <h5>보유시설</h5>
                                    <ul class=''>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-tv'></i>
                                                <p><strong>TV</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='far fa-snowflake'></i>
                                                <p><strong>냉수기</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='far fa-snowflake'></i>
                                                <p><strong>냉장고</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-wind'></i>
                                                <p><strong>무시동 히터</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-faucet'></i>
                                                <p><strong>물탱크</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-bug'></i>
                                                <p><strong>방충망</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-fan'></i>
                                                <p><strong>배기시설</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-volume-up'></i>
                                                <p><strong>블루투스 스피커</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-campground'></i>
                                                <p><strong>사이드어닝</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-bath'></i>
                                                <p><strong>샤워실</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-check'></i>
                                                <p><strong>수면용품</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-star'></i>
                                                <p><strong>스카이창</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-sink'></i>
                                                <p><strong>싱크대</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-lightbulb'></i>
                                                <p><strong>암막커튼</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-wind'></i>
                                                <p><strong>에어컨</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-water'></i>
                                                <p><strong>오수탱크</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-temperature-high'></i>
                                                <p><strong>온수기</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-shower'></i>
                                                <p><strong>외부샤워기</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-burn'></i>
                                                <p><strong>전기레인지</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-bolt'></i>
                                                <p><strong>전기콘센트</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-battery-full'></i>
                                                <p><strong>충전식배터리</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-bed'></i>
                                                <p><strong>침대</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-toilet'></i>
                                                <p><strong>화장실</strong></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='icon'>
                                                <i class='fas fa-camera'></i>
                                                <p><strong>후방 카메라</strong></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class='info_all info_con4'>
                                    <h5 class='hide'>상품 하단 정보</h5>

                                    <table id='sit_inf_open' class=''>
                                        <tr>
                                            <th>국가 또는 지역명</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>숙소형태</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>등급</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>객실타입</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>사용가능인원</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>인원 추가시 비용</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>부대시설</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>제공서비스</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>취소규정</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                        <tr>
                                            <th>예약담당 연락처</th>
                                            <td>상품페이지 참고</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class='info_all bot_map'>
                                    <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481883.4093045765!2d126.50601824094628!3d37.490588374595774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357c98d980dc9e0d%3A0x8e147623fc0b5e2d!2z67CU66W47Ju5!5e0!3m2!1sko!2skr!4v1646714264801!5m2!1sko!2skr' width='100%' height='100%' style='border:0;' allowfullscreen='' loading='lazy'></iframe>
                                </div>


                            </section>";
echo $html;