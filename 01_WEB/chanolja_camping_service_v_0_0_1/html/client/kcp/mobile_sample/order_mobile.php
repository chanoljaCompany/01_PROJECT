<?php
    /* kcp와 통신후 kcp 서버에서 전송되는 결제 요청 정보 */
    $req_tx          = $_POST[ "req_tx"         ]; // 요청 종류
    $res_cd          = $_POST[ "res_cd"         ]; // 응답 코드
    $site_cd         = $_POST[ "site_cd"        ]; // 사이트 코드
    $tran_cd         = $_POST[ "tran_cd"        ]; // 트랜잭션 코드
    $ordr_idxx       = $_POST[ "ordr_idxx"      ]; // 쇼핑몰 주문번호
    $good_name       = $_POST[ "good_name"      ]; // 상품명
    $good_mny        = $_POST[ "good_mny"       ]; // 결제 총금액
    $buyr_name       = $_POST[ "buyr_name"      ]; // 주문자명
    $buyr_tel1       = $_POST[ "buyr_tel1"      ]; // 주문자 전화번호
    $buyr_tel2       = $_POST[ "buyr_tel2"      ]; // 주문자 핸드폰 번호
    $buyr_mail       = $_POST[ "buyr_mail"      ]; // 주문자 E-mail 주소
    $use_pay_method  = $_POST[ "use_pay_method" ]; // 결제 방법
    $enc_info        = $_POST[ "enc_info"       ]; // 암호화 정보
    $enc_data        = $_POST[ "enc_data"       ]; // 암호화 데이터
    
    $tablet_size     = "1.0"; // 화면 사이즈 고정
    $url             = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
?>

<!DOCTYPE>
<html>
<head>
    <title>*** NHN KCP API SAMPLE ***</title>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes, target-densitydpi=medium-dpi">  
    <link href="../static/css/style.css" rel="stylesheet" type="text/css" id="cssLink"/>
    <!-- 거래등록 하는 kcp 서버와 통신을 위한 스크립트-->
    <script type="text/javascript" src="js/approval_key.js"></script>
    
    <script type="text/javascript">
        /* kcp web 결제창 호츨 (변경불가) */
        function call_pay_form()
        {
            var v_frm = document.order_info;
          
            v_frm.action = PayUrl;
        
            if (v_frm.Ret_URL.value == "")
            {
                /* Ret_URL값은 현 페이지의 URL 입니다. */
                alert("연동시 Ret_URL을 반드시 설정하셔야 됩니다.");
                return false;
            }
            else
            {
                v_frm.submit();
            }
        }
    
        /* kcp 통신을 통해 받은 암호화 정보 체크 후 결제 요청 (변경불가) */
        function chk_pay()
        {
            self.name = "tar_opener";
            var pay_form = document.pay_form;
            
            if (pay_form.res_cd.value == "3001" )
            {
                alert("사용자가 취소하였습니다.");
                pay_form.res_cd.value = "";
            }
            
            if (pay_form.enc_info.value)
                pay_form.submit();
        }
    
        function jsf__chk_type()
        {
            if ( document.order_info.ActionResult.value == "card" )
            {
                document.order_info.pay_method.value = "CARD";
            }
        }
    </script>
