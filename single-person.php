<?php get_header(); the_post(); ?>

<!-- Add Search Bar here to be floated right of page title -->

<?php
do_action( 'single_person_before_article'); // allows plugins (ie the directory) to add data (like the search bar)

/**
 * For "Expertise & Research", show the research tab if the person is part of any 'research' sub-categories.
 */

$array_top_level_categories_to_show = 
    [
        'research',
        'research-areas',
        'research-clusters'
    ];

// get all the child terms that exist for each category we care about
$multi_array_of_top_level_children_terms = [];
foreach ($array_top_level_categories_to_show as $top_level_category) {
    $top_level_term = get_term_by('slug', $top_level_category, 'people_group');
    $all_top_level_children_terms = get_term_children($top_level_term->term_id, 'people_group');
        
    $multi_array_of_top_level_children_terms[$top_level_category] = $all_top_level_children_terms;
}
//echo 'hello';
//var_dump($multi_array_of_top_level_children_terms);
// loop through all terms on this post id, and see which ones match the child terms we care about. if so, we want to show them.
$current_person_terms_objects = wp_get_post_terms($post->ID, 'people_group'); // all taxonomy terms associated with this post

$has_any_top_level_parent_child_terms = false;
$multi_array_of_top_level_children_terms_matching_this_post = [];
foreach ($current_person_terms_objects as $current_person_term_object){
    //echo 'halla';
    //var_dump($multi_array_of_top_level_children_terms);
    foreach ($multi_array_of_top_level_children_terms as $top_level_category => $all_top_level_children_terms) {
        //var_dump($all_top_level_children_terms);
        //var_dump($top_level_category);
        if (in_array($current_person_term_object->term_id, $all_top_level_children_terms)) {
            //echo "we found one";
            $has_any_top_level_parent_child_terms = true; // found at least one term. flag this as true, so we can use it for logic later instead of counting each inner array.
	        $multi_array_of_top_level_children_terms_matching_this_post[$top_level_category][] = $current_person_term_object; // build up an array of each child term on this post that matches the parent categories
        }
    }
}


// set up the tab header, if there are categories defined.
$research_header = "";
$research_tab = "";
if (
        ($has_any_top_level_parent_child_terms) ||
        (get_field( 'person_educationspecialties' )) ||
        (get_field( 'pf_research_profile_url' ))
    ) {
	
    $research_list_html = "";
    
    foreach ($multi_array_of_top_level_children_terms_matching_this_post as $top_level_category => $all_top_level_children_terms) {
        $category_terms_html = "";
        foreach ( $all_top_level_children_terms as $term ) {
            $category_terms_html .= "<li>{$term->name}</li>";
        }

	    $top_level_term = get_term_by('slug', $top_level_category, 'people_group');

	    $research_list_html .= "
        <div class='research-list'>
            <span class='research-list-header'>{$top_level_term->name}</span>
            <ul class='research-list-content'>{$category_terms_html}</ul>
        </div>
        ";
        
    }

	$person_education_specialties = get_field('person_educationspecialties');
	$person_research_profile_url = get_field('pf_research_profile_url');

	
	$person_research_profile = "";
	if ( get_field ('')) {
		$person_research_profile = "
		    <a class='btn btn-primary mt-3' href='$person_research_profile_url' target='_blank'>View Research Profile</a>
		";
	}


	// now put all the pieces together. well, there are 2 separate pieces, since the tab function uses a separate element for the tab, and another element for the content

	$research_tab_header = "
        <li class='nav-item'>
            <a class='nav-link' id='edu-tab' data-toggle='tab' href='#edu' role='tab' aria-controls='edu' aria-selected='false'>Expertise &amp; Research</a>
        </li>
    ";

	$research_tab_content = "
        <div class='tab-pane fade' id='edu' role='tabpanel' aria-labelledby='edu-tab'>
        <h2 class='person-subheading'>Expertise &amp; Research</h2>
        {$research_list_html}
        {$person_education_specialties}
        {$person_research_profile}
        </div>
    ";
}

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
					<?php endif; ?>

					

					<?php echo get_person_contact_btns_markup( $post ); ?>

					<?php echo get_person_dept_markup( $post ); ?>
					<?php echo get_person_office_markup( $post ); ?>
					<?php echo get_person_email_markup( $post ); ?>
					<?php echo get_person_phones_markup( $post ); 

					if ( get_field( 'pf_twitter_url' ) ) { ?>

					<div class="row">
						<div class="col-xl-4 col-md-12 col-sm-4 person-label">
							Twitter
						</div>
						<div class="col-xl-8 col-md-12 col-sm-8 person-attr">
							<a href="https://twitter.com/<?php echo get_field( 'pf_twitter_url' ); ?>" class="person-email" target="_blank">
								@<?php echo get_field( 'pf_twitter_url' ); ?></a>
						</div>
					</div>

					<hr class="my-2">

					<?php } ?>

					<!--<a class="btn btn-secondary" href="javascript:history.back()">Return to Directory</a> -->

				</aside>

			</div>

			<div class="col-md-8 col-lg-7 pl-md-5">

				<section class="person-content">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="bio-tab" data-toggle="tab" href="#bio" role="tab" aria-controls="bio" aria-selected="true">Biography &amp; Education</a>
					  </li>

                      <?php echo $research_tab_header ?>

					  <?php if ( get_person_news_publications_markup( $post ) || get_person_videos_markup( $post ) || get_field( 'pf_external_news' ) ) { ?>
					  <li class="nav-item">
					    <a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">News &amp; Media</a>
					  </li>
					<?php } ?>
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
                      <?php echo $research_tab_content ?>
					  <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">

					  	<?php if ( get_person_news_publications_markup( $post ) || get_person_videos_markup( $post ) || get_field( 'pf_external_news' ) ) { ?>

					  	<?php echo get_person_news_publications_markup( $post ); ?>

					  	<div class="ext-news-row">

						  	<?php echo get_field( 'pf_external_news' ); ?>

						</div>

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
