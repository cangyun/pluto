<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'theme-textdomain'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/options/images/';

	$options = array();

	$options[] = array(
	    'name' => __('基础配置', 'cangyun'),
	    'type' => 'heading',
    );

    $options[] = array(
        'name' => __('文章设置', 'cangyun'),
        'type' => 'heading',
    );

    $options[] = array(
        'name' => __('版权', 'cangyun'),
        'desc' => __('启用 CC BY-SA 4.0 协议', 'cangyun'),
        'id' => 'post_cc',
        'std' => '1',
        'type' => 'checkbox',
    );

	$options[] = array(
	    'name' => __('雪花设置', 'cangyun'),
	    'type' => 'heading',
    );
	$options[] = array(
	    'name' => __('启用功能', 'cangyun'),
	    'desc' => __('是否启用雪花功能',' cangyun'),
	    'id' => 'site_snow',
        'std' => '1',
        'type' => 'checkbox'
    );
	$options[] = array(
	    'name' => __('雪花数量','cangyun'),
	    'desc' => __('数值越大雪花数量越多', 'cangyun'),
	    'id' => 'snow_flakecount',
	    'std' => '100',
	    'type' => 'text',
    );
	$options[] = array(
	    'name' => __('雪花大小', 'cangyun'),
	    'desc' => __('为基准值，数值越大雪花越大', 'cangyun'),
	    'id' => 'snow_flakesize',
        'std' => '2',
        'type' => 'text',
    );
	$options[] = array(
	    'name' => __('排斥距离', 'cangyun'),
        'desc' => __('雪花距离鼠标指针的最小值，小于这个距离的雪花将受到鼠标的排斥','cangyun'),
        'id' => 'snow_mindist',
        'std' => '100',
        'type' => 'text',
    );
	$options[] = array(
	    'name' => __('雪花速度', 'cangyun'),
        'desc' => __('为基准值，数值越大雪花下坠速度越快', 'cangyun'),
        'id' => 'snow_speed',
        'std' => '0.5',
        'type' => 'text',
    );
	$options[] = array(
	    'name' => __('雪花横移程度','cangyun'),
        'desc' => __('数值越大雪花横移幅度越大，0为竖直下落','cangyun'),
        'id' => 'snow_stepsize',
        'std' => '1',
        'type' => 'text',
    );
	$options[] = array(
	    'name' => __('雪花颜色', 'cangyun'),
	    'desc' => __('选择雪花的颜色，默认为白色', 'cangyun'),
        'id' => 'snow_color',
        'std'=>'#ffffff',
        'type' => 'color',
    );
	$options[] = array(
	    'name' => __('雪花不透明度', 'cangyun'),
        'desc' => __('范围0~1，1为不透明', 'cangyun'),
        'id' => 'snow_opacity',
        'std' => '0.3',
        'type' => 'text',
    );

	return $options;
}