</head>
<body onload="jsf__chk_type();chk_pay();">
    <div class="wrap">

        <!-- 주문정보 입력 form : order_info -->
        <form name="order_info" method="post" action="../kcp_api_page.php" >

            <?php
            /* ============================================================================== */
            /* =   1. 주문 정보 입력                                                        = */
            /* = -------------------------------------------------------------------------- = */
            /* =   결제에 필요한 주문 정보를 입력 및 설정합니다.                            = */
            /* = -------------------------------------------------------------------------- = */
            ?>
            <!-- header -->
            <div class="header">
                <a href="../index.html" class="btn-back"><span>뒤로가기</span></a>
                <h1 class="title">주문/결제 SAMPLE</h1>
            </div>
            <!-- //header -->
            <!-- contents -->
            <div id="skipCont" class="contents">
                <p class="txt-type-1">이 페이지는 결제를 요청하는 샘플 페이지입니다.</p>
                <p class="txt-type-2">소스 수정 시 [※ 필수] 또는 [※ 옵션] 표시가 포함된 문장은 가맹점의 상황에 맞게 적절히 수정 적용하시기 바랍니다.</p>
                <!-- 주문내역 -->
                <h2 class="title-type-3">주문내역</h2>
                <ul class="list-type-1">
                    <!-- 주문번호(ordr_idxx) -->
                    <li>
                        <div class="left"><p class="title">주문번호</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="ordr_idxx" value="TEST1234213412" maxlength="40" />
                            </div>
                        </div>
                    </li>
                    <!-- 상품명(good_name) -->
                    <li>
                        <div class="left"><p class="title">상품명</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="good_name" value="운동화" />
                            </div>
                        </div>
                    </li>
                    <!-- 결제금액(good_mny) - ※ 필수 : 값 설정시 ,(콤마)를 제외한 숫자만 입력하여 주십시오. -->
                    <li>
                        <div class="left"><p class="title">상품금액</p></div>
                        <div class="right">
                            <div class="ipt-type-1 gap-2 pc-wd-2">
                                <input type="text" name="good_mny" value="1004" maxlength="9" />
                                <span class="txt-price">원</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="line-type-1"></div>
                <!-- 주문정보 -->
                <h2 class="title-type-3">주문정보</h2>
                <ul class="list-type-1">
                    <!-- 주문자명(buyr_name) -->
                    <li>
                        <div class="left"><p class="title">주문자명</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_name" value="홍길동" />
                            </div>
                        </div>
                    </li>
                    <!-- 주문자 연락처1(buyr_tel1) -->
                    <li>
                        <div class="left"><p class="title">전화번호</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_tel1" value="02-0000-0000" />
                            </div>
                        </div>
                    </li>
                    <!-- 휴대폰번호(buyr_tel2) -->
                    <li>
                        <div class="left"><p class="title">휴대폰번호</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_tel2" value="010-0000-0000" />
                            </div>
                        </div>
                    </li>
                    <!-- 주문자 E-mail(buyr_mail) -->
                    <li>
                        <div class="left"><p class="title">이메일</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_mail" value="test@test.co.kr" />
                            </div>
                        </div>
                    </li>
                </ul> 
                <div class="line-type-1"></div>
                <?php
                /* ============================================================================== */
                /* =   결제 수단 정보 설정                                                             = */
                /* = -------------------------------------------------------------------------- = */
                /* =   결제에 필요한 결제 수단 정보를 설정합니다.                                               = */
                /* =                                                                            = */
                /* =  신용카드 : CARD, 계좌이체 : BANK, 가상계좌 : VCNT = */
                /* =  포인트   : TPNT, 휴대폰   : MOBX, 상품권   : GIFT = */
                /* =                                                                            = */
                /* =  위와 같이 설정한 경우 표준웹에서 설정한 결제수단이 표시됩니다.                                    = */
                /* =                                                                            = */
                /* = ※ 필수                                                                      = */
                /* =  KCP에 신청된 결제수단으로만 결제가 가능합니다.                                             = */
                /* = -------------------------------------------------------------------------- = */
                ?>
                <h2 class="title-type-3">결제수단</h2>
                <ul class="list-type-1">
                    <!-- 결제수단 -->
                    <li>
                        <div class="left"><p class="title">결제수단</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <select name="ActionResult" onchange="jsf__chk_type();" style="width:100%;height:35px;">
                                    <option value="" selected>선택하십시오</option>
                                    <option value="card">신용카드</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul> 
                <div Class="Line-Type-1"></div>
                <ul class="list-btn-2">
                    <li class="pc-only-show"><a href="../index.html" class="btn-type-3 pc-wd-2">뒤로</a></li>
                    <li><a href="#none" onclick="kcp_AJAX();" class="btn-type-2 pc-wd-3">결제요청</a></li>
                </ul>
            </div>
            <!-- //contents -->

            <!-- footer -->
            <div class="grid-footer">
                <div class="inner">
                    <div class="footer">
                        ⓒ NHN KCP Corp.
                    </div>
                </div>
            </div>
            <!--//footer-->
            <!-- 공통정보 -->
            <input type="hidden" name="req_tx"          value="pay">	         <!-- 요청 구분 -->
            <input type="hidden" name="shop_name"       value="TEST SITE">       <!-- 사이트 이름 --> 
            <input type="hidden" name="site_cd"         value="T0000">           <!-- 사이트 키 -->
            <input type="hidden" name="currency"        value="410"/>            <!-- 통화 코드 -->
            <!-- 결제등록 키 -->
            <input type="hidden" name="approval_key"    id="approval">
            <!-- 인증시 필요한 파라미터(변경불가)-->
            <input type="hidden" name="escw_used"       value="N">
            <input type="hidden" name="pay_method"      value="">
            <input type="hidden" name="van_code"        value="">
            <!-- 신용카드 설정 -->
            <input type="hidden" name="quotaopt"        value="12"/>                           <!-- 최대 할부개월수 -->

            <!-- 리턴 URL (kcp와 통신후 결제를 요청할 수 있는 암호화 데이터를 전송 받을 가맹점의 주문페이지 URL) -->
            <input type="hidden" name="Ret_URL"         value="<?=$url?>">
            <!-- 화면 크기조정 -->
            <input type="hidden" name="tablet_size"     value="<?=$tablet_size?>">

            <!-- 결제 정보 등록시 응답 타입 ( 필드가 없거나 값이 '' 일경우 TEXT, 값이 XML 또는 JSON 지원 -->
            <input type="hidden" name="response_type"  value="TEXT"/>
            <input type="hidden" name="PayUrl"   id="PayUrl"   value=""/>
            <input type="hidden" name="traceNo"  id="traceNo"  value=""/>
        </form>
    </div>
<!--//wrap-->
<form name="pay_form" method="post" action="../kcp_api_page.php">
    <input type="hidden" name="req_tx"         value="<?=$req_tx?>">               <!-- 요청 구분          -->
    <input type="hidden" name="res_cd"         value="<?=$res_cd?>">               <!-- 결과 코드          -->
    <input type="hidden" name="tran_cd"        value="<?=$tran_cd?>">              <!-- 트랜잭션 코드       -->
    <input type="hidden" name="site_cd"        value="<?=$site_cd?>">              <!-- 사이트 코드        -->
    <input type="hidden" name="ordr_idxx"      value="<?=$ordr_idxx?>">            <!-- 주문번호           -->
    <input type="hidden" name="good_mny"       value="<?=$good_mny?>">             <!-- 휴대폰 결제금액      -->
    <input type="hidden" name="good_name"      value="<?=$good_name?>">            <!-- 상품명            -->
    <input type="hidden" name="buyr_name"      value="<?=$buyr_name?>">            <!-- 주문자명           -->
    <input type="hidden" name="buyr_tel1"      value="<?=$buyr_tel1?>">            <!-- 주문자 전화번호      -->
    <input type="hidden" name="buyr_tel2"      value="<?=$buyr_tel2?>">            <!-- 주문자 휴대폰번호     -->
    <input type="hidden" name="buyr_mail"      value="<?=$buyr_mail?>">            <!-- 주문자 E-mail     -->
    <input type="hidden" name="enc_info"       value="<?=$enc_info?>">
    <input type="hidden" name="enc_data"       value="<?=$enc_data?>">
    <input type="hidden" name="use_pay_method" value="<?=$use_pay_method?>">
</form>
</body>
</html>