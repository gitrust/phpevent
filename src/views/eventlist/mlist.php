<h2><?= htmlentities($data['title']) ?></h2>

<div class="row">
	<div class="twelve columns">

		<?php echo Message::show(); ?>

		<div class="hscroller">
			<table class="u-full-width">
				<?php
				if (!sizeof($data['events'])) {
					echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
				} else {
					echo '<thead><tr>';
					echo '<th>' . I18n::tr('table.header.eventtitle') .  '</th>';
					echo '<th>' . I18n::tr('table.header.details') .  '</th>';
					echo '<th>&nbsp;</th>';
					echo '</tr></thead>';

					echo '<tbody>';

					foreach ($data['events'] as $event) {
						$eventlink =  Conf::DIR . 'events/' . htmlentities($event["id"]);

						echo '<tr>';
						echo '<td>' . htmlentities($event["title"]) . '</td>';
						echo '<td>';

						if (!empty($event["targetDate"])) {
							echo '<img class="icon" src="' . URL::IMG("calendar.svg") . '"> ' . htmlentities(UiHelper::formatDate($event["targetDate"])) . '&nbsp;';
						}
						if (!empty($event["eventOrganizer"])) {
							echo '<img class="icon" src="' . URL::IMG("people.svg") . '"> ' . htmlentities($event["eventOrganizer"]) . '&nbsp;';
						} 
						if (!empty($event["eventLocation"])) {
							echo '<img class="icon" src="' . URL::IMG("location.svg") . '"> ' . htmlentities($event["eventLocation"]);
						}
						echo '</td>';
						echo '<td>';
						echo '<a href="' . $eventlink . '"><img class="icon" src="' . URL::IMG("edit.svg") . '"></a>';
						echo '</td>';
						echo '</tr>';
					}
					echo '</tbody>';
				}
				?>
			</table>
		</div>
	</div>
</div> <!-- / .row -->