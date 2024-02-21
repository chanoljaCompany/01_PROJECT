<?php
include "$_SERVER[DOCUMENT_ROOT]/real_reservation/top.php";
?>
<body id="manage">
<iframe name="hidden1608618704" src="" width="0" height="0" scrolling="no" frameborder="0" style="display:none"></iframe>
<div id="ToolTip"></div><style type="text/css" title="">
body {background:url('<?=$file_url?>/img/line.gif') repeat-y left top #e8e8e8;}
</style>
<div id="admin_content">
	<div id="container">
		<? include "$_SERVER[DOCUMENT_ROOT]/real_reservation/admin_header.php";?>
		<section id="wrapper">
				<article id="contentArea">
					<div class="clear"></div>
						<form name="guestroom" id="guestroom" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="curpage" id="curpage" value="">

						<div class="box_title first">
							<h2 class="title">상품정보 
                            <a class="btn btn-success btn-sm" href="javascript:void(0)" onclick="helpPop()">도움말</a>
                        </h2>
						</div>
						<table class="tbl_col">
								<caption class="hidden">회원 조회 리스트</caption>
								<thead>
									<tr>
										<th scope="col" rowspan="2" width="5%">NO</th>
                                        <th scope="col" rowspan="2" width="5%">호스트</th>
                                        <th scope="col" rowspan="2" width="9%">이미지</th>
										<th scope="col" rowspan="2" width="16%">상품명</th>
										<th scope="col" rowspan="2" width="7%">정상가</th>
										<th scope="col" colspan="3" width="13%">비수기 요금</th>
										
										<th scope="col" colspan="3" width="13%" >성수기 요금</th>
										<th scope="col" rowspan="2" width="5%">사용</th>
										<th scope="col" rowspan="2" width="7%">수정</th>
										<th scope="col" rowspan="2" width="7%">삭제</th>
									</tr>
									<tr>
										<th scope="col">주중</th>
										<th scope="col">주말</th>
										<th scope="col">휴일</th>
										<!-- <th scope="col">주중</th>
										<th scope="col">주말</th>
										<th scope="col">휴일</th> -->
										<th scope="col">주중</th>
										<th scope="col">주말</th>
										<th scope="col">휴일</th>
									</tr>
								</thead>
								<tbody id="list_data">
								 
								</tbody>
							</table>
							<div class="box_bottom">
								<div class="paging" id="paging">
								</div>
						<div class="right_area">
							<span class="box_btn gray"><input type="button" value="등록하기" onclick="go_page('input','0')"></span>
							<!-- <span class="box_btn gray"><input type="button" value="선택 삭제" onclick="tabSH(9)"></span> -->
						</div>
			</div>
					</form>
				</article>
			</section>
		<?php
		include "$_SERVER[DOCUMENT_ROOT]/real_reservation/left_nav.php";
		?>
		<div id="btn_scroll">
			<a id="scroll_top"><img src="<?=$file_url?>/img/btn_top.png" alt="최상위" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
			<a id="scroll_bottom"><img src="<?=$file_url?>/img/btn_down.png" alt="최하단" onmouseover="imgOver(this)" onmouseout="imgOver(this,'out')"></a>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<script type="text/javascript">
    var curpage = "1";
    $(document).ready(function() {
		guestroom_search_act();
    });
    
    function guestroom_search_act(){
        var page_division = "guestroom";
        var curpage = "1";
        var searchKey_1 = $("#searchKey_1 option:selected").val();
        var searchKey_2 = $("#searchKey_2 option:selected").val();
        var searchKey_3 = $("#searchKey_3 option:selected").val();
        var searchVal_1 = $('#searchVal_1').val();
        var searchVal_2 = "";
        var searchVal_3 = $('#searchVal_3').val();
        var searchVal_4 = "";
        var searchVal_5 = "";
        var searchVal_6 = "";
        showTable(curpage);
   }

  function showTable(curpage) {
        $("#curpage").val(curpage);
        var form = $('#guestroom')[0];
        var formData = new FormData(form);
        for (var pair of formData.entries())
        {
        console.log(pair[0]+ ', ' + pair[1]);
        }
        $.ajax({
            type: 'POST',
            url:'./guestroom_list_ajax.php',
            enctype: 'multipart/form-data',
            data:formData,
            cache:false,
            contentType : false,
            processData : false,
            error: function (request, status, error) {
            console.log('guestroom_list_ajax error');
            },
            success:function(html){
            $("#list_data").html(html);
        }});
         showPaing(curpage);
}
function showPaing(curpage) {
	  var form = $('#guestroom')[0];
	  var formData = new FormData(form);
	  for (var pair of formData.entries())
	  {
	    console.log(pair[0]+ ', ' + pair[1]);
	  }
	   $.ajax({
	      type: "POST",
	      url: "./guestroom_list_paging_ajax.php",
	      enctype: 'multipart/form-data',
          data:formData,
          cache:false,
          contentType : false,
          processData : false,
          success: function (html) {
            $("#paging").html(html);
          },
            complete: function () {
          }
	  });
}

	$('#guestroom_input').click(function(){
		var sh = document.guestroom;
		sh.action = "guestroom_write_action.php";
		sh.submit();
	});
	function go_page(division,guestroom_code){
		var use_del_yes = "0";
		if(division == 'delete'){
			var result = confirm("삭제하시겠습니까?");
           if(result ){ //확인 클릭 시
						 $.ajax({
					     url:"guestroom_write_action.php",
							 data: {
					 					 division : division,
					 					 guestroom_code : guestroom_code,
					 					 use_del_yes : use_del_yes
					 				 },
					     cache:false,
					        success:function(json){
                                var obj = json.dataret;
                                var recode = obj[0].ret_code;
                                var recode_msg = obj[0].ret_code_msg;
                        if(recode == '100'){ //성공
                            alert(recode_msg);
							guestroom_search_act();
			            }else if(recode == '200'){
  						      var use_del_yes = "1";
							  var result = confirm('예약관련정보가 있는 상품입니다.\n\n그래도 삭제하시겠습니까?');
							  if(result ){ //확인 클릭 시
								 $.ajax({
									url:"guestroom_write_action.php",
									data: {
											division : division,
											guestroom_code : guestroom_code,
											use_del_yes : use_del_yes
							  			  },
								    cache:false,
									success:function(json){
                                        var obj = json.dataret;
                                        var recode = obj[0].ret_code;
                                        var recode_msg = obj[0].ret_code_msg;
                                        if(recode == '100'){
                                            alert(recode_msg);
                                            guestroom_search_act();
                                        }else{
                                            alert('처리에러.');
                                        }
								}
							});
						 }
					    }else{
					        alert('처리에러.');
					    }
					    }});
					 }
		}else{
			location.href="./guestroom_write_form.php?top_menu_id=2001&left_menu_id=006&division="+division+"&guestroom_code="+guestroom_code;
		}
	}

	function checkbox_event(seq,checkVal) {
		var division = "guestroom";
		// var curpage = $('#curpage').val();
		// if(!curpage) curpage = "1";
		// alert('wr_id ' + wr_id + ' checkVal ' + checkVal + ' division ' + division+ ' curpage ' + curpage + ' top_menu_id ' + top_menu_id+ ' left_menu_id ' + left_menu_id);
			$.ajax({
					type: "GET",
					url: "./guestroom_show_mod_action.php",
					// data: "searchVal_1="+searchVal_1+"&searchVal_2="+searchVal_2+"&searchVal_3="+searchVal_3+"&searchVal_4="+searchVal_4_array+"&searchVal_5="+searchVal_5+"&searchVal_6="+searchVal_6_array+"&curpage=" + curpage,
					data: {
								 division : division,
								 seq : seq,
								 checkVal : checkVal,
								 // curpage : curpage,
								 // top_menu_id : top_menu_id,
								 // left_menu_id : left_menu_id
							 },
					success: function (html) {
							// $("#paging").html(html);
							// board_search_act();
							alert(html);
							location.reload();
					},
					complete: function () {
					}
			});
	}

function helpPop(){
	//창 크기 지정
	var width = 500;
	var height = 500;
	
	//pc화면기준 가운데 정렬
	var left = (window.screen.width / 2) - (width/2);
	var top = (window.screen.height / 4);
   	//윈도우 속성 지정
	var windowStatus = 'width='+width+', height='+height+', left='+left+', top='+top+', scrollbars=yes, status=yes, resizable=yes, titlebar=yes';
	
    	//연결하고싶은url
    	const url = "./helpPop.php";

	//등록된 url 및 window 속성 기준으로 팝업창을 연다.
	window.open(url, "hello popup", windowStatus);
}
</script>
</body>
</html>
