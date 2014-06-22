<?php
/* 
 * left, right, and center are for divs on three column pages
 */

function shortcode_wagw_cols ($atts,$content) {
    //move wpautop filter to AFTER shortcode is processed
    remove_filter( 'the_content', 'wpautop' );
    add_filter( 'the_content', 'wpautop' , 99);
    add_filter( 'the_content', 'shortcode_unautop', 100);

    $a = shortcode_atts( array(
        'type' => 'center',
    ), $atts );
    return '<div class="wagw_col wagw_col_'.sanitize_text_field($a['type']).'">'.$content.'</div>';
}
add_shortcode('wagw_col','shortcode_wagw_cols');

function sds_sitemap_func() {
  $results="<div id=\"sds-sitemap\">\n";
  $results .= "<div id=\"sds-sitemap-pages\">\n";
  $results .= "<h2>Pages</h2>\n";
  $all_pages = get_pages();
  $results .= "<ul>\n";
  foreach ($all_pages as $page) {
     $results .= "<li><a href=\"".get_page_link( $page->ID )."\">".$page->post_title."</a></li>\n";
     }

  $results .= "</ul></div>\n<div id=\"sds-sitemap-posts;\">\n";
    $cats = get_categories();
    if ($cats) {
        $results .=  "<h2>Posts</h2>\n";     
    }
     // loop through the categries
     foreach ($cats as $cat) {
        // setup the cateogory ID
        $cat_id= $cat->term_id;
        $first_post=true;
        // create a custom wordpress query
        query_posts( array( 'cat' => $cat_id, 'posts_per_page' => -1) );
        // start the wordpress loop!
        if (have_posts()) {
            if ( $first_post ) {
              $results .= "<h3>".$cat->name."</h3>\n<ul>\n";
              $first_post=false;
              }
            while ( have_posts() ) : the_post();
               $results .= "<li><a href='";
               $resuls .= get_permalink();
               $results .= "'>";
               $results .= get_the_title();
                $results .= "</a></li>\n";
            endwhile;
            $results .= "</ul>\n";
            }
          wp_reset_query();
          }
   $results .= "</div></div>";
   return $results;
}


add_shortcode('sds-sitemap','sds_sitemap_func');
?>
