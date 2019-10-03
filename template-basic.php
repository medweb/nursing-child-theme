<?php
/**
 * Template Name: Basic
 */


?>

<?php

global $post;
get_header();
the_post();



/**
 * javascript to add a 'view all events' link.
 */
if (has_shortcode($post->post_content, 'ucf-events')) {
	wp_enqueue_script('view-all-events-script');
}

?>

<?php
if (get_field('enable_top_menu') && have_rows('inter_nav')) {
    echo "<ul class='inter-nav'><div class='container'>";
    while ( have_rows( 'inter_nav' ) ) {
        the_row();

		$menu_url = get_sub_field( 'menu_url' );
		if (is_array($menu_url)){
			$url = esc_url($menu_url['url']);
			$target = $menu_url['target'] ? esc_attr($menu_url['target']) : '_self';
			$title = esc_html($menu_url['title']);
		} else {
			$url = $menu_url; // deprecated field uses a single string, rather than an array
		}

		if (!$title){ // menu text is now stored within the link field, but legacy links may use menu_text
			$title = get_sub_field( 'menu_text' );
			if (!$title){
				$title = esc_url($menu_url['url']);
			}
		}

        echo "<li><a href='{$url}' target='{$target}'>{$title}</a></li>";

    }
    echo "</div></ul>";
}
?>

<div class="container mb-5 mt-3 mt-lg-5">

	<article class="<?php echo $post->post_status; ?> post-list-item">
	
		<?php
		//news meta
		if ( is_single() ) { echo '<small>Released on '.get_the_date(),'</small>'; }


		// show side nav menu if defined for page
		if (get_field('enable_side_menu') && have_rows('extra_nav')) {

			echo "<ul class='extra-nav'>";

			while ( have_rows( 'extra_nav' ) ) {
				the_row();

				$menu_url = get_sub_field( 'menu_url' );
				if (is_array($menu_url)){
					$url = esc_url($menu_url['url']);
					$target = $menu_url['target'] ? esc_attr($menu_url['target']) : '_self';
					$title = esc_html($menu_url['title']);
				} else {
					$url = $menu_url; // deprecated field uses a single string, rather than an array
				}

				if (!$title){ // menu text is now stored within the link field, but legacy links may use menu_text
					$title = get_sub_field( 'menu_text' );
					if (!$title){
						$title = esc_url($menu_url['url']);
					}
				}


				echo "<li><a href='{$url}' target='{$target}'>{$title}</a></li>";

			}
			echo "</ul>";
		}
		?>

		<?php the_content(); 

		if ( is_single() ) { ?>

			<div class="interest-content">

				<h5>Has the UCF College of Nursing Positively Impacted You?</h5>

				<p>The mission of the College of Nursing at the University of Central Florida is to prepare nurse leaders and patient advocates through excellence in education, research and service.</p>

				<a href="<?php bloginfo( 'url' ); ?>/alumni-friends/giving/">Find out how to give back to your college, today!</a>

			</div>

			<h2>More Stories</h2>

			<section class="triple-box-container">

			<?php

			//TODO find curent sub meta taxonomy and pull only stories from it in this array query

	        $args = array(
	            'post_type' => 'post',
	            'posts_per_page' => '3',
	            'category__not_in' => '1347'
			);
	        
	        $the_query = new WP_Query( $args );
	        
	        while ( $the_query->have_posts() ) : $the_query->the_post(); 

	        $preview = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			$image = $preview[0]; ?>

			<div class="triple-box"><a href="<?php the_permalink(); ?>" style="background: transparent url('<?php echo $image; ?>') no-repeat center center; background-size: cover;"><span><?php the_title(); ?></span></a></div>

			<?php endwhile; wp_reset_postdata(); ?>

		</section>

		<?php } ?>



	</article>
</div>

<?php get_footer(); ?>
