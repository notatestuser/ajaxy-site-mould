<?php

if (isset($_GET['_escaped_fragment_']) && strlen($_GET['_escaped_fragment_']) > 0) {
	$requested_page = $_GET['_escaped_fragment_'];
	if ($requested_page == '/index') {
		$requested_page = '/';
	}
	
	/**
	 * Note that if you use a permanent (301) redirect, the url shown in our search results will typically be the target of the redirect, 
	 * whereas if a temporary (302) redirect is used, we'll typically show the #! url in search results.
	 * 
	 * Source: https://developers.google.com/webmasters/ajax-crawling/docs/faq
	 */
	
	header("Location: .{$requested_page}", true, 301);
	exit;
}
