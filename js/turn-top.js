/**
 * Created by Administrator on 2016/1/11.
 */
    var topbtn=document.getElementById("btn");
    var topspan=document.getElementById("top-span");
    topbtn.onmouseover=function(){
        topspan.style.display="block";
    };
    topbtn.onmouseout=function(){
        topspan.style.display="none";
    }
    var timer=null;
    var  pageheight=document.documentElement.clientHeight;//页面一屏的高度
    //alert(pageheight)
    window.onscroll=function(){
        var backtop=document.body.scrollTop;//滚动的高度
        if(backtop>100){
            topbtn.style.display="block";
        }else {
            topbtn.style.display="none";
        }
    }
    topbtn.onclick=function(){
        var backtop=document.body.scrollTop;//滚动的高度
        var speedtop=backtop/5;
        document.body.scrollTop=backtop-speedtop;
        timer=setInterval(function(){
            var backtop=document.body.scrollTop;
            document.body.scrollTop-=100;
            if(backtop==0){
                clearInterval(timer);
            }
        },30)

    }