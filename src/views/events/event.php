<?php
$event = $data["event"];
?>

<h2><?= $event['title'] ?></h2>

<h5><?= I18n::tr('label.eventdescription'); ?></h5>
<div class="row">
	<div class="twelve columns">
		<div>
			<?php echo UiHelper::textToMd($event["description"]); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="four columns">
		<img class="img-fluid" src="<?= $data["qrcode"] ?>" alt="Community">
	</div>
	<h4><?= I18n::tr('title.eventdetails'); ?></h4>
	<div class="eight columns">
		<table class="u-full-width">
			<tr>
				<td><?= I18n::tr('label.eventtitle'); ?></td>
				<td><b><?= htmlentities($event["title"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventdate'); ?></td>
				<td><b><?= htmlentities($event["targetDate"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventsubtitle'); ?></td>
				<td><b><?= htmlentities($event["subtitle"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventorganizer'); ?></td>
				<td><b><?= htmlentities($event["eventOrganizer"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventlocation'); ?></td>
				<td><b><?= htmlentities($event["eventLocation"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventtasks'); ?></td>
				<td><b><?= htmlentities($data["taskcount"]); ?></b></td>
			</tr>
			<tr>
				<td><?= I18n::tr('label.eventfood'); ?></td>
				<td><b><?= htmlentities($data["foodcount"]); ?></b></td>
			</tr>
		</table>
	</div>
</div>

