<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.G5_THEME_URL.'/css/sub.css">', 0);
?>
<div class="sub" id="member_skin">
    <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
    <div class="inner">
        <div class="top_box">
            <h1 class="mem_tit">
                회원가입
            </h1>
            <ul class="top_member">
                <li class="on">
                    <strong>01</strong>
                    <p>약관동의</p>
                </li>
                <li class="on">
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <strong>02</strong>
                    <p>정보입력</p>
                </li>
                <li>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <strong>03</strong>
                    <p>가입완료</p>
                </li>
            </ul>
        </div>
        <div class="member_order">
            <h1 class="sub_tit">
                약관동의
            </h1>
            <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">
                <?php
                // 소셜로그인 사용시 소셜로그인 버튼
                @include_once(get_social_skin_path().'/social_register.skin.php');
                ?>
                <div id="fregister_chkall" class="chk_all fregister_agree">
                    <input type="checkbox" name="chk_all" id="chk_all" class="selec_chk">
                    <label for="chk_all"><span></span>회원가입 약관에 모두 동의합니다</label>
                </div>
                <section id="fregister_term">
                    <div class="titleBox">
                        <p>
                            <span>(필수)</span>
                            <span>회원가입약관</span>
                        </p>
                        <a href="<?php echo G5_URL ?>/bbs/content.php?co_id=provision">
                            <span>전체보기</span>
                            <span><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>    
                    <textarea readonly><?php echo get_text($config['cf_stipulation']) ?></textarea>
                    <fieldset class="fregister_agree">
                        <input type="checkbox" name="agree" value="1" id="agree11" class="selec_chk">
                        <label for="agree11"><span></span><b class="sound_only">
                        </b></label>
                    </fieldset>
                </section>
                
                <section id="fregister_private">
                    <div class="titleBox">
                        <p>
                            <span>(필수)</span>
                            <span>개인정보 수집 및 이용</span>
                        </p>
                        <a href="<?php echo G5_URL ?>/bbs/content.php?co_id=privacy">
                            <span>전체보기</span>
                            <span><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>   
                    <div>
                        <textarea readonly><?php echo get_text($config['cf_privacy']) ?></textarea>
                    </div>
                    <div>
                        <table>
                            <caption>개인정보처리방침안내</caption>
                            <thead>
                            <tr>
                                <th>목적</th>
                                <th>항목</th>
                                <th>보유기간</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>이용자 식별 및 본인여부 확인</td>
                                <td>아이디, 이름, 비밀번호</td>
                                <td>회원 탈퇴 시까지</td>
                            </tr>
                            <tr>
                                <td>고객서비스 이용에 관한 통지,<br>CS대응을 위한 이용자 식별</td>
                                <td>연락처 (이메일, 휴대전화번호)</td>
                                <td>회원 탈퇴 시까지</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <fieldset class="fregister_agree">
                        <input type="checkbox" name="agree2" value="1" id="agree21" class="selec_chk">
                        <label for="agree21"><span></span><b class="sound_only">개인정보처리방침안내의 내용에 동의합니다.</b></label>
                    </fieldset>
                </section>
                <div class="btn_confirm">
                    <a href="<?php echo G5_URL ?>" class="btn_close">취소</a>
                    <button type="submit" class="btn_submit">회원가입</button>
                </div>
            </form>
        </div>
    </div>  
</div>

        <script>
            function fregister_submit(f)
            {
                if (!f.agree.checked) {
                    alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
                    f.agree.focus();
                    return false;
                }

                if (!f.agree2.checked) {
                    alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
                    f.agree2.focus();
                    return false;
                }

                return true;
            }

            jQuery(function($){
                // 모두선택
                $("input[name=chk_all]").click(function() {
                    if ($(this).prop('checked')) {
                        $("input[name^=agree]").prop('checked', true);
                    } else {
                        $("input[name^=agree]").prop("checked", false);
                    }
                });
            });

        </script>
<!-- 회원가입약관 동의 시작 { -->

<!-- } 회원가입 약관 동의 끝 -->
