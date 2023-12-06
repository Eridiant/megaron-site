<section class="projects">
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <p class="title">Надежные проекты</p>
        <div class="projects-switch">
            <a href="#" class="active" data-type="all">Все</a>
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
                                <img src="/uploads/{{$complex->media[0] ?? 'complex/default.jpg'}}" alt="">
                            </picture>
                        </div>
                        <a href="#" class="card-active border border-white target">Посмотреть&#8195;<svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg></a>
                        <div class="card-content">
                            <header>
                                <p class="caption">{{$complex->content->name ?? 'complex'}}</p>
                            </header>
                            <footer>
                                <p><span>Country:</span> <span>United Arab Emirates</span></p>
                                <p><span>Сдача объекта:</span> <span>2023</span></p>
                                <p><span>Варианты юнитов:</span> <span>Студио, 1спальня</span></p>
                                <p><span>Starting price ($):</span> <span>327,780</span></p>
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

