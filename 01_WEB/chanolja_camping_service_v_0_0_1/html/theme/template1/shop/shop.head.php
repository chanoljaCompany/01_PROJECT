<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
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


<!--START HEADER TOP AREA -->
<div class="astute-header-top">
    <div class="container">
        <div class="row">
            <!-- TOP LEFT -->
            <!--<div class="col-xs-12 col-md-8 col-sm-9">
				<div class="top-address">
					<p>																	
						<a href="tel:02-3484-3000"><i class="fa fa-phone"></i><?=$config[cf_4]?></a>
						<a href="mailto:<?= $member["mb_email"] ?>"><i class="far fa-envelope"></i><?=$config[cf_7]?></a>
					</p>
				</div>
			</div>-->
            <!-- TOP RIGHT -->
            <!--
			<div class="col-xs-12 col-md-4 col-sm-3">
				<div class="top-right-menu">
					<ul class="social-icons text-right">
						<?php if ($is_member) {  ?>
                        <?php if ($is_admin) {  ?>
                        <li><a href="<?php echo G5_ADMIN_URL ?>"><b>ADMIN</b></a></li>
                        <?php }  ?>
                        <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php">정보수정</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/logout.php">Logout</a></li>
                        <?php } else {  ?>
                        <li><a href="<?php echo G5_BBS_URL ?>/register.php">Join</a></li>
                        <li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>Login</b></a></li>
                        <?php }  ?>
					</ul>									 									 								 
				</div>
			</div>
			-->
        </div>
    </div>
</div>
<!--START HEADER TOP AREA -->

<!-- HEADER DEFAULT MANU AREA -->
<div class="astute-main-menu one_page hidden-xs hidden-sm">
    <div class="astute_nav_area scroll_fixed">
        <div class="row logo-left">
            <!-- LOGO -->
            <div class="col-md-3 col-sm-3 col-xs-4">
                <div class="logo">
                    <a class="main_sticky_main_l" href="<?php echo G5_URL ?>" title="차놀자캠핑">
                        <img src="<?= G5_THEME_URL ?>/assets/images/1.png" alt="차놀자캠핑" />
                    </a>
                    <a class="main_sticky_l" href="<?php echo G5_URL ?>" title="차놀자캠핑">
                        <img src="<?= G5_THEME_URL ?>/assets/images/logo-trns.png" alt="차놀자캠핑" />
                    </a>
                </div>
            </div>
            <!-- END LOGO -->

            <!-- MAIN MENU -->
            <div class="col-md-6 col-sm-9 col-xs-8">
                <nav class="astute_menu main-search-menu">
                    <ul class="sub-menu">
                        <?php
                            $sql = " select *
                                        from {$g5['menu_table']}
                                        where me_use = '1'
                                          and length(me_code) = '2'
                                        order by me_order, me_id ";
                            $result = sql_query($sql, false);
                            $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                
                            for ($i=0; $row=sql_fetch_array($result); $i++) {
                            ?>
                        <li>
                            <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                            <?php
                                $sql2 = " select *
                                            from {$g5['menu_table']}
                                            where me_use = '1'
                                              and length(me_code) = '4'
                                              and substring(me_code, 1, 2) = '{$row['me_code']}'
                                            order by me_order, me_id ";
                                $result2 = sql_query($sql2);
                
                                for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                                    if($k == 0)
                                        echo '<ul class="sub-menu">'.PHP_EOL;
                                ?>
                        <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>

                        <?php
                                }
                
                                if($k > 0)
                                    echo '</ul>'.PHP_EOL;
                                ?>
                        </li>
                        <?php
                            }
                
                            if ($i == 0) {  ?>
                        <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                        <?php } ?>

                    </ul>
                </nav>
            </div>
            <!-- END MAIN MENU -->
            <div class="col-md-3 col-sm-3 col-xs-4 sns_wrap">
                <div class="shop_btn"><a href="/bbs/board.php?bo_table=71"><i class="far fa-calendar-alt"></i><span>예약하기</span></a></div>
                <ul>
                    <li><a href=""><img src="/theme/template1/img/cafe.png" alt="네이버카페"></a></li>
                    <li><a href=""><img src="/theme/template1/img/utube.png" alt="유튜브"></a></li>
                    <li><a href=""><img src="/theme/template1/img/insta.png" alt="인스타그램"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END HEADER MENU AREA -->

<style>
    .sns_wrap{line-height: 111px;}
    .sns_wrap ul{margin-right:50px;}
    .sns_wrap ul li{float:right; margin:0 10px;}

    .shop_btn {position: absolute;top: 50%;transform: translateY(-50%);text-align: center;}
    .shop_btn a {display: block;padding: 15px;line-height: 1;background: #2f9cdf;border-radius: 7px;color: #fff;}
    .shop_btn span {margin-left: 5px;}

    .m_shop_btn {position: absolute;top: 10px;right: 60px;width: 40px;height: 40px;line-height: 40px;background: #2f9cdf;border-radius: 50%;text-align: center;}
    .m_shop_btn a {color: #fff;}

    @media screen and (max-width:1250px) {
        .shop_btn a {padding: 10px;}
        .shop_btn span{display: none;}
    }
</style>

<!-- MOBILE MENU AREA -->
<div class="home-2 mbm hidden-md hidden-lg header_area main-menu-area">
    <div class="menu_area mobile-menu">
        <nav>
            <a href="/" class="m_logo"><img src="<?= G5_THEME_URL ?>/assets/images/1.png" alt="차놀자캠핑" style="max-height:60px; width:auto;"/></a>
            <div class="m_shop_btn"><a href="/bbs/board.php?bo_table=71"><i class="far fa-calendar-alt"></i></a></div>
            <ul class="main-menu clearfix">
                <?php
                $sql = " select *
                            from {$g5['menu_table']}
                            where me_use = '1'
                              and length(me_code) = '2'
                            order by me_order, me_id ";
                $result = sql_query($sql, false);
                $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
    
                for ($i=0; $row=sql_fetch_array($result); $i++) {
                ?>
                <li>
                    <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                    <?php
                    $sql2 = " select *
                                from {$g5['menu_table']}
                                where me_use = '1'
                                  and length(me_code) = '4'
                                  and substring(me_code, 1, 2) = '{$row['me_code']}'
                                order by me_order, me_id ";
                    $result2 = sql_query($sql2);
    
                    for ($k=0; $row2=sql_fetch_array($result2); $k++) {
                        if($k == 0)
                            echo '<ul class="sub-menu">'.PHP_EOL;
                    ?>
                <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                <?php
                    }
    
                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
                </li>
                <?php
                }
    
                if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
<!-- END MOBILE MENU AREA  -->
