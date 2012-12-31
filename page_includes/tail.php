
	<footer class="gradient">
		<div id="copyright_text">
			<span id="plug">Site by <a href="https://github.com/notatestuser/ajaxy-site-mould">me</a></span>,
			&copy; Something
		</div>
	</footer>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via ant build script-->
<script src="js/plugins.js?<?php echo filemtime('js/plugins.js')%100000 ?>"></script>
<script src="js/script.js?<?php echo filemtime('js/script.js')%100000 ?>"></script>
<!-- end scripts-->

<script>
	var _gaq=[['_setAccount','UA-xxxx-1'],['_setDomainName', 'xxxx.co.uk'],['_setAllowLinker', true],['_trackPageview']];
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

</body>
</html>
