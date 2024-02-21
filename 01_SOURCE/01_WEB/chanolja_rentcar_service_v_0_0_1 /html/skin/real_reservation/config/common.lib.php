<?
// function sql_connect($host, $user, $pass, $db=G5_MYSQL_DB)
// {
//     global $g5;
//
//     if(function_exists('mysqli_connect') && G5_MYSQLI_USE) {
//         $link = mysqli_connect($host, $user, $pass, $db);
//
//         // 연결 오류 발생 시 스크립트 종료
//         if (mysqli_connect_errno()) {
//             die('Connect Error: '.mysqli_connect_error());
//         }
//     } else {
//         $link = mysql_connect($host, $user, $pass);
//     }
//
//     return $link;
// }
//
// // DB 선택
// function sql_select_db($db, $connect)
// {
//     global $g5;
//
//     if(function_exists('mysqli_select_db') && G5_MYSQLI_USE)
//         return @mysqli_select_db($connect, $db);
//     else
//         return @mysql_select_db($db, $connect);
// }
//
// function sql_set_charset($charset, $link=null)
// {
//     global $g5;
//
//     if(!$link)
//         $link = $g5['connect_db'];
//
//     if(function_exists('mysqli_set_charset') && G5_MYSQLI_USE)
//         mysqli_set_charset($link, $charset);
//     else
//         mysql_query(" set names {$charset} ", $link);
// }
//
// function sql_query($sql, $error=G5_DISPLAY_SQL_ERROR, $link=null)
// {
//     global $g5, $g5_debug;
//
//     if(!$link)
//         $link = $g5['connect_db'];
//
//     // Blind SQL Injection 취약점 해결
//     $sql = trim($sql);
//     // union의 사용을 허락하지 않습니다.
//     //$sql = preg_replace("#^select.*from.*union.*#i", "select 1", $sql);
//     $sql = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $sql);
//     // `information_schema` DB로의 접근을 허락하지 않습니다.
//     $sql = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $sql);
//
//     $is_debug = get_permission_debug_show();
//
//     $start_time = $is_debug ? get_microtime() : 0;
//
//     if(function_exists('mysqli_query') && G5_MYSQLI_USE) {
//         if ($error) {
//             $result = @mysqli_query($link, $sql) or die("<p>$sql<p>" . mysqli_errno($link) . " : " .  mysqli_error($link) . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
//         } else {
//             $result = @mysqli_query($link, $sql);
//         }
//     } else {
//         if ($error) {
//             $result = @mysql_query($sql, $link) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
//         } else {
//             $result = @mysql_query($sql, $link);
//         }
//     }
//
//     if($result && $is_debug) {
//         // 여기에 실행한 sql문을 화면에 표시하는 로직 넣기
//         $g5_debug['sql'][] = array(
//             'sql' => $sql,
//             'start_time' => $start_time,
//             'end_time' => get_microtime(),
//             );
//     }
//
//     return $result;
// }
//
// function get_permission_debug_show(){
//     global $member;
//
//     $bool = false;
//     if ( defined('G5_DEBUG') && G5_DEBUG ){
//         $bool = true;
//     }
//
//     return run_replace('get_permission_debug_show', $bool, $member);
// }
//
// function run_replace($tag, $arg = '') {
//
//     if( $hook = get_hook_class() ){
//
//         $args = array();
//
//         if (
//             is_array($arg)
//             &&
//             isset($arg[0])
//             &&
//             is_object($arg[0])
//             &&
//             1 == count($arg)
//         ) {
//           $args[] =& $arg[0];
//         } else {
//           $args[] = $arg;
//         }
//
//         $numArgs = func_num_args();
//
//         for ($a = 2; $a < $numArgs; $a++) {
//           $args[] = func_get_arg($a);
//         }
//
//         return $hook->apply_filters($tag, $args, false);
//     }
//
//     return null;
// }
//
// function get_hook_class() {
//
//     if( class_exists('GML_Hook') ){
//         return GML_Hook::getInstance();
//     }
//
//     return null;
// }
//
// function sql_insert_id($link=null)
// {
//     global $g5;
//
//     if(!$link)
//         $link = $g5['connect_db'];
//
//     if(function_exists('mysqli_insert_id') && G5_MYSQLI_USE)
//         return mysqli_insert_id($link);
//     else
//         return mysql_insert_id($link);
// }
//
// function sql_num_rows($result)
// {
//     if(function_exists('mysqli_num_rows') && G5_MYSQLI_USE)
//         return mysqli_num_rows($result);
//     else
//         return mysql_num_rows($result);
// }
// // 파일명 치환
// function replace_filename($name)
// {
//     @session_start();
//     $ss_id = session_id();
//     $usec = get_microtime();
//     $file_path = pathinfo($name);
//     $ext = $file_path['extension'];
//     $return_filename = sha1($ss_id.$_SERVER['REMOTE_ADDR'].$usec);
//     if( $ext )
//         $return_filename .= '.'.$ext;
//
//     return $return_filename;
// }
// function get_microtime()
// {
//     list($usec, $sec) = explode(" ",microtime());
//     return ((float)$usec + (float)$sec);
// }
// // XSS 관련 태그 제거
// function clean_xss_tags($str, $check_entities=0)
// {
//     $str_len = strlen($str);
//
//     $i = 0;
//     while($i <= $str_len){
//         $result = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
//
//         if( $check_entities ){
//             $result = str_replace(array('&colon;', '&lpar;', '&rpar;', '&NewLine;', '&Tab;'), '', $result);
//         }
//
//         $result = preg_replace('#([^\p{L}]|^)(?:javascript|jar|applescript|vbscript|vbs|wscript|jscript|behavior|mocha|livescript|view-source)\s*:(?:.*?([/\\\;()\'">]|$))#ius',
//                 '$1$2', $result);
//
//         if((string)$result === (string)$str) break;
//
//         $str = $result;
//         $i++;
//     }
//
//     return $str;
// }
//
// // XSS 관련 태그 제거
// function clean_xss_tags_sms($str)
// {
//     $str = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $str);
//
//     return $str;
// }
//
// // unescape nl 얻기
// function conv_unescape_nl($str)
// {
//     $search = array('\\r', '\r', '\\n', '\n');
//     $replace = array('', '', "\n", "\n");
//
//     return str_replace($search, $replace, $str);
// }
//
// // 발신번호 유효성 체크
// function check_vaild_callback($callback){
//    $_callback = preg_replace('/[^0-9]/','', $callback);
//
//    /**
//    * 1588 로시작하면 총8자리인데 7자리라 차단
//    * 02 로시작하면 총9자리 또는 10자리인데 11자리라차단
//    * 1366은 그자체가 원번호이기에 다른게 붙으면 차단
//    * 030으로 시작하면 총10자리 또는 11자리인데 9자리라차단
//    */
//
//    if( substr($_callback,0,4) == '1588') if( strlen($_callback) != 8) return false;
//    if( substr($_callback,0,2) == '02')   if( strlen($_callback) != 9  && strlen($_callback) != 10 ) return false;
//    if( substr($_callback,0,3) == '030')  if( strlen($_callback) != 10 && strlen($_callback) != 11 ) return false;
//
//    if( !preg_match("/^(02|0[3-6]\d|01(0|1|3|5|6|7|8|9)|070|080|007)\-?\d{3,4}\-?\d{4,5}$/",$_callback) &&
//        !preg_match("/^(15|16|18)\d{2}\-?\d{4,5}$/",$_callback) ){
//              return false;
//    } else if( preg_match("/^(02|0[3-6]\d|01(0|1|3|5|6|7|8|9)|070|080)\-?0{3,4}\-?\d{4}$/",$_callback )) {
//              return false;
//    } else {
//              return true;
//    }
// }
//
// // 게시판의 다음글 번호를 얻는다.
// function get_next_num($table)
// {
//     // 가장 작은 번호를 얻어
//     $sql = " select min(wr_num) as min_wr_num from $table ";
//     $row = sql_fetch($sql);
//     // 가장 작은 번호에 1을 빼서 넘겨줌
//     return (int)($row['min_wr_num'] - 1);
// }
// // 쿼리를 실행한 후 결과값에서 한행을 얻는다.
// function sql_fetch($sql, $error=G5_DISPLAY_SQL_ERROR, $link=null)
// {
//     global $g5;
//
//     if(!$link)
//         $link = $g5['connect_db'];
//
//     $result = sql_query($sql, $error, $link);
//     //$row = @sql_fetch_array($result) or die("<p>$sql<p>" . mysqli_errno() . " : " .  mysqli_error() . "<p>error file : $_SERVER['SCRIPT_NAME']");
//     $row = sql_fetch_array($result);
//     return $row;
// }
// // 결과값에서 한행 연관배열(이름으로)로 얻는다.
// function sql_fetch_array($result)
// {
//     if(function_exists('mysqli_fetch_assoc') && G5_MYSQLI_USE)
//         $row = @mysqli_fetch_assoc($result);
//     else
//         $row = @mysql_fetch_assoc($result);
//
//     return $row;
// }
// function exist_seo_title_recursive($type, $seo_title, $write_table, $sql_id=0) {
//
//     static $count = 0;
//
//
//
//     $seo_title_add = ($count > 0) ? utf8_strcut($seo_title, 200 - ($count+1), '')."-$count" : $seo_title;
//
//
//
//     if( ! exist_seo_url($type, $seo_title_add, $write_table, $sql_id) ){
//
//         return $seo_title_add;
//
//     }
//
//
//
//     $count++;
//
//
//
//     if( $count > 198 ){
//
//         return $seo_title_add;
//
//     }
//
//
//
//     return exist_seo_title_recursive($type, $seo_title, $write_table, $sql_id);
//
// }
// function generate_seo_title($string, $wordLimit=G5_SEO_TITEL_WORD_CUT){
//
//     $separator = '-';
//
//
//
//     if($wordLimit != 0){
//
//         $wordArr = explode(' ', $string);
//
//         $string = implode(' ', array_slice($wordArr, 0, $wordLimit));
//
//     }
//
//
//
//     $quoteSeparator = preg_quote($separator, '#');
//
//
//
//     $trans = array(
//
//         '&.+?;'                    => '',
//
//         '[^\w\d _-]'            => '',
//
//         '\s+'                    => $separator,
//
//         '('.$quoteSeparator.')+'=> $separator
//
//     );
//
//
//
//     $string = strip_tags($string);
//
//
//
//     if( function_exists('mb_convert_encoding') ){
//
//         $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
//
//     }
//
//
//
//     foreach ($trans as $key => $val){
//
//         $string = preg_replace('#'.$key.'#iu', $val, $string);
//
//     }
//
//
//
//     $string = strtolower($string);
//
//
//
//     return trim(trim($string, $separator));
//
// }
// function exist_seo_url($type, $seo_title, $write_table, $sql_id=0){
//
//     global $g5;
//
//
//
//     $exists_title = '';
//
//     $sql_id = preg_replace('/[^a-z0-9_\-]/i', '', $sql_id);
//
// 	// 영카트 상품코드의 경우 - 하이픈이 들어가야 함
//
//
//
//     if( $type === 'bbs' ){
//
//         $sql = "select wr_seo_title FROM {$write_table} WHERE wr_seo_title = '".sql_real_escape_string($seo_title)."' AND wr_id <> '$sql_id' limit 1";
//
//         $row = sql_fetch($sql);
//
//
//
//         $exists_title = $row['wr_seo_title'];
//
//
//
//     } else if ( $type === 'content' ){
//
//
//
//         $sql = "select co_seo_title FROM {$write_table} WHERE co_seo_title = '".sql_real_escape_string($seo_title)."' AND co_id <> '$sql_id' limit 1";
//
//         $row = sql_fetch($sql);
//
//
//
//         $exists_title = $row['co_seo_title'];
//
//
//
//     } else {
//
//         return run_replace('exist_check_seo_title', $seo_title, $type, $write_table, $sql_id);
//
//     }
//
//
//
//     if ($exists_title)
//
//         return 'is_exists';
//
//     else
//
//         return '';
//
// }
// function sql_real_escape_string($str, $link=null)
// {
//     global $g5;
//
//     if(!$link)
//         $link = $g5['connect_db'];
//
//     if(function_exists('mysqli_connect') && G5_MYSQLI_USE) {
//         return mysqli_real_escape_string($link, $str);
//     }
//
//     return mysql_real_escape_string($str, $link);
// }
// function utf8_strcut( $str, $size, $suffix='...' )
// {
//     if( function_exists('mb_strlen') && function_exists('mb_substr') ){
//
//         if(mb_strlen($str)<=$size) {
//             return $str;
//         } else {
//             $str = mb_substr($str, 0, $size, 'utf-8');
//             $str .= $suffix;
//         }
//
//     } else {
//         $substr = substr( $str, 0, $size * 2 );
//         $multi_size = preg_match_all( '/[\x80-\xff]/', $substr, $multi_chars );
//
//         if ( $multi_size > 0 )
//             $size = $size + intval( $multi_size / 3 ) - 1;
//
//         if ( strlen( $str ) > $size ) {
//             $str = substr( $str, 0, $size );
//             $str = preg_replace( '/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str );
//             $str .= $suffix;
//         }
//     }
//
//     return $str;
// }
//
// // 게시판 테이블에서 하나의 행을 읽음
// function get_write($write_table, $wr_id, $is_cache=false)
// {
//     global $g5, $g5_object;
//
//     $wr_bo_table = preg_replace('/^'.preg_quote($g5['write_prefix']).'/i', '', $write_table);
//     // $write = $g5_object->get('bbs', $wr_id, $wr_bo_table);
//     // if( !$write || $is_cache == false ){
//         $sql = " select * from {$write_table} where wr_id = '{$wr_id}' ";
//         $write = sql_fetch($sql);
//
//         // $g5_object->set('bbs', $wr_id, $write, $wr_bo_table);
//     // }
//
//     return $write;
// }
//
// function board_notice($bo_notice, $wr_id, $insert=false)
// {
//     $notice_array = explode(",", trim($bo_notice));
//
//     if($insert && in_array($wr_id, $notice_array))
//         return $bo_notice;
//
//     $notice_array = array_merge(array($wr_id), $notice_array);
//     $notice_array = array_unique($notice_array);
//     foreach ($notice_array as $key=>$value) {
//         if (!trim($value))
//             unset($notice_array[$key]);
//     }
//     if (!$insert) {
//         foreach ($notice_array as $key=>$value) {
//             if ((int)$value == (int)$wr_id)
//                 unset($notice_array[$key]);
//         }
//     }
//     return implode(",", $notice_array);
// }
// // 제목을 변환
// function conv_subject($subject, $len, $suffix='')
// {
//     return get_text(cut_str($subject, $len, $suffix));
// }
// // TEXT 형식으로 변환
// function get_text($str, $html=0, $restore=false)
// {
//     $source[] = "<";
//     $target[] = "&lt;";
//     $source[] = ">";
//     $target[] = "&gt;";
//     $source[] = "\"";
//     $target[] = "&#034;";
//     $source[] = "\'";
//     $target[] = "&#039;";
//
//     if($restore)
//         $str = str_replace($target, $source, $str);
//
//     // 3.31
//     // TEXT 출력일 경우 &amp; &nbsp; 등의 코드를 정상으로 출력해 주기 위함
//     if ($html == 0) {
//         $str = html_symbol($str);
//     }
//
//     if ($html) {
//         $source[] = "\n";
//         $target[] = "<br/>";
//     }
//
//     return str_replace($source, $target, $str);
// }
//
// function cut_str($str, $len, $suffix="…")
// {
//     $arr_str = preg_split("//u", $str, -1, PREG_SPLIT_NO_EMPTY);
//     $str_len = count($arr_str);
//
//     if ($str_len >= $len) {
//         $slice_str = array_slice($arr_str, 0, $len);
//         $str = join("", $slice_str);
//
//         return $str . ($str_len > $len ? $suffix : '');
//     } else {
//         $str = join("", $arr_str);
//         return $str;
//     }
// }
//
// function html_symbol($str)
// {
//     return preg_replace("/\&([a-z0-9]{1,20}|\#[0-9]{0,3});/i", "&#038;\\1;", $str);
// }
// function run_event($tag, $arg = ''){
//
//     if( $hook = get_hook_class() ){
//
//         $args = array();
//
//         if (
//             is_array($arg)
//             &&
//             isset($arg[0])
//             &&
//             is_object($arg[0])
//             &&
//             1 == count($arg)
//         ) {
//           $args[] =& $arg[0];
//         } else {
//           $args[] = $arg;
//         }
//
//         $numArgs = func_num_args();
//
//         for ($a = 2; $a < $numArgs; $a++) {
//           $args[] = func_get_arg($a);
//         }
//
//         $hook->doAction($tag, $args, false);
//     }
// }
// // 에디터 이미지 얻기
// function get_editor_image($contents, $view=true)
// {
// if(!$contents)
// return false;
// // $contents 중 img 태그 추출
// if ($view)
// $pattern = "/<img([^>]*)>/iS";
// else
// $pattern = "/<img[^>]*src=[\'\"]?([^>\'\"]+[^>\'\"]+)[\'\"]?[^>]*>/i";
// preg_match_all($pattern, $contents, $matchs);
// return $matchs;
// }
//
// function delete_editor_image($content_imgurl)
// {
//    // echo "delete_editor_image >>>  $content_imgurl";
//    @unlink($content_imgurl); //이미지 삭제
// }
//
// function formatSize($bytes, $decimals = 2) {
//   $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
//   $factor = floor((strlen($bytes) - 1) / 3);
//   return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
// }
//
// function compress_image($source_url, $destination_url, $quality)
// {
//     $info = getimagesize($source_url);
//     if ($info['mime'] == 'image/jpeg') {
//       $image = imagecreatefromjpeg($source_url);
//       imagejpeg($image, $destination_url, $quality);
//     }
//     elseif ($info['mime'] == 'image/gif') {
//       $image = imagecreatefromgif($source_url);
//       imagegif($image, $destination_url);
//     }
//     elseif ($info['mime'] == 'image/png') {
//        $image = imagecreatefrompng($source_url);
//        imagepng($image, $destination_url);
//     }
//
// }
//
// function file_check($ext){
// 	// $ext = "php";
// 	$file_str = "php|htm|html|inc|htm|shtm|ztx|dot|cgi|pl|phtm|ph|exe";
// 	$ext = strtolower($ext);
// 	$file_str = strtolower($file_str);
// 	//업로드 금지 확장자 체크
// 	if(preg_match('/'.$file_str.'/i', $ext)) {
// 	  return false;
// 		exit;
// 	}
// 	  return true;
// }
//
// function image_file_delete($file_location,$upload_file_name){
//   @unlink($file_location.$upload_file_name); //이미지 삭제
// }
//
// function resize_image($file, $newfile, $w, $h) {
// 		list($width, $height) = getimagesize($file);
// 		if(strpos(strtolower($file), ".jpg"))
// 			 $src = imagecreatefromjpeg($file);
// 		else if(strpos(strtolower($file), ".png"))
// 			 $src = imagecreatefrompng($file);
// 		else if(strpos(strtolower($file), ".gif"))
// 			 $src = imagecreatefromgif($file);
// 		$dst = imagecreatetruecolor($w, $h);
// 		imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
// 		if(strpos(strtolower($newfile), ".jpg"))
// 			 imagejpeg($dst, $newfile);
// 		else if(strpos(strtolower($newfile), ".png"))
// 			 imagepng($dst, $newfile);
// 		else if(strpos(strtolower($newfile), ".gif"))
// 			 imagegif($dst, $newfile);
//  }
//
 function json_output($ret_code,$ret_code_msg){
     $return_array = array();
     $row_array['ret_code'] = $ret_code;
     $row_array['ret_code_msg'] = $ret_code_msg;
     array_push($return_array, $row_array);
     header('Content-Type: application/json; charset=utf8');
     $json = json_encode(array("dataret"=>$return_array));
     // echo $json;
     // exit;
     return $json;
   }

