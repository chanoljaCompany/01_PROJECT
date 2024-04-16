<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    define('G5_IS_COMMUNITY_PAGE', true);
    include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
    return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<header id="header">
    <div class="menu_bg"></div>
    <div class="inner">
        <div class="logo">
            <a href="http://www.chanolja.co.kr/"><img src="<?php echo G5_THEME_URL?>/img/face/text_logo_black.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
        <div id="nav">
            <nav>
                <ul class="menu_ul">
                    <?php
                    $menu_datas = get_menu_db(0, true);
                    $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                    $i = 0;
                    foreach( $menu_datas as $row ){
                        if( empty($row) ) continue;
                        $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                        ?>
                    <li class="menu_li <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <?php
                        if($row['me_name']=='캠핑카예약하기')  {
                            echo "<a class='menu_tit hd_color camping_li' target='_self' href='" . $row['me_link'] . "'>" . $row['me_name'] . "</a>";
                        }else {

                            ?>
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="menu_tit hd_color"><?php echo $row['me_name'] ?></a>
                            <?php
                        }
                        ?>
                        <!-- s:하위 gnb -->
                        <?php
                        $k = 0;
                        foreach( (array) $row['sub'] as $row2 ){

                            if( empty($row2) ) continue;

                            if($k == 0)
                                echo '<div class="gnb_box"><div class="inner"><ul class="gnb_ul">'.PHP_EOL;
                            ?>
                            <li class="gnb_li"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_a"><?php echo $row2['me_name'] ?></a></li>
                            <?php
                            $k++;
                        }   //end foreach $row2

                        if($k > 0)
                            echo '</ul></div></div>'.PHP_EOL;
                        ?>
                        <!-- e:하위 gnb -->
                        </li>
                        <?php
                        $i++;
                    }   //end foreach $row
                    if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 > 환경설정 > 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div>
        <div id="info">
            <div class="userBox">
                <ul>
                    <?php if ($is_member) {  ?>
                        <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                        <?php if ($is_admin) {  ?>
                            <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                        <?php }  ?>
                    <?php } else {  ?>
                        <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
                    <?php }  ?>
                </ul>
            </div>
        </div>
        <div class="hamburger">
            <div class="hamburger_container">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div id="all_menu">
        <ul class="menu_ul">
            <?php
            $menu_datas = get_menu_db(0, true);
            $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
            $i = 0;
            foreach( $menu_datas as $row ){
                if( empty($row) ) continue;
                $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                ?>
            <li class="menu_li <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                <?php
                if($row['me_name']=='파트너스센터')  {
                    echo "<a class='menu_tit' href='http://www.chanolja.co.kr/real_reservation/'>". $row['me_name'] ."</a>";
                }
                else if($row['me_name']=='캠핑카예약')  {
                    echo "<a class='menu_tit ' href='http://www.chanolja.co.kr/bbs/board.php?bo_table=70'>". $row['me_name'] ."</a>";
                }else {
                    ?>

                    <a class="menu_tit"><?php echo $row['me_name'] ?></a>
                    <?php
                }
                ?>
                <!-- s:하위 gnb -->
                <?php
                $k = 0;
                foreach( (array) $row['sub'] as $row2 ){

                    if( empty($row2) ) continue;

                    if($k == 0)
                        echo '<div class="all_box"><ul class="all_ul">'.PHP_EOL;
                    ?>
                    <li class="all_li"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="all_tit"><?php echo $row2['me_name'] ?></a></li>
                    <?php
                    $k++;
                }   //end foreach $row2

                if($k > 0)
                    echo '</ul></div>'.PHP_EOL;
                ?>
                <!-- e:하위 gnb -->
                </li>
                <?php
                $i++;
            }   //end foreach $row
            if ($i == 0) {  ?>
                <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 > 환경설정 > 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
            <?php } ?>
        </ul>
        <div class="head-img">

        </div>
    </div>
</header>
<!--<?php include_once(G5_THEME_PATH.'/responsive.php'); // 분류 ?> -->
<!-- } 상단 끝 -->
<!-- } 상단 끝 -->

<style>
    .camping_li {
        animation : bounce 2s ease infinite;
        color: #54C3FD !important;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateY(0);
        }
        40% {
            transform: translateY(-7px);
        }
        60% {
            transform: translateY(-3px);
        }
    }
</style>



<script>
    // all_menu

    $(document).ready(function(){
        $('.hamburger').click(function(){
            $('#all_menu').toggleClass('on');
            $(this).find('.hamburger_container').toggleClass('on')
            $(this).toggleClass('on')
        });
    });
</script>
<script>

</script>
<script>
    $(document).ready(function(){
        if(window.matchMedia("(min-width:1040px)").matches){
            //      $('#nav .menu_tit').mouseenter(function(){
            //                 $('.menu_tit').removeClass('on');
            //                 $(this).addClass('on');
            //             });
            //              $('#nav .menu_li').mouseenter(function(){
            //                 var ed = $(this).index();
            //                 $(this).addClass('on');
            //                 $(this).children('.gnb_box').show();
            //          });
            //          $('#nav .menu_li').mouseleave(function(){
            //                  var ed = $(this).index();
            //                  $(this).removeClass('on');
            //                  $(this).children('.gnb_box').hide();
            //                  $('.menu_tit').removeClass('on');
            //              });
            /*
                     $('#all_menu .menu_tit').mouseenter(function(){
                          $(this).nextAll('.all_box').addClass('on');
                      });
                      $('#all_menu .menu_li').mouseleave(function(){
                          $('.all_box').removeClass('on');
                      });

             */
            $('#all_menu .menu_li').click(function(){
                $(this).toggleClass('on');
                $(this).find('.all_box').toggleClass('on');
            });

            $('#nav .menu_li').mouseover(function(){
                $('.gnb_ul').stop().slideDown();
                $('.menu_bg').stop().slideDown();
            });
            $('#header').mouseleave(function(){
                $('.gnb_ul').stop().slideUp();
                $('.menu_bg').stop().slideUp();
            });
        }

        if(window.matchMedia("(max-width:1200px)").matches){
            $('.menu_li').click(function(){
                var eq = $(this).index();
                $(this).find('.all_box').stop(300).slideToggle('on');
            })
        }else{

        }

    });
</script>

<script>
    // $(window).scroll(function(){ 
    //     var height = $(document).scrollTop(); //실시간으로 스크롤의 높이를 측정
    //     if(height > 0){ 
    //         $('#header').addClass('on'); 
    //     }else if(height == 0){ 
    //         $('#header').removeClass('on'); 
    //     } 
    // });

</script>
<!-- 콘텐츠 시작 { -->

