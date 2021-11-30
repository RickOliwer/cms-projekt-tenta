<?php

/**
 * Template Name: Frontpage-Tomas
*/

get_header();?>

<?php
// wp_query most sold products
	$get_most_sold = array(
	'post_type' => 'product',
	'meta_key' => 'total_sales',
	'orderby' => 'meta_value_num',
	'posts_per_page' => '5'
	);
	$q = new WP_Query($get_most_sold)
;?>

<!-- Hook to add something nice -->
<?php bs_after_primary(); ?>

<div class="row">
	<div class="col-12">
		<div id="bestsellers_slide" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
		        <?php
		          if ($q->have_posts()) {
		              while ( $q->have_posts() ) {
		                 $q->the_post();
		                 $img = get_the_post_thumbnail_url();
		                 $title = get_the_title();
		                 $url = get_permalink();
		                 $price = $product->get_price_html();

		                 echo '<div class="carousel-item slider_bg" style="background-image:url('.$img.')">';
		                 echo '<div class="overlay_bg"></div>';
		                 echo '<div class="carousel-caption d-none d-md-block">';
		                 echo '<img src="'.$img.'" class="preview_image">';
		                 echo '<h3>'.$title.'</h3>';
		                 echo '<p>'.$price.'</p>';
		                 echo '<a href='.$url.' class="btn btn-primary"">Shoppa '.$title.'</a>';
      					 		 echo '</div>';
		                 echo '</div>';
		              }
		          }
		        ?>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#bestsellers_slide" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#bestsellers_slide" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			  <span class="visually-hidden">Next</span>
			</button>
		</div>
	</div>
</div>



<script type="text/javascript">
  let parent = document.querySelector('.carousel-inner');
  let fc = parent.firstElementChild
  fc.classList.add('active')
</script>

<?php get_footer();?>
