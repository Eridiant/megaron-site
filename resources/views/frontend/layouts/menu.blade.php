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
                    <a href="{{url('/auction')}}"><?= __('messages.auction'); ?></a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/auction')}}"><?= __('messages.create_auction'); ?></a></li>
                    </ul>
                </li>
                <li class="menu-item sub">
                    <a href="{{url('/properties')}}"><?= __('messages.projects'); ?></a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/')}}"><?= __('messages.filter_page'); ?></a></li>
                        <li><a href="{{url('/')}}"><?= __('messages.object_page'); ?></a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="{{url('/news')}}"><?= __('messages.news'); ?></a></li>
                <li class="menu-item sub">
                    <a href="{{url('/about')}}"><?= __('messages.about'); ?></a>
                    <ul class="menu-sub">
                        <li><a href="{{url('/guide')}}"><?= __('messages.buying_guide'); ?></a></li>
                        <li><a href="{{url('/')}}"><?= __('messages.brokers'); ?></a></li>
                    </ul>
                </li>
                <li class="menu-item"><a href="{{url('/')}}"><?= __('messages.new_building'); ?></a></li>
                <li class="menu-item"><a href="{{url('/contacts')}}"><?= __('messages.contacts'); ?></a></li>
            </ul>
        </nav>
        <div class="menu-footer">
            <form action="{{url('/search')}}" method="post" class="search">
                <input placeholder="<?= __('messages.search'); ?>" type="text" class="search-input" />
                <button type="submit"><svg width="20" height="20"><use xlink:href="/images/icons.svg#search"></use></svg></button>
            </form>
            <a href="{{url('/login')}}" class="login">
                <div class="login-icon">
                    <svg width="24" height="24"><use xlink:href="/images/icons.svg#user"></use></svg>
                </div>
                <div class="login-link">
                    <span><?= __('messages.log_in'); ?></span>
                    <svg width="20" height="20"><use xlink:href="/images/icons.svg#enter"></use></svg>
                </div>
            </a>
            <div class="border">
                <svg width="17" height="13"><use xlink:href="/images/icons.svg#mail"></use></svg> <a href="mailto:dda.rea.est@gmail.com">dda.rea.est@gmail.com</a>
            </div>
            <address class="border">
                <svg width="17" height="24"><use xlink:href="/images/icons.svg#address"></use></svg><?= __('messages.address'); ?>15 Luka Asatiani St, Batumi 6010, Грузия
            </address>
        </div>
    </div>
</div>