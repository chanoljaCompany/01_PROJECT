<nav id="navigation">
  <ul id="manageSideMenu">
        <li class="title">
        <a class="mid" data="1000"><span class="icon" style="background:url('<?=$file_url?>/img/1000.png') no-repeat center; background-size:16px 16px;"></span>기본 환경 설정<span class="arrow" onmouseover="midToolTip(event, this)" onmouseout="hideToolTip();"></span></a>
            <ul id="pgcode1000" class="sideSmall" >
                <? if($_SESSION['session_user_level'] == 'A'){?>
                <li <?=$left_menu_001_sel?>>
                    <a href="/real_reservation/management/management.php?top_menu_id=1001&left_menu_id=001" class="small">상점기본정보</a>
                </li>
                <li <?=$left_menu_002_sel?>>
                    <a href="/real_reservation/management/management_reserve_list.php?top_menu_id=1001&left_menu_id=002&manager=M" class="small" >예약 기본정보 리스트</a>
                </li>
                <!-- <li <?=$left_menu_002_sel?>>
                    <a href="/real_reservation/management/management_reserve.php?top_menu_id=1001&left_menu_id=002" class="small" >예약 기본정보</a>
                </li> -->
                <!-- <li <?=$left_menu_003_sel?>>
                    <a href="/real_reservation/setting/alimtalk.php?top_menu_id=1001&left_menu_id=003" class="small" >알림톡</a>
                </li>-->
                <li <?=$left_menu_004_sel?>>
                    <a href="/real_reservation/management/management_list.php?top_menu_id=1001&left_menu_id=004&manager=M" class="small" >호스트관리</a>
                </li>
               <li <?=$left_menu_005_sel?>>
                    <a href="/real_reservation/management/management_list.php?top_menu_id=1001&left_menu_id=005&manager=C" class="small" >회원관리</a>
                </li>
                <? }else if($_SESSION['session_user_level'] == 'M'){?>
                <li <?=$left_menu_001_sel?>>
                    <a href="/real_reservation/management/management_host.php?top_menu_id=1001&left_menu_id=001" class="small">회원기본정보</a>
                </li>
                <li <?=$left_menu_002_sel?>>
                    <a href="/real_reservation/management/management_reserve.php?top_menu_id=1001&left_menu_id=002" class="small" >예약 기본정보</a>
                </li>
               <?}?>
              </ul>
        </li>
        <li class="title over">
        <a class="mid" data="1000"><span class="icon" style="background:url('<?=$file_url?>/img/1000.png') no-repeat center; background-size:16px 16px;"></span>상품관리설정<span class="arrow" onmouseover="midToolTip(event, this)" onmouseout="hideToolTip();"></span></a>
        <ul id="pgcode1000" class="sideSmall" >
          <li <?=$left_menu_006_sel?>>
             <a href="/real_reservation/guestroom/guestroom_list.php?top_menu_id=2001&left_menu_id=006" class="small" >상품 리스트</a>
          </li>
          <li <?=$left_menu_009_sel?>>
             <a href="/real_reservation/guestroom/option_list.php?top_menu_id=2001&left_menu_id=009&option_type=p" class="small">유료옵션</a>
          </li>
          <? if($_SESSION['session_user_level'] == 'A'){?>
          <li <?=$left_menu_008_sel?>>
             <a href="/real_reservation/guestroom/option_list.php?top_menu_id=2001&left_menu_id=008&option_type=b" class="small">기본옵션</a>
          </li>
          <li <?=$left_menu_010_sel?>>
             <a href="/real_reservation/guestroom/area_list.php?top_menu_id=2001&left_menu_id=010" class="small">지역설정</a>
          </li>
          <?}?>
          </ul>
  </li>
    <li class="title over">
    <a class="mid" data="1000"><span class="icon" style="background:url('<?=$file_url?>/img/1000.png') no-repeat center; background-size:16px 16px;"></span>예약관리설정<span class="arrow" onmouseover="midToolTip(event, this)" onmouseout="hideToolTip();"></span></a>
    <ul id="pgcode1000" class="sideSmall" >
      <li <?=$left_menu_012_sel?>>
         <a href="/real_reservation/reserve/reservation_list.php?top_menu_id=4001&left_menu_id=012" class="small" >예약현황리스트</a>
      </li>
      <li <?=$left_menu_017_sel?>>
         <a href="/real_reservation/reserve/reservation_calendar_client.php?top_menu_id=4001&left_menu_id=017" class="small" >예약현황리스트(달력)</a>
      </li>
      <!-- <li <?=$left_menu_013_sel?>>
         <a href="/real_reservation/reserve/reservation_blocker_list.php?top_menu_id=4001&left_menu_id=013" class="small" >방막기</a>
      </li>-->
      <li <?=$left_menu_014_sel?>>
         <a href="/real_reservation/reserve/reservation_direct_reserve.php?top_menu_id=4001&left_menu_id=014" class="small" >관리자예약</a>
      </li> 
    </ul>
    </li>
    <!--
    <li class="title over">
    <a class="mid" data="1000"><span class="icon" style="background:url('<?=$file_url?>/img/1000.png') no-repeat center; background-size:16px 16px;"></span>정산관리설정<span class="arrow" onmouseover="midToolTip(event, this)" onmouseout="hideToolTip();"></span></a>
    <ul id="pgcode1000" class="sideSmall" >
      <li <?=$left_menu_015_sel?>>
         <a href="/real_reservation/calculate/calculate_list.php?top_menu_id=4001&left_menu_id=015" class="small" >정산관리</a>
      </li>
      <li <?=$left_menu_016_sel?>>
         <a href="/real_reservation/calculate/sales_list.php?top_menu_id=4001&left_menu_id=016" class="small" >매출관리</a>
      </li>
    </ul>
    </li>
          -->
    
<script type="text/javascript">
$(function(){
$('#manageSideMenu .big').click(function(){
  if($($(this).attr('href')).css('display') == 'block') $($(this).attr('href')).slideUp('fast');
  else $($(this).attr('href')).slideDown('fast');
  return false;
});
});

$("#manageSideMenu .title .mid").click(function(){
var midcate = $(this).parent();
var smallcate = $(this).parent().find('.sideSmall');
var mode = 1;
if (smallcate.css('display') == 'block') {
  midcate.addClass('over');
  smallcate.slideUp('fast');
  mode = 0;
} else {
  midcate.removeClass('over');
  smallcate.slideDown('fast');
}

// 중단메뉴 ON,OFF 쿠키
var midCookie = getCookie('midCookie');
var pgcode = $(this).attr('data');
if(mode == 0) {
  if(midCookie.search('@'+pgcode+'@') < 0) {
    if(!midCookie) midCookie = '@';
    midCookie += pgcode+'@';
  }
} else {
  midCookie = midCookie.replace(pgcode+'@', '');
}
setCookie('midCookie', midCookie, 365);
});
</script>
</nav>
