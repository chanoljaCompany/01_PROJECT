<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

include_once(G5_THEME_PATH."/common/board.header.php");
?>

<style>
.cke_sc {display:none;}
</style>

    <!-- 게시물 작성/수정 시작 { -->
    <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>" class="form-horizontal form-bordered">
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
            $option .= "\n".'<div class="form-check form-check-inline"><label class="form-check-label"><input type="checkbox" class="form-check-input" id="notice" name="notice" value="1" '.$notice_checked.'>'."\n".'공지</label></div>';
        }

        if ($is_html) {
            if ($is_dhtml_editor) {
                $option_hidden .= '<input type="hidden" value="html1" name="html">';
            } else {
                $option .= "\n".'<div class="form-check form-check-inline"><label class="form-check-label"><input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="'.$html_value.'" '.$html_checked.'>'."\n".'HTML</label></div>';
            }
        }

        if ($is_secret) {
            if ($is_admin || $is_secret==1) {
                $option .= "\n".'<div class="form-check form-check-inline"><label class="form-check-label"><input type="checkbox" id="secret" name="secret" value="secret" '.$secret_checked.'>'."\n".'비밀글</label></div>';
            } else {
                $option_hidden .= '<input type="hidden" name="secret" value="secret">';
            }
        }

        if ($is_mail) {
            $option .= "\n".'<div class="form-check form-check-inline"><label class="form-check-label"><input type="checkbox" id="mail" name="mail" value="mail" '.$recv_email_checked.'>'."\n".'답변메일받기</label></div>';
        }
    }

    echo $option_hidden;
    ?>

    <?php if ($is_category) { ?>
    <div class="form-row">
        <div class="form-group col-lg-3">
    		<label for="ca_name">분류</label>
    		<select name="ca_name" id="ca_name" required class="form-control">
                <option value="">분류를 선택하세요</option>
                <?php echo $category_option ?>
            </select>
    	</div>
	</div>
    <?php } ?>

    <div class="bo_w_info write_div form-row">
        <?php if ($is_name) { ?>
        	<div class="form-group col-lg-3">
        	<label for="wr_name">이름</label>
        	<input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="form-control required" placeholder="이름">
        	</div>
        <?php } ?>
    
        <?php if ($is_password) { ?>
        	<div class="form-group col-lg-3">
	        	<label for="wr_password">비밀번호</label>
            	<input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="form-control <?php echo $password_required ?>" placeholder="비밀번호">
            </div>
        <?php } ?>
    
        <?php if ($is_email) { ?>
        	<div class="form-group col-lg-3">
        		<label for="wr_password">이메일</label>
                <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" placeholder="이메일">
            </div>
        <?php } ?>
    

    <?php if ($is_homepage) { ?>
    	<div class="form-group col-lg-3">
        	<label for="wr_homepage">홈페이지</label>
        	<input type="text" name="wr_homepage" value="<?php echo $homepage ?>" id="wr_homepage" class="form-control" size="50" placeholder="홈페이지">
    	</div>
    <?php } ?>
	</div>
    <?php if ($option) { ?>
    <div class="form-row">
    	<div class="form-group col">
            <?php echo $option ?>
        </div>    
    </div>
    <?php } ?>
	
	<div class="form-row">
		<div class="form-group col">
			<label for="wr_homepage">제목</label>
			<div id="autosave_wrapper write_div" class="input-group mb-3"">
                <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="form-control full_input required" size="50" maxlength="255" placeholder="제목">
                <span class="input-group-append">
                    <?php if ($is_member) { // 임시 저장된 글 기능 ?>
                    <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                    <?php if($editor_content_js) echo $editor_content_js; ?>
                    <button type="button" id="btn_autosave" class="btn btn-outline btn-primary">임시 저장된 글 (<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                    <?php } ?>
                </span>
            </div>
		</div>
	</div>
	
	<div class="form-row">
		<div class="form-group col">
			<div id="autosave_pop" style="display:none;" class="alert alert-default">
                <strong>임시 저장된 글 목록</strong><button type="button" class="autosave_close btn btn-xs btn-outline btn-quaternary float-right">닫기</button>
                <ul class="list-unstyled"></ul>
            </div>
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col">
			<label for="wr_content">내용</label>
            <div class="write_div">
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
        </div>
    </div>

    <?php for ($i=1; $is_link && $i<=G5_LINK_COUNT; $i++) { ?>
    <div class="form-row">
		<div class="form-group col">
		<label for="wr_link<?php echo $i ?>"><i class="fa fa-link" aria-hidden="true"></i> 링크  #<?php echo $i ?></label>
        <input type="text" name="wr_link<?php echo $i ?>" value="<?php if($w=="u"){echo$write['wr_link'.$i];} ?>" id="wr_link<?php echo $i ?>" class="form-control full_input" size="50">
    	</div>
	</div>
    <?php } ?>

    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
    <div class="form-row">
    	<div class="form-group col">
    		<div class="fileupload fileupload-new" data-provides="fileupload">
				<div class="input-append">
					<div class="uneditable-input">
						<i class="fa fa-download" aria-hidden="true"></i> 파일 #<?php echo $i+1 ?>
					</div>
					<span class="btn btn-default btn-file">
						<input type="file" name="bf_file[]" id="bf_file_<?php echo $i+1 ?>" title="파일첨부 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능">
					</span>
				</div>
			</div>
            <div>
                <?php if ($is_file_content) { ?>
                <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="full_input form-control" size="50" placeholder="파일 설명을 입력해주세요.">
                <?php } ?>
        
                <?php if($w == 'u' && $file[$i]['file']) { ?>
                <span class="file_del">
                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
                </span>
                <?php } ?>
            </div>
    	</div>
    </div>
    <?php } ?>


    <?php if ($is_use_captcha) { //자동등록방지  ?>
	<div class="form-row">    
    	<?php echo $captcha_html ?>
    </div>
    <?php } ?>


    <div class="btn_confirm write_div text-center">
        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn btn-outline btn-secondary">취소</a>
        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn btn-outline btn-primary">
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
<!-- } 게시물 작성/수정 끝 -->
<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>