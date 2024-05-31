<div class="row">
<div class="twelve columns">
	<form action="<?= Conf::DIR ?>foodcategories/add" method="POST">
	<div class="row">
		<div class="three columns">
			<label for="name"><?= I18n::tr('label.newfoodcategory'); ?> (*)</label>
			<input type="text" name="name" value="">
		</div>
		<div class="three columns">
			&nbsp;
		</div>
		<div class="six columns">
			<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
		</div>
	</div>
	</form>
</div>
</div>
