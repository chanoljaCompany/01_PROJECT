<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/session.php";
$mod_date = date("Y-m-d");
$mod_ip = $_SERVER['REMOTE_ADDR'];
$NBOARD_TB = "inquire_board";
$NBOARD_FILE_TB = "board_file";
$bo_write_level = "8";

$page = $_REQUEST["curpage"];
$wr_id_re = $_REQUEST["wr_id_re"];

$file_code = time();
if($session_userlevel < $bo_write_level) {
		alert('글쓰기 권한이 없습니다.');
}


function formatSize($bytes, $decimals = 2) {
  $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
  $factor = floor((strlen($bytes) - 1) / 3);
  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

function file_check($ext){
	// $ext = "php";
	$file_str = "php|htm|html|inc|htm|shtm|ztx|dot|cgi|pl|phtm|ph|exe";
	$ext = strtolower($ext);
	$file_str = strtolower($file_str);
	//업로드 금지 확장자 체크
	if(preg_match('/'.$file_str.'/i', $ext)) {
	  return false;
		exit;
	}
	  return true;
}

// $w == '' 라면 새글
// $w == 'u' 라면 글수정
// $w == 'r' 라면 답변글
// $w == 's' 라면 비밀글
// $w == 'ru' 라면 비밀글
$wr_subject = '';
if (isset($_POST['wr_subject'])) {
		$wr_subject = substr(trim($_POST['wr_subject']),0,255);
		$wr_subject = preg_replace("#[\\\]+$#", "", $wr_subject);
}
if ($wr_subject == '') {
		$msg[] = '<strong>제목</strong>을 입력하세요.';
}

$nboard_content = '';
if (isset($_POST['nboard_content'])) {
		$nboard_content = substr(trim($_POST['nboard_content']),0,65536);
		$nboard_content = preg_replace("#[\\\]+$#", "", $nboard_content);
}
if ($nboard_content == '') {
		$msg[] = '<strong>내용</strong>을 입력하세요.';
}

if ($w == 'u' || $w == 'r' || $w == 'ru') { //글수정,답변글일경우 해당글을 가져옴...
	  if($w == 'ru'){
			$wr = get_write($NBOARD_TB, $wr_id_re);
		}else{
			$wr = get_write($NBOARD_TB, $wr_id);
		}

		if (!$wr['wr_id']) {
				alert("글이 존재하지 않습니다.\\n글이 삭제되었거나 이동하였을 수 있습니다.");
		}
}
$secret = '';
if ($w == '' || $w == 'r') {	//새글,답변글일 경우
		if ($session_userid) { // 회원..관리자...
			 $mb_id = $session_userid;
			 $wr_name = addslashes(clean_xss_tags($session_username));
			 $wr_password = '';
			 $wr_email = addslashes($session_useremail);
			 $wr_homepage = addslashes(clean_xss_tags($session_userehomepage));
		} else {
			 $mb_id = '';
			 // 비회원의 경우 이름이 누락되는 경우가 있음
			 $wr_name = clean_xss_tags(trim($_POST['wr_name']));
			 if (!$wr_name)
					 alert('이름은 필히 입력하셔야 합니다.');
			 $wr_password = get_encrypt_string($wr_password);
			 $wr_email = get_email_address(trim($_POST['wr_email']));
			 $wr_homepage = clean_xss_tags($wr_homepage);
		}

					if ($w == 'r') {
							$reply_array = &$wr;
							echo "<br> ========print start========== <br>";
							print_r($reply_array);
							echo "<br> ==========print end======== <br>";
							// 답변의 원글이 비밀글이라면 비밀번호는 원글과 동일하게 넣는다.
							// if ($secret)
							// 		$wr_password = $wr['wr_password'];
									 // $wr_id = $reply_array . $reply;
									 $wr_num = $reply_array['wr_num'];
									 $wr_parent =  $reply_array['wr_id'];
									 $wr_reply = 'A';
									 $board_type = 'C';
									// $wr_reply = $reply;
					} else {
									$wr_num = get_next_num($NBOARD_TB);
									$wr_reply = '';
									// $wr_parent = $wr_id;
									$board_type = 'A';
					}

					$wr_seo_title = exist_seo_title_recursive('bbs', generate_seo_title($wr_subject), $NBOARD_TB, $wr_id);

					$sql = " INSERT INTO $NBOARD_TB
										SET wr_num = '$wr_num',
										wr_reply = '$wr_reply',
										wr_comment = 0,
										ca_name = '$ca_name',
										wr_option = '$html,$secret,$mail',
										wr_subject = '$wr_subject',
										wr_content = '$nboard_content',
										wr_seo_title = '$wr_seo_title',
										wr_link1 = '$wr_link1',
										wr_link2 = '$wr_link2',
										wr_link1_hit = 0,
										wr_link2_hit = 0,
										wr_hit = 0,
										wr_good = 0,
										wr_nogood = 0,
										mb_id = '{$session_userid}',
										wr_password = '$wr_password',
										wr_name = '$wr_name',
										wr_email = '$wr_email',
										wr_homepage = '$wr_homepage',
										wr_datetime = '".G5_TIME_YMDHIS."',
										wr_last = '".G5_TIME_YMDHIS."',
										wr_ip = '{$_SERVER['REMOTE_ADDR']}',
										wr_1 = '$wr_1',
										wr_2 = '$wr_2',
										wr_3 = '$wr_3',
										wr_4 = '$wr_4',
										wr_5 = '$wr_5',
										wr_6 = '$wr_6',
										wr_7 = '$wr_7',
										wr_8 = '$wr_8',
										wr_9 = '$wr_9',
										wr_10 = '$wr_10',
										board_type = '$board_type',
										pension_user_id = '$session_userid'
										";
					// echo "
					// <br>b : sql : $sql <br>
					// ";
					sql_query($sql);

					$wr_id = sql_insert_id();

				 // 부모 아이디에 UPDATE
				  if($w == 'r'){
							sql_query(" UPDATE $NBOARD_TB SET wr_parent = '$wr_parent' WHERE wr_id = '$wr_id' ");
							sql_query(" UPDATE $NBOARD_TB SET board_type = 'B' WHERE wr_id = '$wr_parent' ");
					}else{
							sql_query(" UPDATE $NBOARD_TB SET wr_parent = '$wr_id' WHERE wr_id = '$wr_id' ");
					}

					// echo "
					// <br>c : update $NBOARD_TB set wr_parent = '$wr_id' where wr_id = '$wr_id' <br>
					// ";
				 // 새글 INSERT
					sql_query(" INSERT INTO {$g5['board_new_table']} ( bo_table, wr_id, wr_parent, bn_datetime, mb_id ) VALUES ( '{$NBOARD_TB}', '{$wr_id}', '{$wr_id}', '".G5_TIME_YMDHIS."', '{$session_userid}' ) ");

				 // 게시글 1 증가
					sql_query("UPDATE {$g5['board_table']} SET bo_count_write = bo_count_write + 1 WHERE bo_table = '{$NBOARD_TB}'");
}//새글,답변글...
else if ($w == 'u') {//수정
     if ($session_userid) {
        // 자신의 글이라면
        if ($session_userid == $wr['mb_id']) {
            $mb_id = $session_userid;
            $wr_name = addslashes(clean_xss_tags($session_username));
            $wr_email = addslashes($session_useremail);
            $wr_homepage = addslashes(clean_xss_tags($session_userehomepage));
        } else {
            alert("글을 수정할수 없습니다.(작성자불일치1)");
        }
    } else {
        alert("글을 수정할수 없습니다.(작성자불일치2)");
    }

    $sql_ip = " , wr_ip = '{$_SERVER['REMOTE_ADDR']}' ";
    $sql = " UPDATE {$NBOARD_TB}
                SET ca_name = '{$ca_name}',
                     wr_option = '{$html},{$secret},{$mail}',
                     wr_subject = '{$wr_subject}',
                     wr_content = '{$nboard_content}',
                     wr_seo_title = '$wr_seo_title',
                     wr_link1 = '{$wr_link1}',
                     wr_link2 = '{$wr_link2}',
                     mb_id = '{$mb_id}',
                     wr_name = '{$wr_name}',
                     wr_email = '{$wr_email}',
                     wr_homepage = '{$wr_homepage}',
                     wr_1 = '{$wr_1}',
                     wr_2 = '{$wr_2}',
                     wr_3 = '{$wr_3}',
                     wr_4 = '{$wr_4}',
                     wr_5 = '{$wr_5}',
                     wr_6 = '{$wr_6}',
                     wr_7 = '{$wr_7}',
                     wr_8 = '{$wr_8}',
                     wr_9 = '{$wr_9}',
                     wr_10= '{$wr_10}'
                     {$sql_ip}
                     {$sql_password}
	              			WHERE wr_id = '{$wr['wr_id']}'
											AND pension_user_id = '$session_userid'
										 ";
    sql_query($sql);

    // 분류가 수정되는 경우 해당되는 코멘트의 분류명도 모두 수정함
    // 코멘트의 분류를 수정하지 않으면 검색이 제대로 되지 않음
    $sql = " UPDATE {$NBOARD_TB} SET ca_name = '{$ca_name}' WHERE wr_parent = '{$wr['wr_id']}' ";
    sql_query($sql);

    /*
    if ($notice) {
        //if (!preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board['bo_notice']))
        if (!in_array((int)$wr_id, $notice_array)) {
            $bo_notice = $wr_id . ',' . $board['bo_notice'];
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }
    } else {
        $bo_notice = '';
        for ($i=0; $i<count($notice_array); $i++)
            if ((int)$wr_id != (int)$notice_array[$i])
                $bo_notice .= $notice_array[$i] . ',';
        $bo_notice = trim($bo_notice);
        //$bo_notice = preg_replace("/^".$wr_id."[\n]?$/m", "", $board['bo_notice']);
        sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
    }
    */

    $bo_notice = board_notice($board['bo_notice'], $wr_id, $notice);
    sql_query(" UPDATE {$g5['board_table']} SET bo_notice = '{$bo_notice}' WHERE bo_table = '{$bo_table}' ");

    // 글을 수정한 경우에는 제목이 달라질수도 있으니 static variable 를 새로고침합니다.
    $write = get_write( $NBOARD_TB, $wr['wr_id'], false);
}

else if ($w == 'ru') {//답변글 수정
     if ($session_userid) {
        // 자신의 글이라면

        if ($session_userid == $wr['mb_id']) {
            $mb_id = $session_userid;
            $wr_name = addslashes(clean_xss_tags($session_username));
            $wr_email = addslashes($session_useremail);
            $wr_homepage = addslashes(clean_xss_tags($session_userehomepage));
        } else {
            alert("글을 수정할수 없습니다.(작성자불일치1)");
        }
    } else {
        alert("글을 수정할수 없습니다.(작성자불일치2)");
    }

    $sql_ip = " , wr_ip = '{$_SERVER['REMOTE_ADDR']}' ";
    $sql = " UPDATE {$NBOARD_TB}
                SET ca_name = '{$ca_name}',
                     wr_option = '{$html},{$secret},{$mail}',
                     wr_subject = '{$wr_subject}',
                     wr_content = '{$nboard_content}',
                     wr_seo_title = '$wr_seo_title',
                     wr_link1 = '{$wr_link1}',
                     wr_link2 = '{$wr_link2}',
                     mb_id = '{$mb_id}',
                     wr_name = '{$wr_name}',
                     wr_email = '{$wr_email}',
                     wr_homepage = '{$wr_homepage}',
                     wr_1 = '{$wr_1}',
                     wr_2 = '{$wr_2}',
                     wr_3 = '{$wr_3}',
                     wr_4 = '{$wr_4}',
                     wr_5 = '{$wr_5}',
                     wr_6 = '{$wr_6}',
                     wr_7 = '{$wr_7}',
                     wr_8 = '{$wr_8}',
                     wr_9 = '{$wr_9}',
                     wr_10= '{$wr_10}'
                     {$sql_ip}
                     {$sql_password}
              			 WHERE wr_id = '{$wr_id_re}'
										 AND pension_user_id = '$session_userid'
										  ";
    sql_query($sql);

echo "
<br> 답변수정 >>>> sql >>> $sql <br>
";
    // 분류가 수정되는 경우 해당되는 코멘트의 분류명도 모두 수정함
    // 코멘트의 분류를 수정하지 않으면 검색이 제대로 되지 않음
    // $sql = " update {$NBOARD_TB} set ca_name = '{$ca_name}' where wr_parent = '{$wr['wr_id']}' ";
    // sql_query($sql);

    /*
    if ($notice) {
        //if (!preg_match("/[^0-9]{0,1}{$wr_id}[\r]{0,1}/",$board['bo_notice']))
        if (!in_array((int)$wr_id, $notice_array)) {
            $bo_notice = $wr_id . ',' . $board['bo_notice'];
            sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
        }
    } else {
        $bo_notice = '';
        for ($i=0; $i<count($notice_array); $i++)
            if ((int)$wr_id != (int)$notice_array[$i])
                $bo_notice .= $notice_array[$i] . ',';
        $bo_notice = trim($bo_notice);
        //$bo_notice = preg_replace("/^".$wr_id."[\n]?$/m", "", $board['bo_notice']);
        sql_query(" update {$g5['board_table']} set bo_notice = '{$bo_notice}' where bo_table = '{$bo_table}' ");
    }
    */

    $bo_notice = board_notice($board['bo_notice'], $wr_id, $notice);
    sql_query(" UPDATE {$g5['board_table']} SET bo_notice = '{$bo_notice}' WHERE bo_table = '{$bo_table}' ");

    // 글을 수정한 경우에는 제목이 달라질수도 있으니 static variable 를 새로고침합니다.
    $write = get_write( $NBOARD_TB, $wr['wr_id'], false);
}


$upload_file_exist = $_FILES['upload']['name'][0];

if($upload_file_exist) { //파일이 있다면....
					foreach ($_FILES['upload']['name'] as $i => $name) {
					    $fileName = $_FILES['upload']['name'][$i];
							$fileSize = $_FILES['upload']['size'][$i];
					    $fileType = $_FILES['upload']['type'][$i];
					    $uploadFileArray = explode('.', $fileName);
							$file_ext = $uploadFileArray[1];
							$file_ext_check = file_check($uploadFileArray[1]);
// echo "
// file_ext_check >>> $file_ext_check <br>
// ";
							if($file_ext_check == '1') { //업로드가능파일 확장자...
											$saveFileName = abs(ip2long($_SERVER['REMOTE_ADDR'])).'_'.substr($shuffle,0,8).'_'.replace_filename($fileName);
											// $saveFileName = $saveFileName.'.'.$uploadFileArray[1];
//
// 											echo "
// saveFileName >>> $saveFileName <br>
// 											";
											$saveFile = $board_upload_dir.$saveFileName;
											if(move_uploaded_file($_FILES['upload']['tmp_name'][$i], $saveFile)) {
									        //데이터베이스 입력
													$sql = "INSERT INTO $NBOARD_FILE_TB
																	(pension_user_id,original_table , file_code , original_seq , v_fileName , o_fileName , cnt , file_size , mod_ip , mod_date)
																	VALUES
																	('$session_userid','$NBOARD_TB','$file_code','$wr_id','$fileName','$saveFileName','$cnt','$fileSize','$mod_ip','$mod_date')";
													$result = sql_query($sql);
									    }else{
												 //데이터베이스 입력 삭제
												 $str = "SELECT * FROM $NBOARD_FILE_TB
											           WHERE pension_user_id = '$session_userid'
																 AND file_code = '$file_code'
											          ";
											   $result = sql_query($str);
											   while ($rows_img = mysqli_fetch_array($result)) {
											     @unlink($board_upload_dir.$rows_img['o_fileName']); //이미지 삭제
											   }
											    //등록DB  삭제한다.
												 $sql = "DELETE FROM $NBOARD_FILE_TB  WHERE pension_user_id = '$session_userid' AND  file_code = '$file_code'";
						             $result = sql_query($sql);
												 alert('업로드 에러가 발생하였습니다.');
												 exit;
									    }
							}else{
								//데이터베이스 입력 삭제
								$str = "SELECT * FROM $NBOARD_FILE_TB
												WHERE pension_user_id = '$session_userid'
												AND file_code = '$file_code'
											 ";
								$result = sql_query($str);
								while ($rows_img = mysqli_fetch_array($result)) {
									@unlink($board_upload_dir.$rows_img['o_fileName']); //이미지 삭제
								}
								 //등록DB  삭제한다.
								$sql = "DELETE FROM $NBOARD_FILE_TB  WHERE pension_user_id = '$session_userid' AND  file_code = '$file_code'";
								$result = sql_query($sql);
								 alert('업로드 할수 없는 파일입니다.');
								exit;
							}
					}

					echo "<script>alert('문의하기를 등록/변경하였습니다.');</script>";
					echo "<meta http-equiv='Refresh' content='0; URL=nboard_list.php?top_menu_id=".$top_menu_id."&left_menu_id=".$left_menu_id."&curpage=".$page."'>";
					exit;
			}else{ //파일이 없다면...
					echo "<script>alert('문의하기를 등록/변경하였습니다.');</script>";
					echo "<meta http-equiv='Refresh' content='0; URL=nboard_list.php?top_menu_id=".$top_menu_id."&left_menu_id=".$left_menu_id."&curpage=".$page."'>";
					exit;
			}
?>
