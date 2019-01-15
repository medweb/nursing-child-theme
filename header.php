<!DOCTYPE html>
<html lang="en-us">
	<head>
		<?php wp_head(); ?>

		<!-- TODO MOVE THIS TO THE CSS INCLUDE -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	</head>
	<body ontouchstart <?php body_class(); ?>>
		<?php do_action( 'after_body_open' ); ?>
		<header class="site-header">
			<?php echo get_header_markup(); ?>
		</header>
		<main id="main" class="site-main">