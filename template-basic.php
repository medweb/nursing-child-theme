<?php
/**
 * Template Name: Basic
 * Template Post Type: degree
 */
?>

<?php get_header(); the_post(); ?>

<ul class="inter-nav">
	<div class="container">
		<li><a href="#">Item</a></li>
		<li><a href="#">Item</a></li>
		<li><a href="#">Item</a></li>
		<li><a href="#">Item</a></li>
	</div>
</ul>

<div class="container mb-5 mt-3 mt-lg-5">

	<article class="<?php echo $post->post_status; ?> post-list-item">
		<ul class="extra-nav">
			<li><a href="#">The College</a></li>
			<li><a href="#">The College</a></li>
			<li><a href="#">The College</a></li>
			<li><a href="#">The College</a></li>
			<li><a href="#">The College</a></li>
		</ul>

		<?php the_content(); ?>

	</article>
</div>

<?php if (is_front_page()) { ?>

	<div class="container tabs">

		<section class="button-menu">
			<a class="button toggle" data-id="how-to-apply" href="#">The College</a>
			<a class="button toggle" data-id="online-library" href="#">Students</a>
			<a class="button toggle" data-id="health-campus" href="#">Health Sciences Library</a>
			<a class="button toggle" data-id="residents" href="#">College Directory</a>
		</section>

		<section class="menu-expanded" for="how-to-apply" style="display: block;">

			<h4>Degree Listing:</h4>
			<ul>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
			</ul>

		</section>

		<section class="menu-expanded" for="online-library">

			<h4>Degree Listing 2:</h4>
			<ul>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
			</ul>

		</section>

		<section class="menu-expanded" for="health-campus">

			<h4>Degree Listing 3:</h4>
			<ul>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
			</ul>

		</section>

		<section class="menu-expanded" for="residents">

			<h4>Degree Listing 4:</h4>
			<ul>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
				<li>Item 1</li>
			</ul>

		</section>

	</div>

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
			<h2 class="generic-cta">This is a huge title </h2>	
			<a class="large-button">See More</a>
		</div>	

	</div>

<?php } ?>

<?php if (!is_front_page()) { ?>

<section class="container accordion-container">

	<div class="accordion">

		<span class="accordion-title"><span>Title of Accordion Item</span><i class="fa fa-chevron-down"></i></span>
		<div class="collapse">
			<p>Content of Accordion</p>
		</div>

	</div>

</section>

<?php } ?>

<?php get_footer(); ?>
