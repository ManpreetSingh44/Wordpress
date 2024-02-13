<?php
/**
 * Template Name: Assignment One Homepage
 * Template Post Type: page
 */
get_header();
?>
<main>
  <section class="masthead" style="background-image: url('<?php echo wp_kses_post(get_field('masthead_image')); ?>')">
    <div>
      <h1><?php echo wp_kses_post(get_field('masthead_title')); ?></h1>
    </div>
  </section>
  <section class="home-intro">
    <div>
      <h2><?php echo wp_kses_post(get_field('intro_title')); ?></h2>
      <p><?php echo wp_kses_post(get_field('intro_text')); ?></p>
    </div>
  </section>
  <section class="post-list">
    <div class="row">
      <?php
      $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
          <article class="col-sm-12 col-md-4 col-lg-4">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', array('class' => 'img-fluid')); ?>
              <?php endif; ?>
            </a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
          </article>
        <?php endwhile;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </section>
  <section class="page-content">
    <div class="container">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      endif;
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
