<section class="container estate" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    @include('frontend.common.search')
</section>

<section class="flats offer card container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <div class="flats-wrapper">
        @include('frontend.common._flat')
        @include('frontend.common._flat')
        @include('frontend.common._flat')
        @include('frontend.common._flat')
        @include('frontend.common._flat')
        @include('frontend.common._flat')
    </div>
    <div class="flats-more more"><a href="#" id="flats-more"><?= __('messages.load_more'); ?></a></div>
</section>