<?php
// মেনু সাপোর্ট রেজিস্টার করা
function my_theme_setup() {
    register_nav_menus( array(
        'primary' => 'Primary Menu',
    ) );
}
add_action( 'after_setup_theme', 'my_theme_setup' );

function my_custom_theme_customizer( $wp_customize ) {
    // নতুন একটি সেকশন যোগ করা
    $wp_customize->add_section( 'theme_colors', array(
        'title'    => 'Theme Colors',
        'priority' => 30,
    ) );

    // কালার পিকার সেটিংস
    $wp_customize->add_setting( 'menu_link_color', array(
        'default'   => '#bff8ff',
        'transport' => 'refresh',
    ) );

    // কালার পিকার কন্ট্রোল
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_link_color', array(
        'label'    => 'Menu Link Color',
        'section'  => 'theme_colors',
        'settings' => 'menu_link_color', // এই লাইনটি যোগ করা জরুরি
    ) ) ); // এখানে ব্র্যাকেটগুলো ঠিক করা হয়েছে

    // ফন্ট সাইজ সেটিংস
    $wp_customize->add_setting( 'menu_font_size', array(
        'default'   => '15px',
        'transport' => 'refresh',
    ) );

    // ফন্ট সাইজ কন্ট্রোল
    $wp_customize->add_control( 'menu_font_size', array(
        'label'    => 'Menu Font Size (e.g. 15px)',
        'section'  => 'theme_colors', // একই সেকশনে রাখছি
        'type'     => 'text',
    ) );

    // মেনু ব্যাকগ্রাউন্ড কালার সেটিংস
    $wp_customize->add_setting( 'menu_bg_color', array(
        'default'   => '#1e293b', // আপনার বর্তমান কালার
        'transport' => 'refresh',
    ) );

    // মেনু ব্যাকগ্রাউন্ড কালার কন্ট্রোল
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bg_color', array(
        'label'    => 'Menu Background Color',
        'section'  => 'theme_colors',
        'settings' => 'menu_bg_color',
    ) ) );    

    // মেনু বারের লোগো সেটিংস
    $wp_customize->add_setting( 'menu_logo_image', array(
        'default'   => get_template_directory_uri() . '/assets/icons/lgo.png',
        'transport' => 'refresh',
    ) );

    // মেনু বারের লোগো কন্ট্রোল
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'menu_logo_image', array(
        'label'    => 'Upload Menu Logo',
        'section'  => 'theme_colors', // এটি এখন আপনার নিজের তৈরি 'Theme Colors' সেকশনে থাকবে
        'settings' => 'menu_logo_image',
    ) ) );

    // ব্র্যান্ড নাম এবং ট্যাগলাইনের জন্য আলাদা কালার সেটিংস
    $wp_customize->add_setting( 'brand_main_color', array('default' => '#ffffff') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_main_color', array(
        'label'    => 'Brand Name Color',
        'section'  => 'theme_colors',
    ) ) );

    $wp_customize->add_setting( 'brand_tagline_color', array('default' => '#cccccc') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_tagline_color', array(
        'label'    => 'Tagline Color',
        'section'  => 'theme_colors',
    ) ) );

    // হোভার ব্যাকগ্রাউন্ড কালার সেটিংস
    $wp_customize->add_setting( 'menu_hover_bg_color', array('default' => '#ffffff') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_hover_bg_color', array(
        'label'    => 'Menu Hover Background Color',
        'section'  => 'theme_colors',
    ) ) );

    // সার্চ বার ব্যাকগ্রাউন্ড কালার
    $wp_customize->add_setting( 'search_bg_color', array('default' => '#ffffff') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_bg_color', array(
        'label'    => 'Search Bar Background Color',
        'section'  => 'theme_colors',
    ) ) );

    // সার্চ বার বাটন ব্যাকগ্রাউন্ড কালার
    $wp_customize->add_setting( 'search_btn_bg_color', array('default' => '#000000') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'search_btn_bg_color', array(
        'label'    => 'Search Button Color',
        'section'  => 'theme_colors',
    ) ) );

    // সার্চ বার হাইট (লম্বা/চওড়া করার জন্য)
    $wp_customize->add_setting( 'search_height', array('default' => '40') );
    $wp_customize->add_control( 'search_height', array(
        'label'    => 'Search Bar Height (px)',
        'section'  => 'theme_colors',
        'type'     => 'number',
    ) );

    // সার্চ বার উইডথ (প্রস্থ) কন্ট্রোল
    $wp_customize->add_setting( 'search_width', array('default' => '250') );
    $wp_customize->add_control( 'search_width', array(
        'label'    => 'Search Bar Width (px)',
        'section'  => 'theme_colors',
        'type'     => 'number',
    ) );

    // Homepage Banner Section
    $wp_customize->add_section( 'banner_section', array(
        'title'    => 'Homepage Banner',
        'priority' => 30,
    ) );

    // ১. ব্যানার ইমেজ সেটিং
    $wp_customize->add_setting( 'banner_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'banner_image', array(
        'label'    => 'Upload Banner Image',
        'section'  => 'banner_section',
    ) ) );

    // ২. বাটন লিংক সেটিং
    $wp_customize->add_setting( 'banner_button_link', array('default' => '#') );
    $wp_customize->add_control( 'banner_button_link', array(
        'label'    => 'Button Link URL',
        'section'  => 'banner_section',
        'type'     => 'url',
    ) );

    // --- Hero Text Section ---
    $wp_customize->add_section( 'hero_text_section', array(
        'title'    => 'Hero Section Texts',
        'priority' => 35,
    ) );

    // ১. বড় হেডিং টেক্সট
    $wp_customize->add_setting( 'hero_main_title', array('default' => 'আপনার জন্য সব ডিজিটাল প্রোডাক্ট এক জায়গায়।') );
    $wp_customize->add_control( 'hero_main_title', array(
        'label'    => 'Main Heading',
        'section'  => 'hero_text_section',
        'type'     => 'text',
    ) );

    // ২. ছোট সাব-টেক্সট
    $wp_customize->add_setting( 'hero_sub_title', array('default' => 'Digital E Product BD - Buy Premium Digital Products BD at Low Price in Bangladesh') );
    $wp_customize->add_control( 'hero_sub_title', array(
        'label'    => 'Sub Heading',
        'section'  => 'hero_text_section',
        'type'     => 'text',
    ) );

    // ফন্ট সাইজ সেটিংস
    $wp_customize->add_setting( 'hero_font_size', array('default' => '24px') );
    $wp_customize->add_control( 'hero_font_size', array(
        'label'    => 'Main Title Font Size',
        'section'  => 'hero_text_section',
        'type'     => 'text',
    ) );

    // হেডিং কালার
    $wp_customize->add_setting( 'hero_h2_color', array('default' => '#333333') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_h2_color', array('label' => 'Heading Color', 'section' => 'hero_text_section') ) );

    // সাব-হেডিং কালার
    $wp_customize->add_setting( 'hero_p_color', array('default' => '#666666') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_p_color', array('label' => 'Sub-heading Color', 'section' => 'hero_text_section') ) );

    // সাব-হেডিং ফন্ট সাইজ
    $wp_customize->add_setting( 'hero_p_font_size', array('default' => '16px') );
    $wp_customize->add_control( 'hero_p_font_size', array('label' => 'Sub-heading Font Size', 'section' => 'hero_text_section', 'type' => 'text') );

}
add_action( 'customize_register', 'my_custom_theme_customizer' );
?>