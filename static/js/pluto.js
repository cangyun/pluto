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
        if ($this.closest('.xControl').hasClass('active')){
            $this.closest('.xControl').removeClass('active');
        }else{
            $this.closest('.xControl').addClass('active');
        }
        event.preventDefault();
    });
})();