<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

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

<header id="header">
    <div class="inner">
        <div class="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_URL?>/img/face/text_logo_black.png" alt="<?php echo $config['cf_title']; ?>"></a>
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
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="menu_tit hd_color"><?php echo $row['me_name'] ?></a>
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
            <div class="hamburger">
                <div class="hamburger__container">
                <div class="hamburger__inner"></div>
                <div class="hamburger__hidden"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="all_menu">
        <div>
            
        </div>
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
                <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="menu_tit"><?php echo $row['me_name'] ?></a>
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
    </div>
</header>
<script>
    // all_menu
    document.querySelector('.hamburger').addEventListener('click', (e) => {
	    e.currentTarget.classList.toggle('is-active');
    })
    $(document).ready(function(){
        $('.hamburger').click(function(){
           $('#all_menu').toggleClass('on');
        });
    });
</script>

<script>
     $(document).ready(function(){
        $('.menu_li').click(function(){
            $(this).toggleClass('on');
            $(this).find('.all_box').toggleClass('on');
        }); 
     });   
</script>

<script>
    $(window).scroll(function(){ 
        var height = $(document).scrollTop(); //실시간으로 스크롤의 높이를 측정
        if(height > 0){ 
            $('#header').addClass('on'); 
        }else if(height == 0){ 
            $('#header').removeClass('on'); 
        } 
    });

</script>




<div>

    <div>
    <?php if (!defined("_INDEX_")) { ?>

    <?php }