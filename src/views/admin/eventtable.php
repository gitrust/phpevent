<div class="row">
	<div class="twelve columns">
	<table class="u-full-width">
	<?php
	  if (!sizeof($data['events'])) {
		 echo '<div class="alert alert-info">' . I18n::tr('table.noentries') . '</div>';
	  }
	  else {
		 echo '<thead><tr>';
		 echo '<th>' . I18n::tr('table.header.eventdate') . '</th>';
		 echo '<th>' . I18n::tr('table.header.eventtitle') . '</th>';
		 echo '<th class="priority2">' . I18n::tr('table.header.eventorganizer') . '</th>';
		 echo '<th class="priority3">' . I18n::tr('table.header.eventsubtitle') . '</th>';
		 echo '<th></th>';
		 echo '</tr></thead>';
		 echo '<tbody>';
		
		 foreach ($data['events'] as $item) {
			echo '<tr>';
			echo '<td>' . htmlentities(UiHelper::formatDate($item["targetDate"])) . '</td>';
			echo '<td>' . htmlentities($item["title"]) . '</td>';
			echo '<td class="priority2">' . htmlentities($item["eventOrganizer"]) . '</td>';
			echo '<td class="priority3">' . htmlentities($item["subtitle"]) . '</td>';
			if ($data['isadmin']) {
				echo '<td><a href="' . Conf::DIR . 'admin/eventdel/' . htmlentities($item["id"]) . '">' . UiHelper::deleteIcon() . '</a></td>';
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