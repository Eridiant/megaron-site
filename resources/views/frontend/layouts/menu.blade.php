<div class="menu-icon">
    <div class="burger"><span></span></div>
</div>
<div id="menu" class="menu">
    <div class="menu-wrapper">
        <div class="menu-header">
            <a href="{{url('/')}}" class="icon"><svg><use xlink:href="/images/icons.svg#logo"></use></svg></a>
            <div class="contact-link">
                <a href="{{url('/user/favorites')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#heart"></use></svg></a>
                <a href="tel:+995706070141">+9 957 060 701 41</a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
            </div>
        </div>

        <nav class="nav">

            <ul class="menu-list">
                <li class="menu-item sub">
                    <a href="{{url('/auction')}}">Аукцион</a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/auction')}}">Создать аукцион</a></li>
                    </ul>
                </li>
                <li class="menu-item sub">
                    <a href="{{url('/properties')}}">Проекты</a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/')}}">Страница фильтра</a></li>
                        <li><a href="{{url('/')}}">Страница объекта</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="{{url('/news')}}">Новости</a></li>
                <li class="menu-item sub">
                    <a href="{{url('/about')}}">О нас</a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/guide')}}">Руководство по покупке</a></li>
                        <li><a href="{{url('/')}}">Брокерам</a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="{{url('/')}}">Новостройки</a></li>
                <li class="menu-item"><a href="{{url('/contacts')}}">Контакты</a></li>
            </ul>
        </nav>
        <div class="menu-footer">
            <form action="{{url('/search')}}" method="post" class="search">
                <input placeholder="поиск" type="text" class="search-input" />
                <button type="submit"><svg width="20" height="20"><use xlink:href="/images/icons.svg#search"></use></svg></button>
            </form>
            <a href="{{url('/login')}}" class="login">
                <div class="login-icon">
                    <svg width="24" height="24"><use xlink:href="/images/icons.svg#user"></use></svg>
                </div>
                <div class="login-link">
                    <span>Войти</span>
                    <svg width="20" height="20"><use xlink:href="/images/icons.svg#enter"></use></svg>
                </div>
            </a>
            <div class="border">
                <svg width="17" height="13"><use xlink:href="/images/icons.svg#mail"></use></svg> <a href="mailto:dda.rea.est@gmail.com">dda.rea.est@gmail.com</a>
            </div>
            <address class="border">
                <svg width="17" height="24"><use xlink:href="/images/icons.svg#address"></use></svg>15 Luka Asatiani St, Batumi 6010, Грузия
            </address>
        </div>
    </div>
</div>