<?php
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
include_once('../../common.php');
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/common.lib.php";
require_once "$_SERVER[DOCUMENT_ROOT]/client/lib/client_function.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';
$get_guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$divisionType = isset($_REQUEST['divisionType']) ? $_REQUEST['divisionType'] : ''; //상품구분
$get_image_array = get_image_array($get_guestroom_code);
// print_r($get_image_array);
$html = "";
$i="0";
foreach ($get_image_array as $key=>$value) {
        $imgUrl = $guestroom_image_url."/".$value['guestroom_image_name'];
        if($i == '0'){
        $html = "<div id='sit_pvi_big'>
                    <a href='#' id='big_img'>
                        <img src='".$imgUrl."' width='500px' height='500px' alt='' title=''>
                    </a>
                    <a href='#' id='' class=''>
                        <!--<i class='fa fa-search-plus' aria-hidden='true'></i>-->
                    </a>
                </div>
                <ul id='sit_pvi_thumb'>";
        }
        else{
                $html .="<li>
                            <a href='#' target='_blank' class='popup_item_image img_thumb'>
                            <img src='".$imgUrl."' width='70' height='70' alt='' title=''>
                            </a>
                        </li>";
           }
        
    $i++;
   }
$html .="</ul>";   
echo $html;
?>