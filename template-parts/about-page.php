<?php
/**
 * Template Name: About page
*/
?>
<?php
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


        <div class="" style="">
            <?php about_title(); ?>

        </div>

        <div class="" style="">
            <?php about_excerpt(); ?>

        </div>

        <div class="" style="width:300px">
            <?php about_img(); ?>

        </div>

        <div class="" style="width:300px">
            <?php about_text(); ?>

        </div>
       
        </main><!-- #main -->

      </div><!-- col -->

    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer();
