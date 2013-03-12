<div id="leftCol">
	<?php menus(); ?>
	<?php if (!is_page('search')): ?>
		<div class="searchbox">
			<gcse:searchbox-only resultsUrl="<?php echo get_page_link(get_page_by_title('Search results','OBJECT')); ?>"></gcse:searchbox-only>
		</div>
	<?php endif; ?>
</div>
