<div id="leftCol">
	<?php menus(); ?>
	<?php if (!is_page('search')): ?>
		<div class="searchbox">
			<gcse:searchbox-only></gcse:searchbox-only>
		</div>
	<?php endif; ?>
</div>
