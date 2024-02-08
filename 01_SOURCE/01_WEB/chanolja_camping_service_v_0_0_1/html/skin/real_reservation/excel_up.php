<?php
header("Content-Type:text/html;charset=utf-8");

//error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/config/siteconf.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/common_config.php";
require_once "$_SERVER[DOCUMENT_ROOT]/real_reservation/PHPExcel-1.8/Classes/PHPExcel.php";

$filename = './file2.xlsx'; // 서버에 올려진 파일을 직접 지정할 경우
//$filename = date("Y-m-d")."-결제내역.xls";
$objReader = PHPExcel_IOFactory::createReaderForFile($filename);
// 읽기전용으로 설정
$objReader->setReadDataOnly(true);
// 엑셀파일을 읽는다
$objExcel = $objReader->load($filename);
// 첫번째 시트를 선택
$objExcel->setActiveSheetIndex(0);
$objWorksheet = $objExcel->getActiveSheet();
$rowIterator = $objWorksheet->getRowIterator();
foreach ($rowIterator as $row) { // 모든 행에 대해서
     $cellIterator = $row->getCellIterator();
     $cellIterator->setIterateOnlyExistingCells(false);
}
$maxRow = $objWorksheet->getHighestRow();

    for ($i = 0 ; $i <= $maxRow ; $i++) {
         $reserve_name = $objWorksheet->getCell('A' . $i)->getValue(); // B열
         $reserve_phone = $objWorksheet->getCell('B' . $i)->getValue(); // C열
         $reserve_code = $objWorksheet->getCell('C' . $i)->getValue(); // C열
         $guestroom_reserve_date = $objWorksheet->getCell('D' . $i)->getValue(); // C열
         $guestroom_name = $objWorksheet->getCell('E' . $i)->getValue(); // C열
         $guestroom_reserve_payment_total = $objWorksheet->getCell('F' . $i)->getValue(); // C열
         $todaye = $objWorksheet->getCell('G' . $i)->getValue(); // C열
         // echo $name . ", " . $phone . ", " . $reserve_code . ", " . $guestroom_reserve_date.", " . $guestroom_name.", " . $guestroom_reserve_payment_total."<br>";
         $reserve_date_exp = explode("~",$guestroom_reserve_date);
         $todaye_exp = explode(".",$todaye);
         $todaya = $todaye_exp['0'];
         $todaya_len = strlen($todaya);
         if($guestroom_reserve_date_len != '10'){
            $todaye_ex_sub = explode("-",$todaya);
            $todaye_ex_year = $todaye_ex_sub['0'];
            $todaye_ex_month = $todaye_ex_sub['1'];
            $todaye_ex_day = $todaye_ex_sub['2'];
            $guestroom_reception_date = get_date_dash($todaye_ex_year,$todaye_ex_month,$todaye_ex_day);
         }
         else{
           $guestroom_reception_date = $todaye;
         }

         // $todaya_len_err = strlen($guestroom_reception_date);
         // if($todaya_len_err != '10'){
         //   echo "ERRor<br>";
         // }
         $guestroom_reserve_date_len = strlen($guestroom_reserve_date);
         if($guestroom_reserve_date_len != '21'){
           // echo" $i > $reserve_name : $guestroom_reserve_date<br>";
           $estart_ex = $reserve_date_exp['0'];
           $estart_ex_sub = explode("-",$estart_ex);
           $eend_ex = $reserve_date_exp['1'];
           $eend_ex_sub = explode("-",$eend_ex);
           $exstart_year = $estart_ex_sub['0'];
           $exstart_month = $estart_ex_sub['1'];
           $exstart_day = $estart_ex_sub['2'];
           $exend_year = $eend_ex_sub['0'];
           $exend_month = $eend_ex_sub['1'];
           $exend_day = $eend_ex_sub['2'];
           $get_start_full = get_date_dash($exstart_year,$exstart_month,$exstart_day);
           $get_end_full = get_date_dash($exend_year,$exend_month,$exend_day);
           // echo" $i > $reserve_name : $get_start_full : $get_end_full<br>";
           $redateStr = $get_start_full."~".$get_end_full;
//            echo "
// redateStr > $redateStr <br>
//            ";
         }
         else{
           $redateStr = $guestroom_reserve_date;
         }
         // echo"
         // $reserve_name> $redateStr <br>
         // ";
         $sql = "SELECT * FROM $GUESTROOM_INFO_TB WHERE guestroom_name = '$guestroom_name'";
         $rows = sql_fetch($sql);
         if(!$rows['guestroom_code']){
           echo "
            aaaa >> $i <br>
           ";
         }
         else{
           $reserve_date_exp = explode("~",$redateStr);
           $guestroom_reserve_user_personnel = $rows['guestroom_personnel']."^".$childPerson."^".$babyPerson; //객실예약자인원',
           $reserve_use_hour = "14~11";
           $sql = "INSERT INTO guestroom_reservation
                         (user_id,guestroom_reserve_code,guestroom_code, guestroom_name
                         ,guestroom_reserve_status, guestroom_reserve_date,guestroom_reserve_date_start,guestroom_reserve_date_end
                         ,guestroom_reserve_user_name ,guestroom_reserve_user_phone,guestroom_reserve_user_personnel
                         ,guestroom_reserve_payment_status,guestroom_reserve_payment_method
                         ,guestroom_reserve_payment_date
                         ,guestroom_reserve_payment_total,guestroom_fee,guestroom_add_fee,option_fee
                         ,guestroom_type,reserve_use_hour,guestroom_reception_date
                         )
                         VALUES
                         ('$SITENAME','$reserve_code','$rows[guestroom_code]','".$rows['guestroom_name']."'
                          ,'3','$redateStr','".$reserve_date_exp['0']."','".$reserve_date_exp['1']."'
                          ,'$reserve_name' ,'$reserve_phone','$guestroom_reserve_user_personnel'
                          ,'2','2'
                          ,'$guestroom_reserve_payment_date'
                          ,'$guestroom_reserve_payment_total','".$guestroom_reserve_payment_total."','0','0'
                          ,'1','$reserve_use_hour','$guestroom_reception_date'
                        )
                          ";
                          echo "
                           sql >> $sql <br>
                          ";
                          sql_query($sql);
                          $dateStrExp =explode("~",$redateStr);
                          $startDate = $dateStrExp['0'];
                          $endDate = $dateStrExp['1'];
                          $dateintval = get_date_intval($redateStr);
                          echo "
dateintval >>> $dateintval <br>
                          ";
                          for($j = 0; $j < $dateintval ; $j++) {
                              if($j > '0'){
                                $startDate = date('Y-m-d', strtotime("+1 day", strtotime($startDate)));
                              }
                              else {
                                $startDate = date('Y-m-d', strtotime("+0 day", strtotime($startDate)));
                              }
                              $sql = "INSERT INTO guestroom_reservation_info
                                            (user_id,guestroom_reserve_code,guestroom_code, guestroom_name
                                             ,guestroom_reserve_status,guestroom_reserve_date)
                                            VALUES
                                            ('$SITENAME','$reserve_code','$rows[guestroom_code]','".$rows[guestroom_name]."'
                                             ,'3','$startDate')";
                                      echo "
                                      sql : $sql <br>
                                      ";
                             sql_query($sql);
                          }
              }
         }


