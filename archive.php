<?php get_header(); ?>

<div class="container">

	<section class="archive-left">

		<?php get_template_part( 'template-archive' ); ?>

	</section>

	<section class="archive-cats">

		<h3 class="yellow_underline">Categories</h3>

		<?php wp_list_categories('title_li='); ?>

	</section>

</div>

<?php get_footer(); ?>
