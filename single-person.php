<?php get_header(); the_post(); ?>

<!-- Add Search Bar here to be floated right of page title -->

<?php
do_action( 'single_person_before_article'); // allows plugins (ie the directory) to add data (like the search bar)
?>

<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container my-5">
		<div class="row">
			<div class="col-md-4 mb-5">

				<aside class="person-contact-container">

					<a href="javascript:history.back()" class="return-tp"><i class="fa fa-chevron-circle-left icongrey"></i> Return to Directory</a>

					<div class="mb-4">
						<?php echo get_person_thumbnail( $post, 'rounded-circle' ); ?>
					</div>

					<h1 class="h5 person-title text-center mb-2">
						<?php echo get_person_name( $post ); ?>
					</h1>

					<?php if ( $job_title = get_field( 'person_jobtitle' ) ): ?>
					<div class="person-job-title text-center mb-4"><?php echo $job_title; ?></div>
					<?php endif; ?>

					<?php if ( $cv_url = get_field( 'person_cv' ) ): ?>
					<p>
						<a class="btn btn-secondary mt-3" href="<?php echo $cv_url; ?>">Download CV</a>
					</p>
					<?php endif; 

					if ( get_field( 'pf_twitter_url' ) ) { ?>

					<p>
						<a class="btn btn-info" href="<?php echo get_field( 'pf_twitter_url' ); ?>" target="_blank">Twitter Profile</a>
					</p>

					<?php } ?>

					<?php echo get_person_contact_btns_markup( $post ); ?>

					<?php echo get_person_dept_markup( $post ); ?>
					<?php echo get_person_office_markup( $post ); ?>
					<?php echo get_person_email_markup( $post ); ?>
					<?php echo get_person_phones_markup( $post ); ?>

					<!--<a class="btn btn-secondary" href="javascript:history.back()">Return to Directory</a> -->

				</aside>

			</div>

			<div class="col-md-8 col-lg-7 pl-md-5">

				<section class="person-content">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="bio-tab" data-toggle="tab" href="#bio" role="tab" aria-controls="bio" aria-selected="true">Biography &amp; Education</a>
					  </li>

					  <?php if ( get_field( 'person_educationspecialties' ) || get_field( 'pf_research_profile_url' ) ) { ?><li class="nav-item">
					    <a class="nav-link" id="edu-tab" data-toggle="tab" href="#edu" role="tab" aria-controls="edu" aria-selected="false">Expertise &amp; Research</a>
					  </li><?php } ?>

					  <li class="nav-item">
					    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">News &amp; Media</a>
					  </li>
					</ul>

					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="bio" role="tabpanel" aria-labelledby="bio-tab">
					  	<?php echo get_person_desc_heading( $post ); ?>
					  	<?php
						if ( $post->post_content ) {
							the_content();
						} else {
							echo '<p>No description available.</p>';
						}
						?>
					  </div>

					  <div class="tab-pane fade" id="edu" role="tabpanel" aria-labelledby="edu-tab">
		
						<h2 class="person-subheading">Expertise &amp; Research</h2>

						<?php the_field( 'person_educationspecialties' ); 

						if ( get_field( 'pf_research_profile_url' ) ) { ?>

						<a class="btn btn-info btn-sm" href="<?php echo get_field( 'pf_research_profile_url' ); ?>" target="_blank">View Research Profile</a>

						<?php } ?>

					  </div>
					  <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">

					  	<?php if ( get_person_news_publications_markup( $post ) || get_person_videos_markup( $post ) || get_field( 'pf_external_news' ) ) {

					  	 echo get_person_news_publications_markup( $post ); 

					  	 echo get_field( 'pf_external_news' ); ?>

						<?php echo get_person_videos_markup( $post ); } else { ?>

						<p>No recent media. Please check back soon.</p>

						<?php } ?>

					  </div>
					</div>
					
				</section>

			</div>
		</div>

		
	</div>
</article>

<?php get_footer(); ?>
