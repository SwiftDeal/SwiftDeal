	<footer>
		<p>&copy; SwiftDeal.in <?php echo strftime("%Y");?></p>
	</footer>
</div>
<!-- Piwik -->
<script type="text/javascript">
	var _paq = _paq || [];
	_paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
	_paq.push(["setCookieDomain", "*.swiftdeal.in"]);
	_paq.push(["setDomains", ["*.swiftdeal.in"]]);
	_paq.push(["trackPageView"]);
	_paq.push(["enableLinkTracking"]);

	(function() {
	  var u=(("https:" == document.location.protocol) ? "https" : "http") + "://swiftdeal.in/piwik/";
	  _paq.push(["setTrackerUrl", u+"piwik.php"]);
	  _paq.push(["setSiteId", "1"]);
	  var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
	  g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
	})();
</script>
<!-- End Piwik Code -->
<?php require_once $fb_modal.'modals.php';?>

	<script src="//code.jquery.com/jquery-1.7.min.js"></script>
	<script src="<?php echo $fbootstrap_js.'bootstrap-modal.js';?>"></script>
	<script src="<?php echo $fbootstrap_js.'bootstrap-dropdown.js';?>"></script>
	<script src="<?php echo $fbootstrap_js.'bootstrap-alerts.js';?>"></script>
	<script src="<?php echo $fbootstrap_js.'bootstrap-tabs.js';?>"></script>
</body>
</html>