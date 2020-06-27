<?php 
function finns_worth_customize_register( $wp_customize ) {
	$wp_customize->add_panel(
		'footer_panel',array(
			'priority'		=>	10,
			'capability'	=>	'edit_theme_options',
			'title'			=>	__('Theme Option', 'finns-worth' ),
			'description'	=>	__('This Section allows you to customize the theme page of your website','finns-worth'),
		)
	);
	$wp_customize->add_section(
		'footer_section',array(
			'priority'	=>	25,
			'title'		=>	__( 'Footer Section', 'ayj-2' ),
			'panel'		=>	'footer_panel'
		)
	);
	$wp_customize->add_setting('footer_logo');
	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'footer_logo',array(
 		'label'      => __('Footer Logo', 'finns-worth'),
 		'section'  => 'footer_section',
 		'settings'   => 'footer_logo',
	)));
	$wp_customize->add_setting(
		'Address',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'Address',array(
			'type'		=>	'textarea',
			'label'		=>	__( 'Address', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'Address'
		)
	);
	$wp_customize->add_setting(
		'Address_Url',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'Address_Url',array(
			'type'		=>	'text',
			'label'		=>	__( 'Address URL', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'Address_Url'
		)
	);
	$wp_customize->add_setting(
		'Email',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'Email',array(
			'type'		=>	'text',
			'label'		=>	__( 'Email', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'Email'
		)
	);
	$wp_customize->add_setting(
		'Mobile',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'Mobile',array(
			'type'		=>	'text',
			'label'		=>	__( 'Mobile No', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'Mobile'
		)
	);
	$wp_customize->add_setting(
		'facebook-url',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'facebook-url',array(
			'type'		=>	'text',
			'label'		=>	__( 'Facebook URL', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'facebook-url'
		)
	);
	$wp_customize->add_setting(
		'twitter-url',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'twitter-url',array(
			'type'		=>	'text',
			'label'		=>	__( 'Twitter URL:', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'twitter-url'
		)
	);	
	$wp_customize->add_setting(
		'instagram-url',array(
			'capability'			=>	'edit_theme_options'
		)
	);
	$wp_customize->add_control(
		'instagram-url',array(
			'type'		=>	'text',
			'label'		=>	__( 'Instagram URL:', 'finns-worth' ),
			'section'	=>	'footer_section',
			'priority'	=>	110,
			'setting'	=>	'instagram-url'
		)
	);	
}
add_action( 'customize_register', 'finns_worth_customize_register' );




