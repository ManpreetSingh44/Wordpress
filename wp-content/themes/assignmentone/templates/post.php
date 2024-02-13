<?php
/** 
 * Template Name: Posts
 * Template Post Type: page
 */
get_header();
if(have_posts()) : while (have_posts()) : the_post();
the_content();
endwhile; else:
?>
<p>Nothing here. Error</p>
<?php
endif;
get_footer();
?>