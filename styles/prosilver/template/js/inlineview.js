;(function($, window, document) {
	$('document').ready(function(){
		var $ev = $('div.calendarinlineview div.eventrows div.evrow div.ev');
		$ev.hover(function(){
			var t = $(this).data('topic');
			$ev.filter('[data-topic="' + t + '"]').find('div.ev-overlay').each(function(){
				$(this).addClass('hover');
			});
		}, function(){
			t = $(this).data('topic');
			$ev.filter('[data-topic="' + t + '"]').find('div.ev-overlay').each(function(){
				$(this).removeClass('hover');
			});
		});
	});
})(jQuery, window, document);
