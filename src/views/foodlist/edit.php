<div class="row">
	<div class="three columns">
		<img class="img-fluid" src="<?= URL::IMG('cooking.jpg'); ?>" alt="Cooking">
	</div>
	<h3><?= i18n::tr('title.editfood') ?></h3>

	<div class="nine columns">

		<div class="row">
			<div class="twelve columns">
				<form action="<?= Conf::DIR ?>foodlist/edit/<?= htmlentities($data["food"]["id"]) ?>?event=<?= htmlentities($data['event']) ?>" method="POST">
					<input type="hidden" name="event" value="<?= $data['event'] ?>">

					<div class="row">
						<div class="six columns">
							<label for="name"><?= I18n::tr('label.foodname'); ?> (*)</label>
							<input readonly id="name" type="text" name="name" class="u-full-width" value="<?= htmlentities($data["food"]["name"]) ?>" maxlength="40">
						</div>
						<div class="six columns">
							<label for="category"><?= I18n::tr('label.foodcategory'); ?> (*)</label>
							<select id="category" name="category" required class="u-full-width">
								<?php

								foreach ($data['categories'] as $cat) {
									$selected = "";
									if ($cat["id"] == $data["food"]["categoryId"]) {
										$selected = "selected";
									}
									echo '<option value="' . htmlentities($cat['id']) . '" ' . $selected . '>' . htmlentities($cat["name"]) . '</option>';
								}
								?>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="six columns">
							<label for="volunteer"><?= I18n::tr('label.foodvolunteer'); ?></label>
							<input type="text" id="volunteer" name="volunteer" class="u-full-width" value="<?= htmlentities($data["food"]['volunteer']) ?>">
						</div>
						<div class="six columns">
							<label for="note"><?= I18n::tr('label.foodnote'); ?></label>
							<input type="text" name="note" id="note" class="u-full-width" value="<?= htmlentities($data['food']['note']) ?>">
						</div>
					</div>

					<div class="row">
						<div class="twelve columns">
							<input class="button-primary" value="<?= I18n::tr('button.update'); ?>" type="submit">
							<a class="button button-primary" href="<?= htmlentities($data["cancel.link"]) ?>"><?= I18n::tr('button.cancel'); ?></a>
						</div>
					</div>
				</form>


			</div>
		</div>
	</div>
</div>