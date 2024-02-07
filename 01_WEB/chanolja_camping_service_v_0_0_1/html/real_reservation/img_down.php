<?php
//error_reporting(E_ALL);
ini_set("display_errors", 1);
// 이미지 긁어오기
$img_link = iconv('utf-8','euc-kr','http://shop1.phinf.naver.net/20210126_174/1611660485783VVLN7_JPEG/12796331475478821_1483727156.jpg');
// 확장자 가져오기
$ext = strtolower(pathinfo($img_link, PATHINFO_EXTENSION));
// 저장할 이미지명을 정한다.
$img = date("YmdHis").'.'.$ext;
$fp = fopen('./downimg/'.$img,'w'); // 저장할 이미지 위치 및 파일명
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $img_link );
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
$contents = curl_exec($ch);
curl_close($ch);
// fwrite($fp,file_get_contents($img_link)); // 가져올 외부이미지 주소
fwrite($fp,$contents); // 가져올 외부이미지 주소
fclose($fp);
//echo $contents;
echo '<img src="/upload/'.$img.'">';
exit;
//$img_path = image_down("");
?>
