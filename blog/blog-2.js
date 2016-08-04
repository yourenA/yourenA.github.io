/**
 * Created by Administrator on 2016/3/11.
 */
$(document).ready(function(){
    $('.blog-left-list li').each(function(index){
        $(this).click(function(){
            $('div.blog-left-content-active').removeClass("blog-left-content-active");
            $('.blog-left-list li.active').removeClass("active");
            $('.blog-left-content-hide').eq(index).addClass("blog-left-content-active");
            $(this).addClass("active");
        }).mouseout(function(){

        })
    })

});