<section class="form container white" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <div class="form-background background main-border-radius">
        <picture>
            <img src="/images/common/form-bg.jpg" alt="">
        </picture>
    </div>
    <div class="form-wrapper">
        <p class="title"><?= __('messages.get_consultation'); ?></p>
        <p class="form-desc"><?= __('messages.leave_request'); ?></p>

        <form id="form" class="form-form" action="/api/message" method="post">
            <div class="form-inner">
                <div class="form-inner-container">
                    <label class="form-label" for="phone"><?= __('messages.phone'); ?>:</label>
                    <input class="form-input" type="text" id="phone" name="phone" placeholder="+7" required>
                </div>
                <p class="form-label"><?= __('messages.languages'); ?>?</p>
                <div class="form-inner-checkbox">
                    <div class="form-inner-container">
                        <input type="checkbox" id="call" name="call">
                        <label for="call"><?= __('messages.call'); ?></label>
                    </div>
                    <div class="form-inner-container">
                        <input type="checkbox" id="whatsapp" name="whatsapp">
                        <label for="whatsapp"><?= __('messages.send_to'); ?> WhatsApp</label>
                    </div>
                    <div class="form-inner-container">
                        <input type="checkbox" id="telegram" name="telegram">
                        <label for="telegram"><?= __('messages.send_to'); ?> Telegram</label>
                    </div>
                </div>
            </div>
            <div>
                <button class="btn btn-white" type="submit">
                    <span>
                        <span><?= __('messages.send'); ?></span>
                        <svg width="16" height="16"><use xlink:href="images/icons.svg#arrow"></use></svg>
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>