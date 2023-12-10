<section class="auction container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <div class="auction-header">
        <p class="title"><?= __('messages.create_auction'); ?></p>
        <p><?= __('messages.fill_out_form'); ?></p>
    </div>
    <div class="auction-wrapper">
        <form action="#" method="post" class="form">
            <div class="form-container">
                <label class="form-label" for="name"><?= __('messages.name'); ?>:</label>
                <input class="form-input" type="text" id="name" name="name" placeholder="<?= __('messages.name'); ?>Имя" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="phone"><?= __('messages.phone'); ?>:</label>
                <input class="form-input" type="text" id="phone" name="phone" placeholder="+7" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="mail"><?= __('messages.neighborhood'); ?>:</label>
                <input class="form-input" type="text" id="mail" name="mail" placeholder="mail" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="type"><?= __('messages.type'); ?>:</label>
                <input class="form-input" type="text" id="type" name="type" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="city"><?= __('messages.city'); ?>:</label>
                <input class="form-input" type="text" id="city" name="city" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="summ"><?= __('messages.summ'); ?>:</label>
                <input class="form-input" type="text" id="summ" name="summ" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="flour"><?= __('messages.flour'); ?>:</label>
                <input class="form-input" type="text" id="flour" name="flour" required>
            </div>
            <div class="form-container">
                <label class="form-label" for="finish"><?= __('messages.finish'); ?>:</label>
                <input class="form-input" type="text" id="finish" name="finish" required>
            </div>
            <div class="form-container">
                <button class="btn btn-blue" type="submit">
                    <span>
                        <span><?= __('messages.send'); ?></span>
                        <svg width="16" height="16"><use xlink:href="images/icons.svg#arrow"></use></svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>
