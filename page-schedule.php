<?php
/*
Template Name: Schedule
*/
?>
<?php get_header(); ?>
<?php include 'partials/loop.php'; ?>
<?/*
$list_total = 0;
$list_count = 1;
$schedule_query = new WP_Query('category_name=Schedule&posts_per_page=4');

if ( $schedule_query->have_posts() ) : while ( $schedule_query->have_posts() ) : $schedule_query->the_post();
$list_total++;
endwhile; endif; wp_reset_query();

$schedule_query = new WP_Query('category_name=Schedule&posts_per_page=4');

if ( $schedule_query->have_posts() ) : while ( $schedule_query->have_posts() ) : $schedule_query->the_post(); ?>

<h2><?php the_title(); ?></h2>
<?php the_content(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
<?php $myEvent = get_group('Event'); // use the Custom Group name
foreach($myEvent as $event){ ?>
<p>
	<?php echo $event['date'][1].", ";?><b><?php echo $event['location'][1]; ?></b>&nbsp;
	<?php if ($event['status'][1]) {
		$statusOutput = $event['status'][1];
		if ($event['sanction'][1]) {
			$statusOutput = '<a href="'.$event['sanction'][1].'" target="_blank">'.$statusOutput.'</a>';
		}
		if ($statusOutput == 'Race canceled') {
			$statusOutput = '(<span style="color: #F00; text-transform: uppercase; font-weight: bold;">'.$statusOutput.'</span>)';
		} else {
			$statusOutput = '('.$statusOutput.')';
		}
	}
	echo $statusOutput; $statusOutput = ''; ?><br />
	<?php if ($event['note'][1]) { echo $event['note'][1]; ?><br /><?php } ?>
	<?php if ($event['results'][1]) {
		echo generateResultLinks($event);
		/* ?>
		Results are <a href="<?php echo $event['results'][1]; ?>" target="_blank" title="Results for race at <?php echo $event['location'][1]; ?> on <?php echo $event['date'][1];?>">available</a>.
	<?php *//* } ?>
</p>
<?php } ?>
</div>
<?php
if ($list_count == $list_total) {
	echo '';
} else {
	echo '<hr />';
}
$list_count++;

endwhile;
endif;

wp_reset_query(); */
?>
<?php get_footer(); ?>