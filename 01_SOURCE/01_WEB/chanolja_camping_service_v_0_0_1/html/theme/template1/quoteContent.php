<div class="banner-container" style="
    position:fixed; z-index:999; bottom: 50%; right: 20px; width: 340px; height: 460px; transform: translateY(50%);
">
    <div class="banner" id="scrollBanner" style="height:100%">
        <div class="banner-content" style="
            border: #13568d 3px solid;
            background: #fff;
            border-radius: 20px;
            height: 100%;
        " >
            <span class="close-button0" id="closeBanner" style="font-size:30px; position: absolute; top:10px; right:25px;"><font style="color:#18568d; cursor:pointer;">x</font></span>
            <center style="margin-top: 28px;">
                <br>

                <font style="font-size:30px; color:#13568d; font-weight: 600; margin-bottom : 5px;" >캠핑카 문의</font><br>
                <!--<img src="<?php echo G5_THEME_IMG_URL ?>/qna.png" alt="견적문의" style="width:119px; margin-bottom:10px; justify-content: center;" class="banner-image;"> -->
            </center>
            <form name="contactform" method="post" action="<?php echo G5_THEME_URL ?>/quoteApi.php">
                <!--<form id="contactForm" action="send_email.php" method="POST">-->
                <div class="input-row" style="text-align: center;">
                    <input name="first_name"  type="text" placeholder="이름" class="ipt" style="width:233px; height:40px; margin-top : 27px; border: 1px solid #13568d; padding-left: 10px; border-radius:10px; background:#f5f5f5;" required>
                    <input name="email_from"  type="text" placeholder="전화번호" class="ipt" style="width:233px; height:40px; margin-top : 18px; border: 1px solid #13568d; padding-left: 10px; border-radius:10px; background:#f5f5f5;" required>
                    <input name="telephone"  type="text" placeholder="희망지역 및 날짜" class="ipt" style="width:233px; height:40px; margin-top : 18px; border: 1px solid #13568d; padding-left: 10px; border-radius:10px; background:#f5f5f5;" required>
                    <input name="comments"  type="text" placeholder="희망차종 및 인원" class="ipt" style="width:233px; height:40px; margin-top : 18px; border: 1px solid #13568d; padding-left: 10px; border-radius:10px; background:#f5f5f5;" required>
                </div>
                <div class="input-row" style="margin-top: 27px;">
                    <center>
                        <input type="checkbox"  required> 개인정보 수집/이용 동의
                    </center>
                </div>

                <div class="input-row" style="text-align:center; margin-top: 16px;">
                    <input type="submit" value="" class="btn_submit" style="background: url('<?php echo G5_THEME_IMG_URL ?>/select.png') no-repeat; width: 245px; height: 49px; border-radius:10px; " required">
                    <!--
                    <button type="submit" id="submitForm" style="background-image: url('<?php echo G5_THEME_IMG_URL ?>/select.png'); background-size: cover; width: 100px; height: 30px;">&nbsp;</button>-->
                </div>

            </form>
        </div>
    </div>
</div>

<div class="help" style="cursor:pointer; display:none; position:fixed; z-index:999; bottom: 10%; right: 20px; transform: translateY(50%);">
    <img src="http://cmtest.dothome.co.kr/theme/template1/img/help.png" />
</div>

<style>
    @media screen and (max-width: 480px) {

        .banner-container {
            display:none;
            right:50%  !important;
            transform: translateX(50%);
            width:280px !important;
        }
    }

</style>

<script>
      $('.close-button0').click(()=>{
        $('.banner-container').css('display', 'none');
        $('.help').css('display', 'block');
      })

      $('.help').click(()=>{
           $('.banner-container').css('display', 'block');
           $('.help').css('display', 'none');
      });
</script>