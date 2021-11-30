<?php
/**
 * Template Name: Frontpage-Tomas
*/
?>

<?php get_header();?>

<!-- slider section -->
<div class="container-fluid">
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
			        echo '<span class="badge bg-danger bs_badge">Bästsäljare</span>';
			        echo '<img src="'.$img.'" class="preview_image">';
			        echo '<h3>'.$title.'</h3>';
			        echo '<p class="display-6">'.$price.'</p>';
			        echo '<a href='.$url.' class="btn btn-success"">Shoppa '.$title.'</a>';
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
</div>

<!-- main categories -->
<div class="container pb-4">
	<div class="row">
			<h2 class="text-center p-5 pb-2">Välj kategori</h2>
			<?php
				$get_main_cat = array('orderby' => 'menu_order', 'order' => 'asc', 'hide_empty' => true, 'parent' => 0);
				$mc_q = get_terms('product_cat', $get_main_cat);
				if(!empty($mc_q)){
				    foreach ($mc_q as $key => $mc) {
			    		$get_thumb = get_term_meta($mc->term_id, 'thumbnail_id', true);
		    			$cat_image = wp_get_attachment_url($get_thumb);
		    			$cat_url = get_term_link($mc);
				    	echo '<div class="col main_cat border m-2 pt-2 pd-2">';
				    	echo '<a href='.get_term_link($mc).' class="text-decoration-none">';
				    	echo '<img src="'.$cat_image.'">';
				      echo '<h4 class="text-center text-dark pt-2 pd-2">'.$mc->name.'</h4>';
				      echo '</a></div>';
				    }
				}
			?>
	</div>
</div>

<!-- dynamic product feed by parent modify the shortcode only -->
<div class="container">
	<div class="row">
		<div class="col-12">
			<?php
				$get_product_feed = array('orderby' => 'menu_order', 'order' => 'rand', 'hide_empty' => true, 'parent' => 0);
				$mc_w = get_terms('product_cat', $get_product_feed);
				foreach ($mc_w as $key => $feed) {
					//var_dump($feed);
						$cat_url = get_term_link($feed->term_id);
						echo '<div class="col-12 pb-4">';
						echo '<div class="pb-3">';
						echo '<h3>'.$feed->name.'</h3>';
						echo '<a href="'.$cat_url.'">Visa alla ('.$feed->count.')</a>';
						echo '</div>';
						echo do_shortcode('[products limit="3" orderby="rand" columns="3" category="'.$feed->slug.'"]');
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
