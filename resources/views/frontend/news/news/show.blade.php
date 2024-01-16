<section class="news">
    <div class="container-lg" style="max-width: 1920px; margin-left: auto; margin-right: auto">
        <div class="news-header">
            <p class="title white">{{$news->trtitle->value}}</p>
            <picture>
                <img src="/uploads/{{$news->image}}" alt="">
            </picture>
        </div>
    </div>
    <div class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
        <?php foreach ($news->contents as $content): ?>
            <div class="news-content {{$content->text_type}}">
                <p>{{$content->content}}</p>
                <picture>
                    <img src="/uploads/{{$content->image}}" alt="">
                </picture>
            </div>
        <?php endforeach; ?>
        <a href="{{ route('news') }}" class="news-back">Назад к новостям</a>
    </div>
</section>


<section class="container" style="max-width: 1204px; margin-left: auto; margin-right: auto">
    
    
</section>