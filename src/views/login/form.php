<div class="loginmain">

    <?php echo Message::show(); ?>

    <!-- The above form looks like this -->
    <div class="login-box">
        <img src="/static/img/avatar.svg" class="avatar">
        <form method="POST" action="<?= Conf::DIR ?>login/login/">
            <p><?= I18n::tr('form.loginname'); ?></p>
            <input type="text" name="login" class="logininput" placeholder="Enter Username" required>
            <p><?= I18n::tr('form.password'); ?></p>
            <input type="password" class="logininput" name="pass" placeholder="Enter Password" required>
            <input type="submit" name="submit" class="button-primary" value="<?= I18n::tr('button.login'); ?>">
        </form>
    </div>

</div>