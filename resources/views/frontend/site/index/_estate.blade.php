<section class="estate white">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="background">
            <picture>
                <img src="/images/index/estate-bg.jpg" alt="">
            </picture>
        </div>
        <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
            <div class="estate-text">
                <p class="title"><?= __('messages.real_estate_uae'); ?></p>
                <p><?= __('messages.site_for_auction'); ?></p>
            </div>
            @include('frontend.common.search')
            <div class="estate-consultation">
                <a class="btn btn-white" href="#">
                    <span>
                        <span><?= __('messages.consultation'); ?></span>
                        <svg width="20" height="20">
                            <use xlink:href="/images/icons.svg#chat"></use>
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>