/*예약*/

function get_holiday($year,$month,$day) {
  $year = intval($year);
  $month = intval($month);
  $day = intval($day);

  $nmonth = sprintf('%02d', $month);
  $nday = sprintf('%02d', $day);
  $nextday = date("Y-m-d", strtotime($year.$nmonth.$nday." +1 day"));
  $nextdayArr = explode("-",$nextday);
  $nyear = intval($nextdayArr['0']);
  $nmonth = intval($nextdayArr['1']);
  $nday = intval($nextdayArr['2']);
  //다음날이 공휴일인지 체크...
  $sql = "select name from holiday where year = '$nyear' and month = '$nmonth' and day = '$nday' ";
  $result = sql_query($sql);
  $next_total_count = sql_num_rows($result);


  //당일....
  $sql = "select name from holiday where year = '$year' and month = '$month' and day = '$day' ";
  $result = sql_query($sql);
  $total_count = sql_num_rows($result);

  // $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));

  if($yoil == '0' || $yoil == '6') {
     $day_name = '주말';
  }else{
     $day_name = '평일';
  }
  $return_val = $total_count."^".$day_name."^".$yoil."^".$next_total_count;

  return $return_val;
}

function get_peakday($year,$month,$day){
  $year = intval($year);
  $month = intval($month);
  $day = intval($day);
  $sql = "SELECT name FROM holiday WHERE year = '$year' AND month = '$month' AND day = '$day' ";
  $result = sql_query($sql);
  $total_count = sql_num_rows($result);
  // $yoil_ko = array("일","월","화","수","목","금","토");
  $yoil = date('w', strtotime($year."-".$month."-".$day));

  if($yoil == '0' || $yoil == '6') {
     $day_name = '주말';
  }else{
     $day_name = '평일';
  }
  $return_val = $total_count."^".$day_name."^".$yoil;
  return $return_val;
}

  function get_manager($manger_level){
    global $SALES_MEMBERS_TB;

    $sql = "SELECT *
            FROM $SALES_MEMBERS_TB
    				WHERE 1=1
            AND user_level = '$manger_level'
            AND approve = 'Y'
    				ORDER BY seq DESC
    				";
    $result = sql_query($sql);
    $manager_data_array = array();
        while ($rows = mysqli_fetch_array($result)) {
        	      $mgData = array(
        	  							'seq' => $rows['seq'],
        	  							'userid' => $rows['userid'],
        	  							'manager_name' => $rows['manager_name'],
        	                'user_level' => $rows['user_level']
        	  		);
        	  	array_push($manager_data_array, $mgData);
      }
      return $manager_data_array;
  }

