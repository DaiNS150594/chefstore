<?php
// ADD GOOGLE MERCHANT CUSTOMER REVIEW TO THANK YOU PAGE.
add_action( 'woocommerce_thankyou', 'gmc_customer_review_thankyou', 10, 1 );
if ( ! function_exists( 'gmc_customer_review_thankyou' ) ) {
	function gmc_customer_review_thankyou( $order_id ) {
		if ( ! $order_id ) {
			return;
		}
		// Get an instance of the WC_Order object
		$order = wc_get_order( $order_id );
		$customer_email = $order->billing_email;
		$et_deliveried_date = new DateTime('tomorrow');
		$et_deliveried_date->modify('+2 days');
		
		?>
		<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>
		<script>
		  window.renderOptIn = function() {
			window.gapi.load('surveyoptin', function() {
			  window.gapi.surveyoptin.render(
				{
				  // REQUIRED FIELDS
				  "merchant_id": 314124183,
				  "order_id": "<?= $order_id ?>",
				  "email": "<?= $customer_email ?>",
				  "delivery_country": "VN",
				  "estimated_delivery_date": "<?= $et_deliveried_date->format('Y-m-d') ?>",

				  // OPTIONAL FIELDS
				  //"products": [{"gtin":"GTIN1"}, {"gtin":"GTIN2"}]
				});
			});
		  }
		</script>
		<?php
	}
}

// Change status of BACS orders to processing.
add_action( 'woocommerce_thankyou_bacs', 'bacs_order_payment_processing_order_status', 10, 1 );
function bacs_order_payment_processing_order_status( $order_id ) {
    if ( ! $order_id ) {
        return;
    }

    // Get an instance of the WC_Order object
    $order = wc_get_order( $order_id );
 
    if ( in_array( $order->get_status(), array('on-hold', 'pending') ) ) {
        $order->update_status('processing');
    } else {
        return;
    }
}


add_filter( 'woocommerce_product_tabs', 'misha_remove_additional_information' );
function misha_remove_additional_information( $tabs ) {
	unset( $tabs['additional_information'] );
	return $tabs;
}


// Remove out of stock products from search/product category pages.
// $query->is_search() && $query->is_main_query())
add_action( 'pre_get_posts', 'misha_hide_out_of_stock' );
function misha_hide_out_of_stock( $query ){
	if (is_product_category() && $query->is_main_query()) {
		$query->set( 'meta_key', '_stock_status' );
		$query->set( 'meta_value', 'instock' );
	}
}

// Remove out of stock products from related product list in single product page.
add_filter( 'woocommerce_related_products', 'mysite_filter_related_products', 10, 1 );
function mysite_filter_related_products( $related_product_ids ) {
    foreach( $related_product_ids as $key => $value ) {
        $relatedProduct = wc_get_product( $value );
        if( ! $relatedProduct->is_in_stock() ) {
            unset( $related_product_ids["$key"] );
        }
    }
    return $related_product_ids;
}


/**
 * TemplateMela
 * @copyright  Copyright (c) TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 * @author         TemplateMela
 * @version        Release: 1.0
 */
