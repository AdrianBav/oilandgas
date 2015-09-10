<article id="post-<?php the_ID(); ?>" <?php post_class('post__holder'); ?>>

	<?php get_template_part('includes/post-formats/affiliations-logo'); ?>

	<!-- Post Content -->
	<div class="affiliations_content">

		<header class="post-header">
			<?php if(is_sticky()) : ?>
				<h5 class="post-label"><?php echo theme_locals("featured");?></h5>
			<?php endif; ?>
			<h3 class="post-title"><?php the_title(); ?></h3>
		</header>

		<?php the_content(''); ?>
		<div class="clear"></div>
	</div>

</article>