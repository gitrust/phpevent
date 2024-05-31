<?php
$event_url = 'event=' .  htmlentities($data['event']);
?>

<div class="row">
	<div class="twelve columns">
		<table class="u-full-width">
			<?php
			if (!sizeof($data['foodlist'])) {
				echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
			} else {
				echo '<thead><tr>';
				echo '<th>' . I18n::tr('table.header.food') . '</th>';
				echo '<th>' . I18n::tr('table.header.volunteer') . '</th>';
				echo '<th class="priority2">' . I18n::tr('table.header.category') . '</th>';
				echo '<th class="priority3">' . I18n::tr('table.header.foodnote') . '</th>';
				echo '<th>&nbsp;</th>';
				echo '</tr></thead>';
				echo '<tbody>';

				# link templates
				$event = 'event=' . $data['event'];
				$edit_link = '<a href="' . Conf::DIR . sprintf('foodlist/edit/{id}?%s">', $event) . UiHelper::editIcon() . '</a>';
				$del_link = '<a href="' . Conf::DIR . sprintf('foodlist/delete/{id}?%s">', $event) . UiHelper::deleteIcon() . '</a>';

				foreach ($data['foodlist'] as $food) {

					$inactive = $food['inactive'];
					$safe_id = htmlspecialchars($food["id"]);

					echo '<tr>';
					echo '<td>';
					echo htmlentities($food['name']);
					echo '<div class="priority2 subtitle">' . htmlentities($food["category"]) . '<div>';
					echo '</td>';
					echo '<td>' . htmlentities($food["volunteer"]) . '</td>';
					echo '<td class="priority2">' . htmlentities($food["category"]) . '</td>';
					echo '<td class="priority3">' . htmlentities($food["note"]) . '</td>';

					echo '<td>';
					echo '&nbsp;';
					echo str_replace("{id}", $safe_id, $edit_link);
					echo '&nbsp;';
					if ($data["isloggedin"]) {
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