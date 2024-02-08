<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<script type="text/javascript">
	$(function(){
		$(".big_photo").hide().first().show();
		$(".thumb_photo").css({"cursor":"pointer"}).click(function(){
			$index = $(".thumb_photo").index(this);
			$(".big_photo").hide().eq($index).show();
		});
	})
	
</script>
<!-- 게시물 읽기 시작 { -->

<article id="bo_v" style="width:<?php echo $width; ?>">
  <!--   <header>
        <h1 id="bo_v_title">
            <?php echo $view[ca_name]; ?>
        </h1>
    </header>

    <section id="bo_v_info">
        <h2>페이지 정보</h2>
        
    </section> -->

    <?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>

    <!-- 게시물 상단 버튼 시작 { -->
    <div id="bo_v_top">
        <?php ob_start(); ?>

        <ul class="btn_bo_user">
            <?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="bd_btn">수정<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="bd_btn" onclick="del(this.href); return false;">삭제<i class="fa fa-trash-o" aria-hidden="true"></i></a></li><?php } ?>
            <?php if ($delete_href) { ?><li><a href="<?php echo $list_href ?>" class="bd_btn">목록<i class="fa fa-list" aria-hidden="true"></i></a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="bd_btn" title="글쓰기">글쓰기<i class="fa fa-pencil" aria-hidden="true"></i></a></li><?php } ?>
        </ul>
        <?php
        $link_buttons = ob_get_contents();
        ob_end_flush();
        ?>
    </div>
    <!-- } 게시물 상단 버튼 끝 -->

    <section id="bo_v_atc">
        <h2 id="bo_v_atc_title">본문</h2>
        <!-- <div style="width:100%; padding-bottom:20px; font-size:20px; text-align:left; font-weight:bold; color:#333">
		<?php
            if ($category_name) echo $view['ca_name'].' | '; // 분류 출력 끝
            echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
            ?>
        
        
        </div> -->
        <div class="pd_v_box">
            <div class="photo_img"> 
            <?php
            // 파일 출력
            $v_img_count = count($view['file']);
            //print_r($view['file']);
            if($v_img_count) {
                echo "<div id=\"bo_v_img\" >".PHP_EOL;
                //print_r($view['file']);
                for ($i=0; $i<=count($view['file']); $i++) {
                    if ($view['file'][$i]['view']) {
                        $srcfile = "{$view['file'][$i]['path']}/{$view['file'][$i]['file']}";	
                        
                        $filename = $view['file'][$i]['file'];
                        $filepath = G5_DATA_PATH.'/file/'.$bo_table;
                        $width = 600;
                        $height = 380;	
                        
                        $thumb_file = thumbnail($filename, $filepath, $filepath, $width, $height, true, true);
                         
                         
                        echo "<div class='big_photo'>".PHP_EOL;
    
                        echo '<img src="'.G5_DATA_URL.'/file/'.$bo_table.'/'.$thumb_file.'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'"/>'.PHP_EOL;
                        echo "</div>".PHP_EOL;
                        
                    }
                }
    
                echo "</div>".PHP_EOL;
                echo "<div id=\"thumb\" >".PHP_EOL;
                for ($i=0; $i<=count($view['file']); $i++) {
                    if ($view['file'][$i]['view']) {
    
                        $filename = $view['file'][$i]['file'];
                        $filepath = G5_DATA_PATH.'/file/'.$bo_table;
                        $width = 78;
                        $height = 78;	
                        
                        $thumb_file = thumbnail($filename, $filepath, $filepath, $width, $height, true, true);
                         
    
                        echo "<div class='thumb_photo'>".PHP_EOL;
						echo "<li>".PHP_EOL;
                        echo '<img src="'.G5_DATA_URL.'/file/'.$bo_table.'/'.$thumb_file.'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'"/>'.PHP_EOL;
						echo "</li>".PHP_EOL;
                        echo "</div>".PHP_EOL;
                        
                    }
                }
    
                echo "</div>".PHP_EOL;
    
            }
             ?>
            </div>
            <div class="detail_tx"> 
                <h2 class="pd_name">
					<?php
                        echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
                    ?>
                </h2>
                <div class="pd_fea">
                    <!--<h4>Key Features</h4>-->
                    <p><?php echo nl2br($view['wr_1']) ?></p>
                </div>
                
                    <?php 
                    for($j=1;$j<=10;$j++){ 
                        if(!$board["bo_".$j."_subj"]){
                            continue;
                        }
                        $wr = "wr_".$j;								
                    ?> 
                <!-- <div style="padding-bottom:10px; border-bottom:1px solid #c6c6c6">
                    <p style=" color:#7e7e7e; line-height:40px; padding-left:15px"><?php echo $board["bo_".$j."_subj"]; ?></p>
                    <span style="font-size:16px; color:#343333; padding-left:15px; letter-spacing:-1px"><?php echo $view[$wr]; ?></span>
                </div> -->  
                    <?php
                    }
                    ?>
                    
            </div>
        </div>
        
        <!-- 본문 내용 시작 { -->
        <div id="bo_v_con">
        	<h2 class="bo_v_tit">상세정보</h2>
            <div class="con_wrap"><?php echo get_view_thumbnail($view['content']); ?></div>
        </div>
        <!-- } 본문 내용 끝 -->
        	
        
    </section>

    
    <a href="<?php echo $list_href ?>" class="btn_b01 btn" title="목록" id="bd_submit">목록</a>

    <?php if ($prev_href || $next_href) { ?>
    <ul class="bo_v_nb">
        <?php if ($prev_href) { ?><li class="btn_prv"><span class="nb_tit"><i class="fa fa-chevron-up" aria-hidden="true"></i> 이전글</span><a href="<?php echo $prev_href ?>"><?php echo $prev_wr_subject;?></a> </li><?php } ?>
        <?php if ($next_href) { ?><li class="btn_next"><span class="nb_tit"><i class="fa fa-chevron-down" aria-hidden="true"></i> 다음글</span><a href="<?php echo $next_href ?>"><?php echo $next_wr_subject;?></a>  </li><?php } ?>
    </ul>
    <?php } ?>

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->