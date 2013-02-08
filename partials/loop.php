<?php
/*
*	This is a partial with the default version of Loop.
*/
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php $div_class = (is_page()) ? 'page' : 'post'; ?>
	<div id="post-<?php echo the_ID(); ?>" class="<?php echo $div_class; ?>">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
<?php endwhile; endif; ?>
