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
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<meta property="og:type" content="website">
<meta property="og:title" content="차놀자렌터카">
<meta property="og:description" content="안녕하세요 차놀자 렌터카 입니다.">


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
<link rel="stylesheet" href="<?php echo G5_JS_URL ?>/font-awesome/css/font-awesome.min.css">

<link rel="stylesheet" href="<?php echo G5_JS_URL ?>/swiper/swiper.min.css">
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/><!-- Link Swiper's CSS -->
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


<?php
if(G5_IS_MOBILE) {
    echo '<script src="'.G5_JS_URL.'/modernizr.custom.70111.js"></script>'.PHP_EOL; // overflow scroll 감지
}
if(!defined('G5_IS_ADMIN'))
    echo $config['cf_add_script'];
?>

<script type="text/javascript">
 $(function () {
 var cssTop = parseInt($("#sky").css("top"));
  $(window).scroll(function () {
  var position = $(window).scrollTop();
  $("#sky").stop().animate({ "top": (position + cssTop) + "px" }, 300);
  });
});
</script>




<!-- 스크립트 영역  : 스크립트 분해 불가 손대지말것! -->

<script>
    new WOW().init();
</script>


<script>
    $(function() {
		// Add a click event to the navigation bar buttons
        $("#gnb .gnb_1dli a").click(function() {
            // Remove the "selected" class from all navigation bar buttons
            $("#gnb .gnb_1dli a").removeClass("selected");
            // Add the "selected" class to the clicked navigation bar button
            $(this).addClass("selected");
        });

        // Highlight the selected board text when the page loads
        var selectedBoard = "<?php echo $bo_table; ?>"; // Get the current board name from PHP variable
        $("#gnb .gnb_1dli a").each(function() {
            if ($(this).attr("href").indexOf("bo_table=" + selectedBoard) >= 0) {
                $(this).addClass("selected");
            }
        });

        setInterval(function() {
			//  if ($(window).scrollTop() >= 80) {
            //    $("#hd").addeClass("scrollBg");
            //    $("#logoA img.logo_pc").attr("src", "<?php echo G5_THEME_IMG_URL ?>/logo-2.png");
            //} else {
             //   $("#hd").addClass("scrollBg");
             //   $("#logoA img.logo_pc").attr("src", "<?php echo G5_THEME_IMG_URL ?>/logo-2.png");
            //}
///        }, 300);
    });
</script>

<script>
    $(document).ready(function () {
        $("#closeBanner").click(function () {
            $("#scrollBanner").hide();
        });
    });
</script>

<!-- 문의배너 스크립트-->
<script>
    // Add scroll event listener to the window
    window.addEventListener("scroll", function() {
        const banner = document.getElementById("scrollBanner");
        const scrollPosition = window.scrollY + 70; // Get the current scroll position with 70px offset

        // Adjust the banner position based on the scroll position
        banner.style.transform = `translateY(${scrollPosition}px)`;
    });

    // Add a resize event listener to make the banner responsive
    window.addEventListener("resize", function() {
        const bannerContainer = document.querySelector(".banner-container");
        const windowWidth = window.innerWidth;

        if (windowWidth <= 768) {
            bannerContainer.style.position = "fixed";
            bannerContainer.style.top = "70px";
            bannerContainer.style.right = "10px";
            bannerContainer.style.width = "100%";
            bannerContainer.style.maxWidth = "255px";
        } else {
            bannerContainer.style.position = "absolute";
            bannerContainer.style.top = "180px";
            bannerContainer.style.right = "20px";
            bannerContainer.style.width = "255px";
            bannerContainer.style.maxWidth = "none";
        }
    });

    // Execute the resize event listener on page load
    window.dispatchEvent(new Event("resize"));
</script>

<!-- 모바일하단 스크립트-->
<script>
    // Add scroll event listener to the window
    window.addEventListener("scroll", function() {
        const banner = document.getElementById("scrollBanner");
        const scrollPosition = window.scrollY + 70; // Get the current scroll position with 70px offset

        // Adjust the banner position based on the scroll position
        banner.style.transform = `translateY(${scrollPosition}px)`;
    });

    // Add a resize event listener to make the banner responsive
    window.addEventListener("resize", function() {
        const bannerContainer = document.querySelector(".banner-container_mo");
        const windowWidth = window.innerWidth;

    });

    // Execute the resize event listener on page load
    window.dispatchEvent(new Event("resize"));
</script>


<script>
    // Add smooth scrolling behavior to the main menu links
    $("#gnb .gnb_1dli a").click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var targetId = $(this).attr("href"); // Get the target ID to scroll to
        var targetOffset = $(targetId).offset().top; // Get the top offset of the target section
        var headerHeight = $("#hd").outerHeight(); // Get the height of the header to offset the scroll position

        // Scroll smoothly to the target section
        $("html, body").animate({
            scrollTop: targetOffset - headerHeight
        }, 800); // You can adjust the scroll speed (800ms in this case)
    });
</script>




