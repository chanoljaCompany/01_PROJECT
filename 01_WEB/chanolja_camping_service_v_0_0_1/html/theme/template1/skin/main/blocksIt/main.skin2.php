<html>
<head>
	<style type="text/css">
		ul{list-style:none;list-style:none;font-family:"Malgun Gothic", "Georgia", "Arial", "Sans-serif"}
		.masonry{width:400px;padding:0px;font-size:0px;display:inline-block;}
		.masonry .item{
			display:block;border:1px solid #ffffff;min-height:50px;box-sizing:border-box;
			background:#1fa98d;font-size:30px;color:#ffffff;text-align:center;
		}
		.masonry .item.new{background:#fb9b33;}
		.masonry .w100{width:100px;}
		.masonry .w200{width:200px;}
 
		.form{display:inline-block;vertical-align:top;margin:0px;width:310px;font-size:0px;}
		.howto{margin-bottom:5px;}
		.howto select{width:305px;height:50px;vertical-align:top;text-align:center;font-size:15px;}
 
		.btn{}
		.btn button{width:150px;height:50px;margin:0px 5px 5px 0px;}
 
		
	</style>
	<script type="text/javascript" src="http://cdn.dontorz.com/js/jquery/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://npmcdn.com/masonry-layout@4.0/dist/masonry.pkgd.min.js"></script>
	<script type="text/javascript">
 
		$(function(){
			$masonry = $(".masonry").masonry({
				itemSelector	: ".item",
				columnWidth	: 100
			});
		});
	</script>
</head>
<body>
	<ul class="masonry">
		<li class="item w100" style="height:100px">1</li>
		<li class="item w200" style="height:150px">2</li>
		<li class="item w100" style="height:100px">3</li>
		<li class="item w100" style="height:200px">4</li>
		<li class="item w100" style="height:50px">5</li>
		<li class="item w200" style="height:200px">6</li>
		<li class="item w100" style="height:150px">7</li>
		<li class="item w100" style="height:100px">8</li>
		<li class="item w200" style="height:50px">9</li>
		<li class="item w100" style="height:100px">10</li>
	</ul>
</body>
</html>