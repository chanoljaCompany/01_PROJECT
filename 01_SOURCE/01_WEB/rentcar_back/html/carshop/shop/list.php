
<?php

include_once('./_common.php');

$ca_id = isset($_REQUEST['ca_id']) ? safe_replace_regex($_REQUEST['ca_id'], 'ca_id') : '';
$skin = isset($_REQUEST['skin']) ? safe_replace_regex($_REQUEST['skin'], 'skin') : '';

// 상품 리스트에서 다른 필드로 정렬을 하려면 아래의 배열 코드에서 해당 필드를 추가하세요.
if( isset($sort) && ! in_array($sort, array('it_name', 'it_sum_qty', 'it_price', 'it_use_avg', 'it_use_cnt', 'it_update_time')) ){
    $sort='';
}

if (G5_IS_MOBILE) {
    include_once(G5_MSHOP_PATH.'/list.php');
    return;
}

$sql = " select * from {$g5['g5_shop_category_table']} where ca_id = '$ca_id' and ca_use = '1'  ";
$ca = sql_fetch($sql);
if (! (isset($ca['ca_id']) && $ca['ca_id']))
    alert('등록된 분류가 없습니다.');

// 테마미리보기 스킨 등의 변수 재설정
if(defined('_THEME_PREVIEW_') && _THEME_PREVIEW_ === true) {
    $ca['ca_skin']       = (isset($tconfig['ca_skin']) && $tconfig['ca_skin']) ? $tconfig['ca_skin'] : $ca['ca_skin'];
    $ca['ca_img_width']  = (isset($tconfig['ca_img_width']) && $tconfig['ca_img_width']) ? $tconfig['ca_img_width'] : $ca['ca_img_width'];
    $ca['ca_img_height'] = (isset($tconfig['ca_img_height']) && $tconfig['ca_img_height']) ? $tconfig['ca_img_height'] : $ca['ca_img_height'];
    $ca['ca_list_mod']   = (isset($tconfig['ca_list_mod']) && $tconfig['ca_list_mod']) ? $tconfig['ca_list_mod'] : $ca['ca_list_mod'];
    $ca['ca_list_row']   = (isset($tconfig['ca_list_row']) && $tconfig['ca_list_row']) ? $tconfig['ca_list_row'] : $ca['ca_list_row'];
}

// 본인인증, 성인인증체크
if(!$is_admin && $config['cf_cert_use']) {
    $msg = shop_member_cert_check($ca_id, 'list');
    if($msg)
        alert($msg, G5_SHOP_URL);
}

$g5['title'] = $ca['ca_name'].' 상품리스트';

if ($ca['ca_include_head'] && is_include_path_check($ca['ca_include_head']))
    @include_once($ca['ca_include_head']);
else
    include_once(G5_SHOP_PATH.'/_head.php');

// 스킨경로
$skin_dir = G5_SHOP_SKIN_PATH;

if($ca['ca_skin_dir']) {
    if(preg_match('#^theme/(.+)$#', $ca['ca_skin_dir'], $match))
        $skin_dir = G5_THEME_PATH.'/'.G5_SKIN_DIR.'/shop/'.$match[1];
    else
        $skin_dir = G5_PATH.'/'.G5_SKIN_DIR.'/shop/'.$ca['ca_skin_dir'];

    if(is_dir($skin_dir)) {
        $skin_file = $skin_dir.'/'.$ca['ca_skin'];

        if(!is_file($skin_file))
            $skin_dir = G5_SHOP_SKIN_PATH;
    } else {
        $skin_dir = G5_SHOP_SKIN_PATH;
    }
}

define('G5_SHOP_CSS_URL', str_replace(G5_PATH, G5_URL, $skin_dir));

if ($is_admin)
    echo '<div class="sct_admin"><a href="'.G5_ADMIN_URL.'/shop_admin/categoryform.php?w=u&amp;ca_id='.$ca_id.'" class="btn_admin btn"><span class="sound_only">분류 관리</span><i class="fa fa-cog fa-spin fa-fw"></i></a></div>';
?>

<script>
var itemlist_ca_id = "<?php echo $ca_id; ?>";
</script>
<script src="<?php echo G5_JS_URL; ?>/shop.list.js"></script>







