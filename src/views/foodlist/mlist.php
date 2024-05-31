<?php
$event_url = 'event=' .  htmlentities($data['event']);
?>
<div class="subnav">
	<a class="button button-primary" href="<?= Conf::DIR ?>foodlist/add/?<?= $event_url ?>"><?= I18n::tr('menu.newfood') ?></a>
</div>

<div class="row">
	<div class="twelve columns">
		<table class="u-full-width">
			<?php
			if (!sizeof($data['foodlist'])) {
				echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
			} else {
				echo '<thead><tr>';
				echo '<th>' . I18n::tr('table.header.food') . '</th>';
				echo '<th>' . I18n::tr('table.header.details') . '</th>';
				echo '<th>&nbsp;</th>';

				echo '</tr></thead>';
				echo '<tbody>';

				# link templates
				$event = '?event=' . htmlentities($data['event']);

				foreach ($data['foodlist'] as $food) {

					$inactive = $food['inactive'];
					$editlink =  Conf::DIR . 'foodlist/edit/' . htmlentities($food["id"]) . $event;
					$dellink = Conf::DIR . 'foodlist/delete/' . htmlentities($food["id"]) . $event;

					echo '<tr>';
					echo '<td>';
					echo htmlentities($food['name']);
					echo '<br><span class="subtitle">' . htmlentities($food["category"]) . '</span>';
					echo '</td>';

					echo '<td>';
					if (!empty($food["volunteer"])) {
						echo '<img class="icon" src="' . URL::IMG("people.svg") . '">' . htmlentities($food["volunteer"]) . '<br>';
					} else {
						echo '<img class="icon" src="' . URL::IMG("people-red.svg") . '"><br>';
					}
					if (!empty($food["note"])) {
						echo '<img class="icon" src="' . URL::IMG("note.svg") . '">' . htmlentities($food["note"]);
					}
					echo '</td>';

					echo '<td>';
					echo '<a href="' . $editlink . '">' . UiHelper::editIcon() . '</a>';

					if ($data["isloggedin"]) {
						echo '<a href="' . $dellink . '">' . UiHelper::deleteIcon() . '</a>';
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