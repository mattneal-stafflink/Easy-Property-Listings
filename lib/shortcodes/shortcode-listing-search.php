<?php
/**
 * SHORTCODE :: Listing Search [listing_search]
 *
 * @package     EPL
 * @subpackage  Shortcode/ListingSearch
 * @copyright   Copyright (c) 2020, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Listing Search Shortcode [listing_search] This shortcode allows for you to specify the property type(s) using
 * [listing_search title="" post_type="property" property_status="current/sold/leased" search_house_category="on/off" search_price="on/off" search_bed="on/off" search_bath="on/off" search_car="on/off" search_other="on/off"] option
 *
 * @param array $atts Shortcode attributes.
 *
 * @return false|string
 * @since       1.2
 * @since       3.4.45 Tweak: Pass user provided attributes to the [listing_search] Shortcode template.
 */
function epl_shortcode_listing_search_callback( $atts ) {
	$attributes = shortcode_atts( epl_search_get_defaults(), $atts );
	ob_start();
	// Rendering view of listing search shortcode.
	epl_get_template_part( 'shortcodes/listing-search/' . ( ! empty( $attributes['view'] ) ? trim( $attributes['view'] ) . '.php' : 'default.php' ), array( 'atts' => $attributes, 'user_atts' => $atts ) );
	return ob_get_clean();
}
add_shortcode( 'listing_search', 'epl_shortcode_listing_search_callback' );
