<?php
if (!defined('_GNUBOARD_')) exit; //개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
global $is_admin;

//$n_thumb_width = $list[$i]['wr_9']; //썸네일 가로 크기
//$n_thumb_height = $list[$i]['wr_10']; //썸네일 세로 크기
?>



<link rel="stylesheet" href="<?php echo $latest_skin_url; ?>/style.css">

<section class="n_gallery_wrap">

  <?php if (count($list) == 0) { //게시물이 없을 경우 ?>
  <div class="n_no_list">게시물이 없습니다.</div>
  <?php } else { //게시물이 있을 경우 ?>
  <ul class="n_thumb_youtube">
    <?php for ($i = 0; $i < count($list); $i++) { ?>
    <li style="width:<?php $list[$i]['wr_9'] ?>;height:<?php $list[$i]['wr_10'] ?>">
      <a>
      <?php
      $n_thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $list[$i]['wr_9'], $list[$i]['wr_10'] );
      $n_noimg = "$latest_skin_url/img/noimg.gif";
      if($n_thumb['src']) {
          $img_content = '<img src="'.$n_thumb['src'].'" width="'.$list[$i]['wr_9'].'" height="'.$list[$i]['wr_10'].'"   alt="'.$list[$i]['subject'].'" title="" class="thumbcontent"/><iframe width="'.$list[$i]['wr_9'].'" height="'.$list[$i]['wr_10'].'" src="https://www.youtube.com/embed/'.$list[$i]['wr_1'].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      } else {
	      $img_content = '<iframe width="'.$list[$i]['wr_9'].'" height="'.$list[$i]['wr_10'].'" src="https://www.youtube.com/embed/'.$list[$i]['wr_1'].'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
      }
      echo $img_content;
      ?>
      </a>
    </li>
    <?php } ?>
  </ul>
  <?php } ?>
</section>

<script>
$(function(){
    $('.thumbcontent').click(function(){
        $('.thumbcontent').hide(500);
    });
});
</script>
