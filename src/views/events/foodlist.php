<!-- Foodlist -->
<h4><?= I18n::tr('title.foodlist') ?></h4>
<div class="row">
<div class="twelve columns">
	<table class="u-full-width">
	<?php
	  if (!sizeof($data['foodlist'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.food') . '</th>';
		 echo '<th>' . I18n::tr('table.header.volunteer') . '</th>';
		 echo '<th>' . I18n::tr('table.header.category') . '</th>';
		 echo '<th>' . I18n::tr('table.header.foodnote') . '</th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		foreach ($data['foodlist'] as $food) {
			echo '<tr>';
			echo '<td>' . htmlentities($food["name"]) . '</td>';
			echo '<td>' . htmlentities($food["volunteer"]) . '</td>';
			echo '<td>' . htmlentities($food["category"]) . '</td>';
			echo '<td>' . htmlentities($food["note"]) . '</td>';
			echo '</tr>';
		 }
		 echo '</tbody>';
	  }
	?>
	</table>
</div>
</div>