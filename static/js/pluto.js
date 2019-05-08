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
    console.log("%c页面加载了" + performance.now() + "ms", " text-shadow: 0 1px 0 #ccc,0 2px 0 #c9c9c9,0 3px 0 #bbb,0 4px 0 #b9b9b9,0 5px 0 #aaa,0 6px 1px rgba(0,0,0,.1),0 0 5px rgba(0,0,0,.1),0 1px 3px rgba(0,0,0,.3),0 3px 5px rgba(0,0,0,.2),0 5px 10px rgba(0,0,0,.25),0 10px 10px rgba(0,0,0,.2),0 20px 20px rgba(0,0,0,.15);font-size:24px");
});