<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";

session_start();

$rdate = date("Y-m-d");
$division = trim(isset($_REQUEST['division'])) ? $_REQUEST['division'] : '';//분류
$search_userid = trim(isset($_REQUEST['search_userid'])) ? $_REQUEST['search_userid'] : '';//분류
$status = trim(isset($_REQUEST['status'])) ? $_REQUEST['status'] : '';//분류
$calculate_money = trim(isset($_REQUEST['calculate_money'])) ? $_REQUEST['calculate_money'] : '';//분류
$calculate_month = trim(isset($_REQUEST['calculate_month'])) ? $_REQUEST['calculate_month'] : '';//분류
$memo = trim(isset($_REQUEST['memo'])) ? $_REQUEST['memo'] : '';//분류
$calculate_month = substr($calculate_month,0,7);
if($division == 'calculate_modify') {
    $dsql = "SELECT COUNT(*) AS dnum FROM calculate
             WHERE 1=1
             AND user_id = '".$search_userid."'
             AND calculate_month = '".$calculate_month."'";
    $drows = sql_fetch($dsql);
    if($drows['dnum'] > 0){
        $sql = "UPDATE calculate SET
                status = '".$status."',
                calculate_money = '".$calculate_money."',
                calculate_month = '".$calculate_month."',
                memo = '".$memo."',
                mod_date = '".$rdate."'
                WHERE 1=1
                AND user_id = '".$search_userid."'
                AND calculate_month = '".$calculate_month."'";
    }
    else{
    $sql = "INSERT INTO calculate
        (user_id,status,calculate_money,calculate_month,memo,reg_date)
        VALUES
        ('".$search_userid."','$status','$calculate_money','$calculate_month','$memo','$rdate')";
    }
// echo "
// sql : $sql <br>
// ";
 $result = sql_query($sql);
 echo"ok";
 }
 ?>
