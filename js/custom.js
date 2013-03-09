function findPostID(str) {
	var matches, num;
	matches = str.match(/\d+/);
	return (matches) ? parseInt(matches[0], 10) : 0;
}
$(document).ready(function(){
	$('#leftCol ul.menu > li:not(.current_page_ancestor,.current_page_item)').hoverIntent({
		over: function(){ $(this).children('ul').slideDown(); },
		timeout: 1000,
		out: function(){ $(this).children('ul').slideUp(); }
	});
	$('#quicklinks a, .edit-post-link a').attr('target', '_blank');
	$('div.final-lap').addClass('special').append('<p class="tagTitle">Final lap</p>');
	$('div.propwash').addClass('special').append('<p class="tagTitle">Propwash</p>');
	// $('div.special').each(function(){
	// 	$(this).append('<p class="tagTitle"></p>');
	// 	if ($(this).hasClass('final-lap')) {
	// 		$(this).children('p.tagTitle').text("Final Lap");
	// 	} else {
	// 		if ($(this).hasClass('propwash')) $(this).children('p.tagTitle').text("Propwash");
	// 	}
	// });
});

// Begin Google Custom Search
(function() {
	var cx = '018164519255312619522:pwquglnin2u';
	var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
	gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//www.google.com/cse/cse.js?cx=' + cx;
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();
