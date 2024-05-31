<form action="<?= Conf::DIR ?>admin/eventadd/" method="POST">

	<div class="row">
		<div class="four columns">
			<label for="eventdate"><?= I18n::tr('label.eventdate'); ?> (*)</label>
			<div data-tip="Format MM.DD.YYYY">
				<input id="eventdate" type="text" name="eventdate" value="">
			</div>
		</div>
		<div class="four columns">
			<label for="title"><?= I18n::tr('label.eventtitle'); ?> (*)</label>
			<input id="title" type="text" name="title" value="">
		</div>
		<div class="four columns">
			<label for="subtitle"><?= I18n::tr('label.eventsubtitle'); ?></label>
			<input id="subtitle" type="text" name="subtitle" value="">
		</div>
	</div>

	<div class="row">
		<div class="four columns">
			<label for="organizer"><?= I18n::tr('label.eventorganizer'); ?></label>
			<input id="organizer" type="text" name="organizer" value="">
		</div>

		<div class="six columns">
			<label for="location"><?= I18n::tr('label.eventlocation'); ?></label>
			<input id="location" type="text" name="location" value="">
		</div>
	</div>

	<div class="row">
		<div class="twelve columns">
			<label for="desc"><?= I18n::tr('label.eventdescription'); ?></label>
			<textarea id="desc" class="u-full-width" type="text" name="desc" value="" maxlength="2000"></textarea>
			<label class="textarea-counter" for="desc">0/2000</label>
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
</form>



<!-- https://github.com/bevacqua/rome -->
<SCRIPT LANGUAGE="JavaScript" ID="js1">
	rome(eventdate, {
		"time": false,
		"autoClose": true,
		"strictParse": false,
		"inputFormat": "DD.MM.YYYY",
		"weekStart": "1"
	});

	// textarea counter
	$(document).ready(function() {
		var input = $("#desc");
		var label = $(".textarea-counter");
		var maxVal = 2000;

		input.keyup(function() {
			var inputLength = input.val().length;
			var counter = $(".textarea-counter");

			$(".textarea-counter").html("");
			$(".textarea-counter").html(inputLength + "/2000");

			if (inputLength >= maxVal) {
				label.css("color", "#b94a48");
			} else {
				label.css("color", "#999");
			}
		});
	});
</SCRIPT>