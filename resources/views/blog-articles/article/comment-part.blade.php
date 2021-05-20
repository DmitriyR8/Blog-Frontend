@foreach($data['data']['data'] as $value)
    <div class = 'single-people-review'>
        <div class = 'header-single-people-review'>
            <p>{{$value['title']}}</p>
            <div class = 'stars-rate'>
                @if($value['rating'])
                    @for($i = 0.5; $i <= $value['rating']; $i++)
                        @if($i == $value['rating'] && is_float($i))
                            <span><img src="{{asset(env('APP_URL').'image/half star.svg')}}"></span>
                        @else
                            <span><img src="{{asset(env('APP_URL').'image/star (1).svg')}}"></span>
                        @endif
                    @endfor
                        @if($value['rating'] < 0.5)
                            <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                        @endif
                    @for($i = ceil($value['rating']); $i < 5; $i++)
                        <span><img src="{{asset(env('APP_URL').'image/star.svg')}}"></span>
                    @endfor
                @endif
            </div>
        </div>
        <div class = 'posted-info'>
            @foreach($value['user'] as $user)
                <span>{{$user['name']}}</span>
            @endforeach
            <span>|</span>
            <span>{{Carbon\Carbon::parse($value['created_at'])->format('Y-m-d')}}</span>
        </div>
        {!! $value['comment_body'] !!}
    </div>
@endforeach