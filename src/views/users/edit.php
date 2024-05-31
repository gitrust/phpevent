<form action="<?= Conf::DIR ?>users/add/" method="POST" autocomplete="off">

	<div class="row">
		<div class="five columns">
			<label for="login"> <?= I18n::tr('label.userlogin'); ?> (*)</label>
			<div data-tip="Wird fuer die Anmeldung verwendet">
				<input type="text" autocomplete="off" placeholder="<?= I18n::tr('label.userlogin'); ?>" name="login" value="" maxlength="30" required>
			</div>
		</div>
		<div class="five columns">
			<label for="pass"> <?= I18n::tr('label.password'); ?> (*)</label>
			<div data-tip="Verwende Buchstaben, Zahlen, Sonderzeichen">
				<input type="password" autocomplete="off" placeholder="<?= I18n::tr('label.userpass'); ?>" name="pass" value="" maxlength="255" required>
			</div>
		</div>

		<div class="two columns">
			<label for="userrole"><?= I18n::tr('label.userrole'); ?></label>
			<select name="userrole" required>
				<option value="user"><?= I18n::tr('label.user'); ?></option>
				<option value="manager"><?= I18n::tr('label.manager'); ?></option>
				<option value="admin"><?= I18n::tr('label.administrator'); ?></option>
			</select>
		</div>

	</div>

	<div class="row">
		<div class="five columns">
			<label for="pass"> <?= I18n::tr('label.firstname'); ?> (*)</label>
			<input type="text" name="firstname" placeholder="<?= I18n::tr('label.userfirstname'); ?>" value="" maxlength="30" required>
		</div>

		<div class="five columns">
			<label for="email"> <?= I18n::tr('label.email'); ?> (*)</label>
			<input type="text" name="email" placeholder="<?= I18n::tr('label.email'); ?>" value="" maxlength="50" required>
		</div>
		<div class="two columns">
		</div>

	</div>

	<div class="row">
		<div class="twelve columns">
			<label for="description"> <?= I18n::tr('label.description'); ?></label>
			<input type="text" class="u-full-width" name="description" placeholder="<?= I18n::tr('label.description'); ?>" value="" maxlength="150">
		</div>

	</div>

	<input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">

</form>