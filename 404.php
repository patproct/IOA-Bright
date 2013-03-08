<?php get_header(); ?>
<div class="post-object">
	<h2 class="archive-title">Oops!</h2>
	<p>That page either doesn't exist or has been moved. You might want to try <a href="javascript:history.back();" title="Go back a page">going back</a> or heading back over to the <a href="<?php bloginfo('url'); ?>" title="Indiana Outboard Association Home">home page</a>.</p>
	<p>You can also try <a href="<?php echo get_page_link(get_page_by_title('Search results','OBJECT')); ?>" title="Search the IOA website">searching this website</a> for what you are looking for.</p>
</div>
<?php get_footer(); ?>
