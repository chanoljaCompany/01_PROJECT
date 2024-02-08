<?
ini_set("display_errors", 0);
error_reporting(E_ALL&~E_NOTICE);
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";

$division = isset($_REQUEST['division']) ? $_REQUEST['division'] : 'input';
$guestroom_code = isset($_REQUEST['guestroom_code']) ? $_REQUEST['guestroom_code'] : '';
$img_info_array = array();
$option_info_array_basic = get_option($SITENAME, 'b');
$option_info_array_pay = get_option($_SESSION['session_user_id'], 'p');
$arae_info_array = get_area($SITENAME, 'p');
// print_r($arae_info_array);
$guestroom_start_hour = '9';
$guestroom_end_hour = '24';
$rows = null;
$guestroom_content = "";
$get_user_all = get_user_all('M');
// print_r($get_user_all);
if ($_SESSION['session_user_level'] != 'A') {
	$user_str = "AND user_id = '" . $_SESSION['session_user_id'] . "'";
} else {
	$user_str = "AND user_id LIKE '%%'";
}

$driver_license_exp = array();

if ($division == 'modify') { //수정
	$sql = "SELECT * FROM $GUESTROOM_INFO_TB WHERE 1=1 " . $user_str . " AND guestroom_code = '$guestroom_code'";
	$result = sql_query($sql);
	$rows = mysqli_fetch_array($result);
	// print_r($rows);
	$guestroom_content = nl2br($rows['guestroom_content']);
	$guestroom_use_hour_exp = explode("~", $rows['guestroom_use_hour']);
	$guestroom_start_hour = $guestroom_use_hour_exp['0'];
	$guestroom_end_hour = $guestroom_use_hour_exp['1'];
	$driver_license_exp = explode(",", $rows['driver_license']);
	$guestroom_userid = $rows['user_id'];
	$arrayLocation = array();
	$arrData = array(
		'place' => $rows['com_name'],
		'lat' => $rows['latitude'],
		'lng' => $rows['longitude'],
		'address' => $rows['address'],
	);
	array_push($arrayLocation, $arrData);
	// print_r($arrayLocation);
	///$guestroom_type = get_guestroom_type($rows['guestroom_type']);

	$sql_img = "SELECT *	FROM $GUESTROOM_IMAGE_INFO_TB WHERE 1=1 " . $user_str . " AND guestroom_code = '$guestroom_code'";
	$result_img = sql_query($sql_img);
	while ($rows_img = mysqli_fetch_array($result_img)) {
		$arrData = array(
			'seq' => $rows_img['seq'],
			'guestroom_code' => $rows_img['guestroom_code'],
			'guestroom_image_name' => $rows_img['guestroom_image_name'],
			'guestroom_image_size' => $rows_img['guestroom_image_size'],
		);
		array_push($img_info_array, $arrData);
	}
} else if ($division == 'input') { //신규등록
	$guestroom_code = str_shuffle(time());
}

$roomImageNum = sizeof($img_info_array);
// print_r($img_info_array);
$filesLimitNumSet = "5";
$filesLimitNum = $filesLimitNumSet - $roomImageNum;
// echo "
// filesLimitNumSet >>> $filesLimitNumSet <br>
// filesLimitNum >>> $filesLimitNum <br>
// roomImageNum >>> $roomImageNum <br>
//
// ";
?>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="<?= $file_url ?>/js/FileUp/jquery.growl.css" rel="stylesheet" type="text/css">
<link href="<?= $file_url ?>/js/FileUp/src/fileup.css" rel="stylesheet" type="text/css">

