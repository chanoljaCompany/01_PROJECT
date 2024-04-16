<?

function sql_query2_multi($sql, $error=G5_DISPLAY_SQL_ERROR, $link=null)
{
    global $g5;

    if(!$link)
        $link = $g5['connect_db'];

    // Blind SQL Injection 취약점 해결
    $sql = trim($sql);
    // union의 사용을 허락하지 않습니다.
    //$sql = preg_replace("#^select.*from.*union.*#i", "select 1", $sql);
    //$sql = preg_replace("#^select.*from.*[\s\(]+union[\s\)]+.*#i ", "select 1", $sql);
    // `information_schema` DB로의 접근을 허락하지 않습니다.
    $sql = preg_replace("#^select.*from.*where.*`?information_schema`?.*#i", "select 1", $sql);

    if(function_exists('mysqli_query') && G5_MYSQLI_USE) {
        if ($error) {
            $result = @mysqli_query($link, $sql) or die("<p>$sql<p>" . mysqli_errno($link) . " : " .  mysqli_error($link) . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
        } else {
            $result = @mysqli_query($link, $sql);
        }
    } else {
        if ($error) {
            $result = @mysql_query($sql, $link) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : {$_SERVER['SCRIPT_NAME']}");
        } else {
            $result = @mysql_query($sql, $link);
        }
    }

    return $result;
}


// 이미지 꽉차게
function gallery_size_full_muliti($wr_id, $bo_table, $bo_gallery_width="180", $bo_gallery_height="100"){
	$wr_id; //게시물 번호를 가져오는 것.
	$bo_table; //게시판 bo_table 값 설정
	$bo_gallery_width; //게시판 설정 이미지 가로 길이
	$bo_gallery_height; //게시판 설정 이미지 세로 길이
	$thumb_width;  //썸네일 가로 크기
	$thumb_height; //썸네일 새로 크기
	$wrId = $wr_id; //wr_id => 게시물 번호를 가져옴
	$wrid = $wr_id; //wr_id => 게시물 번호를 가져옴
	global $g5; //게시판 테이블 이름 등 가져오기 위해 글로벌로 설정함
	$sqlq = "SELECT `bf_type`, `bf_file`, `bf_content` FROM `{$g5[board_file_table]}`
			WHERE `bo_table` = '{$bo_table}' AND `wr_id` = '{$wrId}' AND `bf_type` between '1' AND '3'ORDER BY `bf_no` LIMIT 0, 1; ";
	$rows = sql_fetch($sqlq);

	$filename = $rows['bf_file']; //파일 이름 추출
	
	if($filename){
		$imgUri = G5_DATA_PATH."/file/".$bo_table."/".$filename;
	}else{
		$write_table = $g5['write_prefix'].$bo_table;
		$sql = "SELECT `wr_content` FROM `$write_table` WHERE `wr_id` = '{$wrId}'; ";
		$write = sql_fetch($sql);
		$matches = get_editor_image($write['wr_content'], false);
		$edt = true;
		$loc1 = explode("editor/",$matches[1][0]);
		$loc2 = explode("/",$loc1[1]);

		$imgUri = G5_DATA_PATH."/editor/".$loc1[1];
	}
	//print_r2($bo_table);
	
	if(file_exists($imgUri)){
		$size = getimagesize($imgUri);
		if($size[0] > $size[1]){
			$thumb_width = $bo_gallery_width; //=> 기본 값으로 불러오므로, 가로 길이는 자동 적용 됨.
			$thumb_height = "";
		}else{
			$thumb_width = "";
			$thumb_height = $bo_gallery_height;//=> 기본 값으로 불러오므로, 세로 길이는 자동 적용 됨.
		}


		$thumb = get_list_thumbnail($bo_table, $wrid, $thumb_width,$thumb_height);
		$uriData = explode(G5_URL."/data",$thumb['src']);
		$imgUri2 = G5_DATA_PATH.$uriData[1];
		$size2 = @getimagesize($imgUri2);
		$hMargin = "";
		$wMargin = "";

		if($size2[0] > $size2[1]){
			if($size2[1]<$bo_gallery_height){
				$hMargin = ($bo_gallery_height - $size2[1])/2;
			}
		}else{
			if($size2[0]<$bo_gallery_width){
				$wMargin = ($bo_gallery_width - $size2[0])/2;
			}
		}


		if($thumb['src']) {
			$img_content = "<a href='".G5_BBS_URL."/board.php?bo_table=".$bo_table."&wr_id=".$wrId."'>";
			if($size[0] > $size[1]){
				if($size2[1]>$bo_gallery_height){
					$img_content .= '<img src="'.$thumb['src'].'" alt="'.$imgUri.'" width="'.$thumb_width.'" height="'.$bo_gallery_height.'" style="margin:'.$hMargin.'px 0px '.$hMargin.'px 0px">';
				}else{
					$img_content .= '<img src="'.$thumb['src'].'" alt="'.$imgUri.'" width="'.$thumb_width.'" style="margin:'.$hMargin.'px 0px '.$hMargin.'px 0px">';
				}
			}else{
				$img_content .= '<img src="'.$thumb['src'].'" alt="'.$imgUri.'" height="'.$thumb_height.'" style="margin:0px '.$wMargin.'px 0px '.$wMargin.'px">';
			}
		} else {
			$img_content .= "<a href='".G5_BBS_URL."/board.php?bo_table=".$bo_table."&wr_id=".$wrId."'>";
			$img_content .= '<span style="width:'.$bo_gallery_width.'px;height:'.$bo_gallery_height.'px">'.$wr_id.'</span>';
			$img_content .= "</a>";
		}
		$img_content .= "</a>";
	}else{
		$lh = $bo_gallery_height;
		$img_content .= "<a href='".G5_BBS_URL."/board.php?bo_table=".$bo_table."&wr_id=".$wrId."'>";
		$img_content .= '<span style="width:'.$bo_gallery_width.'px;height:'.$bo_gallery_height.'px;display:block;line-height:'.$lh.'px">no image</span>';
		$img_content .= "</a>";
	}
	echo $img_content;
}
?>