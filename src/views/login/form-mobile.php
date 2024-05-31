<div class="loginmain">

    <?php echo Message::show(); ?>

    <!-- The above form looks like this -->
    <div class="login-box">
        <img src="/static/img/avatar.svg" title="avatar" class="avatar">
        <form method="POST" action="<?= Conf::DIR ?>login/login">
            <input type="hidden" name="mobile" value="1">
            <p><?= I18n::tr('form.login'); ?></p>
            <input type="text" name="login" class="logininput" placeholder="Enter Username" required>
            <p><?= I18n::tr('form.password'); ?></p>
            <input type="password" name="pass" class="logininput" placeholder="Enter Password" required>
            <input type="submit" name="submit" class="button-primary" value="<?= I18n::tr('button.login'); ?>">
            <a href="/login?mobile=0">Desktop Version</a>
        </form>
    </div>

</div>