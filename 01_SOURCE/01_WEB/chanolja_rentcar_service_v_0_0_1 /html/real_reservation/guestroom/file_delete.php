<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/session.php";
$rdate = date("Y-m-d");


//$delete_file = run_replace('delete_file_path', '../product_img/'.$_GET['bf_file_1']);
@unlink("../product_img/".$_GET['bf_file_1']);
@unlink("../product_img/".$_GET['bf_file_2']);
@unlink("../product_img/".$_GET['bf_file_3']);
@unlink("../product_img/".$_GET['bf_file_4']);
@unlink("../product_img/".$_GET['bf_file_5']);

if($_GET['bf_file'] == '1') {
$sql = " update guestroom_info
                set bf_file_1 = ''
					 where seq='$_GET[seq]'
					 ";
sql_query($sql);
}

if($_GET['bf_file'] == '2') {
$sql = " update guestroom_info
                set bf_file_2 = ''
					 where seq='$_GET[seq]'
					 ";
sql_query($sql);
}

if($_GET['bf_file'] == '3') {
$sql = " update guestroom_info
                set bf_file_3 = ''
					 where seq='$_GET[seq]'
					 ";
sql_query($sql);
}

if($_GET['bf_file'] == '4') {
$sql = " update guestroom_info
                set bf_file_4 = ''
					 where seq='$_GET[seq]'
					 ";
sql_query($sql);
}

if($_GET['bf_file'] == '5') {
$sql = " update guestroom_info
                set bf_file_5 = ''
					 where seq='$_GET[seq]'
					 ";
sql_query($sql);
}


?>
<script>
   history.back();
</script>