// function move_logout(){
//   global $subUrl;
//   echo "<script>alert('올바르지 않은 로그인 정보입니다.');</script>";
//   echo "<meta http-equiv='Refresh' content='0; URL=$subUrl/config/logout.php?top_menu_id=logout&left_menu_id=logout'>";
//   exit;
// }

function get_number($value){
  $get_Num = preg_replace("/[^0-9]*/s", "", $value);
  return $get_Num;
}

// function get_max_customer_code($value)
// {
//     global $CUSTOMER_TB;
//     // 가장 작은 번호를 얻어
//     if($value == 'T'){
//         $sql = " SELECT max(customer_userid) AS max_customer_userid FROM $CUSTOMER_TB ";
//         $row = sql_fetch($sql);
//         $max_customer_userid = $row['max_customer_userid'];
//         $max_customer_userid++;
//     }else{
//       $sql = " SELECT customer_userid FROM $CUSTOMER_TB WHERE customer_userid = '$value'";
//       $row = sql_fetch($sql);
//       $max_customer_userid = $row['max_customer_userid'];
//       $max_customer_userid++;
//     }
//     // 가장 작은 번호에 1을 빼서 넘겨줌
//     return $max_customer_userid;
// }

function get_max_file_code($value)
{
    global $CUSTOMER_TB;
    // 가장 작은 번호를 얻어
    if($value == 'T'){
        $sql = " SELECT max(file_no) AS max_file_no FROM $CUSTOMER_TB ";
        $row = sql_fetch($sql);
        $max_file_no = $row['max_file_no'];
        $max_file_no++;
    }else{
      $sql = " SELECT customer_userid FROM $CUSTOMER_TB WHERE customer_userid = '$value'";
      $row = sql_fetch($sql);
      $max_customer_userid = $row['max_customer_userid'];
      $max_customer_userid++;
    }
    // 가장 작은 번호에 1을 빼서 넘겨줌
    return $max_file_no;
}

