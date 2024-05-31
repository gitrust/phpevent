<?php
$event_url = 'event=' .  htmlentities($data['event']);
?>

<div class="row">
	<div class="twelve columns">
		<table class="u-full-width">
			<?php
			if (!sizeof($data['tasks'])) {
				echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
			} else {
				echo '<thead><tr>';
				echo '<th>' . I18n::tr('table.header.taskname') . '</th>';
				echo '<th>' . I18n::tr('table.header.details') . '</th>';
				echo '<th>&nbsp;</th>';
				echo '</tr></thead>';
				echo '<tbody>';

				# link templates
				$event = '?event=' . htmlentities($data['event']);

				foreach ($data['tasks'] as $task) {
					$inactive = $task['inactive'];
					$edit_link =  Conf::DIR . 'tasks/edit/' . htmlentities($task["id"]) . $event;
					$del_link =  Conf::DIR . 'tasks/delete/' . htmlentities($task["id"]) . $event;

					echo '<tr>';
					echo '<td>' . htmlentities($task["name"]);
					echo '</td>';
					echo '<td>';

					if (!empty($task["daytime"])) {
						echo '<img class="icon" src="' . URL::IMG("clock.svg") . '">' . htmlentities($task["daytime"]) . '<br>';
					}
					if (!empty($task["volunteer"])) {
						echo '<img class="icon" src="' . URL::IMG("people.svg") . '">' . htmlentities($task["volunteer"]) . '<br>';
					} else {
						echo '<img class="icon" src="' . URL::IMG("people-red.svg") . '"><br>';
					}
					if (!empty($task["description"])) {
						echo '<img class="icon" src="' . URL::IMG("note.svg") . '">' . htmlentities($task["description"]) . '<br>';
					}
					echo '</td>';
					
					echo '<td>';
					echo '<a href="' . $edit_link .  '">' . UiHelper::editIcon() . '</a>';
					if ($data["isloggedin"]) {
						echo '<a href="' . $del_link . '">' . UiHelper::deleteIcon() . '</a>';
					}
					echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
			}
			?>
		</table>
	</div>
</div>