<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$begin_time = get_microtime();

if (!isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
}
else {
    $g5_head_title = $g5['title']; // 상태바에 표시될 제목
    $g5_head_title .= " | ".$config['cf_title'];
}

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (!$g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/'.G5_ADMIN_DIR.'/') || $is_admin == 'super') $g5['lo_url'] = '';

/*
// 만료된 페이지로 사용하시는 경우
header("Cache-Control: no-cache"); // HTTP/1.1
header("Expires: 0"); // rfc2616 - Section 14.21
header("Pragma: no-cache"); // HTTP/1.0
*/
?>
<!doctype html>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="icon" href="http://www.chanolja.co.kr/theme/template1/img/favicon.ico" />
<link rel="shortcut icon" href="<?php echo G5_IMG_URL?>/favicon.ico" type="image/x-icon">
<html lang="ko">
<head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQ6VJRTL');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-V75NK9C782"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-V75NK9C782');
</script>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta property="og:type" content="website">
<meta property="og:title" content="차놀자캠핑">
<meta property="og:description" content="행복한 캠핑카 여행은 차놀자캠핑과 함께">
<meta property="og:url" content="http://www.chanolja.co.kr">
<meta name="title" content="차놀자 캠핑">
<meta name="description" content="전국 최대 최다 캠핑카 여행 플랫폼, 차놀자 캠핑, 캠핑카렌트, 캠핑카대여, 서울캠핑카, 경기캠핑카, 인천캠핑카, 부산캠핑카, 경남캠핑카, 전북캠핑카, 전남캠핑카, 충남캠핑카 ">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">


<?php
/*if (G5_IS_MOBILE) {
    echo '<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">'.PHP_EOL;
    echo '<meta name="HandheldFriendly" content="true">'.PHP_EOL;
    echo '<meta name="format-detection" content="telephone=no">'.PHP_EOL;
} else {
    echo '<meta http-equiv="imagetoolbar" content="no">'.PHP_EOL;
    echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">'.PHP_EOL;
}*/

if($config['cf_add_meta'])
    echo $config['cf_add_meta'].PHP_EOL;
?>
<title><?php echo $g5_head_title; ?></title>
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/<?php echo G5_IS_MOBILE ? 'mobile' : 'default'; ?>.css?ver=<?php echo G5_CSS_VER; ?>">
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/common/reset.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/common/headStyle.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/common/footerStyle.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/mainStyle.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/sub/introduce.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/sub/directions.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/gallery_table.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/webzine_table.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/sub/bs_info.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/sub/bs_area.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/common/common.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/basic_table.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/contact_us.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/qa.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/table/faq.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL;?>/common/animate.css">
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL; ?>/common/jquery.bxslider.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<!--[if IE]> 
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL?>/ie.css">
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" href="<?php echo G5_THEME_CSS_URL?>/ie9.css">
<![endif]-->

<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
</script>
<script src="<?php echo G5_JS_URL ?>/jquery-1.8.3.min.js"></script>
<script src="<?php echo G5_JS_URL ?>/jquery.menu.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/common.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/wrest.js?ver=<?php echo G5_JS_VER; ?>"></script>
<script src="<?php echo G5_JS_URL ?>/placeholders.min.js"></script>
<script src="<?php echo G5_THEME_JS_URL ?>/site.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

<script>
      $(document).ready(function(){
        $(".slider").bxSlider();
      });
    </script>




<link rel="stylesheet" href="<?php echo G5_JS_URL ?>/font-awesome/css/font-awesome.min.css">
<?php
if(G5_IS_MOBILE) {
    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>
</head>
<body<?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<?php
if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
    $sr_admin_msg = '';
    if ($is_admin == 'super') $sr_admin_msg = "최고관리자 ";
    else if ($is_admin == 'group') $sr_admin_msg = "그룹관리자 ";
    else if ($is_admin == 'board') $sr_admin_msg = "게시판관리자 ";

    echo '<div id="hd_login_msg">'.$sr_admin_msg.get_text($member['mb_nick']).'님 로그인 중 ';
    echo '<a href="'.G5_BBS_URL.'/logout.php">로그아웃</a></div>';
}
?>