// function get_manager_userid($value){
//   global $SALES_MEMBERS_TB;
//
//   $sql = "SELECT userid FROM $SALES_MEMBERS_TB WHERE manager_name = '$value'";
//   $result = sql_query($sql);
//   $row = mysqli_fetch_array($result);
//
//   return $row['userid'];
//
// }

// 아이코드 사용자정보
// function get_icode_userinfo($id, $pass)
// {
//     $res = get_sock('http://www.icodekorea.com/res/userinfo.php?userid='.$id.'&userpw='.$pass);
//     $res = explode(';', $res);
//     $userinfo = array(
//         'code'      => $res[0], // 결과코드
//         'coin'      => $res[1], // 고객 잔액 (충전제만 해당)
//         'gpay'      => $res[2], // 고객의 건수 별 차감액 표시 (충전제만 해당)
//         'payment'   => $res[3]  // 요금제 표시, A:충전제, C:정액제
//     );
//
//     return $userinfo;
// }

// get_sock 함수 대체
// if (!function_exists("get_sock")) {
//     function get_sock($url)
//     {
//         // host 와 uri 를 분리
//         //if (ereg("http://([a-zA-Z0-9_\-\.]+)([^<]*)", $url, $res))
//         if (preg_match("/http:\/\/([a-zA-Z0-9_\-\.]+)([^<]*)/", $url, $res))
//         {
//             $host = $res[1];
//             $get  = $res[2];
//         }
//
//         // 80번 포트로 소캣접속 시도
//         $fp = fsockopen ($host, 80, $errno, $errstr, 30);
//         if (!$fp)
//         {
//             //die("$errstr ($errno)\n");
//
//             echo "$errstr ($errno)\n";
//             return null;
//         }
//         else
//         {
//             fputs($fp, "GET $get HTTP/1.0\r\n");
//             fputs($fp, "Host: $host\r\n");
//             fputs($fp, "\r\n");
//
//             // header 와 content 를 분리한다.
//             while (trim($buffer = fgets($fp,1024)) != "")
//             {
//                 $header .= $buffer;
//             }
//             while (!feof($fp))
//             {
//                 $buffer .= fgets($fp,1024);
//             }
//         }
//         fclose($fp);
//
//         // content 만 return 한다.
//         return $buffer;
//     }
// }

// 한페이지에 보여줄 행, 현재페이지, 총페이지수, URL
// function get_paging($write_pages, $cur_page, $total_page, $url, $add="")
// {
//     //$url = preg_replace('#&amp;page=[0-9]*(&amp;page=)$#', '$1', $url);
//     $url = preg_replace('#&amp;page=[0-9]*#', '', $url) . '&amp;page=';
//
//     $str = '';
//     if ($cur_page > 1) {
//         $str .= '<a href="'.$url.'1'.$add.'" class="pg_page pg_start">처음</a>'.PHP_EOL;
//     }
//
//     $start_page = ( ( (int)( ($cur_page - 1 ) / $write_pages ) ) * $write_pages ) + 1;
//     $end_page = $start_page + $write_pages - 1;
//
//     if ($end_page >= $total_page) $end_page = $total_page;
//
//     if ($start_page > 1) $str .= '<a href="'.$url.($start_page-1).$add.'" class="pg_page pg_prev">이전</a>'.PHP_EOL;
//
//     if ($total_page > 1) {
//         for ($k=$start_page;$k<=$end_page;$k++) {
//             if ($cur_page != $k)
//                 $str .= '<a href="'.$url.$k.$add.'" class="pg_page">'.$k.'<span class="sound_only">페이지</span></a>'.PHP_EOL;
//             else
//                 $str .= '<span class="sound_only">열린</span><strong class="pg_current">'.$k.'</strong><span class="sound_only">페이지</span>'.PHP_EOL;
//         }
//     }
//
//     if ($total_page > $end_page) $str .= '<a href="'.$url.($end_page+1).$add.'" class="pg_page pg_next">다음</a>'.PHP_EOL;
//
//     if ($cur_page < $total_page) {
//         $str .= '<a href="'.$url.$total_page.$add.'" class="pg_page pg_end">맨끝</a>'.PHP_EOL;
//     }
//
//     if ($str)
//         return "<nav class=\"pg_wrap\"><span class=\"pg\">{$str}</span></nav>";
//     else
//         return "";
// }

// function get_selected($field, $value)
// {
//     return ($field==$value) ? ' selected="selected"' : '';
// }
//
// function alert_back($value)
// {
//   echo "<script>alert('".$value."');history.back();</script>";
//   exit;
// }
//
// // 이메일 주소 추출
// function get_email_address($email)
// {
//     preg_match("/[0-9a-z._-]+@[a-z0-9._-]{4,}/i", $email, $matches);
//
//     return isset($matches[0]) ? $matches[0] : '';
// }

// function sql_password($value)
// {
//     // mysql 4.0x 이하 버전에서는 password() 함수의 결과가 16bytes
//     // mysql 4.1x 이상 버전에서는 password() 함수의 결과가 41bytes
//     $row = sql_fetch(" select password('$value') as pass ");
//
//     return $row['pass'];
// }
//
// // 문자열 암호화
// function get_encrypt_string($str)
// {
//     if(defined('G5_STRING_ENCRYPT_FUNCTION') && G5_STRING_ENCRYPT_FUNCTION) {
//         $encrypt = call_user_func(G5_STRING_ENCRYPT_FUNCTION, $str);
//     } else {
//         $encrypt = sql_password($str);
//     }
//
//     return $encrypt;
// }

function get_management_value()
{
  global $MANAGEMENT_TB;
  $sql_manage = "SELECT *	FROM $MANAGEMENT_TB";
//   echo "
// sql_manage >>> $sql_manage <br>
//   ";
  $result_manage = sql_query($sql_manage);
  $manage_array = array();
    while ($rows_manage = mysqli_fetch_array($result_manage)) {
      $arrData_manage =
               array(
                'seq' => $rows_manage['seq'],
                'homepage_subject' => $rows_manage['homepage_subject'],
                'company_name' => $rows_manage['company_name'],
                'ceo_name' => $rows_manage['ceo_name'],
                'email' => $rows_manage['email'],
                'address' => $rows_manage['address'],
                'address_detail' => $rows_manage['address_detail'],
                'saup_number' => $rows_manage['saup_number'],
                'phone_number' => $rows_manage['phone_number'],
                'account_name' => $rows_manage['account_name'],
                'account_number' => $rows_manage['account_number'],
                'account_holder' => $rows_manage['account_holder'],
                'cellphone' => $rows_manage['cellphone'],
                // 'working_hours' => $rows_manage['working_hours'],
                // 'holiday' => $rows_manage['holiday'],
                // 'kakao_chat_url' => $rows_manage['kakao_chat_url'],
                // 'ictmarket_url' => $rows_manage['ictmarket_url'],
                // 'google_anal_code' => $rows_manage['google_anal_code'],
                // 'detail_subject' => $rows_manage['detail_subject'],
                // 'detail_content' => $rows_manage['detail_content'],
                // 'detail_subject_1' => $rows_manage['detail_subject_1'],
                // 'detail_content_1' => $rows_manage['detail_content_1'],
                // 'mobile_main_subject' => $rows_manage['mobile_main_subject'],
                // 'saup_num' => $rows_manage['saup_num'],
                // 'online_market_number' => $rows_manage['online_market_number']
               );
               array_push($manage_array, $arrData_manage);
        }
          return $manage_array;
}

