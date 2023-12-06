<section class="offer">
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <p class="title">Горячие предложения<span class="offer-fire"><svg width="16" height="20"><use xlink:href="/images/icons.svg#fire"></use></svg></span></p>
        <div class="swiper offer-swiper card">
            <div class="swiper-wrapper">
                <?php foreach ($apartments as $apartment): ?>
                    <div class="swiper-slide">
                        <div class="card-content">
                            <div class="card-picture">
                                <div class="card-img">
                                    <picture>
                                        <img src="/uploads/{{$apartment->media[0] ?? 'apartment/default.jpg'}}" alt="">
                                    </picture>
                                </div>
                                <a class="card-icon card-heart" href="#"><svg width="21" height="18"><use xlink:href="/images/icons.svg#heart"></use></svg></a>
                                <a class="card-icon card-location" href="#">
                                    <p><svg width="21" height="21"><use xlink:href="/images/icons.svg#location"></use></svg></p>
                                    <span>смотреть на карте</span>
                                </a>
                            </div>
                            <header>
                                <p class="subtitle">{{$apartment->content->name ?? 'apartment'}}</p>
                                <div>
                                    <p>Район: {{$apartment->complex->neighborhood->trname->value ?? 'neighborhood'}}, {{$apartment->complex->city->trname->value ?? 'city'}}</p>
                                    <p>Застройщик: {{$apartment->complex->developer->trname->value ?? 'complex'}}</p>
                                </div>
                                <div class="card-column">
                                    <p>
                                        <span>Площадь</span>
                                        <span>{{$apartment->total_area}} м<sup>2</sup></span>
                                    </p>
                                    <p>
                                        <span>Спален</span>
                                        <span>{{$apartment->number_of_rooms}}</span>
                                    </p>
                                    <p>
                                        <span>Ванн</span>
                                        <span>{{$apartment->number_of_bathrooms}}</span>
                                    </p>
                                </div>
                            </header>
                            <footer>
                                <p class="card-price">{{number_format($apartment->cost, 0, '.', ' ')}} $</p>
                                <div class="card-row">
                                    <a href="#" class="btn btn-blue target">
                                        <span>
                                            <span>Посмотреть</span>
                                            <svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                                        </span>
                                    </a>
                                    <a class="encircle encircle-white-blue" href="#"><svg width="26" height="26"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                                </div>
                            </footer>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>