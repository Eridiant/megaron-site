<div class="navbar">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <a href="{{url('/')}}" class="logo">
            <svg width="295" height="70"><use xlink:href="/images/icons.svg#logo"></use></svg>
        </a>
    
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item sub">
                    <a href="{{url('/auction')}}"><?= __('messages.auction'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/auction')}}"><?= __('messages.how_create_auction'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item sub">
                    <a href="{{url('/properties')}}"><?= __('messages.projects'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/')}}"><?= __('messages.filter_page'); ?></a></li>
                        <li><a href="{{url('/')}}"><?= __('messages.object_page'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{url('/news')}}"><?= __('messages.news'); ?></a></li>
                <li class="nav-item sub">
                    <a href="{{url('/about')}}"><?= __('messages.about'); ?></a>
                    <ul class="nav-sub">
                        <li><a href="{{url('/guide')}}"><?= __('messages.buying_guide'); ?></a></li>
                        <li><a href="{{url('/')}}"><?= __('messages.brokers'); ?></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="{{url('/')}}"><?= __('messages.new_building'); ?></a></li>
                <li class="nav-item"><a href="{{url('/contacts')}}"><?= __('messages.contacts'); ?></a></li>
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
                <input placeholder="<?= __('messages.search'); ?>" type="text" class="search-input" />
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



