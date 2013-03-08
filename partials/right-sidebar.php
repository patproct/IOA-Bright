<div id="rightCol">
	<?php if (is_active_sidebar('home-sidebar') && is_home()): ?>
		<ul class="sidebar">
			<?php dynamic_sidebar('home-sidebar'); ?>
		</ul>
	<?php endif ?>
	<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>
		<ul class="sidebar">
			<?php dynamic_sidebar( 'right-sidebar' ); ?>
		</ul>
	<?php endif; ?>
</div>
