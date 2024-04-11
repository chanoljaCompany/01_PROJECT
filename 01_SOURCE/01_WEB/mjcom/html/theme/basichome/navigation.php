<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<style>
    #navigation {
        width:100%;
        position:relative;
        background-color:#f6f6f6;
        box-shadow:3px 3px 6px rgba(0,0,0,0.3);
        box-sizing:border-box;
    }
    #navigation .inner {
        width:1240px;
        height:60px;
        line-height:60px;
        margin:0 auto;
        position:relative;
        display:flex;
        background-color:#fff;
        z-index:99;
        border-left:1px solid #ddd;
        border-right:1px solid #ddd;
        box-sizing:border-box;
    }
    #navigation #navi_home {
        padding:0 20px;
        line-height:70px;
        border-right:1px solid #ddd;
    }
    #navigation #navi_home a{
        width: 100%;
        height:100%;
        display:block;
    }
    #navigation #navi_home i {
        font-size:2.5em;
        color:#333;
    }
    #navigation .navi {
        width:300px;
        height:100%;
        border-right:1px solid #ddd;
        box-sizing:border-box;
        position:relative;
    }
    #navigation .tit {
        font-size:1.2em;
        font-weight:bold;
        color:#333;
        padding-left:20px;
    }
    #navigation .slide {
        display:none;
    }
    #navigation .slide.on {
        display:block;
    }
    #navigation .navi ul {
        background-color:#fff;
        box-shadow:3px 3px 8px rgba(0,0,0,0.2);
        position:relative;
        z-index:9999999999999;
    }
    #navigation ul li {
        height:50px;
        line-height:50px;
        padding-left:20px;
        border-bottom:1px solid #ddd;
        box-sizing:border-box;
        cursor: pointer;
        font-size:14px;
        font-weight:600;
        color:#333;
    }
    #navigation ul li:hover {
        background-color:#333;
    }
    #navigation ul li:hover a{
        display:block;
        color:#f6f6f6;
    }
    #navigation ul li:hover a::after {
        right:20px;
        opacity:1;
        transition:all 0.3s;
    }
    #navigation ul li a::after {
        content: "\f105";
        font-family: FontAwesome;
        position:absolute;
        right:30px;
        opacity:0;
    }
    #navigation ul li a {
        font-size:14px;
        color:#333;
    }
    #navigation .navi_btn {
        position:absolute;
        width:30px;
        height:30px;
        top:50%;
        transform:translateY(-50%);
        right:20px;   
        cursor: pointer;
    }
    #navigation .navi_btn.on span:after {
        content:"\f106";
    }
    #navigation .navi_btn span::after {
        content: "\f107";
        position: absolute;
        top:50%;
        transform:translateY(-50%);
        right: 0;
        font-family: FontAwesome;
        font-size:2.3em;
        opacity:0.8;
    }
    
    @media screen and (max-width:800px) {
        #navigation .inner {
            width:100%;
            height:50px;
            line-height:50px;
        }
        #navigation #navi_home {
            width:10%;
            padding:0;
        }
        #navigation #navi_home i {
            text-align: center;
            display: block;
            line-height:50px;
            font-size:2em;
        }
        #navigation .navi {
            width:45%;
        }
        #navigation .navi_btn span::after {
            font-size:1.8em;
        }

    }

    @media screen and (max-width:600px) {
        .visual .text_box h2 {
            font-size: 30px;
        }
    }
</style>

<!-- s:navigation -->
<div id="navigation">
    <div class="inner">
        <div id="navi_home">
            <a href="<?php echo G5_URL ?>">
                <i class="xi-home"></i></i>
            </a>
        </div>
        <div class="navi navi1">
            <p class="tit"><?php echo $g5['navTitle'];?></p>
            <div class="slide">
                <ul>
                    <?php
                        $menu_datas = get_menu_db(0, true);
                        $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                        $i = 0;
                        foreach( $menu_datas as $row ){
                            if( empty($row) ) continue;
                        $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                    ?>
                    <li <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" ><span><?php echo $row['me_name'] ?></span></a>
                    </li>
                    <?php
                        $i++;
                        }   //end foreach $row
                        if ($i == 0) {  ?>
                        <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 > 환경설정 > 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="navi_btn">
                <span>
                </span>
            </div>
        </div>
        
        <div class="navi navi2">
            <p class="tit"><?php echo $g5['title'];?></p>
            <div class="slide">
                <?php  include_once(G5_THEME_PATH.'/sub_navigation.php'); ?> 
            </div>
            <div class="navi_btn">
                <span>
                </span>
            </div>
        </div>
    </div>
</div>
<!-- e:navigation -->
<script>
    $(document).ready(function(){
        $('.navi').click(function(){   
            $(this).find('.navi_btn').toggleClass('on');
            $(this).find('.slide').slideToggle('on');
        }); 
    })
</script>
