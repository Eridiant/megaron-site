<section class="event container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    <p class="title"><?= __('messages.event'); ?></p>
    <div id="news">
        <div class="event-items" data-next-page="{{ $nextPageNum }}">
            <?php foreach ($news as $news): ?>
                <div class="event-item">
                    <div class="event-image">
                        <img src="/uploads/{{$news->image ?? '/images/news/del/event/event.jpg'}}" alt="">
                    </div>
                    <div class="event-desc">
                        <div class="event-desc-header">
                            <div class="event-desc-inner">
                                <p class="heading">{{$news->trtitle->value}}</p>
                                <time datetime="{{$news->created_at}}">{{ date('d.m.y', strtotime($news->created_at)) }}</time>
                            </div>
                            <a href="{{url('/news/' . $news->slug)}}" class="btn btn-white-black dt">
                                <span>
                                    <span><?= __('messages.more'); ?></span>
                                    <svg width="20" height="20">
                                        <use xlink:href="/images/icons.svg#chat"></use>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="event-desc-excerpt">
                            {{$news->trexcerpt->value ?? $news->content->content}}
                        </div>
                        <div class="event-desc-mb">
                            <a href="{{url('/news/' . $news->slug)}}" class="btn btn-black mb">
                                <span>
                                    <span><?= __('messages.more'); ?></span>
                                    <svg width="20" height="20">
                                        <use xlink:href="/images/icons.svg#chat"></use>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php if ($nextPageUrl): ?>
            <div class="event-more more">
                <a href="{{ $nextPageUrl }}" id="event-more"><?= __('messages.see_more'); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>
