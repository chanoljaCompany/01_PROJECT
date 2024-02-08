<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

//include_once("$board_skin_path/moonday.php"); // 석봉운님의 음력날짜 함수
include_once(G5_THEME_PATH."/common/board.header.php");

if (eregi('%', $width)) {
    $col_width = "14%"; //표의 가로 폭이 100보다 크면 픽셀값입력
} else{
    $col_width = round($width/7); //표의 가로 폭이 100보다 작거나 같으면 백분율 값을 입력
}
$col_height= 80 ;//내용 들어갈 사각공간의 세로길이를 가로 폭과 같도록
$today = getdate();
$b_mon = $today['mon'];
$b_day = $today['mday'];
$b_year = $today['year'];
if ($year < 1) { // 오늘의 달력 일때
    $month = $b_mon;
    $mday = $b_day;
    $year = $b_year;
}

if(!$year) 	$year = date("Y");

?>

<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<link href='http://gnu52.barunweb.co.kr/theme/startboot/skin/board/schedule_v2/assets/fullcalendar.min.css' rel='stylesheet' />
<link href='http://gnu52.barunweb.co.kr/theme/startboot/skin/board/schedule_v2/assets/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='http://gnu52.barunweb.co.kr/theme/startboot/skin/board/schedule_v2/assets/lib/moment.min.js'></script>
<script src='http://gnu52.barunweb.co.kr/theme/startboot/skin/board/schedule_v2/assets/fullcalendar.min.js'></script>
<script src='http://gnu52.barunweb.co.kr/theme/startboot/skin/board/schedule_v2/assets/locale/ko.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/gcal.js'></script>

<?php 
$sel_mon = sprintf("%02d",$month);

$query = "SELECT * FROM $write_table WHERE left(wr_1,7) <= '".$year."-".$sel_mon."' and left(wr_2,7) >= '".$year."-".$sel_mon."' ORDER BY wr_id ASC";

$result = sql_query($query);

$aryData = array();
while($row = sql_fetch_array($result))
{
    $aryData[] = "{title:'".$row["wr_subject"]."',start:'".date("Y-m-d", strtotime($row["wr_1"]))."',end:'".date("Y-m-d", strtotime($row["wr_2"]))."',url:'".G5_BBS_URL."/board.php?bo_table={$bo_table}&year={$year}&month={$month}&wr_id={$row["wr_id"]}&sc_no={$sc_no}'}";
}

?>

<script>

$(document).ready(function() {
	$('#calendar').fullCalendar({
		header: {
			left: 'yearPrev,monthPrev,monthNext,yearNext',
        	center: 'title',
        	right: '<?= $write_href ? "addEventButton" : false ?>'
      	},
      	height: 'auto',
      	contentHeight:"auto",
      	lang:'ko',
      	googleCalendarApiKey : "AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE",
		customButtons: {
			addEventButton: {
            	text: '일정추가',
            	click: function() {
					document.location.href="<?php echo $write_href ?>";
            	}
          	},
          	monthPrev: {
          		icon : 'left-single-arrow',
            	click: function() {
					document.location.href="<?php echo $_SERVER[PHP_SELF]."?bo_table=".$bo_table."&"; ?><?if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>";
            	}
          	},

          	monthNext: {
          		icon : 'right-single-arrow',
            	click: function() {
					document.location.href="<?php echo $_SERVER[PHP_SELF]."?bo_table=".$bo_table."&"; ?><?if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else {$year_pre=$year; $month_pre=$month+1;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>";
            	}
          	},
          	yearPrev: {
          		icon : 'left-double-arrow',
            	click: function() {
					document.location.href="<?php echo $_SERVER[PHP_SELF]."?bo_table=".$bo_table."&"; ?><?if ($month == 1) { $year_pre=$year-1; $month_pre=$month; } else {$year_pre=$year-1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>";
            	}
          	},

          	yearNext: {
          		icon : 'right-double-arrow',
            	click: function() {
					document.location.href="<?php echo $_SERVER[PHP_SELF]."?bo_table=".$bo_table."&"; ?><?if ($month == 12) { $year_pre=$year+1; $month_pre=$month; } else {$year_pre=$year+1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre&sc_no=$sc_no");?>";
            	}
          	}
      		
        },
        defaultDate: '<?= $year."-".$month?>',
		events: [
        <?= implode(",", $aryData) ?>  
      	],
      	
      	eventSources : [
            {
                googleCalendarId : "ko.south_korea#holiday@group.v.calendar.google.com", 
                className : "koHolidays", 
                color : "#FF0000", 
                textColor : "#FFFFFF",
				editable : false
            }
		],
		
        dayClick: function(date, jsEvent, view) {
			document.location.href="/bbs/write.php?bo_table=<?= $bo_table ?>&f_date="+date.format();
		},
		//공휴일 클릭 방지
		eventAfterRender: function( event, element, view  ) {
            $(".koHolidays").attr("href", "javascript:void(0);");
        }
	});
});

</script>
	<div id='calendar'></div>
	</div>
</section>

<?php include_once(G5_THEME_PATH."/common/board.footer.php");?>