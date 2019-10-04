<?php get_header(); ?>

<div class="container">

	<section class="archive-left">

		<?php get_template_part( 'template-archive' ); ?>

	</section>

	<section class="archive-cats">

		<h3 class="yellow_underline">Categories</h3>

		<?php wp_list_categories('title_li=&depth=1'); ?>

		<?php echo do_shortcode('[ucf-news-feed title="UCF Today News" limit="6" topics="nursing"]'); ?>


	</section>

</div>

<?php get_footer(); ?>
