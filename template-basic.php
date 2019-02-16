<?php
/**
 * Template Name: Basic
 * Template Post Type: degree
 */
?>

<?php get_header(); the_post(); ?>
<?php
if (get_field('enable_top_menu') && have_rows('inter_nav')) {
    echo "<ul class='inter-nav'><div class='container'>";
    while ( have_rows( 'inter_nav' ) ) {
        the_row();
        $menu_text = get_sub_field( 'menu_text' );
        $menu_url = get_sub_field( 'menu_url' );

        echo "<li><a href='{$menu_url}'>{$menu_text}</a></li>";

    }
    echo "</div></ul>";
}
?>

<div class="container mb-5 mt-3 mt-lg-5">

	<article class="<?php echo $post->post_status; ?> post-list-item">
		<?php
		// show side nav menu if defined for page
		if (get_field('enable_side_menu') && have_rows('extra_nav')) {

			echo "<ul class='extra-nav'>";

			while ( have_rows( 'extra_nav' ) ) {
				the_row();
				$menu_text = get_sub_field( 'menu_text' );
				$menu_url = get_sub_field( 'menu_url' );

				echo "<li><a href='{$menu_url}'>{$menu_text}</a></li>";

			}
			echo "</ul>";
		}
		?>

		<?php the_content(); ?>

	</article>
</div>

<?php get_footer(); ?>
