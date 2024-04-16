<?php
include "$_SERVER[DOCUMENT_ROOT]/pension_prj/config/pensionConf.php";
if($top_menu_id == '3001'){
    include_once('../../../common.php');
}
else if($top_menu_id == 'login'){
    include_once('../common.php');
}
else{
    include_once('../../common.php');
}
?>
