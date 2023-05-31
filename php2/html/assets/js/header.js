$("nav>ul>li, .nav__bg").mouseover(function(){
    $("ul.sub, .nav__bg").stop().slideDown();
})
$("nav>ul>li, .nav__bg").mouseout(function(){
    $("ul.sub, .nav__bg").stop().slideUp();
})