<?php
$c = 'ru';
?>
<section class="contacts container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <div class="contacts-inf">
        <p class="title"><?= __('messages.contacts'); ?></p>
        <div class="contact-link">
            <span>GR:</span>
            <a href="tel:+995706070141">+9 957 060 701 41</a>
            <a href="#"><svg width="27" height="24"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
            <a href="#"><svg width="27" height="24"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
        </div>
        <a href="mailto:megaron@gmail.com" class="border">
            <svg width="17" height="13"><use xlink:href="/images/icons.svg#mail"></use></svg>
            <span>megaron@gmail.com</span>
        </a>
        <address class="border">
            <svg width="24" height="24"><use xlink:href="/images/icons.svg#location"></use></svg>
            <span><?= __('messages.what_is_auction'); ?></span>
        </address>
        <a href="#" class="btn btn-black">
            <span>
                <span><?= __('messages.contacts'); ?></span>
                <svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg>
            </span>
        </a>
    </div>
    <div class="contacts-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2981.26852268452!2d41.63132067581549!3d41.649939979668865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4067864016121913%3A0xceec0f057ebeb4f3!2zMTUgTHVrYSBBc2F0aWFuaSBTdCwgQmF0dW1pLCDQk9GA0YPQt9C40Y8!5e0!3m2!1s<?= $c; ?>!2s!4v1690188463962!5m2!1s<?= $c; ?>!2s" allowfullscreen="" loading="lazy"  {$c}referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>