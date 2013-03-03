/* Author: Luke Plaster - lukep.org
   ajaxy-site-mould
   December 2012
*/

(function(w){

	var PAGE_FILE_DIR = '',
	    PAGE_FILE_EXT = '.php',
	    app,
	    rewireHyperlinks,
	    isLoading,
	    beginLoading,
	    finishedLoading;

	// we'll prevent an ajax request going out for initial load
	app = w.app = w.app || { pageRequestInProgress: true };

	// this function allows us to use regular-looking links in the markup and only decorate with the hash syntax when we call it
	rewireHyperlinks = function(contextEl){
		// upgrade hyperlink functionality in JS-able browsers: use hashes instead
		$('a', contextEl).each(function(){
			var $this = $(this),
				href = $this.attr('href');
			if (href.indexOf('#!/') !== 0 && href.indexOf('http') !== 0 && href.indexOf('mailto:') !== 0) {
				$this.attr('href', '#!/'+href);
			}
		});

		// hook up hyperlink functionality to eligible list items containing anchors
		$('li > a, h1 a', contextEl).each(function(){
			var $anchor = $(this);
			var $parentItem = $anchor.parent();
			if ($parentItem.css('cursor') == 'pointer') {
				$parentItem.attr('alt', $anchor.attr('href'));
				$anchor.removeAttr('href');
				$parentItem.click(function(){
					var href = $parentItem.attr('alt');
					if (href != location.href) {
						location.href = href;
					}
				});
			}
		});
	};

	isLoading = function() {
		return app.pageRequestInProgress;
	}

	beginLoading = function() {
		app.pageRequestInProgress = true;
		$('body').addClass('loading');
	};

	finishedLoading = function() {
		app.pageRequestInProgress = false;
		$('body').removeClass('loading');
	};

	// page change/animation bindings
	$(document).ready(function(){
		// hide elements bearing the js_hide class. oh, and flyins, too.
		var $body = $('body');
		$('.js_hide', $body).hide();

		// bind the hashchange event (for no-reload hyperlinks)
		rewireHyperlinks($body);
		$(w).hashchange( function(){
			// we ignore hashes that don't start with this prefix
			if ('#!/' == location.hash.substring(0, 3) && ! isLoading()) {
				beginLoading();

				var page_to_get = location.hash.substring(3);
				$.ajax({
					url: PAGE_FILE_DIR + page_to_get + PAGE_FILE_EXT,
					success: function(data) {
						// find the new content in the pulled markup and inject it into the DOM
						var $new_content = $(data)
							.find('.content')
								.removeClass('active_content')
								.insertAfter('.active_content')
								.css({'left': 700, 'display': 'block', 'opacity': 0})
								.animate({'left': 0, 'opacity': 1}, 'slow');

						// animate out the existing content in the DOM
						$('.active_content')
							.removeClass('active_content')
							.animate({'left': -700, 'opacity': 0}, 'slow', function() {
								$new_content.addClass('active_content');
								$(this).remove();
								rewireHyperlinks($new_content);
							});

						finishedLoading();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert("Sorry, the requested page couldn't be shown: \"" + errorThrown + "\"");
						finishedLoading();
					},
					dataType: 'html'
				});
			}
		});

		// make our initial hashchange event fire
		$(w).hashchange();
	});

	$(w).load(function(){
		// do some intro animation or initialisation
		setTimeout(function(){
			finishedLoading();
		}, 1);
	});

})(window);
