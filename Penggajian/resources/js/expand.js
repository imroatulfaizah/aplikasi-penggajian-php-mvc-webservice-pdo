/**
 * Created with JetBrains PhpStorm.
 * User: David
 * Date: 24/09/13
 * Time: 16:12
 * To change this template use File | Settings | File Templates.
 */
$(document).ready(function(){
    $(".top-right-panel").toggle(function(){
        $(this).addClass("non-active");
    }, function () {
        $(this).removeClass("non-active");
    });
    $(".top-right-panel").click(function(){
        $(this).next(".bottom-right-panel").slideToggle("slow");
    });
});