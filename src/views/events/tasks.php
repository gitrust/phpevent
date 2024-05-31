<h4><?= I18n::tr('title.tasks') ?></h4>
<div class="row">
	<div class="twelve columns">
		<table class="u-full-width">
			<?php
			if (!sizeof($data['tasks'])) {
				echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
			} else {
				echo '<thead><tr>';
				echo '<th>' . I18n::tr('table.header.taskname') . '</th>';				
				echo '<th>' . I18n::tr('table.header.taskvolunteer') . '</th>';
				echo '<th>' . I18n::tr('table.header.tasktime') . '</th>';
				echo '<th>' . I18n::tr('table.header.description') . '</th>';
				echo '</tr></thead>';
				echo '<tbody>';

				foreach ($data['tasks'] as $task) {

					echo '<tr>';
					echo '<td>' . htmlentities($task["name"]) . '</td>';					
					echo '<td>' . htmlentities($task["volunteer"]) . '</td>';					
					echo '<td>' . htmlentities($task["daytime"]) . '</td>';
					echo '<td>' . htmlentities($task["description"]) . '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
			}
			?>
		</table>
	</div>
</div>