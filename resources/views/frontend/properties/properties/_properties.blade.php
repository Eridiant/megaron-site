<section class="container estate" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <p class="title"><?= __('messages.reliable_projects'); ?></p>
    @include('frontend.common.search')
</section>
<section class="container projects card white" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <div class="projects-wrapper">
        @include('frontend.common._project')
        @include('frontend.common._project')
        @include('frontend.common._project')
        @include('frontend.common._project')
        @include('frontend.common._project')
        @include('frontend.common._project')
    </div>
    <div class="projects-more more"><a href="#" id="flats-more"><?= __('messages.load_more'); ?></a></div>
</section>

