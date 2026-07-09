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

// ============================================
// CUSTOM POST TYPE: Products
// ============================================
function register_products_cpt() {
    $args = array(
        'label'             => 'Products',
        'public'            => true,
        'publicly_queryable'=> true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'products' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-shopping-cart',
        'supports'          => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'        => array(),
    );
    register_post_type( 'products', $args );
}
add_action( 'init', 'register_products_cpt' );

// ============================================
// ACF FIELDS REGISTRATION (JSON)
// ============================================
// ACF fields JSON - এটি functions.php এ রাখলে ACF JSON import হবে
function register_acf_product_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key' => 'group_products_main',
        'title' => 'Product Details',
        'fields' => array(
            // ১. Product Image
            array(
                'key' => 'field_product_image',
                'label' => 'Product Image',
                'name' => 'product_image',
                'type' => 'image',
                'instructions' => 'Upload product image',
                'required' => 1,
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
            ),
            // ২. Product Name
            array(
                'key' => 'field_product_name',
                'label' => 'Product Name',
                'name' => 'product_name',
                'type' => 'text',
                'instructions' => 'Enter the product name',
                'required' => 1,
            ),
            // ৩. Original Price
            array(
                'key' => 'field_original_price',
                'label' => 'Original Price',
                'name' => 'original_price',
                'type' => 'number',
                'instructions' => 'Enter original price in Taka',
                'required' => 1,
                'min' => 0,
            ),
            // ৪. Discount Type
            array(
                'key' => 'field_discount_type',
                'label' => 'Discount Type',
                'name' => 'discount_type',
                'type' => 'select',
                'instructions' => 'Choose discount type',
                'choices' => array(
                    'none' => 'None',
                    'taka' => 'Taka',
                    'percentage' => 'Percentage',
                ),
                'default_value' => 'none',
            ),
            // ৫. Discount Value
            array(
                'key' => 'field_discount_value',
                'label' => 'Discount Value',
                'name' => 'discount_value',
                'type' => 'number',
                'instructions' => 'Enter discount amount or percentage',
                'required' => 0,
                'min' => 0,
            ),
            // ৬. Order Button - Background Color
            array(
                'key' => 'field_button_bg_color',
                'label' => 'Order Button - Background Color',
                'name' => 'button_bg_color',
                'type' => 'color_picker',
                'default_value' => '#0070f3',
            ),
            // ৭. Order Button - Text Color
            array(
                'key' => 'field_button_text_color',
                'label' => 'Order Button - Text Color',
                'name' => 'button_text_color',
                'type' => 'color_picker',
                'default_value' => '#ffffff',
            ),
            // ৮. Order Button - Label
            array(
                'key' => 'field_button_label',
                'label' => 'Order Button - Label',
                'name' => 'button_label',
                'type' => 'text',
                'default_value' => 'Order Now',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'products',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ) );
}
add_action( 'acf/init', 'register_acf_product_fields' );

// ============================================
// PRICE CALCULATION HELPER
// ============================================
function calculate_product_price( $post_id ) {
    $original_price = get_field( 'original_price', $post_id );
    $discount_type = get_field( 'discount_type', $post_id );
    $discount_value = get_field( 'discount_value', $post_id );

    if ( $discount_type === 'none' || ! $discount_value ) {
        return array(
            'original_price' => $original_price,
            'new_price' => $original_price,
            'discount' => 0,
            'discount_percent' => 0,
        );
    }

    $new_price = $original_price;
    $discount_percent = 0;

    if ( $discount_type === 'taka' ) {
        $new_price = $original_price - $discount_value;
        $discount_percent = round( ( $discount_value / $original_price ) * 100 );
    } elseif ( $discount_type === 'percentage' ) {
        $discount_amount = ( $original_price * $discount_value ) / 100;
        $new_price = $original_price - $discount_amount;
        $discount_percent = $discount_value;
    }

    return array(
        'original_price' => max( $original_price, 0 ),
        'new_price' => max( $new_price, 0 ),
        'discount' => abs( $original_price - $new_price ),
        'discount_percent' => $discount_percent,
    );
}
?>