function get_setting_value()
{
  global $SETTING_TB;
  $sql_setting = "SELECT *	FROM $SETTING_TB";
  $result_setting = sql_query($sql_setting);
  $setting_array = array();
    while ($rows_setting = mysqli_fetch_array($result_setting)) {
      $arrData_setting =
               array(
                'seq' => $rows_setting['seq'],
                'field' => $rows_setting['field'],
                'field_pro' => $rows_setting['field_pro'],
                'field_search' => $rows_setting['field_search'],
                'time' => $rows_setting['time'],
                'price' => $rows_setting['price'],
                'reward' => $rows_setting['reward'],
                'coin_tel' => $rows_setting['coin_tel'],
                'counsel_tel' => $rows_setting['counsel_tel'],
                'nv_url' => $rows_setting['nv_url'],
                'fb_url' => $rows_setting['fb_url'],
                'ig_url' => $rows_setting['ig_url'],
                'join_point' => $rows_setting['join_point'],
                'review_point' => $rows_setting['review_point'],
                'review_best_point' => $rows_setting['review_best_point'],
                'privacy' => $rows_setting['privacy'],
                'policy' => $rows_setting['policy']
               );
               array_push($setting_array, $arrData_setting);
        }
        return $setting_array;
}

// function get_counselors_data($counselors_code)
// {
//   global $db,$MEMBERS_COUNSELORS_TB;
//   $sql = "SELECT  *
//           FROM $MEMBERS_COUNSELORS_TB
//           WHERE 1=1
//           AND counselors_code = '$counselors_code'
//           ";
// //   echo "
// // sql > $sql <br>
// //   ";
//   $result = sql_query($sql);
//   $rows = mysqli_fetch_array($result);
//   return $rows;
// }


// function get_lately_data($counselors_userid,$callPage) //상담원3개월간의 평점
// {
//   global $db,$RBOARD_TB;
//
//   if($callPage == 'ppt16') $strChar = "54";
//   if($callPage == 'ppt12') $strChar = "110";
//   if($callPage == 'index') $strChar = "60";
//
//   $sql_review = "SELECT *,
//                   DATE_FORMAT(wr_datetime, '%y-%m-%d') AS wr_datetime_str,
//                   (SELECT count(wr_id)  FROM $RBOARD_TB WHERE wr_3 = '$counselors_userid' AND wr_1 >= '5' AND wr_datetime BETWEEN DATE_ADD( NOW( ) , INTERVAL -3 MONTH ) AND NOW( )) as starNm ,
//                   (SELECT count(wr_id)  FROM $RBOARD_TB WHERE wr_3 = '$counselors_userid' AND wr_datetime BETWEEN DATE_ADD( NOW( ) , INTERVAL -3 MONTH ) AND NOW( )) as reviewNm
//                   FROM $RBOARD_TB
//                   WHERE wr_3 = '$counselors_userid'
//                   order by wr_datetime desc
//                   LIMIT 0,3";
//                   // echo " sql_review > $sql_review <br>";
//   $result_review = sql_query($sql_review);
//   $array_review = array();
//     while ($rows_review = mysqli_fetch_array($result_review)) {
//       $arrData_review =
//                array(
//                 'wr_id' => $rows_review['wr_id'],
//                 'wr_subject' => mb_strimwidth(strip_tags($rows_review['wr_subject']),0,$strChar,"..."),
//                 'wr_content' => mb_strimwidth(strip_tags($rows_review['wr_content']),0,$strChar,"..."),
//                 'wr_name' => $rows_review['wr_name'],
//                 'wr_3' => $rows_review['wr_3'],
//                 'starNm' => $rows_review['starNm'],
//                 'reviewNm' => $rows_review['reviewNm'],
//                 'wr_datetime_str' => $rows_review['wr_datetime_str']
//                );
//                array_push($array_review, $arrData_review);
//         }
//         return $array_review;
// }
//
// function get_lately_review_data() //3개월간의 후기
// {
//   global $db,$RBOARD_TB;
//   $sql_review = "SELECT IFNULL(sum(wr_1), '0') AS starNm,
//                   IFNULL(count(wr_1), '0')  AS reviewNm,
//                   count(case when wr_1 = '5' then 1 end) as fivestar,
//               		count(case when wr_1 = '4' then 1 end) as fourstar,
//               		count(case when wr_1 = '3' then 1 end) as threestar,
//               		count(case when wr_1 = '2' then 1 end) as twostar,
//               		count(case when wr_1 = '1' then 1 end) as onestar
//                  FROM $RBOARD_TB
//                  WHERE 1=1
//                  AND wr_datetime BETWEEN DATE_ADD( NOW( ) , INTERVAL -3 MONTH ) AND NOW( )
//                   ";
//   $result_review = sql_query($sql_review);
//   $rows_review = mysqli_fetch_array($result_review);
//   return $rows_review;
// }
//
// function get_lately_cselor_review_data($counselors_userid) //3개월간의 후기
// {
//   global $db,$RBOARD_TB;
//   $sql_review = "SELECT IFNULL(sum(wr_1), '0') AS starNm,
//                   IFNULL(count(wr_1), '0')  AS reviewNm,
//                   count(case when wr_1 = '5' then 1 end) as fivestar,
//               		count(case when wr_1 = '4' then 1 end) as fourstar,
//               		count(case when wr_1 = '3' then 1 end) as threestar,
//               		count(case when wr_1 = '2' then 1 end) as twostar,
//               		count(case when wr_1 = '1' then 1 end) as onestar
//                  FROM $RBOARD_TB
//                  WHERE 1=1
//                  AND wr_3 = '".$counselors_userid."'
//                  AND wr_datetime BETWEEN DATE_ADD( NOW( ) , INTERVAL -3 MONTH ) AND NOW( )
//                   ";
// //                   echo "
// // sql_review > $sql_review <br>
// //                   ";
//   $result_review = sql_query($sql_review);
//   $rows_review = mysqli_fetch_array($result_review);
//   return $rows_review;
// }
//
// function get_con_inquire_board($counselors_userid) //상담원별 문의건수
// {
//   global $db,$CIBOARD_TB;
//   $sql_review = "SELECT COUNT(*) AS Total
//                  FROM $CIBOARD_TB
//                  WHERE 1=1
//                  AND wr_2 = '".$counselors_userid."'
//                   ";
//   $result_review = sql_query($sql_review);
//   $rows_review = mysqli_fetch_array($result_review);
//   return $rows_review;
// }
//
// function get_customer_data($value,$column) {
//   global $db,$SALES_MEMBERS_TB;
//
//       $sql = "SELECT *
//               FROM $SALES_MEMBERS_TB
//               WHERE 1=1
//               AND $column = '".$value."'";
//
//   $result = sql_query($sql);
//   $row = mysqli_fetch_array($result);
//   return $row;
//
// }

// function mtnpointProc($BUYERPHONE,$AMOUNT){ //mtn포인트충전
//   $EVENTTYPE = "4";
//   $postUrl = "http://pay.korea-ssl.com/free12/?BUYERPHONE=".$BUYERPHONE."&AMOUNT=".$AMOUNT."&EVENTTYPE=".$EVENTTYPE;
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL, $postUrl);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch, CURLOPT_POST, 1);
//   $output = curl_exec($ch); // 데이터 요청 후 수신
//   $jsonData = json_decode($output, true);
//   $Result = $jsonData['Result'];
//   return $Result;
// }

