<?php
/**
 * Template Name: About page
*/
?>
<?php
get_header();
?>


<div id="content" class="mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->

    <div class="about_main">
      <div class="about_container">

        <main>
        <?php the_post(); ?>
        <!-- Title -->


        <div class="about_title">
            <?php about_title(); ?>

        </div>

        <div class="about_excerpt">
            <?php about_excerpt(); ?>

        </div>

        <div class="about_img">
            <?php about_img(); ?>

        </div>

        <div class="about_text">
            <?php about_text(); ?>

        </div>
       
        </main><!-- #main -->

      </div><!-- col -->

    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer();
