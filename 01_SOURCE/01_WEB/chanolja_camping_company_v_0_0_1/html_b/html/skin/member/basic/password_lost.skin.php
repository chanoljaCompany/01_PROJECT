<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 회원정보 찾기 시작 { -->
<div id="find_info" class="new_win">
    <h1 id="win_title">회원정보 찾기</h1>
</div>
<div style="width:100%; height:100vh; position: relative;">
        <div class="new_win_con"
            style="position: absolute; top: calc(50% - 82px); left: 50%; transform: translate(-50%,-50%); border: 1px solid #ddd; padding:30px;">
            <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off"
                style="display:flex; flex-direction:column; align-items:center;">
            <fieldset id="info_fs" style="margin-bottom: 30px;">
                <div style="display:flex; flex-direction:column;" >
                    <p style="margin-bottom:20px">
                        회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br>
                        해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
                    </p>
                    <label for="mb_email" class="sound_only">E-mail 주소<strong class="sound_only">필수</strong></label>
                    <input type="text" name="mb_email" id="mb_email" required class="required frm_input full_input email" size="30" placeholder="E-mail 주소"
                        style="background: transparent !important; border: #54C3F1 2px solid; border-radius: 15px; padding: 5px 10px;">
                </div>
            </fieldset>
            <?php echo captcha_html();  ?>

            <div class="win_btn" style="display:flex; justify-content: space-between; width:274px;">
                <button style="width:115px; border-radius:15px;" type="submit" class="btn_submit">확인</button>
                <button style="width:115px; height:40px; border-radius: 20px;" type="button" onclick="window.close();" class="btn_close">창닫기</button>
            </div>
            </form>
        </div>
    <div>

<script>

<script>
function fpasswordlost_submit(f)
{
    <?php echo chk_captcha_js();  ?>

    return true;
}

$(function() {
    var sw = screen.width;
    var sh = screen.height;
    var cw = document.body.clientWidth;
    var ch = document.body.clientHeight;
    var top  = sh / 2 - ch / 2 - 100;
    var left = sw / 2 - cw / 2;
    moveTo(left, top);
});
</script>
<!-- } 회원정보 찾기 끝 -->