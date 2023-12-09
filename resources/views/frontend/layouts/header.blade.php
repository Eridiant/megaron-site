<div class="navbar">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <a href="{{url('/')}}" class="logo">
            <svg width="295" height="70"><use xlink:href="/images/icons.svg#logo"></use></svg>
        </a>
    
        <nav class="nav">
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
                        <li><a href="{{url('/')}}">Страница фильтра</a></li>
                        <li><a href="{{url('/')}}">Страница объекта</a></li>
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

        <div class="language">
            <select class="language-select" onchange="location = this.value;">
                <?php foreach ($langs as $lang): ?>
                    <option {{$lang[1]}} value="{{url('/?lang=')}}{{$lang[0]}}">{{$lang[0]}}</option>
                <?php endforeach; ?>
                <!-- <option value="en">en</option>
                <option value="es" selected>es</option>
                <option value="fr">fr</option>
                <option value="de">de</option> -->
            </select>
        </div>
    
        <div class="contact">
            <div class="contact-link">
                <a href="{{url('/user/favorites')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#heart"></use></svg></a>
                <a href="tel:+995706070141">+9 957 060 701 41</a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#telegram"></use></svg></a>
                <a href="{{url('/')}}"><svg width="27" height="24"><use xlink:href="/images/icons.svg#viber"></use></svg></a>
            </div>
            <form action="{{url('/search')}}" method="post" class="search">
                <input placeholder="поиск" type="text" class="search-input" />
                <button type="submit"><svg width="20" height="20"><use xlink:href="/images/icons.svg#search"></use></svg></button>
            </form>
        </div>
        <a href="{{url('/login')}}" class="login">
            <div class="login-icon">
                <svg width="24" height="24"><use xlink:href="/images/icons.svg#user"></use></svg>
            </div>
            <div class="login-link">
                <span><?= __('messages.enter'); ?></span>
                <svg width="20" height="20"><use xlink:href="/images/icons.svg#enter"></use></svg>
            </div>
        </a>
    </div>
</div>



