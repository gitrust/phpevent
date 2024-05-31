<div class="row">
    <div class="three columns">
        <img class="img-fluid" src="<?= URL::IMG('working-people.jpg'); ?>" alt="Community of people">
    </div>

    <h3><?= i18n::tr('title.newtask') ?></h3>
    <div class="nine columns">
        <div class="row">
           
            <div class="twelve columns">
                <form action="<?= Conf::DIR ?>tasks/add/?event=<?= htmlentities($data['event']) ?>" method="POST">
                    <input type="hidden" name="event" value="<?= htmlentities($data['event']) ?>">

                    <div class="row">
                        <div class="six columns">
                            <label for="name"><?= I18n::tr('label.taskname'); ?> (*)</label>
                            <input id="name" type="text" name="name" class="u-full-width" value="" maxlength="40">
                        </div>
                        <div class="six columns">
                            <label for="time"><?= I18n::tr('label.tasktime'); ?></label>
                            <input type="text" maxlength="20" name="time" value="" class="u-full-width">
                        </div>
                    </div>

                    <div class="row">
                        <div class="six columns">
                            <label for="volunteer"><?= I18n::tr('label.taskvolunteer'); ?></label>
                            <input type="text" name="volunteer" class="u-full-width" value="">
                        </div>
                        <div class="six columns">
                            <label for="desc"><?= I18n::tr('label.tasknote'); ?></label>
                            <input type="text" name="desc" class="u-full-width" value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <input class="button-primary" value="<?= I18n::tr('button.add'); ?>" type="submit">
                            <a class="button button-primary" href="<?= htmlentities($data["cancel.link"]) ?>"><?= I18n::tr('button.cancel'); ?></a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>