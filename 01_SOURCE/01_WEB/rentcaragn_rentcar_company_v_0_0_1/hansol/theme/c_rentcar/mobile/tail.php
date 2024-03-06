<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}

?>
    </div>
</div>

        <footer class="section fp-auto-height" id="footer">
            <div class="inner">
                <div class="top_box">
                    <div class="lf_box">
                        <ul>
                            <li><a href="<?php echo G5_THEME_URL?>/sub/company.php">기업소개</a></li>
                            <li><a href="../../../bbs/content.php?co_id=privacy">개인정보처리방침</a></li>
                            <li><a href="../../../bbs/content.php?co_id=provision">서비스 이용약관</a></li>
                        </ul>
                    </div>
                    <div class="rt_box">
                        <img src="<?php echo G5_THEME_URL?>/img/logo.png">
                    </div>
                    <div class="clearfix"></div>
                </div> 
                <div class="bottom_box">
                    <div class="lf_box">
                        <dl>
                            <div class="box_wr">
                                <dt>본사</dt>
                                <dd> 경기도 성남시 분당구 대왕판교로 644번길 49 DTC타워 3층 </dd>
                            </div>
                            <div class="box_wr">
                                <dt>Tel</dt>
                                <dd>031-776-7690</dd>
                            </div>
                            <div class="box_wr">
                                <dt>Fax</dt>
                                <dd>031-776-7691</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="rt_box">
                        <h2>© 2020 <strong>정우그룹</strong> All Rights Reserved.</h2>
                    </div>
                </div>
            </div>
        </footer>


<script>
jQuery(function($) {

    $( document ).ready( function() {

        // 폰트 리사이즈 쿠키있으면 실행
        font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
        
        //상단고정
        if( $(".top").length ){
            var jbOffset = $(".top").offset();
            $( window ).scroll( function() {
                if ( $( document ).scrollTop() > jbOffset.top ) {
                    $( '.top' ).addClass( 'fixed' );
                }
                else {
                    $( '.top' ).removeClass( 'fixed' );
                }
            });
        }

        //상단으로
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });

    });
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");