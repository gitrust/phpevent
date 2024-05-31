<div class="row">
	<div class="twelve columns">
		<div class="subnav">
			<a href="<?= Conf::DIR ?>admin/events/"><?= I18n::tr('link.events'); ?></a>
			
<?php 
if ($data["isadmin"]){
	echo ' | <a href="' . Conf::DIR . 'foodcategories">' . I18n::tr('menu.foodcategories') . '</a>';
	echo ' | <a href="' . Conf::DIR . 'users/">' . I18n::tr('menu.users') . '</a>';
	echo ' | <a href="' . Conf::DIR . 'statistics/">' . I18n::tr('menu.statistics') . '</a>';
}
?>			
		</div>
	</div>
</div>
<br>