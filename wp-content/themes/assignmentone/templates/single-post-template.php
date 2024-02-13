<?php
/**
 * Template Name: Custom Post Template
 * Template Post Type: post
 */

// Exclude unnecessary elements and widgets

get_header();

// Get the post's featured image URL
$backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?>

<section class="custom-post-masthead" style="background-image: url('<?php echo $backgroundImg[0]; ?>');">
  <div class="container">
    <h1 class="post-title"><?php the_title(); ?></h1>
  </div>
</section>

<section class="row">
  <div class="col-sm-12 col-md-8">
    <?php
    // Display the post content
    echo get_the_content();
    ?>
    <p class="post-meta">By: <?php the_author(); ?> | Date: <?php echo get_the_date(); ?></p>
    <p class="post-tags"><?php the_tags(); ?></p>
    <p class="post-categories"><?php the_category(', '); ?></p>
  </div>

  <div class="col-sm-12 col-md-4">
    <?php
    // Display recent posts as a list
    $recent_posts = wp_get_recent_posts(array('numberposts' => 5));
    if ($recent_posts) {
      foreach ($recent_posts as $post) {
        $backgroundImg = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']), 'full');
    ?>
        <article class="recent-post">
          <a href="<?php echo get_permalink($post['ID']); ?>">
            <img src="<?php echo $backgroundImg[0]; ?>" alt="post image">
          </a>
          <a href="<?php echo get_permalink($post['ID']); ?>"><?php echo $post['post_title']; ?></a>
          <p><?php echo wp_trim_words($post['post_content'], 10); ?></p>
        </article>
    <?php
      }
    }
    ?>
  </div>
</section>

<?php get_footer(); ?>
