$(function(){
    resizeAll();
    $(window).bind("resize", function(){
        resizeAll();
    });
});

$(window).bind('load', function() {resizeAll()});


function footerStickBottom (footer_block) {
    $(footer_block).css({'margin-top':0});
    var allWindowsHeight = $(window).height();
    var footerBottomOffset = $(footer_block).offset().top + $(footer_block).outerHeight();
    // console.log(allWindowsHeight);
    // console.log(footerBottomOffset);
    if (allWindowsHeight > footerBottomOffset) {
        var footerMarginTop = allWindowsHeight - footerBottomOffset;
        $(footer_block).css({'margin-top':footerMarginTop});
    }
}

function resizeAll() {

    footerStickBottom ('.footer');

}