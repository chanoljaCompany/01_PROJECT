<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
$thumb_width = 407;
$thumb_height = 195;
?>
	
<ul data-aos="fade-up" style="opacity:1;">
<?php
            for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

            if($thumb['src']) {
                $img = $thumb['src'];
            } else {
                $img = G5_IMG_URL.'/no_img.png';
                $thumb['alt'] = '이미지가 없습니다.';
            }
            $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
     ?>
            <li>
               <a href="<?php echo $list[$i]['href']?>">
               <?php echo $img_content?>
                <dl>
                    <dt>
                        <?php echo $list[$i]['subject']?>
                    </dt>
                    <dd>
                        <?php echo mb_strimwidth($list[$i]['wr_content'], '0', '500', '...', 'utf-8');?>
                    </dd>
                    <dd>
                        <?php echo date("Y-m-d", strtotime($list[$i]['wr_datetime'])) ?>
                    </dd>
                </dl>
               </a>
            </li>
        <?}?>
        <?php if (count($list) == 0) { //게시물이 없을 때  ?>
        <li class="empty_li">게시물이 없습니다.</li>
        <?php }  ?>

</ul>


<script src="<?=$latest_skin_url?>/js/slick.min.js"></script>
<script src="<?=$latest_skin_url?>/js/slick.js"></script>

