$(function() {
    Loadmobileps();
});
function Loadmobileps()
{ 
    $(".m_pcmo1 div").mouseenter(function () {
        $(this).css("color", "#EF5F48");
    }).mouseleave(function () {
        $(this).css("color", "");
    });
}

function btnIsmobile(isdesign, ismobile) {
    if (isdesign == false) {
        $.cookie("yibu_deviceInfo", ismobile == true ? 1 : 0, { expires: 1, path: '/' });
        $.ajax({
            cache: false,
            url: "/Plugins/changemode",
            data: { ismobile: ismobile },
            dataType: "text",
            type: 'post',
            success: function (data) {
                if (data == "1") {
                    window.location.href = location.href + '?time=' + ((new Date()).getTime());
                }
            },
            error: function (e) { alert(e) }
        });
    }
}
function btnIsmobileforcontrol(isdesign, ismobile) {
    if (isdesign == true) {
        $.cookie("yibu_deviceInfo", ismobile == true ? 1 : 0, { expires: 1, path: '/' });
        window.location.href = location.href + '?time=' + ((new Date()).getTime());
    }
    else {
        $.ajax({
            cache: false,
            url: "/Plugins/changemode",
            dataType:"text",
            data: { ismobile: ismobile },
            type: 'post',
            success: function (data) {
                if (data == "1") {
                    window.location.href = location.href + '?time=' + ((new Date()).getTime());
                }
            },
            error: function (e) { alert(e) }
        });
    }
}