<body id="manage">
	<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
	<div id="ToolTip"></div>
	<style type="text/css" title="">
		body {
			background: url('<?= $file_url ?>/img/line.gif') repeat-y left top #e8e8e8;
		}
	</style>
	<div id="admin_content">
		<div id="container">
			<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php"; ?>
			<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
					<!-- <form name="guestroom" method="post" enctype="multipart/form-data" action="guestroom_write_action.php"> -->
					<form name="guestroom" id="guestroom" method="post" enctype="multipart/form-data">
						<input type="hidden" name="division" id="division" value="<?= $division ?>">
						<input type="hidden" name="guestroom_code" id="guestroom_code" value="<?= $guestroom_code ?>">
						<input type="hidden" name="filesLimitNum" id="filesLimitNum" value="<?= $filesLimitNum ?>">
						<input type="hidden" name="pageId" id="pageId" value="guestroom">
						<input type="hidden" name="licenseArray" id="licenseArray">
						<input type="hidden" name="guestroom_type" id="guestroom_type" value="1">
						<input type="hidden" name="user_level" id="user_level" value="<?= $_SESSION['session_user_id'] ?>">
						<!-- <input type="hidden" name="roomImageNum" id="roomImageNum" value="<?= $roomImageNum ?>"> -->
						<div class="box_title first">
							<h2 class="title">상품등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">상품등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:40%">
								<col style="width:10%">
								<col style="width:40%">
							</colgroup>
							<tr>
								<th scope="row">업체선택</th>
								<td colspan="3">
									<? if ($_SESSION['session_user_level'] == 'A') { //수정 
									?>
										<? if ($division == 'modify') { //수정 
										?>
											<select id="select_company" name="select_company" style="width: 10%" class="form-control">
												<option value="<?= $rows['com_name'] ?>:<?= $rows['user_id'] ?>"><?= $rows['com_name'] ?></option>
											</select>
										<? } else { ?>
											<select id="select_company" name="select_company" style="width: 10%" class="form-control" onclick="get_customer_data()">
												<? foreach ($get_user_all as $key => $value) { ?>
													<option value="<?= $value['com_name'] ?>:<?= $value['user_id'] ?>"><?= $value['com_name'] ?></option>
												<? } ?>
											</select>
										<? } ?>
										<!-- <select id="select_company" name="select_company" style="width: 10%" class="form-control">
                                    <? foreach ($get_user_all as $key => $value) { ?>
                                        <option <? if ($value['user_id'] == $rows['user_id']) { ?> selected <? } ?> value="<?= $value['com_name'] ?>:<?= $value['user_id'] ?>"><?= $value['com_name'] ?></option>
                                    <? } ?>
                                    </select> -->
									<? } else { ?>
										<select id="select_company" name="select_company" style="width: 10%" class="form-control">
											<option value="<?= $_SESSION['session_company_name'] ?>:<?= $_SESSION['session_user_id'] ?>"><?= $_SESSION['session_company_name'] ?></option>
										</select>
									<? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">상품명</th>
								<td>
									<input type="text" name="guestroom_name" id="guestroom_name" class="input input_full" placeholder="*필수) 상품명" value="<?= $rows['guestroom_name'] ?>">
								</td>
								<th scope="row">한줄소개</th>
								<td>
									<input type="text" name="guestroom_intro" id="guestroom_intro" class="input input_full" placeholder="*필수) 한줄소개" value="<?= $rows['guestroom_intro'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">전화번호</th>
								<td>
									<input type="text" name="guestroom_phone" id="guestroom_phone" class="input input_full" placeholder="*필수) 전화번호" value="<?= $rows['guestroom_phone'] ?>">
								</td>
								<th scope="row">웹싸이트주소</th>
								<td>
									<input type="text" name="guestroom_homepage" id="guestroom_homepage" class="input input_full" placeholder="*필수) 웹싸이트주소" value="<?= $rows['guestroom_homepage'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">동승가능인원</th>
								<td>
									<input type="number" name="guestroom_personnel" id="guestroom_personnel" class="input input_full" placeholder="*필수) 동승가능인원을 숫자만 입력하세요" value="<?= $rows['guestroom_personnel'] ?>">
								</td>
								<th scope="row">취침가능인원</th>
								<td>
									<input type="number" name="guestroom_max_personnel" id="guestroom_max_personnel" class="input input_full" placeholder="*필수) 취침가능인원을 숫자만 입력하세요" value="<?= $rows['guestroom_max_personnel'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">출고시간/반납시간</th>
								<td>
									<select id="guestroom_start_hour" name="guestroom_start_hour" style="width: 20%">
										<?
										//$guestroom_start_hour
										$startval = '9';
										$endval = '24';
										for ($i = $startval; $i < $endval; $i++) {
											$num = str_pad($i, 2, 0, STR_PAD_LEFT);
										?>
											<option <? if ($guestroom_start_hour == $num) { ?> selected <? } ?> value="<?= $num ?>"><?= $num ?>:00</option>
										<? } ?>
									</select>부터
									<select id="guestroom_end_hour" name="guestroom_end_hour" style="width: 20%">
										<?
										$startval = '9';
										$endval = '24';
										for ($i = $startval; $i < $endval; $i++) {
											$num = str_pad($i, 2, 0, STR_PAD_LEFT);
										?>
											<option <? if ($guestroom_end_hour == $num) { ?> selected <? } ?> value="<?= $num ?>"><?= $num ?>:00</option>
										<? } ?>
									</select>
								</td>
								<th scope="row">운전자최소연령</th>
								<td>
									만<input type="number" name="driver_age" id="driver_age" class="input input_small" placeholder="*필수) 나이" value="<?= $rows['driver_age'] ?>">이상
								</td>

							</tr>
							<tr>
								<th scope="row">운전자운전경력</th>
								<td>
									<input type="number" name="driver_carrer" id="driver_carrer" class="input input_small" placeholder="*필수) 경력년" value="<?= $rows['driver_carrer'] ?>">이상
								</td>
								<!-- <th scope="row">상품수</th>
								<td>
									<input type="number" name="guestroom_quantity" id ="guestroom_quantity"  class="input input_full" placeholder="*필수) 상품수를 숫자만 입력하세요"  value="<?= $rows['guestroom_quantity'] ?>">
								</td> -->
								<th scope="row">운전자면허종류</th>
								<td>
									<input type="checkbox" name="driver_license" <? if (in_array('1종대형', $driver_license_exp)) { ?> checked <? } ?> value="1종대형">1종대형이상
									<input type="checkbox" name="driver_license" <? if (in_array('1종보통', $driver_license_exp)) { ?> checked <? } ?> value="1종보통">1종보통이상
									<input type="checkbox" name="driver_license" <? if (in_array('2종보통', $driver_license_exp)) { ?> checked <? } ?> value="2종보통">2종보통이상
									<input type="checkbox" name="driver_license" <? if (in_array('소형견인차', $driver_license_exp)) { ?> checked <? } ?> value="소형견인차">소형견인차
								</td>
							</tr>
							<tr>
								<th scope="row">차고지주소</th>
								<td>
									<input type="text" name="zip_code" id="zip_code" class="input" size="20" placeholder="*필수) 우편번호" value="<?= $rows['zip_code'] ?>" readonly>
									<span class='box_btn_s blue'><a class='btn btn-success btn-sm' onclick="find_address()">우편번호찾기</a></span>
									<br><br><input type="text" name="address" id="address" class="input input_full" placeholder="*필수) 주소" value="<?= $rows['address'] ?>" readonly>
									<br><br><input type="text" name="address_detail" id="address_detail" class="input input_full" placeholder="*필수) 상세주소" value="<?= $rows['address_detail'] ?>">
								</td>
								<th scope="row">구글지도</th>
								<td id='map'>

								</td>
							</tr>
							<tr>
								<th scope="row">지역</th>
								<td colspan='3'>
									<?php
									$i = "1";
									foreach ($arae_info_array as $key => $value) {
										$garea_use = "";
										$garea_use_val = "unchecked";
										$garea_use = get_garea_use($value['area_code'], $guestroom_code, $guestroom_userid);
										if ($garea_use) $garea_use_val = "checked";
									?>
										<input type="checkbox" name="garea" onclick="garea_event('<?= $value['area_code'] ?>','<?= $garea_use_val ?>')" <?= $garea_use_val ?>><?= $value['area_name'] ?>&nbsp;&nbsp;
									<? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">자가용 주차 가능여부</th>
								<td>
									<input type="checkbox" name="car_parking_able" id="car_parking_able" <? if ($rows['car_parking_able'] == 'Y') { ?> checked <? } ?> value="Y">
								</td>
								<th scope="row">캠핑장비 기본제공 여부</th>
								<td>
									<input type="checkbox" name="camping_able" id="camping_able" <? if ($rows['camping_able'] == 'Y') { ?> checked <? } ?> value="Y">
								</td>
							</tr>
							<tr>
								<th scope="row">반려견 동승가능 여부</th>
								<td>
									<input type="checkbox" name="pet_able" id="pet_able" <? if ($rows['pet_able'] == 'Y') { ?> checked <? } ?> value="Y">
								</td>
								<!-- <th scope="row">상품수</th>
								<td>
									<input type="number" name="guestroom_quantity" id ="guestroom_quantity"  class="input input_full" placeholder="*필수) 상품수를 숫자만 입력하세요"  value="<?= $rows['guestroom_quantity'] ?>">
								</td> -->
								<th scope="row">딜리버리 가능여부</th>
								<td>
									<input type="checkbox" name="delivery_able" id="delivery_able" <? if ($rows['delivery_able'] == 'Y') { ?> checked <? } ?> value="Y">

								</td>
							</tr>
							<tr>
								<th scope="row">딜리버리(탁송)가능지역</th>
								<td>
									<input type="text" name="driver_area" id="driver_area" class="input input_full" placeholder="딜리버리(탁송)가능지역,가격을 입력하세요" value="<?= $rows['driver_area'] ?>">
								</td>
								<th scope="row">바로예약</th>
								<td>
									<input type="checkbox" name="immediately_reserve" id="immediately_reserve" <? if ($rows['immediately_reserve'] == 'Y') { ?> checked <? } ?> value="Y">
								</td>
							</tr>
							<tr>
								<th scope="row">최소예약가능일수</th>
								<td>
									<input type="number" name="minimum_reservation_day" id="minimum_reservation_day" class="input input_small" placeholder="최소예약가능일수" value="<?= $rows['minimum_reservation_day'] ?>">
								</td>
								<th scope="row">최대예약가능일수</th>
								<td>
									<input type="number" name="maximum_reservation_day" id="maximum_reservation_day" class="input input_small" placeholder="*최대예약가능일수" value="<?= $rows['maximum_reservation_day'] ?>">

								</td>
							</tr>
							<tr>
								<th scope="row">상품설명 이미지등록</th>
								<td colspan="3">
									<label for="bf_file_1" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #1</span></label>
                                    <?php if($rows['bf_file_1'] == '') { ?><input type="file" name="bf_file_1" id="bf_file_1" title="파일첨부1" class="frm_file" accept="image/jpeg,.txt"><? } else { ?><br><?= $rows['bf_file_1'] ?>  <a href="./file_delete.php?bf_file=1&bf_file_1=<?= $rows['bf_file_1'] ?>&seq=<?= $rows['seq'] ?>" onclick="return del1();"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i><? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">상품설명 이미지등록</th>
								<td colspan="3">
									<label for="bf_file_2" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #2</span></label>
                                    <?php if($rows['bf_file_2'] == '') { ?><input type="file" name="bf_file_2" id="bf_file_2" title="파일첨부2" class="frm_file" accept="image/jpeg,.txt"><? } else { ?><br><?= $rows['bf_file_2'] ?> <a href="./file_delete.php?bf_file=2&bf_file_2=<?= $rows['bf_file_2'] ?>&seq=<?= $rows['seq'] ?>" onclick="return del1();"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i><? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">상품설명 이미지등록</th>
								<td colspan="3">
									<label for="bf_file_3" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #3</span></label>
                                    <?php if($rows['bf_file_3'] == '') { ?><input type="file" name="bf_file_3" id="bf_file_3" title="파일첨부3" class="frm_file" accept="image/jpeg,.txt"><? } else { ?><br><?= $rows['bf_file_3'] ?> <a href="./file_delete.php?bf_file=3&bf_file_3=<?= $rows['bf_file_3'] ?>&seq=<?= $rows['seq'] ?>" onclick="return del1();"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i><? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">상품설명 이미지등록</th>
								<td colspan="3">
									<label for="bf_file_4" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #4</span></label>
                                    <?php if($rows['bf_file_4'] == '') { ?><input type="file" name="bf_file_4" id="bf_file_4" title="파일첨부4" class="frm_file" accept="image/jpeg,.txt"><? } else { ?><br><?= $rows['bf_file_4'] ?> <a href="./file_delete.php?bf_file=4&bf_file_4=<?= $rows['bf_file_4'] ?>&seq=<?= $rows['seq'] ?>" onclick="return del1();"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i><? } ?>
								</td>
							</tr>
							<tr>
								<th scope="row">상품설명 이미지등록</th>
								<td colspan="3">
									<label for="bf_file_5" class="lb_icon"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="sound_only"> 파일 #5</span></label>
                                    <?php if($rows['bf_file_5'] == '') { ?><input type="file" name="bf_file_5" id="bf_file_5" title="파일첨부5" class="frm_file" accept="image/jpeg,.txt"><? } else { ?><br><?= $rows['bf_file_5'] ?> <a href="./file_delete.php?bf_file=5&bf_file_5=<?= $rows['bf_file_5'] ?>&seq=<?= $rows['seq'] ?>" onclick="return del1();"><i class="fa fa-trash" aria-hidden="true" style="color:red"></i><? } ?>
								</td>
							</tr>
							
<script>
function del1()
{
    return confirm('정말 삭제 하시겠습니까?\n복구가 불가능합니다.')
}
</script>							
							
							<tr>
								<th scope="row">상품설명</th>
								<td colspan="3">
									<textarea name="guestroom_content" id="guestroom_content" style="width: 100%; height: 412px;"><?= $guestroom_content ?></textarea>
								</td>
							</tr>
						</table>
						<div class="box_title first">
							<h2 class="title">기본 옵션 등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">옵션등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<tr>
								<th scope="row">기본 옵션</th>
								<td>
									<?php
									$i = "1";
									foreach ($option_info_array_basic as $key => $value) {
										$goption_use = "";
										$goption_use_val = "unchecked";
										$goption_use = get_goption_use($value['option_code'], $guestroom_code, $guestroom_userid);
										if ($goption_use) $goption_use_val = "checked";
										$nam = $i % 15;
										if ($nam == '1') {
									?>
											<br>
										<? } ?>
										<input type="checkbox" name="goption" onclick="goption_event('<?= $value['option_code'] ?>','<?= $goption_use_val ?>','b')" <?= $goption_use_val ?>><?= $value['option_name'] ?>&nbsp;&nbsp;
									<? $i++;
									} ?>
								</td>
							</tr>
						</table>
						<div class="box_title first">
							<h2 class="title">유료옵션등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">유료옵션등록</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:90%">
							</colgroup>
							<tr>
								<th scope="row">옵션</th>
								<td>
									<?php
									$i = "1";
									foreach ($option_info_array_pay as $key => $value) {
										$goption_use = "";
										$goption_use_val = "unchecked";
										$goption_use = get_goption_use($value['option_code'], $guestroom_code, $guestroom_userid);
										if ($goption_use) $goption_use_val = "checked";
									?>
										<input type="checkbox" name="goption" onclick="goption_event('<?= $value['option_code'] ?>','<?= $goption_use_val ?>','p')" <?= $goption_use_val ?>><?= $value['option_name'] ?>(<?= number_format($value['option_fee']) ?>원)&nbsp;&nbsp;
									<? } ?>
								</td>
							</tr>
						</table>

						<div class="box_title first">
							<h2 class="title">요금 등록</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">국가별 사용설정</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:5%">
								<col style="width:15%">
								<col style="width:5%">
								<col style="width:15%">
								<col style="width:5%">
								<col style="width:15%">
							</colgroup>
							<tr>
								<th scope="row">정상가요금</th>
								<th>
									정상가
									</td>
								<td>
									<input type="number" name="guestroom_fee_all_day" id="guestroom_fee_all_day" class="input input_middle" placeholder="*필수) 할인전 정상가 요금을 입력하세요" value="<?= $rows['guestroom_fee_all_day'] ?>">
								</td>
								<th>
									
									</td>
								<td>
									
								</td>
								<th>
									
									</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<th scope="row">비수기 요금</th>
								<th>
									주중
									</td>
								<td>
									<input type="number" name="guestroom_low_season_fee_weekday" id="guestroom_low_season_fee_weekday" class="input input_middle" placeholder="*필수) 주중 비수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_low_season_fee_weekday'] ?>">
								</td>
								<th>
									주말
									</td>
								<td>
									<input type="number" name="guestroom_low_season_fee_weekend" id="guestroom_low_season_fee_weekend" class="input input_middle" placeholder="*필수)  주말 비수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_low_season_fee_weekend'] ?>">
								</td>
								<th>
									휴일
									</td>
								<td>
									<input type="number" name="guestroom_low_season_fee_holiday" id="guestroom_low_season_fee_holiday" class="input input_middle" placeholder="*필수)  휴일 비수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_low_season_fee_holiday'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">성수기 요금</th>
								<th>
									주중
									</td>
								<td>
									<input type="number" name="guestroom_peak_season_fee_weekday" id="guestroom_peak_season_fee_weekday" class="input input_middle" placeholder="*필수) 주중 성수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_peak_season_fee_weekday'] ?>">
								</td>
								<th>
									주말
									</td>
								<td>
									<input type="number" name="guestroom_peak_season_fee_weekend" id="guestroom_peak_season_fee_weekend" class="input input_middle" placeholder="*필수) 주말 성수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_peak_season_fee_weekend'] ?>">
								</td>
								<th>
									휴일
									</td>
								<td>
									<input type="number" name="guestroom_peak_season_fee_holiday" id="guestroom_peak_season_fee_holiday" class="input input_middle" placeholder="*필수) 휴일 성수기 요금을 숫자만 입력하세요" value="<?= $rows['guestroom_peak_season_fee_holiday'] ?>">
								</td>
							</tr>
							<tr>
								<th scope="row">-</th>
								<th scope="row">예약할인율<br>(2일이상)</th>
								<td>
									<input type="number" name="discount_1" id="discount_1" class="input input_middle" placeholder="숫자만 입력하세요" value="<?= $rows['discount_1'] ?>">
								</td>
								<th scope="row">예약할인율<br>(3일이상)</th>
								<td>
									<input type="number" name="discount_2" id="discount_2" class="input input_middle" placeholder="*숫자만 입력하세요" value="<?= $rows['discount_2'] ?>">
								</td>
								<th scope="row">추가요금</th>
								<td>
									<input type="number" name="guestroom_extra_charge" id="guestroom_extra_charge" class="input input_middle" placeholder="숫자만 입력하세요" value="<?= $rows['guestroom_extra_charge'] ?>">
								</td>
							</tr>
						</table>
						<div class="box_title first">
							<h2 class="title">상품이미지</h2>
						</div>
						<table class="tbl_row multi_shop">
							<caption class="hidden">국가별 사용설정</caption>
							<colgroup>
								<col style="width:10%">
								<col style="width:5%">
								<col style="width:85%">
							</colgroup>
							<tr>
								<th scope="row">상품 이미지 등록</th>
								<td colspan="3">
									<!-- <input type="text" name="guestroom_img" id ="guestroom_img"  class="input input_full_full"> -->
									<!-- <form id="multiple"> -->
									<!-- <input type="file" name="upload[]" multiple="multiple"> -->
									<div id="uploadForm">
										<button type="button" class="btn btn-success fileup-btn">
											상품이미지 선택
											<input type="file" id="upload" multiple="multiple" accept="image/*">

										</button>
										ctrl키를 누르신 상태에서 이미지를 선택하시면 최대 5개까지 선택가능합니다.
										<!-- <a class="control-button"  href="javascript:$.fileup('upload', 'upload', '*')">Upload all</a>
								 <a class="control-button"  href="javascript:$.fileup('upload', 'remove', '*')">Remove all</a> -->
									</div>
									<div id="upload-queue" class="queue">

									</div>
									<?
									$i = "1";
									foreach ($img_info_array as $key => $value) {
										$nam = $i % 3;
										if ($nam != '0') {
											$style_str = "style=\"float: left; width: 33%\"";
										} else {
											$style_str = "";
										}
										// 											echo "
										// nam >>> $nam <br>
										// 											";
										$imgUrl = $guestroom_image_url . "thumb_img/" . $value['guestroom_image_name'];
									?>

										<div id="upload_<?= $Nm ?>" class="fileup-file fileup-image" <?= $style_str ?>>
											<div class="fileup-preview">
												<img src="<?= $imgUrl ?>" alt="<?= $value['guestroom_image_name'] ?>">
											</div>
											<div class="fileup-container">
												<div class="fileup-description">
													<span class="fileup-name"><?= $value['guestroom_image_name'] ?></span> (<span class="fileup-size"><?= $value['guestroom_image_size'] ?></span>)
												</div>
												<div class="fileup-controls">
													<span class="fileup-remove" onclick="image_del('<?= $value['seq'] ?>', '<?= $value['guestroom_code'] ?>', '<?= $value['guestroom_image_name'] ?>');" title="삭제"></span>
													<span class="fileup-upload" onclick="$.fileup('upload', 'upload', '0');"></span>
													<span class="fileup-abort" onclick="$.fileup('upload', 'abort', '0');" style="display:none">Abort</span>
												</div>
												<div class="fileup-result"></div>
												<div class="fileup-progress"></div>
											</div>
											<div class="fileup-clear"></div>
										</div>
									<? $i++;
									} ?>
									<br>

									<!-- </form> -->
								</td>
							</tr>
						</table>
						<div class="box_bottom">
							<span class="box_btn blue"><input type="button" id="guestroom_input_image" value="등록"></span>
							<span class="box_btn gray"><input type="button" id="guestroom_list" value="목록"></span>
						</div>
					</form>
				</article>
			</section>
			<?
			include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
			?>
			<div id="btn_scroll">
				<a id="scroll_top"><img src="<?= $file_url ?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
				<a id="scroll_bottom"><img src="<?= $file_url ?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			</div>
		</div>
	</div>
	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<script src="<?= $file_url ?>/js/FileUp/jquery.growl.js"></script>
	<script src="<?= $file_url ?>/js/FileUp/src/fileup.js"></script>
	<script type="text/javascript">
		var guestroom_code = $('#guestroom_code').val();
		var filesLimitNum = $('#filesLimitNum').val();
		var select_company = $("#select_company option:selected").val();
		var imageNum = "0";
		var onselectStr = "";
		var guestroom_name = "";
		var guestroom_area = "";
		var guestroom_personnel = "";
		var guestroom_quantity = "";
		var guestroom_max_personnel = "";
		var guestroom_extra_charge = "";
		var guestroom_low_season_fee_weekday = "";
		var guestroom_low_season_fee_weekend = "";
		var guestroom_low_season_fee_holiday = "";
		var guestroom_semi_peak_season_fee_weekday = "";
		var guestroom_semi_peak_season_fee_weekend = "";
		var guestroom_semi_peak_season_fee_holiday = "";
		var guestroom_peak_season_fee_weekday = "";
		var guestroom_peak_season_fee_weekend = "";
		var guestroom_peak_season_fee_holiday = "";
		var guestroom_content = "";
		var oEditors = [];
		var sLang = "ko_KR"; // 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR
		nhn.husky.EZCreator.createInIFrame({
			oAppRef: oEditors,
			elPlaceHolder: "guestroom_content",
			sSkinURI: "<?= $file_url ?>/js/smarteditor2-fileup/SmartEditor2Skin.html",
			htParams: {
				bUseToolbar: true, // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseVerticalResizer: true, // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
				bUseModeChanger: true, // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
				fOnBeforeUnload: function() {},
				I18N_LOCALE: sLang
			}, //boolean
			fOnAppLoad: function() {},
			fCreator: "createSEditor2"
		});

		function submitContents(elClickedObj) {
			oEditors.getById["guestroom_content"].exec("UPDATE_CONTENTS_FIELD", []); // 에디터의 내용이 textarea에 적용됩니다.

			// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("guestroom_content").value를 이용해서 처리하면 됩니다.

			try {
				elClickedObj.form.submit();
			} catch (e) {}
		}


		function image_del(seq, guestroom_code, guestroom_image_name) {
			var select_company = $("#select_company option:selected").val();
			var result = confirm("삭제하시겠습니까?\n삭제시 복구가 불가능합니다.");
			if (result) { //확인 클릭 시
				var division = "pensionImageDel";
				$.ajax({
					type: 'GET',
					url: './guestroom_write_action.php',
					data: {
						division: division,
						seq: seq,
						guestroom_code: guestroom_code,
						guestroom_image_name: guestroom_image_name,
						select_company: select_company,

					},
					error: function(request, status, error) {
						console.log('image_del error');
					},
					success: function(html) {
						//	$("#reserve_search_list_data").html(html);
						location.reload();
					}
				});
			}
		}

		function checkbox_checked(cname) {
			var gSize = "";
			$("input[name=" + cname + "]:checked").each(function() {
				if (gSize == "") {
					gSize = $(this).val();
				} else {
					gSize = gSize + "," + $(this).val();
				}
			});
			// alert(gSize);
			return gSize;
		}

		function guestroom_input_check() {
			select_company = $("#select_company option:selected").val();

			var garea = checkbox_checked('garea');
			var delivery_able = checkbox_checked('delivery_able');
			//  var driver_license = checkbox_checked('driver_license');
			//   $('input:checkbox[name="driver_license[]"]').each(function() {
			var licenseArray = new Array();
			$("input[name=driver_license]").each(function() {
				var checkStatus = this.checked;
				if (checkStatus == true) {
					licenseArray.push($(this).val());
				} else {
					licenseArray.push('N');
				}
				// alert(licenseArray);
			});

			$('#licenseArray').val(licenseArray);
			guestroom_code = $('#guestroom_code').val();
			guestroom_name = $('#guestroom_name').val();
			guestroom_intro = $('#guestroom_intro').val();
			guestroom_phone = $('#guestroom_phone').val();
			guestroom_homepage = $('#guestroom_homepage').val();
			guestroom_intro = $('#guestroom_intro').val();
			guestroom_intro = $('#guestroom_intro').val();
			guestroom_intro = $('#guestroom_intro').val();
			guestroom_personnel = $('#guestroom_personnel').val();
			guestroom_max_personnel = $('#guestroom_max_personnel').val();
			driver_age = $('#driver_age').val();
			driver_carrer = $('#driver_carrer').val();
			driver_license = $('#driver_license').val();
			zip_code = $('#zip_code').val();
			address = $('#address').val();
			// address_detail = $('#address_detail').val();
			var driver_area = $('#driver_area').val();

			guestroom_low_season_fee_weekday = $('#guestroom_low_season_fee_weekday').val();
			guestroom_low_season_fee_weekend = $('#guestroom_low_season_fee_weekend').val();
			guestroom_low_season_fee_holiday = $('#guestroom_low_season_fee_holiday').val();
			// guestroom_semi_peak_season_fee_weekday = $('#guestroom_semi_peak_season_fee_weekday').val();
			// guestroom_semi_peak_season_fee_weekend = $('#guestroom_semi_peak_season_fee_weekend').val();
			// guestroom_semi_peak_season_fee_holiday = $('#guestroom_semi_peak_season_fee_holiday').val();
			guestroom_peak_season_fee_weekday = $('#guestroom_peak_season_fee_weekday').val();
			guestroom_peak_season_fee_weekend = $('#guestroom_peak_season_fee_weekend').val();
			guestroom_peak_season_fee_holiday = $('#guestroom_peak_season_fee_holiday').val();
			guestroom_content = $('#guestroom_content').val();

			if (guestroom_name == '') {
				warning('상품명을 입력하세요', 'guestroom_name');
				return false;
			}
			if (guestroom_intro == '') {
				warning('한줄소개를 입력하세요', 'guestroom_intro');
				return false;
			}
			if (guestroom_phone == '') {
				warning('전화번호를 입력하세요', 'guestroom_phone');
				return false;
			}
			if (guestroom_homepage == '') {
				warning('웹싸이트주소를 입력하세요', 'guestroom_homepage');
				return false;
			}
			if (guestroom_personnel == '') {
				warning('동승가능인원을 숫자만 입력하세요"', 'guestroom_personnel');
				return false;
			}
			if (guestroom_max_personnel == '') {
				warning('취침가능인원을 숫자만 입력하세요', 'guestroom_max_personnel');
				return false;
			}
			if (driver_age == '') {
				warning('운전자최소연령을 숫자만 입력하세요', 'driver_age');
				return false;
			}
			if (driver_carrer == '') {
				warning('운전자운전경력을 숫자만 입력하세요', 'driver_carrer');
				return false;
			}
			// if(driver_license == '') { warning('운전자면허종류를 입력하세요','driver_license'); return false; }
			if (licenseArray == 'N,N,N,N') {
				warning('하나이상의 운전자면허종류를 선택하세요', 'driver_license');
				return false;
			}
			if (zip_code == '') {
				warning('우편번호찾기를 이용하여 우편번호를 입력하세요', 'zip_code');
				return false;
			}
			if (address == '') {
				warning('주소를 입력하세요', 'address');
				return false;
			}
			if (garea == '') {
				warning('하나이상의 지역을 선택하세요', 'garea');
				return false;
			}
			if (delivery_able && !driver_area) {
				warning('딜리버리(탁송)가능지역을 입력하세요', 'driver_area');
				return false;
			}

			if (guestroom_low_season_fee_weekday == '') {
				warning('주중 비수기 요금을 입력하세요', 'guestroom_low_season_fee_weekday');
				return false;
			}
			if (guestroom_low_season_fee_weekend == '') {
				warning('주말 비수기 요금을 입력하세요', 'guestroom_low_season_fee_weekend');
				return false;
			}
			if (guestroom_low_season_fee_holiday == '') {
				warning('휴일 비수기 요금을 입력하세요', 'guestroom_low_season_fee_holiday');
				return false;
			}
			// if(guestroom_semi_peak_season_fee_weekday == '')	{ warning('주중 준 성수기 요금을','guestroom_semi_peak_season_fee_weekday'); return false; }
			// if(guestroom_semi_peak_season_fee_weekend == '')	{ warning('주말 준 성수기 요금을','guestroom_semi_peak_season_fee_weekend'); return false; }
			// if(guestroom_semi_peak_season_fee_holiday == '')	{ warning('휴일 준 성수기 요금을','guestroom_semi_peak_season_fee_holiday'); return false; }
			if (guestroom_peak_season_fee_weekday == '') {
				warning('주중 성수기 요금을 입력하세요', 'guestroom_peak_season_fee_weekday');
				return false;
			}
			if (guestroom_peak_season_fee_weekend == '') {
				warning('주말 성수기 요금을 입력하세요', 'guestroom_peak_season_fee_weekend');
				return false;
			}
			if (guestroom_peak_season_fee_holiday == '') {
				warning('휴일 성수기 요금을 입력하세요', 'guestroom_peak_season_fee_holiday');
				return false;
			}
			oEditors.getById["guestroom_content"].exec("UPDATE_CONTENTS_FIELD", []);
			var guestroom_content = $("#guestroom_content").val();

			if (guestroom_content == "" || guestroom_content == null || guestroom_content == '&nbsp;' || guestroom_content == '<p>&nbsp;</p>') {
				alert("내용을 입력하세요.");
				oEditors.getById["guestroom_content"].exec("FOCUS"); //포커싱
				return;
			}
			return true;
		}

		function guestroom_input_action() {
			// var sh = document.guestroom;
			// sh.action = "guestroom_write_action.php";
			// sh.submit();
			oEditors.getById["guestroom_content"].exec("UPDATE_CONTENTS_FIELD", []);

			var form = $('#guestroom')[0];
			var formData = new FormData(form);

			for (var pair of formData.entries()) {
				console.log(pair[0] + ', ' + pair[1]);
			}
			$.ajax({
				type: 'POST',
				url: "guestroom_write_action.php",
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function(json) {
					var obj = json.dataret;
					// var obj  = JSON.parse(data);
					var recode = obj[0].ret_code;
					var recode_msg = obj[0].ret_code_msg;
					console.log('recode' + recode + 'recode_msg' + recode_msg);
					alert(recode_msg);
					if (recode == '100') { //성공
						location.href = "guestroom_list.php?top_menu_id=2001&left_menu_id=006";
					} else {
						member_search_act();
					}
				}
			});
		}

		function goption_event(option_code, goption_use_val, option_type) {
			var guestroom_code = $("#guestroom_code").val();
			var select_company = $("#select_company option:selected").val();

			// alert(' option_code ' + option_code + ' guestroom_code ' + guestroom_code  + ' goption_use_val ' + goption_use_val);
			var division = "goptionChange";
			$.ajax({
				type: 'GET',
				url: './guestroom_write_action.php',
				data: {
					division: division,
					option_code: option_code,
					guestroom_code: guestroom_code,
					goption_use_val: goption_use_val,
					option_type: option_type,
					select_company: select_company,

				},
				error: function(request, status, error) {
					console.log('image_del error');
				},
				success: function(html) {
					//	$("#reserve_search_list_data").html(html);
					//location.reload();
				}
			});
		}

		function garea_event(area_code, garea_use_val) {
			var select_company = $("#select_company option:selected").val();
			var guestroom_code = $("#guestroom_code").val();
			var division = "gareaChange";
			$.ajax({
				type: 'GET',
				url: './guestroom_write_action.php',
				data: {
					division: division,
					area_code: area_code,
					guestroom_code: guestroom_code,
					garea_use_val: garea_use_val,
					select_company: select_company,
				},
				error: function(request, status, error) {
					console.log('image_del error');
				},
				success: function(html) {
					//	$("#reserve_search_list_data").html(html);
					//location.reload();
				}
			});
		}

		function get_customer_data() {
			// alert(comData);
			var select_company = $("#select_company option:selected").val();
			var division = "get_customer_data";
			$.ajax({
				type: 'GET',
				url: './guestroom_write_action.php',
				data: {
					division: division,
					select_company: select_company,
				},
				error: function(request, status, error) {
					console.log('get_customer_data error');
				},
				success: function(json) {
					var obj = json.dataret;
					var recode = obj[0].ret_code;
					var recode_msg = obj[0].ret_code_msg;
					var textsplit = recode_msg.split("^");
					$("#zip_code").val(textsplit[0]);
					$("#address").val(textsplit[1]);
					$("#address_detail").val(textsplit[2]);
				}
			});
		}
		$(document).ready(function() {
			//var select_company = $("#select_company option:selected").val();
			var address = $('#address').val();
			if (!address) {
				get_customer_data();
			}
			if (filesLimitNum == '0') {
				$('#uploadForm').hide();
			}
		});

		$('#guestroom_input_image').click(function() {
			var checkVal = guestroom_input_check();
			if (checkVal == true) {
				var result = confirm("등록/변경 하시겠습니까?");
				if (result) { //확인 클릭 시
					if (onselectStr == '' && imageNum == '0') {
						guestroom_input_action();
					} else {

						$.fileup('upload', 'upload', '*');
					}
				}
			}
		});

		$('#guestroom_list').click(function() {
			location.href = "guestroom_list.php?top_menu_id=2006&left_menu_id=006";
		});


		$.fileup({
			url: './pensionImageUpload.php?file_upload=1&guestroom_code=' + guestroom_code + "&select_company=" + select_company,
			inputID: 'upload',
			filesLimit: filesLimitNum,
			dropzoneID: 'upload-dropzone',
			queueID: 'upload-queue',
			onSelect: function(file) {
				$('#multiple .control-button').show();
				imageNum++;
				onselectStr = "Y";
			},
			onRemove: function(file, total) {
				if (file === '*' || total === 1) {
					$('#multiple .control-button').hide();
				}
			},
			onSuccess: function(response, file_number, file) {
				var endValue = Number(imageNum) - Number(1);
				// alert('response ' + response + ' file ' + file);
				if (endValue == file_number) {
					// alert('완료');
					guestroom_input_action();
					// break;
				} else {
					$.growl.notice({
						title: "Upload success!",
						message: file.name
					});
				}
			},
			onError: function(event, file, file_number) {
				$.growl.error({
					message: "Upload error!"
				});
			}
		});
	</script>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=df0e6b53dd68e241445cdf16324475bb"></script>
	<script>
		var mapContainer = document.getElementById('map'), // 지도를 표시할 div
			mapOption = {
				center: new kakao.maps.LatLng(37.5407622, 127.0706095), // 지도의 중심좌표
				level: 3 // 지도의 확대 레벨
			};

		var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

		// 마커가 표시될 위치입니다
		var markerPosition = new kakao.maps.LatLng(37.5407622, 127.0706095);

		// 마커를 생성합니다
		var marker = new kakao.maps.Marker({
			position: markerPosition
		});

		// 마커가 지도 위에 표시되도록 설정합니다
		//marker.setMap(map);

		// 인포윈도우를 생성합니다
		var infowindow = new kakao.maps.InfoWindow({
			content: "<div style='position: absolute; left: 0px; top: 0px;'><div style='width:140px;padding:1px;text-align:center;'>칠성종합시장</div></div>"
		});

		// 마커 위에 인포윈도우를 표시합니다. 두번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
		//infowindow.open(map, marker);

		var imageSrc = 'https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/marker_red.png'; // 마커이미지 주소
		imageSize = new kakao.maps.Size(34, 36); // 마커이미지의 크기
		imageOption = {
			offset: new kakao.maps.Point(17, 36)
		}; // 마커의 좌표와 일치시킬 이미지 안에서의 좌표설정

		// 마커의 이미지정보를 가지고 있는 마커이미지를 생성합니다
		var markerImage = new kakao.maps.MarkerImage(imageSrc, imageSize, imageOption);

		var arr = <?php echo json_encode($arrayLocation) ?>;
		//var arr = JSON.parse($("#arrayLocation").val());
		// 지도를 재설정할 범위정보를 가지고 있을 LatLngBounds 객체를 생성합니다
		var bounds = new kakao.maps.LatLngBounds();
		// var arr = new Array();
		// arr[0] = ["칠성시장북편 노상공영주차장",35.8780671960342,128.60320927213, "대구 북구 칠성동1가 275-3","1980287267"];
		// arr[1] = ["칠성시장방범초소 노상공영주차장",35.8794483127273,128.602329365994, "대구 북구 칠성동2가 409-24","1438742395"];
		// arr[2] = ["신천둔치주차장",35.8767253660639,128.605336577613, "대구 북구 칠성동1가 276-1","10068807"];
		// arr[3] = ["칠성시장서편 노상공영주차장",35.8771714863247,128.601464917779, "대구 북구 칠성동1가 236-1","27154726"];
		// arr[4] = ["칠성공영주차장",35.8761081400681,128.601660859567, "대구 북구 칠성남로 196","20587860"];
		// arr[5] = ["신천교고가도로밑 노상공영주차장",35.875440484078,128.607219820583, "대구 북구 칠성동1가 279-1","842394951"];


		var markerTmp; // 마커
		var customOverlay; // 오버레이
		var contentStr;
		var points = [];
		for (var i = 0; i < arr.length; i++) {
			console.log('place ' + arr[i].place + ' lat ' + arr[i].lat + ' lng ' + arr[i].lng);
			var pushval = arr[i].lat + "," + arr[i].lng;
			points.push(new daum.maps.LatLng(arr[i]['lat'], arr[i]['lng']));
			markerTmp = new daum.maps.Marker({
				position: new daum.maps.LatLng(arr[i]['lat'], arr[i]['lng']),
				title: arr[i]['address'],
				image: markerImage,
				map: map,
			});
			contentStr = "<div class='customoverlay'><span class='title'>" + arr[i]['place'] + "</span></div>";
			customOverlay = new kakao.maps.CustomOverlay({
				map: map,
				position: new daum.maps.LatLng(arr[i]['lat'], arr[i]['lng']),
				content: contentStr,
				yAnchor: 1
			});
			bounds.extend(points[i]);
		}
		// 지도 타입 변경 컨트롤을 생성한다
		var mapTypeControl = new kakao.maps.MapTypeControl();
		// 지도의 상단 우측에 지도 타입 변경 컨트롤을 추가한다
		map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
		// 지도에 확대 축소 컨트롤을 생성한다
		var zoomControl = new kakao.maps.ZoomControl();
		// 지도의 우측에 확대 축소 컨트롤을 추가한다
		map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);
		// 아래 코드는 지도 위의 마커를 제거하는 코드입니다
		// marker.setMap(null);
		map.setBounds(bounds);
	</script>
</body>

</html>