// $sql = "SELECT *
//         FROM $PAYMENT_LOGS_TB
// 				WHERE 1=1
// 				$searchVal_1_str
// 				ORDER BY seq DESC
// 				";
// $result = sql_query($sql);
// $counts = sql_num_rows($result);
// $objPHPExcel = new PHPExcel();
// $border = [ 'borders' => [ 'allborders' => [ 'style' => PHPExcel_Style_Border::BORDER_THIN ] ] ];
// // $objPHPExcel->getActiveSheet()->getStyle( "A:BK" )->getFill ()->applyFromArray($border);
//
// $objPHPExcel->setActiveSheetIndex(0)
//             ->setCellValue("A1", "-")
//             ->setCellValue("B1", "결제코드")
//             ->setCellValue("C1", "고객아이디")
//             ->setCellValue("D1", "결제요청일")
//             ->setCellValue("E1", "결제일")
//             ->setCellValue("F1", "결제금액")
//             ->setCellValue("G1", "상담시간")
//             ->setCellValue("H1", "결제상태")
//             ->setCellValue("I1", "결제포인트")
//             ->setCellValue("J1", "결제방법")
//             ->setCellValue("K1", "무통장입금정보")
//             ;
//       $i = "2";
//       $cell = '1';
// 			// for ( $i = 2 ; $i < $counts ; $i ++ ) {
//       while($rows = mysqli_fetch_array($result)){
//           $pay_date = $rows['pay_date'];
//           if($rows['pay_date'] == '0000-00-00 00:00:00') $pay_date = "";
//                   $objPHPExcel->setActiveSheetIndex(0)
//                               ->setCellValue("A$i", "$cell")
//                               ->setCellValue("B$i", "$rows[pay_code]")
//                               ->setCellValue("C$i", "$rows[userid]")
//                               ->setCellValue("D$i", "$rows[pay_request_date]")
//                               ->setCellValue("E$i", "$pay_date")
//                               ->setCellValue("F$i", "$rows[pay_money]")
//                               ->setCellValue("G$i", "$rows[pay_time]")
//                               ->setCellValue("H$i", "$rows[pay_status]")
//                               ->setCellValue("I$i", "$rows[pay_point]")
//                               ->setCellValue("J$i", "$rows[pay_method]")
//                               ->setCellValue("K$i", "$rows[pay_bank]")
//                               ;
//        $i++;
//        $cell++;
//        }
//                     $objPHPExcel->getActiveSheet()->setTitle("상담내역");
//                     $objPHPExcel->setActiveSheetIndex(0);
//                     header('Content-Type: application/vnd.ms-excel');
//                     header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
//                     header('Cache-Control: max-age=0');
//                     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//                     $objWriter->save('php://output');
//                     exit;
?>
