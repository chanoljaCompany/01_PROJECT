<?php
    /* kcp�� ����� kcp �������� ���۵Ǵ� ���� ��û ���� */
    $req_tx          = $_POST[ "req_tx"         ]; // ��û ����
    $res_cd          = $_POST[ "res_cd"         ]; // ���� �ڵ�
    $site_cd         = $_POST[ "site_cd"        ]; // ����Ʈ �ڵ�
    $tran_cd         = $_POST[ "tran_cd"        ]; // Ʈ����� �ڵ�
    $ordr_idxx       = $_POST[ "ordr_idxx"      ]; // ���θ� �ֹ���ȣ
    $good_name       = $_POST[ "good_name"      ]; // ��ǰ��
    $good_mny        = $_POST[ "good_mny"       ]; // ���� �ѱݾ�
    $buyr_name       = $_POST[ "buyr_name"      ]; // �ֹ��ڸ�
    $buyr_tel1       = $_POST[ "buyr_tel1"      ]; // �ֹ��� ��ȭ��ȣ
    $buyr_tel2       = $_POST[ "buyr_tel2"      ]; // �ֹ��� �ڵ��� ��ȣ
    $buyr_mail       = $_POST[ "buyr_mail"      ]; // �ֹ��� E-mail �ּ�
    $use_pay_method  = $_POST[ "use_pay_method" ]; // ���� ���
    $enc_info        = $_POST[ "enc_info"       ]; // ��ȣȭ ����
    $enc_data        = $_POST[ "enc_data"       ]; // ��ȣȭ ������
    
    $tablet_size     = "1.0"; // ȭ�� ������ ����
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
    <!-- �ŷ���� �ϴ� kcp ������ ����� ���� ��ũ��Ʈ-->
    <script type="text/javascript" src="js/approval_key.js"></script>
    
    <script type="text/javascript">
        /* kcp web ����â ȣ�� (����Ұ�) */
        function call_pay_form()
        {
            var v_frm = document.order_info;
          
            v_frm.action = PayUrl;
        
            if (v_frm.Ret_URL.value == "")
            {
                /* Ret_URL���� �� �������� URL �Դϴ�. */
                alert("������ Ret_URL�� �ݵ�� �����ϼž� �˴ϴ�.");
                return false;
            }
            else
            {
                v_frm.submit();
            }
        }
    
        /* kcp ����� ���� ���� ��ȣȭ ���� üũ �� ���� ��û (����Ұ�) */
        function chk_pay()
        {
            self.name = "tar_opener";
            var pay_form = document.pay_form;
            
            if (pay_form.res_cd.value == "3001" )
            {
                alert("����ڰ� ����Ͽ����ϴ�.");
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

        <!-- �ֹ����� �Է� form : order_info -->
        <form name="order_info" method="post" action="../kcp_api_page.php" >

            <?php
            /* ============================================================================== */
            /* =   1. �ֹ� ���� �Է�                                                        = */
            /* = -------------------------------------------------------------------------- = */
            /* =   ������ �ʿ��� �ֹ� ������ �Է� �� �����մϴ�.                            = */
            /* = -------------------------------------------------------------------------- = */
            ?>
            <!-- header -->
            <div class="header">
                <a href="../index.html" class="btn-back"><span>�ڷΰ���</span></a>
                <h1 class="title">�ֹ�/���� SAMPLE</h1>
            </div>
            <!-- //header -->
            <!-- contents -->
            <div id="skipCont" class="contents">
                <p class="txt-type-1">�� �������� ������ ��û�ϴ� ���� �������Դϴ�.</p>
                <p class="txt-type-2">�ҽ� ���� �� [�� �ʼ�] �Ǵ� [�� �ɼ�] ǥ�ð� ���Ե� ������ �������� ��Ȳ�� �°� ������ ���� �����Ͻñ� �ٶ��ϴ�.</p>
                <!-- �ֹ����� -->
                <h2 class="title-type-3">�ֹ�����</h2>
                <ul class="list-type-1">
                    <!-- �ֹ���ȣ(ordr_idxx) -->
                    <li>
                        <div class="left"><p class="title">�ֹ���ȣ</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="ordr_idxx" value="TEST1234213412" maxlength="40" />
                            </div>
                        </div>
                    </li>
                    <!-- ��ǰ��(good_name) -->
                    <li>
                        <div class="left"><p class="title">��ǰ��</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="good_name" value="�ȭ" />
                            </div>
                        </div>
                    </li>
                    <!-- �����ݾ�(good_mny) - �� �ʼ� : �� ������ ,(�޸�)�� ������ ���ڸ� �Է��Ͽ� �ֽʽÿ�. -->
                    <li>
                        <div class="left"><p class="title">��ǰ�ݾ�</p></div>
                        <div class="right">
                            <div class="ipt-type-1 gap-2 pc-wd-2">
                                <input type="text" name="good_mny" value="1004" maxlength="9" />
                                <span class="txt-price">��</span>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="line-type-1"></div>
                <!-- �ֹ����� -->
                <h2 class="title-type-3">�ֹ�����</h2>
                <ul class="list-type-1">
                    <!-- �ֹ��ڸ�(buyr_name) -->
                    <li>
                        <div class="left"><p class="title">�ֹ��ڸ�</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_name" value="ȫ�浿" />
                            </div>
                        </div>
                    </li>
                    <!-- �ֹ��� ����ó1(buyr_tel1) -->
                    <li>
                        <div class="left"><p class="title">��ȭ��ȣ</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_tel1" value="02-0000-0000" />
                            </div>
                        </div>
                    </li>
                    <!-- �޴�����ȣ(buyr_tel2) -->
                    <li>
                        <div class="left"><p class="title">�޴�����ȣ</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <input type="text" name="buyr_tel2" value="010-0000-0000" />
                            </div>
                        </div>
                    </li>
                    <!-- �ֹ��� E-mail(buyr_mail) -->
                    <li>
                        <div class="left"><p class="title">�̸���</p></div>
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
                /* =   ���� ���� ���� ����                                                             = */
                /* = -------------------------------------------------------------------------- = */
                /* =   ������ �ʿ��� ���� ���� ������ �����մϴ�.                                               = */
                /* =                                                                            = */
                /* =  �ſ�ī�� : CARD, ������ü : BANK, ������� : VCNT = */
                /* =  ����Ʈ   : TPNT, �޴���   : MOBX, ��ǰ��   : GIFT = */
                /* =                                                                            = */
                /* =  ���� ���� ������ ��� ǥ�������� ������ ���������� ǥ�õ˴ϴ�.                                    = */
                /* =                                                                            = */
                /* = �� �ʼ�                                                                      = */
                /* =  KCP�� ��û�� �����������θ� ������ �����մϴ�.                                             = */
                /* = -------------------------------------------------------------------------- = */
                ?>
                <h2 class="title-type-3">��������</h2>
                <ul class="list-type-1">
                    <!-- �������� -->
                    <li>
                        <div class="left"><p class="title">��������</p></div>
                        <div class="right">
                            <div class="ipt-type-1 pc-wd-2">
                                <select name="ActionResult" onchange="jsf__chk_type();" style="width:100%;height:35px;">
                                    <option value="" selected>�����Ͻʽÿ�</option>
                                    <option value="card">�ſ�ī��</option>
                                </select>
                            </div>
                        </div>
                    </li>
                </ul> 
                <div Class="Line-Type-1"></div>
                <ul class="list-btn-2">
                    <li class="pc-only-show"><a href="../index.html" class="btn-type-3 pc-wd-2">�ڷ�</a></li>
                    <li><a href="#none" onclick="kcp_AJAX();" class="btn-type-2 pc-wd-3">������û</a></li>
                </ul>
            </div>
            <!-- //contents -->

            <!-- footer -->
            <div class="grid-footer">
                <div class="inner">
                    <div class="footer">
                        �� NHN KCP Corp.
                    </div>
                </div>
            </div>
            <!--//footer-->
            <!-- �������� -->
            <input type="hidden" name="req_tx"          value="pay">	         <!-- ��û ���� -->
            <input type="hidden" name="shop_name"       value="TEST SITE">       <!-- ����Ʈ �̸� --> 
            <input type="hidden" name="site_cd"         value="T0000">           <!-- ����Ʈ Ű -->
            <input type="hidden" name="currency"        value="410"/>            <!-- ��ȭ �ڵ� -->
            <!-- ������� Ű -->
            <input type="hidden" name="approval_key"    id="approval">
            <!-- ������ �ʿ��� �Ķ����(����Ұ�)-->
            <input type="hidden" name="escw_used"       value="N">
            <input type="hidden" name="pay_method"      value="">
            <input type="hidden" name="van_code"        value="">
            <!-- �ſ�ī�� ���� -->
            <input type="hidden" name="quotaopt"        value="12"/>                           <!-- �ִ� �Һΰ����� -->

            <!-- ���� URL (kcp�� ����� ������ ��û�� �� �ִ� ��ȣȭ �����͸� ���� ���� �������� �ֹ������� URL) -->
            <input type="hidden" name="Ret_URL"         value="<?=$url?>">
            <!-- ȭ�� ũ������ -->
            <input type="hidden" name="tablet_size"     value="<?=$tablet_size?>">

            <!-- ���� ���� ��Ͻ� ���� Ÿ�� ( �ʵ尡 ���ų� ���� '' �ϰ�� TEXT, ���� XML �Ǵ� JSON ���� -->
            <input type="hidden" name="response_type"  value="TEXT"/>
            <input type="hidden" name="PayUrl"   id="PayUrl"   value=""/>
            <input type="hidden" name="traceNo"  id="traceNo"  value=""/>
        </form>
    </div>
<!--//wrap-->
<form name="pay_form" method="post" action="../kcp_api_page.php">
    <input type="hidden" name="req_tx"         value="<?=$req_tx?>">               <!-- ��û ����          -->
    <input type="hidden" name="res_cd"         value="<?=$res_cd?>">               <!-- ��� �ڵ�          -->
    <input type="hidden" name="tran_cd"        value="<?=$tran_cd?>">              <!-- Ʈ����� �ڵ�       -->
    <input type="hidden" name="site_cd"        value="<?=$site_cd?>">              <!-- ����Ʈ �ڵ�        -->
    <input type="hidden" name="ordr_idxx"      value="<?=$ordr_idxx?>">            <!-- �ֹ���ȣ           -->
    <input type="hidden" name="good_mny"       value="<?=$good_mny?>">             <!-- �޴��� �����ݾ�      -->
    <input type="hidden" name="good_name"      value="<?=$good_name?>">            <!-- ��ǰ��            -->
    <input type="hidden" name="buyr_name"      value="<?=$buyr_name?>">            <!-- �ֹ��ڸ�           -->
    <input type="hidden" name="buyr_tel1"      value="<?=$buyr_tel1?>">            <!-- �ֹ��� ��ȭ��ȣ      -->
    <input type="hidden" name="buyr_tel2"      value="<?=$buyr_tel2?>">            <!-- �ֹ��� �޴�����ȣ     -->
    <input type="hidden" name="buyr_mail"      value="<?=$buyr_mail?>">            <!-- �ֹ��� E-mail     -->
    <input type="hidden" name="enc_info"       value="<?=$enc_info?>">
    <input type="hidden" name="enc_data"       value="<?=$enc_data?>">
    <input type="hidden" name="use_pay_method" value="<?=$use_pay_method?>">
</form>
</body>
</html>