// function get_mtn_remain_pay($BUYERPHONE){ //mtn잔액조회
//   global $COMPANYID;
//   $postUrl = "http://pay.korea-ssl.com/money/?PHONE=".$BUYERPHONE."&companyid=".$COMPANYID;
// //   echo "
// // postUrl > $postUrl <br>
// //   ";
//   $ch = curl_init();
//   curl_setopt($ch, CURLOPT_URL, $postUrl);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//   curl_setopt($ch, CURLOPT_POST, 1);
//   $output = curl_exec($ch); // 데이터 요청 후 수신
//   $jsonData = json_decode($output, true);
// //   echo "
// // jsonData > $jsonData <br>
// //   ";
//   $Result = $jsonData['Result'];
//   $Money = $jsonData['Money'];
//   //time 2000
//   // $jsonData['Money'] = "null";
//   $remain_time = floor($jsonData['Money']/2000);
//   $row_array['Result'] = $Result;
//   $row_array['Money'] = $Money;
//   $row_array['Remain_time'] = $remain_time;
//
//   return $row_array;
// }

function get_alimtalk_data(){ //알림톡
  global $db,$ALIMTALK_SETTING_TB;
  $sql = "SELECT *
          FROM $ALIMTALK_SETTING_TB
          WHERE 1=1
          AND seq = '1'
        ";
  $result = sql_query($sql);
  $row = mysqli_fetch_array($result);
  return $row;
}

// function get_con_inquire_data($counselors_userid){ //상담문의
//   global $db,$CIBOARD_TB;
//   $sql = "SELECT *
//           FROM $CIBOARD_TB
//           WHERE 1=1
//           AND wr_2 = '".$counselors_userid."'
//           ORDER BY wr_id desc
//         ";
//   $result = sql_query($sql);
//   $array = array();
//     while ($rows = mysqli_fetch_array($result)) {
//       $arrData =
//                array(
//                 'wr_id' => $rows['wr_id'],
//                 'wr_content' => $rows['wr_content'],
//                 're_content' => $rows['re_content'],
//                 'wr_datetime' => $rows['wr_datetime'],
//                 'mb_id' => $rows['mb_id'],
//                 'wr_1' => $rows['wr_1'],
//                 'wr_2' => $rows['wr_2'],
//                 'wr_3' => $rows['wr_3'],
//                 'wr_4' => $rows['wr_4']
//                );
//                array_push($array, $arrData);
//         }
//         return $array;
// }
//
// function get_banner_pc_data(){ //pc배너
//   global $db,$MAIN_PC_BANNER_TB;
//   $sql = "SELECT *
//           FROM $MAIN_PC_BANNER_TB
//           WHERE 1=1
//         ";
//   $rows = sql_fetch($sql);
//   return $rows;
// }
// function get_banner_mo_data(){ //모바일배너
//   global $db,$MAIN_MO_BANNER_TB;
//   $sql = "SELECT *
//           FROM $MAIN_MO_BANNER_TB
//           WHERE 1=1
//         ";
//   $rows = sql_fetch($sql);
//   return $rows;
// }

function mangement_array($target){
      global $MANAGEMENT_RESERVE_TB,$SITENAME;
      if($target == 'client'){
         $userStr = $SITENAME;
      }else{
         $userStr = $_SESSION['session_user_id'];
      }

      $sql = "SELECT * FROM
              $MANAGEMENT_RESERVE_TB
              WHERE user_id = '".$userStr."'";
      $result = sql_query($sql);
      $mangement_rows = sql_fetch_array($result);
      return $mangement_rows;
}

// function mangement_array_client(){
//       global $MANAGEMENT_RESERVE_TB;
//       $MANAGEMENT_RESERVE_TB = "management_reserve";
//       $sql = "SELECT * FROM
//               $MANAGEMENT_RESERVE_TB
//               WHERE user_id = 'somang73'";
//       $result = sql_query($sql);
//       $mangement_rows = sql_fetch_array($result);
//       return $mangement_rows;
// }

// function room_info_array($get_guestroom_code) {
//   // global $_SESSION['session_user_id'];
//   global $GUESTROOM_INFO_TB;
//   $sub_qry = "";
//   if($get_guestroom_code) $sub_qry = "AND guestroom_code = '".$get_guestroom_code."'";
//   $sql = " SELECT *	FROM $GUESTROOM_INFO_TB
//            WHERE user_id = '".$_SESSION['session_user_id']."'
//            AND post_show = 'Y'
//            $sub_qry
//            ";
//
//    // echo " room_info_array >> sql >>> $sql <br>";
//   $result = sql_query($sql);
//     $room_info_array = array();
//     while ($rows = sql_fetch_array($result)) {
//       $arrData = array(
//                 'guestroom_code' => $rows['guestroom_code'],
//                 'guestroom_name' => $rows['guestroom_name'],
//                 'guestroom_personnel' => $rows['guestroom_personnel'],
//                 'guestroom_max_personnel' => $rows['guestroom_max_personnel'],
//                 'guestroom_extra_charge' => $rows['guestroom_extra_charge'],
//                 'guestroom_low_season_fee_weekday' => $rows['guestroom_low_season_fee_weekday'],
//                 'guestroom_low_season_fee_weekend' => $rows['guestroom_low_season_fee_weekend'],
//                 'guestroom_low_season_fee_holiday' => $rows['guestroom_low_season_fee_holiday'],
//                 'guestroom_peak_season_fee_weekday' => $rows['guestroom_peak_season_fee_weekday'],
//                 'guestroom_peak_season_fee_weekend' => $rows['guestroom_peak_season_fee_weekend'],
//                 'guestroom_peak_season_fee_holiday' => $rows['guestroom_peak_season_fee_holiday'],
//                 'guestroom_semi_peak_season_fee_weekday' => $rows['guestroom_semi_peak_season_fee_weekday'],
//                 'guestroom_semi_peak_season_fee_weekend' => $rows['guestroom_semi_peak_season_fee_weekend'],
//                 'guestroom_semi_peak_season_fee_holiday' => $rows['guestroom_semi_peak_season_fee_holiday']
//                  );
//       array_push($room_info_array, $arrData);
//     }
//     return $room_info_array;
// }
function room_info_array($get_guestroom_code,$target) {
  global $GUESTROOM_INFO_TB,$GUESTROOM_IMAGE_INFO_TB,$SITENAME;
  $sub_qry = "";
  if($target == 'client'){
     $userStr = $SITENAME;
  }else{
     $userStr = $_SESSION['session_user_id'];
  }
  if($get_guestroom_code) $sub_qry = "AND guestroom_code = '".$get_guestroom_code."'";

$sql = "SELECT DISTINCT A.* , B.guestroom_image_name
        FROM $GUESTROOM_INFO_TB AS A
        INNER  JOIN $GUESTROOM_IMAGE_INFO_TB AS B ON B.guestroom_code = A.guestroom_code
        WHERE A.user_id = '".$userStr."'
        AND A.post_show = 'Y'
        AND A.guestroom_del_whether = 'N'
        ";
    $result = sql_query($sql);
    $room_info_array = array();
    while ($rows = sql_fetch_array($result)) {
      $arrData = array(
                'guestroom_code' => $rows['guestroom_code'],
                'guestroom_name' => $rows['guestroom_name'],
                'guestroom_personnel' => $rows['guestroom_personnel'],
                'guestroom_max_personnel' => $rows['guestroom_max_personnel'],
                'guestroom_extra_charge' => $rows['guestroom_extra_charge'],
                'guestroom_low_season_fee_weekday' => $rows['guestroom_low_season_fee_weekday'],
                'guestroom_low_season_fee_weekend' => $rows['guestroom_low_season_fee_weekend'],
                'guestroom_low_season_fee_holiday' => $rows['guestroom_low_season_fee_holiday'],
                'guestroom_peak_season_fee_weekday' => $rows['guestroom_peak_season_fee_weekday'],
                'guestroom_peak_season_fee_weekend' => $rows['guestroom_peak_season_fee_weekend'],
                'guestroom_peak_season_fee_holiday' => $rows['guestroom_peak_season_fee_holiday'],
                'guestroom_semi_peak_season_fee_weekday' => $rows['guestroom_semi_peak_season_fee_weekday'],
                'guestroom_semi_peak_season_fee_weekend' => $rows['guestroom_semi_peak_season_fee_weekend'],
                'guestroom_semi_peak_season_fee_holiday' => $rows['guestroom_semi_peak_season_fee_holiday'],
                'guestroom_image_name' => $rows['guestroom_image_name']
                 );
      array_push($room_info_array, $arrData);
    }
    return $room_info_array;
}
function get_date($year,$month,$day){
  $reserve_year = intval($year);
  $reserve_month = sprintf('%02d', $month);
  $reserve_day = sprintf('%02d', $day);
  $result_data = $reserve_year.$reserve_month.$reserve_day;
  return $result_data;
}
function get_weekend($reserve_date,$start,$end){
  //선택일자의 요일..
  $yoil = date('w', strtotime($reserve_date));
//   echo "
// <br>yoil >>> $yoil <br>
//   ";
  if($yoil == '0') $yoil = "7";
  if($yoil >= $start && $yoil <= $end){
     $yoil = "1"; //주말
  }else{
     $yoil = "0"; //평일
  }
  return $yoil;
}
function get_date_dash($year,$month,$day){
  $reserve_year = intval($year);
  $reserve_month = sprintf('%02d', $month);
  $reserve_day = sprintf('%02d', $day);
  $result_data = $reserve_year."-".$reserve_month."-".$reserve_day;
  return $result_data;
  // $reserve_year = intval($year);
  // $reserve_month = sprintf('%02d', $month);
  // $reserve_day = sprintf('%02d', $day);
  // $result_data = $reserve_year.$reserve_month.$reserve_day;
  // return $result_data;
}
function get_peakday_search($array_data,$date,$str) {
    // global $peak_data_array,$mangement_rows;
    // echo "date >>> $date <br> <br>";
    // echo "get_peakday_search <br>";
    // print_r($array_data);
      $restring = "0";
      if($array_data){
            $strIndex = array_search($date, $array_data);
            $restring = "";

            if($strIndex !== false) {
             $restring = "1";
            }else{
             $restring = "0";
            }
        }
        return $restring;
}

