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
					echo '<th>' . I18n::tr('table.header.eventdate') . '</th>';
					echo '<th>' . I18n::tr('table.header.eventtitle') .  '</th>';
					echo '<th class="priority2">' . I18n::tr('table.header.eventorganizer') .  '</th>';
					echo '<th class="priority3">' . I18n::tr('table.header.eventlocation') .  '</th>';
					echo '<th>' . I18n::tr('table.header.edit') .  '</th>';

					echo '</tr></thead>';

					echo '<tbody>';

					foreach ($data['events'] as $event) {
						$eventlink =  Conf::DIR . 'events/' . htmlentities($event["id"]);

						echo '<tr>';
						echo '<td>' . htmlentities(UiHelper::formatDate($event["targetDate"])) . '</td>';
						echo '<td>';
						echo htmlentities($event["title"]);
						echo '<div class="priority2 subtitle">' . htmlentities($event["eventOrganizer"]) . '</div>';
						echo '</td>';

						echo '<td class="priority2">' . htmlentities($event["eventOrganizer"]) . '</td>';
						echo '<td class="priority3">' . htmlentities($event["eventLocation"]) . '</td>';
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