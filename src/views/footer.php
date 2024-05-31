
<footer class="page-footer">
<div id="copyright">
    <div class="container">
		<div class="row">
			<div class="six columns">
				<a class="footer" href="<?= Conf::DIR ?>page/imprint/"><?= I18n::tr('link.imprint'); ?></a>
				&nbsp;|&nbsp;<a class="footer" href="<?= Conf::DIR ?>page/privacy/"><?= I18n::tr('link.privacy'); ?></a>
				<!-- Cookie Preferences Center to change their preferences. Do not modify the ID parameter.  -->
				&nbsp;|&nbsp;<a class="footer" href="#" onclick="document.cookie='cookiebar=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/'; setupCookieBar(); return false;">Cookies</a>
			</div>
			<div class="six columns">				
				<p class="pull-right">Copyright (c) <?php echo date("Y"); ?> - Events, v <?= Conf::APPVERSION ?></p>			
			</div>
		</div>
    </div>
</div>
</footer>

</body>
</html>
