<?php
/**
 * Template Name: Basic
 * Template Post Type: degree
 */
?>
<?php get_header(); the_post(); ?>

<div class="container mb-5 mt-3 mt-lg-5">
	<article class="<?php echo $post->post_status; ?> post-list-item">
		<?php the_content(); ?>
	</article>
</div>

<?php if (is_front_page()) { ?>

	<div class="container">

		<h2>Choose Path Boxes</h2>

		<div class="grid-box">

			<a class="" href=""><span>Text</span></a>
			<a class="" href=""><span>Text</span></a>
			<a class="" href=""><span>Text</span></a>
			<a class="" href=""><span>Text</span></a>
			<a class="" href=""><span>Text</span></a>
			<a class="" href=""><span>Text</span></a>

		</div>

	</div>

	<div class="wide-box">

		<div class="wide-box-overlay"></div>

		<div class="container">
		
			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>

			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>

			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>

			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>

			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>

			<div class="inner-box"><img src="https://www.ucf.edu/files/2017/11/College-Pages-icons-Trophy.png" /><br/>Bachelor of Science in Nursing (BSN), Master of Science in Nursing (MSN), Doctor of Nursing Practice (DNP) and APRN Certificate programs are nationally accredited by the Commission of Collegiate Nursing Education.</div>
		
		</div>

	</div>

	<div class="generic-divider">

		<div class="container">
			<h2 class="generic-cta">This is a huge title</h2>	
			<a class="large-button">See More</a>
		</div>	

	</div>

<?php } ?>

<?php get_footer(); ?>
