<footer class="footer container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <div class="logo footer-logo">
            <a href="{{url('/')}}"><svg><use xlink:href="/images/icons.svg#logo"></use></svg></a>
        </div>
        <nav class="nav footer-menu">
            <ul class="nav-list">
                <li class="nav-item sub">
                    <a href="{{url('/auction')}}">Аукцион</a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/auction')}}">Создать аукцион</a></li>
                    </ul>
                </li>
                <li class="nav-item sub">
                    <a href="{{url('/properties')}}">Проекты</a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/properties')}}">Страница фильтра</a></li>
                        <li><a href="{{url('/properties')}}">Страница объекта</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{url('/news')}}">Новости</a></li>
                <li class="nav-item sub">
                    <a href="{{url('/about')}}">О нас</a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/guide')}}">Руководство по покупке</a></li>
                        <li><a href="{{url('/')}}">Брокерам</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{url('/')}}">Новостройки</a></li>
                <li class="nav-item"><a href="{{url('/contacts')}}">Контакты</a></li>
            </ul>
        </nav>
        <div class="contact footer-contact">
            <div class="contact-link">
                <a href="{{url('/user/favorites')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#heart"></use></svg></a>
                <a href="tel:+995706070141">+9 957 060 701 41</a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
            </div>
            <form action="{{url('/')}}" method="post" class="search">
                <input placeholder="поиск" type="text" class="search-input" />
                <button type="submit"><svg width="20" height="20"><use xlink:href="/images/icons.svg#search"></use></svg></button>
            </form>
        </div>
        <div class="footer-object">
            Дубай, ОАЭ, Swiss Tower, Office 204, Jumeirah Lake Towers
        </div>
        <div class="footer-rights">
            <p>© Megaron 2007</p>
            <a href="{{url('/')}}">Политика конфиденциальности</a>
        </div>
        <div class="footer-mail">
            <a href="mailto:megaron@gmail.com" class="border">
                <svg width="17" height="13"><use xlink:href="/images/icons.svg#mail"></use></svg>
                <span>megaron@gmail.com</span>
            </a>
        </div>
    </div>
</footer>