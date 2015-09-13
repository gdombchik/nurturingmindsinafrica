<?php

/*-----------------------------------------------------------------------------------*/
/* Start WooThemes Functions - Please refrain from editing this section */
/*-----------------------------------------------------------------------------------*/

// Set path to WooFramework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/includes/';

// Don't load alt stylesheet from WooFramework
if ( ! function_exists( 'woo_output_alt_stylesheet' ) ) {
	function woo_output_alt_stylesheet () {}
}

// Define the theme-specific key to be sent to PressTrends.
define( 'WOO_PRESSTRENDS_THEMEKEY', 'tnla49pj66y028vef95h2oqhkir0tf3jr' );

// WooFramework
require_once ( $functions_path . 'admin-init.php' );	// Framework Init

if ( get_option( 'woo_woo_tumblog_switch' ) == 'true' ) {
	//Enable Tumblog Functionality and theme is upgraded
	update_option( 'woo_needs_tumblog_upgrade', 'false' );
	update_option( 'tumblog_woo_tumblog_upgraded', 'true' );
	update_option( 'tumblog_woo_tumblog_upgraded_posts_done', 'true' );
	require_once ( $functions_path . 'admin-tumblog-quickpress.php' );  // Tumblog Dashboard Functionality 
}

/*-----------------------------------------------------------------------------------*/
/* Load the theme-specific files, with support for overriding via a child theme.
/*-----------------------------------------------------------------------------------*/

$includes = array(
				'includes/theme-options.php', 			// Options panel settings and custom settings
				'includes/theme-functions.php', 		// Custom theme functions
				'includes/theme-actions.php', 			// Theme actions & user defined hooks
				'includes/theme-comments.php', 			// Custom comments/pingback loop
				'includes/theme-js.php', 				// Load JavaScript via wp_enqueue_script
				'includes/sidebar-init.php', 			// Initialize widgetized areas
				'includes/theme-widgets.php',			// Theme widgets
				'includes/theme-advanced.php',			// Advanced Theme Functions
				'includes/theme-shortcodes.php',	 	// Custom theme shortcodes
				'includes/woo-layout/woo-layout.php',	// Layout Manager
				'includes/woo-meta/woo-meta.php',		// Meta Manager
				'includes/woo-hooks/woo-hooks.php'		// Hook Manager
				);

// Allow child themes/plugins to add widgets to be loaded.
$includes = apply_filters( 'woo_includes', $includes );

foreach ( $includes as $i ) {
	locate_template( $i, true );
}

// Load WooCommerce functions, if applicable.
if ( is_woocommerce_activated() ) {
	locate_template( 'includes/theme-woocommerce.php', true );
}

/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* You can add custom functions below */
/*-----------------------------------------------------------------------------------*/

/************ Marion Golin ******************************/

/****** Add a banner at the top of page 33 who we are, 170 Impact, 182 How to Help  *******************/
/****** add drop shadow to menu **********************************************************************/
add_action( 'woo_content_before', 'add_subpage_banner' );
function add_subpage_banner ()
{ 
echo '<div  id="drop-shadow" style="margin-top:-42px; width:1020px;height:3px;background-image:url(\'http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/shadow.png\'); background-repeat:repeat-x;"></div>';

if (is_page(33)) {
    echo '<div style="margin-top:-2px;margin-bottom:0px; width:1020px; height:233px;"><img alt="" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/who-we-are-banner.png" 
     style="width:1020px;height:233px;"></div>';    
} /* end if page 33 */

    if (is_page(182)) {
    echo '<div style="margin-top:-2px;margin-bottom:0px; width:1020px; height:233px;"><img alt="" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/howtohelpTop.jpg" 
     style="width:1020px;height:233px;"></div>';   
    
} /* end if page 182 */

    if (is_page(170)) {
     echo '<div style="margin-top:-2px; margin-bottom:0px; width:1020px; height:233px;"><img alt="" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/Final_NM_OurImpact_bigslide.jpg" 
     style="width:1020px;height:233px;"></div>';   
    
} /* end if page 170 */   

} /* end add_subpage_banner */

/********************* Marion Golin add loop to display posts of category featured on homepage ***************************/
add_action( 'woo_loop_after', 'homepage_feature_posts' );
function homepage_feature_posts ()
{
if (is_page(35)) {

    // Use a custom query to display posts instead of the page content.
    $page = get_query_var( 'page' );
        $paged = get_query_var( 'paged' );
 
    // Make sure we're on the correct page.
    if ( ( $page > $paged ) ) { $paged = $page; }
 
    // Run the query to get the posts.
    query_posts( 'post_type=post&suppress_filters=0&paged=' . $paged );
 
    if ( have_posts() ) { $count = 0; $featuredposts=0; // add count of the number of featured posts
    
        while ( have_posts() ) { 
          
            the_post(); $count++;
            
           /* only show featured posts up to four posts */
           if (in_category('featured') and $featuredposts <= 3) { 
            $featuredposts++;
            woo_get_template_part( 'content', get_post_type() ); // Get the page content template file, contextually.
            woo_post_more();
           } /* end if in_category */
        }
    }
} /* is page 35 */
    
} /* homepage_feature_posts */

/****************** add three feature button on homepage **********************88*/
add_action( 'woo_main_before', 'homepage_feature_buttons' );

function homepage_feature_buttons ()
{
    if (is_page(35)) {
        echo '<div style="margin-left:40px; margin-top:-30px;">';

        echo '<div style="float:left;margin-right:20px;"><a title="Who We Are" href="http://nurturingmindsinafrica.org/who-we-are/"><img class="size-full wp-image-352 alignnone" title="Who We Are" alt="Nurturing Minds - Who We Are" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/home-who-we-are-architect.png" width="300" height="167" /></a></div>';
        echo '<div style="float:left; margin-right:20px;"> <a title="Impact" href="http://nurturingmindsinafrica.org/impact/"><img class="size-full wp-image-353 alignnone" title="Impact" alt="Nurturing Minds - Impact" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/home-impact-architect.png" width="300" height="167" /></a></div>';
        echo '<div style="float:left;"><a title="How To Help" href="http://nurturingmindsinafrica.org/how-to-help/"><img class="alignnone size-full wp-image-354" title="How to Help" alt="Nurturing Minds - How to Help" src="http://nurturingmindsinafrica.org/wordpress/wp-content/uploads/2013/08/home-how-to-help-architect.png" width="300" height="167" /></a></div>';
         echo '<div style="margin-bottom:40px;"></div>';

    } /* end if page 35 */
} /* homepage feature buttons */

/***********8* enable shortcodes in widgets ************************/

add_filter('widget_text', 'do_shortcode');

/****************8 change the text "continue reading" to ">>READ MORE" ********************/

add_filter( 'the_content_more_link', 'nminds_more_link', 10, 2 );

function nminds_more_link( $more_link, $more_link_text ) {

    	$new_more_link_text = 'READ MORE';

		return str_replace( $more_link_text, $new_more_link_text, $more_link );

	} // End nminds_more_link()

add_action( 'init', 'woo_load_responsive_design_removal' );

/*-----------------------------------------------------------------------------------*/
/* Don't add any code below here or the sky will fall down */
/*-----------------------------------------------------------------------------------*/
?>