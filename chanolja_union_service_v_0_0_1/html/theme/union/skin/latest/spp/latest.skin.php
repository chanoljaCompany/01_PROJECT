﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
global $is_admin;

$n_thumb_width = 312; //썸네일 가로 크기
$n_thumb_height = 420; //썸네일 세로 크기
?>
<style>
.move_title {float: left;border:1px solid #696969; background:#000; padding:5px 20px; font-size:14px;}
.move_title a{color:#fff;}
.move_title a:hover,.move_title a:focus{text-decoration: none;}
</style>


<div class="move_title tooltip-top" title="더보기"><a href="<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $bo_table; ?>"><?php echo $bo_subject; ?></a></div>

<script type="text/javascript">
var sliderwidth="100%"  //스크롤 가로 사이즈
var sliderheight="<?=$n_thumb_height;?>px"  //스크롤 세로 사이즈
var slidespeed="1"  
slidebgcolor="transparent"  // 배경색을 주시려면 #99cc00 등과 같이 바꾸시면 됩니다 !

var leftarrowimage = "<?php echo $latest_skin_url;?>/img/left.png";
var rightarrowimage = "<?php echo $latest_skin_url;?>/img/right.png";

var leftrightslide=new Array()
var finalslide=''



<? 
for ($i=0; $i<count($list); $i++) {

//$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $imgwidth , $imgheight);

$n_thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $n_thumb_width, $n_thumb_height);
$n_noimg = "$latest_skin_url/img/noimg.gif";
if($n_thumb['src']) {
  $img_content = $n_thumb['src'];
} else {
  $img_content = $n_thumb_width;
}
      
?>
    leftrightslide[<?=$i;?>] = "<A HREF='<?=$list[$i]['wr_link1'];?>' target='_blank' class='slide_over'><img src='<?=$img_content;?>' border=0 width='<?=$n_thumb_width?>' height='<?=$n_thumb_height?>'  style='margin:0 5px; padding:5px; border:1px solid #ddd;'></A>";
<?
}
?>


var imagegap=""
var slideshowgap=0

var copyspeed=slidespeed
    leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'
var iedom=document.all||document.getElementById
    if (iedom)
        document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')

var actualwidth=''
var cross_slide, ns_slide
var righttime,lefttime

function fillup(){
    if (iedom){
        cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2
        cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3
        cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide
        actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
        cross_slide2.style.left=actualwidth+slideshowgap+"px"
    }
    else if (document.layers){
        ns_slide=document.ns_slidemenu.document.ns_slidemenuorange
        ns_slide2=document.ns_slidemenu.document.ns_slidemenu3
        ns_slide.document.write(leftrightslide)
        ns_slide.document.close()
        actualwidth=ns_slide.document.width
        ns_slide2.left=actualwidth+slideshowgap
        ns_slide2.document.write(leftrightslide)
        ns_slide2.document.close()
    }
    lefttime=setInterval("slideleft()",50)
}
window.onload=fillup

function slideleft(){
    if (iedom){
    if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+20))
        cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"
    else
        cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"
    if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+20))
        cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"
    else
        cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"
    }
    else if (document.layers){
    if (ns_slide.left>(actualwidth*(-1)+20))
        ns_slide.left-=copyspeed
    else
        ns_slide.left=ns_slide2.left+actualwidth+slideshowgap
    if (ns_slide2.left>(actualwidth*(-1)+20))
        ns_slide2.left-=copyspeed
    else
        ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
    }
}

function slideright(){
    if (iedom){
    if (parseInt(cross_slide.style.left)<(actualwidth+20))
        cross_slide.style.left=parseInt(cross_slide.style.left)+copyspeed+"px"
    else
        cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth*(-1)+slideshowgap+"px"
    if (parseInt(cross_slide2.style.left)<(actualwidth+20))
        cross_slide2.style.left=parseInt(cross_slide2.style.left)+copyspeed+"px"
    else
        cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth*(-1)+slideshowgap+"px"
    }
    else if (document.layers){
    if (ns_slide.left>(actualwidth*(-1)+20))
        ns_slide.left-=copyspeed
    else
        ns_slide.left=ns_slide2.left+actualwidth+slideshowgap
    if (ns_slide2.left>(actualwidth*(-1)+20))
        ns_slide2.left-=copyspeed
    else
        ns_slide2.left=ns_slide.left+actualwidth+slideshowgap
    }
}

function right(){
    if(lefttime){
        clearInterval(lefttime)
        clearInterval(righttime)
        righttime=setInterval("slideright()",50)  
    }
}

function left(){
    if(righttime){
        clearInterval(lefttime)
        clearInterval(righttime)
        lefttime=setInterval("slideleft()",50)  
    }
}
    document.write('<div width='+sliderwidth+'>');
    document.write('<img src='+rightarrowimage+' onMouseover="right();copyspeed=2" onMouseout="copyspeed=1" style="cursor:hand; float:right;">')
document.write('<img src='+leftarrowimage+' onMouseover="left(); copyspeed=2" onMouseout="copyspeed=1" style="cursor:hand;  float: right;">')


    if (iedom||document.layers){
        with (document){
            document.write('')
    if (iedom){
        write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden;>')
        write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=1">')
        write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
        write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
        write('</div></div>')
    }
    else if (document.layers){
        write('<ilayer width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>')
        write('<layer name="ns_slidemenuorange" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
        write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
        write('</ilayer>')
    }
    document.write('</div>')
    }
}


</script>