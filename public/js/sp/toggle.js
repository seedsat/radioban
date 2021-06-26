$(function () {
  //コンテンツを非表示に
  $(".accordion-content").css("display", "none");
  
  //タイトルがクリックされたら
  $(".accordion-title").click(function () {
    //".open"はaccordion-titleでもOK
    //クリックしたaccordion-title以外の全てのopenを取る
    $(".accordion-title").not(this).removeClass("open");
    //クリックされたtitle以外のcontentを閉じる
    $(".accordion-title").not(this).next().slideUp(300);
    //thisにopenクラスを付与
    $(this).toggleClass("open");
    //thisのcontentを展開、開いていれば閉じる
    $(this).next().slideToggle(300);
  });
});