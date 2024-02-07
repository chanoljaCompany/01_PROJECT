<style type="text/css">
    .mar{margin-bottom:50px;}
.sub0404_map_text{font-size:16px; font-weight:600; padding-top:10px; padding-bottom:10px; background:#f9f9f9;}
.root_daum_roughmap {width:100%}
.roughmap_maker_label .roughmap_lebel_text:after {
    content: '4UMEDI Co. LTD';
    display: block;
    clear: both;
    position: absolute;
    top: 0;
    left: 0;
    width: 168px;
    height: 26px;
    text-align: center;
    line-height: 26px;
    background: #fff;
    border-radius: 5px;
}
</style>

<div class="row mar">
    <div class="col-md-12 col-sm-12 col-xs-12 ">
        
        <img src="/theme/template1/assets/images/logo-trns.png" alt="">
        <div class="sub0404_map_text">
        &ensp;주 소&emsp;&emsp;&emsp;<?=$config[cf_6]?><br>
        &ensp;전화번호&emsp; <?=$config[cf_4]?><br>
        &ensp;팩 스&emsp;&emsp;&emsp;<?=$config[cf_5]?><br>
        &ensp;대중교통&emsp; 지하철 7호선 논현역 5번출구 (도보 200M)
        </div>
        
        <!-- * 카카오맵 - 지도퍼가기 -->
        <!-- 1. 지도 노드 -->
        <div id="daumRoughmapContainer1607935553888" class="root_daum_roughmap root_daum_roughmap_landing"></div>

        <!--
            2. 설치 스크립트
            * 지도 퍼가기 서비스를 2개 이상 넣을 경우, 설치 스크립트는 하나만 삽입합니다.
        -->
        <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

        <!-- 3. 실행 스크립트 -->
        <script charset="UTF-8">
            new daum.roughmap.Lander({
                "timestamp" : "1607935553888",
		        "key" : "23gnr",
                "mapWidth" : "100%",
                "mapHeight" : "560"
            }).render();
        </script>
    </div>
</div>