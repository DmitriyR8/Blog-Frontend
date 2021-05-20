@foreach($data['data']['data'] as $value)
    <div class = 'blog-theme-popular three-blog-theme'>
        <picture>
            <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/webp">
            <source srcset = "{{env('API_URL').'show-article-image/'.$value['slug']}}" type="image/png">
            <img class = 'blog-theme-img' src = '{{env('API_URL').'show-article-image/'.$value['slug']}}' data-object-fit="cover">
        </picture>
        <div class = 'three-blog-theme-info'>
            <p>
                <a href = "blog-articles/{{$value['slug']}}">{{$value['h1_title']}}</a>
            </p>
            <div class = 'view-info'>
                <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
                <span>|</span>
                <span><img src = '{{asset(env('APP_URL').'image/continuous-line-eye.svg')}}'> {{$value['views']}}</span>
                <span><img src = '{{asset(env('APP_URL').'image/basic-speech-bubble.svg')}}'> {{count($value['comments'])}}</span>
                <span>|</span>
                <span><a href = 'blog-articles/{{$value['slug']}}' class = 'read-more'><span>Read more <span class = 'arrow-right'></span></span></a></span>
            </div>
        </div>
    </div>
@endforeach