function guestroom_fee_func($room_info_array,$mangement_array,$guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday) {
  $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'][0]);
  $holiday_set = explode(",",$mangement_array['weekend_fee_set'][1]);
  $weekendDay = "";
  // echo "
  // holiday >>> $holiday <br>
  // holidayPrvday >>> $holidayPrvday <br>
  // holiday_before_set >>> $holiday_before_set <br>
  // holiday_set >>> $holiday_set <br>
  // ";

  if($peakdaycheck) { //성수기..
      $guestroom_fee_ho = "guestroom_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_peak_season_fee_weekday"; //평일
  }
  else if($semi_peakdaycheck) { //준성수기..
      $guestroom_fee_ho = "guestroom_semi_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_semi_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_semi_peak_season_fee_weekday"; //평일
  }
  else{
      $guestroom_fee_ho = "guestroom_low_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_low_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_low_season_fee_weekday"; //평일
  }

  $guestroom_fee = "";
  // if($peakdaycheck) { //성수기..
    if($holiday == '1') {   //휴일
      // echo "공휴일====== <br>";
      if($holiday_set == 'B'){ //공휴일 주말요금적용시
        // echo "공휴일 주말요금설정====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
      }else{
        // echo "공휴일 주말요금설정하지않음====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_ho];
      }
    }
    else {
        // echo "공휴일 아님====== <br>";
        if($mangement_array['weekend_whether'] == 'Y') { //주말요금사용
        // echo "주말요금설정====== <br>";
          if($j == '0' || $j == '6'){//주말
        // echo "주말..토/일요일====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
          }
          else { //평일
            // echo "평일 ====== <br>";
            $weekendStart = $mangement_array['weekend_setting_start'];
            $weekendEnd = $mangement_array['weekend_setting_end'];
            for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
              $weekendDay .= $i.",";
            }
            $weekendDay = substr($weekendDay, 0, -1);
            $weekendDayArr = explode(",",$weekendDay);
            // print_r($weekendDayArr);
            $arrIndex = array_search($j, $weekendDayArr);
            if($arrIndex !== false){ //사용자 주말설정..
            // echo "사용자 주말설정 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }else{
            // echo "사용자 주말설정 없음 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            }
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
              // echo "공휴일 전날 주말요금적용 ====== <br>";
            // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
            if($holidayPrvday == '1'){
              // echo "공휴일 전날 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }
            // else{
            //   echo "공휴일 전날 아님 ====== <br>";
            //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            // }
          }
        }
      }
        else if($mangement_array['weekend_whether'] == 'N') { //주말요금사용안함
            // echo "주말요금사용안함 ====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
                // echo "공휴일 전날 주말요금적용 ====== <br>";
                // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                if($holidayPrvday == '1'){
                    // echo "공휴일 전날 ====== <br>";
                  $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
                }
                // else{
                //   echo "공휴일 전날 아님 ====== <br>";
                //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
                // }
              }else{
                // echo "공휴일 전날 주말요금적용 안함 ====== <br>";
                $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
              }
        }
     }
  return number_format($guestroom_fee)."원";
}

function guestroom_fee_func2($guestroom_reserve_date,$peakdaycheck,$semi_peakdaycheck,$holiday,$j,$key,$holidayPrvday){
  global $room_info_array,$mangement_rows;
  $holiday_before_set = explode(",",$mangement_array['weekend_fee_set'][0]);
  $holiday_set = explode(",",$mangement_array['weekend_fee_set'][1]);
  $weekendDay = "";
  // echo "
  // holiday >>> $holiday <br>
  // holidayPrvday >>> $holidayPrvday <br>
  // holiday_before_set >>> $holiday_before_set <br>
  // holiday_set >>> $holiday_set <br>
  // ";

  if($peakdaycheck) { //성수기..
      $guestroom_fee_ho = "guestroom_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_peak_season_fee_weekday"; //평일
  }
  else if($semi_peakdaycheck) { //성수기..
      $guestroom_fee_ho = "guestroom_semi_peak_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_semi_peak_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_semi_peak_season_fee_weekday"; //평일
  }
  else{
      $guestroom_fee_ho = "guestroom_low_season_fee_holiday"; //공휴일
      $guestroom_fee_we = "guestroom_low_season_fee_weekend"; //주말
      $guestroom_fee_wk = "guestroom_low_season_fee_weekday"; //평일
  }

  $guestroom_fee = "";
  // if($peakdaycheck) { //성수기..
    if($holiday == '1') {   //휴일
      // echo "공휴일====== <br>";
      if($holiday_set == 'B'){ //공휴일 주말요금적용시
        // echo "공휴일 주말요금설정====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
      }else{
        // echo "공휴일 주말요금설정하지않음====== <br>";
        $guestroom_fee = $room_info_array[$key][$guestroom_fee_ho];
      }
    }
    else {
        // echo "공휴일 아님====== <br>";
        if($mangement_rows['weekend_whether'] == 'Y') { //주말요금사용
        // echo "주말요금설정====== <br>";
          if($j == '0' || $j == '6'){//주말
        // echo "주말..토/일요일====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
          }
          else { //평일
            // echo "평일 ====== <br>";
            $weekendStart = $mangement_rows['weekend_setting_start'];
            $weekendEnd = $mangement_rows['weekend_setting_end'];
            for($i = $weekendStart; $i <= $weekendEnd ; $i++) {
              $weekendDay .= $i.",";
            }
            $weekendDay = substr($weekendDay, 0, -1);
            $weekendDayArr = explode(",",$weekendDay);
            // print_r($weekendDayArr);
            $arrIndex = array_search($j, $weekendDayArr);
            if($arrIndex !== false){ //사용자 주말설정..
            // echo "사용자 주말설정 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }else{
            // echo "사용자 주말설정 없음 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            }
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
              // echo "공휴일 전날 주말요금적용 ====== <br>";
            // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
            if($holidayPrvday == '1'){
              // echo "공휴일 전날 ====== <br>";
              $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
            }
            // else{
            //   echo "공휴일 전날 아님 ====== <br>";
            //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            // }
          }
        }
      }
        else if($mangement_rows['weekend_whether'] == 'N') { //주말요금사용안함
            // echo "주말요금사용안함 ====== <br>";
            $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
            if($holiday_before_set == 'A') { // 공휴일 전날 주말요금적용
                // echo "공휴일 전날 주말요금적용 ====== <br>";
                // $guestroom_fee = $room_info_array[$key]['guestroom_peak_season_fee_weekend'];
                if($holidayPrvday == '1'){
                    // echo "공휴일 전날 ====== <br>";
                  $guestroom_fee = $room_info_array[$key][$guestroom_fee_we];
                }
                // else{
                //   echo "공휴일 전날 아님 ====== <br>";
                //   $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
                // }
              }else{
                // echo "공휴일 전날 주말요금적용 안함 ====== <br>";
                $guestroom_fee = $room_info_array[$key][$guestroom_fee_wk];
              }
        }
     }
  return number_format($guestroom_fee)."원";
}

