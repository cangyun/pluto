(function () {
    $(".search-box").on("click", function (e) {
        $(".search-box").addClass("active");
        $(document).one("click", function () {
            $(".search-box").removeClass("active");
        });
        e.stopPropagation();
    });
    $(".gotop-box").on("click", function () {
        $("html").animate({
            scrollTop: $("html").offset().top
        }, 500)
    });
    $(window).on("scroll", function () {
        let scrollTop = $(this).scrollTop();
        if (scrollTop > 200) {
            $(".gotop-box").addClass("active");
        } else {
            $(".gotop-box").removeClass("active");
        }
    });
    $(".xHeading").on("click", function (event) {
        let $this = $(this);
        $this.closest('.xControl').find('.xContent').slideToggle(300);
        if ($this.closest('.xControl').hasClass('active')) {
            $this.closest('.xControl').removeClass('active');
        } else {
            $this.closest('.xControl').addClass('active');
        }
        event.preventDefault();
    });
})();

window.addEventListener("load", function () {
    console.log("%c页面加载了" + Math.round(performance.now() / 1000 * 100)/100 + "秒", " text-shadow: 0 1px 0 #ccc,0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);font-size:24px");

    var mySVG = '<svg xmlns="http://www.w3.org/2000/svg" width="320" height="320" fill="none" stroke="#000" stroke-linecap="round" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><path id="b" stroke="#FF0000"><animate id="a" attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin"/></path><path id="c" stroke="#FF7F00"><animate attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite" begin="a.begin+1s"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin+1s"/></path><path id="d" stroke="#FFFF00"><animate attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite" begin="a.begin+2s"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin+2s"/></path><path id="e" stroke="#00FF00"><animate attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite" begin="a.begin+3s"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin+3s"/></path><path id="f" stroke="#00FFFF"><animate attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite" begin="a.begin+4s"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin+4s"/></path><path id="g" stroke="#0000FF"><animate attributeName="d" values="m160,160l0,0 0,0;m130,110l30,-17 30,17;m130,60l30,-17 30,17;m160,20l0,0 0,0" dur="6s" repeatCount="indefinite" begin="a.begin+5s"/><animate attributeName="stroke-width" values="0;4;4;4;0" dur="6s" repeatCount="indefinite" begin="a.begin+5s"/></path></defs><use xlink:href="#b"/><use xlink:href="#b" transform="rotate(60 160 160)"/><use xlink:href="#b" transform="rotate(120 160 160)"/><use xlink:href="#b" transform="rotate(180 160 160)"/><use xlink:href="#b" transform="rotate(240 160 160)"/><use xlink:href="#b" transform="rotate(300 160 160)"/><use xlink:href="#c" transform="rotate(30 160 160)"/><use xlink:href="#c" transform="rotate(90 160 160)"/><use xlink:href="#c" transform="rotate(150 160 160)"/><use xlink:href="#c" transform="rotate(210 160 160)"/><use xlink:href="#c" transform="rotate(270 160 160)"/><use xlink:href="#c" transform="rotate(330 160 160)"/><use xlink:href="#d"/><use xlink:href="#d" transform="rotate(60 160 160)"/><use xlink:href="#d" transform="rotate(120 160 160)"/><use xlink:href="#d" transform="rotate(180 160 160)"/><use xlink:href="#d" transform="rotate(240 160 160)"/><use xlink:href="#d" transform="rotate(300 160 160)"/><use xlink:href="#e" transform="rotate(30 160 160)"/><use xlink:href="#e" transform="rotate(90 160 160)"/><use xlink:href="#e" transform="rotate(150 160 160)"/><use xlink:href="#e" transform="rotate(210 160 160)"/><use xlink:href="#e" transform="rotate(270 160 160)"/><use xlink:href="#e" transform="rotate(330 160 160)"/><use xlink:href="#f"/><use xlink:href="#f" transform="rotate(60 160 160)"/><use xlink:href="#f" transform="rotate(120 160 160)"/><use xlink:href="#f" transform="rotate(180 160 160)"/><use xlink:href="#f" transform="rotate(240 160 160)"/><use xlink:href="#f" transform="rotate(300 160 160)"/><use xlink:href="#g" transform="rotate(30 160 160)"/><use xlink:href="#g" transform="rotate(90 160 160)"/><use xlink:href="#g" transform="rotate(150 160 160)"/><use xlink:href="#g" transform="rotate(210 160 160)"/><use xlink:href="#g" transform="rotate(270 160 160)"/><use xlink:href="#g" transform="rotate(330 160 160)"/></svg>';
    var svgbiz = window.btoa(mySVG);

    var cssbiz = "background: url('data:image/svg+xml;base64," + svgbiz + "') left top no-repeat; color: red; font-size: 260px;";
    console.log('%c     ', cssbiz);
});

let addComment = {
    moveForm: function ($comm, commID, $respond) {
        let comm = $("#" + $comm), respond = $("#" + $respond),cancel = $("#cancel-comment-reply-link"),commList = $(".comment-list"), commField = $("#comment_parent");
        respond.insertAfter(comm);
        cancel[0].style.display = '';
        commField.val(commID);
        cancel.click(function () {
            commField.val("0");
            respond.insertAfter(commList);
            this.style.display = 'none';
            this.onclick = null;
        });
        $("[name=comment]")[0].focus();
    }
};
$(document).ready(function () {
    $(document).on("submit", "#commentform", function (e) {
        e.preventDefault();
        $.ajax({
            url: pluto.ajax_url,
            data: $("#commentform").serialize() + "&action=comment",
            type: "POST",
            beforeSend: function () {
                layer.msg("正在提交");
            },
            error: function (xhr, status, errorThrown) {
                layer.msg(xhr.responseText);
            },
            success: function (data) {
                $("[name=comment]").val("");
                let f = $("#comment_parent").val(), respond = $("#respond"), cancel = $("#cancel-comment-reply-link");
                if (f) {
                    respond.before(`<ol class="children">${data}</ol>`);
                } else {
                    $(".comment-list").append(data);
                }
                layer.msg("提交成功");
                cancel[0].style.display = 'none';
                cancel[0].onclick = null;
                $("#comment_parent").val("0");
                respond.insertAfter($(".comment-list"));
            }
        });
    });
});
