<h2><?= $data['title'] ?></h2>

<?php
	 $event_url = 'event=' . htmlentities($data['eventid']);
	 $eventid = htmlentities($data['eventid']);
?>

<div class="subnav">
	<a class="button button-primary" href="<?= Conf::DIR ?>foodlist/?<?= $event_url ?>"><?= I18n::tr('menu.foodlist') ?></a> 
	<a class="button button-primary" href="<?= Conf::DIR ?>tasks/?<?= $event_url ?>"><?= I18n::tr('menu.tasks') ?></a>
	<a target="_blank" class="button" href="<?= Conf::DIR ?>events/print/<?= $eventid ?>"><?= UiHelper::printIcon() ?>Druck</a>
</div>

<br>
<h3><?= $data['event']['title'] ?></h2>