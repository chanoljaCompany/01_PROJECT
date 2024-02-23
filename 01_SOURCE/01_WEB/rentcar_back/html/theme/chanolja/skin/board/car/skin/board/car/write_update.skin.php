<?
if (!defined("_GNUBOARD_")) exit; 

if ($_FILES[bf_file][name][0]) {
sql_query(" update $write_table set wr_link2 = '1' where wr_id = '$wr_id'");
} else {
if ($w == "u") {
if ($bf_file_del[0]) {
sql_query(" update $write_table set wr_link2 = '' where wr_id = '$wr_id'");
} else if ($write[wr_link2]) {
sql_query(" update $write_table set wr_link2 = '1' where wr_id = '$wr_id'");
}}}

$wr_day = "$wr_day";
$sql1 = " update $write_table set wr_day = '$wr_day' where wr_id = '$wr_id' ";
sql_query($sql1);

$wr_point = "$wr_point";
$sql2 = " update $write_table set wr_point = '$wr_point' where wr_id = '$wr_id' ";
sql_query($sql2);

$wr_good = "$wr_good";
$sql3 = " update $write_table set wr_good = '$wr_good' where wr_id = '$wr_id' ";
sql_query($sql3);

$wr_nogood = "$wr_nogood";
$sql5 = " update $write_table set wr_nogood = '$wr_nogood' where wr_id = '$wr_id' ";
sql_query($sql5);

$wr_4 = "$four01|$four02|$four03|$four04|$four05|$four06|$four07|$four08|$four09|$four10";
$sql4 = " update $write_table set wr_4 = '$wr_4' where wr_id = '$wr_id' ";
sql_query($sql4);

$wr_6 = "$six01|$six02|$six03|$six04|$six05|$six06|$six07|$six08|$six09|$six10|$six11|$six12|$six13|$six14|$six15|$six16|$six17|$six18|$six19|$six20|$six21|$six22|$six23|$six24|$six25|$six26|$six27|$six28|$six29|$six30|$six31|$six32|$six33|$six34|$six35|$six36|$six37|$six38|$six39|$six40|$six41|$six42|$six43|$six44|$six45|$six46|$six47|$six48|$six49|$six50|$six51|$six52|$six53|$six54|$six55|$six56|$six57|$six58|$six59|$six60|$six61|$six62|$six63|$six64|$six65|$six66|$six67|$six68|$six69|$six70|$six71|$six72|$six73|$six74|$six75|$six76|$six77|$six78|$six79|$six80|$six81|$six82|$six83|$six84|$six85|$six86|$six87|$six88|$six89|$six90|$six91|$six92";
$sql6 = " update $write_table set wr_6 = '$wr_6' where wr_id = '$wr_id' ";
sql_query($sql6);

$wr_7 = "$seven01|$seven02|$seven03|$seven04|$seven05|$seven06|$seven07|$seven08|$seven09|$seven10|$seven11|$seven12|$seven13|$seven14|$seven15|$seven16|$seven17|$seven18|$seven19|$seven20|$seven21|$seven22|$seven23|$seven24|$seven25|$seven26|$seven27|$seven28|$seven29|$seven30|$seven31";
$sql7 = " update $write_table set wr_7 = '$wr_7' where wr_id = '$wr_id' ";
sql_query($sql7);
?>