<!-- 배너 코드 -->
<div class="banner-container" >
    <div class="banner" id="scrollBanner">
        <div class="banner-content" >
            <span class="close-button0" id="closeBanner"><font color="#fff">x</font></span>
			<center>
			<br>
			
			<font size="6px" color="#fff" style="padding: 5px; font-weight: 800; margin-bottom : 5px;" >견적문의</font><br>
            <!--<img src="<?php echo G5_THEME_IMG_URL ?>/qna.png" alt="견적문의" style="width:119px; margin-bottom:10px; justify-content: center;" class="banner-image;"> -->
			</center>
			<form name="contactform" method="post" action="<?php echo G5_THEME_URL ?>/send2.php">
            <!--<form id="contactForm" action="send_email.php" method="POST">-->
                <div class="input-row">
  				    <input name="first_name"  type="text" placeholder="이름" class="ipt" style="width:200px; height:40px; margin-top : 8px;" required> 
  				    <input name="email"  type="text" placeholder="전화번호" class="ipt" style="width:200px; height:40px;" required> 
 				    <input name="telephone"  type="text" placeholder="희망차종" class="ipt" style="width:200px; height:40px;" required> 

                </div>
                <div class="input-row">
 				    <input name="comments"  type="text" placeholder="상담희망내용" class="ipt" style="width:200px; height:40px;" required> 
                </div>
                <div class="input-row" style="float: center;">
				<center>
			    <input type="checkbox"  required> 개인정보 수집/이용 동의
				 <a href=""><img src="<?php echo G5_THEME_IMG_URL ?>/view.png" style="margin-bottom : 3px;"> </a>
				 </center>
				      </div>
				
                <div class="input-row">
   		            <input type="submit" value="" class="btn_submit" style="background: url('<?php echo G5_THEME_IMG_URL ?>/select.png') no-repeat; width: 220px; height: 56px; " required">
					<!--
                    <button type="submit" id="submitForm" style="background-image: url('<?php echo G5_THEME_IMG_URL ?>/select.png'); background-size: cover; width: 100px; height: 30px;">&nbsp;</button>-->
                </div>
				
            </form>
        </div>
    </div>
</div>




<!-- 스타일시트 영역  :  헤드스타일, 메인스타일 파일에 추가 불가, 손대지 말것! -->
<style>
.blankk {display:block;}
.banner-container_mo {display : none ;}
.banner-container {
    position: absolute;
    top: 180px; /* 상단 공간을 50px로 주기 위해 값 수정 */
    right: 20px;
    z-index: 999; /* Set a high z-index to keep it above other elements */
}

/* Add a media query to make the banner responsive */
@media (max-width: 768px) {
.banner-container {
        position: fixed;
        top: 70px; /* 상단 공간을 50px로 주기 위해 값 수정 */
        right: 10px;
        width: 100%;
        max-width: 320px;
    }
}

@media screen and (max-width: 480px){
.blankk {display:none;}
.banner-container {display:none;}
.banner-container_mo {
	  display : block ;
      position: fixed;
	  background : #fff ;
	  z-index : 999;
      left: 0;
      right: 0;
      bottom: 0;
	  }
}
/*#wrapper {
    overflow: hidden;
}*/
.banner {
    width: 252px;
    height:  412px;
    background-color: #52c2f0;
    padding: 0px;
    border-radius: 10px;
    text-align: center;
    transition: transform 0.2s ease-out; /* Add transition for smooth movement */
}

.banner-image {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
    margin-top: 20px;
    margin-bottom: 20px;
}
.banner-content input,
.banner-content textarea {
    width: 100%;
    height: 20px;
    padding: 5px;
    margin-bottom: 10px;
    border: none;
    border-radius: 5px;
    background-color: #FFFFFF;
    color: #000;
    font-size: 16px;
}

.banner-content textarea {
    height: 80px;
}

.banner-content label {
    /* display: inline-block; */
    margin-right: 5px;
    font-size: 15px;
}

#viewDetailsLink {
    display: inline-block;
    color: #2C438A;
    font-size: 12px;
    font-weight: bold; /* Add font-weight property to make the font bold */
    text-decoration: underline; /* Add underline to the link */
}

.banner-content input[type="text"],
.banner-content input[type="tel"],
.banner-content textarea {
    width: 220px;
    height: 36px;
}

.consultationBtn {
    margin-top:20px;
    width: 220px;
    height: 56px;
    border: none;
    border-radius: 8px;
    background-color: #2C438A;
    color: #FFFFFF;
    cursor: pointer;
    font-size: 16px;
}

.dialog-container {
    /* Existing styles for the dialog box */
}

.dialog-btn {
    /* Existing styles for the dialog button */
}
.banner-content .qna {
    width: 220px; /* Set the width to 220px */
    height: 80px; /* Set the height to 80px */
}
.close-button0 {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    color: gray;
  }

  /*#gnb {
    position: relative;
    margin-left: 170px; /* Add right margin of 50px 
  }*/

 /* Rest of your existing styles */

        /* Center the content of the banner container */
        .banner-container {
            /*display: flex;*/
            justify-content: center;
            align-items: center;
            min-height: 100px; /* Use min-height to ensure the container takes at least the full viewport height */
        }

        .banner {
            /*display: flex;*/
            align-items: center;
            background-color: #52c2f0;
            padding: 0px;
        }
        .banner-image {
            max-width: 100px;
            margin-right: 20px;
        }
        .banner-content {
            /*display: flex; */
            /*flex-direction: column; */
            justify-content: center;
            align-items: center; /* Center horizontally */
        }
        .qna {
            resize: none;
        }
        .sangdam-image {
            max-width: 100px;
            margin-top: 10px;
            margin-left: 7px;
        }
/* Center the content of a container */
.centered-content {
    /*display: flex;*/
    justify-content: center;
    align-items: center;
    height: 100%;
}

/* Add styles to vertically center the container within its parent 
#container {
    display: grid;
    place-items: center;
    /* height: 100px;
} */
  </style>


    <script type="text/javascript">
      function onLoad() {
        var params = window.location.search.substring( 1 ).split( '&' );
        var height;
        for( var i = 0, l = params.length; i < l; ++i ) {
          var parts = params[i].split( '=' );
          switch( parts[0] ) {
          case 'height':
            height = parseInt( parts[1] );
            break;
          }
        }
        if( typeof( height ) == 'number' ) {
          window.top.updateIFrame( height );
        }
      }

    window.onload = onLoad;
    </script>



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