<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Templatemela
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
        <?php tmpmela_header(); ?>
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
<?php if (get_option('tmpmela_control_panel') == 'yes') do_action('tmpmela_show_panel'); ?>
 <?php if (get_option('tmpmela_show_site_loader') == 'yes') : ?>
      <!--CSS Spinner-->
      <div class="spinner-wrapper">
        <div class="spinner">
          <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
          </div>
        </div>
      </div>
      <?php endif; ?>
<div id="page" class="hfeed site">
        <?php if (get_header_image()) : ?>
            <div id="site-header">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>"
                         height="<?php echo esc_attr(get_custom_header()->height); ?>"
                         alt="<?php echo esc_attr_e('Siteheader', 'shopvolly'); ?>">
                </a>
            </div>
        <?php endif; ?>
        <!-- Header -->
      <?php tmpmela_header_before(); ?>
      <header id="masthead" class="site-header header-fix1 <?php echo "header" . esc_attr(get_option('tmpmela_header_layout')); ?> <?php echo esc_attr(tmpmela_sidebar_position()); ?>">
            <?php if (get_option('tmpmela_show_topbanner') == 'yes') : ?>
                <div class="topbar-outer">
                    <div class="theme-container">
                        <!-- Topbar link -->
                        <div class="topbar-link">
                            <span class="topbar-link-toggle"></span>
                            <div class="topbar-link-wrapper">
                                <div class="header-menu-links">
                                    <?php if (has_nav_menu('top-header-link')): ?>
                                        <?php
                                        // Woo commerce Header Cart
                                        $tmpmela_header_menu = array(
                                            'menu' => esc_html__('TM Header Top Links', 'shopvolly'),
                                            'depth' => 1,
                                            'echo' => false,
                                            'menu_class' => 'top-header-link',
                                            'container' => '',
                                            'container_class' => '',
                                            'theme_location' => 'top-header-link'
                                        );
                                        echo wp_nav_menu($tmpmela_header_menu);
                                        ?>
                                    <?php endif; ?>
                                    
                                </div>
                            </div>
                        </div>
                        <?php $tmpmela_top_cms_banner_text = get_option('tmpmela_top_cms_banner_text');
                        if (!empty($tmpmela_top_cms_banner_text)):?>
                            <a class="topbar-text" href="/my-account/"><?php esc_html_e('Đăng nhập', 'shopvolly'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="header-main site-header-fix1">
                <?php tmpmela_header_inside(); ?>
                <!-- Start header_left -->
                <div class="header-sticky">
                    <div class="header-logo">
                        <?php if (get_option('tmpmela_logo_image') != '') : ?>
                            <a href="<?php echo esc_url(home_url('/')); ?>"
                                title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php tmpmela_get_logo(); ?>
                            </a>
                        <?php else: ?>
                            <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <span class="logo-text"><?php echo get_option('tmpmela_logo_image_alt'); ?></span>
                                </a>
                            </h3>
                        <?php endif; ?>
                            <?php if (get_option('tmpmela_logo_image') == '' && get_option('tmpmela_logo_image_alt') == '') : ?>
                            <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <span class="logo-text"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
                                </a>
                            </h3>
                        <?php endif; ?>
                        <?php if (get_option('tmpmela_showsite_description') == 'yes') : ?>
                            <h2 class="site-description">
                                <?php bloginfo('description'); ?>
                            </h2>
                        <?php endif; // End tmpmela_showsite_description ?>
                    </div>
                    <div class="mega-menu">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'mega')); ?>
                    </div>
                    <div class="shopping_cart tog"
                                            title="<?php esc_attr_e('Xem giỏ hàng của bạn', 'shopvolly'); ?>">
                        <div class="cart-icon"></div>
                        <div class="cart-qty">
                            <img src="<?php echo get_template_directory_child() . '/images/cart.svg' ?>" alt="img"/>
                            <a class="cart-contents"
                                href="<?php echo esc_url(wc_get_cart_url()); ?>"
                                                  title="<?php esc_html_e('Xem giỏ hàng của bạn', 'shopvolly'); ?>"></a>
                    </div>
                </div>
                </div>
                <div class="header-top">
                    <div class="theme-container">
                        <div class="header-left">
                            <!-- Header LOGO-->
                            <div class="header-logo">
                                <?php if (get_option('tmpmela_logo_image') != '') : ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                        <?php tmpmela_get_logo(); ?>
                                    </a>
                                <?php else: ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="logo-text"><?php echo get_option('tmpmela_logo_image_alt'); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
                                  <?php if (get_option('tmpmela_logo_image') == '' && get_option('tmpmela_logo_image_alt') == '') : ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="logo-text"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
                                <?php if (get_option('tmpmela_showsite_description') == 'yes') : ?>
                                    <h2 class="site-description">
                                        <?php bloginfo('description'); ?>
                                    </h2>
                                <?php endif; // End tmpmela_showsite_description ?>
                            </div>
                            <!-- Header Mob LOGO-->
                            <div class="header-mob-logo">
                                <?php if (get_option('tmpmela_mob_logo_image') != '') : ?>
                                    <a href="<?php echo esc_url(home_url('/')); ?>"
                                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                        <?php tmpmela_get_mob_logo(); ?>
                                    </a>
                                <?php else: ?>
                                    <h3 class="site-title">
                                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="moblogo-text"><?php echo get_option('tmpmela_mob_logo_image_alt'); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
                                  <?php if (get_option('tmpmela_logo_image') == '' && get_option('tmpmela_logo_image_alt') == '') : ?>
                                    <h3 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                            <span class="moblogo-text"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></span>
                                        </a>
                                    </h3>
                                <?php endif; ?>
                                <?php if (get_option('tmpmela_showsite_description') == 'yes') : ?>
                                    <h2 class="site-description">
                                        <?php bloginfo('description'); ?>
                                    </h2>
                                <?php endif; // End tmpmela_showsite_description ?>
                            </div>
                        </div>
                        <!-- Start header_center -->
                        <div class="header-center">
                            <!--Search-->
                            <?php if (is_active_sidebar('header-search')) : ?>
                                <div class="header-search">
                                    <div class="header-toggle"></div>
                                    <div class="search-overlay"><?php tmpmela_get_widget('header-search'); ?>    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Start header_right -->
                        <div class="header-right">
                            <nav class="mobile-navigation">
                                <h3 class="menu-toggle"><?php esc_html_e('Menu', 'shopvolly'); ?></h3>
                                <div class="mobile-menu">
                                    <span class="close-menu"></span>
                                    <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'mobile-menu-inner')); ?>
                                    <a class="topbar-text" href="/my-account/"><?php esc_html_e('Đăng nhập', 'shopvolly'); ?></a>                                    
                                </div>
                            </nav>
                            <!--Cart -->
                            <div class="header-cart headercart-block">
                                <?php
                                // Woo commerce Header Cart
                                if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && is_active_sidebar('header-widget')) : ?>
                                    <div class="cart togg">
                                        <?php global $woocommerce;
                                        ob_start(); ?>
                                        <div class="shopping_cart tog"
                                             title="<?php esc_attr_e('Xem giỏ hàng của bạn', 'shopvolly'); ?>">
                                            <div class="cart-icon"></div>
                                            <div class="cart-qty"><span
                                                        class="cart-label"><?php echo esc_html_e('Giỏ Hàng', 'shopvolly'); ?></span>
                                                <a class="cart-contents"
                                                   href="<?php echo esc_url(wc_get_cart_url()); ?>"
                                                   title="<?php esc_html_e('Xem giỏ hàng của bạn', 'shopvolly'); ?>"><?php echo sprintf(_n('%d sản phẩm', '%d sản phẩm', $woocommerce->cart->cart_contents_count, 'shopvolly'), $woocommerce->cart->cart_contents_count); ?></a>
                                            </div>
                                        </div>
                                        <?php global $woocommerce; ?>
                                        <?php tmpmela_get_widget('header-widget'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom">
                    <div class="theme-container">
                        <?php if (is_active_sidebar('home-category')) : ?>
                            <div class="category-list">
                                <div class="box-category-heading">
                                    <div class="box-category">
                                        <?php echo get_option('tmpmela_navbar_category_title'); ?>
                                    </div>
                                </div>
                                <?php if (!is_page_template('page-templates/home.php')) : ?>
                                    <div class="category-box">
                                        <div class="home-category widget_product_categories">
                                            <?php tmpmela_get_widget('home-category'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <!-- end category block -->
                        <!-- #site-navigation -->
                        <nav id="site-navigation" class="navigation-bar main-navigation">
                            <a class="screen-reader-text skip-link" href="#content"
                               title="<?php esc_attr_e('Skip to content', 'shopvolly'); ?>"><?php esc_html_e('Skip to content', 'shopvolly'); ?></a>
                            <div class="mega-menu">
                                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_class' => 'mega')); ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- End header-main -->
     </header>
<?php tmpmela_header_after(); ?>
<?php tmpmela_main_before(); ?>
<?php
$tmpmela_page_layout = tmpmela_page_layout();
if (isset($tmpmela_page_layout) && !empty($tmpmela_page_layout)):
    $tmpmela_page_layout = $tmpmela_page_layout;
else:
    $tmpmela_page_layout = '';
endif;
?>
<?php
$shop = '0';
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) :
    if (is_shop())
        $tmpmela_page_layout = 'wide-page';
    $shop = '1';
endif;
?>
<?php
global $wp;
$current = esc_url(home_url(add_query_arg(array($_GET), $wp->request)));
$str = substr(strrchr($current, '?'), 1);
if ($str == 'left') {
    $div_class = 'left-sidebar';
} elseif ($str == 'right') {
    $div_class = 'right-sidebar';
} elseif ($str == 'full') {
    $div_class = 'full-width';
} else {
    $div_class = tmpmela_sidebar_position();
}
if (get_option('tmpmela_page_sidebar') == 'no'):
    $div_class = "full-width";
endif;
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    if (is_product()) {
        if (get_option('tmpmela_shop_sidebar') == 'no'):
            $div_class = "full-width";
        endif;
    }
}
if (is_home() && tmpmela_is_blog()) {
    $div_class = "left-sidebar";
}
?>
<div id="main" class="site-main <?php echo esc_attr($div_class); ?> <?php echo esc_attr(tmpmela_page_layout()); ?>">
    <div class="main_inner">