function peak_data_array($year,$month,$str) {
  global $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB,$MANAGEMENT_RESERVE_PEAK_DATE_TB;
  $toyearmonth = $year."-".sprintf('%02d', $month);
  // $month = "8";
  // $smonth = sprintf('%02d', $month);
   $data_array = array();
  if($str == 'semi'){
    $query_tb = $MANAGEMENT_RESERVE_SEMI_PEAK_DATE_TB;
    $start_date = "semi_peak_season_start_date";
    $end_date = "semi_peak_season_end_date";
  }
  else{
    $query_tb = $MANAGEMENT_RESERVE_PEAK_DATE_TB;
    $start_date = "peak_season_start_date";
    $end_date = "peak_season_end_date";
  }

  $sql = "SELECT * FROM $query_tb
          WHERE user_id = '".$_SESSION['session_user_id']."'
          AND ($start_date LIKE '".$toyearmonth."%' OR $end_date LIKE '".$toyearmonth."%')";
  $result = sql_query($sql);
  while($rows = sql_fetch_array($result)) {
      if($rows['seq']) {
          $sstartday = new DateTime($rows[$start_date]);
          // $sstartday = new DateTime($rows['peak_season_start_date']);
          $sendday = new DateTime($rows[$end_date]);
          $diffday = date_diff($sstartday, $sendday);
          $diffday = $diffday->days;
        for($i = '0' ; $i <= $diffday ; $i++) {
          $startdays = strtotime($rows[$start_date]."+$i days");
          $startdays = date("Y-m-d",$startdays);
          $arrData = $startdays;
            array_push($data_array, $arrData);
          }
        } //end for
  }//end while
  // print_r($data_array);
  return $data_array;
}

function get_option($userid){
  global $OPTION_INFO_TB,$SITENAME;
  $sql = " SELECT *	FROM $OPTION_INFO_TB
           WHERE user_id = '".$SITENAME."'
           AND option_del_whether = 'N'
           ";
  $result = sql_query($sql);
  $option_info_array = array();
    while ($rows = sql_fetch_array($result)) {
      $arrData = array(
                'user_id' => $rows['user_id'],
                'option_code' => $rows['option_code'],
                'option_name' => $rows['option_name'],
                'option_fee' => $rows['option_fee'],
                'option_content' => $rows['option_content'],
               );
      array_push($option_info_array, $arrData);
    }
    return $option_info_array;
}
function data_init($tableNm,$user_id) {
      global $session_userid;
      $sql = "DELETE FROM $tableNm
              WHERE pension_user_id = '$session_userid'
              AND user_id	= '$user_id'
              ";
      sql_query($sql);
}
function get_guestroom_type($guestroom_type) { //상품타입
      if($guestroom_type == '1'){
        $guestroom_type_val = "숙박상품";
      }
      else if($guestroom_type == '2'){
        $guestroom_type_val = "당일상품";
      }
      else if($guestroom_type == '3'){
        $guestroom_type_val = "셀프바베큐존";
      }
      else{
        $guestroom_type_val = "상품타입오류";
      }
      return $guestroom_type_val;
}

function get_paymethod_type($paymethod_type) { //결제방식
      if($paymethod_type == '1'){
        $paymethod_type_val = "무통장입금";
      }
      else if($paymethod_type == '2'){
        $paymethod_type_val = "신용카드";
      }
      else if($paymethod_type == '3'){
        $paymethod_type_val = "가상계좌";
      }
      else if($paymethod_type == '4'){
        $paymethod_type_val = "실시간계좌이체";
      }
      else if($paymethod_type == '5'){
        $paymethod_type_val = "페이결제";
      }
      else{
        $paymethod_type_val = "결제방식오류";
      }
      return $paymethod_type_val;
}

function get_reserve_status($reserve_status) { //객실예약상태
      if($reserve_status == '1'){
        $reserve_status_val = "준비";
      }
      else if($reserve_status == '2'){
        $reserve_status_val = "예약신청";
      }
      else if($reserve_status == '3'){
        $reserve_status_val = "예약완료";
      }
      else if($reserve_status == '4'){
        $reserve_status_val = "취소요청";
      }
      else if($reserve_status == '5'){
        $reserve_status_val = "취소완료";
      }
      else{
        $reserve_status_val = "객실예약상태오류";
      }
      return $reserve_status_val;
}

function get_reserve_payment_status($payment_status) { //객실결제상태
      if($payment_status == '1'){
        $payment_status_val = "결제대기";
      }
      else if($payment_status == '2'){
        $payment_status_val = "결제완료";
      }
      else if($payment_status == '3'){
        $payment_status_val = "결제취소";
      }
      else if($payment_status == '4'){
        $payment_status_val = "환불요청";
      }
      else if($payment_status == '5'){
        $payment_status_val = "환불완료";
      }
      else{
        $payment_status_val = "객실결제상태오류";
      }
      return $payment_status_val;
}

function get_reserve_data($guestroom_reserve_code) { //객실예약정보
  global $GUESTROOM_RESERVATION_TB,$SITENAME;
  $sql = "SELECT * FROM $GUESTROOM_RESERVATION_TB
          WHERE user_id = '".$SITENAME."'
          AND guestroom_reserve_code = '$guestroom_reserve_code'
          ";
  $rows = sql_fetch($sql);
  return $rows;
}

function get_option_data($guestroom_reserve_code) { //옵션주문정보
  global $OPTION_RESERVATION_INFO_TB,$SITENAME;
  $sql = "SELECT * FROM $OPTION_RESERVATION_INFO_TB
          WHERE user_id = '".$SITENAME."'
          AND guestroom_reserve_code = '$guestroom_reserve_code'
          ";
  $result = sql_query($sql);
      $option_data_array = array();
      while ($rows = sql_fetch_array($result)) {
        $arrData = array(
              'user_id' => $rows['user_id'],
              'guestroom_reserve_code' => $rows['guestroom_reserve_code'],
              'option_code' => $rows['option_code'],
              'option_name' => $rows['option_name'],
              'option_amount' => $rows['option_amount'],
              'option_fee' => $rows['option_fee'],
         );
        array_push($option_data_array, $arrData);
    }
      return $option_data_array;
}

function get_date_intval($dateStr){ //날짜차이 계산...
  $dateStrExp =explode("~",$dateStr);
  $startDate = $dateStrExp['0'];
  $endDate = $dateStrExp['1'];
  $dateDifference = abs(strtotime($startDate) - strtotime($endDate));
  $years  = floor($dateDifference / (365 * 60 * 60 * 24));
  $months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
  $dateintval   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));
  // echo "
  //  years > $years <br>
  //  months > $months <br>
  //  dateintval > $dateintval <br>
  // ";
  return $dateintval;
}

function get_date_str($intevalday){ //날짜차이 계산...
  $intervalplus = $intevalday+1;
  $intervalStr = $intevalday."박".$intervalplus."일";
  return $intervalStr;
}

?>
