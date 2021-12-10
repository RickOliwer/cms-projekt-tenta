<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>


<div id="content" class="site-content container py-5 mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->

    <div class="row">
      <div class="col-md-8 col-xxl-9">

        <main id="main" class="site-main">
        <?php the_post(); ?>
        <!-- Title -->
        <?php 
        
          the_title('<h1>', '</h1>'); 
        ?>
      
        
        <?php if(is_front_page()): ?>
          <?php 
              get_template_part('template-parts/front-page');
          ?>
        <?php endif ; ?>
        
        <?php 
        if ( is_page( 'contact' ) ){
          get_template_part('template-parts/contact-page');
        }

        if ( is_page( 'about' ) ){
          get_template_part('template-parts/about-page');
        }
            
        ?>
        </main><!-- #main -->

      </div><!-- col -->

    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer();