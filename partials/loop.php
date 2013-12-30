<?php
/*
*	This is a partial with the default version of Loop.
*/
?>
<?php if (is_archive()) : ?>
	<h2 class="archive-title"><?php archives_title(); ?></h2>
<?php endif; ?>
<?php if (is_author()) : ?>
	<div>
		<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
		<p id="author-bio"><?php echo $curauth->user_description; ?></p>
	</div>
<?php endif; ?>
<?php if (is_search()): ?>
	<h2 class="archive-title">Search results for &quot;<?php echo $_GET['s']; ?>&quot;</h2>
<?php endif ?>
<div>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $post_type = $post->post_type; $tags = get_the_tags(); ?>
	<div id="<?php echo $post_type; ?>-<?php the_ID(); ?>" class="<?php if (function_exists('loop_post_classes')) echo loop_post_classes($post_type, $tags); ?>">
		<h2 class="object-title">
			<?php if (is_archive() || is_home()): ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			<?php else: ?>
				<?php the_title(); ?>
			<?php endif ?>
		</h2>
		<?php (is_archive() || is_search()) ? the_excerpt() : the_content(); ?>
		<?php if (is_single()): ?>
			<div class="postmeta clr">
				<?php
				$post_month = get_the_time('m');
				$post_year = get_the_time('Y');
				$post_day = get_the_time('d');
				?>
				<p>Posted on <a href="<?php echo get_month_link($post_year, $post_month) ?>"><?php echo get_the_time('F'); ?></a> <a href="<?php echo get_day_link($post_year, $post_month, $post_day); ?>"><?php echo get_the_time('j'); ?></a>, <a href="<?php echo get_year_link($post_year) ?>"><?php echo get_the_time('Y'); ?></a> by <strong><?php the_author_posts_link(); ?></strong></p>
				<p>Categories: <?php the_category(', '); ?><br /><?php the_tags('Tags:', ', ', ''); ?></p>
			</div>
		<?php endif; ?>
		<?php if (is_user_logged_in()): ?>
			<div class="edit-post-link clear">
				<?php edit_post_link(__('Edit this '.$post_type)); ?>
			</div>
		<?php endif; ?>
	</div>
<?php endwhile; else: ?>
	<p>Sorry, no posts fit your query.</p>
<?php endif; ?>
</div>
<?php echo (is_archive() || is_home()) ? pagination() : ""; ?>
