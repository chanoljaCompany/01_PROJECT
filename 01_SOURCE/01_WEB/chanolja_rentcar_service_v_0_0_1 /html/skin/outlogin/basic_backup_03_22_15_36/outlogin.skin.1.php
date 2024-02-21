<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<!-- 로그인 전 아웃로그인 시작 { -->
<section id="ol_before" class="ol">
    <div class="close_btn" style="position: absolute; top: 10px; right: 15px;">
        <span><i class="fas fa-times" style="font-size: 21px; color: #aaa;"></i></span>
    </div>
	<!--<div id="ol_be_cate">
    	<h2><span class="sound_only">회원</span>로그인</h2>
    	<a href="<?//php echo G5_BBS_URL ?>/register.php" class="join">회원가입</a>
    </div>-->
    
    <style>
        
        /*#ol_be_cate { width: 450px; }
        #ol_be_cate ul.tab_login { width: 100%; }
        #ol_be_cate ul.tab_login li { width: 25%; padding: 15px 0; text-align: center; background: #fefefe; border-right: 1px solid #eee; border-bottom: 1px solid #f3f3f3; float: left; cursor: pointer; }
        #ol_be_cate ul.tab_login li.selected { color: #fff; background: #555; }
        #ol_be_cate ul.tab_login li:hover { color: #fff; background: #777; }*/
        
        #ol_be_cate { width: 100%; }
        #ol_be_cate ul.tab_login { width: 100%; border-bottom: 1px solid #eee;  }
        #ol_be_cate ul.tab_login::after { content: ''; display: block; clear: both; }
        #ol_be_cate ul.tab_login li { width: 13%; margin: 0 0 -1px; padding: 10px 0; text-align: center; background: #f7f7f7; border-right: 1px solid #eee; border-bottom: 1px solid #f3f3f3; float: left; cursor: pointer; }
        #ol_be_cate ul.tab_login li:nth-child(2) { border-right: 0; }
        #ol_be_cate ul.tab_login li.selected { color: #fff; background: #2f9cdf; }
        #ol_be_cate ul.tab_login li:hover { color: #fff; background: #2f9cdf; }
        
        .tab_con_login { width: 100%; }
        .tab_con_login div#login_tab { width: 350px; margin: 240px auto; border: 1px solid #eee; border-radius: 5px; }
        
        .tab_con_login div#register_tab { width: 100%; height: 800px; }
        /*.tab_con_login div#register_tab iframe { width: 100%; height: 800px; }*/
        
    
    </style>
    
    <div id="ol_be_cate">
    	<ul class="tab_login">
    	    <li rel="#login_tab" class="selected">로그인</li>
    	    <li rel="#register_tab">회원가입</li>
    	</ul>
    </div>
    
    <div id="" class="tab_con_login">
        
        <!-- 로그인 탭 -->
       <div id="login_tab">
            <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
            <fieldset>
                <div class="ol_wr">
                    <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
                    <label for="ol_id" id="ol_idlabel" class="sound_only">회원아이디<strong>필수</strong></label>
                    <input type="text" id="ol_id" name="mb_id" required maxlength="20" placeholder="아이디">
                    <label for="ol_pw" id="ol_pwlabel" class="sound_only">비밀번호<strong>필수</strong></label>
                    <input type="password" name="mb_password" id="ol_pw" required maxlength="20" placeholder="비밀번호">
                    <input type="submit" id="ol_submit" value="로그인" class="btn_b02">
                </div>
                <div class="ol_auto_wr"> 
                    <div id="ol_auto" class="chk_box">
                        <input type="checkbox" name="auto_login" value="1" id="auto_login" class="selec_chk">
                        <label for="auto_login" id="auto_login_label"><span></span>자동로그인</label>
                    </div>
                    <div id="ol_svc">
                        <a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">정보찾기</a>
                    </div>
                </div>
                <?php
                // 소셜로그인 사용시 소셜로그인 버튼
                @include_once(get_social_skin_path().'/social_login.skin.php');
                ?>

            </fieldset>
            </form>
        </div>
        
        <!-- 회원가입 탭 -->
        <div id="register_tab" class="">
            <!--<iframe src="<?//php echo G5_BBS_URL ?>/register.php" frameborder="0" style=""></iframe>-->
            test
        </div>
    </div>
    
</section>

<script>
jQuery(function($) {

    var $omi = $('#ol_id'),
        $omp = $('#ol_pw'),
        $omi_label = $('#ol_idlabel'),
        $omp_label = $('#ol_pwlabel');

    $omi_label.addClass('ol_idlabel');
    $omp_label.addClass('ol_pwlabel');

    $("#auto_login").click(function(){
        if ($(this).is(":checked")) {
            if(!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                return false;
        }
    });
});

function fhead_submit(f)
{
    if( $( document.body ).triggerHandler( 'outlogin1', [f, 'foutlogin'] ) !== false ){
        return true;
    }
    return false;
}
    
    
/*$(function(){
    $(".sch_txt").click(function(){
        $(this).parent(".sch_select").toggleClass("active");
    });
});

$(function(){
    $(".list_select").click(function(){
        $(this).parent(".list_form").toggleClass("active");
    });
});*/

/* 탭 메뉴 */
$(function (){
    $(".tab_con_login>div").hide();
    $(".tab_con_login>div:first").show();   
    $(".tab_login li").click(function(){
        $(".tab_login li").removeClass("selected");
        $(this).addClass("selected");
        $(".tab_con_login>div").hide();
        $($(this).attr("rel")).show();
    });
});
</script>
<!-- } 로그인 전 아웃로그인 끝 -->


