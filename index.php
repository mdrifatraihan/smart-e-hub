<?php
/*
Template Name: Custom Homepage
*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="A premium digital product marketplace for software, subscriptions, courses, templates, and online resources."
    />
    <meta name="theme-color" content="#0F172A" />
    <title>Digital E-Product BD | Digital Products Marketplace</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/responsive.css" />
    
    <style>
    /* ১. হেডার ব্যাকগ্রাউন্ড */
    .site-header {
        background-color: <?php echo get_theme_mod('menu_bg_color', '#1e293b'); ?> !important;
    }

    /* ২. মেনু লিঙ্ক এবং বাটন স্টাইল */
    .nav-list li a {
        color: <?php echo get_theme_mod('menu_link_color', '#ffffff'); ?> !important;
        font-size: <?php echo get_theme_mod('menu_font_size', '15'); ?>px !important;
        padding: 8px 15px;
        border-radius: 20px;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    .nav-list li a:hover {
        background-color: <?php echo get_theme_mod('menu_hover_bg_color', '#ffffff'); ?> !important;
        color: #000000 !important;
    }

    /* ৩. ব্র্যান্ড নাম এবং ট্যাগলাইন */
    .brand .brand-copy strong {
        color: <?php echo get_theme_mod('brand_main_color', '#ffffff'); ?> !important;
    }
    .brand .brand-copy small {
        color: <?php echo get_theme_mod('brand_tagline_color', '#cccccc'); ?> !important;
    }

    /* ৪. সার্চ বার এবং বাটন স্টাইল */
    .search-form {
        display: flex;
        align-items: center;
    }
    .search-form input[type="search"] {
        width: <?php echo get_theme_mod('search_width', '250'); ?>px !important;
        height: <?php echo get_theme_mod('search_height', '40'); ?>px !important;
        background-color: <?php echo get_theme_mod('search_bg_color', '#ffffff'); ?> !important;
        padding: 0 15px;
        border: none;
        border-radius: 5px 0 0 5px;
        box-sizing: border-box;
    }
    .search-form button {
        height: <?php echo get_theme_mod('search_height', '40'); ?>px !important;
        background-color: <?php echo get_theme_mod('search_btn_bg_color', '#000000'); ?> !important;
        color: #ffffff;
        border: none;
        padding: 0 15px;
        border-radius: 0 5px 5px 0;
        cursor: pointer;
    }
    </style>

</head>
  <body id="home">
    <a class="skip-link" href="#products">Skip to products</a>

    <header  class="site-header" data-header>
      <div class="container header-inner">
        <!-- লোগো বাম পাশে থাকবে -->
        <a class="brand" href="<?php echo home_url('/'); ?>" aria-label="Home">
        <!-- এখানে লোগোটি ডায়নামিক করা হয়েছে -->
        <img src="<?php echo get_theme_mod('menu_logo_image', get_template_directory_uri() . '/assets/icons/lgo.png'); ?>" alt="Logo">
        <span class="brand-copy">
            <strong><?php echo get_bloginfo('name'); ?></strong>
            <small><?php echo get_bloginfo('description'); ?></small>
        </span>
        </a>

        <!-- ডান পাশের সব এলিমেন্টকে একসাথে রাখার জন্য নতুন div -->
        <div class="header-right-side">
          
          <!-- সার্চ বার -->
          <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
          <label class="sr-only" for="site-search">Search products</label>
          <input 
              id="site-search" 
              type="search" 
              name="s" 
              placeholder="Searching..." 
              value="<?php echo get_search_query(); ?>" 
              autocomplete="off" 
              data-search-input 
          />
          <button type="submit" aria-label="Search">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
              </svg>
          </button>
          </form>

          <!-- মেনু বার (Home, Products, Contact Us, About) -->
          <?php
          wp_nav_menu( array(
              'theme_location' => 'primary',
              'container' => false,
              'menu_class' => 'nav-list',
          ) );
          ?>

          <!-- কার্ট এবং লাইভ চ্যাট বাটন -->
          <nav class="nav-actions" aria-label="Primary actions" data-nav>
            <a href="#footer" class="icon-button cart-button" aria-label="Shopping cart">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M6.5 6h15l-2 8H8L6.2 3H3" />
                <path d="M9 20a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm9 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" />
              </svg>
              <span class="badge" aria-label="1 item in cart">1</span>
            </a>
            
            <a href="https://wa.me/8801340472084" class="whatsapp-btn" target="_blank" aria-label="Chat on WhatsApp">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="whatsapp-icon" style="width: 18px; height: 18px; margin-right: 8px;">
                <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
              </svg>
              <span>Live Chat</span>
            </a>
          </nav>
        </div>

        <!-- মোবাইল মেনু টগল বাটন -->
        <button class="icon-button menu-toggle" type="button" aria-label="Open menu" aria-expanded="false" data-menu-toggle>
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
    </header>

    <main>
      <!-- ১. ব্যানার সেকশন -->
      <section class="hero-banner-section">
        <div class="container">
            <?php 
            // কাস্টমাইজার থেকে ইমেজ ইউআরএল নেওয়া
            $banner_image = get_theme_mod('banner_image'); 
            
            // যদি ইমেজ আপলোড করা থাকে তবে সেটি দেখাবে, না থাকলে ডিফল্ট ইমেজ দেখাবে
            if ( !empty($banner_image) ) : ?>
                <img src="<?php echo esc_url($banner_image); ?>" alt="Banner">
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/bana/banar.png" class="banner-radius" alt="Default Banner">
            <?php endif; ?>
        </div>
      </section>

      <!-- 🌟 ২. নতুন ক্যাটাগরি সেকশন (ব্যানারের নিচে আলাদাভাবে বসবে) 🌟 -->
      <section class="category-section">
        <div class="container">

          <!-- ক্যাটাগরির হেডিং এবং সাব-হেডিং (ডাইনামিক) -->
          <div class="category-heading">
              <h2 style="color: <?php echo get_theme_mod('hero_h2_color', '#333333'); ?> !important; font-size: <?php echo get_theme_mod('hero_font_size', '24px'); ?> !important;">
                  <?php echo get_theme_mod('hero_main_title', 'আপনার জন্য সব ডিজিটাল প্রোডাক্ট এক জায়গায়।'); ?>
              </h2>
              <p style="color: <?php echo get_theme_mod('hero_p_color', '#666666'); ?> !important; font-size: <?php echo get_theme_mod('hero_p_font_size', '16px'); ?> !important;">
                  <?php echo get_theme_mod('hero_sub_title', 'Digital E Product BD - Buy Premium Digital Products BD at Low Price in Bangladesh'); ?>
              </p>
          </div>

            <!-- ক্যাটাগরি বক্সগুলোর লিস্ট -->
            <div class="category-grid">
                <?php
                for ($i = 1; $i <= 15; $i++) {
                    $group = get_field('cat_' . $i);

                    if ($group) :
                        $icon       = $group['icon'];
                        $title      = $group['title'];
                        $box_color  = $group['box_color'];
                        $text_color = $group['text_color'];
                ?>
                        <div class="category-box" style="background-color: <?php echo esc_attr($box_color); ?>;">
                            <img src="<?php echo esc_url($icon); ?>" alt="<?php echo esc_attr($title); ?>">
                            <span style="color: <?php echo esc_attr($text_color); ?>;">
                                <?php echo esc_html($title); ?>
                            </span>
                        </div>
                <?php
                    endif;
                }
                ?>
            </div>
          </div>
        </div>
      </section>

      <!-- ৩. প্রোডাক্ট সেকশন -->
      <section class="product-section" id="products" aria-labelledby="products-heading">
        <div class="container">
          <div class="section-heading">
              <div>
                <p class="eyebrow">Featured catalog</p>
                <h2 id="products-heading" style="color: <?php echo get_theme_mod('prod_heading_color', '#162033'); ?> !important; font-size: <?php echo get_theme_mod('prod_heading_size', '34'); ?>px !important;">
                    <?php echo get_theme_mod('prod_heading_text', 'Popular digital products'); ?>
                </h2>
              </div>
              <p style="color: <?php echo get_theme_mod('prod_desc_color', '#64748b'); ?> !important; font-size: <?php echo get_theme_mod('prod_desc_size', '16'); ?>px !important;">
                  <?php echo get_theme_mod('prod_desc_text', 'Cleanly organized offers with transparent pricing and instant support.'); ?>
              </p>
          </div>

          <div class="product-grid" data-product-grid>
            <?php
            // WP_Query: সব প্রোডাক্ট পোস্ট নিয়ে আসছি
            $args = array(
              'post_type'      => 'products',
              'posts_per_page' => -1,
              'orderby'        => 'menu_order date',
              'order'          => 'ASC',
            );
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) :
              while ( $query->have_posts() ) :
                $query->the_post();

                // ACF ফিল্ড থেকে ডেটা নিচ্ছি
                $product_image  = get_field( 'product_image' );
                $product_name   = get_field( 'product_name' );
                $discount_type  = get_field( 'discount_type' );
                $button_label   = get_field( 'button_label' ) ?: 'Order Now';
                $button_bg      = get_field( 'button_bg_color' ) ?: '#0070f3';
                $button_text    = get_field( 'button_text_color' ) ?: '#ffffff';

                // প্রাইস ক্যালকুলেশন করছি
                $prices = calculate_product_price( get_the_ID() );
                $original_price = $prices['original_price'];
                $new_price = $prices['new_price'];
                $discount_percent = $prices['discount_percent'];

                // ইমেজ URL নিচ্ছি
                $image_url = $product_image ? $product_image['url'] : get_template_directory_uri() . '/assets/images/placeholder.png';
                ?>

                <article class="product-card" data-title="<?php echo esc_attr( $product_name ); ?>">
                  <a class="product-media" href="<?php the_permalink(); ?>" aria-label="View <?php echo esc_attr( $product_name ); ?>">
                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product_name ); ?>" loading="lazy" />
                  </a>
                  <div class="product-content">
                    <h3><?php echo wp_kses_post( get_the_title() ); ?></h3>
                    <div class="price-row">
                      <span class="old-price"><?php echo number_format( $original_price, 2, '.', ',' ); ?>৳</span>
                      <span class="new-price"><?php echo number_format( $new_price, 2, '.', ',' ); ?>৳</span>
                      <?php if ( $discount_type !== 'none' ) : ?>
                        <span class="discount"><?php echo intval( $discount_percent ); ?>% off</span>
                      <?php endif; ?>
                    </div>
                    <button class="button order-button" type="button" style="background-color: <?php echo esc_attr( $button_bg ); ?>; color: <?php echo esc_attr( $button_text ); ?>;">
                      <?php echo esc_html( $button_label ); ?>
                    </button>
                  </div>
                </article>

                <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </div>

          <!-- ------------------------------------------------------------------------------- -->

          <p class="empty-state" data-empty-state hidden>No matching products found.</p>

          <nav class="pagination" aria-label="Product pagination">
            <a href="#" aria-label="Previous page">Previous</a>
            <a href="#" aria-label="Next page">Next</a>
          </nav>
        </div>
      </section>
    </main>

    <footer class="site-footer" id="footer">
      <div class="container footer-grid">
        <section class="footer-column footer-brand" aria-labelledby="footer-brand-title">
          <h2 id="footer-brand-title">Digital E-Product BD</h2>
          <p class="footer-tagline">Buy digital products in Bangladesh</p>
          <p>
            Trusted marketplace for useful digital tools, learning resources, premium subscriptions, and downloadable
            products with quick support.
          </p>
          <address>
            <strong>Address:</strong> Sector 44, Uttara Model Town, Dhaka<br />
            <strong>Email:</strong> <a href="mailto:digitaleproductbd@gmail.com">digitaleproductbd@gmail.com</a><br />
            <strong>Phone:</strong> <a href="tel:+8801837269061">(+880) 183 726 9061</a>
          </address>
          <div class="social-links" aria-label="Social links">
            <a href="#" aria-label="Facebook">f</a>
            <a href="#" aria-label="Twitter">x</a>
            <a href="#" aria-label="YouTube">yt</a>
            <a href="#" aria-label="WhatsApp">wa</a>
            <a href="#" aria-label="Instagram">ig</a>
          </div>
        </section>

        <section class="footer-column" aria-labelledby="help-title">
          <h2 id="help-title">Help</h2>
          <p class="footer-tagline">Get 24/7 customer support</p>
          <ul>
            <li><a href="#">Home Page</a></li>
            <li><a href="#">Privacy Policies</a></li>
            <li><a href="#">Return + Exchanges</a></li>
            <li><a href="#">Terms & Conditions</a></li>
            <li><a href="#">FAQ's</a></li>
          </ul>
        </section>

        <section class="footer-column" aria-labelledby="about-title">
          <h2 id="about-title">About Us</h2>
          <p class="footer-tagline">Contact Digital E-Product BD</p>
          <ul>
            <li><a href="#">Visit Our Store</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">My Account</a></li>
          </ul>
        </section>

        <section class="footer-column newsletter" aria-labelledby="newsletter-title">
          <h2 id="newsletter-title">Sign up for email</h2>
          <p class="footer-tagline">Join our digital product community</p>
          <p>Sign up for first notification on new arrivals, sales, exclusive content, events, and more.</p>
          <form class="newsletter-form">
            <label class="sr-only" for="newsletter-email">Email address</label>
            <input id="newsletter-email" type="email" placeholder="Email" required />
            <button class="button button-accent" type="submit">Send</button>
          </form>
        </section>
      </div>

      <div class="footer-bottom">
        <div class="container">
          <p>Digital E-Product BD is a trusted online shop for premium digital products, software licenses, and subscriptions.</p>
          <p>&copy; 2026, All Right Reserved BY | Digital E-Product BD.</p>
        </div>
      </div>
    </footer>

    <script src="js/app.js" defer></script>
  </body>
</html>
?>