<?php
/**
 * Template Name: Videos Page
 */
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_post();

		$play_button_color = wp_get_attachment_image_url(get_field('play_icon_hover', 'option'));
		$play_button_outline = wp_get_attachment_image_url(get_field('play_icon', 'option'));

		$featured_video_url = get_field('featured_video_url');
		$featured_video_title = get_field('featured_video_title');
		$featured_video_id = get_youtube_id($featured_video_url)
			?>

		<div class="wolfpack-float videos-page">
			<a class="btn" href="https://www.shakira.com/wolfpack/" target="_blank">Join Wolfpack</a>
		</div>

		<section id="videos">
			<div class="container">

				<div class="featured-video">
					<div id="main-video-overlay" class="poster-wrapper">
						<img class="poster" src="https://img.youtube.com/vi/<?php echo $featured_video_id ?>/maxresdefault.jpg" alt="<?php echo $featured_video_title ?>">
						<div class="poster-overlay"></div>
						<div class="play play-overlay">
							<div class="icon-wrapper">
								<img class="outline" src="<?php echo $play_button_outline ?>" alt="Play">
								<img class="color" src="<?php echo $play_button_color ?>" alt="Play">
							</div>
							<p>Play</p>
						</div>
					</div>
					<div class="embed-container">
						<iframe id="main-video" width="560" height="315" src="https://www.youtube.com/embed/<?php echo $featured_video_id ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>

				<h2>Videos</h2>
				<div id="video-list">

					<?php
					if (have_rows('videos')) {
						while (have_rows('videos')) {
							the_row();

							$video_url = get_sub_field('video_url');
							$video_title = get_sub_field('video_title');
							$video_id = get_youtube_id($video_url)

								?>

							<div class="item">
								<a class="set-featured-video" href="#videos" data-video-id="<?php echo $video_id ?>">
									<div class="poster-wrapper">
										<img class="poster" src="https://img.youtube.com/vi/<?php echo $video_id ?>/mqdefault.jpg" />
										<div class="poster-overlay"></div>
										<div class="play">
											<div class="icon-wrapper">
												<img class="outline" src="<?php echo $play_button_outline ?>" alt="Play">
												<img class="color" src="<?php echo $play_button_color ?>" alt="Play">
											</div>
											<p>Play</p>
										</div>
									</div>
								</a>
								<div class="info">
									<p><?php echo $video_title ?></p>
								</div>
							</div>


							<?php
						}
					}
					?>


				</div>
			</div>
		</section>

		<?php
	}
}

get_footer()
	?>