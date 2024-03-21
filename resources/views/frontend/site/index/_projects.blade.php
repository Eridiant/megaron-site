<section class="projects">
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <p class="title"><?= __('messages.reliable_projects'); ?></p>
        <div class="projects-switch">
            <a href="#" class="active" data-type="all"><?= __('messages.all'); ?></a>
            <a href="#" data-type="flats">Квартира</a>
            <span>
                <a href="#" data-type="villa">Виллы</a>
                <a href="#" data-type="penthouse">Пентхаусы</a>
            </span>
            <a href="#" data-typen="commercial">Коммерческая недвижимость</a>
        </div>
        <!-- <div class="swiper-buttons">
            <div class="projects-swiper-button-prev">&#8249;</div>
            <div class="projects-swiper-button-next">&#8250;</div>
        </div> -->
        <div class="swiper projects-swiper card white">
            <div class="swiper-wrapper text-white shadow-black">
                <?php foreach ($complexes as $complex): ?>
                    <div class="swiper-slide destination" data-type="flats">
                        <div class="card-image">
                            <picture>
                                <img src="/uploads/{{$complex->image ?? 'complex/default.jpg'}}" alt="">
                            </picture>
                        </div>
                        <a href="#" class="card-active border border-white target"><?= __('messages.see'); ?>&#8195;<svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg></a>
                        <div class="card-content">
                            <header>
                                <p class="caption">{{$complex->content->name ?? 'complex'}}</p>
                            </header>
                            <footer>
                                <p><span><?= __('messages.country'); ?>:</span> <span>United Arab Emirates</span></p>
                                <p><span><?= __('messages.completion'); ?>:</span> <span>{{$complex->delivery_date->format('Y')}}</span></p>
                                    <?php foreach (json_decode($complex->types) as $type): ?>
                                        {{$types[$type] ?? ''}}
                                    <?php endforeach; ?>
                                </span></p>
                                <p><span><?= __('messages.starting_price'); ?> ($):</span> <span>{{number_format($complex->min_price, 0, '.', ' ') ?? ''}}</span></p>
                            </footer>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next projects-next"></div>
            <div class="swiper-button-prev projects-prev"></div>
            <div class="swiper-pagination pagination"></div>
        </div>
    </div>
</section>

