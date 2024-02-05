<?php
$Host_untalk = "localhost";
$User_untalk = "jwsntech";
$Passwd_untalk = "jwsntech!!!178619@";
$DB_NAME_untalk = "jwsntech";

$connect_untalk = mysqli_connect($Host_untalk, $User_untalk, $Passwd_untalk) or die("DB Error!");
mysqli_select_db($connect_untalk,$DB_NAME_untalk) or dir ("DB Table error!");
mysqli_query($connect_untalk,"SET CHARACTER SET 'utf8'");
?>
