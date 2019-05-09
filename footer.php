<footer>
    <div class="helper-tool text-center">
        <div class="gotop-box">
            <i class="fa fa-chevron-up"></i>
        </div>
        <div class="search-box">
            <i class="fa fa-search"></i>
            <form action="<?php echo home_url("/"); ?>" id="searchform" method="get" class="search-form">
                <input type="text" name="s" id="search" placeholder="Search...">
            </form>
        </div>
    </div>
    <div class="container">
        <div class="text-center">
            <p>© <?php echo date("Y"); ?><a href="<?php echo get_option("home"); ?>"> <?php bloginfo('name'); ?></a>.
                All Rights Reserved.
                <br>
                MADE BY WORDPRESS
            </p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
<?php if (pluto_option("live2d") && !wp_is_mobile()) { ?>
    <div id="landlord" style="left:5px;bottom:0px;">
        <div class="message" style="opacity:0"></div>
        <canvas id="live2d" width="500" height="560" class="live2d"></canvas>
        <div class="live_talk_input_body">
            <div class="live_talk_input_name_body">
                <input name="name" type="text" class="live_talk_name white_input" id="AIuserName" autocomplete="off" placeholder="你的名字" />
            </div>
            <div class="live_talk_input_text_body">
                <input name="talk" type="text" class="live_talk_talk white_input" id="AIuserText" autocomplete="off" placeholder="要和我聊什么呀？"/>
                <button type="button" class="live_talk_send_btn" id="talk_send">发送</button>
            </div>
        </div>
        <input name="live_talk" id="live_talk" value="1" type="hidden" />
        <div class="live_ico_box">
            <div class="live_ico_item type_info" id="showInfoBtn"></div>
            <div class="live_ico_item type_talk" id="showTalkBtn"></div>
            <div class="live_ico_item type_music" id="musicButton"></div>
            <div class="live_ico_item type_youdu" id="youduButton"></div>
            <div class="live_ico_item type_quit" id="hideButton"></div>
            <input name="live_statu_val" id="live_statu_val" value="0" type="hidden" />
            <audio src="" style="display:none;" id="live2d_bgm" data-bgm="0" preload="none"></audio>
            <input name="live2dBGM" value="https://t1.aixinxi.net/o_1c52p4qbp15idv6bl55h381moha.mp3" type="hidden">
            <input name="live2dBGM" value="https://t1.aixinxi.net/o_1c52p8frrlmf1aled1e14m56una.mp3" type="hidden">
            <input id="duType" value="douqilai,l2d_caihong" type="hidden">
        </div>
    </div>
    <div id="open_live2d">召唤蕾姆</div>
<?php } ?>
<?php if (pluto_option('site_snow') && !wp_is_mobile()) { ?>
    <div class="snow-content">
        <canvas id="snow"></canvas>
        <script>
            (function () {
                let requestAnimationFrame = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
                    window.setTimeout(callback, 1000 / 60);
                };
                window.requestAnimationFrame = requestAnimationFrame;
            })();
            (function () {
                let flakes = [], canvas = document.querySelector("#snow"), ctx = canvas.getContext('2d'),
                    flakeCount = <?php echo pluto_option('snow_flakecount'); ?>, mX = -100, mY = -100;
                canvas.width = window.innerWidth;
                canvas.height = window.innerHeight;

                function snow() {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    for (let i = 0; i < flakeCount; i++) {
                        let flake = flakes[i], x = mX, y = mY, minDist = <?php echo pluto_option('snow_mindist'); ?>,
                            x2 = flake.x, y2 = flake.y;
                        let dist = Math.sqrt((x2 - x) * (x2 - x) + (y2 - y) * (y2 - y));
                        if (dist < minDist) {
                            let force = minDist / (dist * dist), xcomp = (x - x2) / dist, ycomp = (y - y2) / dist,
                                deltaV = force / 3;
                            flake.velX -= deltaV * xcomp;
                            flake.velY -= deltaV * ycomp;
                        } else {
                            flake.velX *= 0.985;
                            if (flake.velY <= flake.speed) {
                                flake.velY = flake.speed;
                            }
                            flake.velX += Math.cos(flake.step += 0.05) * flake.stepSize;
                        }
                        let color = hexToRgb("<?php echo pluto_option('snow_color'); ?>");
                        ctx.fillStyle = `rgba(${color},` + flake.opacity + ")";
                        flake.y += flake.velY;
                        flake.x += flake.velX;
                        if (flake.y >= canvas.height || flake.y <= 0) {
                            reset(flake);
                        }
                        if (flake.x >= canvas.width || flake.x <= 0) {
                            reset(flake);
                        }
                        ctx.beginPath();
                        ctx.arc(flake.x, flake.y, flake.size, 0, Math.PI * 2);
                        ctx.fill();
                    }
                    requestAnimationFrame(snow);
                }

                function reset(flake) {
                    flake.x = Math.floor(Math.random() * canvas.width);
                    flake.y = 0;
                    flake.size = (Math.random() * 2.5) +<?php echo pluto_option('snow_flakesize'); ?>;
                    flake.speed = (Math.random()) +<?php echo pluto_option('snow_speed'); ?>;
                    flake.opacity = (Math.random() * 0.25) +<?php echo pluto_option('snow_opacity'); ?>;
                    flake.velY = <?php echo pluto_option('snow_speed'); ?>;
                    flake.stepSize = Math.random() / 30 *<?php echo pluto_option('snow_stepsize'); ?>;
                }

                function init() {
                    for (let i = 0; i < flakeCount; i++) {
                        let flake = {};
                        flake.x = Math.floor(Math.random() * canvas.width);
                        flake.y = Math.floor(Math.random() * canvas.height);
                        flake.size = (Math.random() * 2.5) +<?php echo pluto_option('snow_flakesize'); ?>;
                        flake.speed = (Math.random()) +<?php echo pluto_option('snow_speed'); ?>;
                        flake.opacity = (Math.random() * 0.25) +<?php echo pluto_option('snow_opacity'); ?>;
                        flake.velY = <?php echo pluto_option('snow_speed'); ?>;
                        flake.velX = 0;
                        flake.stepSize = Math.random() / 30 *<?php echo pluto_option('snow_stepsize'); ?>;
                        flake.step = 0;
                        flakes.push(flake);
                    }
                    snow();
                }

                function hexToRgb(hex) {
                    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                    return result ? `${parseInt(result[1], 16)},${parseInt(result[2], 16)},${parseInt(result[1], 16)}` : null;
                }

                document.addEventListener("mousemove", function (e) {
                    mX = e.clientX;
                    mY = e.clientY;
                });
                window.addEventListener("resize", function () {
                    canvas.width = window.innerWidth;
                    canvas.height = window.innerHeight;
                });
                init();
            })();
        </script>
    </div>
<?php } ?>
</body>
</html>