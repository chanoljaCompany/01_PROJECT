<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>



<!-- footer bottom start -->
<div class="footer-bottom">
	<div class="container">
		<div class="row">
<!-- 

 -->
		<div class=" col-md-2 col-sm-6 mg-top-05">
				<div class="widget widget_mc4wp_form_widget">
					<h2 class="widget-title"></h2>
					<form class="mc4wp-form mc4wp-form-84" method="post">
						<div class="mc4wp-form-fields">

							
					<!-- 		<p>

							</p> -->
						</div>
					</form>				
				</div>					
			</div>
			<div class="col-md-7  col-sm-6">
				<div class="copy-right-text">
					<!-- FOOTER COPYRIGHT TEXT -->
					<h2 class="widget-title"></h2>
                        <div class="f_info">
                            <!--<span><b><?=$config[cf_1]?></b></span><span class="f_info_mo_none">&nbsp;&nbsp;|&nbsp;&nbsp;</span><span>대표이사 : <?=$config[cf_2]?></span> -->
                            <span><b><?=$config[cf_1]?></b></span><span class="f_info_mo_none">&nbsp;&nbsp;|&nbsp;&nbsp;</span><span>대표이사 : 문 준</span>
                            <span class="f_info_mo_none"><br></span>
                            <span>사업자등록번호 : 625-87-01871  |  통신판매업신고번호 : 제2022-인천부평-1361호</span>
                            <span class="f_info_mo_none"><br></span>
                            <!-- <span>Business Number : <?=$config[cf_3]?></span><span class="f_info_mo_none">&nbsp;&nbsp;|&nbsp;&nbsp;</span> -->
                            <span>Tel : <?=$config[cf_4]?></span><span class="f_info_mo_none">&nbsp;&nbsp;|&nbsp;&nbsp;</span><span>Fax : <?=$config[cf_5]?></span>
                            <span class="f_info_mo_none"><br></span>
                            <span>본사 주소  : <?=$config[cf_8]?></span>
                            <span class="f_info_mo_none"><br></span>
                            <span>서울사무소  : <?=$config[cf_9]?></span>
                            <span class="f_info_mo_none"><br></span>
                            <span>E-mail : <?=$config[cf_7]?><span class="f_info_mo_none">&nbsp;&nbsp;|&nbsp;&nbsp;</span></span>
                            <span>개인정보책임자 : 문준</span> &nbsp;&nbsp;<a href="/bbs/content.php?co_id=privacy" style="color:#1ebdbd;" class="ft_privacy">개인정보처리방침</a>
                        </div>
						<p>Copyright <?=$config[cf_1]?> 2020. All Rights Reserved.&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!$is_admin) { ?><a href="/adm" class="adm" style="color:#161616">ADMIN</a><?php }?><?php if($is_admin) { ?><a href="/adm" class="adm" style="color:#4ebcfb;">ADMIN</a><?php }?></p>
				</div>
			</div>
			<div class="col-md-4  col-sm-6">				
				<div class="footer-menu">
					<!-- FOOTER COPYRIGHT MENU -->
					 <ul class="text-right">
					 <!-- <li><a href="/">Home</a></li> -->

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- 네이버 공통 스크립트. 공통 적용 스크립트 , 모든 페이지에 노출되도록 설치. 단 전환페이지 설정값보다 항상 하단에 위치해야함 --> 
<script type="text/javascript" src="//wcs.naver.net/wcslog.js"> </script> 
<script type="text/javascript"> 
if (!wcs_add) var wcs_add={};
wcs_add["wa"] = "s_37a164e3bd7c";
if (!_nasa) var _nasa={};
if(window.wcs){
wcs.inflow();
wcs_do(_nasa);
}
</script>

<!-- footer bottom end -->

<?php /*?>
    </div>
</div>

<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">
    <?php echo popular('theme/basic'); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
    <?php echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
    <div id="ft_catch"><img src="<?php echo G5_IMG_URL; ?>/ft.png" alt="<?php echo G5_VERSION ?>"></div>
    <div id="ft_company">
    </div>
    <div id="ft_copy">
        <div>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보처리방침</a>
            <a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a>
            Copyright &copy; <b>소유하신 도메인.</b> All rights reserved.<br>

            <a href="#hd" id="ft_totop">상단으로</a>
        </div>
    </div>
</div>
<?*/?>
<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<!--<a href="<?//php echo get_device_change_url(); ?>" id="device_change">모바일 버전으로 보기</a>-->
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>