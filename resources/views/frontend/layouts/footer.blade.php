<footer class="footer container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <div class="logo footer-logo">
            <a href="{{route('index')}}"><svg><use xlink:href="/images/icons.svg#logo"></use></svg></a>
        </div>
        <nav class="nav footer-menu">
            <ul class="nav-list">
                <li class="nav-item sub">
                    <a href="{{route('auction')}}"><?= __('messages.auction'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{route('auction')}}"><?= __('messages.create_auction'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item sub">
                    <a href="{{route('properties')}}"><?= __('messages.projects'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{route('properties')}}"><?= __('messages.filter_page'); ?></a></li>
                        <li><a href="{{route('properties')}}"><?= __('messages.object_page'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{route('news')}}"><?= __('messages.news'); ?></a></li>
                <li class="nav-item sub">
                    <a href="{{url('/about')}}"><?= __('messages.about'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{route('guide')}}"><?= __('messages.buying_guide'); ?></a></li>
                        <li><a href="{{route('index')}}"><?= __('messages.brokers'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{route('index')}}"><?= __('messages.new_building'); ?></a></li>
                <li class="nav-item"><a href="{{route('contacts')}}"><?= __('messages.contacts'); ?></a></li>
            </ul>
        </nav>
        <div class="contact footer-contact">
            <div class="contact-link">
                <a href="{{url('/user/favorites')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#heart"></use></svg></a>
                <a href="tel:+995706070141">+9 957 060 701 41</a>
                <a href="{{route('index')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                <a href="{{route('index')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
            </div>
            <form action="{{route('index')}}" method="post" class="search">
                <input placeholder="<?= __('messages.search'); ?>" type="text" class="search-input" />
                <button type="submit"><svg width="20" height="20"><use xlink:href="/images/icons.svg#search"></use></svg></button>
            </form>
        </div>
        <div class="footer-object"><?= __('messages.address'); ?></div>
        <div class="footer-rights">
            <p>© Megaron 2007</p>
            <a href="{{route('index')}}"><?= __('messages.privacy_policy'); ?></a>
        </div>
        <div class="footer-mail">
            <a href="mailto:megaron@gmail.com" class="border">
                <svg width="17" height="13"><use xlink:href="/images/icons.svg#mail"></use></svg>
                <span>megaron@gmail.com</span>
            </a>
        </div>
    </div>
</footer>

<div class="popup">
    <div class="popup-wrapper">
        <div class="popup-close"><svg width="24" height="24"><use xlink:href="/images/icons.svg#cls"></use></svg></div>
        <div class="popup-inner"></div>
    </div>
</div>

<!-- <div class="success">
    <div class="success-wrapper">
        <div class="success-content">
            <div class="success-true">
                <svg width="19" height="17"><use xlink:href="/images/icons.svg#success"></use></svg>
            </div>
            <div class="success-inner">
                <p class="caption">Спасибо</p>
                <p class="subtitle">Ваша заявка отправлена, мы перезвоним</p>
            </div>
        </div>
        <div class="success-close">
            <svg width="24" height="24"><use xlink:href="/images/icons.svg#cls"></use></svg>
        </div>
    </div>
</div>

<div class="form form-popup">
    <div class="form-wrap">
        <div class="form-close"><svg width="24" height="24"><use xlink:href="/images/icons.svg#cls"></use></svg></div>
        <div class="form-inner">
            <div class="form-wrapper">
                <p class="caption">Получите консультацию</p>
                <p class="form-desc">Оставьте заявку на сайте или  позвоните по телефону</p>
                <div class="header-localization-links">
                    <ul>
                        <li>
                            <span>
                                <span>RU:</span><a href="tel:89646353313">+7 964 635 33 13</a>
                            </span>
                            <span>
                                <a href="https://telegram.me/+79646353313"><svg width="20" height="20"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                                <a href="https://wa.me/+79646353313"><svg width="20" height="20"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
                            </span>
                        </li>
                        <li>
                            <span>
                                <span>KZ:</span><a href="tel:+77002100685">+7 700 210 06 85</a>
                            </span>
                            <span>
                                <a href="https://telegram.me/+77002100685"><svg width="20" height="20"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                                <a href="https://wa.me/+77002100685"><svg width="20" height="20"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
                            </span>
                        </li>
                    </ul>
                </div>
                <form id="form" class="form-form" action="#" method="post">
                    <div class="form-inner">
                        <div class="form-inner-fl">
                            <div class="form-inner-container">
                                <input type="text" id="name" name="name" pattern="[\p{L}\s\-]+" placeholder="Имя" title="только буквы и пробелы" required>
                                <label for="name">Имя:</label>
                            </div>
        
                            <div class="form-inner-container">
                                <input type="tel" id="phone" name="phone" placeholder="Телефон"  pattern="\+?[0-9\s\-\(\)]+" minlength="7" maxlength="20" title="только цифры" required>
                                <label for="phone">Телефон:</label>
                            </div>
                        </div>
                        <div class="form-inner-container">
                            <textarea id="message" name="message" placeholder="Сообщение" required></textarea>
                            <label for="message">Сообщение:</label>
                        </div>
                    </div>
                    <button class="form-btn btn" type="submit">
                        <span>
                            <span>отправить</span>
                            <svg width="16" height="16"><use xlink:href="/images/icons.svg#arrow"></use></svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div> -->