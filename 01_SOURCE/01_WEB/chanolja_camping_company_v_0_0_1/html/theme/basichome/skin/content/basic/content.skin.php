<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo G5_THEME_URL?>/css/sub.css">
</head>
<style>
    .sec {
        width:100%;
    }
    .sec .inner {
        max-width:1240px;
        position:relative;
        margin:0 auto;
        padding:4% 0;
    }
</style>
<body>
    <div class="sub sub01" id="company">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <section class="sec sec1">
            <article class="inner" class="ctt_<?php echo $co_id; ?>">
                <div id="ctt_con">
                    <?php echo $str; ?>
                </div>
            </article>            
        </section>
    </div>
</body>
</html>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>