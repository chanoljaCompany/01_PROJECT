<?php
// //error_reporting(E_ALL);
// ini_set("display_errors", 1);
include "$_SERVER[DOCUMENT_ROOT]/sys_admin/config/cellphoneConf.php";
include $admin_root."/_common.php";
include $admin_root."/config/session.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : '';

if($division == 'banner_pc_write'){
  $bannerLink_1 = isset($_REQUEST['bannerLink_1']) ? $_REQUEST['bannerLink_1'] : '';
  $bannerLink_2 = isset($_REQUEST['bannerLink_2']) ? $_REQUEST['bannerLink_2'] : '';
  $bannerLink_3 = isset($_REQUEST['bannerLink_3']) ? $_REQUEST['bannerLink_3'] : '';
  $bannerLink_4 = isset($_REQUEST['bannerLink_4']) ? $_REQUEST['bannerLink_4'] : '';
  $bannerLink_5 = isset($_REQUEST['bannerLink_5']) ? $_REQUEST['bannerLink_5'] : '';
  $bannerLink_6 = isset($_REQUEST['bannerLink_6']) ? $_REQUEST['bannerLink_6'] : '';
  $bannerLink_7 = isset($_REQUEST['bannerLink_7']) ? $_REQUEST['bannerLink_7'] : '';
  $bannerLink_8 = isset($_REQUEST['bannerLink_8']) ? $_REQUEST['bannerLink_8'] : '';


  $sql = "UPDATE $MAIN_PC_BANNER_TB
          SET
           banner_link_1 = '$bannerLink_1'
          ,banner_link_2 = '$bannerLink_2'
          ,banner_link_3 = '$bannerLink_3'
          ,banner_link_4 = '$bannerLink_4'
          ,banner_link_5 = '$bannerLink_5'
          ,banner_link_6 = '$bannerLink_6'
          ,banner_link_7 = '$bannerLink_7'
          ,banner_link_8 = '$bannerLink_8'
          ";
  sql_query($sql);

  foreach ($_FILES['bannerImg']['name'] as $i => $name) {
    $fileName = $_FILES['bannerImg']['name'][$i];
    $fileSize = $_FILES['bannerImg']['size'][$i];
    $fileType = $_FILES['bannerImg']['type'][$i];
    $tmp_file = $_FILES['bannerImg']['tmp_name'][$i];
    if($fileName) {
        $uploadFileArray = explode('.', $fileName);
     	  $file_ext_check = file_check($uploadFileArray[1]);
        if($file_ext_check == '1'){
          imageUpload($i,$fileName,$fileSize,$fileType,$tmp_file,$MAIN_PC_BANNER_TB);
        }else{
          $re_code = "200";
          $msg = "이미지등록 에러가 발생하였습니다.(확장자)";
          $json = json_output($re_code,$msg);
          echo"$json";
          exit;
        }
     }
  }
     $re_code = "100";
     $msg = "이미지를 수정/등록 완료하였습니다.";
     $json = json_output($re_code,$msg);
     echo"$json";
     exit;
}
else if($division == 'banner_mo_write'){
  $bannerLink_1 = isset($_REQUEST['bannerLink_1']) ? $_REQUEST['bannerLink_1'] : '';
  $bannerLink_2 = isset($_REQUEST['bannerLink_2']) ? $_REQUEST['bannerLink_2'] : '';
  $bannerLink_3 = isset($_REQUEST['bannerLink_3']) ? $_REQUEST['bannerLink_3'] : '';
  $bannerLink_4 = isset($_REQUEST['bannerLink_4']) ? $_REQUEST['bannerLink_4'] : '';
  $bannerLink_5 = isset($_REQUEST['bannerLink_5']) ? $_REQUEST['bannerLink_5'] : '';
  $bannerLink_6 = isset($_REQUEST['bannerLink_6']) ? $_REQUEST['bannerLink_6'] : '';
  $bannerLink_7 = isset($_REQUEST['bannerLink_7']) ? $_REQUEST['bannerLink_7'] : '';
  $bannerLink_8 = isset($_REQUEST['bannerLink_8']) ? $_REQUEST['bannerLink_8'] : '';

  $sql = "UPDATE $MAIN_MO_BANNER_TB
          SET
           banner_link_1 = '$bannerLink_1'
          ,banner_link_2 = '$bannerLink_2'
          ,banner_link_3 = '$bannerLink_3'
          ,banner_link_4 = '$bannerLink_4'
          ,banner_link_5 = '$bannerLink_5'
          ,banner_Link_6 = '$bannerLink_6'
          ,banner_Link_7 = '$bannerLink_7'
          ,banner_Link_8 = '$bannerLink_8'
          ";
//           echo "
// sql > $sql <br>
//           ";
  sql_query($sql);

  foreach ($_FILES['bannerImg']['name'] as $i => $name) {
    $fileName = $_FILES['bannerImg']['name'][$i];
    $fileSize = $_FILES['bannerImg']['size'][$i];
    $fileType = $_FILES['bannerImg']['type'][$i];
    $tmp_file = $_FILES['bannerImg']['tmp_name'][$i];
    if($fileName) {
        $uploadFileArray = explode('.', $fileName);
     	  $file_ext_check = file_check($uploadFileArray[1]);
        if($file_ext_check == '1'){
          imageUpload($i,$fileName,$fileSize,$fileType,$tmp_file,$MAIN_MO_BANNER_TB);
        }else{
          $re_code = "200";
          $msg = "이미지등록 에러가 발생하였습니다.(확장자)";
          $json = json_output($re_code,$msg);
          echo"$json";
          exit;
        }
     }
  }
     $re_code = "100";
     $msg = "이미지를 수정/등록 완료하였습니다.";
     $json = json_output($re_code,$msg);
     echo"$json";
     exit;
}
else if($division == 'filedelete') {
      $changeData = isset($_REQUEST['delData']) ? $_REQUEST['delData'] : '';
      $delfileName = isset($_REQUEST['delfileName']) ? $_REQUEST['delfileName'] : '';
      $changeData_exp = explode("_",$changeData);
      $dataId = $changeData_exp['1'];
      $Data = "banner_images_".$dataId;
      //이미지 삭제
      @unlink($mainPcBanner_dir.$delfileName);
      $sql = "UPDATE $MAIN_PC_BANNER_TB
              SET
              $Data = ''
              WHERE
              1=1
              ";
              // echo "$sql<br>";
        $result = sql_query($sql);
        $re_code = "100";
        $msg = "파일을 삭제 하였습니다.";
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
}
else if($division == 'filedeletemo') {
      $changeData = isset($_REQUEST['delData']) ? $_REQUEST['delData'] : '';
      $delfileName = isset($_REQUEST['delfileName']) ? $_REQUEST['delfileName'] : '';
      $changeData_exp = explode("_",$changeData);
      $dataId = $changeData_exp['1'];
      $Data = "banner_images_".$dataId;
      //이미지 삭제
      @unlink($mainPcBanner_dir.$delfileName);
      $sql = "UPDATE $MAIN_MO_BANNER_TB
              SET
              $Data = ''
              WHERE
              1=1
              ";
              // echo "$sql<br>";
        $result = sql_query($sql);
        $re_code = "100";
        $msg = "파일을 삭제 하였습니다.";
        $json = json_output($re_code,$msg);
        echo"$json";
        exit;
}

function imageUpload ($i,$fileName,$fileSize,$fileType,$tmp_file,$TBNAME) {
       global $mainPcBanner_dir,$mainMoBanner_dir,$session_userid,$userid;
        $columNm = $i+1;
        $saveFileName = time().$fileName;
        if($TBNAME == 'main_pc_banner'){
          $saveFile = $mainPcBanner_dir.$saveFileName;
        }else{
          $saveFile = $mainMoBanner_dir.$saveFileName;
        }
            if(move_uploaded_file($tmp_file, $saveFile)) {
                $colum = "banner_images_".$columNm;
                $sql = "UPDATE $TBNAME SET
                        $colum = '$saveFileName'
                        WHERE 1=1
                       ";
                // echo " sql > $sql";
               sql_query($sql);
            }else{
               $re_code = "200";
               $msg = "이미지등록 에러가 발생하였습니다.";
               $json = json_output($re_code,$msg);
               echo"$json";
               exit;
            }
   }
?>
