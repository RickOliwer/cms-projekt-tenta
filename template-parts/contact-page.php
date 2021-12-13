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

<div id="content" class="mt-5">
  <div id="primary" class="content-area">

    <!-- Hook to add something nice -->

    <div class="">
      <div class="">

        <main>
        <?php the_post(); ?>
        <!-- Title -->

        <?php 
            my_contact_title();

            the_content();
            my_contact_excerpt(); 
            
            my_contact_info();
            
            my_contact_social();

            my_google_map();
            

        ?>

        </main><!-- #main -->

      </div><!-- col -->

    </div><!-- row -->

  </div><!-- #primary -->
</div><!-- #content -->

<?php get_footer(); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php my_gmap_api(); ?>"></script>


<script type="text/javascript" src="../inc/app.js"></script>
