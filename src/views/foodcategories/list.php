<div class="row">
<div class="twelve columns">
	<table class="stripe">
	<?php
	  if (!sizeof($data['foodcategories'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.foodcategories') . '</th>';
		 echo '<th colspan="2">' . I18n::tr('table.header.description') . '</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 # link templates
		 $act_link = '<a href="' . Conf::DIR . 'foodcategories/activate/{id}/">' . UiHelper::activateIcon() . '</a>';
		 $deact_link = '<a href="' . Conf::DIR . 'foodcategories/deactivate/{id}/">' . UiHelper::deactivateIcon() . '</a>';
		 $del_link = '<a href="' . Conf::DIR . 'foodcategories/del/{id}">' . UiHelper::deleteIcon() . '</a>';

		foreach ($data['foodcategories'] as $category) {
			$inactive = $category['inactive'];
			$safe_id = htmlentities($category["id"]);

			# de/activate link
			$activation_link = $inactive ? $act_link : $deact_link;

			echo '<tr>';
			echo '<td>' . htmlentities($category["name"]) . '</td>';
			echo '<td>&nbsp;</td>';

			if ($data['isadmin']) {
				echo '<td>';
				echo '&nbsp;';
				echo str_replace("{id}", $safe_id, $activation_link);
				echo '&nbsp;';
				echo str_replace("{id}", $safe_id, $del_link);
				echo '</td>';
			} else {
				echo '<td>&nbsp;</td>';
			}
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div>