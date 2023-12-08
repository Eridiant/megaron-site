<section class="district">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
            <p class="title">Районы и проекты</p>
        </div>
        <div class="swiper district-swiper card white">
            <div class="swiper-wrapper">
                <?php foreach ($neighborhoods as $neighborhood): ?>
                    <div class="swiper-slide">
                        <div class="card-image">
                            <picture>
                                <img src="/uploads/{{$neighborhood->image ?? 'apartment/neighborhood.jpg'}}" alt="">
                            </picture>
                        </div>
                        <div class="card-content">
                            <header>
                                <p class="subtitle">район</p>
                                <p class="caption">{{$neighborhood->trname->value ?? ''}}</p>
                            </header>
                            <footer>
                                <p><a href="#" class="encircle encircle-white target"><svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg></a><span>({{$neighborhood->offers ?? 'нет '}} предложений)</span></p>
                            </footer>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next district-next"></div>
            <div class="swiper-button-prev district-prev"></div>
            <div class="swiper-pagination pagination"></div>
        </div>
    </div>
</section>