<?php if (!is_page_template('page-templates/home.php')) : ?>
    <div class="page-title header">
        <div class="page-title-inner">
            <h3 class="entry-title-main">
                <?php
                if ($shop == '1') {
                    if (is_shop()) :
                        echo '';
                    elseif (tmpmela_is_blog()):
                        esc_html_e('Blog', 'shopvolly');
                    elseif (is_search()) :
                        printf(esc_html__('Search Results for: "%s"', 'shopvolly'), get_search_query());
                    elseif (is_front_page() && is_home()):
                        esc_html_e('Blog', 'shopvolly');
                    elseif (is_singular('post')):
                        esc_html_e('Blog', 'shopvolly');
                    else :
                        the_title_attribute();
                    endif;
                } else {
                    if (tmpmela_is_blog()):
                        esc_html_e('Blog', 'shopvolly');
                    elseif (is_search()) :
                        printf(esc_html__('Search Results for: "%s"', 'shopvolly'), get_search_query());
                    elseif (is_singular('post')) :
                        esc_html_e('Blog', 'shopvolly');
                    else :
                        the_title_attribute();
                    endif;
                }
                ?>
            </h3>
            <?php tmpmela_breadcrumbs(); ?>
        </div>
    </div>
<?php endif; ?>
<?php
$tmpmela_page_layout = tmpmela_page_layout();
if (isset($tmpmela_page_layout) && !empty($tmpmela_page_layout)):
    $tmpmela_page_layout = $tmpmela_page_layout;
else:
    $tmpmela_page_layout = '';
endif;
if ($tmpmela_page_layout == 'wide-page') : ?>
    <div class="main-content-inner-full">
    <?php else:
    if (is_archive() || is_tag() || is_404()) : ?>
    <div class="main-content">
    <?php else: ?>
    <div class="main-content-inner <?php echo esc_attr(tmpmela_sidebar_position()); ?>">
<?php endif; ?>
<?php endif; ?>
<?php tmpmela_content_before(); ?>