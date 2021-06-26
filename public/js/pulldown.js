/* プリダウン用のスクリプト */

$(document).ready(function(){
    // プルダウンのoption内容をコピー
    var pd2 = $("#lv2Pulldown option").clone();
    var pd4 = $("#lv4Pulldown option").clone();
    var pd6 = $("#lv6Pulldown option").clone();

    // 1→2連動
    $("#lv1Pulldown").change(function () {
        // lv1のvalue取得
        var lv1Val = $("#lv1Pulldown").val();

        // lv2Pulldownのdisabled解除
        $("#lv2Pulldown").removeAttr("disabled");

        // 一旦、lv2Pulldownのoptionを削除
        $("#lv2Pulldown option").remove();

        // (コピーしていた)元のlv2Pulldownを表示
        $(pd2).appendTo("#lv2Pulldown");

        // 選択値以外のクラスのoptionを削除
        $("#lv2Pulldown option[class != p"+lv1Val+"]").remove();

        // 「▼選択」optionを先頭に表示
        $("#lv2Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
    });

    // 3→4連動
    $("#lv3Pulldown").change(function () {
        // lv3のvalue取得
        var lv3Val = $("#lv3Pulldown").val();

        // lv2Pulldownのdisabled解除
        $("#lv4Pulldown").removeAttr("disabled");

        // 一旦、lv4Pulldownのoptionを削除
        $("#lv4Pulldown option").remove();

        // (コピーしていた)元のlv4Pulldownを表示
        $(pd4).appendTo("#lv4Pulldown");

        // 選択値以外のクラスのoptionを削除
        $("#lv4Pulldown option[class != p"+lv3Val+"]").remove();

        // 「▼選択」optionを先頭に表示
        $("#lv4Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
    });

    // 5→6連動
    $("#lv5Pulldown").change(function () {
        // lv5のvalue取得
        var lv5Val = $("#lv5Pulldown").val();

        // lv2Pulldownのdisabled解除
        $("#lv6Pulldown").removeAttr("disabled");

        // 一旦、lv6Pulldownのoptionを削除
        $("#lv6Pulldown option").remove();

        // (コピーしていた)元のlv6Pulldownを表示
        $(pd6).appendTo("#lv6Pulldown");

        // 選択値以外のクラスのoptionを削除
        $("#lv6Pulldown option[class != p"+lv5Val+"]").remove();

        // 「▼選択」optionを先頭に表示
        $("#lv6Pulldown").prepend('<option value="0" selected="selected">▼選択</option>');
    });
});