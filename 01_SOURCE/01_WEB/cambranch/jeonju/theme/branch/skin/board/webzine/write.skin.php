<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/open-iconic.css">', 0);
?>

<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/open-iconic.css">', 0);

// 날짜 계산 함수
function passing_time($datetime) {
	$time_lag = time() - strtotime($datetime);
	
	if($time_lag < 60) {
		$posting_time = "방금";
	} elseif($time_lag >= 60 and $time_lag < 3600) {
		$posting_time = floor($time_lag/60)."분 전";
	} elseif($time_lag >= 3600 and $time_lag < 86400) {
		$posting_time = floor($time_lag/3600)."시간 전";
	} elseif($time_lag >= 86400 and $time_lag < 2419200) {
		$posting_time = floor($time_lag/86400)."일 전";
	} else {
		$posting_time = date("y.m.d", strtotime($datetime));
	} 
	
	return $posting_time;
}
?>


<?php
$g5['title'] = "대메뉴2";
$g5['sub_title'] = "";

$g5['visual_tit'] = "웹진형";
$g5['visual_txt'] = "All progress takes place outside the comfort zone.";

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
        width:1240px;
        padding:5% 20px;
        position:relative;
        margin:0 auto;
    }
    .board_tit {
        display:block;
        font-size:1.4em;
        font-weight:bold;
        transform:translateY(20px);
    }
    .board_txt {
        display:block;
        width:500px;
        transform:translateY(40px);
    }
    .btn_bo_user {
        padding-bottom:50px;
    }
    .board_webzine {margin:0 0 50px; }
    .board_webzine caption {padding:0;font-size:0;line-height:0;overflow:hidden}
    .board_webzine thead th {padding:20px 0;font-weight:normal;text-align:center;height:40px}
    .board_webzine thead th input {vertical-align:top} /* middle 로 하면 게시판 읽기에서 목록 사용시 체크박스 라인 깨짐 */
    .board_webzine tfoot th, .board_webzine tfoot td {padding:10px 0;background:#d7e0e2;text-align:center}
    .board_webzine tbody th {padding:8px 0;border-bottom:1px solid #e8e8e8}
    .board_webzine tr {}
    .board_webzine tr:hover {box-shadow:3px 3px 5px rgba(0,0,0,0.5);}
    .board_webzine td {color:#666;padding:10px 5px;line-height:1.4em;height:200px; word-break:break-all}
    .board_webzine tbody tr:hover td {background:#3576c6; color:#fff; transition-duration:0.6s;}
    .board_webzine tbody tr:hover span {color:#fff; transition-duration:0.6s;}
    .board_webzine a:hover {text-decoration:underline}
</style>
<body>
    <div class="sub sub01" id="business01">
        <?php include_once(G5_THEME_PATH.'/head.php'); ?>
        <?php include_once(G5_THEME_PATH.'/sub/sub_visual.php');?>
        <div class="sub_tab">
            <div class="inner">
                <ul>
                    <li><a href="../bbs/board.php?bo_table=gallery2">갤러리형</a></li>
                    <li><a href="../bbs/board.php?bo_table=list">리스트형</a></li>
                    <li class="on"><a href="../bbs/board.php?bo_table=webzine">웹진형</a></li>
                </ul>
            </div>
        </div>
        <section class="sec sec1">
            <article class="inner">
            <!-- 게시물 작성/수정 시작 { -->
                <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
                <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
                <input type="hidden" name="w" value="<?php echo $w ?>">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                <input type="hidden" name="stx" value="<?php echo $stx ?>">
                <input type="hidden" name="spt" value="<?php echo $spt ?>">
                <input type="hidden" name="sst" value="<?php echo $sst ?>">
                <input type="hidden" name="sod" value="<?php echo $sod ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <?php
                $option = '';
                $option_hidden = '';
                if ($is_notice || $is_html || $is_secret || $is_mail) {
                    $option = '';
                    if ($is_notice) {
                        $option .= "\n".'<input type="checkbox" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'<label for="notice">공지</label>';
                    }

                    if ($is_html) {
                        if ($is_dhtml_editor) {
                            $option_hidden .= '<input type="hidden" value="html1" name="html">';
                        } else {
                            $option .= "\n".'<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'<label for="html">HTML</label>';
                        }
                    }

                    if ($is_secret) {
                        if ($is_admin || $is_secret==1) {
                            $option .= "\n".'<input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'<label for="secret">비밀글</label>';
                        } else {
                            $option_hidden .= '<input type="hidden" name="secret" value="secret">';
                        }
                    }

                    if ($is_mail) {
                        $option .= "\n".'<input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'<label for="mail">답변메일받기</label>';
                    }
                }

                echo $option_hidden;
                ?>

                    <?php if ($is_category) { ?>
                    <div class="bo_w_select write_div">
                        <label for="ca_name"  class="sound_only">분류<strong>필수</strong></label>
                        <select name="ca_name" id="ca_name" required>
                            <option value="">분류를 선택하세요</option>
                            <?php echo $category_option ?>
                        </select>
                    </div>
                    <?php } ?>

                    <div class="bo_w_info write_div">
                    <?php if ($is_name) { ?>
                        <label for="wr_name" class="sound_only">이름<strong>필수</strong></label>
                        <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="frm_input required" placeholder="이름">
                    <?php } ?>

                    <?php if ($is_password) { ?>
                        <label for="wr_password" class="sound_only">비밀번호<strong>필수</strong></label>
                        <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="frm_input <?php echo $password_required ?>" placeholder="비밀번호">
                    <?php } ?>

                    <?php if ($is_email) { ?>
                            <label for="wr_email" class="sound_only">이메일</label>
                            <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="frm_input email " placeholder="이메일">
                    <?php } ?>
                    </div>

                <?php if ($option) { ?>
                <div class="write_div">
                    <span class="sound_only">옵션</span>
                    <?php echo $option ?>
                </div>
                <?php } ?>

                <div class="bo_w_tit write_div">
                    <label for="wr_subject" class="sound_only">제목<strong>필수</strong></label>
                    
                    <div id="autosave_wrapper write_div">
                        <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="frm_input full_input required" size="50" maxlength="255" placeholder="제목">
                        <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                        <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                        <?php if($editor_content_js) echo $editor_content_js; ?>
                        <button type="button" id="btn_autosave" class="btn_frmline">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                        <div id="autosave_pop">
                            <strong>임시 저장된 글 목록</strong>
                            <ul></ul>
                            <div><button type="button" class="autosave_close">닫기</button></div>
                        </div>
                        <?php } ?>
                    </div>
                    
                </div>

                <div class="write_div">
                    <label for="wr_content" class="sound_only">내용<strong>필수</strong></label>
                    <div class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
                        <?php if($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <p id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</p>
                        <?php } ?>
                        <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                        <?php if($write_min || $write_max) { ?>
                        <!-- 최소/최대 글자 수 사용 시 -->
                        <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                        <?php } ?>
                    </div>
                    
                </div>

                <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
                <div class="bo_w_link write_div">
                    <label for="wr_link<?php echo $i ?>"><i class="oi oi-link-intact" aria-hidden="true"></i><span class="sound_only"> 링크  #<?php echo $i ?></span></label>
                    <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="frm_input full_input" size="50">
                </div>
                <?php } ?>

                <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
                <div class="bo_w_flie write_div">
                    <div class="file_wr write_div">
                        <label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i class="oi oi-cloud" aria-hidden="true"></i><span class="sound_only"> 파일 #<?php echo $i+1 ?></span></label>
                        <input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="frm_file" style="border:none; padding-top:2px;">
                    </div>
                    <?php if ($is_file_content) { ?>
                    <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input frm_input" size="50" placeholder="파일 설명을 입력해주세요.">
                    <?php } ?>

                    <?php if($w == 'u' && $file[$i]['file']) { ?>
                    <span class="file_del">
                        <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                    </span>
                    <?php } ?>
                    
                </div>
                <?php } ?>


                <?php if ($is_use_captcha) { //자동등록방지  ?>
                <div class="write_div">
                    <?php echo $captcha_html ?>
                </div>
                <?php } ?>


                <div class="btn_confirm write_div">
                    <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel btn">취소</a>
                    <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit btn">
                </div>
                


                </form>

                <script>
                <?php if($write_min || $write_max) { ?>
                // 글자수 제한
                var char_min = parseInt(<?php echo $write_min; ?>); // 최소
                var char_max = parseInt(<?php echo $write_max; ?>); // 최대
                check_byte("wr_content", "char_count");

                $(function() {
                    $("#wr_content").on("keyup", function() {
                        check_byte("wr_content", "char_count");
                    });
                });

                <?php } ?>
                function html_auto_br(obj)
                {
                    if (obj.checked) {
                        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
                        if (result)
                            obj.value = "html2";
                        else
                            obj.value = "html1";
                    }
                    else
                        obj.value = "";
                }

                function fwrite_submit(f)
                {
                    <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

                    var subject = "";
                    var content = "";
                    $.ajax({
                        url: g5_bbs_url+"/ajax.filter.php",
                        type: "POST",
                        data: {
                            "subject": f.wr_subject.value,
                            "content": f.wr_content.value
                        },
                        dataType: "json",
                        async: false,
                        cache: false,
                        success: function(data, textStatus) {
                            subject = data.subject;
                            content = data.content;
                        }
                    });

                    if (subject) {
                        alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
                        f.wr_subject.focus();
                        return false;
                    }

                    if (content) {
                        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
                        if (typeof(ed_wr_content) != "undefined")
                            ed_wr_content.returnFalse();
                        else
                            f.wr_content.focus();
                        return false;
                    }

                    if (document.getElementById("char_count")) {
                        if (char_min > 0 || char_max > 0) {
                            var cnt = parseInt(check_byte("wr_content", "char_count"));
                            if (char_min > 0 && char_min > cnt) {
                                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                                return false;
                            }
                            else if (char_max > 0 && char_max < cnt) {
                                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                                return false;
                            }
                        }
                    }

                    <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

                    document.getElementById("btn_submit").disabled = "disabled";

                    return true;
                }
                </script>
            </article> 
    </div>
</body>
</html>


<?php
include_once(G5_THEME_PATH.'/tail.php');
?>



<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>



<!-- 페이지 -->
<?php echo $write_pages;  ?>


<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->