/**  Set Default options : Theme Settings  */
function tmpmela_set_default_options_child()
{
  /*  General Settings  */
  add_option("tmpmela_logo_image",get_stylesheet_directory_uri()."/images/megnor/logo.png"); // set logo image	
  add_option("tmpmela_mob_logo_image", get_stylesheet_directory_uri()."/images/megnor/mob-logo.png"); // set logo image	

  add_option("tmpmela_button_color","F5C646"); // Button color
  add_option("tmpmela_button_text_color","000000"); // Button Text color
  add_option("tmpmela_button_hover_color","000000"); // Button Hover Color
  add_option("tmpmela_button_hover_text_color","FFFFFF");//Button hover Text Color

  /*Topbar setting*/
  add_option("tmpmela_topbar_bkg_color","f2f2f2");//Topbar background color
  add_option("tmpmela_topbar_text_hover_color","F5C646");//Topbar Text Hover Color

  /*  Navigation Menu Setting  */
  add_option("tmpmela_top_menu_text_color","000000");//Top Menu text color
  add_option("tmpmela_top_menu_texthover_color","F5C646"); // Header top menu text hover color
  add_option("tmpmela_sub_menu_bkg_color","FFFFFF"); // Sub menu background color
  add_option("tmpmela_sub_menu_text_color","000000"); // Sub menu text color
  add_option("tmpmela_sub_menu_texthover_color","F5C646"); // Sub menu text hover color

  /*  Content Settings  */
  add_option("tmpmela_link_color","000000"); // Link color
  add_option("tmpmela_hoverlink_color","F5C646"); // Link hover color

  /*  Footer Settings  */	
  add_option("tmpmela_footer_bkg_color","FFFFFF"); // Footer background color
  add_option("tmpmela_footer_title_color","000000"); // Footer link text color
  add_option("tmpmela_footerlink_color","252525"); // Footer link text color
  add_option("tmpmela_footerhoverlink_color","F5C646"); // Footer link hover text color
  /*Top Footer Block setting*/

  add_option("tmpmela_footer_outer_bkg_color","F5C646");//Top Footer Background Color
  add_option("tmpmela_footer_outer_text_color","000000");//Top Footer Text Color
}
add_action('init', 'tmpmela_set_default_options_child');
function tmpmela_child_scripts() {
    wp_enqueue_style( 'tmpmela-child-style', get_template_directory_uri(). '/style.css' );	
}
add_action( 'wp_enqueue_scripts', 'tmpmela_child_scripts' );
/********************************************************
**************** One Click Import Data ******************
********************************************************/

if ( ! function_exists( 'sampledata_import_files' ) ) :
function tmpmela_sampledata_import_files() {
    return array(
		 array(
        'import_file_name'             => 'shopvolly_layout8',
        'local_import_file'            => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo8/shopvolly_layout8.wordpress.xml',
        'local_import_customizer_file' => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo8/shopvolly_layout8_customizer_export.dat',
	    'local_import_widget_file'     => trailingslashit( get_stylesheet_directory() ) . 'demo-content/demo8/shopvolly_layout8_widgets_settings.wie',
        'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'shopvolly' ),
        ),
		);
}
add_filter( 'pt-ocdi/import_files', 'tmpmela_sampledata_import_files' );
endif;

if ( ! function_exists( 'tmpmela_sampledata_after_import' ) ) :
function tmpmela_sampledata_after_import($selected_import) {
         //Set Menu
        $header_menu = get_term_by('name', 'Main Menu', 'nav_menu');
        $top_menu = get_term_by('name', 'Header Top Links', 'nav_menu');
	
        set_theme_mod( 'nav_menu_locations' , array( 
    		 'primary'   => $header_menu->term_id,
    		 'top-header-link'   => $top_menu->term_id
    		 )
      );
		
		//Set Front page and blog page
       $page = get_page_by_title( 'Home');
       if ( isset( $page->ID ) ) {
        update_option( 'page_on_front', $page->ID );
        update_option( 'show_on_front', 'page' );
       }
	   $post = get_page_by_title( 'Blog');
       if ( isset( $page->ID ) ) {
        update_option( 'page_for_posts', $post->ID );
        update_option( 'show_on_posts', 'post' );
       }
	   
	   //Import Revolution Slider
       if ( class_exists( 'RevSlider' ) ) {
           $slider_array = array(
              get_stylesheet_directory()."/demo-content/demo8/tmpmela_homeslider_layout8.zip",
              );
           $slider = new RevSlider();
           foreach($slider_array as $filepath){
             $slider->importSliderFromPost(true,true,$filepath);  
           }
           echo esc_html__( 'Slider processed', 'shopvolly' );
      }
}
add_action( 'pt-ocdi/after_import', 'tmpmela_sampledata_after_import' );
endif;

/** ADD ORDER INFO TO THANK YOU PAGE. */
function wh_CustomReadOrder($order_id)
{
    $order = wc_get_order($order_id);
	$orderTotal = $order->calculate_totals();
    ?>
    <script type="text/javascript">
		dataLayer.push({
		  	'event': 'gtm4wp.orderCompleted',
		  	'ecommerce': {
				'purchase': {
			  	'actionField': {
					'id': '<?= $order->id ?>',
					'revenue': '<?= $orderTotal ?>',
			  		}
				}
		  	}
		});
    </script>
    <?php
}

add_action('woocommerce_thankyou', 'wh_CustomReadOrder');
?>