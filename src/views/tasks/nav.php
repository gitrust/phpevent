<h2><?= $data['title'] ?></h2>

<?php
$event_url = 'event=' . $data['event'];
$eventid = htmlentities($data['event']);
?>

<div class="subnav">
	<a class="button" href="<?= Conf::DIR ?>events/<?= $eventid ?>"><?= I18n::tr('menu.event') ?></a>
	<a class="button" href="<?= Conf::DIR ?>foodlist/?<?= $event_url ?>"><?= I18n::tr('menu.foodlist') ?></a>
	<a class="button button-primary" href="<?= Conf::DIR ?>tasks/?<?= $event_url ?>"><?= I18n::tr('menu.tasks') ?></a>
	<?php
	if (!$data["hide_new_btn"]) {
	?>
		<a class="button button-primary" href="<?= Conf::DIR ?>tasks/add/?<?= $event_url ?>"><?= I18n::tr('menu.newtask') ?></a>
	<?php
	}
	?>
</div>

<br>