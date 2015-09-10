<?php
	// Get tombstone options
	$business_1_name = get_post_meta(get_the_ID(), 'my_tombstones_business_1_name', true);
	$business_1_summary = get_post_meta(get_the_ID(), 'my_tombstones_business_1_summary', true);
	$sold_text = get_post_meta(get_the_ID(), 'my_tombstones_sold_text', true);
	$business_2_name = get_post_meta(get_the_ID(), 'my_tombstones_business_2_name', true);
	$business_2_summary = get_post_meta(get_the_ID(), 'my_tombstones_business_2_summary', true);
	$toga_role = get_post_meta(get_the_ID(), 'my_tombstones_toga_role', true);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>

	<div>
		<section class="tombstone-container">

			<header>
				<?php if(has_post_thumbnail()): ?>
					<?php get_template_part('includes/post-formats/tombstone-primary-logo'); ?>
				<?php else: ?>
					<div class="business-logo business-name">
						<span><?php echo $business_1_name; ?></span>
					</div>
				<?php endif; ?>
				<p class="summary"><?php echo $business_1_summary; ?></p>

				<div class="sold-text">
					<p><?php echo $sold_text; ?></p>
				</div>

				<?php if(class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'secondary-image', null)): ?>
					<?php get_template_part('includes/post-formats/tombstone-secondary-logo'); ?>
				<?php else: ?>
					<div class="business-logo business-name">
						<span><?php echo $business_2_name; ?></span>
					</div>
				<?php endif; ?>
				<p class="summary"><?php echo $business_2_summary; ?></p>
			</header>

			<footer>
				<div class="logo pull-left">
					<img width="75px" src="/wp-content/themes/theme46787/images/logo.png" alt="The Oil &amp; Gas Advisor" title="Field-proven results in business sales and acquisitions">
				</div>
				<div class="role">
					<p><?php echo $toga_role; ?></p>
					<p class="signature">OilGasAdvisor.com</p>
				</div>
			</footer>

		</section>
	</div>

</article>