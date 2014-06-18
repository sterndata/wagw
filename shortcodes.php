<?php
/* 
 * left, right, and center are for divs on three column pages
 */

function shortcode_wagw_cols ($atts,$content) {
    $a = shortcode_atts( array(
        'type' => 'center',
    ), $atts );
    return '<div class="wagw_col wagw_col_'.sanitize_text_field($a[type]).'">'.$content.'</div>';
}
add_shortcode('wagw_col','shortcode_wagw_cols');
?>
