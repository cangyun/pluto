<?php
function custom_login_head() {
    echo
    '<style>
        body {
            background: #92C1D1 url('. pluto_option('login_back') .') fixed center top no-repeat !important;
            background-size: cover!important;
        }
    </style>';
    echo '<link rel="stylesheet" href="'. get_bloginfo('template_directory') .'/static/css/customlogin.css" type="text/css" />';
}
add_action("login_head", "custom_login_head");

function pluto_register_form() { ?>
    <p>
        <label for="nickname">Name<br/>
            <input id="nickname" class="input" type="text" name="nickname" value="" size="20" />
        </label>
    </p>
    <p>
        <label for="password">Password<br/>
            <input id="password" class="input" type="password" name="password" value="" size="25" />
        </label>
    </p>
    <p>
        <label for="repeat_password">Repeat Password<br/>
            <input id="repeat_password" class="input" type="password" name="repeat_password" value="" size="25" />
        </label>
    </p>
    <?php
    $num1=rand(10,89);$num2=rand(0,9);
    ?>
    <p>
        <label for="are_you_human">Captcha: <?php echo $num1.' + '.$num2.' = ?'; ?><br/>
            <input id="are_you_human" class="input" type="text" name="are_you_human" value="" size="25" />
            <input type="hidden" name="num1" value="<?php echo $num1; ?>">
            <input type="hidden" name="num2" value="<?php echo $num2; ?>">
        </label>
    </p>
<?php
}
add_action("register_form","pluto_register_form");

function check_register_fields($login, $email, $errors) {
    if (!$_POST['nickname']) $errors->add('vaild_nickname', '<strong>错误</strong>：昵称无效或为空。');
    if ($_POST['password'] != $_POST['repeat_password']) $errors->add('passwords_not_matched', '<strong>错误</strong>：两次输入的密码不一致。');
    if (strlen($_POST['password']) < 8) $errors->add("password_too_short", '<strong>错误</strong>：密码长度必须大于8位。');
    if ($_POST['are_you_human'] != $_POST['num1']+$_POST['num2']) $errors->add("not_human", '<strong>错误</strong>：验证码错误，请重试。');
}
add_action("register_post", "check_register_fields", 10, 3);

function extra_register_fields($user_id) {
    $userdata = array();
    $userdata['ID'] = $user_id;
    $userdata['user_pass'] = $_POST['password'];
    $userdata['nickname'] = $_POST['nickname'];
    $userdata['display_name'] = $_POST['nickname'];
    wp_update_user($userdata);
}
add_action("user_register", "extra_register_fields", 100, 1);