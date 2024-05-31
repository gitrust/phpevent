<h2><?= $data['title'] ?></h2>
<?php
$event_url = 'event=' .  htmlspecialchars($data['event']);
$eventid = htmlspecialchars($data['event']);
?>

<div class="subnav">
	<a class="button" href="<?= Conf::DIR ?>events/<?= $eventid ?>"><?= I18n::tr('menu.event') ?></a>
	<a class="button" href="<?= Conf::DIR ?>tasks/?<?= $event_url ?>"><?= I18n::tr('menu.tasks') ?></a>
	<a class="button button-primary" href="<?= Conf::DIR ?>foodlist/?<?= $event_url ?>"><?= I18n::tr('menu.foodlist') ?></a>
	<?php
	if (!$data["hide_new_btn"]) {
	?>
		<a class="button button-primary" href="<?= Conf::DIR ?>foodlist/add/?<?= $event_url ?>"><?= I18n::tr('menu.newfood') ?></a>
	<?php
	}
	?>
</div>
<br>