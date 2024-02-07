var imgcount = "<?=$imgcount?>";

	if(imgcount!=0){
	
		var <?php echo $slideSort; ?>_IMGslider = 0; //이미지 슬라이더입니다.
		
		var cloneLi = $(".<?php echo $slideSort; ?> ul li");
		$(".<?php echo $slideSort; ?> ul").clone().appendTo($(".<?php echo $slideSort; ?>")); //처음 시작할 때 UL을 한개 더 복사합니다.
		var <?php echo $slideSort; ?>_firstSlider=$(".<?php echo $slideSort; ?> ul:first"); //첫번째 슬라이더 정의입니다.
		var <?php echo $slideSort; ?>_firstSliderValue=<?php echo $topSize; ?>; //좌측 UL에 적용되는 left값 기본 값입니다.
		var <?php echo $slideSort; ?>_garoSize=0; //이미지가 top보다 부족할시 실행하기 위한 변수입니다.
		var <?php echo $slideSort; ?>_garoSizenoGesu; //이미지가 top보다 작을시 몇개를 더 넣어야 꽉차보이나 하는 변수입니다.
		var <?php echo $slideSort; ?>_secondSlider = $(".<?php echo $slideSort; ?> ul:nth-child(2)"); //두번째 UL 정의입니다.
		var <?php echo $slideSort; ?>_slideSpeed = 20; //슬라이드 속도를 정의한 것입니다. 높을 수록 느립니다. 10이 이미지가 울지 않고 적당합니다.

		var ps;

		
		
		<?php echo $slideSort; ?>_garoSize=$("#<?php echo $slideSort; ?>_top").width()-<?php echo $topSize; ?>;//이미지가 top보다 부족할시 실행하기 위한 변수입니다.
		if(<?php echo $slideSort; ?>_garoSize>=1){ //만약 픽셀이 부족하다면

			<?php echo $slideSort; ?>_garoSizenoGesu=Math.ceil($("#<?php echo $slideSort; ?>_top").width()/<?php echo $topSize; ?>); //무조건 올림한다. 이것은 꽉차려면 써야하는 이미지 사이즈의 갯수이다.
			var totImg = <?php echo $slideSort; ?>_garoSizenoGesu * <?php echo $topSize; ?>;
			
			if($("#<?php echo $slideSort; ?>_top").width()>totImg){
				<?php echo $slideSort; ?>_garoSizenoGesu + 1;
			}

			var tSize = "<?=$topSize?>";
			var totWidth= parseInt(tSize) * parseInt(<?php echo $slideSort; ?>_garoSizenoGesu);
			var imgW = "<?=$imgW?>";
			var <?php echo $slideSort; ?>_imgMargin = parseInt(totWidth) + parseInt(imgW); //우측 UL에 적용되는 left값 기본 값입니다.
			var <?php echo $slideSort; ?>_lefting = parseInt(totWidth) + parseInt(imgW); //우측 UL에 적용되는 left값 기본 값입니다.

			for(i=1; i<<?php echo $slideSort; ?>_garoSizenoGesu; i++){ //만약 이미지 갯수가 부족한경우
				cloneLi.clone().appendTo($(".<?php echo $slideSort; ?> ul")); //부족한 갯수만큼 li를 ul에 추가한다.
			}

			ps = -(parseInt(tSize) * (parseInt(<?php echo $slideSort; ?>_garoSizenoGesu)-1));

			$(".<?php echo $slideSort; ?> ul").css({"width":totWidth+"px"});

		}else{ //만약 이미지 사이즈에서 픽셀이 부족하지 않다면
			var <?php echo $slideSort; ?>_imgMargin = <?php echo $topSize*2; ?>; //우측 UL에 적용되는 left값 기본 값입니다.
			var <?php echo $slideSort; ?>_lefting = <?php echo $topSize*2; ?>; //우측 UL에 적용되는 left값 기본 값입니다.
			<?php echo $slideSort; ?>_imgMargin=<?php echo $topSize*2; ?>; //이미지 사이즈가 작지 않을 경우, 가변 값으로 슬라이드 사이즈를 고정시킨다.
			ps = 0;
		}
		<?php echo $slideSort; ?>_start(); //슬라이드 시작
	}

	
	function <?php echo $slideSort; ?>_stop(){ //슬라이드 멈추는 함수
		clearInterval(<?php echo $slideSort; ?>_IMGslider); //슬라이더 인터벌을 초기화 시킵니다.
	}
	function <?php echo $slideSort; ?>_start(){ //슬라이드 시작 함수(default)
		if($(".<?php echo $slideSort; ?>_dire").html()=="좌"){
			<?php echo $slideSort; ?>_left();  //기존 슬라이드 방향이 좌측으로 흘러간 경우, 슬라이드 재시작시 좌측으로 흘러가게 합니다.
		}else{
			<?php echo $slideSort; ?>_right();//기존 슬라이드 방향이 우측으로 흘러간 경우, 슬라이드 재시작시 우측으로 흘러가게 합니다.
		}
	}
	
	$(<?php echo $slideSort; ?>_firstSlider).css("left",<?php echo $slideSort; ?>_firstSliderValue); //슬라이드 첫 위치 정의
	$(<?php echo $slideSort; ?>_secondSlider).css("left",<?php echo $slideSort; ?>_lefting); //슬라이드 첫 위치 정의
	
	function <?php echo $slideSort; ?>_left(){

		$(".<?php echo $slideSort; ?>_dire").html("좌");
		clearInterval(<?php echo $slideSort; ?>_IMGslider); //슬라이더 인터벌을 초기화 시킵니다

		<?php echo $slideSort; ?>_IMGslider=setInterval(function(){ //좌측 슬라이더 인터벌을 시작합니다.
		if(<?php echo $slideSort; ?>_firstSliderValue<ps){ //만약 첫 슬라이드 레프트 값이 0에 도달한경우
			<?php echo $slideSort; ?>_firstSliderValue=<?php echo $slideSort; ?>_imgMargin;	//제일 뒤로 보내줍니다
		}
		if(<?php echo $slideSort; ?>_lefting<ps){ //만약 두번째 슬라이드 레프트 값이 0에 도달한경우
			<?php echo $slideSort; ?>_lefting=<?php echo $slideSort; ?>_imgMargin;	//제일 뒤로 보내줍니다
		}

		<?php echo $slideSort; ?>_lefting=<?php echo $slideSort; ?>_lefting-1; //두번째 슬라이드의 left값을 1씩 줄입니다.
		<?php echo $slideSort; ?>_firstSliderValue=<?php echo $slideSort; ?>_firstSliderValue-1; //첫번째 슬라이드의 left 값을 1씩 줄입니다.

		$(<?php echo $slideSort; ?>_firstSlider).css("left",<?php echo $slideSort; ?>_firstSliderValue);//첫번째 슬라이드의 left값을 1씩 줄인 것을 적용시킵니다.
		$(<?php echo $slideSort; ?>_secondSlider).css("left",<?php echo $slideSort; ?>_lefting);//두번째 슬라이드의 left값을 1씩 줄인 것을 적용시킵니다.
		
		},<?php echo $slideSort; ?>_slideSpeed); //슬라이드 스피드를 조정합니다.
		
		
	}
	function <?php echo $slideSort; ?>_right(){
		$(".<?php echo $slideSort; ?>_dire").html("우");
		clearInterval(<?php echo $slideSort; ?>_IMGslider); //실라이더 인터벌을 초기화합니다.

		<?php echo $slideSort; ?>_IMGslider=setInterval(function(){ //우측 슬라이더 인터벌을 시작합니다.
		<?php echo $slideSort; ?>_lefting=<?php echo $slideSort; ?>_lefting+1; //두 번째 슬라이드의 left 값을 늘립니다.
		<?php echo $slideSort; ?>_firstSliderValue=<?php echo $slideSort; ?>_firstSliderValue+1; //첫 번째 슬라이드의 left 값을 똑같이 증가시킵니다.
		
		if(<?php echo $slideSort; ?>_firstSliderValue>=<?php echo $slideSort; ?>_imgMargin){ //만약 첫 번째 슬라이드 left값이 최대치에 도달했을 경우
			<?php echo $slideSort; ?>_firstSliderValue=ps;	//제일 앞으로 보내줍니다.
		}
		if(<?php echo $slideSort; ?>_lefting>=<?php echo $slideSort; ?>_imgMargin){//만약 두 번째 슬라이드 left값이 최대치에 도달했을 경우
			<?php echo $slideSort; ?>_lefting=ps;	//제일 앞으로 보내줍니다.
		}

		$(<?php echo $slideSort; ?>_secondSlider).css("left",<?php echo $slideSort; ?>_firstSliderValue);//첫번째 슬라이드의 left값을 1씩 늘린 것을 적용시킵니다.
		$(<?php echo $slideSort; ?>_firstSlider).css("left",<?php echo $slideSort; ?>_lefting);//두번째 슬라이드의 left값을 1씩 늘린 것을 적용시킵니다.

		},<?php echo $slideSort; ?>_slideSpeed);//슬라이드 스피드를 조정합니다.
		
		
	}