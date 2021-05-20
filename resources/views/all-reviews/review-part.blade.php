@foreach($data['data']['data'] as $value)
    <div class = 'single-review'>
        <div class = 'opacity-for-image'></div>
        <picture>
            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/webp">
            <source srcset = "{{env('API_URL').'show-review-image/'.$value['slug']}}" type="image/png">
            <img src = "{{env('API_URL').'show-review-image/'.$value['slug']}}">
        </picture>
        <div class = 'single-review-info'>
            <p class = 'logo-name-review'><a href = "single-reviews/{{$value['slug']}}">{{$value['logo']}}</a></p>
            <div class = 'header-single-review-info'>
                <div class = 'stars-rate'>
                    @if($value['overall_rating'])
                        @for($i = 0.5; $i <= $value['overall_rating']; $i++)
                            @if($i == $value['overall_rating'] && is_float($i))
                                <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                            @else
                                <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                            @endif
                        @endfor
                            @if($value['overall_rating'] < 0.5)
                                <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                            @endif
                        @for($i = ceil($value['overall_rating']); $i < 5; $i++)
                            <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                        @endfor
                    @endif
                </div>
                <span>Rating {{$value['overall_rating']}}</span>
            </div>
            <p>
                <a href = "single-reviews/{{$value['slug']}}" class = 'single-review-info-text-load'>{{$value['short_desc']}}</a>
            </p>
            <span class = 'date-review'>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
            <a href = 'single-reviews/{{$value['slug']}}'><button class = 'button raised hoverable'><div class = 'anim'></div>Read review</button></a>
        </div>
    </div>
@endforeach
