<?php
/**
 * Template Name: Contact page
*/
?>
<?php
get_header();
?>
<style type="text/css">
.acf-map {
    width: 100%;
    height: 400px;
    border: #ccc solid 1px;
    margin: 20px 0;
}

</style>

<div class="container" id="content" class="mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->

    <div class="contact_main">
      <div class="contact_container">

        <main>
        <?php the_post(); ?>
        <!-- Title -->
            <div class="title-module">
                <?php my_contact_title(); ?>
            </div>
            
            <div class="excerpt-module">
                <?php my_contact_excerpt(); ?>
            </div>

            <div class="content-module">
                <?php the_content(); ?>
            </div>

            <div class="contact_info-module">
                <?php my_contact_info(); ?>
            </div>
            
            <div class="social-module">
                <?php my_contact_social(); ?>
            </div>

            <div class="map-module">
                <?php my_google_map(); ?>
            </div>


        </main><!-- #main -->

      </div><!-- col -->

    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php my_gmap_api(); ?>"></script>


<script type="text/javascript" src="../inc/app.js"></script>
