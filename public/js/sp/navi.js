$(function($){
    //メニューの表示状態保管用
    var state = false;
    //.bodyのスクロール位置
    var scrollpos = 0;
    //meanmenuの状態による表示制御
    function mm_control() {
        if($('.mean-nav .nav').is(':visible')) {
            //表示中
            if(state == false) {
                scrollpos = $(window).scrollTop();
                $('body').addClass('fixed').css({'top': -scrollpos});
                $('.mean-container').addClass('open');
                $('.mean-nav .mask').show();
                state = true;
            }
        } else {
            //非表示中
            if(state == true) {
                $('body').removeClass('fixed').css({'top': 0});
                window.scrollTo( 0 , scrollpos );
                $('.mean-container').removeClass('open');
                $('.mean-nav .mask').hide();
                state = false;
            }
        }
    }

    $('#gNav').meanmenu({
        meanMenuContainer: "#header .h_nav", // メニューを表示させる位置
        meanScreenWidth: "768"
    });
    $(document)
    .on('opend.meanmenu closed.meanmenu', function() {
        mm_control();
    })
    .on('touchend click', '.mean-bar .mask', function(e) {
        $('.mean-bar .meanmenu-reveal').trigger('click');
        return false;
    });
    //ウィンドウサイズ変更によるメニュー非表示時の制御
    $(window).on('resize', function() {
        mm_control();
    });
});