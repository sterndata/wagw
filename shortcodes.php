<?php
/*
 * left, right, and center are for divs on three column pages
 */

function shortcode_wagw_cols( $atts, $content ) {
	//move wpautop filter to AFTER shortcode is processed
	remove_filter( 'the_content', 'wpautop' );
	add_filter( 'the_content', 'wpautop' , 99 );
	add_filter( 'the_content', 'shortcode_unautop', 100 );

	$a = shortcode_atts( array(
		'type' => 'center',
	), $atts );
	return '<div class="wagw_col wagw_col_'.sanitize_text_field( $a['type'] ).'">'.$content.'</div>';
}
add_shortcode( 'wagw_col','shortcode_wagw_cols' );

function wagw_clear () {
  return '<div style="clear: both;"></div>';
}
add_shortcode( 'clear', 'wagw_clear');

