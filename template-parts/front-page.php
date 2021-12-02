<?php

/**
 * Template Name: Startpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>
<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <?php
      $get_most_sold = array(
        'post_type' => 'product',
        'meta_key' => 'total_sales',
        'orderby' => 'meta_value_num',
        'posts_per_page' => '5'
        );

        $q = new WP_Query($get_most_sold);

    ;?></pre>

    <!-- Hook to add something nice -->
    <?php bs_after_primary(); ?>

    <main id="main" class="site-main">

      <header class="entry-header">
        <?php the_post(); ?>
        <!-- Title -->
        <?php the_title('<h1>', '</h1>'); ?>
        <!-- Featured Image-->
        <?php bootscore_post_thumbnail(); ?>
        <!-- .entry-header -->
      </header>

      <div class="slider_wrapper">
        <div id="productSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#productSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#productSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#productSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#productSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#productSlider" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div> 

        <!-- loopa mig -->
        <div class="carousel-inner">

        <?php
            if ( $q->have_posts() ) {
                echo '<ul>';
                while ( $q->have_posts() ) {
                    $the_query->the_post();
                  ?>   
                  <div class="carousel-item"> 
                    <?php echo get_the_post_thumbnail(null, 'large', ['class' => 'd-block w-100']);?>
                      
                  </div>
                <?
                }
                echo '</ul>';
            }
          ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productSlider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productSlider" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
        </div>
      </div>

      <div class="entry-content">
        <!-- Content -->
        <?php the_content(); ?>
        <!-- .entry-content -->
        <?php wp_link_pages(array(
          'before' => '<div class="page-links">' . esc_html__('Pages:', 'bootscore'),
          'after'  => '</div>',
        ));
        ?>
      </div>
      <footer class="entry-footer">

      </footer>
      <!-- Comments -->
      <?php comments_template(); ?>

    </main><!-- #main -->

  </div><!-- #primary -->
</div><!-- #content -->


        <script type="text/javascript">
          let parent = document.querySelector('.carousel-inner > ul');
          let fc = parent.firstElementChild
          fc.classList.add('active')
        </script>

<?php
get_footer();
