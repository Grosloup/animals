$(function(){
    var navbtn = $(".nav-button"), navigation = $(".navigation");

    function scrollbarWidth() {
        var $inner = jQuery('<div style="width: 100%; height:200px;">test</div>'),
            $outer = jQuery('<div style="width:200px;height:150px; position: absolute; top: 0; left: 0; visibility: hidden; overflow:hidden;"></div>').append($inner),
            inner = $inner[0],
            outer = $outer[0];

        jQuery('body').append(outer);
        var width1 = inner.offsetWidth;
        $outer.css('overflow', 'scroll');
        var width2 = outer.clientWidth;
        $outer.remove();

        return (width1 - width2);
    }

    var sbw = scrollbarWidth();

    $(window).on("resize", function(evt){
        console.log($(this).width() + sbw);
        var w = $(this).width();
        if( w > 768  && navigation.is(":hidden")){
            navigation.show();
        }
        if( w <= 768  && navigation.is(":visible")){
            navigation.hide();
        }
    });
    navbtn.on("click", function(evt){
        evt.preventDefault();
        navigation.toggle();
    });
});