<!-- 상품 목록 시작 { -->

<div id="sct">
<!-- 카테고리 -->
<div class="left-page">
   <h2>차놀자렌터카</h2>
    <div class="menu_wr">
        
        <?php
        $mshop_ca_href = G5_SHOP_URL.'/list.php?ca_id=';
        $mshop_ca_res1 = sql_query(get_mshop_category('', 2));
        for($i=0; $mshop_ca_row1=sql_fetch_array($mshop_ca_res1); $i++) {
            if($i == 0)
                echo '<ul class="cate">'.PHP_EOL;
        ?> 
            <li>
                <a href="<?php echo $mshop_ca_href.$mshop_ca_row1['ca_id']; ?>"><?php echo get_text($mshop_ca_row1['ca_name']); ?></a>
                <?php
                $mshop_ca_res2 = sql_query(get_mshop_category($mshop_ca_row1['ca_id'], 4));
                if(sql_num_rows($mshop_ca_res2))
                    echo '<button class="sub_ct_toggle ct_op">'.get_text($mshop_ca_row1['ca_name']).' 하위분류 열기</button>'.PHP_EOL;

                for($j=0; $mshop_ca_row2=sql_fetch_array($mshop_ca_res2); $j++) {
                    if($j == 0)
                        echo '<ul class="sub_cate sub_cate1">'.PHP_EOL;
                ?>
                    <li>
                        <a href="<?php echo $mshop_ca_href.$mshop_ca_row2['ca_id']; ?>"><?php echo get_text($mshop_ca_row2['ca_name']); ?></a>
                        <?php
                        $mshop_ca_res3 = sql_query(get_mshop_category($mshop_ca_row2['ca_id'], 6));
                        if(sql_num_rows($mshop_ca_res3))
                            echo '<button type="button" class="sub_ct_toggle ct_op">'.get_text($mshop_ca_row2['ca_name']).' 하위분류 열기</button>'.PHP_EOL;

                        for($k=0; $mshop_ca_row3=sql_fetch_array($mshop_ca_res3); $k++) {
                            if($k == 0)
                                echo '<ul class="sub_cate sub_cate2">'.PHP_EOL;
                        ?>
                            <li>
                                <a href="<?php echo $mshop_ca_href.$mshop_ca_row3['ca_id']; ?>"><?php echo get_text($mshop_ca_row3['ca_name']); ?></a>
                                <?php
                                $mshop_ca_res4 = sql_query(get_mshop_category($mshop_ca_row3['ca_id'], 8));
                                if(sql_num_rows($mshop_ca_res4))
                                    echo '<button type="button" class="sub_ct_toggle ct_op">'.get_text($mshop_ca_row3['ca_name']).' 하위분류 열기</button>'.PHP_EOL;

                                for($m=0; $mshop_ca_row4=sql_fetch_array($mshop_ca_res4); $m++) {
                                    if($m == 0)
                                        echo '<ul class="sub_cate sub_cate3">'.PHP_EOL;
                                ?>
                                    <li>
                                        <a href="<?php echo $mshop_ca_href.$mshop_ca_row4['ca_id']; ?>"><?php echo get_text($mshop_ca_row4['ca_name']); ?></a>
                                        <?php
                                        $mshop_ca_res5 = sql_query(get_mshop_category($mshop_ca_row4['ca_id'], 10));
                                        if(sql_num_rows($mshop_ca_res5))
                                            echo '<button type="button" class="sub_ct_toggle ct_op">'.get_text($mshop_ca_row4['ca_name']).' 하위분류 열기</button>'.PHP_EOL;

                                        for($n=0; $mshop_ca_row5=sql_fetch_array($mshop_ca_res5); $n++) {
                                            if($n == 0)
                                                echo '<ul class="sub_cate sub_cate4">'.PHP_EOL;
                                        ?>
                                            <li>
                                                <a href="<?php echo $mshop_ca_href.$mshop_ca_row5['ca_id']; ?>"><?php echo get_text($mshop_ca_row5['ca_name']); ?></a>
                                            </li>
                                        <?php
                                        }

                                        if($n > 0)
                                            echo '</ul>'.PHP_EOL;
                                        ?>
                                    </li>
                                <?php
                                }

                                if($m > 0)
                                    echo '</ul>'.PHP_EOL;
                                ?>
                            </li>
                        <?php
                        }

                        if($k > 0)
                            echo '</ul>'.PHP_EOL;
                        ?>
                    </li>
                <?php
                }

                if($j > 0)
                    echo '</ul>'.PHP_EOL;
                ?>
            </li>
        <?php
        }

        if($i > 0)
            echo '</ul>'.PHP_EOL;
        else
            echo '<p>등록된 분류가 없습니다.</p>'.PHP_EOL;
        ?>
    </div>
</div>

<div class="right-page">

    <?php
    $nav_skin = $skin_dir.'/navigation.skin.php';
    if(!is_file($nav_skin))
        $nav_skin = G5_SHOP_SKIN_PATH.'/navigation.skin.php';
    include $nav_skin;

    // 상단 HTML
    echo '<div id="sct_hhtml1212121212">'.conv_content($ca['ca_head_html'], 1).'</div>';

    $cate_skin = $skin_dir.'/listcategory.skin.php';
    if(!is_file($cate_skin))
        $cate_skin = G5_SHOP_SKIN_PATH.'/listcategory.skin.php';
    include $cate_skin;

    // 상품 출력순서가 있다면
    if ($sort != "")
        $order_by = $sort.' '.$sortodr.' , it_order, it_id desc';
    else
        $order_by = 'it_order, it_id desc';

    $error = '<p class="sct_noitem">등록된 상품이 없습니다.</p>';



    // 리스트 스킨
    $skin_file = is_include_path_check($skin_dir.'/'.$ca['ca_skin']) ? $skin_dir.'/'.$ca['ca_skin'] : $skin_dir.'/list.10.skin.php';

    if (file_exists($skin_file)) {

		echo '<div id="sct_sortlst">';
        $sort_skin = $skin_dir.'/list.sort.skin.php';
        if(!is_file($sort_skin))
            $sort_skin = G5_SHOP_SKIN_PATH.'/list.sort.skin.php';
        include $sort_skin;

        // 상품 보기 타입 변경 버튼
        $sub_skin = $skin_dir.'/list.sub.skin.php';
        if(!is_file($sub_skin))
            $sub_skin = G5_SHOP_SKIN_PATH.'/list.sub.skin.php';
        include $sub_skin;
        echo '</div>';

        // 총몇개 = 한줄에 몇개 * 몇줄
        $items = $ca['ca_list_mod'] * $ca['ca_list_row'];
        // 페이지가 없으면 첫 페이지 (1 페이지)
        if ($page < 1) $page = 1;
        // 시작 레코드 구함
        $from_record = ($page - 1) * $items;

        $list = new item_list($skin_file, $ca['ca_list_mod'], $ca['ca_list_row'], $ca['ca_img_width'], $ca['ca_img_height']);
        $list->set_category($ca['ca_id'], 1);
        $list->set_category($ca['ca_id'], 2);
        $list->set_category($ca['ca_id'], 3);
        $list->set_is_page(true);
        $list->set_order_by($order_by);
        $list->set_from_record($from_record);
        $list->set_view('it_img', true);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_basic', true);
        $list->set_view('it_cust_price', true);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', true);
        $list->set_view('sns', true);
        echo $list->run();

        // where 된 전체 상품수
        $total_count = $list->total_count;
        // 전체 페이지 계산
        $total_page  = ceil($total_count / $items);
    }
    else
    {
        echo '<div class="sct_nofile">'.str_replace(G5_PATH.'/', '', $skin_file).' 파일을 찾을 수 없습니다.<br>관리자에게 알려주시면 감사하겠습니다.</div>';
    }

    $qstr1 = 'ca_id='.$ca_id;
    $qstr1 .='&amp;sort='.$sort.'&amp;sortodr='.$sortodr;
    echo get_paging($config['cf_write_pages'], $page, $total_page, $_SERVER['SCRIPT_NAME'].'?'.$qstr1.'&amp;page=');

    // 하단 HTML
    echo '<div id="sct_thtml">'.conv_content($ca['ca_tail_html'], 1).'</div>';

?>
</div>
</div>

<!-- } 상품 목록 끝 -->





<?php
if ($ca['ca_include_tail'] && is_include_path_check($ca['ca_include_tail']))
    @include_once($ca['ca_include_tail']);
else
    include_once(G5_SHOP_PATH.'/_tail.php');

echo "\n<!-- {$ca['ca_skin']} -->\n";