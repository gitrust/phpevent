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
				echo '<th class="priority2">' . I18n::tr('table.header.description') . '</th>';
				echo '<th>' . I18n::tr('table.header.taskvolunteer') . '</th>';
				echo '<th class="priority3">' . I18n::tr('table.header.tasktime') . '</th>';
				echo '<th>&nbsp;</th>';
				echo '</tr></thead>';
				echo '<tbody>';

				# link templates
				$event = 'event=' . htmlentities($data['event']);
				$edit_link = '<a href="' . Conf::DIR . sprintf('tasks/edit/{id}?%s">', $event) .  UiHelper::editIcon() . '</a>';
				$del_link = '<a href="' . Conf::DIR . sprintf('tasks/delete/{id}?%s">', $event) . UiHelper::deleteIcon() . '</a>';

				foreach ($data['tasks'] as $task) {
					$inactive = $task['inactive'];
					$safe_id = htmlentities($task["id"]);

					echo '<tr>';
					echo '<td>';
					echo htmlentities($task["name"]);
					echo '<div class="priority3 subtitle">' . htmlentities($task["daytime"]) . '<div>';
					echo '</td>';
				
					echo '<td class="priority2">' . htmlentities($task["description"]) . '</td>';
					echo '<td>' . htmlentities($task["volunteer"]) . '</td>';
					echo '<td class="priority3">' . htmlentities($task["daytime"]) . '</td>';

					echo '<td>';
					echo str_replace("{id}", $safe_id, $edit_link);
					if ($data["isloggedin"]) {
						echo '&nbsp;';
						echo str_replace("{id}", $safe_id, $del_link);
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