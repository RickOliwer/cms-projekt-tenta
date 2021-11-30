<?php

/**
 * Template Name: Frontpage-Tomas
*/

get_header();?>

<!-- Hook to add something nice -->
<?php bs_after_primary(); ?>

<!-- slider section -->
<div class="row">
	<div class="col-12">
		<div id="bestsellers_slide" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
		    <?php
				$get_most_sold = array(
				'post_type' => 'product',
				'meta_key' => 'total_sales',
				'orderby' => 'meta_value_num',
				'posts_per_page' => '5'
				);
				$q = new WP_Query($get_most_sold);
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
		        echo '<p class="display-6">'.$price.'</p>';
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

<!-- main categories -->
<div class="row pb-4">
	<div class="col-12">
		<div class="container">
			<h2 class="text-center p-5 pb-2">Välj kategori</h2>
			<?php
				$get_main_cat = array('orderby' => 'name', 'order' => 'asc', 'hide_empty' => true, 'parent' => 0);
				$mc_q = get_terms('product_cat', $get_main_cat);

				if(!empty($mc_q)){
					echo '<div class="row">';
				    foreach ($mc_q as $key => $mc) {
			    		$get_thumb = get_term_meta($mc->term_id, 'thumbnail_id', true);
		    			$cat_image = wp_get_attachment_url($get_thumb);
		    			$cat_url = get_term_link($mc);
				    	echo '<div class="col main_cat border m-2">';
				    	echo '<a href='.get_term_link($mc).' class="text-decoration-none">';
				    	echo '<img src="'.$cat_image.'">';
				      echo '<h4 class="text-center text-secondary p-4 d">'.$mc->name.'</h4>';
				      echo '</a></div>';
				    }
				  echo '</div>';
				}
			?>
		</div>
	</div>
</div>

<!-- product feed x3 categories -->
<div class="row">
	<div class="col-12">
		<div class="container">
			<?php
				$get_main_cat = array(
				    'orderby'    => 'name', // change this to wp order when done
				    'order'      => 'asc',
				    'hide_empty' => true,
				    'parent'		 => 0
				);
				 
				$mc_q = get_terms('product_cat', $get_main_cat);

				foreach ($mc_q as $key => $feed) {
					foreach ($feed as $feed_cat) {
						var_dump($feed_cat);
					}
				}

				if(!empty($mc_q)){
					echo '<div class="row">';
				    foreach ($mc_q as $key => $mc) {
			    		$get_thumb = get_term_meta($mc->term_id, 'thumbnail_id', true);
		    			$cat_image = wp_get_attachment_url($get_thumb);
		    			$cat_url = get_term_link($mc);
				    	echo '<div class="col main_cat border m-2">';
				    	echo '<a href='.get_term_link($mc).'>';
				    	echo '<img src="'.$cat_image.'">';
				      echo '<h4 class="text-center p-4">'.$mc->name.'</h4>';
				      echo '</a></div>';
				    }
				  echo '</div>';
				}
			?>
		</div>
	</div>
</div>


<script type="text/javascript">
  let parent = document.querySelector('.carousel-inner');
  let fc = parent.firstElementChild
  fc.classList.add('active')
</script>

<?php get_footer();?>
