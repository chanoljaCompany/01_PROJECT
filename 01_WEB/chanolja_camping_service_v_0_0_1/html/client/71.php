<style type="text/css">
    .subpage {background: url('/theme/template1/img/booking_bg.jpg') no-repeat center;padding: 140px 0 260px;background-size: cover;}
    .sch_box {background: rgb(255 255 255 / 88%);padding: 2rem;border-radius: 10px;max-width: 480px;margin: 0 auto;}
    .sch_box .sch_tit {text-align: center;}
    .sch_box .sch_tit h2 {font-size: 21px;line-height: 1.25;}
    .sch_box .sch_content {}
    .sch_box .sch_form {position: relative;border: 1px solid #ddd;border-radius: 10px;}
    .sch_box .sch_form .frm_input {width: 100%;}
    .sch_box .sch_select {height: 61px;line-height: 61px;}
    .sch_box .sch_select.sch_date {border-bottom: 1px solid #ddd;}
    .sch_box .sch_select .sch_txt {position: relative;padding: 0 20px;}
    .sch_box .sch_select .sch_down {position: absolute;top: 0;right: 20px;font-size: 1.3em;}
    .sch_box .sch_select .sch_pop {display: none;position: absolute;top: 0;left: 100%;width: 100%;background: #fff;border-radius: 10px;box-shadow: 0 3px 16px 0 rgb(0 0 0 / 10%);z-index: 90;}
    .sch_box .sch_select.active .sch_pop {display: block;}
    .sch_box .sch_select.active .sch_down {transform: rotate(180deg);}
    .sch_box .sch_pop.sch_calendar {line-height: 1.25;padding: 20px 25px;}
    .sch_box .sch_pop.sch_check {max-width: 240px;padding: 20px 25px;}
    .sch_box .sch_pop.sch_check h3{line-height: 1.25;font-size: 16px;margin: 0 0 5px;}
    .sch_box .sch_pop.sch_check p {line-height: 1.25;font-size: 13px;}
    .sch_box .sch_pop.sch_check .sch_checkbox {margin-top: 10px;}
    .sch_box .sch_pop.sch_check .sch_checkbox span {line-height: 1;display: block;margin: 14px 0;}
    .sch_box .sch_pop.sch_check .sch_checkbox input[type=checkbox] {margin: 0;width: 18px;height: 18px;}
    .sch_box .sch_pop.sch_check .sch_checkbox label {margin: 0;padding-left: 5px;font-size: 15px;}
    .sch_box .sch_pop.sch_check .check_btn {line-height: 1;padding: 10px 0 0;border-top: 1px dashed #ccc;text-align: right;}
    .sch_box .sch_pop.sch_check .check_btn a {display: inline-block;font-size: 13px;padding: 10px 20px;background: #333;color: #fff;border-radius: 5px;}

    .sch_box .sch_submit {margin-top: 20px;text-align: center;}
    .sch_box .sch_submit a {display:block;width: 160px;height: 45px;line-height: 45px;margin: 20px auto 0;background: #2f9cdf;border-radius: 50px;color: #fff;}

    @media screen and (max-width:767px) {
        .sch_box .sch_tit h2 {font-size: 14px;}
        .sch_box .sch_select {position: relative;}
        .sch_box .sch_select .sch_pop {top: 61px;left: 0;}
    }
</style>

<div class="subpage">
    <div class="sch_box">
        <div class="sch_tit">
            <h2>캠핑카, 간편하게 예약 후 바로 떠나세요!</h2>
        </div>
        <div class="sch_content">
            <div class="sch_form">
                <div class="sch_select sch_date">
                    <div class="sch_txt"><p>대여기간을 선택하세요</p><span class="sch_down"><i class="fas fa-angle-down"></i></span></div>
                    <div class="sch_pop sch_calendar">
                        달력
                    </div>
                </div>
                <div class="sch_select sch_locate">
                    <div class="sch_txt"><p>대여를 원하는 지역을 선택하세요</p><span class="sch_down"><i class="fas fa-angle-down"></i></span></div>
                    <div class="sch_pop sch_check">
                        <h3>지역선택</h3>
                        <p>복수선택가능</p>
                        <div class="sch_checkbox">
                            <span>
                                <input type="checkbox" id="chk1" name="chk1" value="강원" class="">
                                <label for="chk1">강원</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk2" name="chk2" value="경기/인천" class="">
                                <label for="chk2">경기/인천</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk3" name="chk3" value="광주/전라" class="">
                                <label for="chk3">광주/전라</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk4" name="chk4" value="대구/울산/경북" class="">
                                <label for="chk4">대구/울산/경북</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk5" name="chk5" value="대전/충청" class="">
                                <label for="chk5">대전/충청</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk6" name="chk6" value="부산/경남" class="">
                                <label for="chk6">부산/경남</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk7" name="chk7" value="서울" class="">
                                <label for="chk7">서울</label>
                            </span>
                            <span>
                                <input type="checkbox" id="chk8" name="chk8" value="제주" class="">
                                <label for="chk8">제주</label>
                            </span>
                        </div>
                        <div class="check_btn"><a href="">선택완료</a></div>
                    </div>
                </div>
            </div>
            <div class="sch_submit"><a href="/shop/list.php?ca_id=10"><i class="fas fa-search"></i> 검색</a></div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $(".sch_txt").click(function(){
            $(this).parent(".sch_select").toggleClass("active");
        });
    });
</script>
