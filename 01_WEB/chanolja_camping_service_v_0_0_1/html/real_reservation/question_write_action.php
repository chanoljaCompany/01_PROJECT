<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/_common.php";
$Today = date("Y-m-d");
$write_ip = $_SERVER['REMOTE_ADDR'];
$JOIN_QUESTION_TB = "join_question";
$division = $_REQUEST["division"];
$question_name = $_REQUEST["question_name"];
$question_phone = $_REQUEST["question_phone"];
$question_content = $_REQUEST["question_content"];
if($division == 'question') { // 문의
	$sql = "INSERT INTO $JOIN_QUESTION_TB
         (question_name,question_phone,question_content, question_date,mod_ip)
        VALUES
        ('$question_name','$question_phone','$question_content','$Today','$write_ip')";
 $result = sql_query($sql);
 echo"ok";
 exit;
}


?>
